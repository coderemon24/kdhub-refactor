<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

add_action( 'wp_ajax_form_download_submit', 'pixwell_form_download_submit' );
add_action( 'wp_ajax_nopriv_form_download_submit', 'pixwell_form_download_submit' );

if ( ! function_exists( 'pixwell_email_to_download' ) ) {
	function pixwell_email_to_download( $attributes ) {

		if ( pixwell_is_amp() && ! is_admin() ) {
			return false;
		}

		$blockId      = $attributes['blockId'] ?? '';
		$heading      = $attributes['heading'] ?? '';
		$description  = $attributes['description'] ?? '';
		$image        = $attributes['image'] ?? '';
		$imageAlt     = $attributes['imageAlt'] ?? '';
		$buttonLabel  = $attributes['buttonLabel'] ?? '';
		$checkBoxText = $attributes['checkBoxText'] ?? '';
		$headingTag   = $attributes['headingHTMLTag'] ?? 'h3';

		$wrapperClassName = 'gb-wrap gb-download';
		if ( ! empty( $attributes['shadow'] ) ) {
			$wrapperClassName .= ' yes-shadow';
		}
		$heading_classes = 'gb-heading' . ( empty( $attributes['tocAdded'] ) ? ' none-toc' : '' );

		$output = '';
		$output .= '<div ' . get_block_wrapper_attributes( [
				'class' => $wrapperClassName,
				'style' => pixwell_get_block_download_style( $attributes ),
			] ) . '>';
		$output .= '<div class="gb-download-inner">';
		$output .= '<div class="gb-download-header">';
		if ( ! empty( $image ) ) {
			$output .= '<img class="gb-image" src="' . esc_url( $image ) . '" alt="' . esc_attr( $imageAlt ) . '">';
		}
		$output .= '<' . $headingTag . ' class="' . $heading_classes . '">' . $heading . '</' . $headingTag . '>';
		if ( ! empty( $description ) ) {
			$output .= '<span class="gb-description">' . $description . '</span>';
		}
		$output       .= '</div>';
		$form_action  = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
		$output       .= '<form method="post" action="' . esc_url( $form_action ) . '" class="download-form">';
		$output       .= '<div class="mc4wp-form-fields">';
		$output       .= '<div>';
		$output       .= '<input type="email" name="EMAIL" placeholder="Your email address" required="">';
		$output       .= '<input type="hidden" name="blockId" value="' . esc_attr( $blockId ) . '"/>';
		$output       .= '<input type="hidden" name="postId" value="' . get_the_ID() . '"/>';
		$output       .= '<input type="hidden" name="action" value="form_download_submit"/>';
		$output       .= '<input type="submit" value="' . esc_attr( $buttonLabel ) . '">';
		$output       .= '</div>';
		$integrations = get_option( 'mc4wp_integrations' );
		if ( ! empty( $integrations['pixwell']['double_optin'] ) ) {
			$output .= '<div class="download-checkbox">';
			$output .= '<input type="checkbox" name="acceptTerms" required="" checked>';
			$output .= '<label for="acceptTerms">' . esc_html( $checkBoxText ) . '</label>';
			$output .= '</div>';
		}
		$output .= '</div>';
		$output .= '<span class="notice-text"></span>';
		$output .= '<i class="rb-loader loader-absolute"></i>';
		$output .= '</form>';
		$output .= '</div>';
		$output .= '</div>';

		return $output;
	}
}

