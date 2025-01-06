<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_register_options_post_types' ) ) {
	function pixwell_register_options_post_types() {

		return [
			'id'    => 'pixwell_config_section_post_types',
			'title' => esc_html__( 'Post Types', 'pixwell' ),
			'icon'  => 'dashicons-before dashicons-archive rb-tops-icon',
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_portfolio' ) ) {
	/**
	 * @return array
	 */
	function pixwell_register_options_portfolio() {

		return [
			'id'         => 'pixwell_config_section_portfolio',
			'title'      => esc_html__( 'Portfolio', 'pixwell' ),
			'desc'       => esc_html__( 'Customize the portfolio post type.', 'pixwell' ),
			'icon'       => 'el el-briefcase',
			'subsection' => true,
			'fields'     => [
				[
					'id'       => 'section_start_portfolio_post_type',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'Portfolio Post Type', 'pixwell' ),
					'subtitle' => esc_html__( 'The settings below will not delete exist portfolio post type data in the database.', 'pixwell' ),
					'indent'   => true,
				],
				[
					'id'       => 'portfolio_supported',
					'type'     => 'switch',
					'title'    => esc_html__( 'Support Portfolio Post Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the portfolio post type in your website.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'     => 'section_end_portfolio_post_type',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],

				[
					'id'     => 'section_start_portfolio_permalink',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Permalinks', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'          => 'portfolio_permalink',
					'type'        => 'text',
					'title'       => esc_html__( 'Single Slug', 'pixwell' ),
					'placeholder' => 'portfolio',
					'subtitle'    => esc_html__( 'Input a custom slug for the single portfolio.', 'pixwell' ),
					'default'     => '',
				],
				[
					'id'          => 'portfolio_cat_permalink',
					'type'        => 'text',
					'title'       => esc_html__( 'Category Slug', 'pixwell' ),
					'placeholder' => 'portfolio-category',
					'subtitle'    => esc_html__( 'Input a custom slug for the category portfolio.', 'pixwell' ),
					'default'     => '',
				],
				[
					'id'     => 'section_end_portfolio_permalink',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_portfolio_archive',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Portfolio Category', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'portfolio_archive_layout',
					'type'     => 'select',
					'title'    => esc_html__( 'Portfolio Layout', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a listing layout to display in categories and archive page.', 'pixwell' ),
					'options'  => [
						'masonry_3' => esc_html__( 'Masonry 3 Columns', 'pixwell' ),
						'masonry_4' => esc_html__( 'Masonry 4 Columns', 'pixwell' ),
					],
					'default'  => 'masonry_3',
				],
				[
					'id'          => 'portfolio_posts_per_page',
					'type'        => 'text',
					'title'       => esc_html__( 'Posts per Page', 'pixwell' ),
					'subtitle'    => esc_html__( 'Enter the number of posts to display per page.', 'pixwell' ),
					'description' => esc_html__( 'This setting will override the "Settings > Reading > Blog pages show at most" setting.', 'pixwell' ),
					'class'       => 'small-text',
					'validate'    => 'numeric',
				],
				[
					'id'     => 'section_end_portfolio_archive',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_portfolio_single',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single Portfolio', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'portfolio_info_header',
					'type'     => 'text',
					'title'    => esc_html__( 'Information Title', 'pixwell' ),
					'subtitle' => esc_html__( 'Input a title to display at the top of the portfolio information section.', 'pixwell' ),
					'default'  => esc_html__( 'Info', 'pixwell' ),
				],
				[
					'id'       => 'portfolio_nav',
					'type'     => 'switch',
					'title'    => esc_html__( 'Next/Prev Navigation', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable NEXT/PREV navigation at the bottom of single portfolio.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'portfolio_same_cat',
					'type'     => 'switch',
					'title'    => esc_html__( 'Next/Prev Navigation - Same Categories', 'pixwell' ),
					'subtitle' => esc_html__( 'Only display same categories.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'portfolio_grid_link',
					'type'     => 'switch',
					'title'    => esc_html__( 'Center Grid Link', 'pixwell' ),
					'subtitle' => esc_html__( 'Display the center grid link.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'     => 'section_end_portfolio_single',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_portfolio_share',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Share on Socials', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'portfolio_share',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share on Socials', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the sharing bar, This section will display below the portfolio.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'portfolio_share_facebook',
					'type'     => 'switch',
					'title'    => esc_html__( 'Facebook', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Facebook.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'portfolio_share_twitter',
					'type'     => 'switch',
					'title'    => esc_html__( 'Twitter', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Twitter.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'portfolio_share_pinterest',
					'type'     => 'switch',
					'title'    => esc_html__( 'Pinterest', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Pinterest.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'portfolio_share_whatsapp',
					'type'     => 'switch',
					'title'    => esc_html__( 'WhatsApp', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via WhatsApp.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'portfolio_share_linkedin',
					'type'     => 'switch',
					'title'    => esc_html__( 'LinkedIn', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via LinkedIn.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'portfolio_share_tumblr',
					'type'     => 'switch',
					'title'    => esc_html__( 'Tumblr', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Tumblr.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'portfolio_share_reddit',
					'type'     => 'switch',
					'title'    => esc_html__( 'Reddit', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Reddit.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'portfolio_share_vk',
					'type'     => 'switch',
					'title'    => esc_html__( 'Vkontakte', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Vkontakte.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'portfolio_share_telegram',
					'type'     => 'switch',
					'title'    => esc_html__( 'Telegram', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Telegram.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'portfolio_share_email',
					'type'     => 'switch',
					'title'    => esc_html__( 'Email', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via email.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'     => 'section_end_portfolio_share',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_portfolio_breadcrumb',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Breadcrumb', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'portfolio_breadcrumb',
					'type'     => 'switch',
					'title'    => esc_html__( 'Portfolio Breadcrumb', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the breadcrumb.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'     => 'section_end_portfolio_breadcrumb',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_gallery' ) ) {
	/**
	 * @return array
	 */
	function pixwell_register_options_gallery() {

		return [
			'id'         => 'pixwell_config_section_gallery',
			'title'      => esc_html__( 'Gallery', 'pixwell' ),
			'desc'       => esc_html__( 'Customize the gallery post type.', 'pixwell' ),
			'icon'       => 'el el-camera',
			'subsection' => true,
			'fields'     => [
				[
					'id'       => 'section_start_gallery_post_type',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'Gallery Post Type', 'pixwell' ),
					'subtitle' => esc_html__( 'The settings below will not delete exist gallery post type data in the database.', 'pixwell' ),
					'indent'   => true,
				],
				[
					'id'       => 'gallery_supported',
					'type'     => 'switch',
					'title'    => esc_html__( 'Support Gallery Post Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the gallery post type in your website.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'     => 'section_end_gallery_post_type',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_gallery_permalink',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Permalinks', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'          => 'gallery_permalink',
					'type'        => 'text',
					'title'       => esc_html__( 'Single Slug', 'pixwell' ),
					'placeholder' => 'gallery',
					'subtitle'    => esc_html__( 'Input a custom slug for the single gallery.', 'pixwell' ),
					'default'     => '',
				],
				[
					'id'          => 'gallery_cat_permalink',
					'type'        => 'text',
					'title'       => esc_html__( 'Category Slug', 'pixwell' ),
					'placeholder' => 'gallery-category',
					'subtitle'    => esc_html__( 'Input a custom slug for the category gallery.', 'pixwell' ),
					'default'     => '',
				],
				[
					'id'     => 'section_end_gallery_permalink',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_gallery_share',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Share on Socials', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'gallery_share',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share on Socials', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the sharing bar, This section will display below the gallery.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'gallery_share_facebook',
					'type'     => 'switch',
					'title'    => esc_html__( 'Facebook', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Facebook.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'gallery_share_twitter',
					'type'     => 'switch',
					'title'    => esc_html__( 'Twitter', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Twitter.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'gallery_share_pinterest',
					'type'     => 'switch',
					'title'    => esc_html__( 'Pinterest', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Pinterest.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'gallery_share_whatsapp',
					'type'     => 'switch',
					'title'    => esc_html__( 'WhatsApp', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via WhatsApp.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'gallery_share_linkedin',
					'type'     => 'switch',
					'title'    => esc_html__( 'LinkedIn', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via LinkedIn.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'gallery_share_tumblr',
					'type'     => 'switch',
					'title'    => esc_html__( 'Tumblr', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Tumblr.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'gallery_share_reddit',
					'type'     => 'switch',
					'title'    => esc_html__( 'Reddit', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Reddit.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'gallery_share_vk',
					'type'     => 'switch',
					'title'    => esc_html__( 'Vkontakte', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Vkontakte.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'gallery_share_telegram',
					'type'     => 'switch',
					'title'    => esc_html__( 'Telegram', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Telegram.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'gallery_share_email',
					'type'     => 'switch',
					'title'    => esc_html__( 'Email', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via email.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'     => 'section_end_gallery_share',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_deal' ) ) {
	/**
	 * @return array|null
	 */
	function pixwell_register_options_deal() {

		if ( ! class_exists( 'rb_deal_core' ) ) {
			return null;
		}

		return [
			'id'         => 'pixwell_config_section_deal',
			'title'      => esc_html__( 'Deal Coupon', 'pixwell' ),
			'desc'       => esc_html__( 'Customize for the deal post type.', 'pixwell' ),
			'icon'       => 'el el-bullhorn',
			'subsection' => true,
			'fields'     => [
				[
					'id'          => 'card_color',
					'title'       => esc_html__( 'Card Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select color for the card display on the deal featured image. Default is #4ca695.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				],
				[
					'id'          => 'coupon_color',
					'title'       => esc_html__( 'Coupon Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select color for the coupon display on the deal featured image. Default is #826abc.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
				],
			],
		];
	}
}