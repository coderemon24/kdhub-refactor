<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

add_action( 'redux/options/pixwell_theme_options/saved', 'pixwell_write_dynamic_css' );
add_action( 'redux/options/pixwell_theme_options/reset', 'pixwell_write_dynamic_css' );
add_action( 'redux/options/pixwell_theme_options/section/reset', 'pixwell_write_dynamic_css' );
add_action( 'created_term', 'pixwell_write_dynamic_css' );
add_action( 'edited_term', 'pixwell_write_dynamic_css' );
add_action( 'upgrader_process_complete', 'pixwell_write_dynamic_css', 999 );
add_action( 'wp_enqueue_scripts', 'pixwell_main_dynamic_style', 98 );
add_action( 'wp_enqueue_scripts', 'pixwell_page_dynamic_style', 99 );

/** inline page */
if ( ! function_exists( 'pixwell_page_dynamic_style' ) ) {
	function pixwell_page_dynamic_style() {

		if ( is_page() ) {
			$max_width   = rb_get_meta( 'page_max_width' );
			$page_layout = rb_get_meta( 'page_layout' );
			if ( ! empty( $max_width ) && '1' != $page_layout ) {
				$buffer = 'body.page-template-default article.page {';
				$buffer .= 'max-width: ' . absint( $max_width ) . 'px;';
				$buffer .= '}';
				wp_add_inline_style( 'pixwell-main', $buffer );
			}
		}

		return false;
	}
}

if ( ! function_exists( 'pixwell_is_color' ) ) {
	function pixwell_is_color( $value ) {

		if ( empty( $value ) || ! is_string( $value ) || strlen( $value ) < 4 ) {
			return false;
		}

		return true;
	}
}

