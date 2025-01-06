<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

/** element style */
if ( ! function_exists( 'pixwell_register_options_styling' ) ) {
	function pixwell_register_options_styling() {

		return [
			'id'    => 'pixwell_config_section_styling',
			'title' => esc_html__( 'Modules Design', 'pixwell' ),
			'icon'  => 'el el-idea',
		];
	}
}

/** classic style config */
if ( ! function_exists( 'pixwell_register_options_styling_classic' ) ) {
	function pixwell_register_options_styling_classic() {

		return [
			'id'         => 'pixwell_config_section_styling_classic',
			'title'      => esc_html__( 'Post Classic 1', 'pixwell' ),
			'icon'       => 'el el-align-justify',
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "Classic" module. This layout is used in: <em>Classic (Content)</em><em>Blog, Archive Listing: Classic (Content)</em>', 'pixwell' ) ),
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'information_classic',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-classic.jpg' ) . '" alt="classic">' ),
				],
				[
					'id'       => 'padding_content_classic',
					'title'    => esc_html__( 'Padding Content', 'pixwell' ),
					'subtitle' => esc_html__( 'Set padding to the left and the right content.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'cat_info_classic',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the entry category on the thumbnails.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'custom_info_classic',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'          => 'excerpt_length_classic',
					'type'        => 'text',
					'class'       => 'small-text',
					'validate'    => 'numeric',
					'title'       => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle'    => esc_html__( 'Set the maximum length for post excerpts.', 'pixwell' ),
					'description' => esc_html__( 'Leave blank to show the full content, or set to -1 to disable excerpts.', 'pixwell' ),
					'default'     => 40,
				],
				[
					'id'       => 'excerpt_classic',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Specify the source of content for the excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => [
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
						'moretag' => esc_html__( 'Use Read More Tag (disable excerpt length)', 'pixwell' ),
					],
					'default'  => '0',
				],
				[
					'id'       => 'entry_meta_classic',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'author' => esc_html__( 'Author', 'pixwell' ),
							'date'   => esc_html__( 'Date', 'pixwell' ),
						],
						'disabled' => [
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'readmore_classic',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the "Read More" button.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'review_classic',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'bookmark_classic',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
			],
		];
	}
}

/** classic 2 config */
if ( ! function_exists( 'pixwell_register_options_styling_classic_2' ) ) {
	function pixwell_register_options_styling_classic_2() {

		return [
			'id'         => 'pixwell_config_section_styling_classic_2',
			'title'      => esc_html__( 'Post Classic 2', 'pixwell' ),
			'icon'       => 'el el-align-justify',
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "Classic - centered mode" module. This layout is used in: <em>Masonry Mix 1 (Content)</em>', 'pixwell' ) ),
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'information_classic_2',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-classic-2.jpg' ) . '" alt="classic 2">' ),
				],
				[
					'id'       => 'cat_info_classic_2',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the entry category on the thumbnails.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'custom_info_classic_2',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'          => 'excerpt_length_classic_2',
					'type'        => 'text',
					'class'       => 'small-text',
					'validate'    => 'numeric',
					'title'       => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle'    => esc_html__( 'Set the maximum length for post excerpts.', 'pixwell' ),
					'description' => esc_html__( 'Leave blank to show the full content, or set to -1 to disable excerpts.', 'pixwell' ),
					'default'     => false,
				],
				[
					'id'       => 'excerpt_classic_2',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Specify the source of content for the excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => [
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
						'moretag' => esc_html__( 'Use Read More Tag (disable excerpt length)', 'pixwell' ),
					],
					'default'  => '0',
				],
				[
					'id'       => 'entry_meta_classic_2',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'author' => esc_html__( 'Author', 'pixwell' ),
							'date'   => esc_html__( 'Date', 'pixwell' ),
						],
						'disabled' => [
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'readmore_classic_2',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the "Read More" button.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'review_classic',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'bookmark_classic_2',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
			],
		];
	}
}

/** grid 1 */
if ( ! function_exists( 'pixwell_register_options_styling_grid_1' ) ) {
	function pixwell_register_options_styling_grid_1() {

		return [
			'id'         => 'pixwell_config_section_styling_grid_1',
			'title'      => esc_html__( 'Post Grid 1', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "Grid 1" module. This layout is used in: <em>Grid 1 (FullWidth)</em><em>Grid 1 (Content)</em><em>Mix 1 (FullWidth & Content)</em><em>Blog, Archive Listing: Grid 1 (Content), FullWidth Grid 1</em>', 'pixwell' ) ),
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'information_grid_1',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-grid-1.jpg' ) . '" alt="grid 1">' ),
				],
				[
					'id'       => 'cat_info_grid_1',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the entry category on the thumbnails.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'custom_info_grid_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'          => 'excerpt_length_grid_1',
					'type'        => 'text',
					'class'       => 'small-text',
					'validate'    => 'numeric',
					'title'       => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle'    => esc_html__( 'Set the maximum length for post excerpts.', 'pixwell' ),
					'description' => esc_html__( 'Leave blank to show the full content, or set to -1 to disable excerpts.', 'pixwell' ),
					'default'     => false,
				],
				[
					'id'       => 'excerpt_grid_1',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Specify the source of content for the excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => [
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					],
					'default'  => '0',
				],
				[
					'id'       => 'entry_meta_grid_1',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'author' => esc_html__( 'Author', 'pixwell' ),
							'date'   => esc_html__( 'Date', 'pixwell' ),
						],
						'disabled' => [
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'readmore_grid_1',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the "Read More" button.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'review_grid_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'bookmark_grid_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'post_shadow_grid_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Box Shadow', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the box shadow style for this layout.', 'pixwell' ),
					'default'  => false,
				],
			],
		];
	}
}

