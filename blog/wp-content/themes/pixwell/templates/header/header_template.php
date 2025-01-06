<?php
if ( ! function_exists( 'pixwell_render_header_rb_template' ) ) {
	/**
	 * @param string $shortcode
	 *
	 * @return false
	 */
	function pixwell_render_header_rb_template( $shortcode = '' ) {

		if ( empty( $shortcode ) ) {
			get_template_part( 'templates/header/style', '1' );

			return false;
		}
		?>
		<header id="site-header" class="header-wrap rb-section is-header-template">
			<div class="navbar-outer">
				<div class="navbar-wrap">
					<?php get_template_part( 'templates/header/module', 'mnav' ); ?>
					<div id="header-template" class="is-main-nav"><?php echo do_shortcode( trim( $shortcode ) ); ?></div>
				</div>
			</div>
			<?php get_template_part( 'templates/header/module', 'sticky' );
			if ( is_active_sidebar( 'pixwell_header_ad' ) ) {
				dynamic_sidebar( 'pixwell_header_ad' );
			} ?>
		</header>
		<?php
	}
}