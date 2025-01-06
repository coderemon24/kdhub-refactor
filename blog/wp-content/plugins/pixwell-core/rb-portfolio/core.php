<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'rb_portfolio_register_metaboxes' ) ) {
	function rb_portfolio_register_metaboxes( $configs = [] ) {

		$configs[] = [
			'id'         => 'rb_portfolio_options',
			'title'      => esc_html__( 'Portfolio Options', 'pixwell-core' ),
			'context'    => 'normal',
			'post_types' => [ 'rb-portfolio' ],
			'tabs'       => [
				[
					'id'     => 'section-gallery',
					'title'  => esc_html__( 'Gallery Data', 'pixwell-core' ),
					'desc'   => esc_html__( 'Upload gallery images for this portfolio.', 'pixwell-core' ),
					'icon'   => 'dashicons-format-gallery',
					'fields' => [
						[
							'id'      => 'rb_portfolio_gallery',
							'name'    => esc_html__( 'Upload Portfolio Gallery', 'pixwell-core' ),
							'desc'    => esc_html__( 'Upload images for this portfolio.', 'pixwell-core' ),
							'type'    => 'images',
							'default' => '',
						],
					],
				],
				[
					'id'     => 'section-meta',
					'title'  => esc_html__( 'Entry Meta', 'pixwell-core' ),
					'desc'   => esc_html__( 'Add entry meta such as project, client, and service info for this portfolio.', 'pixwell-core' ),
					'icon'   => 'dashicons-database',
					'fields' => [
						[
							'id'      => 'rb_portfolio_project',
							'name'    => esc_html__( 'Project Info', 'pixwell-core' ),
							'desc'    => esc_html__( 'Input project name information for this portfolio.', 'pixwell-core' ),
							'info'    => esc_html__( 'Raw HTMl input is allowed', 'pixwell-core' ),
							'type'    => 'textarea',
							'default' => '',
						],
						[
							'id'      => 'rb_portfolio_client',
							'name'    => esc_html__( 'Client Info', 'pixwell-core' ),
							'desc'    => esc_html__( 'Input client information for this portfolio.', 'pixwell-core' ),
							'type'    => 'textarea',
							'default' => '',
						],
						[
							'id'      => 'rb_portfolio_service',
							'name'    => esc_html__( 'Service Info', 'pixwell-core' ),
							'desc'    => esc_html__( 'Input service information for this portfolio.', 'pixwell-core' ),
							'type'    => 'textarea',
							'default' => '',
						],
						[
							'id'      => 'rb_portfolio_location',
							'name'    => esc_html__( 'Location Info', 'pixwell-core' ),
							'desc'    => esc_html__( 'Input location information for this portfolio,', 'pixwell-core' ),
							'type'    => 'textarea',
							'default' => '',
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
if ( ! function_exists( 'rb_portfolio_template_redirect' ) ) {
	function rb_portfolio_template_redirect( $template ) {

		global $wp_query;
		global $post;
		$file = '';
		if ( is_single() && get_post_type() == 'rb-portfolio' ) {
			$file = 'single-portfolio.php';
		} elseif ( is_tax( 'portfolio-category' ) || is_post_type_archive( 'rb-portfolio' ) ) {
			$file = 'archive-portfolio.php';
		}

		if ( ! empty( $file ) ) {
			$template = locate_template( $file );
			if ( ! $template ) {
				$template = RB_PORTFOLIO_PATH . '/templates/' . $file;
			}
		}

		return $template;
	}
}
