<?php
$pixwell_off_canvas_bookmark = pixwell_get_option( 'off_canvas_bookmark' );
if ( empty( $pixwell_off_canvas_bookmark ) ) {
	return;
}
$pixwell_header_bookmark_url = pixwell_get_option( 'header_bookmark_url' );
if ( empty( $pixwell_header_bookmark_url ) ) {
	$pixwell_header_bookmark_url = '#';
} else {
	$pixwell_header_bookmark_url = get_permalink( $pixwell_header_bookmark_url );
} ?>
<aside class="bookmark-section">
	<a class="bookmark-link" href="<?php echo esc_url( $pixwell_header_bookmark_url ); ?>" title="<?php echo pixwell_translate('my_bookmarks') ?>" aria-label="<?php echo pixwell_translate('my_bookmarks') ?>">
		<span class="bookmark-icon"><i class="rbi rbi-bookmark-o"></i><span class="bookmark-counter rb-counter">0</span></span>
	</a>
</aside>