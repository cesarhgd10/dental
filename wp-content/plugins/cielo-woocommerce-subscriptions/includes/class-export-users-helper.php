<?php


class ExportUsersHelper {

	public static $instance;

	private $gateway;

	private function __construct() {

		$this->gateway = new WC_Cielo_Subscriptions_Gateway();

		add_filter( 'bulk_actions-users', array( $this, 'ip_export_users' ) );

		add_filter( 'handle_bulk_actions-users', array( $this, 'ip_export_users_bulk_action_handler' ), 10, 3 );

		add_filter( 'bulk_actions-users', array( $this, 'ip_update_api' ) );

		add_filter( 'handle_bulk_actions-users', array( $this, 'ip_update_api_bulk_action_handler' ), 10, 3 );
	}


	/**
	 * Return an instance of this class.
	 *
	 * @return object A single instance of this class.
	 */
	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( NULL == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}


	/*******************
	 * Export Functions *
	 *******************/

	// Add a bulk action to export the users
	function ip_export_users( $bulk_actions ) {
		$bulk_actions['export_users'] = __( 'Export Users', 'Instituto Ponte' );
		return $bulk_actions;
	}

	/**
	 * Handles the Export Users bulk action.
	 */
	function ip_export_users_bulk_action_handler( $redirect_to, $action, $user_ids ) {
		if ( $action !== 'export_users' ) {
			return $redirect_to;
		}

		$users = [];

		foreach( $user_ids as $user_id ) {
			// Fields that we will retrieve
			$user_fields = [ 'user_full_name', 'user_id', 'product_name', 'renewal_order_total', 'order_token', 'order_bandeira', 'payment_due', 'payment_due_readable', 'price_time_unit' ];

			$users[] = $this->ip_filter_user_data( $this->get_user_data( $user_id, $user_fields ) );

		}

		$this->array_to_xls( $users );

		return $redirect_to;
	}

	private function array_to_xls( $array ) {
		$filename = 'tabela_contribuentes.xls';

		$xls = new ExportXLS( $filename );

		$header = [ 'ID', 'Nome', 'Valor da Mensalidade', 'Token', 'Bandeira', 'Pacote' ];
		$xls->addHeader( $header );

		foreach( $array as $user ) {
			$row = [];
			foreach( $user as $key => $value ) {
				$row[] = reset( $value );
			}
			$xls->addRow( $row );
		}

		$xls->sendFile();
	}



	/***********************
	 * Update API Functions *
	 ***********************/

	// Add the bulk action option to update de User API

	function ip_update_api( $bulk_actions ) {
		$bulk_actions['update_api'] = __( 'Update API', 'Instituto Ponte' );
		return $bulk_actions;
	}

	/**
	 * Handles the Update API bulk action.
	 */
	function ip_update_api_bulk_action_handler( $redirect_to, $action, $user_ids ) {
		if ( $action !== 'update_api' ) {
			return $redirect_to;
		}

		foreach( $user_ids as $user_id ) {

			// echo '<pre>';
			// var_dump( $this->ip_filter_user_data( $this->ip_get_user_data( $user_id ) ) );

			$order =  $this->ip_create_user_subscription( $user_id );
			$args  =  $this->ip_filter_user_data( $this->get_user_data( $user_id ), [ 'order_token', 'order_bandeira' ] );


			$response = $this->gateway->update_payment( $order, $args );

			ip_write_log( 'Response:' );
			ip_write_log( $response );

		}


		return $redirect_to;
	}


