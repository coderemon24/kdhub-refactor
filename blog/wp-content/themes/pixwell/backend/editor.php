<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

add_action( 'after_switch_theme', 'pixwell_delete_editor_styles_cache' );
add_action( 'redux/options/pixwell_theme_options/saved', 'pixwell_delete_editor_styles_cache' );
add_action( 'redux/options/pixwell_theme_options/reset', 'pixwell_delete_editor_styles_cache' );
add_action( 'redux/options/pixwell_theme_options/section/reset', 'pixwell_delete_editor_styles_cache' );
add_action( 'admin_enqueue_scripts', 'pixwell_register_script_backend' );
add_action( 'enqueue_block_editor_assets', 'pixwell_enqueue_editor', 90 );
add_action( 'enqueue_block_editor_assets', 'pixwell_editor_dynamic', 99 );

/** register backend scripts */
if ( ! function_exists( 'pixwell_register_script_backend' ) ) {
	function pixwell_register_script_backend( $hook ) {

		if ( $hook == 'post.php' || $hook == 'post-new.php' || 'widgets.php' == $hook || 'nav-menus.php' == $hook || 'term.php' == $hook ) {
			wp_register_style( 'pixwell-admin', get_theme_file_uri( 'backend/assets/admin.css' ), [], PIXWELL_THEME_VERSION, 'all' );
			wp_enqueue_style( 'pixwell-admin' );
		}
	}
}
/** load editor styles */
if ( ! function_exists( 'pixwell_enqueue_editor' ) ) {
	function pixwell_enqueue_editor() {

		wp_register_style( 'pixwell-editor-font', esc_url_raw( Pixwell_Font::get_instance()->get_font_url() ), [], PIXWELL_THEME_VERSION, 'all' );
		if ( is_rtl() ) {
			wp_enqueue_style( 'pixwell-editor-style', get_theme_file_uri( 'backend/assets/editor-rtl.css' ), [ 'pixwell-editor-font' ], PIXWELL_THEME_VERSION, 'all' );
		} else {
			wp_enqueue_style( 'pixwell-editor-style', get_theme_file_uri( 'backend/assets/editor.css' ), [ 'pixwell-editor-font' ], PIXWELL_THEME_VERSION, 'all' );
		}
	}
}

