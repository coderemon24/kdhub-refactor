<?php
defined( 'ABSPATH' ) || exit;

/**
 * @return string
 * twitter user name
 */
if ( ! function_exists( 'pixwell_get_twitter_name' ) ) {
	function pixwell_get_twitter_name() {

		$twitter_url = get_the_author_meta( 'rb_twitter' );

		if ( empty( $twitter_url ) ) {
			$twitter_url = get_the_author_meta( 'twitter' );
		}

		if ( empty( $twitter_url ) ) {
			$twitter_url = pixwell_get_option( 'social_twitter' );
		}

		if ( ! empty( $twitter_url ) ) {
			$pos = strpos( $twitter_url, 'twitter.com/' );

			if ( ! empty( $pos ) ) {
				$twitter_user = substr( $twitter_url, intval( $pos ) + 12 );
				$twitter_user = str_replace( '/', '', $twitter_user );
				$twitter_user = trim( $twitter_user );
			} else {
				$twitter_user = $twitter_url;
			}
		};

		if ( empty( $twitter_user ) ) {
			$twitter_user = get_bloginfo( 'name' );
		}

		return $twitter_user;
	}
}

/**
 * render share icon
 */
if ( ! function_exists( 'pixwell_render_share_icon' ) ):
	function pixwell_render_share_icon( $settings = array() ) {

		$protocol     = pixwell_protocol();
		$twitter_user = pixwell_get_twitter_name();
		$post_title   = urlencode( html_entity_decode( get_the_title(), ENT_COMPAT, 'UTF-8' ) );

		if ( ! empty( $settings['facebook'] ) ) : ?>
            <a class="share-action share-icon share-facebook" href="<?php echo esc_attr( $protocol ); ?>://www.facebook.com/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>" title="Facebook" aria-label="Facebook" rel="noopener nofollow"><i class="rbi rbi-facebook"></i></a>
		<?php endif;

		if ( ! empty( $settings['twitter'] ) ) : ?>
        <a class="share-action share-twitter share-icon" href="https://twitter.com/intent/tweet?text=<?php echo htmlspecialchars( $post_title, ENT_COMPAT, 'UTF-8' ); ?>&amp;url=<?php echo urlencode( get_permalink() ); ?>&amp;via=<?php echo urlencode( $twitter_user ); ?>" title="Twitter" aria-label="Twitter" rel="noopener nofollow">
                <i class="rbi rbi-x-twitter"></i></a><?php endif;
		if ( ! empty( $settings['pinterest'] ) ) :
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'pixwell_780x0-2x' );
			if ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) and get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true ) != '' ) {
				$pinterest_description = get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true );
			} else {
				$pinterest_description = $post_title;
			} ?>
            <a class="share-action share-icon share-pinterest" rel="noopener nofollow" href="<?php echo esc_attr( $protocol ); ?>://pinterest.com/pin/create/button/?url=<?php echo urlencode( get_permalink() ); ?>&amp;media=<?php if ( ! empty( $image[0] ) ) {
				echo( esc_url( $image[0] ) );
			} ?>&amp;description=<?php echo htmlspecialchars( $pinterest_description, ENT_COMPAT, 'UTF-8' ); ?>" title="Pinterest" aria-label="Pinterest"><i class="rbi rbi-pinterest"></i></a>
		<?php endif;

		if ( ! empty( $settings['whatsapp'] ) ) : ?>
            <a class="share-icon share-whatsapp is-web" rel="noopener nofollow" href="<?php echo esc_attr( $protocol ); ?>://web.whatsapp.com/send?text=<?php echo htmlspecialchars( $post_title, ENT_COMPAT, 'UTF-8' ) . ' &#9758; ' . urlencode( get_permalink() ); ?>" target="_blank" title="WhatsApp" aria-label="WhatsApp"><i class="rbi rbi-whatsapp"></i></a>
            <a class="share-icon share-whatsapp is-mobile" rel="noopener nofollow" href="whatsapp://send?text=<?php echo htmlspecialchars( $post_title, ENT_COMPAT, 'UTF-8' ) . ' &#9758; ' . urlencode( get_permalink() ); ?>" target="_blank" title="WhatsApp" aria-label="WhatsApp"><i class="rbi rbi-whatsapp"></i></a>
		<?php endif;

		if ( ! empty( $settings['linkedin'] ) ) : ?>
            <a class="share-action share-icon share-linkedin" rel="noopener nofollow" href="<?php echo esc_attr( $protocol ); ?>://linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode( get_permalink() ); ?>&amp;title=<?php echo htmlspecialchars( $post_title, ENT_COMPAT, 'UTF-8' ); ?>" title="linkedIn" aria-label="LinkedIn"><i class="rbi rbi-linkedin"></i></a>
		<?php endif;

		if ( ! empty( $settings['tumblr'] ) ) : ?>
            <a class="share-action share-icon share-tumblr" rel="noopener nofollow" href="<?php echo esc_attr( $protocol ); ?>://www.tumblr.com/share/link?url=<?php echo urlencode( get_permalink() ); ?>&amp;name=<?php echo htmlspecialchars( $post_title, ENT_COMPAT, 'UTF-8' ); ?>&amp;description=<?php echo htmlspecialchars( $post_title, ENT_COMPAT, 'UTF-8' ); ?>" title="Tumblr" aria-label="Tumblr"><i class="rbi rbi-tumblr"></i></a>
		<?php endif;

		if ( ! empty( $settings['reddit'] ) ) : ?>
            <a class="share-action share-icon share-reddit" rel="noopener nofollow" href="<?php echo esc_attr( $protocol ); ?>://www.reddit.com/submit?url=<?php echo urlencode( get_permalink() ); ?>&amp;title=<?php echo htmlspecialchars( $post_title, ENT_COMPAT, 'UTF-8' ); ?>" title="Reddit" aria-label="Reddit"><i class="rbi rbi-reddit"></i></a>
		<?php endif;

		if ( ! empty( $settings['vk'] ) ) : ?>
            <a class="share-action share-icon share-vk" rel="noopener nofollow" href="<?php echo esc_attr( $protocol ); ?>://vkontakte.ru/share.php?url=<?php echo urlencode( get_permalink() ); ?>" title="VKontakte" aria-label="VKontakte"><i class="rbi rbi-vk"></i></a>
		<?php endif;

		if ( ! empty( $settings['telegram'] ) ) : ?>
            <a class="share-action share-icon share-telegram" rel="noopener nofollow" href="<?php echo esc_attr( $protocol ); ?>://t.me/share/?url=<?php echo urlencode( get_permalink() ); ?>&amp;text=<?php echo htmlspecialchars( $post_title, ENT_COMPAT, 'UTF-8' ); ?>" title="Telegram" aria-label="Telegram"><i class="rbi rbi-telegram"></i></a>
		<?php endif;

		if ( ! empty( $settings['email'] ) ) : ?>
            <a class="share-icon share-email" rel="noopener nofollow" href="mailto:?subject=<?php echo get_the_title(); ?>&amp;BODY=<?php echo pixwell_translate( 'share_email_info' ) . ' ' . urlencode( get_permalink() ); ?>" title="Email" aria-label="Email"><i class="rbi rbi-email-envelope"></i></a>
		<?php endif;
	}
