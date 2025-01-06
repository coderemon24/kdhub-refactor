<?php

namespace PixwellElementorElement\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use PixwellElementorControl\Options;
use function pixwell_rbc_heading;

defined( 'ABSPATH' ) || exit;

class Fw_Heading extends Widget_Base {

	public function get_name() {

		return 'rb-heading';
	}

	public function get_title() {

		return esc_html__( 'Heading Box', 'pixwell-core' );
	}

	public function get_icon() {

		return 'eicon-heading';
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
			'html_title',
			[
				'label'       => esc_html__( 'Heading Title', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input the heading title for this block.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'html_tagline',
			[
				'label'       => esc_html__( 'Sub Title', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input the heading sub title for this block.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'html_description',
			[
				'label'       => esc_html__( 'Description', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'description' => esc_html__( 'Input the description for this block.', 'pixwell-core' ),
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
				'options'     => Options::heading_content_dropdown(),
				'default'     => 'center',
			]
		);
		$this->add_control(
			'separator',
			[
				'label'       => esc_html__( 'Separator', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select separator type for this block.', 'pixwell-core' ),
				'options'     => Options::separator_dropdown(),
				'default'     => '0',
			]
		);
		$this->add_control(
			'border_top',
			[
				'label'       => esc_html__( 'Border Top', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select border for this block.', 'pixwell-core' ),
				'options'     => Options::separator_dropdown(),
				'default'     => '0',
			]
		);
		$this->add_responsive_control(
			'border_color', [
				'label'       => esc_html__( 'Border color', 'pixwell-core' ),
				'type'        => Controls_Manager::COLOR,
				'description' => esc_html__( 'Select border color for this block.', 'pixwell-core' ),
				'selectors'   => [
					'{{WRAPPER}} .hbox-border' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'heading_tag',
			[
				'label'       => esc_html__( 'Heading Tag', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select html tag for this heading.', 'pixwell-core' ),
				'options'     => Options::tagline_tag_dropdown(),
				'default'     => 'h2',
			]
		);
		$this->add_control(
			'tagline_tag',
			[
				'label'       => esc_html__( 'Tagline Tag', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select html tag for this sub title.', 'pixwell-core' ),
				'options'     => Options::tagline_tag_dropdown(),
				'default'     => 'h6',
			]
		);
		$this->end_controls_section();
	}

	/** render */
	protected function render() {

		if ( function_exists( 'pixwell_rbc_heading' ) ) {
			$settings                    = $this->get_settings();
			$settings['uuid']            = 'uid_' . $this->get_id();
			$settings['elementor_block'] = '1';
			echo pixwell_rbc_heading( $settings );
		}
	}
}