/** generate dynamic css */
if ( ! function_exists( 'pixwell_generate_styles' ) ) {
	function pixwell_generate_styles() {

		$buffer = '';

		$font_body             = pixwell_get_option( 'font_body' );
		$font_excerpt          = pixwell_get_option( 'font_excerpt' );
		$font_h1               = pixwell_get_option( 'font_h1' );
		$font_h2               = pixwell_get_option( 'font_h2' );
		$font_h3               = pixwell_get_option( 'font_h3' );
		$font_h4               = pixwell_get_option( 'font_h4' );
		$font_h5               = pixwell_get_option( 'font_h5' );
		$font_h6               = pixwell_get_option( 'font_h6' );
		$font_tagline          = pixwell_get_option( 'font_tagline' );
		$font_cat_icon         = pixwell_get_option( 'font_cat_icon' );
		$font_post_meta        = pixwell_get_option( 'font_post_meta' );
		$font_post_meta_author = pixwell_get_option( 'font_post_meta_author' );
		$font_breadcrumb       = pixwell_get_option( 'font_breadcrumb' );
		$footer_menu_font      = pixwell_get_option( 'footer_menu_font' );
		$footer_logo_height    = pixwell_get_option( 'footer_logo_height' );
		$font_topbar           = pixwell_get_option( 'font_topbar' );
		$font_topbar_menu      = pixwell_get_option( 'font_topbar_menu' );
		$font_navbar           = pixwell_get_option( 'font_navbar' );
		$font_navbar_sub       = pixwell_get_option( 'font_navbar_sub' );
		$font_logo_text        = pixwell_get_option( 'font_logo_text' );
		$font_header_block     = pixwell_get_option( 'font_header_block' );
		$font_header_filter    = pixwell_get_option( 'font_header_filter' );
		$font_header_widget    = pixwell_get_option( 'font_header_widget' );
		$font_widget_menu      = pixwell_get_option( 'font_widget_menu' );
		$font_price            = pixwell_get_option( 'font_price' );

		$buffer .= 'html {' . pixwell_create_typo_css( $font_body ) . '}';
		$buffer .= 'h1, .h1 {' . pixwell_create_typo_css( $font_h1 ) . '}';
		$buffer .= 'h2, .h2 {' . pixwell_create_typo_css( $font_h2 ) . '}';
		$buffer .= 'h3, .h3 {' . pixwell_create_typo_css( $font_h3 ) . '}';
		$buffer .= 'h4, .h4 {' . pixwell_create_typo_css( $font_h4 ) . '}';
		$buffer .= 'h5, .h5 {' . pixwell_create_typo_css( $font_h5 ) . '}';
		$buffer .= 'h6, .h6 {' . pixwell_create_typo_css( $font_h6 ) . '}';
		$buffer .= '.single-tagline h6 {' . pixwell_create_typo_css( $font_tagline ) . '}';
		$buffer .= '.p-wrap .entry-summary, .twitter-content.entry-summary, .author-description, .rssSummary, .rb-sdesc {' . pixwell_create_typo_css( $font_excerpt ) . '}';
		$buffer .= '.p-cat-info {' . pixwell_create_typo_css( $font_cat_icon ) . '}';
		$buffer .= '.p-meta-info, .wp-block-latest-posts__post-date {' . pixwell_create_typo_css( $font_post_meta ) . '}';
		$buffer .= '.meta-info-author.meta-info-el {' . pixwell_create_typo_css( $font_post_meta_author ) . '}';
		$buffer .= '.breadcrumb {' . pixwell_create_typo_css( $font_breadcrumb ) . '}';
		$buffer .= '.footer-menu-inner {' . pixwell_create_typo_css( $footer_menu_font ) . '}';
		$buffer .= '.topbar-wrap {' . pixwell_create_typo_css( $font_topbar ) . '}';
		$buffer .= '.topbar-menu-wrap {' . pixwell_create_typo_css( $font_topbar_menu ) . '}';
		$buffer .= '.main-menu > li > a, .off-canvas-menu > li > a {' . pixwell_create_typo_css( $font_navbar ) . '}';
		$buffer .= '.main-menu .sub-menu:not(.sub-mega), .off-canvas-menu .sub-menu {' . pixwell_create_typo_css( $font_navbar_sub ) . '}';
		$buffer .= '.is-logo-text .logo-title {' . pixwell_create_typo_css( $font_logo_text ) . '}';
		$buffer .= '.block-title, .block-header .block-title {' . pixwell_create_typo_css( $font_header_block ) . '}';
		$buffer .= '.ajax-quick-filter, .block-view-more {' . pixwell_create_typo_css( $font_header_filter ) . '}';
		$buffer .= '.widget-title, .widget .widget-title {' . pixwell_create_typo_css( $font_header_widget ) . '}';
		$buffer .= 'body .widget.widget_nav_menu .menu-item {' . pixwell_create_typo_css( $font_widget_menu ) . '}';

		/** membership */
		$exclusive_label = pixwell_get_option( 'exclusive_label' );

		if ( ! empty( $exclusive_label ) ) {
			$buffer .= '.entry-title.is-p-protected a:before {';
			$buffer .= 'content: "' . esc_html( $exclusive_label ) . '";  display: inline-block;';
			$buffer .= '}';
		}

		/** background */
		$boxed_bg                  = pixwell_get_option( 'boxed_bg' );
		$header_banner_background  = pixwell_get_option( 'header_banner_background' );
		$footer_background         = pixwell_get_option( 'footer_background' );
		$header9_banner_background = pixwell_get_option( 'header_style9_banner_bg' );

		$buffer .= 'body.boxed {' . pixwell_create_background_css( $boxed_bg ) . '}';
		$buffer .= '.header-6 .banner-wrap {' . pixwell_create_background_css( $header_banner_background ) . '}';
		$buffer .= '.footer-wrap:before {' . pixwell_create_background_css( $footer_background ) . '; content: ""; position: absolute; left: 0; top: 0; width: 100%; height: 100%;}';
		$buffer .= '.header-9 .banner-wrap { ' . pixwell_create_background_css( $header9_banner_background ) . '}';

		/** @var  $topbar_line_gradient */
		$topbar_line_gradient = pixwell_get_option( 'topbar_line_gradient' );
		$topbar_gradient      = pixwell_get_option( 'topbar_gradient' );
		$topbar_line_height   = pixwell_get_option( 'topbar_line_height' );

		if ( ! empty( $topbar_line_gradient['from'] ) || ! empty( $topbar_line_gradient['to'] ) ) {
			$buffer .= '.topline-wrap {';
			if ( ! empty( $topbar_line_gradient['from'] ) ) {
				$buffer .= 'background-color: ' . esc_attr( $topbar_line_gradient['from'] ) . ';';
			} elseif ( ! empty( $topbar_line_gradient['to'] ) ) {
				$buffer .= 'background-color: ' . esc_attr( $topbar_line_gradient['to'] ) . ';';
			}
			$buffer .= '}';

			if ( ! empty( $topbar_line_gradient['from'] ) && ! empty( $topbar_line_gradient['to'] ) ) {
				$buffer .= '.topline-wrap { background-image: linear-gradient(90deg, ' . esc_attr( $topbar_line_gradient['from'] ) . ', ' . esc_attr( $topbar_line_gradient['to'] ) . '); }';
			}
		}

		if ( ! empty( $topbar_line_height ) ) {
			$buffer .= '.topline-wrap {';
			$buffer .= 'height: ' . intval( $topbar_line_height ) . 'px';
			$buffer .= '}';
		}

		if ( ! empty( $topbar_gradient['from'] ) || ! empty( $topbar_gradient['to'] ) ) {
			$buffer .= '.topbar-wrap {';
			if ( ! empty( $topbar_gradient['from'] ) ) {
				$buffer .= 'background-color: ' . esc_attr( $topbar_gradient['from'] ) . ';';
			} elseif ( ! empty( $topbar_gradient['to'] ) ) {
				$buffer .= 'background-color: ' . esc_attr( $topbar_gradient['to'] ) . ';';
			}
			$buffer .= '}';

			if ( ! empty( $topbar_gradient['from'] ) && ! empty( $topbar_gradient['to'] ) ) {
				$buffer .= '.topbar-wrap { background-image: linear-gradient(90deg, ' . esc_attr( $topbar_gradient['from'] ) . ', ' . esc_attr( $topbar_gradient['to'] ) . '); }';

				$buffer .= '.topbar-menu .sub-menu {';
				$buffer .= 'background-color: ' . esc_attr( $topbar_gradient['from'] ) . ';';
				$buffer .= 'background-image: linear-gradient(145deg, ' . esc_attr( $topbar_gradient['from'] ) . ', ' . esc_attr( $topbar_gradient['to'] ) . ');';
				$buffer .= '}';
			}
		}

		/** @var  $topbar_height */
		$topbar_height = pixwell_get_option( 'topbar_height' );

		if ( ! empty( $topbar_height ) && '32' != $topbar_height ) {
			$buffer .= '.topbar-inner {';
			$buffer .= 'min-height: ' . intval( $topbar_height ) . 'px;';
			$buffer .= '}';
		}

		/** @var  $navbar_height */
		$navbar_height      = pixwell_get_option( 'navbar_height' );
		$sticky_height      = pixwell_get_option( 'sticky_height' );
		$navbar_bg          = pixwell_get_option( 'navbar_bg' );
		$navbar_color       = pixwell_get_option( 'navbar_color' );
		$navbar_color_hover = pixwell_get_option( 'navbar_color_hover' );
		$navsub_bg          = pixwell_get_option( 'navsub_bg' );
		$navsub_color       = pixwell_get_option( 'navsub_color' );
		$navsub_color_hover = pixwell_get_option( 'navsub_color_hover' );
		$navbar_shadow      = pixwell_get_option( 'navbar_shadow' );

		if ( empty( $navsub_bg['from'] ) && ! empty( $navbar_bg['from'] ) ) {
			$navsub_bg = $navbar_bg;
		}

		if ( empty( $navsub_color ) ) {
			$navsub_color = $navbar_color;
		}

		if ( ! empty( $navbar_height ) && '60' != $navbar_height ) {
			$buffer .= '.navbar-inner {';
			$buffer .= 'min-height: ' . absint( $navbar_height ) . 'px;';
			$buffer .= '}';

			$buffer .= '.navbar-inner .logo-wrap img {';
			$buffer .= 'max-height: ' . absint( $navbar_height ) . 'px;';
			$buffer .= '}';

			$buffer .= '.main-menu > li > a {';
			$buffer .= 'height: ' . absint( $navbar_height ) . 'px;';
			$buffer .= '}';
		}

		if ( pixwell_get_option( 'navbar_sticky_style' ) ) {
			$buffer .= '.section-sticky .rbc-container.navbar-holder {max-width: 100%;}';
		}

		if ( ! empty( $sticky_height ) ) {
			$buffer .= '.section-sticky .navbar-inner {';
			$buffer .= 'min-height: ' . absint( $sticky_height ) . 'px;';
			$buffer .= '}';

			$buffer .= '.section-sticky .navbar-inner .logo-wrap img {';
			$buffer .= 'max-height: ' . absint( $sticky_height ) . 'px;';
			$buffer .= '}';

			$buffer .= '.section-sticky .main-menu > li > a {';
			$buffer .= 'height: ' . absint( $sticky_height ) . 'px;';
			$buffer .= '}';
		}

		if ( ! empty( $navbar_bg['from'] ) || ! empty( $navbar_bg['to'] ) ) {

			$buffer .= '.navbar-wrap:not(.transparent-navbar-wrap), #mobile-sticky-nav, #amp-navbar {';
			if ( ! empty( $navbar_bg['from'] ) ) {
				$buffer .= 'background-color: ' . esc_attr( $navbar_bg['from'] ) . ';';
			} elseif ( ! empty( $navbar_bg['to'] ) ) {
				$buffer .= 'background-color: ' . esc_attr( $navbar_bg['to'] ) . ';';
			}
			if ( ! empty( $navbar_bg['from'] ) && ! empty( $navbar_bg['to'] ) ) {
				$buffer .= 'background-image: linear-gradient(90deg, ' . esc_attr( $navbar_bg['from'] ) . ', ' . esc_attr( $navbar_bg['to'] ) . ');';
			}
			$buffer .= '}';

			$buffer .= '[data-theme="dark"] .navbar-wrap:not(.transparent-navbar-wrap) {';
			if ( ! empty( $navbar_bg['from'] ) || ! empty( $navbar_bg['to'] ) ) {
				$buffer .= 'background-color: unset; background-image: unset;';
			}
			$buffer .= '}';
			$buffer .= '.navbar-border-holder { border: none }';
		}

		if ( pixwell_is_color( $navbar_color ) ) {
			$buffer .= '.navbar-wrap:not(.transparent-navbar-wrap), #mobile-sticky-nav, #amp-navbar {';
			$buffer .= 'color: ' . $navbar_color . ';';
			$buffer .= '}';

			if ( ! empty( $font_body['color'] ) && pixwell_is_color( $font_body['color'] ) ) {
				$buffer .= '.fw-mega-cat.is-dark-text { color: ' . $font_body['color'] . '; }';
			} else {
				$buffer .= '.fw-mega-cat.is-dark-text, .transparent-navbar-wrap .fw-mega-cat.is-dark-text .entry-title { color: #333; }';
			}
		}

		/** cart & bookmark counter */
		if ( pixwell_is_color( $navbar_color ) ) {
			$buffer .= '.header-wrap .navbar-wrap:not(.transparent-navbar-wrap) .cart-counter, .header-wrap:not(.header-float) .navbar-wrap .rb-counter,';
			$buffer .= '.header-float .section-sticky .rb-counter {';
			$buffer .= 'background-color: ' . $navbar_color . ';';
			$buffer .= '}';

			$buffer .= '.header-5 .btn-toggle-wrap, .header-5 .section-sticky .logo-wrap,';
			$buffer .= '.header-5 .main-menu > li > a, .header-5 .navbar-right {';
			$buffer .= 'color: ' . $navbar_color . ';';
			$buffer .= '}';

			$buffer .= '.navbar-wrap .navbar-social a:hover {';
			$buffer .= 'color: ' . $navbar_color . ';';
			$buffer .= 'opacity: .7; }';

			if ( ! empty( $navbar_bg['from'] ) ) {
				$buffer .= '.header-wrap .navbar-wrap:not(.transparent-navbar-wrap) .rb-counter,';
				$buffer .= '.header-wrap:not(.header-float) .navbar-wrap .rb-counter { color: ' . esc_attr( $navbar_bg['from'] ) . '; }';
			} elseif ( ! empty( $navbar_bg['to'] ) ) {
				$buffer .= '.header-wrap .navbar-wrap:not(.transparent-navbar-wrap) .rb-counter,';
				$buffer .= '.header-wrap:not(.header-float) .navbar-wrap .rb-counter { color: ' . esc_attr( $navbar_bg['to'] ) . '; }';
			}
		}

		/** sub menu */
		$buffer .= '.main-menu {';
		if ( ! empty( $navsub_bg['from'] ) ) {
			$buffer .= '--subnav-bg-from: ' . esc_attr( $navsub_bg['from'] ) . ';';
			$buffer .= '--subnav-bg-to: ' . esc_attr( $navsub_bg['from'] ) . ';';
		}
		if ( ! empty( $navsub_bg['to'] ) ) {
			$buffer .= '--subnav-bg-to: ' . esc_attr( $navsub_bg['to'] ) . ';';
		}
		$buffer .= '}';

		if ( ! empty( $navsub_color ) ) {
			$buffer .= '.main-menu .sub-menu:not(.mega-category) {';
			$buffer .= ' color: ' . esc_attr( $navsub_color ) . ';';
			$buffer .= '}';
		}

		$buffer .= '.main-menu > li.menu-item-has-children > .sub-menu:before {';
		if ( ! empty( $navsub_bg['from'] ) ) {
			$buffer .= 'display: none;';
		} elseif ( ! empty( $navsub_bg['to'] ) ) {
			$buffer .= 'display: none;';
		}
		$buffer .= '}';

		if ( ! empty( $navbar_color_hover ) ) {
			$buffer .= '.main-menu > li > a:hover, .main-menu > li.current-menu-item > a';
			$buffer .= '{ color: ' . esc_attr( $navbar_color_hover ) . '; }';
			$buffer .= '.main-menu > li>  a > span:before {display: none; }';

			$buffer .= '.navbar-wrap .navbar-social a:hover {';
			$buffer .= 'color: ' . esc_attr( $navbar_color_hover ) . ';';
			$buffer .= 'opacity: 1; }';
		}

		if ( ! empty( $navsub_color_hover ) ) {
			$buffer .= '.main-menu .sub-menu a:not(.p-url):hover > span {';
			$buffer .= 'color: ' . esc_attr( $navsub_color_hover ) . ';';
			$buffer .= '}';
			$buffer .= '.main-menu a > span:before {display: none; }';
		}

		if ( empty( $navbar_shadow ) ) {
			$buffer .= '.navbar-wrap:not(.transparent-navbar-wrap), #mobile-sticky-nav, #amp-navbar { box-shadow: none !important; }';
		}

		/** @var  $navbar_bg_dark */
		$navbar_bg_dark          = pixwell_get_option( 'navbar_bg_dark' );
		$navbar_color_dark       = pixwell_get_option( 'navbar_color_dark' );
		$navbar_color_hover_dark = pixwell_get_option( 'navbar_color_hover_dark' );
		$navsub_bg_dark          = pixwell_get_option( 'navsub_bg_dark' );
		$navsub_color_dark       = pixwell_get_option( 'navsub_color_dark' );
		$navsub_color_hover_dark = pixwell_get_option( 'navsub_color_hover_dark' );

		if ( empty( $navsub_color_dark ) ) {
			$navsub_color_dark = $navbar_color_dark;
		}

		$buffer .= '[data-theme="dark"] .main-menu  {';
		if ( ! empty( $navsub_bg_dark['from'] ) ) {
			$buffer .= '--subnav-bg-from: ' . esc_attr( $navsub_bg_dark['from'] ) . ';';
			$buffer .= '--subnav-bg-to: ' . esc_attr( $navsub_bg_dark['from'] ) . ';';
		}
		if ( ! empty( $navsub_bg_dark['to'] ) ) {
			$buffer .= '--subnav-bg-to: ' . esc_attr( $navsub_bg_dark['to'] ) . ';';
		}
		$buffer .= '}';

		if ( ! empty( $navbar_bg_dark['from'] ) || ! empty( $navbar_bg_dark['to'] ) ) {

			$buffer .= '[data-theme="dark"] .navbar-wrap:not(.transparent-navbar-wrap), [data-theme="dark"] #mobile-sticky-nav {';
			if ( ! empty( $navbar_bg_dark['from'] ) ) {
				$buffer .= 'background-color: ' . esc_attr( $navbar_bg_dark['from'] ) . ';';
			} elseif ( ! empty( $navbar_bg_dark['to'] ) ) {
				$buffer .= 'background-color: ' . esc_attr( $navbar_bg_dark['to'] ) . ';';
			}
			if ( ! empty( $navbar_bg_dark['from'] ) && ! empty( $navbar_bg_dark['to'] ) ) {
				$buffer .= 'background-image: linear-gradient(90deg, ' . esc_attr( $navbar_bg_dark['from'] ) . ', ' . esc_attr( $navbar_bg_dark['to'] ) . ');';
			}
			$buffer .= '}';
		}

		if ( pixwell_is_color( $navbar_color_dark ) ) {
			$buffer .= '[data-theme="dark"] .navbar-wrap:not(.transparent-navbar-wrap), [data-theme="dark"] #mobile-sticky-nav, #amp-navbar {';
			$buffer .= 'color: ' . esc_attr( $navbar_color_dark ) . ';';
			$buffer .= '}';
		}

		/** cart & bookmark counter */
		if ( pixwell_is_color( $navbar_color_dark ) ) {
			$buffer .= '[data-theme="dark"] .header-wrap .navbar-wrap:not(.transparent-navbar-wrap) .cart-counter, [data-theme="dark"] .header-wrap:not(.header-float) .navbar-wrap .rb-counter,';
			$buffer .= '[data-theme="dark"] .header-wrap:not(.header-float) .is-light-text .rb-counter, [data-theme="dark"] .header-float .section-sticky .rb-counter {';
			$buffer .= 'background-color: ' . esc_attr( $navbar_color_dark ) . ';';
			$buffer .= '}';

			$buffer .= '[data-theme="dark"] .header-5 .btn-toggle-wrap, [data-theme="dark"] .header-5 .section-sticky .logo-wrap,';
			$buffer .= '[data-theme="dark"] .header-5 .main-menu > li > a, [data-theme="dark"] .header-5 .navbar-right {';
			$buffer .= 'color: ' . esc_attr( $navbar_color_dark ) . ';';
			$buffer .= '}';

			$buffer .= '[data-theme="dark"] .navbar-wrap .navbar-social a:hover {';
			$buffer .= 'color: ' . esc_attr( $navbar_color_dark ) . ';';
			$buffer .= 'opacity: .7; }';

			if ( ! empty( $navbar_bg_dark['from'] ) && pixwell_is_color( $navbar_bg_dark['from'] ) ) {
				$buffer .= '[data-theme="dark"] .header-wrap .navbar-wrap:not(.transparent-navbar-wrap) .rb-counter,';
				$buffer .= '[data-theme="dark"] .header-wrap:not(.header-float) .navbar-wrap .rb-counter, [data-theme="dark"] .header-wrap:not(.header-float) .is-light-text .rb-counter { color: ' . esc_attr( $navbar_bg_dark['from'] ) . '; }';
			} elseif ( ! empty( $navbar_bg_dark['to'] ) && pixwell_is_color( $navbar_bg_dark['to'] ) ) {
				$buffer .= '[data-theme="dark"] .header-wrap .navbar-wrap:not(.transparent-navbar-wrap) .rb-counter,';
				$buffer .= '[data-theme="dark"] .header-wrap:not(.header-float) .navbar-wrap .rb-counter, [data-theme="dark"] .header-wrap:not(.header-float) .is-light-text .rb-counter { color: ' . esc_attr( $navbar_bg_dark['from'] ) . '; }';
			}
		}

		if ( ! empty( $navsub_color_dark ) ) {
			$buffer .= '[data-theme="dark"] .main-menu .sub-menu:not(.mega-category) {';
			$buffer .= ' color: ' . esc_attr( $navsub_color_dark ) . ' !important;';
			$buffer .= '}';
		}

		$buffer .= '[data-theme="dark"] .main-menu > li.menu-item-has-children > .sub-menu:before {';
		if ( ! empty( $navsub_bg_dark['from'] ) ) {
			$buffer .= 'display: none;';
		} elseif ( ! empty( $navsub_bg_dark['to'] ) ) {
			$buffer .= 'display: none;';
		}
		$buffer .= '}';

		if ( pixwell_is_color( $navbar_color_hover_dark ) ) {
			$buffer .= '[data-theme="dark"] .main-menu > li > a:hover, [data-theme="dark"] .nav-search-link:hover,';
			$buffer .= '[data-theme="dark"] .main-menu > li.current-menu-item > a, [data-theme="dark"] .header-wrap .cart-link:hover {';
			$buffer .= 'color: ' . esc_attr( $navbar_color_hover_dark ) . ';';
			$buffer .= '}';
			$buffer .= '[data-theme="dark"] .main-menu > li>  a > span:before {display: none; }';

			$buffer .= '[data-theme="dark"] .navbar-wrap .navbar-social a:hover {';
			$buffer .= 'color: ' . esc_attr( $navbar_color_hover_dark ) . ';';
			$buffer .= 'opacity: 1; }';
		}

		if ( pixwell_is_color( $navsub_color_hover_dark ) ) {
			$buffer .= '[data-theme="dark"] .main-menu .sub-menu a:not(.p-url):hover > span {';
			$buffer .= 'color: ' . esc_attr( $navsub_color_hover_dark ) . ';';
			$buffer .= '}';
			$buffer .= '[data-theme="dark"] .main-menu a > span:before {display: none; }';
		}

		/** Mobile Navigation */
		$mobile_nav_height = pixwell_get_option( 'mobile_nav_height' );
		$mobile_nav_bg     = pixwell_get_option( 'mobile_nav_bg' );
		$mobile_nav_color  = pixwell_get_option( 'mobile_nav_color' );

		$buffer .= '.mobile-nav-inner {';
		if ( ! empty( $mobile_nav_height ) && '60' != $mobile_nav_height ) {
			$buffer .= 'height: ' . intval( $mobile_nav_height ) . 'px;';
		}

		if ( ! empty( $mobile_nav_bg['from'] ) ) {
			$buffer .= 'background-color: ' . esc_attr( $mobile_nav_bg['from'] ) . ';';
		} elseif ( ! empty( $mobile_nav_bg['to'] ) ) {
			$buffer .= 'background-color: ' . esc_attr( $mobile_nav_bg['to'] ) . ';';
		}

		if ( ! empty( $mobile_nav_bg['from'] ) && ! empty( $mobile_nav_bg['to'] ) ) {
			$buffer .= 'background-image: linear-gradient(90deg, ' . esc_attr( $mobile_nav_bg['from'] ) . ', ' . esc_attr( $mobile_nav_bg['to'] ) . ');';
		}

		if ( ! empty( $mobile_nav_color ) ) {
			$buffer .= 'color: ' . esc_attr( $mobile_nav_color ) . ';';
		}

		$buffer .= '}';

		/** menu border */
		if ( ! empty( $mobile_nav_bg['from'] ) || ! empty( $mobile_nav_bg['to'] ) ) {
			$buffer .= '@media only screen and (max-width: 991px) {.navbar-border-holder { border: none }}';
		}

		if ( ! empty( $mobile_nav_color ) ) {
			$buffer .= '@media only screen and (max-width: 991px) {.navbar-border-holder { border-color: ' . esc_attr( $mobile_nav_color ) . ' }}';
		}

		/** off-canvas */
		$off_canvas_header_bg_color    = pixwell_get_option( 'off_canvas_header_bg_color' );
		$off_canvas_header_overlay     = pixwell_get_option( 'off_canvas_header_overlay' );
		$off_canvas_header_bg          = pixwell_get_option( 'off_canvas_header_bg' );
		$off_canvas_bg                 = pixwell_get_option( 'off_canvas_bg' );
		$off_canvas_header_logo_height = pixwell_get_option( 'off_canvas_header_logo_height' );

		if ( ! empty( $off_canvas_header_bg_color ) ) {
			$buffer .= '.off-canvas-header { background-color: ' . esc_attr( $off_canvas_header_bg_color ) . '}';
		}

		if ( empty( $off_canvas_header_overlay ) ) {
			$buffer .= '.off-canvas-header:before {display: none; }';
		}

		if ( ! empty( $off_canvas_header_bg['url'] ) ) {
			$buffer .= '.off-canvas-header { background-image: url("' . esc_url( $off_canvas_header_bg['url'] ) . '")}';
		}
		if ( ! empty( $off_canvas_bg ) ) {
			$buffer .= '.off-canvas-wrap, .amp-canvas-wrap { background-color: ' . esc_attr( $off_canvas_bg ) . ' !important; }';
		}
		if ( ! empty( $off_canvas_header_logo_height ) ) {
			$buffer .= 'a.off-canvas-logo img { max-height: ' . intval( $off_canvas_header_logo_height ) . 'px; }';
		}

		/** transparent header */
		$transparent_header_bg      = pixwell_get_option( 'transparent_header_bg' );
		$transparent_header_bg_dark = pixwell_get_option( 'transparent_header_bg_dark' );
		$transparent_disable_border = pixwell_get_option( 'transparent_disable_border' );
		if ( ! empty( $transparent_header_bg['rgba'] ) ) {
			$buffer .= '.header-float .transparent-navbar-wrap { background: ' . $transparent_header_bg['rgba'] . ';}';
			$buffer .= '.header-float .navbar-inner { border-bottom: none; }';
		}

		if ( ! empty( $transparent_header_bg_dark['rgba'] ) ) {
			$buffer .= '[data-theme="dark"] .header-float .transparent-navbar-wrap { background: ' . $transparent_header_bg_dark['rgba'] . ';}';
		}

		if ( ! empty( $transparent_disable_border ) ) {
			$buffer .= '.header-float .navbar-inner { border-bottom: none; }';
		}

		/** header 3 color */
		$header_banner_color   = pixwell_get_option( 'header_banner_color' );
		$header_3_border_width = pixwell_get_option( 'header_3_border_width' );
		$header_3_border_color = pixwell_get_option( 'header_3_border_color' );

		if ( ! empty( $header_3_border_width ) ) {
			$buffer .= '.navbar-border-holder {border-width: ' . $header_3_border_width . 'px; }';
		}
		if ( ! empty( $header_3_border_color ) ) {
			$buffer .= '.navbar-border-holder {border-color: ' . $header_3_border_color . '; }';
		}
		if ( ! empty( $header_banner_color ) ) {
			$buffer .= '.header-3 .banner-left, .header-3 .banner-right { color: ' . $header_banner_color . ' ;}';
			$buffer .= '.header-3 .banner-right .rb-counter { background-color: ' . $header_banner_color . ' ;}';
		}

		/** @var $global_color */
		$global_color    = pixwell_get_option( 'global_color' );
		$hyperlink_color = pixwell_get_option( 'hyperlink_color' );
		$popup_bg_color  = pixwell_get_option( 'popup_bg_color' );
		$review_color    = pixwell_get_option( 'review_color' );
		$card_color      = pixwell_get_option( 'card_color' );
		$coupon_color    = pixwell_get_option( 'coupon_color' );

		if ( pixwell_is_color( $global_color ) ) {

			$buffer .= ':root {--g-color: ' . $global_color . '}';

			/* custom socials color */
			$social_1  = pixwell_get_option( 'social_custom_1_color' );
			$social_2  = pixwell_get_option( 'social_custom_2_color' );
			$social_3  = pixwell_get_option( 'social_custom_3_color' );
			$p_spacing = pixwell_get_option( 'single_post_content_spacing' );

			if ( pixwell_is_color( $social_1 ) ) {
				$buffer .= '.is-color .social-link-1.social-link-custom  { background-color: ' . $social_1 . '; }';
				$buffer .= '.is-icon .social-link-1:hover  { color: ' . $social_1 . '; }';
			}
			if ( pixwell_is_color( $social_2 ) ) {
				$buffer .= '.is-color .social-link-2.social-link-custom  { background-color: ' . $social_2 . '; }';
				$buffer .= '.is-icon .social-link-2:hover  { color: ' . $social_2 . '; }';
			}
			if ( pixwell_is_color( $social_3 ) ) {
				$buffer .= '.is-color .social-link-3.social-link-custom  { background-color: ' . $social_3 . '; }';
				$buffer .= '.is-icon .social-link-3:hover  { color: ' . $social_3 . '; }';
			}

			if ( class_exists( 'WooCommerce' ) ) {
				$buffer .= '.woocommerce .price, .woocommerce div.product .product-loop-content .price, .woocommerce span.onsale,';
				$buffer .= '.woocommerce span.onsale.percent, .woocommerce-Price-amount.amount, .woocommerce .quantity .qty {' . pixwell_create_typo_css( $font_price ) . '}';
			}
			if ( ! empty( $p_spacing ) ) {
				$buffer .= '--cp-spacing :' . floatval( $p_spacing ) . 'rem;';
			}
		}

		if ( pixwell_is_color( $review_color ) ) {
			$buffer .= '.review-info, .p-review-info';
			$buffer .= '{ background-color: ' . $review_color . '}';
			$buffer .= '.review-el .review-stars, .average-stars i';
			$buffer .= '{ color: ' . $review_color . '}';
		}

		if ( pixwell_is_color( $popup_bg_color ) ) {
			$buffer .= '.rb-gallery-popup.mfp-bg.mfp-ready.rb-popup-effect';
			$buffer .= '{ background-color: ' . $popup_bg_color . '}';
		}

		if ( pixwell_is_color( $card_color ) ) {
			$buffer .= '.deal-module .card-label span';
			$buffer .= '{ background-color: ' . $card_color . '}';
		}

		if ( pixwell_is_color( $coupon_color ) ) {
			$buffer .= '.deal-module .coupon-label span';
			$buffer .= '{ background-color: ' . $coupon_color . '}';
		}

		if ( pixwell_is_color( $hyperlink_color ) ) {
			$buffer .= 'body .entry-content a:not(button), body .comment-content a';
			$buffer .= '{ color: ' . $hyperlink_color . '}';
		}

		$global_color_dark    = pixwell_get_option( 'global_color_dark' );
		$hyperlink_color_dark = pixwell_get_option( 'hyperlink_color_dark' );
		$review_color_dark    = pixwell_get_option( 'review_color_dark' );

		if ( pixwell_is_color( $global_color_dark ) ) {
			$buffer .= '[data-theme="dark"] {--g-color: ' . $global_color_dark . '}';
		}

		if ( pixwell_is_color( $hyperlink_color_dark ) ) {
			$buffer .= 'body[data-theme="dark"] .entry-content a:not(button), body .comment-content a';
			$buffer .= '{ color: ' . $hyperlink_color_dark . '}';
		}

		if ( pixwell_is_color( $review_color_dark ) ) {
			$buffer .= '[data-theme="dark"] .review-info, [data-theme="dark"] .p-review-info';
			$buffer .= '{ background-color: ' . $review_color_dark . '}';
			$buffer .= '[data-theme="dark"] .review-el .review-stars, [data-theme="dark"] .average-stars i';
			$buffer .= '{ color: ' . $review_color_dark . '}';
		}

		/** category icons */
		$cat_text_color    = pixwell_get_option( 'cat_icon_text_color' );
		$cat_icon_bg_color = pixwell_get_option( 'cat_icon_bg_color' );

		if ( pixwell_is_color( $cat_text_color ) ) {
			$buffer .= '.cat-icon-round .cat-info-el, .cat-icon-simple .cat-info-el,';
			$buffer .= '.cat-icon-radius .cat-info-el {  color: ' . $cat_text_color . '}';
		}

		if ( pixwell_is_color( $cat_icon_bg_color ) ) {
			$buffer .= '.cat-icon-round .cat-info-el, .cat-icon-radius .cat-info-el,';
			$buffer .= '.cat-icon-square .cat-info-el:before { background-color: ' . $cat_icon_bg_color . '}';
			$buffer .= '.cat-icon-line .cat-info-el { border-color: ' . $cat_icon_bg_color . '}';
		}

		/** Category */
		$terms = get_terms( [ 'hide_empty' => true ] );
		if ( ! empty( $terms ) ) {
			$term_ids = wp_list_pluck( $terms, 'term_id' );

			foreach ( $term_ids as $cat_id ) {
				$term_meta = rb_get_term_meta( 'pixwell_meta_categories', $cat_id );

				if ( ! empty( $term_meta['cat_icon'] ) && pixwell_is_color( $term_meta['cat_icon'] ) ) {
					$buffer .= '.cat-icon-round .cat-info-id-' . esc_attr( $cat_id ) . ',';
					$buffer .= '.cat-icon-radius .cat-info-id-' . esc_attr( $cat_id ) . ',';
					$buffer .= '.cat-dot-el.cat-info-id-' . esc_attr( $cat_id ) . ',';
					$buffer .= '.cat-icon-square .cat-info-id-' . esc_attr( $cat_id ) . ':before';
					$buffer .= '{ background-color: ' . $term_meta['cat_icon'] . '}';

					$buffer .= '.cat-icon-line .cat-info-id-' . esc_attr( $cat_id );
					$buffer .= '{ border-color: ' . $term_meta['cat_icon'] . '}';

					$buffer .= '.fw-category-1 .cat-list-item.cat-id-' . esc_attr( $cat_id ) . ' a:hover .cat-list-name,';
					$buffer .= '.fw-category-1.is-light-text .cat-list-item.cat-id-' . esc_attr( $cat_id ) . ' a:hover .cat-list-name';
					$buffer .= '{ color: ' . $term_meta['cat_icon'] . '}';
				}

				if ( ! empty( $term_meta['cat_color'] ) && pixwell_is_color( $term_meta['cat_color'] ) ) {
					$buffer .= '.cat-icon-round .cat-info-id-' . esc_attr( $cat_id ) . ',';
					$buffer .= '.cat-icon-simple .cat-info-id-' . esc_attr( $cat_id ) . ',';
					$buffer .= '.cat-icon-radius .cat-info-id-' . esc_attr( $cat_id );
					$buffer .= '{  color: ' . $cat_text_color . '}';
				}

				if ( ! empty( $term_meta['header_solid_bg'] ) && pixwell_is_color( $term_meta['header_solid_bg'] ) ) {
					$buffer .= 'body.category.category-' . esc_attr( $cat_id ) . ' .category-header .header-holder';
					$buffer .= '{ background-color: ' . $term_meta['header_solid_bg'] . '}';
				}
			}
		}

		$cat_solid_bg = pixwell_get_option( 'cat_header_solid_bg' );
		if ( ! empty( $cat_solid_bg ) && strlen( $cat_solid_bg ) >= 3 ) {
			$buffer .= '.category .category-header .header-holder';
			$buffer .= '{ background-color: ' . $cat_solid_bg . '}';
		}

		if ( ! empty( $font_body['color'] ) ) {
			$buffer .= '.instagram-box.box-intro { background-color: ' . $font_body['color'] . '; }';
		}

		/** comment font */
		if ( ! empty( $font_excerpt['font-size'] ) ) {
			$buffer .= '.comment-content, .single-bottom-share a:nth-child(1) span, .single-bottom-share a:nth-child(2) span, p.logged-in-as, .rb-sdecs,';
			$buffer .= '.deal-module .deal-description, .author-description ';
			$buffer .= '{ font-size: ' . floatval( $font_excerpt['font-size'] ) . '; }';
		}

		/** Single podcast */
		$single_podcast_bg_color = pixwell_get_option( 'single_podcast_bg_color' );

		if ( pixwell_is_color( $single_podcast_bg_color ) ) {
			$buffer .= '.single-podcast .single-header { background-color: ' . $single_podcast_bg_color . '}';
		}

		/* meta font */
		if ( ! empty( $font_post_meta['font-family'] ) ) {
			$buffer .= '.tipsy, .additional-meta, .sponsor-label, .sponsor-link, .entry-footer .tag-label,';
			$buffer .= '.box-nav .nav-label, .left-article-label, .share-label, .rss-date,';
			$buffer .= '.wp-block-latest-posts__post-date, .wp-block-latest-comments__comment-date,';
			$buffer .= '.image-caption, .wp-caption-text, .gallery-caption, .entry-content .wp-block-audio figcaption,';
			$buffer .= '.entry-content .wp-block-video figcaption, .entry-content .wp-block-image figcaption,';
			$buffer .= '.entry-content .wp-block-gallery .blocks-gallery-image figcaption,';
			$buffer .= '.entry-content .wp-block-gallery .blocks-gallery-item figcaption,';
			$buffer .= '.subscribe-content .desc, .follower-el .right-el, .author-job, .comment-metadata';
			$buffer .= '{ font-family: ' . esc_attr( $font_post_meta['font-family'] ) . '; }';
		}
		if ( ! empty( $font_post_meta['font-weight'] ) ) {
			$buffer .= '.tipsy, .additional-meta, .sponsor-label, .entry-footer .tag-label,';
			$buffer .= '.box-nav .nav-label, .left-article-label, .share-label, .rss-date,';
			$buffer .= '.wp-block-latest-posts__post-date, .wp-block-latest-comments__comment-date,';
			$buffer .= '.image-caption, .wp-caption-text, .gallery-caption, .entry-content .wp-block-audio figcaption,';
			$buffer .= '.entry-content .wp-block-video figcaption, .entry-content .wp-block-image figcaption,';
			$buffer .= '.entry-content .wp-block-gallery .blocks-gallery-image figcaption,';
			$buffer .= '.entry-content .wp-block-gallery .blocks-gallery-item figcaption,';
			$buffer .= '.subscribe-content .desc, .follower-el .right-el, .author-job, .comment-metadata';
			$buffer .= '{ font-weight: ' . esc_attr( $font_post_meta['font-weight'] ) . '; }';
		}
		if ( ! empty( $font_post_meta['font-size'] ) ) {
			$buffer .= '.tipsy, .additional-meta, .sponsor-label, .sponsor-link, .entry-footer .tag-label,';
			$buffer .= '.box-nav .nav-label, .left-article-label, .share-label, .rss-date,';
			$buffer .= '.wp-block-latest-posts__post-date, .wp-block-latest-comments__comment-date,';
			$buffer .= '.subscribe-content .desc, .author-job';
			$buffer .= '{ font-size: ' . $font_post_meta['font-size'] . '; }';

			$buffer .= '.image-caption, .wp-caption-text, .gallery-caption, .entry-content .wp-block-audio figcaption,';
			$buffer .= '.entry-content .wp-block-video figcaption, .entry-content .wp-block-image figcaption,';
			$buffer .= '.entry-content .wp-block-gallery .blocks-gallery-image figcaption,';
			$buffer .= '.entry-content .wp-block-gallery .blocks-gallery-item figcaption,';
			$buffer .= '.comment-metadata, .follower-el .right-el';
			$buffer .= '{ font-size: ' . intval( intval( $font_post_meta['font-size'] ) * 1.1 ) . 'px; }';
		}
		if ( ! empty( $font_post_meta['font-style'] ) ) {
			$buffer .= '.tipsy, .additional-meta, .sponsor-label, .entry-footer .tag-label,';
			$buffer .= '.box-nav .nav-label, .left-article-label, .share-label, .rss-date,';
			$buffer .= '.wp-block-latest-posts__post-date, .wp-block-latest-comments__comment-date,';
			$buffer .= '.image-caption, .wp-caption-text, .gallery-caption, .entry-content .wp-block-audio figcaption,';
			$buffer .= '.entry-content .wp-block-video figcaption, .entry-content .wp-block-image figcaption,';
			$buffer .= '.entry-content .wp-block-gallery .blocks-gallery-image figcaption,';
			$buffer .= '.entry-content .wp-block-gallery .blocks-gallery-item figcaption,';
			$buffer .= '.subscribe-content .desc. .follower-el .right-el, .author-job, .comment-metadata';
			$buffer .= '{ font-style: ' . esc_attr( $font_post_meta['font-style'] ) . '; }';
		}
		if ( ! empty( $font_post_meta['letter-spacing'] ) ) {
			$buffer .= '.tipsy, .additional-meta, .sponsor-label, .entry-footer .tag-label,';
			$buffer .= '.box-nav .nav-label, .left-article-label, .share-label, .rss-date,';
			$buffer .= '.wp-block-latest-posts__post-date, .wp-block-latest-comments__comment-date,';
			$buffer .= '.image-caption, .wp-caption-text, .gallery-caption, .entry-content .wp-block-audio figcaption,';
			$buffer .= '.entry-content .wp-block-video figcaption, .entry-content .wp-block-image figcaption,';
			$buffer .= '.entry-content .wp-block-gallery .blocks-gallery-image figcaption,';
			$buffer .= '.entry-content .wp-block-gallery .blocks-gallery-item figcaption,';
			$buffer .= '.subscribe-content .desc, .follower-el .right-el, .author-job, .comment-metadata';
			$buffer .= '{ letter-spacing: ' . esc_attr( $font_post_meta['letter-spacing'] ) . '; }';
		}
		if ( ! empty( $font_post_meta['text-transform'] ) ) {
			$buffer .= '.tipsy, .additional-meta, .sponsor-label, .entry-footer .tag-label,';
			$buffer .= '.box-nav .nav-label, .left-article-label, .share-label, .rss-date,';
			$buffer .= '.wp-block-latest-posts__post-date, .wp-block-latest-comments__comment-date,';
			$buffer .= '.image-caption, .wp-caption-text, .gallery-caption, .entry-content .wp-block-audio figcaption,';
			$buffer .= '.entry-content .wp-block-video figcaption, .entry-content .wp-block-image figcaption,';
			$buffer .= '.entry-content .wp-block-gallery .blocks-gallery-image figcaption,';
			$buffer .= '.entry-content .wp-block-gallery .blocks-gallery-item figcaption,';
			$buffer .= '.subscribe-content .desc, .follower-el .right-el, .author-job, .comment-metadata';
			$buffer .= '{ text-transform: ' . esc_attr( $font_post_meta['text-transform'] ) . '; }';
		}

		/* author info */
		if ( ! empty( $font_post_meta_author['font-family'] ) ) {
			$buffer .= '.sponsor-link';
			$buffer .= '{ font-family: ' . esc_attr( $font_post_meta_author['font-family'] ) . '; }';
		}
		if ( ! empty( $font_post_meta_author['font-weight'] ) ) {
			$buffer .= '.sponsor-link';
			$buffer .= '{ font-weight: ' . esc_attr( $font_post_meta_author['font-weight'] ) . '; }';
		}
		if ( ! empty( $font_post_meta_author['font-style'] ) ) {
			$buffer .= '.sponsor-link';
			$buffer .= '{ font-style: ' . esc_attr( $font_post_meta_author['font-style'] ) . '; }';
		}
		if ( ! empty( $font_post_meta_author['letter-spacing'] ) ) {
			$buffer .= '.sponsor-link';
			$buffer .= '{ letter-spacing: ' . esc_attr( $font_post_meta_author['letter-spacing'] ) . '; }';
		}
		if ( ! empty( $font_post_meta_author['text-transform'] ) ) {
			$buffer .= '.sponsor-link';
			$buffer .= '{ text-transform: ' . esc_attr( $font_post_meta_author['text-transform'] ) . '; }';
		}

		/* category info font */
		if ( ! empty( $font_cat_icon['font-family'] ) ) {
			$buffer .= '.entry-footer a, .tagcloud a, .entry-footer .source, .entry-footer .via-el';
			$buffer .= '{ font-family: ' . esc_attr( $font_cat_icon['font-family'] ) . '; }';
		}
		if ( ! empty( $font_cat_icon['font-weight'] ) ) {
			$buffer .= '.entry-footer a, .tagcloud a, .entry-footer .source, .entry-footer .via-el';
			$buffer .= '{ font-weight: ' . esc_attr( $font_cat_icon['font-weight'] ) . '; }';
		}
		if ( ! empty( $font_cat_icon['font-size'] ) ) {
			$buffer .= '.entry-footer a, .tagcloud a, .entry-footer .source, .entry-footer .via-el';
			$buffer .= '{ font-size: ' . esc_attr( $font_cat_icon['font-size'] ) . ' !important; }';
		}
		if ( ! empty( $font_cat_icon['font-style'] ) ) {
			$buffer .= '.entry-footer a, .tagcloud a, .entry-footer .source, .entry-footer .via-el';
			$buffer .= '{ font-style: ' . esc_attr( $font_cat_icon['font-style'] ) . '; }';
		}
		if ( ! empty( $font_cat_icon['letter-spacing'] ) ) {
			$buffer .= '.cat-info-el { letter-spacing: inherit; }';
			$buffer .= '.entry-footer a, .tagcloud a, .entry-footer .source, .entry-footer .via-el';
			$buffer .= '{ letter-spacing: ' . esc_attr( $font_cat_icon['letter-spacing'] ) . '; }';
		}
		if ( ! empty( $font_cat_icon['text-transform'] ) ) {
			$buffer .= '.entry-footer a, .tagcloud a, .entry-footer .source, .entry-footer .via-el';
			$buffer .= '{ text-transform: ' . esc_attr( $font_cat_icon['text-transform'] ) . '; }';
		}

		/** font button */
		$font_button = pixwell_get_option( 'font_button' );
		if ( ! empty( $font_button['font-family'] ) ) {
			$buffer .= '.p-link, .rb-cookie .cookie-accept, a.comment-reply-link, .comment-list .comment-reply-title small a,';
			$buffer .= '.banner-btn a, .headerstrip-btn a, input[type="submit"], button, .pagination-wrap, .cta-btn, .rb-btn';
			$buffer .= '{ font-family: ' . esc_attr( $font_button['font-family'] ) . '; }';
		}
		if ( ! empty( $font_button['font-weight'] ) ) {
			$buffer .= '.p-link, .rb-cookie .cookie-accept, a.comment-reply-link, .comment-list .comment-reply-title small a,';
			$buffer .= '.banner-btn a, .headerstrip-btn a, input[type="submit"], button, .pagination-wrap, .cta-btn, .rb-btn';
			$buffer .= '{ font-weight: ' . esc_attr( $font_button['font-weight'] ) . '; }';
		}
		if ( ! empty( $font_button['font-size'] ) ) {
			$buffer .= '.p-link, .rb-cookie .cookie-accept, a.comment-reply-link, .comment-list .comment-reply-title small a,';
			$buffer .= '.banner-btn a, .headerstrip-btn a, input[type="submit"], button, .pagination-wrap, .rb-btn';
			$buffer .= '{ font-size: ' . esc_attr( $font_button['font-size'] ) . '; }';
		}
		if ( ! empty( $font_button['font-style'] ) ) {
			$buffer .= '.p-link, .rb-cookie .cookie-accept, a.comment-reply-link, .comment-list .comment-reply-title small a,';
			$buffer .= '.banner-btn a, .headerstrip-btn a, input[type="submit"], button, .pagination-wrap, .cta-btn';
			$buffer .= '{ font-style: ' . esc_attr( $font_button['font-style'] ) . '; }';
		}
		if ( ! empty( $font_button['letter-spacing'] ) ) {
			$buffer .= '.p-link, .rb-cookie .cookie-accept, a.comment-reply-link, .comment-list .comment-reply-title small a,';
			$buffer .= '.banner-btn a, .headerstrip-btn a, input[type="submit"], button, .pagination-wrap, .cta-btn, .rb-btn';
			$buffer .= '{ letter-spacing: ' . esc_attr( $font_button['letter-spacing'] ) . '; }';
		}
		if ( ! empty( $font_button['text-transform'] ) ) {
			$buffer .= '.p-link, .rb-cookie .cookie-accept, a.comment-reply-link, .comment-list .comment-reply-title small a,';
			$buffer .= '.banner-btn a, .headerstrip-btn a, input[type="submit"], button, .pagination-wrap';
			$buffer .= '{ text-transform: ' . esc_attr( $font_button['text-transform'] ) . '; }';
		}

		/** font input */
		$font_input = pixwell_get_option( 'font_input' );
		if ( ! empty( $font_input['font-family'] ) ) {
			$buffer .= 'select, textarea, input[type="text"], input[type="tel"], input[type="email"], input[type="url"],';
			$buffer .= 'input[type="search"], input[type="number"]';
			$buffer .= '{ font-family: ' . esc_attr( $font_input['font-family'] ) . '; }';
		}
		if ( ! empty( $font_input['font-size'] ) ) {
			$buffer .= 'select, input[type="text"], input[type="tel"], input[type="email"], input[type="url"],';
			$buffer .= 'input[type="search"], input[type="number"]';
			$buffer .= '{ font-size: ' . esc_attr( $font_input['font-size'] ) . '; }';
			$buffer .= 'textarea';
			$buffer .= '{ font-size: ' . esc_attr( $font_input['font-size'] ) . ' !important; }';
		}
		if ( ! empty( $font_input['font-weight'] ) ) {
			$buffer .= 'select, textarea, input[type="text"], input[type="tel"], input[type="email"], input[type="url"],';
			$buffer .= 'input[type="search"], input[type="number"]';
			$buffer .= '{ font-weight: ' . esc_attr( $font_input['font-weight'] ) . '; }';
		}
		if ( ! empty( $font_input['font-style'] ) ) {
			$buffer .= 'select, textarea, input[type="text"], input[type="tel"], input[type="email"], input[type="url"],';
			$buffer .= 'input[type="search"], input[type="number"]';
			$buffer .= '{ font-style: ' . esc_attr( $font_input['font-style'] ) . '; }';
		}
		if ( ! empty( $font_input['letter-spacing'] ) ) {
			$buffer .= 'select, textarea, input[type="text"], input[type="tel"], input[type="email"], input[type="url"],';
			$buffer .= 'input[type="search"], input[type="number"]';
			$buffer .= '{ letter-spacing: ' . esc_attr( $font_input['letter-spacing'] ) . '; }';
		}
		if ( ! empty( $font_input['text-transform'] ) ) {
			$buffer .= 'select, textarea, input[type="text"], input[type="tel"], input[type="email"], input[type="url"],';
			$buffer .= 'input[type="search"], input[type="number"]';
			$buffer .= '{ text-transform: ' . esc_attr( $font_input['text-transform'] ) . '; }';
		}

		/** title font */
		if ( ! empty( $font_h1['font-family'] ) ) {
			$buffer .= '.widget_recent_comments .recentcomments > a:last-child,';
			$buffer .= '.wp-block-latest-comments__comment-link, .wp-block-latest-posts__list a,';
			$buffer .= '.widget_recent_entries li, .wp-block-quote *:not(cite), blockquote *:not(cite), .widget_rss li,';
			$buffer .= '.wp-block-latest-posts li, .wp-block-latest-comments__comment-link';
			$buffer .= '{ font-family: ' . esc_attr( $font_h1['font-family'] ) . '; }';
		}
		if ( ! empty( $font_h1['font-weight'] ) ) {
			$buffer .= '.widget_recent_comments .recentcomments > a:last-child,';
			$buffer .= '.wp-block-latest-comments__comment-link, .wp-block-latest-posts__list a,';
			$buffer .= '.widget_recent_entries li, .wp-block-quote *:not(cite), blockquote *:not(cite), .widget_rss li,';
			$buffer .= '.wp-block-latest-posts li, .wp-block-latest-comments__comment-link';
			$buffer .= '{ font-weight: ' . esc_attr( $font_h1['font-weight'] ) . '; }';
		}
		if ( ! empty( $font_h1['font-style'] ) ) {
			$buffer .= '.widget_recent_comments .recentcomments > a:last-child,';
			$buffer .= '.wp-block-latest-comments__comment-link, .wp-block-latest-posts__list a,';
			$buffer .= '.widget_recent_entries li, .wp-block-quote *:not(cite), blockquote *:not(cite), .widget_rss li,';
			$buffer .= '.wp-block-latest-posts li, .wp-block-latest-comments__comment-link';
			$buffer .= '{ font-style: ' . esc_attr( $font_h1['font-style'] ) . '; }';
		}
		if ( ! empty( $font_h1['letter-spacing'] ) ) {
			$buffer .= '.widget_recent_comments .recentcomments > a:last-child,';
			$buffer .= '.wp-block-latest-comments__comment-link, .wp-block-latest-posts__list a,';
			$buffer .= '.widget_recent_entries li, .wp-block-quote *:not(cite), blockquote *:not(cite), .widget_rss li,';
			$buffer .= '.wp-block-latest-posts li, .wp-block-latest-comments__comment-link';
			$buffer .= '{ letter-spacing: ' . esc_attr( $font_h1['letter-spacing'] ) . '; }';
		}

		/** default widget font */
		if ( ! empty( $font_navbar_sub['font-family'] ) ) {
			$buffer .= ' .widget_pages .page_item, .widget_meta li,';
			$buffer .= '.widget_categories .cat-item, .widget_archive li, .widget.widget_nav_menu .menu-item,';
			$buffer .= '.wp-block-archives-list li, .wp-block-categories-list li';
			$buffer .= '{ font-family: ' . esc_attr( $font_navbar_sub['font-family'] ) . '; }';
		}
		if ( ! empty( $font_navbar_sub['font-size'] ) ) {
			$buffer .= '.widget_pages .page_item, .widget_meta li,';
			$buffer .= '.widget_categories .cat-item, .widget_archive li, .widget.widget_nav_menu .menu-item,';
			$buffer .= '.wp-block-archives-list li, .wp-block-categories-list li';
			$buffer .= '{ font-size: ' . esc_attr( $font_navbar_sub['font-size'] ) . '; }';
		}
		if ( ! empty( $font_navbar_sub['font-weight'] ) ) {
			$buffer .= '.widget_pages .page_item, .widget_meta li,';
			$buffer .= '.widget_categories .cat-item, .widget_archive li, .widget.widget_nav_menu .menu-item,';
			$buffer .= '.wp-block-archives-list li, .wp-block-categories-list li';
			$buffer .= '{ font-weight: ' . esc_attr( $font_navbar_sub['font-weight'] ) . '; }';
		}
		if ( ! empty( $font_navbar_sub['font-style'] ) ) {
			$buffer .= '.widget_pages .page_item, .widget_meta li,';
			$buffer .= '.widget_categories .cat-item, .widget_archive li, .widget.widget_nav_menu .menu-item,';
			$buffer .= '.wp-block-archives-list li, .wp-block-categories-list li';
			$buffer .= '{ font-style: ' . esc_attr( $font_navbar_sub['font-style'] ) . '; }';
		}
		if ( ! empty( $font_navbar_sub['letter-spacing'] ) ) {
			$buffer .= '.widget_pages .page_item, .widget_meta li,';
			$buffer .= '.widget_categories .cat-item, .widget_archive li, .widget.widget_nav_menu .menu-item,';
			$buffer .= '.wp-block-archives-list li, .wp-block-categories-list li';
			$buffer .= '{ letter-spacing: ' . esc_attr( $font_navbar_sub['letter-spacing'] ) . '; }';
		}

		/** mobile font size */
		$font_size_mobile         = pixwell_get_option( 'font_size_mobile' );
		$font_excerpt_size_mobile = pixwell_get_option( 'font_excerpt_size_mobile' );

		if ( ! empty( $font_size_mobile ) && 100 > $font_size_mobile ) {
			$buffer .= '@media only screen and (max-width: 767px) {';
			$buffer .= '.entry-content { font-size: .' . intval( $font_size_mobile ) . 'rem; }';
			$buffer .= '.p-wrap .entry-summary, .twitter-content.entry-summary, .element-desc, .subscribe-description, .rb-sdecs,';
			$buffer .= '.copyright-inner > *, .summary-content, .pros-cons-wrap ul li,';
			$buffer .= '.gallery-popup-content .image-popup-description > *';
			$buffer .= '{ font-size: .' . intval( intval( $font_size_mobile ) * .85 ) . 'rem; }';
			$buffer .= '}';
		}

		if ( ! empty( $font_excerpt_size_mobile ) ) {
			$buffer .= '@media only screen and (max-width: 767px) {';
			$buffer .= '.comment-content, .single-bottom-share a:nth-child(1) span, .single-bottom-share a:nth-child(2) span, p.logged-in-as,';
			$buffer .= '.deal-module .deal-description, .p-wrap .entry-summary, .twitter-content.entry-summary, .author-description, .rssSummary, .rb-sdecs';
			$buffer .= '{ font-size: ' . intval( $font_excerpt_size_mobile ) . 'px !important; }';
			$buffer .= '}';
		}

		/** block title font */
		$font_header_block = pixwell_get_option( 'font_header_block' );
		if ( ! empty( $font_header_block['font-size'] ) ) {
			$buffer .= '@media only screen and (max-width: 991px) {';
			$buffer .= '.block-header-2 .block-title, .block-header-5 .block-title { font-size: ' . absint( intval( $font_header_block['font-size'] ) * .85 ) . 'px; }';
			$buffer .= '}';

			$buffer .= '@media only screen and (max-width: 767px) {';
			$buffer .= '.block-header-2 .block-title, .block-header-5 .block-title { font-size: ' . absint( intval( $font_header_block['font-size'] ) * .75 ) . 'px; }';
			$buffer .= '}';
		}

		/* H tags responsive font size */
		$font_h1_size            = pixwell_get_option( 'font_h1_size' );
		$font_h1_size_mobile     = pixwell_get_option( 'font_h1_size_mobile' );
		$font_h1_size_tablet     = pixwell_get_option( 'font_h1_size_tablet' );
		$font_h1_size_tablet_hoz = pixwell_get_option( 'font_h1_size_tablet_hoz' );

		$font_h2_size            = pixwell_get_option( 'font_h2_size' );
		$font_h2_size_mobile     = pixwell_get_option( 'font_h2_size_mobile' );
		$font_h2_size_tablet     = pixwell_get_option( 'font_h2_size_tablet' );
		$font_h2_size_tablet_hoz = pixwell_get_option( 'font_h2_size_tablet_hoz' );

		$font_h3_size            = pixwell_get_option( 'font_h3_size' );
		$font_h3_size_mobile     = pixwell_get_option( 'font_h3_size_mobile' );
		$font_h3_size_tablet     = pixwell_get_option( 'font_h3_size_tablet' );
		$font_h3_size_tablet_hoz = pixwell_get_option( 'font_h3_size_tablet_hoz' );

		$font_h4_size            = pixwell_get_option( 'font_h4_size' );
		$font_h4_size_mobile     = pixwell_get_option( 'font_h4_size_mobile' );
		$font_h4_size_tablet     = pixwell_get_option( 'font_h4_size_tablet' );
		$font_h4_size_tablet_hoz = pixwell_get_option( 'font_h4_size_tablet_hoz' );

		$font_h5_size            = pixwell_get_option( 'font_h5_size' );
		$font_h5_size_mobile     = pixwell_get_option( 'font_h5_size_mobile' );
		$font_h5_size_tablet     = pixwell_get_option( 'font_h5_size_tablet' );
		$font_h5_size_tablet_hoz = pixwell_get_option( 'font_h5_size_tablet_hoz' );

		$font_h6_size            = pixwell_get_option( 'font_h6_size' );
		$font_h6_size_mobile     = pixwell_get_option( 'font_h6_size_mobile' );
		$font_h6_size_tablet     = pixwell_get_option( 'font_h6_size_tablet' );
		$font_h6_size_tablet_hoz = pixwell_get_option( 'font_h6_size_tablet_hoz' );

		$font_tagline_size            = pixwell_get_option( 'font_tagline_size' );
		$font_tagline_size_mobile     = pixwell_get_option( 'font_tagline_size_mobile' );
		$font_tagline_size_tablet     = pixwell_get_option( 'font_tagline_size_tablet' );
		$font_tagline_size_tablet_hoz = pixwell_get_option( 'font_tagline_size_tablet_hoz' );

		$font_header_block_size_mobile = pixwell_get_option( 'font_header_block_size_mobile' );
		$title_uppercase               = pixwell_get_option( 'title_uppercase' );

		if ( ! empty( $font_h1_size ) ) {
			$buffer .= 'h1, .h1, h1.single-title {font-size: ' . absint( $font_h1_size ) . 'px; }';
		}
		if ( ! empty( $font_h2_size ) ) {
			$buffer .= 'h2, .h2 {font-size: ' . absint( $font_h2_size ) . 'px; }';
		}
		if ( ! empty( $font_h3_size ) ) {
			$buffer .= 'h3, .h3 {font-size: ' . absint( $font_h3_size ) . 'px; }';
		}
		if ( ! empty( $font_h4_size ) ) {
			$buffer .= 'h4, .h4 {font-size: ' . absint( $font_h4_size ) . 'px; }';
		}
		if ( ! empty( $font_h5_size ) ) {
			$buffer .= 'h5, .h5 {font-size: ' . absint( $font_h5_size ) . 'px; }';
		}
		if ( ! empty( $font_h6_size ) ) {
			$buffer .= 'h6, .h6 {font-size: ' . absint( $font_h6_size ) . 'px; }';
		}
		if ( ! empty( $font_tagline_size ) ) {
			$buffer .= '.single-tagline h6 {font-size: ' . absint( $font_tagline_size ) . 'px; }';
		}

		$buffer .= '@media only screen and (max-width: 1024px) {';
		if ( ! empty( $font_h1_size_tablet_hoz ) ) {
			$buffer .= 'h1, .h1, h1.single-title {font-size: ' . absint( $font_h1_size_tablet_hoz ) . 'px; }';
		}
		if ( ! empty( $font_h2_size_tablet_hoz ) ) {
			$buffer .= 'h2, .h2 {font-size: ' . absint( $font_h2_size_tablet_hoz ) . 'px; }';
		}
		if ( ! empty( $font_h3_size_tablet_hoz ) ) {
			$buffer .= 'h3, .h3 {font-size: ' . absint( $font_h3_size_tablet_hoz ) . 'px; }';
		}
		if ( ! empty( $font_h4_size_tablet_hoz ) ) {
			$buffer .= 'h4, .h4 {font-size: ' . absint( $font_h4_size_tablet_hoz ) . 'px; }';
		}
		if ( ! empty( $font_h5_size_tablet_hoz ) ) {
			$buffer .= 'h5, .h5 {font-size: ' . absint( $font_h5_size_tablet_hoz ) . 'px; }';
		}
		if ( ! empty( $font_h6_size_tablet_hoz ) ) {
			$buffer .= 'h6, .h6 {font-size: ' . absint( $font_h6_size_tablet_hoz ) . 'px; }';
		}
		if ( ! empty( $font_tagline_size_tablet_hoz ) ) {
			$buffer .= '.single-tagline h6 {font-size: ' . absint( $font_tagline_size_tablet_hoz ) . 'px; }';
		}
		$buffer .= '}';

		$buffer .= '@media only screen and (max-width: 991px) {';

		if ( ! empty( $font_h1_size_tablet ) ) {
			$buffer .= 'h1, .h1, h1.single-title {font-size: ' . absint( $font_h1_size_tablet ) . 'px; }';
		}
		if ( ! empty( $font_h2_size_tablet ) ) {
			$buffer .= 'h2, .h2 {font-size: ' . absint( $font_h2_size_tablet ) . 'px; }';
		}
		if ( ! empty( $font_h3_size_tablet ) ) {
			$buffer .= 'h3, .h3 {font-size: ' . absint( $font_h3_size_tablet ) . 'px; }';
		}
		if ( ! empty( $font_h4_size_tablet ) ) {
			$buffer .= 'h4, .h4 {font-size: ' . absint( $font_h4_size_tablet ) . 'px; }';
		}
		if ( ! empty( $font_h5_size_tablet ) ) {
			$buffer .= 'h5, .h5 {font-size: ' . absint( $font_h5_size_tablet ) . 'px; }';
		}
		if ( ! empty( $font_h6_size_tablet ) ) {
			$buffer .= 'h6, .h6 {font-size: ' . absint( $font_h6_size_tablet ) . 'px; }';
		}
		if ( ! empty( $font_tagline_size_tablet ) ) {
			$buffer .= '.single-tagline h6 {font-size: ' . absint( $font_tagline_size_tablet ) . 'px; }';
		}
		$buffer .= '}';

		$buffer .= '@media only screen and (max-width: 767px) {';
		if ( ! empty( $font_h1_size_mobile ) ) {
			$buffer .= 'h1, .h1, h1.single-title {font-size: ' . absint( $font_h1_size_mobile ) . 'px; }';
		}
		if ( ! empty( $font_h2_size_mobile ) ) {
			$buffer .= 'h2, .h2 {font-size: ' . absint( $font_h2_size_mobile ) . 'px; }';
		}
		if ( ! empty( $font_h3_size_mobile ) ) {
			$buffer .= 'h3, .h3 {font-size: ' . absint( $font_h3_size_mobile ) . 'px; }';
		}
		if ( ! empty( $font_h4_size_mobile ) ) {
			$buffer .= 'h4, .h4 {font-size: ' . absint( $font_h4_size_mobile ) . 'px; }';
		}
		if ( ! empty( $font_h5_size_mobile ) ) {
			$buffer .= 'h5, .h5 {font-size: ' . absint( $font_h5_size_mobile ) . 'px; }';
		}
		if ( ! empty( $font_h6_size_mobile ) ) {
			$buffer .= 'h6, .h6 {font-size: ' . absint( $font_h6_size_mobile ) . 'px; }';
		}
		if ( ! empty( $font_tagline_size_mobile ) ) {
			$buffer .= '.single-tagline h6 {font-size: ' . absint( $font_tagline_size_mobile ) . 'px; }';
		}

		if ( ! empty( $font_header_block_size_mobile ) ) {
			$buffer .= '.block-title, .block-header .block-title {font-size: ' . absint( $font_header_block_size_mobile ) . 'px !important; }';
			$buffer .= '.widget-title {font-size: ' . absint( intval( $font_header_block_size_mobile ) * .85 ) . 'px !important; }';
		}
		$buffer .= '}';

		/** block quote font */
		$font_quote = pixwell_get_option( 'font_quote' );

		if ( ! empty( $font_quote['font-family'] ) ) {
			$buffer .= '.wp-block-quote *:not(cite), blockquote *:not(cite) {' . pixwell_create_typo_css( $font_quote ) . '}';
		}

		/** update case title */
		if ( ! empty( $title_uppercase ) ) {
			$buffer .= '.p-wrap .entry-title, .author-box .author-title, .single-title.entry-title,';
			$buffer .= '.widget_recent_entries a, .nav-title, .deal-module .deal-title';
			$buffer .= '{text-transform: uppercase;}';
		}

		$content_bg_grid_6 = pixwell_get_option( 'content_bg_grid_6' );
		if ( ! empty( $content_bg_grid_6 ) && strlen( $content_bg_grid_6 ) >= 3 ) {
			$buffer .= '.p-grid-6 .p-content-wrap { background-color: ' . $content_bg_grid_6 . ';}';
		}

		$content_bg_list_6 = pixwell_get_option( 'content_bg_list_6' );
		$text_style_list_6 = pixwell_get_option( 'text_style_list_6' );
		if ( pixwell_is_color( $content_bg_list_6 ) ) {
			$buffer .= '.p-list-6 { background-color: ' . $content_bg_list_6 . ';}';
		}
		if ( ! empty( $text_style_list_6 ) && 'light' == $text_style_list_6 ) {
			$buffer .= '.fw-feat-14 .owl-dots { color: #fff; }';
		}

		$content_bg_list_7 = pixwell_get_option( 'content_bg_list_7' );
		$text_style_list_7 = pixwell_get_option( 'text_style_list_7' );

		if ( pixwell_is_color( $content_bg_list_7 ) ) {
			$buffer .= '.p-list-7 { background-color: ' . $content_bg_list_7 . ';}';
		}

		if ( ! empty( $text_style_list_7 ) && 'light' == $text_style_list_7 ) {
			$buffer .= '.fw-feat-15 .owl-dots { color: #fff; }';
		}

		if ( $footer_logo_height ) {
			$buffer .= '.footer-logo { --flogo-height: {' . intval( $footer_logo_height ) . 'px; }';
		}

		if ( class_exists( 'WooCommerce' ) ) {

			$wc_price_color = pixwell_get_option( 'wc_price_color' );
			$wc_sale_color  = pixwell_get_option( 'wc_sale_color' );

			if ( pixwell_is_color( $wc_price_color ) ) {
				$buffer .= '.woocommerce div.product .product-loop-content .price, .woocommerce .product .summary .price ';
				$buffer .= '{ color: ' . $wc_price_color . ';}';
			}

			if ( pixwell_is_color( $wc_sale_color ) ) {
				$buffer .= '.woocommerce span.onsale';
				$buffer .= '{ background-color: ' . $wc_sale_color . ';}';
			}
		}

		return $buffer;
	}
}

