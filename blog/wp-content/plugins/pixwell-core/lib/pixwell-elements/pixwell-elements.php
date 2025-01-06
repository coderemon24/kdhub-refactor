<?php
/**
 * Plugin Name:       Pixwell Elements
 * Description:       Necessary elements for news/magazine websites.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           10.7
 * Author:            Theme-Ruby
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       pixwell-elements
 *
 * @package           create-block
 */

/** Don't load directly */
defined( 'ABSPATH' ) || exit;

include_once( plugin_dir_path( __FILE__ ) . 'includes/helper.php' );
include_once( plugin_dir_path( __FILE__ ) . 'includes/download.php' );
include_once( plugin_dir_path( __FILE__ ) . 'includes/accordion.php' );
include_once( plugin_dir_path( __FILE__ ) . 'includes/review.php' );
include_once( plugin_dir_path( __FILE__ ) . 'includes/list-style.php' );

if ( ! class_exists( 'Pixwell_Post_Elements', false ) ) {
	class Pixwell_Post_Elements {

		private static $instance;
		public $settings = [];

		public static function get_instance() {

			if ( self::$instance === null ) {
				return new self();
			}

			return self::$instance;
		}

		public function __construct() {

			self::$instance = $this;
			add_action( 'init', [ $this, 'block_init' ] );
			add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );
			add_action( 'enqueue_block_editor_assets', [ $this, 'editor_enqueue' ] );
			add_action( 'plugins_loaded', [ $this, 'register_mc4wp_integration' ], 91 );
		}

		function enqueue() {

			$stylesheet_path = 'public/style.css';
			if ( is_rtl() ) {
				$stylesheet_path = 'public/style-rtl.css';
			}

			wp_enqueue_style( 'pixwell-elements', plugin_dir_url( __FILE__ ) . $stylesheet_path, [], '1.0', 'all' );
		}

		function editor_enqueue() {

			$stylesheet_path = 'public/style.css';
			if ( is_rtl() ) {
				$stylesheet_path = 'public/style-rtl.css';
			}

			wp_enqueue_style( 'pixwell-elements', plugin_dir_url( __FILE__ ) . $stylesheet_path, [], filemtime( plugin_dir_path( __FILE__ ) . $stylesheet_path ), 'all' );
		}

		function block_init() {

			register_block_type_from_metadata( __DIR__ . '/build/note' );
			register_block_type_from_metadata( __DIR__ . '/build/list-style', [
				'render_callback' => 'pixwell_render_list_style',
			] );
			register_block_type_from_metadata( __DIR__ . '/build/affiliate-product' );
			register_block_type_from_metadata( __DIR__ . '/build/affiliate-list' );
			register_block_type_from_metadata( __DIR__ . '/build/affiliate-list-item' );
			register_block_type_from_metadata( __DIR__ . '/build/accordion' );
			register_block_type_from_metadata( __DIR__ . '/build/accordion-item', [
				'render_callback' => 'pixwell_accordion_item',
			] );
			register_block_type_from_metadata( __DIR__ . '/build/highlight' );
			register_block_type_from_metadata( __DIR__ . '/build/download', [
				'render_callback' => 'pixwell_email_to_download',
			] );
			register_block_type_from_metadata( __DIR__ . '/build/review', [
				'render_callback' => 'pixwell_render_block_review',
			] );
		}

		function register_mc4wp_integration() {

			if ( function_exists( 'mc4wp_register_integration' ) ) {
				include_once( plugin_dir_path( __FILE__ ) . 'includes/integration.php' );
				mc4wp_register_integration( 'pixwell', 'Pixwell_MC4WP_Integration', true );
			}
		}

	}
}

Pixwell_Post_Elements::get_instance();