<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_follower_fb' ) ) {
	function pixwell_follower_fb( $data ) {

		if ( empty( $data['facebook_page'] ) ) {
			return false;
		}

		$cache = get_transient( 'social_follower' );
		if ( ! is_array( $cache ) ) {
			$cache = [];
		}

		if ( isset( $cache[ $data['widget_id'] ]['facebook'] ) ) {
			return $cache[ $data['widget_id'] ]['facebook'];
		}

		$fan    = false;
		$params = [
			'sslverify' => false,
			'timeout'   => 100,
		];

		if ( ! empty( $data['facebook_api'] ) ) {
			$response = wp_remote_get( 'https://graph.facebook.com/v2.9/' . urlencode( $data['facebook_page'] ) . '?access_token=' . $data['facebook_api'] . '&fields=fan_count', $params );
			if ( ! is_wp_error( $response ) && isset( $response['response']['code'] ) && '200' == $response['response']['code'] ) {
				$response = json_decode( wp_remote_retrieve_body( $response ) );
			}

			if ( ! empty( $response->fan_count ) ) {
				$fan = $response->fan_count;
			}
		}

		if ( false == $fan ) {
			$filter = [
				[
					'start_1' => 'id="PagesLikesCountDOMID"',
					'start_2' => '<span',
					'start_3' => '>',
					'end_4'   => '<span',
				],
				[
					'start_1' => '["PagesLikesTab","renderLikesData",["',
					'start_2' => '},',
					'start_3' => '],',
					'end_4'   => '],[]],["PagesLikesTab"',
				],
			];

			$response = wp_remote_get( 'https://www.facebook.com/' . $data['facebook_page'] );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				$response = wp_remote_get( 'https://www.facebook.com/' . $data['facebook_page'], $params );
			}

			if ( ! is_wp_error( $response ) && ! empty( $response['response']['code'] ) && '200' == $response['response']['code'] ) {
				$response = wp_remote_retrieve_body( $response );
				if ( ! empty( $response ) && $response !== false ) {
					$flag            = false;
					$response_backup = $response;

					foreach ( $filter as $filter_el ) {
						$response = $response_backup;
						foreach ( $filter_el as $key => $value ) {

							$key = explode( '_', $key );
							$key = $key[0];

							if ( $key == 'start' ) {
								$key = false;
							} elseif ( $value == 'end' ) {
								$key = true;
							}

							$key = (bool) $key;

							$index = strpos( $response, $value );
							if ( $index === false ) {
								break;
							}

							if ( $key ) {
								$response = substr( $response, 0, $index );
								$flag     = true;
							} else {
								$response = substr( $response, $index + strlen( $value ) );
							}
						}

						if ( $flag ) {
							break;
						}
					}

					if ( strlen( $response ) < 150 ) {
						$count = intval( preg_replace( '/[^0-9]+/', '', $response ), 10 );
						if ( is_numeric( $count ) && strlen( number_format( $count ) ) < 16 ) {
							$fan = intval( $count );
						}
					}
				}
			}
		}

		if ( empty( $fan ) && ! empty( $data['default'] ) ) {
			$fan = intval( $data['default'] );
		} else {
			$fan = 0;
		}

		$cache[ $data['widget_id'] ]['facebook'] = $fan;
		set_transient( 'social_follower', $cache, 12000 );

		return $fan;
	}
}

if ( ! function_exists( 'pixwell_follower_twitter' ) ) {
	function pixwell_follower_twitter( $data ) {

		/** Twitter is no longer supporting free API for counter. */
		return $data['default'];
	}
}

