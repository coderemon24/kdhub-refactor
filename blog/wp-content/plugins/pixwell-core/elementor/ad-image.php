<?php

namespace PixwellElementorElement\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use function pixwell_get_ad_image;
use function wp_get_attachment_metadata;

defined( 'ABSPATH' ) || exit;

/**
 * Class
 *
 * @package pixwellElementor\Widgets
 */
class Ad_Image extends Widget_Base {

	public function get_name() {

		return 'pixwell-ad-image';
	}

	public function get_title() {

		return esc_html__( 'Pixwell - Ad Image', 'pixwell-core' );
	}

	public function get_icon() {

		return 'eicon-favorite';
	}

	public function get_categories() {

		return [ 'pixwell-fw' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'general', [
				'label' => esc_html__( 'General Settings', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'description',
			[
				'label'       => esc_html__( 'Description', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input a description for this adverting box.', 'pixwell-core' ),
				'default'     => esc_html__( '- Advertisement -', 'pixwell-core' ),
			]
		);
		$this->add_control(
			'image',
			[
				'label'       => esc_html__( 'Ad Image', 'pixwell-core' ),
				'description' => esc_html__( 'Upload your ad image.', 'pixwell-core' ),
				'type'        => Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'dark_image',
			[
				'label'       => esc_html__( 'Dark Mode - Ad Image', 'pixwell-core' ),
				'description' => esc_html__( 'Upload your ad image in dark mode.', 'pixwell-core' ),
				'type'        => Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'destination',
			[
				'label'       => esc_html__( 'Ad Destination', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input your ad destination URL.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'image_width_section', [
				'label' => esc_html__( 'Image Max Width', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'image_width',
			[
				'label'       => esc_html__( 'Image Max Width', 'pixwell-core' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Input a max width value (in px) for your ad image, leave blank set full size.', 'pixwell-core' ),
				'selectors'   => [
					'{{WRAPPER}} .ad-image' => 'max-width: {{VALUE}}px',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'color_section', [
				'label' => esc_html__( 'Text Color Scheme', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'color_scheme_info',
			[
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => esc_html__( 'In case you would like to switch layout and text to light when set a dark background for this section.', 'pixwell-core' ),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-success',
			]
		);
		$this->add_control(
			'color_scheme',
			[
				'label'       => esc_html__( 'Text Color Scheme', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select a text color scheme for this block.', 'pixwell-core' ),
				'options'     => [
					'0' => esc_html__( 'Default (Dark Text)', 'pixwell-core' ),
					'1' => esc_html__( 'Light Text', 'pixwell-core' ),
				],
				'default'     => '0',
			]
		);
		$this->end_controls_section();
	}

	/**
	 * render layout
	 */
	protected function render() {

		if ( function_exists( 'pixwell_get_ad_image' ) ) {
			$settings               = $this->get_settings();
			$settings['uuid']       = 'uid_' . $this->get_id();
			$settings['no_spacing'] = true;

			if ( ! empty( $settings['image']['id'] ) ) {
				$medata = wp_get_attachment_metadata( $settings['image']['id'] );
				if ( ! empty( $medata['width'] ) && ! empty( $medata['height'] ) ) {
					$settings['image']['width']  = $medata['width'];
					$settings['image']['height'] = $medata['height'];
				}
			}
			echo pixwell_get_ad_image( $settings );
		}
	}
}