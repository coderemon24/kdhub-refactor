<?php

namespace PixwellElementorElement\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use PixwellElementorControl\Options;
use function pixwell_rbc_newsletter;

defined( 'ABSPATH' ) || exit;

class Fw_Ruby_Newsletter extends Widget_Base {

	public function get_name() {

		return 'rb-newsletter';
	}

	public function get_title() {

		return esc_html__( 'Pixwell - Ruby Newsletter', 'pixwell-core' );
	}

	public function get_icon() {

		return 'eicon-mail';
	}

	public function get_categories() {

		return [ 'pixwell-fw' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'query_filters', [
				'label' => esc_html__( 'Newsletter', 'pixwell-core' ),
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
			'description',
			[
				'label'       => esc_html__( 'Block Description', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input a short description for this block.', 'pixwell-core' ),
				'default'     => esc_html__( 'Get our latest news straight into your inbox', 'pixwell-core' ),
			]
		);

		$this->add_control(
			'privacy',
			[
				'label'       => esc_html__( 'Privacy Text', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input your privacy text. Leave blank you would like to disable.', 'pixwell-core' ),
				'default'     => '',
			]
		);

		$this->add_control(
			'submit',
			[
				'label'       => esc_html__( 'Submit Text', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input the submit button text. The icon will display if you leave blank this option.', 'pixwell-core' ),
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
			'layout',
			[
				'label'       => esc_html__( 'Block Layout', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select the layout for this block.', 'pixwell-core' ),
				'options'     => [
					'1' => esc_html__( '-Default (Right Form)-', 'pixwell-core' ),
					'2' => esc_html__( 'Style 2 (Bottom Form)', 'pixwell-core' ),
				],
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

		if ( function_exists( 'pixwell_rbc_newsletter' ) ) {
			$settings         = $this->get_settings();
			$settings['uuid'] = 'uid_' . $this->get_id();

			echo pixwell_rbc_newsletter( $settings );
		}
	}
}
