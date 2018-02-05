<?php
/**
 * Admin options screen.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<h3><?php echo $this->method_title; ?></h3>

<?php
if ( 'yes' == $this->get_option( 'enabled' ) ) {
	if ( ! 'BRL' == get_woocommerce_currency() && ! class_exists( 'woocommerce_wpml' ) ) {
		include dirname( __FILE__ ) . '/notices/html-notice-currency-not-supported.php';
	}

	if ( 'test' != $this->environment && ( empty( $this->number ) || empty( $this->key ) ) ) {
		include dirname( __FILE__ ) . '/notices/html-notice-not-configured.php';
	}

	if ( 'webservice' == $this->store_contract ) {
		if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '2.2.11', '<=' ) ) {
			include dirname( __FILE__ ) . '/notices/html-notice-need-update-woocommerce.php';
		}

		if ( 'test' != $this->environment && 'no' == get_option( 'woocommerce_force_ssl_checkout' ) && ! class_exists( 'WordPressHTTPS' ) ) {
			include dirname( __FILE__ ) . '/notices/html-notice-ssl-required.php';
		}
	}
}
?>

<?php echo wpautop( $this->method_description ); ?>

<table class="form-table">
	<?php $this->generate_settings_html(); ?>
</table>
