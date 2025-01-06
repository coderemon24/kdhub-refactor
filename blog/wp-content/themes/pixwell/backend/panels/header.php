<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;
/** header config */
if ( ! function_exists( 'pixwell_register_options_header' ) ) {
	function pixwell_register_options_header() {

		return [
			'id'    => 'pixwell_config_section_header',
			'title' => esc_html__( 'Header', 'pixwell' ),
			'icon'  => 'el el-th',
		];
	}
}
if ( ! function_exists( 'pixwell_register_options_header_general' ) ) {
	function pixwell_register_options_header_general() {

		return [
			'id'         => 'pixwell_config_section_header_general',
			'title'      => esc_html__( 'Header Styles', 'pixwell' ),
			'desc'       => esc_html__( 'Customize the styles for your website header.', 'pixwell' ),
			'icon'       => 'el el-screen',
			'subsection' => true,
			'fields'     => [
				[
					'id'     => 'section_start_header_style',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Header Style', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'          => 'header_style',
					'type'        => 'select',
					'title'       => esc_html__( 'Header Style', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a header style for your website.', 'pixwell' ),
					'description' => esc_html__( 'This is treated as a global setting. Other position settings take priority over this setting.', 'pixwell' ),
					'options'     => [
						'1'           => esc_html__( 'Style 1 (Minimalist Left Menu)', 'pixwell' ),
						'2'           => esc_html__( 'Style 2 (Minimalist Right Menu)', 'pixwell' ),
						'3'           => esc_html__( 'Style 3 (Elegant Centered Style)', 'pixwell' ),
						'4'           => esc_html__( 'Style 4 (Full Wide)', 'pixwell' ),
						'5'           => esc_html__( 'Style 5 (Classic Magazine)', 'pixwell' ),
						'6'           => esc_html__( 'Style 6 (Elegant Centered Dark Style)', 'pixwell' ),
						'7'           => esc_html__( 'Style 7 (Vintage Top Navigation)', 'pixwell' ),
						'8'           => esc_html__( 'Style 8 (Full Wide & Centered Menu)', 'pixwell' ),
						'9'           => esc_html__( 'Style 9 (Classic 2 Magazine)', 'pixwell' ),
						'rb_template' => esc_html__( 'Use Ruby Template', 'pixwell' ),
					],
					'default'     => '1',
				],
				[
					'id'          => 'header_template',
					'type'        => 'textarea',
					'title'       => esc_html__( 'Header Template Shortcode', 'pixwell' ),
					'subtitle'    => esc_html__( 'Input a Ruby Template shortcode if you use a header template.', 'pixwell' ),
					'description' => esc_html__( 'To apply this setting, select "Ruby Template" as your Header Style.', 'pixwell' ),
					'placeholder' => esc_html__( '[Ruby_E_Template id="1"]', 'pixwell' ),
					'rows'        => 2,
					'default'     => '',
				],
				[
					'id'     => 'section_end_header_style',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'       => 'section_start_banner_section',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'For Header Styles 3, 6, and 7', 'pixwell' ),
					'subtitle' => esc_html__( 'These settings below apply exclusively to Header Styles 3, 6, and 7.', 'pixwell' ),
					'indent'   => true,
				],
				[
					'id'       => 'header_subscribe_image',
					'type'     => 'media',
					'url'      => true,
					'preview'  => true,
					'title'    => esc_html__( 'Header Banner: Subscribe Thumbnail', 'pixwell' ),
					'subtitle' => esc_html__( 'Upload a subscribe thumbnail with dimensions 70x50 pixels.', 'pixwell' ),
				],
				[
					'id'       => 'header_subscribe_desc',
					'type'     => 'text',
					'url'      => true,
					'preview'  => true,
					'title'    => esc_html__( 'Subscribe Small Description', 'pixwell' ),
					'subtitle' => esc_html__( 'Input text for the subscribe button.', 'pixwell' ),
					'default'  => esc_html__( 'Get Our Newsletter', 'pixwell' ),
				],
				[
					'id'       => 'header_subscribe_text',
					'type'     => 'text',
					'title'    => esc_html__( 'Subscribe Button Text', 'pixwell' ),
					'subtitle' => esc_html__( 'Input the text for the subscribe button.', 'pixwell' ),
					'default'  => esc_html__( 'SUBSCRIBE', 'pixwell' ),
				],
				[
					'id'       => 'header_subscribe_url',
					'type'     => 'text',
					'title'    => esc_html__( 'Subscribe URL', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the URL destination for your subscribe form.', 'pixwell' ),
					'default'  => '',
				],
				[
					'id'     => 'section_end_banner_section',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'       => 'section_start_header_style_3',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'For Header Style 3', 'pixwell' ),
					'subtitle' => esc_html__( 'These settings below apply exclusively to Header Style 3.', 'pixwell' ),
					'indent'   => true,
				],
				[
					'id'          => 'header_banner_color',
					'type'        => 'color',
					'transparent' => false,
					'title'       => esc_html__( 'Banner Text Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select the text color for the header style 3.', 'pixwell' ),
					'description' => esc_html__( 'The default is based on the site body color.', 'pixwell' ),
				],
				[
					'id'       => 'header_3_border_width',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'Bottom Border Width', 'pixwell' ),
					'subtitle' => esc_html__( 'Choose the border width (in pixels) for the bottom border.', 'pixwell' ),
					'default'  => 2,
				],
				[
					'id'          => 'header_3_border_color',
					'type'        => 'color',
					'transparent' => false,
					'title'       => esc_html__( 'Border Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Choose the color for the bottom border.', 'pixwell' ),
				],
				[
					'id'     => 'section_end_header_style_3',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'       => 'section_start_header_style_6',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'for Header Style 6', 'pixwell' ),
					'subtitle' => esc_html__( 'The setting below applies exclusively to Header Style 6.', 'pixwell' ),
					'indent'   => true,
				],
				[
					'id'          => 'header_banner_background',
					'type'        => 'background',
					'title'       => esc_html__( 'Banner Background', 'pixwell' ),
					'subtitle'    => esc_html__( 'Choose a dark background color for Header Style 6.', 'pixwell' ),
					'description' => esc_html__( 'Default is a solid color: #111111', 'pixwell' ),
				],
				[
					'id'     => 'section_end_header_style_6',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'       => 'section_start_header_style_9',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'for Header Style 9', 'pixwell' ),
					'subtitle' => esc_html__( 'The setting below applies exclusively to Header Style 9.', 'pixwell' ),
					'indent'   => true,
				],
				[
					'id'          => 'header_style9_banner_bg',
					'type'        => 'background',
					'transparent' => false,
					'title'       => esc_html__( 'Banner Background', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a banner background color for header style 9.', 'pixwell' ),
					'description' => esc_html__( 'Default is a solid color: #fafafa', 'pixwell' ),
				],
				[
					'id'     => 'section_end_header_style_9',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}
/** top bar config */
if ( ! function_exists( 'pixwell_register_options_topbar' ) ) {
	function pixwell_register_options_topbar() {

		return [
			'id'         => 'pixwell_config_section_topbar',
			'icon'       => 'el el-lines',
			'subsection' => true,
			'title'      => esc_html__( 'Top Bar', 'pixwell' ),
			'desc'       => esc_html__( 'Customize styles, layout and more for the top bar.', 'pixwell' ),
			'fields'     => [
				[
					'id'    => 'info_topbar_menu',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => esc_html__( 'This section requires a menu. Navigate to "Appearance > Menus > Customize Locations" and set a menu for the "Top Bar".', 'pixwell' ),
				],
				[
					'id'    => 'info_topbar_type',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'Navigate to "Typography > Top Bar" to set up fonts for the top bar.', 'pixwell' ),
				],
				[
					'id'     => 'section_start_topbar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'General', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'topbar',
					'title'    => esc_html__( 'Top Bar', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the top bar.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'     => 'section_end_topbar',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_topbar_style',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Style', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'topbar_width',
					'type'     => 'select',
					'title'    => esc_html__( 'Width Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select the maximum width style for the top bar.', 'pixwell' ),
					'options'  => [
						'0' => esc_html__( 'Has Wrapper', 'pixwell' ),
						'1' => esc_html__( 'FullWidth', 'pixwell' ),
					],
					'default'  => false,
				],
				[
					'id'       => 'topbar_height',
					'type'     => 'text',
					'validate' => 'number',
					'class'    => 'small-text',
					'title'    => esc_html__( 'Top Bar Height', 'pixwell' ),
					'subtitle' => esc_html__( 'Input a height value for the top bar (e.g., 42).', 'pixwell' ),
					'default'  => '',
				],
				[
					'id'          => 'topbar_gradient',
					'type'        => 'color_gradient',
					'title'       => esc_html__( 'Background', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a background color for the top bar.', 'pixwell' ),
					'description' => esc_html__( 'Supports gradient style. Leave the setting "To" blank for a monochrome background.', 'pixwell' ),
					'transparent' => false,
					'default'     => [ 'from' => '', 'to' => '' ],
				],
				[
					'id'       => 'topbar_text_style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Text Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a text color style to complement the top bar background.', 'pixwell' ),
					'options'  => pixwell_add_settings_text_style(),
					'default'  => 'light',
				],
				[
					'id'     => 'section_end_topbar_style',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_topbar_elements',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Information', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'topbar_text',
					'title'    => esc_html__( 'Your Text Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your text (allow HTML). Leave blank to disable.', 'pixwell' ),
					'type'     => 'text',
					'default'  => '',
				],
				[
					'id'       => 'topbar_phone',
					'title'    => esc_html__( 'Phone Number Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your company phone number. Leave blank to disable.', 'pixwell' ),
					'type'     => 'text',
					'default'  => '',
				],
				[
					'id'       => 'topbar_email',
					'title'    => esc_html__( 'Email Info', 'pixwell' ),
					'subtitle' => esc_html__( 'input your email info, Leave blank if you want to disable.', 'pixwell' ),
					'type'     => 'text',
					'default'  => '',
				],
				[
					'id'       => 'topbar_link_action',
					'title'    => esc_html__( 'Email Clickable', 'pixwell' ),
					'subtitle' => esc_html__( 'Visitor can click on the email info.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'topbar_social',
					'title'    => esc_html__( 'Social Icons', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable social icons at the top bar.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'     => 'section_end_topbar_element',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_topbar_line',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Top Line', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'topbar_line',
					'title'    => esc_html__( 'Top Line', 'pixwell' ),
					'subtitle' => esc_html__( 'Show a color line at the top of your website.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'            => 'topbar_line_height',
					'type'          => 'slider',
					'title'         => esc_html__( 'Height', 'pixwell' ),
					'subtitle'      => esc_html__( 'Select a height value for the top line.', 'pixwell' ),
					'default'       => 2,
					'min'           => 1,
					'step'          => 1,
					'max'           => 10,
					'display_value' => 'label',
				],
				[
					'id'          => 'topbar_line_gradient',
					'type'        => 'color_gradient',
					'title'       => esc_html__( 'Background', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a background color for the top line.', 'pixwell' ),
					'transparent' => false,
					'default'     => [ 'from' => '', 'to' => '' ],
				],
				[
					'id'     => 'section_end_topbar_line',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}
if ( ! function_exists( 'pixwell_register_options_main_menu' ) ) {
	/**
	 * @return array
	 */
	function pixwell_register_options_main_menu() {

		return [
			'id'         => 'pixwell_config_section_main_menu',
			'title'      => esc_html__( 'Main Navigation', 'pixwell' ),
			'desc'       => esc_html__( 'Customize styles, layout, and other aspects of the main menu.', 'pixwell' ),
			'icon'       => 'el el-minus',
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'menu_font_info',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'Navigate to "Typography > Header Menu" to set up fonts for your menu.', 'pixwell' ),
				],
				[
					'id'     => 'section_start_main_navigation',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'General', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'navbar_height',
					'type'     => 'text',
					'validate' => 'number',
					'class'    => 'small-text',
					'title'    => esc_html__( 'Height of Menu Bar', 'pixwell' ),
					'subtitle' => esc_html__( 'Input a custom height value for the main menu bar.', 'pixwell' ),
					'desc'     => esc_html__( 'The default value is 60px', 'pixwell' ),
					'default'  => '',
				],
				[
					'id'       => 'navbar_social',
					'type'     => 'switch',
					'title'    => esc_html__( 'Social Icons', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable social icons at the left of the main navigation bar.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'navbar_cart',
					'type'     => 'switch',
					'title'    => esc_html__( 'Mini Cart', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the mini cart.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'navbar_search',
					'type'     => 'switch',
					'title'    => esc_html__( 'Search Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the search icon.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'navbar_search_ajax',
					'type'     => 'switch',
					'title'    => esc_html__( 'Live Search Results', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable AJAX search functionality.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'     => 'section_end_main_navigation',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_main_navigation_sticky',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Sticky Menu', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'navbar_sticky',
					'type'     => 'switch',
					'title'    => esc_html__( 'Sticky Menu Bar', 'pixwell' ),
					'subtitle' => esc_html__( 'Stick your menu bar when scrolling up and down.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'navbar_sticky_smart',
					'type'     => 'switch',
					'title'    => esc_html__( 'Smart Sticky', 'pixwell' ),
					'subtitle' => esc_html__( 'Only stick the menu bar when scrolling up.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'sticky_height',
					'type'     => 'text',
					'validate' => 'number',
					'class'    => 'small-text',
					'title'    => esc_html__( 'Height of Sticky Menu Bar', 'pixwell' ),
					'subtitle' => esc_html__( 'Input a custom height for the main menu bar when sticky.', 'pixwell' ),
					'default'  => '',
				],
				[
					'id'       => 'navbar_sticky_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Menu Width Style', 'pixwell' ),
					'subtitle' => esc_html__( 'max width of the menu bar when sticky.', 'pixwell' ),
					'options'  => [
						'0' => esc_html__( 'Wrapper', 'pixwell' ),
						'1' => esc_html__( 'FullWidth', 'pixwell' ),
					],
					'default'  => '0',
				],
				[
					'id'     => 'section_end_main_navigation_sticky',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_header_navbar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Menu Styles', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'          => 'navbar_bg',
					'type'        => 'color_gradient',
					'title'       => esc_html__( 'Background', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a background for the menu bar.', 'pixwell' ),
					'description' => esc_html__( 'Supports gradient style. Leave the setting "To" blank for a monochrome background.', 'pixwell' ),
					'transparent' => false,
					'default'     => [ 'from' => '', 'to' => '' ],
				],
				[
					'id'          => 'navbar_bg_dark',
					'type'        => 'color_gradient',
					'title'       => esc_html__( 'Dark Mode - Background', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a background for the menu bar in dark mode.', 'pixwell' ),
					'transparent' => false,
					'default'     => [ 'from' => '', 'to' => '' ],
				],
				[
					'id'          => 'navbar_color',
					'title'       => esc_html__( 'Text Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a text color for the menu.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'          => 'navbar_color_dark',
					'title'       => esc_html__( 'Dark Mode - Text Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a text color for the menu in dark mode.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'          => 'navbar_color_hover',
					'title'       => esc_html__( 'Hover Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a text color for the menu when hovering.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'          => 'navbar_color_hover_dark',
					'title'       => esc_html__( 'Dark Mode - Hover Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a text color for the menu when hovering in dark mode.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'       => 'navbar_shadow',
					'type'     => 'switch',
					'title'    => esc_html__( 'Menu Shadow', 'pixwell' ),
					'subtitle' => esc_html__( 'Display a dark shadow style for the menu bar.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'     => 'section_end_header_navbar',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_header_navbar_sub',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Sub-level Menus Styles', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'          => 'navsub_bg',
					'type'        => 'color_gradient',
					'title'       => esc_html__( 'Background', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a background for sub-level dropdown menus.', 'pixwell' ),
					'description' => esc_html__( 'Supports gradient style. Leave the setting "To" blank for a monochrome background.', 'pixwell' ),
					'transparent' => false,
					'default'     => [ 'from' => '', 'to' => '' ],
				],
				[
					'id'          => 'navsub_bg_dark',
					'type'        => 'color_gradient',
					'title'       => esc_html__( 'Dark Mode - Background', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a background for sub-level dropdown menus in dark mode', 'pixwell' ),
					'description' => esc_html__( 'Supports gradient style. Leave the setting "To" blank for a monochrome background.', 'pixwell' ),
					'transparent' => false,
					'default'     => [ 'from' => '', 'to' => '' ],
				],
				[
					'id'          => 'navsub_color',
					'title'       => esc_html__( 'Text Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a text color for the sub-level menu items.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'          => 'navsub_color_dark',
					'title'       => esc_html__( 'Dark Mode - Text Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a text color for the sub-level menu items in dark mode.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'          => 'navsub_color_hover',
					'title'       => esc_html__( 'Hover Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a text color for the sub-level menu items when hovering.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'          => 'navsub_color_hover_dark',
					'title'       => esc_html__( 'Dark Mode - Hover Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a text color for the sub-level menu items when hovering in dark mode.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'       => 'mega_menu_text_style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Mega Menu - Text Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a text color scheme for mega menus that complements the background color.', 'pixwell' ),
					'options'  => pixwell_add_settings_text_style(),
					'default'  => 'dark',
				],
				[
					'id'     => 'section_end_header_navbar_sub',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}
if ( ! function_exists( 'pixwell_register_options_header_mobile' ) ) {
	/**
	 * @return array
	 */
	function pixwell_register_options_header_mobile() {

		return [
			'id'         => 'pixwell_config_section_header_mobile',
			'title'      => esc_html__( 'Mobile Header', 'pixwell' ),
			'icon'       => 'el el-iphone-home',
			'subsection' => true,
			'desc'       => esc_html__( 'Customize styles and layout for your site header on mobile devices.', 'pixwell' ),
			'fields'     => [
				[
					'id'       => 'mobile_logo_pos',
					'type'     => 'select',
					'title'    => esc_html__( 'Logo Position', 'pixwell' ),
					'subtitle' => esc_html__( 'Select the position of the mobile logo.', 'pixwell' ),
					'options'  => [
						'center' => esc_html__( 'Center', 'pixwell' ),
						'left'   => esc_html__( 'Left', 'pixwell' ),
					],
					'default'  => 'center',
				],
				[
					'id'       => 'mobile_nav_height',
					'type'     => 'text',
					'title'    => esc_html__( 'Height of Mobile Header', 'pixwell' ),
					'subtitle' => esc_html__( 'Input a custom height value for the mobile header.', 'pixwell' ),
					'desc'     => esc_html__( 'The default value is 60px', 'pixwell' ),
					'default'  => '',
				],
				[
					'id'       => 'mobile_search',
					'type'     => 'switch',
					'title'    => esc_html__( 'Search Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the search icon in the mobile header.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'mobile_bookmark',
					'type'     => 'switch',
					'title'    => esc_html__( 'My Bookmarks Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon in the mobile header.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'mobile_cart',
					'type'     => 'switch',
					'title'    => esc_html__( 'Mini Cart', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the mini cart in the mobile header.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'          => 'mobile_nav_bg',
					'type'        => 'color_gradient',
					'title'       => esc_html__( 'Background', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a background for the mobile header.', 'pixwell' ),
					'transparent' => false,
					'default'     => [ 'from' => '', 'to' => '' ],
				],
				[
					'id'          => 'mobile_nav_color',
					'title'       => esc_html__( 'Text Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a text color for the mobile header.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
				],
			],
		];
	}
}
if ( ! function_exists( 'pixwell_register_options_header_transparent' ) ) {
	/**
	 * @return array
	 */
	function pixwell_register_options_header_transparent() {

		return [
			'id'         => 'pixwell_config_section_header_transparent',
			'icon'       => 'el el-lines',
			'subsection' => true,
			'title'      => esc_html__( 'Transparent Header', 'pixwell' ),
			'desc'       => esc_html__( 'Customize styles for the transparent header.', 'pixwell' ),
			'fields'     => [
				[
					'id'       => 'transparent_header_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Header Width Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Set the maximum width for the transparent header.', 'pixwell' ),
					'options'  => [
						'0' => esc_html__( 'Wrapper', 'pixwell' ),
						'1' => esc_html__( 'Full Wide', 'pixwell' ),
					],
					'default'  => '0',
				],
				[
					'id'       => 'transparent_header_bg',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Background', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a background color with alpha for the transparent header.', 'pixwell' ),
				],
				[
					'id'       => 'transparent_header_bg_dark',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Dark Mode - Background', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a background color with alpha for the transparent header in dark mode.', 'pixwell' ),
				],
				[
					'id'       => 'transparent_disable_border',
					'type'     => 'select',
					'title'    => esc_html__( 'Bottom Border', 'pixwell' ),
					'subtitle' => esc_html__( 'Display a border under the transparent header.', 'pixwell' ),
					'options'  => [
						'0' => esc_html__( '- Enable -', 'pixwell' ),
						'1' => esc_html__( 'Disable', 'pixwell' ),
					],
					'default'  => '0',
				],
				[
					'id'       => 'transparent_header_text_style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Text Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a text color scheme for the transparent header to complement the background image.', 'pixwell' ),
					'options'  => pixwell_add_settings_text_style(),
					'default'  => 'light',
				],
			],
		];
	}
}
if ( ! function_exists( 'pixwell_register_options_off_canvas' ) ) {
	/**
	 * @return array
	 */
	function pixwell_register_options_off_canvas() {

		return [
			'id'         => 'pixwell_config_section_off_canvas',
			'icon'       => 'el el-braille',
			'subsection' => true,
			'title'      => esc_html__( 'Left Side Section', 'pixwell' ),
			'desc'       => esc_html__( 'The section is used for displaying the navigation on the mobile devices.', 'pixwell' ),
			'fields'     => [
				[
					'id'    => 'info_left_side_menu',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => esc_html__( 'The section requests a menu. Navigate "Appearance > Menus > Customize Locations" and set a menu to the "Left Aside Menu" settings.', 'pixwell' ),
				],
				[
					'id'    => 'info_left_side_for desktop',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'You can customize separate menus for desktop and mobile devices for this section within the "Customize Locations" section of the menu editing page.', 'pixwell' ),
				],
				[
					'id'       => 'section_start_offcanvas_toggle',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'Trigger/Toggle Button', 'pixwell' ),
					'subtitle' => esc_html__( 'Select an option for the trigger toggle button for the left-side section in the navigation bar within the header.', 'pixwell' ),
					'indent'   => true,
				],
				[
					'id'          => 'offcanvas_toggle',
					'type'        => 'switch',
					'title'       => esc_html__( 'Display Toggle on Desktop', 'pixwell' ),
					'subtitle'    => esc_html__( 'Control the visibility of the left-side button on desktop devices.', 'pixwell' ),
					'description' => esc_html__( 'This button will remain visible on mobile devices, enabling visitors to access the collapsed left section.', 'pixwell' ),
					'default'     => true,
				],
				[
					'id'       => 'offcanvas_toggle_bold',
					'type'     => 'select',
					'title'    => esc_html__( 'Toggle Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Choose a style for the left side toggle button.', 'pixwell' ),
					'options'  => [
						'0' => esc_html__( '- Default -', 'pixwell' ),
						'1' => esc_html__( 'Bold', 'pixwell' ),
						'2' => esc_html__( 'Stack', 'pixwell' ),
					],
					'default'  => '1',
				],
				[
					'id'     => 'section_end_offcanvas_toggle',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],

				[
					'id'     => 'section_start_header_offcanvas',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Style', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'off_canvas_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Color Scheme', 'pixwell' ),
					'subtitle' => esc_html__( 'Select between a dark or light style for the left side section.', 'pixwell' ),
					'options'  => [
						'dark'  => esc_html__( 'Dark', 'pixwell' ),
						'light' => esc_html__( 'Light', 'pixwell' ),
					],
					'default'  => 'dark',
				],
				[
					'id'          => 'off_canvas_bg',
					'type'        => 'color',
					'transparent' => false,
					'title'       => esc_html__( 'Background', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a custom background color for this section.', 'pixwell' ),
				],
				[
					'id'     => 'section_end_header_offcanvas',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'       => 'section_start_offcanvas_top',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'Top Area', 'pixwell' ),
					'subtitle' => esc_html__( 'To change the logo for this section, navigate to "Logo > Left Side Logo".', 'pixwell' ),
					'indent'   => true,
				],
				[
					'id'          => 'off_canvas_header',
					'type'        => 'switch',
					'title'       => esc_html__( 'Top Area', 'pixwell' ),
					'subtitle'    => esc_html__( 'Enable or disable the top area.', 'pixwell' ),
					'description' => esc_html__( 'The settings below in this panel require this option to be enabled.', 'pixwell' ),
					'default'     => true,
				],
				[
					'id'          => 'off_canvas_header_bg_color',
					'type'        => 'color',
					'transparent' => false,
					'title'       => esc_html__( 'Background', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a background color for the top area.', 'pixwell' ),
				],
				[
					'id'          => 'off_canvas_header_bg',
					'type'        => 'media',
					'url'         => true,
					'preview'     => true,
					'title'       => esc_html__( 'Background Image', 'pixwell' ),
					'subtitle'    => esc_html__( 'Upload a background image for the top area.', 'pixwell' ),
					'description' => esc_html__( 'We recommend using a dark image with dimensions of 600x400px.', 'pixwell' ),
				],
				[
					'id'       => 'off_canvas_header_overlay',
					'type'     => 'switch',
					'title'    => esc_html__( 'Dark Overlay', 'pixwell' ),
					'subtitle' => esc_html__( 'Show dark overlay on the background image.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'off_canvas_header_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Text Color Scheme', 'pixwell' ),
					'subtitle' => esc_html__( 'Choose a text color style to complement the background for this section.', 'pixwell' ),
					'options'  => [
						'dark'  => esc_html__( 'Dark Text', 'pixwell' ),
						'light' => esc_html__( 'Light Text', 'pixwell' ),
					],
					'default'  => 'light',
				],
				[
					'id'     => 'section_end_offcanvas_top',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'       => 'section_start_offcanvas_top_element',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'Elements', 'pixwell' ),
					'subtitle' => esc_html__( 'Customize elements to show in the top area of the left side section.', 'pixwell' ),
					'indent'   => true,
				],
				[
					'id'       => 'off_canvas_social',
					'type'     => 'switch',
					'title'    => esc_html__( 'Social Bar', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the social icons.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'     => 'section_end_header_offcanvas_element',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
				[
					'id'       => 'off_canvas_bookmark',
					'type'     => 'switch',
					'title'    => esc_html__( 'Bookmark Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'off_canvas_cart',
					'type'     => 'switch',
					'title'    => esc_html__( 'Mini Cart', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the Woocommerce mini cart.', 'pixwell' ),

					'default' => false,
				],
				[
					'id'       => 'off_canvas_subscribe',
					'type'     => 'switch',
					'title'    => esc_html__( 'Subscribe Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the subscribe icon.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'off_canvas_subscribe_text',
					'type'     => 'text',
					'title'    => esc_html__( 'Subscribe Text', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the text for the subscribe button.', 'pixwell' ),
					'default'  => '',
				],
				[
					'id'       => 'off_canvas_subscribe_url',
					'type'     => 'text',
					'title'    => esc_html__( 'Subscribe URL', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the URL destination for your subscribe buttom.', 'pixwell' ),
					'default'  => '',
				],
			],
		];
	}
}
if ( ! function_exists( 'pixwell_register_options_header_trending' ) ) {
	/**
	 * @return array
	 */
	function pixwell_register_options_header_trending() {

		return [
			'id'         => 'pixwell_config_section_trending',
			'icon'       => 'el el-bell',
			'subsection' => true,
			'title'      => esc_html__( 'Trending Dropdown', 'pixwell' ),
			'desc'       => esc_html__( 'The dropdown section for displaying trending posts in the site header.', 'pixwell' ),
			'fields'     => [
				[
					'id'    => 'info_trending_section',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => esc_html__( 'This feature requires the "Post View Counter" plugin to be active.', 'pixwell' ),
				],
				[
					'id'       => 'header_trend',
					'type'     => 'switch',
					'title'    => esc_html__( 'Trending Section', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the trending section at the header.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'trend_title',
					'type'     => 'text',
					'title'    => esc_html__( 'Trending Header', 'pixwell' ),
					'subtitle' => esc_html__( 'Input a title for this section.', 'pixwell' ),
					'default'  => esc_html__( 'Trending Now', 'pixwell' ),
				],
				[
					'id'       => 'trend_filter',
					'type'     => 'select',
					'title'    => esc_html__( 'Trending Filter', 'pixwell' ),
					'subtitle' => esc_html__( 'Select posts to display in this section.', 'pixwell' ),
					'options'  => [
						'0'         => esc_html__( 'All Time', 'pixwell' ),
						'popular_m' => esc_html__( 'Last 30 Days', 'pixwell' ),
						'popular_w' => esc_html__( 'Last 7 Days', 'pixwell' ),
					],
					'default'  => false,
				],
			],
		];
	}
}