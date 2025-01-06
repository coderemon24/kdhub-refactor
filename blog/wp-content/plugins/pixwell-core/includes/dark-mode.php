<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

add_action( 'wp_head', 'pixwell_embed_dark_mode', 100 );
add_action( 'wp_footer', 'pixwell_footer_inline_script', 1 );

if ( ! function_exists( 'pixwell_get_dark_mode_id' ) ) {
	function pixwell_get_dark_mode_id() {

		if ( is_multisite() ) {
			return 'D_' . trim( str_replace( '/', '_', preg_replace( '/https?:\/\/(www\.)?/', '', get_site_url() ) ) );
		}

		return 'RubyDarkMode';
	}
}

if ( ! function_exists( 'pixwell_get_theme_mode' ) ) {
	function pixwell_get_theme_mode() {

		$dark_mode = pixwell_get_option( 'dark_mode' );

		if ( empty( $dark_mode ) || 'browser' === $dark_mode ) {
			return 'default';
		} elseif ( 'dark' === $dark_mode ) {
			return 'dark';
		}

		$is_cookie_mode = (string) pixwell_get_option( 'dark_mode_cookie' );
		if ( '1' === $is_cookie_mode ) {
			$id = pixwell_get_dark_mode_id();
			if ( ! empty( $_COOKIE[ $id ] ) ) {
				return $_COOKIE[ $id ];
			}
		}

		$first_visit_mode = pixwell_get_option( 'first_visit_mode' );
		if ( empty( $first_visit_mode ) ) {
			$first_visit_mode = 'default';
		}

		return $first_visit_mode;
	}
}

if ( ! function_exists( 'pixwell_embed_dark_mode' ) ) {
	function pixwell_embed_dark_mode() {

		if ( pixwell_is_amp() ) {
			return;
		}

		$dark_mode     = (string) pixwell_get_option( 'dark_mode' );
		$optimize_load = (string) pixwell_get_option( 'dark_mode_cookie' );

		if ( 'browser' === $dark_mode ) {
			add_action( 'wp_body_open', 'pixwell_dark_mode_prefers_scheme_script', 0 );
		}

		if ( '2' === $optimize_load ) {
			add_action( 'wp_body_open', 'pixwell_dark_mode_inline_script', 0 );
		} else {
			add_action( 'wp_footer', 'pixwell_dark_mode_inline_script', 0 );
		}
	}
}

if ( ! function_exists( 'pixwell_dark_mode_prefers_scheme_script' ) ) {
	function pixwell_dark_mode_prefers_scheme_script() {

		$type_attr = current_theme_supports( 'html5', 'script' ) ? '' : " type='text/javascript'";
		?>
		<script<?php echo $type_attr; ?>>
            (function () {
                document.body.setAttribute('data-theme', window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'default');
            })();
		</script>
		<?php
	}
}

if ( ! function_exists( 'pixwell_dark_mode_inline_script' ) ) {
	function pixwell_dark_mode_inline_script() {

		if ( '1' !== (string) pixwell_get_option( 'dark_mode' ) ) {
			return;
		}

		$optimized_load   = (string) pixwell_get_option( 'dark_mode_cookie' );
		$cookie_mode      = ( $optimized_load === '1' );
		$first_visit_mode = pixwell_get_option( 'first_visit_mode' );
		$type_attr        = current_theme_supports( 'html5', 'script' ) ? '' : " type='text/javascript'";
		?>
		<script<?php echo $type_attr; ?>>
            (function () {
                let currentMode = null;
                const darkModeID = '<?php echo pixwell_get_dark_mode_id() ?>';
				<?php if( $cookie_mode ) : ?>
                currentMode = document.body.getAttribute('data-theme');
                if (currentMode === 'browser' && window.matchMedia) {
                    currentMode = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'default';
                    document.body.setAttribute('data-theme', currentMode);
                }
				<?php else: ?>
                currentMode = navigator.cookieEnabled ? localStorage.getItem(darkModeID) || null : 'default';
                if (!currentMode) {
					<?php if( 'browser' === $first_visit_mode ) : ?>
                    if (window.matchMedia && navigator.cookieEnabled) {
                        currentMode = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'default';
                        localStorage.setItem(darkModeID, currentMode);
                    }
					<?php else : ?>
                    currentMode = '<?php echo esc_attr( $first_visit_mode ); ?>';
                    localStorage.setItem(darkModeID, '<?php echo esc_attr( $first_visit_mode ); ?>');
					<?php endif; ?>
                }
                document.body.setAttribute('data-theme', currentMode === 'dark' ? 'dark' : 'default');
				<?php endif; ?>
            })();
		</script>
		<?php
	}
}

if ( ! function_exists( 'pixwell_footer_inline_script' ) ) {
	function pixwell_footer_inline_script() {

		if ( pixwell_is_amp() ) {
			return;
		}

		$optimized_load = (string) pixwell_get_option( 'dark_mode_cookie' );
		$dark_mode      = (string) pixwell_get_option( 'dark_mode' );
		$cookie_mode    = ( $optimized_load === '1' );
		$type_attr      = current_theme_supports( 'html5', 'script' ) ? '' : " type='text/javascript'";
		?>
		<script<?php echo $type_attr; ?>>
            (function () {
				<?php if ( '1' === $dark_mode ) : ?>
                const darkModeID = '<?php echo pixwell_get_dark_mode_id() ?>';
                const currentMode = <?php echo ! empty( $cookie_mode ) ? "document.body.getAttribute('data-theme')" : "navigator.cookieEnabled ? (localStorage.getItem(darkModeID) || 'default') : 'default'" ?>;
                const selector = currentMode === 'dark' ? '.mode-icon-dark' : '.mode-icon-default';
                const icons = document.querySelectorAll(selector);
                if (icons.length) {
                    icons.forEach(icon => icon.classList.add('activated'));
                }
				<?php endif; ?>
            })();
		</script>
		<?php
	}
}