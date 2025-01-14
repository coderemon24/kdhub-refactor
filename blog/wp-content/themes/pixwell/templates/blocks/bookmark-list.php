<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_render_bookmark_list' ) ) {
	function pixwell_render_bookmark_list( $include_ids ) {

		$query_data = pixwell_query( [
			'post_in'        => $include_ids,
			'posts_per_page' => '-1',
		] );

		$settings = [
			'classes'         => 'fw-block fw-list-2',
			'content_classes' => 'rb-n20-gutter',
			'bookmark'        => true,
			'columns'         => true,
		];

		if ( method_exists( $query_data, 'have_posts' ) ) :
			if ( $query_data->have_posts() ) :
				pixwell_block_content_open( $settings );
				while ( $query_data->have_posts() ) :
					$query_data->the_post();
					echo '<div class="p-outer rb-p20-gutter rb-col-m12 rb-col-d6">';
					pixwell_post_list_2( $settings );
					echo '</div>';
				endwhile;
				pixwell_block_content_close();
				wp_reset_postdata();
			endif;
		endif;
	}
}