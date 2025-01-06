<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

add_action( 'wp_head', 'pixwell_start_wp_head_buffer', 0 );
add_action( 'wp_head', 'pixwell_end_wp_head_buffer', PHP_INT_MAX );
add_action( 'wp_head', 'pixwell_preload_font_icon', 9 );
add_action( 'wp_enqueue_scripts', 'pixwell_enqueue_optimized', 1000 );

add_filter( 'wp_lazy_loading_enabled', 'pixwell_lazy_load' );
add_filter( 'wp_get_attachment_image_attributes', 'pixwell_optimize_featured_image', 10, 3 );

if ( ! function_exists( 'pixwell_start_wp_head_buffer' ) ) {
	function pixwell_start_wp_head_buffer() {

		if ( pixwell_is_amp() ) {
			return;
		}

		ob_start();
	}
}

if ( ! function_exists( 'pixwell_end_wp_head_buffer' ) ) {
	function pixwell_end_wp_head_buffer() {

		if ( pixwell_is_amp() ) {
			return;
		}

		$in = ob_get_clean();

		$preload_font         = pixwell_get_option( 'preload_gfonts' );
		$disable_google_fonts = pixwell_get_option( 'disable_google_font' );

		if ( ! empty( $disable_google_fonts ) ) {
			$preload_font = true;
		}

		if ( ! $preload_font || pixwell_is_amp() || is_admin() || ! empty( $_GET['elementor-preview'] ) ) {
			echo $in;

			return;
		}

		$markup = preg_replace( '/<!--(.*)-->/Uis', '', $in );
		preg_match_all( '#<link(?:\s+(?:(?!href\s*=\s*)[^>])+)?(?:\s+href\s*=\s*([\'"])((?:https?:)?\/\/fonts\.googleapis\.com\/css(?:(?!\1).)+)\1)(?:\s+[^>]*)?>#iU', $markup, $matches );

		if ( ! $matches[2] ) {
			echo $in;

			return;
		}

		$fonts_data    = [];
		$index         = 0;
		$fonts_string  = '';
		$subset_string = '';
		$add_pos       = '<link';

		foreach ( $matches[2] as $font ) {
			if ( ! preg_match( '/rel=["\']dns-prefetch["\']/', $matches[0][ $index ] ) ) {
				$font = str_replace( [ '%7C', '%7c' ], '|', $font );
				if ( strpos( $font, 'fonts.googleapis.com/css2' ) !== false ) {
					$font = rawurldecode( $font );
					$font = str_replace( [
						'css2?',
						'ital,wght@',
						'wght@',
						'ital@',
						'0,',
						'1,',
						':1',
						';',
						'&family=',
					], [ 'css?', '', '', '', '', 'italic', ':italic', ',', '%7C' ], $font );
				}
				$font      = explode( 'family=', $font );
				$font      = ( isset( $font[1] ) ) ? explode( '&', $font[1] ) : [];
				$this_font = array_values( array_filter( explode( '|', reset( $font ) ) ) );
				if ( ! empty( $this_font ) ) {
					$fonts_data[ $index ]['fonts'] = $this_font;
					$subset                        = ( is_array( $font ) ) ? end( $font ) : '';
					if ( false !== strpos( $subset, 'subset=' ) ) {
						$subset                          = str_replace( [ '%2C', '%2c' ], ',', $subset );
						$subset                          = explode( 'subset=', $subset );
						$fonts_data[ $index ]['subsets'] = explode( ',', $subset[1] );
					}
				}
				$in = str_replace( $matches[0][ $index ], '', $in );
			}
			$index ++;
		}

		foreach ( $fonts_data as $font ) {
			$fonts_string .= '|' . trim( implode( '|', $font['fonts'] ), '|' );
			if ( ! empty( $font['subsets'] ) ) {
				$subset_string .= ',' . trim( implode( ',', $font['subsets'] ), ',' );
			}
		}

		if ( ! empty( $subset_string ) ) {
			$subset_string = str_replace( ',', '%2C', ltrim( $subset_string, ',' ) );
			$fonts_string  = $fonts_string . '&#038;subset=' . $subset_string;
		}

		$fonts_string = str_replace( '|', '%7C', ltrim( $fonts_string, '|' ) );
		$fonts_string .= '&amp;display=swap';
		$fonts_html   = '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
		$fonts_html   .= '<link rel="preload" as="style" onload="this.onload=null;this.rel=\'stylesheet\'" href="https://fonts.googleapis.com/css?family=' . $fonts_string . '" crossorigin>';
		$fonts_html   .= '<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=' . $fonts_string . '"></noscript>';

		if ( $disable_google_fonts ) {
			$fonts_html = '';
		}

		echo substr_replace( $in, $fonts_html . $add_pos, strpos( $in, $add_pos ), strlen( $add_pos ) );
	}
}

if ( ! function_exists( 'pixwell_optimize_featured_image' ) ) {
	function pixwell_optimize_featured_image( $attr, $attachment, $size ) {

		if ( pixwell_get_option( 'disable_srcset' ) ) {
			unset( $attr['srcset'] );
			unset( $attr['sizes'] );
		}

		return $attr;
	}
}

if ( ! function_exists( 'pixwell_lazy_load' ) ) {
	function pixwell_lazy_load() {

		if ( empty( pixwell_get_option( 'lazy_load' ) ) ) {
			return false;
		} else {
			return true;
		}
	}
}

if ( ! function_exists( 'pixwell_preload_font_icon' ) ) {
	function pixwell_preload_font_icon() {

		if ( ! pixwell_get_option( 'preload_icon' ) ) {
			return;
		}

		echo sprintf(
			'<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin="anonymous">',
			get_theme_file_uri( 'assets/fonts/ruby-icon.woff2?v=10.7' )
		);
	}
}

if ( ! function_exists( 'pixwell_enqueue_optimized' ) ) {
	function pixwell_enqueue_optimized() {

		/** disable on elementor live editor */
		if ( ! empty( $_GET['elementor-preview'] ) ) {
			return;
		}

		if ( pixwell_get_option( 'disable_dashicons' ) && ! is_user_logged_in() ) {
			wp_deregister_style( 'dashicons' );
		}
		if ( pixwell_get_option( 'disable_block_style' ) && ( is_page_template( 'rbc-frontend.php' ) || pixwell_built_with_elementor() ) && ! is_admin() ) {
			wp_deregister_style( 'wp-block-library' );
		}
	}
}