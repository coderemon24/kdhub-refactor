<?php
/** Pixwell theme functions */
define( 'PIXWELL_THEME_VERSION', '11.5' );

include_once get_theme_file_path( 'includes/load.php' );

add_action( 'after_setup_theme', 'pixwell_theme_setup', 10 );
add_action( 'wp_enqueue_scripts', 'pixwell_register_script_frontend', 10 );

if ( function_exists( 'load_theme_textdomain' ) ) {
	load_theme_textdomain( 'pixwell', get_theme_file_path( 'languages' ) );
}

if ( ! function_exists( 'pixwell_theme_setup' ) ) {
	function pixwell_theme_setup() {

		if ( ! isset( $GLOBALS['content_width'] ) ) {
			$GLOBALS['content_width'] = 1170;
		}

		$settings = get_option( 'pixwell_theme_options', [] );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', [
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		] );

		add_theme_support( 'amp', [
			'paired' => true,
		] );
		add_theme_support( 'post-formats', [ 'gallery', 'video', 'audio' ] );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'editor-style' );
		add_theme_support( 'responsive-embeds' );
		if ( ! empty( $settings['widget_block'] ) ) {
			remove_theme_support( 'widgets-block-editor' );
		}
		add_theme_support( 'woocommerce', [
			'gallery_thumbnail_image_width' => 110,
			'thumbnail_image_width'         => 300,
			'single_image_width'            => 760,
		] );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		register_nav_menus( [
			'pixwell_menu_main'        => esc_html__( 'Main Menu', 'pixwell' ),
			'pixwell_menu_offcanvas'   => esc_html__( 'Mobile Left Aside Menu', 'pixwell' ),
			'pixwell_menu_offcanvas_d' => esc_html__( 'Desktop Left Aside Menu', 'pixwell' ),
			'pixwell_menu_top'         => esc_html__( 'Top Bar Menu', 'pixwell' ),
			'pixwell_menu_footer'      => esc_html__( 'Footer Menu', 'pixwell' ),
		] );

		$crop_data = pixwell_get_crop_sizes();
		foreach ( $crop_data as $crop_id => $size ) {
			add_image_size( $crop_id, $size[0], $size[1], $size[2] );
		}
	}
}

if ( ! function_exists( 'pixwell_register_script_frontend' ) ) {
	function pixwell_register_script_frontend() {

		$style_deps = [ 'pixwell-font', 'pixwell-main' ];

		$script_deps = [
			'jquery',
			'jquery-waypoints',
			'jquery-isotope',
			'owl-carousel',
			'pixwell-sticky',
		];

		$main_filename        = 'main';
		$woocommerce_filename = 'woocommerce';
		if ( is_rtl() ) {
			$main_filename        = 'rtl';
			$woocommerce_filename = 'woocommerce-rtl';
		}

		wp_register_style( 'pixwell-font', esc_url_raw( Pixwell_Font::get_instance()->get_font_url() ), [], PIXWELL_THEME_VERSION, 'all' );
		wp_register_style( 'pixwell-main', get_theme_file_uri( 'assets/css/' . $main_filename . '.css' ), [], PIXWELL_THEME_VERSION, 'all' );

		if ( class_exists( 'WooCommerce' ) && ! pixwell_is_amp() ) {
			$style_deps[] = 'pixwell-woocommerce';
			wp_register_style( 'pixwell-woocommerce', get_theme_file_uri( 'assets/css/' . $woocommerce_filename . '.css' ), [ 'pixwell-main' ], PIXWELL_THEME_VERSION, 'all' );
			wp_deregister_style( 'yith-wcwl-font-awesome' );
		}

		wp_register_style( 'pixwell-style', get_stylesheet_uri(), $style_deps, PIXWELL_THEME_VERSION, 'all' );
		wp_enqueue_style( 'pixwell-style' );

		/** load scripts */
		if ( ! pixwell_is_amp() ) {

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}

			wp_register_script( 'jquery-waypoints', get_theme_file_uri( 'assets/js/jquery.waypoints.min.js' ), [ 'jquery' ], '3.1.1', true );
			wp_register_script( 'jquery-isotope', get_theme_file_uri( 'assets/js/jquery.isotope.min.js' ), [ 'jquery' ], '3.0.6', true );
			wp_register_script( 'owl-carousel', get_theme_file_uri( 'assets/js/owl.carousel.min.js' ), [ 'jquery' ], '1.8.1', true );
			wp_register_script( 'pixwell-sticky', get_theme_file_uri( 'assets/js/rbsticky.min.js' ), [ 'jquery' ], '1.0', true );

			if ( pixwell_get_option( 'site_tooltips' ) ) {
				$script_deps[] = 'jquery-tipsy';
				wp_register_script( 'jquery-tipsy', get_theme_file_uri( 'assets/js/jquery.tipsy.min.js' ), [ 'jquery' ], '1.0', true );
			}

			if ( pixwell_get_option( 'site_back_to_top' ) ) {
				$script_deps[] = 'jquery-uitotop';
				wp_register_script( 'jquery-uitotop', get_theme_file_uri( 'assets/js/jquery.ui.totop.min.js' ), [ 'jquery' ], 'v1.2', true );
			}

			wp_register_script( 'pixwell-global', get_theme_file_uri( 'assets/js/global.js' ), $script_deps, PIXWELL_THEME_VERSION, true );
			wp_localize_script( 'pixwell-global', 'pixwellParams', [ 'ajaxurl' => admin_url( 'admin-ajax.php' ) ] );

			wp_enqueue_script( 'pixwell-global' );
		}
	}
}
