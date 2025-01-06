<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_register_options_logo' ) ) {
	/**
	 * @return array
	 * site logo
	 */
	function pixwell_register_options_logo() {

		return [
			'id'    => 'pixwell_config_section_site_logo',
			'title' => esc_html__( 'Logo', 'pixwell' ),
			'icon'  => 'el el-barcode',
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_logo_global' ) ) {
	/**
	 * @return array
	 * global logo
	 */
	function pixwell_register_options_logo_global() {

		return [
			'id'         => 'pixwell_config_section_logo',
			'title'      => esc_html__( 'Logos', 'pixwell' ),
			'desc'       => esc_html__( 'Upload logos to customize your website branding.', 'pixwell' ),
			'icon'       => 'el el-laptop',
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'info_add_favico',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'Go to "Settings > General > Site Icon" to add the favicon.', 'pixwell' ),
				],
				[
					'id'    => 'info_add_logo_dark',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => esc_html__( 'Make sure to set dark mode logos if you\'re using dark mode for your site.', 'pixwell' ),
				],
				[
					'id'          => 'site_logo',
					'type'        => 'media',
					'url'         => true,
					'preview'     => true,
					'title'       => esc_html__( 'Main Logo', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select or upload a logo for your website.', 'pixwell' ),
					'description' => esc_html__( 'The recommended height value is 60px.', 'pixwell' ),
				],
				[
					'id'          => 'site_logo_dark',
					'type'        => 'media',
					'url'         => true,
					'preview'     => true,
					'title'       => esc_html__( 'Dark Mode - Main Logo', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select or upload a logo for your website in dark mode.', 'pixwell' ),
					'description' => esc_html__( 'The image sizes should be the same as the main logo.', 'pixwell' ),
				],
				[
					'id'          => 'retina_site_logo',
					'type'        => 'media',
					'url'         => true,
					'preview'     => true,
					'title'       => esc_html__( 'Retina Main Logo', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select or upload a retina logo (x2 size).', 'pixwell' ),
					'description' => esc_html__( 'The recommended height value is 120px.', 'pixwell' ),
				],
				[
					'id'          => 'retina_site_logo_dark',
					'type'        => 'media',
					'url'         => true,
					'preview'     => true,
					'title'       => esc_html__( 'Dark Mode - Retina Main Logo', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select or upload a retina logo in dark mode.', 'pixwell' ),
					'description' => esc_html__( 'The image sizes should be the same as the retina main logo.', 'pixwell' ),
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_logo_sticky' ) ) {
	/**
	 * @return array
	 * global logo
	 */
	function pixwell_register_options_logo_sticky() {

		return [
			'id'         => 'pixwell_config_section_logo_sticky',
			'title'      => esc_html__( 'Sticky Logo', 'pixwell' ),
			'desc'       => esc_html__( 'Upload logos for you website.', 'pixwell' ),
			'icon'       => 'el el-laptop',
			'subsection' => true,
			'fields'     => [
				[
					'id'          => 'sticky_logo',
					'type'        => 'media',
					'url'         => true,
					'preview'     => true,
					'title'       => esc_html__( 'Sticky Logo', 'pixwell' ),
					'subtitle'    => esc_html__( 'Upload a logo for the sticky navigation.', 'pixwell' ),
					'description' => esc_html__( 'The recommended height value is 60px.', 'pixwell' ),
				],
				[
					'id'       => 'sticky_logo_dark',
					'type'     => 'media',
					'url'      => true,
					'preview'  => true,
					'title'    => esc_html__( 'Dark Mode - Sticky Logo ', 'pixwell' ),
					'subtitle' => esc_html__( 'Upload a logo for the sticky navigation in dark mode.', 'pixwell' ),
				],
				[
					'id'          => 'retina_sticky_logo',
					'type'        => 'media',
					'url'         => true,
					'preview'     => true,
					'title'       => esc_html__( 'Retina Sticky Logo', 'pixwell' ),
					'subtitle'    => esc_html__( 'Upload a retina logo (x2 size) for the sticky navigation.', 'pixwell' ),
					'description' => esc_html__( 'The recommended height value is 120px.', 'pixwell' ),
				],
				[
					'id'       => 'retina_sticky_logo_dark',
					'type'     => 'media',
					'url'      => true,
					'preview'  => true,
					'title'    => esc_html__( 'Dark Mode - Retina Sticky Logo', 'pixwell' ),
					'subtitle' => esc_html__( 'Upload a retina logo (x2 size) for the sticky navigation in dark mode.', 'pixwell' ),
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_logo_mobile' ) ) {
	/**
	 * @return array
	 */
	function pixwell_register_options_logo_mobile() {

		return [
			'id'         => 'pixwell_config_section_mobile_logo',
			'title'      => esc_html__( 'Mobile Logos', 'pixwell' ),
			'desc'       => esc_html__( 'Upload logos specifically for mobile devices.', 'pixwell' ),
			'icon'       => 'el el-iphone-home',
			'subsection' => true,
			'fields'     => [
				[
					'id'          => 'mobile_logo',
					'title'       => esc_html__( 'Mobile Logo', 'pixwell' ),
					'subtitle'    => esc_html__( 'Upload a retina logo specifically for displaying on mobile devices.', 'pixwell' ),
					'description' => esc_html__( 'The recommended height is 84px, which will be displayed at twice that size for retina screens.', 'pixwell' ),
					'type'        => 'media',
					'url'         => true,
					'preview'     => true,
				],
				[
					'id'          => 'mobile_logo_dark',
					'title'       => esc_html__( 'Dark Mode - Mobile Logo', 'pixwell' ),
					'subtitle'    => esc_html__( 'Upload a retina logo specifically for displaying on mobile devices in dark mode.', 'pixwell' ),
					'description' => esc_html__( 'Ensure that the image sizes match those of the regular mobile logo.', 'pixwell' ),
					'type'        => 'media',
					'url'         => true,
					'preview'     => true,
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_logo_transparent' ) ) {
	function pixwell_register_options_logo_transparent() {

		return [
			'id'         => 'pixwell_config_section_transparent_logo',
			'title'      => esc_html__( 'Transparent Logos', 'pixwell' ),
			'desc'       => esc_html__( 'Customize logos for the transprent headers.', 'pixwell' ),
			'icon'       => 'el el-photo',
			'subsection' => true,
			'fields'     => [
				[
					'id'          => 'site_logo_float',
					'type'        => 'media',
					'url'         => true,
					'preview'     => true,
					'title'       => esc_html__( 'Transparent Logo', 'pixwell' ),
					'subtitle'    => esc_html__( 'Upload a logo specifically for the transparent header.', 'pixwell' ),
					'description' => esc_html__( 'We recommend using a white logo with a height of 120px for optimal display.', 'pixwell' ),
				],
				[
					'id'       => 'retina_site_logo_float',
					'type'     => 'media',
					'url'      => true,
					'preview'  => true,
					'title'    => esc_html__( 'Retina Transparent Logo', 'pixwell' ),
					'subtitle' => esc_html__( 'Upload a retina logo for the transparent header (x2 size).', 'pixwell' ),
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_logo_left' ) ) {
	function pixwell_register_options_logo_left() {

		return [
			'id'         => 'pixwell_config_section_left_logo',
			'title'      => esc_html__( 'Left Side Logo', 'pixwell' ),
			'desc'       => esc_html__( 'Customize logos for the left side section.', 'pixwell' ),
			'icon'       => 'el el-braille',
			'subsection' => true,
			'fields'     => [
				[
					'id'          => 'off_canvas_header_logo',
					'type'        => 'media',
					'url'         => true,
					'preview'     => true,
					'title'       => esc_html__( 'Left Side Logo', 'pixwell' ),
					'subtitle'    => esc_html__( 'Upload a logo for the left side section.', 'pixwell' ),
					'description' => esc_html__( 'The recommended height value is x2 of the max height setting below.', 'pixwell' ),
					'default'     => '',
				],
				[
					'id'          => 'off_canvas_header_logo_height',
					'type'        => 'text',
					'validate'    => 'numeric',
					'class'       => 'small-text',
					'title'       => esc_html__( 'Max Height', 'pixwell' ),
					'subtitle'    => esc_html__( 'Input a height value for the left side logo.', 'pixwell' ),
					'description' => esc_html__( 'The recommended value is 90px.', 'pixwell' ),
					'default'     => '',
				],
			],
		];
	}
}
if ( ! function_exists( 'pixwell_register_options_logo_footer' ) ) {
	function pixwell_register_options_logo_footer() {

		return [
			'id'         => 'pixwell_config_section_footer_logo',
			'title'      => esc_html__( 'Footer Logo', 'pixwell' ),
			'desc'       => esc_html__( 'Customize the logo displayed in the footer of your website.', 'pixwell' ),
			'icon'       => 'el el-credit-card',
			'subsection' => true,
			'fields'     => [
				[
					'id'          => 'footer_logo',
					'title'       => esc_html__( 'Footer Logo', 'pixwell' ),
					'subtitle'    => esc_html__( 'Choose or upload a logo specifically for the footer.', 'pixwell' ),
					'description' => esc_html__( 'Recommended: Use a logo with twice the height for better display on retina screens.', 'pixwell' ),
					'type'        => 'media',
					'url'         => true,
					'preview'     => true,
				],
				[
					'id'          => 'footer_logo_dark',
					'title'       => esc_html__( 'Dark Mode - Footer Logo', 'pixwell' ),
					'subtitle'    => esc_html__( 'Choose or upload a footer logo specifically for dark mode.', 'pixwell' ),
					'description' => esc_html__( 'Ensure the image sizes match those of the regular footer logo.', 'pixwell' ),
					'type'        => 'media',
					'url'         => true,
					'preview'     => true,
				],
				[
					'id'          => 'footer_logo_url',
					'title'       => esc_html__( 'Custom Destination', 'pixwell' ),
					'subtitle'    => esc_html__( 'Enter a custom link for the footer logo.', 'pixwell' ),
					'description' => esc_html__( 'By default, clicking the footer logo will link to the homepage.', 'pixwell' ),
					'type'        => 'textarea',
					'rows'        => 1,
					'default'     => '',
				],
				[
					'id'       => 'footer_logo_height',
					'title'    => esc_html__( 'Logo Height', 'pixwell' ),
					'subtitle' => esc_html__( 'Specify the maximum height for the footer logo. It is recommended to set it at half the image size.', 'pixwell' ),
					'type'     => 'text',
					'default'  => '',
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_logo_favicon' ) ) {
	/**
	 * @return array
	 */
	function pixwell_register_options_logo_favicon() {

		return [
			'id'         => 'pixwell_config_section_logo_favicon',
			'title'      => esc_html__( 'Bookmarklet', 'pixwell' ),
			'desc'       => esc_html__( 'Choose or upload bookmarklet icons specifically for iOS and Android devices.', 'pixwell' ),
			'icon'       => 'el el-bookmark',
			'subsection' => true,
			'fields'     => [
				[
					'id'       => 'icon_touch_apple',
					'title'    => esc_html__( 'iOS Bookmarklet Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Upload an icon specifically for Apple touch devices (72 x 72px).', 'pixwell' ),
					'type'     => 'media',
					'url'      => true,
					'preview'  => true,
				],
				[
					'id'       => 'icon_touch_metro',
					'type'     => 'media',
					'title'    => esc_html__( 'Metro UI Bookmarklet Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Upload an icon specifically for Metro interface (144 x 144px).', 'pixwell' ),
					'url'      => true,
					'preview'  => true,
				],
			],
		];
	}
}
