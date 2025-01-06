<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_get_grid_flex_1' ) ) {
	function pixwell_get_grid_flex_1( $settings = [], $_query = null ) {

		$settings = wp_parse_args( $settings, [
			'uuid' => '',
			'name' => 'grid_flex_1',
		] );

		$settings['classes'] = 'block-grid block-grid-flex-1';

		if ( empty( $settings['columns'] ) ) {
			$settings['columns'] = 3;
		}
		if ( empty( $settings['column_gap'] ) ) {
			$settings['column_gap'] = 20;
		}

		if ( ! empty( $settings['carousel'] ) && '1' === (string) $settings['carousel'] ) {

			unset( $settings['pagination'] );

			if ( empty( $settings['columns_tablet'] ) ) {
				$settings['columns_tablet'] = 2;
			}
			if ( empty( $settings['columns_mobile'] ) ) {
				$settings['columns_mobile'] = 1;
			}
			if ( empty( $settings['carousel_gap'] ) ) {
				$settings['carousel_gap'] = 20;
			}
			if ( empty( $settings['carousel_gap_tablet'] ) ) {
				$settings['carousel_gap_tablet'] = 15;
			}
			if ( empty( $settings['carousel_gap_mobile'] ) ) {
				$settings['carousel_gap_mobile'] = 10;
			}
		}

		if ( ! empty( $settings['box_style'] ) ) {
			if ( ! empty( $settings['block_structure'] ) ) {

				$structure = explode( ',', preg_replace( '/\s+/', '', $settings['block_structure'] ) );
				if ( 'thumbnail' === $structure[0] ) {
					$settings['classes'] .= ' first-featured';
				} elseif ( 'thumbnail' === $structure[ count( $structure ) - 1 ] ) {
					$settings['classes'] .= ' last-featured';
				} else {
					$settings['classes'] .= ' featured-wo-round';
				}
			} else {
				$settings['classes'] .= ' first-featured';
			}
		}

		if ( empty( $settings['pagination'] ) ) {
			$settings['no_found_rows'] = true;
		}

		if ( ! $_query ) {
			$_query = pixwell_query( $settings );
		}

		$settings = pixwell_get_design_builder_block( $settings );

		ob_start();
		pixwell_block_open( $settings, $_query );
		pixwell_block_header( $settings );
		if ( ! $_query->have_posts() ) {
			pixwell_not_enough();
		} else {
			pixwell_block_inner_open_tag( $settings );
			pixwell_loop_grid_flex_1( $settings, $_query );
			pixwell_block_inner_close_tag( $settings );
			pixwell_render_pagination( $settings, $_query );
			wp_reset_postdata();
		}
		pixwell_block_close();

		return ob_get_clean();
	}
}

if ( ! function_exists( 'pixwell_loop_grid_flex_1' ) ) {
	function pixwell_loop_grid_flex_1( $settings, $_query ) {

		if ( empty( $settings['block_structure'] ) ) {
			$settings['block_structure'] = 'thumbnail,title,meta';
		}
		$settings['block_structure'] = explode( ',', preg_replace( '/\s+/', '', $settings['block_structure'] ) );

		while ( $_query->have_posts() ) :
			$_query->the_post();
			pixwell_grid_flex_1( $settings );
		endwhile;
	}
}