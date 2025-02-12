<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_rbc_fw_portfolio_1' ) ) {
	function pixwell_rbc_fw_portfolio_1( $attrs ) {

		$settings = shortcode_atts( [
			'uuid'             => '',
			'name'             => 'fw_portfolio_1',
			'term_slugs'       => '',
			'term_filter'      => '',
			'post_not_in'      => '',
			'post_in'          => '',
			'title'            => '',
			'posts_per_page'   => '',
			'viewmore_title'   => '',
			'viewmore_link'    => '',
			'html_description' => '',
			'text_style'       => '',
		], $attrs );

		$settings['classes']         = 'fw-block fw-portfolio-1 is-masonry';
		$settings['content_classes'] = 'rb-n20-gutter is-masonry-reload';
		$query_data                  = pixwell_query_portfolio( $settings );

		ob_start();

		pixwell_block_open( $settings, $query_data );
		pixwell_block_header( $settings );
		if ( ! empty( $settings['html_description'] ) && function_exists( 'pixwell_decode_shortcode' ) ) {
			echo '<div class="block-pp-desc">' . do_shortcode( pixwell_decode_shortcode( $settings['html_description'] ) ) . '</div>';
		}
		if ( $query_data->have_posts() ) :
			if ( ! empty( $settings['term_filter'] ) ) {
				pixwell_portfolio_cat_filter( $query_data );
			}
			pixwell_block_content_open( $settings );
			pixwell_rbc_fw_portfolio_1_listing( $settings, $query_data );
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

if ( ! function_exists( 'pixwell_rbc_fw_portfolio_1_listing' ) ) :
	function pixwell_rbc_fw_portfolio_1_listing( $settings, $query_data ) {

		if ( method_exists( $query_data, 'have_posts' ) ) :
			$settings['classes'] = 'fw-mh-1 rb-p20-gutter';
			echo '<div class="fw-ms-1"></div>';
			while ( $query_data->have_posts() ) :
				$query_data->the_post();
				pixwell_portfolio_masonry_1( $settings );
			endwhile;
		endif;
	}
endif;

if ( ! function_exists( 'pixwell_register_fw_portfolio_1' ) ) {
	function pixwell_register_fw_portfolio_1( $blocks ) {

		if ( ! is_array( $blocks ) ) {
			$blocks = [];
		}

		$blocks[] = [
			'name'        => 'fw_portfolio_1',
			'title'       => esc_html__( 'Portfolio List', 'pixwell' ),
			'tagline'     => esc_html__( 'Gird 3 Columns', 'pixwell' ),
			'description' => esc_html__( 'Display your portfolios as a masonry grid (3 columns) in the fullwidth section.', 'pixwell' ),
			'section'     => 'fullwidth',
			'img'         => get_theme_file_uri( 'assets/images/fw-portfolio-1.png' ),
			'inputs'      => [
				[
					'name'        => 'term_slugs',
					'type'        => 'text',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Portfolio Categories Filter', 'pixwell' ),
					'description' => esc_html__( 'Input portfolio categories to display by category slugs, separated by commas (for example: photography, work, design )', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'post_not_in',
					'type'        => 'text',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Exclude Portfolio IDs', 'pixwell' ),
					'description' => esc_html__( 'Exclude some portfolio IDs from this block, separated by commas (for example: 1,2,3).', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'post_in',
					'type'        => 'text',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Portfolio IDs Filter', 'pixwell' ),
					'description' => esc_html__( 'Filter posts by portfolio IDs. separated by commas (for example: 1,2,3)', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'posts_per_page',
					'type'        => 'number',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Posts per Page', 'pixwell' ),
					'description' => esc_html__( 'Select number of portfolios per page (total portfolios to show).', 'pixwell' ),
					'default'     => 10,
				],
				[
					'name'        => 'term_filter',
					'type'        => 'select',
					'tab'         => 'header',
					'title'       => esc_html__( 'Show Categories Filter', 'pixwell' ),
					'description' => esc_html__( 'Enable or disable categories filter at the block header.', 'pixwell' ),
					'options'     => [
						'0' => esc_html__( '- Disable -', 'pixwell' ),
						'1' => esc_html__( 'Enable', 'pixwell' ),
					],
					'default'     => 1,
				],
				[
					'name'        => 'title',
					'type'        => 'text',
					'tab'         => 'header',
					'title'       => esc_html__( 'Block Title', 'pixwell' ),
					'description' => esc_html__( 'Input a block heading. Leave blank to disable the block header.', 'pixwell' ),
					'default'     => esc_html__( 'Our Work', 'pixwell' ),
				],
				[
					'name'        => 'html_description',
					'type'        => 'textarea',
					'tab'         => 'header',
					'title'       => esc_html__( 'Block Description', 'pixwell' ),
					'description' => esc_html__( 'Input the block description, allow Raw HTML.', 'pixwell' ),
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

add_filter( 'rbc_add_block', 'pixwell_register_fw_portfolio_1', 9000 );
