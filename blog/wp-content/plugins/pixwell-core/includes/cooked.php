<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

add_filter( 'cooked_get_settings', 'pixwell_cooked_restore_content' );
add_filter( 'cooked_default_content', 'pixwell_cooked_default_content' );

if ( ! function_exists( 'pixwell_cooked_default_content' ) ) {
	function pixwell_cooked_default_content() {

		return '<p>[cooked-info left="author,taxonomies,difficulty" right="print,fullscreen"]</p><p>[cooked-excerpt]</p><p>[cooked-info left="servings" right="prep_time,cook_time,total_time"]</p><p>[cooked-ingredients]</p><p>[cooked-directions]</p><p>[cooked-gallery]</p>';
	}
}

if ( ! function_exists( 'pixwell_cooked_restore_content' ) ) {
	function pixwell_cooked_restore_content( $settings ) {

		if ( empty( $settings['default_content'] ) ) {
			$settings['default_content'] = pixwell_cooked_default_content();
		}

		return $settings;
	}
}
