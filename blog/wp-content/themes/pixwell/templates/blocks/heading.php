<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_rbc_heading' ) ) {
	function pixwell_rbc_heading( $attrs ) {

		$settings = shortcode_atts( [
			'uuid'             => '',
			'html_title'       => '',
			'html_tagline'     => '',
			'html_description' => '',
			'content_align'    => '',
			'text_style'       => '',
			'heading_tag'      => 'h2',
			'tagline_tag'      => 'h6',
			'separator'        => '',
			'elementor_block'  => '',
			'border_top'       => '',
			'border_color'     => '',
		], $attrs );

		if ( empty( $settings['content_align'] ) ) {
			$settings['content_align'] = 'center';
		}

		if ( function_exists( 'pixwell_decode_shortcode' ) ) {
			if ( empty( $settings['elementor_block'] ) ) {
				$settings['html_title']       = pixwell_decode_shortcode( $settings['html_title'] );
				$settings['html_tagline']     = pixwell_decode_shortcode( $settings['html_tagline'] );
				$settings['html_description'] = pixwell_decode_shortcode( $settings['html_description'] );
			}
		} else {
			$settings['html_about_tagline'] = esc_html__( 'requesting Pixwell Core plugin to work', 'pixwell' );
		}

		$settings['id']        = $settings['uuid'];
		$settings['classes']   = 'fw-block block-heading none-margin is-' . $settings['content_align'];
		$settings['block_tag'] = 'div';

		ob_start();
		pixwell_block_open( $settings ); ?>
		<?php if ( ! empty( $settings['border_top'] ) ) : ?>
			<div class="hbox-border">
		<?php endif; ?>
		<?php if ( ! empty( $settings['html_tagline'] ) ) : ?>
			<<?php echo esc_attr( $settings['tagline_tag'] ); ?> class="hbox-tagline"><?php pixwell_render_inline_html( $settings['html_tagline'] ); ?></<?php echo esc_attr( $settings['tagline_tag'] ); ?>>
		<?php endif;
		if ( ! empty( $settings['html_title'] ) ) : ?>
			<<?php echo esc_attr( $settings['heading_tag'] ); ?> class="hbox-title"><?php pixwell_render_inline_html( $settings['html_title'] ); ?></<?php echo esc_attr( $settings['heading_tag'] ); ?>>
		<?php endif;
		if ( ! empty( $settings['separator'] ) ) : ?>
			<div class="hbox-separator"></div>
		<?php endif;
		if ( ! empty( $settings['html_description'] ) ) : ?>
			<div class="hbox-description entry-content"><?php pixwell_render_inline_html( $settings['html_description'] ); ?></div>
		<?php endif; ?>
		<?php if ( ! empty( $settings['border_top'] ) ) : ?>
			</div>
		<?php endif;
		pixwell_block_close( $settings );

		return ob_get_clean();
	}
}

