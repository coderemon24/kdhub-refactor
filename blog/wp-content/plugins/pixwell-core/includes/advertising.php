<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

add_filter( 'the_content', 'pixwell_reload_adsense', 999 );

if ( ! function_exists( 'pixwell_ad_script' ) ) :
	function pixwell_ad_script( $settings ) {

		if ( empty( $settings['ad_script'] ) ) {
			return;
		}

		$ad_script = pixwell_decode_shortcode( $settings['ad_script'] );
		if ( empty( $ad_script ) ) {
			$ad_script = $settings['ad_script'];
		}
		if ( ! empty( $settings['title'] ) ) : ?>
			<span class="advert-decs"><?php echo esc_html( $settings['title'] ); ?></span>
		<?php endif;
		$spot = pixwell_ad_spot( $ad_script );
		if ( ! empty( $spot['data_ad_slot'] ) && ! empty( $spot['data_ad_client'] ) && ! empty( $settings['ad_size'] ) ): ?>
			<aside class="ad-script adsense">
				<style>
					<?php echo '.res-'.trim($settings['id']); ?><?php echo pixwell_ad_script_css($settings['ad_size_mobile']); ?>
                    @media (min-width: 500px) {
					<?php echo '.res-'.trim($settings['id']); ?><?php echo pixwell_ad_script_css($settings['ad_size_tablet']); ?>
                    }

                    @media (min-width: 800px) {
					<?php echo '.res-'.trim($settings['id']); ?><?php echo pixwell_ad_script_css($settings['ad_size_desktop']); ?>
                    }
				</style>
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<ins class="adsbygoogle<?php echo ' res-' . trim( $settings['id'] ); ?>"
				     style="display:inline-block"
				     data-ad-client="<?php echo esc_attr( $spot['data_ad_client'] ); ?>"
				     data-ad-slot="<?php echo esc_attr( $spot['data_ad_slot'] ); ?>"></ins>
				<script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</aside>
		<?php else : ?>
			<aside class="ad-script non-adsense">
				<?php echo do_shortcode( $ad_script ); ?>
			</aside>
		<?php endif;
	}
endif;

if ( ! function_exists( 'pixwell_get_adsense' ) ) {
	function pixwell_get_adsense( $settings ) {

		if ( pixwell_is_amp() || empty( $settings['code'] ) ) {
			return false;
		}

		if ( empty( $settings['uuid'] ) ) {
			$settings['uuid'] = rand( 1, 1000 );
		}

		$classes = 'ad-wrap ad-script-wrap';
		if ( empty( $settings['no_spacing'] ) ) {
			$classes = ' edge-padding';
		}
		$spot = pixwell_adsense_spot( $settings['code'] );

		/** disable adsense unit if have auto ads */
		if ( ! empty( $spot['data_ad_slot'] ) && ! empty( $spot['data_ad_client'] ) && ! empty( $GLOBALS['pixwell_auto_ads'] ) ) {
			return false;
		}

		ob_start(); ?>
		<div class="<?php echo esc_attr( $classes ); ?>">
			<?php if ( ! empty( $settings['description'] ) ) : ?>
				<span class="advert-decs"><?php echo esc_html( $settings['description'] ); ?></span>
			<?php endif;
			if ( ! empty( $spot['data_ad_slot'] ) && ! empty( $spot['data_ad_client'] ) && ! empty( $settings['size'] ) ) : ?>
				<div class="ad-script adsense">
					<style>
						<?php echo '.res-'.trim($settings['uuid']); ?><?php echo pixwell_ad_script_css($settings['mobile_size']); ?>
                        @media (min-width: 500px) {
						<?php echo '.res-'.trim($settings['uuid']); ?><?php echo pixwell_ad_script_css($settings['tablet_size']); ?>
                        }

                        @media (min-width: 800px) {
						<?php echo '.res-'.trim($settings['uuid']); ?><?php echo pixwell_ad_script_css($settings['desktop_size']); ?>
                        }
					</style>
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<ins class="adsbygoogle<?php echo ' res-' . trim( $settings['uuid'] ); ?>"
					     style="display:inline-block"
					     data-ad-client="<?php echo esc_attr( $spot['data_ad_client'] ); ?>"
					     data-ad-slot="<?php echo esc_attr( $spot['data_ad_slot'] ); ?>"></ins>
					<script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>
			<?php else : ?>
				<div class="ad-script non-adsense">
					<?php echo do_shortcode( $settings['code'] ); ?>
				</div>
			<?php endif; ?>
		</div>
		<?php return ob_get_clean();
	}
}

