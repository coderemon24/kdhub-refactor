<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Pixwell_WPRM', false ) ) {
	class Pixwell_WPRM {

		private static $instance;

		public static function get_instance() {

			if ( self::$instance === null ) {
				return new self();
			}

			return self::$instance;
		}

		public function __construct() {

			if ( ! pixwell_get_option( 'wprm_supported' ) ) {
				return;
			}

			add_filter( 'wprm_load_pinit', '__return_false', 9999 );
			add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_style' ], 10 );
			remove_action( 'wp_head', [ 'WPRM_Template_Manager', 'head_css' ] );
			remove_action( 'wp_footer', [ 'WPRM_Template_Manager', 'templates_css' ], 99 );
		}

		function remove_css_action() {

		}

		function enqueue_style() {

			$path = 'wprm.css';
			if ( is_rtl() ) {
				$path = 'wprm-rtl.css';
			}

			wp_register_style( 'pixwell-wprm', PIXWELL_CORE_URL . 'assets/' . $path, [], PIXWELL_CORE_VERSION, 'all' );
			wp_enqueue_style( 'pixwell-wprm' );
		}
	}
}

