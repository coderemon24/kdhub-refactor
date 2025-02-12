<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_post_title' ) ) {
	function pixwell_post_title( $h_tag = 'h2', $bookmark = false, $classes = '' ) {

		$post_title = get_the_title();
		$classes    = apply_filters( 'Pixwell_entry_title_classes', $classes, get_the_ID() );
		echo '<' . esc_attr( $h_tag ) . ' class="' . trim( 'entry-title ' . esc_attr( $classes ) ) . '">'; ?>
		<a class="p-url" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php
			if ( ! empty( $post_title ) ) {
				the_title();
			} else {
				echo get_the_date();
			} ?></a>
		<?php if ( ! empty( $bookmark ) && function_exists( 'pixwell_bookmark' ) ) : pixwell_bookmark(); endif;
		echo '</' . esc_attr( $h_tag ) . '>';
	}
}

if ( ! function_exists( 'pixwell_post_readmore' ) ) {
	function pixwell_post_readmore( $settings = [] ) {

		if ( empty( $settings['readmore'] ) ) {
			return;
		}
		?>
		<a class="btn p-link" aria-label="<?php echo esc_attr( get_the_title() ); ?>" href="<?php echo get_permalink(); ?>"><?php echo esc_html( $settings['readmore'] ); ?>
			<i class="rbi rbi-arrow-right" aria-hidden="true"></i></a>
		<?php
	}
}

if ( ! function_exists( 'pixwell_entry_divider' ) ) {
	function pixwell_entry_divider( $settings = [] ) {

		if ( empty( $settings['divider_style'] ) ) {
			$settings['divider_style'] = 'solid';
		}
		echo '<div class="p-divider is-divider-' . esc_attr( $settings['divider_style'] ) . '"></div>';
	}
}

if ( ! function_exists( 'pixwell_render_format_icon' ) ) {
	function pixwell_render_format_icon() {

		switch ( get_post_format() ) {
			case 'video' :
				$icon = pixwell_get_option( 'post_icon_video' );
				if ( empty( $icon ) ) {
					return;
				}
				echo '<aside class="p-format format-video"><i class="rbi rbi-play-button"></i></aside>';
				break;
			case 'gallery' :
				$icon = pixwell_get_option( 'post_icon_gallery' );
				if ( empty( $icon ) ) {
					return;
				}
				echo '<aside class="p-format format-gallery"><i class="rbi rbi-gallery-light"></i></aside>';
				break;
			case 'audio' :
				$icon = pixwell_get_option( 'post_icon_audio' );
				if ( empty( $icon ) ) {
					return;
				}
				echo '<aside class="p-format format-radio"><i class="rbi rbi-vinyl"></i></aside>';
				break;
		}
	}
}

if ( ! function_exists( 'pixwell_post_summary' ) ) :
	function pixwell_post_summary( $settings = [] ) {

		if ( ! empty( $settings['summary'] ) && 'moretag' == $settings['summary'] ) : ?>
			<p class="entry-content clearfix"><?php the_content( '' ); ?></p>
		<?php
		else :
			if ( ! empty( $settings['excerpt'] ) && '-1' == $settings['excerpt'] ) {
				return;
			}
			if ( ! empty( $settings['summary'] ) && 'tagline' == $settings['summary'] ) :
				pixwell_post_tagline( $settings );
			else :
				$last_dot = false;
				$text = get_post_field( 'post_excerpt', get_the_ID() );

				if ( ! empty( $text ) && ! empty( $settings['excerpt'] ) ) {
					$text     = wp_trim_words( $text, intval( $settings['excerpt'] ), '' );
					$last_dot = true;
				}
				if ( empty( $text ) && ! empty( $settings['excerpt'] ) ) {
					$text = get_the_content( '' );
					$text = strip_shortcodes( $text );
					$text = excerpt_remove_blocks( $text );
					$text = apply_filters( 'the_content', $text );
					$text = str_replace( ']]>', ']]&gt;', $text );

					$text     = wp_trim_words( $text, intval( $settings['excerpt'] ), '' );
					$text     = wp_strip_all_tags( trim( $text ) );
					$last_dot = true;
				}
				if ( empty( $text ) ) {
					return;
				}

				$classes = 'entry-summary';
				if ( ! empty( $settings['hide_excerpt'] ) ) {
					switch ( $settings['hide_excerpt'] ) {
						case 'mobile' :
							$classes .= ' mobile-hide';
							break;
						case 'tablet' :
							$classes .= ' tablet-hide';
							break;
						case 'all' :
							$classes .= ' mobile-hide tablet-hide';
							break;
					}
				} ?>
				<p class="<?php echo esc_attr( $classes ); ?>"><?php echo esc_html( $text );
					if ( $last_dot == true ): ?>
						<span class="summary-dot"><?php esc_html_e( '...', 'pixwell' ) ?></span><?php endif; ?></p>
			<?php endif;
		endif;
	}
