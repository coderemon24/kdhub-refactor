<?php

namespace PixwellElementorElement\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use PixwellElementorControl\Options;
use function pixwell_rbc_fw_search;

defined( 'ABSPATH' ) || exit;

class Fw_Search_Box extends Widget_Base {

	public function get_name() {

		return 'fw-search-box';
	}

	public function get_title() {

		return esc_html__( 'Pixwell - Search Box', 'pixwell-core' );
	}

	public function get_icon() {

		return 'eicon-search';
	}

	public function get_categories() {

		return [ 'pixwell-fw' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'query_filters', [
				'label' => esc_html__( 'Search Box', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Search Header', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input the header for this search box.', 'pixwell-core' ),
				'default'     => esc_html__( 'How we can help?', 'pixwell-core' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label'       => esc_html__( 'Search Description', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input a short description for this search box.', 'pixwell-core' ),
				'default'     => '',
			]
		);

		$this->add_control(
			'form_holder',
			[
				'label'       => esc_html__( 'Placeholder', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input a placeholder text for this search box.', 'pixwell-core' ),
				'default'     => esc_html__( 'Input your keyword(s)...', 'pixwell-core' ),
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
			'form_style',
			[
				'label'       => esc_html__( 'Form Style', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select style for the search form.', 'pixwell-core' ),
				'options'     => [
					'border' => esc_html__( 'Border (Transparent Background)', 'pixwell-core' ),
					'bg'     => esc_html__( 'Background', 'pixwell-core' ),
				],
				'default'     => 'border',
			]
		);
		$this->add_control(
			'form_bg_color',
			[
				'label'       => esc_html__( 'Form Background Color', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Select background color for this search form, this option will apply to form style: Background.', 'pixwell-core' ),
				'default'     => '',
			]
		);

		$this->add_control(
			'form_text_color',
			[
				'label'       => esc_html__( 'Form Text Color', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Select text color for this search form, this option will apply to form style: Background.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'form_border_radius',
			[
				'label'       => esc_html__( 'Form Border Radius', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Select border radius for this search form (in px).', 'pixwell-core' ),
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
			'content_align',
			[
				'label'       => esc_html__( 'Content Align', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select align content for this block, this option will apply on the desktop and table devices.', 'pixwell-core' ),
				'options'     => Options::content_align_dropdown(),
				'default'     => '0',
			]
		);

		$this->end_controls_section();
	}

	/** render */
	protected function render() {

		if ( function_exists( 'pixwell_rbc_fw_search' ) ) {
			$settings         = $this->get_settings();
			$settings['uuid'] = 'uid_' . $this->get_id();

			$inline_style = '<style>';
			if ( ! empty( $settings['form_bg_color'] ) ) {
				$inline_style .= '#' . $settings['uuid'] . '.is-bg-style .sbox-form input[type="search"]{';
				$inline_style .= 'background-color: ' . esc_attr( $settings['form_bg_color'] ) . ';';
				$inline_style .= '}';
			}
			if ( ! empty( $settings['form_text_color'] ) ) {
				$inline_style .= '#' . $settings['uuid'] . '.is-bg-style .sbox-form {';
				$inline_style .= 'color: ' . esc_attr( $settings['form_text_color'] ) . ';';
				$inline_style .= '}';
			}

			if ( ! empty( $settings['form_border_radius'] ) ) {
				$inline_style .= '#' . $settings['uuid'] . ' .sbox-form input[type="search"]{';
				$inline_style .= 'border-radius: ' . esc_attr( $settings['form_border_radius'] ) . 'px;';
				$inline_style .= '-webkit-border-radius: ' . esc_attr( $settings['form_border_radius'] ) . 'px;';
				$inline_style .= '}';
			}
			$inline_style .= '</style>';

			echo $inline_style;
			echo pixwell_rbc_fw_search( $settings );
		}
	}
}
