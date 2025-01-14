<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_rbc_about' ) ) {
	function pixwell_rbc_about( $attrs ) {

		$settings = shortcode_atts( [
			'uuid'               => '',
			'html_about_tagline' => '',
			'html_about_title'   => '',
			'html_about_desc'    => '',
			'about_sign'         => '',
			'elementor_block'    => '',
			'about_image'        => '',
			'about_image_height' => '',
			'about_image_width'  => '',
		], $attrs );

		if ( function_exists( 'pixwell_decode_shortcode' ) ) {
			if ( empty( $settings['elementor_block'] ) ) {
				$settings['html_about_tagline'] = pixwell_decode_shortcode( $settings['html_about_tagline'] );
				$settings['html_about_title']   = pixwell_decode_shortcode( $settings['html_about_title'] );
				$settings['html_about_desc']    = pixwell_decode_shortcode( $settings['html_about_desc'] );
			}
		} else {
			$settings['html_about_tagline'] = esc_html__( 'requesting Pixwell Core plugin to work', 'pixwell' );
		}

		$settings['id']        = $settings['uuid'];
		$settings['classes']   = 'fw-block block-about none-margin';
		$settings['block_tag'] = 'div';

		ob_start();
		pixwell_block_open( $settings );
		pixwell_block_content_open( $settings ); ?>
		<div class="about-me-wrap">
			<?php if ( ! empty( $settings['about_image'] ) ) :
				$size = pixwell_getimagesize( $settings['about_image'] );
				?>
				<div class="about-image">
					<img loading="lazy" src="<?php echo esc_url( $settings['about_image'] ); ?>" alt="<?php esc_html__( 'about me', 'pixwell' ); ?>" width="<?php if ( ! empty( $size[0] ) ) {
						echo esc_attr( $size[0] );
					} ?>" height="<?php if ( ! empty( $size[1] ) ) {
						echo esc_attr( $size[1] );
					} ?>">
				</div>
			<?php endif; ?>
			<div class="about-content">
				<?php if ( ! empty( $settings['html_about_tagline'] ) ) : ?>
					<div class="about-tagline"><?php echo do_shortcode( $settings['html_about_tagline'] ); ?></div>
				<?php endif;
				if ( ! empty( $settings['html_about_title'] ) ) : ?>
					<div class="about-title"><?php echo do_shortcode( $settings['html_about_title'] ); ?></div>
				<?php endif;
				if ( ! empty( $settings['html_about_desc'] ) ) : ?>
					<div class="about-desc"><?php echo do_shortcode( $settings['html_about_desc'] ); ?></div>
				<?php endif;
				if ( ! empty( $settings['about_sign'] ) ) : ?>
					<div class="about-sign">
						<img src="<?php echo esc_url( $settings['about_sign'] ); ?>" alt="<?php esc_html__( 'signature', 'pixwell' ); ?>">
					</div>
				<?php endif; ?>
			</div>
		</div>
		<?php
		pixwell_block_content_close();
		pixwell_block_close( $settings );

		return ob_get_clean();
	}
}


if ( ! function_exists( 'pixwell_register_about' ) ) {
	function pixwell_register_about( $blocks ) {

		if ( ! is_array( $blocks ) ) {
			$blocks = [];
		}

		$blocks[] = [
			'name'        => 'about',
			'title'       => esc_html__( 'About Me', 'pixwell' ),
			'description' => esc_html__( 'Display about me information in fullwidth section.', 'pixwell' ),
			'section'     => [ 'fullwidth' ],
			'img'         => get_theme_file_uri( 'assets/images/about.png' ),
			'inputs'      => [
				[
					'name'        => 'html_about_tagline',
					'type'        => 'textarea',
					'tab'         => 'content',
					'title'       => esc_html__( 'About Tagline', 'pixwell' ),
					'description' => esc_html__( 'Input the about me tagline for this block.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'html_about_title',
					'type'        => 'textarea',
					'tab'         => 'content',
					'title'       => esc_html__( 'About Title', 'pixwell' ),
					'description' => esc_html__( 'Input about me title for this bock (Allow Raw HTML).', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'html_about_desc',
					'type'        => 'textarea',
					'tab'         => 'content',
					'title'       => esc_html__( 'About Description', 'pixwell' ),
					'description' => esc_html__( 'Input about me title for this bock (Allow Raw HTML).', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'about_sign',
					'type'        => 'text',
					'tab'         => 'content',
					'title'       => esc_html__( 'About Signature Image', 'pixwell' ),
					'description' => esc_html__( 'Input signature image link (attachment URL .jpg) for this block.  Recommended image width: 700px', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'about_image',
					'type'        => 'text',
					'tab'         => 'content',
					'title'       => esc_html__( 'About Image', 'pixwell' ),
					'description' => esc_html__( 'Input about me image link (attachment URL .jpg) to display at the right side for this block. Recommended image height: 100px', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'about_image',
					'type'        => 'text',
					'tab'         => 'content',
					'title'       => esc_html__( 'About Image', 'pixwell' ),
					'description' => esc_html__( 'Input about me image link (attachment URL .jpg) to display at the right side for this block. Recommended image height: 100px', 'pixwell' ),
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
						'bottom' => 50,
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
						'bottom' => 35,
					],
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

add_filter( 'rbc_add_block', 'pixwell_register_about', 2020 );