endif;

if ( ! function_exists( 'pixwell_entry_excerpt' ) ) {
	function pixwell_entry_excerpt( $settings = [] ) {

		$classes = 'entry-summary';
		if ( ! empty( $settings['hide_excerpt'] ) ) {
			switch ( $settings['hide_excerpt'] ) {
				case 'mobile' :
					$classes .= ' mobile-hide';
					break;
				case 'tablet' :
					$classes .= ' tablet-hide';
					break;
				case 'all' :
					$classes .= ' mobile-hide tablet-hide';
					break;
			}
		}

		if ( ! empty( $settings['excerpt_source'] ) && 'moretag' === $settings['excerpt_source'] ) :
			$classes .= ' entry-content clearfix'; ?>
			<p class="<?php echo esc_attr( $classes ); ?>"><?php the_content( '' ); ?></p>
		<?php else :
			if ( empty( $settings['excerpt_length'] ) || 0 > $settings['excerpt_length'] ) {
				return false;
			}
			if ( ! empty( $settings['excerpt_source'] ) && 'tagline' === $settings['excerpt_source'] && rb_get_meta( 'title_tagline' ) ) :
				$tagline = wp_trim_words( rb_get_meta( 'title_tagline' ), intval( $settings['excerpt_length'] ), '<span class="summary-dot">&hellip;</span>' ); ?>
				<p class="<?php echo esc_attr( $classes ); ?>"><?php pixwell_render_inline_html( $tagline ); ?></p>
			<?php else :
				$excerpt = get_post_field( 'post_excerpt', get_the_ID() );
				if ( ! empty( $excerpt ) ) {
					$output = wp_trim_words( $excerpt, intval( $settings['excerpt_length'] ), '<span class="summary-dot">&hellip;</span>' );
				}
				if ( empty( $output ) ) {
					if ( 'page' === get_post_type() && get_post_meta( get_the_ID(), '_elementor_data', true ) ) {
						return false;
					}
					$output = get_the_content( '' );
					$output = strip_shortcodes( $output );
					$output = excerpt_remove_blocks( $output );
					$output = preg_replace( "~(?:\[/?)[^/\]]+/?\]~s", '', $output );
					$output = str_replace( ']]>', ']]&gt;', $output );
					$output = wp_strip_all_tags( $output );
					$output = wp_trim_words( $output, intval( $settings['excerpt_length'] ), '<span class="summary-dot">&hellip;</span>' );
				}
				if ( empty( $output ) ) {
					return false;
				}
				?><p class="<?php echo esc_attr( $classes ); ?>"><?php pixwell_render_inline_html( $output ); ?></p>
			<?php endif;
		endif;
	}
}

if ( ! function_exists( 'pixwell_post_tagline' ) ) :
	function pixwell_post_tagline( $settings ) {

		$tagline = rb_get_meta( 'title_tagline' );
		if ( ! empty( $tagline ) ) :
			if ( ! empty( $settings['excerpt'] ) ) : $tagline = wp_trim_words( $tagline, intval( $settings['excerpt'] ), '' ); ?>
				<p class="entry-summary"><?php pixwell_render_inline_html( $tagline ); ?>
					<span class="summary-dot"><?php esc_html_e( '...', 'pixwell' ) ?></span></p>
			<?php else : ?>
				<p class="entry-summary"><?php pixwell_render_inline_html( $tagline ); ?></p>
			<?php endif;
		endif;
	}
endif;

/**
 * @param array $override
 * meta info
 */
if ( ! function_exists( 'pixwell_post_meta_info' ) ) {
	function pixwell_post_meta_info( $settings = [] ) {

		/** check advert post */
		$sponsor = pixwell_is_sponsor_post();
		if ( $sponsor ) {
			return pixwell_post_meta_sponsor();
		}
		if ( ! empty( $settings['entry_meta']['enabled'] ) && is_array( $settings['entry_meta']['enabled'] ) ) :

			/** check shop post */
			$shop_post = pixwell_is_shop_post();
			if ( $shop_post ) {
				return pixwell_post_meta_shop_post();
			}

			$post_id = get_the_ID();
			ob_start();
			foreach ( $settings['entry_meta']['enabled'] as $key => $val ) {
				switch ( $key ) {
					case 'date' :
						pixwell_post_meta_date( $post_id );
						break;
					case 'author' :
						pixwell_post_meta_author( $post_id );
						break;
					case 'cat' :
						pixwell_post_meta_cat();
						break;
					case 'tag' :
						pixwell_post_meta_tag( $post_id );
						break;
					case 'comment' :
						pixwell_post_meta_comment();
						break;
					case 'view' :
						pixwell_post_meta_view( $post_id );
						break;
					case 'update' :
						pixwell_post_meta_update( $post_id );
						break;
					case 'read' :
						pixwell_post_meta_read( $post_id );
						break;
					case 'custom' :
						pixwell_post_meta_custom( $post_id );
						break;
				};
			}

			if ( ! empty( $settings['bookmark'] ) && function_exists( 'pixwell_bookmark' ) && ! pixwell_is_amp() ) :
				echo '<span class="meta-info-el mobile-bookmark">';
				pixwell_bookmark();
				echo '</span>';
			endif;

			$meta_html = ob_get_clean();

			if ( ! empty( $meta_html ) ) {
				return '<aside class="p-meta-info">' . $meta_html . '</aside>';
			} else {
				return false;
			}

		endif;

		return false;
	}
}