if ( ! function_exists( 'pixwell_register_heading' ) ) {
	function pixwell_register_heading( $blocks ) {

		if ( ! is_array( $blocks ) ) {
			$blocks = [];
		}

		$blocks[] = [
			'name'        => 'heading',
			'title'       => esc_html__( 'Heading Box', 'pixwell' ),
			'description' => esc_html__( 'Display Heading with title and subtitle.', 'pixwell' ),
			'section'     => [ 'fullwidth', 'content' ],
			'img'         => get_theme_file_uri( 'assets/images/heading.png' ),
			'inputs'      => [
				[
					'name'        => 'html_title',
					'type'        => 'textarea',
					'tab'         => 'general',
					'title'       => esc_html__( 'Heading Title', 'pixwell' ),
					'description' => esc_html__( 'Input a heading for this block.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'html_tagline',
					'type'        => 'textarea',
					'tab'         => 'general',
					'title'       => esc_html__( 'Sub Title', 'pixwell' ),
					'description' => esc_html__( 'Input a heading sub title for this block.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'html_description',
					'type'        => 'textarea',
					'tab'         => 'general',
					'title'       => esc_html__( 'Description', 'pixwell' ),
					'description' => esc_html__( 'Input a description for this block.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'margin',
					'type'        => 'dimension',
					'tab'         => 'design',
					'title'       => esc_html__( 'Margin', 'pixwell' ),
					'description' => esc_html__( 'Select margin top and bottom values (in px) for this block, default is 50px', 'pixwell' ),
					'default'     => [
						'top'    => 0,
						'bottom' => 30,
					],
				],
				[
					'name'        => 'mobile_margin',
					'type'        => 'dimension',
					'tab'         => 'design',
					'title'       => esc_html__( 'Mobile - Margin', 'pixwell' ),
					'description' => esc_html__( 'Select margin top and bottom values (in px) for this block in mobile devices, default is 35px', 'pixwell' ),
					'default'     => [
						'top'    => 0,
						'bottom' => 25,
					],
				],
				[
					'name'        => 'content_align',
					'type'        => 'select',
					'tab'         => 'design',
					'title'       => esc_html__( 'Content Align', 'pixwell' ),
					'description' => esc_html__( 'Select text align for this block.', 'pixwell' ),
					'options'     => [
						'center' => esc_html__( '- Center -', 'pixwell' ),
						'left'   => esc_html__( 'Left', 'pixwell' ),
						'right'  => esc_html__( 'Right', 'pixwell' ),
					],
					'default'     => 'center',
				],
				[
					'name'        => 'text_style',
					'type'        => 'select',
					'tab'         => 'design',
					'title'       => esc_html__( 'Text Style', 'pixwell' ),
					'description' => esc_html__( 'Select a text color scheme for the block.', 'pixwell' ),
					'options'     => [
						'0'     => esc_html__( '-Dark-', 'pixwell' ),
						'light' => esc_html__( 'Light', 'pixwell' ),
					],
					'default'     => 0,
				],
				[
					'name'        => 'separator',
					'type'        => 'select',
					'tab'         => 'design',
					'title'       => esc_html__( 'Separator', 'pixwell' ),
					'description' => esc_html__( 'Select separator type for this block.', 'pixwell' ),
					'options'     => [
						'0' => esc_html__( '- Disable -', 'pixwell' ),
						'1' => esc_html__( 'Enable', 'pixwell' ),
					],
					'default'     => 0,
				],
				[
					'name'        => 'heading_tag',
					'type'        => 'select',
					'tab'         => 'design',
					'title'       => esc_html__( 'Heading Tag', 'pixwell' ),
					'description' => esc_html__( 'Select html tag for this heading.', 'pixwell' ),
					'options'     => [
						'h2' => esc_html__( '- h2 -', 'pixwell' ),
						'h1' => esc_html__( 'h1', 'pixwell' ),
						'h3' => esc_html__( 'h3', 'pixwell' ),
						'h4' => esc_html__( 'h4', 'pixwell' ),
						'h5' => esc_html__( 'h5', 'pixwell' ),
						'h6' => esc_html__( 'h6', 'pixwell' ),
					],
					'default'     => 'h2',
				],
				[
					'name'        => 'tagline_tag',
					'type'        => 'select',
					'tab'         => 'design',
					'title'       => esc_html__( 'Heading Tag', 'pixwell' ),
					'description' => esc_html__( 'Select html tag for this sub title.', 'pixwell' ),
					'options'     => [
						'h6' => esc_html__( '- h6 -', 'pixwell' ),
						'h1' => esc_html__( 'h1', 'pixwell' ),
						'h2' => esc_html__( 'h2', 'pixwell' ),
						'h3' => esc_html__( 'h3', 'pixwell' ),
						'h4' => esc_html__( 'h4', 'pixwell' ),
						'h5' => esc_html__( 'h5', 'pixwell' ),
					],
					'default'     => 'h6',
				],
			],
		];

		return $blocks;
	}
}

add_filter( 'rbc_add_block', 'pixwell_register_heading', 2001 );