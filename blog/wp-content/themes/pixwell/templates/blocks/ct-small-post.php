<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_rbc_ct_small_post' ) ) {
	function pixwell_rbc_ct_small_post( $attrs ) {

		$settings = shortcode_atts( [
			'uuid'               => '',
			'name'               => 'Ct_small_post',
			'category'           => '',
			'categories'         => '',
			'format'             => '',
			'tags'               => '',
			'tag_not_in'         => '',
			'author'             => '',
			'post_not_in'        => '',
			'post_in'            => '',
			'order'              => '',
			'bookmark'           => '',
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
			'h_tag'              => '',
			'style'              => '',
			'columns'            => true,
		], $attrs );

		$settings['classes'] = 'ct-block ct-small-list';

		$query_data = pixwell_query( $settings );

		ob_start();
		pixwell_block_open( $settings, $query_data );
		pixwell_block_header( $settings );
		if ( $query_data->have_posts() ) :
			pixwell_block_content_open( $settings );
			pixwell_rbc_ct_small_post_listing( $settings, $query_data );
			pixwell_block_content_close();
			pixwell_render_pagination( $settings, $query_data );
			wp_reset_postdata();
		endif;
		pixwell_block_close();

		return ob_get_clean();
	}
}

/**
 * content list listing
 */
if ( ! function_exists( 'pixwell_rbc_ct_small_post_listing' ) ) :
	function pixwell_rbc_ct_small_post_listing( $settings, $query_data ) {

		if ( method_exists( $query_data, 'have_posts' ) ) :

			while ( $query_data->have_posts() ) :
				$query_data->the_post();
				echo '<div class="rb-col-m12">';
				pixwell_post_list_10( $settings );
				echo '</div>';
			endwhile;

		endif;
	}
endif;
