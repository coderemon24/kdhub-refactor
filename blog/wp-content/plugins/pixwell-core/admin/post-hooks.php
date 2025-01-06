<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

add_action( 'save_post', 'pixwell_add_total_word', 100, 1 );
add_action( 'save_post', 'pixwell_remove_avg_review', 101, 1 );
add_action( 'save_post_post', 'pixwell_video_save_featured', PHP_INT_MAX, 1 );

if ( ! function_exists( 'pixwell_add_total_word' ) ) {
	function pixwell_add_total_word( $post_id = '' ) {

		if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || ( defined( 'DOING_AJAX' ) && DOING_AJAX ) || ! empty( $_GET['rest_route'] ) ) {
			return false;
		}

		if ( empty( $post_id ) || get_post_status( $post_id ) !== 'publish' || 'post' !== get_post_type( $post_id ) ) {
			return false;
		}

		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}

		$content    = get_post_field( 'post_content', $post_id );
		$total_word = pixwell_count_content( $content );
		update_post_meta( $post_id, 'pixwell_total_word', $total_word );

		return $total_word;
	}
}

if ( ! function_exists( 'pixwell_remove_avg_review' ) ) {
	function pixwell_remove_avg_review( $post_id = '' ) {

		delete_post_meta( $post_id, 'pixwell_review_stars' );
	}
}

if ( ! function_exists( 'pixwell_add_avg_review' ) ) {
	function pixwell_add_avg_review( $post_id = '' ) {

		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}

		$review = rb_get_meta( 'post_review', $post_id );

		if ( empty( $review ) || $review != 1 ) {
			return false;
		}

		$total = 0;
		$count = 0;
		$avg   = 0;

		$data = [
			[
				'review_label' => rb_get_meta( 'review_label_1', $post_id ),
				'review_star'  => rb_get_meta( 'review_star_1', $post_id ),
			],
			[
				'review_label' => rb_get_meta( 'review_label_2', $post_id ),
				'review_star'  => rb_get_meta( 'review_star_2', $post_id ),
			],
			[
				'review_label' => rb_get_meta( 'review_label_3', $post_id ),
				'review_star'  => rb_get_meta( 'review_star_3', $post_id ),
			],
			[
				'review_label' => rb_get_meta( 'review_label_4', $post_id ),
				'review_star'  => rb_get_meta( 'review_star_4', $post_id ),
			],
			[
				'review_label' => rb_get_meta( 'review_label_5', $post_id ),
				'review_star'  => rb_get_meta( 'review_star_5', $post_id ),
			],
			[
				'review_label' => rb_get_meta( 'review_label_6', $post_id ),
				'review_star'  => rb_get_meta( 'review_star_6', $post_id ),
			],
			[
				'review_label' => rb_get_meta( 'review_label_7', $post_id ),
				'review_star'  => rb_get_meta( 'review_star_7', $post_id ),
			],
		];

		foreach ( $data as $element ) {
			if ( ! empty( $element['review_label'] ) && ! empty( $element['review_star'] ) ) {
				$element['review_star'] = absint( $element['review_star'] );
				if ( $element['review_star'] > 5 ) {
					$element['review_star'] = 5;
				} elseif ( $element['review_star'] < 1 ) {
					$element['review_star'] = 1;
				}
				$total = $total + $element['review_star'];
				$count ++;
			}
		}

		if ( $count > 0 ) {
			$avg = round( $total / $count, 1 );
		}
		if ( empty( $avg ) ) {
			$avg = rb_get_meta( 'fallback_stars', $post_id );
		}

		$avg = floatval( $avg );

		if ( $avg <= 1 ) {
			$avg = 1;
		} elseif ( $avg > 5 ) {
			$avg = 5;
		}

		update_post_meta( $post_id, 'pixwell_review_stars', $avg );

		return $avg;
	}
}

if ( ! function_exists( 'pixwell_video_save_featured' ) ) {
	function pixwell_video_save_featured( $post_id ) {

		if ( ! pixwell_get_option( 'auto_video_featured' ) ) {
			return;
		}

		if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || ( defined( 'DOING_AJAX' ) && DOING_AJAX ) || ! empty( $_GET['rest_route'] ) ) {
			return;
		}

		if ( empty( $post_id ) || get_post_status( $post_id ) !== 'publish' || 'post' !== get_post_type( $post_id ) ) {
			return;
		}

		if ( ! empty( get_post_meta( $post_id, '_thumbnail_id', true ) ) ) {
			return;
		}

		$post_type = get_post_type( $post_id );
		$video_url = rb_get_meta( 'video_url', $post_id );

		if ( 'post' != $post_type || empty( $video_url ) ) {
			return;
		}

		$image_url = pixwell_video_get_feat( $video_url );

		if ( ! empty( $image_url ) ) {
			if ( ! function_exists( 'media_sideload_image' ) ) {
				require_once( ABSPATH . 'wp-admin/includes/media.php' );
				require_once( ABSPATH . 'wp-admin/includes/file.php' );
				require_once( ABSPATH . 'wp-admin/includes/image.php' );
			}
			$attr_id = media_sideload_image( $image_url, $post_id, null, 'id' );
			set_post_thumbnail( $post_id, $attr_id );
		}
	}
}

