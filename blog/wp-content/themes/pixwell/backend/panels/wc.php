<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_wc_plugin_status_info' ) ) {
	function pixwell_wc_plugin_status_info( $id = 'wc_status_info' ) {
		return [
			[
				'id'    => $id,
				'type'  => 'info',
				'style' => 'warning',
				'desc'  => html_entity_decode( esc_html__( 'Woocommerce Plugin is missing! Please install and activate <a href="https://wordpress.org/plugins/woocommerce">Woocommerce</a> plugin to enable the settings.', 'pixwell' ) ),
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_woocommerce' ) ) {
	function pixwell_register_options_woocommerce() {

		return [
			'id'    => 'pixwell_config_section_wc',
			'title' => esc_html__( 'WooCommerce', 'pixwell' ),
			'desc'  => esc_html__( 'Select options for the shop.', 'pixwell' ),
			'icon'  => 'el el-shopping-cart',
		];
	}
}

/**
 * @return array
 * single product
 */
if ( ! function_exists( 'pixwell_register_options_wc_page' ) ) {
	function pixwell_register_options_wc_page() {

		return [
			'id'         => 'pixwell_config_section_wc_page',
			'title'      => esc_html__( 'WooCommerce Pages', 'pixwell' ),
			'desc'       => esc_html__( 'Select options for the shop, archive, and single product pages.', 'pixwell' ),
			'icon'       => 'el el-folder-open',
			'subsection' => true,
			'fields'     => ! class_exists( 'WooCommerce' ) ? pixwell_wc_plugin_status_info( 'wc_shop_status_info' ) :
				[
					[
						'id'     => 'section_start_wc_shop',
						'type'   => 'section',
						'class'  => 'ruby-section-start',
						'title'  => esc_html__( 'Shop Page Options', 'pixwell' ),
						'indent' => true,
					],
					[
						'id'       => 'wc_shop_posts_per_page',
						'type'     => 'text',
						'class'    => 'small-text',
						'validate' => 'numeric',
						'title'    => esc_html__( 'Products per Page', 'pixwell' ),
						'subtitle' => esc_html__( 'Select number of products per page for the shop page.', 'pixwell' ),
						'default'  => '',
					],
					[
						'id'       => 'wc_shop_sidebar',
						'type'     => 'select',
						'title'    => esc_html__( 'Shop Sidebar', 'pixwell' ),
						'subtitle' => esc_html__( 'Enable or disable the sidebar for the shop page.', 'pixwell' ),
						'options'  => [
							'0' => esc_html__( '- Disable -', 'pixwell' ),
							'1' => esc_html__( 'Enable', 'pixwell' ),
						],
						'default'  => '0',
					],
					[
						'id'       => 'wc_shop_sidebar_name',
						'type'     => 'select',
						'title'    => esc_html__( 'Shop Sidebar Name', 'pixwell' ),
						'subtitle' => esc_html__( 'Select a sidebar for the shop page.', 'pixwell' ),
						'options'  => pixwell_add_settings_sidebar_name(),
						'default'  => 'pixwell_sidebar_default',
					],
					[
						'id'       => 'wc_shop_sidebar_position',
						'type'     => 'image_select',
						'title'    => esc_html__( 'Shop Sidebar Position', 'pixwell' ),
						'subtitle' => esc_html__( 'Select sidebar position for the shop page.', 'pixwell' ),
						'options'  => pixwell_add_settings_sidebar_pos( false ),
						'default'  => 'right',
					],
					[
						'id'     => 'section_end_wc_shop',
						'type'   => 'section',
						'class'  => 'ruby-section-end',
						'indent' => false,
					],
					[
						'id'     => 'section_start_wc_archive',
						'type'   => 'section',
						'class'  => 'ruby-section-start',
						'title'  => esc_html__( 'Archive Shop Pages Options', 'pixwell' ),
						'indent' => true,
					],
					[
						'id'       => 'wc_archive_sidebar',
						'type'     => 'select',
						'title'    => esc_html__( 'Archive Sidebar', 'pixwell' ),
						'subtitle' => esc_html__( 'Enable or disable the sidebar for archive shop pages.', 'pixwell' ),
						'options'  => [
							'0' => esc_html__( '- Disable -', 'pixwell' ),
							'1' => esc_html__( 'Enable', 'pixwell' ),
						],
						'default'  => '0',
					],
					[
						'id'       => 'wc_archive_sidebar_name',
						'type'     => 'select',
						'title'    => esc_html__( 'Sidebar Name', 'pixwell' ),
						'subtitle' => esc_html__( 'Select a sidebar for product category and archive pages.', 'pixwell' ),
						'options'  => pixwell_add_settings_sidebar_name(),
						'default'  => 'pixwell_sidebar_default',
					],
					[
						'id'       => 'wc_archive_sidebar_position',
						'type'     => 'image_select',
						'title'    => esc_html__( 'Sidebar Position', 'pixwell' ),
						'subtitle' => esc_html__( 'Select a sidebar position for product category and archive pages.', 'pixwell' ),
						'options'  => pixwell_add_settings_sidebar_pos( false ),
						'default'  => 'none',
					],
					[
						'id'     => 'section_end_wc_archive',
						'type'   => 'section',
						'class'  => 'ruby-section-end',
						'indent' => false,
					],
					[
						'id'     => 'section_start_wc_single',
						'type'   => 'section',
						'class'  => 'ruby-section-start',
						'title'  => esc_html__( 'Single Product Page', 'pixwell' ),
						'indent' => true,
					],
					[
						'id'       => 'wc_box_review',
						'type'     => 'switch',
						'title'    => esc_html__( 'Show Review Box', 'pixwell' ),
						'subtitle' => esc_html__( 'Enable or disable the review box in the single product page.', 'pixwell' ),

						'default' => 1,
					],
					[
						'id'          => 'wc_related_posts_per_page',
						'type'        => 'text',
						'class'       => 'small-text',
						'validate'    => 'numeric',
						'title'       => esc_html__( 'Total Related Products', 'pixwell' ),
						'subtitle'    => esc_html__( 'Select the total number of related products to show at once.', 'pixwell' ),
						'description' => esc_html__( 'Leave blank to use the default setting.', 'pixwell' ),
						'default'     => 4,
					],
					[
						'id'     => 'section_end_wc_single',
						'type'   => 'section',
						'class'  => 'ruby-section-end no-border',
						'indent' => false,
					],
				],
		];
	}
}

/**
 * @return array
 * styling
 */
if ( ! function_exists( 'pixwell_register_options_wc_styles' ) ) {
	function pixwell_register_options_wc_styles() {

		return [
			'id'         => 'pixwell_config_section_wc_styling',
			'title'      => esc_html__( 'Style', 'pixwell' ),
			'desc'       => esc_html__( 'Choose styles for your WooCommerce pages.', 'pixwell' ),
			'icon'       => 'el el-adjust-alt',
			'subsection' => true,
			'fields'     => ! class_exists( 'WooCommerce' ) ? pixwell_wc_plugin_status_info( 'wc_style_status_info' ) :
				[
					[
						'id'     => 'section_start_wc_styling',
						'type'   => 'section',
						'class'  => 'ruby-section-start',
						'title'  => esc_html__( 'Meta Options', 'pixwell' ),
						'indent' => true,
					],
					[
						'id'       => 'wc_sale_percent',
						'type'     => 'switch',
						'title'    => esc_html__( 'Show Percentage Saved', 'pixwell' ),
						'subtitle' => esc_html__( 'display Percentage saved on WooCommerce sale products', 'pixwell' ),

						'default' => 1,
					],
					[
						'id'       => 'wc_wishlist',
						'type'     => 'switch',
						'title'    => esc_html__( 'Wishlist Icon', 'pixwell' ),
						'subtitle' => esc_html__( 'Enable or disable the Wishlist icon in the product listing.', 'pixwell' ),
						'desc'     => esc_html__( 'This option requests the Wishlist plugin to work.', 'pixwell' ),

						'default' => 1,
					],
					[
						'id'          => 'wc_price_color',
						'title'       => esc_html__( 'Price Color', 'pixwell' ),
						'subtitle'    => esc_html__( 'Select a color for the pricing, this option will override on default theme color, Leave blank if you want to set default (#333).', 'pixwell' ),
						'type'        => 'color',
						'transparent' => false,
					],
					[
						'id'          => 'wc_sale_color',
						'title'       => esc_html__( 'Sale Icon Background', 'pixwell' ),
						'subtitle'    => esc_html__( 'Choose a background color for the sale icon; this option will override the default theme color.', 'pixwell' ),
						'description' => esc_html__( 'Leave blank for the default (#88d398).', 'pixwell' ),
						'type'        => 'color',
						'transparent' => false,
					],
					[
						'id'     => 'section_end_wc_styling',
						'type'   => 'section',
						'class'  => 'ruby-section-end',
						'indent' => false,
					],
					[
						'id'     => 'section_start_wc_typo',
						'type'   => 'section',
						'class'  => 'ruby-section-start',
						'title'  => esc_html__( 'Typography Options', 'pixwell' ),
						'indent' => true,
					],
					[
						'id'             => 'font_price',
						'type'           => 'typography',
						'title'          => esc_html__( 'Product Price Font', 'pixwell' ),
						'subtitle'       => esc_html__( 'Select font values for price elements.', 'pixwell' ),
						'desc'           => esc_html__( 'Default [ font-family: Montserrat | font-size: 16px | font-weight: 500 ]', 'pixwell' ),
						'google'         => true,
						'font-backup'    => true,
						'text-align'     => false,
						'color'          => false,
						'text-transform' => true,
						'letter-spacing' => true,
						'line-height'    => false,
						'units'          => 'px',
					],
					[
						'id'     => 'section_end_wc_typo',
						'type'   => 'section',
						'class'  => 'ruby-section-end no-border',
						'indent' => false,
					],
				],
		];
	}
}
