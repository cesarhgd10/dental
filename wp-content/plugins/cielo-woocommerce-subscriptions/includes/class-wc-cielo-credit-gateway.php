<?php
/**
 * WC Cielo Credit Gateway Class.
 *
 * Built the Cielo Credit methods.
 */

use Cielo\API30\Merchant;

use Cielo\API30\Ecommerce\Environment;
use Cielo\API30\Ecommerce\Sale;
use Cielo\API30\Ecommerce\CieloEcommerce;
use Cielo\API30\Ecommerce\Payment;

use Cielo\API30\Ecommerce\Request\CieloRequestException;

class WC_Cielo_Credit_Card_Gateway extends WC_Cielo_Subscriptions_Helper {

	protected $debug;
	protected $authorization;
	protected $methods;
	protected $merchant_key;
	protected $merchant_id;
	protected $environment;
	protected $log;


	/**
	 * Gateway actions.
	 */
	public function __construct() {
		$this->id           = 'cielo_credit_card';
		$this->icon         = apply_filters( 'wc_cielo_subscriptions_icon',
			'' );
		$this->has_fields   = TRUE;
		$this->method_title = __( 'Cielo - Credit Card',
			'cielo-woocommerce-subscriptions' );
		$this->supports     = array( 'products', 'refunds' );

		// Load the form fields.
		$this->init_form_fields();

		// Load the settings.
		$this->init_settings();

		// Define user set variables.
		$this->title         = $this->get_option( 'title' );
		$this->description   = $this->get_option( 'description' );
		$this->environment   = $this->get_option( 'environment' );
		$this->merchant_id   = $this->get_option( 'merchant_id' );
		$this->merchant_key  = $this->get_option( 'merchant_key' );
		$this->methods       = $this->get_option( 'methods' );
		$this->authorization = $this->get_option( 'authorization' );
		$this->debug         = $this->get_option( 'debug' );

		// Active logs.
		if ( 'yes' == $this->debug ) {
			$this->log = $this->get_logger();
		}

		// Actions.
		add_action( 'woocommerce_update_options_payment_gateways_' . $this->id,
			array( $this, 'process_admin_options' ) );
		add_action( 'woocommerce_api_wc_cielo_credit_card_gateway',
			array( $this, 'check_return' ) );
		add_action( 'woocommerce_' . $this->id . '_return',
			array( $this, 'return_handler' ) );
		add_action( 'woocommerce_thankyou_' . $this->id,
			array( $this, 'thankyou_page' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'checkout_scripts' ) );

//		add_action( 'wc_cielo_subscriptions_subscription_cancelled', array( $this, 'subscription_cancelled' ) );
//
//		add_action( "scheduled_subscription_payment_cielo_subscriptions", array( $this, 'scheduled_subscription_payment' ) );

		// Filters.
		add_filter( 'woocommerce_get_order_item_totals',
			array( $this, 'order_items_payment_details' ), 10, 2 );

  }

