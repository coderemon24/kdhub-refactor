<?php
/** footer logo */
$pixwell_logo         = pixwell_get_option( 'footer_logo' );
$pixwell_logo_dark    = pixwell_get_option( 'footer_logo_dark' );
$pixwell_menu         = pixwell_get_option( 'footer_menu' );
$pixwell_social_color = pixwell_get_option( 'footer_social_color' );
$pixwell_footer_link  = ! empty( pixwell_get_option( 'footer_logo_url' ) ) ? pixwell_get_option( 'footer_logo_url' ) : home_url( '/' );

if ( pixwell_get_option( 'footer_social' ) ) {
	$pixwell_social_render = pixwell_render_social_icons( pixwell_get_web_socials() );
}

if ( empty( $pixwell_logo['url'] ) && ( empty( $pixwell_menu ) || ! has_nav_menu( 'pixwell_menu_footer' ) ) && empty( $pixwell_social_render ) ) {
	return false;
}

$pixwell_height   = ! empty( $pixwell_logo['height'] ) ? $pixwell_logo['height'] : '';
$pixwell_width    = ! empty( $pixwell_logo['width'] ) ? $pixwell_logo['width'] : '';
$pixwell_logo_alt = ! empty( $pixwell_logo['alt'] ) ? $pixwell_logo['alt'] : get_bloginfo( 'name' );

?>
<div class="footer-logo footer-section">
	<div class="rbc-container footer-logo-inner  rb-p20-gutter">
		<?php if ( ! empty( $pixwell_logo['url'] ) ):
			$pixwell_classname = 'footer-logo-wrap';
			if ( pathinfo( $pixwell_logo['url'], PATHINFO_EXTENSION ) === 'svg' ) {
				$pixwell_classname .= ' is-svg';
			} ?>
			<div class="<?php echo esc_attr( $pixwell_classname ); ?>">
				<a href="<?php echo esc_url( $pixwell_footer_link ); ?>" class="footer-logo">
					<img loading="lazy" decoding="async" <?php if ( ! empty( $pixwell_logo_dark['url'] ) ) { echo ' data-mode="default" '; } ?> height="<?php echo esc_attr( $pixwell_height ); ?>" width="<?php echo esc_attr( $pixwell_width ); ?>" src="<?php echo esc_url( $pixwell_logo['url'] ) ?>" alt="<?php echo esc_attr( $pixwell_logo_alt ); ?>">
					<?php if ( ! empty( $pixwell_logo_dark['url'] ) ) : ?>
					<img loading="lazy" decoding="async" data-mode="dark" height="<?php echo esc_attr( $pixwell_height ); ?>" width="<?php echo esc_attr( $pixwell_width ); ?>" src="<?php echo esc_url( $pixwell_logo_dark['url'] ) ?>" alt="<?php echo esc_attr( $pixwell_logo_alt ); ?>">
					<?php endif; ?>
				</a>
			</div>
		<?php endif;

		if ( ! empty( $pixwell_social_render ) ) :
			$pixwell_social_classes = 'footer-social-wrap';
			if ( ! empty( $pixwell_social_color ) ) {
				$pixwell_social_classes .= ' is-color';
			} ?>
			<div class="<?php echo esc_attr( $pixwell_social_classes ); ?>">
				<div class="footer-social social-icons is-bg-icon tooltips-s"><?php echo pixwell_render_social_icons( pixwell_get_web_socials(), true ); ?></div>
			</div>
		<?php endif;

		if ( ! empty( $pixwell_menu ) && has_nav_menu( 'pixwell_menu_footer' ) ) {
			wp_nav_menu( [
				'theme_location' => 'pixwell_menu_footer',
				'menu_id'        => 'footer-menu',
				'container'      => false,
				'menu_class'     => 'footer-menu-inner',
				'depth'          => 1,
				'echo'           => true,
			] );
		} ?>
	</div>
</div>