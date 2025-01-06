<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'rb_deal_query' ) ) {
	function rb_deal_query( $data = [] ) {

		$defaults = [
			'term_slugs'          => '',
			'total'               => '',
			'no_found_rows'       => true,
			'post_in'             => '',
			'post_not_in'         => '',
			'author'              => '',
			'ignore_sticky_posts' => 1,
		];

		$data = wp_parse_args( $data, $defaults );

		$current_time = current_time( 'timestamp' );
		$params       = [
			'post_type'   => 'rb-deal',
			'post_status' => 'publish',
			'orderby'     => 'publish_date',
			'order'       => 'DESC',
		];

		$params['ignore_sticky_posts'] = $data['ignore_sticky_posts'];
		$params['no_found_rows']       = boolval( $data['no_found_rows'] );

		if ( ! empty( $data['total'] ) ) {
			$params['posts_per_page'] = intval( $data['total'] );
		}

		if ( ! empty( $data['author'] ) ) {
			$params['author'] = $data['author'];
		}

		if ( ! empty( $data['post_in'] ) ) {
			if ( is_string( $data['post_in'] ) ) {
				$params['post__in'] = explode( ',', $data['post_in'] );
			} elseif ( is_array( $data['post_in'] ) ) {
				$params['post__in'] = $data['post_in'];
			}
		} elseif ( ! empty( $data['post_not_in'] ) ) {
			if ( is_string( $data['post_not_in'] ) ) {
				$params['post__not_in'] = explode( ',', $data['post_not_in'] );
			} elseif ( is_array( $data['post_not_in'] ) ) {
				$params['post__not_in'] = $data['post_not_in'];
			}
		}
		$params['meta_query'] = [
			'relation' => 'AND',
			[
				'key'     => 'rb_deal_start',
				'value'   => $current_time,
				'compare' => '<=',
				'type'    => 'NUMERIC',
			],
			[
				'key'     => 'rb_deal_end',
				'value'   => $current_time,
				'compare' => '>=',
				'type'    => 'NUMERIC',
			],
		];

		if ( ! empty( $data['term_slugs'] ) && is_string( $data['term_slugs'] ) ) {
			$data['term_slugs'] = explode( ',', $data['term_slugs'] );
			if ( is_array( $data['term_slugs'] ) ) {
				$params['tax_query'] = [ 'relation' => 'OR' ];
				foreach ( $data['term_slugs'] as $val ) {
					array_push( $params['tax_query'], [
						'taxonomy' => 'deal-category',
						'field'    => 'slug',
						'terms'    => trim( $val ),
					] );
				}
			}
		}

		return new WP_Query( $params );
	}
}

