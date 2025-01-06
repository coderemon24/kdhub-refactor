<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_amp_rbc_frontend' ) ) {
	function pixwell_amp_rbc_frontend() {

		if ( ! defined( 'PIXWELL_THEME_VERSION' ) ) {
			return;
		}

		if ( pixwell_get_option( 'blog_breadcrumb_index' ) && ! is_front_page() ) {
			pixwell_breadcrumb();
		}

		$pixwell_settings     = pixwell_get_settings_blog( 'index' );
		$amp_featured_section = pixwell_get_option( 'amp_featured_section' );
		$amp_home_ppp         = pixwell_get_option( 'amp_home_ppp' );
		if ( ! empty( $amp_home_ppp ) ) {
			$pixwell_settings['posts_per_page'] = intval( $amp_home_ppp );
		}
		$pixwell_paged = 1;

		if ( ! empty( get_query_var( 'paged' ) ) ) {
			$pixwell_paged = get_query_var( 'paged' );
		}

		$query_data = pixwell_query( [
			'posts_per_page' => $pixwell_settings['posts_per_page'],
		], $pixwell_paged );
		?>
		<div class="site-content">
			<?php if ( have_posts() ) :
				if ( ! empty( $amp_featured_section ) ) {
					$pixwell_settings['featured_section'] = 1;
					echo '<div class="amp-featured-outer rbc-container rb-p20-gutter">';
					pixwell_amp_featured_section( $query_data );
					echo '</div>';
				}

				$query_data->rewind_posts();
				pixwell_amp_render_blog( $pixwell_settings, $query_data );
			else :
				pixwell_render_section_empty_content();
			endif; ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pixwell_amp_single' ) ) {
	function pixwell_amp_single() {

		$format                        = pixwell_get_post_format();
		$amp_disable_author            = pixwell_get_option( 'amp_disable_author' );
		$amp_disable_single_pagination = pixwell_get_option( 'amp_disable_single_pagination' );
		?>
		<div class="site-content single-wrap single-4 clearfix none-sidebar">
		<div class="wrap rbc-container rb-p20-gutter clearfix">
			<main id="main" class="site-main single-inner">
				<article id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?>>
					<header class="single-header entry-header">
						<div class="header-centred">
							<?php
							pixwell_breadcrumb();
							pixwell_single_cat_info();
							pixwell_single_title();
							pixwell_single_sponsor();
							pixwell_single_tagline();
							pixwell_single_entry_meta();
							?>
						</div>
						<?php
						switch ( $format ) {
							case 'video' :
								pixwell_single_featured_video();
								break;
							case 'audio' :
								pixwell_single_featured_audio();
								break;
							default:
								pixwell_single_featured_image( 'pixwell_780x0' );
								break;
						} ?>
					</header>
					<?php pixwell_single_entry(); ?>
				</article>
				<div class="single-box clearfix">
					<?php
					if ( empty( $amp_disable_author ) ) {
						pixwell_render_author_box();
					}
					if ( empty( $amp_disable_single_pagination ) ) {
						pixwell_single_navigation();
					}
					pixwell_amp_single_comment();
					?>
				</div>
			</main>
		</div>
		<?php pixwell_amp_single_related(); ?>
		</div><?php
	}
}

