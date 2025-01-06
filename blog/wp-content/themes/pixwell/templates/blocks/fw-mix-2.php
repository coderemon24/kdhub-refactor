<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_rbc_fw_mix_2' ) ) {
	function pixwell_rbc_fw_mix_2( $attrs ) {

		$settings = shortcode_atts( [
			'uuid'               => '',
			'name'               => 'fw_mix_2',
			'category'           => '',
			'categories'         => '',
			'format'             => '',
			'tags'               => '',
			'tag_not_in'         => '',
			'author'             => '',
			'post_not_in'        => '',
			'post_in'            => '',
			'order'              => '',
			'posts_per_page'     => '',
			'offset'             => '',
			'title'              => '',
			'viewmore_title'     => '',
			'viewmore_link'      => '',
			'quick_filter'       => '',
			'quick_filter_ids'   => '',
			'quick_filter_label' => '',
			'pagination'         => '',
			'text_style'         => '',
			'classes'            => '',
			'bookmark'           => '',
		], $attrs );

		if ( empty( $settings['classes'] ) ) {
			$settings['classes'] = 'fw-block block-mix none-margin fw-mix-2 rb-col-d4 rb-col-m12';
		}
		$query_data = pixwell_query( $settings );

		ob_start();

		pixwell_block_open( $settings, $query_data );
		pixwell_block_header( $settings );
		if ( $query_data->have_posts() ) :
			pixwell_block_content_open( $settings );
			pixwell_rbc_fw_mix_2_listing( $settings, $query_data );
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

if ( ! function_exists( 'pixwell_rbc_fw_mix_2_listing' ) ) :
	function pixwell_rbc_fw_mix_2_listing( $settings, $query_data ) {

		if ( method_exists( $query_data, 'have_posts' ) ) :
			$flag = 1;
			while ( $query_data->have_posts() ) :
				$query_data->the_post();
				if ( 1 == $flag ) {
					$flag = 0;
					pixwell_post_grid_1( $settings );
				} else {
					pixwell_post_list_4( $settings );
				}
			endwhile;
		endif;
	}
endif;

if ( ! function_exists( 'pixwell_register_fw_mix_2' ) ) {
	function pixwell_register_fw_mix_2( $blocks ) {

		if ( ! is_array( $blocks ) ) {
			$blocks = [];
		}

		$blocks[] = [
			'name'        => 'fw_mix_2',
			'title'       => esc_html__( 'Mix 2', 'pixwell' ),
			'tagline'     => esc_html__( '33% Width', 'pixwell' ),
			'description' => esc_html__( 'Display your posts as a mixed layout (grid overlay + small list). Recommended: add 3 blocks together to fill full-width the row.', 'pixwell' ),
			'section'     => 'fullwidth',
			'img'         => get_theme_file_uri( 'assets/images/fw-mix-2.png' ),
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
					'default'     => 5,
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
					'description' => esc_html__( 'Input a destination link, Leave blank if you want to disable clickable on the block header.', 'pixwell' ),
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
					'name'        => 'quick_filter',
					'type'        => 'select',
					'tab'         => 'pagination',
					'title'       => esc_html__( 'Quick Filter', 'pixwell' ),
					'description' => esc_html__( 'Display a quick filters bar by category/tag in the block header.', 'pixwell' ),
					'options'     => [
						'0'        => esc_html__( '- Disable -', 'pixwell' ),
						'category' => esc_html__( 'by Categories', 'pixwell' ),
						'tag'      => esc_html__( 'by Tags', 'pixwell' ),
					],
					'default'     => 0,
				],
				[
					'name'        => 'quick_filter_ids',
					'type'        => 'text',
					'tab'         => 'pagination',
					'title'       => esc_html__( 'Filter Data', 'pixwell' ),
					'description' => esc_html__( 'Enter IDs for your quick filters, depending on the type you choose: Category IDs or Tag slugs, separated by commas. For example: 1, 2, 3.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'quick_filter_label',
					'type'        => 'text',
					'tab'         => 'pagination',
					'title'       => esc_html__( 'Filter Default Label', 'pixwell' ),
					'description' => esc_html__( 'Input a label for the default filter (all).', 'pixwell' ),
					'default'     => esc_html__( 'All', 'pixwell' ),
				],
				[
					'name'        => 'pagination',
					'type'        => 'select',
					'tab'         => 'pagination',
					'title'       => esc_html__( 'Pagination', 'pixwell' ),
					'description' => esc_html__( 'Select a ajax pagination type.', 'pixwell' ),
					'options'     => [
						'0'         => esc_html__( '- Disable -', 'pixwell' ),
						'next_prev' => esc_html__( 'Next Prev', 'pixwell' ),
					],
					'default'     => 0,
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
					'name'        => 'padding',
					'type'        => 'dimension',
					'tab'         => 'design',
					'title'       => esc_html__( 'Padding', 'pixwell' ),
					'description' => esc_html__( 'Select padding values (in px) for this block.', 'pixwell' ),
					'default'     => [
						'top'    => 0,
						'right'  => 0,
						'bottom' => 0,
						'left'   => 0,

					],
				],
				[
					'name'        => 'mobile_padding',
					'type'        => 'dimension',
					'tab'         => 'design',
					'title'       => esc_html__( 'Mobile - Padding', 'pixwell' ),
					'description' => esc_html__( 'Select padding values (in px) for this block in mobile devices', 'pixwell' ),
					'default'     => [
						'top'    => 0,
						'right'  => 0,
						'bottom' => 0,
						'left'   => 0,
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

add_filter( 'rbc_add_block', 'pixwell_register_fw_mix_2', 41 );
