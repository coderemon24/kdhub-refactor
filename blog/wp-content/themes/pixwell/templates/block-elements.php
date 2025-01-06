<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_block_open' ) ) :
	function pixwell_block_open( $settings = [], $query_data = null ) {

		$block_tag    = 'div';
		$class_name   = [];
		$class_name[] = 'block-wrap';

		if ( ! empty( $settings['block_tag'] ) ) {
			$block_tag = $settings['block_tag'];
		}

		if ( ! empty( $settings['classes'] ) ) {
			$class_name[] = $settings['classes'];
		}

		if ( ! empty( $settings['columns_desktop'] ) ) {
			$class_name[] = 'rb-columns rb-col-' . $settings['columns_desktop'];
		}

		if ( ! empty( $settings['block_header_style'] ) ) {
			$class_name[] = 'block-header-' . esc_attr( $settings['block_header_style'] );
		}

		if ( ! empty( $settings['columns_tablet'] ) ) {
			$class_name[] = 'rb-tcol-' . $settings['columns_tablet'];
		}

		if ( ! empty( $settings['columns_mobile'] ) ) {
			$class_name[] = 'rb-mcol-' . $settings['columns_mobile'];
		}

		if ( ! empty( $settings['column_gap'] ) ) {
			$class_name[] = 'is-gap-' . $settings['column_gap'];
		}

		if ( ! empty( $settings['column_border'] ) ) {
			$class_name[] = 'col-border is-border-' . $settings['column_border'];
		}

		if ( ! empty( $settings['bottom_border'] ) ) {
			$class_name[] = 'bottom-border is-b-border-' . $settings['bottom_border'];
			if ( ! empty( $settings['last_bottom_border'] ) && '-1' === (string) $settings['last_bottom_border'] ) {
				$class_name[] = 'no-last-bb';
			}
		}

		if ( ! empty( $settings['center_mode'] ) ) {
			$class_name[] = 'p-center';
		}

		if ( ! empty( $settings['horizontal_scroll'] ) ) {
			switch ( $settings['horizontal_scroll'] ) {
				case 'tablet':
					$class_name[] = 'is-thoz-scroll';
					unset( $settings['columns_tablet'] );
					break;
				case 'mobile' :
					$class_name[] = 'is-mhoz-scroll';
					unset( $settings['columns_mobile'] );
					break;
				default:
					$class_name[] = 'is-hoz-scroll';
					unset( $settings['columns_tablet'] );
					unset( $settings['columns_mobile'] );
			}
		}

		if ( ! empty( $settings['text_style'] ) ) {
			if ( 'light' == $settings['text_style'] ) {
				$class_name[] = 'is-light-text';
			} elseif ( 'dark' == $settings['text_style'] ) {
				$class_name[] = 'is-dark-text';
			}
		}

		$class_name = implode( ' ', $class_name ); ?>
		<<?php echo esc_attr( $block_tag ) ?> id="<?php echo esc_attr( $settings['uuid'] ); ?>" class="<?php echo esc_attr( $class_name ); ?>" <?php pixwell_get_ajax_attributes( $settings, $query_data ); ?>>
		<?php
	}
endif;

if ( ! function_exists( 'pixwell_block_close' ) ) :
	function pixwell_block_close( $settings = [] ) {

		$block_tag = 'div';
		if ( ! empty( $settings['block_tag'] ) ) {
			$block_tag = $settings['block_tag'];
		}
		echo '</' . esc_attr( $block_tag ) . '>';
	}
endif;

if ( ! function_exists( 'pixwell_block_header' ) ) :
	function pixwell_block_header( $settings = [] ) {

		if ( empty( $settings['title'] ) ) {
			return;
		} ?>
		<header class="block-header">
			<?php if ( empty( $settings['viewmore_link'] ) ) : ?>
				<h2 class="block-title h3"><?php echo esc_html( $settings['title'] ); ?></h2>
			<?php else : ?>
				<h2 class="block-title h3 is-link">
					<a href="<?php echo esc_url( $settings['viewmore_link'] ); ?>" title="<?php echo esc_attr( $settings['title'] ); ?>"><?php echo esc_html( $settings['title'] ); ?></a>
				</h2>
			<?php endif; ?>
			<?php
			pixwell_block_quick_filter( $settings );
			pixwell_block_more( $settings );
			?>
		</header>
		<?php
	}
