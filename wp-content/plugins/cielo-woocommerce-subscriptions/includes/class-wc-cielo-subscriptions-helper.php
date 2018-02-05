<?php

/**
 * WC Cielo Subscriptions Helper Class.
 */
abstract class WC_Cielo_Subscriptions_Helper extends WC_Payment_Gateway {

	protected $environment;
	protected $methods;

	/**
	 * Get payment methods.
	 *
	 * @return array
	 */
	public function get_payment_methods() {
		return array(
			// Credit.
			'visa'       => __( 'Visa', 'cielo-woocommerce-subscriptions' ),
			'mastercard' => __( 'Master', 'cielo-woocommerce-subscriptions' ),
			'diners'     => __( 'Diners', 'cielo-woocommerce-subscriptions' ),
			'discover'   => __( 'Discover', 'cielo-woocommerce-subscriptions' ),
			'elo'        => __( 'Elo', 'cielo-woocommerce-subscriptions' ),
			'amex'       => __( 'Amex', 'cielo-woocommerce-subscriptions' ),
			'jcb'        => __( 'JCB', 'cielo-woocommerce-subscriptions' ),
			'aura'       => __( 'Aura', 'cielo-woocommerce-subscriptions' ),
		);
	}


	/**
	 * Get payment method name.
	 *
	 * @param  string $slug Payment method slug.
	 *
	 * @return string       Payment method name.
	 */
	public function get_payment_method_name( $slug ) {
		$methods = $this->get_payment_methods();

		if ( isset( $methods[ $slug ] ) ) {
			return $methods[ $slug ];
		}

		return $slug;
	}

	/**
	 * Get available methods options.
	 *
	 * @return array
	 */
	public function get_available_methods_options() {
		$methods = array();

		foreach ( $this->methods as $method ) {
			$methods[ $method ] = $this->get_payment_method_name( $method );
		}

		return $methods;
	}

	/**
	 * Get the accepted brands in a text list.
	 *
	 * @param  array $methods
	 *
	 * @return string
	 */
	public function get_accepted_brands_list( $methods ) {
		$total = count( $methods );
		$count = 1;
		$list  = '';

		foreach ( $methods as $method ) {
			$name = $this->get_payment_method_name( $method );

			if ( 1 == $total ) {
				$list .= $name;
			} else if ( $count == ( $total - 1 ) ) {
				$list .= $name . ' ';
			} else if ( $count == $total ) {
				$list .= sprintf( __( 'and %s',
					'cielo-woocommerce-subscriptions' ), $name );
			} else {
				$list .= $name . ', ';
			}

			$count ++;
		}

		return $list;
	}


	/**
	 * Get methods who accepts authorization.
	 *
	 * @return array
	 */
	public function get_accept_authorization() {
		return array( 'visa', 'mastercard' );
	}

	/**
	 * Get valid value.
	 * Prevents users from making shit!
	 *
	 * @param  string|int|float $value
	 *
	 * @return int|float
	 */
	public function get_valid_value( $value ) {
		$value = str_replace( '%', '', $value );
		$value = str_replace( ',', '.', $value );

		return $value;
	}

	/**
	 * Get the order API return URL.
	 *
	 * @param  WC_Order $order Order data.
	 *
	 * @return string
	 */
	public function get_api_return_url( $order ) {
		$wc  = WC();
		$url = $wc->api_request_url( get_class( $this ) );

		return urlencode( add_query_arg( array(
			'key'   => $order->get_order_key(),
			'order' => $order->get_id(),
		), $url ) );
	}

