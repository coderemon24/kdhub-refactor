<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_register_options_theme_styles' ) ) {
	function pixwell_register_options_theme_styles() {

		return [
			'id'    => 'pixwell_config_section_styling_global',
			'title' => esc_html__( 'Theme Design', 'pixwell' ),
			'icon'  => 'el el-idea',
			'desc'  => esc_html__( 'Customize theme styles. The settings below will apply to your entire website.', 'pixwell' ),
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_site_layout' ) ) {
	function pixwell_register_options_site_layout() {

		return [
			'id'          => 'pixwell_config_section_site_layout',
			'title'       => esc_html__( 'Site Layout', 'pixwell' ),
			'description' => esc_html__( 'This setting will be applied globally to your entire website.', 'pixwell' ),
			'icon'        => 'el el-laptop',
			'subsection'  => true,
			'fields'      => [
				[
					'id'          => 'site_layout',
					'type'        => 'select',
					'title'       => esc_html__( 'Site Layout', 'pixwell' ),
					'subtitle'    => esc_html__( 'Choose a layout for your website.', 'pixwell' ),
					'description' => esc_html__( 'This setting will apply to your entire website.', 'pixwell' ),
					'options'     => [
						'0'        => esc_html__( 'Full Width', 'pixwell' ),
						'is-boxed' => esc_html__( 'Boxed', 'pixwell' ),
					],
					'default'     => 0,
				],
				[
					'id'          => 'boxed_bg',
					'type'        => 'background',
					'transparent' => false,
					'title'       => esc_html__( 'Boxed - Site Background', 'pixwell' ),
					'subtitle'    => esc_html__( 'Customize the background of your website with an image, color, etc.', 'pixwell' ),
					'description' => esc_html__( 'These settings apply specifically to the boxed layout.', 'pixwell' ),
					'default'     => [
						'background-color'      => '#fafafa',
						'background-size'       => 'cover',
						'background-attachment' => 'fixed',
						'background-position'   => 'center center',
						'background-repeat'     => 'no-repeat',
					],
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_unique_post' ) ) {
	function pixwell_register_options_unique_post() {

		return [
			'id'         => 'pixwell_config_section_unique_post',
			'title'      => esc_html__( 'Unique Post', 'pixwell' ),
			'desc'       => esc_html__( 'Control the display of the post listing in the website.', 'pixwell' ),
			'icon'       => 'el el-filter',
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'info_unique post',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => esc_html__( 'If you enable the Unique Post, it\'s recommended to leave the "Post Offset" field in Query settings blank in all blocks. Enabling the offset may cause the beginning posts to be bypassed.', 'pixwell' ),
				],
				[
					'id'          => 'unique_post',
					'type'        => 'switch',
					'title'       => esc_html__( 'Unique Post', 'pixwell' ),
					'subtitle'    => esc_html__( 'Avoid duplicate posts that have been queried before.', 'pixwell' ),
					'description' => esc_html__( 'This setting will be applied globally to your entire website. ', 'pixwell' ),
					'default'     => 1,
				],
				[
					'id'          => 'remove_offset',
					'type'        => 'switch',
					'title'       => esc_html__( 'Remove Offset Settings', 'pixwell' ),
					'subtitle'    => esc_html__( 'Prevent missing posts caused by an offset applied to a block prior to version 11.', 'pixwell' ),
					'description' => esc_html__( 'Enabling this setting will remove all offset configurations in the block when using unique posts.', 'pixwell' ),
					'default'     => 1,
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_round_conner' ) ) {
	function pixwell_register_options_round_conner() {

		return [
			'id'         => 'pixwell_config_section_round_conner',
			'title'      => esc_html__( 'Round Corner', 'pixwell' ),
			'icon'       => 'el el-record',
			'subsection' => true,
			'desc'       => esc_html__( 'The small border style in featured images and other elements throughout the website.', 'pixwell' ),
			'fields'     => [
				[
					'id'       => 'style_element',
					'title'    => esc_html__( 'Round Corner', 'pixwell' ),
					'subtitle' => esc_html__( 'Choose a style for rounded corners on your site elements.', 'pixwell' ),
					'type'     => 'select',
					'options'  => [
						'none'      => esc_html__( 'Rectangle', 'pixwell' ),
						'round_all' => esc_html__( 'Rounded Corners', 'pixwell' ),
						'round'     => esc_html__( 'Rounded Corners except Featured', 'pixwell' ),
					],
					'default'  => 'none',
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_design_gif' ) ) {
	function pixwell_register_options_design_gif() {

		return [
			'id'         => 'pixwell_config_section_gif_supported',
			'title'      => esc_html__( 'GIF & SVG', 'pixwell' ),
			'desc'       => esc_html__( 'Prevent WordPress from converting GIF to a static image when uploading. Also, allow uploading SVG files.', 'pixwell' ),
			'icon'       => 'el el-photo',
			'subsection' => true,
			'fields'     => [
				[
					'id'       => 'gif_support',
					'type'     => 'switch',
					'title'    => esc_html__( 'GIF Supported', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable GIF support for your site.', 'pixwell' ),
					'default'  => '1',
				],
				[
					'id'       => 'svg_support',
					'title'    => esc_html__( 'SVG Supported', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable support for uploading SVG files on your site.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_block_header' ) ) {
	function pixwell_register_options_block_header() {

		return [
			'id'         => 'pixwell_config_section_block_header',
			'title'      => esc_html__( 'Block Heading', 'pixwell' ),
			'desc'       => esc_html__( 'Global heading settings for blocks, widgets, and archives.', 'pixwell' ),
			'icon'       => 'el el-minus',
			'subsection' => true,
			'fields'     => [
				[
					'id'          => 'block_header_style',
					'title'       => esc_html__( 'Block Header Style', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a style for the block and section header.', 'pixwell' ),
					'description' => esc_html__( 'The setting will apply to blocks built with Ruby Composer and Elementor.', 'pixwell' ),
					'type'        => 'select',
					'options'     => [
						'dot' => esc_html__( 'Default (Dot)', 'pixwell' ),
						'1'   => esc_html__( 'Style 1 (Small Border)', 'pixwell' ),
						'2'   => esc_html__( 'Style 2 (Centered & Small Line)', 'pixwell' ),
						'3'   => esc_html__( 'Style 3 (Left No Border Radius)', 'pixwell' ),
						'4'   => esc_html__( 'Style 4 (Title with Background)', 'pixwell' ),
						'5'   => esc_html__( 'Style 5 (Centered and Bold Dot)', 'pixwell' ),
						'6'   => esc_html__( 'Style 6 (Left Title with Big Dot)', 'pixwell' ),
						'7'   => esc_html__( 'Style 7 (Left Title with Big Border)', 'pixwell' ),
					],
					'default'     => 'dot',
				],
				[
					'id'       => 'widget_header_style',
					'title'    => esc_html__( 'Sidebar Widget Header Style', 'pixwell' ),
					'subtitle' => esc_html__( 'The setting will apply to the header of the right sidebar and footer widgets.', 'pixwell' ),
					'type'     => 'select',
					'options'  => [
						'1' => esc_html__( 'Default (Title Only)', 'pixwell' ),
						'2' => esc_html__( 'Style 2 (Centered)', 'pixwell' ),
						'3' => esc_html__( 'Style 3 (With Background)', 'pixwell' ),
					],
					'default'  => '1',
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_entry_category' ) ) {
	function pixwell_register_options_entry_category() {

		return [
			'id'         => 'pixwell_config_section_entry_category',
			'title'      => esc_html__( 'Entry Category', 'pixwell' ),
			'desc'       => esc_html__( 'Control the display of category icons and labels in the post listing.', 'pixwell' ),
			'icon'       => 'el el-folder-open',
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'info_cat_global',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => esc_html__( 'These settings are treated as global settings. Individual category settings take priority over them.', 'pixwell' ),
				],
				[
					'id'    => 'info_cat_individual',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'To edit styles and layout for individual category. Navigate to "Posts > Categories > Edit Category > Pixwell Category Options".', 'pixwell' ),
				],
				[
					'id'       => 'style_cat_icon',
					'title'    => esc_html__( 'Entry Category Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Choose a style for displaying the entry category in the post listing.', 'pixwell' ),
					'type'     => 'select',
					'options'  => [
						'radius' => esc_html__( 'Default (Square)', 'pixwell' ),
						'round'  => esc_html__( 'Rounded Corner', 'pixwell' ),
						'square' => esc_html__( 'Small Square', 'pixwell' ),
						'line'   => esc_html__( 'Underline Text', 'pixwell' ),
						'simple' => esc_html__( 'Text Only', 'pixwell' ),
					],
					'default'  => 'radius',
				],
				[
					'id'          => 'cat_icon_bg_color',
					'title'       => esc_html__( 'Highlight Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Choose a highlight color for the entry category icon.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'          => 'cat_icon_text_color',
					'title'       => esc_html__( 'Text Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a text color for the entry category icon.', 'pixwell' ),
					'description' => esc_html__( 'This setting will not apply to the "Small Square" and "Underline Text" styles.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_design_tooltips' ) ) {
	function pixwell_register_options_design_tooltips() {

		return [
			'id'         => 'pixwell_config_section_tooltips',
			'title'      => esc_html__( 'Tooltips', 'pixwell' ),
			'desc'       => esc_html__( 'Customize tooltips for your website.', 'pixwell' ),
			'icon'       => 'el el-question-sign',
			'subsection' => true,
			'fields'     => [
				[
					'id'       => 'site_tooltips',
					'title'    => esc_html__( 'Tooltips', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable tooltips to display on hover.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_design_back_top' ) ) {
	function pixwell_register_options_design_back_top() {

		return [
			'id'         => 'pixwell_config_section_back_top',
			'title'      => esc_html__( 'Back to Top', 'pixwell' ),
			'icon'       => 'el el-arrow-up',
			'desc'       => esc_html__( 'Customize the back to top button in your website.', 'pixwell' ),
			'subsection' => true,
			'fields'     => [
				[
					'id'       => 'site_back_to_top',
					'type'     => 'switch',
					'title'    => esc_html__( 'Back to Top', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to display the "Back to Top" button at the bottom right corner.', 'pixwell' ),
					'default'  => true,
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_featured_image' ) ) {
	function pixwell_register_options_featured_image() {

		return [
			'id'         => 'pixwell_config_section_featured_image',
			'title'      => esc_html__( 'Featured Image', 'pixwell' ),
			'icon'       => 'el el-picture',
			'subsection' => true,
			'desc'       => esc_html__( 'Customize crop sizes for the post featured image to optimize your hosting disk space.', 'pixwell' ),
			'fields'     => [
				[
					'id'    => 'info_size_regen',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => html_entity_decode( esc_html__( 'Run "REGENERATE THUMBNAILS" if you change the settings below. Refer <a href="//help.themeruby.com/pixwell/what-to-do-when-images-are-not-displaying-consistent-in-size/" target="_blank">this documentation</a> for further information.', 'pixwell' ) ),
				],
				[
					'id'    => 'info_crop_size',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'WordPress automatically crops uploaded images to fit the layout size. Disable unused sizes here.', 'pixwell' ),
				],
				[
					'id'    => 'info_module_size',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'If a module cannot find its defined crop size, retina (2x) or full-size images will be loaded.', 'pixwell' ),
				],
				[
					'id'       => 'section_start_featured_custom',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'Add Image Sizes', 'pixwell' ),
					'subtitle' => esc_html__( 'Use the settings below to add new crop sizes for images on your website.', 'pixwell' ),
					'indent'   => true,
				],
				[
					'id'         => 'featured_crop_sizes',
					'type'       => 'multi_text',
					'class'      => 'medium-text',
					'show_empty' => false,
					'title'      => esc_html__( 'Define Custom Crop Sizes', 'pixwell' ),
					'label'      => esc_html__( 'Add a Crop Size', 'pixwell' ),
					'subtitle'   => esc_html__( 'Create custom crop sizes for featured images.', 'pixwell' ),
					'desc'       => esc_html__( 'Enter a custom crop size in the format: width x height (e.g., 300x200).', 'pixwell' ),
					'add_text'   => esc_html__( 'Create New Crop Size', 'pixwell' ),
					'default'    => [],
				],
				[
					'id'          => 'pos_feat',
					'type'        => 'select',
					'title'       => esc_html__( 'Crop Position', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select the position to crop the featured images.', 'pixwell' ),
					'description' => esc_html__( 'For images of people, it\'s often recommended to use the top position for cropping. This ensures that the faces are not cut off and remain the focal point of the image.', 'pixwell' ),
					'options'     => [
						'center' => esc_html__( 'From the Center', 'pixwell' ),
						'top'    => esc_html__( 'From the Top', 'pixwell' ),
					],
					'default'     => 'center',
				],
				[
					'id'     => 'section_end_featured_custom',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'       => 'section_start_featured_defined',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'Pre-defined Size', 'pixwell' ),
					'subtitle' => esc_html__( 'Manage the predefined sizes for your website. Enable or disable them to free up hosting space.', 'pixwell' ),
					'indent'   => true,
				],
				[
					'id'       => 'pixwell_370x250',
					'type'     => 'switch',
					'title'    => esc_html__( '370x250', 'pixwell' ),
					'subtitle' => esc_html__( 'This image size is used by the following modules: Grid 1, Overlay 2', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'          => 'pixwell_370x250-2x',
					'type'        => 'switch',
					'title'       => esc_html__( '740x500', 'pixwell' ),
					'subtitle'    => esc_html__( 'This image size is used by the following modules: Classic 1, Classic 2, List 1, List 6.', 'pixwell' ),
					'description' => esc_html__( 'It supports retina displays at a size of 370x250.', 'pixwell' ),
					'default'     => true,
				],
				[
					'id'          => 'pixwell_370x250-3x',
					'type'        => 'switch',
					'title'       => esc_html__( '1110x750', 'pixwell' ),
					'subtitle'    => esc_html__( 'This image size is used by the following module: Overlay 1.', 'pixwell' ),
					'description' => esc_html__( 'It supports retina displays at a size of 740x500.', 'pixwell' ),
					'default'     => true,
				],
				[
					'id'       => 'pixwell_280x210',
					'type'     => 'switch',
					'title'    => esc_html__( '280x210', 'pixwell' ),
					'subtitle' => esc_html__( 'This image size is used by the following modules: Grid 2, Grid 4, Grid W1, List 2, List 3, List 4, Left Side Article, Deals, Ruby Newsletter.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'          => 'pixwell_280x210-2x',
					'type'        => 'switch',
					'title'       => esc_html__( '560x420', 'pixwell' ),
					'subtitle'    => esc_html__( 'This image size is used by the following module: Overlay 5.', 'pixwell' ),
					'description' => esc_html__( 'It supports retina displays at a size of 280x210.', 'pixwell' ),
					'default'     => true,
				],
				[
					'id'       => 'pixwell_400x450',
					'type'     => 'switch',
					'title'    => esc_html__( '400x450', 'pixwell' ),
					'subtitle' => esc_html__( 'This image size is used by the following modules: Grid 5, Grid 6, Overlay 3, Category List.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'pixwell_400x600',
					'type'     => 'switch',
					'title'    => esc_html__( '400x600', 'pixwell' ),
					'subtitle' => esc_html__( 'This image size is used by the following modules: Overlay 8, Mix Grid (Boxed).', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'pixwell_450x0',
					'type'     => 'switch',
					'title'    => esc_html__( '450x0', 'pixwell' ),
					'subtitle' => esc_html__( 'This image size is used by the following modules: Masonry 1, Portfolio layout.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'          => 'pixwell_780x0',
					'type'        => 'switch',
					'title'       => esc_html__( '780x0', 'pixwell' ),
					'subtitle'    => esc_html__( 'This image size is used by the following modules: Classic 2, Single Post Page, Mix Grid (Boxed).', 'pixwell' ),
					'description' => esc_html__( 'It supports retina displays at a size of 450x0.', 'pixwell' ),
					'default'     => true,
				],
				[
					'id'          => 'pixwell_780x0-2x',
					'type'        => 'switch',
					'title'       => esc_html__( '1600x0', 'pixwell' ),
					'subtitle'    => esc_html__( 'This image size is used by the following modules: Overlay 4, Overlay 7, Overlay 9, Single Post Page (without sidebar, Fullwidth and Fullscreen), Gallery.', 'pixwell' ),
					'description' => esc_html__( 'It supports retina displays at a size of 780x0.', 'pixwell' ),
					'default'     => true,
				],
				[
					'id'     => 'section_end_featured_defined',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_featured_style',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Dark Overlay', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'feat_overlay',
					'type'     => 'switch',
					'title'    => esc_html__( 'Dark Overlay on Featured Image', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle the dark overlay effect on featured images.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'     => 'section_end_featured_style',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_entry_meta' ) ) {
	function pixwell_register_options_entry_meta() {

		return [
			'id'         => 'pixwell_config_section_entry_meta',
			'title'      => esc_html__( 'Entry Meta', 'pixwell' ),
			'desc'       => esc_html__( 'Customize post entry meta for the blog post listing.', 'pixwell' ),
			'icon'       => 'el el-adjust-alt',
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'info_post_view',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => esc_html__( 'The "View" meta requires the "Post Views Counter" plugin to be installed and active.', 'pixwell' ),
				],
				[
					'id'     => 'section_start_style_meta',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Entry Meta', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'meta_date_icon',
					'title'    => esc_html__( 'Date Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Display a clock icon before the date entry meta.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'human_time',
					'title'    => esc_html__( 'Human Time Format', 'pixwell' ),
					'subtitle' => esc_html__( 'Display the date in human-friendly format ("ago").', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'meta_author_icon',
					'title'    => esc_html__( 'Avatar Image', 'pixwell' ),
					'subtitle' => esc_html__( 'Display the author avatar image before the author entry meta.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'meta_comment_icon',
					'title'    => esc_html__( 'Comment Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Display the comment icon before the comment entry meta.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'meta_view_icon',
					'title'    => esc_html__( 'View Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Display an eye icon before the view entry meta.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'          => 'entry_meta_style',
					'title'       => esc_html__( 'Classic Border', 'pixwell' ),
					'subtitle'    => esc_html__( 'Display a border at the top of the post entry meta.', 'pixwell' ),
					'description' => esc_html__( 'This setting applies only to the big list and classic layout.', 'pixwell' ),
					'type'        => 'select',
					'options'     => [
						'0'      => esc_html__( '- Default -', 'pixwell' ),
						'border' => esc_html__( 'Top Border (Fashion Style)', 'pixwell' ),
					],
					'default'     => 0,
				],
				[
					'id'     => 'section_end_style_meta',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'       => 'section_start_meta_shop',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'Shop The Post Meta', 'pixwell' ),
					'subtitle' => esc_html__( 'These settings will replace the post entry meta.', 'pixwell' ),
					'indent'   => true,
				],
				[
					'id'       => 'meta_shop_post',
					'title'    => esc_html__( 'Shop the Post Meta', 'pixwell' ),
					'subtitle' => esc_html__( 'Display shop the post text with a icon', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'     => 'section_end_meta_shop',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_read_time',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Read Time Meta', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'          => 'read_speed',
					'title'       => esc_html__( 'Reading Speed (Word per minute)', 'pixwell' ),
					'subtitle'    => esc_html__( 'Input a number of words per minute.', 'pixwell' ),
					'description' => esc_html__( 'Default is 130 words per minute.', 'pixwell' ),
					'type'        => 'text',
					'default'     => 130,
				],
				[
					'id'       => 'meta_read_icon',
					'title'    => esc_html__( 'Read Time Meta Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Display the clock icon before the read time meta.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'     => 'section_end_read_time',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_post_format' ) ) {
	function pixwell_register_options_post_format() {

		return [
			'id'         => 'pixwell_config_section_post_format',
			'title'      => esc_html__( 'Post Format', 'pixwell' ),
			'desc'       => esc_html__( 'Customize post format icons for displaying on the post thumbnails.', 'pixwell' ),
			'icon'       => 'el el-play',
			'subsection' => true,
			'fields'     => [
				[
					'id'       => 'post_icon_video',
					'title'    => esc_html__( 'Video Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the video post format icon.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'post_icon_gallery',
					'title'    => esc_html__( 'Gallery Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the gallery post format icon.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'post_icon_audio',
					'title'    => esc_html__( 'Audio Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the audio post format icon.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_custom_meta' ) ) {
	function pixwell_register_options_custom_meta() {

		return [
			'id'         => 'pixwell_config_section_custom_meta',
			'title'      => esc_html__( 'Custom Meta', 'pixwell' ),
			'icon'       => 'el el-asterisk',
			'subsection' => true,
			'desc'       => esc_html__( 'A new meta will appear after the entry category.', 'pixwell' ),
			'fields'     => [
				[
					'id'       => 'meta_custom',
					'title'    => esc_html__( 'Custom Entry Meta', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'          => 'meta_custom_text',
					'title'       => esc_html__( 'Meta Label', 'pixwell' ),
					'subtitle'    => esc_html__( 'Enter the label for this meta.', 'pixwell' ),
					'description' => esc_html__( 'This string will be combined with a value in the post settings for display.', 'pixwell' ),
					'type'        => 'text',
					'default'     => '',
				],
				[
					'id'          => 'meta_custom_icon',
					'title'       => esc_html__( 'Meta Icon ClassName', 'pixwell' ),
					'subtitle'    => esc_html__( 'Input your custom CSS icon classname to display at the beginning of the meta.', 'pixwell' ),
					'description' => esc_html__( 'Find icons here: https://icons.themeruby.com/pixwell/', 'pixwell' ),
					'placeholder' => 'rbi-fish-eye',
					'type'        => 'text',
					'default'     => 'rbi-fish-eye',
				],
				[
					'id'       => 'meta_custom_pos',
					'title'    => esc_html__( 'Label Position', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a position for the meta label.', 'pixwell' ),
					'type'     => 'select',
					'options'  => [
						'end'   => esc_html__( 'Suffix (at the end)', 'pixwell' ),
						'begin' => esc_html__( 'Prefix (at the beginning)', 'pixwell' ),
					],
					'default'  => 'end',
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_slider' ) ) {
	function pixwell_register_options_slider() {

		return [
			'id'         => 'pixwell_config_section_slider',
			'title'      => esc_html__( 'Slider Animation', 'pixwell' ),
			'icon'       => 'el el-resize-horizontal',
			'subsection' => true,
			'desc'       => esc_html__( 'Customize animation for the post sliders and carousels.', 'pixwell' ),
			'fields'     => [
				[
					'id'       => 'slider_play',
					'type'     => 'switch',
					'title'    => esc_html__( 'Autoplay', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable autoplay for the next slides.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'          => 'slider_speed',
					'type'        => 'text',
					'validate'    => 'numeric',
					'placeholder' => '5500',
					'title'       => esc_html__( 'Auto Play Speed', 'pixwell' ),
					'subtitle'    => esc_html__( 'Set the time delay for transitioning to the next slider.', 'pixwell' ),
					'description' => esc_html__( 'The default value is 5500 milliseconds.', 'pixwell' ),
					'default'     => '',
				],
				[
					'id'       => 'slider_dot',
					'type'     => 'switch',
					'title'    => esc_html__( 'Slider Dot', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable slider dot.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'          => 'slider_animation',
					'type'        => 'select',
					'title'       => esc_html__( 'Slide Animation', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a transform animation for sliders.', 'pixwell' ),
					'description' => esc_html__( 'Note: This setting does not apply to carousel blocks.', 'pixwell' ),
					'options'     => [
						'0' => esc_html__( 'Slide', 'pixwell' ),
						'1' => esc_html__( 'Fade', 'pixwell' ),
					],
					'default'     => 0,
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_read_more' ) ) {
	function pixwell_register_options_read_more() {

		return [
			'id'         => 'pixwell_config_section_read_more',
			'title'      => esc_html__( 'Read More', 'pixwell' ),
			'icon'       => 'el el-arrow-right',
			'subsection' => true,
			'desc'       => esc_html__( 'Customize the read more styles for the post listing.', 'pixwell' ),
			'fields'     => [
				[
					'id'    => 'info_read_more_pagespeed',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => esc_html__( 'Enabling the "Read More" text may impact SEO performance in PageSpeed tests.', 'pixwell' ),
				],
				[
					'id'    => 'info_read_more',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'To enable the "Read More" button, navigate to the "Modules Design" settings in each block within the page builder editor.', 'pixwell' ),
				],
				[
					'id'    => 'info_read_more_text',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'To edit the label, navigate to "Theme Translation > Read More Text."', 'pixwell' ),
				],
				[
					'id'       => 'readmore_icon',
					'title'    => esc_html__( 'Arrow Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to display an arrow icon next to the "Read More" text.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'readmore_mobile',
					'title'    => esc_html__( 'Hide "Read More" on Mobile', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable this option to hide the "Read More" link on mobile devices.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_excerpt' ) ) {
	function pixwell_register_options_excerpt() {

		return [
			'id'         => 'pixwell_config_section_excerpt',
			'title'      => esc_html__( 'Post Excerpt', 'pixwell' ),
			'desc'       => esc_html__( 'Customize the post excerpt.', 'pixwell' ),
			'icon'       => 'el el-pencil',
			'subsection' => true,
			'fields'     => [
				[
					'id'       => 'excerpt_mobile',
					'title'    => esc_html__( 'Hide Excerpt on Mobile', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable this option to hide the post excerpt when viewed on mobile devices.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_pagination' ) ) {
	function pixwell_register_options_pagination() {

		return [
			'id'         => 'pixwell_config_section_pagination',
			'title'      => esc_html__( 'Pagination', 'pixwell' ),
			'desc'       => esc_html__( 'Customize style for the blog pagination.', 'pixwell' ),
			'icon'       => 'el el-minus',
			'subsection' => true,
			'fields'     => [
				[
					'id'       => 'pagination_layout',
					'type'     => 'select',
					'title'    => esc_html__( 'Pagination Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Choose a pagination button style for your blog.', 'pixwell' ),
					'options'  => [
						'light' => esc_html__( 'Light Background', 'pixwell' ),
						'dark'  => esc_html__( 'Dark Background', 'pixwell' ),
					],
					'default'  => 'light',
				],
			],
		];
	}
}


if ( ! function_exists( 'pixwell_register_options_wprm_supported' ) ) {
	function pixwell_register_options_wprm_supported() {

		return [
			'id'         => 'pixwell_config_section_wprm_supported',
			'title'      => esc_html__( 'WP Recipe Maker', 'pixwell' ),
			'desc'       => esc_html__( 'Enable styling support for the WP Recipe Maker plugin, compatible with dark mode.', 'pixwell' ),
			'icon'       => 'el el-tasks',
			'subsection' => true,
			'fields'     => [
				[
					'id'       => 'wprm_supported',
					'type'     => 'switch',
					'title'    => esc_html__( 'WP Recipe Maker', 'pixwell' ),
					'subtitle' => esc_html__( 'Customize WP Recipe Maker styling to match Pixwell theme aesthetics.', 'pixwell' ),
					'default'  => 1,
				],
			],
		];
	}
}