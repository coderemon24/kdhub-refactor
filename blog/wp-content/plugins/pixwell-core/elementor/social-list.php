<?php

namespace PixwellElementorElement\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use function get_template_part;

defined( 'ABSPATH' ) || exit;

class Social_List extends Widget_Base {

	public function get_name() {

		return 'pixwell-social-list';
	}

	public function get_title() {

		return esc_html__( 'Pixwell - Social List', 'pixwell-core' );
	}

	public function get_icon() {

		return 'eicon-social-icons';
	}

	public function get_categories() {

		return [ 'pixwell_header' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'style-section', [
				'label' => esc_html__( 'Style', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'layout_info',
			[
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => esc_html__( 'This block will get information from Theme Options > Social Profiles to show.', 'pixwell-core' ),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-success',
			]
		);
		$this->add_control(
			'icon_size',
			[
				'label'       => esc_html__( 'Icon Font Size', 'pixwell-core' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Select a custom font size for the social icons.', 'pixwell-core' ),
				'selectors'   => [ '{{WRAPPER}} .navbar-social i' => 'font-size: {{VALUE}}px;' ],
			]
		);
		$this->add_control(
			'icon_height',
			[
				'label'       => esc_html__( 'Icon Height', 'pixwell-core' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Select a custom height value for the social icons.', 'pixwell-core' ),
				'selectors'   => [ '{{WRAPPER}} .navbar-social i' => 'line-height: {{VALUE}}px;' ],
			]
		);
		$this->add_control(
			'item_spacing', [
				'label'       => esc_html__( 'Item Spacing', 'pixwell-core' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Input a custom spacing between social list item (in px). Default is 5.', 'pixwell-core' ),
				'selectors'   => [ '{{WRAPPER}} .navbar-social > a' => 'padding-left: {{VALUE}}px; padding-right: {{VALUE}}px;' ],
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
			'icon_color',
			[
				'label'       => esc_html__( 'Icon Color', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Select a color for the social icons.', 'pixwell-core' ),
				'default'     => '',
				'selectors'   => [ '{{WRAPPER}} .navbar-social i' => 'color: {{VALUE}};' ],
			]
		);
		$this->add_control(
			'dark_icon_color',
			[
				'label'       => esc_html__( 'Dark Mode - Icon Color', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Select a color for the social icons in dark mode.', 'pixwell-core' ),
				'default'     => '',
				'selectors'   => [ '[data-theme="dark"] {{WRAPPER}} .navbar-social i' => 'color: {{VALUE}};' ],
			]
		);
		$this->end_controls_section();
	}

	/**
	 * render layout
	 */
	protected function render() {

		get_template_part( 'templates/header/module', 'social' );
	}
}