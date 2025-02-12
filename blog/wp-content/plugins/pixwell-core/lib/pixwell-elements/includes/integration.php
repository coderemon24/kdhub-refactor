<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;


if ( ! class_exists( 'Pixwell_MC4WP_Integration' ) ) {
	class Pixwell_MC4WP_Integration extends MC4WP_Integration {

		/**
		 * @var string
		 */
		public $name = 'Pixwell Subscribe';
		/**
		 * @var string
		 */
		public $description = 'Integrate with "Pixwell Subscribe to Download" block and "Ruby Newsletter" popup.';

		/**
		 * Add hooks
		 */
		public function add_hooks() {

			add_action( 'pixwell_subscribe', [ $this, 'process' ], 1 );
		}

		/**
		 * Process custom form
		 *
		 * @return bool|string
		 */
		public function process() {

			$parser = new MC4WP_Field_Guesser( $this->get_data() );
			$data   = $parser->combine( [ 'guessed', 'namespaced' ] );

			// do nothing if no email was found
			if ( empty( $data['EMAIL'] ) ) {
				$this->get_log()->warning( sprintf( '%s > Unable to find EMAIL field.', $this->name ) );

				return false;
			}

			return $this->subscribe( $data );
		}

		/**
		 * @return bool
		 */
		public function is_installed() {

			return true;
		}

		/**
		 * @return array
		 */
		public function get_ui_elements() {

			return [ 'lists', 'double_optin', 'update_existing', 'replace_interests' ];
		}
	}
}

