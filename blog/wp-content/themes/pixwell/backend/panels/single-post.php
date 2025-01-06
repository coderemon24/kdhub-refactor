<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_register_options_single_post' ) ) {
	function pixwell_register_options_single_post() {

		return [
			'title' => esc_html__( 'Single Post', 'pixwell' ),
			'id'    => 'pixwell_config_section_single_post',
			'desc'  => esc_html__( 'Select options for the single post, Options below will apply to all single post pages.', 'pixwell' ),
			'icon'  => 'el el-file',
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_single_post_styles' ) ) {
	function pixwell_register_options_single_post_styles() {

		return [
			'title'      => esc_html__( 'Styles & Design', 'pixwell' ),
			'id'         => 'pixwell_config_section_single_post_styles',
			'desc'       => esc_html__( 'Customize styles & layout for the single post.', 'pixwell' ),
			'icon'       => 'el el-adjust-alt',
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'info_single_post_meta_global',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => esc_html__( 'The settings are treated as a global setting. Individual post settings take priority over them.', 'pixwell' ),
				],
				[
					'id'    => 'info_single_post_settings',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'Navigate to "Post > Edit Post > Pixwell Post Options" to change settings for each post.', 'pixwell' ),
				],
				[
					'id'     => 'section_start_single_entry_category',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Entry Category', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'single_post_cat_info',
					'type'     => 'switch',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable entry category icon.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'          => 'single_cat_primary',
					'type'        => 'switch',
					'title'       => esc_html__( 'Primary Category', 'pixwell' ),
					'subtitle'    => esc_html__( 'Only show the primary category in the single post.', 'pixwell' ),
					'description' => esc_html__( 'To set a primary category for a post, navigate to "Post > Edit Post > Pixwell Post Options > General > Primary Category".', 'pixwell' ),
					'switch'      => true,
					'default'     => 0,
				],
				[
					'id'     => 'section_end_single_entry_category',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_single_meta_info',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Entry Meta', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'single_post_entry_meta',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Bar Manager', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'author' => esc_html__( 'Author', 'pixwell' ),
							'update' => esc_html__( 'Last Updated', 'pixwell' ),
						],
						'disabled' => [
							'date'    => esc_html__( 'Date', 'pixwell' ),
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'single_post_updated_meta',
					'type'     => 'switch',
					'title'    => esc_html__( 'Last Updated Meta', 'pixwell' ),
					'subtitle' => esc_html__( 'Show the last updated meta info.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'single_post_custom_info',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'single_post_avatar',
					'type'     => 'switch',
					'title'    => esc_html__( 'Avatar Image', 'pixwell' ),
					'subtitle' => esc_html__( 'Show the author avatar image before the author entry meta.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'single_post_author_meta_label',
					'type'     => 'switch',
					'title'    => esc_html__( 'Author Label', 'pixwell' ),
					'subtitle' => esc_html__( 'Show the "By" string before the author meta.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'     => 'section_end_single_meta_info',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_single_featured_image',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Featured Image', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'single_feat_size',
					'type'     => 'select',
					'title'    => esc_html__( 'Crop Size', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a crop size for the feature image to disply in the single post page.', 'pixwell' ),
					'options'  => [
						'full' => esc_html__( 'Full Size', 'pixwell' ),
						'crop' => esc_html__( 'Crop Size', 'pixwell' ),
					],
					'default'  => 'full',
				],
				[
					'id'       => 'single_post_parallax',
					'type'     => 'switch',
					'title'    => esc_html__( 'Parallax Animation', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable parallax animation when scrolling. This option will affect Full Wide and Full Screen layouts.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'auto_video_featured',
					'title'    => esc_html__( 'Auto Featured Image from Video Platforms', 'pixwell' ),
					'subtitle' => esc_html__( 'Automatically fetch images from YouTube, Vimeo, and Dailymotion to set them as the featured image for the video post format if the featured image is not set.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'     => 'section_end_single_featured_image',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_single_video',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Post Video', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'single_post_video_autoplay',
					'type'     => 'switch',
					'title'    => esc_html__( 'Video Autoplay', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable autoplay post video format.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'     => 'section_end_single_featured_video',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_single_gallery',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Post Gallery', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'single_post_gallery_layout',
					'type'     => 'select',
					'title'    => esc_html__( 'Gallery Layout', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a default layout for gallery post format.', 'pixwell' ),
					'options'  => [
						'slide' => esc_html__( 'Slider', 'pixwell' ),
						'list'  => esc_html__( 'List Images', 'pixwell' ),
						'grid'  => esc_html__( 'Small Grid', 'pixwell' ),
					],
					'default'  => 'slide',
				],
				[
					'id'     => 'section_end_single_gallery',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_single_post_layout' ) ) {
	function pixwell_register_options_single_post_layout() {

		return [
			'title'      => esc_html__( 'Single Layout', 'pixwell' ),
			'id'         => 'pixwell_config_section_single_post_layout',
			'desc'       => esc_html__( 'Customize layout for the single post.', 'pixwell' ),
			'icon'       => 'el el-laptop',
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'info_single_post_layout_global',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => esc_html__( 'The settings are treated as a global setting. Individual post settings take priority over them.', 'pixwell' ),
				],
				[
					'id'    => 'info_single_layout_featured',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'The settings below is treated as a global settings. Other position settings take priority over them.', 'pixwell' ),
				],
				[
					'id'    => 'info_single_layout_featured',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => esc_html__( 'The layout automatically rollback to the "Classic" if its featured image isn\'t set.', 'pixwell' ),
				],
				[
					'id'    => 'info_single_layout_edit',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'Navigate to "Post > Edit Post > Pixwell Post Options" to change settings for each post.', 'pixwell' ),
				],
				[
					'id'     => 'section_start_single_post_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Layout', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'single_post_layout',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Single Layout', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a layout for the single post.', 'pixwell' ),
					'desc'     => esc_html__( 'Some layouts requests FEATURED IMAGE to work.', 'pixwell' ),
					'options'  => pixwell_add_settings_single_layouts(),
					'default'  => '1',
				],
				[
					'id'          => 'single_post_header_align',
					'type'        => 'switch',
					'title'       => esc_html__( 'Layout Classic - Centered Header', 'pixwell' ),
					'subtitle'    => esc_html__( 'Align center the single post header.', 'pixwell' ),
					'description' => esc_html__( 'This setting only apply to the classic layouts.', 'pixwell' ),
					'default'     => '0',
				],
				[
					'id'          => 'single_podcast_layout',
					'type'        => 'select',
					'title'       => esc_html__( 'Podcast Layout', 'pixwell' ),
					'subtitle'    => esc_html__( 'Show podcast layout for the audio post format.', 'pixwell' ),
					'description' => esc_html__( 'This setting only apply to the audio post format.', 'pixwell' ),
					'options'     => [
						'1' => esc_html__( 'Default Layout', 'pixwell' ),
						'2' => esc_html__( 'Enable Single Podcast', 'pixwell' ),
					],
					'default'     => '1',
				],
				[
					'id'          => 'single_podcast_bg_color',
					'type'        => 'color',
					'transparent' => false,
					'title'       => esc_html__( 'Top - Background Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select color background for the single podcast layout.', 'pixwell' ),
				],
				[
					'id'     => 'section_end_single_post_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_single_post_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Sidebar', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'single_post_sidebar_name',
					'type'     => 'select',
					'title'    => esc_html__( 'Assign a Sidebar', 'pixwell' ),
					'subtitle' => esc_html__( 'Assign a sidebar for the single post.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_name(),
					'default'  => 'pixwell_sidebar_default',
				],
				[
					'id'       => 'single_post_sidebar_pos',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar Position', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a sidebar position for the single post.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_pos(),
					'default'  => 'default',
				],
				[
					'id'     => 'section_end_single_post_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_single_post_section' ) ) {
	function pixwell_register_options_single_post_section() {

		return [
			'id'         => 'pixwell_config_section_single_post_section',
			'title'      => esc_html__( 'Content Area', 'pixwell' ),
			'desc'       => esc_html__( 'Manage layout and styles for the post content.', 'pixwell' ),
			'icon'       => 'el el-th-list',
			'subsection' => true,
			'fields'     => [
				[
					'id'       => 'section_start_single_p_tag',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'Paragraph Spacing', 'pixwell' ),
					'subtitle' => esc_html__( 'These settings will affect the spacing of paragraph tags within the post content.', 'pixwell' ),
					'indent'   => true,
				],
				[
					'id'          => 'single_post_content_spacing',
					'type'        => 'text',
					'title'       => esc_html__( 'Paragraph Spacing (rem)', 'pixwell' ),
					'subtitle'    => esc_html__( 'Enter a spacing value in rem (relative to the body font size) for the spacing between paragraphs in the post content.', 'pixwell' ),
					'description' => esc_html__( 'This value specifies the spacing between paragraphs relative to the body font size, measured in rem. The default value is 1.5', 'pixwell' ),
					'placeholder' => '1.5',
				],
				[
					'id'     => 'section_end_single_p_tag',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_single_section_footer',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Footer Content Area', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'single_post_tag',
					'type'     => 'switch',
					'title'    => esc_html__( 'Display Post Tags', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to show or hide the tags bar below the post content.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'single_post_source',
					'type'     => 'switch',
					'title'    => esc_html__( 'Display Source Information', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to show or hide the source bar below the post content.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'single_post_via',
					'type'     => 'switch',
					'title'    => esc_html__( 'Display Via Information', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to show or hide the via bar below the post content.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'     => 'section_end_start_single_section_footer',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'       => 'section_start_single_box',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'Post Sections', 'pixwell' ),
					'subtitle' => esc_html__( 'The author card box displays author information. Visit "Users > Your Profile" to complete your profile information.', 'pixwell' ),
					'indent'   => true,
				],
				[
					'id'       => 'single_post_author',
					'type'     => 'switch',
					'title'    => esc_html__( 'Author Bio Card', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to show or hide the author card on single posts.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'single_p_multi_author',
					'type'     => 'switch',
					'title'    => esc_html__( 'Multi-Author Cards', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to show or hide multi-author cards on single posts.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'single_post_navigation',
					'type'     => 'switch',
					'title'    => esc_html__( 'Next/Previous Articles', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to show or hide next/previous link navigation in single posts.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'single_post_comment_btn',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show/Hide Comment Button', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to show or hide the comment box button on single post pages.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'     => 'section_end_single_box',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_single_post_share' ) ) {
	function pixwell_register_options_single_post_share() {

		return [
			'title'      => esc_html__( 'Share on Socials', 'pixwell' ),
			'id'         => 'pixwell_config_section_single_post_share',
			'desc'       => esc_html__( 'Customize the share on socials sections for the single post.', 'pixwell' ),
			'icon'       => 'el el-share',
			'subsection' => true,
			'fields'     => [
				[
					'id'     => 'section_start_single_post_total_shares',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Total Counter', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'          => 'total_share',
					'type'        => 'switch',
					'title'       => esc_html__( 'Total Counter', 'pixwell' ),
					'subtitle'    => esc_html__( 'Show the total shares value.', 'pixwell' ),
					'description' => esc_html__( 'The theme will calculate shares data from Facebook and Pinterest.', 'pixwell' ),
					'switch'      => true,
					'default'     => 0,
				],
				[
					'id'     => 'section_end_single_post_total_shares',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'       => 'section_start_single_post_social_top',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'for The Top Area', 'pixwell' ),
					'subtitle' => esc_html__( 'The section will appear at the top of the single post, below the single entry meta info.', 'pixwell' ),
					'indent'   => true,
				],
				[
					'id'       => 'share_top',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share Bar', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable top share section.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'share_top_facebook',
					'type'     => 'switch',
					'title'    => esc_html__( 'Facebook', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Facebook.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'share_top_twitter',
					'type'     => 'switch',
					'title'    => esc_html__( 'Twitter', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Twitter.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'share_top_pinterest',
					'type'     => 'switch',
					'title'    => esc_html__( 'Pinterest', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Pinterest.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'share_top_whatsapp',
					'type'     => 'switch',
					'title'    => esc_html__( 'WhatsApp', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via WhatsApp.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'share_top_linkedin',
					'type'     => 'switch',
					'title'    => esc_html__( 'LinkedIn', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via LinkedIn.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'share_top_tumblr',
					'type'     => 'switch',
					'title'    => esc_html__( 'Tumblr', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Tumblr.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'share_top_reddit',
					'type'     => 'switch',
					'title'    => esc_html__( 'Reddit', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Reddit.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'share_top_vk',
					'type'     => 'switch',
					'title'    => esc_html__( 'Vkontakte', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Vkontakte.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'share_top_telegram',
					'type'     => 'switch',
					'title'    => esc_html__( 'Telegram', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Telegram.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'share_top_email',
					'type'     => 'switch',
					'title'    => esc_html__( 'Email', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via email.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'     => 'section_end_single_post_social_top',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'       => 'section_start_single_post_social_bottom',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'for The Bottom Content', 'pixwell' ),
					'subtitle' => esc_html__( 'The section will appear at the bottom of the single post content.', 'pixwell' ),
					'indent'   => true,
				],
				[
					'id'       => 'share_bottom',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share Bar', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bottom share bar.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'share_bottom_facebook',
					'type'     => 'switch',
					'title'    => esc_html__( 'Facebook', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Facebook.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'share_bottom_twitter',
					'type'     => 'switch',
					'title'    => esc_html__( 'Twitter', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Twitter.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'share_bottom_pinterest',
					'type'     => 'switch',
					'title'    => esc_html__( 'Pinterest', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Pinterest.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'share_bottom_whatsapp',
					'type'     => 'switch',
					'title'    => esc_html__( 'WhatsApp', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via WhatsApp.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'share_bottom_linkedin',
					'type'     => 'switch',
					'title'    => esc_html__( 'LinkedIn', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via LinkedIn.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'share_bottom_tumblr',
					'type'     => 'switch',
					'title'    => esc_html__( 'Tumblr', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Tumblr.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'share_bottom_reddit',
					'type'     => 'switch',
					'title'    => esc_html__( 'Reddit', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Reddit.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'share_bottom_vk',
					'type'     => 'switch',
					'title'    => esc_html__( 'Vkontakte', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Vkontakte.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'share_bottom_telegram',
					'type'     => 'switch',
					'title'    => esc_html__( 'Telegram', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Telegram.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'share_bottom_email',
					'type'     => 'switch',
					'title'    => esc_html__( 'Email', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via email.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'     => 'section_end_single_post_social_bottom',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_single_post_related' ) ) {
	function pixwell_register_options_single_post_related() {

		return [
			'id'         => 'pixwell_config_section_single_post_related',
			'title'      => esc_html__( 'Related Section', 'pixwell' ),
			'desc'       => esc_html__( 'Customize the related section.', 'pixwell' ),
			'icon'       => 'el el-paper-clip ',
			'subsection' => true,
			'fields'     => [
				[
					'id'       => 'single_post_related',
					'type'     => 'switch',
					'title'    => esc_html__( 'Related Section', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable related posts.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'single_post_related_layout',
					'type'     => 'select',
					'required' => [ 'single_post_related', '=', '1' ],
					'title'    => esc_html__( 'Blog Layout', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a layout for the post listings.', 'pixwell' ),
					'options'  => [
						'fw_grid_1' => esc_html__( 'FullWidth Grid 1', 'pixwell' ),
						'fw_grid_2' => esc_html__( 'FullWidth Grid 2', 'pixwell' ),
						'fw_list_1' => esc_html__( 'FullWidth List 1', 'pixwell' ),
						'fw_list_2' => esc_html__( 'FullWidth List 2', 'pixwell' ),
					],
					'default'  => 'fw_grid_2',
				],
				[
					'id'       => 'single_post_related_where',
					'type'     => 'select',
					'required' => [ 'single_post_related', '=', '1' ],
					'title'    => esc_html__( 'Posts from Where', 'pixwell' ),
					'subtitle' => esc_html__( 'What posts should be displayed in the related section.', 'pixwell' ),
					'options'  => [
						'all' => esc_html__( 'Same Tags & Categories', 'pixwell' ),
						'tag' => esc_html__( 'Same Tags', 'pixwell' ),
						'cat' => esc_html__( 'Same Categories', 'pixwell' ),
					],
					'default'  => 'all',
				],
				[
					'id'       => 'single_post_related_total',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'required' => [ 'single_post_related', '=', '1' ],
					'title'    => esc_html__( 'Number of Posts', 'pixwell' ),
					'subtitle' => esc_html__( 'Select number of posts to show at once.', 'pixwell' ),
					'default'  => 4,
				],
				[
					'id'       => 'single_post_related_pagination',
					'title'    => esc_html__( 'Pagination Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a type for the blog pagination.', 'pixwell' ),
					'type'     => 'select',
					'required' => [ 'single_post_related', '=', '1' ],
					'options'  => [
						'0'        => esc_html__( 'Disabled', 'pixwell' ),
						'loadmore' => esc_html__( 'Load More', 'pixwell' ),
					],
					'default'  => '0',
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_single_post_left' ) ) {
	function pixwell_register_options_single_post_left() {

		return [
			'id'         => 'pixwell_config_section_single_left_section',
			'title'      => esc_html__( 'Left Section of Content', 'pixwell' ),
			'desc'       => esc_html__( 'A floating section to the left of the post content.', 'pixwell' ),
			'icon'       => 'el el-braille',
			'subsection' => true,
			'fields'     => [
				[
					'id'     => 'section_start_single_left_section',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'General', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'single_post_left_section',
					'title'    => esc_html__( 'Left Content Section', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the left content section.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'share_left',
					'type'     => 'switch',
					'title'    => esc_html__( 'Left Share Bar', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the share on socials bar.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'single_post_left_article',
					'title'    => esc_html__( 'Recommended Article', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable the most recommended article.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'     => 'section_end_single_left_section',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_single_left_socials',
					'title'  => esc_html__( 'Share on Socials', 'pixwell' ),
					'notice' => [
						esc_html__( 'The settings below require "Left Share Bar" to be enabled.', 'pixwell' ),
						esc_html__( 'These settings will apply to the single left content section.', 'pixwell' ),
					],
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'indent' => true,
				],
				[
					'id'       => 'share_left_facebook',
					'type'     => 'switch',
					'title'    => esc_html__( 'Facebook', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Facebook.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'share_left_twitter',
					'type'     => 'switch',
					'title'    => esc_html__( 'Twitter', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Twitter.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'share_left_pinterest',
					'type'     => 'switch',
					'title'    => esc_html__( 'Pinterest', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Pinterest.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'share_left_whatsapp',
					'type'     => 'switch',
					'title'    => esc_html__( 'WhatsApp', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via WhatsApp.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'share_left_linkedin',
					'type'     => 'switch',
					'title'    => esc_html__( 'LinkedIn', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via LinkedIn.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'share_left_tumblr',
					'type'     => 'switch',
					'title'    => esc_html__( 'Tumblr', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Tumblr.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'share_left_reddit',
					'type'     => 'switch',
					'title'    => esc_html__( 'Reddit', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Reddit.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'share_left_vk',
					'type'     => 'switch',
					'title'    => esc_html__( 'Vkontakte', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Vkontakte.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'share_left_telegram',
					'type'     => 'switch',
					'title'    => esc_html__( 'Telegram', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via Telegram.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'share_left_email',
					'type'     => 'switch',
					'title'    => esc_html__( 'Email', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable sharing via email.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'     => 'section_end_single_left_socials',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_single_next_post' ) ) {
	function pixwell_register_options_single_next_post() {

		return [
			'id'         => 'pixwell_config_section_single_next',
			'title'      => esc_html__( 'Infinite Next Posts', 'pixwell' ),
			'desc'       => esc_html__( 'Encourage site visitors to keep reading your content.', 'pixwell' ),
			'icon'       => 'el el-repeat',
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'info_ajax_next_posts',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => esc_html__( 'Consider disabling the AJAX load for next posts if you use Cooked or WP Recipe Maker, as third-party JavaScript may not function correctly in AJAX requests.', 'pixwell' ),
				],
				[
					'id'       => 'ajax_next_post',
					'type'     => 'switch',
					'title'    => esc_html__( 'Next Posts', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable the "Load Next Posts" feature.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'ajax_next_cat',
					'type'     => 'switch',
					'title'    => esc_html__( 'Same Categories', 'pixwell' ),
					'subtitle' => esc_html__( 'Display only posts that belong to the same categories as the current post.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'ajax_next_related',
					'type'     => 'select',
					'title'    => esc_html__( 'Related Posts', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable the related section for subsequent posts.', 'pixwell' ),
					'options'  => [
						'0' => esc_html__( '- Disable -', 'pixwell' ),
						'1' => esc_html__( 'Enable', 'pixwell' ),
					],
					'default'  => '0',
				],
				[
					'id'          => 'ajax_next_sidebar_name',
					'type'        => 'select',
					'title'       => esc_html__( 'Assign a Sidebar', 'pixwell' ),
					'subtitle'    => esc_html__( 'Assign a custom sidebar for subsequent posts.', 'pixwell' ),
					'description' => esc_html__( 'We recommend using a simple or ad-only sidebar.', 'pixwell' ),
					'options'     => pixwell_add_settings_sidebar_name(),
					'default'     => 'pixwell_sidebar_default',
				],
				[
					'id'       => 'ajax_next_hide_sidebar',
					'type'     => 'switch',
					'title'    => esc_html__( 'Hide Sidebar on Mobile', 'pixwell' ),
					'subtitle' => esc_html__( 'Hide sidebars on mobile devices when loading subsequent posts.', 'pixwell' ),
					'default'  => true,
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_single_review' ) ) {
	function pixwell_register_options_single_review() {

		return [
			'id'         => 'pixwell_config_section_single_post_review',
			'title'      => esc_html__( 'Users Review', 'pixwell' ),
			'desc'       => esc_html__( 'Choose options for the post review.', 'pixwell' ),
			'icon'       => 'el el-star',
			'subsection' => true,
			'fields'     => [
				[
					'id'       => 'review_users',
					'title'    => esc_html__( 'Users Review', 'pixwell' ),
					'subtitle' => esc_html__( 'Replace the comment box with a review box for the post review.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_reaction' ) ) {
	function pixwell_register_options_reaction() {

		return [
			'id'         => 'pixwell_theme_ops_section_reaction',
			'title'      => esc_html__( 'Post Reactions', 'pixwell' ),
			'desc'       => esc_html__( 'Customize the reactions.', 'pixwell' ),
			'icon'       => 'el el-smiley',
			'subsection' => true,
			'fields'     => [
				[
					'id'     => 'section_start_ruby_reaction_general',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'General', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'single_post_reaction',
					'type'     => 'switch',
					'title'    => esc_html__( 'Reaction Section', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable the reaction section.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'unique_reaction',
					'type'     => 'switch',
					'title'    => esc_html__( 'Once React', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable to restrict users to one reaction per item. User reaction data will be refreshed when this option is toggled.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'     => 'section_end_ruby_reaction_general',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_ruby_reaction',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Reactions', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'reaction_love',
					'type'     => 'switch',
					'title'    => esc_html__( 'Love', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the love reaction item.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'reaction_sad',
					'type'     => 'switch',
					'title'    => esc_html__( 'Sad', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the sad reaction item.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'reaction_happy',
					'type'     => 'switch',
					'title'    => esc_html__( 'Happy', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the happy reaction item.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'reaction_sleepy',
					'type'     => 'switch',
					'title'    => esc_html__( 'Sleepy', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the sleepy reaction item.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'reaction_angry',
					'type'     => 'switch',
					'title'    => esc_html__( 'Angry', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the angry reaction item.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'reaction_dead',
					'type'     => 'switch',
					'title'    => esc_html__( ' Dead', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the dead reaction item.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'reaction_wink',
					'type'     => 'switch',
					'title'    => esc_html__( 'Wink', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the wink reaction item.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'     => 'section_end_ruby_reaction',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}
