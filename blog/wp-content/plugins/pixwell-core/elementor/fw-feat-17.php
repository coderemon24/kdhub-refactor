<?php

namespace PixwellElementorElement\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use PixwellElementorControl\Options;
use function pixwell_rbc_fw_feat_17;

defined( 'ABSPATH' ) || exit;

class Fw_Feat_17 extends Widget_Base {

	public function get_name() {

		return 'fw-feat-17';
	}

	public function get_title() {

		return esc_html__( 'Pixwell - Marketing Grid (Boxed)', 'pixwell-core' );
	}

	public function get_icon() {

		return 'eicon-posts-group';
	}

	public function get_categories() {

		return [ 'pixwell-fw' ];
	}

	protected function register_controls() {

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
			'sub_title',
			[
				'label'       => esc_html__( 'Sub Title', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input the sub section tile, Leave blank if you want to it.', 'pixwell-core' ),
				'default'     => esc_html__( 'Popular News', 'pixwell-core' ),
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
			'query_filters', [
				'label' => esc_html__( 'Query Settings', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'category',
			[
				'label'       => esc_html__( 'Category Filter', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Filter posts by a category.', 'pixwell-core' ),
				'options'     => Options::cat_dropdown(),
				'default'     => '0',
			]
		);
		$this->add_control(
			'categories',
			[
				'label'       => esc_html__( 'Categories Filter', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Filter posts by multiple category IDs, separated category IDs by commas (for example: 1,2,3).', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'tags',
			[
				'label'       => esc_html__( 'Tags Slug Filter', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Filter posts by tags slug, separated by commas (for example: tagslug1,tagslug2,tagslug3).', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'tag_not_in',
			[
				'label'       => esc_html__( 'Exclude Tags Slug', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Filter posts by tag slugs, separated by commas. For example: tagslug1, tagslug2, tagslug3.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'format',
			[
				'label'       => esc_html__( 'Post Format', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Filter posts by post format.', 'pixwell-core' ),
				'options'     => Options::format_dropdown(),
				'default'     => '0',
			]
		);
		$this->add_control(
			'author',
			[
				'label'       => esc_html__( 'Author Filter', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Filter posts by the author.', 'pixwell-core' ),
				'options'     => Options::author_dropdown(),
				'default'     => '0',
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
			'order',
			[
				'label'       => esc_html__( 'Sort Order', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Choose the sorting order for this block.', 'pixwell-core' ),
				'options'     => Options::order_dropdown(),
				'default'     => 'date_post',
			]
		);
		$this->add_control(
			'offset',
			[
				'label'       => esc_html__( 'Post Offset', 'pixwell-core' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Enter the number of posts to skip. Leave blank or set to 0 if you have activated the unique post feature.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->end_controls_section();

		/** sub section */
		$this->start_controls_section(
			'sub_query_filters', [
				'label' => esc_html__( 'Sub Section Query Settings', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'sub_category',
			[
				'label'       => esc_html__( 'Category Filter', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Filter posts by a category.', 'pixwell-core' ),
				'options'     => Options::cat_dropdown(),
				'default'     => '0',
			]
		);
		$this->add_control(
			'categories_sub',
			[
				'label'       => esc_html__( 'Categories Filter', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Filter posts by multiple category IDs, separated category IDs by commas (for example: 1,2,3).', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'sub_tags',
			[
				'label'       => esc_html__( 'Tags Slug Filter', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Filter posts by tags slug, separated by commas (for example: tagslug1,tagslug2,tagslug3).', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'sub_tag_not_in',
			[
				'label'       => esc_html__( 'Exclude Tags Slug', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Filter posts by tag slugs, separated by commas. For example: tagslug1, tagslug2, tagslug3.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'sub_format',
			[
				'label'       => esc_html__( 'Post Format', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Filter posts by post format.', 'pixwell-core' ),
				'options'     => Options::format_dropdown(),
				'default'     => '0',
			]
		);
		$this->add_control(
			'sub_author',
			[
				'label'       => esc_html__( 'Author Filter', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Filter posts by the author.', 'pixwell-core' ),
				'options'     => Options::author_dropdown(),
				'default'     => '0',
			]
		);

		$this->add_control(
			'sub_post_not_in',
			[
				'label'       => esc_html__( 'Exclude Post IDs', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Exclude specific post IDs from this block, separated by commas. For example: 1, 2, 3.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'sub_post_in',
			[
				'label'       => esc_html__( 'Post IDs Filter', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Filter posts by their IDs, separated by commas. For example: 1,2,3.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'sub_order',
			[
				'label'       => esc_html__( 'Sort Order', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Choose the sorting order for this block.', 'pixwell-core' ),
				'options'     => Options::order_dropdown(),
				'default'     => 'date_post',
			]
		);
		$this->add_control(
			'sub_offset',
			[
				'label'       => esc_html__( 'Post Offset', 'pixwell-core' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Enter the number of posts to skip. Leave blank or set to 0 if you have activated the unique post feature.', 'pixwell-core' ),
				'default'     => '',
			]
		);

		/**** test */
		$this->add_control(
			'posts_per_page',
			[
				'label'       => esc_html__( 'Posts per Page', 'pixwell-core' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Enter the number of posts to display per page. Maximum value is 6.', 'pixwell-core' ),
				'default'     => '5',
			]
		);
		$this->end_controls_section();
	}

	/** render */
	protected function render() {

		if ( function_exists( 'pixwell_rbc_fw_feat_17' ) ) {
			$settings         = $this->get_settings();
			$settings['uuid'] = 'uid_' . $this->get_id();
			echo pixwell_rbc_fw_feat_17( $settings );
		}
	}
}
