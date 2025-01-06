<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Pixwell_Table_Contents', false ) ) {
	class Pixwell_Table_Contents {

		private static $instance;

		public $settings;
		public $supported_headings;

		public static function get_instance() {

			if ( self::$instance === null ) {
				return new self();
			}

			return self::$instance;
		}

		function __construct() {

			self::$instance = $this;

			$this->get_supported_headings();
			if ( ! is_admin() ) {
				add_filter( 'the_content', [ $this, 'the_content' ], 0 );
			}
		}

		/** get all settings */
		public function get_settings() {

			$this->settings = [
				'post'      => $this->get_setting( 'table_contents_post' ),
				'page'      => $this->get_setting( 'table_contents_page' ),
				'enable'    => $this->get_setting( 'table_contents_enable' ),
				'heading'   => $this->get_setting( 'table_contents_heading' ),
				'layout'    => $this->get_setting( 'table_contents_layout' ),
				'position'  => $this->get_setting( 'table_contents_position' ),
				'hierarchy' => $this->get_setting( 'table_contents_hierarchy' ),
				'numlist'   => $this->get_setting( 'table_contents_numlist' ),
				'scroll'    => $this->get_setting( 'table_contents_scroll' ),
				'toggle'    => $this->get_setting( 'table_contents_toggle' ),
			];
		}

		/**
		 * get supported heading settings
		 */
		public function get_supported_headings() {

			$this->supported_headings = [];
			for ( $i = 1; $i <= 6; $i ++ ) {
				if ( $this->get_setting( 'table_contents_h' . $i ) ) {
					array_push( $this->supported_headings, $i );
				}
			}
		}

		/**
		 * @param string $setting_id
		 *
		 * @return false|mixed
		 * get settings
		 */
		public function get_setting( $setting_id = '' ) {

			$setting = rb_get_meta( $setting_id );

			if ( '-1' == $setting ) {
				return '';
			}

			if ( ! $setting || 'default' == $setting ) {
				$setting = pixwell_get_option( $setting_id );
			}

			return $setting;
		}

		/**
		 * @param $content
		 *
		 * @return string|string[]
		 * the_content filter
		 */
		public function the_content( $content ) {

			$this->get_settings();
			if ( ! $this->is_enabled( $content ) ) {
				return $content;
			}

			$matches = $this->extract_headings( $content );

			if ( ! $matches || ! is_array( $matches ) || ! $this->minimum_headings( $matches ) ) {
				return $content;
			}

			$table_contents = $this->create_table_contents( $matches );

			$content = $this->replace_content( $content, $matches );

			return $this->add_table_contents( $content, $table_contents );
		}

		/**
		 * @param $content
		 * @param $matches
		 *
		 * @return string|string[]
		 * replace content
		 */
		function replace_content( $content, $matches ) {

			$find    = [];
			$replace = [];
			foreach ( $matches as $index => $value ) {
				if ( ! empty( $value[0] ) && ! empty( $value[1] ) && ! empty( $value[2] ) ) {
					array_push( $find, $value[0] );

					if ( pixwell_get_option( 'ajax_next_post' ) ) {
						$index .= '-' . get_the_ID();
					}

					$classname  = 'rb-heading-index-' . $index;
					$style_attr = '';

					if ( preg_match( '/class="(.*?)"/', $value[0], $match ) ) {
						if ( ! empty( $match[1] ) ) {
							$classname .= ' ' . $match[1];
						}
					}

					if ( preg_match( '/style="(.*?)"/', $value[0], $style_match ) ) {
						$style_attr = ' style="' . $style_match[1] . '"';
					}

					array_push( $replace, '<h' . $value[2] . ' id="' . $this->generate_uid( $this->strip_all_tags_title( $value[0] ) ) . '" class="' . strip_tags( $classname ) . '"' . $style_attr . '>' . $this->remove_heading_tags( $value[0] ) . '</h' . $value[2] . '>' );
				}
			}

			return str_replace( $find, $replace, $content );
		}

		/** remove all tags, shortcode */
		function strip_all_tags_title( $title ) {

			$title = strip_shortcodes( $title );
			$title = preg_replace( "~(?:\[/?)[^/\]]+/?\]~s", '', $title );
			$title = str_replace( ']]>', ']]&gt;', $title );

			return wp_strip_all_tags( $title );
		}

		function remove_heading_tags( $string = '' ) {

			if ( preg_match( '|<\s*h[1-6](?:.*)>(.*)</\s*h|Ui', $string, $match ) ) {
				if ( ! empty( $match[1] ) ) {
					return $match[1];
				}
			}

			return $string;
		}

		/**
		 * @param $matches
		 *
		 * @return string
		 * create table content
		 */
		function create_table_contents( $matches ) {

			$output = '';
			if ( $this->settings['hierarchy'] ) {
				$min_depth = 6;

				foreach ( $matches as $index => $value ) {
					if ( $min_depth > $value[2] ) {
						$min_depth = intval( $value[2] );
					}
				}
				foreach ( $matches as $index => $value ) {
					$matches[ $index ]['depth'] = intval( $value[2] ) - $min_depth;
				}
			}

			$classes = 'rbtoc';
			if ( ! empty( $this->settings['scroll'] ) ) {
				$classes .= ' rb-smooth-scroll';
			}

			if ( ! empty( $this->settings['layout'] ) && '2' === (string) $this->settings['layout'] ) {
				$classes .= ' table-fw';
			} elseif ( ! empty( $this->settings['layout'] ) && '3' === (string) $this->settings['layout'] ) {
				$classes .= ' table-left table-fw-single-col';
			} else {
				$classes .= ' table-left';
			}

			$output .= '<div id="ruby-table-contents" class="' . esc_attr( $classes ) . '">';

			$output .= '<div class="table-content-header">';
			if ( ! empty( $this->settings['heading'] ) ) {
				$output .= '<i class="rbi rbi-read"></i><span class="h3">' . esc_html( $this->settings['heading'] ) . '</span>';
			}
			if ( ! empty( $this->settings['toggle'] ) && ! pixwell_is_amp() ) {
				$output .= '<span class="ruby-toc-toggle"><i class="rbi rbi-angle-up"></i></span>';
			}
			$output .= '</div>';
			$output .= '<div class="inner">';
			foreach ( $matches as $index => $value ) {
				$link_classes = 'table-link h5';
				if ( ! empty( $value['depth'] ) ) {
					$link_classes .= ' depth-' . $value['depth'];
				}
				$output .= '<div class="' . esc_attr( $link_classes ) . '"><a href="#' . $this->generate_uid( $value[0] ) . '">';
				$output .= strip_tags( $value[0] );
				$output .= '</a></div>';
			}

			$output .= '</div></div>';

			return $output;
		}

		/**
		 * @param $content
		 * @param $table_contents
		 *
		 * @return string|string[]
		 * add table of contents section
		 */
		function add_table_contents( $content, $table_contents ) {

			if ( strpos( $content, '<!--RUBY:TOC-->' ) ) {
				return str_replace( '<!--RUBY:TOC-->', $table_contents, $content );
			}

			$pos = 0;
			$tag = '</p>';
			if ( ! empty( $this->settings['position'] ) ) {
				$pos = absint( $this->settings['position'] );
			}
			$content = explode( $tag, $content );
			foreach ( $content as $index => $paragraph ) {
				if ( $pos == $index ) {
					$content[ $index ] = $table_contents . $paragraph;
				}
				if ( trim( $paragraph ) ) {
					$content[ $index ] .= $tag;
				}
			}

			$content = implode( '', $content );

			return $content;
		}

		/**
		 * @param $content
		 *
		 * @return false|mixed
		 */
		public function extract_headings( $content ) {

			$matches = [];
			if ( preg_match_all( '/(<h([1-6]{1})[^>]*>).*<\/h\2>/msuU', $content, $matches, PREG_SET_ORDER ) ) {

				$matches = $this->filter_headings( $matches );
				$matches = $this->remove_empty( $matches );

				return $matches;
			}

			return false;
		}

		/** filter supported headings */
		public function filter_headings( $matches ) {

			foreach ( $matches as $index => $value ) {
				if ( ! in_array( $value[2], $this->supported_headings ) ) {
					unset( $matches[ $index ] );
				}
			}

			return $matches;
		}

		/** remove empty */
		function remove_empty( $matches ) {

			foreach ( $matches as $index => $value ) {
				$text = trim( strip_tags( $value[0] ) );
				if ( empty( $text ) ) {
					unset( $matches[ $index ] );
				}
			}

			return $matches;
		}

		/**
		 * @param $matches
		 *
		 * @return bool
		 * minimum headings
		 */
		public function minimum_headings( $matches ) {

			if ( count( $matches ) < $this->settings['enable'] ) {
				return false;
			}

			return true;
		}

		/**
		 * @param $text
		 *
		 * @return string
		 * generate ID
		 */
		public function generate_uid( $text ) {

			$output = trim( strip_tags( $text ) );
			$output = preg_replace( "/\p{P}/u", "", $output );
			$output = str_replace( "&nbsp;", " ", $output );
			$output = remove_accents( $output );
			$output = sanitize_title_with_dashes( $output );

			return $output;
		}

		/**
		 * @param $content
		 *
		 * @return bool
		 * is enabled
		 */
		function is_enabled( $content ) {

			if ( is_front_page() || strpos( $content, 'id="ruby-table-contents"' ) || is_page_template( 'rbc-frontend.php' ) ) {

				return false;
			}

			if ( ( $this->settings['post'] && is_single() ) || ( $this->settings['page'] && is_page() ) ) {
				return true;
			}

			return false;
		}

	}
}
