<?php
/**
 * Created by PhpStorm.
 * User: resultate
 * Date: 06/10/17
 * Time: 12:54
 */

class ExportSubscriptionsHelper {

	/**
	 * @var WC_Subscription
	 */
	private $subscription;

	/**
	 * @var int
	 */
	private $subscription_id;

	/**
	 * Array of subscriptions objects
	 *
	 * @var array
	 */
	private $subscriptions;

	/**
	 * @var int
	 */
	private $user_id;


	public function __construct( $user_id = 0 ) {
		$this->user_id = $user_id;

		$this->subscriptions = $this->get_user_subscriptions( $user_id );
	}

	/**
	 * @param int $user_id
	 */
	public function set_user( $user_id ) {
		$this->user_id = (int) $user_id;
	}

	/**
	 * @param WC_Subscription $subscription
	 */
	function set_subscription( $subscription ) {
		$this->subscription = $subscription;
	}

	/**
	 * @param int $subscription_id
	 */
	function set_subscription_id( $subscription_id ) {
		$this->subscription_id = $subscription_id;
	}

	function get_subscription_id() {
		return $this->subscription;
	}

	/**
	 * Return all of the user subscriptions
	 *
	 * @param $user_id
	 *
	 * @return mixed|void
	 */
	public function get_user_subscriptions( $user_id ) {
		return wcs_get_users_subscriptions( $user_id );
	}

	/**
	 * Return the last subscription
	 *
	 * @param $user_id
	 *
	 * @return WC_Subscription
	 */
	public function get_user_last_subscription( $user_id ) {
		$subscriptions        = $this->get_user_subscriptions( $user_id );
		$last_subscription    = null;
		$last_subscription_id = 0;

		if( is_array( $subscriptions ) && count( $subscriptions ) > 1 ) {
			foreach( $subscriptions as $key => $subscription ) {
				if ( $last_subscription_id < $key ) {
					$last_subscription_id = $key;
					$last_subscription = $subscription;
				}
			}
		}


		return $last_subscription;
	}

	/**
	 * Return the user's last subscription id
	 *
	 * @param $user_id
	 *
	 * @return int
	 */
	function get_user_last_subscription_id( $user_id ) {
		$subscriptions        = $this->get_user_subscriptions( $user_id );
		$last_subscription_id = 0;

		if( is_array( $subscriptions ) && count( $subscriptions ) > 1 ) {
			foreach( $subscriptions as $key => $subscription ) {
				if ( $last_subscription_id < $key ) {
					$last_subscription_id = (int) $key;
				}
			}
		}

		return $last_subscription_id;
	}
}
