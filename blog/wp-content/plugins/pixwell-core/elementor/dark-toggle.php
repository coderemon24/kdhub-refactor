<?php

namespace PixwellElementorElement\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use function get_template_part;

defined( 'ABSPATH' ) || exit;

class Dark_Mode_Toggle extends Widget_Base {

	public function get_name() {

		return 'pixwell-dark-mode-toggle';
	}

	public function get_title() {

		return esc_html__( 'Pixwell - Dark Mode Toggle', 'pixwell-core' );
	}

	public function get_icon() {

		return 'eicon-adjust';
	}

	public function get_categories() {

		return [ 'pixwell_header' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'style-section', [
				'label' => esc_html__( 'General', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'icon_size',
			[
				'label'       => esc_html__( 'Switcher Size Scale', 'pixwell-core' ),
				'type'        => Controls_Manager::SLIDER,
				'description' => esc_html__( 'Change dark mode switcher size.', 'pixwell-core' ),
				'size_units'  => [ '%' ],
				'range'       => [
					'%' => [
						'min' => 50,
						'max' => 150,
					],
				],
				'default'     => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors'   => [
					'{{WRAPPER}} .mode-icons' => 'transform: scale({{SIZE}}{{UNIT}}); -webkit-transform: scale({{SIZE}}{{UNIT}});',
				],
			]
		);
		$this->add_responsive_control(
			'align', [
				'label'     => esc_html__( 'Alignment', 'pixwell-core' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'flex-start' => [
						'title' => esc_html__( 'Left', 'pixwell-core' ),
						'icon'  => 'eicon-align-start-h',
					],
					'center'     => [
						'title' => esc_html__( 'Center', 'pixwell-core' ),
						'icon'  => 'eicon-align-center-h',
					],
					'flex-end'   => [
						'title' => esc_html__( 'Right', 'pixwell-core' ),
						'icon'  => 'eicon-align-end-h',
					],
				],
				'selectors' => [ '{{WRAPPER}} .dark-mode-toggle' => 'justify-content: {{VALUE}};', ],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'light-mode-section', [
				'label' => esc_html__( 'Switcher - Light Mode', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'light_color',
			[
				'label'       => esc_html__( 'Icon - Color', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Select a color for the sun icon.', 'pixwell-core' ),
				'selectors'   => [ '{{WRAPPER}} .mode-icons .mode-icon-default' => 'color: {{VALUE}};' ],
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'dark-mode-section', [
				'label' => esc_html__( 'Switcher - Dark Mode', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'dark_text_color',
			[
				'label'       => esc_html__( 'Icon - Color', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Select a background for the moon icon.', 'pixwell-core' ),
				'selectors'   => [ '{{WRAPPER}} .mode-icons .mode-icon-dark' => 'color: {{VALUE}};' ],
			]
		);
		$this->end_controls_section();
	}

	/**
	 * render layout
	 */
	protected function render() {

		get_template_part( 'templates/header/module', 'darkmode' );
	}
}