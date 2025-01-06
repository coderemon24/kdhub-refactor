<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

add_action( 'wp_ajax_nopriv_pixwell_live_search', 'pixwell_ajax_live_search' );
add_action( 'wp_ajax_pixwell_live_search', 'pixwell_ajax_live_search' );
add_action( 'wp_ajax_nopriv_pixwell_quick_filter', 'pixwell_ajax_quick_filter' );
add_action( 'wp_ajax_pixwell_quick_filter', 'pixwell_ajax_quick_filter' );
add_action( 'wp_ajax_nopriv_pixwell_live_pagination', 'pixwell_ajax_pagination' );
add_action( 'wp_ajax_pixwell_live_pagination', 'pixwell_ajax_pagination' );
add_action( 'template_redirect', 'pixwell_single_load_next_redirect' );

/** live search ajax */
if ( ! function_exists( 'pixwell_ajax_live_search' ) ) {
	function pixwell_ajax_live_search() {

		if ( empty( $_POST['s'] ) ) {
			wp_send_json( '', null );
		}

		$input       = pixwell_validate_variable( $_POST['s'] );
		$search_post = pixwell_get_option( 'search_post' );

		$params = [
			's'              => $input,
			'post_status'    => 'publish',
			'posts_per_page' => 3,
		];

		if ( ( ! empty( $search_post ) ) ) {
			if ( pixwell_get_option( 'search_page' ) ) {
				$params['post_type'] = [ 'post', 'page' ];
			} else {
				$params['post_type'] = [ 'post' ];
			}
		}

		$_query = new WP_Query( $params );
		ob_start(); ?>
		<div class="live-search-content">
			<?php if ( $_query->have_posts() ) : ?>
				<div class="live-search-listing rb-row">
					<?php while ( $_query->have_posts() ) {
						$_query->the_post();
						echo '<div class="rb-col-m12">';
						pixwell_post_list_4();
						echo '</div>';
					}
					wp_reset_postdata();
					?>
				</div>
				<?php if ( $_query->max_num_pages > 1 ): ?>
					<div class="pagination-wrap live-search-more">
						<a href="<?php echo get_search_link( $input ); ?>" class="p-link live-search-submit"><span><?php echo pixwell_translate( 'view_all_results' ); ?></span><i class="rbi rbi-arrow-right" aria-hidden="true"></i></a>
					</div>
				<?php endif;
			else : ?>
				<p class="search-not-found"><?php echo pixwell_translate( 'no_search_result' ); ?></p>
			<?php endif; ?>
		</div>
		<?php
		$response = ob_get_clean();

		wp_send_json( $response, null );
	}
}

/** quick filter ajax */
if ( ! function_exists( 'pixwell_ajax_quick_filter' ) ) {
	function pixwell_ajax_quick_filter() {

		$settings = [];
		$response = [ 'page_max' => '', 'content' => '' ];
		if ( ! empty( $_POST['data'] ) ) {
			$settings = pixwell_validate_variable( $_POST['data'] );
		}

		$_query = pixwell_query( $settings );
		if ( $_query->have_posts() ) {
			$response['page_max'] = $_query->max_num_pages;
			$response['content']  = pixwell_ajax_get_content( $settings, $_query );

			wp_reset_postdata();
		}

		wp_send_json( $response, null );
	}
}

/** ajax pagination */
if ( ! function_exists( 'pixwell_ajax_pagination' ) ) {
	function pixwell_ajax_pagination() {

		$settings            = [];
		$response            = [];
		$response['content'] = '';
		$notice_class        = 'end-list';

		if ( ! empty( $_POST['data'] ) ) {
			$settings = pixwell_validate_variable( $_POST['data'] );
		}

		if ( empty( $settings['page_next'] ) ) {
			$settings['page_next'] = 2;
		}

		if ( 'fw_related' == $settings['name'] ) {
			$_query = pixwell_query_related( $settings, intval( $settings['page_next'] ) );
		} else {
			$_query = pixwell_query( $settings, intval( $settings['page_next'] ) );
		}

		if ( ! empty( $settings['name'] ) ) {

			if ( 'ct_masonry_1' == $settings['name'] ) {
				$notice_class .= ' ct-mh-1 ct-mh-1--width2';
			} else if ( 'fw_masonry_1' == $settings['name'] ) {
				$notice_class .= ' fw-mh-1 fw-mh-1--width3';
			}
		}

		if ( $_query->have_posts() ) {
			$response['page_max'] = $_query->max_num_pages;

			if ( ! empty( $_query->paged ) ) {
				$response['page_current'] = $_query->paged;
			} else {
				$response['page_current'] = $settings['page_next'];
			}
			if ( $response['page_current'] == $response['page_max'] ) {
				$response['notice'] = '<div class="' . $notice_class . '"><span class="end-list-info">' . pixwell_translate( 'end_list' ) . '</span></div>';
			}
			$response['content'] = pixwell_ajax_get_content( $settings, $_query );
		}

		wp_send_json( $response, null );
	}
}