/** grid 2 */
if ( ! function_exists( 'pixwell_register_options_styling_grid_2' ) ) {
	function pixwell_register_options_styling_grid_2() {

		return [
			'id'         => 'pixwell_config_section_styling_grid_2',
			'title'      => esc_html__( 'Post Grid 2', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "Grid 2" module. This layout is used in: <em>Grid 2 (FullWidth)</em><em>Grid 2 (Content)</em><em>Blog, Archive Listing: Grid 2 (Content), FullWidth Grid 2</em>', 'pixwell' ) ),
			'fields'     => [
				[
					'id'    => 'information_grid_2',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-grid-2.jpg' ) . '" alt="grid 2">' ),
				],
				[
					'id'       => 'cat_info_grid_2',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the entry category on the thumbnails.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'custom_info_grid_2',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'          => 'excerpt_length_grid_2',
					'type'        => 'text',
					'class'       => 'small-text',
					'validate'    => 'numeric',
					'title'       => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle'    => esc_html__( 'Set the maximum length for post excerpts.', 'pixwell' ),
					'description' => esc_html__( 'Leave blank to show the full content, or set to -1 to disable excerpts.', 'pixwell' ),
					'default'     => false,
				],
				[
					'id'       => 'excerpt_grid_2',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Specify the source of content for the excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => [
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					],
					'default'  => '0',
				],
				[
					'id'       => 'entry_meta_grid_2',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'date' => esc_html__( 'Date', 'pixwell' ),
						],
						'disabled' => [
							'author'  => esc_html__( 'Author', 'pixwell' ),
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'readmore_grid_2',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the "Read More" button.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'review_grid_2',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'bookmark_grid_2',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
			],
		];
	}
}

/** grid 3 */
if ( ! function_exists( 'pixwell_register_options_styling_grid_3' ) ) {
	function pixwell_register_options_styling_grid_3() {

		return [
			'id'         => 'pixwell_config_section_styling_grid_3',
			'title'      => esc_html__( 'Post Grid 3', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "Grid 3" module. This layout is used in:<em>Grid 3 (FullWidth)</em><em>Beauty Featured Grid</em><em>Blog, Archive FullWidth Grid 3 Listing</em>', 'pixwell' ) ),
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'information_grid_3',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-grid-3.jpg' ) . '" alt="grid 3">' ),
				],
				[
					'id'       => 'padding_content_grid_3',
					'title'    => esc_html__( 'Padding Content', 'pixwell' ),
					'subtitle' => esc_html__( 'Set padding to the left and the right content.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'cat_info_grid_3',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the entry category on the thumbnails.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'custom_info_grid_3',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'          => 'excerpt_length_grid_3',
					'type'        => 'text',
					'class'       => 'small-text',
					'validate'    => 'numeric',
					'title'       => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle'    => esc_html__( 'Set the maximum length for post excerpts.', 'pixwell' ),
					'description' => esc_html__( 'Leave blank to show the full content, or set to -1 to disable excerpts.', 'pixwell' ),
					'default'     => false,
				],
				[
					'id'       => 'excerpt_grid_3',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Specify the source of content for the excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => [
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					],
					'default'  => '0',
				],
				[
					'id'       => 'entry_meta_grid_3',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'author' => esc_html__( 'Author', 'pixwell' ),
							'date'   => esc_html__( 'Date', 'pixwell' ),
						],
						'disabled' => [
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'readmore_grid_3',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the "Read More" button.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'review_grid_3',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'bookmark_grid_3',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
			],
		];
	}
}

/** grid 4 */
if ( ! function_exists( 'pixwell_register_options_styling_grid_4' ) ) {
	function pixwell_register_options_styling_grid_4() {

		return [
			'id'         => 'pixwell_config_section_styling_grid_4',
			'title'      => esc_html__( 'Post Grid 4', 'pixwell' ),
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "Grid 4" module. This layout is used in: <em>Grid 4 (FullWidth)</em><em>Grid 2 (Content)</em><em>Mega Category Menu</em>', 'pixwell' ) ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'information_grid_4',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-grid-4.jpg' ) . '" alt="grid 4">' ),
				],
				[
					'id'       => 'cat_info_grid_4',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the entry category on the thumbnails.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'entry_meta_grid_4',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'date' => esc_html__( 'Date', 'pixwell' ),
						],
						'disabled' => [
							'author'  => esc_html__( 'Author', 'pixwell' ),
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'review_grid_4',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'bookmark_grid_4',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
			],
		];
	}
}

