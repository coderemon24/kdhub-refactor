<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_rbc_newsletter' ) ) {
	function pixwell_rbc_newsletter( $attrs ) {

		$settings = shortcode_atts( [
			'uuid'        => '',
			'title'       => '',
			'description' => '',
			'layout'      => '',
			'text_style'  => '',
			'privacy'     => '',
			'submit'      => '',
		], $attrs );

		$settings['classes'] = 'rb-newsletter';

		ob_start();
		pixwell_block_open( $settings ); ?>
		<aside class="newsletter-box subscribe-box layout-<?php echo esc_attr( $settings['layout'] ); ?>">
			<div class="subscribe-content">
				<?php if ( ! empty( $settings['title'] ) ) : ?>
					<h3 class="newsletter-title"><?php echo apply_filters( 'the_title', $settings['title'], 12 ); ?></h3>
				<?php endif; ?>
				<?php if ( ! empty( $settings['description'] ) ) : ?>
					<p class="subscribe-description">
						<?php pixwell_render_inline_html( $settings['description'] ); ?>
					</p>
				<?php endif; ?>
			</div>
			<div class="newsletter-form">
				<?php
				unset ( $settings['title'] );
				unset ( $settings['description'] );

				echo rb_render_newsletter( $settings ); ?>
			</div>
		</aside>
		<?php pixwell_block_close();

		return ob_get_clean();
	}
}

if ( ! function_exists( 'pixwell_register_newsletter' ) ) {
	function pixwell_register_newsletter( $blocks ) {

		if ( ! is_array( $blocks ) ) {
			$blocks = [];
		}

		$blocks[] = [
			'name'        => 'newsletter',
			'title'       => esc_html__( 'Ruby Newsletter', 'pixwell' ),
			'description' => esc_html__( 'Display Ruby newsletter subscribe form.', 'pixwell' ),
			'section'     => [ 'fullwidth', 'content' ],
			'img'         => get_theme_file_uri( 'assets/images/rb-newsletter.png' ),
			'inputs'      => [
				[
					'name'        => 'title',
					'type'        => 'text',
					'tab'         => 'general',
					'title'       => esc_html__( 'Block Title', 'pixwell' ),
					'description' => esc_html__( 'Input a block heading. Leave blank to disable the block header.', 'pixwell' ),
					'default'     => esc_html__( 'Subscribe Newsletter', 'pixwell' ),
				],
				[
					'name'        => 'description',
					'type'        => 'textarea',
					'tab'         => 'general',
					'title'       => esc_html__( 'Block Description', 'pixwell' ),
					'description' => esc_html__( 'Input a short description for this block.', 'pixwell' ),
					'default'     => esc_html__( 'Get our latest news straight into your inbox', 'pixwell' ),
				],
				[
					'name'        => 'privacy',
					'type'        => 'text',
					'tab'         => 'general',
					'title'       => esc_html__( 'Privacy Text', 'pixwell' ),
					'description' => esc_html__( 'Input your privacy text. Leave blank you would like to disable.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'submit',
					'type'        => 'text',
					'tab'         => 'general',
					'title'       => esc_html__( 'Submit Text', 'pixwell' ),
					'description' => esc_html__( 'Input a submit button text. The icon will display if you leave blank this option.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'layout',
					'type'        => 'select',
					'tab'         => 'design',
					'title'       => esc_html__( 'Block Layout', 'pixwell' ),
					'description' => esc_html__( 'Select the layout for this block', 'pixwell' ),
					'options'     => [
						'1' => esc_html__( '-Default (Right Form)-', 'pixwell' ),
						'2' => esc_html__( 'Style 2 (Bottom Form)', 'pixwell' ),
					],
					'default'     => 1,
				],
				[
					'name'        => 'margin',
					'type'        => 'dimension',
					'tab'         => 'design',
					'title'       => esc_html__( 'Margin', 'pixwell' ),
					'description' => esc_html__( 'Select margin top and bottom values (in px) for this block, default is 0', 'pixwell' ),
					'default'     => [
						'top'    => 0,
						'bottom' => 0,
					],
				],
				[
					'name'        => 'mobile_margin',
					'type'        => 'dimension',
					'tab'         => 'design',
					'title'       => esc_html__( 'Mobile - Margin', 'pixwell' ),
					'description' => esc_html__( 'Select margin top and bottom values (in px) for this block in mobile devices, default is 0', 'pixwell' ),
					'default'     => [
						'top'    => 0,
						'bottom' => 0,
					],
				],
				[
					'name'        => 'padding',
					'type'        => 'dimension',
					'tab'         => 'design',
					'title'       => esc_html__( 'Padding', 'pixwell' ),
					'description' => esc_html__( 'Select padding values (in px) for this block.', 'pixwell' ),
					'default'     => [
						'top'    => '60',
						'right'  => '40',
						'bottom' => '60',
						'left'   => '40',

					],
				],
				[
					'name'        => 'mobile_padding',
					'type'        => 'dimension',
					'tab'         => 'design',
					'title'       => esc_html__( 'Mobile - Padding', 'pixwell' ),
					'description' => esc_html__( 'Select padding values (in px) for this block in mobile devices', 'pixwell' ),
					'default'     => [
						'top'    => '30',
						'right'  => '20',
						'bottom' => '30',
						'left'   => '20',
					],
				],
				[
					'name'        => 'bg_color',
					'type'        => 'color',
					'tab'         => 'design',
					'title'       => esc_html__( 'Background Color', 'pixwell' ),
					'description' => esc_html__( 'Select background color for this block.', 'pixwell' ),
					'default'     => '#fafafa',
				],
				[
					'name'        => 'bg_image',
					'type'        => 'text',
					'tab'         => 'design',
					'title'       => esc_html__( 'Background Image', 'pixwell' ),
					'description' => esc_html__( 'Input background image for this block, allow attachment image URL (.png or .jpg at the end)', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'bg_display',
					'type'        => 'select',
					'tab'         => 'design',
					'title'       => esc_html__( 'Background Image Display', 'pixwell' ),
					'description' => esc_html__( 'Select background display for this block (if you use the background image)', 'pixwell' ),
					'options'     => [
						'cover'   => esc_html__( 'Cover', 'pixwell' ),
						'pattern' => esc_html__( 'Pattern', 'pixwell' ),
					],
					'default'     => 'cover',
				],
				[
					'name'        => 'bg_position',
					'type'        => 'select',
					'tab'         => 'design',
					'title'       => esc_html__( 'Background Image Position', 'pixwell' ),
					'description' => esc_html__( 'Select background position for this block (if you use the background image)', 'pixwell' ),
					'options'     => [
						'center' => esc_html__( 'Center', 'pixwell' ),
						'top'    => esc_html__( 'Top', 'pixwell' ),
						'bottom' => esc_html__( 'Bottom', 'pixwell' ),
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
			],
		];

		return $blocks;
	}
}

add_filter( 'rbc_add_block', 'pixwell_register_newsletter', 4900 );