/** dynamic editor */
if ( ! function_exists( 'pixwell_editor_dynamic' ) ) {
	function pixwell_editor_dynamic() {

		$cache = get_option( 'pixwell_editor_cache' );
		if ( empty( $cache ) ) {
			$editor_css = '';

			$font_body = pixwell_get_option( 'font_body' );

			/** font body */
			if ( ! empty( $font_body['font-family'] ) ) {
				$editor_css .= '.edit-post-layout__content p, .edit-post-layout__content, .editor-styles-wrapper, .wp-block-file,';
				$editor_css .= '.edit-post-layout__content .wp-block-latest-comments__comment-link, .edit-post-layout__content .wp-block-latest-posts__list a,';
				$editor_css .= '.edit-post-editor-regions__content p, .edit-post-layout__content, .editor-styles-wrapper p:not(.gb-description), .editor-styles-wrapper, .wp-block-file,';
				$editor_css .= '.edit-post-editor-regions__content .wp-block-latest-comments__comment-link, .edit-post-editor-regions__content .wp-block-latest-posts__list a';
				$editor_css .= '{font-family: ' . $font_body['font-family'] . ' !important;';
				if ( ! empty( $font_body['font-size'] ) ) {
					$editor_css .= 'font-size: ' . $font_body['font-size'] . ';';
				}
				$editor_css .= '}';
			}

			$font_h1        = pixwell_get_option( 'font_h1' );
			$font_h2        = pixwell_get_option( 'font_h2' );
			$font_h3        = pixwell_get_option( 'font_h3' );
			$font_h4        = pixwell_get_option( 'font_h4' );
			$font_h5        = pixwell_get_option( 'font_h5' );
			$font_h6        = pixwell_get_option( 'font_h6' );
			$font_post_meta = pixwell_get_option( 'font_post_meta' );
			$font_h1_size   = pixwell_get_option( 'font_h1_size' );
			$font_h2_size   = pixwell_get_option( 'font_h2_size' );
			$font_h3_size   = pixwell_get_option( 'font_h3_size' );
			$font_h4_size   = pixwell_get_option( 'font_h4_size' );
			$font_h5_size   = pixwell_get_option( 'font_h5_size' );
			$font_h6_size   = pixwell_get_option( 'font_h6_size' );
			$global_color   = pixwell_get_option( 'global_color' );

			if ( ! empty( $font_h1['font-family'] ) ) {
				$editor_css .= '.editor-styles-wrapper .wp-block h1, .rtl .editor-styles-wrapper .wp-block h1 {' . pixwell_create_typo_css( $font_h1 ) . '}';

				$editor_css .= '.editor-post-title__block .editor-post-title__input,';
				$editor_css .= '.wp-block-cover h2, .wp-block-quote, .wp-block-pullquote, .wp-block-quote:not(.is-large):not(.is-style-large),';
				$editor_css .= '.edit-post-layout__content .wp-block-quote, .edit-post-layout__content .wp-block-quote:not(.is-large):not(.is-style-large),';
				$editor_css .= '.editor-post-title__block .editor-post-title__input,';
				$editor_css .= '.wp-block-cover h2, .wp-block-quote, .wp-block-pullquote, .wp-block-quote:not(.is-large):not(.is-style-large),';
				$editor_css .= '.edit-post-editor-regions__content .wp-block-quote,';
				$editor_css .= '.edit-post-editor-regions__content .wp-block-quote:not(.is-large):not(.is-style-large)';
				$editor_css .= '{font-family: ' . $font_h1['font-family'] . ' !important;';
				if ( ! empty( $font_h1['font-weight'] ) ) {
					$editor_css .= 'font-weight: ' . $font_h1['font-weight'] . ';';
				}
				if ( ! empty( $font_h1['color'] ) ) {
					$editor_css .= 'color: ' . $font_h1['color'] . ';';
				}
				$editor_css .= '}';
			}

			if ( ! empty( $font_h2['font-family'] ) ) {
				$editor_css .= '.editor-styles-wrapper .wp-block h2, .rtl .editor-styles-wrapper .wp-block h2 {' . pixwell_create_typo_css( $font_h2 ) . '}';
			}

			if ( ! empty( $font_h3['font-family'] ) ) {
				$editor_css .= '.editor-styles-wrapper .wp-block h3, .rtl .editor-styles-wrapper .wp-block h3 {' . pixwell_create_typo_css( $font_h3 ) . '}';
			}

			if ( ! empty( $font_h4['font-family'] ) ) {
				$editor_css .= '.editor-styles-wrapper .wp-block h4, .rtl .editor-styles-wrapper .wp-block h4 {' . pixwell_create_typo_css( $font_h4 ) . '}';
			}

			if ( ! empty( $font_h5['font-family'] ) ) {
				$editor_css .= '.editor-styles-wrapper .wp-block h5, .rtl .editor-styles-wrapper .wp-block h5 {' . pixwell_create_typo_css( $font_h5 ) . '}';
			}

			if ( ! empty( $font_h6['font-family'] ) ) {
				$editor_css .= '.editor-styles-wrapper .wp-block h6, .rtl .editor-styles-wrapper .wp-block h6 {' . pixwell_create_typo_css( $font_h6 ) . '}';
			}

			if ( ! empty( $font_post_meta['font-family'] ) ) {
				$editor_css .= '.wp-block-quote__citation, .wp-block-pullquote__citation, .wp-block-image figcaption,';
				$editor_css .= '.edit-post-layout__content .wp-block-archives-dropdown select,';
				$editor_css .= '.edit-post-layout__content .wp-block-latest-posts__post-date,';
				$editor_css .= '.edit-post-layout__content .wp-block-latest-comments__comment-date,';
				$editor_css .= '.edit-post-editor-regions__content .wp-block-archives-dropdown select,';
				$editor_css .= '.edit-post-editor-regions__content .wp-block-latest-posts__post-date,';
				$editor_css .= '.edit-post-editor-regions__content .wp-block-latest-comments__comment-date';
				$editor_css .= '{' . pixwell_create_typo_css( $font_post_meta ) . '}';
			}

			if ( ! empty( $font_h1_size ) ) {
				$editor_css .= '.editor-styles-wrapper .wp-block h1 {font-size: ' . absint( $font_h1_size ) . 'px; }';
			}
			if ( ! empty( $font_h2_size ) ) {
				$editor_css .= '.editor-styles-wrapper .wp-block h2 {font-size: ' . absint( $font_h2_size ) . 'px; }';
			}
			if ( ! empty( $font_h3_size ) ) {
				$editor_css .= '.editor-styles-wrapper .wp-block h3 {font-size: ' . absint( $font_h3_size ) . 'px; }';
			}
			if ( ! empty( $font_h4_size ) ) {
				$editor_css .= '.edit-post-layout__content .wp-block-latest-comments__comment-link, .edit-post-layout__content .wp-block-latest-posts__list a,';
				$editor_css .= '.edit-post-editor-regions__content .wp-block-latest-comments__comment-link, .edit-post-editor-regions__content .wp-block-latest-posts__list a,';
				$editor_css .= '.editor-styles-wrapper .wp-block h4 {font-size: ' . absint( $font_h4_size ) . 'px; }';
			}
			if ( ! empty( $font_h5_size ) ) {
				$editor_css .= '.editor-styles-wrapper .wp-block h5 {font-size: ' . absint( $font_h5_size ) . 'px; }';
			}
			if ( ! empty( $font_h6_size ) ) {
				$editor_css .= '.editor-styles-wrapper .wp-block h6 {font-size: ' . absint( $font_h6_size ) . 'px; }';
			}

			if ( ! empty( $global_color ) && '#ff8763' != strtolower( $global_color ) ) {
				$editor_css .= '.wp-block-button.is-style-outline, .wp-block-button.is-style-outline:hover,';
				$editor_css .= '.wp-block-button.is-style-outline:focus, .wp-block-button.is-style-outline:active,';
				$editor_css .= '.wp-block-file .wp-block-file__textlink, .wp-block-file .wp-block-file__textlink:hover,';
				$editor_css .= '.editor-styles-wrapper .editor-block-list__layout a, .block-editor-rich-text__editable a ';
				$editor_css .= '{ color: ' . $global_color . '}';
				$editor_css .= '.wp-block-file .wp-block-file__button';
				$editor_css .= '{ background-color: ' . $global_color . '}';
			}

			$cache = addslashes( $editor_css );
			delete_option( 'pixwell_editor_cache' );
			add_option( 'pixwell_editor_cache', $cache );
		} else {
			$editor_css = stripslashes( $cache );
		}

		if ( ! empty( $editor_css ) ) {
			wp_add_inline_style( 'pixwell-editor-style', $editor_css );
		}
	}
}

if ( ! function_exists( 'pixwell_delete_editor_styles_cache' ) ) {
	function pixwell_delete_editor_styles_cache() {

		delete_option( 'pixwell_editor_cache' );

		return false;
	}
}