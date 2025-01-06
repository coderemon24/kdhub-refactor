<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

/** admin */
include_once get_theme_file_path( 'includes/fallbacks.php' );
include_once get_theme_file_path( 'backend/class-tgm-plugin-activation.php' );
include_once get_theme_file_path( 'backend/plugins.php' );
include_once get_theme_file_path( 'backend/editor.php' );
include_once get_theme_file_path( 'backend/add-settings.php' );
include_once get_theme_file_path( 'backend/category-settings.php' );
include_once get_theme_file_path( 'backend/meta-settings.php' );
include_once get_theme_file_path( 'backend/redux-settings.php' );
include_once get_theme_file_path( 'backend/sidebars.php' );
include_once get_theme_file_path( 'backend/quick-translate.php' );

/** includes */
include_once get_theme_file_path( 'includes/menu.php' );
include_once get_theme_file_path( 'includes/actions.php' );
include_once get_theme_file_path( 'includes/query.php' );
include_once get_theme_file_path( 'includes/fonts.php' );
include_once get_theme_file_path( 'includes/posts.php' );
include_once get_theme_file_path( 'includes/single.php' );
include_once get_theme_file_path( 'includes/blog-pages.php' );
include_once get_theme_file_path( 'includes/dynamic-css.php' );
include_once get_theme_file_path( 'includes/social-data.php' );
include_once get_theme_file_path( 'includes/wc.php' );

/** templates */
include_once get_theme_file_path( 'templates/site-sections.php' );
include_once get_theme_file_path( 'templates/single-post.php' );
include_once get_theme_file_path( '/templates/single/parts.php' );
include_once get_theme_file_path( '/templates/single/layout-1.php' );
include_once get_theme_file_path( '/templates/single/layout-2.php' );
include_once get_theme_file_path( '/templates/single/layout-3.php' );
include_once get_theme_file_path( '/templates/single/layout-4.php' );
include_once get_theme_file_path( '/templates/single/layout-5.php' );
include_once get_theme_file_path( '/templates/single/layout-6.php' );
include_once get_theme_file_path( '/templates/single/layout-custom.php' );
include_once get_theme_file_path( 'templates/page.php' );
include_once get_theme_file_path( 'templates/ajax.php' );
include_once get_theme_file_path( 'templates/blog.php' );
include_once get_theme_file_path( 'templates/social-icons.php' );
include_once get_theme_file_path( 'templates/block-elements.php' );
include_once get_theme_file_path( 'templates/post-elements.php' );
include_once get_theme_file_path( 'templates/composer.php' );
include_once get_theme_file_path( 'templates/portfolio.php' );
include_once get_theme_file_path( 'templates/reviews.php' );

/** load blocks */
include_once get_theme_file_path( 'templates/blocks/fw-feat-1.php' );
include_once get_theme_file_path( 'templates/blocks/fw-feat-2.php' );
include_once get_theme_file_path( 'templates/blocks/fw-feat-3.php' );
include_once get_theme_file_path( 'templates/blocks/fw-feat-4.php' );
include_once get_theme_file_path( 'templates/blocks/fw-feat-5.php' );
include_once get_theme_file_path( 'templates/blocks/fw-feat-6.php' );
include_once get_theme_file_path( 'templates/blocks/fw-feat-7.php' );
include_once get_theme_file_path( 'templates/blocks/fw-feat-8.php' );
include_once get_theme_file_path( 'templates/blocks/fw-feat-9.php' );
include_once get_theme_file_path( 'templates/blocks/fw-feat-10.php' );
include_once get_theme_file_path( 'templates/blocks/fw-feat-11.php' );
include_once get_theme_file_path( 'templates/blocks/fw-feat-12.php' );
include_once get_theme_file_path( 'templates/blocks/fw-feat-13.php' );
include_once get_theme_file_path( 'templates/blocks/fw-feat-14.php' );
include_once get_theme_file_path( 'templates/blocks/fw-feat-15.php' );
include_once get_theme_file_path( 'templates/blocks/fw-feat-16.php' );
include_once get_theme_file_path( 'templates/blocks/fw-feat-17.php' );
include_once get_theme_file_path( 'templates/blocks/fw-feat-18.php' );
include_once get_theme_file_path( 'templates/blocks/fw-grid-1.php' );
include_once get_theme_file_path( 'templates/blocks/fw-grid-2.php' );
include_once get_theme_file_path( 'templates/blocks/fw-grid-3.php' );
include_once get_theme_file_path( 'templates/blocks/fw-grid-4.php' );
include_once get_theme_file_path( 'templates/blocks/fw-grid-5.php' );
include_once get_theme_file_path( 'templates/blocks/fw-list-1.php' );
include_once get_theme_file_path( 'templates/blocks/fw-list-2.php' );
include_once get_theme_file_path( 'templates/blocks/fw-list-3.php' );
include_once get_theme_file_path( 'templates/blocks/fw-mix-1.php' );
include_once get_theme_file_path( 'templates/blocks/fw-mix-2.php' );
include_once get_theme_file_path( 'templates/blocks/fw-masonry-1.php' );
include_once get_theme_file_path( 'templates/blocks/fw-portfolio-1.php' );
include_once get_theme_file_path( 'templates/blocks/ct-classic.php' );
include_once get_theme_file_path( 'templates/blocks/ct-grid-1.php' );
include_once get_theme_file_path( 'templates/blocks/ct-grid-2.php' );
include_once get_theme_file_path( 'templates/blocks/ct-list.php' );
include_once get_theme_file_path( 'templates/blocks/ct-mix-1.php' );
include_once get_theme_file_path( 'templates/blocks/ct-mix-2.php' );
include_once get_theme_file_path( 'templates/blocks/ct-masonry-1.php' );
include_once get_theme_file_path( 'templates/blocks/fw-category-1.php' );
include_once get_theme_file_path( 'templates/blocks/fw-category-2.php' );
include_once get_theme_file_path( 'templates/blocks/mega-menu.php' );
include_once get_theme_file_path( 'templates/blocks/related.php' );
include_once get_theme_file_path( 'templates/blocks/widget-post.php' );
include_once get_theme_file_path( 'templates/blocks/bookmark-list.php' );
include_once get_theme_file_path( 'templates/blocks/advert.php' );
include_once get_theme_file_path( 'templates/blocks/fw-banner.php' );
include_once get_theme_file_path( 'templates/blocks/fw-search.php' );
include_once get_theme_file_path( 'templates/blocks/image-box.php' );
include_once get_theme_file_path( 'templates/blocks/heading.php' );
include_once get_theme_file_path( 'templates/blocks/cta-1.php' );
include_once get_theme_file_path( 'templates/blocks/grid-flex-1.php' );
include_once get_theme_file_path( 'templates/blocks/ct-small-post.php' );
include_once get_theme_file_path( 'templates/header/header_template.php' );

/** load modules */
include_once get_theme_file_path( 'templates/modules/grid.php' );
include_once get_theme_file_path( 'templates/modules/overlay.php' );
include_once get_theme_file_path( 'templates/modules/list.php' );
include_once get_theme_file_path( 'templates/modules/classic.php' );
include_once get_theme_file_path( 'templates/modules/masonry.php' );
include_once get_theme_file_path( 'templates/blocks/subscribe.php' );
include_once get_theme_file_path( 'templates/blocks/raw-html.php' );
include_once get_theme_file_path( 'templates/blocks/newsletter.php' );
include_once get_theme_file_path( 'templates/blocks/about.php' );
include_once get_theme_file_path( 'templates/modules/category.php' );