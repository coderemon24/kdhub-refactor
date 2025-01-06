<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_rbc_fw_banner' ) ) {
	function pixwell_rbc_fw_banner( $attrs ) {

		$settings = shortcode_atts( [
			'uuid'           => '',
			'name'           => 'fw_banner',
			's1_title'       => '',
			's1_url'         => '',
			's1_image'       => '',
			's1_newtab'      => '',
			's2_title'       => '',
			's2_url'         => '',
			's2_image'       => '',
			's3_title'       => '',
			's2_newtab'      => '',
			's3_url'         => '',
			's3_image'       => '',
			's3_newtab'      => '',
			'title'          => '',
			'viewmore_title' => '',
			'viewmore_link'  => '',
			'text_style'     => '',
		], $attrs );

		$settings['classes'] = 'fw-banner none-margin is-dark-style';

		if ( ! empty( $settings['text_style'] ) && 'light' == $settings['text_style'] ) {
			$settings['classes'] = 'fw-banner none-margin is-light-style';
			unset( $settings['text_style'] );
		}

		ob_start();
		pixwell_block_open( $settings );
		pixwell_block_header( $settings );
		pixwell_block_content_open( $settings );

		$section_1 = [
			'title'  => $settings['s1_title'],
			'url'    => $settings['s1_url'],
			'image'  => $settings['s1_image'],
			'newtab' => $settings['s1_newtab'],
		];

		$section_2 = [
			'title'  => $settings['s2_title'],
			'url'    => $settings['s2_url'],
			'image'  => $settings['s2_image'],
			'newtab' => $settings['s2_newtab'],
		];

		$section_3 = [
			'title'  => $settings['s3_title'],
			'url'    => $settings['s3_url'],
			'image'  => $settings['s3_image'],
			'newtab' => $settings['s3_newtab'],
		]; ?>
		<div class="banners-wrap">
			<div class="banners-inner rb-n15-gutter">
				<?php
				pixwell_render_banner( $section_1 );
				pixwell_render_banner( $section_2 );
				pixwell_render_banner( $section_3 );
				?>
			</div>
		</div>
		<?php
		pixwell_block_content_close();
		pixwell_block_close();

		return ob_get_clean();
	}
}

/** render banner */
if ( ! function_exists( 'pixwell_render_banner' ) ) {
	function pixwell_render_banner( $settings = [] ) {

		if ( empty( $settings['url'] ) && empty( $settings['image'] ) && empty( $settings['title'] ) ) {
			return false;
		}
		$alt_text = esc_html__( 'banner', 'pixwell' );
		?>
		<div class="el-banner rb-p15-gutter">
			<div class="el-banner-inner">
				<?php if ( ! empty( $settings['title'] ) ) :
					$alt_text = $settings['title']; ?>
					<div class="h4 banner-content">
						<span class="banner-title"><?php echo esc_html( $settings['title'] ); ?></span></div>
				<?php endif;
				if ( ! empty( $settings['image'] ) ) :
					if ( file_exists( $settings['image'] ) ) {
						$image_size = pixwell_getimagesize( $settings['image'] );
					} ?>
					<img src="<?php echo esc_url( $settings['image'] ); ?>" alt="<?php echo esc_attr( $alt_text ); ?>" width="<?php if ( ! empty( $image_size[0] ) ) {
						echo esc_attr( $image_size[0] );
					} ?>" height="<?php if ( ! empty( $image_size[1] ) ) {
						echo esc_attr( $image_size[1] );
					} ?>">
				<?php
				endif;
				if ( ! empty( $settings['url'] ) ) : ?>
					<a href="<?php echo esc_url( $settings['url'] ); ?>" <?php if ( ! empty( $settings['newtab'] ) && 1 == $settings['newtab'] ) {
						echo ' target="_blank" ';
					} ?> rel="noopener nofollow" class="banner-url" title="<?php echo esc_attr( $alt_text ); ?>"></a>
				<?php endif;
				?>
			</div>
		</div>
		<?php
	}
}


