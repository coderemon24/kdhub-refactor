<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

add_filter( 'widget_text', 'do_shortcode' );
add_filter( 'upload_mimes', 'pixwell_svg_upload_supported', 10, 1 );
add_filter( 'wp_get_attachment_image_src', 'pixwell_support_gif', 10, 4 );

if ( ! function_exists( 'pixwell_svg_upload_supported' ) ) {
	function pixwell_svg_upload_supported( $mime_types = [] ) {

		if ( pixwell_get_option( 'svg_support' ) ) {
			$mime_types['svg']  = 'image/svg+xml';
			$mime_types['svgz'] = 'image/svg+xml';
		}

		return $mime_types;
	}
}

if ( ! function_exists( 'pixwell_support_gif' ) ) {
	function pixwell_support_gif( $image, $attachment_id, $size, $icon ) {

		$gif_support = pixwell_get_option( 'gif_support' );

		if ( ! empty( $gif_support ) && ! empty( $image[0] ) ) {
			$format = wp_check_filetype( $image[0] );

			if ( ! empty( $format ) && 'gif' == $format['ext'] && 'full' != $size ) {
				return wp_get_attachment_image_src( $attachment_id, $size = 'full', $icon );
			}
		}

		return $image;
	}
}