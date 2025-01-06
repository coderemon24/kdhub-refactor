<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

/** multi sidebars action */
add_action( 'widgets_init', 'pixwell_register_all_sidebars' );

if ( ! function_exists( 'pixwell_register_all_sidebars' ) ) {
	function pixwell_register_all_sidebars() {

		$theme_options = get_option( 'pixwell_theme_options' );

		if ( ! empty( $theme_options['widget_heading_tag'] ) ) {
			$h_tag   = $theme_options['widget_heading_tag'];
			$h_class = $theme_options['widget_heading_tag'];
		} else {
			$h_tag   = 'h2';
			$h_class = 'h4';
		}

		if ( ! empty( $theme_options['pixwell_multi_sidebar'] ) && is_array( $theme_options['pixwell_multi_sidebar'] ) ) {
			$data_sidebar = [];
			foreach ( $theme_options['pixwell_multi_sidebar'] as $sidebar ) {
				if ( ! empty( $sidebar ) ) {
					array_push( $data_sidebar, [
						'id'   => 'pixwell_sidebar_multi_' . pixwell_convert_to_id( trim( $sidebar ) ),
						'name' => strip_tags( $sidebar ),
					] );
				}
			}

			foreach ( $data_sidebar as $sidebar ) {
				if ( ! empty( $sidebar['id'] ) && ! empty( $sidebar['name'] ) ) {
					register_sidebar( [
						'id'            => $sidebar['id'],
						'name'          => $sidebar['name'],
						'description'   => esc_html__( 'This is a custom sidebar section of the website created via Theme Options panel.', 'pixwell' ),
						'before_widget' => '<div id="%1$s" class="widget w-sidebar %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<' . $h_tag . ' class="widget-title ' . $h_class . '">',
						'after_title'   => '</' . $h_tag . '>',
					] );
				}
			};
		}

		register_sidebar( [
			'id'            => 'pixwell_sidebar_default',
			'name'          => esc_html__( 'Default Sidebar', 'pixwell' ),
			'description'   => esc_html__( 'This is the default sidebar of the website.', 'pixwell' ),
			'before_widget' => '<div id="%1$s" class="widget w-sidebar %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<' . $h_tag . ' class="widget-title ' . $h_class . '">',
			'after_title'   => '</' . $h_tag . '>',
		] );
		register_sidebar( [
			'id'            => 'pixwell_sidebar_topsite',
			'name'          => esc_html__( 'Top Website - FullWidth Section', 'pixwell' ),
			'description'   => esc_html__( 'This is a full-width section at the top of your site. It is typically used to display advertisements or HTML notice boards.', 'pixwell' ),
			'before_widget' => '<div id="%1$s" class="widget topsite-sidebar %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<' . $h_tag . ' class="widget-title ' . $h_class . '">',
			'after_title'   => '</' . $h_tag . '>',
		] );
		register_sidebar( [
			'id'            => 'pixwell_header_rnav',
			'name'          => esc_html__( 'Header - Right Menu Bar Section', 'pixwell' ),
			'description'   => esc_html__( 'This is a small section located at the right side of the main navigation bar. It is designed for Call to Action buttons or a Language switcher bar.', 'pixwell' ),
			'before_widget' => '<aside id="%1$s" class="rnav-element %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<' . $h_tag . ' class="widget-title ' . $h_class . '">',
			'after_title'   => '</' . $h_tag . '>',
		] );
		register_sidebar( [
			'id'            => 'pixwell_sidebar_below_nav',
			'name'          => esc_html__( 'Header - Below Menu Bar Section', 'pixwell' ),
			'description'   => esc_html__( 'This is a full-width section located below the navigation bar. It is designed to display the popular posts widget.', 'pixwell' ),
			'before_widget' => '<div id="%1$s" class="widget topsite-sidebar %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<' . $h_tag . ' class="widget-title ' . $h_class . '">',
			'after_title'   => '</' . $h_tag . '>',
		] );
		register_sidebar( [
			'id'            => 'pixwell_header_ad',
			'name'          => esc_html__( 'Header - Advert Section', 'pixwell' ),
			'description'   => esc_html__( 'This section displays an advertisement in the site header. Its position depends on the header style setting in the Theme Options panel.', 'pixwell' ),
			'before_widget' => '<aside id="%1$s" class="header-advert-section %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<' . $h_tag . ' class="widget-title ' . $h_class . '">',
			'after_title'   => '</' . $h_tag . '>',
		] );
		register_sidebar( [
			'id'            => 'pixwell_sidebar_fw_footer',
			'name'          => esc_html__( 'Top Footer - Full Width Section', 'pixwell' ),
			'description'   => esc_html__( 'This is the full-width section at the top of the footer area.', 'pixwell' ),
			'before_widget' => '<div id="%1$s" class="widget w-sidebar %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<' . $h_tag . ' class="widget-title ' . $h_class . '">',
			'after_title'   => '</' . $h_tag . '>',
		] );
		register_sidebar( [
			'id'            => 'pixwell_sidebar_footer_1',
			'name'          => esc_html__( 'Footer - Column 1', 'pixwell' ),
			'description'   => esc_html__( 'This is one of the columns in the footer area.', 'pixwell' ),
			'before_widget' => '<div id="%1$s" class="widget w-sidebar w-footer %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<' . $h_tag . ' class="widget-title ' . $h_class . '">',
			'after_title'   => '</' . $h_tag . '>',
		] );
		register_sidebar( [
			'id'            => 'pixwell_sidebar_footer_2',
			'name'          => esc_html__( 'Footer - Column 2', 'pixwell' ),
			'description'   => esc_html__( 'This is one of the columns in the footer area.', 'pixwell' ),
			'before_widget' => '<div id="%1$s" class="widget w-sidebar w-footer %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<' . $h_tag . ' class="widget-title ' . $h_class . '">',
			'after_title'   => '</' . $h_tag . '>',
		] );
		register_sidebar( [
			'id'            => 'pixwell_sidebar_footer_3',
			'name'          => esc_html__( 'Footer - Column 3', 'pixwell' ),
			'description'   => esc_html__( 'This is one of the columns in the footer area.', 'pixwell' ),
			'before_widget' => '<div id="%1$s" class="widget w-sidebar w-footer %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<' . $h_tag . ' class="widget-title ' . $h_class . '">',
			'after_title'   => '</' . $h_tag . '>',
		] );

		register_sidebar( [
			'id'            => 'pixwell_sidebar_footer_4',
			'name'          => esc_html__( 'Footer - Column 4', 'pixwell' ),
			'description'   => esc_html__( 'This is one of the columns in the footer area.', 'pixwell' ),
			'before_widget' => '<div id="%1$s" class="widget w-sidebar w-footer %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title h4">',
			'after_title'   => '</h2>',
		] );

		register_sidebar( [
			'id'            => 'pixwell_sidebar_offcanvas',
			'name'          => esc_html__( 'Left Side Section', 'pixwell' ),
			'description'   => esc_html__( 'This is the hidden section located on the left side of your site. It contains the mobile menu and widgets.', 'pixwell' ),
			'before_widget' => '<div id="%1$s" class="widget w-sidebar w-footer %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<' . $h_tag . ' class="widget-title ' . $h_class . '">',
			'after_title'   => '</' . $h_tag . '>',
		] );
		register_sidebar( [
			'id'            => 'pixwell_single_top',
			'name'          => esc_html__( 'Single Content - Top Advert Section', 'pixwell' ),
			'description'   => esc_html__( 'This section appears at the top of the single post content. It is typically used to display advertisements or a subscription form.', 'pixwell' ),
			'before_widget' => '<div id="%1$s" class="widget w-sidebar %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<' . $h_tag . ' class="widget-title ' . $h_class . '">',
			'after_title'   => '</' . $h_tag . '>',
		] );
		register_sidebar( [
			'id'            => 'pixwell_single_bottom',
			'name'          => esc_html__( 'Single Content - Bottom Advert Section', 'pixwell' ),
			'description'   => esc_html__( 'This section appears at the bottom of the single post content. It is typically used to display advertisements or a subscription form.', 'pixwell' ),
			'before_widget' => '<div id="%1$s" class="widget w-sidebar %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<' . $h_tag . ' class="widget-title ' . $h_class . '">',
			'after_title'   => '</' . $h_tag . '>',
		] );
	}
}