if ( ! function_exists( 'pixwell_post_flex_meta_info' ) ) {
	function pixwell_post_flex_meta_info( $settings = [] ) {

		/** check advert post */
		$sponsor = pixwell_is_sponsor_post();
		if ( $sponsor ) {
			return pixwell_post_meta_sponsor();
		}
		if ( ! empty( $settings['entry_meta'] ) && is_array( $settings['entry_meta'] ) ) :

			/** check shop post */
			$shop_post = pixwell_is_shop_post();
			if ( $shop_post ) {
				return pixwell_post_meta_shop_post();
			}

			$post_id = get_the_ID();
			ob_start();
			foreach ( $settings['entry_meta'] as $key ) {
				switch ( $key ) {
					case 'date' :
						pixwell_post_meta_date( $post_id );
						break;
					case 'author' :
						pixwell_post_meta_author( $post_id );
						break;
					case 'cat' :
						pixwell_post_meta_cat();
						break;
					case 'tag' :
						pixwell_post_meta_tag( $post_id );
						break;
					case 'comment' :
						pixwell_post_meta_comment();
						break;
					case 'view' :
						pixwell_post_meta_view( $post_id );
						break;
					case 'update' :
						pixwell_post_meta_update( $post_id );
						break;
					case 'read' :
						pixwell_post_meta_read( $post_id );
						break;
					case 'custom' :
						pixwell_post_meta_custom( $post_id );
						break;
				}
			}

			if ( ! empty( $settings['bookmark'] ) && function_exists( 'pixwell_bookmark' ) && ! pixwell_is_amp() ) :
				echo '<span class="meta-info-el mobile-bookmark">';
				pixwell_bookmark();
				echo '</span>';
			endif;

			$meta_html = ob_get_clean();

			if ( ! empty( $meta_html ) ) {
				return '<aside class="p-meta-info">' . $meta_html . '</aside>';
			} else {
				return false;
			}

		endif;

		return false;
	}
}

/**
 * meta info date
 */
if ( ! function_exists( 'pixwell_post_meta_date' ) ) {
	function pixwell_post_meta_date( $post_id = '' ) {

		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}

		$human_time = pixwell_get_option( 'human_time' );
		if ( ! empty( $human_time ) ) {
			$timestamp = get_post_timestamp();
		}
		$meta_date_icon = pixwell_get_option( 'meta_date_icon' ); ?>
		<span class="meta-info-el meta-info-date">
			<?php if ( ! empty( $meta_date_icon ) ) : ?><i class="rbi rbi-clock"></i><?php endif; ?>
			<?php if ( ! empty( $timestamp ) ) : ?>
				<abbr class="date published" title="<?php echo get_the_date( DATE_W3C, $post_id ); ?>"><?php echo sprintf( pixwell_translate( 'ago' ), human_time_diff( $timestamp ) ); ?></abbr>
			<?php else : ?>
				<abbr class="date published" title="<?php echo get_the_date( DATE_W3C, $post_id ); ?>"><?php echo get_the_date( '', get_the_ID() ); ?></abbr>
			<?php endif; ?>
		</span>
		<?php
	}
}

/**
 * updated date
 */
if ( ! function_exists( 'pixwell_post_meta_update' ) ) {
	function pixwell_post_meta_update( $post_id = '' ) {

		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}

		$human_time = pixwell_get_option( 'human_time' );

		if ( ! empty( $human_time ) ) {
			$timestamp = get_post_timestamp( null, 'modified' );
		}
		$meta_date_icon = pixwell_get_option( 'meta_date_icon' ); ?>
		<span class="meta-info-el meta-info-update">
			<?php if ( ! empty( $meta_date_icon ) ) : ?><i class="rbi rbi-clock"></i><?php endif; ?>
			<?php if ( ! empty( $timestamp ) ) : ?>
				<time class="date date-updated" title="<?php echo get_the_modified_date( DATE_W3C, $post_id ); ?>"><?php echo sprintf( pixwell_translate( 'ago' ), human_time_diff( $timestamp, current_time( 'timestamp' ) ) ); ?></time>
			<?php else : ?>
				<time class="date date-updated" title="<?php echo get_the_modified_date( DATE_W3C, $post_id ); ?>"><?php
					if ( is_singular( 'post' ) ) {
						echo pixwell_translate( 'updated' ) . ' ' . get_the_modified_date( '', $post_id );
					} else {
						echo get_the_modified_date( '', $post_id );
					}
					?></time>
			<?php endif; ?>
		</span>
		<?php
	}
}