/**
 * @param $settings
 *
 * @return array|string
 * validate posts
 */
if ( ! function_exists( 'pixwell_validate_variable' ) ) {
	function pixwell_validate_variable( $settings ) {

		if ( is_array( $settings ) ) {
			foreach ( $settings as $key => $val ) {
				$key              = sanitize_text_field( $key );
				$settings[ $key ] = sanitize_text_field( $val );
			}
		} elseif ( is_string( $settings ) ) {
			$settings = sanitize_text_field( $settings );
		} else {
			$settings = '';
		}

		return $settings;
	}
}

/**
 * @param $settings
 * @param $_query
 *
 * @return string
 * ajax content
 */
if ( ! function_exists( 'pixwell_ajax_get_content' ) ) :
	function pixwell_ajax_get_content( $settings, $_query ) {

		if ( empty( $settings['name'] ) ) {
			$settings['name'] = 'ct_classic';
		}

		ob_start();
		switch ( $settings['name'] ) {
			case 'fw_grid_1' :
				pixwell_rbc_fw_grid_1_listing( $settings, $_query );
				break;
			case 'fw_grid_2' :
				pixwell_rbc_fw_grid_2_listing( $settings, $_query );
				break;
			case 'fw_grid_3' :
				pixwell_rbc_fw_grid_3_listing( $settings, $_query );
				break;
			case 'fw_grid_4' :
				pixwell_rbc_fw_grid_4_listing( $settings, $_query );
				break;
			case 'fw_list_1' :
				pixwell_rbc_fw_list_1_listing( $settings, $_query );
				break;
			case 'fw_list_2' :
				pixwell_rbc_fw_list_2_listing( $settings, $_query );
				break;
			case 'fw_mix_1' :
				pixwell_rbc_fw_mix_1_listing( $settings, $_query );
				break;
			case 'fw_mix_2' :
				pixwell_rbc_fw_mix_2_listing( $settings, $_query );
				break;
			case 'fw_masonry_1' :
				pixwell_rbc_fw_masonry_1_listing( $settings, $_query );
				break;
			case 'fw_feat_8' :
				pixwell_rbc_fw_feat_8_listing( $settings, $_query );
				break;
			case 'ct_grid_1' :
				pixwell_rbc_ct_grid_1_listing( $settings, $_query );
				break;
			case 'ct_grid_2' :
				pixwell_rbc_ct_grid_2_listing( $settings, $_query );
				break;
			case 'ct_list' :
				pixwell_rbc_ct_list_listing( $settings, $_query );
				break;
			case 'ct_classic' :
				pixwell_rbc_ct_classic_listing( $settings, $_query );
				break;
			case 'ct_masonry_1' :
				pixwell_rbc_ct_masonry_1_listing( $settings, $_query );
				break;
			case 'mega_category' :
				pixwell_mega_menu_listing( $settings, $_query );
				break;
			case 'fw_related' :
				pixwell_fw_related_listing( $settings, $_query );
				break;
			case 'grid_flex_1' :
				pixwell_loop_grid_flex_1( $settings, $_query );
				break;
		}

		return ob_get_clean();
	}
endif;

/** single ajax load next */
if ( ! function_exists( 'pixwell_single_load_next_redirect' ) ) {
	function pixwell_single_load_next_redirect() {

		$setting = pixwell_get_option( 'ajax_next_post' );
		if ( empty( $setting ) ) {
			return;
		}

		global $wp_query;
		if ( empty( $wp_query->query_vars['rbsnp'] ) || ! is_single() ) {
			return;
		}

		$file     = '/templates/single/ajax-load-next.php';
		$template = locate_template( $file );
		if ( $template ) {
			include( $template );
		}
		exit;
	}
}


