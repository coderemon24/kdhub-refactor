<?php

namespace PixwellElementorElement\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use function get_template_part;

defined( 'ABSPATH' ) || exit;

class Header_Bookmark extends Widget_Base {

	public function get_name() {

		return 'pixwell-bookmark-icon';
	}

	public function get_title() {

		return esc_html__( 'Pixwell - Bookmark Icon', 'pixwell-core' );
	}

	public function get_icon() {

		return 'eicon-heart-o';
	}

	public function get_categories() {

		return [ 'pixwell_header' ];
	}

	protected function register_controls() {

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
				'description' => esc_html__( 'Select a color for the bookmark icon.', 'pixwell-core' ),
				'default'     => '',
				'selectors'   => [
					'{{WRAPPER}} .bookmark-icon svg'         => 'color: {{VALUE}};',
					'{{WRAPPER}} .bookmark-icon .rb-counter' => 'background-color: {{VALUE}};',
				],

			]
		);
		$this->add_control(
			'dark_color',
			[
				'label'       => esc_html__( 'Dark Mode - Icon Color', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Select a color for the bookmark icon in dark mode.', 'pixwell-core' ),
				'default'     => '',
				'selectors'   => [
					'[data-theme="dark"] {{WRAPPER}} .bookmark-icon svg'         => 'color: {{VALUE}};',
					'[data-theme="dark"] {{WRAPPER}} .bookmark-icon .rb-counter' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}

	protected function render() {

		get_template_part( 'templates/header/module', 'bookmark' );
	}
}