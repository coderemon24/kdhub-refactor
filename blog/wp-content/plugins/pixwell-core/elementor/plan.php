<?php

namespace PixwellElementorElement\Widgets;

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Widget_Base;
use PixwellElementorControl\Options;
use function pixwell_render_pricing_plan;

defined( 'ABSPATH' ) || exit;

class Plan extends Widget_Base {

	public function get_name() {

		return 'pixwell-plan';
	}

	public function get_title() {

		return esc_html__( 'Pixwell - Plan Subscription', 'pixwell-core' );
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
			'title',
			[
				'label'       => esc_html__( 'Title', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'ai'          => [ 'active' => false ],
				'rows'        => 2,
				'description' => esc_html__( 'Input a title for this banner.', 'pixwell-core' ),
				'default'     => 'Get <span>unlimited</span> access to everything',
			]
		);
		$this->add_control(
			'description',
			[
				'label'       => esc_html__( 'Description', 'pixwell-core' ),
				'description' => esc_html__( 'Input a description for this plan.', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'ai'          => [ 'active' => false ],
				'rows'        => 3,
				'default'     => 'Plans starting at less than $9/month. <strong>Cancel anytime.</strong>',
			]
		);
		$this->add_control(
			'price',
			[
				'label'       => esc_html__( 'Price', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input a price for this plan.', 'pixwell-core' ),
				'default'     => '9',
			]
		);
		$this->add_control(
			'unit',
			[
				'label'       => esc_html__( 'Price Unit', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input a price unit for this plan.', 'pixwell-core' ),
				'default'     => '$',
			]
		);
		$this->add_control(
			'tenure',
			[
				'label'       => esc_html__( 'Price Tenure', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input a price tenure for this plan.', 'pixwell-core' ),
				'default'     => '/month',
			]
		);
		$features = new Repeater();
		$features->add_control(
			'feature',
			[
				'label'       => esc_html__( 'Plan Feature', 'pixwell-core' ),
				'description' => esc_html__( 'Input a feature for this plan.', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'ai'          => [ 'active' => false ],
				'rows'        => 2,
				'default'     => '',
			]
		);
		$this->add_control(
			'features',
			[
				'label'       => esc_html__( 'Plan Features', 'pixwell-core' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $features->get_controls(),
				'title_field' => '{{{ feature }}}',

			]
		);
		$this->add_control(
			'shortcode',
			[
				'label'       => esc_html__( 'Membership Payment Button Shortcode', 'pixwell-core' ),
				'description' => esc_html__( 'Input a payment button shortcode. Use button text if you would like to custom label. for example [swpm_payment_button id=1 button_text="Buy Now"]', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'ai'          => [ 'active' => false ],
				'placeholder' => '[swpm_payment_button id=1]',
				'rows'        => 2,
				'default'     => '',

			]
		);
		$this->add_control(
			'register_button',
			[
				'label'       => esc_html__( 'or Free Button', 'pixwell-core' ),
				'description' => esc_html__( 'Input a free button label to navigate to the user to the register page. Leave blank the payment shortcode filed to use this setting.', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'ai'          => [ 'active' => false ],
				'placeholder' => 'Join Now',
				'rows'        => 2,
				'default'     => '',

			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'box_style_section', [
				'label' => esc_html__( 'Box Style', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'box_style',
			[
				'label'       => esc_html__( 'Box Style', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select a style for for this plan box.', 'pixwell-core' ),
				'options'     => [
					'shadow' => esc_html__( 'Shadow', 'pixwell-core' ),
					'border' => esc_html__( 'Border', 'pixwell-core' ),
					'bg'     => esc_html__( 'Background', 'pixwell-core' ),
				],
				'default'     => 'shadow',
			]
		);
		$this->add_control(
			'box_style_color',
			[
				'label'       => esc_html__( 'Box Style Color', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Select a color for your box style.', 'pixwell-core' ),
				'default'     => '',
				'selectors'   => [ '{{WRAPPER}}' => '--plan-box-color: {{VALUE}};' ],
			]
		);
		$this->add_control(
			'dark_box_style_color',
			[
				'label'       => esc_html__( 'Dark - Box Style Color', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Select a color for this plan box in dark mode.', 'pixwell-core' ),
				'default'     => '',
				'selectors'   => [ '[data-theme="dark"] {{WRAPPER}}' => '--plan-box-color: {{VALUE}};' ],
			]
		);

		$this->add_control(
			'button_bg',
			[
				'label'       => esc_html__( 'Button Background', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Select a background color for the payment button.', 'pixwell-core' ),
				'default'     => '',
				'selectors'   => [ '{{WRAPPER}} .plan-button-wrap' => '--plan-button-bg: {{VALUE}}; --plan-button-bg-opacity: {{VALUE}}ee;' ],
			]
		);
		$this->add_control(
			'dark_button_bg',
			[
				'label'       => esc_html__( 'Dark - Button Background', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Select a background color for the payment button in dark mode.', 'pixwell-core' ),
				'default'     => '',
				'selectors'   => [ '[data-theme="dark"] {{WRAPPER}} .plan-button-wrap' => '--plan-button-bg: {{VALUE}}; --plan-button-bg-opacity: {{VALUE}}ee;' ],
			]
		);

		$this->add_control(
			'button_color',
			[
				'label'       => esc_html__( 'Button Color', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Select a background color for the payment button.', 'pixwell-core' ),
				'default'     => '',
				'selectors'   => [ '{{WRAPPER}} .plan-button-wrap' => '--plan-button-color: {{VALUE}};' ],
			]
		);
		$this->add_control(
			'dark_button_color',
			[
				'label'       => esc_html__( 'Dark - Button Color', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Select a background color for the payment button in dark mode.', 'pixwell-core' ),
				'default'     => '',
				'selectors'   => [ '[data-theme="dark"] {{WRAPPER}} .plan-button-wrap' => '--plan-button-color: {{VALUE}};' ],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'size_section', [
				'label' => esc_html__( 'Font Size', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'title_size',
			[
				'label'       => esc_html__( 'Title Font Size', 'pixwell-core' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Input a custom font size (in px) for the title.', 'pixwell-core' ),
				'devices'     => [ 'desktop', 'tablet', 'mobile' ],
				'selectors'   => [
					'{{WRAPPER}} .plan-heading' => 'font-size: {{VALUE}}px',
				],
			]
		);
		$this->add_responsive_control(
			'desc_size',
			[
				'label'       => esc_html__( 'Description Font Size', 'pixwell-core' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Input a custom font size (in px) for the description.', 'pixwell-core' ),
				'devices'     => [ 'desktop', 'tablet', 'mobile' ],
				'selectors'   => [
					'{{WRAPPER}} .plan-description' => 'font-size: {{VALUE}}px',
				],
			]
		);
		$this->add_responsive_control(
			'feature_size',
			[
				'label'       => esc_html__( 'Feature List Font Size', 'pixwell-core' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Input a custom font size (in px) for the description.', 'pixwell-core' ),
				'devices'     => [ 'desktop', 'tablet', 'mobile' ],
				'selectors'   => [
					'{{WRAPPER}} .plan-features' => 'font-size: {{VALUE}}px',
				],
			]
		);
		$this->add_responsive_control(
			'button_size',
			[
				'label'       => esc_html__( 'Button Font Size', 'pixwell-core' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Input a custom font size (in px) for the payment button.', 'pixwell-core' ),
				'devices'     => [ 'desktop', 'tablet', 'mobile' ],
				'selectors'   => [
					'{{WRAPPER}} .plan-button-wrap' => '--plan-button-size: {{VALUE}}px',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'spacing_section', [
				'label' => esc_html__( 'Spacing', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'el_spacing',
			[
				'label'       => esc_html__( 'Spacing', 'pixwell-core' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Input a custom spacing value(px) between element.', 'pixwell-core' ),
				'devices'     => [ 'desktop', 'tablet', 'mobile' ],
				'selectors'   => [
					'{{WRAPPER}} .plan-inner > *:not(:last-child)' => 'margin-bottom: {{VALUE}}px',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_style', [
				'label' => esc_html__( 'Style', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_style',
			[
				'label'       => esc_html__( 'Text Style', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select a text color scheme for the block.', 'pixwell-core' ),
				'options'     => Options::textstyle_dropdown(),
				'default'     => '0',
			]
		);
		$this->end_controls_section();
	}

	/**
	 * render layout
	 */
	protected function render() {

		if ( function_exists( 'pixwell_render_pricing_plan' ) ) {
			$settings         = $this->get_settings();
			$settings['uuid'] = 'uid_' . $this->get_id();

			echo pixwell_render_pricing_plan( $settings );
		}
	}
}