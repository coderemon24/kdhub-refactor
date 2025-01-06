<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'rb_get_meta' ) ) {
	function rb_get_meta( $id, $post_id = null ) {

		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}

		if ( empty( $post_id ) ) {
			return false;
		}

		$rb_meta = get_post_meta( $post_id, 'rb_global_meta', true );
		if ( ! empty( $rb_meta[ $id ] ) ) {

			if ( is_array( $rb_meta[ $id ] ) && isset( $rb_meta[ $id ]['placebo'] ) ) {
				unset( $rb_meta[ $id ]['placebo'] );
			}

			return $rb_meta[ $id ];
		}

		return false;
	}
}

if ( ! function_exists( 'pixwell_get_option' ) ) {
	function pixwell_get_option( $option_name = '', $default = false ) {

		$settings = get_option( 'pixwell_theme_options', [] );
		if ( empty( $option_name ) ) {
			return $settings;
		}

		if ( ! empty( $settings[ $option_name ] ) ) {
			return $settings[ $option_name ];
		}

		return $default;
	}
}

if ( ! function_exists( 'pixwell_strip_tags' ) ) {
	function pixwell_strip_tags( $content, $allowed_tags = '<h1><h2><h3><h4><h5><h6><strong><b><em><i><a><code><p><div><ol><ul><li><br><img>' ) {

		return strip_tags( $content, $allowed_tags );
	}
}

if ( ! function_exists( 'pixwell_render_inline_html' ) ) {
	function pixwell_render_inline_html( $content ) {

		echo pixwell_strip_tags( $content );
	}
}

if ( ! function_exists( 'rb_get_term_meta' ) ) {
	function rb_get_term_meta( $key, $term_id = null ) {

		if ( empty( $term_id ) ) {
			$term_id = get_queried_object_id();
		}

		// get meta fields from option table
		$metas = get_metadata( 'term', $term_id, $key, true );

		/** fallback */
		if ( empty( $metas ) ) {
			$metas = get_option( $key );
			$metas = isset( $metas[ $term_id ] ) ? $metas[ $term_id ] : [];
		}

		if ( empty( $metas ) || ! is_array( $metas ) ) {
			return [];
		}

		return $metas;
	}
}

if ( ! function_exists( 'pixwell_is_amp' ) ) {
	function pixwell_is_amp() {

		return function_exists( 'amp_is_request' ) && amp_is_request();
	}
}

if ( ! function_exists( 'pixwell_convert_to_id' ) ) {
	function pixwell_convert_to_id( $name ) {

		$name = strtolower( strip_tags( $name ) );
		$name = str_replace( ' ', '-', $name );

		return preg_replace( '/[^A-Za-z0-9\-]/', '', $name );
	}
}

if ( ! function_exists( 'pixwell_protocol' ) ) {
	function pixwell_protocol() {

		if ( ! is_ssl() ) {
			return 'http';
		}

		return 'https';
	}
}

if ( ! function_exists( 'pixwell_get_theme_mode' ) ) {
	function pixwell_get_theme_mode() {

		return 'default';
	}
}

if ( ! function_exists( 'pixwell_pretty_number' ) ) {
	function pixwell_pretty_number( $number ) {

		$number = intval( $number );

		if ( $number > 999999 ) {
			$number = str_replace( '.00', '', number_format( ( $number / 1000000 ), 2 ) ) . esc_attr__( 'M', 'pixwell' );
		} elseif ( $number > 999 ) {
			$number = str_replace( '.0', '', number_format( ( $number / 1000 ), 1 ) ) . esc_attr__( 'k', 'pixwell' );
		}

		return $number;
	}
}

if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {

		do_action( 'wp_body_open' );
	}
}

if ( ! function_exists( 'pixwell_getimagesize' ) ) {
	function pixwell_getimagesize( $image ) {

		if ( empty( $image ) ) {
			return false;
		}

		return @getimagesize( $image );
	}
}

if ( ! function_exists( 'pixwell_get_crop_sizes' ) ) {
	function pixwell_get_crop_sizes() {

		$settings = get_option( 'pixwell_theme_options', [] );
		$crop     = true;
		if ( ! empty( $settings['pos_feat'] ) && ( 'top' === $settings['pos_feat'] ) ) {
			$crop = [ 'center', 'top' ];
		}

		$sizes = [
			'pixwell_370x250'    => [ 370, 250, $crop ],
			'pixwell_370x250-2x' => [ 740, 500, $crop ],
			'pixwell_370x250-3x' => [ 1110, 750, $crop ],
			'pixwell_280x210'    => [ 280, 210, $crop ],
			'pixwell_280x210-2x' => [ 560, 420, $crop ],
			'pixwell_400x450'    => [ 400, 450, $crop ],
			'pixwell_400x600'    => [ 400, 600, $crop ],
			'pixwell_450x0'      => [ 450, 0, $crop ],
			'pixwell_780x0'      => [ 780, 0, $crop ],
			'pixwell_780x0-2x'   => [ 1600, 0, $crop ],
		];

		foreach ( $sizes as $crop_id => $size ) {
			if ( empty( $settings[ $crop_id ] ) ) {
				unset( $sizes[ $crop_id ] );
			}
		}

		if ( ! empty( $settings['featured_crop_sizes'] ) && is_array( $settings['featured_crop_sizes'] ) ) {
			foreach ( $settings['featured_crop_sizes'] as $custom_size ) {
				if ( ! empty( $custom_size ) ) {
					$custom_size = preg_replace( '/\s+/', '', $custom_size );;
					$hw = explode( 'x', $custom_size );
					if ( isset( $hw[0] ) && isset( $hw[1] ) ) {
						$crop_id           = 'pixwell_' . $custom_size;
						$sizes[ $crop_id ] = [ absint( $hw[0] ), absint( $hw[1] ), $crop ];
					}
				}
			}
		}

		return $sizes;
	}
}