/** minify css */
if ( ! function_exists( 'pixwell_minify_dynamic_css' ) ) {
	function pixwell_minify_dynamic_css( $css ) {

		return preg_replace( '@({)\s+|(\;)\s+|/\*.+?\*\/|\R@is', '$1$2 ', $css );
	}
}

/**
 * @param $css
 * @param $folder_path
 * @param $file_path
 *
 * @return bool
 */
function pixwell_writable_css( $css, $folder_path, $file_path ) {

	$css_file = pixwell_get_option( 'css_file' );
	if ( empty( $css_file ) || ( defined( 'WP_DEBUG' ) && ! WP_DEBUG ) ) {
		return false;
	}

	global $wp_filesystem;

	if ( empty( $wp_filesystem ) ) {
		require_once( ABSPATH . '/wp-admin/includes/file.php' );
		WP_Filesystem();
	}

	if ( $wp_filesystem ) {
		$content = "/** Compiled CSS - Do not edit */\n" . $css;
		if ( is_readable( $folder_path ) || ( file_exists( $file_path ) && is_writable( $file_path ) ) ) {
			if ( $wp_filesystem->put_contents( $file_path, $content, FS_CHMOD_FILE ) ) {

				update_option( 'pixwell_dynamic_mode', 'file' );
				update_option( 'pixwell_dynamic_ctime', time() );

				return true;
			}
		}
	}

	return false;
}

