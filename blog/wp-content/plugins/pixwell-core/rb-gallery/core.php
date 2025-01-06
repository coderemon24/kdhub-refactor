<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'rb_gallery_register_metaboxes' ) ) {
	function rb_gallery_register_metaboxes( $configs = [] ) {

		$configs[] = [
			'id'         => 'rb_gallery_options',
			'title'      => esc_html__( 'Gallery Options', 'pixwell-core' ),
			'context'    => 'normal',
			'post_types' => [ 'rb-gallery' ],
			'tabs'       => [
				[
					'id'     => 'section-gallery',
					'title'  => esc_html__( 'Gallery Data', 'pixwell-core' ),
					'desc'   => esc_html__( 'The gallery will gather and display the title, caption, and description of attached images.', 'pixwell-core' ),
					'icon'   => 'dashicons-format-gallery',
					'fields' => [
						[
							'id'      => 'rb_gallery',
							'name'    => esc_html__( 'Upload Gallery', 'pixwell-core' ),
							'desc'    => esc_html__( 'Upload your images for this gallery', 'pixwell-core' ),
							'type'    => 'images',
							'default' => '',
						],
						[
							'id'      => 'gallery_share_bottom',
							'name'    => esc_html__( 'Share on Socials', 'pixwell-core' ),
							'desc'    => esc_html__( 'Display the share on socials bar.', 'pixwell-core' ),
							'type'    => 'select',
							'options' => [
								'0'  => esc_html__( 'Default from Theme Options', 'pixwell-core' ),
								'-1' => esc_html__( 'Disable', 'pixwell-core' ),
								'1'  => esc_html__( 'Enable', 'pixwell-core' ),
							],
							'default' => '0',
						],
					],
				],
				[
					'id'     => 'section-layout',
					'title'  => esc_html__( 'Gallery Layout', 'pixwell-core' ),
					'desc'   => esc_html__( 'Select layout and style for this gallery.', 'pixwell-core' ),
					'icon'   => 'dashicons-layout',
					'fields' => [
						[
							'id'      => 'gallery_columns',
							'name'    => esc_html__( 'Columns of Grid', 'pixwell-core' ),
							'desc'    => esc_html__( 'Select the total number of columns to display.', 'pixwell-core' ),
							'type'    => 'select',
							'options' => [
								'2' => esc_html__( '2 Columns', 'pixwell-core' ),
								'3' => esc_html__( '3 Columns', 'pixwell-core' ),
								'4' => esc_html__( '4 Columns', 'pixwell-core' ),
								'5' => esc_html__( '5 Columns', 'pixwell-core' ),
							],
							'default' => '3',
						],
						[
							'id'      => 'gallery_style',
							'name'    => esc_html__( 'Gallery Style', 'pixwell-core' ),
							'desc'    => esc_html__( 'Select a gallery style.', 'pixwell-core' ),
							'type'    => 'select',
							'options' => [
								'light' => esc_html__( 'Light Style', 'pixwell-core' ),
								'dark'  => esc_html__( 'Dark Style', 'pixwell-core' ),
							],
							'default' => 'light',
						],
						[
							'id'      => 'gallery_wrap',
							'name'    => esc_html__( 'Gallery Width', 'pixwell-core' ),
							'desc'    => esc_html__( 'Select a max-width value for the gallery.', 'pixwell-core' ),
							'type'    => 'select',
							'options' => [
								'0' => esc_html__( '- Wrapper - ', 'pixwell-core' ),
								'1' => esc_html__( 'Full Wide (100%)', 'pixwell-core' ),
							],
							'default' => '0',
						],
					],
				],
			],
		];

		return $configs;
	}
}

/**
 * @param $template
 *
 * @return string
 * template redirect
 */
if ( ! function_exists( 'rb_gallery_template_redirect' ) ) {
	function rb_gallery_template_redirect( $template ) {

		global $wp_query;
		global $post;
		$file = '';
		if ( is_single() && get_post_type() == 'rb-gallery' ) {
			$file = 'single-gallery.php';
		} elseif ( is_tax( 'gallery-category' ) || is_post_type_archive( 'rb-gallery' ) ) {
			$file = 'archive-gallery.php';
		}

		if ( ! empty( $file ) ) {
			$template = locate_template( $file );
			if ( ! $template ) {
				$template = RB_GALLERY_PATH . '/templates/' . $file;
			}
		}

		return $template;
	}
}

/* show all gallery without navigation */
if ( ! function_exists( 'rb_gallery_show_all' ) ) {
	function rb_gallery_show_all( $query ) {

		if ( is_admin() ) {
			return false;
		}

		if ( $query->is_main_query() && ( is_tax( 'gallery-category' ) || is_post_type_archive( 'rb-gallery' ) ) ) {
			$query->set( 'posts_per_page', '-1' );
		}
	}
}
