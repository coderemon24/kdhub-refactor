<?php

namespace PixwellElementorElement\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use PixwellElementorControl\Options;
use function pixwell_rbc_fw_banner;

defined( 'ABSPATH' ) || exit;

class Fw_Ruby_Banner extends Widget_Base {

	public function get_name() {

		return 'fw-banner';
	}

	public function get_title() {

		return esc_html__( 'Pixwell - Banners (Boxed)', 'pixwell-core' );
	}

	public function get_icon() {

		return 'eicon-banner';
	}

	public function get_categories() {

		return [ 'pixwell-fw' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_1', [
				'label' => esc_html__( 'Section 1', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			's1_title',
			[
				'label'       => esc_html__( 'Section Title', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input title for section 1.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			's1_url',
			[
				'label'       => esc_html__( 'Destination URL', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input destination URL for section 1.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			's1_image',
			[
				'label'       => esc_html__( 'Attachment Image', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input attachment Image URL for section 1.', 'pixwell-core' ),
				'default'     => '',
			]
		);

		$this->add_control(
			's1_newtab',
			[
				'label'       => esc_html__( 'Open New Tab', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Enable or disable open in a new tab.', 'pixwell-core' ),
				'options'     => [
					'1'  => esc_html__( 'New Tab', 'pixwell-core' ),
					'-1' => esc_html__( 'Self Window', 'pixwell-core' ),
				],
				'default'     => '1',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_2', [
				'label' => esc_html__( 'Section 2', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			's2_title',
			[
				'label'       => esc_html__( 'Section Title', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input title for section 2.', 'pixwell-core' ),
				'default'     => '',
			]
		);

		$this->add_control(
			's2_url',
			[
				'label'       => esc_html__( 'Destination URL', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input destination URL for section 2.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			's2_image',
			[
				'label'       => esc_html__( 'Attachment Image', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input attachment Image URL for section 2.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			's2_newtab',
			[
				'label'       => esc_html__( 'Open New Tab', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Enable or disable open in a new tab.', 'pixwell-core' ),
				'options'     => [
					'1'  => esc_html__( 'New Tab', 'pixwell-core' ),
					'-1' => esc_html__( 'Self Window', 'pixwell-core' ),
				],
				'default'     => '1',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_3', [
				'label' => esc_html__( 'Section 3', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			's3_title',
			[
				'label'       => esc_html__( 'Section Title', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input title for section 3.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			's3_url',
			[
				'label'       => esc_html__( 'Destination URL', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input destination URL for section 3.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			's3_image',
			[
				'label'       => esc_html__( 'Attachment Image', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input attachment Image URL for section 3.', 'pixwell-core' ),
				'default'     => '',
			]
		);

		$this->add_control(
			's3_newtab',
			[
				'label'       => esc_html__( 'Open New Tab', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Enable or disable open in a new tab.', 'pixwell-core' ),
				'options'     => [
					'1'  => esc_html__( 'New Tab', 'pixwell-core' ),
					'-1' => esc_html__( 'Self Window', 'pixwell-core' ),
				],
				'default'     => '1',
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'section_title', [
				'label' => esc_html__( 'Block Header', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Block Title', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input a block heading. Leave blank to disable the block header.', 'pixwell-core' ),
				'default'     => '',
			]
		);

		$this->add_control(
			'viewmore_link',
			[
				'label'       => esc_html__( 'View More URL', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input da block destination link, Leave blank if you want to disable clickable on the block header.', 'pixwell-core' ),
				'default'     => '',
			]
		);

		$this->add_control(
			'viewmore_title',
			[
				'label'       => esc_html__( 'View More Label', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input a block tagline.', 'pixwell-core' ),
				'default'     => '',
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

	/** render */
	protected function render() {

		if ( function_exists( 'pixwell_rbc_fw_banner' ) ) {
			$settings         = $this->get_settings();
			$settings['uuid'] = 'uid_' . $this->get_id();

			echo pixwell_rbc_fw_banner( $settings );
		}
	}
}
