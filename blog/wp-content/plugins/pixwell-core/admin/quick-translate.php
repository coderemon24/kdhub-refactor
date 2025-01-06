<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_translate' ) ) {
	function pixwell_translate( $text = null ) {

		if ( empty( $text ) ) {
			return false;
		}

		$text             = trim( $text );
		$translation_data = pixwell_translation_default();

		$key       = 't_' . $text;
		$translate = pixwell_get_option( $key );
		if ( ! empty( $translate ) ) {
			return esc_html( $translate );
		}

		if ( isset( $translation_data[ $text ] ) ) {
			return $translation_data[ $text ];
		}

		return false;
	}
}

/**
 * @return array|mixed|void
 * return default data
 */
if ( ! function_exists( 'pixwell_translation_default' ) ) {
	function pixwell_translation_default() {

		$translation_data = [
			'share_email'    => esc_html__( 'I found this article interesting and thought of sharing it with you. Check it out:', 'pixwell-core' ),
			'read_later'     => esc_html__( 'Read it Later', 'pixwell-core' ),
			'bookmark_empty' => esc_html__( 'Please add some posts to see your added bookmarks.', 'pixwell-core' ),
			'facebook'       => esc_html__( 'Facebook', 'pixwell-core' ),
			'fans'           => esc_html__( 'fans', 'pixwell-core' ),
			'like'           => esc_html__( 'like', 'pixwell-core' ),
			'twitter'        => esc_html__( 'Twitter', 'pixwell-core' ),
			'followers'      => esc_html__( 'followers', 'pixwell-core' ),
			'follow'         => esc_html__( 'follow', 'pixwell-core' ),
			'pinterest'      => esc_html__( 'Pinterest', 'pixwell-core' ),
			'pin'            => esc_html__( 'pin', 'pixwell-core' ),
			'instagram'      => esc_html__( 'Instagram', 'pixwell-core' ),
			'love'           => esc_html__( 'Love', 'pixwell-core' ),
			'sad'            => esc_html__( 'Sad', 'pixwell-core' ),
			'happy'          => esc_html__( 'Happy', 'pixwell-core' ),
			'sleepy'         => esc_html__( 'Sleepy', 'pixwell-core' ),
			'angry'          => esc_html__( 'Angry', 'pixwell-core' ),
			'dead'           => esc_html__( 'Dead', 'pixwell-core' ),
			'wink'           => esc_html__( 'Wink', 'pixwell-core' ),
			'page'           => esc_html__( 'Page', 'pixwell-core' ),
			'telegram'       => esc_html__( 'Telegram', 'pixwell-core' ),
			'members'        => esc_html__( 'Members', 'pixwell-core' ),
			'join'           => esc_html__( 'Join', 'pixwell-core' ),
		];

		$translation_data = apply_filters( 'pixwell_translation_data', $translation_data );

		return $translation_data;
	}
}
