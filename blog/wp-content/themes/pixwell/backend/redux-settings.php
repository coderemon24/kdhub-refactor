<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Pixwell_Register_Options', false ) ) {
	class Pixwell_Register_Options {

		protected static $instance = null;
		const OPTION_ID = 'pixwell_theme_options';

		static function get_instance() {

			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function __construct() {

			self::$instance = $this;

			if ( ! class_exists( 'ReduxFramework' ) ) {
				return false;
			}

			$this->load_files();
			Redux::setArgs( self::OPTION_ID, $this->get_params() );
			$this->register_options();
		}

		public function display_name() {

			return esc_html__( 'Pixwell Panel', 'pixwell' ) . '<span class="p-version">' . wp_get_theme()->get( 'Version' ) . '</span>';
		}

		public function display_version() {

			return '<span class="pdocs-info"><i class="el el-folder-open"></i><a href="https://help.themeruby.com/pixwell" target="_blank">' . esc_html__( 'Online Documentation', 'pixwell' ) . '</a></span>';
		}

		public function get_params() {

			return [
				'opt_name'                  => self::OPTION_ID,
				'display_name'              => $this->display_name(),
				'display_version'           => $this->display_version(),
				'menu_type'                 => 'menu',
				'allow_sub_menu'            => true,
				'menu_title'                => esc_html__( 'Theme Options', 'pixwell' ),
				'page_title'                => esc_html__( 'Theme Options', 'pixwell' ),
				'google_api_key'            => '',
				'google_update_weekly'      => false,
				'async_typography'          => false,
				'admin_bar'                 => true,
				'admin_bar_icon'            => 'dashicons-admin-generic',
				'admin_bar_priority'        => 50,
				'global_variable'           => self::OPTION_ID,
				'dev_mode'                  => false,
				'update_notice'             => false,
				'customizer'                => true,
				'page_priority'             => 54,
				'page_parent'               => 'themes.php',
				'page_permissions'          => 'manage_options',
				'menu_icon'                 => '',
				'last_tab'                  => '',
				'page_icon'                 => 'icon-themes',
				'page_slug'                 => 'ruby-options',
				'show_options_object'       => false,
				'save_defaults'             => true,
				'default_show'              => false,
				'default_mark'              => '',
				'show_import_export'        => true,
				'transient_time'            => 6400,
				'use_cdn'                   => true,
				'output'                    => true,
				'output_tag'                => true,
				'disable_tracking'          => true,
				'disable_google_fonts_link' => true,
				'database'                  => '',
				'system_info'               => false,
			];
		}

		function load_files() {

			$paths = [
				'backend/panels/general.php',
				'backend/panels/logo.php',
				'backend/panels/header.php',
				'backend/panels/sidebar.php',
				'backend/panels/footer.php',
				'backend/panels/elements-style.php',
				'backend/panels/dark-mode.php',
				'backend/panels/posts-style.php',
				'backend/panels/blog-pages.php',
				'backend/panels/single-post.php',
				'backend/panels/post-types.php',
				'backend/panels/color.php',
				'backend/panels/site-socials.php',
				'backend/panels/translation.php',
				'backend/panels/typography.php',
				'backend/panels/seo.php',
				'backend/panels/performance.php',
				'backend/panels/special.php',
				'backend/panels/wc.php',
				'backend/panels/amp.php',
				'backend/panels/cookie.php',
				'backend/panels/table-contents.php',
				'backend/panels/membership.php',
				'backend/panels/adblock.php',
			];

			foreach ( $paths as $path ) {
				$file = get_theme_file_path( $path );
				if ( file_exists( $file ) ) {
					include_once $file;
				}
			}
		}

		public function register_options() {

			$funcs = [
				'logo',
				'logo_global',
				'logo_mobile',
				'logo_sticky',
				'logo_transparent',
				'logo_left',
				'logo_footer',
				'logo_favicon',

				'theme_styles',
				'site_layout',
				'unique_post',
				'entry_category',
				'entry_meta',
				'custom_meta',
				'featured_image',
				'post_format',
				'excerpt',
				'read_more',
				'round_conner',
				'design_gif',
				'design_tooltips',
				'design_back_top',
				'block_header',
				'slider',
				'pagination',
				'wprm_supported',

				'dark_mode',
				'header',
				'header_general',
				'topbar',
				'main_menu',
				'header_mobile',
				'header_transparent',
				'off_canvas',
				'header_trending',
				'sidebar',
				'footer',

				'styling',
				'styling_classic',
				'styling_classic_2',
				'styling_grid_1',
				'styling_grid_2',
				'styling_grid_3',
				'styling_grid_4',
				'styling_grid_5',
				'styling_grid_6',
				'styling_grid_7',
				'styling_list_1',
				'styling_list_2',
				'styling_list_3',
				'styling_list_4',
				'styling_list_5',
				'styling_list_6',
				'styling_list_7',
				'styling_list_8',
				'styling_list_9',
				'styling_overlay_1',
				'styling_overlay_2',
				'styling_overlay_3',
				'styling_overlay_4',
				'styling_overlay_5',
				'styling_overlay_6',
				'styling_overlay_7',
				'styling_overlay_8',
				'styling_overlay_9',
				'styling_masonry_1',

				'index',
				'cat',
				'search',
				'author',
				'archive',
				'single_post',
				'single_post_styles',
				'single_post_layout',
				'single_post_section',
				'single_post_left',
				'single_post_share',
				'single_post_related',
				'single_next_post',
				'single_review',
				'reaction',

				'page',
				'post_types',
				'portfolio',
				'gallery',
				'deal',

				'social_profile',
				'typo',
				'typo_body',
				'typo_title',
				'typo_meta',
				'typo_heading',
				'typo_navigation',
				'typo_topbar',
				'typo_fmenu',
				'typo_logo',
				'color',
				'newsletter',
				'bookmark',
				'adblock',
				'seo',
				'performance',
				'cookie',
				'translation',
				'table_contents',
				'woocommerce',
				'wc_page',
				'wc_styles',
				'membership',
				'amp',
				'amp_general',
				'amp_single',
				'amp_ads',
				'backup',
			];

			foreach ( $funcs as $name ) {
				$func = 'pixwell_register_options_' . $name;
				if ( function_exists( $func ) ) {
					Redux::setSection( self::OPTION_ID, call_user_func( $func ) );
				}
			}
		}

	}
}

/** load */
Pixwell_Register_Options::get_instance();