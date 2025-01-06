<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'Pixwell_Elementor' ) ) {
	class Pixwell_Elementor {

		private static $instance = null;

		public static function get_instance() {

			if ( ! self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		public function __construct() {

			self::$instance = $this;

			if ( ! pixwell_is_elementor_active() ) {
				return false;
			}

			add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
			add_action( 'elementor/elements/categories_registered', [ $this, 'register_category' ] );
		}

		private function load_files() {

			$file_names = [
				'fw-feat-1',
				'fw-feat-2',
				'fw-feat-3',
				'fw-feat-4',
				'fw-feat-5',
				'fw-feat-6',
				'fw-feat-7',
				'fw-feat-8',
				'fw-feat-9',
				'fw-feat-10',
				'fw-feat-11',
				'fw-feat-12',
				'fw-feat-13',
				'fw-feat-14',
				'fw-feat-15',
				'fw-feat-16',
				'fw-feat-17',
				'fw-feat-18',
				'fw-grid-1',
				'fw-grid-2',
				'fw-grid-3',
				'fw-grid-4',
				'fw-grid-5',
				'fw-list-1',
				'fw-list-2',
				'fw-list-3',
				'fw-masonry-1',
				'ct-grid-1',
				'ct-grid-2',
				'ct-list',
				'ct-classic',
				'ct-masonry-1',
				'fw-mix-1',
				'fw-mix-2',
				'fw-newsletter',
				'about',
				'fw-banner',
				'fw-search',
				'cta-1',
				'fw-portfolio-1',
				'fw-category-1',
				'fw-category-2',
				'image-box',
				'fw-subscribe',
				'heading',
				'ct-small-post',
				'plan',
				'ad-image',
				'ad-script',
				'logo',
				'dark-toggle',
				'navigation',
				'search-icon',
				'social-list',
				'notification-icon',
				'bookmark-icon',
				'grid-flex',
				'left-side-toggle',
			];

			foreach ( $file_names as $name ) {
				$file = PIXWELL_CORE_PATH . '/elementor/' . $name . '.php';
				if ( file_exists( $file ) ) {
					require_once $file;
				}
			}
		}

		private function load_controls() {

			require_once( PIXWELL_CORE_PATH . '/elementor/control.php' );
		}

		private function load_templates() {

			require_once( PIXWELL_CORE_PATH . '/elementor/templates.php' );
		}

		/**
		 * @param $elements_manager
		 */
		public function register_category( $elements_manager ) {

			$elements_manager->add_category(
				'pixwell-fw', [
					'title' => esc_html__( 'Pixwell - FullWidth (Boxed) Section', 'pixwell-core' ),
					'icon'  => 'eicon-section',
				]
			);

			$elements_manager->add_category(
				'pixwell-wide', [
					'title' => esc_html__( 'Pixwell - FullWide Section', 'pixwell-core' ),
					'icon'  => 'eicon-section',
				]
			);

			$elements_manager->add_category(
				'pixwell-ct', [
					'title' => esc_html__( 'Pixwell Content Section', 'pixwell-core' ),
					'icon'  => 'eicon-section',
				]
			);

			$elements_manager->add_category(
				'pixwell_header', [
					'title' => esc_html__( 'Pixwell Header', 'pixwell-core' ),
					'icon'  => 'eicon-section',
				]
			);
		}

		public function register_widgets() {

			$this->load_controls();
			$this->load_files();
			$this->load_templates();

			$widgets = [
				'Fw_Feat_1',
				'Fw_Feat_2',
				'Fw_Feat_3',
				'Fw_Feat_4',
				'Fw_Feat_5',
				'Fw_Feat_6',
				'Fw_Feat_7',
				'Fw_Feat_8',
				'Fw_Feat_9',
				'Fw_Feat_10',
				'Fw_Feat_11',
				'Fw_Feat_12',
				'Fw_Feat_13',
				'Fw_Feat_14',
				'Fw_Feat_15',
				'Fw_Feat_16',
				'Fw_Feat_17',
				'Fw_Feat_18',
				'Fw_Grid_1',
				'Fw_Grid_2',
				'Fw_Grid_3',
				'Fw_Grid_4',
				'Fw_Grid_5',
				'Fw_List_1',
				'Fw_List_2',
				'Fw_List_3',
				'Fw_Masonry_1',
				'Ct_Grid_1',
				'Ct_Grid_2',
				'Ct_List_1',
				'Ct_Classic_1',
				'Ct_Masonry_1',
				'Fw_Mix_1',
				'Fw_Mix_2',
				'Fw_Ruby_Newsletter',
				'Fw_Ruby_About_Me',
				'Fw_Ruby_Banner',
				'Fw_Search_Box',
				'Fw_Cta_1',
				'Fw_Portfolio_1',
				'Fw_Category_1',
				'Fw_Category_2',
				'Fw_Image_Box',
				'Fw_Subscribe',
				'Fw_Heading',
				'Ct_small_post',
				'Plan',
				'Ad_Image',
				'Ad_Script',
				'Logo',
				'Dark_Mode_Toggle',
				'Navigation',
				'Header_Search_Icon',
				'Social_List',
				'Header_Notification',
				'Header_Bookmark',
				'Grid_Flex_1',
				'Header_L_Toggle',
			];

			foreach ( $widgets as $widget ) {
				$widget_name = 'PixwellElementorElement\Widgets\\' . $widget;
				if ( class_exists( $widget_name ) ) {
					Elementor\Plugin::instance()->widgets_manager->register( new $widget_name() );
				}
			}
		}
	}
}

/** load plugin */
Pixwell_Elementor::get_instance();