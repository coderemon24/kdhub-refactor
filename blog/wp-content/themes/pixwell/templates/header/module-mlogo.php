<?php
/** mobile logo */
$pixwell_logo      = pixwell_get_option( 'mobile_logo' );
$pixwell_logo_dark = pixwell_get_option( 'mobile_logo_dark' );

if ( pixwell_is_amp() ) {
	$pixwell_logo_dark = [];
}

if ( empty( $pixwell_logo['url'] ) ) {
	$pixwell_logo = pixwell_get_option( 'retina_site_logo' );
}
if ( empty( $pixwell_logo['url'] ) ) {
	$pixwell_logo = pixwell_get_option( 'site_logo' );
}

if ( empty( $pixwell_logo['url'] ) ) {
	pixwell_logo_text( 'mobile-log-text', false );

	return;
}
$pixwell_height   = ! empty( $pixwell_logo['height'] ) ? $pixwell_logo['height'] : '';
$pixwell_width    = ! empty( $pixwell_logo['width'] ) ? $pixwell_logo['width'] : '';
$pixwell_logo_alt = ! empty( $pixwell_logo['alt'] ) ? $pixwell_logo['alt'] : get_bloginfo( 'name' );

$pixwell_classname = 'logo-mobile-wrap is-logo-image';

if ( pathinfo( $pixwell_logo['url'], PATHINFO_EXTENSION ) === 'svg' ) {
	$pixwell_classname .= ' is-svg';
} ?>
<aside class="<?php echo esc_attr( $pixwell_classname ); ?>">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-mobile">
		<img decoding="async" <?php if ( ! empty( $pixwell_logo_dark['url'] ) ) {
			echo ' data-mode="default" ';
		} ?> height="<?php echo esc_attr( $pixwell_height ); ?>" width="<?php echo esc_attr( $pixwell_width ); ?>" src="<?php echo esc_url( $pixwell_logo['url'] ) ?>" alt="<?php echo esc_attr( $pixwell_logo_alt ); ?>">
		<?php if ( ! empty( $pixwell_logo_dark['url'] ) ) : ?>
			<img decoding="async" data-mode="dark" height="<?php echo esc_attr( $pixwell_height ); ?>" width="<?php echo esc_attr( $pixwell_width ); ?>" src="<?php echo esc_url( $pixwell_logo_dark['url'] ) ?>" alt="<?php echo esc_attr( $pixwell_logo_alt ); ?>">
		<?php endif; ?>
	</a>
</aside>