if ( ! function_exists( 'pixwell_amp_render_off_canvas' ) ) :
	function pixwell_amp_render_off_canvas() {

		$header       = pixwell_get_option( 'off_canvas_header' );
		$style        = pixwell_get_option( 'off_canvas_style' );
		$social       = pixwell_get_option( 'off_canvas_social' );
		$subscribe    = pixwell_get_option( 'off_canvas_subscribe' );
		$logo         = pixwell_get_option( 'off_canvas_header_logo' );
		$header_style = pixwell_get_option( 'off_canvas_header_style' );

		$class_name        = 'amp-canvas-wrap dark-style';
		$header_class_name = 'off-canvas-header is-light-text';
		$inner_class_name  = 'off-canvas-inner is-light-text';

		if ( ! empty( $style ) && 'light' == $style ) {
			$class_name       = 'amp-canvas-wrap light-style';
			$inner_class_name = 'off-canvas-inner is-dark-text';
		}

		if ( has_nav_menu( 'pixwell_menu_offcanvas' ) ) {
			$aside_menu = 'pixwell_menu_offcanvas';
		} else {
			$aside_menu = 'pixwell_menu_main';
		}

		if ( ! empty( $header_style ) && $header_style == 'dark' ) {
			$header_class_name = 'off-canvas-header is-dark-text';
		} ?>
		<amp-sidebar id="amp-menu-section" class="<?php echo esc_attr( $class_name ); ?>" layout="nodisplay" side="left">
			<div class="close-panel-wrap">
				<div id="off-canvas-close-btn" on="tap:amp-menu-section.close" title="<?php esc_html_e( 'Close Panel', 'pixwell' ); ?>">
					<i class="btn-close"></i></div>
			</div>
			<div class="off-canvas-holder">
				<?php if ( ! empty( $header ) ) : ?>
					<div class="<?php echo esc_attr( $header_class_name ); ?>">
						<div class="header-inner">
							<?php if ( ! empty( $logo['url'] ) ): ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="off-canvas-logo">
									<img src="<?php echo esc_url( $logo['url'] ) ?>" alt="<?php bloginfo( 'name' ); ?>" height="<?php echo esc_attr( $logo['height'] ); ?>" width="<?php echo esc_attr( $logo['width'] ); ?>">
								</a>
							<?php endif;
							if ( ! empty( $subscribe ) ) :
								$subscribe_url = pixwell_get_option( 'off_canvas_subscribe_url' );
								$subscribe_text = pixwell_get_option( 'off_canvas_subscribe_text' ); ?>
								<div class="off-canvas-subscribe btn-wrap">
									<a href="<?php echo esc_url( $subscribe_url ); ?>" rel="noopener nofollow" class="subscribe-link" aria-label="<?php echo esc_attr( $subscribe_text ); ?>"><i class="rbi rbi-paperplane" aria-hidden="true"></i><span><?php echo esc_html( $subscribe_text ); ?></span></a>
								</div>
							<?php endif; ?>
							<aside class="inner-bottom">
								<?php if ( ! empty( $social ) ) : ?>
									<div class="off-canvas-social">
										<?php echo pixwell_render_social_icons( pixwell_get_web_socials(), true ); ?>
									</div>
								<?php endif; ?>
							</aside>
						</div>
					</div>
				<?php else: ?>
					<div class="off-canvas-tops"></div>
				<?php endif; ?>
				<div class="<?php echo esc_attr( $inner_class_name ); ?>">
					<nav id="off-canvas-nav" class="off-canvas-nav">
						<?php wp_nav_menu( [
							'menu_id'        => 'amp-menu',
							'theme_location' => $aside_menu,
							'container'      => false,
							'menu_class'     => 'amp-menu off-canvas-menu',
							'echo'           => true,
							'depth'          => 4,
						] ); ?>
					</nav>
				</div>
			</div>
		</amp-sidebar>
		<?php
	}
endif;

/** amp related */
if ( ! function_exists( 'pixwell_amp_single_related' ) ) {
	function pixwell_amp_single_related() {

		$amp_disable_related = pixwell_get_option( 'amp_disable_related' );
		if ( ! empty( $amp_disable_related ) ) {
			return false;
		}

		$box_related = pixwell_get_option( 'single_post_related' );
		if ( empty( $box_related ) ) {
			return false;
		}

		$post_id  = get_the_ID();
		$settings = [];

		$settings['posts_per_page']  = 4;
		$settings['title']           = apply_filters( 'the_title', pixwell_get_option( 'single_post_related_title' ), 12 );
		$settings['layout']          = 'amp_grid';
		$settings['post_not_in']     = $post_id;
		$settings['uuid']            = 'single-related-' . $settings['post_not_in'];
		$settings['name']            = 'fw_related';
		$settings['columns']         = true;
		$settings['classes']         = 'single-post-related layout-' . esc_attr( $settings['layout'] );
		$settings['content_classes'] = 'rb-n15-gutter';

		$query_data = pixwell_query_related( $settings );
		if ( ! method_exists( $query_data, 'have_posts' ) || ! $query_data->have_posts() ) {
			return false;
		} ?>
		<aside id="amp-related" class="single-related-outer">
			<div class="rbc-container rb-p20-gutter">
				<?php
				pixwell_block_open( $settings, $query_data );
				pixwell_block_header( $settings );
				pixwell_block_content_open( $settings );
				pixwell_amp_listing_grid_2( $settings, $query_data );
				pixwell_block_content_close();
				pixwell_render_pagination( $settings, $query_data );
				pixwell_block_close();
				wp_reset_postdata(); ?>
			</div>
		</aside>
		<?php
	}
}

