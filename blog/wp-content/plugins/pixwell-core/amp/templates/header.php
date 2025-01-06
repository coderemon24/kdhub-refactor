<!DOCTYPE html>
<html amp <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="site" class="site">
	<?php pixwell_amp_render_off_canvas(); ?>
	<div class="site-outer">
		<header id="site-header" class="header-wrap">
			<aside id="amp-navbar" class="mobile-navbar">
				<div class="mobile-nav-inner rb-p20-gutter">
					<?php if ( ! empty( pixwell_get_option( 'mobile_logo_pos' ) ) && pixwell_get_option( 'mobile_logo_pos' ) === 'left' ) : ?>
						<div class="m-nav-left">
							<?php get_template_part( 'templates/header/module', 'mlogo' ); ?>
						</div>
						<div class="m-nav-right">
							<?php
							get_template_part( 'templates/header/module', 'msearch' );
							pixwell_amp_toggle();
							?>
						</div>
					<?php else : ?>
						<div class="m-nav-left">
							<?php pixwell_amp_toggle(); ?>
						</div>
						<div class="m-nav-centered">
							<?php get_template_part( 'templates/header/module', 'mlogo' ); ?>
						</div>
						<div class="m-nav-right">
							<?php get_template_part( 'templates/header/module', 'msearch' ); ?>
						</div>
					<?php endif; ?>
				</div>
			</aside>
		</header>
		<div class="site-wrap clearfix">
<?php pixwell_amp_render_header_ad();