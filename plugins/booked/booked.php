<?php
/* Booked Appointments support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('petermason_booked_theme_setup9')) {
	add_action( 'after_setup_theme', 'petermason_booked_theme_setup9', 9 );
	function petermason_booked_theme_setup9() {
		if (petermason_exists_booked()) {
			add_action( 'wp_enqueue_scripts', 							'petermason_booked_frontend_scripts', 1100 );
			add_filter( 'petermason_filter_merge_styles',					'petermason_booked_merge_styles' );
		}
		if (is_admin()) {
			add_filter( 'petermason_filter_tgmpa_required_plugins',		'petermason_booked_tgmpa_required_plugins' );
		}
	}
}

// Check if plugin installed and activated
if ( !function_exists( 'petermason_exists_booked' ) ) {
	function petermason_exists_booked() {
		return class_exists('booked_plugin');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'petermason_booked_tgmpa_required_plugins' ) ) {
	
	function petermason_booked_tgmpa_required_plugins($list=array()) {
		if (in_array('booked', petermason_storage_get('required_plugins'))) {
			$path = petermason_get_file_dir('plugins/booked/booked.zip');
			$list[] = array(
					'name' 		=> esc_html__('Booked Appointments', 'petermason'),
					'slug' 		=> 'booked',
					'source' 	=> !empty($path) ? $path : 'upload://booked.zip',
					'required' 	=> false
			);
		}
		return $list;
	}
}
	
// Enqueue plugin's custom styles
if ( !function_exists( 'petermason_booked_frontend_scripts' ) ) {
	
	function petermason_booked_frontend_scripts() {
		if (petermason_is_on(petermason_get_theme_option('debug_mode')) && file_exists(petermason_get_file_dir('plugins/booked/booked.css')))
			wp_enqueue_style( 'petermason-booked',  petermason_get_file_url('plugins/booked/booked.css'), array(), null );
	}
}
	
// Merge custom styles
if ( !function_exists( 'petermason_booked_merge_styles' ) ) {
	
	function petermason_booked_merge_styles($list) {
		$list[] = 'plugins/booked/booked.css';
		return $list;
	}
}
?>