	/**
	 * Initialise Gateway Settings Form Fields
	 */
	public function init_form_fields() {
		$this->form_fields = array(
			'enabled'       => array(
				'title'   => __( 'Enable/Disable',
					'cielo-woocommerce-subscriptions' ),
				'type'    => 'checkbox',
				'label'   => __( 'Enable Cielo Credit Card',
					'cielo-woocommerce-subscriptions' ),
				'default' => 'yes',
			),
			'title'         => array(
				'title'       => __( 'Title',
					'cielo-woocommerce-subscriptions' ),
				'type'        => 'text',
				'description' => __( 'This controls the title which the user sees during checkout.',
					'cielo-woocommerce-subscriptions' ),
				'desc_tip'    => TRUE,
				'default'     => __( 'Cielo Credit Card',
					'cielo-woocommerce-subscriptions' ),
			),
			'description'   => array(
				'title'       => __( 'Description',
					'cielo-woocommerce-subscriptions' ),
				'type'        => 'textarea',
				'description' => __( 'This controls the description which the user sees during checkout.',
					'cielo-woocommerce-subscriptions' ),
				'desc_tip'    => TRUE,
				'default'     => __( 'Pay using the secure method of Cielo for Credit Card',
					'cielo-woocommerce-subscriptions' ),
			),
			'environment'   => array(
				'title'       => __( 'Environment',
					'cielo-woocommerce-subscriptions' ),
				'type'        => 'select',
				'description' => __( 'Select the environment type (test or production).',
					'cielo-woocommerce-subscriptions' ),
				'desc_tip'    => TRUE,
				'class'       => 'wc-enhanced-select',
				'default'     => 'test',
				'options'     => array(
					'test'       => __( 'Test',
						'cielo-woocommerce-subscriptions' ),
					'production' => __( 'Production',
						'cielo-woocommerce-subscriptions' ),
				),
			),
			'merchant_id'   => array(
				'title'       => __( 'Merchant Id',
					'cielo-woocommerce-subscriptions' ),
				'type'        => 'text',
				'description' => __( 'Merchant Id with Cielo.',
					'cielo-woocommerce-subscriptions' ),
				'desc_tip'    => TRUE,
				'default'     => '',
			),
			'merchant_key'  => array(
				'title'       => __( 'Merchant Key',
					'cielo-woocommerce-subscriptions' ),
				'type'        => 'text',
				'description' => __( 'Merchant key assigned by Cielo.',
					'cielo-woocommerce-subscriptions' ),
				'desc_tip'    => TRUE,
				'default'     => '',
			),
			'methods'       => array(
				'title'       => __( 'Accepted Card Brands',
					'cielo-woocommerce-subscriptions' ),
				'type'        => 'multiselect',
				'description' => __( 'Select the card brands that will be accepted as payment. Press the Ctrl key to select more than one brand.',
					'cielo-woocommerce-subscriptions' ),
				'desc_tip'    => TRUE,
				'class'       => 'wc-enhanced-select',
				'default'     => array( 'visa', 'mastercard' ),
				'options'     => array(
					'visa'       => __( 'Visa',
						'cielo-woocommerce-subscriptions' ),
					'mastercard' => __( 'MasterCard',
						'cielo-woocommerce-subscriptions' ),
					'diners'     => __( 'Diners',
						'cielo-woocommerce-subscriptions' ),
					'discover'   => __( 'Discover',
						'cielo-woocommerce-subscriptions' ),
					'elo'        => __( 'Elo',
						'cielo-woocommerce-subscriptions' ),
					'amex'       => __( 'American Express',
						'cielo-woocommerce-subscriptions' ),
					'jcb'        => __( 'JCB',
						'cielo-woocommerce-subscriptions' ),
					'aura'       => __( 'Aura',
						'cielo-woocommerce-subscriptions' ),
				),
			),
			'authorization' => array(
				'title'       => __( 'Automatic Authorization (MasterCard and Visa only)',
					'cielo-woocommerce-subscriptions' ),
				'type'        => 'select',
				'description' => __( 'Select the authorization type.',
					'cielo-woocommerce-subscriptions' ),
				'desc_tip'    => TRUE,
				'class'       => 'wc-enhanced-select',
				'default'     => '2',
				'options'     => array(
					'3' => __( 'Direct authorization',
						'cielo-woocommerce-subscriptions' ),
					'2' => __( 'Allow authorization for authenticated transaction and non-authenticated',
						'cielo-woocommerce-subscriptions' ),
					'1' => __( 'Authorization transaction only if is authenticated',
						'cielo-woocommerce-subscriptions' ),
					'0' => __( 'Only authenticate the transaction',
						'cielo-woocommerce-subscriptions' ),
				),
			),
			'testing'       => array(
				'title'       => __( 'Gateway Testing',
					'cielo-woocommerce-subscriptions' ),
				'type'        => 'title',
				'description' => '',
			),
			'debug'         => array(
				'title'       => __( 'Debug Log',
					'cielo-woocommerce-subscriptions' ),
				'type'        => 'checkbox',
				'label'       => __( 'Enable logging',
					'cielo-woocommerce-subscriptions' ),
				'default'     => 'no',
				'description' => sprintf( __( 'Log Cielo events, such as API requests, inside %s',
					'cielo-woocommerce-subscriptions' ),
					$this->get_log_file_path() ),
			),
		);
	}

	/**
	 * Get Checkout form field.
	 *
	 */
  protected function get_checkout_form( $model = 'default', $order_total = 0 ) {
    wc_get_template(
      'credit-card/credit-card-payment-form.php',
      array(),
      'woocommerce/cielo/',
      WC_Cielo_Subscriptions::get_templates_path()
    );
  }