/** write css */
if ( ! function_exists( 'pixwell_write_dynamic_css' ) ) {
	function pixwell_write_dynamic_css() {

		global $blog_id;
		$folder_path = get_theme_file_path( 'assets/css' );
		$file_path   = $folder_path . '/dynamic.css';

		if ( is_multisite() ) {
			$file_path = $folder_path . '/dynamic-blog-' . $blog_id . '.css';
		}

		$buffer   = pixwell_generate_styles();
		$buffer   = pixwell_minify_dynamic_css( $buffer );
		$writable = pixwell_writable_css( $buffer, $folder_path, $file_path );

		if ( ! $writable ) {
			$cache = addslashes( $buffer );
			update_option( 'pixwell_style_cache', $cache );
			update_option( 'pixwell_dynamic_mode', 'inline' );
		}
	}
}

/** dynamic css */
if ( ! function_exists( 'pixwell_main_dynamic_style' ) ) {
	function pixwell_main_dynamic_style() {

		global $blog_id;

		$mode    = get_option( 'pixwell_dynamic_mode' );
		$version = get_option( 'pixwell_dynamic_ctime' );

		if ( empty( $version ) && defined( 'PIXWELL_CORE_VERSION' ) ) {
			$version = PIXWELL_CORE_VERSION;
		}

		if ( ! defined( 'PIXWELL_DTHEME_DIR' ) || ! defined( 'PIXWELL_DTHEME_URI' ) ) {
			$file_path = get_theme_file_path( 'assets/css/dynamic.css' );
			$file_uri  = get_theme_file_uri( 'assets/css/dynamic.css' );
			if ( is_multisite() ) {
				$file_path = get_theme_file_path( 'assets/css/dynamic-blog-' . $blog_id . '.css' );
				$file_uri  = get_theme_file_uri( 'assets/css/dynamic-blog-' . $blog_id . '.css' );
			}
		} else {
			$file_path = PIXWELL_DTHEME_DIR . 'assets/css/dynamic.css';
			$file_uri  = PIXWELL_DTHEME_URI . 'assets/css/dynamic.css';

			if ( is_multisite() ) {
				$file_path = PIXWELL_DTHEME_DIR . 'assets/css/dynamic-blog-' . $blog_id . '.css';
				$file_uri  = PIXWELL_DTHEME_URI . 'assets/css/dynamic-blog-' . $blog_id . '.css';
			}
		}

		if ( 'file' == $mode && file_exists( $file_path ) ) {
			if ( pixwell_is_amp() ) {
				wp_enqueue_style( 'pixwell-dynamic-css', $file_uri, [ 'pixwell-style' ], $version, 'all' );
			} else {
				wp_enqueue_style( 'pixwell-dynamic-css', $file_uri, [ 'pixwell-main' ], $version, 'all' );
			}
		} else {
			$cache = get_option( 'pixwell_style_cache' );

			/** reload dynamic style */
			if ( empty( $cache ) ) {
				pixwell_write_dynamic_css();
			}

			$cache  = get_option( 'pixwell_style_cache' );
			$buffer = stripslashes( $cache );

			wp_add_inline_style( 'pixwell-main', $buffer );
		}
	}
}

