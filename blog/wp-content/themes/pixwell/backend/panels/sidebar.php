<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;
/** sidebar config */
if ( ! function_exists( 'pixwell_register_options_sidebar' ) ) {
	function pixwell_register_options_sidebar() {

		return [
			'id'     => 'pixwell_theme_ops_section_sidebar',
			'title'  => esc_html__( 'Sidebars', 'pixwell' ),
			'desc'   => esc_html__( 'Customize your website sidebars. The settings below will apply globally to the entire site.', 'pixwell' ),
			'icon'   => 'el el-align-right',
			'fields' => [
				[
					'id'    => 'info_sidebar',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'Navigate to "Appearance > Widgets" to add content for your sidebars.', 'pixwell' ),
				],
				[
					'id'       => 'pixwell_multi_sidebar',
					'type'     => 'multi_text',
					'class'    => 'medium-text',
					'title'    => esc_html__( 'Create New Sidebars', 'pixwell' ),
					'subtitle' => esc_html__( 'Create or delete an existing sidebar.', 'pixwell' ),
					'desc'     => esc_html__( 'Click on the "Create Sidebar" button, then input a name/ID (without special characters and spacing) into this field to create a new sidebar.', 'pixwell' ),
					'add_text' => esc_html__( 'Click and Input ID to Create a Sidebar', 'pixwell' ),
					'default'  => [],
				],
				[
					'id'       => 'sidebar_sticky',
					'type'     => 'switch',
					'title'    => esc_html__( 'Sticky Sidebar', 'pixwell' ),
					'subtitle' => esc_html__( 'Making sidebars permanently visible when scrolling up and down.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'          => 'site_sidebar_pos',
					'type'        => 'image_select',
					'title'       => esc_html__( 'Sidebar Position', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a default sidebar position for your site.', 'pixwell' ),
					'description' => esc_html__( 'This is treated as a global setting. Other position settings take priority over this setting.', 'pixwell' ),
					'options'     => pixwell_add_settings_sidebar_pos( false ),
					'default'     => 'right',
				],
				[
					'id'       => 'widget_block',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Block Style Editor', 'pixwell' ),
					'subtitle' => esc_html__( 'Disable block style editor in the widget page.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'          => 'widget_heading_tag',
					'title'       => esc_html__( 'Widget Heading HTML Tag', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a title HTML tag for the sidebar widget heading.', 'pixwell' ),
					'description' => esc_html__( 'The default tag is H2.', 'pixwell' ),
					'type'        => 'select',
					'options'     => pixwell_config_heading_tag(),
					'default'     => '0',
				],
			],
		];
	}
}