/** get meta read */
if ( ! function_exists( 'pixwell_post_meta_read' ) ) {
	function pixwell_post_meta_read( $post_id = '' ) {

		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}

		$total_word = get_post_meta( $post_id, 'pixwell_total_word', true );
		$read_speed = intval( pixwell_get_option( 'read_speed' ) );
		$meta_icon  = pixwell_get_option( 'meta_read_icon' );

		if ( empty( $total_word ) && function_exists( 'pixwell_add_total_word' ) ) {
			$total_word = pixwell_add_total_word( $post_id );
		}

		if ( empty( $read_speed ) ) {
			$read_speed = 130;
		}

		$minutes = floor( $total_word / $read_speed );
		$second  = floor( ( $total_word / $read_speed ) * 60 ) % 60;
		if ( $second > 30 ) {
			$minutes ++;
		} ?>
		<span class="meta-info-el meta-info-read">
			<?php if ( ! empty( $meta_icon ) ) : ?><i class="rbi rbi-fish-eye"></i><?php endif; ?>
			<?php echo sprintf( pixwell_translate( 'read' ), $minutes ); ?>
		</span>
		<?php
	}
}

/**
 * meta info author
 */
if ( ! function_exists( 'pixwell_post_meta_author' ) ) {
	function pixwell_post_meta_author( $post_id = '' ) {

		if ( empty( $post_id ) ) {
			$author_id = get_post_field( 'post_author', get_the_ID() );
		} else {
			$author_id = get_post_field( 'post_author', $post_id );
		}

		/** multiple authors supported */
		if ( function_exists( 'get_multiple_authors' ) ) {
			$author_data = get_multiple_authors( $post_id );
			if ( is_array( $author_data ) && count( $author_data ) > 1 ) {
				pixwell_entry_meta_authors( $author_data );

				return false;
			}
		}
		?>
		<span class="meta-info-el meta-info-author">
			<span class="screen-reader-text"><?php esc_html_e( 'Posted by', 'pixwell' ); ?></span>
			<?php $author_avatar = pixwell_get_option( 'meta_author_icon' );
			if ( ! empty( $author_avatar ) ) : ?>
				<span class="meta-avatar"><?php echo get_avatar( $author_id, 22 ); ?></span>
				<a href="<?php echo get_author_posts_url( $author_id ) ?>"><?php the_author_meta( 'display_name', $author_id ); ?></a>
			<?php
			else :
				$meta_author_text = pixwell_get_option( 'meta_author_text' );
				if ( ! empty( $meta_author_text ) ) : ?>
					<em class="meta-label"><?php echo esc_html( $meta_author_text ) . ' '; ?></em>
				<?php endif; ?>










				<a href="<?php echo get_author_posts_url( $author_id ) ?>"><?php the_author_meta( 'display_name', $author_id ); ?></a>
			<?php endif; ?>
		</span>
		<?php
	}
}

if ( ! function_exists( 'pixwell_entry_meta_authors' ) ) {
	/**
	 * @param array $author_data
	 */
	function pixwell_entry_meta_authors( $author_data = [] ) {

		$author_avatar = pixwell_get_option( 'meta_author_icon' ); ?>
		<span class="meta-info-el meta-info-author co-authors">
			<span class="screen-reader-text"><?php esc_html_e( 'Posted by', 'pixwell' ); ?></span>
			<?php if ( ! empty( $author_avatar ) ): ?>
				<span class="meta-avatar">
					<?php foreach ( $author_data as $author ) {
						echo get_avatar( $author->ID, 36 );
					} ?>
			    </span>
			<?php else :
				$meta_author_text = pixwell_get_option( 'meta_author_text' );
				if ( ! empty( $meta_author_text ) ) : ?>
					<em class="meta-label"><?php echo esc_html( $meta_author_text ) . ' '; ?></em>
				<?php endif;
			endif;
			foreach ( $author_data as $author ) :
				$author_id = $author->ID; ?>
				<a href="<?php echo get_author_posts_url( $author_id ) ?>"><?php the_author_meta( 'display_name', $author_id ); ?></a>
			<?php endforeach; ?>
		</span>
	<?php }
}

/**
 * single author meta
 */
