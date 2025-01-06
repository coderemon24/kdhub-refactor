<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_register_options_adblock' ) ) {
	function pixwell_register_options_adblock() {

		return [
			'id'     => 'pixwell_config_section_adblock',
			'title'  => esc_html__( 'AdBlock Detector', 'pixwell' ),
			'desc'   => esc_html__( 'Detecting most of the AdBlock extensions and show a popup to disable the extension.', 'pixwell' ),
			'icon'   => 'el el-minus-sign',
			'fields' => [
				[
					'id'       => 'adblock_detector',
					'title'    => esc_html__( 'AdBlock Detector', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the adblock detector.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				],
				[
					'id'       => 'adblock_title',
					'title'    => esc_html__( 'Title', 'pixwell' ),
					'subtitle' => esc_html__( 'Enter a title for the AdBlock popup.', 'pixwell' ),
					'default'  => esc_html__( 'AdBlock Detected', 'pixwell' ),
					'type'     => 'text',
				],
				[
					'id'       => 'adblock_description',
					'title'    => esc_html__( 'Description', 'pixwell' ),
					'subtitle' => esc_html__( 'Input a description for the AdBlock popup.', 'pixwell' ),
					'default'  => esc_html__( 'Our site is an advertising supported site. Please whitelist to support our site.', 'pixwell' ),
					'type'     => 'textarea',
					'rows'     => 3,
				],
			],
		];
	}
}
