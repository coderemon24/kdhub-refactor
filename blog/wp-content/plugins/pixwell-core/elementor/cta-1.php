<?php

namespace PixwellElementorElement\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use PixwellElementorControl\Options;
use function pixwell_rbc_cta_1;

defined( 'ABSPATH' ) || exit;

class Fw_Cta_1 extends Widget_Base {

	public function get_name() {

		return 'block-cta-1';
	}

	public function get_title() {

		return esc_html__( 'Call to Action', 'pixwell-core' );
	}

	public function get_icon() {

		return 'eicon-image-rollover';
	}

	public function get_categories() {

		return [ 'pixwell-fw' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'query_filters', [
				'label' => esc_html__( 'Content', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'cta_image',
			[
				'label'       => esc_html__( 'Top Image (Attachment URL)', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input image attachment to display at the top of the block. Leave blank if you want to disable it.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'html_cta_tagline',
			[
				'label'       => esc_html__( 'Tagline', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input a call to action tagline for this block. (Allow Raw HTML)', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'html_cta_title',
			[
				'label'       => esc_html__( 'Title', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'description' => esc_html__( 'Input call to action title for this bock (Allow Raw HTML).', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'html_cta_desc',
			[
				'label'       => esc_html__( 'About Description', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'description' => esc_html__( 'Input description for this block (Allow Raw HTML).', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'btn_1',
			[
				'label'       => esc_html__( 'Button 1 - Text', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input label for button 1.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'btn_1_url',
			[
				'label'       => esc_html__( 'Button 1 - URL', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input destination URL for button 1', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'btn_1_icon',
			[
				'label'       => esc_html__( 'Button 1 - Icon', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input ruby icon classname, ie: rbi-arrow-right (icons.themeruby.com/pixwell).', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'btn_2',
			[
				'label'       => esc_html__( 'Button 2 - Text', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input label for button 2.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'btn_2_url',
			[
				'label'       => esc_html__( 'Button 2 - URL', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input destination URL for button 2', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'btn_2_icon',
			[
				'label'       => esc_html__( 'Button 2 - Icon', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input ruby icon classname, ie: rbi-arrow-right (icons.themeruby.com/pixwell).', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_title', [
				'label' => esc_html__( 'Layouts', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'tagline_tag',
			[
				'label'       => esc_html__( 'Tagline Tag', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select html tag for this tagline.', 'pixwell-core' ),
				'options'     => Options::tagline_tag_dropdown(),
				'default'     => 'h6',
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label'       => esc_html__( 'Title Tag', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select html tag for the title.', 'pixwell-core' ),
				'options'     => Options::tagline_tag_dropdown(),
				'default'     => 'h2',
			]
		);
		$this->add_control(
			'btn_1_style',
			[
				'label'       => esc_html__( 'Button 1 - Style', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select style for the button 1.', 'pixwell-core' ),
				'options'     => Options::button_style_dropdown(),
				'default'     => 'border',
			]
		);
		$this->add_control(
			'btn_1_color',
			[
				'label'       => esc_html__( 'Button 1 - Text Color', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Select text color value for this button.', 'pixwell-core' ),
				'selectors'   => [
					'{{WRAPPER}} .cta-btn-1' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_1_bg',
			[
				'label'       => esc_html__( 'Button 1 - Background Color', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Select a background color value for this button.', 'pixwell-core' ),
				'selectors'   => [
					'{{WRAPPER}} .cta-btn-1.is-bg' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_1_hover_color',
			[
				'label'       => esc_html__( 'Button 1 - Hover Text Color', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Input hover text color value for this button.', 'pixwell-core' ),
				'selectors'   => [
					'{{WRAPPER}} .cta-btn-1:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_1_hover_bg',
			[
				'label'       => esc_html__( 'Button 1 - Hover Background Color', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Select hover background color value for this button.', 'pixwell-core' ),
				'selectors'   => [
					'{{WRAPPER}} .cta-btn-1:hover'           => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .cta-btn-1.is-border:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_2_style',
			[
				'label'       => esc_html__( 'Button 2 - Style', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select style for the button 2.', 'pixwell-core' ),
				'options'     => Options::button_style_dropdown(),
				'default'     => 'bg',
			]
		);
		$this->add_control(
			'btn_2_color',
			[
				'label'       => esc_html__( 'Button 2 - Text Color', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Select text color value for this button.', 'pixwell-core' ),
				'selectors'   => [
					'{{WRAPPER}} .cta-btn-2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_2_bg',
			[
				'label'       => esc_html__( 'Button 2 - Background Color', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Select background color value for this button.', 'pixwell-core' ),
				'selectors'   => [
					'{{WRAPPER}} .cta-btn-2.is-bg' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_2_hover_color',
			[
				'label'       => esc_html__( 'Button 2 - Hover Text Color', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Select hover text color value for this button.', 'pixwell-core' ),
				'selectors'   => [
					'{{WRAPPER}} .cta-btn-2:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_2_hover_bg',
			[
				'label'       => esc_html__( 'Button 2 - Hover Background Color', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Select hover background color value for this button.', 'pixwell-core' ),
				'selectors'   => [
					'{{WRAPPER}} .cta-btn-2:hover'           => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .cta-btn-2.is-border:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'target',
			[
				'label'       => esc_html__( 'Link Target', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select target type for links in this block.', 'pixwell-core' ),
				'options'     => Options::target_dropdown(),
				'default'     => '0',
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
		$this->add_control(
			'content_align',
			[
				'label'       => esc_html__( 'Content Align', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select align content for this block, this option will apply on the desktop and table devices.', 'pixwell-core' ),
				'options'     => Options::content_align_dropdown(),
				'default'     => '0',
			]
		);
		$this->add_control(
			'icon_position',
			[
				'label'       => esc_html__( 'Button Icon Position', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select icon position for the button.', 'pixwell-core' ),
				'options'     => Options::icon_position_dropdown(),
				'default'     => '0',
			]
		);

		$this->end_controls_section();
	}

	/** render */
	protected function render() {

		if ( function_exists( 'pixwell_rbc_cta_1' ) ) {
			$settings                    = $this->get_settings();
			$settings['uuid']            = 'uid_' . $this->get_id();
			$settings['elementor_block'] = '1';
			echo pixwell_rbc_cta_1( $settings );
		}
	}
}
