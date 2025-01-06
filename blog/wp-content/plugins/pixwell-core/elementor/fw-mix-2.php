<?php

namespace PixwellElementorElement\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use PixwellElementorControl\Options;
use function pixwell_rbc_fw_mix_2;

defined( 'ABSPATH' ) || exit;

class Fw_Mix_2 extends Widget_Base {

	public function get_name() {

		return 'fw-mix-2';
	}

	public function get_title() {

		return esc_html__( 'Pixwell - Mix 2 (FullWidth/Content)', 'pixwell-core' );
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
			'posts_per_page',
			[
				'label'       => esc_html__( 'Posts per Page', 'pixwell-core' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Enter the number of posts to display per page.', 'pixwell-core' ),
				'default'     => '4',
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
				'default'     => esc_html__( 'Latest News', 'pixwell-core' ),
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
		$this->add_control(
			'quick_filter',
			[
				'label'       => esc_html__( 'Quick Filter', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Display a quick filters bar by category/tag in the block header.', 'pixwell-core' ),
				'options'     => Options::filter_dropdown(),
				'default'     => '0',
			]
		);
		$this->add_control(
			'quick_filter_ids',
			[
				'label'       => esc_html__( 'Filter Data', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Enter IDs for your quick filters, depending on the type you choose: Category IDs or Tag slugs, separated by commas. For example: 1, 2, 3.', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'quick_filter_label',
			[
				'label'       => esc_html__( 'Filter Default Label', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Input a label for the default filter (all).', 'pixwell-core' ),
				'default'     => esc_html__( 'All', 'pixwell-core' ),
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_pagination', [
				'label' => esc_html__( 'Ajax Pagination', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'pagination',
			[
				'label'       => esc_html__( 'Pagination', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select a ajax pagination type.', 'pixwell-core' ),
				'options'     => Options::pagination_dropdown(),
				'default'     => '0',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'featured_image_section', [
				'label' => esc_html__( 'Featured Image', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'display_ratio_1', [
				'label'       => esc_html__( 'Custom Featured Ratio 1', 'pixwell-core' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Input custom ratio percent (height*100/width) for the grid layout you would like. For example: 50', 'pixwell-core' ),
				'selectors'   => [
					'{{WRAPPER}} .p-grid-1 .rb-iwrap' => 'padding-bottom: {{VALUE}}%',
				],
			]
		);

		$this->add_responsive_control(
			'display_ratio_2', [
				'label'       => esc_html__( 'Custom Featured Ratio 2', 'pixwell-core' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Input custom ratio percent (height*100/width) for the Small list layout you would like. For example: 50', 'pixwell-core' ),
				'selectors'   => [
					'{{WRAPPER}} .rb-iwrap.pc-75' => 'padding-bottom: {{VALUE}}%',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'block_design', [
				'label' => esc_html__( 'Bookmark', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'bookmark',
			[
				'label'       => esc_html__( 'Bookmark Icon', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Enable or disable the bookmark icon. This setting is required to enable at least one entry meta functionality.', 'pixwell-core' ),
				'options'     => Options::switch_dropdown(),
				'default'     => '0',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'color_section', [
				'label' => esc_html__( 'Text Color Scheme', 'pixwell-core' ),
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

		if ( function_exists( 'pixwell_rbc_fw_mix_2' ) ) {
			$settings            = $this->get_settings();
			$settings['uuid']    = 'uid_' . $this->get_id();
			$settings['classes'] = 'fw-block block-mix fw-mix-2';
			echo pixwell_rbc_fw_mix_2( $settings );
		}
	}
}