	/**
	 * Checkout scripts.
	 */
	public function checkout_scripts() {
		if ( ! is_checkout() ) {
			return;
		}

		if ( ! $this->is_available() ) {
			return;
		}

		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		wp_enqueue_style( 'wc-cielo-checkout-subscriptions' );
		wp_enqueue_script( 'wc-cielo-subscriptions-checkout-subscriptions',
			plugins_url( 'assets/js/subscriptions/checkout-subscriptions' . $suffix . '.js',
				plugin_dir_path( __FILE__ ) ),
			array( 'jquery', 'wc-credit-form' ),
			WC_Cielo_Subscriptions::VERSION, TRUE );
	}

	/**
	 * Process subscriptions payment.
	 *
	 * @param  WC_Order $order
	 *
	 * @return array
	 */
	protected function process_subscriptions_payment( $order ) {
		$payment_url = '';

		$card_data = $this->retrieve_card_data();

		$valid = $this->validate_input_data( $card_data );

		if ( $valid ) {

			$cielo_sale_request = $this->create_cielo_sale_request( $order, $card_data );

			if ( 'yes' == $this->debug ) {
				$this->log->add( $this->id,
					'Cielo request: ' . json_encode( $cielo_sale_request ) );
			}

			try {
				$api = $this->cielo_init_connection();

				$sale_response = $api->createSale( $cielo_sale_request );

				if ( 'yes' == $this->debug ) {
					$this->log->add( $this->id,
						'Cielo response: ' . print_r( $sale_response, TRUE ) );
				}

        // Caso $recurrent_payment_id esteja vazio, significa que houve um erro
        // ao processar o pagamento. Então vamos pegar o status code do erro e
        // imprimir na tela para notifica o usuário

        $payment_response = $sale_response->getPayment();

        $returnCode    = $payment_response->getReturnCode();

        if ( $returnCode != 1 && $returnCode != 0 && $returnCode != 4 ) {
          wc_add_notice( $this->return_error_message( $returnCode ), 'error' );
          return array(
            'result' => 'fail',
            'redirect' => ''
          );
        }

				$this->update_transaction_data( $order, $sale_response );

				// Set the transaction URL.
				if ( ! $payment_url ) {
					$payment_url = str_replace( '&amp;', '&',
						urldecode( $this->get_api_return_url( $order ) ) );
        }

				return array(
					'result'   => 'success',
					'redirect' => $payment_url,
				);

			} catch ( CieloRequestException $e ) {

				$this->process_cielo_exception( $e );

				return array(
					'result'   => 'fail',
					'redirect' => '',
				);
			}
		}

		return array(
			'result'   => 'fail',
			'redirect' => '',
		);
	}

	/**
	 * Return handler.
	 *
	 * @param WC_Order $order Order data.
	 */
	public function return_handler( $order ) {

		$payment_id = get_post_meta( $order->get_id(),
			'_payment_id', TRUE );

		$tid = get_post_meta( $order->get_id(),
			'_transaction_id', TRUE );

		$this->log->add( $this->id,
			'payment id: ' . $payment_id );
		$this->log->add( $this->id,
			'order id: ' . $order->get_id() );


		if ( '' != $payment_id ) {

			try {
				$api = $this->cielo_init_connection();

				$sale = $api->getSale( $payment_id );

				$payment = $sale->getPayment();

				// Update the order status.
				$status = $payment->getStatus();

				if ( 'yes' == $this->debug ) {
					$this->log->add( $this->id,
						'Cielo payment status: ' . $status );
					$this->log->add( $this->id,
						'Cielo recurrent payment: ' . print_r( $payment,
							TRUE ) );
				}

				$this->process_order_status( $order, $status );

				$return_url = $this->get_return_url( $order );

				// Order cancelled.
				if ( 1 != $status ) {
					$message = __( 'Order canceled successfully.',
						'cielo-woocommerce-subscriptions' );
					wc_add_notice( $message );

					$return_url = get_permalink( wc_get_page_id( 'shop' ) );
				}

			} catch
			( CieloRequestException $e ) {
				// Em caso de erros de integração, podemos tratar o erro aqui.
				// os códigos de erro estão todos disponíveis no manual de integração.
				$this->process_cielo_exception( $e );

				$return_url = get_permalink( wc_get_page_id( 'cart' ) );
			}


		} else {
			$return_url = get_permalink( wc_get_page_id( 'cart' ) );
		}

		wp_redirect( esc_url_raw( $return_url ) );
		exit;
	}

