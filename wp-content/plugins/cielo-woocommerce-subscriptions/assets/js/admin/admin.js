( function( $ ) {
	'use strict';

	$( function() {

		/**
		 * Switch the options based on the store contract.
		 */
		$( '[id^="woocommerce_cielo"][id$="store_contract"]' ).on( 'change', function() {
			var design      = $( '[id^="woocommerce_cielo"][id$="_design"]' ).closest( 'tr' ),
				designTitle = design.closest( 'table' ).prev( 'h3' );

			if ( 'webservice' === $( this ).val() ) {
				design.hide();
				designTitle.hide();
			} else {
				design.show();
				designTitle.show();
			}
		}).change();


		/**
		 * Switch the options based on installment type.
		 */
		$( '#woocommerce_cielo_subscriptions_installment_type' ).on( 'change', function() {
			var interest_rate = $( '#woocommerce_cielo_subscriptions_interest_rate' ).closest( 'tr' ),
				interest      = $( '#woocommerce_cielo_subscriptions_interest' ).closest( 'tr' );

			if ( 'store' === $( this ).val() ) {
				interest_rate.hide();
				interest.hide();
			} else {
				interest_rate.show();
				interest.show();
			}
		}).change();
	});

}( jQuery ) );