if ( ! function_exists( 'pixwell_single_meta_author' ) ) {
	function pixwell_single_meta_author( $post_id = '' ) {

		$label            = pixwell_get_option( 'single_post_author_meta_label' );
		$meta_author_text = pixwell_get_option( 'meta_author_text' );

		if ( empty( $post_id ) ) {
			$author_id = get_post_field( 'post_author', get_the_ID() );
		} else {
			$author_id = get_post_field( 'post_author', $post_id );
		}

		/** multiple authors supported */
		if ( function_exists( 'get_multiple_authors' ) ) {
			$author_data = get_multiple_authors( $post_id );
			if ( is_array( $author_data ) && count( $author_data ) > 1 ) {
				pixwell_single_entry_meta_authors( $author_data );

				return false;
			}
		}

		?>
		<span class="meta-info-el meta-info-author">
			<span class="screen-reader-text"><?php esc_html_e( 'Posted by', 'pixwell' ); ?></span>
			<?php if ( ! empty( $label ) && ! empty( $meta_author_text ) ) : ?>
				<em class="meta-label"><?php echo esc_html( $meta_author_text ) . ' '; ?></em>
			<?php endif; ?>
			<a href="<?php echo get_author_posts_url( $author_id ) ?>"><?php the_author_meta( 'display_name', $author_id ); ?></a>
		</span>
		<?php
	}
}

if ( ! function_exists( 'pixwell_single_entry_meta_authors' ) ) {
	/**
	 * @param array $author_data
	 */
	function pixwell_single_entry_meta_authors( $author_data = [] ) {

		$label            = pixwell_get_option( 'single_post_author_meta_label' );
		$meta_author_text = pixwell_get_option( 'meta_author_text' ); ?>
		<span class="meta-info-el meta-info-author co-authors">
			<span class="screen-reader-text"><?php esc_html_e( 'Posted by', 'pixwell' ); ?></span>
			<?php if ( ! empty( $label ) && ! empty( $meta_author_text ) ) : ?>
				<em class="meta-label"><?php echo esc_html( $meta_author_text ) . ' '; ?></em>
			<?php endif;
			foreach ( $author_data as $author ) :
				$author_id = $author->ID; ?>
				<a href="<?php echo get_author_posts_url( $author_id ) ?>"><?php the_author_meta( 'display_name', $author_id ); ?></a>
			<?php endforeach; ?>
		    </span>
	<?php }
}

/**
 * @param bool $primary
 * meta info category
 */
if ( ! function_exists( 'pixwell_post_meta_cat' ) ) {
	function pixwell_post_meta_cat( $primary = true ) {

		if ( $primary ) {
			$primary_category = rb_get_meta( 'primary_cat' );
		}

		$categories = get_the_category();
		if ( empty( $categories ) ) {
			return;
		}

		if ( empty( $primary_category ) ) :
			if ( [ $categories ] ) : ?>
				<span class="meta-info-el meta-info-cat">
					<?php foreach ( $categories as $category ) : ?>
						<a class="cat-<?php echo esc_attr( $category->term_id ); ?>" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
					<?php endforeach; ?>
				</span>
			<?php endif;
		else :
			$primary_category_name = get_cat_name( $primary_category ); ?>
			<span class="meta-info-el meta-info-cat">
				<a class="cat-<?php echo esc_attr( $primary_category ); ?>" href="<?php echo esc_url( get_category_link( $primary_category ) ); ?>"><?php echo esc_html( $primary_category_name ); ?></a>
			</span>
		<?php endif;
	}
}

/**
 * meta info tag
 */
if ( ! function_exists( 'pixwell_post_meta_tag' ) ) {
	function pixwell_post_meta_tag( $post_id = '' ) {

		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}
		$all_tags = get_the_tags();
		if ( is_array( $all_tags ) ) : ?>
			<span class="meta-info-el meta-info-tag">
			<em class="meta-label"><?php echo pixwell_translate( 'tags' ) . ' '; ?></em>
				<?php foreach ( $all_tags as $tag ) : ?>
					<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" rel="tag"><?php echo esc_attr( $tag->name ); ?></a>
				<?php endforeach; ?>
			</span>
		<?php endif;
	}
}

/**
 * meta info comment
 */
if ( ! function_exists( 'pixwell_post_meta_comment' ) ) {
	function pixwell_post_meta_comment() {

		if ( ! comments_open() ) {
			return;
		}

		$meta_comment_icon = pixwell_get_option( 'meta_comment_icon' );
		$total_comments    = get_comments_number(); ?>
		<span class="meta-info-el meta-info-comment">
			<a href="<?php echo get_comments_link() ?>">
				<?php if ( ! empty( $meta_comment_icon ) ) : ?>
					<i class="rbi rbi-comments"></i><?php
					if ( 0 == $total_comments ) {
						echo pixwell_translate( 'add_comment' );
					} elseif ( 1 == $total_comments ) {
						echo pixwell_translate( 'comment' );
					} else {
						echo sprintf( pixwell_translate( 'comments' ), pixwell_pretty_number( $total_comments ) );
					} ?><?php
				else :
					if ( 0 == $total_comments ) {
						echo pixwell_translate( 'add_comment' );
					} elseif ( 1 == $total_comments ) {
						echo pixwell_translate( 'comment' );
					} else {
						echo sprintf( pixwell_translate( 'comments' ), pixwell_pretty_number( $total_comments ) );
					};
				endif; ?>
			</a>
	</span>
		<?php
	}
}

