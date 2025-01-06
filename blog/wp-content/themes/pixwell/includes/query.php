<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

/**
 * @param array  $data
 * @param string $paged
 * custom query for this theme
 */
if ( ! function_exists( 'pixwell_query' ) ) {
	function pixwell_query( $data = [], $paged = null ) {

		$defaults = [
			'categories'          => '',
			'category'            => '',
			'author'              => '',
			'format'              => '',
			'tags'                => '',
			'tag_in'              => '',
			'posts_per_page'      => '',
			'paged'               => '',
			'no_found_rows'       => false,
			'offset'              => '',
			'order'               => 'date_post',
			'post_type'           => 'post',
			'meta_key'            => '',
			'post_in'             => '',
			'post_not_in'         => '',
			'tag_not_in'          => '',
			's'                   => '',
			'tax_query'           => [],
			'unique'              => pixwell_get_option( 'unique_post' ),
			'ignore_sticky_posts' => 1,
		];

		$data = wp_parse_args( $data, $defaults );

		if ( 'popular' == $data['order'] && ! class_exists( 'Post_Views_Counter' ) ) {
			$data['order'] = 'comment_count';
		}

		$params = [];

		$params['post_status']         = 'publish';
		$params['ignore_sticky_posts'] = $data['ignore_sticky_posts'];
		$params['post_type']           = $data['post_type'];
		$params['no_found_rows']       = boolval( $data['no_found_rows'] );
		$params['tax_query']           = [];

		if ( ! empty( $data['posts_per_page'] ) ) {
			$params['posts_per_page'] = intval( $data['posts_per_page'] );
		}

		if ( ! empty( $data['post_in'] ) ) {
			if ( is_string( $data['post_in'] ) ) {
				$params['post__in'] = explode( ',', $data['post_in'] );
			} elseif ( is_array( $data['post_in'] ) ) {
				$params['post__in'] = $data['post_in'];
			}
		} else {
			$excluded_ids = [];

			if ( ! empty( $data['post_not_in'] ) && is_string( $data['post_not_in'] ) ) {
				$excluded_ids = explode( ',', $data['post_not_in'] );
			} elseif ( is_array( $data['post_not_in'] ) ) {
				$excluded_ids = $data['post_not_in'];
			}
			if ( isset( $GLOBALS['pixwell_queried_ids'] ) && count( $GLOBALS['pixwell_queried_ids'] ) && ! empty( $data['unique'] ) ) {
				$excluded_ids = array_merge( $excluded_ids, $GLOBALS['pixwell_queried_ids'] );
				if ( pixwell_get_option( 'remove_offset' ) ) {
					$data['offset'] = 0;
				}
			}
			if ( is_array( $excluded_ids ) ) {
				$params['post__not_in'] = $excluded_ids;
			}
		}

		if ( ! empty( $data['categories'] ) && 'all' != $data['categories'] ) {
			if ( is_array( $data['categories'] ) ) {
				$params['cat'] = implode( ',', $data['categories'] );
			} elseif ( is_string( $data['categories'] ) ) {
				$params['cat'] = trim( $data['categories'] );
			}
		} elseif ( ! empty( $data['category'] ) && 'all' != $data['category'] ) {
			$params['cat'] = $data['category'];
		}

		if ( ! empty( $data['author'] ) ) {
			$params['author'] = $data['author'];
		}

		if ( ! empty( $data['format'] ) && 'post' == $data['post_type'] ) {
			if ( 'default' != $data['format'] ) {
				$params['tax_query'][] = [
					'taxonomy' => 'post_format',
					'field'    => 'slug',
					'terms'    => [ 'post-format-' . trim( $data['format'] ) ],
				];
			} else {
				$params['tax_query'][] = [
					'taxonomy' => 'post_format',
					'field'    => 'slug',
					'terms'    => [ 'post-format-gallery', 'post-format-video', 'post-format-audio' ],
					'operator' => 'NOT IN',
				];
			}
		}

		if ( ! empty( $data['tax_query'] ) ) {
			$params['tax_query'][] = $data['tax_query'];
		}

		if ( ! empty( $paged ) && $paged > 1 ) {
			$params['paged'] = absint( $paged );
		}

		if ( ! empty( $data['offset'] ) ) {
			if ( $paged > 1 ) {
				$params['offset'] = absint( $data['offset'] ) + absint( ( $paged - 1 ) * absint( $data['posts_per_page'] ) );
			} else {
				$params['offset'] = absint( $data['offset'] );
			}
			unset( $params['paged'] );
		}

		if ( ! empty( $data['tags'] ) ) {
			$data['tags']  = preg_replace( '/\s+/', '', $data['tags'] );
			$params['tag'] = $data['tags'];
		} else {
			if ( ! empty( $data['tag_not_in'] ) ) {
				if ( ! is_array( $data['tag_not_in'] ) ) {
					$data['tag_not_in'] = explode( ',', $data['tag_not_in'] );
				}

				$data['tag_not_in'] = array_unique( $data['tag_not_in'] );
				foreach ( $data['tag_not_in'] as $tag_slug ) {
					$params['tax_query'][] = [
						'taxonomy' => 'post_tag',
						'field'    => 'slug',
						'terms'    => trim( $tag_slug ),
						'operator' => 'NOT IN',
					];
				}
			}
		}

		if ( ! empty( $data['tag_in'] ) && is_array( $data['tag_in'] ) ) {
			$params['tag__in'] = $data['tag_in'];
		}

		if ( ! empty( $data['meta_key'] ) ) {
			$params['meta_key'] = $data['meta_key'];
			$params['orderby']  = 'meta_value_num';
		}

		if ( ! empty( $data['s'] ) ) {
			$params['s']   = $data['s'];
			$data['order'] = 'relevance';
		}

		switch ( $data['order'] ) {

			case 'date_post' :
				$params['orderby'] = 'date';
				$params['order']   = 'DESC';
				break;
			case 'update' :
				$params['orderby'] = 'modified';
				$params['order']   = 'DESC';
				break;
			case 'comment_count' :
				$params['orderby'] = 'comment_count';
				$params['order']   = 'DESC';
				break;
			case 'post_type' :
				$params['orderby'] = 'type';
				break;
			case 'popular':
				$params['suppress_filters'] = false;
				$params['fields']           = '';
				$params['orderby']          = 'post_views';
				$params['order']            = 'DESC';
				break;
			case 'popular_3d':
				$params['suppress_filters'] = false;
				$params['fields']           = '';
				$params['orderby']          = 'post_views';
				$params['order']            = 'DESC';
				$params['date_query']       = [
					[
						'after'  => '3 days ago',
						'column' => 'post_date_gmt',
					],
				];
				break;
			case 'popular_w':
				$params['suppress_filters'] = false;
				$params['fields']           = '';
				$params['orderby']          = 'post_views';
				$params['order']            = 'DESC';
				$params['date_query']       = [
					[
						'after'  => '7 days ago',
						'column' => 'post_date_gmt',
					],
				];
				break;
			case 'popular_m':
				$params['suppress_filters'] = false;
				$params['fields']           = '';
				$params['orderby']          = 'post_views';
				$params['order']            = 'DESC';
				$params['date_query']       = [
					[
						'after'  => '1 month ago',
						'column' => 'post_date_gmt',
					],
				];
				break;
			case 'popular_3m':
				$params['suppress_filters'] = false;
				$params['fields']           = '';
				$params['orderby']          = 'post_views';
				$params['order']            = 'DESC';
				$params['date_query']       = [
					[
						'after'  => '3 months ago',
						'column' => 'post_date_gmt',
					],
				];
				break;
			case 'popular_6m':
				$params['suppress_filters'] = false;
				$params['fields']           = '';
				$params['orderby']          = 'post_views';
				$params['order']            = 'DESC';
				$params['date_query']       = [
					[
						'after'  => '6 months ago',
						'column' => 'post_date_gmt',
					],
				];
				break;
			case 'popular_y':
				$params['suppress_filters'] = false;
				$params['fields']           = '';
				$params['orderby']          = 'post_views';
				$params['order']            = 'DESC';
				$params['date_query']       = [
					[
						'after'  => '1 year ago',
						'column' => 'post_date_gmt',
					],
				];
				break;
			case 'top_review' :
				$params['meta_key']  = 'pixwell_review_stars';
				$params['meta_type'] = 'NUMERIC';
				$params['orderby']   = 'meta_value_num';
				$params['order']     = 'DESC';
				break;
			case 'top_review_3d' :
				$params['meta_key']   = 'pixwell_review_stars';
				$params['meta_type']  = 'NUMERIC';
				$params['orderby']    = 'meta_value_num';
				$params['order']      = 'DESC';
				$params['date_query'] = [
					[
						'after'  => '3 days ago',
						'column' => 'post_date_gmt',
					],
				];
				break;
			case 'top_review_w' :
				$params['meta_key']   = 'pixwell_review_stars';
				$params['meta_type']  = 'NUMERIC';
				$params['orderby']    = 'meta_value_num';
				$params['order']      = 'DESC';
				$params['date_query'] = [
					[
						'after'  => '7 days ago',
						'column' => 'post_date_gmt',
					],
				];
				break;
			case 'top_review_m' :
				$params['meta_key']   = 'pixwell_review_stars';
				$params['meta_type']  = 'NUMERIC';
				$params['orderby']    = 'meta_value_num';
				$params['order']      = 'DESC';
				$params['date_query'] = [
					[
						'after'  => '1 month ago',
						'column' => 'post_date_gmt',
					],
				];
				break;
			case 'top_review_3m' :
				$params['meta_key']   = 'pixwell_review_stars';
				$params['meta_type']  = 'NUMERIC';
				$params['orderby']    = 'meta_value_num';
				$params['order']      = 'DESC';
				$params['date_query'] = [
					[
						'after'  => '3 month ago',
						'column' => 'post_date_gmt',
					],
				];
				break;
			case 'top_review_6m' :
				$params['meta_key']   = 'pixwell_review_stars';
				$params['meta_type']  = 'NUMERIC';
				$params['orderby']    = 'meta_value_num';
				$params['order']      = 'DESC';
				$params['date_query'] = [
					[
						'after'  => '6 month ago',
						'column' => 'post_date_gmt',
					],
				];
				break;
			case 'top_review_y' :
				$params['meta_key']   = 'pixwell_review_stars';
				$params['meta_type']  = 'NUMERIC';
				$params['orderby']    = 'meta_value_num';
				$params['order']      = 'DESC';
				$params['date_query'] = [
					[
						'after'  => '1 year ago',
						'column' => 'post_date_gmt',
					],
				];
				break;
			case 'last_review' :
				$params['meta_key'] = 'pixwell_review_stars';
				$params['orderby']  = 'date';
				$params['order']    = 'DESC';
				break;
			case 'sponsored' :
				$params['meta_key']     = 'ruby_sponsor_post';
				$params['meta_type']    = 'NUMERIC';
				$params['meta_value']   = 1;
				$params['meta_compare'] = '=';
				$params['orderby']      = 'date';
				$params['order']        = 'DESC';
				break;
			case 'rand':
				$params['orderby'] = 'rand';
				break;
			case 'rand_w':
				$params['orderby']    = 'rand';
				$params['date_query'] = [
					[
						'after'  => '1 week ago',
						'column' => 'post_date_gmt',
					],
				];
				break;
			case 'rand_m':
				$params['orderby']    = 'rand';
				$params['date_query'] = [
					[
						'after'  => '1 month ago',
						'column' => 'post_date_gmt',
					],
				];
				break;
			case 'rand_3m':
				$params['orderby']    = 'rand';
				$params['date_query'] = [
					[
						'after'  => '3 months ago',
						'column' => 'post_date_gmt',
					],
				];
				break;
			case 'rand_6m':
				$params['orderby']    = 'rand';
				$params['date_query'] = [
					[
						'after'  => '6 months ago',
						'column' => 'post_date_gmt',
					],
				];
				break;
			case 'rand_y':
				$params['orderby']    = 'rand';
				$params['date_query'] = [
					[
						'after'  => '1 year ago',
						'column' => 'post_date_gmt',
					],
				];
				break;
			case 'alphabetical_order_decs':
				$params['orderby'] = 'title';
				$params['order']   = 'DECS';
				break;
			case 'alphabetical_order_asc':
				$params['orderby'] = 'title';
				$params['order']   = 'ASC';
				break;
			case 'by_input' :
				$params['orderby'] = 'post__in';
				break;
			case 'relevance' :
				$params['orderby'] = 'relevance';
				break;
			case 'post_index' :
				$params['meta_key'] = 'ruby_index';
				$params['orderby']  = 'meta_value';
				$params['order']    = 'ASC';
				break;
			case 'post_index_desc' :
				$params['meta_key'] = 'ruby_index';
				$params['orderby']  = 'meta_value';
				$params['order']    = 'DECS';
				break;
			default :
				$params['orderby'] = 'date';
				$params['order']   = 'DESC';
		}

		$_query = new WP_Query( $params );

		if ( ! empty( $GLOBALS['pixwell_queried_ids'] ) && is_array( $GLOBALS['pixwell_queried_ids'] ) ) {
			$_query->set( 'pixwell_queried_ids', $GLOBALS['pixwell_queried_ids'] );
		}

		pixwell_add_queried_ids( $_query );

		do_action( 'pixwell_after_post_query', $_query );

		return $_query;
	}
}

