<?php

namespace PixwellElementorElement\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use PixwellElementorControl\Options;
use function pixwell_rbc_fw_category_1;

defined( 'ABSPATH' ) || exit;

class Fw_Category_1 extends Widget_Base {

	public function get_name() {

		return 'fw_category_1';
	}

	public function get_title() {

		return esc_html__( 'Category List', 'pixwell-core' );
	}

	public function get_icon() {

		return 'eicon-gallery-grid';
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
			'title',
			[
				'label'       => esc_html__( 'Block Title', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input block title for this block.', 'pixwell-core' ),
				'default'     => 'Categories',
			]
		);
		$this->add_control(
			'description',
			[
				'label'       => esc_html__( 'Block Description', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input a short description for this block.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'category_1',
			[
				'label'       => esc_html__( 'Category 1', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select a category to display.', 'pixwell-core' ),
				'options'     => Options::fw_cat_dropdown(),
				'default'     => '',
			]
		);
		$this->add_control(
			'category_2',
			[
				'label'       => esc_html__( 'Category 2', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select a category to display.', 'pixwell-core' ),
				'options'     => Options::fw_cat_dropdown(),
				'default'     => '',
			]
		);
		$this->add_control(
			'category_3',
			[
				'label'       => esc_html__( 'Category 3', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select a category to display.', 'pixwell-core' ),
				'options'     => Options::fw_cat_dropdown(),
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

		if ( function_exists( 'pixwell_rbc_fw_category_1' ) ) {
			$settings         = $this->get_settings();
			$settings['uuid'] = 'uid_' . $this->get_id();
			echo pixwell_rbc_fw_category_1( $settings );
		}
	}
}
