<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

add_action( 'admin_notices', 'pixwell_update_settings_notices', 20 );

if ( ! function_exists( 'pixwell_update_settings_notices' ) ) {
	function pixwell_update_settings_notices() {

		$current_screen = get_current_screen();

		if ( ! $current_screen || $current_screen->id !== 'toplevel_page_pixwell_options' ) {
			return false;
		}

		$settings  = get_option( 'pixwell_theme_options', [] );
		$demo_host = 'themeruby.com';
		$parts     = parse_url( get_site_url() );

		if ( ! is_array( $settings ) || empty( $parts['host'] ) || $demo_host === $parts['host'] || false !== strpos( $parts['host'], 'localhost' ) ) {
			return false;
		}

		$buffer = pixwell_get_setting_notices( $settings, $parts['host'], $demo_host );

		if ( empty( $buffer ) ) {
			return false;
		}

		echo '<div class="notice notice-warning rb-setting-warning is-dismissible">';
		echo '<h4>Important: Please update images after import a demo</h4>';
		echo '<p>These are the settings that need to be updated:</p><ul>' . $buffer . '</ul>';
		echo '</div>';
	}
}

if ( ! function_exists( 'pixwell_get_setting_notices' ) ) {
	function pixwell_get_setting_notices( $settings, $host, $demo ) {

		$output = '';

		foreach ( $settings as $id => $setting ) {
			if ( ! empty( $setting['url'] ) ) {
				if ( ! strpos( $setting['url'], $host ) || strpos( $setting['url'], $demo ) !== false ) {
					$output .= '<li><strong>' . pixwell_setting_info( $id ) . ': </strong><span class="url-info">' . $setting['url'] . '</span></li>';
				}
			}
		}

		return $output;
	}
}

if ( ! function_exists( 'pixwell_setting_info' ) ) {
	function pixwell_setting_info( $id ) {

		$data = [
			'site_logo'               => esc_html__( 'Logo > Main Logo', 'pixwell-core' ),
			'site_logo_dark'          => esc_html__( 'Logo > Dark Mode - Main Logo', 'pixwell-core' ),
			'mobile_logo'             => esc_html__( 'Logo > Mobile Logo', 'pixwell-core' ),
			'mobile_logo_dark'        => esc_html__( 'Logo > Dark Mod - Mobile Logo', 'pixwell-core' ),
			'sticky_logo'             => esc_html__( 'Logo > Sticky Logo', 'pixwell-core' ),
			'sticky_logo_dark'        => esc_html__( 'Logo > Dark Mode - Sticky Logo', 'pixwell-core' ),
			'site_logo_float'         => esc_html__( 'Logo > Transparent Logo', 'pixwell-core' ),
			'off_canvas_header_logo'  => esc_html__( 'Logo > Left Side Logo', 'pixwell-core' ),
			'footer_logo'             => esc_html__( 'Logo > Footer Logo', 'pixwell-core' ),
			'footer_logo_dark'        => esc_html__( 'Logo > Dark Mode - Footer Logo', 'pixwell-core' ),
			'cat_header_image_bg'     => esc_html__( 'Category > Category Header > Background Image', 'pixwell-core' ),
			'icon_touch_apple'        => esc_html__( 'General > iOS Bookmarklet Icon', 'pixwell-core' ),
			'icon_touch_metro'        => esc_html__( 'General > Metro UI Bookmarklet Icon', 'pixwell-core' ),
			'header_subscribe_image'  => esc_html__( 'Header > Header Styles > for Header Style 3, 6 & 7 > Header Banner - Subscribe Thumbnail', 'pixwell-core' ),
			'off_canvas_header_bg'    => esc_html__( 'Left Side Section > Top - Background Image', 'pixwell-core' ),
			'facebook_default_img'    => esc_html__( 'SEO Settings > Facebook Default Image', 'pixwell-core' ),
			'newsletter_popup_cover'  => esc_html__( 'Newsletter Popup > Cover Image', 'pixwell-core' ),
			'amp_footer_logo'         => esc_html__( 'AMP > Footer Logo', 'pixwell-core' ),
		];

		if ( ! empty( $data[ $id ] ) ) {
			return $data[ $id ];
		}

		return false;
	}
}