if ( ! function_exists( 'pixwell_follower_pin' ) ) {
	function pixwell_follower_pin( $data ) {

		if ( empty( $data['user'] ) ) {
			return false;
		}

		$cache = get_transient( 'social_follower' );

		if ( isset( $cache[ $data['widget_id'] ]['pinterest'] ) ) {
			return $cache[ $data['widget_id'] ]['pinterest'];
		}

		$fan = 0;
		if ( ! empty( $data['default'] ) ) {
			$fan = intval( $data['default'] );
		}

		$response = get_meta_tags( 'http://pinterest.com/' . $data['user'] . '/' );
		if ( ! empty( $response ) && ! empty( $response['pinterestapp:followers'] ) ) {
			$fan = intval( strip_tags( $response['pinterestapp:followers'] ) );
		}

		$cache[ $data['widget_id'] ]['pinterest'] = $fan;
		set_transient( 'social_follower', $cache, 12000 );

		return $fan;
	}
}

/**
 * @param array $settings
 *
 * @return array|mixed|object
 * get Instagram images with token
 */
if ( ! function_exists( 'pixwell_data_instagram_token' ) ) {
	function pixwell_data_instagram_token( $settings = [] ) {

		$cache_name = 'pixwell_instagram_cache';

		$data_images = [];

		if ( ! empty( $settings['cache_id'] ) ) {
			$cache_id = $settings['cache_id'];
		} else {
			$cache_id = 0;
		}

		$cache_data = get_transient( $cache_name );

		if ( ! is_array( $cache_data ) ) {
			$cache_data = [];
		}

		if ( isset( $cache_data[ $cache_id ] ) ) {
			return $cache_data[ $cache_id ];
		} else {

			if ( empty( $settings['instagram_token'] ) ) {
				$data_images['error'] = esc_html__( 'Instagram token not found', 'pixwell-core' );

				$cache_data[ $cache_id ] = $data_images;
				set_transient( $cache_name, $cache_data, 12000 );

				return $data_images;
			}

			$params = [
				'sslverify' => false,
				'timeout'   => 100,
			];

			$url = 'https://graph.instagram.com/me/media?fields=id,caption,media_url,permalink,media_type,thumbnail_url&access_token=' . trim( $settings['instagram_token'] );

			$response = wp_remote_get( $url, $params );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || 200 != $response['response']['code'] ) {

				$response = json_decode( wp_remote_retrieve_body( $response ) );
				if ( ! empty( $response->error->message ) ) {
					$data_images['error'] = esc_html( $response->error->message );
				} else {
					$data_images['error'] = esc_html__( 'Could not connect to Instagram API server.', 'pixwell-core' );
				}

				$cache_data[ $cache_id ] = $data_images;
				set_transient( $cache_name, $cache_data, 12000 );

				return $data_images;
			}

			$response = json_decode( wp_remote_retrieve_body( $response ) );

			if ( ! empty( $response->data ) && is_array( $response->data ) ) {
				foreach ( $response->data as $image ) {

					$caption    = esc_html__( 'instagram image', 'pixwell-core' );
					$link       = '#';
					$likes      = '';
					$comments   = '';
					$thumbnail  = '#';
					$media      = '';
					$images_url = '';

					if ( ! empty( $image->permalink ) ) {
						$link = esc_url( $image->permalink );
					}

					if ( ! empty( $image->media_url ) ) {
						$thumbnail = esc_url( $image->media_url );
					}

					if ( ! empty( $image->media_type ) ) {
						$media = esc_html( $image->media_type );
					}

					if ( ! empty( $image->thumbnail_url ) ) {
						$images_url = esc_html( $image->thumbnail_url );
					}

					if ( ! empty( $image->$caption ) ) {
						$caption = pixwell_strip_tags( $image->$caption );
					}

					$data_images[] = [
						'thumbnail_src' => $thumbnail,
						'caption'       => $caption,
						'link'          => $link,
						'likes'         => $likes,
						'comments'      => $comments,
						'media'         => $media,
						'thumbnail_url' => $images_url,
					];
				}
			} else {
				$data_images['error'] = esc_html__( 'Token is invalid or has expired. Please try creating a new token.', 'pixwell-core' );
			}

			$cache_data[ $cache_id ] = $data_images;
			set_transient( $cache_name, $cache_data, 12000 );

			return $data_images;
		}
	}
}

