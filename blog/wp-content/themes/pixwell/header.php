<?php
/**
 * display header template
 */
if ( pixwell_is_amp() ) {
	return;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> data-theme="<?php echo pixwell_get_theme_mode(); ?>">
<?php wp_body_open(); ?>
<div id="site" class="site">
	<?php pixwell_render_off_canvas(); ?>
    <div class="site-outer">
        <div class="site-mask"></div>
		<?php pixwell_render_header(); ?>
        <div class="site-wrap clearfix">