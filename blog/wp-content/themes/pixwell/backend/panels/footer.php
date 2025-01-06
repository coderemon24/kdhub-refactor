<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

/* footer config */
if ( ! function_exists( 'pixwell_register_options_footer' ) ) {
	function pixwell_register_options_footer() {

		return [
			'id'     => 'pixwell_config_section_footer',
			'title'  => esc_html__( 'Footer', 'pixwell' ),
			'desc'   => esc_html__( 'Customize your website footer.', 'pixwell' ),
			'icon'   => 'el el-credit-card',
			'fields' => [
				[
					'id'    => 'info_footer',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'Navigate to "Appearance > Widgets" to add content for your website footer.', 'pixwell' ),
				],
				[
					'id'     => 'section_start_footer_style',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'General', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'footer_widget_layout',
					'type'     => 'select',
					'title'    => esc_html__( 'Widget Section Layout', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a layout for the widget section in the footer.', 'pixwell' ),
					'options'  => [
						'1' => esc_html__( '4 Columns', 'pixwell' ),
						'2' => esc_html__( '4 Columns with 1st Big', 'pixwell' ),
						'3' => esc_html__( '3 Columns + 1 FullWidth Section', 'pixwell' ),
						'4' => esc_html__( '1 FullWidth Section + 3 Columns', 'pixwell' ),
						'5' => esc_html__( '3 Columns', 'pixwell' ),
					],
					'default'  => '1',
				],
				[
					'id'          => 'footer_background',
					'type'        => 'background',
					'transparent' => false,
					'title'       => esc_html__( 'Footer Background', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a background for your site footer.', 'pixwell' ),
				],
				[
					'id'       => 'footer_text_style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Text Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a text style to suit with the footer background.', 'pixwell' ),
					'options'  => pixwell_add_settings_text_style(),
					'default'  => 'dark',
				],
				[
					'id'       => 'footer_social',
					'type'     => 'switch',
					'title'    => esc_html__( 'Social Icons', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the social icons in the footer.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'footer_social_color',
					'type'     => 'switch',
					'title'    => esc_html__( 'Colorful Icons', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable color for the social icons.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'     => 'section_end_meta_footer_style',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_footer_menu',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Footer Menu', 'pixwell' ),
					'notice' => [
						esc_html__( 'The footer menu requires a menu. Navigate to "Appearance > Menus > Customize Locations" and set a menu for the "Footer Menu" setting.', 'pixwell' ),
						esc_html__( 'Navigate to "Typography > Footer Menu" to set up fonts for your footer menu.', 'pixwell' ),
					],
					'indent' => true,
				],
				[
					'id'       => 'footer_menu',
					'type'     => 'switch',
					'title'    => esc_html__( 'Footer Menu', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the footer menu.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'     => 'section_end_meta_footer_menu',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_footer_copyright',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Copyright Info', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'footer_copyright',
					'type'     => 'textarea',
					'title'    => esc_html__( 'Copyright Text', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your copyright text or HTML.', 'pixwell' ),
					'rows'     => 2,
					'default'  => '',
				],
				[
					'id'     => 'section_end_footer_copyright',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}