	/**
	 * Get the status name.
	 *
	 * @param  int $id Status ID.
	 *
	 * @return string
	 */
	public function get_status_name( $id ) {
		$status = array(
			0  => _x( 'Transaction created', 'Transaction Status',
				'cielo-woocommerce-subscriptions' ),
			1  => _x( 'Transaction ongoing', 'Transaction Status',
				'cielo-woocommerce-subscriptions' ),
			2  => _x( 'Transaction authenticated', 'Transaction Status',
				'cielo-woocommerce-subscriptions' ),
			3  => _x( 'Transaction not authenticated', 'Transaction Status',
				'cielo-woocommerce-subscriptions' ),
			4  => _x( 'Transaction authorized', 'Transaction Status',
				'cielo-woocommerce-subscriptions' ),
			5  => _x( 'Transaction not authorized', 'Transaction Status',
				'cielo-woocommerce-subscriptions' ),
			6  => _x( 'Transaction captured', 'Transaction Status',
				'cielo-woocommerce-subscriptions' ),
			9  => _x( 'Transaction cancelled', 'Transaction Status',
				'cielo-woocommerce-subscriptions' ),
			10 => _x( 'Transaction in authentication', 'Transaction Status',
				'cielo-woocommerce-subscriptions' ),
			12 => _x( 'Transaction in cancellation', 'Transaction Status',
				'cielo-woocommerce-subscriptions' ),
		);

		if ( isset( $status[ $id ] ) ) {
			return $status[ $id ];
		}

		return _x( 'Transaction failed', 'Transaction Status',
			'cielo-woocommerce-subscriptions' );
	}

	/**
	 * Get order total.
	 *
	 * @return float
	 */
	public function get_order_total() {
		global $woocommerce;

		$order_total = 0;
		$order_id    = absint( get_query_var( 'order-pay' ) );

		// Gets order total from "pay for order" page.
		if ( 0 < $order_id ) {
			$order       = new WC_Order( $order_id );
			$order_total = (float) $order->get_total();

			// Gets order total from cart/checkout.
		} elseif ( 0 < $woocommerce->cart->total ) {
			$order_total = (float) $woocommerce->cart->total;
		}

		return $order_total;
	}

	/**
	 * Get logger.
	 *
	 * @return WC_Logger instance.
	 */
	public function get_logger() {
		return new WC_Logger();
	}

	/**
	 * Get log file path
	 *
	 * @return string
	 */
	public function get_log_file_path() {
		if ( function_exists( 'wc_get_log_file_path' ) ) {
			return '<a href="' . esc_url( admin_url( 'admin.php?page=wc-status&tab=logs&log_file=' . esc_attr( $this->id ) . '-' . sanitize_file_name( wp_hash( $this->id ) ) . '.log' ) ) . '">' . __( 'System Status &gt; Logs',
					'cielo-woocommerce-subscriptions' ) . '</a>';
		}

		return '<code>woocommerce/logs/' . esc_attr( $this->id ) . '-' . sanitize_file_name( wp_hash( $this->id ) ) . '.txt</code>';
	}

	/**
	 * Returns a bool that indicates if currency is amongst the supported ones.
	 *
	 * @return bool
	 */
	public function using_supported_currency() {
		return ( 'BRL' == get_woocommerce_currency() );
	}

	/**
	 * Check the environment.
	 *
	 * @return bool
	 */
	public function check_environment() {
		if ( 'test' == $this->environment ) {
			return TRUE;
		}

		// For production.
		return ( ! empty( $this->methods ) && ! empty( $this->number ) && ! empty( $this->key ) );
	}

	/**
	 * Check settings for webservice solution.
	 *
	 * @return bool
	 */
	public function checks_for_webservice() {

		if ( 'test' == $this->environment ) {
			return TRUE;
		}

		return 'yes' == get_option( 'woocommerce_force_ssl_checkout' ) && is_ssl();
	}

	/**
	 * Returns a value indicating the the Gateway is available or not. It's
	 * called automatically by WooCommerce before allowing customers to use the
	 * gateway for payment.
	 *
	 * @return bool
	 */
	public function is_available() {
		// Test if is valid for use.
		$available = parent::is_available() &&
		             $this->check_environment() &&
		             $this->using_supported_currency() &&
		             $this->checks_for_webservice();

		return $available;
	}

	/**
	 * Admin page.
	 */
	public function admin_options() {
		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		wp_enqueue_script( 'wc-cielo-subscriptions-admin',
			plugins_url( 'assets/js/admin/admin' . $suffix . '.js',
				plugin_dir_path( __FILE__ ) ), array( 'jquery' ),
			WC_Cielo_Subscriptions::VERSION, TRUE );

		include dirname( __FILE__ ) . '/views/html-admin-page.php';
	}

	/**
	 * Add error messages in checkout.
	 *
	 * @param string $message Error message.
	 */
	public function add_error( $message ) {

		$title = '<strong>' . esc_attr( $this->title ) . ':</strong> ';

		wc_add_notice( $title . $message, 'error' );
	}

