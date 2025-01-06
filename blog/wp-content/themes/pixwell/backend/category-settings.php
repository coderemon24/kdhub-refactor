<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

add_filter( 'ruby_taxonomies', 'pixwell_register_term_settings', 10, 1 );

if ( ! function_exists( 'pixwell_register_term_settings' ) ) {
	function pixwell_register_term_settings( $configs ) {

		$configs[] = [
			'title'      => esc_html__( 'Pixwell Category Options', 'pixwell' ),
			'taxonomies' => [ 'category' ],
			'id'         => 'pixwell_meta_categories',
			'tabs'       => [
				[
					'title' => esc_html__( 'Entry Category', 'pixwell' ),
					'id'    => 'entry-category',
					'icon'  => 'dashicons-art',
				],
				[
					'title' => esc_html__( 'Category Header', 'pixwell' ),
					'id'    => 'category-header',
					'icon'  => 'dashicons-editor-justify',
				],
				[
					'title' => esc_html__( 'Predefined Blog', 'pixwell' ),
					'id'    => 'default-blog',
					'icon'  => 'dashicons-text-page',
				],
			],
			'fields'     => [
				[
					'id'   => 'cat_icon',
					'name' => esc_html__( 'Highlight Color', 'pixwell' ),
					'desc' => esc_html__( 'Select a highlight color for the entry category icon of this category.', 'pixwell' ),
					'type' => 'color',
					'tab'  => 'entry-category',
					'std'  => '',
				],
				[
					'id'   => 'cat_color',
					'name' => esc_html__( 'Text Color', 'pixwell' ),
					'desc' => esc_html__( 'Select a text color for the entry category icon of this category.', 'pixwell' ),
					'info' => esc_html__( 'This setting will not apply to the styles: Small Square and Underline Text.', 'pixwell' ),
					'type' => 'color',
					'tab'  => 'entry-category',
					'std'  => '',
				],
				[
					'id'   => 'cat_featured',
					'name' => esc_html__( 'Category Featured Image', 'pixwell' ),
					'desc' => esc_html__( 'Upload a featured image for this category.', 'pixwell' ),
					'info' => esc_html__( 'The recommended image size is 900 x 600px.', 'pixwell' ),
					'type' => 'image',
					'tab'  => 'category-header',
				],
				[
					'id'      => 'header_style',
					'name'    => esc_html__( 'Header Style', 'pixwell' ),
					'desc'    => esc_html__( 'Select a header style for this category page.', 'pixwell' ),
					'type'    => 'select',
					'tab'     => 'category-header',
					'options' => [
						'default' => esc_html__( 'Default from Theme Options', 'pixwell' ),
						'center'  => esc_html__( 'Center', 'pixwell' ),
						'left'    => esc_html__( 'Left', 'pixwell' ),
						'boxed'   => esc_html__( 'Boxed', 'pixwell' ),
					],
					'std'     => 'default',
				],
				[
					'id'   => 'header_image_bg',
					'name' => esc_html__( 'Background Image', 'pixwell' ),
					'desc' => esc_html__( 'Upload a header background image for this category page.', 'pixwell' ),
					'info' => esc_html__( 'Parallax animation is supported. It is recommended to use an image with dimensions around 2000 x 450 pixels for optimal display.', 'pixwell' ),
					'type' => 'image',
					'tab'  => 'category-header',
				],
				[
					'id'   => 'header_solid_bg',
					'name' => esc_html__( 'Solid Background Color', 'pixwell' ),
					'desc' => esc_html__( 'Select header background solid color for this category, Default is #fafafa.', 'pixwell' ),
					'type' => 'color',
					'tab'  => 'category-header',
					'std'  => '',
				],
				[
					'id'      => 'header_text_style',
					'name'    => esc_html__( 'Solid Background Color', 'pixwell' ),
					'desc'    => esc_html__( 'Select a solid background color for the header of this category. The default is #fafafa.', 'pixwell' ),
					'type'    => 'select',
					'tab'     => 'category-header',
					'options' => [
						'default' => esc_html__( 'Default form Theme Options', 'pixwell' ),
						'dark'    => esc_html__( 'Dark', 'pixwell' ),
						'light'   => esc_html__( 'Light', 'pixwell' ),
					],
					'std'     => 'default',
				],
				[
					'id'      => 'breadcrumb',
					'name'    => esc_html__( 'Category Breadcrumb', 'pixwell' ),
					'desc'    => esc_html__( 'Enable or disable the breadcrumb on this category.', 'pixwell' ),
					'tab'     => 'category-header',
					'type'    => 'select',
					'options' => [
						'default' => esc_html__( 'Default from Theme Options', 'pixwell' ),
						'1'       => esc_html__( 'Enable', 'pixwell' ),
						'-1'      => esc_html__( 'Disable', 'pixwell' ),
					],
					'std'     => 'default',
				],
				[
					'id'      => 'layout',
					'name'    => esc_html__( 'Blog Layout', 'pixwell' ),
					'desc'    => esc_html__( 'Select a blog listing layout for this category.', 'pixwell' ),
					'tab'     => 'default-blog',
					'type'    => 'select',
					'options' => [
						'default'   => esc_html__( 'Default from Theme Options', 'pixwell' ),
						'classic'   => esc_html__( 'Classic width Sidebar', 'pixwell' ),
						'ct_list'   => esc_html__( 'List Width Sidebar', 'pixwell' ),
						'ct_grid_1' => esc_html__( 'Grid 1 (2 columns) width Sidebar', 'pixwell' ),
						'ct_grid_2' => esc_html__( 'Grid 2 (3 columns) width Sidebar', 'pixwell' ),
						'fw_grid_1' => esc_html__( 'Grid 1 (3 columns)', 'pixwell' ),
						'fw_grid_2' => esc_html__( 'Grid 2 (4 columns)', 'pixwell' ),
						'fw_grid_3' => esc_html__( 'Grid 3 (2 columns)', 'pixwell' ),
						'fw_list_1' => esc_html__( 'List 1 (Full Width)', 'pixwell' ),
						'fw_list_2' => esc_html__( 'List 2 (2 columns)', 'pixwell' ),
					],
					'std'     => 'default',
				],
				[
					'id'      => 'sidebar_name',
					'name'    => esc_html__( 'Sidebar Name', 'pixwell' ),
					'desc'    => esc_html__( 'Assign a sidebar name for this category page.', 'pixwell' ),
					'info'    => esc_html__( 'This setting will apply to blog layouts with a sidebar.', 'pixwell' ),
					'type'    => 'select',
					'options' => pixwell_add_settings_sidebar_name( true ),
					'tab'     => 'default-blog',
					'std'     => 'default',
				],
				[
					'id'      => 'sidebar_pos',
					'name'    => esc_html__( 'Sidebar Position', 'pixwell' ),
					'desc'    => esc_html__( 'Select sidebar position for this category.', 'pixwell' ),
					'tab'     => 'default-blog',
					'type'    => 'select',
					'options' => [
						'default' => esc_html__( 'Default from Theme Options', 'pixwell' ),
						'right'   => esc_html__( 'Right', 'pixwell' ),
						'left'    => esc_html__( 'Left', 'pixwell' ),
					],
					'std'     => 'default',
				],
				[
					'id'   => 'posts_per_page',
					'name' => esc_html__( 'Number Of Posts', 'pixwell' ),
					'desc' => esc_html__( 'Input the number of posts for this category.', 'pixwell' ),
					'info' => esc_html__( 'Leave blank or set 0 to use the settings from the theme options.', 'pixwell' ),
					'tab'  => 'default-blog',
					'type' => 'text',
					'std'  => '',
				],
				[
					'id'      => 'pagination',
					'name'    => esc_html__( 'Pagination Type', 'pixwell' ),
					'desc'    => esc_html__( 'Select pagination type for this category.', 'pixwell' ),
					'tab'     => 'default-blog',
					'type'    => 'select',
					'options' => [
						'default' => esc_html__( 'Default from Theme Options', 'pixwell' ),
						'number'  => esc_html__( 'Numeric', 'pixwell' ),
						'simple'  => esc_html__( 'Simple', 'pixwell' ),
					],
					'std'     => 'default',
				],
			],
		];

		return $configs;
	}
}