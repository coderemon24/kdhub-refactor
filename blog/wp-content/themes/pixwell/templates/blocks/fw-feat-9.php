<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_rbc_fw_feat_9' ) ) {
	function pixwell_rbc_fw_feat_9( $attrs ) {

		$settings = shortcode_atts( [
			'uuid'           => '',
			'category'       => '',
			'categories'     => '',
			'format'         => '',
			'tags'           => '',
			'tag_not_in'     => '',
			'author'         => '',
			'bookmark'       => '',
			'post_not_in'    => '',
			'post_in'        => '',
			'order'          => '',
			'posts_per_page' => '',
			'offset'         => '',
			'title'          => '',
			'viewmore_title' => '',
			'viewmore_link'  => '',
			'h_tag'          => '',
		], $attrs );

		$settings['classes'] = 'fw-block fw-feat-9 none-margin';
		$query_data          = pixwell_query( $settings );

		ob_start();
		pixwell_block_open( $settings, $query_data );
		pixwell_block_header( $settings );
		if ( ! $query_data->have_posts() || $query_data->post_count < 5 ) {
			pixwell_not_enough( 5 );
		} else {
			pixwell_block_content_open( $settings );
			echo '<div class="load-animation"></div>';
			echo '<div class="rb-owl carousel-feat-9 per-load">';
			while ( $query_data->have_posts() ) :
				$query_data->the_post();
				pixwell_post_overlay_8( $settings );
			endwhile;
			echo '</div>';
			pixwell_block_content_close();
			wp_reset_postdata();
		}
		pixwell_block_close();

		return ob_get_clean();
	}
}


if ( ! function_exists( 'pixwell_register_fw_feat_9' ) ) {
	function pixwell_register_fw_feat_9( $blocks ) {

		if ( ! is_array( $blocks ) ) {
			$blocks = [];
		}

		$blocks[] = [
			'name'        => 'fw_feat_9',
			'title'       => esc_html__( 'Baby Carousel', 'pixwell' ),
			'tagline'     => esc_html__( 'Stretched', 'pixwell' ),
			'description' => esc_html__( 'Display your posts (overlay layout) as a carousel (5 columns without gutter) in the fullwidth (stretched) section.', 'pixwell' ),
			'section'     => 'fullwidth',
			'img'         => get_theme_file_uri( 'assets/images/fw-feat-9.png' ),
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
					'name'        => 'offset',
					'type'        => 'number',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Post Offset', 'pixwell' ),
					'description' => esc_html__( 'Enter the number of posts to skip. Leave blank or set to 0 if you have activated the unique post feature.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'posts_per_page',
					'type'        => 'number',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Posts per Page', 'pixwell' ),
					'description' => esc_html__( 'Enter the number of posts to display per page.', 'pixwell' ),
					'default'     => 6,
				],
				[
					'name'        => 'title',
					'type'        => 'text',
					'tab'         => 'header',
					'title'       => esc_html__( 'Block Title', 'pixwell' ),
					'description' => esc_html__( 'Input a block heading. Leave blank to disable the block header.', 'pixwell' ),
					'default'     => '',
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
			],
		];

		return $blocks;
	}
}

add_filter( 'rbc_add_block', 'pixwell_register_fw_feat_9', 14 );
 