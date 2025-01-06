<?php
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Pixwell_Optimized', false ) ) {
	/**
	 * Class Pixwell_Optimized
	 */
	class Pixwell_Optimized {

		private static $instance;

		public static function get_instance() {

			if ( self::$instance === null ) {
				return new self();
			}

			return self::$instance;
		}

		public function __construct() {

			self::$instance = $this;

			add_filter( 'post_class', [ $this, 'remove_hatom' ], 10, 1 );
			add_filter( 'wpseo_title', [ $this, 'composer_title' ], 10, 1 );

			add_action( 'wp_head', [ $this, 'site_description' ], 2 );
			add_action( 'wp_head', [ $this, 'schema_organization' ], 5 );
			add_action( 'wp_head', [ $this, 'site_links' ], 10 );
			add_action( 'wp_head', [ $this, 'breadcrumb_markup' ], 25 );
			add_action( 'wp_head', [ $this, 'review_markup' ], 5 );
			add_action( 'wp_footer', [ $this, 'posts_list' ] );

			/** use jetpack og tags */
			if ( class_exists( 'Jetpack' ) ) {
				add_filter( 'jetpack_enable_open_graph', '__return_true', 100 );
			} else {
				add_action( 'wp_head', [ $this, 'open_graph' ], 20 );
			}
		}

		private $open_graph_conflicting_plugins = [
			'2-click-socialmedia-buttons/2-click-socialmedia-buttons.php',
			'add-link-to-facebook/add-link-to-facebook.php',
			'add-meta-tags/add-meta-tags.php',
			'complete-open-graph/complete-open-graph.php',
			'easy-facebook-share-thumbnails/esft.php',
			'heateor-open-graph-meta-tags/heateor-open-graph-meta-tags.php',
			'facebook/facebook.php',
			'facebook-awd/AWD_facebook.php',
			'facebook-featured-image-and-open-graph-meta-tags/fb-featured-image.php',
			'facebook-meta-tags/facebook-metatags.php',
			'wonderm00ns-simple-facebook-open-graph-tags/wonderm00n-open-graph.php',
			'facebook-revised-open-graph-meta-tag/index.php',
			'facebook-thumb-fixer/_facebook-thumb-fixer.php',
			'facebook-and-digg-thumbnail-generator/facebook-and-digg-thumbnail-generator.php',
			'network-publisher/networkpub.php',
			'nextgen-facebook/nextgen-facebook.php',
			'social-networks-auto-poster-facebook-twitter-g/NextScripts_SNAP.php',
			'og-tags/og-tags.php',
			'opengraph/opengraph.php',
			'open-graph-protocol-framework/open-graph-protocol-framework.php',
			'seo-facebook-comments/seofacebook.php',
			'seo-ultimate/seo-ultimate.php',
			'sexybookmarks/sexy-bookmarks.php',
			'shareaholic/sexy-bookmarks.php',
			'sharepress/sharepress.php',
			'simple-facebook-connect/sfc.php',
			'social-discussions/social-discussions.php',
			'social-sharing-toolkit/social_sharing_toolkit.php',
			'socialize/socialize.php',
			'squirrly-seo/squirrly.php',
			'only-tweet-like-share-and-google-1/tweet-like-plusone.php',
			'wordbooker/wordbooker.php',
			'wpsso/wpsso.php',
			'wp-caregiver/wp-caregiver.php',
			'wp-facebook-like-send-open-graph-meta/wp-facebook-like-send-open-graph-meta.php',
			'wp-facebook-open-graph-protocol/wp-facebook-ogp.php',
			'wp-ogp/wp-ogp.php',
			'zoltonorg-social-plugin/zosp.php',
			'wp-fb-share-like-button/wp_fb_share-like_widget.php',
			'open-graph-metabox/open-graph-metabox.php',
			'seo-by-rank-math/rank-math.php',
			'slim-seo/slim-seo.php',
			'all-in-one-seo-pack/all_in_one_seo_pack.php',
		];

		private $meta_description_conflicting_plugins = [
			'seo-by-rank-math/rank-math.php',
			'slim-seo/slim-seo.php',
			'all-in-one-seo-pack/all_in_one_seo_pack.php',
			'wp-wordpress-seo/wp-seo.php',
			'seo-ultimate/seo-ultimate.php',
		];

		public function get_active_plugins() {

			$active_plugins = (array) get_option( 'active_plugins', [] );
			if ( is_multisite() ) {
				$network_plugins = array_keys( get_site_option( 'active_sitewide_plugins', [] ) );
				if ( $network_plugins ) {
					$active_plugins = array_merge( $active_plugins, $network_plugins );
				}
			}

			sort( $active_plugins );

			return array_unique( $active_plugins );
		}

		/**
		 * @return bool
		 */
		public function conflict_schema() {

			$schema_conflicting_plugins = [
				'seo-by-rank-math/rank-math.php',
				'all-in-one-seo-pack/all_in_one_seo_pack.php',
			];

			$active_plugins = $this->get_active_plugins();

			if ( ! empty( $active_plugins ) ) {
				foreach ( $schema_conflicting_plugins as $plugin ) {
					if ( in_array( $plugin, $active_plugins, true ) ) {
						return true;
					}
				}
			}

			return false;
		}

		/**
		 * @return bool
		 */
		public function check_conflict_open_graph() {

			$active_plugins = $this->get_active_plugins();
			if ( in_array( 'wp-wordpress-seo/wp-seo.php', $active_plugins, true ) ) {
				$yoast_social = get_option( 'wpseo_social' );
				if ( ! empty( $yoast_social['opengraph'] ) ) {
					return true;
				}
			}

			if ( in_array( 'wp-seopress/seopress.php', $active_plugins, true ) ) {
				$seopress_setting = get_option( 'seopress_social_option_name' );
				if ( ! empty( $seopress_setting['seopress_social_facebook_og'] ) ) {
					return true;
				}
			}

			if ( ! empty( $active_plugins ) ) {
				foreach ( $this->open_graph_conflicting_plugins as $plugin ) {
					if ( in_array( $plugin, $active_plugins, true ) ) {
						return true;
					}
				}
			}

			return false;
		}

		/**
		 * @return false
		 */
		public function site_description() {

			if ( ! pixwell_get_option( 'website_description' ) ) {
				return false;
			}

			$active_plugins = $this->get_active_plugins();
			if ( ! empty( $active_plugins ) ) {
				foreach ( $this->meta_description_conflicting_plugins as $plugin ) {
					if ( in_array( $plugin, $active_plugins, true ) ) {
						return false;
					}
				}
			}

			if ( is_front_page() ) {
				$content = pixwell_get_option( 'site_description' );
				if ( empty( $content ) ) {
					$content = get_bloginfo( 'description' );
				}
				if ( ! empty ( $content ) ) {
					echo '<meta name="description" content="' . wp_strip_all_tags( $content ) . '">';
				}
			} elseif ( is_singular( 'post' ) ) {

				$post_id = get_the_ID();
				$content = rb_get_meta( 'title_tagline', $post_id );
				if ( empty( $content ) ) {
					$content = get_post_field( 'post_excerpt', $post_id );
				}
				if ( ! empty( $content ) ) {
					echo '<meta name="description" content="' . wp_strip_all_tags( $content ) . '">';
				}
			} elseif ( is_archive() ) {
				$content = get_the_archive_description();
				if ( ! empty( $content ) ) {
					echo '<meta name="description" content="' . wp_strip_all_tags( $content ) . '">';
				}
			}

			return false;
		}

		/**
		 * @return false
		 */
		public function schema_organization() {

			if ( ! pixwell_get_option( 'organization_markup' ) ) {
				return false;
			}

			$site_street   = pixwell_get_option( 'site_street' );
			$site_locality = pixwell_get_option( 'site_locality' );
			$site_phone    = pixwell_get_option( 'site_phone' );
			$site_email    = pixwell_get_option( 'site_email' );
			$postal_code   = pixwell_get_option( 'postal_code' );
			$protocol      = pixwell_protocol();

			$home_url = home_url( '/' );

			$json_ld = [
				'@context'  => $protocol . '://schema.org',
				'@type'     => 'Organization',
				'legalName' => get_bloginfo( 'name' ),
				'url'       => $home_url,
			];

			if ( ! empty( $site_street ) || ! empty( $site_locality ) ) {
				$json_ld['address']['@type'] = 'PostalAddress';

				if ( ! empty( $site_street ) ) {
					$json_ld['address']['streetAddress'] = esc_html( $site_street );
				}

				if ( ! empty( $site_locality ) ) {
					$json_ld['address']['addressLocality'] = esc_html( $site_locality );
				}

				if ( ! empty( $postal_code ) ) {
					$json_ld['address']['postalCode'] = esc_html( $postal_code );
				}
			}

			if ( ! empty( $site_email ) ) {
				$json_ld['email'] = esc_html( $site_email );
			}

			if ( ! empty( $site_phone ) ) {
				$json_ld['contactPoint'] = [
					'@type'       => 'ContactPoint',
					'telephone'   => esc_html( $site_phone ),
					'contactType' => 'customer service',
				];
			}

			$logo = pixwell_get_option( 'site_logo' );
			if ( ! empty( $logo['url'] ) ) {
				$json_ld['logo'] = $logo['url'];
			}

			$social = [
				pixwell_get_option( 'social_facebook' ),
				pixwell_get_option( 'social_twitter' ),
				pixwell_get_option( 'social_instagram' ),
				pixwell_get_option( 'social_pinterest' ),
				pixwell_get_option( 'social_linkedin' ),
				pixwell_get_option( 'social_tumblr' ),
				pixwell_get_option( 'social_flickr' ),
				pixwell_get_option( 'social_skype' ),
				pixwell_get_option( 'social_snapchat' ),
				pixwell_get_option( 'social_myspace' ),
				pixwell_get_option( 'social_youtube' ),
				pixwell_get_option( 'social_bloglovin' ),
				pixwell_get_option( 'social_digg' ),
				pixwell_get_option( 'social_dribbble' ),
				pixwell_get_option( 'social_soundcloud' ),
				pixwell_get_option( 'social_vimeo' ),
				pixwell_get_option( 'social_reddit' ),
				pixwell_get_option( 'social_vk' ),
				pixwell_get_option( 'social_telegram' ),
				pixwell_get_option( 'social_whatsapp' ),
				pixwell_get_option( 'social_rss' ),
			];

			foreach ( $social as $key => $el ) {
				if ( empty( $el ) || '#' == $el ) {
					unset( $social[ $key ] );
				}
			}

			if ( count( $social ) ) {
				$json_ld['sameAs'] = array_values( $social );
			}

			echo '<script type="application/ld+json">';
			if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
				echo wp_json_encode( $json_ld, JSON_UNESCAPED_SLASHES );
			} else {
				echo wp_json_encode( $json_ld );
			}
			echo '</script>', "\n";

			return false;
		}

		function site_links() {

			if ( ! pixwell_get_option( 'website_markup' ) ) {
				return false;
			}

			$protocol = pixwell_protocol();
			$home_url = home_url( '/' );
			$json_ld  = [
				'@context'        => $protocol . '://schema.org',
				'@type'           => 'WebSite',
				'@id'             => $home_url . '#website',
				'url'             => $home_url,
				'name'            => get_bloginfo( 'name' ),
				'potentialAction' => [
					'@type'       => 'SearchAction',
					'target'      => $home_url . '?s={search_term_string}',
					'query-input' => 'required name=search_term_string',
				],
			];

			echo '<script type="application/ld+json">';
			if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
				echo wp_json_encode( $json_ld, JSON_UNESCAPED_SLASHES );
			} else {
				echo wp_json_encode( $json_ld );
			}
			echo '</script>', "\n";

			return false;
		}

		function remove_hatom( $classes ) {

			foreach ( $classes as $key => $value ) {
				if ( $value === 'hentry' ) {
					unset( $classes[ $key ] );
				}
			}

			return $classes;
		}

		/**
		 * @return false
		 */
		function open_graph() {

			if ( ! pixwell_get_option( 'open_graph' ) || $this->check_conflict_open_graph() || pixwell_is_amp() ) {
				return false;
			}

			$facebook_app_id = pixwell_get_option( 'facebook_app_id' ); ?>
			<meta property="og:title" content="<?php echo $this->get_og_title(); ?>"/>
			<meta property="og:url" content="<?php echo $this->get_og_permalink(); ?>"/>
			<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>"/>
			<?php if ( is_front_page() ) : ?>
				<meta property="og:description" content="<?php get_bloginfo( 'description' );; ?>"/>
			<?php endif;
			if ( $this->og_get_image() ) : ?>
				<meta property="og:image" content="<?php echo $this->og_get_image(); ?>"/>
			<?php endif; ?>
			<?php if ( ! empty( $facebook_app_id ) ) : ?>
				<meta property="fb:facebook_app_id" content="<?php echo esc_attr( $facebook_app_id ); ?>"/>
			<?php endif;
			if ( is_singular( 'post' ) ) :
				global $post;

				$count = get_post_meta( $post->ID, 'pixwell_total_word', true );

				if ( ! empty( $count ) ) {
					$count      = intval( $count );
					$read_speed = intval( pixwell_get_option( 'read_speed' ) );
					if ( empty( $read_speed ) ) {
						$read_speed = 130;
					}
					$minutes = floor( $count / $read_speed );
					$second  = floor( ( $count / $read_speed ) * 60 ) % 60;
					if ( $second > 30 ) {
						$minutes ++;
					}
				}
				?>
				<meta property="og:type" content="article"/>
				<meta property="article:published_time" content="<?php echo gmdate( 'c', strtotime( $post->post_date_gmt ) ); ?>"/>
				<meta property="article:modified_time" content="<?php echo gmdate( 'c', strtotime( $post->post_modified_gmt ) ); ?>"/>
				<meta name="author" content="<?php the_author_meta( 'display_name', $post->post_author ); ?>"/>
				<meta name="twitter:card" content="summary_large_image"/>
				<meta name="twitter:creator" content="<?php echo '@' . pixwell_get_twitter_name(); ?>"/>
				<meta name="twitter:label1" content="<?php esc_html_e( 'Written by', 'pixwell-core' ) ?>"/>
				<meta name="twitter:data1" content="<?php the_author_meta( 'display_name', $post->post_author ); ?>"/>
				<?php if ( ! empty( $minutes ) ) : ?>
				<meta name="twitter:label2" content="<?php esc_html_e( 'Est. reading time', 'pixwell-core' ) ?>"/>
				<meta name="twitter:data2" content="<?php echo $minutes; ?> minutes"/>
			<?php endif;
			endif;
		}

		/**
		 * @return string
		 */
		function get_og_title() {

			if ( is_singular() ) {
				return get_the_title();
			}

			return wp_get_document_title();
		}

		/**
		 * @return false|string|void|WP_Error
		 */
		function get_og_permalink() {

			if ( is_singular() ) {
				return get_permalink();
			}

			global $wp;

			return home_url( add_query_arg( [], $wp->request ) );
		}

		/**
		 * @return false|mixed|string
		 */
		function og_get_image() {

			if ( is_singular() && has_post_thumbnail( get_the_ID() ) ) {

				$thumbnail_url = wp_get_attachment_image_url( get_post_thumbnail_id( get_the_ID() ), 'full' );
				if ( ! empty( $thumbnail_url ) ) {
					return $thumbnail_url;
				}
			} elseif ( is_author() ) {
				return get_avatar_url( get_queried_object_id(), [ 'size' => '999' ] );
			} elseif ( is_home() || is_front_page() ) {
				$image = pixwell_get_option( 'site_logo' );
				if ( ! empty( $image['url'] ) ) {
					return $image['url'];
				}
			}
			$image = pixwell_get_option( 'facebook_default_img' );
			if ( ! empty( $image['url'] ) ) {
				return $image['url'];
			}

			return false;
		}

		/**
		 * @param $seo_title
		 *
		 * @return string
		 */
		public function composer_title( $seo_title ) {

			if ( ! in_the_loop() && is_page_template( 'rbc-frontend.php' ) ) {

				$get_paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
				$get_page  = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1;

				if ( $get_paged > $get_page ) {
					$paged = $get_paged;
				} else {
					$paged = $get_page;
				}

				if ( $paged > 1 ) {
					return $seo_title . ' - ' . pixwell_translate( 'page' ) . ' ' . $paged;
				}
			}

			return $seo_title;
		}

		/**
		 * breadcrumb_markup
		 */
		public function breadcrumb_markup() {

			if ( ! pixwell_get_option( 'site_breadcrumb' ) ) {
				return;
			}

			if ( function_exists( 'bcn_display_json_ld' ) ) {
				echo '<script type="application/ld+json">';
				bcn_display_json_ld( false, true, true );
				echo '</script>', "\n";
			}
		}

		/**
		 * @return false
		 */
		public function posts_list() {

			if ( is_singular( 'post' ) || ! pixwell_get_option( 'site_itemlist' ) ) {
				return false;
			}

			if ( empty( $GLOBALS['pixwell_queried_ids'] ) || ! count( $GLOBALS['pixwell_queried_ids'] ) ) {
				return false;
			}

			$items_list = [];
			$index      = 1;

			$items = $GLOBALS['pixwell_queried_ids'];

			foreach ( $items as $post_id ) {
				$data = [
					'@type'    => "ListItem",
					'position' => $index,
					'url'      => get_permalink( $post_id ),
					'name'     => get_the_title( $post_id ),
					'image'    => get_the_post_thumbnail_url( $post_id, 'full' ),
				];
				array_push( $items_list, $data );
				$index ++;
			}
			$post_data = [
				'@context'        => 'https://schema.org',
				'@type'           => 'ItemList',
				"itemListElement" => $items_list,
			];

			echo '<script type="application/ld+json">';
			if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
				echo wp_json_encode( $post_data, JSON_UNESCAPED_SLASHES );
			} else {
				echo wp_json_encode( $post_data );
			}
			echo '</script>', "\n";

			return false;
		}

		/**
		 * article markup
		 */
		public function article_markup() {

			if ( $this->conflict_schema() ) {
				return false;
			}

			$protocol  = pixwell_protocol();
			$publisher = get_bloginfo( 'name' );
			$logo      = pixwell_get_option( 'site_logo' );
			if ( ! empty( $logo['url'] ) ) {
				$publisher_logo = esc_url( $logo['url'] );
			}
			$subtitle        = rb_get_meta( 'title_tagline' );
			$feat_attachment = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
			<div class="article-meta is-hidden">
				<meta itemprop="mainEntityOfPage" content="<?php echo get_permalink(); ?>">
				<span class="vcard author" itemprop="author" content="<?php echo get_the_author_meta( 'display_name' ); ?>"><span class="fn"><?php echo get_the_author_meta( 'display_name' ); ?></span></span>
				<time class="date published entry-date" datetime="<?php echo date( DATE_W3C, get_the_time( 'U', get_the_ID() ) ); ?>" content="<?php echo date( DATE_W3C, get_the_time( 'U', get_the_ID() ) ); ?>" itemprop="datePublished"><?php echo get_the_date( '', get_the_ID() ) ?></time>
				<meta class="updated" itemprop="dateModified" content="<?php echo date( DATE_W3C, get_the_modified_date( 'U', get_the_ID() ) ); ?>">
				<?php if ( ! empty( $feat_attachment[0] ) ) : ?>
					<span itemprop="image" itemscope itemtype="<?php echo esc_attr( $protocol ); ?>://schema.org/ImageObject">
				<meta itemprop="url" content="<?php echo esc_url( $feat_attachment[0] ); ?>">
				<meta itemprop="width" content="<?php echo esc_attr( $feat_attachment[1] ); ?>">
				<meta itemprop="height" content="<?php echo esc_attr( $feat_attachment[2] ); ?>">
				</span>
				<?php endif; ?>
				<?php if ( ! empty( $subtitle ) ) : ?>
					<meta itemprop="description" content="<?php echo esc_attr( $subtitle ); ?>">
				<?php endif; ?>
				<span itemprop="publisher" itemscope itemtype="<?php echo esc_attr( $protocol ) ?>://schema.org/Organization">
				<meta itemprop="name" content="<?php echo esc_attr( $publisher ); ?>">
				<meta itemprop="url" content="<?php echo home_url( '/' ); ?>">
				<?php if ( ! empty( $publisher_logo ) ) : ?>
					<span itemprop="logo" itemscope itemtype="<?php echo esc_attr( $protocol ) ?>://schema.org/ImageObject">
						<meta itemprop="url" content="<?php echo esc_url( $publisher_logo ); ?>">
					</span>
				<?php endif; ?>
				</span>
			</div>
			<?php
		}

		/**
		 * @return false
		 * review markup
		 */
		public function review_markup() {

			if ( ! is_singular( 'post' ) || pixwell_get_option( 'disable_review_markup' ) ) {
				return false;
			}

			$post_id = get_the_ID();
			$review  = rb_get_meta( 'post_review', $post_id );
			if ( empty( $review ) || 1 != $review ) {
				return false;
			}

			$protocol    = pixwell_protocol();
			$author      = get_the_author_meta( 'display_name', get_post_field( 'post_author', $post_id ) );
			$image       = get_the_post_thumbnail_url( $post_id, 'full' );
			$name        = get_the_title( $post_id );
			$sku         = get_post_field( 'post_name', $post_id );
			$description = rb_get_meta( 'review_summary', $post_id );

			if ( empty( $description ) ) {
				$description = get_the_excerpt( $post_id );
			}

			$avg_stars = get_post_meta( get_the_ID(), 'pixwell_review_stars', true );
			if ( empty( $avg_stars ) && function_exists( 'pixwell_add_avg_review' ) ) {
				$avg_stars = pixwell_add_avg_review( get_the_ID() );
			}

			$json_ld = [
				'@context'    => $protocol . '://schema.org',
				'@type'       => 'Product',
				'description' => $description,
				'image'       => $image,
				'name'        => $name,
				'mpn'         => $post_id,
				'sku'         => $sku,
				'brand'       => [
					'@type' => 'Brand',
					'name'  => get_bloginfo( 'name' ),
				],
			];

			$user_can_review = rb_get_meta( 'review_users' );
			if ( empty( $user_can_review ) || 'default' == $user_can_review ) {
				$user_can_review = pixwell_get_option( 'review_users' );
			}

			$json_ld['review'] = [
				'author'       => [
					'@type' => 'Person',
					'name'  => $author,
				],
				'@type'        => 'Review',
				'reviewRating' => [
					'@type'       => 'Rating',
					'ratingValue' => $avg_stars,
					'bestRating'  => 5,
					'worstRating' => 1,
				],
			];

			if ( ! empty( $user_can_review ) && '1' === strval( $user_can_review ) ) {

				$rating_count = 3;
				$rating_val   = $avg_stars;
				$user_rating  = get_post_meta( $post_id, 'pixwell_user_rating', true );

				if ( ! empty( $user_rating['total'] ) && ! empty( $user_rating['average'] ) ) {
					$rating_val   = $user_rating['average'];
					$rating_count = intval( $user_rating['total'] );
				}

				$json_ld['aggregateRating'] = [
					'@type'       => 'AggregateRating',
					'ratingValue' => $rating_val,
					'ratingCount' => $rating_count,
					'bestRating'  => 5,
					'worstRating' => 1,
				];
			}

			/** offer */
			$destination = rb_get_meta( 'review_destination', $post_id );
			$price       = rb_get_meta( 'preview_price', $post_id );
			$currency    = rb_get_meta( 'review_currency', $post_id );
			$expired     = rb_get_meta( 'review_price_valid', $post_id );

			if ( ! empty( $destination ) && ! empty( $price ) ) {
				if ( empty( $currency ) ) {
					$currency = 'USD';
				}
				$json_ld['offers'] = [
					'@type'         => 'Offer',
					'url'           => esc_url( $destination ),
					'price'         => preg_replace( '/\D/', '', $price ),
					'priceCurrency' => $currency,
					'itemCondition' => 'https://schema.org/UsedCondition',
					'availability'  => 'https://schema.org/InStock',
				];

				if ( ! empty( $expired ) ) {
					$json_ld['offers']['priceValidUntil'] = esc_attr( $expired );
				}
			}

			echo '<script type="application/ld+json">';
			if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
				echo wp_json_encode( $json_ld, JSON_UNESCAPED_SLASHES );
			} else {
				echo wp_json_encode( $json_ld );
			}
			echo '</script>', "\n";

			return false;
		}

	}
}

Pixwell_Optimized::get_instance();








