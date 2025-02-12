<?php

namespace PixwellElementorElement\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use function get_template_part;

defined( 'ABSPATH' ) || exit;

class Header_Notification extends Widget_Base {

	public function get_name() {

		return 'pixwell-trending-icon';
	}

	public function get_title() {

		return esc_html__( 'Pixwell - Trending Icon', 'pixwell-core' );
	}

	public function get_icon() {

		return 'eicon-info-circle-o';
	}

	public function get_categories() {

		return [ 'pixwell_header' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'style-section', [
				'label' => esc_html__( 'Style Settings', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'icon_size',
			[
				'label'       => esc_html__( 'Icon Font Size', 'pixwell-core' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Select a custom font size for the trending icon.', 'pixwell-core' ),
				'selectors'   => [
					'{{WRAPPER}} .trend-icon' => 'font-size: {{VALUE}}px;',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'color-section', [
				'label' => esc_html__( 'Colors', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'color',
			[
				'label'       => esc_html__( 'Icon Color', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Select a color for the trending icon.', 'pixwell-core' ),
				'default'     => '',
				'selectors'   => [ '{{WRAPPER}} .trend-icon i' => 'color: {{VALUE}};' ],
			]
		);
		$this->add_control(
			'dark_color',
			[
				'label'       => esc_html__( 'Dark Mode - Icon Color', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Select a color for the trending icon in dark mode.', 'pixwell-core' ),
				'default'     => '',
				'selectors'   => [ '[data-theme="dark"] {{WRAPPER}} .trend-icon i' => 'color: {{VALUE}};' ],
			]
		);
		$this->end_controls_section();
	}

	protected function render() {

		get_template_part( 'templates/header/module', 'trend' );
	}
}