/** render site footer */
if ( ! function_exists( 'pixwell_amp_render_footer' ) ):
	function pixwell_amp_render_footer() {

		$footer_bg  = pixwell_get_option( 'footer_background' );
		$text       = pixwell_get_option( 'footer_text_style' );
		$class_name = 'footer-wrap';

		if ( ! empty( $text ) && 'light' == $text ) {
			$class_name .= ' ' . 'is-light-text';
		}

		if ( ! empty( $footer_bg['background-color'] ) || ! empty( $footer_bg['background-attachment'] ) ) {
			$class_name .= ' ' . 'is-bg';
		} ?>
		<footer class="<?php echo esc_attr( $class_name ); ?>">
			<?php
			pixwell_amp_footer_logo_section();
			get_template_part( 'templates/footer/module', 'copyright' );
			?>
		</footer>
		<?php
	}
endif;

/** render amp comment */
if ( ! function_exists( 'pixwell_amp_single_comment' ) ) {
	function pixwell_amp_single_comment() {

		if ( post_password_required() || ! comments_open() ) {
			return false;
		}

		$amp_disable_comment = pixwell_get_option( 'amp_disable_comment' );
		if ( ! empty( $amp_disable_comment ) ) {
			return false;
		}

		$comment_number = get_comments_number();
		$classes        = 'comment-box-content clearfix';
		if ( $comment_number > 1 ) {
			$text = sprintf( pixwell_translate( 'comments' ), esc_attr( $comment_number ) );
		} elseif ( 1 == $comment_number ) {
			$text = pixwell_translate( 'comment' );
		} else {
			$text    = pixwell_translate( 'leave_a_reply' );
			$classes .= ' no-comment';
		} ?>
		<aside class="comment-box-wrap">
			<div class="comment-box-header clearfix">
				<h4 class="h3"><i class="rbi rbi-comments" aria-hidden="true"></i><?php echo esc_html( $text ); ?></h4>
				<?php if ( ! empty( $button ) )  : ?>
					<a href="#" class="show-post-comment box-comment-btn h6"><?php echo pixwell_translate( 'view_comment' ); ?></a>
				<?php endif; ?>
			</div>
			<div class="<?php echo esc_attr( $classes ); ?>"><?php comments_template(); ?></div>
		</aside>
		<?php
	}
}

if ( ! function_exists( 'pixwell_amp_render_blog' ) ) {
	function pixwell_amp_render_blog( $settings, $query_data = null ) {

		if ( empty( $query_data ) ) {
			global $wp_query;
			$query_data = $wp_query;
		}
		$counter = 1;
		$classes = [ 'page-content archive-content rbc-fw-section clearfix' ];
		if ( ! empty( $settings['classname'] ) ) {
			$classes[] = esc_attr( $settings['classes'] );
		}
		$classes = join( ' ', $classes ); ?>
		<div class="<?php echo esc_attr( $classes ); ?>">
			<div class="wrap rbc-wrap rbc-container rb-p20-gutter">
				<div class="site-main rbc-content">
					<div class="content-wrap">
						<?php if ( ! empty( $settings['title'] ) ) : ?>
							<div class="block-header">
								<h2 class="block-title h3"><?php echo esc_html( $settings['title'] ); ?></h2>
							</div>
						<?php endif; ?>
						<div class="content-inner rb-row rb-n20-gutter">
							<?php while ( $query_data->have_posts() ) :
								$query_data->the_post();

								if ( ! empty( $settings['featured_section'] ) && $counter <= 3 ) {
									$counter ++;
									continue;
								}

								echo '<div class="p-outer rb-p20-gutter rb-col-m12 rb-col-d6">';
								pixwell_amp_post_list_2( $settings );
								echo '</div>';
							endwhile;
							wp_reset_postdata(); ?>
						</div>
					</div>
					<?php pixwell_render_pagination( $settings, $query_data ); ?>
				</div>
			</div>
		</div>
		<?php
	}
}

