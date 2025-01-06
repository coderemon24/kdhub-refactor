<?php

namespace PixwellElementorElement\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use PixwellElementorControl\Options;
use function pixwell_rbc_subscribe;

defined( 'ABSPATH' ) || exit;

class Fw_Subscribe extends Widget_Base {

	public function get_name() {

		return 'subscribe';
	}

	public function get_title() {

		return esc_html__( 'Subscribe Box', 'pixwell-core' );
	}

	public function get_icon() {

		return 'eicon-envelope';
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
				'description' => esc_html__( 'Input a block heading. Leave blank to disable the block header.', 'pixwell-core' ),
				'default'     => esc_html__( 'Subscribe Newsletter', 'pixwell-core' ),
			]
		);
		$this->add_control(
			'raw_html',
			[
				'label'       => esc_html__( 'Block Description', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'description' => esc_html__( 'Input a short description for this block.', 'pixwell-core' ),
				'default'     => 'Get our latest news straight into your inbox',
			]
		);
		$this->add_control(
			'shortcode',
			[
				'label'       => esc_html__( 'Subscribe Shortcode', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input a 3rd subscribe/newsletter shortcode.', 'pixwell-core' ),
				'default'     => '[mc4wp_form]',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_style', [
				'label' => esc_html__( 'Layouts', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'layout',
			[
				'label'       => esc_html__( 'Block Layout', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select the layout for this block.', 'pixwell-core' ),
				'options'     => Options::style_layout_dropdown(),
				'default'     => '1',
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

		if ( function_exists( 'pixwell_rbc_subscribe' ) ) {
			$settings                    = $this->get_settings();
			$settings['uuid']            = 'uid_' . $this->get_id();
			$content                     = $settings['raw_html'];
			$settings['elementor_block'] = '1';
			echo pixwell_rbc_subscribe( $settings, $content );
		}
	}
}
