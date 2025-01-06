<?php

namespace PixwellElementorElement\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use PixwellElementorControl\Options;
use function pixwell_rbc_about;

defined( 'ABSPATH' ) || exit;

class Fw_Ruby_About_Me extends Widget_Base {

	public function get_name() {

		return 'rb-about-me';
	}

	public function get_title() {

		return esc_html__( 'Pixwell - About Me', 'pixwell-core' );
	}

	public function get_icon() {

		return 'eicon-user-circle-o';
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
			'html_about_tagline',
			[
				'label'       => esc_html__( 'About Tagline', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'description' => esc_html__( 'Input the about me tagline for this block.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'html_about_title',
			[
				'label'       => esc_html__( 'About Title', 'pixwell-core' ),
				'description' => esc_html__( 'Input about me title for this bock.', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'default'     => '',
			]
		);
		$this->add_control(
			'html_about_desc',
			[
				'label'       => esc_html__( 'About Description', 'pixwell-core' ),
				'description' => esc_html__( 'Input about me title for this bock.', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'default'     => '',
			]
		);
		$this->add_control(
			'about_sign',
			[
				'label'       => esc_html__( 'About Signature Image', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input the signature image link (attachment URL ending in .jpg) for this block. Recommended image width: 700px.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'about_image',
			[
				'label'       => esc_html__( 'About Image', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input the image link for the "About Me" section (attachment URL ending in .jpg) to display on the right side of this block. Recommended image height: 100px.', 'pixwell-core' ),
				'default'     => '',
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

		if ( function_exists( 'pixwell_rbc_about' ) ) {
			$settings                    = $this->get_settings();
			$settings['uuid']            = 'uid_' . $this->get_id();
			$settings['elementor_block'] = 'elementor';

			echo pixwell_rbc_about( $settings );
		}
	}
}
