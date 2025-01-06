<?php

namespace PixwellElementorElement\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use function get_template_part;

defined( 'ABSPATH' ) || exit;

class Header_Search_Icon extends Widget_Base {

	public function get_name() {

		return 'pixwell-search-icon';
	}

	public function get_title() {

		return esc_html__( 'Pixwell - Search Icon', 'pixwell-core' );
	}

	public function get_icon() {

		return 'eicon-search';
	}

	public function get_categories() {

		return [ 'pixwell_element' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'search-icon-section', [
				'label' => esc_html__( 'General', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'icon_size',
			[
				'label'       => esc_html__( 'Icons Font Size', 'pixwell-core' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Select a custom font size for the search icon.', 'pixwell-core' ),
				'selectors'   => [
					'{{WRAPPER}} .navbar-search i' => 'font-size: {{VALUE}}px;',
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label'       => esc_html__( 'Text & Icons Color', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Select a color for the icon and text for this search form.', 'pixwell-core' ),
				'default'     => '',
				'selectors'   => [
					'{{WRAPPER}} .navbar-search i' => 'color: {{VALUE}};',

				],
			]
		);
		$this->add_control(
			'dark_icon_color',
			[
				'label'       => esc_html__( 'Dark Mode - Text & Icons Color', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Select a color for the icon and text for this search form in dark mode.', 'pixwell-core' ),
				'default'     => '',
				'selectors'   => [
					'[data-theme="dark"] {{WRAPPER}} .navbar-search i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings();
		if ( ! empty( $settings['header_search_custom_icon'] ) ) {
			$settings['header_search_custom_icon'] = [
				'url' => $settings['header_search_custom_icon'],
			];
		}

		get_template_part( 'templates/header/module', 'search' );
	}
}