<?php
/* Essential Grid support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('petermason_essential_grid_theme_setup9')) {
	add_action( 'after_setup_theme', 'petermason_essential_grid_theme_setup9', 9 );
	function petermason_essential_grid_theme_setup9() {
		if (petermason_exists_essential_grid()) {
			add_action( 'wp_enqueue_scripts', 							'petermason_essential_grid_frontend_scripts', 1100 );
			add_filter( 'petermason_filter_merge_styles',					'petermason_essential_grid_merge_styles' );
		}
		if (is_admin()) {
			add_filter( 'petermason_filter_tgmpa_required_plugins',		'petermason_essential_grid_tgmpa_required_plugins' );
		}
	}
}

// Check if plugin installed and activated
if ( !function_exists( 'petermason_exists_essential_grid' ) ) {
	function petermason_exists_essential_grid() {
		return defined('EG_PLUGIN_PATH') || defined( 'ESG_PLUGIN_PATH' );
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'petermason_essential_grid_tgmpa_required_plugins' ) ) {
	
	function petermason_essential_grid_tgmpa_required_plugins($list=array()) {
		if (in_array('essential-grid', petermason_storage_get('required_plugins'))) {
			$path = petermason_get_file_dir('plugins/essential-grid/essential-grid.zip');
			$list[] = array(
						'name' 		=> esc_html__('Essential Grid', 'petermason'),
						'slug' 		=> 'essential-grid',
						'source'	=> !empty($path) ? $path : 'upload://essential-grid.zip',
						'version'  => '2.2.4.2',
						'required' 	=> false
			);
		}
		return $list;
	}
}
	
// Enqueue plugin's custom styles
if ( !function_exists( 'petermason_essential_grid_frontend_scripts' ) ) {
	
	function petermason_essential_grid_frontend_scripts() {
		if (petermason_is_on(petermason_get_theme_option('debug_mode')) && file_exists(petermason_get_file_dir('plugins/essential-grid/essential-grid.css')))
			wp_enqueue_style( 'petermason-essential-grid',  petermason_get_file_url('plugins/essential-grid/essential-grid.css'), array(), null );
	}
}
	
// Merge custom styles
if ( !function_exists( 'petermason_essential_grid_merge_styles' ) ) {
	
	function petermason_essential_grid_merge_styles($list) {
		$list[] = 'plugins/essential-grid/essential-grid.css';
		return $list;
	}
}
?>