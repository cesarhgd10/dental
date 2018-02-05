<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * @package Dental-Helpers
 * Plugin Name: Dental Helpers
 * Description: Plugin para gerenciamento de Custom Post Types
 * Version: 1.0
 * Author: Evolvere
 * Author URI: http://www.evolveredigital.com.br
 */


if ( ! class_exists( 'Dental_Helpers' ) ) {

	class Dental_Helpers {

		public function __construct() {

			/* Set the constants needed by the plugin. */
			add_action( 'plugins_loaded', array( $this, 'constants' ), 1 );

			/* Load the functions files. */
			add_action( 'plugins_loaded', array( $this, 'includes' ), 3 );
		}

		/**
		 * Defines constants used by the plugin.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public function constants() {

			/* Set constant path to the plugin directory. */
			define( 'DENTAL_HELPERS_CPT_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );

			/* Set the constant path to the plugin directory URI. */
			define( 'DENTAL_HELPERS_CPT_DIR_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );

			/* Set the constant path to the post types directory. */
			define( 'DENTAL_HELPERS_CPT_POST_TYPES', DENTAL_HELPERS_CPT_DIR . 'post-types' );

			/* Set the constant path to the custom fields directory. */
			define( 'DENTAL_HELPERS_CPT_CUSTOM_FIELDS', DENTAL_HELPERS_CPT_DIR . 'custom-fields' );

			/* Set the constant path to the helpers directory. */
			define( 'DENTAL_HELPERS_CPT_HELPERS', DENTAL_HELPERS_CPT_DIR . 'helpers' );

			define( 'DENTAL_HELPERS_CPT_EVENTS', DENTAL_HELPERS_CPT_DIR . 'events' );

		}

		/**
		 * Loads custom post types and custom fields
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public function includes() {

			/* Loads the plugin helpers */
			require_once( DENTAL_HELPERS_CPT_HELPERS . '/PostHelper.php' );
			require_once( DENTAL_HELPERS_CPT_HELPERS . '/TaxonomyHelper.php' );
			require_once( DENTAL_HELPERS_CPT_HELPERS . '/ProductHelper.php' );

			/* Loads the plugin custom post type. */
			require_once( DENTAL_HELPERS_CPT_POST_TYPES . '/cpt-clinica.php' );

			/* Loads the plugin custom fields */
		}
	}

	new Dental_Helpers();
}