/**
 * @param $ad_script
 *
 * @return array|bool
 * get ad spot
 */
if ( ! function_exists( 'pixwell_adsense_spot' ) ) :
	function pixwell_adsense_spot( $ad_script ) {

		$data_ad = [];

		if ( preg_match( '/googlesyndication.com/', $ad_script ) ) {

			$array_ad_client_code = explode( 'data-ad-client', $ad_script );
			$array_ad_client_code = explode( 'data-ad-client', $ad_script );
			if ( empty( $array_ad_client_code[1] ) ) {
				return false;
			}
			preg_match( '/"([a-zA-Z0-9-\s]+)"/', $array_ad_client_code[1], $match_data_ad_client );
			$data_ad_client = str_replace( [ '"', ' ' ], [ '' ], $match_data_ad_client[1] );

			$array_ad_slot_code = explode( 'data-ad-slot', $ad_script );
			if ( empty( $array_ad_slot_code[1] ) ) {
				return false;
			}
			preg_match( '/"([a-zA-Z0-9\s]+)"/', $array_ad_slot_code[1], $match_data_add_slot );
			$data_ad_slot = str_replace( [ '"', ' ' ], [ '' ], $match_data_add_slot[1] );

			if ( ! empty( $data_ad_client ) && ! empty( $data_ad_slot ) ) {
				$data_ad['data_ad_client'] = $data_ad_client;
				$data_ad['data_ad_slot']   = $data_ad_slot;
			}

			return $data_ad;
		} else {
			return false;
		}
	}
endif;

/**
 * @param $ad_script
 *
 * @return array|bool
 * get ad spot
 */
if ( ! function_exists( 'pixwell_ad_spot' ) ) :
	function pixwell_ad_spot( $ad_script ) {

		$data_ad = [];

		if ( empty( $ad_script ) ) {
			return false;
		}

		if ( preg_match( '/googlesyndication.com/', $ad_script ) ) {

			$array_ad_client_code = explode( 'data-ad-client', $ad_script );
			if ( empty( $array_ad_client_code[1] ) ) {
				return false;
			}
			preg_match( '/"([a-zA-Z0-9-\s]+)"/', $array_ad_client_code[1], $match_data_ad_client );
			$data_ad_client = str_replace( [ '"', ' ' ], [ '' ], $match_data_ad_client[1] );

			$array_ad_slot_code = explode( 'data-ad-slot', $ad_script );
			if ( empty( $array_ad_slot_code[1] ) ) {
				return false;
			}
			preg_match( '/"([a-zA-Z0-9\s]+)"/', $array_ad_slot_code[1], $match_data_add_slot );
			$data_ad_slot = str_replace( [ '"', ' ' ], [ '' ], $match_data_add_slot[1] );

			if ( ! empty( $data_ad_client ) && ! empty( $data_ad_slot ) ) {
				$data_ad['data_ad_client'] = $data_ad_client;
				$data_ad['data_ad_slot']   = $data_ad_slot;
			}

			return $data_ad;
		} else {
			return false;
		}
	}
endif;

/**
 * @param $size
 *
 * @return string
 * ad css
 */