/**
 * @param array $settings
 *
 * @return mixed
 * get instagram images without token
 */
if ( ! function_exists( 'pixwell_data_instagram_no_token' ) ) {
	function pixwell_data_instagram_no_token( $settings = [] ) {

		$cache_name  = 'pixwell_instagram_cache';
		$data_images = [];

		if ( ! empty( $settings['cache_id'] ) ) {
			$cache_id = $settings['cache_id'];
		} else {
			$cache_id = 0;
		}

		$cache_data = get_transient( $cache_name );

		if ( ! is_array( $cache_data ) ) {
			$cache_data = [];
		}

		if ( isset( $cache_data[ $cache_id ] ) ) {
			return $cache_data[ $cache_id ];
		} else {

			if ( empty( $settings['user_name'] ) ) {
				$data_images['error'] = esc_html__( 'Username or tags are empty', 'pixwell-core' );

				$cache_data[ $cache_id ] = $data_images;
				set_transient( $cache_name, $cache_data, 12000 );

				return $data_images;
			}

			$user_name       = trim( strtolower( $settings['user_name'] ) );
			$clean_user_name = ltrim( $user_name, '@#' );
			$url_prefix      = ( strpos( $user_name, '#' ) === 0 ) ? 'https://instagram.com/explore/tags/' : 'https://instagram.com/';
			$url             = $url_prefix . $clean_user_name;

			$params = [
				'sslverify' => false,
				'timeout'   => 100,
			];

			$response = wp_remote_get( $url, $params );
			if ( is_wp_error( $response ) || 200 != wp_remote_retrieve_response_code( $response ) ) {
				$data_images['error'] = esc_html__( 'Unable connect to Instagram server, Please try to use the token method.', 'pixwell-core' );

				$cache_data[ $cache_id ] = $data_images;
				set_transient( $cache_name, $cache_data, 12000 );

				return $data_images;
			}

			$response = explode( 'window._sharedData = ', $response['body'] );
			if ( empty( $response[1] ) ) {
				$data_images['error'] = esc_html__( 'Unable connect to Instagram server, Please try to use the token method.', 'pixwell-core' );

				$cache_data[ $cache_id ] = $data_images;
				set_transient( $cache_name, $cache_data, 12000 );

				return $data_images;
			}
			$response = explode( ';</script>', $response[1] );
			$response = json_decode( $response[0], true );

			if ( empty( $response ) ) {
				$data_images['error'] = esc_html__( 'Unable connect to Instagram server, Please try to use the token method.', 'pixwell-core' );

				$cache_data[ $cache_id ] = $data_images;
				set_transient( $cache_name, $cache_data, 12000 );

				return $data_images;
			}

			if ( isset( $response['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'] ) ) {
				$response = $response['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];
			} elseif ( isset( $response['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'] ) ) {
				$response = $response['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'];
			} else {
				$data_images['error'] = esc_html__( 'Unable connect or images not found, Please try to use the token method.', 'pixwell-core' );

				$cache_data[ $cache_id ] = $data_images;
				set_transient( $cache_name, $cache_data, 12000 );

				return $data_images;
			}

			if ( ! is_array( $response ) ) {
				$data_images['error'] = esc_html__( 'Unable to connect or images not found. Please try using the token method.', 'pixwell-core' );

				$cache_data[ $cache_id ] = $data_images;
				set_transient( $cache_name, $cache_data, 12000 );

				return $data_images;
			}

			foreach ( $response as $image ) {
				$image['thumbnail_src'] = '';

				if ( ! empty( $image['node']['thumbnail_resources'][4]['src'] ) ) {
					$image['thumbnail_src'] = preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][4]['src'] );
				} elseif ( ! empty( $image['node']['thumbnail_resources'][2]['src'] ) ) {
					$image['thumbnail_src'] = preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][2]['src'] );
				} elseif ( ! empty( $image['node']['thumbnail_resources'][0]['src'] ) ) {
					$image['thumbnail_src'] = preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][0]['src'] );
				}

				if ( ! empty( $image['node']['shortcode'] ) ) {
					$link = trailingslashit( '//instagram.com/p/' . $image['node']['shortcode'] );
				} else {
					$link = '#';
				}

				if ( ! empty( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'] ) ) {
					$caption = pixwell_strip_tags( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'] );
				} else {
					$caption = esc_html__( 'instagram image', 'pixwell-core' );
				}

				if ( ! empty( $image['node']['edge_liked_by']['count'] ) ) {
					$likes = intval( $image['node']['edge_liked_by']['count'] );
				} else {
					$likes = '';
				}

				if ( ! empty( $image['node']['edge_media_to_comment']['count'] ) ) {
					$comments = intval( $image['node']['edge_media_to_comment']['count'] );
				} else {
					$comments = '';
				}

				$data_images[] = [
					'thumbnail_src' => $image['thumbnail_src'],
					'caption'       => $caption,
					'link'          => $link,
					'likes'         => $likes,
					'comments'      => $comments,
				];
			}

			if ( ! array_filter( $data_images ) ) {
				$data_images['error'] = esc_html__( 'Images not found, Please try to use the token method.', 'pixwell-core' );

				$cache_data[ $cache_id ] = $data_images;
				set_transient( $cache_name, $cache_data, 12000 );

				return $data_images;
			}

			$cache_data[ $cache_id ] = $data_images;
			set_transient( $cache_name, $cache_data, 12000 );

			return $data_images;
		}
	}
}

