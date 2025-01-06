<?php

namespace PixwellElementorElement\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use PixwellElementorControl\Options;
use function pixwell_rbc_fw_portfolio_1;

defined( 'ABSPATH' ) || exit;

class Fw_Portfolio_1 extends Widget_Base {

	public function get_name() {

		return 'fw-portfolio-1';
	}

	public function get_title() {

		return esc_html__( 'Portfolio List', 'pixwell-core' );
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
				'label' => esc_html__( 'Query Settings', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'post_not_in',
			[
				'label'       => esc_html__( 'Exclude Post IDs', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Exclude specific post IDs from this block, separated by commas. For example: 1, 2, 3.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'post_in',
			[
				'label'       => esc_html__( 'Post IDs Filter', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Filter posts by their IDs, separated by commas. For example: 1,2,3.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'posts_per_page',
			[
				'label'       => esc_html__( 'Posts per Page', 'pixwell-core' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Enter the number of posts to display per page. Maximum value is 6.', 'pixwell-core' ),
				'default'     => '10',
			]
		);
		$this->add_control(
			'term_filter',
			[
				'label'       => esc_html__( 'Show Categories Filter', 'pixwell-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'description' => esc_html__( 'Enable or disable categories filter at the block header.', 'pixwell-core' ),
				'default'     => 'yes',
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
			'html_description',
			[
				'label'       => esc_html__( 'Block Description', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input the block description, allow Raw HTML.', 'pixwell-core' ),
				'default'     => '',
			]
		);

		$this->add_control(
			'viewmore_link',
			[
				'label'       => esc_html__( 'View More URL', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input a custom destination link for the block header.', 'pixwell-core' ),
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

		if ( function_exists( 'pixwell_rbc_fw_portfolio_1' ) ) {
			$settings         = $this->get_settings();
			$settings['uuid'] = 'uid_' . $this->get_id();
			echo pixwell_rbc_fw_portfolio_1( $settings );
		}
	}
}