	/**
	 * Get the user last subscription and create a new one with the data from the previous one
	 *
	 * @param  int $user_id The user ID
	 * @return WC_Order The post meta data related with the given $user_id
	 */
	private function ip_create_user_subscription( $user_id ) {

		// Get user information
		$subscription_helper = new ExportSubscriptionsHelper();

		// Get the last subscription of this user
		$last_subscription = $subscription_helper->get_user_last_subscription( $user_id );

		// Get the last subscription start_date
		$ls_start_date = $last_subscription->get_date( 'start' );

		// Get subscription related orders
		$ls_related_orders = $last_subscription->order;

		// Get last subscription order items
		$ls_order_item = reset( $ls_related_orders->get_items() );


		// Order Product ID
		$ls_order_product_id = $ls_order_item->get_product_id();

		// We need this if the product use pay your price plugin
		$ls_order_total      = $ls_related_orders->get_total();

		// Customer billing information
		$address = [
			'first_name' => get_user_meta( $user_id, 'billing_first_name', true ),
			'last_name'  => get_user_meta( $user_id, 'billing_last_name', true ),
			'company'    => get_user_meta( $user_id, 'billing_company', true ),
			'email'      => get_user_meta( $user_id, 'billing_email', true ),
			'phone'      => get_user_meta( $user_id, 'billing_phone', true ),
			'address_1'  => get_user_meta( $user_id, 'billing_address_1', true ),
			'address_2'  => get_user_meta( $user_id, 'billing_address_2', true ),
			'city'       => get_user_meta( $user_id, 'billing_city', true ),
			'postcode'   => get_user_meta( $user_id, 'billing_postcode', true ),
			'state'      => get_user_meta( $user_id, 'billing_state', true )
		];

		// Product
		$ls_order_product    = wc_get_product( $ls_order_product_id );

		$ls_order_product->set_price( "{$ls_order_total}" );

		// Quantity
		$qty = 1;

		// Product additional args
		$args = array(
			'attribute_billing-period' => 'month',
		);


		// Set the product price as the same price that the last order's total
		$ls_order_product->set_regular_price( $ls_order_total );
		$ls_order_product->set_price( $ls_order_total );


		/****
		 * Creating a new Order
		 */
		$new_order = wc_create_order( [ 'customer_id' => $user_id ] );
		$new_order->add_product( $ls_order_product, $qty, $args );
		$new_order->set_address( $address, 'billing' );

		// Calculate de new order's total
		$new_order->calculate_totals();


		// Subscription
		$period = WC_Subscriptions_Product::get_period( $ls_order_product );
		$interval  = WC_Subscriptions_Product::get_interval( $ls_order_product );

		/**
		 * Fix start date
		 */
		// Default date
		$start_date = new DateTime( $ls_start_date, new DateTimeZone( 'America/Sao_Paulo' ) );

		// Transform de default date in a DateTime object
		$ls_start_date = new DateTime( $ls_start_date, new DateTimeZone( 'America/Sao_Paulo' ) );

		// Get de default date Timestamp
		$ls_start_date = $ls_start_date->getTimestamp();

		// If the default date is in the past, set the start_date to today
		$start_now = $this->start_now( $ls_start_date );

		if ( $start_now ) {

			$start_date = new DateTime( '', new DateTimeZone( 'America/Sao_Paulo' ) );

		}

		/****
		 * Create a new Subscription
		 */
		$sub = wcs_create_subscription( [ 'order_id' => $new_order->get_id(), 'billing_period' => $period, 'billing_interval' => $interval, 'start_date' => $start_date->format('Y-m-d H:i:s') ] );
		$sub->add_product( $ls_order_product );
		$sub->set_address( $address, 'billing' );


		// Calculate the subscription's total
		$sub->calculate_totals();


		return $new_order;
	}


	private function get_user_data( $user_id ) {

		global $wpdb;

		$result = $wpdb->get_results( $wpdb->prepare( "SELECT a.* FROM {$wpdb->prefix}postmeta a
                                                    LEFT OUTER JOIN {$wpdb->prefix}postmeta b
                                                    ON a.post_id = b.post_id AND b.meta_value = %d
                                                    WHERE b.meta_key = 'user_id' ", $user_id ) );


		return $result;

	}


	/**
	 * Filter the return array of ip_get_user_data function
	 * @param  array $data An array of the user's meta data
	 * @param array $user_fields An array of the data that we will get
	 *
	 * @return array  An array of the filtered user's meta data
	 */
	private function ip_filter_user_data( $data, $user_fields = [] ) {
		$user_data   = [];
		
		if( count( $data ) > 0 ) {
			foreach( $data as $key => $value ) {
				if( in_array( $value->meta_key, $user_fields ) ) {
					if( $value->meta_key == 'price_time_unit' ) {
						$user_data[$value->meta_key] = $this->format_price_time_unit( $value->meta_value );
					}
					else if( $value->meta_key == 'order_bandeira' ) {
						$user_data[$value->meta_key] = $this->format_order_bandeira( $value->meta_value );
					}
					else {
						$user_data[$value->meta_key] = $value->meta_value;
					}
				}
			}
		}

		return $user_data;
	}

	function format_price_time_unit( $price_time_unit ) {
		return $price_time_unit = ( $price_time_unit == 'month' ) ? 'Monthly' : $price_time_unit;
	}

	function format_order_bandeira( $order_bandeira ) {


		switch( $order_bandeira ) {
			case 'mastercard':
				return 'Master';
				break;
			case 'visa':
				return 'Visa';
				break;
			default: return $order_bandeira ;
		}
	}

	private function start_now( $timestamp ) {

		$now        = new DateTime( '', new DateTimeZone( 'America/Sao_Paulo' ) );
		$now        = $now->getTimestamp();

		if ( $timestamp < $now ) {
			return true;
		}

		return false;
	}

}





ExportUsersHelper::get_instance();
