<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

$pixwell_trigger_classes = 'off-canvas-trigger btn-toggle-wrap';

if ( ! pixwell_get_option( 'offcanvas_toggle' ) ) {
	$pixwell_trigger_classes .= ' desktop-disabled';
}

switch ( pixwell_get_option( 'offcanvas_toggle_bold', 0 ) ) {
	case '1' :
		$pixwell_trigger_classes .= ' btn-toggle-bold';
		break;
	case '2' :
		$pixwell_trigger_classes .= ' btn-toggle-stack';
		break;
	default:
		$pixwell_trigger_classes .= ' btn-toggle-light';
}

if ( ! is_active_sidebar( 'pixwell_sidebar_offcanvas' ) && ! has_nav_menu( 'pixwell_menu_offcanvas' ) ) {
	return;
}
?>
<a href="#" class="<?php echo esc_attr( $pixwell_trigger_classes ) ?>" aria-label="<?php esc_attr_e( 'menu trigger', 'pixwell' ); ?>"><span class="btn-toggle"><span class="off-canvas-toggle"><span class="icon-toggle"></span></span></span></a>

