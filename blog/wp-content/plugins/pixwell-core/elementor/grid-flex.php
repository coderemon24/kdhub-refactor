<?php

namespace PixwellElementorElement\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
use PixwellElementorControl\Options;
use function pixwell_get_grid_flex_1;

defined( 'ABSPATH' ) || exit;

class Grid_Flex_1 extends Widget_Base {

	public function get_name() {

		return 'pixwell-grid-flex-1';
	}

	public function get_title() {

		return esc_html__( 'Pixwell - Flex Grid 1', 'pixwell-core' );
	}

	public function get_icon() {

		return 'eicon-posts-grid';
	}

	public function get_categories() {

		return [ 'pixwell_flex' ];
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
				'description' => esc_html__( 'Filter posts by category.', 'pixwell-core' ),
				'options'     => Options::cat_dropdown(),
				'default'     => '0',
			]
		);
		$this->add_control(
			'categories',
			[
				'label'       => esc_html__( 'Categories Filter', 'pixwell-core' ),
				'placeholder' => esc_html__( '1,2,3', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Filter posts by multiple category IDs. Separated by commas (e.g. 1, 2, 3).', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'tag_not_in',
			[
				'label'       => esc_html__( 'Exclude Tags Slug', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Exclude tag slugs, separated by commas (e.g. tagslug1,tagslug2,tagslug3).', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'format',
			[
				'label'       => esc_html__( 'Post Format', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Enable or disable the post format icon.', 'pixwell-core' ),
				'options'     => Options::format_dropdown(),
				'default'     => '0',
			]
		);
		$this->add_control(
			'author',
			[
				'label'       => esc_html__( 'Author Filter', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Filter posts by post author.', 'pixwell-core' ),
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
				'description' => esc_html__( 'Exclude posts by Post IDs, separated by commas (e.g. 1,2,3).', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'post_in',
			[
				'label'       => esc_html__( 'Post IDs Filter', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXT,
				'ai'          => [ 'active' => false ],
				'description' => esc_html__( 'Filter posts by post IDs. separated by commas (e.g. 1,2,3).', 'pixwell-core' ),
				'default'     => '',
			]
		);
		$this->add_control(
			'order',
			[
				'label'       => esc_html__( 'Sort Order', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Show vertical borders between columns.', 'pixwell-core' ),
				'options'     => Options::order_dropdown(),
				'default'     => 'date_post',
			]
		);
		$this->add_control(
			'posts_per_page',
			[
				'label'       => esc_html__( 'Number of Posts', 'pixwell-core' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Select the number of posts to display at once.', 'pixwell-core' ),
				'default'     => '3',
			]
		);
		$this->add_control(
			'offset',
			[
				'label'       => esc_html__( 'Post Offset', 'pixwell-core' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Select number of posts to pass over. Leave this option blank to set at the beginning.', 'pixwell-core' ),
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
			'block_header_style',
			[
				'label'       => esc_html__( 'Block Header Style', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'options'     => Options::header_style(),
				'description' => esc_html__( 'Select a style for the block and section header.', 'pixwell-core' ),
				'default'     => '0',
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
			'block_structure_section', [
				'label' => esc_html__( 'Block Structure', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'block_structure_info',
			[
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => esc_html__( 'Allow you to sort order elements to show such as title, thumbnail, meta...', 'pixwell-core' ),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-success',
			]
		);
		$this->add_control(
			'block_structure_key_info',
			[
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => esc_html__( 'Keys include: [title, thumbnail, meta, excerpt, readmore, divider ]', 'pixwell-core' ),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-warning',
			]
		);
		$this->add_control(
			'block_structure',
			[
				'label'       => esc_html__( 'Block Structure Order', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'ai'          => [ 'active' => false ],
				'rows'        => 2,
				'description' => esc_html__( 'Input element keys to show, separate by comma. e.g. thumbnail, title, meta', 'pixwell-core' ),
				'placeholder' => 'title, thumbnail, meta, excerpt, readmore',
				'default'     => '',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'featured_image_section', [
				'label' => esc_html__( 'Featured Image', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'crop_size',
			[
				'label'       => esc_html__( 'Featured Image Size', 'pixwell-core' ),
				'description' => esc_html__( 'Select a featured image size to optimize with the columns setting.', 'pixwell-core' ),
				'options'     => Options::crop_size_dropdown(),
				'type'        => Controls_Manager::SELECT,
				'default'     => '0',
			]
		);
		$this->add_responsive_control(
			'display_ratio', [
				'label'     => esc_html__( 'Custom Featured Ratio', 'pixwell-core' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => [
					'{{WRAPPER}} .rb-iwrap' => 'padding-bottom: {{VALUE}}%',
				],
			]
		);
		$this->add_control(
			'feat_align',
			[
				'label'     => esc_html__( 'Align', 'pixwell-core' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					''       => esc_html__( '- Default -', 'pixwell-core' ),
					'top'    => esc_html__( 'Top', 'pixwell-core' ),
					'bottom' => esc_html__( 'Bottom', 'pixwell-core' ),
				],
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .rb-iwrap img' => '--feat-position: center {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'entry_title_section', [
				'label' => esc_html__( 'Post Title', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'h_tag',
			[
				'label'   => esc_html__( 'Title HTML Tag', 'pixwell-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => Options::heading_html_dropdown(),
				'default' => '0',
			]
		);
		$this->add_responsive_control(
			'title_tag_size', [
				'label'     => esc_html__( 'Title Font Size', 'pixwell-core' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => [ '{{WRAPPER}} .entry-title' => 'font-size: {{VALUE}}px;' ],
			]
		);
		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Title Color', 'pixwell-core' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'body:not([data-theme="dark"]) {{WRAPPER}}' => '--title-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Title Font', 'pixwell-core' ),
				'name'     => 'title_font',
				'selector' => '{{WRAPPER}} .entry-title',
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
			'entry_meta_section', [
				'label' => esc_html__( 'Entry Meta', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'entry_meta',
			[
				'label'       => esc_html__( 'Entry Meta Tags', 'pixwell-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 2,
				'ai'          => [ 'active' => false ],
				'rows'        => 2,
				'description' => esc_html__( 'Input custom entry meta tags to show, separate by comma. e.g. author,date. Keys include: [author, date, cat, tag, comment, update, view, read, custom]', 'pixwell-core' ),
				'placeholder' => 'author, date, cat, tag, comment, update, view, read, custom',
				'default'     => 'author, date',
			]
		);
		$this->add_responsive_control(
			'entry_meta_size', [
				'label'     => esc_html__( 'Entry Meta Size', 'pixwell-core' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => [ '{{WRAPPER}}' => '--meta-fsize: {{VALUE}}px;' ],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'entry_review_section', [
				'label' => esc_html__( 'Review Icon', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'meta_review',
			[
				'label'       => esc_html__( 'Review Icon', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'options'     => Options::switch_dropdown( false ),
				'description' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell-core' ),
				'default'     => '-1',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'excerpt_section', [
				'label' => esc_html__( 'Excerpt', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'excerpt_length',
			[
				'label'   => esc_html__( 'Excerpt - Max Length', 'pixwell-core' ),
				'type'    => Controls_Manager::TEXT,
				'ai'      => [ 'active' => false ],
				'default' => '12',
			]
		);
		$this->add_control(
			'excerpt_source',
			[
				'label'       => esc_html__( 'Excerpt - Source', 'pixwell-core' ),
				'type'        => Controls_Manager::SELECT,
				'description' => esc_html__( 'Select a source of content to display for the post excerpt. To activate this setting, choose "Custom Settings Below" in the "Excerpt" option above.', 'pixwell-core' ),
				'options'     => Options::excerpt_source_dropdown(),
				'default'     => '0',
			]
		);
		$this->add_responsive_control(
			'entry_excerpt_size', [
				'label'     => esc_html__( 'Entry Excerpt Size', 'pixwell-core' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => [ '{{WRAPPER}} .entry-summary' => 'font-size: {{VALUE}}px;' ],
			]
		);
		$this->add_control(
			'hide_excerpt',
			[
				'label'   => esc_html__( 'Hide Excerpt', 'pixwell-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => Options::hide_dropdown(),
				'default' => '0',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'readmore_section', [
				'label' => esc_html__( 'Read More', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'readmore_size', [
				'label'     => esc_html__( 'Font Size', 'pixwell-core' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => [ '{{WRAPPER}} a.btn' => 'font-size : {{VALUE}}px;' ],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'divider_section', [
				'label' => esc_html__( 'Entry Divider', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'divider_style',
			[
				'label'   => esc_html__( 'Style', 'pixwell-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => Options::divider_style_dropdown(),
				'default' => 'solid',
			]
		);
		$this->add_responsive_control(
			'divider_width',
			[
				'label'     => esc_html__( 'Width', 'pixwell-core' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .p-divider:before' => 'max-width: {{VALUE}}px;',
				],
			]
		);
		$this->add_control(
			'divider_color',
			[
				'label'     => esc_html__( 'Color', 'pixwell-core' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}}' => '--divider-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'divider_dark_color',
			[
				'label'     => esc_html__( 'Dark Mode - Color', 'pixwell-core' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'[data-theme="dark"] {{WRAPPER}}, {{WRAPPER}} .light-scheme' => '--divider-color: {{VALUE}};',
				],
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
		$this->start_controls_section(
			'block_columns', [
				'label' => esc_html__( 'Columns', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_LAYOUT,
			]
		);
		$this->add_control(
			'columns_desktop',
			[
				'label'   => esc_html__( 'Columns on Desktop', 'pixwell-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => Options::columns_dropdown(),
				'default' => '3',
			]
		);
		$this->add_control(
			'columns_tablet',
			[
				'label'   => esc_html__( 'Columns on Tablet', 'pixwell-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => Options::columns_dropdown(),
				'default' => '0',
			]
		);
		$this->add_control(
			'columns_mobile',
			[
				'label'   => esc_html__( 'Columns on Mobile', 'pixwell-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => Options::columns_dropdown( [ 0, 1, 2 ] ),
				'default' => '0',
			]
		);
		$this->add_control(
			'column_gap',
			[
				'label'   => esc_html__( 'Column Gap', 'pixwell-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => Options::column_gap_dropdown(),
				'default' => '0',
			]
		);
		$this->add_responsive_control(
			'column_gap_custom', [
				'label'     => esc_html__( '1/2 Custom Gap Value', 'pixwell-core' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => [
					'{{WRAPPER}} .is-gap-custom'                    => 'margin-left: -{{VALUE}}px; margin-right: -{{VALUE}}px; --column-gap: {{VALUE}}px;',
					'{{WRAPPER}} .is-gap-custom .content-inner > *' => 'padding-left: {{VALUE}}px; padding-right: {{VALUE}}px;',
				],
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'border_section', [
				'label' => esc_html__( 'Grid Borders', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_LAYOUT,
			]
		);
		$this->add_control(
			'border_info',
			[
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => esc_html__( 'The settings below require all responsive column values to be set.', 'pixwell-core' ),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-warning',
			]
		);
		$this->add_control(
			'column_border',
			[
				'label'   => esc_html__( 'Column Border', 'pixwell-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => Options::column_border_dropdown(),
				'default' => '0',
			]
		);
		$this->add_control(
			'bottom_border',
			[
				'label'   => esc_html__( 'Bottom Border', 'pixwell-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => Options::column_border_dropdown(),
				'default' => '0',
			]
		);
		$this->add_control(
			'last_bottom_border',
			[
				'label'   => esc_html__( 'Last Bottom Border', 'pixwell-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => Options::switch_dropdown( false ),
				'default' => '-1',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'spacing_section', [
				'label' => esc_html__( 'Spacing', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_LAYOUT,
			]
		);
		$this->add_responsive_control(
			'el_spacing', [
				'label'     => esc_html__( 'Custom Element Spacing', 'pixwell-core' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => [ '{{WRAPPER}} .p-wrap' => '--el-spacing: {{VALUE}}px;' ],
			]
		);
		$this->add_responsive_control(
			'bottom_margin', [
				'label'     => esc_html__( 'Custom Bottom Margin', 'pixwell-core' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => [ '{{WRAPPER}} .block-wrap' => '--bottom-spacing: {{VALUE}}px;' ],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'center_section', [
				'label' => esc_html__( 'Centering', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_LAYOUT,
			]
		);
		$this->add_control(
			'center_mode',
			[
				'label'   => esc_html__( 'Centering Content', 'pixwell-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => Options::switch_dropdown( false ),
				'default' => '-1',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'mobile_scroll_section', [
				'label' => esc_html__( 'Tablet/Mobile Horizontal Scroll', 'pixwell-core' ),
				'tab'   => Controls_Manager::TAB_LAYOUT,
			]
		);
		$this->add_control(
			'horizontal_scroll_info',
			[
				'type'            => Controls_Manager::RAW_HTML,
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-warning',
			]
		);
		$this->add_control(
			'horizontal_scroll',
			[
				'label'   => esc_html__( 'Horizontal Scroll', 'pixwell-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => Options::horizontal_scroll_dropdown(),
				'default' => '0',
			]
		);
		$this->add_control(
			'scroll_width_tablet', [
				'label'       => esc_html__( 'Tablet - Post Module Width', 'pixwell-core' ),
				'type'        => Controls_Manager::NUMBER,
				'placeholder' => '300',
				'selectors'   => [ '{{WRAPPER}}' => '--tablet-scroll-width: {{VALUE}}px;' ],
			]
		);
		$this->add_control(
			'scroll_width_mobile', [
				'label'       => esc_html__( 'Mobile - Post Module Width', 'pixwell-core' ),
				'type'        => Controls_Manager::NUMBER,
				'placeholder' => '300',
				'selectors'   => [ '{{WRAPPER}}' => '--mobile-scroll-width: {{VALUE}}px;' ],
			]
		);
		$this->end_controls_section();
	}

	protected function render() {

		if ( function_exists( 'pixwell_get_grid_flex_1' ) ) {

			$settings         = $this->get_settings();
			$settings['uuid'] = 'uid_' . $this->get_id();
			echo pixwell_get_grid_flex_1( $settings );
		}
	}
}