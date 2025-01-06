<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_amp_plugin_status_info' ) ) {
	function pixwell_amp_plugin_status_info( $id = 'amp-plugin-info' ) {

		if ( ! function_exists( 'amp_init' ) ) {
			return [
				'id'    => $id,
				'type'  => 'info',
				'style' => 'warning',
				'desc'  => html_entity_decode( esc_html__( 'The AMP (Accelerated Mobile Pages) Plugin is missing! Please install and activate <a target="_blank" href="https://wordpress.org/plugins/amp">Automattic AMP</a> plugin to activate the settings.', 'pixwell' ) ),
			];
		}

		return null;
	}
}

if ( ! function_exists( 'pixwell_register_options_amp' ) ) {
	function pixwell_register_options_amp() {

		return [
			'id'    => 'pixwell_config_section_amp',
			'title' => esc_html__( 'AMP', 'pixwell' ),
			'desc'  => esc_html__( 'Select setting for your site in AMP mode.', 'pixwell' ),
			'icon'  => 'el el-ok',
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_amp_general' ) ) {
	function pixwell_register_options_amp_general() {

		return [
			'id'         => 'pixwell_config_section_amp_general',
			'title'      => esc_html__( 'General', 'pixwell' ),
			'desc'       => esc_html__( 'Select setting for your site in AMP mode.', 'pixwell' ),
			'icon'       => 'el el-cog',
			'subsection' => true,
			'fields'     => [
				pixwell_amp_plugin_status_info(),
				[
					'id'    => 'amp-css-info',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'Each AMP page has a 75,000 byte CSS limit. The theme will support a compact footer to ensure your site will meet with this requirement.', 'pixwell' ),
				],
				[
					'id'    => 'info_amp_footer',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'You can adjust additional settings, including background, colors, and copyright information, in "Theme Options > Footer".', 'pixwell' ),
				],
				[
					'id'     => 'section_start_amp_footer',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Footer', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'          => 'amp_footer_logo',
					'type'        => 'media',
					'url'         => true,
					'preview'     => true,
					'title'       => esc_html__( 'Footer Logo', 'pixwell' ),
					'subtitle'    => esc_html__( 'Upload the AMP footer logo. This setting will override the default footer logo specified in Logo Settings > Footer Logo.', 'pixwell' ),
					'description' => esc_html__( 'Recommended: 2x height image size for the logo, optimized for retina display.', 'pixwell' ),
				],
				[
					'id'       => 'amp_footer_menu',
					'type'     => 'select',
					'data'     => 'menu',
					'title'    => esc_html__( 'AMP Footer Menu', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a menu to display in the footer for the website in AMP mode.', 'pixwell' ),
				],
				[
					'id'       => 'amp_back_top',
					'type'     => 'switch',
					'title'    => esc_html__( 'Back to Top', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable the "back to top" button for the website in AMP mode.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'     => 'section_end_amp_footer',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'       => 'section_start_amp_composer',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'Ruby Composer', 'pixwell' ),
					'subtitle' => esc_html__( 'AMP has a strong cache. We do not recommend activating it for the front page, as the site may slow down when reflecting newly updated posts.', 'pixwell' ),
					'indent'   => true,
				],
				[
					'id'       => 'amp_featured_section',
					'type'     => 'switch',
					'title'    => esc_html__( 'Featured Section on Homepage', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable the featured section on the homepage when using Ruby Composer in AMP mode.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'amp_home_ppp',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Posts per Page', 'pixwell' ),
					'subtitle' => esc_html__( 'Choose the total number of posts per page when using Ruby Composer on the website in AMP mode. Leave blank to use the default setting.', 'pixwell' ),
					'default'  => '',
				],
				[
					'id'     => 'section_end_amp_composer',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_amp_single' ) ) {
	function pixwell_register_options_amp_single() {

		return [
			'id'         => 'pixwell_config_section_amp_single',
			'title'      => esc_html__( 'Single Post', 'pixwell' ),
			'desc'       => esc_html__( 'Choose settings for single posts in AMP mode.', 'pixwell' ),
			'icon'       => 'el el-cog',
			'subsection' => true,
			'fields'     => [
				pixwell_amp_plugin_status_info( 'single-amp-plugin-info' ),
				[
					'id'       => 'amp_disable_author',
					'type'     => 'switch',
					'title'    => esc_html__( 'Author Card', 'pixwell' ),
					'off'      => esc_html__( 'Use Default from Single Settings', 'pixwell' ),
					'on'       => esc_html__( 'Disable on AMP', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to disable the Author Card on the website in AMP mode.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'amp_disable_single_pagination',
					'type'     => 'switch',
					'title'    => esc_html__( 'Next/Prev Articles', 'pixwell' ),
					'off'      => esc_html__( 'Disable on AMP', 'pixwell' ),
					'on'       => esc_html__( 'Use Default from Single Settings', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to disable the Next/Prev Articles section on the website in AMP mode.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'amp_disable_comment',
					'type'     => 'switch',
					'title'    => esc_html__( 'Comment Box', 'pixwell' ),
					'off'      => esc_html__( 'Enable', 'pixwell' ),
					'on'       => esc_html__( 'Disable', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to disable the comment form on the website in AMP mode.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'amp_disable_related',
					'type'     => 'switch',
					'title'    => esc_html__( 'Related Section', 'pixwell' ),
					'off'      => esc_html__( 'Disable on AMP', 'pixwell' ),
					'on'       => esc_html__( 'Use Default from Single Settings', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to disable the related section on the website in AMP mode.', 'pixwell' ),
					'default'  => false,
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_amp_ads' ) ) {
	function pixwell_register_options_amp_ads() {

		return [
			'id'         => 'pixwell_config_section_amp_ads',
			'title'      => esc_html__( 'Ads', 'pixwell' ),
			'desc'       => esc_html__( 'Configure ad settings for the website in AMP mode.', 'pixwell' ),
			'icon'       => 'el el-cog',
			'subsection' => true,
			'fields'     => [
				pixwell_amp_plugin_status_info( 'ad-amp-plugin-info' ),
				[
					'id'     => 'section_start_amp_header_advert',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'for Header', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'amp_header_ad_type',
					'type'     => 'select',
					'title'    => esc_html__( 'Ad Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Choose the type of ad to display in the header.', 'pixwell' ),
					'options'  => [
						'1' => esc_html__( 'Google AdSense', 'pixwell' ),
						'2' => esc_html__( 'AMP Custom Script Ad', 'pixwell' ),
					],
					'default'  => '1',
				],
				[
					'id'       => 'amp_header_adsense_client',
					'type'     => 'text',
					'required' => [ 'amp_header_ad_type', '=', '1' ],
					'title'    => esc_html__( 'Data Ad Client', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the numeric ID associated with your AdSense account (excluding "ca-pub-").', 'pixwell' ),
					'default'  => '',
				],
				[
					'id'       => 'amp_header_adsense_slot',
					'type'     => 'text',
					'required' => [ 'amp_header_ad_type', '=', '1' ],
					'title'    => esc_html__( 'Data Ad Slot', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the numeric ID associated with your AdSense ad unit.', 'pixwell' ),
					'default'  => '',
				],
				[
					'id'       => 'amp_header_adsense_size',
					'type'     => 'select',
					'required' => [ 'amp_header_ad_type', '=', '1' ],
					'title'    => esc_html__( 'Adsense Size', 'pixwell' ),
					'subtitle' => esc_html__( 'Choose a size for this AdSense ad.', 'pixwell' ),
					'options'  => [
						'1' => esc_html__( 'Responsive', 'pixwell' ),
						'2' => esc_html__( 'Fixed Height (90px)', 'pixwell' ),
					],
					'default'  => '1',
				],
				[
					'id'       => 'amp_header_ad_code',
					'type'     => 'textarea',
					'required' => [ 'amp_header_ad_type', '=', '2' ],
					'title'    => esc_html__( 'AMP Custom Ad Script', 'pixwell' ),
					'subtitle' => esc_html__( 'Paste your custom ad script for AMP here.', 'pixwell' ),
					'rows'     => 2,
					'default'  => '',
				],
				[
					'id'     => 'section_end_amp_header_advert',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_amp_footer_advert',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'for Footer', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'amp_footer_ad_type',
					'type'     => 'select',
					'title'    => esc_html__( 'Ad Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Choose the type of ad to display in the footer.', 'pixwell' ),
					'options'  => [
						'1' => esc_html__( 'Google AdSense', 'pixwell' ),
						'2' => esc_html__( 'AMP Custom Script Ad', 'pixwell' ),
					],
					'default'  => '1',
				],
				[
					'id'       => 'amp_footer_adsense_client',
					'type'     => 'text',
					'required' => [ 'amp_footer_ad_type', '=', '1' ],
					'title'    => esc_html__( 'Data Ad Client', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the numeric ID associated with your AdSense account (excluding "ca-pub-").', 'pixwell' ),
					'default'  => '',
				],
				[
					'id'       => 'amp_footer_adsense_slot',
					'type'     => 'text',
					'required' => [ 'amp_footer_ad_type', '=', '1' ],
					'title'    => esc_html__( 'Data Ad Slot', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the numeric ID associated with your AdSense ad unit.', 'pixwell' ),
					'default'  => '',
				],
				[
					'id'       => 'amp_footer_adsense_size',
					'type'     => 'select',
					'required' => [ 'amp_footer_ad_type', '=', '1' ],
					'title'    => esc_html__( 'Adsense Size', 'pixwell' ),
					'subtitle' => esc_html__( 'Choose a size for this AdSense ad.', 'pixwell' ),
					'options'  => [
						'1' => esc_html__( 'Responsive', 'pixwell' ),
						'2' => esc_html__( 'Fixed Height (90px)', 'pixwell' ),
					],
					'default'  => '1',
				],
				[
					'id'       => 'amp_footer_ad_code',
					'type'     => 'textarea',
					'required' => [ 'amp_footer_ad_type', '=', '2' ],
					'title'    => esc_html__( 'AMP Custom Ad Script', 'pixwell' ),
					'subtitle' => esc_html__( 'Paste your custom ad script for AMP here.', 'pixwell' ),
					'rows'     => 2,
					'default'  => '',
				],
				[
					'id'     => 'section_end_amp_footer_advert',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_amp_top_single_advert',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'for Single Top of Content', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'amp_top_single_ad_type',
					'type'     => 'select',
					'title'    => esc_html__( 'Ad Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Choose the type of ad to display at the top of single content.', 'pixwell' ),
					'options'  => [
						'1' => esc_html__( 'Google AdSense', 'pixwell' ),
						'2' => esc_html__( 'AMP Custom Script Ad', 'pixwell' ),
					],
					'default'  => '1',
				],
				[
					'id'       => 'amp_top_single_adsense_client',
					'type'     => 'text',
					'required' => [ 'amp_top_single_ad_type', '=', '1' ],
					'title'    => esc_html__( 'Data Ad Client', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the numeric ID associated with your AdSense account (excluding "ca-pub-").', 'pixwell' ),
					'default'  => '',
				],
				[
					'id'       => 'amp_top_single_adsense_slot',
					'type'     => 'text',
					'required' => [ 'amp_top_single_ad_type', '=', '1' ],
					'title'    => esc_html__( 'Data Ad Slot', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the numeric ID associated with your AdSense ad unit.', 'pixwell' ),
					'default'  => '',
				],
				[
					'id'       => 'amp_top_single_adsense_size',
					'type'     => 'select',
					'required' => [ 'amp_top_single_ad_type', '=', '1' ],
					'title'    => esc_html__( 'Adsense Size', 'pixwell' ),
					'subtitle' => esc_html__( 'Choose a size for this AdSense ad.', 'pixwell' ),
					'options'  => [
						'1' => esc_html__( 'Responsive', 'pixwell' ),
						'2' => esc_html__( 'Fixed Height (90px)', 'pixwell' ),
					],
					'default'  => '1',
				],
				[
					'id'       => 'amp_top_single_ad_code',
					'type'     => 'textarea',
					'required' => [ 'amp_top_single_ad_type', '=', '2' ],
					'title'    => esc_html__( 'AMP Custom Ad Script', 'pixwell' ),
					'subtitle' => esc_html__( 'Paste your custom ad script for AMP here.', 'pixwell' ),
					'rows'     => 2,
					'default'  => '',
				],
				[
					'id'     => 'section_end_amp_top_single_advert',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_amp_bottom_single_advert',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'for Single Bottom of Content', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'amp_bottom_single_ad_type',
					'type'     => 'select',
					'title'    => esc_html__( ' Ad Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Choose the type of ad to display at the bottom of single content.', 'pixwell' ),
					'options'  => [
						'1' => esc_html__( 'Google AdSense', 'pixwell' ),
						'2' => esc_html__( 'AMP Custom Script Ad', 'pixwell' ),
					],
					'default'  => '1',
				],
				[
					'id'       => 'amp_bottom_single_adsense_client',
					'type'     => 'text',
					'required' => [ 'amp_bottom_single_ad_type', '=', '1' ],
					'title'    => esc_html__( 'Data Ad Client', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the numeric ID associated with your AdSense account (excluding "ca-pub-").', 'pixwell' ),
					'default'  => '',
				],
				[
					'id'       => 'amp_bottom_single_adsense_slot',
					'type'     => 'text',
					'required' => [ 'amp_bottom_single_ad_type', '=', '1' ],
					'title'    => esc_html__( 'Data Ad Slot', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the numeric ID associated with your AdSense ad unit.', 'pixwell' ),
					'default'  => '',
				],
				[
					'id'       => 'amp_bottom_single_adsense_size',
					'type'     => 'select',
					'required' => [ 'amp_bottom_single_ad_type', '=', '1' ],
					'title'    => esc_html__( 'Adsense Size', 'pixwell' ),
					'subtitle' => esc_html__( 'Choose a size for this AdSense ad.', 'pixwell' ),
					'options'  => [
						'1' => esc_html__( 'Responsive', 'pixwell' ),
						'2' => esc_html__( 'Fixed Height (90px)', 'pixwell' ),
					],
					'default'  => '1',
				],
				[
					'id'       => 'amp_bottom_single_ad_code',
					'type'     => 'textarea',
					'required' => [ 'amp_bottom_single_ad_type', '=', '2' ],
					'title'    => esc_html__( 'AMP Custom Ad Script', 'pixwell' ),
					'subtitle' => esc_html__( 'Paste your custom ad script for AMP here.', 'pixwell' ),
					'rows'     => 2,
					'default'  => '',
				],
				[
					'id'     => 'section_end_amp_bottom_single_advert',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_amp_inline_single_advert',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Inside the Single Content', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'amp_inline_single_ad_type',
					'type'     => 'select',
					'title'    => esc_html__( 'Ad Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Choose the type of ad to display inside the single content.', 'pixwell' ),
					'options'  => [
						'1' => esc_html__( 'Google AdSense', 'pixwell' ),
						'2' => esc_html__( 'AMP Custom Script Ad', 'pixwell' ),
					],
					'default'  => '1',
				],
				[
					'id'       => 'amp_inline_single_adsense_client',
					'type'     => 'text',
					'required' => [ 'amp_inline_single_ad_type', '=', '1' ],
					'title'    => esc_html__( 'Data Ad Client', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the numeric ID associated with your AdSense account (excluding "ca-pub-").', 'pixwell' ),
					'default'  => '',
				],
				[
					'id'       => 'amp_inline_single_adsense_slot',
					'type'     => 'text',
					'required' => [ 'amp_inline_single_ad_type', '=', '1' ],
					'title'    => esc_html__( 'Data Ad Slot', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the numeric ID associated with your AdSense ad unit.', 'pixwell' ),
					'default'  => '',
				],
				[
					'id'       => 'amp_inline_single_adsense_size',
					'type'     => 'select',
					'required' => [ 'amp_inline_single_ad_type', '=', '1' ],
					'title'    => esc_html__( 'Adsense Size', 'pixwell' ),
					'subtitle' => esc_html__( 'Choose a size for this AdSense ad.', 'pixwell' ),
					'options'  => [
						'1' => esc_html__( 'Responsive', 'pixwell' ),
						'2' => esc_html__( 'Fixed Height (90px)', 'pixwell' ),
					],
					'default'  => '1',
				],
				[
					'id'       => 'amp_inline_single_ad_code',
					'type'     => 'textarea',
					'required' => [ 'amp_inline_single_ad_type', '=', '2' ],
					'title'    => esc_html__( 'AMP Custom Ad Script', 'pixwell' ),
					'subtitle' => esc_html__( 'Paste your custom ad script for AMP here.', 'pixwell' ),
					'rows'     => 2,
					'default'  => '',
				],
				[
					'id'          => 'amp_inline_single_ad_pos',
					'type'        => 'text',
					'title'       => esc_html__( 'After Paragraphs', 'pixwell' ),
					'subtitle'    => esc_html__( 'Display this ad after a certain number of paragraphs. Separate paragraph numbers by commas. Default is 2.', 'pixwell' ),
					'placeholder' => '2, 5',
					'default'     => '',
				],
				[
					'id'     => 'section_end_amp_inline_single_advert',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}

