<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

add_action( 'init', 'pixwell_remove_plugin_hooks' );
add_action( 'pre_get_posts', 'pixwell_blog_posts_per_page' );
add_action( 'pre_get_posts', 'pixwell_filter_search' );
add_action( 'wp_head', 'pixwell_bookmarklet_icon', 1 );
add_action( 'wp_head', 'pixwell_pingback_header', 5 );
add_action( 'wp_footer', 'rb_render_cookie_popup' );
add_action( 'wp_footer', 'pixwell_load_svg_icons', 99 );
add_filter( 'pvc_post_views_html', 'pixwell_post_views_remove', 999 );
add_filter( 'rbc_default_sidebar', 'pixwell_set_sidebar' );
add_filter( 'bcn_pick_post_term', 'pixwell_pick_primary_cat', 10, 4 );
add_filter( 'pvc_enqueue_styles', '__return_false' );
add_filter( 'get_the_archive_title_prefix', 'pixwell_archive_title_prefix', 10 );
remove_filter( 'pre_term_description', 'wp_filter_kses' );
add_filter( 'rb_deal_feat_medium', 'pixwell_deal_feat_medium' );

if ( ! function_exists( 'pixwell_pingback_header' ) ) {
	function pixwell_pingback_header() {

		if ( is_singular() && pings_open() ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
		<?php endif;
	}
}

if ( ! function_exists( 'pixwell_bookmarklet_icon' ) ) {
	function pixwell_bookmarklet_icon() {

		$apple_icon = pixwell_get_option( 'icon_touch_apple' );
		$metro_icon = pixwell_get_option( 'icon_touch_metro' );

		if ( ! empty( $apple_icon['url'] ) ) : ?>
			<link rel="apple-touch-icon" href="<?php echo esc_url( $apple_icon['url'] ); ?>"/>
		<?php endif;

		if ( ! empty( $metro_icon['url'] ) ) : ?>
			<meta name="msapplication-TileColor" content="#ffffff">
			<meta name="msapplication-TileImage" content="<?php echo esc_url( $metro_icon['url'] ); ?>"/>
		<?php endif;
	}
}

if ( ! function_exists( 'pixwell_post_views_remove' ) ) {
	function pixwell_post_views_remove( $html ) {

		if ( is_single() ) {
			return false;
		} else {
			return $html;
		}
	}
}

if ( ! function_exists( 'pixwell_blog_posts_per_page' ) ) {
	function pixwell_blog_posts_per_page( $query ) {

		if ( is_admin() || ! $query->is_main_query() ) {
			return;
		}

		if ( $query->is_search() || $query->is_category() || $query->is_tag() || $query->is_author() || $query->is_archive() ) {
			$query->set( 'post_status', 'publish' );
		}
		if ( $query->is_home() ) {
			$blog_index_posts_per_page = pixwell_get_option( 'blog_posts_per_page_index' );
			if ( ! empty( $blog_index_posts_per_page ) ) {
				$query->set( 'posts_per_page', intval( $blog_index_posts_per_page ) );
			}
		} elseif ( $query->is_search() ) {
			$search_posts_per_page = pixwell_get_option( 'blog_posts_per_page_search' );
			if ( ! empty( $search_posts_per_page ) ) {
				$query->set( 'posts_per_page', intval( $search_posts_per_page ) );
			}
		} elseif ( $query->is_category() ) {

			$term_meta = rb_get_term_meta( 'pixwell_meta_categories', get_queried_object_id() );
			if ( ! empty( $term_meta['posts_per_page'] ) ) {
				$posts_per_page = $term_meta['posts_per_page'];
			} else {
				$posts_per_page = pixwell_get_option( 'blog_posts_per_page_cat' );
			}
			if ( ! empty( $posts_per_page ) ) {
				$query->set( 'posts_per_page', intval( $posts_per_page ) );
			}
		} elseif ( $query->is_author() ) {
			$author_posts_per_page = pixwell_get_option( 'blog_posts_per_page_author' );
			if ( ! empty( $author_posts_per_page ) ) {
				$query->set( 'posts_per_page', intval( $author_posts_per_page ) );
			}
		} elseif ( $query->is_archive() ) {

			if ( $query->is_post_type_archive( 'rb-portfolio' ) || $query->is_tax( 'portfolio-category' ) ) {
				$portfolio_posts_per_page = pixwell_get_option( 'portfolio_posts_per_page' );
				if ( ! empty( $portfolio_posts_per_page ) ) {
					$query->set( 'posts_per_page', intval( $portfolio_posts_per_page ) );
				}
			} else {
				$archive_posts_per_page = pixwell_get_option( 'blog_posts_per_page_archive' );
				if ( ! empty( $archive_posts_per_page ) ) {
					$query->set( 'posts_per_page', intval( $archive_posts_per_page ) );
				}
			}
		}
	}
}

/**
 * @return string
 * set default sidebar name
 */
if ( ! function_exists( 'pixwell_set_sidebar' ) ) {
	function pixwell_set_sidebar() {

		return 'pixwell_sidebar_default';
	}
}

/**
 * @return bool
 * remove search page
 */
if ( ! function_exists( 'pixwell_filter_search' ) ) {
	function pixwell_filter_search( $query ) {

		$allow_post = pixwell_get_option( 'search_post' );
		$allow_page = pixwell_get_option( 'search_page' );

		if ( ! empty( $allow_post ) && ! is_admin() && $query->is_search() && $query->is_main_query() ) {
			$query->set( 'post_type', 'post' );

			if ( $allow_page ) {
				$query->set( 'post_type', ['post', 'page'] );
			}
		}

		return $query;
	}
}

/** default deal thumbnails */
if ( ! function_exists( 'pixwell_deal_feat_medium' ) ) {
	function pixwell_deal_feat_medium( $size ) {

		return 'pixwell_280x210';
	}
}

/** render cookie popup */
if ( ! function_exists( 'rb_render_cookie_popup' ) ) :
	function rb_render_cookie_popup() {

		$popup = pixwell_get_option( 'cookie_popup' );

		if ( empty( $popup ) || pixwell_is_amp() ) {
			return;
		}

		$content = pixwell_get_option( 'cookie_popup_content' );
		$button  = pixwell_get_option( 'cookie_popup_button' ); ?>
		<aside id="rb-cookie" class="rb-cookie">
			<p class="cookie-content"><?php echo do_shortcode( $content ); ?></p>
			<div class="cookie-footer">
				<a id="cookie-accept" class="cookie-accept" href="#"><?php echo esc_html( $button ) ?></a>
			</div>
		</aside>
		<?php
	}
endif;

/** primary category */
if ( ! function_exists( 'pixwell_pick_primary_cat' ) ) {
	function pixwell_pick_primary_cat( $terms, $id, $type, $taxonomy ) {

		if ( 'post' == $type ) {
			$primary_category = rb_get_meta( 'primary_cat', $id );
			if ( empty( $primary_category ) ) {
				return $terms;
			};

			return get_term_by( 'id', $primary_category, $taxonomy );
		}

		return $terms;
	}
}

/** load reaction icons */
if ( ! function_exists( 'pixwell_load_svg_icons' ) ) {
	function pixwell_load_svg_icons() {

		if ( pixwell_is_amp() || ! is_singular( 'post' ) ) {
			return;
		}

		include_once PIXWELL_CORE_PATH . 'includes/icons.php';
	}
}

if ( ! function_exists( 'pixwell_remove_plugin_hooks' ) ) {
	function pixwell_remove_plugin_hooks() {

		global $multiple_authors_addon;
		if ( ! empty( $multiple_authors_addon ) ) {
			remove_filter( 'the_content', [ $multiple_authors_addon, 'filter_the_content' ] );
		}
	}
}

if ( ! function_exists( 'pixwell_archive_title_prefix' ) ) {
	function pixwell_archive_title_prefix( $prefix ) {

		if ( pixwell_get_option( 'archive_no_prefix' ) ) {
			return false;
		}

		return $prefix;
	}
}