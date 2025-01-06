<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

$pixwell_copyright = pixwell_get_option( 'footer_copyright' );
?>
<div class="footer-copyright footer-section">
	<?php if ( ! empty( $pixwell_copyright ) ) : ?>
		<div class="rbc-container">
			<div class="copyright-inner rb-p20-gutter"><?php pixwell_render_inline_html( $pixwell_copyright ) ?></div>
		</div>
	<?php endif;
	if ( pixwell_get_option( 'amp_back_top' ) && pixwell_is_amp() ) : ?>
		<a href="#top" class="amp-back-top" aria-label="<?php esc_attr_e( 'Back to Top', 'pixwell' ); ?>">&uarr;</a>
	<?php endif; ?>
</div>