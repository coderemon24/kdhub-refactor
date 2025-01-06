<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Rb_Category_Select_Walker', false ) ) {
	class Rb_Category_Select_Walker extends Walker {

		var $tree_type = 'category';
		var $cat_array = [];
		var $db_fields = [
			'id'     => 'term_id',
			'parent' => 'parent',
		];

		public function start_lvl( &$output, $depth = 0, $args = [] ) {
		}

		public function end_lvl( &$output, $depth = 0, $args = [] ) {
		}

		public function start_el( &$output, $object, $depth = 0, $args = [], $current_object_id = 0 ) {

			$this->cat_array[ str_repeat( ' - ', $depth ) . $object->name . ' - [ ID: ' . $object->term_id . ' / Posts: ' . $object->category_count . ' ]' ] = $object->term_id;
		}

		public function end_el( &$output, $object, $depth = 0, $args = [] ) {
		}
	}
}