endif;

if ( ! function_exists( 'pixwell_block_content_open' ) ) :
	function pixwell_block_content_open( $settings = [] ) {

		$class_name = 'content-inner';
		if ( ! empty( $settings['columns'] ) ) {
			$class_name .= ' rb-row';
		}
		if ( ! empty( $settings['content_classes'] ) ) {
			$class_name .= ' ' . $settings['content_classes'];
		} ?>
		<div class="content-wrap"><div class="<?php echo esc_attr( $class_name ); ?>">
		<?php
	}
endif;

if ( ! function_exists( 'pixwell_block_content_close' ) ) :
	function pixwell_block_content_close() {
		?>
		</div></div>
		<?php
	}
endif;

if ( ! function_exists( 'pixwell_block_quick_filter' ) ) :
	function pixwell_block_quick_filter( $settings ) {

		if ( empty( $settings['quick_filter'] ) || empty( $settings['uuid'] ) ) {
			return;
		}
		if ( empty( $settings['quick_filter_ids'] ) ) {
			$settings['quick_filter_ids'] = '';
		}

		if ( empty( $settings['quick_filter_label'] ) ) {
			$settings['quick_filter_label'] = pixwell_translate( 'all' );
		}
		$data = pixwell_add_settings_quick_filters( $settings['quick_filter'], $settings['quick_filter_ids'] );

		if ( empty( $data ) || ! is_array( $data ) ) {
			return;
		} ?>
		<aside id="<?php echo 'ajax_filter_' . $settings['uuid']; ?>" class="ajax-quick-filter">
			<div class="ajax-quick-filter-inner">
				<span class="filter-el"><a href="#" class="ajax-link quick-filter-link is-active" data-ajax_filter_val="0"><?php echo esc_html( $settings['quick_filter_label'] ); ?></a></span>
				<?php foreach ( $data as $item ) : ?>
					<span class="filter-el"><a href="#" class="ajax-link quick-filter-link" data-ajax_filter_val="<?php echo esc_attr( $item['id'] ); ?>"><?php echo esc_html( $item['name'] ); ?></a></span>
				<?php endforeach; ?>
			</div>
		</aside>
		<?php
	}
endif;

if ( ! function_exists( 'pixwell_get_ajax_attributes' ) ) {
	function pixwell_get_ajax_attributes( $settings = [], $query_data = null ) {

		if ( null == $query_data ) {
			return;
		}

		if ( empty( $settings['uuid'] ) || ( empty( $settings['pagination'] ) && empty( $settings['quick_filter'] ) ) ) {
			return;
		}

		if ( ! empty( $query_data->max_num_pages ) && ! isset( $settings['page_max'] ) ) {
			$settings['page_max'] = $query_data->max_num_pages;
		}

		$settings['page_current'] = 1;
		$settings['unique']       = empty( $settings['unique'] ) ? pixwell_get_option( 'unique_post' ) : $settings['unique'];

		$defaults = [
			'uuid'             => '',
			'name'             => '',
			'quick_filter'     => '',
			'quick_filter_ids' => '',
			'page_max'         => '',
			'page_current'     => '',
			'category'         => '',
			'categories'       => '',
			'tags'             => '',
			'format'           => '',
			'author'           => '',
			'post_not_in'      => '',
			'post_in'          => '',
			'order'            => '',
			'posts_per_page'   => '',
			'offset'           => '',
			'text_style'       => '',
			'post_columns'     => '',
			'tag_not_in'       => '',
			'layout'           => '',
		];

		$excluded_ids = [];

		if ( ! empty( $settings['post_not_in'] ) ) {
			if ( is_string( $settings['post_not_in'] ) ) {
				$excluded_ids = explode( ',', $settings['post_not_in'] );
			} elseif ( is_array( $settings['post_not_in'] ) ) {
				$excluded_ids = $settings['post_not_in'];
			}
		}

		if ( ! empty( $query_data->get( 'pixwell_queried_ids' ) ) && count( $query_data->get( 'pixwell_queried_ids' ) ) && ! empty( $settings['unique'] ) ) {
			$excluded_ids = array_merge( $excluded_ids, $query_data->get( 'pixwell_queried_ids' ) );
		}

		if ( count( $excluded_ids ) ) {
			$settings['post_not_in'] = implode( ',', $excluded_ids );
		}

		foreach ( $defaults as $key => $val ) {
			if ( ! empty( $settings[ $key ] ) ) {
				echo 'data-' . $key . '="' . esc_attr( $settings[ $key ] ) . '" ';
			}
		}
	}
}

