<?php

namespace PixwellElementorControl;
use Rb_Category_Select_Walker;

defined( 'ABSPATH' ) || exit;

class Options {

	static function cat_dropdown( $post_type = 'post' ) {

		$data       = [
			0 => esc_html__( '- All categories -', 'pixwell-core' ),
		];
		$categories = get_categories( [
			'hide_empty' => 0,
			'type'       => $post_type,
		] );

		$array_walker = new Rb_Category_Select_Walker;
		$array_walker->walk( $categories, 4 );
		$buffer = $array_walker->cat_array;
		foreach ( $buffer as $name => $id ) {
			$data[ $id ] = $name;
		}

		return $data;
	}

	static function fw_cat_dropdown( $post_type = 'post' ) {

		$data       = [];
		$categories = get_categories( [
			'hide_empty' => 0,
			'type'       => $post_type,
		] );

		$array_walker = new Rb_Category_Select_Walker;
		$array_walker->walk( $categories, 4 );
		$buffer = $array_walker->cat_array;
		foreach ( $buffer as $name => $id ) {
			$data[ $id ] = $name;
		}

		return $data;
	}

	static function format_dropdown() {

		return [
			'0'       => esc_html__( '- All -', 'pixwell-core' ),
			'default' => esc_html__( 'Default', 'pixwell-core' ),
			'gallery' => esc_html__( 'Gallery', 'pixwell-core' ),
			'video'   => esc_html__( 'Video', 'pixwell-core' ),
			'audio'   => esc_html__( 'Audio', 'pixwell-core' ),
		];
	}

	static function author_dropdown() {

		$blogusers = get_users( [
			'role__not_in' => [ 'subscriber' ],
			'fields'       => [ 'ID', 'display_name' ],
		] );

		$dropdown = [
			'0' => esc_html__( '- All Authors -', 'pixwell-core' ),
		];

		if ( is_array( $blogusers ) ) {
			foreach ( $blogusers as $user ):
				$dropdown[ esc_attr( $user->ID ) ] = esc_attr( $user->display_name );
			endforeach;
		}

		return $dropdown;
	}

	static function order_dropdown() {

		return [
			'date_post'               => esc_html__( 'Latest Post', 'pixwell-core' ),
			'update'                  => esc_html__( 'Last Updated', 'pixwell-core' ),
			'comment_count'           => esc_html__( 'Popular Comment', 'pixwell-core' ),
			'popular'                 => esc_html__( 'Popular (by Post Views)', 'pixwell-core' ),
			'popular_3d'              => esc_html__( 'Popular Published Last 3 Days', 'pixwell-core' ),
			'popular_w'               => esc_html__( 'Popular Published Last 7 Days', 'pixwell-core' ),
			'popular_m'               => esc_html__( 'Popular Published Last 30 Days', 'pixwell-core' ),
			'popular_3m'              => esc_html__( 'Popular Published Last 3 Months', 'pixwell-core' ),
			'popular_6m'              => esc_html__( 'Popular Published Last 6 Months', 'pixwell-core' ),
			'top_review'              => esc_html__( 'Top Review', 'pixwell-core' ),
			'top_review_3d'           => esc_html__( 'Top Review Published Last 3 Days', 'pixwell-core' ),
			'top_review_w'            => esc_html__( 'Top Review Published Last 7 Days', 'pixwell-core' ),
			'top_review_m'            => esc_html__( 'Top Review Published Last 30 Days', 'pixwell-core' ),
			'top_review_3m'           => esc_html__( 'Top Review Published Last 3 Months', 'pixwell-core' ),
			'top_review_6m'           => esc_html__( 'Top Review Published Last 6 Months', 'pixwell-core' ),
			'top_review_y'            => esc_html__( 'Top Review Published Last Year', 'pixwell-core' ),
			'last_review'             => esc_html__( 'Latest Review', 'pixwell-core' ),
			'sponsored'               => esc_html__( 'Latest Sponsored', 'pixwell-core' ),
			'post_type'               => esc_html__( 'Post Type', 'pixwell-core' ),
			'rand'                    => esc_html__( 'Random', 'pixwell-core' ),
			'rand_w'                  => esc_html__( 'Random last 7 Days', 'pixwell-core' ),
			'rand_m'                  => esc_html__( 'Random last 30 Days', 'pixwell-core' ),
			'rand_3m'                 => esc_html__( 'Random last 3 Months', 'pixwell-core' ),
			'rand_6m'                 => esc_html__( 'Random last 6 Months', 'pixwell-core' ),
			'rand_y'                  => esc_html__( 'Random last Last Year', 'pixwell-core' ),
			'author'                  => esc_html__( 'Author', 'pixwell-core' ),
			'alphabetical_order_decs' => esc_html__( 'Title DECS', 'pixwell-core' ),
			'alphabetical_order_asc'  => esc_html__( 'Title ACS', 'pixwell-core' ),
			'by_input'                => esc_html__( 'by input IDs Data (Work with Post IDs filter)', 'pixwell-core' ),
		];
	}

