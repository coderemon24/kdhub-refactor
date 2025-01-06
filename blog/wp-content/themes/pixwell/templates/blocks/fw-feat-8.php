<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

add_filter( 'rbc_add_block', 'pixwell_register_fw_feat_8', 14 );

if ( ! function_exists( 'pixwell_rbc_fw_feat_8' ) ) {
	function pixwell_rbc_fw_feat_8( $attrs ) {

		$settings = shortcode_atts( [
			'uuid'           => '',
			'name'           => 'fw_feat_8',
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
			'pagination'     => '',
			'brand'          => '',
			'intro'          => '',
			'description'    => '',
			'signature'      => '',
			'social'         => '',
		], $attrs );

		$settings['classes'] = 'fw-block fw-feat-8 none-margin';
		$query_data          = pixwell_query( $settings );

		ob_start();
		pixwell_block_open( $settings, $query_data ); ?>
		<div class="rb-row">
			<div class="section-left rb-p20-gutter rb-about-outer rb-col-m12 rb-col-d6">
				<div class="rb-about">
					<div class="rb-about-inner">
						<div class="about-holder">
							<?php if ( ! empty( $settings['brand'] ) ) : ?>
								<div class="about-brand">
									<img src="<?php echo esc_url( $settings['brand'] ); ?>" alt="<?php bloginfo( 'name' ); ?>"/>
								</div>
							<?php endif;
							if ( ! empty( $settings['intro'] ) ) : ?>
								<h3 class="h1 about-intro"><?php echo html_entity_decode( $settings['intro'] ); ?></h3>
							<?php endif;
							if ( ! empty( $settings['description'] ) ) : ?>
								<p class="about-bio"><?php echo html_entity_decode( $settings['description'] ) ?></p>
							<?php endif;
							if ( ! empty( $settings['signature'] ) ) :
								$signature_size = pixwell_getimagesize( $settings['signature'] );
								?>
								<div class="about-signature">
									<img src="<?php echo esc_url( $settings['signature'] ); ?>" alt="<?php echo esc_attr( $settings['intro'] ); ?>" width="<?php if ( ! empty( $signature_size[0] ) ) {
										echo esc_attr( $signature_size[0] );
									} ?>" height="<?php if ( ! empty( $signature_size[1] ) ) {
										echo esc_attr( $signature_size[1] );
									} ?>">
								</div>
							<?php endif;
							if ( ! empty( $settings['social'] ) ) : ?>
								<div class="about-social">
									<div class="about-social-inner is-icon tooltips-w">
										<?php echo pixwell_render_social_icons( pixwell_get_web_socials(), true ); ?>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="section-right rb-p20-gutter rb-col-m12 rb-col-d6">
				<?php if ( $query_data->have_posts() ) :
					pixwell_block_content_open( $settings );
					pixwell_rbc_fw_feat_8_listing( $settings, $query_data );
					pixwell_block_content_close();
					pixwell_render_pagination( $settings, $query_data );
					wp_reset_postdata();
				else:
					pixwell_no_post();
				endif; ?>
			</div>
		</div>
		<?php pixwell_block_close();

		return ob_get_clean();
	}
}

/**
 * fw grid 3 listing
 */
if ( ! function_exists( 'pixwell_rbc_fw_feat_8_listing' ) ) :
	function pixwell_rbc_fw_feat_8_listing( $settings, $query_data ) {

		if ( method_exists( $query_data, 'have_posts' ) ) :
			while ( $query_data->have_posts() ) :
				$query_data->the_post();
				pixwell_post_overlay_7( $settings );
			endwhile;
		endif;
	}
endif;

if ( ! function_exists( 'pixwell_register_fw_feat_8' ) ) {
	function pixwell_register_fw_feat_8( $blocks ) {

		if ( ! is_array( $blocks ) ) {
			$blocks = [];
		}

		$blocks[] = [
			'name'        => 'fw_feat_8',
			'title'       => esc_html__( 'Photography Grid', 'pixwell' ),
			'tagline'     => esc_html__( 'Stretched', 'pixwell' ),
			'description' => esc_html__( 'Display a photography overlay grid in the full-width section (stretched to 100% width). Recommended: To use this block, enable TRANSPARENT HEADER and place this block at the top of the page.', 'pixwell' ),
			'section'     => 'fullwidth',
			'img'         => get_theme_file_uri( 'assets/images/fw-feat-8.png' ),
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
					'default'     => 4,
				],
				[
					'name'        => 'brand',
					'type'        => 'text',
					'tab'         => 'header',
					'title'       => esc_html__( 'About Section - Header Logo', 'pixwell' ),
					'description' => esc_html__( 'Input your brand logo attachment image URL (.jpg, .png at the end).', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'intro',
					'type'        => 'text',
					'tab'         => 'header',
					'title'       => esc_html__( 'About Section - Header Title', 'pixwell' ),
					'description' => esc_html__( 'Input your about header title.', 'pixwell' ),
					'default'     => esc_html__( 'Hello, I am Ruby!', 'pixwell' ),
				],
				[
					'name'        => 'description',
					'type'        => 'textarea',
					'tab'         => 'header',
					'title'       => esc_html__( 'About Section - Description', 'pixwell' ),
					'description' => esc_html__( 'Input your short biographical summary or description you want to show.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'signature',
					'type'        => 'text',
					'tab'         => 'header',
					'title'       => esc_html__( 'About Section - Signature Image', 'pixwell' ),
					'description' => esc_html__( 'Input your signature attachment image URL (.jpg, .png at the end).', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'social',
					'type'        => 'select',
					'tab'         => 'header',
					'title'       => esc_html__( 'Site Social Profile Bar', 'pixwell' ),
					'description' => esc_html__( 'Enable or disable the site social profile bar in this section.', 'pixwell' ),
					'options'     => [
						'-1' => esc_html__( '- Disable -', 'pixwell' ),
						'1'  => esc_html__( 'Enable', 'pixwell' ),
					],
					'default'     => 1,
				],
				[
					'name'        => 'pagination',
					'type'        => 'select',
					'tab'         => 'pagination',
					'title'       => esc_html__( 'Pagination', 'pixwell' ),
					'description' => esc_html__( 'Select a ajax pagination type.', 'pixwell' ),
					'options'     => [
						'0'               => esc_html__( '- Disable -', 'pixwell' ),
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
			],
		];

		return $blocks;
	}
}

