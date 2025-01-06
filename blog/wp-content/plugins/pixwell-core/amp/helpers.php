<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Pixwell_AMP' ) ) {
	class Pixwell_AMP {

		protected static $instance = null;

		static function get_instance() {

			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		function __construct() {

			include_once PIXWELL_CORE_PATH . 'amp/parts/parts.php';
			include_once PIXWELL_CORE_PATH . 'amp/parts/modules.php';

			add_action( 'get_header', [ $this, 'get_amp_header' ], 9999 );
			add_action( 'get_footer', [ $this, 'get_amp_footer' ], 9999 );
			add_filter( 'the_content', 'pixwell_amp_add_inline_ad', 20 );
		}

		function get_amp_header() {

			if ( pixwell_is_amp() && defined( 'PIXWELL_THEME_VERSION' ) ) {
				$template = PIXWELL_CORE_PATH . 'amp/templates/header.php';
				if ( file_exists( $template ) ) {
					load_template( $template );
				}

				return;
			}
		}

		function get_amp_footer() {

			if ( pixwell_is_amp() && defined( 'PIXWELL_THEME_VERSION' ) ) {
				$template = PIXWELL_CORE_PATH . 'amp/templates/footer.php';
				if ( file_exists( $template ) ) {
					load_template( $template );
				}

				return;
			}
		}
	}
}

Pixwell_AMP::get_instance();