if ( ! function_exists( 'pixwell_get_block_download_style' ) ) {
	function pixwell_get_block_download_style( $attributes ) {

		$css = [];

		if ( ! empty( $attributes['headingColor'] ) ) {
			$css['--heading-color'] = $attributes['headingColor'];
		}
		if ( ! empty( $attributes['darkHeadingColor'] ) ) {
			$css['--dark-heading-color'] = $attributes['darkHeadingColor'];
		}
		if ( ! empty( $attributes['desktopHeadingSize'] ) ) {
			$css['--desktop-heading-size'] = $attributes['desktopHeadingSize'] . 'px';
		}
		if ( ! empty( $attributes['tabletHeadingSize'] ) ) {
			$css['--tablet-heading-size'] = $attributes['tabletHeadingSize'] . 'px';
		}
		if ( ! empty( $attributes['mobileHeadingSize'] ) ) {
			$css['--mobile-heading-size'] = $attributes['mobileHeadingSize'] . 'px';
		}
		if ( ! empty( $attributes['descriptionColor'] ) ) {
			$css['--description-color'] = $attributes['descriptionColor'];
		}
		if ( ! empty( $attributes['darkDescriptionColor'] ) ) {
			$css['--dark-description-color'] = $attributes['darkDescriptionColor'];
		}
		if ( ! empty( $attributes['desktopDescriptionSize'] ) ) {
			$css['--desktop-description-size'] = $attributes['desktopDescriptionSize'] . 'px';
		}
		if ( ! empty( $attributes['tabletDescriptionSize'] ) ) {
			$css['--tablet-description-size'] = $attributes['tabletDescriptionSize'] . 'px';
		}
		if ( ! empty( $attributes['mobileDescriptionSize'] ) ) {
			$css['--mobile-description-size'] = $attributes['mobileDescriptionSize'] . 'px';
		}
		if ( ! empty( $attributes['desktopImageSize'] ) ) {
			$css['--desktop-image-size'] = $attributes['desktopImageSize'] . 'px';
		}
		if ( ! empty( $attributes['tabletImageSize'] ) ) {
			$css['--tablet-image-size'] = $attributes['tabletImageSize'] . 'px';
		}
		if ( ! empty( $attributes['mobileImageSize'] ) ) {
			$css['--mobile-image-size'] = $attributes['mobileImageSize'] . 'px';
		}
		if ( ! empty( $attributes['borderStyle'] ) ) {
			$css['--border-style'] = $attributes['borderStyle'];
		}
		if ( ! empty( $attributes['borderRadius'] ) ) {
			$css['--border-radius'] = $attributes['borderRadius'] . 'px';
		}
		if ( ! empty( $attributes['borderWidth'] ) ) {
			$css['--border-width'] = pixwell_get_block_border_width_css( $attributes['borderWidth'] );
		}
		if ( ! empty( $attributes['borderColor'] ) ) {
			$css['--border-color'] = $attributes['borderColor'];
		}
		if ( ! empty( $attributes['darkBorderColor'] ) ) {
			$css['--dark-border-color'] = $attributes['darkBorderColor'];
		}
		if ( ! empty( $attributes['background'] ) ) {
			$css['--bg'] = $attributes['background'];
		}
		if ( ! empty( $attributes['darkBackground'] ) ) {
			$css['--dark-bg'] = $attributes['darkBackground'];
		}
		if ( ! empty( $attributes['desktopPadding'] ) ) {
			$css['--desktop-padding'] = pixwell_get_block_padding_css( $attributes['desktopPadding'] );
		}
		if ( ! empty( $attributes['tabletPadding'] ) ) {
			$css['--tablet-padding'] = pixwell_get_block_padding_css( $attributes['tabletPadding'] );
		}
		if ( ! empty( $attributes['mobilePadding'] ) ) {
			$css['--mobile-padding'] = pixwell_get_block_padding_css( $attributes['mobilePadding'] );
		}

		$css_attributes = '';
		foreach ( $css as $key => $value ) {
			$css_attributes .= "$key: $value;";
		}

		return $css_attributes;
	}
}

if ( ! function_exists( 'pixwell_form_download_submit' ) ) {
	function pixwell_form_download_submit() {

		$email = isset( $_POST['EMAIL'] ) ? sanitize_email( $_POST['EMAIL'] ) : '';

		if ( empty( $email ) ) {
			wp_send_json( [
				'success' => false,
				'message' => esc_html__( 'Something went wrong, please try again!', 'pixwell-core' ),
			] );
		}

		/** add */
		do_action( 'pixwell_subscribe' );

		$post_id  = isset( $_POST['postId'] ) ? sanitize_text_field( $_POST['postId'] ) : '';
		$block_id = isset( $_POST['blockId'] ) ? sanitize_text_field( $_POST['blockId'] ) : '';

		$data = pixwell_get_block_attributes( 'pixwell-elements/download', $post_id, $block_id );

		if ( ! empty( $data['file'] ) ) {
			$file_url = $data['file'];

			$response = [
				'success' => true,
				'file'    => $file_url,
				'message' => esc_html__( 'Your download will start in a few seconds, If your download does not start, please click here.', 'pixwell-core' ),
			];

			wp_send_json( $response );
		}

		wp_send_json( [ 'success' => false, 'message' => esc_html__( 'Sorry, File not found.', 'pixwell-core' ) ] );
	}
}