/**
 * meta info view
 */
if ( ! function_exists( 'pixwell_post_meta_view' ) ) {
	function pixwell_post_meta_view( $post_id = '' ) {

		if ( ! function_exists( 'pvc_get_post_views' ) || ! function_exists( 'Post_Views_Counter' ) ) {
			return false;
		}

		$display = true;
		$groups  = Post_Views_Counter()->options['display']['restrict_display']['groups'];
		if ( is_user_logged_in() ) {
			if ( in_array( 'users', $groups, true ) ) {
				$display = false;
			} elseif ( in_array( 'roles', $groups, true ) && Post_Views_Counter()->counter->is_user_role_excluded( get_current_user_id(), Post_Views_Counter()->options['display']['restrict_display']['roles'] ) ) {
				$display = false;
			}
		} elseif ( in_array( 'guests', $groups, true ) ) {
			$display = false;
		}
		if ( ! in_the_loop() && ! class_exists( 'bbPress' ) ) {
			$display = false;
		}

		if ( ! $display ) {
			return false;
		}

		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}

		$total_view = pvc_get_post_views( $post_id );
		$fake_view  = rb_get_meta( 'start_view', $post_id );
		if ( ! empty( $fake_view ) ) {
			$total_view = intval( $total_view ) + intval( $fake_view );
		}
		if ( empty( $total_view ) ) {
			return false;
		}

		$meta_view_icon = pixwell_get_option( 'meta_view_icon' ); ?>
		<span class="meta-info-el meta-info-view">
			<a href="<?php echo get_permalink() ?>" title="<?php esc_attr( get_the_title() ); ?>">
				<?php if ( ! empty( $meta_view_icon ) ) : ?>
					<i class="rbi rbi-trend"></i><?php
					if ( 1 == $total_view ) {
						echo pixwell_translate( 'view' );
					} else {
						echo sprintf( pixwell_translate( 'views' ), pixwell_pretty_number( $total_view ) );
					} ?><?php
				else :
					if ( 1 == $total_view ) {
						echo pixwell_translate( 'view' );
					} else {
						echo sprintf( pixwell_translate( 'views' ), pixwell_pretty_number( $total_view ) );
					}
				endif; ?>
			</a>
		</span>
		<?php
	}
}

/**
 * meta info view
 */
if ( ! function_exists( 'pixwell_post_meta_custom' ) ) {
	function pixwell_post_meta_custom( $post_id = '' ) {

		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}

		$meta_custom = pixwell_get_option( 'meta_custom' );
		if ( empty( $meta_custom ) ) {
			return;
		}

		$custom_info = rb_get_meta( 'meta_custom', $post_id );
		if ( empty( $custom_info ) ) {
			return;
		}

		$meta_custom_icon = pixwell_get_option( 'meta_custom_icon' );
		$meta_custom_text = pixwell_get_option( 'meta_custom_text' );
		$meta_custom_pos  = pixwell_get_option( 'meta_custom_pos' );

		$meta_entry = $custom_info . ' ' . $meta_custom_text;
		if ( ! empty( $meta_custom_pos ) && 'begin' == $meta_custom_pos ) {
			$meta_entry = $meta_custom_text . ' ' . $custom_info;
		} ?>
		<span class="meta-info-el meta-info-custom">
			<?php if ( ! empty( $meta_custom_icon ) ) :
				if ( strpos( $meta_custom_icon, 'rbi' ) !== false ) {
					$class_name = 'rbi ' . $meta_custom_icon;
				} else {
					$class_name = $meta_custom_icon;
				}
				?>
			<i class="<?php echo esc_attr( $class_name ); ?>"></i><?php echo esc_html( $meta_entry ); ?><?php
			else :
				echo esc_html( $meta_entry );
			endif; ?>
		</span>
		<?php
	}
}

/**
 * @param string $size
 * @param string $classes
 * featured image
 */
if ( ! function_exists( 'pixwell_post_thumb' ) ) {
	function pixwell_post_thumb( $size = 'full', $classes = '', $format = true, $edit_link = true ) {

		$class_name = 'rb-iwrap';
		if ( ! empty( $classes ) ) {
			$class_name .= ' ' . $classes;
		} ?>
		<a class="p-flink" href="<?php echo get_permalink(); ?>" aria-label="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
			<span class="<?php echo esc_attr( $class_name ); ?>"><?php the_post_thumbnail( $size ); ?></span> </a>
		<?php if ( $edit_link && current_user_can( 'edit_posts' ) ) : ?><?php edit_post_link( esc_html__( 'edit', 'pixwell' ) ); ?><?php endif;

		if ( ! empty( $format ) ) {
			pixwell_render_format_icon();
		}
	}
}

