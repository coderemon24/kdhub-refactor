<?php

namespace PixwellElementorElement\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
use function pixwell_elementor_main_menu;

defined( 'ABSPATH' ) || exit;

class Navigation extends Widget_Base {

	public function get_name() {

		return 'pixwell-navigation';
	}

	public function get_title() {

		return esc_html__( 'Pixwell - Menu Navigation', 'pixwell-core' );
	}

	public function get_icon() {

		return 'eicon-navigation-horizontal';
	}

	public function get_categories() {

		return [ 'pixwell_header' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'general_section', [
				'label' => esc_html__( 'Menu', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$menus = $this->get_menus();
		$this->add_control(
			'main_menu', [
				'label'        => esc_html__( 'Assign Menu', 'pixwell-core' ),
				'description'  => esc_html__( 'Select a menu for your site.', 'pixwell-core' ),
				'type'         => Controls_Manager::SELECT,
				'multiple'     => false,
				'options'      => $menus,
				'default'      => ! empty( array_keys( $menus )[0] ) ? array_keys( $menus )[0] : '',
				'save_default' => true,
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'root_level_section', [
				'label' => esc_html__( 'Main Level Items', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'menu_typography_info',
			[
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => esc_html__( 'Navigate to Theme Options > Typography > Header Menus to edit the typography for the website menu.', 'pixwell-core' ),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-success',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Main Menu Font', 'pixwell-core' ),
				'name'     => 'menu_font',
				'selector' => '{{WRAPPER}} .main-menu > li > a',
			]
		);
		$this->add_control(
			'menu_color',
			[
				'label'       => esc_html__( 'Text Color', 'pixwell-core' ),
				'description' => esc_html__( 'Select a text color for displaying in the navigation bar of this header.', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [ '{{WRAPPER}} .main-menu > li > a' => 'color: {{VALUE}};' ],
			]
		);
		$this->add_control(
			'menu_hover_color',
			[
				'label'       => esc_html__( 'Hover - Text Color', 'pixwell-core' ),
				'description' => esc_html__( 'Select a text color when hovering.', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [ '{{WRAPPER}} .main-menu > li > a::hover' => 'color: {{VALUE}};' ],
			]
		);

		$this->add_control(
			'menu_height', [
				'label'       => esc_html__( 'Menu Height', 'pixwell-core' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Input custom height value (in pixels) for this menu. Default is 60.', 'pixwell-core' ),
				'selectors'   => [ '{{WRAPPER}} .main-menu > li > a' => 'height: {{VALUE}}px;' ],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'dark_root_level_section', [
				'label' => esc_html__( 'Dark Mode - Main Level Items', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'menu_dark_color',
			[
				'label'       => esc_html__( 'Text Color', 'pixwell-core' ),
				'description' => esc_html__( 'Select a text color for displaying in the navigation bar of this header in dark mode.', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [ '[data-theme="dark"] {{WRAPPER}}' => '--nav-color: {{VALUE}}; --nav-color-10: {{VALUE}}1a;' ],
			]
		);
		$this->add_control(
			'menu_dark_hover_color',
			[
				'label'       => esc_html__( 'Hover Text Color', 'pixwell-core' ),
				'description' => esc_html__( 'Select a text color when hovering in dark mode.', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [ '[data-theme="dark"] {{WRAPPER}}' => '--nav-color-h: {{VALUE}};' ],
			]
		);
		$this->add_control(
			'menu_dark_hover_color_accent',
			[
				'label'       => esc_html__( 'Hover Accent Color', 'pixwell-core' ),
				'description' => esc_html__( 'Select a accent color when hovering in dark mode.', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [ '[data-theme="dark"] {{WRAPPER}}' => '--nav-color-h-accent: {{VALUE}};' ],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'sub_menu_section', [
				'label' => esc_html__( 'Sub Menu', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Sub Menu Font', 'pixwell-core' ),
				'name'     => 'submenu_font',
				'selector' => '{{WRAPPER}} .main-menu .sub-menu > .menu-item a, {{WRAPPER}} .user-dropdown a, {{WRAPPER}} .more-col .menu a, {{WRAPPER}} .collapse-footer-menu a',
			]
		);
		$this->add_control(
			'submenu_bg_from',
			[
				'label'       => esc_html__( 'Sub Menu - Background Gradient (From)', 'pixwell-core' ),
				'description' => esc_html__( 'Select a background color (color stop: 0%) for the sub menu dropdown section.', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [ '{{WRAPPER}}, {{WRAPPER}} .main-menu .sub-menu' => '--subnav-bg: {{VALUE}}; --subnav-bg-from: {{VALUE}};' ],
			]
		);
		$this->add_control(
			'submenu_bg_to',
			[
				'label'       => esc_html__( 'Sub Menu - Background Gradient (To)', 'pixwell-core' ),
				'description' => esc_html__( 'Select a background color (color stop: 100%) for the sub menu dropdown section.', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [ '{{WRAPPER}}, {{WRAPPER}} .mega-dropdown-inner:not(.mega-template-inner)' => '--subnav-bg-to: {{VALUE}};' ],
			]
		);
		$this->add_control(
			'submenu_color',
			[
				'label'       => esc_html__( 'Sub Menu - Text Color', 'pixwell-core' ),
				'description' => esc_html__( 'Select a text color for the sub menu dropdown section.', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [ '{{WRAPPER}}' => '--subnav-color: {{VALUE}}; --subnav-color-10: {{VALUE}}1a;' ],
			]
		);
		$this->add_control(
			'submenu_hover_color',
			[
				'label'       => esc_html__( 'Sub Menu - Hover Text Color', 'pixwell-core' ),
				'description' => esc_html__( 'Select a text color when hovering.', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [ '{{WRAPPER}}' => '--subnav-color-h: {{VALUE}};' ],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'dark_sub_menu_section', [
				'label' => esc_html__( 'Dark Mode - Sub Menu', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'dark_submenu_bg_from',
			[
				'label'       => esc_html__( 'Sub Menu - Background Gradient (From)', 'pixwell-core' ),
				'description' => esc_html__( 'Select a background color (color stop: 0%) for the sub menu dropdown section in dark mode.', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [ '[data-theme="dark"] {{WRAPPER}}, [data-theme="dark"] {{WRAPPER}} .mega-dropdown-inner:not(.mega-template-inner)' => '--subnav-bg: {{VALUE}}; --subnav-bg-from: {{VALUE}};' ],
			]
		);
		$this->add_control(
			'dark_submenu_bg_to',
			[
				'label'       => esc_html__( 'Sub Menu - Background Gradient (To)', 'pixwell-core' ),
				'description' => esc_html__( 'Select a background color (color stop: 100%) for the sub menu dropdown section in dark mode.', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [ '[data-theme="dark"] {{WRAPPER}}, [data-theme="dark"] {{WRAPPER}} .mega-dropdown-inner:not(.mega-template-inner)' => '--subnav-bg-to: {{VALUE}};' ],
			]
		);
		$this->add_control(
			'dark_submenu_color',
			[
				'label'       => esc_html__( 'Sub Menu - Text Color', 'pixwell-core' ),
				'description' => esc_html__( 'Select a text color for the sub menu dropdown section in dark mode.', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [ '[data-theme="dark"] {{WRAPPER}}' => '--subnav-color: {{VALUE}}; --subnav-color-10: {{VALUE}}1a;' ],
			]
		);
		$this->add_control(
			'dark_submenu_hover_color',
			[
				'label'       => esc_html__( 'Sub Menu - Hover Text Color', 'pixwell-core' ),
				'description' => esc_html__( 'Select a text color when hovering in dark mode.', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [ '[data-theme="dark"] {{WRAPPER}}' => '--subnav-color-h: {{VALUE}};' ],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'mega-menu-section', [
				'label' => esc_html__( 'Mega Menu - Color Scheme', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'color_scheme_info',
			[
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => esc_html__( 'This is treated as a global setting. Each menu item in "Appearance > Menu" take priority over this setting.', 'pixwell-core' ),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-success',
			]
		);
		$this->add_control(
			'color_scheme',
			[
				'label'       => esc_html__( 'Color Scheme', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'In case you would like to switch layout and text to light when set a dark background for sub menu in light mode.', 'pixwell-core' ),
				'options'     => [
					'0' => esc_html__( 'Default (Dark Text)', 'pixwell-core' ),
					'1' => esc_html__( 'Light Text', 'pixwell-core' ),
				],
				'default'     => '0',
			]
		);
		$this->end_controls_section();
	}

	protected function get_menus() {

		$menus   = wp_get_nav_menus();
		$options = [];

		foreach ( $menus as $menu ) {
			$options[ $menu->slug ] = $menu->name;
		}

		return $options;
	}

	protected function render() {

		$settings = $this->get_settings();
		pixwell_elementor_main_menu( $settings );
	}
}