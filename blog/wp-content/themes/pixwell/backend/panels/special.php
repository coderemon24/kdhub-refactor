<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_register_options_newsletter' ) ) {
	function pixwell_register_options_newsletter() {

		return [
			'id'     => 'pixwell_theme_ops_section_subscribe',
			'title'  => esc_html__( 'Ruby Newsletter', 'pixwell' ),
			'desc'   => esc_html__( 'Grow your business with the Ruby Newsletter popup.', 'pixwell' ),
			'icon'   => 'el el-envelope',
			'fields' => [
				[
					'id'    => 'newsletter_download',
					'type'  => 'info',
					'style' => 'success',
					'desc'  => sprintf(
						'Ruby Subscribed Emails CSV Download: <a class="download-btn" href="%s">Download Here</a>',
						esc_url( admin_url( 'tools.php?download=subscribed-emails.csv' ) )
					),
				],
				[
					'id'    => 'mailchimp_info',
					'type'  => 'info',
					'style' => 'success',
					'desc'  => esc_html__( 'The email will also be added to Mailchimp if you have set up a mailing list in "MC4WP > Integrations > Pixwell Subscribe". Please activate the MC4WP plugin to enable this feature.', 'pixwell' ),
				],
				[
					'id'     => 'section_start_newsletter_general',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'General', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'newsletter_popup',
					'type'     => 'switch',
					'title'    => esc_html__( 'Ruby Newsletter Popup', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the Ruby Newsletter Popup.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'newsletter_popup_expired',
					'type'     => 'select',
					'title'    => esc_html__( 'Popup Expiration', 'pixwell' ),
					'subtitle' => esc_html__( 'Define the time interval (in seconds) before a closed popup reappears for visitors.', 'pixwell' ),
					'options'  => [
						'1'  => esc_html__( '1 Day', 'pixwell' ),
						'2'  => esc_html__( '2 Days', 'pixwell' ),
						'3'  => esc_html__( '3 Days', 'pixwell' ),
						'7'  => esc_html__( '1 Week', 'pixwell' ),
						'14' => esc_html__( '2 Weeks', 'pixwell' ),
						'21' => esc_html__( '3 Weeks', 'pixwell' ),
						'30' => esc_html__( '1 Month', 'pixwell' ),
					],
					'default'  => '1',
				],
				[
					'id'       => 'newsletter_popup_delay',
					'title'    => esc_html__( 'Delay Time', 'pixwell' ),
					'subtitle' => esc_html__( 'Input the delay time (in milliseconds) to display the popup after the site has loaded.', 'pixwell' ),
					'type'     => 'text',
					'default'  => '1000',
				],
				[
					'id'     => 'section_end_newsletter_general',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],

				[
					'id'     => 'section_start_newsletter_popup',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Content', 'pixwell' ),
					'indent' => true,
				],

				[
					'id'       => 'newsletter_popup_title',
					'type'     => 'text',
					'title'    => esc_html__( 'Newsletter Title', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the heading for the newsletter subscription form.', 'pixwell' ),
					'default'  => esc_html__( 'Subscribe to Newsletter', 'pixwell' ),
				],
				[
					'id'       => 'newsletter_popup_description',
					'type'     => 'textarea',
					'title'    => esc_html__( 'Newsletter Description', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the description for the newsletter subscription form.', 'pixwell' ),
					'default'  => esc_html__( 'Get our latest news straight into your inbox.', 'pixwell' ),
					'rows'     => 2,
				],
				[
					'id'       => 'newsletter_popup_privacy',
					'type'     => 'text',
					'title'    => esc_html__( 'Privacy Text', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the privacy text for the newsletter subscription form.', 'pixwell' ),
					'default'  => '',
				],
				[
					'id'       => 'newsletter_popup_cover',
					'title'    => esc_html__( 'Cover Image', 'pixwell' ),
					'subtitle' => esc_html__( 'Upload a cover image for this section.', 'pixwell' ),
					'type'     => 'media',
					'url'      => true,
					'preview'  => true,
				],
				[
					'id'       => 'newsletter_popup_submit',
					'type'     => 'text',
					'title'    => esc_html__( 'Submit Text', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the text for the submit button.', 'pixwell' ),
					'default'  => esc_html__( 'Sign Up', 'pixwell' ),
				],
				[
					'id'       => 'newsletter_placeholder',
					'type'     => 'text',
					'title'    => esc_html__( 'Email Placeholder Text', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the placeholder text for the email input field.', 'pixwell' ),
					'default'  => esc_html__( 'Input your e-mail', 'pixwell' ),
				],
				[
					'id'     => 'section_end_newsletter_popup',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_newsletter_response_text',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Notice Info', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'newsletter_privacy_error',
					'type'     => 'text',
					'title'    => esc_html__( 'Privacy Error Message', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the error message for failing to accept the privacy terms.', 'pixwell' ),
					'default'  => esc_html__( 'Please accept the terms of our newsletter.', 'pixwell' ),
				],
				[
					'id'       => 'newsletter_email_error',
					'type'     => 'text',
					'title'    => esc_html__( 'Email Error Message', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the error message for an invalid email address.', 'pixwell' ),
					'default'  => esc_html__( 'Please enter your email address.', 'pixwell' ),
				],
				[
					'id'       => 'newsletter_email_exists',
					'type'     => 'text',
					'title'    => esc_html__( 'Email Exists Message', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the response message if the email is already subscribed.', 'pixwell' ),
					'default'  => esc_html__( 'That email is already subscribed.', 'pixwell' ),
				],
				[
					'id'       => 'newsletter_success',
					'type'     => 'text',
					'title'    => esc_html__( 'Success Message', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the success message displayed after a successful subscription.', 'pixwell' ),
					'default'  => esc_html__( 'Thank you for subscribing!', 'pixwell' ),
				],
				[
					'id'     => 'section_end_newsletter_response_text',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}

if ( ! function_exists( 'pixwell_register_options_bookmark' ) ) {
	function pixwell_register_options_bookmark() {

		return [
			'id'     => 'pixwell_theme_ops_section_bookmark',
			'title'  => esc_html__( 'Read it Later', 'pixwell' ),
			'desc'   => esc_html__( 'Choose options for the "Read it Later" feature.', 'pixwell' ),
			'icon'   => 'el el-heart',
			'fields' => [
				[
					'id'    => 'bookmark_notice',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => esc_html__( 'This feature requires a page created with the "Read it Later" template. Assign that page to the "Read it Later Page" setting below.', 'pixwell' ),
				],
				[
					'id'       => 'header_bookmark',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the "Read it Later" button in the header.', 'pixwell' ),
					'default'  => false,
				],
				[
					'id'       => 'header_bookmark_url',
					'title'    => esc_html__( 'Read it Later Page', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a page created with the "Read it Later" template.', 'pixwell' ),
					'type'     => 'select',
					'data'     => 'page',
					'default'  => '',
				],
			],
		];
	}
}