if ( ! function_exists( 'pixwell_register_fw_banner' ) ) {
	function pixwell_register_fw_banner( $blocks ) {

		if ( ! is_array( $blocks ) ) {
			$blocks = [];
		}

		$blocks[] = [
			'name'        => 'fw_banner',
			'title'       => esc_html__( 'Ruby Banner', 'pixwell' ),
			'tagline'     => esc_html__( 'Boxed', 'pixwell' ),
			'description' => esc_html__( 'Display custom banner with images and titles in fullwidth section (3 columns).', 'pixwell' ),
			'section'     => [ 'fullwidth' ],
			'img'         => get_theme_file_uri( 'assets/images/banner.png' ),
			'inputs'      => [
				[
					'name'        => 's1_title',
					'type'        => 'text',
					'tab'         => 'general',
					'title'       => esc_html__( 'SECTION 1: Section Title', 'pixwell' ),
					'description' => esc_html__( 'Input title for section 1.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 's1_url',
					'type'        => 'text',
					'tab'         => 'general',
					'title'       => esc_html__( 'Destination URL', 'pixwell' ),
					'description' => esc_html__( 'Input destination URL for section 1.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 's1_image',
					'type'        => 'text',
					'tab'         => 'general',
					'title'       => esc_html__( 'Attachment Image', 'pixwell' ),
					'description' => esc_html__( 'Input attachment Image URL for section 1.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 's1_newtab',
					'type'        => 'select',
					'tab'         => 'general',
					'title'       => esc_html__( 'Open New Tab', 'pixwell' ),
					'description' => esc_html__( 'Enable or disable open in a new tab.', 'pixwell' ),
					'options'     => [
						'1'  => esc_html__( 'New Tab', 'pixwell' ),
						'-1' => esc_html__( 'Self Window', 'pixwell' ),
					],
					'default'     => '1',
				],
				[
					'name'        => 's2_title',
					'type'        => 'text',
					'tab'         => 'general',
					'title'       => esc_html__( 'SECTION 2: Section Title', 'pixwell' ),
					'description' => esc_html__( 'Input title for section 2.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 's2_url',
					'type'        => 'text',
					'tab'         => 'general',
					'title'       => esc_html__( 'Destination URL', 'pixwell' ),
					'description' => esc_html__( 'Input destination URL for section 2.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 's2_image',
					'type'        => 'text',
					'tab'         => 'general',
					'title'       => esc_html__( 'Attachment Image', 'pixwell' ),
					'description' => esc_html__( 'Input attachment Image URL for section 2.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 's2_newtab',
					'type'        => 'select',
					'tab'         => 'general',
					'title'       => esc_html__( 'Open New Tab', 'pixwell' ),
					'description' => esc_html__( 'Enable or disable open in a new tab.', 'pixwell' ),
					'options'     => [
						'1'  => esc_html__( 'New Tab', 'pixwell' ),
						'-1' => esc_html__( 'Self Window', 'pixwell' ),
					],
					'default'     => '1',
				],
				[
					'name'        => 's3_title',
					'type'        => 'text',
					'tab'         => 'general',
					'title'       => esc_html__( 'SECTION 3: Section Title', 'pixwell' ),
					'description' => esc_html__( 'Input title for section 3.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 's3_url',
					'type'        => 'text',
					'tab'         => 'general',
					'title'       => esc_html__( 'Destination URL', 'pixwell' ),
					'description' => esc_html__( 'Input destination URL for section 3.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 's3_image',
					'type'        => 'text',
					'tab'         => 'general',
					'title'       => esc_html__( 'Attachment Image', 'pixwell' ),
					'description' => esc_html__( 'Input attachment Image URL for section 3.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 's3_newtab',
					'type'        => 'select',
					'tab'         => 'general',
					'title'       => esc_html__( 'Open New Tab', 'pixwell' ),
					'description' => esc_html__( 'Enable or disable open in a new tab.', 'pixwell' ),
					'options'     => [
						'1'  => esc_html__( 'New Tab', 'pixwell' ),
						'-1' => esc_html__( 'Self Window', 'pixwell' ),
					],
					'default'     => '1',
				],
				[
					'name'        => 'title',
					'type'        => 'text',
					'tab'         => 'header',
					'title'       => esc_html__( 'Block Title', 'pixwell' ),
					'description' => esc_html__( 'Input a block heading. Leave blank to disable the block header.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'viewmore_link',
					'type'        => 'text',
					'tab'         => 'header',
					'title'       => esc_html__( 'View More URL', 'pixwell' ),
					'description' => esc_html__( 'Input a custom destination link for the block header.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'viewmore_title',
					'type'        => 'text',
					'tab'         => 'header',
					'title'       => esc_html__( 'View More Label', 'pixwell' ),
					'description' => esc_html__( 'Input a block tagline.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'margin',
					'type'        => 'dimension',
					'tab'         => 'design',
					'title'       => esc_html__( 'Margin', 'pixwell' ),
					'description' => esc_html__( 'Select margin top and bottom values (in px) for this block, default is 0', 'pixwell' ),
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
					'description' => esc_html__( 'Select margin top and bottom values (in px) for this block in mobile devices, default is 0', 'pixwell' ),
					'default'     => [
						'top'    => 0,
						'bottom' => 35,
					],
				],
				[
					'name'        => 'header_color',
					'type'        => 'text',
					'tab'         => 'design',
					'title'       => esc_html__( 'Header Style Color', 'pixwell' ),
					'description' => esc_html__( 'Input hex color value (ie: #ff8763) for the block header title.', 'pixwell' ),
				],
				[
					'name'        => 'text_style',
					'type'        => 'select',
					'tab'         => 'design',
					'title'       => esc_html__( 'Banner Style', 'pixwell' ),
					'description' => esc_html__( 'Select banner style for this block.', 'pixwell' ),
					'options'     => [
						'0'     => esc_html__( '- Dark -', 'pixwell' ),
						'light' => esc_html__( 'Light', 'pixwell' ),
					],
					'default'     => 0,
				],
			],
		];

		return $blocks;
	}
}

add_filter( 'rbc_add_block', 'pixwell_register_fw_banner', 4900 );