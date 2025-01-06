<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

define( 'RB_PORTFOLIO', '10.7' );
define( 'RB_PORTFOLIO_URL', plugin_dir_url( __FILE__ ) );
define( 'RB_PORTFOLIO_PATH', plugin_dir_path( __FILE__ ) );

if ( ! class_exists( 'ruby_portfolio' ) ) {
	class ruby_portfolio {

		protected static $instance = null;

		static function get_instance() {

			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		function __construct() {

			self::$instance = $this;

			if ( ! pixwell_get_option( 'portfolio_supported' ) ) {
				return false;
			}

			do_action( 'rb_portfolio_init' );
			include_once RB_PORTFOLIO_PATH . 'core.php';
			$this->init_components();

			do_action( 'rb_portfolio_loaded' );
		}

		private function init_components() {

			add_action( 'init', [ $this, 'register_portfolio' ], 2 );
			add_filter( 'template_include', 'rb_portfolio_template_redirect', 55 );
			add_shortcode( 'ruby_portfolio', 'rb_portfolio_shortcode' );
			add_filter( 'rb_meta_boxes', 'rb_portfolio_register_metaboxes' );
		}

		public function register_portfolio() {

			$settings = get_option( 'pixwell_theme_options' );

			if ( ! empty( $settings['portfolio_permalink'] ) ) {
				$permalinks = esc_attr( trim( $settings['portfolio_permalink'] ) );
			} else {
				$permalinks = esc_html__( 'portfolio', 'pixwell-core' );
			}

			if ( ! empty( $settings['portfolio_cat_permalink'] ) ) {
				$cat_permalinks = esc_attr( trim( $settings['portfolio_cat_permalink'] ) );
			} else {
				$cat_permalinks = esc_html__( 'portfolio-category', 'pixwell-core' );
			}

			$slug = [
				'slug'       => $permalinks,
				'with_front' => false,
			];
			register_post_type( 'rb-portfolio', [
				'labels'          => [
					'name'               => esc_html__( 'Portfolios', 'pixwell-core' ),
					'all_items'          => esc_html__( 'All Portfolios', 'pixwell-core' ),
					'menu_name'          => esc_html__( 'Portfolios', 'pixwell-core' ),
					'singular_name'      => esc_html__( 'Portfolio', 'pixwell-core' ),
					'add_new'            => esc_html__( 'Add New Portfolio', 'pixwell-core' ),
					'add_item'           => esc_html__( 'New Portfolio', 'pixwell-core' ),
					'add_new_item'       => esc_html__( 'Add New Portfolio', 'pixwell-core' ),
					'new_item'           => esc_html__( 'Add New Portfolio', 'pixwell-core' ),
					'edit_item'          => esc_html__( 'Edit Portfolio', 'pixwell-core' ),
					'not_found'          => esc_html__( 'No portfolio item found.', 'pixwell-core' ),
					'not_found_in_trash' => esc_html__( 'No portfolio item found in Trash.', 'pixwell-core' ),
					'parent_item_colon'  => '',
				],
				'public'          => true,
				'has_archive'     => true,
				'can_export'      => true,
				'show_in_rest'    => true,
				'rewrite'         => $slug,
				'capability_type' => 'post',
				'menu_position'   => 5,
				'show_ui'         => true,
				'menu_icon'       => 'dashicons-archive',
				'supports'        => [ 'title', 'editor', 'thumbnail', 'comments' ],
				'taxonomies'      => [ esc_html__( 'portfolio-category', 'pixwell-core' ) ],
			] );

			$labels = [
				'name'              => esc_html__( 'Portfolio Categories', 'pixwell-core' ),
				'menu_name'         => esc_html__( 'Portfolio Categories', 'pixwell-core' ),
				'singular_name'     => esc_html__( 'Category', 'pixwell-core' ),
				'search_items'      => esc_html__( 'Search Categories', 'pixwell-core' ),
				'all_items'         => esc_html__( 'All Categories', 'pixwell-core' ),
				'parent_item'       => esc_html__( 'Parent Category', 'pixwell-core' ),
				'parent_item_colon' => esc_html__( 'Parent Category:', 'pixwell-core' ),
				'edit_item'         => esc_html__( 'Edit Category', 'pixwell-core' ),
				'update_item'       => esc_html__( 'Update Category', 'pixwell-core' ),
				'add_new_item'      => esc_html__( 'Add New Category', 'pixwell-core' ),
				'new_item_name'     => esc_html__( 'New Category Name', 'pixwell-core' ),
			];

			register_taxonomy( 'portfolio-category', [ 'rb-portfolio' ], [
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'query_var'         => true,
				'show_admin_column' => true,
				'rewrite'           => [ 'slug' => $cat_permalinks ],
			] );

			flush_rewrite_rules();
		}
	}
}

/** LOAD */
ruby_portfolio::get_instance();