	/*
	 * Process the order status.
	 *
	 * @param WC_Order $order Order data.
	 * @param int $status Status ID.
	 * @param string $note Custom order note.
	 */
	public function process_order_status( $order, $status, $note = '' ) {
		$status_note = __( 'Cielo',
				'cielo-woocommerce-subscriptions' ) . ': ' . $this->get_status_name( $status );

		// Order cancelled.
		if ( 9 == $status ) {
			$order->update_status( 'cancelled', $status_note );

			// Order failed.
		} elseif ( ( 1 != $status && 4 != $status && 6 != $status ) || - 1 == $status ) {
			$order->update_status( 'failed', $status_note );

			// Order paid.
		} else {
			$order->add_order_note( $status_note . '. ' . $note );

			// Complete the payment and reduce stock levels.
			$order->payment_complete();
		}
	}


	/**
	 * Payment details.
	 *
	 * @param  array $items
	 * @param  WC_Order $order
	 *
	 * @return array
	 */
	public
	function order_items_payment_details(
		$items,
		$order
	) {
		if ( $this->id === $order->get_payment_method() ) {
			$card_brand = get_post_meta( $order->get_id(),
				'_wc_cielo_subscriptions_card_brand', TRUE );
			$card_brand = $this->get_payment_method_name( $card_brand );

			$items['payment_method']['value'] .= '<br />';
			$items['payment_method']['value'] .= '<small>';
			$items['payment_method']['value'] .= sprintf( __( '%s in %s.',
				'cielo-woocommerce-subscriptions' ), esc_attr( $card_brand ), $order->get_total() );
			$items['payment_method']['value'] .= '</small>';
		}

		return $items;
	}

	/**
	 * Init and create object to handle Cielo Requests
	 *
	 * @return \Cielo\API30\Ecommerce\CieloEcommerce
	 */
	protected function cielo_init_connection() {
		$environment = ( 'test' == $this->environment ) ? Environment::sandbox() : Environment::production();
		$merchant    = new Merchant( $this->merchant_id, $this->merchant_key );

		return new CieloEcommerce( $merchant, $environment );
	}


	/**
	 * Formats the order total to be sent to Cielo (value in cents)
	 *
	 * @param  WC_Order $order
	 *
	 * @return float
	 */
	protected function get_formatted_order_total(
		$order
	) {
		return $order ? $order->get_total() * 100 : 0;
	}

	/**
	 * Formats the expiration date to be sent to Cielo (whitout blank spaces)
	 *
	 * @param  string $date
	 *
	 * @return string
	 */
	protected function get_formatted_expiration_date(
		$date = ''
	) {
		return str_replace( ' ', '', $date );
	}

	/**
	 * Formats the card number to be sent to Cielo (whitout blank spaces)
	 *
	 * @param string $card_number
	 *
	 * @return string
	 */
	protected function get_formatted_card_number(
		$card_number = ''
	) {
		return str_replace( ' ', '', $card_number );
	}

	/**
	 * Validates user card input data
	 *
	 * @param $card_data
	 *
	 * @return bool
	 */
	protected function validate_input_data( $card_data ) {
		// Validate credit card brand.
		$valid = $this->validate_credit_brand( $card_data['sanitized_card_brand'] );

		// Test the card fields.
		if ( $valid ) {
			$valid = $this->validate_card_fields( $_POST );
		}

		return $valid;
	}

	/**
	 * Process and retrieve card data from user input
	 *
	 * @return array
	 */
	protected function retrieve_card_data() {
		$sanitized_card_number     = isset( $_POST['cielo_credit_card_number'] ) ? sanitize_text_field( $_POST['cielo_credit_card_number'] ) : '';
		$sanitized_card_brand      = $this->get_card_brand( $sanitized_card_number );
		$sanitized_card_brand_name = $this->get_payment_method_name( $sanitized_card_brand );

		$card_data = array(
			'name_on_card'              => $_POST['cielo_credit_card_holder_name'],
			'card_number'               => $_POST['cielo_credit_card_number'],
			'card_expiration'           => $_POST['cielo_credit_card_expiry'],
			'card_cvv'                  => $_POST['cielo_credit_card_cvc'],
			'sanitized_card_number'     => $sanitized_card_number,
			'sanitized_card_brand'      => $sanitized_card_brand,
			'sanitized_card_brand_name' => $sanitized_card_brand_name,
		);

		return $card_data;
	}