/** create typography css */
if ( ! function_exists( 'pixwell_create_typo_css' ) ) {
	function pixwell_create_typo_css( $settings = [] ) {

		if ( ! is_array( $settings ) ) {
			return '';
		}

		if ( isset( $settings['google'] ) ) {
			unset ( $settings['google'] );
		}

		if ( isset( $settings['subsets'] ) ) {
			unset ( $settings['subsets'] );
		}
		if ( isset( $settings['font-options'] ) ) {
			unset ( $settings['font-options'] );
		}

		$buffer = '';

		if ( ! empty( $settings['font-backup'] ) && ! empty( $settings['font-family'] ) ) {
			$settings['font-family'] = $settings['font-family'] . ',' . $settings['font-backup'];
			unset ( $settings['font-backup'] );
		}

		foreach ( $settings as $key => $val ) {
			if ( '' != trim( $val ) ) {
				$buffer .= $key . ':' . $val . ';';
			}
		}

		return $buffer;
	}
}

/** create background css */
if ( ! function_exists( 'pixwell_create_background_css' ) ) {
	function pixwell_create_background_css( $settings ) {

		if ( ! is_array( $settings ) ) {
			return '';
		}

		$buffer = '';
		if ( ! empty( $settings['background-color'] ) ) {
			$buffer .= 'background-color : ' . $settings['background-color'] . ';';
		}
		if ( ! empty( $settings['background-repeat'] ) ) {
			$buffer .= 'background-repeat : ' . $settings['background-repeat'] . ';';
		}
		if ( ! empty( $settings['background-size'] ) ) {
			$buffer .= 'background-size : ' . $settings['background-size'] . ';';
		}
		if ( ! empty( $settings['background-image'] ) ) {
			$buffer .= 'background-image : url(' . esc_url( $settings['background-image'] ) . ');';
		}
		if ( ! empty( $settings['background-attachment'] ) ) {
			$buffer .= 'background-attachment : ' . $settings['background-attachment'] . ';';
		}
		if ( ! empty( $settings['background-position'] ) ) {
			$buffer .= 'background-position : ' . $settings['background-position'] . ';';
		}

		return $buffer;
	}
}