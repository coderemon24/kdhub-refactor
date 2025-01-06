<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_register_options_table_contents' ) ) {
	function pixwell_register_options_table_contents() {

		return [
			'id'     => 'pixwell_config_section_table_contents',
			'title'  => esc_html__( 'Table of Contents', 'pixwell' ),
			'desc'   => esc_html__( 'Customize the appearance and behavior of the table of contents for single posts and pages.', 'pixwell' ),
			'icon'   => 'el el-th-list',
			'fields' => [
				[
					'id'     => 'section_start_table_contents_ptype',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Post & Page', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'table_contents_post',
					'type'     => 'switch',
					'title'    => esc_html__( 'Support for Single Posts', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable the table of contents for single posts.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'table_contents_page',
					'type'     => 'switch',
					'title'    => esc_html__( 'Support for Pages', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable the table of contents for single pages.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'     => 'section_end_table_contents_ptype',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_table_contents_heading',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Heading Tags', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'table_contents_h1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Support for H1', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable support for H1 tag. Turn this option off to exclude H1 tag from the table of contents.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'table_contents_h2',
					'type'     => 'switch',
					'title'    => esc_html__( 'Support for H2', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable support for H2 tag. Turn this option off to exclude H1 tag from the table of contents.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'table_contents_h3',
					'type'     => 'switch',
					'title'    => esc_html__( 'Support for H3', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable support for H3 tag. Turn this option off to exclude H1 tag from the table of contents.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'table_contents_h4',
					'type'     => 'switch',
					'title'    => esc_html__( 'Support for H4', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable support for H4 tag. Turn this option off to exclude H1 tag from the table of contents.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'table_contents_h5',
					'type'     => 'switch',
					'title'    => esc_html__( 'Support for H5', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable support for H5 tag. Turn this option off to exclude H1 tag from the table of contents.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'table_contents_h6',
					'type'     => 'switch',
					'title'    => esc_html__( 'Support for H6', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable support for H6 tag. Turn this option off to exclude H1 tag from the table of contents.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'     => 'section_end_table_contents_heading',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_table_contents_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Layout', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'table_contents_layout',
					'title'    => esc_html__( 'Table of Contents Layout', 'pixwell' ),
					'subtitle' => esc_html__( 'Choose a layout style for the table of contents.', 'pixwell' ),
					'type'     => 'select',
					'options'  => [
						'1' => esc_html__( 'Half Width', 'pixwell' ),
						'2' => esc_html__( 'Full Width (2 Columns)', 'pixwell' ),
						'3' => esc_html__( 'Full Width (1 Column)', 'pixwell' ),
					],
					'default'  => '1',
				],
				[
					'id'       => 'table_contents_enable',
					'title'    => esc_html__( 'Minimum Heading Tags', 'pixwell' ),
					'subtitle' => esc_html__( 'Specify the minimum number of heading tags required to display the table of contents.', 'pixwell' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 2,
				],
				[
					'id'       => 'table_contents_heading',
					'type'     => 'text',
					'title'    => esc_html__( 'Table of Contents Heading', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the title for the table of contents box.', 'pixwell' ),
					'default'  => esc_html__( 'Contents', 'pixwell' ),
				],
				[
					'id'       => 'table_contents_position',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'type'     => 'text',
					'title'    => esc_html__( 'Table of Contents Position', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the position "After X paragraph" to display the table of contents box.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'table_contents_hierarchy',
					'title'    => esc_html__( 'Hierarchy Display', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable hierarchy in the table of contents box.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => true,
				],
				[
					'id'       => 'table_contents_scroll',
					'type'     => 'switch',
					'title'    => esc_html__( 'Smooth Scrolling', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable or disable smooth scrolling effect when jumping to anchor links.', 'pixwell' ),
					'default'  => true,
				],
				[
					'id'       => 'table_contents_toggle',
					'type'     => 'switch',
					'title'    => esc_html__( 'Collapse Toggle Button', 'pixwell' ),
					'subtitle' => esc_html__( 'Toggle to enable the collapse toggle button functionality.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'     => 'section_end_table_contents_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}