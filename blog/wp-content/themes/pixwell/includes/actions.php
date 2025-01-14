<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

/** actions & filters */
add_action( 'after_switch_theme', 'pixwell_activate_redirect', 0 );
add_action( 'init', 'pixwell_single_load_next_endpoint', 10 );
add_action( 'wp_head', 'pixwell_script_settings' );
add_filter( 'comment_form_defaults', 'pixwell_add_comment_placeholder', 10 );
add_filter( 'body_class', 'pixwell_set_body_classes', 20 );
add_filter( 'get_archives_link', 'pixwell_archives_widget_span' );
add_action( 'wp_footer', 'pixwell_adblock_popup', 11 );
add_filter( 'wp_list_categories', 'pixwell_cat_widget_span' );
add_filter( 'widget_tag_cloud_args', 'pixwell_widget_tag_cloud_args' );
add_filter( 'previous_posts_link_attributes', 'pixwell_simple_pagination_class' );
add_filter( 'next_posts_link_attributes', 'pixwell_simple_pagination_class' );
add_filter( 'rb_add_reaction', 'pixwell_reaction_items' );

/** redirect to activate plugin */
if ( ! function_exists( 'pixwell_activate_redirect' ) ) {
	function pixwell_activate_redirect() {

		global $pagenow;

		$theme_options = get_option( 'pixwell_theme_options', false );
		if ( empty( $theme_options ) ) {
			$file = get_theme_file_path( 'backend/assets/defaults.json' );
			if ( file_exists( $file ) ) {
				ob_start();
				include $file;
				$response = ob_get_clean();
				$data     = json_decode( $response, true );
				if ( is_array( $data ) ) {
					set_transient( '_ruby_old_settings', $theme_options, 30 * 86400 );
					update_option( 'pixwell_theme_options', $data );
				}
			}
		}

		if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {

			$first_activate = get_option( 'pixwell_first_activate_theme', '' );
			if ( ! empty( $first_activate ) ) {
				update_option( 'pixwell_first_activate_theme', '1' );
			} else {
				add_option( 'pixwell_first_activate_theme', '1' );
			}
			wp_redirect( admin_url( 'admin.php?page=pixwell-plugins' ) );
			exit;
		}
	}
}