if ( ! function_exists( 'pixwell_video_get_feat' ) ) {
	function pixwell_video_get_feat( $video_url ) {

		if ( empty( $video_url ) ) {
			return false;
		}

		$host_name = pixwell_video_detect_url( $video_url );

		switch ( $host_name ) {
			case 'youtube' :
				return pixwell_video_get_feat_youtube( $video_url );
			case 'vimeo' :
				return pixwell_video_get_feat_vimeo( $video_url );
			case 'dailymotion' :
				return pixwell_video_get_feat_dailymotion( $video_url );
			default :
				return false;
		}
	}
}

if ( ! function_exists( 'pixwell_video_set_featured' ) ) {
	function pixwell_video_set_featured( $att_id ) {

		update_post_meta( get_the_ID(), '_thumbnail_id', $att_id );
	}
}

if ( ! function_exists( 'pixwell_video_detect_url' ) ) {
	function pixwell_video_detect_url( $video_url ) {

		$video_url = strtolower( $video_url );

		if ( strpos( $video_url, 'youtube.com' ) !== false || strpos( $video_url, 'youtu.be' ) !== false ) {
			return 'youtube';
		}
		if ( strpos( $video_url, 'dailymotion.com' ) !== false ) {
			return 'dailymotion';
		}
		if ( strpos( $video_url, 'vimeo.com' ) !== false ) {
			return 'vimeo';
		}

		return false;
	}
}

if ( ! function_exists( 'pixwell_video_id_youtube' ) ) {
	function pixwell_video_id_youtube( $video_url ) {

		$s = [];
		parse_str( parse_url( $video_url, PHP_URL_QUERY ), $s );

		if ( empty( $s["v"] ) ) {
			$youtube_sl_explode = explode( '?', $video_url );

			$youtube_sl = explode( '/', $youtube_sl_explode[0] );
			if ( ! empty( $youtube_sl[3] ) ) {
				return $youtube_sl [3];
			}

			return $youtube_sl [0];
		} else {
			return $s["v"];
		}
	}
}

if ( ! function_exists( 'pixwell_video_id_vimeo' ) ) {
	function pixwell_video_id_vimeo( $video_url ) {

		sscanf( parse_url( $video_url, PHP_URL_PATH ), '/%d', $video_id );

		return $video_id;
	}
}

if ( ! function_exists( 'pixwell_video_id_dailymotion' ) ) {
	function pixwell_video_id_dailymotion( $video_url ) {

		$video_id = strtok( basename( $video_url ), '_' );
		if ( strpos( $video_id, '#video=' ) !== false ) {
			$video_parts = explode( '#video=', $video_id );
			if ( ! empty( $video_parts[1] ) ) {
				return $video_parts[1];
			}
		};

		return $video_id;
	}
}

if ( ! function_exists( 'pixwell_video_feat_response' ) ) {
	function pixwell_video_feat_response( $image_url ) {

		$headers = @get_headers( $image_url );
		if ( ! empty( $headers[0] ) and strpos( $headers[0], '404' ) !== false ) {
			return true;
		}

		return false;
	}
}

if ( ! function_exists( 'pixwell_video_get_feat_youtube' ) ) {
	function pixwell_video_get_feat_youtube( $video_url ) {

		$protocol = pixwell_protocol();
		$video_id = pixwell_video_id_youtube( $video_url );

		$image_url_1920 = $protocol . '://img.youtube.com/vi/' . $video_id . '/maxresdefault.jpg';
		$image_url_640  = $protocol . '://img.youtube.com/vi/' . $video_id . '/sddefault.jpg';
		$image_url_480  = $protocol . '://img.youtube.com/vi/' . $video_id . '/hqdefault.jpg';

		if ( ! pixwell_video_feat_response( $image_url_1920 ) ) {
			return $image_url_1920;
		} elseif ( ! pixwell_video_feat_response( $image_url_640 ) ) {
			return $image_url_640;
		} elseif ( ! pixwell_video_feat_response( $image_url_480 ) ) {
			return $image_url_480;
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'pixwell_video_get_feat_vimeo' ) ) {
	function pixwell_video_get_feat_vimeo( $video_url ) {

		$protocol = pixwell_protocol();
		$video_id = pixwell_video_id_vimeo( $video_url );
		$api_url  = $protocol . '://vimeo.com/api/oembed.json?url=https://vimeo.com/' . $video_id;

		$data_response = wp_remote_get( $api_url, [
				'timeout'    => 60,
				'sslverify'  => false,
				'user-agent' => 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0',
			]
		);

		if ( ! is_wp_error( $data_response ) ) {
			$data_response = wp_remote_retrieve_body( $data_response );
			$data_response = json_decode( $data_response );

			return $data_response->thumbnail_url;
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'pixwell_video_get_feat_dailymotion' ) ) {
	function pixwell_video_get_feat_dailymotion( $video_url ) {

		$video_id = pixwell_video_id_dailymotion( $video_url );
		$protocol = pixwell_protocol();

		$param         = $protocol . '://api.dailymotion.com/video/' . $video_id . '?fields=thumbnail_url';
		$data_response = wp_remote_get( $param );
		if ( ! is_wp_error( $data_response ) ) {
			$data_response = json_decode( $data_response['body'] );

			return $data_response->thumbnail_url;
		} else {
			return false;
		}
	}
}