<?php
/**
 * Plugin Name: Cielo WooCommerce Subscriptions - Solução Webservice
 *
 * @package WC_Cielo_Subscriptions
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WC_Cielo_Subscriptions' ) ) :

	/**
	 * WooCommerce WC_Cielo_Subscriptions main class.
	 */
	class WC_Cielo_Subscriptions {

		/**
		 * Plugin version.
		 *
		 * @var string
		 */
		const VERSION = '0.1';

		/**
		 * Instance of this class.
		 *
		 * @var object
		 */
		protected static $instance = NULL;

		/**
		 * Initialize the plugin public actions.
		 */
		private function __construct() {
			// Load plugin text domain.
			add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

			// Checks with WooCommerce and WooCommerce is installed.
			if ( class_exists( 'WC_Payment_Gateway' ) && defined( 'WC_VERSION' ) && version_compare( WC_VERSION,
					'2.2.11', '>' ) ) {

				$this->includes();

				// Add the gateway.
				add_filter( 'woocommerce_payment_gateways',
					array( $this, 'add_gateway' ) );
				add_action( 'wp_enqueue_scripts',
					array( $this, 'register_scripts' ) );

				// Limit subscription periods that can be used
				add_filter( 'woocommerce_subscription_periods', array( $this, 'set_subscrition_periods' ) );

				add_filter('woocommerce_available_payment_gateways', array($this, 'exclude_gateway_from_non_subscription') );

				// Admin actions.
				if ( is_admin() ) {
					add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ),
						array( $this, 'plugin_action_links' ) );
				}
			} else {
				add_action( 'admin_notices',
					array( $this, 'woocommerce_missing_notice' ) );
			}
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

		/**
		 * Get templates path.
		 *
		 * @return string
		 */
		public static function get_templates_path() {
			return plugin_dir_path( __FILE__ ) . 'templates/';
		}

		/**
		 * Load the plugin text domain for translation.
		 */
		public function load_plugin_textdomain() {
			load_plugin_textdomain( 'cielo-woocommerce-subscriptions', FALSE,
				dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		}

		/**
		 * Includes.
		 */
		private function includes() {
			include_once dirname( __FILE__ ) . '/vendor/autoload.php';
			include_once dirname( __FILE__ ) . '/includes/admin/class-wc-cielo-subscriptions-admin-meta-boxes.php';
			include_once dirname( __FILE__ ) . '/includes/class-wc-cielo-subscriptions-helper.php';
			include_once dirname( __FILE__ ) . '/includes/class-wc-cielo-subscriptions-gateway.php';
      include_once dirname( __FILE__ ) . '/includes/class-wc-cielo-credit-gateway.php';
			include_once dirname( __FILE__ ) . '/includes/class-export-xls.php';
			include_once dirname( __FILE__ ) . '/includes/class-export-subscriptions-helper.php';
			include_once dirname( __FILE__ ) . '/includes/class-export-users-helper.php';
		}

		/**
		 * Add the gateway to WooCommerce.
		 *cr
		 *
		 * @param   array $methods WooCommerce payment methods.
		 *
		 * @return  array          Payment methods with Cielo.
		 */
		public function add_gateway( $methods ) {
			array_push( $methods, 'WC_Cielo_Subscriptions_Gateway' );
      array_push( $methods, 'WC_Cielo_Credit_Card_Gateway' );

			return $methods;
		}


		/**
		 * Register scripts.
		 */
		public function register_scripts() {
			//Commented for future use
			$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

			// Styles.
			wp_register_style( 'wc-cielo-subscriptions-checkout-icons',
				plugins_url( 'assets/css/checkout-icons' . $suffix . '.css',
					__FILE__ ), array(), WC_Cielo_Subscriptions::VERSION );
			wp_register_style( 'wc-cielo-subscriptions-checkout-webservice',
				plugins_url( 'assets/css/checkout-webservice' . $suffix . '.css',
					__FILE__ ), array(), WC_Cielo_Subscriptions::VERSION );
		}

		/**
		 * WooCommerce fallback notice.
		 *
		 * @return string
		 */
		public function woocommerce_missing_notice() {
			include_once dirname( __FILE__ ) . '/includes/views/notices/html-notice-woocommerce-missing.php';
		}

		/**
		 * Action links.
		 *
		 * @param  array $links
		 *
		 * @return array
		 */
		public function plugin_action_links( $links ) {
			$plugin_links = array();

			if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '2.1',
					'>=' ) ) {
				$plugin_links[] = '<a href="' . esc_url( admin_url( 'admin.php?page=wc-settings&tab=checkout&section=cielo_subscriptions' ) ) . '">' . __( 'Subscriptions Settings',
						'cielo-woocommerce-subscriptions' ) . '</a>';
			} else {
				$plugin_links[] = '<a href="' . esc_url( admin_url( 'admin.php?page=wc-settings&tab=checkout&section=wc_cielo_subscriptions_gateway' ) ) . '">' . __( 'Subscriptions Settings',
						'cielo-woocommerce-subscriptions' ) . '</a>';
			}

			return array_merge( $plugin_links, $links );
		}

		/**
		 * @param $subscription_periods
		 *
		 * @return mixed
		 */
		public function set_subscrition_periods($subscription_periods) {
			//TODO: allow other intervals
			foreach ($subscription_periods as $period_key => $period_labels) {
				if($period_key != 'month') {
					unset($subscription_periods[$period_key]);
				}
			}
			return $subscription_periods;
		}

		function exclude_gateway_from_non_subscription($available_gateways) {
			$wc = WC();

			/*checking all cart products*/
			if (is_checkout() && $wc->cart->get_cart_contents_count()) {
				$items = $wc->cart->get_cart();
				if (is_array($items)) {
					foreach ($items as $item) {
						$product = $item['data'];

						if(! $product->is_type('subscription')){
							if(isset($available_gateways['cielo_subscriptions'])){
								unset($available_gateways['cielo_subscriptions']);
							}
						}
					}
				}
			}
			return $available_gateways;
		}


	}

	add_action( 'plugins_loaded',
		array( 'WC_Cielo_Subscriptions', 'get_instance' ), 0 );
endif;

function wccs_write_log( $log ) {
  if ( is_array( $log ) || is_object( $log ) ) {
    error_log( print_r( $log, true ) );
  } else {
    error_log( $log );
  }
}
