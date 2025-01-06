<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( !pixwell_get_option( 'mobile_search' ) ) {
	return;
} ?>
<div class="mobile-search">
	<?php if ( pixwell_is_amp() ) : ?>
		<a href="<?php echo esc_url( home_url( '/?s' ) ); ?>" title="<?php echo esc_attr( pixwell_translate( 'search' ) ); ?>" class="search-icon nav-search-link"><i class="rbi rbi-search-alt"></i></a>
	<?php else : ?>
		<a href="#" title="<?php echo esc_attr( pixwell_translate( 'search' ) ); ?>" aria-label="<?php echo esc_attr( pixwell_translate( 'search' ) ); ?>" class="search-icon nav-search-link"><i class="rbi rbi-search-alt" aria-hidden="true"></i></a>
		<div class="navbar-search-popup header-lightbox">
			<div class="navbar-search-form"><?php get_search_form(); ?></div>
		</div>
	<?php endif; ?>
</div>
