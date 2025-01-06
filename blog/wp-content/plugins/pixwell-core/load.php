<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'is_plugin_active' ) ) {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

include_once PIXWELL_CORE_PATH . 'includes/helpers.php';
include_once PIXWELL_CORE_PATH . 'admin/cat-walker.php';
include_once PIXWELL_CORE_PATH . 'admin/amp-mode.php';
include_once PIXWELL_CORE_PATH . 'admin/notices.php';
include_once PIXWELL_CORE_PATH . 'admin/quick-translate.php';
include_once PIXWELL_CORE_PATH . 'admin/post-hooks.php';
include_once PIXWELL_CORE_PATH . 'admin/actions.php';

if ( ! class_exists( 'Ruby_GTM_Integration' ) ) {
	include_once PIXWELL_CORE_PATH . 'lib/simple-gtm-ga4/simple-gtm-ga4.php';
}

if ( ! class_exists( 'Pixwell_Post_Elements' ) ) {
	include_once PIXWELL_CORE_PATH . 'lib/pixwell-elements/pixwell-elements.php';
}

include_once PIXWELL_CORE_PATH . 'elementor/base.php';
include_once PIXWELL_CORE_PATH . 'lib/taxonomy-meta.php';
include_once PIXWELL_CORE_PATH . 'lib/rb-meta/rb-meta.php';
include_once PIXWELL_CORE_PATH . 'composer/setup.php';
include_once PIXWELL_CORE_PATH . 'rb-gallery/rb-gallery.php';
include_once PIXWELL_CORE_PATH . 'rb-portfolio/rb-portfolio.php';
include_once PIXWELL_CORE_PATH . 'amp/helpers.php';

include_once PIXWELL_CORE_PATH . 'includes/dark-mode.php';

include_once PIXWELL_CORE_PATH . 'includes/reaction.php';
include_once PIXWELL_CORE_PATH . 'includes/actions.php';
include_once PIXWELL_CORE_PATH . 'includes/seo-optimized.php';
include_once PIXWELL_CORE_PATH . 'includes/speed-optimized.php';
include_once PIXWELL_CORE_PATH . 'includes/advertising.php';
include_once PIXWELL_CORE_PATH . 'includes/social.php';
include_once PIXWELL_CORE_PATH . 'includes/newsletter.php';
include_once PIXWELL_CORE_PATH . 'includes/share-socials.php';
include_once PIXWELL_CORE_PATH . 'includes/bookmark.php';
include_once PIXWELL_CORE_PATH . 'includes/shortcodes.php';
include_once PIXWELL_CORE_PATH . 'includes/table-contents.php';
include_once PIXWELL_CORE_PATH . 'includes/recipe.php';
include_once PIXWELL_CORE_PATH . 'includes/cooked.php';

include_once PIXWELL_CORE_PATH . 'membership/membership.php';
include_once PIXWELL_CORE_PATH . 'e-template/init.php';
include_once PIXWELL_CORE_PATH . 'widgets/advertising.php';
include_once PIXWELL_CORE_PATH . 'widgets/fw-instagram.php';
include_once PIXWELL_CORE_PATH . 'widgets/fw-instagram.php';
include_once PIXWELL_CORE_PATH . 'widgets/sb-facebook.php';
include_once PIXWELL_CORE_PATH . 'widgets/sb-flickr.php';
include_once PIXWELL_CORE_PATH . 'widgets/sb-follower.php';
include_once PIXWELL_CORE_PATH . 'widgets/sb-instagram.php';
include_once PIXWELL_CORE_PATH . 'widgets/sb-social-icon.php';
include_once PIXWELL_CORE_PATH . 'widgets/sb-address.php';
include_once PIXWELL_CORE_PATH . 'widgets/sb-youtube.php';
include_once PIXWELL_CORE_PATH . 'widgets/sb-post.php';
include_once PIXWELL_CORE_PATH . 'widgets/newsletter.php';
include_once PIXWELL_CORE_PATH . 'widgets/banner.php';
include_once PIXWELL_CORE_PATH . 'widgets/header-strip.php';
include_once PIXWELL_CORE_PATH . 'widgets/fw-mc.php';