/** site body classes */
if ( ! function_exists( 'pixwell_set_body_classes' ) ) {
	function pixwell_set_body_classes( $classes ) {

		$settings = $settings = get_option( 'pixwell_theme_options', [] );

		if ( is_page_template( 'rbc-frontend.php' ) ) {
			$classes   = array_diff( $classes, [ 'page' ] );
			$classes[] = 'hfeed';

			$header_float         = rb_get_meta( 'header_float' );
			$navbar_border        = rb_get_meta( 'navbar_border' );
			$header_banner_border = rb_get_meta( 'header_banner_border' );

			if ( ! empty( $header_float ) && 1 == $header_float ) {
				$classes[] = 'is-header-float';
			}
			if ( ! empty( $navbar_border ) && - 1 == $navbar_border ) {
				$classes[] = 'none-nb';
			}
			if ( ! empty( $header_banner_border ) && 1 == $header_banner_border ) {
				$classes[] = 'is-bb';
			}
		}

		if ( is_single() ) {
			$layout = pixwell_get_single_layout();

			$classes[] = 'is-single-' . esc_attr( $layout );
			if ( ! empty( $settings['single_post_header_align'] ) ) {
				$classes[] = 'is-single-hc';
			}
		}

		if ( ! empty( $settings['exclusive_style'] ) ) {
			$classes[] = 'exclusive-style-' . trim( $settings['exclusive_style'] );
		}

		if ( ! empty( $settings['navbar_sticky'] ) ) {
			$classes[] = 'sticky-nav';

			if ( ! empty( $settings['navbar_sticky_smart'] ) ) {
				$classes[] = 'smart-sticky';
			}
		}

		if ( ! empty( $settings['off_canvas_style'] ) ) {
			$classes[] = 'off-canvas-light';
		}

		if ( ! empty( $settings['site_tooltips'] ) ) {
			$classes[] = 'is-tooltips';
		}

		if ( ! empty( $settings['site_back_to_top'] ) ) {
			$classes[] = 'is-backtop';
		}

		if ( ! empty( $settings['block_header_style'] ) ) {
			$classes[] = 'block-header-' . trim( $settings['block_header_style'] );
		}

		if ( ! empty( $settings['widget_header_style'] ) ) {
			$classes[] = 'w-header-' . trim( $settings['widget_header_style'] );
		}

		if ( ! empty( $settings['style_cat_icon'] ) ) {
			$classes[] = 'cat-icon-' . trim( $settings['style_cat_icon'] );
		}

		if ( ! empty( $settings['entry_meta_style'] ) ) {
			$classes[] = 'is-meta-border';
		}

		if ( ! empty( $settings['dark_mode_image_opacity'] ) ) {
			$classes[] = 'dark-opacity';
		}

		$style_element = ! empty( $settings['style_element'] ) ? $settings['style_element'] : false;

		if ( $style_element && 'none' !== $style_element ) {
			if ( $style_element === 'round' ) {
				$classes[] = 'ele-round';
			} elseif ( $style_element === 'round_all' ) {
				$classes[] = 'ele-round feat-round';
			}
		}

		if ( ! empty( $settings['single_post_parallax'] ) ) {
			$classes[] = 'is-parallax-feat';
		}

		if ( ! empty( $settings['feat_overlay'] ) ) {
			$classes[] = 'is-fmask';
		}

		if ( ! empty( $settings['pagination_layout'] ) && 'dark' == $settings['pagination_layout'] ) {
			$classes[] = 'is-dark-pag';
		}

		if ( ! empty( $settings['mobile_logo_pos'] ) && 'left' == $settings['mobile_logo_pos'] ) {
			$classes[] = 'mobile-logo-left';
		}

		if ( ! empty( $settings['readmore_mobile'] ) ) {
			$classes[] = 'mh-p-link';
		}

		if ( ! empty( $settings['excerpt_mobile'] ) ) {
			$classes[] = 'mh-p-excerpt';
		}

		if ( ! empty( $settings['site_layout'] ) ) {
			$classes[] = 'boxed';
		}

		if ( ! empty( $settings['dark_mode_cookie'] ) && (string) $settings['dark_mode_cookie'] === '1' ) {
			$classes[] = 'is-cmode';
		}

		return $classes;
	}
}

/**
 * @return string
 * add theme settings
 */
if ( ! function_exists( 'pixwell_script_settings' ) ) {
	function pixwell_script_settings() {

		$settings                    = [];
		$settings['sliderPlay']      = pixwell_get_option( 'slider_play' );
		$settings['sliderSpeed']     = pixwell_get_option( 'slider_speed' );
		$settings['textNext']        = pixwell_get_option( 'slider_next' );
		$settings['textPrev']        = pixwell_get_option( 'slider_prev' );
		$settings['sliderDot']       = pixwell_get_option( 'slider_dot' );
		$settings['sliderAnimation'] = pixwell_get_option( 'slider_animation' );

		if ( ! empty( $settings['sliderPlay'] ) ) {
			$settings['sliderPlay'] = 1;
		} else {
			$settings['sliderPlay'] = 0;
		}

		if ( ! empty( $settings['sliderDot'] ) ) {
			$settings['sliderDot'] = 1;
		} else {
			$settings['sliderDot'] = 0;
		}

		if ( empty( $settings['sliderSpeed'] ) ) {
			$settings['sliderSpeed'] = 5550;
		}

		if ( intval( $settings['sliderSpeed'] ) < 1500 ) {
			$settings['sliderSpeed'] = 1500;
		}

		if ( ! empty( $settings['embedRes'] ) ) {
			$settings['embedRes'] = 1;
		} else {
			$settings['embedRes'] = 0;
		}

		if ( ! empty( $settings['sliderAnimation'] ) ) {
			$settings['sliderAnimation'] = 1;
		} else {
			$settings['sliderAnimation'] = 0;
		}

		wp_localize_script( 'pixwell-global', 'themeSettings', [ wp_json_encode( $settings ) ] );
	}
}

