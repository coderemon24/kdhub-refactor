<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_rbc_fw_category_2' ) ) {
	function pixwell_rbc_fw_category_2( $attrs ) {

		$settings            = shortcode_atts( [
			'uuid'        => '',
			'title'       => '',
			'description' => '',
			'category_1'  => '',
			'category_2'  => '',
			'category_3'  => '',
			'category_4'  => '',
			'text_style'  => '',
		], $attrs );
		$settings['classes'] = 'fw-category fw-category-2';
		ob_start();

		pixwell_block_open( $settings ); ?>
		<div class="cat-list-wrap rbc-container rb-p20-gutter">
			<div class="cat-list-inner">
				<header class="block-header cat-list-header">
					<?php if ( ! empty( $settings['title'] ) ) : ?>
						<h2 class="block-title h3"><?php echo esc_html( $settings['title'] ); ?></h2>
					<?php endif;
					if ( ! empty( $settings['description'] ) ) : ?>
						<div class="element-desc"><?php pixwell_render_inline_html( $settings['description'] ); ?></div>
					<?php endif; ?>
				</header>
				<div class="cat-list-content">
					<div class="cat-list-content-inner">
						<?php
						if ( ! empty( $settings['category_1'] ) ) {
							pixwell_module_category( $settings['category_1'], '', 'h6' );
						}
						if ( ! empty( $settings['category_2'] ) ) {
							pixwell_module_category( $settings['category_2'], '', 'h6' );
						}
						if ( ! empty( $settings['category_3'] ) ) {
							pixwell_module_category( $settings['category_3'], '', 'h6' );
						}
						if ( ! empty( $settings['category_4'] ) ) {
							pixwell_module_category( $settings['category_4'], '', 'h6' );
						} ?>
					</div>
				</div>
			</div>
		</div>
		<?php pixwell_block_close();

		return ob_get_clean();
	}
}

if ( ! function_exists( 'pixwell_register_fw_category_2' ) ) {
	function pixwell_register_fw_category_2( $blocks ) {

		if ( ! is_array( $blocks ) ) {
			$blocks = [];
		}

		$blocks[] = [
			'name'        => 'fw_category_2',
			'title'       => esc_html__( 'Category List', 'pixwell' ),
			'tagline'     => esc_html__( 'Stretched', 'pixwell' ),
			'description' => esc_html__( 'Display a list of categories (4 columns). This block requests to upload the category featured images (Posts - Categories - Edit)', 'pixwell' ),
			'tips'        => esc_html__( 'Switch parent section settings to FullWidth Stretched to make sure the block display correctly.', 'pixwell' ),
			'section'     => 'fullwidth',
			'img'         => get_theme_file_uri( 'assets/images/cat-2.png' ),
			'inputs'      => [
				[
					'name'        => 'title',
					'type'        => 'text',
					'tab'         => 'general',
					'title'       => esc_html__( 'Block Title', 'pixwell' ),
					'description' => esc_html__( 'Input block title for this block.', 'pixwell' ),
					'default'     => esc_html__( 'Categories', 'pixwell' ),
				],
				[
					'name'        => 'description',
					'type'        => 'textarea',
					'tab'         => 'general',
					'title'       => esc_html__( 'Block Description', 'pixwell' ),
					'description' => esc_html__( 'Input a short description for this block.', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'category_1',
					'type'        => 'category_select',
					'tab'         => 'general',
					'title'       => esc_html__( 'Category 1', 'pixwell' ),
					'description' => esc_html__( 'Select a category to display', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'category_2',
					'type'        => 'category_select',
					'tab'         => 'general',
					'title'       => esc_html__( 'Category 2', 'pixwell' ),
					'description' => esc_html__( 'Select a category to display', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'category_3',
					'type'        => 'category_select',
					'tab'         => 'general',
					'title'       => esc_html__( 'Category 3', 'pixwell' ),
					'description' => esc_html__( 'Select a category to display', 'pixwell' ),
					'default'     => '',
				],
				[
					'name'        => 'category_4',
					'type'        => 'category_select',
					'tab'         => 'general',
					'title'       => esc_html__( 'Category 4', 'pixwell' ),
					'description' => esc_html__( 'Select a category to display', 'pixwell' ),
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
						'top'    => '50',
						'right'  => '0',
						'bottom' => '50',
						'left'   => '0',

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
						'right'  => '0',
						'bottom' => '30',
						'left'   => '0',
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

add_filter( 'rbc_add_block', 'pixwell_register_fw_category_2', 1001 );