/** grid 5 */
if ( ! function_exists( 'pixwell_register_options_styling_grid_5' ) ) {
	function pixwell_register_options_styling_grid_5() {

		return [
			'id'         => 'pixwell_config_section_styling_grid_5',
			'title'      => esc_html__( 'Post Grid 5', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "Grid 5" module, specifically designed for a vertical featured image size. This layout is used in:<em>Carousel Slider (Boxed)</em>', 'pixwell' ) ),
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'information_grid_5',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-grid-5.jpg' ) . '" alt="grid 5">' ),
				],
				[
					'id'       => 'cat_info_grid_5',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable category meta info.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'custom_info_grid_5',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'entry_meta_grid_5',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'date' => esc_html__( 'Date', 'pixwell' ),
						],
						'disabled' => [
							'author'  => esc_html__( 'Author', 'pixwell' ),
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'review_grid_5',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'bookmark_grid_5',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
			],
		];
	}
}

/** grid 6 */
if ( ! function_exists( 'pixwell_register_options_styling_grid_6' ) ) {
	function pixwell_register_options_styling_grid_6() {

		return [
			'id'         => 'pixwell_config_section_styling_grid_6',
			'title'      => esc_html__( 'Post Grid 6', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual style for the "Grid 6" module, specifically designed for a vertical featured image size. This layout is used in:<em>Blogger Carousel (Boxed)</em><em>Food Carousel (Stretched)</em>', 'pixwell' ) ),
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'information_grid_6',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-grid-6.jpg' ) . '" alt="grid 6">' ),
				],
				[
					'id'       => 'cat_info_grid_6',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable category meta info.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'custom_info_grid_6',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'entry_meta_grid_6',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'date' => esc_html__( 'Date', 'pixwell' ),
						],
						'disabled' => [
							'author'  => esc_html__( 'Author', 'pixwell' ),
							'date'    => esc_html__( 'Date', 'pixwell' ),
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'review_grid_6',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'bookmark_grid_6',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'          => 'content_bg_grid_6',
					'type'        => 'color',
					'transparent' => false,
					'title'       => esc_html__( 'Content Background', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select content background for this post, Default is #f2f2f2.', 'pixwell' ),

				],
				[
					'id'       => 'text_style_grid_6',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Content Text Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select text style for this grid layout to fit with the background setting.', 'pixwell' ),
					'options'  => pixwell_add_settings_text_style(),
					'default'  => 'dark',
				],
			],
		];
	}
}

/** grid 3 */
if ( ! function_exists( 'pixwell_register_options_styling_grid_7' ) ) {
	function pixwell_register_options_styling_grid_7() {

		return [
			'id'         => 'pixwell_config_section_styling_grid_7',
			'title'      => esc_html__( 'Post Grid Podcast', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "Grid 3" module. This layout is used in:<em>Grid 3 (FullWidth)</em><em>Beauty Featured Grid</em><em>Blog, Archive FullWidth Grid 3 Listing</em>', 'pixwell' ) ),
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'information_grid_7',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/grid-podcast.jpg' ) . '" alt="grid 3">' ),
				],
				[
					'id'       => 'padding_content_grid_7',
					'title'    => esc_html__( 'Padding Content', 'pixwell' ),
					'subtitle' => esc_html__( 'Set padding to the left and the right content.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'cat_info_grid_7',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the entry category on the thumbnails.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'custom_info_grid_7',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'          => 'excerpt_length_grid_7',
					'type'        => 'text',
					'class'       => 'small-text',
					'validate'    => 'numeric',
					'title'       => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle'    => esc_html__( 'Set the maximum length for post excerpts.', 'pixwell' ),
					'description' => esc_html__( 'Leave blank to show the full content, or set to -1 to disable excerpts.', 'pixwell' ),
					'default'     => false,
				],
				[
					'id'       => 'excerpt_grid_7',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Specify the source of content for the excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => [
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					],
					'default'  => '0',
				],
				[
					'id'       => 'entry_meta_grid_7',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'author' => esc_html__( 'Author', 'pixwell' ),
							'date'   => esc_html__( 'Date', 'pixwell' ),
						],
						'disabled' => [
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'readmore_grid_7',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the "Read More" button.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'review_grid_7',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'bookmark_grid_7',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
			],
		];
	}
}

/** list 1 */
if ( ! function_exists( 'pixwell_register_options_styling_list_1' ) ) {
	function pixwell_register_options_styling_list_1() {

		return [
			'id'         => 'pixwell_config_section_styling_list_1',
			'title'      => esc_html__( 'Post List 1', 'pixwell' ),
			'icon'       => 'el el-th-list',
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "List 1" (big list) module. This layout is used in: <em>List 1 (FullWidth)</em><em>Blog, Archive Listing: FullWidth List 1</em>', 'pixwell' ) ),
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'information_list_1',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-list-1.jpg' ) . '" alt="list 1">' ),
				],
				[
					'id'       => 'cat_info_list_1',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the entry category on the thumbnails.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'custom_info_list_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'          => 'excerpt_length_list_1',
					'type'        => 'text',
					'class'       => 'small-text',
					'validate'    => 'numeric',
					'title'       => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle'    => esc_html__( 'Set the maximum length for post excerpts.', 'pixwell' ),
					'description' => esc_html__( 'Leave blank to show the full content, or set to -1 to disable excerpts.', 'pixwell' ),
					'default'     => false,
				],
				[
					'id'       => 'excerpt_list_1',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Specify the source of content for the excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => [
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					],
					'default'  => '0',
				],
				[
					'id'       => 'entry_meta_list_1',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'author' => esc_html__( 'Author', 'pixwell' ),
							'date'   => esc_html__( 'Date', 'pixwell' ),
						],
						'disabled' => [
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'readmore_list_1',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the "Read More" button.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'review_list_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'border_list_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Top Border', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the top border for this layout.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'bookmark_list_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
			],
		];
	}
}

