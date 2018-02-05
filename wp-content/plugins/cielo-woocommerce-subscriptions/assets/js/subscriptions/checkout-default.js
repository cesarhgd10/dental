(function( $ ) {
	'use strict';

	$( function() {
		// Store the installment options.
		$.data( document.body, 'cielo_subscriptions_installments', $( '#cielo-subscriptions-payment-form #cielo-installments' ).html() );

		/**
		 * Set the installment fields.
		 *
		 * @param {string} card
		 */
		function setInstallmentsFields( card ) {
			var installments = $( '#cielo-subscriptions-payment-form #cielo-installments' );

			$( '#cielo-subscriptions-payment-form #cielo-installments' ).empty();
			$( '#cielo-subscriptions-payment-form #cielo-installments' ).prepend( $.data( document.body, 'cielo_subscriptions_installments' ) );

			if ( 'discover' === card ) {
				$( 'option', installments ).not( '.cielo-at-sight' ).remove();
			}
		}

		// Set on update the checkout fields.
		$( 'body' ).on( 'ajaxComplete', function() {
			$.data( document.body, 'cielo_subscriptions_installments', $( '#cielo-subscriptions-payment-form #cielo-installments' ).html() );
			setInstallmentsFields( $( 'body #cielo-subscriptions-payment-form #cielo-card-brand option' ).first().val() );
		});

		// Set on change the card brand.
		$( 'body' ).on( 'change', '#cielo-subscriptions-payment-form #cielo-card-brand', function() {
			setInstallmentsFields( $( ':selected', $( this ) ).val() );
		});
	});

}( jQuery ));
