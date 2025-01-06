<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_rbc_ct_grid_1' ) ) {
	function pixwell_rbc_ct_grid_1( $attrs ) {

		$settings = shortcode_atts( [
			'uuid'               => '',
			'name'               => 'ct_grid_1',
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
			'bookmark'           => '',
			'viewmore_title'     => '',
			'viewmore_link'      => '',
			'quick_filter'       => '',
			'quick_filter_ids'   => '',
			'quick_filter_label' => '',
			'pagination'         => '',
			'text_style'         => '',
			'post_shadow'        => '',
			'infeed_ad'          => '',
			'infeed_description' => '',
			'html_advert'        => '',
			'ad_attachment'      => '',
			'ad_destination'     => '',
			'ad_pos_1'           => '',
			'ad_pos_2'           => '',
			'h_tag'              => '',
			'columns'            => true,
		], $attrs );

		$settings['classes']         = 'ct-block ct-grid-1';
		$settings['content_classes'] = 'rb-n20-gutter';

		$total_posts = $settings['posts_per_page'];
		if ( ! empty( $settings['infeed_ad'] ) ) {
			$total_ads = 0;
			if ( ! empty( $settings['ad_pos_1'] ) ) {
				$total_ads ++;
			}
			if ( ! empty( $settings['ad_pos_2'] ) ) {
				$total_ads ++;
			}
			$settings['posts_per_page'] = intval( $total_posts - $total_ads );
		}

		$query_data = pixwell_query( $settings );

		$settings['posts_per_page'] = $total_posts;

		ob_start();
		pixwell_block_open( $settings, $query_data );
		pixwell_block_header( $settings );
		if ( $query_data->have_posts() ) :
			pixwell_block_content_open( $settings );
			pixwell_rbc_ct_grid_1_listing( $settings, $query_data );
			pixwell_block_content_close();
			pixwell_render_pagination( $settings, $query_data );

			wp_reset_postdata();
		endif;
		pixwell_block_close();

		return ob_get_clean();
	}
}

/**
 * content grid 1 listing
 */
if ( ! function_exists( 'pixwell_rbc_ct_grid_1_listing' ) ) :
	function pixwell_rbc_ct_grid_1_listing( $settings, $query_data ) {

		if ( method_exists( $query_data, 'have_posts' ) ) :
			$counter = 1;
			while ( $query_data->have_posts() ) :
				$query_data->the_post();

				/** render in-feed adverts */
				if ( ! empty( $settings['infeed_ad'] ) && ! wp_doing_ajax() ) :
					if ( ( ! empty( $settings['ad_pos_1'] ) && intval( $settings['ad_pos_1'] ) == $counter ) || ( ! empty( $settings['ad_pos_2'] ) && intval( $settings['ad_pos_2'] ) == $counter ) ) {
						echo '<div class="p-outer rb-p20-gutter rb-col-t6 rb-col-m12 infeed-outer">';
						pixwell_infeed_advert( $settings );
						echo '</div>';
					}
					$counter ++;
				endif;

				echo '<div class="p-outer rb-p20-gutter rb-col-t6 rb-col-m12">';
				pixwell_post_grid_1( $settings );
				echo '</div>';

			endwhile;

			/** render in-feed adverts at the end */
			if ( ! empty( $settings['infeed_ad'] ) && ! wp_doing_ajax() ) :
				if ( ( ! empty( $settings['ad_pos_1'] ) && intval( $settings['ad_pos_1'] ) >= $settings['posts_per_page'] ) || ( ! empty( $settings['ad_pos_2'] ) && intval( $settings['ad_pos_2'] ) >= $settings['posts_per_page'] ) ) {
					echo '<div class="p-outer rb-p20-gutter rb-col-t6 rb-col-m12 infeed-outer">';
					pixwell_infeed_advert( $settings );
					echo '</div>';
				}
			endif;

		endif;
	}
endif;


if ( ! function_exists( 'pixwell_register_ct_grid_1' ) ) {
	function pixwell_register_ct_grid_1( $blocks ) {

		if ( ! is_array( $blocks ) ) {
			$blocks = [];
		}

		$blocks[] = [
			'name'        => 'ct_grid_1',
			'title'       => esc_html__( 'Grid 1', 'pixwell' ),
			'description' => esc_html__( 'Display your posts as a grid (2 columns) in the content section.', 'pixwell' ),
			'section'     => 'content',
			'img'         => get_theme_file_uri( 'assets/images/ct-grid-1.png' ),
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
						'0'               => esc_html__( '- Disable -', 'pixwell' ),
						'next_prev'       => esc_html__( 'Next Prev', 'pixwell' ),
						'loadmore'        => esc_html__( 'Load More', 'pixwell' ),
						'infinite_scroll' => esc_html__( 'infinite Scroll', 'pixwell' ),
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
				[
					'name'        => 'infeed_ad',
					'type'        => 'select',
					'tab'         => 'advert',
					'title'       => esc_html__( 'In-feed Advertising', 'pixwell' ),
					'description' => esc_html__( 'Select in-feed adverts for this block. This feature is not compatible with ajax pagination in some cases.', 'pixwell' ),
					'options'     => [
						'0'     => esc_html__( '- Disable -', 'pixwell' ),
						'code'  => esc_html__( 'Script Code', 'pixwell' ),
						'image' => esc_html__( 'Custom Image', 'pixwell' ),
					],
					'default'     => 0,
				],
				[
					'name'        => 'html_advert',
					'type'        => 'textarea',
					'tab'         => 'advert',
					'title'       => esc_html__( 'In-feed Ad Code', 'pixwell' ),
					'description' => esc_html__( 'Input your in-feed Adsense or your script code.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'ad_attachment',
					'type'        => 'text',
					'tab'         => 'advert',
					'title'       => esc_html__( 'In-feed Ad Image', 'pixwell' ),
					'description' => esc_html__( 'Input your advert image URL (attachment URL).', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'ad_destination',
					'type'        => 'text',
					'tab'         => 'advert',
					'title'       => esc_html__( 'In-feed Ad Destination', 'pixwell' ),
					'description' => esc_html__( 'Input destination URL for your advert.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'infeed_description',
					'type'        => 'text',
					'tab'         => 'advert',
					'title'       => esc_html__( 'In-feed Ad Description', 'pixwell' ),
					'description' => esc_html__( 'Small description to show at top of adverts.', 'pixwell' ),
					'default'     => esc_html__( '- Advertisement -', 'pixwell' ),
				],
				[
					'name'        => 'ad_pos_1',
					'type'        => 'text',
					'tab'         => 'advert',
					'title'       => esc_html__( 'Position 1', 'pixwell' ),
					'description' => esc_html__( 'Display advert before the article X (smaller than posts per page value), allow integer number, leave blank if you want to disable this position.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'ad_pos_2',
					'type'        => 'text',
					'tab'         => 'advert',
					'title'       => esc_html__( 'Position 2', 'pixwell' ),
					'description' => esc_html__( 'Display advert before the article X (smaller than posts per page value), allow integer number, leave blank if you want to disable this position.', 'pixwell' ),
					'default'     => '',
				],
			],
		];

		return $blocks;
	}
}

add_filter( 'rbc_add_block', 'pixwell_register_ct_grid_1', 110 );