/** amp render ad */
if ( ! function_exists( 'pixwell_amp_render_ad' ) ) {
	function pixwell_amp_render_ad( $settings ) {

		if ( empty( $settings['type'] ) || ! pixwell_is_amp() ) {
			return;
		}

		if ( empty( $settings['classname'] ) ) {
			$settings['classname'] = 'amp-ad';
		}

		if ( 1 == $settings['type'] ) {
			if ( ! empty( $settings['client'] ) && ! empty ( $settings['slot'] ) ) {
				echo '<div class="' . esc_attr( $settings['classname'] ) . '"><amp-ad ';
				if ( empty( $settings['size'] ) || 1 == $settings['size'] ) {
					echo 'layout="responsive" width="300" height="250"';
				} else {
					echo 'layout="fixed-height" height="90"';
				}
				echo ' type="adsense" data-ad-format="auto" data-ad-client="ca-pub-' . $settings['client'] . '"  data-ad-slot="' . $settings['slot'] . '">';
				echo '</amp-ad></div>';
			}
		} else {
			if ( ! empty( $settings['custom'] ) ) {
				echo '<div class="' . esc_attr( $settings['classname'] ) . '">' . html_entity_decode( $settings['custom'] ) . '</div>';
			}
		}
	}
}

if ( ! function_exists( 'pixwell_amp_render_header_ad' ) ) {
	function pixwell_amp_render_header_ad() {

		pixwell_amp_render_ad( [
			'type'      => pixwell_get_option( 'amp_header_ad_type' ),
			'client'    => pixwell_get_option( 'amp_header_adsense_client' ),
			'slot'      => pixwell_get_option( 'amp_header_adsense_slot' ),
			'size'      => pixwell_get_option( 'amp_header_adsense_size' ),
			'custom'    => pixwell_get_option( 'amp_header_ad_code' ),
			'classname' => 'header-amp-ad amp-ad-wrap',
		] );
	}
}

if ( ! function_exists( 'pixwell_amp_render_footer_ad' ) ) {
	function pixwell_amp_render_footer_ad() {

		pixwell_amp_render_ad( [
			'type'      => pixwell_get_option( 'amp_footer_ad_type' ),
			'client'    => pixwell_get_option( 'amp_footer_adsense_client' ),
			'slot'      => pixwell_get_option( 'amp_footer_adsense_slot' ),
			'size'      => pixwell_get_option( 'amp_footer_adsense_size' ),
			'custom'    => pixwell_get_option( 'amp_footer_ad_code' ),
			'classname' => 'footer-amp-ad amp-ad-wrap',
		] );
	}
}

if ( ! function_exists( 'pixwell_amp_render_top_single_ad' ) ) {
	function pixwell_amp_render_top_single_ad() {

		pixwell_amp_render_ad( [
			'type'      => pixwell_get_option( 'amp_top_single_ad_type' ),
			'client'    => pixwell_get_option( 'amp_top_single_adsense_client' ),
			'slot'      => pixwell_get_option( 'amp_top_single_adsense_slot' ),
			'size'      => pixwell_get_option( 'amp_top_single_adsense_size' ),
			'custom'    => pixwell_get_option( 'amp_top_single_ad_code' ),
			'classname' => 'top-single-amp-ad amp-ad-wrap',
		] );
	}
}

if ( ! function_exists( 'pixwell_amp_render_bottom_single_ad' ) ) {
	function pixwell_amp_render_bottom_single_ad() {

		pixwell_amp_render_ad( [
			'type'      => pixwell_get_option( 'amp_bottom_single_ad_type' ),
			'client'    => pixwell_get_option( 'amp_bottom_single_adsense_client' ),
			'slot'      => pixwell_get_option( 'amp_bottom_single_adsense_slot' ),
			'size'      => pixwell_get_option( 'amp_bottom_single_adsense_size' ),
			'custom'    => pixwell_get_option( 'amp_bottom_single_ad_code' ),
			'classname' => 'bottom-single-amp-ad amp-ad-wrap',
		] );
	}
}

if ( ! function_exists( 'pixwell_amp_render_inline_single_ad' ) ) {
	function pixwell_amp_render_inline_single_ad() {

		ob_start();
		pixwell_amp_render_ad( [
			'type'      => pixwell_get_option( 'amp_inline_single_ad_type' ),
			'client'    => pixwell_get_option( 'amp_inline_single_adsense_client' ),
			'slot'      => pixwell_get_option( 'amp_inline_single_adsense_slot' ),
			'size'      => pixwell_get_option( 'amp_inline_single_adsense_size' ),
			'custom'    => pixwell_get_option( 'amp_inline_single_ad_code' ),
			'classname' => 'inline-single-amp-ad amp-ad-wrap',
		] );

		return ob_get_clean();
	}
}

