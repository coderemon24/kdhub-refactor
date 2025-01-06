<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

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

if ( ! function_exists( 'pixwell_is_elementor_active' ) ) {
	function pixwell_is_elementor_active() {

		if ( class_exists( 'Elementor\\Plugin' ) || ( function_exists( 'is_plugin_active' ) && is_plugin_active( 'elementor/elementor.php' ) ) ) {
			return true;
		}

		return false;
	}
}

if ( ! function_exists( 'pixwell_is_amp' ) ) {
	function pixwell_is_amp() {

		return function_exists( 'amp_is_request' ) && amp_is_request();
	}
}

if ( ! function_exists( 'pixwell_decode_shortcode' ) ) {
	function pixwell_decode_shortcode( $shortcode ) {

		return base64_decode( $shortcode, true );
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

if ( ! function_exists( 'pixwell_count_content' ) ) {
	function pixwell_count_content( $content = '' ) {

		if ( empty( $content ) ) {
			return 0;
		}

		$content = preg_replace( '/(<\/[^>]+?>)(<[^>\/][^>]*?>)/', '$1 $2', $content );
		$content = nl2br( $content );
		$content = strip_tags( $content );
		if ( preg_match( "/[\x{4e00}-\x{9fa5}]+/u", $content ) ) {
			$count = mb_strlen( $content, get_bloginfo( 'charset' ) );
		} elseif ( preg_match( "/[А-Яа-яЁё]/u", $content ) ) {
			$count = count( preg_split( '~[^\p{L}\p{N}\']+~u', $content ) );
		} elseif ( preg_match( "/[\x{1100}-\x{11FF}\x{3130}-\x{318F}\x{AC00}-\x{D7A3}]+/u", $content ) ) {
			$count = count( preg_split( '/[^\p{L}\p{N}\']+/', $content ) );
		} elseif ( preg_match( "/[\x{3040}-\x{309F}\x{30A0}-\x{30FF}]+/u", $content ) ) {
			$count = count( preg_split( '/[^\p{L}\p{N}\']+/', $content ) );
		} else {
			$count = count( preg_split( '/\s+/', $content ) );
		}

		return $count;
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

		$protocol = 'https';
		if ( ! is_ssl() ) {
			$protocol = 'http';
		}

		return $protocol;
	}
}

if ( ! function_exists( 'pixwell_pretty_number' ) ) {
	function pixwell_pretty_number( $number ) {

		$number = intval( $number );
		if ( $number > 999999 ) {
			$number = str_replace( '.00', '', number_format( ( $number / 1000000 ), 2 ) ) . esc_attr__( 'M', 'pixwell-core' );
		} elseif ( $number > 999 ) {
			$number = str_replace( '.0', '', number_format( ( $number / 1000 ), 1 ) ) . esc_attr__( 'k', 'pixwell-core' );
		}

		return $number;
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

if ( ! function_exists( 'pixwell_built_with_elementor' ) ) {
	function pixwell_built_with_elementor() {

		if ( ! is_page() ) {
			return false;
		}

		if ( class_exists( 'Elementor\Plugin' ) ) {
			$document = Elementor\Plugin::$instance->documents->get( get_the_ID() );

			if ( $document && $document->is_built_with_elementor() ) {
				return true;
			}
		}

		return false;
	}
}