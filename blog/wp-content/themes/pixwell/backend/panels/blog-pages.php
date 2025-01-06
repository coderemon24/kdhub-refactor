<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_register_options_index' ) ) {
	function pixwell_register_options_index() {

		return [
			'id'     => 'pixwell_config_section_index',
			'title'  => esc_html__( 'Blog (Index)', 'pixwell' ),
			'desc'   => esc_html__( 'Customize the blog page (author.php), The settings below will apply to the blog page.', 'pixwell' ),
			'icon'   => 'el el-wordpress',
			'fields' => [
				[
					'id'     => 'section_start_index_general',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'General', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'blog_breadcrumb_index',
					'type'     => 'switch',
					'title'    => esc_html__( 'Breadcrumb Bar', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the breadcrumb bar for the blog page.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'     => 'section_end_index_general',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_index_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Post Listing', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'blog_layout_index',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Blog Layout', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a layout for the blog page (index.php).', 'pixwell' ),
					'options'  => pixwell_add_settings_blog_layouts(),
					'default'  => 'classic',
				],
				[
					'id'          => 'blog_posts_per_page_index',
					'title'       => esc_html__( 'Posts per Page', 'pixwell' ),
					'subtitle'    => esc_html__( 'Enter the number of posts to display per page.', 'pixwell' ),
					'description' => esc_html__( 'This setting will override the "Settings > Reading > Blog pages show at most" setting.', 'pixwell' ),
					'type'        => 'text',
					'class'       => 'small-text',
					'validate'    => 'numeric',
				],
				[
					'id'       => 'blog_pagination_index',
					'title'    => esc_html__( 'Pagination Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a type for the blog pagination.', 'pixwell' ),
					'type'     => 'select',
					'options'  => pixwell_add_settings_blog_pagination( false ),
					'default'  => 'number',
				],
				[
					'id'     => 'section_end_index_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_index_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Sidebar', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'blog_sidebar_name_index',
					'type'     => 'select',
					'title'    => esc_html__( 'Assign a Sidebar', 'pixwell' ),
					'subtitle' => esc_html__( 'Assign a sidebar for the blog page, This option will apply to layouts has sidebar.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_name(),
					'default'  => 'pixwell_sidebar_default',
				],
				[
					'id'       => 'blog_sidebar_pos_index',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar Position', 'pixwell' ),
					'subtitle' => esc_html__( 'Select sidebar position for the blog page.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_pos(),
					'default'  => 'default',
				],
				[
					'id'     => 'section_end_index_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}
if ( ! function_exists( 'pixwell_register_options_cat' ) ) {
	function pixwell_register_options_cat() {

		return [
			'id'     => 'pixwell_config_section_cat',
			'title'  => esc_html__( 'Category', 'pixwell' ),
			'desc'   => esc_html__( 'Global category options (category.php), The settings below will apply to all category pages on your site.', 'pixwell' ),
			'icon'   => 'el el-folder-close',
			'fields' => [
				[
					'id'    => 'info_category_page',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => esc_html__( 'The settings below are treated as global settings. Individual category settings take priority over them.', 'pixwell' ),
				],
				[
					'id'    => 'info_category_edit',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'To edit styles and layout for individual category. Navigate to "Posts > Categories > Edit Category > Pixwell Category Options".', 'pixwell' ),
				],
				[
					'id'     => 'section_start_cat_general',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'General', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'blog_breadcrumb_cat',
					'type'     => 'switch',
					'title'    => esc_html__( 'Breadcrumb Bar', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the breadcrumb bar for the category pages.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'     => 'section_end_cat_general',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_cat_header',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Category Header', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'cat_header_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Header Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select header style for all category pages (category.php).', 'pixwell' ),
					'options'  => [
						'center' => esc_html__( 'Center', 'pixwell' ),
						'left'   => esc_html__( 'Left', 'pixwell' ),
						'boxed'  => esc_html__( 'Boxed', 'pixwell' ),
					],
					'default'  => 'center',
				],
				[
					'id'          => 'cat_header_image_bg',
					'type'        => 'media',
					'url'         => true,
					'preview'     => true,
					'title'       => esc_html__( 'Background Image', 'pixwell' ),
					'subtitle'    => esc_html__( 'Upload a background image for the category header.', 'pixwell' ),
					'description' => esc_html__( 'the recommended size is: 1920*480px', 'pixwell' ),
				],
				[
					'id'          => 'cat_header_solid_bg',
					'title'       => esc_html__( 'Background Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a background color for the category header.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
				],
				[
					'id'       => 'cat_header_text_style',
					'title'    => esc_html__( 'Text Color Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a text color scheme to suit with the background of the category header.', 'pixwell' ),
					'type'     => 'select',
					'options'  => [
						'dark'  => esc_html__( '- Dark -', 'pixwell' ),
						'light' => esc_html__( 'Light', 'pixwell' ),
					],
					'default'  => 'dark',
				],
				[
					'id'     => 'section_end_cat_header',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_cat_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Post Listing', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'blog_layout_cat',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Blog Layout', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a post listing layout.', 'pixwell' ),
					'options'  => pixwell_add_settings_blog_layouts(),
					'default'  => 'classic',
				],
				[
					'id'          => 'blog_posts_per_page_cat',
					'title'       => esc_html__( 'Posts per Page', 'pixwell' ),
					'subtitle'    => esc_html__( 'Enter the number of posts to display per page.', 'pixwell' ),
					'description' => esc_html__( 'This setting will override the "Settings > Reading > Blog pages show at most" setting.', 'pixwell' ),
					'type'        => 'text',
					'class'       => 'small-text',
					'validate'    => 'numeric',
				],
				[
					'id'       => 'blog_pagination_cat',
					'title'    => esc_html__( 'Pagination Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a type for the blog pagination.', 'pixwell' ),
					'type'     => 'select',
					'options'  => pixwell_add_settings_blog_pagination( false ),
					'default'  => 'number',
				],
				[
					'id'     => 'section_end_cat_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'       => 'section_start_cat_sidebar',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'Sidebar', 'pixwell' ),
					'subtitle' => esc_html__( 'The sidebar will not appear in the layout without specifying its position.', 'pixwell' ),
					'indent'   => true,
				],
				[
					'id'       => 'blog_sidebar_name_cat',
					'type'     => 'select',
					'title'    => esc_html__( 'Assign a Sidebar', 'pixwell' ),
					'subtitle' => esc_html__( 'Assign a sidebar for the category pages.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_name(),
					'default'  => 'pixwell_sidebar_default',
				],
				[
					'id'       => 'blog_sidebar_pos_cat',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar Position', 'pixwell' ),
					'subtitle' => esc_html__( 'Select sidebar position for the category pages.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_pos(),
					'default'  => 'default',
				],
				[
					'id'     => 'section_end_cat_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}
if ( ! function_exists( 'pixwell_register_options_author' ) ) {
	function pixwell_register_options_author() {

		return [
			'id'     => 'pixwell_config_section_author',
			'title'  => esc_html__( 'Author Page', 'pixwell' ),
			'desc'   => esc_html__( 'Customize the author page (author.php), The settings below will apply to the author page.', 'pixwell' ),
			'icon'   => 'el el-user',
			'fields' => [
				[
					'id'     => 'section_start_author_general',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'General', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'author_header_style',
					'title'    => esc_html__( 'Header Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a header style for the author page.', 'pixwell' ),
					'type'     => 'select',
					'options'  => [
						'0' => esc_html__( 'Full Details', 'pixwell' ),
						'1' => esc_html__( 'Simplicity', 'pixwell' ),
					],
					'default'  => false,
				],
				[
					'id'       => 'blog_breadcrumb_author',
					'type'     => 'switch',
					'title'    => esc_html__( 'Breadcrumb Bar', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the breadcrumb bar for the author page.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'     => 'section_end_author_general',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_author_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Post Listing', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'blog_layout_author',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Blog Layout', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a post listing layout.', 'pixwell' ),
					'options'  => pixwell_add_settings_blog_layouts(),
					'default'  => 'classic',
				],
				[
					'id'          => 'blog_posts_per_page_author',
					'title'       => esc_html__( 'Posts per Page', 'pixwell' ),
					'subtitle'    => esc_html__( 'Enter the number of posts to display per page.', 'pixwell' ),
					'description' => esc_html__( 'This setting will override the "Settings > Reading > Blog pages show at most" setting.', 'pixwell' ),
					'type'        => 'text',
					'class'       => 'small-text',
					'validate'    => 'numeric',
				],
				[
					'id'       => 'blog_pagination_author',
					'title'    => esc_html__( 'Pagination Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a type for the blog pagination.', 'pixwell' ),
					'type'     => 'select',
					'options'  => pixwell_add_settings_blog_pagination( false ),
					'default'  => 'number',
				],
				[
					'id'     => 'section_end_author_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'       => 'section_start_author_sidebar',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'Sidebar', 'pixwell' ),
					'subtitle' => esc_html__( 'The sidebar will not appear in the layout without specifying its position.', 'pixwell' ),
					'indent'   => true,
				],
				[
					'id'       => 'blog_sidebar_name_author',
					'type'     => 'select',
					'title'    => esc_html__( 'Assign a Sidebar', 'pixwell' ),
					'subtitle' => esc_html__( 'Assign a sidebar for the author page.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_name(),
					'default'  => 'pixwell_sidebar_default',
				],
				[
					'id'       => 'blog_sidebar_pos_author',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar Position', 'pixwell' ),
					'subtitle' => esc_html__( 'Select sidebar position for the author page.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_pos(),
					'default'  => 'default',
				],
				[
					'id'     => 'section_end_author_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}
if ( ! function_exists( 'pixwell_register_options_search' ) ) {
	function pixwell_register_options_search() {

		return [
			'id'     => 'pixwell_config_section_search',
			'title'  => esc_html__( 'Search Page', 'pixwell' ),
			'desc'   => esc_html__( 'Customize the search page (search.php). The settings below will apply to the search page.', 'pixwell' ),
			'icon'   => 'el el-search',
			'fields' => [
				[
					'id'     => 'section_start_search_general',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'General', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'search_post',
					'type'     => 'switch',
					'title'    => esc_html__( 'Search Posts Only', 'pixwell' ),
					'subtitle' => esc_html__( 'Only show default post type in the search results.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'search_page',
					'type'     => 'switch',
					'title'    => esc_html__( 'Allow Search Page', 'pixwell' ),
					'required' => [ 'search_post', '=', '1' ],
					'subtitle' => esc_html__( 'Show pages in the search results.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'search_header_form',
					'title'    => esc_html__( 'Header Search Form', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the search form at the top of the search page.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'blog_breadcrumb_search',
					'type'     => 'switch',
					'title'    => esc_html__( 'Breadcrumb Bar', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the breadcrumb bar for the search page.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'     => 'section_end_search_general',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_search_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Post Listing', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'blog_layout_search',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Blog Layout', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a post listing layout.', 'pixwell' ),
					'options'  => pixwell_add_settings_blog_layouts(),
					'default'  => 'fw_grid_2',
				],
				[
					'id'          => 'blog_posts_per_page_search',
					'title'       => esc_html__( 'Posts per Page', 'pixwell' ),
					'subtitle'    => esc_html__( 'Enter the number of posts to display per page.', 'pixwell' ),
					'description' => esc_html__( 'This setting will override the "Settings > Reading > Blog pages show at most" setting.', 'pixwell' ),
					'type'        => 'text',
					'class'       => 'small-text',
					'validate'    => 'numeric',
					'default'     => 12,
				],
				[
					'id'       => 'blog_pagination_search',
					'title'    => esc_html__( 'Pagination Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a type for the blog pagination.', 'pixwell' ),
					'type'     => 'select',
					'options'  => pixwell_add_settings_blog_pagination( false ),
					'default'  => 'number',
				],
				[
					'id'     => 'section_end_search_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'       => 'section_start_search_sidebar',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'Sidebar', 'pixwell' ),
					'subtitle' => esc_html__( 'The sidebar will not appear in the layout without specifying its position.', 'pixwell' ),
					'indent'   => true,
				],
				[
					'id'       => 'blog_sidebar_name_search',
					'type'     => 'select',
					'title'    => esc_html__( 'Assign a Sidebar', 'pixwell' ),
					'subtitle' => esc_html__( 'Assign a sidebar for the search page.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_name(),
					'default'  => 'pixwell_sidebar_default',
				],
				[
					'id'       => 'blog_sidebar_pos_search',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar Position', 'pixwell' ),
					'subtitle' => esc_html__( 'Select sidebar position for the search page.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_pos(),
					'default'  => 'default',
				],
				[
					'id'     => 'section_end_search_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}
if ( ! function_exists( 'pixwell_register_options_archive' ) ) {
	function pixwell_register_options_archive() {

		return [
			'id'     => 'pixwell_config_section_archive',
			'title'  => esc_html__( 'Archive', 'pixwell' ),
			'desc'   => esc_html__( 'Customize the archive pages (archive.php). The settings below will apply to the archive pages.', 'pixwell' ),
			'icon'   => 'el el-folder-close',
			'fields' => [
				[
					'id'     => 'section_start_archive_general',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'General', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'blog_breadcrumb_archive',
					'type'     => 'switch',
					'title'    => esc_html__( 'Breadcrumb Bar', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the breadcrumb bar for the archive pages.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'archive_no_prefix',
					'title'    => esc_html__( 'Archive Title Prefix', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable archive and tag title prefix.', 'pixwell' ),
					'type'     => 'select',
					'options'  => [
						'0' => esc_html__( '- Default -', 'pixwell' ),
						'1' => esc_html__( 'No Prefix', 'pixwell' ),
					],
					'default'  => '0',
				],
				[
					'id'     => 'section_end_archive_general',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_archive_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Posts Listing', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'blog_layout_archive',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Blog Layout', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a layout for the archive pages (archive.php).', 'pixwell' ),
					'options'  => pixwell_add_settings_blog_layouts(),
					'default'  => 'classic',
				],
				[
					'id'          => 'blog_posts_per_page_archive',
					'title'       => esc_html__( 'Posts per Page', 'pixwell' ),
					'subtitle'    => esc_html__( 'Enter the number of posts to display per page.', 'pixwell' ),
					'description' => esc_html__( 'This setting will override the "Settings > Reading > Blog pages show at most" setting.', 'pixwell' ),
					'type'        => 'text',
					'class'       => 'small-text',
					'validate'    => 'numeric',
				],
				[
					'id'       => 'blog_pagination_archive',
					'title'    => esc_html__( 'Pagination Type', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a type for the blog pagination.', 'pixwell' ),
					'type'     => 'select',
					'options'  => pixwell_add_settings_blog_pagination( false ),
					'default'  => 'number',
				],
				[
					'id'     => 'section_end_archive_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'       => 'section_start_archive_sidebar',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'Sidebar', 'pixwell' ),
					'subtitle' => esc_html__( 'The sidebar will not appear in the layout without specifying its position.', 'pixwell' ),
					'indent'   => true,
				],
				[
					'id'       => 'blog_sidebar_name_archive',
					'type'     => 'select',
					'title'    => esc_html__( 'Assign a Sidebar', 'pixwell' ),
					'subtitle' => esc_html__( 'Assign a sidebar for the archive pages.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_name(),
					'default'  => 'pixwell_sidebar_default',
				],
				[
					'id'       => 'blog_sidebar_pos_archive',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar Position', 'pixwell' ),
					'subtitle' => esc_html__( 'Select sidebar position for the archive pages.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_pos(),
					'default'  => 'default',
				],
				[
					'id'     => 'section_end_archive_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}
if ( ! function_exists( 'pixwell_register_options_page' ) ) {
	function pixwell_register_options_page() {

		return [
			'id'     => 'pixwell_config_section_page',
			'title'  => esc_html__( 'Single Page', 'pixwell' ),
			'desc'   => esc_html__( 'Global options for single pages (page.php). These settings will apply to all single pages on your site.', 'pixwell' ),
			'icon'   => 'el el-list-alt',
			'fields' => [
				[
					'id'    => 'info_single_page',
					'type'  => 'info',
					'style' => 'info',
					'desc'  => esc_html__( 'To edit styles and layout for an individual page, navigate to "Page > Edit Page > Single Page Options".', 'pixwell' ),
				],
				[
					'id'     => 'section_start_single_page_general',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'General', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'single_page_layout',
					'type'     => 'select',
					'title'    => esc_html__( 'Content Layout', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the sidebar area on the page.', 'pixwell' ),
					'options'  => [
						'-1' => esc_html__( 'Full Width', 'pixwell' ),
						'1'  => esc_html__( 'Content with Sidebar', 'pixwell' ),
					],
					'default'  => '-1',
				],
				[
					'id'       => 'single_page_title',
					'type'     => 'select',
					'title'    => esc_html__( 'Header', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the header on single pages.', 'pixwell' ),
					'options'  => [
						'-1' => esc_html__( '- Enable -', 'pixwell' ),
						'1'  => esc_html__( 'Disable', 'pixwell' ),
					],
					'default'  => '-1',
				],
				[
					'id'       => 'single_page_header_layout',
					'type'     => 'select',
					'title'    => esc_html__( 'Header Layout', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a layout for the header on single pages.', 'pixwell' ),
					'options'  => [
						'-1' => esc_html__( 'Classic', 'pixwell' ),
						'1'  => esc_html__( 'Full Background', 'pixwell' ),
					],
					'default'  => '-1',
				],
				[
					'id'     => 'section_end_single_page_general',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'       => 'section_start_single_page_sidebar',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'Sidebar', 'pixwell' ),
					'subtitle' => esc_html__( 'The sidebar is disabled for full-width content layouts.', 'pixwell' ),
					'indent'   => true,
				],
				[
					'id'          => 'single_page_sidebar_name',
					'type'        => 'select',
					'title'       => esc_html__( 'Assign a Sidebar', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a sidebar for single pages.', 'pixwell' ),
					'description' => esc_html__( 'This option applies to layouts with a sidebar.', 'pixwell' ),
					'options'     => pixwell_add_settings_sidebar_name(),
					'default'     => 'pixwell_sidebar_default',
				],
				[
					'id'       => 'single_page_sidebar_pos',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar Position', 'pixwell' ),
					'subtitle' => esc_html__( 'Select the sidebar position for single pages.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_pos(),
					'default'  => 'default',
				],
				[
					'id'     => 'section_end_single_page_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}

