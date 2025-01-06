<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_rbc_fw_grid_5' ) ) {
	function pixwell_rbc_fw_grid_5( $attrs ) {

		$settings = shortcode_atts( [
			'uuid'           => '',
			'name'           => 'fw_grid_5',
			'category'       => '',
			'categories'     => '',
			'format'         => '',
			'tags'           => '',
			'tag_not_in'     => '',
			'author'         => '',
			'post_not_in'    => '',
			'post_in'        => '',
			'order'          => '',
			'posts_per_page' => '',
			'offset'         => '',
			'title'          => '',
			'viewmore_title' => '',
			'viewmore_link'  => '',
			'text_style'     => '',
			'columns'        => true,
			'h_tag'          => '',
			'bookmark'       => '',
		], $attrs );

		$settings['classes']         = 'fw-block fw-grid-5';
		$settings['content_classes'] = 'rb-n20-gutter';

		$query_data = pixwell_query( $settings );

		ob_start();

		pixwell_block_open( $settings, $query_data );
		pixwell_block_header( $settings );
		if ( $query_data->have_posts() ) :
			pixwell_block_content_open( $settings );
			pixwell_rbc_fw_grid_5_listing( $settings, $query_data );
			pixwell_block_content_close();
			pixwell_render_pagination( $settings, $query_data );
			wp_reset_postdata();
		else:
			pixwell_no_post();
		endif;
		pixwell_block_close();

		return ob_get_clean();
	}
}

if ( ! function_exists( 'pixwell_rbc_fw_grid_5_listing' ) ) :
	function pixwell_rbc_fw_grid_5_listing( $settings, $query_data ) {

		if ( method_exists( $query_data, 'have_posts' ) ) :
			while ( $query_data->have_posts() ) :
				$query_data->the_post();
				echo '<div class="rb-col-m12 rb-col-d6 rb-p20-gutter">';
				pixwell_post_grid_7( $settings );
				echo '</div>';

			endwhile;
		endif;
	}
endif;

if ( ! function_exists( 'pixwell_register_fw_grid_5' ) ) {
	function pixwell_register_fw_grid_5( $blocks ) {

		if ( ! is_array( $blocks ) ) {
			$blocks = [];
		}

		$blocks[] = [
			'name'        => 'fw_grid_5',
			'title'       => esc_html__( 'Grid Podcast', 'pixwell' ),
			'description' => esc_html__( 'Display your posts as a grid (2 columns) in the fullwidth section.', 'pixwell' ),
			'section'     => 'fullwidth',
			'img'         => get_theme_file_uri( 'assets/images/fw-grid-3.png' ),
			'inputs'      => [
				[
					'type'        => 'category',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Category Filter', 'pixwell' ),
					'description' => esc_html__( 'Filter posts by a category.', 'pixwell' ),
					'default'     => '',
				],
				[
					'type'        => 'categories',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Categories Filter', 'pixwell' ),
					'description' => esc_html__( 'Select categories filter for this block. This option will override category filter option.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'tags',
					'type'        => 'text',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Tags Slug Filter', 'pixwell' ),
					'description' => esc_html__( 'Filter posts by tags slug, separated by commas (for example: tagslug1,tagslug2,tagslug3).', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'tag_not_in',
					'type'        => 'text',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Exclude Tags Slug', 'pixwell' ),
					'description' => esc_html__( 'Filter posts by tag slugs, separated by commas. For example: tagslug1, tagslug2, tagslug3.', 'pixwell' ),
					'default'     => '',
				],
				[
					'type'        => 'format',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Post Format', 'pixwell' ),
					'description' => esc_html__( 'Filter posts by post format', 'pixwell' ),
					'default'     => '',
				],
				[
					'type'        => 'author',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Author Filter', 'pixwell' ),
					'description' => esc_html__( 'Filter posts by the author.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'post_not_in',
					'type'        => 'text',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Exclude Post IDs', 'pixwell' ),
					'description' => esc_html__( 'Exclude specific post IDs from this block, separated by commas. For example: 1, 2, 3.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'post_in',
					'type'        => 'text',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Post IDs Filter', 'pixwell' ),
					'description' => esc_html__( 'Filter posts by post IDs. separated by commas (for example: 1,2,3)', 'pixwell' ),
					'default'     => '',
				],
				[
					'type'        => 'order',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Sort Order', 'pixwell' ),
					'description' => esc_html__( 'Choose the sorting order for this block.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'posts_per_page',
					'type'        => 'number',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Posts per Page', 'pixwell' ),
					'description' => esc_html__( 'Enter the number of posts to display per page.', 'pixwell' ),
					'default'     => 4,
				],
				[
					'name'        => 'offset',
					'type'        => 'number',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Post Offset', 'pixwell' ),
					'description' => esc_html__( 'Enter the number of posts to skip. Leave blank or set to 0 if you have activated the unique post feature.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'title',
					'type'        => 'text',
					'tab'         => 'header',
					'title'       => esc_html__( 'Block Title', 'pixwell' ),
					'description' => esc_html__( 'Input a block heading. Leave blank to disable the block header.', 'pixwell' ),
					'default'     => esc_html__( 'Latest News', 'pixwell' ),
				],
				[
					'name'        => 'viewmore_link',
					'type'        => 'text',
					'tab'         => 'header',
					'title'       => esc_html__( 'View More URL', 'pixwell' ),
					'description' => esc_html__( 'Input a custom destination link for the block header.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'viewmore_title',
					'type'        => 'text',
					'tab'         => 'header',
					'title'       => esc_html__( 'View More Label', 'pixwell' ),
					'description' => esc_html__( 'Input a block tagline.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'margin',
					'type'        => 'dimension',
					'tab'         => 'design',
					'title'       => esc_html__( 'Margin', 'pixwell' ),
					'description' => esc_html__( 'Select margin top and bottom values (in px) for this block, default is 50px', 'pixwell' ),
					'default'     => [
						'top'    => 0,
						'bottom' => 50,
					],
				],
				[
					'name'        => 'mobile_margin',
					'type'        => 'dimension',
					'tab'         => 'design',
					'title'       => esc_html__( 'Mobile - Margin', 'pixwell' ),
					'description' => esc_html__( 'Select margin top and bottom values (in px) for this block in mobile devices, default is 35px', 'pixwell' ),
					'default'     => [
						'top'    => 0,
						'bottom' => 35,
					],
				],
				[
					'name'        => 'header_color',
					'type'        => 'text',
					'tab'         => 'design',
					'title'       => esc_html__( 'Header Style Color', 'pixwell' ),
					'description' => esc_html__( 'Input hex color value (ie: #ff8763) for the block header title.', 'pixwell' ),
				],
				[
					'name'        => 'text_style',
					'type'        => 'select',
					'tab'         => 'design',
					'title'       => esc_html__( 'Text Style', 'pixwell' ),
					'description' => esc_html__( 'Select a text color scheme for the block.', 'pixwell' ),
					'options'     => [
						'0'     => esc_html__( '-Dark-', 'pixwell' ),
						'light' => esc_html__( 'Light', 'pixwell' ),
					],
					'default'     => 0,
				],
			],
		];

		return $blocks;
	}
}

add_filter( 'rbc_add_block', 'pixwell_register_fw_grid_5', 23 );
