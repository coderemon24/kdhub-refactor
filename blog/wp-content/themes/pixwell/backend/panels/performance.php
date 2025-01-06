<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_register_options_performance' ) ) {
	function pixwell_register_options_performance() {

		return [
			'id'     => 'pixwell_config_section_performance',
			'title'  => esc_html__( 'Performance', 'pixwell' ),
			'desc'   => esc_html__( 'Select options to optimize your website speed.', 'pixwell' ),
			'icon'   => 'el el-dashboard',
			'fields' => [
				[
					'id'    => 'performance_info',
					'type'  => 'info',
					'title' => sprintf(
						esc_html__( 'We recommend referring to <a target="_blank" href="%s">DOCUMENTATION</a> for optimizing your website.', 'pixwell' ),
						'https://help.themeruby.com/pixwell/optimizing-your-site-speed-and-google-pagespeed-insights/'
					),
					'style' => 'success',
				],
				[
					'id'    => 'ui_font_info',
					'type'  => 'info',
					'title' => esc_html__( 'All font-family settings will not be available if you disable Google Fonts. System UI font will replace them.', 'pixwell' ),
					'style' => 'warning',
				],
				[
					'id'     => 'section_start_image_optimization',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Images', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'disable_srcset',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Srcset', 'pixwell' ),
					'subtitle' => esc_html__( 'Disable Srcset to optimize DOM and the page speed score on mobile devices.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'lazy_load',
					'type'     => 'switch',
					'title'    => esc_html__( 'Lazy Load Featured Image', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable lazy loading for the featured image.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'disable_dashicons',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Dashicons', 'pixwell' ),
					'subtitle' => esc_html__( 'Some 3rd party plugins may load this font icon. Disable it if you do not plan to use it.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'     => 'section_end_image_optimization',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_font_optimization',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Fonts', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'preload_gfonts',
					'type'     => 'switch',
					'title'    => esc_html__( 'Preload Google Fonts', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable preloading Google fonts to increase the site speed score.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'preload_icon',
					'type'     => 'switch',
					'title'    => esc_html__( 'Preload Font Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable preload font icons to increase the site speed score.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'          => 'disable_default_fonts',
					'type'        => 'switch',
					'title'       => esc_html__( 'Disable Default Fonts', 'pixwell' ),
					'subtitle'    => esc_html__( 'The theme will load default fonts to render some elements as heading tags, body, meta.', 'pixwell' ),
					'description' => esc_html__( 'Enable this option if all fonts in Typography panels is set.', 'pixwell' ),
					'default'     => false,
				],
				[
					'id'          => 'disable_google_font',
					'type'        => 'switch',
					'title'       => esc_html__( 'Disable All Google Fonts', 'pixwell' ),
					'subtitle'    => esc_html__( 'The theme will load System UI fonts for all elements if you enable this setting.', 'pixwell' ),
					'description' => esc_html__( 'This is a quick method to choose the System UI font. You can select it for individual elements in the typography settings panel.', 'pixwell' ),
					'default'     => false,
				],
				[
					'id'     => 'section_end_font_optimization',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_more_optimization',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'More', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'disable_block_style',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Gutenberg Style on Page Builder', 'pixwell' ),
					'subtitle' => esc_html__( 'Disable the block style css on the page built with Ruby Composer or Elementor.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'css_file',
					'type'     => 'switch',
					'title'    => esc_html__( 'Force write Dynamic CSS to file', 'pixwell' ),
					'subtitle' => esc_html__( 'Write CSS to file instead of saving to the database.', 'pixwell' ),
					'desc'     => esc_html__( 'The dynamic file CSS may not apply immediately on some servers due to the server cache.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'     => 'section_end_more_optimization',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}