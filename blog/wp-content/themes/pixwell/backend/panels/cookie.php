<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

/** cookie */
if ( ! function_exists( 'pixwell_register_options_cookie' ) ) {
	function pixwell_register_options_cookie() {

		return [
			'id'     => 'pixwell_theme_ops_section_cookie',
			'title'  => esc_html__( 'GDPR Cookies', 'pixwell' ),
			'desc'   => esc_html__( 'Select settings for the cookie popup section.', 'pixwell' ),
			'icon'   => 'el el-info-circle',
			'fields' => [
				[
					'id'       => 'cookie_popup',
					'type'     => 'switch',
					'title'    => esc_html__( 'Cookie Popup', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle the visibility of the cookie popup section.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'cookie_popup_content',
					'type'     => 'textarea',
					'title'    => esc_html__( 'Cookie Content', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the content for the cookie popup section. HTML is allowed.', 'pixwell' ),
					'default'  => html_entity_decode( esc_html__( 'Our website uses cookies to improve your experience. Learn more about: <a href="#">Cookie Policy</a>', 'pixwell' ) ),
					'rows'     => 2,
				],
				[
					'id'       => 'cookie_popup_button',
					'type'     => 'text',
					'title'    => esc_html__( 'Cookie Button Text', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the text for the accept button.', 'pixwell' ),
					'default'  => esc_html__( 'Accept', 'pixwell' ),
				],
			],
		];
	}
}