if ( ! function_exists( 'pixwell_ad_script_css' ) ):
	function pixwell_ad_script_css( $size ) {

		switch ( $size ) {
			case '1' :
				return '{ width: 728px; height: 90px; }';
			case '2' :
				return '{ width: 468px; height: 60px; }';
			case '3' :
				return '{ width: 234px; height: 60px; }';
			case '4' :
				return '{ width: 125px; height: 125px; }';
			case '5' :
				return '{ width: 120px; height: 600px; }';
			case '6' :
				return '{ width: 160px; height: 600px; }';
			case '7' :
				return '{ width: 180px; height: 150px; }';
			case '8' :
				return '{ width: 120px; height: 240px; }';
			case '9' :
				return '{ width: 200px; height: 200px; }';
			case '10' :
				return '{ width: 250px; height: 250px; }';
			case '11' :
				return '{ width: 300px; height: 250px; }';
			case '12' :
				return '{ width: 336px; height: 280px; }';
			case '13' :
				return '{ width: 300px; height: 600px; }';
			case '14' :
				return '{ width: 300px; height: 1050px; }';
			case '15' :
				return '{ width: 320px; height: 50px; }';
			case '16' :
				return '{ width: 970px; height: 90px; }';
			case '17' :
				return '{ width: 970px; height: 250px; }';
			default :
				return '{ display: none; }';
		}
	}
endif;

if ( ! function_exists( 'pixwell_ad_image' ) ) {
	function pixwell_ad_image( $settings ) {

		if ( empty( $settings['image'] ) ) {
			return;
		} ?>
		<aside class="ad-image">
			<?php if ( ! empty( $settings['title'] ) ) : ?>
				<span class="advert-decs"><?php echo esc_html( $settings['title'] ); ?></span>
			<?php endif;
			if ( ! empty( $settings['destination'] ) ) : ?>
			<a class="widget-ad-link" target="_blank" rel="noopener nofollow" href="<?php echo esc_url( $settings['destination'] ); ?>">
				<?php endif;
				if ( is_numeric( $settings['image'] ) ): ?>
					<?php echo wp_get_attachment_image( $settings['image'], 'full' ); ?>
				<?php else :
					$size = pixwell_getimagesize( $settings['image'] );
					?>
					<img loading="lazy" decoding="async" src="<?php echo esc_url( $settings['image'] ); ?>" alt="<?php if ( ! empty( $settings['title'] ) ) {
						echo esc_attr( $settings['title'] );
					} ?>"<?php if ( ! empty( $size[1] ) ) {
						echo ' height="' . $size[1] . '"';
					} ?><?php if ( ! empty( $size[0] ) ) {
						echo ' width="' . $size[0] . '"';
					} ?>>
				<?php endif;
				if ( ! empty( $settings['destination'] ) ) : ?>
			</a>
		<?php endif; ?>
		</aside>
		<?php
	}
}

if ( ! function_exists( 'pixwell_get_ad_image' ) ):
	function pixwell_get_ad_image( $settings ) {

		if ( empty( $settings['image']['url'] ) ) {
			return false;
		}

		if ( ! empty( $settings['image']['height'] ) && ! empty( $settings['image']['width'] ) ) {
			$size = [
				$settings['image']['width'],
				$settings['image']['height'],
			];
		}

		if ( empty( $settings['image']['alt'] ) ) {
			$settings['image']['alt'] = esc_html__( 'Ad image', 'pixwell-core' );
		}
		if ( empty( $settings['dark_image']['alt'] ) ) {
			$settings['dark_image']['alt'] = esc_html__( 'Ad image', 'pixwell-core' );
		}

		$output = ' <aside class="ad-image">';
		if ( ! empty( $settings['description'] ) ) {
			$output .= '<span class="advert-decs">' . esc_html( $settings['description'] ) . '</span>';
		}
		$output .= '<div class="ad-image">';
		if ( ! empty( $settings['destination'] ) ) {
			$output .= '<a class="widget-ad-link" target="_blank" rel="noopener nofollow" href="' . esc_url( $settings['destination'] ) . '">';
		}
		if ( ! empty( $settings['dark_image']['url'] ) ) {
			$output .= '<img loading="lazy" decoding="async" data-mode="default" src="' . esc_url( $settings['image']['url'] ) . '" alt="' . esc_attr( $settings['image']['alt'] ) . '"';
			if ( ! empty( $size[0] ) && $size[1] ) {
				$output .= ' width="' . esc_attr( $size[0] ) . '" height="' . esc_attr( $size[1] ) . '"';
			}
			$output .= '>';
			$output .= '<img loading="lazy" decoding="async" data-mode="dark" src="' . esc_url( $settings['dark_image']['url'] ) . '" alt="' . esc_attr( $settings['dark_image']['alt'] ) . '"';
			if ( ! empty( $size[0] ) && $size[1] ) {
				$output .= ' width="' . esc_attr( $size[0] ) . '" height="' . esc_attr( $size[1] ) . '"';
			}
			$output .= '>';
		} else {
			$output .= '<img loading="lazy" decoding="async" src="' . esc_url( $settings['image']['url'] ) . '" alt="' . esc_attr( $settings['image']['alt'] ) . '"';
			if ( ! empty( $size[0] ) && $size[1] ) {
				$output .= ' width="' . esc_attr( $size[0] ) . '" height="' . esc_attr( $size[1] ) . '"';
			}
			$output .= '>';
		}

		if ( ! empty( $settings['destination'] ) ) {
			$output .= '</a>';
		}
		$output .= '</div>';
		$output .= '</aside>';

		return $output;
	}