	static function header_style() {

		return [
			'0'   => esc_html__( '- Default -', 'pixwell-core' ),
			'dot' => esc_html__( 'Default Dot', 'pixwell-core' ),
			'1'   => esc_html__( 'Style 1 (Small Border)', 'pixwell-core' ),
			'2'   => esc_html__( 'Style 2 (Centered & Small Line)', 'pixwell-core' ),
			'3'   => esc_html__( 'Style 3 (Left No Border Radius)', 'pixwell-core' ),
			'4'   => esc_html__( 'Style 4 (Title with Background)', 'pixwell-core' ),
			'5'   => esc_html__( 'Style 5 (Centered and Bold Dot)', 'pixwell-core' ),
			'6'   => esc_html__( 'Style 6 (Left Title with Big Dot)', 'pixwell-core' ),
			'7'   => esc_html__( 'Style 7 (Left Title with Big Border)', 'pixwell-core' ),
			'8'   => esc_html__( 'Style 8 (Centered & Fullwidth Line)', 'pixwell-core' ),
		];
	}

	static function filter_dropdown() {

		return [
			'0'        => esc_html__( '- Disable -', 'pixwell-core' ),
			'category' => esc_html__( 'by Categories', 'pixwell-core' ),
			'tag'      => esc_html__( 'by Tags', 'pixwell-core' ),
		];
	}

	/**
	 * @param bool $default
	 *
	 * @return array|string[]
	 */
	static function heading_html_dropdown( $default = true ) {

		$settings = [
			'0'    => esc_html__( '- Default -', 'pixwell-core' ),
			'h1'   => esc_html__( 'H1', 'pixwell-core' ),
			'h2'   => esc_html__( 'H2', 'pixwell-core' ),
			'h3'   => esc_html__( 'H3', 'pixwell-core' ),
			'h4'   => esc_html__( 'H4', 'pixwell-core' ),
			'h5'   => esc_html__( 'H5', 'pixwell-core' ),
			'h6'   => esc_html__( 'H6', 'pixwell-core' ),
			'p'    => esc_html__( 'p tag', 'pixwell-core' ),
			'span' => esc_html__( 'span', 'pixwell-core' ),
		];

		if ( ! $default ) {
			unset( $settings['0'] );
		}

		return $settings;
	}

	/**
	 * @param bool $default
	 *
	 * @return array
	 */
	static function crop_size_dropdown( $default = true ) {

		$settings = [];
		if ( $default ) {
			$settings['0'] = esc_html__( '- Default -', 'pixwell-core' );
		}

		$sizes = pixwell_get_crop_sizes();

		foreach ( $sizes as $size => $data ) {
			if ( isset( $data[0] ) && isset( $data[1] ) ) {
				$settings[ $size ] = $data[0] . 'x' . $data[1];
			}
		}

		return $settings;
	}

	static function pagination_dropdown() {

		return [
			'0'               => esc_html__( '- Disable -', 'pixwell-core' ),
			'next_prev'       => esc_html__( 'Next Prev', 'pixwell-core' ),
			'loadmore'        => esc_html__( 'Load More', 'pixwell-core' ),
			'infinite_scroll' => esc_html__( 'infinite Scroll', 'pixwell-core' ),
		];
	}

	static function pagination_dropdown_append() {

		return [
			'0'               => esc_html__( '- Disable -', 'pixwell-core' ),
			'loadmore'        => esc_html__( 'Load More', 'pixwell-core' ),
			'infinite_scroll' => esc_html__( 'infinite Scroll', 'pixwell-core' ),
		];
	}

	static function textstyle_dropdown() {

		return [
			'0'     => esc_html__( '-Dark-', 'pixwell-core' ),
			'light' => esc_html__( 'Light', 'pixwell-core' ),
		];
	}

