<?php

use Elementor\Core\Files\CSS\Post;
use Elementor\Plugin;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Rb_E_Template' ) ) {
	class Rb_E_Template {

		protected static $instance = null;

		static function get_instance() {

			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		function __construct() {

			self::$instance = $this;

			if ( ! pixwell_is_elementor_active() ) {
				return false;
			}

			add_action( 'init', [ $this, 'register_post_type' ], 2 );
			add_action( 'elementor/init', [ $this, 'enable_support' ] );
			add_shortcode( 'Ruby_E_Template', [ $this, 'render' ] );
			add_action( 'add_meta_boxes', [ $this, 'shortcode_info' ] );
			add_filter( 'manage_rb-etemplate_posts_columns', [ $this, 'add_column' ] );
			add_action( 'manage_rb-etemplate_posts_custom_column', [ $this, 'column_shortcode_info' ], 10, 2 );
			add_filter( 'template_include', [ $this, 'template' ], 99 );
			add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_style' ], 500 );
		}

		public function template( $template ) {

			global $post;
			if ( ! $post || ( 'rb-etemplate' !== get_post_type( $post ) ) ) {
				return $template;
			}

			$file_path = PIXWELL_CORE_PATH . 'e-template/single.php';
			if ( file_exists( $file_path ) ) {
				return $file_path;
			}
		}

		/**
		 * @param $attrs
		 *
		 * @return false|string
		 */
		function render( $attrs ) {

			$settings = shortcode_atts( [
				'id'   => '',
				'slug' => '',
			], $attrs );

			if ( ( empty( $settings['id'] ) && empty( $settings['slug'] ) ) || ! class_exists( 'Elementor\\Plugin' ) || ! did_action( 'elementor/loaded' ) ) {
				return false;
			}

			/** fallback to slug if empty ID */
			if ( empty( $settings['id'] ) && ! empty( $settings['slug'] ) ) {
				$ids = get_posts( [
					'post_type'      => 'rb-etemplate',
					'posts_per_page' => 1,
					'name'           => $settings['slug'],
					'fields'         => 'ids',
				] );
				if ( ! empty( $ids[0] ) ) {
					$settings['id'] = $ids[0];
				}
			}

			if ( empty( $settings['id'] ) ) {
				return false;
			}

			return Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $settings['id'] );
		}

		function enqueue_style() {

			if ( ! class_exists( '\Elementor\Core\Files\CSS\Post' ) || pixwell_is_amp() ) {
				return;
			}

			$shortcodes = [];
			if ( pixwell_get_option( 'header_template' ) ) {
				$shortcodes['header_template'] = pixwell_get_option( 'header_template' );
			}

			/** add styles */
			$shortcodes = array_filter( $shortcodes );
			if ( count( $shortcodes ) ) {
				$elementor = Plugin::instance();
				$elementor->frontend->enqueue_styles();
				foreach ( $shortcodes as $shortcode ) {
					if ( ! empty( $shortcode ) ) {
						$shortcode = trim( $shortcode );
						preg_match( '/' . get_shortcode_regex() . '/s', $shortcode, $matches );
						if ( ! empty( $matches[3] ) ) {
							$atts = shortcode_parse_atts( $matches[3] );
							if ( ! empty( $atts['id'] ) ) {
								$css_file = new Post( $atts['id'] );
								$css_file->enqueue();
							} elseif ( ! empty( $atts['slug'] ) ) {
								$ids = get_posts( [
									'post_type'      => 'rb-etemplate',
									'posts_per_page' => 1,
									'name'           => $atts['slug'],
									'fields'         => 'ids',
								] );
								if ( ! empty( $ids[0] ) ) {
									$css_file = new Post( $ids[0] );
									$css_file->enqueue();
								}
							}
						}
					}
				}
			}
		}

		function enable_support() {

			add_post_type_support( 'rb-etemplate', 'elementor' );
		}

		public function register_post_type() {

			register_post_type( 'rb-etemplate', [
				'labels'              => [
					'name'               => esc_html__( 'Ruby Templates', 'pixwell-core' ),
					'all_items'          => esc_html__( 'All Templates', 'pixwell-core' ),
					'menu_name'          => esc_html__( 'Ruby Templates', 'pixwell-core' ),
					'singular_name'      => esc_html__( 'Ruby Template', 'pixwell-core' ),
					'add_new'            => esc_html__( 'Add Template', 'pixwell-core' ),
					'add_item'           => esc_html__( 'New Template', 'pixwell-core' ),
					'add_new_item'       => esc_html__( 'Add New Template', 'pixwell-core' ),
					'new_item'           => esc_html__( 'Add New Template', 'pixwell-core' ),
					'edit_item'          => esc_html__( 'Edit Template', 'pixwell-core' ),
					'not_found'          => esc_html__( 'No template item found.', 'pixwell-core' ),
					'not_found_in_trash' => esc_html__( 'No template item found in Trash.', 'pixwell-core' ),
					'parent_item_colon'  => '',
				],
				'public'              => true,
				'has_archive'         => true,
				'can_export'          => true,
				'rewrite'             => false,
				'capability_type'     => 'post',
				'exclude_from_search' => true,
				'hierarchical'        => false,
				'menu_position'       => 5,
				'show_ui'             => true,
				'menu_icon'           => 'dashicons-art',
				'supports'            => [ 'title', 'editor' ],
			] );
		}

		function shortcode_info() {

			add_meta_box( 'rb_etemplate_info', 'Template Shortcode', [
				$this,
				'render_info',
			], 'rb-etemplate', 'side', 'high' );
		}

		function render_info( $post ) { ?>
			<h4 style="margin-bottom:5px;">shortcode Text</h4>
			<input type='text' class='widefat' value='[Ruby_E_Template id="<?php echo $post->ID; ?>"]' readonly="">
			<?php
		}

		function add_column( $columns ) {

			$columns['rb_e_shortcode'] = esc_html__( 'Template Shortcode', 'pixwell-core' );

			return $columns;
		}

		function column_shortcode_info( $column, $post_id ) {

			if ( 'rb_e_shortcode' === $column ) {
				echo '<input type="text" class="widefat" value=\'[Ruby_E_Template id="' . $post_id . '"]\' readonly="">';
			}
		}
	}
}

/** LOAD */
Rb_E_Template::get_instance();