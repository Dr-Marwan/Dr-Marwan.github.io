<?php
/* ThemeREX Updater support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'petermason_trx_updater_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'petermason_trx_updater_theme_setup9', 9 );
	function petermason_trx_updater_theme_setup9() {
		if ( is_admin() ) {
			add_filter( 'petermason_filter_tgmpa_required_plugins', 'petermason_trx_updater_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'petermason_trx_updater_tgmpa_required_plugins' ) ) {
	
	function petermason_trx_updater_tgmpa_required_plugins($list=array()) {
		if (in_array('trx_updater', petermason_storage_get('required_plugins'))) {
			$path = petermason_get_file_dir('plugins/trx_updater/trx_updater.zip');
			$list[] = array(
					'name' 		=> esc_html__('ThemeREX Updater', 'petermason'),
					'slug'     => 'trx_updater',
					'version'  => '1.5.2',
					'source'	=> !empty($path) ? $path : 'upload://trx_updater.zip',
					'required' 	=> true
				);
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( ! function_exists( 'petermason_exists_trx_updater' ) ) {
	function petermason_exists_trx_updater() {
		return defined( 'TRX_UPDATER_VERSION' );
	}
}