if ( ! function_exists( 'pixwell_featured_with_category' ) ) {
	function pixwell_featured_with_category( $settings = [], $classes = '', $format = true, $edit_link = true ) {

		if ( empty( $settings['crop_size'] ) ) {
			$settings['crop_size'] = 'full';
		}
		$class_name = 'rb-iwrap';
		if ( ! empty( $classes ) ) {
			$class_name .= ' ' . $classes;
		} ?>
		<?php if ( pixwell_is_featured_image( $settings['crop_size'] ) ) : ?>
			<div class="p-feat-holder">
				<div class="p-feat">
					<a class="p-flink" href="<?php echo get_permalink(); ?>"
					   aria-label="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
						<span class="<?php echo esc_attr( $class_name ); ?>"><?php the_post_thumbnail( $settings['crop_size'] ); ?></span>
					</a>
					<?php if ( $edit_link && current_user_can( 'edit_posts' ) ) : ?><?php edit_post_link( esc_html__( 'edit', 'pixwell' ) ); ?><?php endif;

					if ( ! empty( $format ) ) {
						pixwell_render_format_icon();
					}
					pixwell_post_cat_info( $settings );
					?>
				</div>
				<?php pixwell_post_review_info( $settings ); ?>
			</div>
		<?php endif;
	}
}

if ( ! function_exists( 'pixwell_post_cat_info' ) ) {
	function pixwell_post_cat_info( $settings ) {

		$categories            = get_the_category();
		$primary_category      = '';
		$primary_category_name = '';

		if ( empty( $settings['disable_pc'] ) ) {
			$primary_category      = rb_get_meta( 'primary_cat' );
			$primary_category_name = get_cat_name( $primary_category );
		}

		$class_name   = [];
		$class_name[] = 'p-cat-info';
		if ( ! empty( $settings['cat_classes'] ) ) {
			$class_name[] = $settings['cat_classes'];
		} else {
			$class_name[] = 'is-absolute';
		}
		$class_name = implode( ' ', $class_name ); ?>
		<aside class="<?php echo esc_attr( $class_name ); ?>">
			<?php if ( ! empty( $settings['cat_info'] ) ) : ?><?php if ( empty( $primary_category ) || empty ( $primary_category_name ) ) :
				if ( ! empty( $categories ) && is_array( $categories ) ) :
					foreach ( $categories as $category ) :
						echo '<a class="cat-info-el cat-info-id-' . esc_attr( $category->term_id ) . '" href="' . get_category_link( $category->term_id ) . '" rel="category">';
						echo esc_html( $category->name );
						echo '</a>';
					endforeach;
				endif;
			else :
				echo '<a class="cat-info-el cat-info-id-' . esc_attr( $primary_category ) . '" href="' . get_category_link( $primary_category ) . '" rel="category">';
				echo esc_html( $primary_category_name );
				echo '</a>';
			endif; ?><?php endif; ?><?php pixwell_post_custom_info( $settings ); ?>
		</aside>
		<?php
	}
}

if ( ! function_exists( 'pixwell_post_open_tag' ) ) {
	/**
	 * @param array $settings
	 */
	function pixwell_post_open_tag( $settings = [] ) { ?>
		<div class="<?php echo pixwell_get_post_classes( $settings ); ?>" data-pid="<?php echo get_the_ID(); ?>">
	<?php }
}

if ( ! function_exists( 'pixwell_post_close_tag' ) ) {
	function pixwell_post_close_tag() { ?>
		</div>
	<?php }
}

if ( ! function_exists( 'pixwell_get_post_classes' ) ) {
	/**
	 * @param $settings
	 *
	 * @return string
	 */
	function pixwell_get_post_classes( $settings ) {

		$classes   = [];
		$classes[] = 'p-wrap';
		if ( is_sticky() ) {
			$classes[] = 'sticky';
		}
		if ( ! empty( $settings['post_classes'] ) ) {
			$classes[] = $settings['post_classes'];
		}
		if ( ( ! empty( $settings['carousel'] ) && '1' === (string) $settings['carousel'] ) || ( ! empty( $settings['slider'] ) && '1' === (string) $settings['slider'] ) ) {
			$classes[] = 'swiper-slide';
		}

		return join( ' ', $classes );
	}
}

/**
 * @param array $override
 * meta info
 */
