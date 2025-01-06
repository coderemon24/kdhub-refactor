<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_register_options_social_profile' ) ) {
	function pixwell_register_options_social_profile() {

		return [
			'id'     => 'social_theme_options_section_social_profile',
			'title'  => esc_html__( 'Site Social Profiles', 'pixwell' ),
			'desc'   => esc_html__( 'Customize the social profiles for your site.', 'pixwell' ),
			'icon'   => 'el el-twitter',
			'fields' => [
				[
					'id'    => 'info_social_user_profile',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => esc_html__( 'The settings below apply to your website. To add social links for a user, navigate to "Users -> Profile".', 'pixwell' ),
				],
				[
					'id'     => 'section_start_social_profile',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Social Profiles', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'social_facebook',
					'type'     => 'text',
					'title'    => esc_html__( 'Facebook URL', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your site social profile URL.', 'pixwell' ),
					'default'  => '',
				],
				[
					'id'       => 'social_twitter',
					'type'     => 'text',
					'title'    => esc_html__( 'Twitter URL', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your site social profile URL.', 'pixwell' ),
					'default'  => '',
				],
				[
					'id'       => 'social_instagram',
					'type'     => 'text',
					'title'    => esc_html__( 'Instagram URL', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your site social profile URL.', 'pixwell' ),
					'default'  => '',
				],
				[
					'id'       => 'social_pinterest',
					'type'     => 'text',
					'title'    => esc_html__( 'Pinterest URL', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your site social profile URL.', 'pixwell' ),
					'default'  => '',
				],
				[
					'id'       => 'social_linkedin',
					'type'     => 'text',
					'title'    => esc_html__( 'LinkedIn URL', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your site social profile URL.', 'pixwell' ),
				],
				[
					'id'       => 'social_tumblr',
					'type'     => 'text',
					'title'    => esc_html__( 'Tumblr URL ', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your site social profile URL.', 'pixwell' ),
				],
				[
					'id'       => 'social_flickr',
					'type'     => 'text',
					'title'    => esc_html__( 'Flickr URL', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your site social profile URL.', 'pixwell' ),
				],
				[
					'id'       => 'social_skype',
					'type'     => 'text',
					'title'    => esc_html__( 'Skype URL', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your site social profile URL.', 'pixwell' ),
				],
				[
					'id'       => 'social_snapchat',
					'type'     => 'text',
					'title'    => esc_html__( 'Snapchat URL', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your site social profile URL.', 'pixwell' ),
				],
				[
					'id'       => 'social_myspace',
					'type'     => 'text',
					'title'    => esc_html__( 'Myspace URL', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your site social profile URL.', 'pixwell' ),
				],
				[
					'id'       => 'social_youtube',
					'type'     => 'text',
					'title'    => esc_html__( 'Youtube URL ', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your site social profile URL.', 'pixwell' ),
				],
				[
					'id'       => 'social_bloglovin',
					'type'     => 'text',
					'title'    => esc_html__( 'Bloglovin URL', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your site social profile URL.', 'pixwell' ),
				],
				[
					'id'       => 'social_digg',
					'type'     => 'text',
					'title'    => esc_html__( 'Digg URL', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your site social profile URL.', 'pixwell' ),
				],
				[
					'id'       => 'social_dribbble',
					'type'     => 'text',
					'title'    => esc_html__( 'Dribbble URL', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your site social profile URL.', 'pixwell' ),
				],
				[
					'id'       => 'social_soundcloud',
					'type'     => 'text',
					'title'    => esc_html__( 'Soundcloud URL', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your site social profile URL.', 'pixwell' ),
				],
				[
					'id'       => 'social_vimeo',
					'type'     => 'text',
					'title'    => esc_html__( 'Vimeo URL ', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your site social profile URL.', 'pixwell' ),
				],
				[
					'id'       => 'social_reddit',
					'type'     => 'text',
					'title'    => esc_html__( 'Reddit URL ', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your site social profile URL.', 'pixwell' ),
				],
				[
					'id'       => 'social_vk',
					'type'     => 'text',
					'title'    => esc_html__( 'VKontakte URL ', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your site social profile URL.', 'pixwell' ),
				],
				[
					'id'       => 'social_telegram',
					'type'     => 'text',
					'title'    => esc_html__( 'Telegram URL ', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your site social profile URL.', 'pixwell' ),
				],
				[
					'id'       => 'social_whatsapp',
					'type'     => 'text',
					'title'    => esc_html__( 'Whatsapp URL ', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your site social profile URL.', 'pixwell' ),
				],
				[
					'id'       => 'social_rss',
					'type'     => 'text',
					'title'    => esc_html__( 'Rss URL ', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your site social profile URL.', 'pixwell' ),
				],
				[
					'id'     => 'section_end_social_profile',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'       => 'section_start_social_profile_custom',
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'Custom Socials', 'pixwell' ),
					'subtitle' => esc_html__( 'Find CSS classname of icons here: https://icons.themeruby.com/pixwell/', 'pixwell' ),
					'indent'   => true,
				],
				[
					'id'       => 'social_custom_1_url',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom social 1 - URL', 'pixwell' ),
					'subtitle' => esc_html__( 'input a social profile URL.', 'pixwell' ),
				],
				[
					'id'       => 'social_custom_1_name',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom Social 1 - Name', 'pixwell' ),
					'subtitle' => esc_html__( 'input a name of the social, for example: facebook, twitter.', 'pixwell' ),
				],
				[
					'id'       => 'social_custom_1_icon',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom Social 1 - Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'input a CSS classname for the social icon, for example: rbi rbi-facebook.', 'pixwell' ),
					'default'  => '',
				],
				[
					'id'          => 'social_custom_1_color',
					'type'        => 'color',
					'transparent' => false,

					'title'    => esc_html__( 'Custom Social 1 - Color', 'pixwell' ),
					'subtitle' => esc_html__( 'select a color for this social icon.', 'pixwell' ),
				],
				[
					'id'       => 'social_custom_2_url',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom social 2 - URL', 'pixwell' ),
					'subtitle' => esc_html__( 'input a social profile URL.', 'pixwell' ),
				],
				[
					'id'       => 'social_custom_2_name',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom Social 2 - Name', 'pixwell' ),
					'subtitle' => esc_html__( 'input a name of the social, for example: facebook, twitter.', 'pixwell' ),
				],
				[
					'id'       => 'social_custom_2_icon',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom Social 2 - Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'input a CSS classname for the social icon, for example: rbi rbi-facebook.', 'pixwell' ),
					'default'  => '',
				],
				[
					'id'          => 'social_custom_2_color',
					'type'        => 'color',
					'transparent' => false,

					'title'    => esc_html__( 'Custom Social 2 - Color', 'pixwell' ),
					'subtitle' => esc_html__( 'select a color for this social icon.', 'pixwell' ),
				],
				[
					'id'       => 'social_custom_3_url',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom social 3 - URL', 'pixwell' ),
					'subtitle' => esc_html__( 'input a social profile URL.', 'pixwell' ),
				],
				[
					'id'       => 'social_custom_3_name',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom Social 3 - Name', 'pixwell' ),
					'subtitle' => esc_html__( 'input a name of the social, for example: facebook, twitter.', 'pixwell' ),
				],
				[
					'id'       => 'social_custom_3_icon',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom Social 3 - Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'input a CSS classname for the social icon, for example: rbi rbi-facebook.', 'pixwell' ),
					'default'  => '',
				],
				[
					'id'          => 'social_custom_3_color',
					'type'        => 'color',
					'transparent' => false,

					'title'    => esc_html__( 'Custom Social 3 - Color', 'pixwell' ),
					'subtitle' => esc_html__( 'select a color for this social icon.', 'pixwell' ),
				],
				[
					'id'     => 'section_end_social_profile_custom',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}