/** comment placeholder */
if ( ! function_exists( 'pixwell_add_comment_placeholder' ) ) {
	function pixwell_add_comment_placeholder( $defaults ) {

		if ( ! empty( $defaults['fields']['author'] ) ) {
			$defaults['fields']['author'] = str_replace( '<input', '<input placeholder="' . pixwell_translate( 'your_name' ) . '"', $defaults['fields']['author'] );
		}
		if ( ! empty( $defaults['fields']['email'] ) ) {
			$defaults['fields']['email'] = str_replace( '<input', '<input placeholder="' . pixwell_translate( 'your_email' ) . '"', $defaults['fields']['email'] );
		}

		if ( ! empty( $defaults['fields']['url'] ) ) {
			$defaults['fields']['url'] = str_replace( '<input', '<input placeholder="' . pixwell_translate( 'your_website' ) . '"', $defaults['fields']['url'] );
		}

		if ( ! empty( $defaults['comment_field'] ) ) {
			$defaults['comment_field'] = str_replace( '<textarea', '<textarea placeholder="' . pixwell_translate( 'your_comment' ) . '"', $defaults['comment_field'] );
		}

		return $defaults;
	}
}

/** load next */
if ( ! function_exists( 'pixwell_single_load_next_endpoint' ) ) {
	function pixwell_single_load_next_endpoint() {

		$setting = pixwell_get_option( 'ajax_next_post' );
		if ( ! empty( $setting ) ) {
			add_rewrite_endpoint( 'rbsnp', EP_PERMALINK );
			flush_rewrite_rules();
		}

		return false;
	}
}

/**
 * add span tag for default categories widget
 */
if ( ! function_exists( 'pixwell_cat_widget_span' ) ) {
	function pixwell_cat_widget_span( $str ) {

		$pos = strpos( $str, '</a> (' );
		if ( false != $pos ) {
			$str = str_replace( '</a> (', '<span class="count">', $str );
			$str = str_replace( ')', '</span></a>', $str );
		}

		return $str;
	}
};

/**
 * add span tag for default archive widget
 */
if ( ! function_exists( 'pixwell_archives_widget_span' ) ) {
	function pixwell_archives_widget_span( $str ) {

		$pos = strpos( $str, '</a>&nbsp;(' );
		if ( false != $pos ) {
			$str = str_replace( '</a>&nbsp;(', '<span class="count">', $str );
			$str = str_replace( ')', '</span></a>', $str );
		}

		return $str;
	}
}

/**
 * @param $args
 *
 * @return mixed
 * tag filter
 */
if ( ! function_exists( 'pixwell_widget_tag_cloud_args' ) ) {
	function pixwell_widget_tag_cloud_args( $args ) {

		$args['largest']  = 1;
		$args['smallest'] = 1;

		return $args;
	}
}

/**
 * add class to simple pagination
 */
if ( ! function_exists( 'pixwell_simple_pagination_class' ) ) {
	function pixwell_simple_pagination_class() {

		return 'class="page-numbers"';
	}
}

/** reaction */
if ( ! function_exists( 'pixwell_reaction_items' ) ) {
	function pixwell_reaction_items( $defaults ) {

		$love   = pixwell_get_option( 'reaction_love' );
		$sad    = pixwell_get_option( 'reaction_sad' );
		$happy  = pixwell_get_option( 'reaction_happy' );
		$sleepy = pixwell_get_option( 'reaction_sleepy' );
		$angry  = pixwell_get_option( 'reaction_angry' );
		$dead   = pixwell_get_option( 'reaction_dead' );
		$wink   = pixwell_get_option( 'reaction_wink' );

		if ( empty( $love ) ) {
			unset ( $defaults['love'] );
		}
		if ( empty( $sad ) ) {
			unset ( $defaults['sad'] );
		}
		if ( empty( $happy ) ) {
			unset ( $defaults['happy'] );
		}
		if ( empty( $sleepy ) ) {
			unset ( $defaults['sleepy'] );
		}
		if ( empty( $angry ) ) {
			unset ( $defaults['angry'] );
		}
		if ( empty( $dead ) ) {
			unset ( $defaults['dead'] );
		}
		if ( empty( $wink ) ) {
			unset ( $defaults['wink'] );
		}

		return $defaults;
	}
}