	/**
	 * @param array $configs
	 *
	 * @return array
	 * columns_dropdown
	 */
	static function columns_dropdown( $configs = [] ) {

		$settings = [];

		$default = [
			'0' => esc_html__( '- Default -', 'pixwell-core' ),
			'1' => esc_html__( '1 Column', 'pixwell-core' ),
			'2' => esc_html__( '2 Columns', 'pixwell-core' ),
			'3' => esc_html__( '3 Columns', 'pixwell-core' ),
			'4' => esc_html__( '4 Columns', 'pixwell-core' ),
			'5' => esc_html__( '5 Columns', 'pixwell-core' ),
			'6' => esc_html__( '6 Columns', 'pixwell-core' ),
			'7' => esc_html__( '7 Columns', 'pixwell-core' ),
		];

		if ( ! is_array( $configs ) || ! count( $configs ) ) {
			return $default;
		}
		foreach ( $configs as $item ) {
			$settings[ $item ] = $default[ $item ];
		}

		return $settings;
	}

	/**
	 * @return array
	 * column_gap_dropdown
	 */
	static function column_gap_dropdown() {

		return [
			'0'      => esc_html__( '- Default -', 'pixwell-core' ),
			'none'   => esc_html__( 'No Gap', 'pixwell-core' ),
			'5'      => esc_html__( '10px', 'pixwell-core' ),
			'7'      => esc_html__( '14px', 'pixwell-core' ),
			'10'     => esc_html__( '20px', 'pixwell-core' ),
			'15'     => esc_html__( '30px', 'pixwell-core' ),
			'20'     => esc_html__( '40px', 'pixwell-core' ),
			'25'     => esc_html__( '50px', 'pixwell-core' ),
			'30'     => esc_html__( '60px', 'pixwell-core' ),
			'35'     => esc_html__( '70px', 'pixwell-core' ),
			'custom' => esc_html__( 'Custom Value', 'pixwell-core' ),
		];
	}

	static function divider_style_dropdown() {

		return [
			'solid'   => esc_html__( 'Solid', 'pixwell-core' ),
			'bold'    => esc_html__( 'Bold Solid', 'pixwell-core' ),
			'dashed'  => esc_html__( 'Dashed', 'pixwell-core' ),
			'bdashed' => esc_html__( 'Bold Dashed', 'pixwell-core' ),
			'zigzag'  => esc_html__( 'Zigzag', 'pixwell-core' ),
		];
	}

	static function hide_dropdown() {

		return [
			'0'      => esc_html__( '- Disable -', 'pixwell-core' ),
			'mobile' => esc_html__( 'On Mobile', 'pixwell-core' ),
			'tablet' => esc_html__( 'On Tablet', 'pixwell-core' ),
			'all'    => esc_html__( 'Tablet & Mobile', 'pixwell-core' ),
		];
	}

	static function mobile_layout_dropdown( $default = true ) {

		if ( $default ) {
			return [
				'0'    => esc_html__( '- Default -', 'pixwell-core' ),
				'grid' => esc_html__( 'Grid', 'pixwell-core' ),
				'list' => esc_html__( 'List', 'pixwell-core' ),
			];
		} else {
			return [
				'grid' => esc_html__( 'Grid', 'pixwell-core' ),
				'list' => esc_html__( 'List', 'pixwell-core' ),
			];
		}
	}

	static function featured_position_dropdown( $default = true ) {

		if ( $default ) {
			return [
				'0'     => esc_html__( '- Default -', 'pixwell-core' ),
				'left'  => esc_html__( 'Left', 'pixwell-core' ),
				'right' => esc_html__( 'Right', 'pixwell-core' ),
			];
		} else {
			return [
				'left'  => esc_html__( 'Left', 'pixwell-core' ),
				'right' => esc_html__( 'Right', 'pixwell-core' ),
			];
		}
	}

	static function horizontal_scroll_dropdown() {

		return [
			'0'      => esc_html__( '- Disable -', 'pixwell-core' ),
			'1'      => esc_html__( 'Tablet & Mobile', 'pixwell-core' ),
			'tablet' => esc_html__( 'Tablet Only', 'pixwell-core' ),
			'mobile' => esc_html__( 'Mobile Only', 'pixwell-core' ),
		];
	}

	static function box_style_dropdown() {

		return [
			'0'      => esc_html__( '- Default -', 'pixwell-core' ),
			'bg'     => esc_html__( 'Background', 'pixwell-core' ),
			'border' => esc_html__( 'Border', 'pixwell-core' ),
			'shadow' => esc_html__( 'Shadow', 'pixwell-core' ),
		];
	}