if ( ! function_exists( 'pixwell_amp_add_inline_ad' ) ) {
	function pixwell_amp_add_inline_ad( $content ) {

		$ad_pos = pixwell_get_option( 'amp_inline_single_ad_pos' );
		if ( empty( $ad_pos ) || ! pixwell_is_amp() ) {
			return $content;
		}

		$ad_pos = explode( ',', $ad_pos );

		$ad_html = pixwell_amp_render_inline_single_ad();

		if ( ! empty( $ad_html ) ) {

			$tag     = '</p>';
			$content = explode( $tag, $content );

			foreach ( $content as $index => $paragraph ) {
				if ( trim( $paragraph ) ) {
					$content[ $index ] .= $tag;
				}
				if ( in_array( $index + 1, $ad_pos ) ) {
					$content[ $index ] .= $ad_html;
				}
			}

			$content = implode( '', $content );
		}

		return $content;
	}
}

if ( ! function_exists( 'pixwell_amp_footer_logo_section' ) ) {
	function pixwell_amp_footer_logo_section() {

		$logo = pixwell_get_option( 'amp_footer_logo' );
		if ( empty( $logo['url'] ) ) {
			$logo = pixwell_get_option( 'footer_logo' );
		}
		$menu         = pixwell_get_option( 'amp_footer_menu' );
		$footer_link  = pixwell_get_option( 'footer_logo_url' );
		$social_color = pixwell_get_option( 'footer_social_color' );

		if ( pixwell_get_option( 'footer_social' ) ) {
			$social_render = pixwell_render_social_icons( pixwell_get_web_socials() );
		}
		if ( empty( $footer_link ) ) {
			$footer_link = home_url( '/' );
		}
		if ( empty( $logo['url'] ) && ( empty( $menu ) || ! has_nav_menu( 'pixwell_menu_footer' ) ) && empty( $social_render ) ) {
			return false;
		}

		if ( ! empty( $logo['alt'] ) ) {
			$logo_alt = $logo['alt'];
		} else {
			$logo_alt = get_bloginfo( 'name' );
		} ?>
		<div class="footer-logo footer-section">
			<div class="rbc-container footer-logo-inner rb-p20-gutter">
				<?php if ( ! empty( $logo['url'] ) ): ?>
					<div class="footer-logo-wrap">
						<a href="<?php echo esc_url( $footer_link ); ?>" class="footer-logo amp-footer-logo">
							<img height="<?php echo esc_attr( $logo['height'] ); ?>" width="<?php echo esc_attr( $logo['width'] ); ?>" src="<?php echo esc_url( $logo['url'] ) ?>" alt="<?php echo esc_attr( $logo_alt ); ?>">
						</a>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $social_render ) ) {
					$social_classes = 'footer-social-wrap';
					if ( ! empty( $social_color ) ) {
						$social_classes .= ' is-color';
					}
					echo '<div class="' . $social_classes . '"><div class="footer-social social-icons is-bg-icon tooltips-s">' . $social_render . '</div></div>';
				}

				if ( ! empty( $menu ) ) {
					wp_nav_menu( [
						'menu'       => $menu,
						'menu_id'    => 'footer-menu',
						'container'  => false,
						'menu_class' => 'footer-menu-inner',
						'depth'      => 1,
						'echo'       => true,
					] );
				} ?>
			</div>
		</div>
	<?php }
}

if ( ! function_exists( 'pixwell_amp_toggle' ) ) {
	function pixwell_amp_toggle() {

		$class_name = 'off-canvas-trigger btn-toggle-wrap';
		switch ( pixwell_get_option( 'offcanvas_toggle_bold', 0 ) ) {
			case '1' :
				$class_name .= ' btn-toggle-bold';
				break;
			case '2' :
				$class_name .= ' btn-toggle-stack';
				break;
			default:
				$class_name .= ' btn-toggle-light';
		}
		?>
		<div on="tap:amp-menu-section.toggle" tabindex="0" class="<?php echo esc_attr( $class_name ); ?>">
			<span class="btn-toggle"><span class="off-canvas-toggle"><span class="icon-toggle"></span></span></span>
		</div>
		<?php
	}
}