if ( ! function_exists( 'pixwell_block_more' ) ) :
	function pixwell_block_more( $settings ) {

		if ( empty( $settings['viewmore_title'] ) ) {
			return;
		} ?>
		<aside class="block-view-more">
			<?php if ( ! empty( $settings['viewmore_link'] ) ) : ?>
				<a href="<?php echo esc_url( $settings['viewmore_link'] ); ?>" title="<?php echo esc_attr( $settings['viewmore_title'] ); ?>"><?php echo esc_html( $settings['viewmore_title'] ); ?>
					<i class="rbi rbi-arrow-right"></i></a>
			<?php else: ?>
				<span class="view-more-desc"><?php echo esc_html( $settings['viewmore_title'] ); ?></span>
			<?php endif; ?>
		</aside>
		<?php
	}
endif;

if ( ! function_exists( 'pixwell_block_header_cat' ) ) :
	function pixwell_block_header_cat( $settings ) {

		if ( empty( $settings['title'] ) ) {
			return;
		} ?>
		<header class="block-header">
			<?php if ( empty( $settings['title_url'] ) ) : ?>
				<h2 class="block-title h3"><?php echo esc_html( $settings['title'] ); ?></h2>
			<?php else : ?>
				<h2 class="block-title h3 is-link">
					<a href="<?php echo esc_url( $settings['title_url'] ); ?>" title="<?php echo esc_attr( $settings['title'] ); ?>"><?php echo esc_html( $settings['title'] ); ?></a>
				</h2>
			<?php endif;
			if ( ! empty( $settings['tagline'] ) ) : ?>
				<h6 class="block-tagline"><?php echo esc_html( $settings['tagline'] ); ?></h6>
			<?php endif; ?>
		</header>
		<?php
	}
endif;

if ( ! function_exists( 'pixwell_not_enough' ) ) {
	function pixwell_not_enough( $total = 3 ) {

		if ( current_user_can( 'edit_pages' ) ) : ?>
			<p class="rb-error"><?php echo sprintf( esc_html__( 'Not enough posts to display. This block requires at least %s posts. Please add more posts or adjust query filters in the block settings panel:', 'pixwell' ), $total ); ?>
				<?php edit_post_link( esc_html__( 'Edit Page', 'pixwell' ), null, null, null, 'page-edit-link' ); ?>
			</p>
		<?php
		endif;
	}
}

if ( ! function_exists( 'pixwell_no_post' ) ) {
	function pixwell_no_post() {

		if ( current_user_can( 'edit_pages' ) ) : ?>
			<p class="rb-error"><?php esc_html_e( 'No posts found. Please add more posts for this query.', 'pixwell' ); ?></p>
		<?php
		endif;
	}
}

