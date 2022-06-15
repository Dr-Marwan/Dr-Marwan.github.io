<?php
/* Contact Form 7 support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('petermason_cf7_theme_setup9')) {
	add_action( 'after_setup_theme', 'petermason_cf7_theme_setup9', 9 );
	function petermason_cf7_theme_setup9() {
		
		if (petermason_exists_cf7()) {
			add_action( 'wp_enqueue_scripts', 								'petermason_cf7_frontend_scripts', 1100 );
			add_filter( 'petermason_filter_merge_styles',						'petermason_cf7_merge_styles' );
		}
		if (is_admin()) {
			add_filter( 'petermason_filter_tgmpa_required_plugins',			'petermason_cf7_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'petermason_cf7_tgmpa_required_plugins' ) ) {
	
	function petermason_cf7_tgmpa_required_plugins($list=array()) {
		if (in_array('contact-form-7', petermason_storage_get('required_plugins'))) {
			// CF7 plugin
			$list[] = array(
					'name' 		=> esc_html__('Contact Form 7', 'petermason'),
					'slug' 		=> 'contact-form-7',
					'required' 	=> false
			);
		}
		return $list;
	}
}



// Check if cf7 installed and activated
if ( !function_exists( 'petermason_exists_cf7' ) ) {
	function petermason_exists_cf7() {
		return class_exists('WPCF7');
	}
}
	
// Enqueue custom styles
if ( !function_exists( 'petermason_cf7_frontend_scripts' ) ) {
	
	function petermason_cf7_frontend_scripts() {
		if (petermason_is_on(petermason_get_theme_option('debug_mode')) && petermason_get_file_dir('plugins/contact-form-7/contact-form-7.css')!='')
			wp_enqueue_style( 'petermason-contact-form-7',  petermason_get_file_url('plugins/contact-form-7/contact-form-7.css'), array(), null );
	}
}
	
// Merge custom styles
if ( !function_exists( 'petermason_cf7_merge_styles' ) ) {
	
	function petermason_cf7_merge_styles($list) {
		$list[] = 'plugins/contact-form-7/contact-form-7.css';
		return $list;
	}
}
?>