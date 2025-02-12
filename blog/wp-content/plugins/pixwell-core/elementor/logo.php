<?php

namespace PixwellElementorElement\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use function get_bloginfo;
use function is_front_page;
use function wp_get_attachment_image_src;

defined( 'ABSPATH' ) || exit;

class Logo extends Widget_Base {

	public function get_name() {

		return 'pixwell-logo';
	}

	public function get_title() {

		return esc_html__( 'Pixwell - Site Logo', 'pixwell-core' );
	}

	public function get_icon() {

		return 'eicon-logo';
	}

	public function get_categories() {

		return [ 'pixwell_header' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'general', [
				'label' => esc_html__( 'General', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'logo',
			[
				'label'       => esc_html__( 'Logo Image', 'pixwell-core' ),
				'description' => esc_html__( 'Select or upload a logo image, retina image is recommended.', 'pixwell-core' ),
				'type'        => Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'dark_logo',
			[
				'label'       => esc_html__( 'Dark Mode - Logo Image', 'pixwell-core' ),
				'description' => esc_html__( 'Select or upload a logo image in dark mode, retina image is recommended.', 'pixwell-core' ),
				'type'        => Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'logo_link',
			[
				'label'       => esc_html__( 'Custom Logo URL', 'pixwell-core' ),
				'description' => esc_html__( 'Input a custom URL for the logo, Default will return to the homepage.', 'pixwell-core' ),
				'type'        => Controls_Manager::URL,
				'default'     => [
					'url'               => '',
					'is_external'       => false,
					'nofollow'          => false,
					'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'heading_tag',
			[
				'label'       => esc_html__( 'Site Title Included', 'pixwell-core' ),
				'description' => esc_html__( 'Add the site title (H1) and description (hidden mode) to optimize for SEO. This setting is for the main site logo in the home page and should only be enabled once if you added multiple logos.', 'pixwell-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'no',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'logo-style-section', [
				'label' => esc_html__( 'Style', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'logo_width', [
				'label'       => __( 'Logo Width', 'pixwell-core' ),
				'description' => esc_html__( 'Set a max width for your logo', 'pixwell-core' ),
				'type'        => Controls_Manager::SLIDER,
				'range'       => [
					'px' => [
						'min' => 0,
						'max' => 800,
					],
				],
				'selectors'   => [ '{{WRAPPER}} .the-logo img' => 'max-width: {{SIZE}}px; width: {{SIZE}}px' ],
			]
		);
		$this->add_control(
			'sticky_logo_width', [
				'label'       => __( 'Sticky Logo Width', 'pixwell-core' ),
				'description' => esc_html__( 'Set a max width for the logo if your logo is included in the sticky menu bar.', 'pixwell-core' ),
				'type'        => Controls_Manager::SLIDER,
				'range'       => [
					'px' => [
						'min' => 0,
						'max' => 800,
					],
				],
				'selectors'   => [ '.sticky-on {{WRAPPER}} .the-logo img' => 'max-width: {{SIZE}}px; width: {{SIZE}}px' ],
			]
		);
		$this->add_control(
			'align', [
				'label'     => esc_html__( 'Alignment', 'pixwell-core' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => esc_html__( 'Left', 'pixwell-core' ),
						'icon'  => 'eicon-align-start-h',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'pixwell-core' ),
						'icon'  => 'eicon-align-center-h',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'pixwell-core' ),
						'icon'  => 'eicon-align-end-h',
					],
				],
				'selectors' => [ '{{WRAPPER}} .the-logo' => 'text-align: {{VALUE}};', ],
			]
		);
		$this->add_control(
			'feat_lazyload',
			[
				'label'       => esc_html__( 'Lazy Load', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Enable or disable lazy load for the logo if you put this block inside the body or footer', 'pixwell-core' ),
				'options'     => [
					'0' => esc_html__( '- Disable -', 'pixwell-core' ),
					'1' => esc_html__( 'Enable', 'pixwell-core' ),
				],
				'default'     => '0',
			]
		);
		$this->end_controls_section();
	}

	/**
	 * @return false
	 */
	protected function render() {

		$settings = $this->get_settings();

		if ( empty( $settings['logo']['url'] ) ) {
			return false;
		}

		$logo_width  = '';
		$logo_height = '';

		if ( ! empty( $settings['logo']['id'] ) ) {
			$attachment  = wp_get_attachment_image_src( $settings['logo']['id'], 'full' );
			$logo_width  = ! empty( $attachment[1] ) ? $attachment[1] : '1';
			$logo_height = ! empty( $attachment[2] ) ? $attachment[2] : '1';
		}

		$settings['logo_link']['url'] = ! empty( $settings['logo_link']['url'] ) ? $settings['logo_link']['url'] : home_url( '/' );
		$lazy                         = ( ! empty( $settings['feat_lazyload'] ) && '1' === (string) $settings['feat_lazyload'] ) ? 'lazy' : 'eager';

		$this->add_link_attributes( 'logo_link', $settings['logo_link'] );
		?>
		<div class="the-logo is-logo-image">
			<a <?php echo $this->get_render_attribute_string( 'logo_link' ); ?>>
				<?php if ( ! empty( $settings['dark_logo']['url'] ) ) : ?>
					<img loading="<?php echo esc_attr( $lazy ); ?>" decoding="async" data-mode="default" width="<?php echo $logo_width; ?>" height="<?php echo $logo_height; ?>" src="<?php echo $settings['logo']['url']; ?>" alt="<?php echo ( ! empty( $settings['logo']['alt'] ) ) ? esc_attr( $settings['logo']['alt'] ) : get_bloginfo( 'name' ); ?>">
					<img loading="<?php echo esc_attr( $lazy ); ?>" decoding="async" data-mode="dark" width="<?php echo $logo_width; ?>" height="<?php echo $logo_height; ?>" src="<?php echo $settings['dark_logo']['url']; ?>" alt="<?php echo ( ! empty( $settings['dark_logo']['alt'] ) ) ? esc_attr( $settings['dark_logo']['alt'] ) : ''; ?>">
				<?php else : ?>
					<img loading="<?php echo esc_attr( $lazy ); ?>" decoding="async" width="<?php echo $logo_width; ?>" height="<?php echo $logo_height; ?>" src="<?php echo $settings['logo']['url']; ?>" alt="<?php echo ( ! empty( $settings['logo']['alt'] ) ) ? esc_attr( $settings['logo']['alt'] ) : get_bloginfo( 'name' ); ?>">
				<?php endif; ?>
			</a>
			<?php if ( is_front_page() && ! empty( $settings['heading_tag'] ) ) : ?>
				<h1 class="logo-title hidden"><?php bloginfo( 'name' ); ?></h1>
				<?php if ( get_bloginfo( 'description' ) ) : ?>
					<p class="site-description hidden"><?php bloginfo( 'description' ); ?></p>
				<?php endif;
			endif; ?>
		</div>
		<?php
	}
}