/** list 2 */
if ( ! function_exists( 'pixwell_register_options_styling_list_2' ) ) {
	function pixwell_register_options_styling_list_2() {

		return [
			'id'         => 'pixwell_config_section_styling_list_2',
			'title'      => esc_html__( 'Post List 2', 'pixwell' ),
			'icon'       => 'el el-th-list',
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "List 1" (small list) module. This layout is used in: <em>List 2 (FullWidth)</em><em>Beauty Featured Grid</em><em>Blog, Archive Listing: FullWidth List 2</em>', 'pixwell' ) ),
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'information_list_2',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-list-2.jpg' ) . '" alt="list 2">' ),
				],
				[
					'id'       => 'cat_info_list_2',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the entry category on the thumbnails.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'custom_info_list_2',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'          => 'excerpt_length_list_2',
					'type'        => 'text',
					'class'       => 'small-text',
					'validate'    => 'numeric',
					'title'       => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle'    => esc_html__( 'Set the maximum length for post excerpts.', 'pixwell' ),
					'description' => esc_html__( 'Leave blank to show the full content, or set to -1 to disable excerpts.', 'pixwell' ),
					'default'     => false,
				],
				[
					'id'       => 'excerpt_list_2',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Specify the source of content for the excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => [
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					],
					'default'  => '0',
				],
				[
					'id'       => 'entry_meta_list_2',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'author' => esc_html__( 'Author', 'pixwell' ),
							'date'   => esc_html__( 'Date', 'pixwell' ),
						],
						'disabled' => [
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'readmore_list_2',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the "Read More" button.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'review_list_2',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'bookmark_list_2',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
			],
		];
	}
}

/** list 3 */
if ( ! function_exists( 'pixwell_register_options_styling_list_3' ) ) {
	function pixwell_register_options_styling_list_3() {

		return [
			'id'         => 'pixwell_config_section_styling_list_3',
			'title'      => esc_html__( 'Post List 3', 'pixwell' ),
			'icon'       => 'el el-th-list',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "list 3" module. This layout is used in: <em>List (Content)</em><em>Blog, Archive Listing: List (Content)</em>', 'pixwell' ) ),
			'fields'     => [
				[
					'id'    => 'information_list_3',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-list-3.jpg' ) . '" alt="list 3">' ),
				],
				[
					'id'       => 'cat_info_list_3',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the entry category on the thumbnails.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'custom_info_list_3',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'          => 'excerpt_length_list_3',
					'type'        => 'text',
					'class'       => 'small-text',
					'validate'    => 'numeric',
					'title'       => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle'    => esc_html__( 'Set the maximum length for post excerpts.', 'pixwell' ),
					'description' => esc_html__( 'Leave blank to show the full content, or set to -1 to disable excerpts.', 'pixwell' ),
					'default'     => false,
				],
				[
					'id'       => 'excerpt_list_3',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Specify the source of content for the excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => [
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					],
					'default'  => '0',
				],
				[
					'id'       => 'entry_meta_list_3',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'author' => esc_html__( 'Author', 'pixwell' ),
							'date'   => esc_html__( 'Date', 'pixwell' ),
						],
						'disabled' => [
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'readmore_list_3',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the "Read More" button.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'review_list_3',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'bookmark_list_3',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
			],
		];
	}
}

/** list 4 */
if ( ! function_exists( 'pixwell_register_options_styling_list_4' ) ) {
	function pixwell_register_options_styling_list_4() {

		return [
			'id'         => 'pixwell_config_section_styling_list_4',
			'title'      => esc_html__( 'Post list 4', 'pixwell' ),
			'icon'       => 'el el-th-list',
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "list 4" module. This layout is used in: <em>FullWidth Mix 2 (1/3 Row)</em><em>Content Mix 2 (1/2 Row)</em><em>Mix 1 (FullWidth & Content)</em><em>Sidebar Widget Posts</em>', 'pixwell' ) ),
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'information_list_4',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-list-4.jpg' ) . '" alt="list 4">' ),
				],
				[
					'id'       => 'entry_meta_list_4',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'date' => esc_html__( 'Date', 'pixwell' ),
						],
						'disabled' => [
							'author'  => esc_html__( 'Author', 'pixwell' ),
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
						],
					],
				],
			],
		];
	}
}

