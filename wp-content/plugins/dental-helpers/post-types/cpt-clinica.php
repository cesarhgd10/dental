<?php
/**
 * File for registering custom post types.
 *
 * @package    Dental-Helpers
 * @author     Evolvere
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if ( ! class_exists( 'CPT_Clinica' ) ) {
	class CPT_Clinica {
		public static $instance;
		// Single name of the custom post
		private $single_name = 'Clinica';
		// Plural name of the custom post
		private $plural_name = 'Clinicas';
		// Slug
		private $slug = 'clinica';

		// Setup a single instance using the singleton pattern
		public static function init() {

			if ( is_null( self::$instance ) ) {
				self::$instance = new CPT_Clinica();
			}

			return self::$instance;

		}

		function __construct() {

			add_action( 'init', array( $this, 'register_taxonomies' ), 5 );
			add_action( 'init', array( $this, 'register_post_types' ), 6 );
		}

		function register_post_types() {
			$supports   = array(
				'thumbnail',
				'title',
				'editor'
			);

			if ( post_type_exists( $this->slug ) ) {
				return;
			}
			PostHelper::create( $this->single_name, $this->plural_name, $supports, $this->slug );
		}

		function register_taxonomies() {
			// Taxonomia Clinica Category
			//TaxonomyHelper::create( 'Rota', 'Rotas', $this->slug, 'rota' );
		}
	}

	// Always calls a single instance of the Resultate Custom Post Type Class.
	CPT_Clinica::init();
}