if ( ! function_exists( 'pixwell_get_design_builder_block' ) ) {
	function pixwell_get_design_builder_block( $settings ) {

		if ( ! is_array( $settings ) ) {
			$settings = [];
		}

		if ( ! empty( $settings['entry_category'] ) && '-1' === (string) $settings['entry_category'] ) {
			$settings['entry_category'] = false;
		}

		if ( ! empty( $settings['entry_format'] ) && '-1' === (string) $settings['entry_format'] ) {
			$settings['entry_format'] = false;
		}

		if ( ! empty( $settings['entry_meta'] ) ) {
			$settings['entry_meta'] = explode( ',', trim( strval( $settings['entry_meta'] ) ) );
			$settings['entry_meta'] = array_map( 'trim', $settings['entry_meta'] );

			if ( ! empty( $settings['tablet_hide_meta'] ) ) {
				if ( '-1' !== (string) $settings['tablet_hide_meta'] ) {
					$settings['tablet_hide_meta'] = explode( ',', trim( strval( $settings['tablet_hide_meta'] ) ) );
					$settings['tablet_hide_meta'] = array_map( 'trim', $settings['tablet_hide_meta'] );
					$tablet_meta                  = array_diff( $settings['entry_meta'], $settings['tablet_hide_meta'] );
					$settings['tablet_last']      = array_pop( $tablet_meta );
				} else {
					$settings['tablet_hide_meta'] = false;
				}
			}

			if ( ! empty( $settings['mobile_hide_meta'] ) ) {
				if ( '-1' !== (string) $settings['mobile_hide_meta'] ) {
					$settings['mobile_hide_meta'] = explode( ',', trim( strval( $settings['mobile_hide_meta'] ) ) );
					$settings['mobile_hide_meta'] = array_map( 'trim', $settings['mobile_hide_meta'] );
					$mobile_meta                  = array_diff( $settings['entry_meta'], $settings['tablet_hide_meta'] );
					$settings['mobile_last']      = array_pop( $mobile_meta );
				} else {
					$settings['mobile_hide_meta'] = false;
				}
			}
		}

		if ( ! empty( $settings['review'] ) && ( '-1' === (string) $settings['review'] ) ) {
			$settings['review'] = false;
		}

		if ( ! empty( $settings['bookmark'] ) && ( '-1' === (string) $settings['bookmark'] ) ) {
			$settings['bookmark'] = false;
		}

		if ( ! empty( $settings['counter'] ) && ( '-1' === (string) $settings['counter'] ) ) {
			$settings['counter'] = false;
		}
		if ( empty( $settings['readmore'] ) || '-1' === (string) $settings['readmore'] ) {
			$settings['readmore'] = false;
		} else {
			$settings['readmore'] = pixwell_get_readmore_label();
		}
		if ( ! empty( $settings['sponsor_meta'] ) && ( '-1' === (string) $settings['sponsor_meta'] ) ) {
			$settings['sponsor_meta'] = false;
		} elseif ( empty( $settings['sponsor_meta'] ) ) {
			$settings['sponsor_meta'] = 1;
		}
		if ( ! empty( $settings['center_mode'] ) && ( '-1' === (string) $settings['center_mode'] ) ) {
			$settings['center_mode'] = false;
		}
		if ( ! empty( $settings['slider'] ) && '-1' === (string) $settings['slider'] ) {
			$settings['slider'] = false;
		}
		if ( ! empty( $settings['carousel'] ) && '-1' === (string) $settings['carousel'] ) {
			$settings['carousel'] = false;
		}
		if ( ! empty( $settings['carousel_dot'] ) && '-1' === (string) $settings['carousel_dot'] ) {
			$settings['carousel_dot'] = false;
		}
		if ( ! empty( $settings['carousel_nav'] ) && '-1' === (string) $settings['carousel_nav'] ) {
			$settings['carousel_nav'] = false;
		}
		if ( empty( $settings['slider_play'] ) ) {
			$settings['slider_play'] = pixwell_get_option( 'slider_play' );
		} elseif ( '-1' === (string) $settings['slider_play'] ) {
			$settings['slider_play'] = false;
		}
		if ( empty( $settings['slider_speed'] ) ) {
			$settings['slider_speed'] = pixwell_get_option( 'slider_speed' );
		}
		if ( empty( $settings['slider_fmode'] ) ) {
			$settings['slider_fmode'] = pixwell_get_option( 'slider_fmode' );
		} elseif ( '-1' === (string) $settings['slider_fmode'] ) {
			$settings['slider_fmode'] = false;
		}

		/** disable carousel & sliders */
		if ( pixwell_is_amp() ) {
			$settings['carousel'] = false;
			$settings['slider']   = false;
		}

		return $settings;
	}
}