	/**
	 * Creates and populates a sale request to be made to Cielo
	 *
	 * @param $order
	 * @param $card_data
	 *
	 * @return \Cielo\API30\Ecommerce\Sale
	 */
	protected function create_cielo_sale_request( $order, $card_data ) {
		$expiration_date = $this->get_formatted_expiration_date( $card_data['card_expiration'] );
		$card_number     = $this->get_formatted_card_number( $card_data['card_number'] );

		$merchant_order_id = $order->get_id();
		$amount            = $this->get_formatted_order_total( $order );
		$customer_name     = $order->get_formatted_billing_full_name();

		// Crie uma instância de Sale informando o ID do pagamento
    $sale_request = new Sale( $merchant_order_id );
		$sale_request->customer( $customer_name );

		// Crie uma instância de Payment informando o valor do pagamento
    $payment_request = $sale_request->payment( $amount );

		// Crie uma instância de Credit Card utilizando os dados de teste
		// esses dados estão disponíveis no manual de integração
		$payment_request->setType( Payment::PAYMENTTYPE_CREDITCARD )
		                ->creditCard( $card_data['card_cvv'], $card_data['sanitized_card_brand_name'] )
		                ->setExpirationDate( $expiration_date )
		                ->setCardNumber( $card_number )
		                ->setHolder( $card_data['name_on_card'] );

		$sale_request->setPayment( $payment_request );

		return $sale_request;
	}

	/**
	 * Save some transaction data after response
	 *
	 * @param \WC_Order $order
	 * @param \Cielo\API30\Ecommerce\Sale $sale_response
	 */
	protected function update_transaction_data( $order, $sale_response ) {

		$order_id = $order->get_id();

		$payment_response = $sale_response->getPayment();

		// Save order note
		$order->add_order_note( $payment_response->getReturnMessage() );

		// Save the tid.
		if ( $tid = $payment_response->getTid() ) {
			update_post_meta( $order_id, '_transaction_id',
				(string) $tid );
		}

		// Save the payment id.
		if ( $payment_id = $payment_response->getPaymentId() ) {
			update_post_meta( $order_id, '_payment_id',
				(string) $payment_id );
		}

		// Set the transaction URL.
		if ( $authentication_url = $payment_response->getAuthenticationUrl() ) {
			$payment_url = (string) $authentication_url;
		}
	}

	/**
	 * @param \Cielo\API30\Ecommerce\Request\CieloRequestException $e
	 */
	protected function process_cielo_exception( CieloRequestException $e ) {
		$error = $e->getCieloError() ?: $e->getMessage();

		if ( 'yes' == $this->debug ) {
			$this->log->add( $this->id,
				'Cielo Error: ' . print_r( $e, TRUE ) );
		}

		$this->add_error( (string) $error );
	}

  public function return_error_message( $error_code ) {
    $status = array(
      2  => _x( 'Transação não autorizada', 'Transaction Status',
        'cielo-woocommerce-subscriptions' ),
      57  => _x( 'Cartão expirado', 'Transaction Status',
        'cielo-woocommerce-subscriptions' ),
      70  => _x( 'Problemas com o Cartão de Crédito', 'Transaction Status',
        'cielo-woocommerce-subscriptions' ),
      77  => _x( 'Cartão cancelado', 'Transaction Status',
        'cielo-woocommerce-subscriptions' ),
      78  => _x( 'Cartão bloqueado', 'Transaction Status',
        'cielo-woocommerce-subscriptions' ),
      99  => _x( 'A Transação expirou. Tente novamente.', 'Transaction Status',
        'cielo-woocommerce-subscriptions' ),
    );

    if ( isset( $status[ $error_code ] ) ) {
      return $status[ $error_code ];
    }

    return _x( 'A Transação falhou. Tente novamente ou entre em contato conosco.', 'Transaction Status',
      'cielo-woocommerce-subscriptions' );
  }
}