/** list 6 */
if ( ! function_exists( 'pixwell_register_options_styling_list_6' ) ) {
	function pixwell_register_options_styling_list_6() {

		return [
			'id'         => 'pixwell_config_section_styling_list_6',
			'title'      => esc_html__( 'Post List 6', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "list 6" module. This layout is used in: <em>Deal Slider (Boxed)</em>', 'pixwell' ) ),
			'fields'     => [
				[
					'id'    => 'information_list_6',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-list-6.jpg' ) . '" alt="list 6">' ),
				],
				[
					'id'       => 'cat_info_list_6',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the entry category on the thumbnails.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'custom_info_list_6',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'          => 'excerpt_length_list_6',
					'type'        => 'text',
					'class'       => 'small-text',
					'validate'    => 'numeric',
					'title'       => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle'    => esc_html__( 'Set the maximum length for post excerpts.', 'pixwell' ),
					'description' => esc_html__( 'Leave blank to show the full content, or set to -1 to disable excerpts.', 'pixwell' ),
					'default'     => 40,
				],
				[
					'id'       => 'excerpt_list_6',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Specify the source of content for the excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => [
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					],
					'default'  => '0',
				],
				[
					'id'       => 'entry_meta_list_6',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'author' => esc_html__( 'Author', 'pixwell' ),
							'date'   => esc_html__( 'Date', 'pixwell' ),
						],
						'disabled' => [
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'readmore_list_6',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the "Read More" button.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'review_list_6',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'bookmark_list_6',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'          => 'content_bg_list_6',
					'type'        => 'color',
					'transparent' => false,
					'title'       => esc_html__( 'Content Background', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select content background for this post, Default is #f2f2f2.', 'pixwell' ),

				],
				[
					'id'       => 'text_style_list_6',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Content Text Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select text style for this grid layout to fit with the background setting.', 'pixwell' ),
					'options'  => pixwell_add_settings_text_style(),
					'default'  => 'dark',
				],
			],
		];
	}
}

/** list 7 */
if ( ! function_exists( 'pixwell_register_options_styling_list_7' ) ) {
	function pixwell_register_options_styling_list_7() {

		return [
			'id'         => 'pixwell_config_section_styling_list_7',
			'title'      => esc_html__( 'Post List 7', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "list 7" module. This layout is used in: <em>Decor Slider (Stretched)</em>', 'pixwell' ) ),
			'fields'     => [
				[
					'id'    => 'information_list_7',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-list-7.jpg' ) . '" alt="list 7">' ),
				],
				[
					'id'       => 'cat_info_list_7',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the entry category on the thumbnails.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'custom_info_list_7',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'          => 'excerpt_length_list_7',
					'type'        => 'text',
					'class'       => 'small-text',
					'validate'    => 'numeric',
					'title'       => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle'    => esc_html__( 'Set the maximum length for post excerpts.', 'pixwell' ),
					'description' => esc_html__( 'Leave blank to show the full content, or set to -1 to disable excerpts.', 'pixwell' ),
					'default'     => '-1',
				],
				[
					'id'       => 'excerpt_list_7',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Specify the source of content for the excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => [
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					],
					'default'  => '0',
				],
				[
					'id'       => 'entry_meta_list_7',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'author' => esc_html__( 'Author', 'pixwell' ),
							'date'   => esc_html__( 'Date', 'pixwell' ),
						],
						'disabled' => [
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'readmore_list_7',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the "Read More" button.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'review_list_7',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'bookmark_list_7',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'          => 'content_bg_list_7',
					'type'        => 'color',
					'transparent' => false,
					'title'       => esc_html__( 'Content Background', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select content background for this post, Default is #f2f2f2.', 'pixwell' ),

				],
				[
					'id'       => 'text_style_list_7',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Content Text Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select text style for this grid layout to fit with the background setting.', 'pixwell' ),
					'options'  => pixwell_add_settings_text_style(),
					'default'  => 'dark',
				],
			],
		];
	}
}

/** post list 8 */
if ( ! function_exists( 'pixwell_register_options_styling_list_8' ) ) {
	function pixwell_register_options_styling_list_8() {

		return [
			'id'         => 'pixwell_config_section_styling_list_8',
			'title'      => esc_html__( 'Post List 8', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "list 8" (big list) module. This layout is used in: <em>Marketing Grid</em>', 'pixwell' ) ),
			'fields'     => [
				[
					'id'    => 'information_list_8',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-list-8.jpg' ) . '" alt="list 8">' ),
				],
				[
					'id'       => 'entry_meta_list_8',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'read' => esc_html__( 'Reading Time', 'pixwell' ),
						],
						'disabled' => [
							'author'  => esc_html__( 'Author', 'pixwell' ),
							'date'    => esc_html__( 'Date', 'pixwell' ),
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'readmore_list_8',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the "Read More" button.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'bookmark_list_8',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
			],
		];
	}
}

/** list 9 */
if ( ! function_exists( 'pixwell_register_options_styling_list_9' ) ) {
	function pixwell_register_options_styling_list_9() {

		return [
			'id'         => 'pixwell_config_section_styling_list_9',
			'title'      => esc_html__( 'Post List Podcast', 'pixwell' ),
			'icon'       => 'el el-th-list',
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "Podcast List" module. This layout is used in: <em>List Podcast (FullWidth)</em><em>Beauty Featured Grid</em><em>Blog, Archive Listing: FullWidth List 2</em>', 'pixwell' ) ),
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'information_list_9',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/list-podcast.jpg' ) . '" alt="list podcast">' ),
				],
				[
					'id'       => 'cat_info_list_9',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the entry category on the thumbnails.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'custom_info_list_9',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'          => 'excerpt_length_list_9',
					'type'        => 'text',
					'class'       => 'small-text',
					'validate'    => 'numeric',
					'title'       => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle'    => esc_html__( 'Set the maximum length for post excerpts.', 'pixwell' ),
					'description' => esc_html__( 'Leave blank to show the full content, or set to -1 to disable excerpts.', 'pixwell' ),
					'default'     => false,
				],
				[
					'id'       => 'excerpt_list_9',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Specify the source of content for the excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => [
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					],
					'default'  => '0',
				],
				[
					'id'       => 'entry_meta_list_9',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'author' => esc_html__( 'Author', 'pixwell' ),
							'date'   => esc_html__( 'Date', 'pixwell' ),
						],
						'disabled' => [
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'readmore_list_9',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the "Read More" button.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'review_list_9',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'bookmark_list_9',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
			],
		];
	}
}

/** overlay 1 */
if ( ! function_exists( 'pixwell_register_options_styling_overlay_1' ) ) {
	function pixwell_register_options_styling_overlay_1() {

		return [
			'id'         => 'pixwell_config_section_styling_overlay_1',
			'title'      => esc_html__( 'Post Overlay 1', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "Overlay 1" (big featured image) module. This layout is used in: <em>Grid (Boxed)</em><em>FullWide Grid (Stretched)</em>', 'pixwell' ) ),
			'fields'     => [
				[
					'id'    => 'information_overlay_1',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-overlay-1.jpg' ) . '" alt="overlay 1">' ),
				],
				[
					'id'       => 'cat_info_overlay_1',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the entry category on the thumbnails.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'custom_info_overlay_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'          => 'excerpt_length_overlay_1',
					'type'        => 'text',
					'class'       => 'small-text',
					'validate'    => 'numeric',
					'title'       => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle'    => esc_html__( 'Set the maximum length for post excerpts.', 'pixwell' ),
					'description' => esc_html__( 'Leave blank to show the full content, or set to -1 to disable excerpts.', 'pixwell' ),
					'default'     => 60,
				],
				[
					'id'       => 'excerpt_overlay_1',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Specify the source of content for the excerpt..', 'pixwell' ),
					'type'     => 'select',
					'options'  => [
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					],
					'default'  => '0',
				],
				[
					'id'       => 'entry_meta_overlay_1',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'author' => esc_html__( 'Author', 'pixwell' ),
							'date'   => esc_html__( 'Date', 'pixwell' ),
						],
						'disabled' => [
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'readmore_overlay_1',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the "Read More" button.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'review_overlay_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'bookmark_overlay_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
			],
		];
	}
}

/** overlay 2 */
if ( ! function_exists( 'pixwell_register_options_styling_overlay_2' ) ) {
	function pixwell_register_options_styling_overlay_2() {

		return [
			'id'         => 'pixwell_config_section_styling_overlay_2',
			'title'      => esc_html__( 'Post Overlay 2', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "Overlay 2" (small horizontal featured image) module. This layout is used in: <em>Wrapper Grid</em><em>Mix Grid (Boxed)</em>', 'pixwell' ) ),
			'fields'     => [
				[
					'id'    => 'information_overlay_2',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-overlay-2.jpg' ) . '" alt="overlay 2">' ),
				],
				[
					'id'       => 'cat_info_overlay_2',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the entry category on the thumbnails.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'custom_info_overlay_2',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'entry_meta_overlay_2',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'custom' => esc_html__( 'Custom', 'pixwell' ),
						],
						'disabled' => [
							'date'    => esc_html__( 'Date', 'pixwell' ),
							'author'  => esc_html__( 'Author', 'pixwell' ),
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'bookmark_overlay_2',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
			],
		];
	}
}

/** overlay 3 */
if ( ! function_exists( 'pixwell_register_options_styling_overlay_3' ) ) {
	function pixwell_register_options_styling_overlay_3() {

		return [
			'id'         => 'pixwell_config_section_styling_overlay_3',
			'title'      => esc_html__( 'Post Overlay 3', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "Overlay 3" (small horizontal featured image) module. This layout is used in:<em>FullWide Grid (Stretched)</em>', 'pixwell' ) ),
			'fields'     => [
				[
					'id'    => 'information_overlay_3',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-overlay-3.jpg' ) . '" alt="overlay 3">' ),
				],
				[
					'id'       => 'cat_info_overlay_3',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the entry category on the thumbnails.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'custom_info_overlay_3',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'entry_meta_overlay_3',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'custom' => esc_html__( 'Custom', 'pixwell' ),
						],
						'disabled' => [
							'author'  => esc_html__( 'Author', 'pixwell' ),
							'date'    => esc_html__( 'Date', 'pixwell' ),
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'bookmark_overlay_3',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
			],
		];
	}
}

/** overlay 4 */
if ( ! function_exists( 'pixwell_register_options_styling_overlay_4' ) ) {
	function pixwell_register_options_styling_overlay_4() {

		return [
			'id'         => 'pixwell_config_section_styling_overlay_4',
			'title'      => esc_html__( 'Post Overlay 4', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "Overlay 4" (wide featured image) module. This layout is used in: <em>Slider (Boxed)</em><em>FullWide Slider (Stretched)</em><em>Full Overlay Grid (Stretched)</em>', 'pixwell' ) ),
			'fields'     => [
				[
					'id'    => 'information_overlay_4',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-overlay-4.jpg' ) . '" alt="overlay 4">' ),
				],
				[
					'id'       => 'cat_info_overlay_4',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the entry category on the thumbnails.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'custom_info_overlay_4',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'          => 'excerpt_length_overlay_4',
					'type'        => 'text',
					'class'       => 'small-text',
					'validate'    => 'numeric',
					'title'       => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle'    => esc_html__( 'Set the maximum length for post excerpts.', 'pixwell' ),
					'description' => esc_html__( 'Leave blank to show the full content, or set to -1 to disable excerpts.', 'pixwell' ),
					'default'     => false,
				],
				[
					'id'       => 'excerpt_overlay_4',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Specify the source of content for the excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => [
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					],
					'default'  => '0',
				],
				[
					'id'       => 'entry_meta_overlay_4',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'author' => esc_html__( 'Author', 'pixwell' ),
							'date'   => esc_html__( 'Date', 'pixwell' ),
						],
						'disabled' => [
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'bookmark_overlay_4',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
			],
		];
	}
}

/** overlay 5 */
if ( ! function_exists( 'pixwell_register_options_styling_overlay_5' ) ) {
	function pixwell_register_options_styling_overlay_5() {

		return [
			'id'         => 'pixwell_config_section_styling_overlay_5',
			'title'      => esc_html__( 'Post Overlay 5', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "Overlay 5" (Vertical featured image) module. This layout is used in: <em>FullWidth Mix 1 (1/3 Row)</em><em>Content Mix 1 (1/2 Row)</em>', 'pixwell' ) ),
			'fields'     => [
				[
					'id'    => 'information_overlay_5',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-overlay-5.jpg' ) . '" alt="overlay 5">' ),
				],
				[
					'id'       => 'cat_info_overlay_5',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the entry category on the thumbnails.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'custom_info_overlay_5',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'entry_meta_overlay_5',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta info  to appear on the this layout.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'author' => esc_html__( 'Author', 'pixwell' ),
							'date'   => esc_html__( 'Date', 'pixwell' ),
						],
						'disabled' => [
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'bookmark_overlay_5',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
			],
		];
	}
}

/** overlay 6 */
if ( ! function_exists( 'pixwell_register_options_styling_overlay_6' ) ) {
	function pixwell_register_options_styling_overlay_6() {

		return [
			'id'         => 'pixwell_config_section_styling_overlay_6',
			'title'      => esc_html__( 'Post Overlay 6', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "Overlay 6" (big featured image) module. This layout is used in:<em>LifeStyle Slider (Boxed)</em>', 'pixwell' ) ),
			'fields'     => [
				[
					'id'    => 'information_overlay_6',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-overlay-6.jpg' ) . '" alt="overlay 6">' ),
				],
				[
					'id'       => 'cat_info_overlay_6',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the entry category on the thumbnails.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'custom_info_overlay_6',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'entry_meta_overlay_6',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'author' => esc_html__( 'Author', 'pixwell' ),
						],
						'disabled' => [
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
							'date'    => esc_html__( 'Date', 'pixwell' ),
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'bookmark_overlay_6',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'no_overlay_overlay_6',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Dark Overlay', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the dark overlay on this layout.', 'pixwell' ),
					'default'  => false,
				],
			],
		];
	}
}

/** overlay 7 */
if ( ! function_exists( 'pixwell_register_options_styling_overlay_7' ) ) {
	function pixwell_register_options_styling_overlay_7() {

		return [
			'id'         => 'pixwell_config_section_styling_overlay_7',
			'title'      => esc_html__( 'Post Overlay 7', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "Overlay 7" module. This layout is used in: <em>Photography Grid (Stretched)</em>', 'pixwell' ) ),
			'fields'     => [
				[
					'id'    => 'information_overlay_7',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-overlay-7.jpg' ) . '" alt="overlay 7">' ),
				],
				[
					'id'       => 'cat_info_overlay_7',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the entry category on the thumbnails.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'custom_info_overlay_7',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'          => 'excerpt_length_overlay_7',
					'type'        => 'text',
					'class'       => 'small-text',
					'validate'    => 'numeric',
					'title'       => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle'    => esc_html__( 'Set the maximum length for post excerpts.', 'pixwell' ),
					'description' => esc_html__( 'Leave blank to show the full content, or set to -1 to disable excerpts.', 'pixwell' ),
					'default'     => false,
				],
				[
					'id'       => 'excerpt_overlay_7',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Specify the source of content for the excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => [
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					],
					'default'  => '0',
				],
				[
					'id'       => 'entry_meta_overlay_7',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'author' => esc_html__( 'Author', 'pixwell' ),
							'date'   => esc_html__( 'Date', 'pixwell' ),
						],
						'disabled' => [
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'bookmark_overlay_7',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
			],
		];
	}
}

/** overlay 8 */
if ( ! function_exists( 'pixwell_register_options_styling_overlay_8' ) ) {
	function pixwell_register_options_styling_overlay_8() {

		return [
			'id'         => 'pixwell_config_section_styling_overlay_8',
			'title'      => esc_html__( 'Post Overlay 8', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "Overlay 8" (big featured) module. This layout is used in:<em>Baby Carousel (Stretched)</em>', 'pixwell' ) ),
			'fields'     => [
				[
					'id'    => 'information_overlay_8',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-overlay-8.jpg' ) . '" alt="overlay 8">' ),
				],
				[
					'id'       => 'cat_info_overlay_8',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the entry category on the thumbnails.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'custom_info_overlay_8',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'entry_meta_overlay_8',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'date' => esc_html__( 'Date', 'pixwell' ),
						],
						'disabled' => [
							'author'  => esc_html__( 'Author', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'bookmark_overlay_8',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
			],
		];
	}
}

/** overlay 9 */
if ( ! function_exists( 'pixwell_register_options_styling_overlay_9' ) ) {
	function pixwell_register_options_styling_overlay_9() {

		return [
			'id'         => 'pixwell_config_section_styling_overlay_9',
			'title'      => esc_html__( 'Post Overlay 9', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "Overlay 8" (full width featured image) module. This layout is used in: <em>Gadget Slider</em>', 'pixwell' ) ),
			'fields'     => [
				[
					'id'    => 'information_overlay_9',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-overlay-9.jpg' ) . '" alt="overlay 9">' ),
				],
				[
					'id'       => 'cat_info_overlay_9',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the entry category on the thumbnails.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'custom_info_overlay_9',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'          => 'excerpt_length_overlay_9',
					'type'        => 'text',
					'class'       => 'small-text',
					'validate'    => 'numeric',
					'title'       => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle'    => esc_html__( 'Set the maximum length for post excerpts.', 'pixwell' ),
					'description' => esc_html__( 'Leave blank to show the full content, or set to -1 to disable excerpts.', 'pixwell' ),
					'default'     => false,
				],
				[
					'id'       => 'excerpt_overlay_9',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Specify the source of content for the excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => [
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					],
					'default'  => '0',
				],
				[
					'id'       => 'entry_meta_overlay_9',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'author' => esc_html__( 'Author', 'pixwell' ),
							'date'   => esc_html__( 'Date', 'pixwell' ),
						],
						'disabled' => [
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'bookmark_overlay_9',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
			],
		];
	}
}

/** masonry 1 */
if ( ! function_exists( 'pixwell_register_options_styling_masonry_1' ) ) {
	function pixwell_register_options_styling_masonry_1() {

		return [
			'id'         => 'pixwell_config_section_styling_masonry_1',
			'title'      => esc_html__( 'Post Masonry 1', 'pixwell' ),
			'icon'       => 'el el-random',
			'desc'       => html_entity_decode( esc_html__( 'Customize the visual styles for the "Masonry 1" module. This layout is used in: <em>Masonry Grid 1 (FullWidth)</em><em>Masonry Mix 1 (Content)</em>', 'pixwell' ) ),
			'subsection' => true,
			'fields'     => [
				[
					'id'    => 'information_masonry_1',
					'type'  => 'info',
					'class' => 'layout-info',
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-masonry-1.jpg' ) . '" alt="masonry 1">' ),
				],
				[
					'id'       => 'cat_info_masonry_1',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the entry category on the thumbnails.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'custom_info_masonry_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'          => 'excerpt_length_masonry_1',
					'type'        => 'text',
					'class'       => 'small-text',
					'validate'    => 'numeric',
					'title'       => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle'    => esc_html__( 'Set the maximum length for post excerpts.', 'pixwell' ),
					'description' => esc_html__( 'Leave blank to show the full content, or set to -1 to disable excerpts.', 'pixwell' ),
					'default'     => false,
				],
				[
					'id'       => 'excerpt_masonry_1',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Specify the source of content for the excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => [
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					],
					'default'  => false,
				],
				[
					'id'       => 'entry_meta_masonry_1',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Sort by how you want post entry meta to appear.', 'pixwell' ),
					'options'  => [
						'enabled'  => [
							'author' => esc_html__( 'Author', 'pixwell' ),
						],
						'disabled' => [
							'date'    => esc_html__( 'Date', 'pixwell' ),
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'update'  => esc_html__( 'Last Updated', 'pixwell' ),
							'read'    => esc_html__( 'Reading Time', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
						],
					],
				],
				[
					'id'       => 'readmore_masonry_1',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the "Read More" button.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'review_masonry_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'bookmark_masonry_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bookmark icon.', 'pixwell' ),
					'default'  => false,
				],
			],
		];
	}
}
