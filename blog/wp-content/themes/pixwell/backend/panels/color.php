<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;
/* color config */
if ( ! function_exists( 'pixwell_register_options_color' ) ) {
	function pixwell_register_options_color() {

		return [
			'id'     => 'pixwell_config_section_color',
			'title'  => esc_html__( 'Color', 'pixwell' ),
			'desc'   => esc_html__( 'Customize the colors used throughout your website.', 'pixwell' ),
			'icon'   => 'el el-tint',
			'fields' => [
				[
					'id'     => 'section_start_global_color',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Global', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'          => 'global_color',
					'title'       => esc_html__( 'Global Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Choose a global color scheme.', 'pixwell' ),
					'description' => esc_html__( 'This setting affects all links, menus, category overlays, main page elements, and other contrasting elements across your website.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'          => 'global_color_dark',
					'title'       => esc_html__( 'Dark Mode - Global Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Choose a global color scheme for dark mode.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'     => 'section_end_global_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_elements_color',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Elements', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'          => 'hyperlink_color',
					'title'       => esc_html__( 'Hyperlink Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Choose a color for hyperlinks within post content.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'          => 'hyperlink_color_dark',
					'title'       => esc_html__( 'Dark Mode - Hyperlink Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Choose a color for hyperlinks within post content in dark mode.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'          => 'review_color',
					'title'       => esc_html__( 'Review Icon Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Choose a color for the review icon.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'          => 'review_color_dark',
					'title'       => esc_html__( 'Dark Mode - Review Icon Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Choose a color for the review icon in dark mode.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'          => 'popup_bg_color',
					'title'       => esc_html__( 'Gallery Popup Background', 'pixwell' ),
					'subtitle'    => esc_html__( 'Choose a background color for the gallery lightbox.', 'pixwell' ),
					'description' => esc_html__( 'A darker shade is recommended for better visibility.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'     => 'section_end_elements_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],

			],
		];
	}
}
