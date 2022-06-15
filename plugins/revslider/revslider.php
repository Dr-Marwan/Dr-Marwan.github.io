<?php
/* Revolution Slider support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('petermason_revslider_theme_setup9')) {
	add_action( 'after_setup_theme', 'petermason_revslider_theme_setup9', 9 );
	function petermason_revslider_theme_setup9() {
		if (is_admin()) {
			add_filter( 'petermason_filter_tgmpa_required_plugins',	'petermason_revslider_tgmpa_required_plugins' );
		}
	}
}

// Check if RevSlider installed and activated
if ( !function_exists( 'petermason_exists_revslider' ) ) {
	function petermason_exists_revslider() {
		return function_exists('rev_slider_shortcode');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'petermason_revslider_tgmpa_required_plugins' ) ) {
	
	function petermason_revslider_tgmpa_required_plugins($list=array()) {
		if (in_array('revslider', petermason_storage_get('required_plugins'))) {
			$path = petermason_get_file_dir('plugins/revslider/revslider.zip');
			$list[] = array(
					'name' 		=> esc_html__('Revolution Slider', 'petermason'),
					'slug' 		=> 'revslider',
					'source'	=> !empty($path) ? $path : 'upload://revslider.zip',
					'version'  => '5.4.6.4',
					'required' 	=> false
			);
		}
		return $list;
	}
}
?>