/**
 * @param array $settings
 *
 * @return array|mixed|object
 * flickr data
 */
if ( ! function_exists( 'pixwell_data_flickr' ) ) {
	function pixwell_data_flickr( $settings = [] ) {

		if ( empty( $settings['flickr_id'] ) ) {
			return false;
		};

		$cache_name = 'pixwell_flickr_cache';

		if ( ! empty( $settings['cache_id'] ) ) {
			$cache_id = $settings['cache_id'];
		} else {
			$cache_id = 0;
		}

		$cache_data = get_transient( $cache_name );

		if ( ! is_array( $cache_data ) ) {
			$cache_data = [];
		}

		if ( isset( $cache_data[ $cache_id ] ) ) {
			return $cache_data[ $cache_id ];
		} else {

			if ( empty( $settings['tag'] ) ) {
				$settings['tag'] = '';
			}

			if ( empty( $settings['total_images'] ) ) {
				$settings['total_images'] = 9;
			}

			$params = [ 'timeout' => 100, 'sslverify' => false ];

			$response = wp_remote_get( 'http://api.flickr.com/services/feeds/photos_public.gne?format=json&id=' . urlencode( $settings['flickr_id'] ) . '&nojsoncallback=1&tags=' . urlencode( $settings['tag'] ), $params );

			if ( is_wp_error( $response ) || '200' != $response['response']['code'] ) {

				$cache_data[ $cache_id ] = 'error';
				set_transient( $cache_name, $cache_data, 12000 );

				return false;
			}

			$response    = wp_remote_retrieve_body( $response );
			$response    = str_replace( "\\'", "'", $response );
			$data_images = json_decode( $response, true );

			if ( is_array( $data_images ) ) {
				$data_images = array_slice( $data_images['items'], 0, $settings['total_images'] );

				foreach ( $data_images as $i => $v ) {
					$data_images[ $i ]['media'] = preg_replace( '/_m\.(jp?g|png|gif)$/', '_m.\\1', $v['media']['m'] );
				}

				$cache_data[ $cache_id ] = $data_images;
				set_transient( $cache_name, $cache_data, 12000 );

				return $data_images;
			}

			$cache_data[ $cache_id ] = 'error';
			set_transient( $cache_name, $cache_data, 12000 );

			return false;
		}
	}
}