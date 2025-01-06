<?php
/** Don't load directly */
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'pixwell_register_options_backup' ) ) {
	function pixwell_register_options_backup() {

		return [
			'id'     => 'pixwell_config_section_backup',
			'title'  => esc_html__( 'Restore/Backup', 'pixwell' ),
			'desc'   => esc_html__( 'Having a backup file lets you quickly restore your settings.', 'pixwell' ),
			'icon'   => 'el el-inbox',
			'fields' => [
				[
					'id'    => 'wc_info_warning',
					'type'  => 'info',
					'style' => 'warning',
					'desc'  => esc_html__( 'You should backup your settings regularly. Before you update or do major changes.', 'pixwell' ),
				],
				[
					'id'         => 'ruby-import-export',
					'type'       => 'import_export',
					'title'      => esc_html__( 'Restore/Backup', 'pixwell' ),
					'subtitle'   => esc_html__( 'Download a backup file or restore your settings.', 'pixwell' ),
					'full_width' => false,
				],
			],
		];
	}
}