	/**
	 * Get Checkout form field.
	 *
	 */
	abstract protected function get_checkout_form( );


	/**
	 * Payment fields.
	 */
	public function payment_fields() {
		if ( $description = $this->get_description() ) {
			echo wpautop( wptexturize( $description ) );
		}

		// Set the payment form type.
		wp_enqueue_script( 'wc-credit-card-form' );

		$this->get_checkout_form();
	}

	/**
	 * Validate credit brand.
	 *
	 * @param  string $card_brand
	 *
	 * @return bool
	 */
	protected function validate_credit_brand( $card_brand ) {
		try {
			// Validate the card brand.
			if ( ! in_array( $card_brand, $this->methods ) ) {
				throw new Exception( sprintf( __( 'Please enter with a valid card brand. The following cards are accepted: %s.',
					'cielo-woocommerce-subscriptions' ),
					$this->get_accepted_brands_list( $this->methods ) ) );
			}
		} catch ( Exception $e ) {
			$this->add_error( $e->getMessage() );

			return FALSE;
		}

		return TRUE;
	}

	/**
	 * Get credit card brand.
	 *
	 * @param  string $number
	 *
	 * @return string
	 */
	public function get_card_brand( $number ) {
		$number = preg_replace( '([^0-9])', '', $number );
		$brand  = '';

		// https://gist.github.com/arlm/ceb14a05efd076b4fae5
		$supported_brands = array(
			'visa'       => '/^4\d{12}(\d{3})?$/',
			'mastercard' => '/^(5[1-5]\d{4}|677189)\d{10}$/',
			'diners'     => '/^3(0[0-5]|[68]\d)\d{11}$/',
			'discover'   => '/^6(?:011|5[0-9]{2})[0-9]{12}$/',
			'elo'        => '/^((((636368)|(438935)|(504175)|(451416)|(636297))\d{0,10})|((5067)|(4576)|(4011))\d{0,12})$/',
			'amex'       => '/^3[47]\d{13}$/',
			'jcb'        => '/^(?:2131|1800|35\d{3})\d{11}$/',
			'aura'       => '/^(5078\d{2})(\d{2})(\d{11})$/',
			'hipercard'  => '/^(606282\d{10}(\d{3})?)|(3841\d{15})$/',
			'maestro'    => '/^(?:5[0678]\d\d|6304|6390|67\d\d)\d{8,15}$/',
		);

		foreach ( $supported_brands as $key => $value ) {
			if ( preg_match( $value, $number ) ) {
				$brand = $key;
				break;
			}
		}

		return $brand;
	}

	/**
	 * Validate card fields.
	 *
	 * @param  array $posted
	 *
	 * @return bool
	 */
	protected function validate_card_fields( $posted ) {
		try {
			// Validate name typed for the card.
			if ( ! isset( $posted[ $this->id . '_holder_name' ] ) || '' === $posted[ $this->id . '_holder_name' ] ) {
				throw new Exception( __( 'Please type the name of the card holder.',
					'cielo-woocommerce-subscriptions' ) );
			}

			// Validate the expiration date.
			if ( ! isset( $posted[ $this->id . '_expiry' ] ) || '' === $posted[ $this->id . '_expiry' ] ) {
				throw new Exception( __( 'Please type the card expiry date.',
					'cielo-woocommerce-subscriptions' ) );
			}

			// Validate the cvv for the card.
			if ( ! isset( $posted[ $this->id . '_cvc' ] ) || '' === $posted[ $this->id . '_cvc' ] ) {
				throw new Exception( __( 'Please type the cvv code for the card',
					'cielo-woocommerce-subscriptions' ) );
			}
		} catch ( Exception $e ) {
			$this->add_error( $e->getMessage() );

			return FALSE;
		}

		return TRUE;
	}


	/**
	 * Process subscriptions payment.
	 *
	 * @param  WC_Order $order
	 *
	 * @return array
	 */
	abstract protected function process_subscriptions_payment( $order );


	/**
	 * Process the payment and return the result.
	 *
	 * @param int $order_id Order ID.
	 *
	 * @return array           Redirect.
	 */
	public function process_payment( $order_id ) {
		$order = new WC_Order( $order_id );

		return $this->process_subscriptions_payment( $order );

	}

