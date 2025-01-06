<?php
/**
 * Plugin Name:    Pixwell Core
 * Plugin URI:     https://themeforest.net/user/theme-ruby/
 * Description:    Features for Pixwell, this is the required plugin (important) for this theme.
 * Version:        11.5
 * Requires at least: 6.1
 * Requires PHP:   7.4
 * Text Domain:    pixwell-core
 * Domain Path:    /languages/
 * Author:         Theme-Ruby
 * Author URI:     https://themeforest.net/user/theme-ruby/
 *
 * @package        pixwell-core
 */

defined( 'ABSPATH' ) || exit;
define( 'PIXWELL_CORE_VERSION', '11.5' );
define( 'PIXWELL_CORE_URL', plugin_dir_url( __FILE__ ) );
define( 'PIXWELL_CORE_PATH', plugin_dir_path( __FILE__ ) );

include_once PIXWELL_CORE_PATH . 'load.php';

if ( ! is_plugin_active( 'redux-framework/redux-framework.php' ) ) {
	include_once PIXWELL_CORE_PATH . 'lib/redux-framework/framework.php';
}

if ( ! class_exists( 'PIXWELL_CORE', false ) ) {
	class PIXWELL_CORE {

		private static $instance;

		public static function get_instance() {

			if ( self::$instance === null ) {
				return new self();
			}

			return self::$instance;
		}

		public function __construct() {

			self::$instance = $this;

			register_activation_hook( __FILE__, [ $this, 'activated' ] );
			add_action( 'plugins_loaded', [ $this, 'plugins_support' ], 0 );

			add_action( 'init', [ $this, 'load_components' ], 2 );
			add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_style' ], 1 );
			add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_script' ], 2 );

			add_action( 'widgets_init', [ $this, 'register_widgets' ] );
			add_action( 'init', [ $this, 'block_shortcodes' ], PHP_INT_MAX );
			add_action( 'admin_enqueue_scripts', [ $this, 'admin_enqueue' ], 10 );
			add_filter( 'user_contactmethods', [ $this, 'user_contact' ] );
			add_action( 'wp_footer', [ $this, 'footer_enqueue' ], 1 );
			add_action( 'admin_init', [ 'Ruby_RW_Taxonomy_Meta', 'get_instance' ], 1 );
		}

		function user_contact( $user ) {

			if ( ! is_array( $user ) ) {
				$user = [];
			}

			$data = [
				'job'        => esc_html__( 'Your Job Name', 'pixwell-core' ),
				'feat'       => esc_html__( 'Author Box Background (attachment Image URL)', 'pixwell-core' ),
				'facebook'   => esc_html__( 'Facebook profile URL', 'pixwell-core' ),
				'rb_twitter' => esc_html__( 'Twitter profile URL', 'pixwell-core' ),
				'instagram'  => esc_html__( 'Instagram profile URL', 'pixwell-core' ),
				'pinterest'  => esc_html__( 'Pinterest profile URL', 'pixwell-core' ),
				'linkedin'   => esc_html__( 'LinkedIn profile URL', 'pixwell-core' ),
				'tumblr'     => esc_html__( 'Tumblr profile URL', 'pixwell-core' ),
				'flickr'     => esc_html__( 'Flickr profile URL', 'pixwell-core' ),
				'skype'      => esc_html__( 'Skype profile URL', 'pixwell-core' ),
				'snapchat'   => esc_html__( 'Snapchat profile URL', 'pixwell-core' ),
				'myspace'    => esc_html__( 'Myspace profile URL', 'pixwell-core' ),
				'youtube'    => esc_html__( 'Youtube profile URL', 'pixwell-core' ),
				'bloglovin'  => esc_html__( 'Bloglovin profile URL', 'pixwell-core' ),
				'digg'       => esc_html__( 'Digg profile URL', 'pixwell-core' ),
				'dribbble'   => esc_html__( 'Dribbble profile URL', 'pixwell-core' ),
				'soundcloud' => esc_html__( 'Soundcloud profile URL', 'pixwell-core' ),
				'vimeo'      => esc_html__( 'Vimeo profile URL', 'pixwell-core' ),
				'reddit'     => esc_html__( 'Reddit profile URL', 'pixwell-core' ),
				'vkontakte'  => esc_html__( 'Vkontakte profile URL', 'pixwell-core' ),
				'telegram'   => esc_html__( 'Telegram profile URL', 'pixwell-core' ),
				'whatsapp'   => esc_html__( 'Whatsapp profile URL', 'pixwell-core' ),
				'rss'        => esc_html__( 'Rss', 'pixwell-core' ),
			];

			$user = array_merge( $user, $data );

			return $user;
		}

		function plugins_support() {

			$this->translation();

			if ( class_exists( 'SimpleWpMembership' ) ) {
				Pixwell_Membership::get_instance();
			}
			if ( class_exists( 'WP_Recipe_Maker' ) ) {
				Pixwell_WPRM::get_instance();
			}
		}

		function translation() {

			$loaded = load_plugin_textdomain( 'pixwell-core', false, PIXWELL_CORE_PATH . 'languages/' );
			if ( ! $loaded ) {
				$locale = apply_filters( 'plugin_locale', get_locale(), 'pixwell-core' );
				$mofile = PIXWELL_CORE_PATH . 'languages/pixwell-core-' . $locale . '.mo';
				load_textdomain( 'pixwell-core', $mofile );
			}
		}

		function load_components() {

			Pixwell_Table_Contents::get_instance();
			Ruby_GTM_Integration::get_instance();
		}

		public function register_widgets() {

			register_widget( 'pixwell_widget_youtube_subscribe' );
			register_widget( 'pixwell_widget_facebook' );
			register_widget( 'pixwell_widget_social_icon' );
			register_widget( 'pixwell_widget_sb_instagram' );
			register_widget( 'pixwell_widget_sb_flickr' );
			register_widget( 'pixwell_widget_sb_post' );
			register_widget( 'pixwell_widget_advertising' );
			register_widget( 'pixwell_widget_follower' );
			register_widget( 'pixwell_widget_newsletter' );
			register_widget( 'pixwell_widget_banner' );
			register_widget( 'pixwell_widget_header_strip' );
			register_widget( 'pixwell_widget_address' );
			register_widget( 'pixwell_widget_fw_instagram' );
			register_widget( 'pixwell_widget_mc' );
		}

		function enqueue_style() {

			wp_register_style( 'pixwell-shortcode', false, [], PIXWELL_CORE_VERSION, 'all' );
		}

		function enqueue_script() {

			if ( pixwell_is_amp() ) {
				return;
			}

			wp_register_script( 'html5', get_theme_file_uri( 'assets/js/html5shiv.min.js' ), [], '3.7.3' );
			wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

			wp_register_script( 'imagesloaded', PIXWELL_CORE_URL . 'assets/imagesloaded.min.js', [ 'jquery' ], '4.1.4', true );
			wp_register_script( 'jquery-magnific-popup', PIXWELL_CORE_URL . 'assets/jquery.mp.min.js', [ 'jquery' ], '1.1.0', true );
			wp_register_script( 'rbcookie', PIXWELL_CORE_URL . 'assets/rbcookie.min.js', [ 'jquery' ], '1.0.3', true );
			wp_register_script( 'pixwell-core', PIXWELL_CORE_URL . 'assets/core.js', [
				'jquery',
				'imagesloaded',
				'rbcookie',
				'jquery-magnific-popup',
			], PIXWELL_CORE_VERSION, true );

			$js_params = [
				'ajaxurl'    => admin_url( 'admin-ajax.php' ),
				'darkModeID' => pixwell_get_dark_mode_id(),
			];

			wp_localize_script( 'pixwell-core', 'pixwellCoreParams', $js_params );

			wp_enqueue_script( 'html5' );
			wp_enqueue_script( 'pixwell-core' );
		}

		function admin_enqueue( $hook ) {

			if ( $hook == 'widgets.php' ) {
				wp_enqueue_media();
				wp_enqueue_style( 'wp-color-picker' );
				wp_register_script( 'pixwell-core-admin', PIXWELL_CORE_URL . 'assets/admin.js', [ 'jquery' ], PIXWELL_CORE_VERSION, true );
				wp_enqueue_script( 'pixwell-core-admin' );
			}
		}

		function footer_enqueue() {

			wp_enqueue_style( 'pixwell-shortcode' );
		}

		function block_shortcodes() {

			$shortcodes = [
				'rbc_fw_feat_1'      => 'pixwell_rbc_fw_feat_1',
				'rbc_fw_feat_2'      => 'pixwell_rbc_fw_feat_2',
				'rbc_fw_feat_3'      => 'pixwell_rbc_fw_feat_3',
				'rbc_fw_feat_4'      => 'pixwell_rbc_fw_feat_4',
				'rbc_fw_feat_5'      => 'pixwell_rbc_fw_feat_5',
				'rbc_fw_feat_6'      => 'pixwell_rbc_fw_feat_6',
				'rbc_fw_feat_7'      => 'pixwell_rbc_fw_feat_7',
				'rbc_fw_feat_8'      => 'pixwell_rbc_fw_feat_8',
				'rbc_fw_feat_9'      => 'pixwell_rbc_fw_feat_9',
				'rbc_fw_feat_10'     => 'pixwell_rbc_fw_feat_10',
				'rbc_fw_feat_11'     => 'pixwell_rbc_fw_feat_11',
				'rbc_fw_feat_12'     => 'pixwell_rbc_fw_feat_12',
				'rbc_fw_feat_13'     => 'pixwell_rbc_fw_feat_13',
				'rbc_fw_feat_14'     => 'pixwell_rbc_fw_feat_14',
				'rbc_fw_feat_15'     => 'pixwell_rbc_fw_feat_15',
				'rbc_fw_feat_16'     => 'pixwell_rbc_fw_feat_16',
				'rbc_fw_feat_17'     => 'pixwell_rbc_fw_feat_17',
				'rbc_fw_feat_18'     => 'pixwell_rbc_fw_feat_18',
				'rbc_fw_grid_1'      => 'pixwell_rbc_fw_grid_1',
				'rbc_fw_grid_2'      => 'pixwell_rbc_fw_grid_2',
				'rbc_fw_grid_3'      => 'pixwell_rbc_fw_grid_3',
				'rbc_fw_grid_4'      => 'pixwell_rbc_fw_grid_4',
				'rbc_fw_grid_5'      => 'pixwell_rbc_fw_grid_5',
				'rbc_fw_list_1'      => 'pixwell_rbc_fw_list_1',
				'rbc_fw_list_2'      => 'pixwell_rbc_fw_list_2',
				'rbc_fw_list_3'      => 'pixwell_rbc_fw_list_3',
				'rbc_fw_mix_1'       => 'pixwell_rbc_fw_mix_1',
				'rbc_fw_mix_2'       => 'pixwell_rbc_fw_mix_2',
				'rbc_fw_category_1'  => 'pixwell_rbc_fw_category_1',
				'rbc_fw_category_2'  => 'pixwell_rbc_fw_category_2',
				'rbc_fw_portfolio_1' => 'pixwell_rbc_fw_portfolio_1',
				'rbc_ct_classic'     => 'pixwell_rbc_ct_classic',
				'rbc_ct_list'        => 'pixwell_rbc_ct_list',
				'rbc_ct_grid_1'      => 'pixwell_rbc_ct_grid_1',
				'rbc_ct_grid_2'      => 'pixwell_rbc_ct_grid_2',
				'rbc_ct_mix_1'       => 'pixwell_rbc_ct_mix_1',
				'rbc_ct_mix_2'       => 'pixwell_rbc_ct_mix_2',
				'rbc_subscribe'      => 'pixwell_rbc_subscribe',
				'rbc_newsletter'     => 'pixwell_rbc_newsletter',
				'rbc_fw_raw_html'    => 'pixwell_rbc_raw_html',
				'rbc_advert'         => 'pixwell_rbc_advert',
				'rb_related'         => 'pixwell_rbc_related',
				'rbc_fw_masonry_1'   => 'pixwell_rbc_fw_masonry_1',
				'rbc_ct_masonry_1'   => 'pixwell_rbc_ct_masonry_1',
				'rbc_about'          => 'pixwell_rbc_about',
				'rbc_fw_banner'      => 'pixwell_rbc_fw_banner',
				'rbc_fw_deal_1'      => 'pixwell_rbc_fw_deal_1',
				'rbc_fw_search'      => 'pixwell_rbc_fw_search',
				'rbc_image_box'      => 'pixwell_rbc_image_box',
				'rbc_heading'        => 'pixwell_rbc_heading',
				'rbc_cta_1'          => 'pixwell_rbc_cta_1',
			];

			foreach ( $shortcodes as $name => $func ) {
				if ( function_exists( $func ) ) {
					add_shortcode( $name, $func );
				}
			}
		}

		function activated() {

			if ( ! is_network_admin() ) {
				set_transient( '_rb_welcome_page_redirect', true, 30 );
			}
		}
	}
}

/** load */
PIXWELL_CORE::get_instance();