if ( ! function_exists( 'pixwell_post_custom_info' ) ) {
	function pixwell_post_custom_info( $settings = [] ) {

		if ( empty( $settings['custom_info'] ) ) {
			return;
		}

		$meta_custom = pixwell_get_option( 'meta_custom' );
		if ( empty( $meta_custom ) ) {
			return;
		}

		$custom_info = rb_get_meta( 'meta_custom' );
		if ( empty( $custom_info ) ) {
			return;
		}

		$meta_custom_icon = pixwell_get_option( 'meta_custom_icon' );
		$meta_custom_text = pixwell_get_option( 'meta_custom_text' );
		$meta_custom_pos  = pixwell_get_option( 'meta_custom_pos' );

		$meta_entry = $custom_info . ' ' . $meta_custom_text;
		if ( ! empty( $meta_custom_pos ) && 'begin' == $meta_custom_pos ) {
			$meta_entry = $meta_custom_text . ' ' . $custom_info;
		}
		?>
		<span class="additional-meta">
			<?php if ( ! empty( $meta_custom_icon ) ) : ?>
				<i class="rbi <?php echo esc_attr( $meta_custom_icon ); ?>"></i>
			<?php endif; ?>
			<span><?php echo esc_html( $meta_entry ); ?></span>
		</span>
		<?php
	}
}

/**
 * review info
 */
if ( ! function_exists( 'pixwell_post_review_info' ) ) {
	function pixwell_post_review_info( $settings ) {

		if ( empty( $settings['review'] ) ) {
			return;
		}
		$review = pixwell_is_post_review();
		if ( empty( $review ) ) {
			return;
		}

		$avg_stars = get_post_meta( get_the_ID(), 'pixwell_review_stars', true );
		if ( empty( $avg_stars ) && function_exists( 'pixwell_add_avg_review' ) ) {
			$avg_stars = pixwell_add_avg_review( get_the_ID() );
		}

		if ( 'NA' === $avg_stars ) {
			return;
		}

		$review_meta = rb_get_meta( 'review_meta' ); ?>
		<aside class="p-review-info is-light-text">
			<i class="rbi rbi-star-full"></i> <span class="meta-total h4"><?php echo esc_html( $avg_stars ); ?></span>
			<?php if ( ! empty( $review_meta ) ) : ?>
				<span class="meta-description h6"><?php echo esc_html( $review_meta ); ?></span><?php endif; ?>
		</aside>
		<?php
	}
}

/**
 * @param string $classes
 *
 * @return string
 * render post category dot for small list
 */
if ( ! function_exists( 'pixwell_post_cat_dot' ) ) {
	function pixwell_post_cat_dot() {

		$categories       = get_the_category();
		$primary_category = rb_get_meta( 'primary_cat' ); ?>
		<span class="p-cat-dot">
			<?php if ( empty( $primary_category ) ) :
				if ( ! empty( $categories ) && is_array( $categories ) ) :
					foreach ( $categories as $category ) : ?>
						<i class="cat-dot-el cat-info-id-<?php echo esc_attr( $category->term_id ); ?>"></i>
						<?php break;
					endforeach;
				endif;
			else : ?>
				<i class="cat-dot-el cat-info-id-<?php echo esc_attr( $primary_category ); ?>"></i>
			<?php endif; ?>
		</span>
		<?php
	}
}

/** pixwell_post_meta_sponsor */
if ( ! function_exists( 'pixwell_post_meta_sponsor' ) ) :
	function pixwell_post_meta_sponsor() {

		$label       = pixwell_get_option( 'sponsor_label' );
		$sponsor_url = rb_get_meta( 'sponsor_url' );

		if ( empty( $label ) ) {
			$label = esc_html__( 'Sponsored by', 'pixwell' );
		}
		if ( empty( $sponsor_url ) ) {
			$sponsor_url = '#';
		}
		$sponsor_name = rb_get_meta( 'sponsor_name' );
		ob_start(); ?>
		<aside class="p-meta-sponsor">
			<div class="sponsor-inner">
				<i class="rbi rbi-bell sponsor-icon"></i><span class="sponsor-label"><?php echo apply_filters( 'the_title', $label, 12 ); ?></span>
				<a class="sponsor-link" href="<?php echo esc_url( $sponsor_url ); ?>" target="_blank" rel="noopener nofollow"><?php echo esc_html( $sponsor_name ); ?></a>
			</div>
		</aside>
		<?php
		return ob_get_clean();
	}
endif;

/** shop post */
if ( ! function_exists( 'pixwell_post_meta_shop_post' ) ) :
	function pixwell_post_meta_shop_post() {

		$label = pixwell_get_option( 'meta_shop_post_text' );
		ob_start(); ?>
		<aside class="p-meta-info">
			<span class="meta-info-el meta-shop-post">
				<a class="shop-post-link" href="<?php echo get_permalink() . '#shopthepost'; ?>"><i class="rbi rbi-shop-bag shop-post-icon"></i><span class="shop-post-label"><?php echo apply_filters( 'the_title', $label, 10 ); ?></span></a>
			</span>
		</aside>
		<?php
		return ob_get_clean();
	}
endif;