/**
 * @param array $data
 * @param int   $paged
 *
 * @return WP_Query
 * query related posts
 */
if ( ! function_exists( 'pixwell_query_related' ) ) {
	function pixwell_query_related( $data = [], $paged = 1 ) {

		$defaults = [
			'posts_per_page' => '',
			'post_not_in'    => '',
			'no_found_rows'  => false,
			'post_format'    => '',
			'orderby'        => 'relevance',
			'meta_key'       => '',
			'unique'         => pixwell_get_option( 'unique_post' ),
		];

		$post_id       = get_the_ID();
		$data          = wp_parse_args( $data, $defaults );
		$data['where'] = pixwell_get_option( 'single_post_related_where' );

		if ( empty( $data['where'] ) ) {
			$data['where'] = 'all';
		}

		$params                        = [];
		$params['ignore_sticky_posts'] = 1;
		$params['post_status']         = 'publish';
		$params['post_type']           = 'post';
		$params['orderby']             = $data['orderby'];
		$params['no_found_rows']       = boolval( $data['no_found_rows'] );

		if ( ! empty( $paged ) ) {
			$params['paged'] = $paged;
		}

		if ( ! empty( $data['posts_per_page'] ) ) {
			$params['posts_per_page'] = $data['posts_per_page'];
		} else {
			$params['posts_per_page'] = get_option( 'posts_per_page' );
		}

		$excluded_ids = [];
		if ( ! empty( $data['post_not_in'] ) && is_string( $data['post_not_in'] ) ) {
			$excluded_ids = explode( ',', $data['post_not_in'] );
		} elseif ( is_array( $data['post_not_in'] ) ) {
			$excluded_ids = $data['post_not_in'];
		}
		if ( isset( $GLOBALS['pixwell_queried_ids'] ) && count( $GLOBALS['pixwell_queried_ids'] ) && ! empty( $data['unique'] ) ) {
			$excluded_ids = array_merge( $excluded_ids, $GLOBALS['pixwell_queried_ids'] );
		}
		if ( is_array( $excluded_ids ) ) {
			$params['post__not_in'] = $excluded_ids;
		}

		if ( empty( $data['categories'] ) ) {
			$data['categories'] = [];
			$categories         = get_the_category( $post_id );
			if ( is_array( $categories ) ) {
				foreach ( $categories as $category ) {
					array_push( $data['categories'], $category->term_id );
				}
			}
		}

		if ( empty( $data['tags'] ) ) {
			$data['tags'] = [];
			$tags         = get_the_tags( $post_id );
			if ( is_array( $tags ) ) {
				foreach ( $tags as $tag ) {
					array_push( $data['tags'], $tag->slug );
				}
			}
		}

		if ( ! empty( $data['meta_key'] ) ) {
			$params['meta_key'] = $data['meta_key'];
		}

		switch ( $data['where'] ) {
			case 'all':
				if ( ! empty( $data['categories'] ) && ! empty( $data['tags'] ) ) {
					if ( empty( $data['format'] ) ) {
						$params['tax_query'] = [
							'relation' => 'OR',
							[
								'taxonomy' => 'category',
								'field'    => 'term_id',
								'terms'    => $data['categories'],
							],
							[
								'taxonomy' => 'post_tag',
								'field'    => 'slug',
								'terms'    => $data['tags'],
							],
						];
					} else {
						$params['tax_query'] = [
							'relation' => 'AND',
							[
								'taxonomy' => 'post_format',
								'field'    => 'slug',
								'terms'    => [ 'post-format-' . esc_attr( $data['format'] ) ],
							],
							[
								'relation' => 'OR',
								[
									'taxonomy' => 'category',
									'field'    => 'term_id',
									'terms'    => $data['categories'],
								],
								[
									'taxonomy' => 'post_tag',
									'field'    => 'slug',
									'terms'    => $data['tags'],
								],
							],
						];
					}
				} elseif ( empty( $data['categories'] ) && ! empty( $data['tags'] ) ) {
					$params['tag'] = $data['tags'];

					if ( ! empty( $data['format'] ) ) {
						$params['tax_query'] = [
							[
								'taxonomy' => 'post_format',
								'field'    => 'slug',
								'terms'    => [ 'post-format-' . esc_attr( $data['format'] ) ],
							],
						];
					}
				} elseif ( ! empty( $data['categories'] ) && empty( $data['tags'] ) ) {
					$params['cat'] = $data['categories'];
					if ( ! empty( $data['format'] ) ) {
						$params['tax_query'] = [
							[
								'taxonomy' => 'post_format',
								'field'    => 'slug',
								'terms'    => [ 'post-format-' . esc_attr( $data['format'] ) ],
							],
						];
					}
				}
				break;

			case 'cat' :
				if ( ! empty( $data['categories'] ) ) {
					$params['cat'] = $data['categories'];
					if ( ! empty( $data['format'] ) ) {
						$params['tax_query'] = [
							[
								'taxonomy' => 'post_format',
								'field'    => 'slug',
								'terms'    => [ 'post-format-' . esc_attr( $data['format'] ) ],
							],
						];
					}
				}
				break;

			case 'tag' :
				if ( ! empty( $data['tags'] ) ) {
					$params['tag'] = $data['tags'];
					if ( ! empty( $data['format'] ) ) {
						$params['tax_query'] = [
							[
								'taxonomy' => 'post_format',
								'field'    => 'slug',
								'terms'    => [ 'post-format-' . esc_attr( $data['format'] ) ],
							],
						];
					}
				}
				break;
		}

		$_query = new WP_Query( $params );

		if ( ! empty( $GLOBALS['pixwell_queried_ids'] ) && is_array( $GLOBALS['pixwell_queried_ids'] ) ) {
			$_query->set( 'pixwell_queried_ids', $GLOBALS['pixwell_queried_ids'] );
		}

		pixwell_add_queried_ids( $_query );

		return $_query;
	}
}

