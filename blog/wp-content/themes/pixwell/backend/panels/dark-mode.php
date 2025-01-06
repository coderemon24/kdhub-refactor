<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_register_options_dark_mode' ) ) {
	function pixwell_register_options_dark_mode() {

		return [
			'id'     => 'pixwell_config_section_dark_mode',
			'title'  => esc_html__( 'Dark Mode', 'pixwell' ),
			'desc'   => esc_html__( 'Customize dark mode for your website.', 'pixwell' ),
			'icon'   => 'el el-adjust',
			'fields' => [
				[
					'id'    => 'dark_mode_logo_notice',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => esc_html__( 'Ensure dark mode settings are configured, including logos and colors.', 'pixwell' ),
				],
				[
					'id'    => 'dark_mode_notice',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'You can set custom dark mode background in "Global Colors > Dark Mode Background".', 'pixwell' ),
				],
				[
					'id'     => 'section_start_dark_mode',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Global', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'          => 'dark_mode',
					'title'       => esc_html__( 'Dark Mode', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select settings for the dark mode.', 'pixwell' ),
					'description' => esc_html__( 'In browser mode, switching modes not be allowed. However, you need to set up colors and data for both light and dark modes.', 'pixwell' ),
					'type'        => 'select',
					'options'     => [
						'0'       => esc_html__( 'Disable Dark Mode', 'pixwell' ),
						'1'       => esc_html__( 'Light/Dark Switchable', 'pixwell' ),
						'dark'    => esc_html__( 'Dark Mode Only', 'pixwell' ),
						'browser' => esc_html__( 'Based on Browser', 'pixwell' ),
					],
					'default'     => '0',
				],
				[
					'id'     => 'section_end_dark_mode',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_dark_mode_switchable',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'for Light/Dark Switchable', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'          => 'dark_mode_cookie',
					'title'       => esc_html__( 'Preventing Dark Mode Flickering', 'pixwell' ),
					'subtitle'    => esc_html__( 'Use cookies or JS function after Body tag to prevent background flickering during page load.', 'pixwell' ),
					'description' => esc_html__( 'The theme uses localStorage as the default for dark mode to reduce server usage.', 'pixwell' ),
					'type'        => 'select',
					'options'     => [
						'0' => esc_html__( 'Default (Footer Script)', 'pixwell' ),
						'2' => esc_html__( 'Move JS Function after Body Tag', 'pixwell' ),
						'1' => esc_html__( 'Use Cookies Method', 'pixwell' ),
					],
					'default'     => '2',
				],
				[
					'id'          => 'first_visit_mode',
					'title'       => esc_html__( 'Mode First Time Visit', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a color scheme for your website when users visit your site at the first time.', 'pixwell' ),
					'description' => esc_html__( 'Based on browser will set the website\'s color scheme to either light or dark mode based on the user\'s browser settings on their first visit.', 'pixwell' ),
					'type'        => 'select',
					'options'     => [
						'default' => esc_html__( 'Light', 'pixwell' ),
						'dark'    => esc_html__( 'Dark', 'pixwell' ),
						'browser' => esc_html__( 'Based on Browser', 'pixwell' ),
					],
					'default'     => 'default',
				],
				[
					'id'     => 'section_end_dark_mode_switchable',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_dark_mode_image',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Featured Image', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'dark_mode_image_opacity',
					'title'    => esc_html__( 'Image Opacity', 'pixwell' ),
					'subtitle' => esc_html__( 'Reduce the featured image opacity when enabled dark mode.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'     => 'section_end_dark_mode_image',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}
