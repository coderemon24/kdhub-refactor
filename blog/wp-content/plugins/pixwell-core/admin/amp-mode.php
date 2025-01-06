<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

add_filter( 'amp_supportable_post_types', 'pixwell_amp_post_types_supported', PHP_INT_MAX );
add_action( 'plugins_loaded', 'pixwell_amp_backend', 100 );

if ( ! function_exists( 'pixwell_amp_post_types_supported' ) ) {
	function pixwell_amp_post_types_supported( $post_types ) {

		if ( empty( $post_types ) || ! is_array( $post_types ) ) {
			return $post_types;
		}

		foreach ( $post_types as $index => $post_type ) {
			if ( 'rb-gallery' == $post_type || 'rb-portfolio' == $post_type || 'rb-deal' == $post_type || 'cp_recipe' == $post_type || 'product' == $post_type ) {
				unset( $post_types[ $index ] );
			}
		}

		return $post_types;
	}
}

if ( ! function_exists( 'pixwell_amp_backend' ) ) {
	function pixwell_amp_backend() {

		if ( defined( 'AMP__VERSION' ) ) {
			add_action( 'wp_loaded', 'pixwell_amp_config_backend', 20 );
			add_action( 'admin_menu', 'pixwell_amp_remove_validated', 20 );
			add_action( 'wp_loaded', 'pixwell_amp_remove_notice', 20 );
		}
	}
}

if ( ! function_exists( 'pixwell_amp_remove_validated' ) ) {
	function pixwell_amp_remove_validated() {

		remove_submenu_page( 'amp-options', 'edit.php?post_type=amp_validated_url' );
		remove_submenu_page( 'amp-options', esc_attr( 'edit-tags.php?taxonomy=amp_validation_error&post_type=amp_validated_url' ) );
		remove_filter( 'dashboard_glance_items', [ 'AMP_Validated_URL_Post_Type', 'filter_dashboard_glance_items' ] );
	}
}

if ( ! function_exists( 'pixwell_amp_remove_notice' ) ) {
	function pixwell_amp_remove_notice() {

		remove_action( 'admin_bar_menu', 'AMP_Validation_Manager::add_admin_bar_menu_items', 101 );
		remove_action( 'edit_form_top', 'AMP_Validation_Manager::print_edit_form_validation_status' );
		remove_action( 'edit_form_top', 'AMP_Validated_URL_Post_Type::print_url_as_title' );
		remove_action( 'all_admin_notices', 'AMP_Validation_Manager::print_plugin_notice' );
		remove_action( 'enqueue_block_editor_assets', 'AMP_Validation_Manager::enqueue_block_validation' );
		remove_action( 'all_admin_notices', 'AMP_Validation_Manager::print_plugin_notice' );
	}
}

if ( ! function_exists( 'pixwell_amp_config_backend' ) ) {
	function pixwell_amp_config_backend() {

		/** remove post type support */
		remove_post_type_support( 'rb-portfolio', AMP_Post_Type_Support::SLUG );
		remove_post_type_support( 'rb-gallery', AMP_Post_Type_Support::SLUG );
		remove_post_type_support( 'rb-deal', AMP_Post_Type_Support::SLUG );

		if ( true === AMP_Options_Manager::get_option( 'all_templates_supported' ) ) {
			AMP_Options_Manager::update_option( 'all_templates_supported', false );
		}
		if ( 'transitional' !== AMP_Options_Manager::get_option( 'theme_support' ) ) {
			AMP_Options_Manager::update_option( 'theme_support', 'transitional' );
		} else {
			add_action( 'admin_print_styles', 'pixwell_amp_remove_mode' );
			add_action( 'admin_footer', 'pixwell_amp_mode_info' );
		}
	}
}

/** hidden mode selection */
if ( ! function_exists( 'pixwell_amp_remove_mode' ) ) {
	function pixwell_amp_remove_mode() {

		?>
		<style type='text/css'> .amp-settings .template-mode-option {
                display: none;
            }</style>
		<?php
	}
}

/** amp mode notification */
if ( ! function_exists( 'pixwell_amp_mode_info' ) ) {
	function pixwell_amp_mode_info() {

		$current_screen = get_current_screen();
		if ( empty( $current_screen->id ) || ( $current_screen->id !== 'toplevel_page_amp-options' ) ) {
			return;
		} ?>
		<script>
            (function ($) {
                var templateModeTimeOut = setInterval(function () {
                    var templateModes = $('#template-modes');
                    if (templateModes.length > 0) {
                        templateModes.html('<div class="selectable selectable--left"><div class="settings-welcome__illustration"><h3>The theme supported and activated AMP in the Transitional mode.</h3></div></div>');
                        clearInterval(templateModeTimeOut);
                    }
                }, 100);
                setTimeout(function () {
                    clearInterval(templateModeTimeOut);
                }, 5000);
            })(jQuery);
		</script>
		<script>
            (function ($) {
                $('.amp-website-mode').find('td').html('<p class="notice notice-success">The theme supported and activated AMP in the Transitional mode.</p>');
                $('#amp-options-supported_post_types-rb-portfolio , #amp-options-supported_post_types-rb-gallery, #amp-options-supported_post_types-rb-deal').next().addBack().remove();
                $('#all_templates_supported_fieldset').remove();
            })(jQuery);
		</script>
		<?php
	}
}


