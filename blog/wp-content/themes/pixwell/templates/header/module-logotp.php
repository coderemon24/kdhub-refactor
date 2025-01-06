<?php
$pixwell_logo        = pixwell_get_option( 'site_logo_float' );
$pixwell_logo_retina = pixwell_get_option( 'retina_site_logo_float' );

/** use default */
if ( empty( $pixwell_logo['url'] ) ) {
	$pixwell_logo        = pixwell_get_option( 'site_logo' );
	$pixwell_logo_retina = pixwell_get_option( 'retina_site_logo' );
}

if ( empty( $pixwell_logo['url'] ) ) {
	pixwell_logo_text();

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
			<img decoding="async" class="logo-default" height="<?php echo esc_attr( $pixwell_height ); ?>" width="<?php echo esc_attr( $pixwell_width ); ?>" src="<?php echo esc_url( $pixwell_logo['url'] ) ?>" alt="<?php echo esc_attr( $pixwell_logo_name ); ?>">
		<?php else: ?>
			<img decoding="async" class="logo-default logo-retina" height="<?php echo esc_attr( $pixwell_height ); ?>" width="<?php echo esc_attr( $pixwell_width ); ?>" src="<?php echo esc_url( $pixwell_logo['url'] ) ?>" srcset="<?php echo esc_url( $pixwell_logo['url'] ) ?> 1x, <?php echo esc_url( $pixwell_logo_retina['url'] ); ?> 2x" alt="<?php echo esc_attr( $pixwell_logo_name ); ?>">
		<?php endif; ?>
	</a>
	<?php if ( is_front_page() ) : ?>
		<h1 class="logo-title"><?php echo esc_html( $pixwell_logo_name ); ?></h1>
		<?php if ( get_bloginfo( 'description' ) ) : ?>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
		<?php endif;
	endif; ?>
</div>