<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_register_options_membership' ) ) {

	function pixwell_register_options_membership() {

		if ( ! class_exists( 'SimpleWpMembership' ) ) {
			return [
				'id'     => 'pixwell_config_section_membership',
				'title'  => esc_html__( 'Membership', 'pixwell' ),
				'desc'   => esc_html__( 'Additional features to support the membership plugin.', 'pixwell' ),
				'icon'   => 'el el-group',
				'fields' => [
					[
						'id'    => 'membership_info_warning',
						'type'  => 'info',
						'style' => 'warning',
						'desc'  => html_entity_decode( esc_html__( 'The Simple WordPress Membership Plugin is missing!  Please install and activate the <a href=\'https://wordpress.org/plugins/simple-membership/\'>Simple WordPress Membership</a> plugin to enable the settings.', 'pixwell' ) ),
					],
				],
			];
		}

		return [
			'id'     => 'pixwell_config_section_membership',
			'title'  => esc_html__( 'Membership', 'pixwell' ),
			'desc'   => esc_html__( 'Additional features to support the membership plugin.', 'pixwell' ),
			'icon'   => 'el el-group',
			'fields' => [
				[
					'id'     => 'section_start_restrict_box',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Content Restrict for New Users', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'restrict_title',
					'type'     => 'textarea',
					'title'    => esc_html__( 'Restrict Content Title', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the title for restricted content. HTML is allowed.', 'pixwell' ),
					'rows'     => 2,
					'default'  => "<strong>Unlimited digital access</strong> to all our <span>Premium</span> contents",
				],
				[
					'id'       => 'restrict_desc',
					'type'     => 'textarea',
					'title'    => esc_html__( 'Restrict Content Description', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the description for restricted content. HTML is allowed.', 'pixwell' ),
					'rows'     => 2,
					'default'  => 'Plans starting at less than $9/month. <strong>Cancel anytime.</strong>',
				],
				[
					'id'       => 'join_us_label',
					'type'     => 'text',
					'title'    => esc_html__( 'Join US Button Label', 'pixwell' ),
					'subtitle' => esc_html__( 'Input a join us button label.', 'pixwell' ),
					'default'  => esc_html__( 'Get Digital All Access', 'pixwell' ),
				],
				[
					'id'       => 'login_desc',
					'type'     => 'textarea',
					'title'    => esc_html__( 'Login Description', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the description for the login section.', 'pixwell' ),
					'default'  => esc_html__( 'Already a subscriber?', 'pixwell' ),
					'rows'     => 2,
				],
				[
					'id'       => 'login_label',
					'type'     => 'text',
					'title'    => esc_html__( 'Login Button Label', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the label for the login button.', 'pixwell' ),
					'default'  => esc_html__( 'Sign In', 'pixwell' ),
				],
				[
					'id'     => 'section_end_restrict_box',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_restrict_level_box',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Content Restrict for Logged Users', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'restrict_level_title',
					'type'     => 'textarea',
					'title'    => esc_html__( 'Upgrade Membership Title', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the title for the upgraded membership level. HTML is allowed.', 'pixwell' ),
					'rows'     => 2,
					'default'  => '<strong>Upgrade Your Plan</strong> for even <span>Greater</span> benefits.',
				],
				[
					'id'       => 'restrict_level_desc',
					'type'     => 'textarea',
					'title'    => esc_html__( 'Upgrade Membership Description', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the description for the upgraded membership level. HTML is allowed.', 'pixwell' ),
					'rows'     => 2,
					'default'  => 'This content is not permitted for your membership level.',
				],
				[
					'id'     => 'section_end_restrict_level_box',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				],
				[
					'id'     => 'section_start_restrict_renewal_box',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Content Restrict for Expired Users', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'       => 'restrict_renewal_title',
					'type'     => 'textarea',
					'title'    => esc_html__( 'Renewal Membership Title', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the title for membership renewal. HTML is allowed.', 'pixwell' ),
					'rows'     => 2,
					'default'  => '<strong>Renew account</strong> to access <span>Premium</span> contents',
				],
				[
					'id'       => 'restrict_renewal_desc',
					'type'     => 'textarea',
					'title'    => esc_html__( 'Renewal Membership Description', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the description for membership renewal. HTML is allowed.', 'pixwell' ),
					'rows'     => 2,
					'default'  => 'Your membership plan has expired.',
				],
				[
					'id'       => 'renewal_label',
					'type'     => 'text',
					'title'    => esc_html__( 'Renewal Button Label', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter the label for the renewal button.', 'pixwell' ),
					'default'  => esc_html__( 'Renewal Your MemberShip', 'pixwell' ),
				],
				[
					'id'     => 'section_end_restrict_renewal_box',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],

				[
					'id'     => 'section_start_protected_title',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Exclusive Label', 'pixwell' ),
					'indent' => true,
				],
				[
					'id'          => 'exclusive_label',
					'type'        => 'text',
					'title'       => esc_html__( 'Member Only Label', 'pixwell' ),
					'subtitle'    => esc_html__( 'Enter a label to display before the post title in listings.', 'pixwell' ),
					'description' => esc_html__( 'Leave this field blank to disable the label.', 'pixwell' ),
					'default'     => 'EXCLUSIVE',
				],
				[
					'id'       => 'exclusive_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Label Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a style for the member-only label.', 'pixwell' ),
					'options'  => [
						'0'      => esc_html__( 'Background Color', 'pixwell' ),
						'border' => esc_html__( 'Border', 'pixwell' ),
					],
					'default'  => '0',
				],
				[
					'id'     => 'section_end_restrict_protected_title',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				],
			],
		];
	}
}