/** query portfolio post type */
if ( ! function_exists( 'pixwell_query_portfolio' ) ) {
	function pixwell_query_portfolio( $data = [] ) {

		$defaults = [
			'term_slugs'          => '',
			'posts_per_page'      => get_option( 'posts_per_page' ),
			'no_found_rows'       => true,
			'post_in'             => '',
			'post_not_in'         => '',
			'ignore_sticky_posts' => 1,
			'unique'              => pixwell_get_option( 'unique_post' ),
		];

		$data                          = wp_parse_args( $data, $defaults );
		$params                        = [];
		$params['post_type']           = 'rb-portfolio';
		$params['ignore_sticky_posts'] = $data['ignore_sticky_posts'];
		$params['no_found_rows']       = boolval( $data['no_found_rows'] );

		if ( ! empty( $data['posts_per_page'] ) ) {
			$params['posts_per_page'] = intval( $data['posts_per_page'] );
		}

		if ( ! empty( $data['post_in'] ) ) {
			if ( is_string( $data['post_in'] ) ) {
				$params['post__in'] = explode( ',', $data['post_in'] );
			} elseif ( is_array( $data['post_in'] ) ) {
				$params['post__in'] = $data['post_in'];
			}
		} else {
			$excluded_ids = [];

			if ( ! empty( $data['post_not_in'] ) && is_string( $data['post_not_in'] ) ) {
				$excluded_ids = explode( ',', $data['post_not_in'] );
			} elseif ( is_array( $data['post_not_in'] ) ) {
				$excluded_ids = $data['post_not_in'];
			}
			if ( isset( $GLOBALS['pixwell_queried_ids'] ) && count( $GLOBALS['pixwell_queried_ids'] ) && ! empty( $data['unique'] ) ) {
				$excluded_ids = array_merge( $excluded_ids, $GLOBALS['pixwell_queried_ids'] );
			}
			if ( is_array( $excluded_ids ) ) {
				$params['post__not_in'] = $excluded_ids;
			}
		}

		if ( ! empty( $data['term_slugs'] ) && is_string( $data['term_slugs'] ) ) {
			$data['term_slugs'] = explode( ',', $data['term_slugs'] );
			if ( is_array( $data['term_slugs'] ) ) {
				$params['tax_query'] = [ 'relation' => 'OR' ];
				foreach ( $data['term_slugs'] as $val ) {
					array_push( $params['tax_query'], [
						'taxonomy' => 'portfolio-category',
						'field'    => 'slug',
						'terms'    => trim( $val ),
					] );
				}
			}
		}

		$_query = new WP_Query( $params );

		if ( ! empty( $GLOBALS['pixwell_queried_ids'] ) && is_array( $GLOBALS['pixwell_queried_ids'] ) ) {
			$_query->set( 'pixwell_queried_ids', $GLOBALS['pixwell_queried_ids'] );
		}

		pixwell_add_queried_ids( $_query );

		do_action( 'pixwell_after_portfolio_query', $_query );

		return $_query;
	}
}

if ( ! function_exists( 'pixwell_add_queried_ids' ) ) {
	function pixwell_add_queried_ids( $_query ) {

		if ( ! isset( $GLOBALS['pixwell_queried_ids'] ) || ! is_array( $GLOBALS['pixwell_queried_ids'] ) ) {
			return;
		}

		if ( ! empty( $_query->posts ) ) {
			$post_ids = wp_list_pluck( $_query->posts, 'ID' );
			if ( is_array( $post_ids ) ) {
				$GLOBALS['pixwell_queried_ids'] = array_unique( array_merge( $GLOBALS['pixwell_queried_ids'], $post_ids ) );
			}
		}
	}
}