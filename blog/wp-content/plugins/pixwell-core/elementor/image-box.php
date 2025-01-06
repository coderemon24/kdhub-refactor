<?php

namespace PixwellElementorElement\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use PixwellElementorControl\Options;
use function pixwell_rbc_image_box;

defined( 'ABSPATH' ) || exit;

class Fw_Image_Box extends Widget_Base {

	public function get_name() {

		return 'image_box';
	}

	public function get_title() {

		return esc_html__( 'Images Box', 'pixwell-core' );
	}

	public function get_icon() {

		return 'eicon-image-box';
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
			'c1_image',
			[
				'label'       => esc_html__( 'Column 1 - Image', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input image attachment URL for this column.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'c1_title',
			[
				'label'       => esc_html__( 'Column 1 - Title', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input a title for column for this column.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'c1_link',
			[
				'label'       => esc_html__( 'Column 1 - Link', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input a destination link for this column.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'c1_btn',
			[
				'label'       => esc_html__( 'Column 1 - Button Text', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input a button text for this column', 'pixwell-core' ),
				'default'     => 'Learn More',
			]
		);
		$this->add_control(
			'html_c1_desc',
			[
				'label'       => esc_html__( 'Column 1 - Description', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input description (allow raw HTML) for for this column.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'c2_image',
			[
				'label'       => esc_html__( 'Column 2 - Image', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input image attachment URL for this column.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'c2_title',
			[
				'label'       => esc_html__( 'Column 2 - Title', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input a title for column for this column.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'c2_link',
			[
				'label'       => esc_html__( 'Column 2 - Link', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input a destination link for this column.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'c2_btn',
			[
				'label'       => esc_html__( 'Column 2 - Button Text', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input a button text for this column', 'pixwell-core' ),
				'default'     => 'Learn More',
			]
		);
		$this->add_control(
			'html_c2_desc',
			[
				'label'       => esc_html__( 'Column 2 - Description', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input description (allow raw HTML) for for this column.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'c3_image',
			[
				'label'       => esc_html__( 'Column 3 - Image', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input image attachment URL for this column.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'c3_title',
			[
				'label'       => esc_html__( 'Column 3 - Title', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input a title for column for this column.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'c3_link',
			[
				'label'       => esc_html__( 'Column 3 - Link', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input a destination link for this column.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'c3_btn',
			[
				'label'       => esc_html__( 'Column 3 - Button Text', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input a button text for this column', 'pixwell-core' ),
				'default'     => 'Learn More',
			]
		);
		$this->add_control(
			'html_c3_desc',
			[
				'label'       => esc_html__( 'Column 3 - Description', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input description (allow raw HTML) for for this column.', 'pixwell-core' ),
				'default'     => '',
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
		$this->end_controls_section();

		$this->start_controls_section(
			'section_style', [
				'label' => esc_html__( 'Layouts', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'content_align',
			[
				'label'       => esc_html__( 'Content Align', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select content align for this block.', 'pixwell-core' ),
				'options'     => Options::img_content_dropdown(),
				'default'     => '0',
			]
		);
		$this->add_control(
			'image_width',
			[
				'label'       => esc_html__( 'Image Width', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select image width for this block.', 'pixwell-core' ),
				'options'     => Options::image_width_dropdown(),
				'default'     => '0',
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
		$this->end_controls_section();
	}

	/** render */
	protected function render() {

		if ( function_exists( 'pixwell_rbc_image_box' ) ) {
			$settings                    = $this->get_settings();
			$settings['uuid']            = 'uid_' . $this->get_id();
			$settings['elementor_block'] = '1';
			echo pixwell_rbc_image_box( $settings );
		}
	}
}
