<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_elementor_main_menu' ) ) {
	function pixwell_elementor_main_menu( $settings = [] ) {

		if ( empty( $settings['main_menu'] ) || ! is_nav_menu( $settings['main_menu'] ) ) {
			return false;
		}
		$args = [
			'menu'        => $settings['main_menu'],
			'menu_id'     => 'main-menu',
			'container'   => '',
			'menu_class'  => 'main-menu rb-menu',
			'walker'      => new pixwell_walker,
			'depth'       => 4,
			'items_wrap'  => '<ul id="%1$s" class="%2$s" itemscope itemtype="' . pixwell_protocol() . '://www.schema.org/SiteNavigationElement">%3$s</ul>',
			'echo'        => true,
			'fallback_cb' => 'pixwell_navigation_fallback',

		];
		if ( ! empty( $settings['color_scheme'] ) ) {
			$args['menu_class'] = 'is-light-text main-menu rb-menu';
		}
		?>
		<nav id="site-navigation" class="main-menu-wrap" aria-label="<?php esc_attr_e( 'main menu', 'pixwell' ); ?>">
			<?php wp_nav_menu( $args ); ?>
		</nav>
		<?php
	}
}