endif;


if ( ! function_exists( 'pixwell_render_share_text' ) ):
	function pixwell_render_share_text( $settings = array() ) {

		$protocol     = pixwell_protocol();
		$twitter_user = pixwell_get_twitter_name();
		$post_title   = urlencode( html_entity_decode( get_the_title(), ENT_COMPAT, 'UTF-8' ) );

		if ( ! empty( $settings['facebook'] ) ) : ?>
            <a class="share-action share-icon share-facebook" rel="noopener nofollow" href="<?php echo esc_attr( $protocol ); ?>://www.facebook.com/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>" title="Facebook" aria-label="Facebook"><i class="rbi rbi-facebook"></i><span><?php echo pixwell_translate( 'share_facebook' ) ?></span></a>
		<?php endif;
		if ( ! empty( $settings['twitter'] ) ) : ?>
            <a class="share-action share-twitter share-icon" rel="noopener nofollow" href="https://twitter.com/intent/tweet?text=<?php echo htmlspecialchars( $post_title, ENT_COMPAT, 'UTF-8' ); ?>&amp;url=<?php echo urlencode( get_permalink() ); ?>&amp;via=<?php echo urlencode( $twitter_user ); ?>" title="Twitter" aria-label="Twitter">
                <i class="rbi rbi-x-twitter"></i><span><?php echo pixwell_translate( 'share_twitter' ) ?></span> </a>
		<?php endif;

		if ( ! empty( $settings['pinterest'] ) ) :
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'pixwell_780x0-2x' );
			if ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) and get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true ) != '' ) {
				$pinterest_description = get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true );
			} else {
				$pinterest_description = $post_title;
			} ?>
            <a class="share-action share-icon share-pinterest" rel="noopener nofollow" href="<?php echo esc_attr( $protocol ); ?>://pinterest.com/pin/create/button/?url=<?php echo urlencode( get_permalink() ); ?>&amp;media=<?php if ( ! empty( $image[0] ) ) {
				echo( esc_url( $image[0] ) );
			} ?>&amp;description=<?php echo htmlspecialchars( $pinterest_description, ENT_COMPAT, 'UTF-8' ); ?>" title="Pinterest" aria-label="Pinterest"><i class="rbi rbi-pinterest"></i><span><?php echo pixwell_translate( 'share_pinterest' ) ?></span></a>
		<?php endif;

		if ( ! empty( $settings['whatsapp'] ) ) : ?>
            <a class="share-icon share-whatsapp is-web" rel="noopener nofollow" href="<?php echo esc_attr( $protocol ); ?>://web.whatsapp.com/send?text=<?php echo htmlspecialchars( $post_title, ENT_COMPAT, 'UTF-8' ) . ' &#9758; ' . urlencode( get_permalink() ); ?>" target="_blank" title="WhatsApp" aria-label="WhatsApp"><i class="rbi rbi-whatsapp"></i><span><?php echo pixwell_translate( 'share_whatsapp' ) ?></span></a>
            <a class="share-icon share-whatsapp is-mobile" rel="noopener nofollow" href="whatsapp://send?text=<?php echo htmlspecialchars( $post_title, ENT_COMPAT, 'UTF-8' ) . ' &#9758; ' . urlencode( get_permalink() ); ?>" target="_blank" title="WhatsApp" aria-label="WhatsApp"><i class="rbi rbi-whatsapp"></i><span><?php echo pixwell_translate( 'share_whatsapp' ) ?></span></a>
		<?php endif;

		if ( ! empty( $settings['linkedin'] ) ) : ?>
            <a class="share-action share-icon share-linkedin" rel="noopener nofollow" href="<?php echo esc_attr( $protocol ); ?>://linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode( get_permalink() ); ?>&amp;title=<?php echo htmlspecialchars( $post_title, ENT_COMPAT, 'UTF-8' ); ?>" title="linkedIn" aria-label="linkedIn"><i class="rbi rbi-linkedin"></i><span><?php echo pixwell_translate( 'share_linkedin' ) ?></span></a>
		<?php endif;

		if ( ! empty( $settings['tumblr'] ) ) : ?>
            <a class="share-action share-icon share-tumblr" rel="noopener nofollow" href="<?php echo esc_attr( $protocol ); ?>://www.tumblr.com/share/link?url=<?php echo urlencode( get_permalink() ); ?>&amp;name=<?php echo htmlspecialchars( $post_title, ENT_COMPAT, 'UTF-8' ); ?>&amp;description=<?php echo htmlspecialchars( $post_title, ENT_COMPAT, 'UTF-8' ); ?>" title="Tumblr" aria-label="Tumblr"><i class="rbi rbi-tumblr"></i><span><?php echo pixwell_translate( 'share_tumblr' ) ?></span></a>
		<?php endif;

		if ( ! empty( $settings['reddit'] ) ) : ?>
            <a class="share-action share-icon share-reddit" rel="noopener nofollow" href="<?php echo esc_attr( $protocol ); ?>://www.reddit.com/submit?url=<?php echo urlencode( get_permalink() ); ?>&amp;title=<?php echo htmlspecialchars( $post_title, ENT_COMPAT, 'UTF-8' ); ?>" title="Reddit" aria-label="Reddit"><i class="rbi rbi-reddit"></i><span><?php echo pixwell_translate( 'share_reddit' ) ?></span></a>
		<?php endif;

		if ( ! empty( $settings['vk'] ) ) : ?>
            <a class="share-action share-icon share-vk" rel="noopener nofollow" href="<?php echo esc_attr( $protocol ); ?>://vkontakte.ru/share.php?url=<?php echo urlencode( get_permalink() ); ?>" title="VKontakte" aria-label="VKontakte"><i class="rbi rbi-vk"></i><span><?php echo pixwell_translate( 'share_vk' ) ?></span></a>
		<?php endif;

		if ( ! empty( $settings['telegram'] ) ) : ?>
            <a class="share-action share-icon share-telegram" rel="noopener nofollow" href="<?php echo esc_attr( $protocol ); ?>://t.me/share/?url=<?php echo urlencode( get_permalink() ); ?>&amp;text=<?php echo htmlspecialchars( $post_title, ENT_COMPAT, 'UTF-8' ); ?>" title="Telegram" aria-label="Telegram"><i class="rbi rbi-telegram"></i><span><?php echo pixwell_translate( 'share_telegram' ) ?></span></a>
		<?php endif;

		if ( ! empty( $settings['email'] ) ) : ?>
            <a class="share-icon share-email" rel="noopener nofollow" href="mailto:?subject=<?php echo get_the_title(); ?>&amp;BODY=<?php echo pixwell_translate( 'share_email_info' ) . ' ' . urlencode( get_permalink() ); ?>" title="Email" aria-label="Email"><i class="rbi rbi-email-envelope"></i><span><?php echo pixwell_translate( 'share_email' ) ?></span></a>
		<?php endif;
	}
endif;