endif;

if ( ! function_exists( 'pixwell_infeed_advert' ) ) {
	function pixwell_infeed_advert( $settings ) {

		if ( empty( $settings['infeed_ad'] ) ) {
			return;
		}

		$class_name = 'infeed-wrap';
		if ( ! empty( $settings['infeed_classname'] ) ) {
			$class_name .= ' ' . $settings['infeed_classname'];
		} ?>
		<div class="<?php echo esc_attr( $class_name ); ?>">
			<?php if ( 'code' == $settings['infeed_ad'] ):
				if ( ! empty( $settings['html_advert'] ) ) : ?>
					<div class="infeed-ad infeed-code"><?php echo do_shortcode( pixwell_decode_shortcode( $settings['html_advert'] ) ); ?></div>
				<?php endif;
			elseif ( 'image' == $settings['infeed_ad'] )  :
				$image_size = pixwell_getimagesize( $settings['ad_attachment'] );
				if ( empty( $settings['ad_destination'] ) ) : ?>
					<img loading="lazy" class="infeed-ad infeed-image" src="<?php echo esc_url( $settings['ad_attachment'] ); ?>" alt="<?php if ( ! empty( $settings['infeed_description'] ) ) {
						echo esc_attr( $settings['infeed_description'] );
					} ?>" width="<?php if ( ! empty( $image_size[0] ) ) {
						echo esc_attr( $image_size[0] );
					} ?>" height="<?php if ( ! empty( $image_size[1] ) ) {
						echo esc_attr( $image_size[1] );
					} ?>">
				<?php else : ?>
					<a class="infeed-ad infeed-image" target="_blank" href="<?php echo esc_url( $settings['ad_destination'] ); ?>"><img loading="lazy" src="<?php echo esc_url( $settings['ad_attachment'] ); ?>" alt="<?php if ( ! empty( $settings['infeed_description'] ) ) {
							echo esc_attr( $settings['infeed_description'] );
						} ?>" width="<?php if ( ! empty( $image_size[0] ) ) {
							echo esc_attr( $image_size[0] );
						} ?>" height="<?php if ( ! empty( $image_size[1] ) ) {
							echo esc_attr( $image_size[1] );
						} ?>"></a>
				<?php endif;
			endif;
			if ( ! empty( $settings['infeed_description'] ) ) : ?>
				<span class="advert-decs"><?php echo do_shortcode( $settings['infeed_description'] ) ?></span>
			<?php endif; ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pixwell_reload_adsense' ) ) {
	function pixwell_reload_adsense( $content ) {

		global $wp_query;
		if ( ! isset( $wp_query->query_vars['rbsnp'] ) || ! is_single() ) {
			return $content;
		} else {
			return str_replace( "(adsbygoogle = window.adsbygoogle || []).push({});", '', $content );
		}
	}
}
