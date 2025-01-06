<?php
$pixwell_logo             = pixwell_get_option( 'sticky_logo' );
$pixwell_logo_retina      = pixwell_get_option( 'retina_sticky_logo' );
$pixwell_logo_dark        = pixwell_get_option( 'sticky_logo_dark' );
$pixwell_logo_retina_dark = pixwell_get_option( 'retina_sticky_logo_dark' );

/** use default */
if ( empty( $pixwell_logo['url'] ) ) {
	$pixwell_logo             = pixwell_get_option( 'site_logo' );
	$pixwell_logo_retina      = pixwell_get_option( 'retina_site_logo' );
	$pixwell_logo_dark        = pixwell_get_option( 'site_logo_dark' );
	$pixwell_logo_retina_dark = pixwell_get_option( 'retina_site_logo_dark' );
}

if ( empty( $pixwell_logo['url'] ) ) {
	pixwell_logo_text( 'logo-sticky-text', false );

	return;
}

$pixwell_logo_name = get_bloginfo( 'name' );
$pixwell_url       = home_url( '/' );

$pixwell_classname = 'logo-wrap is-logo-image site-branding';
if ( pathinfo( $pixwell_logo['url'], PATHINFO_EXTENSION ) === 'svg' ) {
	$pixwell_classname .= ' is-svg';
}
$pixwell_height = ! empty( $pixwell_logo['height'] ) ? $pixwell_logo['height'] : '';
$pixwell_width  = ! empty( $pixwell_logo['width'] ) ? $pixwell_logo['width'] : '';
?>
<div class="<?php echo esc_attr( $pixwell_classname ); ?>">
	<a href="<?php echo esc_url( $pixwell_url ); ?>" class="logo" title="<?php echo esc_attr( $pixwell_logo_name ) ?>">
		<?php if ( empty( $pixwell_logo_retina['url'] ) ) : ?>
			<img decoding="async" loading="lazy" class="logo-default"  <?php if ( ! empty( $pixwell_logo_dark['url'] ) ) { echo ' data-mode="default" '; } ?> height="<?php echo esc_attr( $pixwell_height ); ?>" width="<?php echo esc_attr( $pixwell_width ); ?>" src="<?php echo esc_url( $pixwell_logo['url'] ) ?>" alt="<?php echo esc_attr( $pixwell_logo_name ); ?>">
			<?php if ( ! empty( $pixwell_logo_dark['url'] ) ) : ?>
				<img decoding="async" loading="lazy" class="logo-default logo-dark" data-mode="dark" height="<?php echo esc_attr( $pixwell_height ); ?>" width="<?php echo esc_attr( $pixwell_width ); ?>" src="<?php echo esc_url( $pixwell_logo_dark['url'] ) ?>" alt="<?php echo esc_attr( $pixwell_logo_name ); ?>">
			<?php endif; ?>
		<?php else: ?>
			<img decoding="async" loading="lazy" class="logo-default logo-retina" <?php if ( ! empty( $pixwell_logo_retina_dark['url'] ) ) { echo ' data-mode="default" '; } ?> height="<?php echo esc_attr( $pixwell_height ); ?>" width="<?php echo esc_attr( $pixwell_width ); ?>" src="<?php echo esc_url( $pixwell_logo['url'] ) ?>" srcset="<?php echo esc_url( $pixwell_logo['url'] ) ?> 1x, <?php echo esc_url( $pixwell_logo_retina['url'] ); ?> 2x" alt="<?php echo esc_attr( $pixwell_logo_name ); ?>">
			<?php if ( ! empty( $pixwell_logo_retina_dark['url'] ) ) : ?>
				<img decoding="async" loading="lazy" class="logo-default logo-retina logo-dark" data-mode="dark" height="<?php echo esc_attr( $pixwell_height ); ?>" width="<?php echo esc_attr( $pixwell_width ); ?>" src="<?php echo esc_url( $pixwell_logo_dark['url'] ) ?>" srcset="<?php echo esc_url( $pixwell_logo_dark['url'] ) ?> 1x, <?php echo esc_url( $pixwell_logo_retina_dark['url'] ); ?> 2x" alt="<?php echo esc_attr( $pixwell_logo_name ); ?>">
			<?php endif; ?>
		<?php endif; ?>
	</a>
</div>