	/**
	 * Process the order status.
	 *
	 * @param WC_Order $order Order data.
	 * @param int $status Status ID.
	 * @param string $note Custom order note.
	 */
	abstract public function process_order_status( $order, $status, $note = '' ) ;

	/**
	 * Check return.
	 */
	public function check_return() {
		@ob_clean();

		if ( isset( $_GET['key'] ) && isset( $_GET['order'] ) ) {
			header( 'HTTP/1.1 200 OK' );

			$order_id = absint( $_GET['order'] );
			$order    = new WC_Order( $order_id );

			if ( $order->get_order_key() == $_GET['key'] ) {
				do_action( 'woocommerce_' . $this->id . '_return', $order );
			}
		}

		wp_die( __( 'Invalid request', 'cielo-woocommerce-subscriptions' ) );
	}

	/**
	 * Return handler.
	 *
	 * @param WC_Order $order Order data.
	 */
	abstract public function return_handler( $order );

	/**
	 * Process a refund in WooCommerce 2.2 or later.
	 *
	 * @param  int $order_id
	 * @param  float $amount
	 * @param  string $reason
	 *
	 * @return bool|WP_Error True or false based on success, or a WP_Error
	 *     object.
	 */
	public function process_refund( $order_id, $amount = NULL, $reason = '' ) {
		$order = new WC_Order( $order_id );

		if ( ! $order || ! $order->get_transaction_id() ) {
			return FALSE;
		}

		$diff  = ( strtotime( $order->get_date_created() ) - strtotime( current_time( 'mysql' ) ) );
		$days  = absint( $diff / ( 60 * 60 * 24 ) );
		$limit = 120;

		if ( $limit > $days ) {
			//			$tid    = $order->get_transaction_id();
			//			$amount = wc_format_decimal( $amount );

			//TODO: change here
			$response = NULL;//$this->api->do_transaction_cancellation( $order, $tid, $order->get_id() . '-' . time(), $amount );

			// Already canceled.
			//			if ( ! empty( $response->mensagem ) ) {
			//				$order->add_order_note( __( 'Cielo',
			//						'cielo-woocommerce-subscriptions' ) . ': ' . sanitize_text_field( $response->mensagem ) );
			//
			//				return new WP_Error( 'cielo_refund_error',
			//					sanitize_text_field( $response->mensagem ) );
			//			} else {
			//				if ( isset( $response->cancelamentos->cancelamento ) ) {
			//					$order->add_order_note( sprintf( __( 'Cielo: %s - Refunded amount: %s.',
			//						'cielo-woocommerce-subscriptions' ),
			//						sanitize_text_field( $response->cancelamentos->cancelamento->mensagem ),
			//						wc_price( $response->cancelamentos->cancelamento->valor / 100 ) ) );
			//				}
			//
			//				return TRUE;
			//			}
			return TRUE;
			//TODO: end change here
		} else {
			return new WP_Error( 'cielo_refund_error',
				sprintf( __( 'This transaction has been made ​​more than %s days and therefore it can not be canceled',
					'cielo-woocommerce-subscriptions' ), $limit ) );
		}
	}

	/**
	 * Thank you page message.
	 *
	 * @param $order_id
	 */
	public function thankyou_page( $order_id ) {
		$order     = new WC_Order( $order_id );
		$order_url = $order->get_view_order_url();

		if ( $order->get_status() == 'processing' || $order->get_status() == 'completed' ) {
			echo '<div class="woocommerce-message">'. sprintf( __( 'Your payment has been received successfully.',
					'cielo-woocommerce-subscriptions' ),
					wc_price( $order->get_total() ) ) . '<br />' . __( 'The authorization code was generated.',
					'cielo-woocommerce-subscriptions' ) . '</div>';
		} else {
			echo '<div class="woocommerce-info">' . sprintf( __( 'For more information or questions regarding your order, go to the %s.',
					'cielo-woocommerce-subscriptions' ),
					'<a href="' . esc_url( $order_url ) . '">' . __( 'order details page',
						'cielo-woocommerce-subscriptions' ) . '</a>' ) . '</div>';
		}
	}
}