if ( ! function_exists( 'pixwell_get_readmore_label' ) ) {
	function pixwell_get_readmore_label() {

		$label = pixwell_get_option( 'readmore_label' );
		if ( empty( $label ) ) {
			return esc_html__( 'Read More', 'pixwell' );
		}

		return apply_filters( 'the_title_rss', $label, 10 );
	}
}

if ( ! function_exists( 'pixwell_block_inner_open_tag' ) ) {
	function pixwell_block_inner_open_tag( $settings = [] ) {

		$classes = 'content-inner';
		if ( ! empty( $settings['inner_classes'] ) ) {
			$classes .= ' ' . $settings['inner_classes'];
		}
		if ( ! empty( $settings['scroll_height'] ) ) {
			echo '<div class="scroll-holder">';
		}
		echo '<div class="' . esc_attr( $classes ) . '">';
	}
}

if ( ! function_exists( 'pixwell_block_inner_close_tag' ) ) {
	function pixwell_block_inner_close_tag( $settings = [] ) {

		echo '</div>';

		if ( ! empty( $settings['scroll_height'] ) ) {
			echo '</div>';
		}
	}
}

if ( ! function_exists( 'pixwell_carousel_attrs' ) ) {
	function pixwell_carousel_attrs( $settings = [] ) {

		$settings = wp_parse_args( $settings, [
			'columns'             => '3',
			'columns_tablet'      => '2',
			'columns_mobile'      => '1',
			'carousel_gap'        => '',
			'carousel_gap_tablet' => '',
			'carousel_gap_mobile' => '',
			'slider_play'         => '',
			'slider_fmode'        => '',
			'slider_centered'     => '',
		] );

		if ( (string) $settings['carousel_gap'] === '-1' ) {
			$settings['carousel_gap'] = 0;
		}
		if ( (string) $settings['carousel_gap_tablet'] === '-1' ) {
			$settings['carousel_gap_tablet'] = 0;
		}
		if ( (string) $settings['carousel_gap_mobile'] === '-1' ) {
			$settings['carousel_gap_mobile'] = 0;
		}
		if ( ! empty( $settings['carousel_columns'] ) ) {
			$settings['columns'] = $settings['carousel_columns'];
		}
		if ( ! empty( $settings['carousel_columns_tablet'] ) ) {
			$settings['columns_tablet'] = $settings['carousel_columns_tablet'];
		}
		if ( ! empty( $settings['carousel_columns_mobile'] ) ) {
			$settings['columns_mobile'] = $settings['carousel_columns_mobile'];
		}
		if ( empty( $settings['carousel_wide_columns'] ) ) {
			$settings['carousel_wide_columns'] = $settings['columns'];
		}
		if ( empty( $settings['slider_speed'] ) ) {
			$settings['slider_speed'] = 5000;
		}
		if ( empty( $settings['slider_centered'] ) || '-1' === (string) $settings['slider_centered'] ) {
			$settings['slider_centered'] = 0;
		} else {
			$settings['slider_centered'] = 1;
		}

		/** disable on editor */
		if ( is_admin() ) {
			$settings['slider_speed'] = 999999;
			$settings['slider_play']  = '';
		}

		echo ' data-wcol="' . esc_attr( $settings['carousel_wide_columns'] ) . '"';
		echo ' data-col="' . esc_attr( $settings['columns'] ) . '" data-tcol="' . esc_attr( $settings['columns_tablet'] ) . '" data-mcol="' . esc_attr( $settings['columns_mobile'] ) . '"';
		echo ' data-gap="' . esc_attr( $settings['carousel_gap'] ) . '" data-tgap="' . esc_attr( $settings['carousel_gap_tablet'] ) . '" data-mgap="' . esc_attr( $settings['carousel_gap_mobile'] ) . '"';
		echo ' data-play="' . esc_attr( $settings['slider_play'] ) . '" data-speed="' . esc_attr( $settings['slider_speed'] ) . '" data-fmode="' . esc_attr( $settings['slider_fmode'] ) . '" data-centered="' . esc_attr( $settings['slider_centered'] ) . '" ';
	}
}