	static function column_border_dropdown() {

		return [
			'0'         => esc_html__( '- Disable -', 'pixwell-core' ),
			'gray'      => esc_html__( 'Gray Solid', 'pixwell-core' ),
			'dark'      => esc_html__( 'Dark Solid', 'pixwell-core' ),
			'gray-dot'  => esc_html__( 'Gray Dotted', 'pixwell-core' ),
			'dark-dot'  => esc_html__( 'Dark Dotted', 'pixwell-core' ),
			'gray-dash' => esc_html__( 'Gray Dashed', 'pixwell-core' ),
			'dark-dash' => esc_html__( 'Dark Dashed', 'pixwell-core' ),
		];
	}

	static function switch_dropdown( $default = true ) {

		if ( $default ) {
			return [
				'0'  => esc_html__( '- Default -', 'pixwell-core' ),
				'1'  => esc_html__( 'Enable', 'pixwell-core' ),
				'-1' => esc_html__( 'Disable', 'pixwell-core' ),
			];
		} else {
			return [
				'1'  => esc_html__( 'Enable', 'pixwell-core' ),
				'-1' => esc_html__( 'Disable', 'pixwell-core' ),
			];
		}
	}

	static function excerpt_source_dropdown() {

		return [
			'0'       => esc_html__( 'Use Post Excerpt', 'pixwell-core' ),
			'tagline' => esc_html__( 'Use Title Tagline', 'pixwell-core' ),
		];
	}

	static function smal_list_style() {

		return [
			'1' => esc_html__( '-Defaults-', 'pixwell-core' ),
			'2' => esc_html__( '2', 'pixwell-core' ),
			'3' => esc_html__( '3', 'pixwell-core' ),
		];
	}

	static function shadow_dropdown() {

		return [
			'0' => esc_html__( '- Disable -', 'pixwell-core' ),
			'1' => esc_html__( 'Enable', 'pixwell-core' ),
		];
	}

	static function infeed_dropdown() {

		return [
			'0'     => esc_html__( '- Disable -', 'pixwell-core' ),
			'code'  => esc_html__( 'Script Code', 'pixwell-core' ),
			'image' => esc_html__( 'Custom Image', 'pixwell-core' ),
		];
	}

	static function tagline_tag_dropdown() {

		return [
			'h1' => esc_html__( 'h1', 'pixwell-core' ),
			'h2' => esc_html__( 'h2', 'pixwell-core' ),
			'h3' => esc_html__( 'h3', 'pixwell-core' ),
			'h4' => esc_html__( 'h4', 'pixwell-core' ),
			'h5' => esc_html__( 'h5', 'pixwell-core' ),
			'h6' => esc_html__( 'h6', 'pixwell-core' ),
		];
	}

	static function button_style_dropdown() {

		return [
			'border' => esc_html__( '- Border -', 'pixwell-core' ),
			'bg'     => esc_html__( 'Background', 'pixwell-core' ),
		];
	}

	static function target_dropdown() {

		return [
			'0' => esc_html__( '- Self -', 'pixwell-core' ),
			'1' => esc_html__( 'Blank', 'pixwell-core' ),
		];
	}

	static function content_align_dropdown() {

		return [
			'0'    => esc_html__( '- Center -', 'pixwell-core' ),
			'left' => esc_html__( 'Left', 'pixwell-core' ),
		];
	}

	static function img_content_dropdown() {

		return [
			'0'      => esc_html__( '- Left -', 'pixwell-core' ),
			'center' => esc_html__( 'Center', 'pixwell-core' ),
			'right'  => esc_html__( 'Right', 'pixwell-core' ),
		];
	}

	static function heading_content_dropdown() {

		return [
			'center' => esc_html__( '- Center -', 'pixwell-core' ),
			'left'   => esc_html__( 'Left', 'pixwell-core' ),
			'right'  => esc_html__( 'Right', 'pixwell-core' ),
		];
	}

	static function image_width_dropdown() {

		return [
			'0' => esc_html__( '-Auto-', 'pixwell-core' ),
			'1' => esc_html__( 'Full Width', 'pixwell-core' ),
		];
	}

	static function icon_position_dropdown() {

		return [
			'0' => esc_html__( '- After Button Label -', 'pixwell-core' ),
			'1' => esc_html__( 'Before Button Label', 'pixwell-core' ),
		];
	}

	static function style_layout_dropdown() {

		return [
			'1' => esc_html__( '-Default (Right Form)-', 'pixwell-core' ),
			'2' => esc_html__( 'Style 2 (Bottom Form)', 'pixwell-core' ),
		];
	}

	static function separator_dropdown() {

		return [
			'0' => esc_html__( '- Disable -', 'pixwell-core' ),
			'1' => esc_html__( 'Enable', 'pixwell-core' ),
		];
	}

}