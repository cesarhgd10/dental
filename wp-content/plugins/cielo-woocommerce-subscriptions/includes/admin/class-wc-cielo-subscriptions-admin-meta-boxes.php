<?php
/**
 * WC Cielo Subscriptions Admin Meta Boxes
 *
 * Sets up the write panels used by the subscription custom order/post type
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * WC_Admin_Meta_Boxes
 */
class WC_Cielo_Subscriptions_Admin_Meta_Boxes {

	/**
	 * Constructor
	 */
	public function __construct() {

		add_filter( 'woocommerce_order_actions', __CLASS__ . '::add_subscription_actions', 10, 1 );

		add_action( 'woocommerce_order_action_wc_cielo_subscriptions_cancel_subscription', __CLASS__ .  '::cancel_subscription', 10, 1 );
	}


	/**
	 * Adds actions to the admin edit subscriptions page, if the subscription hasn't ended and the payment method supports them.
	 *
	 * @param array $actions An array of available actions
	 * @return array An array of updated actions
	 * @since 2.0
	 */
	public static function add_subscription_actions( $actions ) {
		global $theorder;

		if ( wcs_is_subscription( $theorder ) ) {
			$actions['wc_cielo_subscriptions_cancel_subscription'] = esc_html__( 'Cancel Subscription', 'cielo-woocommerce-subscriptions' );
		}

		return $actions;
	}


	/**
	 * Cancels the subscription on the gateway
	 *
	 * @param array $subscription
	 * @since 2.0
	 */
	public static function cancel_subscription( $subscription ) {

		do_action('wc_cielo_subscriptions_subscription_cancelled', $subscription);

	}


}

new WC_Cielo_Subscriptions_Admin_Meta_Boxes();