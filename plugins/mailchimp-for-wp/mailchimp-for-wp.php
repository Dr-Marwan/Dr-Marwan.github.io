<?php
/* Mail Chimp support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('petermason_mailchimp_theme_setup9')) {
	add_action( 'after_setup_theme', 'petermason_mailchimp_theme_setup9', 9 );
	function petermason_mailchimp_theme_setup9() {
		if (petermason_exists_mailchimp()) {
			add_action( 'wp_enqueue_scripts',							'petermason_mailchimp_frontend_scripts', 1100 );
			add_filter( 'petermason_filter_merge_styles',					'petermason_mailchimp_merge_styles');
			add_filter( 'petermason_filter_get_css',						'petermason_mailchimp_get_css', 10, 4);
		}
		if (is_admin()) {
			add_filter( 'petermason_filter_tgmpa_required_plugins',		'petermason_mailchimp_tgmpa_required_plugins' );
		}
	}
}

// Check if plugin installed and activated
if ( !function_exists( 'petermason_exists_mailchimp' ) ) {
	function petermason_exists_mailchimp() {
		return function_exists('__mc4wp_load_plugin') || defined('MC4WP_VERSION');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'petermason_mailchimp_tgmpa_required_plugins' ) ) {
	
	function petermason_mailchimp_tgmpa_required_plugins($list=array()) {
		if (in_array('mailchimp-for-wp', petermason_storage_get('required_plugins')))
			$list[] = array(
				'name' 		=> esc_html__('MailChimp for WP', 'petermason'),
				'slug' 		=> 'mailchimp-for-wp',
				'required' 	=> false
			);
		return $list;
	}
}



// Custom styles and scripts
//------------------------------------------------------------------------

// Enqueue custom styles
if ( !function_exists( 'petermason_mailchimp_frontend_scripts' ) ) {
	
	function petermason_mailchimp_frontend_scripts() {
		if (petermason_exists_mailchimp()) {
			if (petermason_is_on(petermason_get_theme_option('debug_mode')) && file_exists(petermason_get_file_dir('plugins/mailchimp-for-wp/mailchimp-for-wp.css')))
				wp_enqueue_style( 'petermason-mailchimp-for-wp',  petermason_get_file_url('plugins/mailchimp-for-wp/mailchimp-for-wp.css'), array(), null );
		}
	}
}
	
// Merge custom styles
if ( !function_exists( 'petermason_mailchimp_merge_styles' ) ) {
	
	function petermason_mailchimp_merge_styles($list) {
		$list[] = 'plugins/mailchimp-for-wp/mailchimp-for-wp.css';
		return $list;
	}
}

// Add css styles into global CSS stylesheet
if (!function_exists('petermason_mailchimp_get_css')) {
	
	function petermason_mailchimp_get_css($css, $colors, $fonts, $scheme='') {
		
		if (isset($css['fonts']) && $fonts) {
			$css['fonts'] .= <<<CSS

CSS;
		}
		
		if (isset($css['colors']) && $colors) {
			$css['colors'] .= <<<CSS

.mc4wp-form input[type="email"] {
	background-color: {$colors['alter_bg_hover']};
	border-color: {$colors['alter_bg_hover']};
	color: {$colors['input_light']};
}
.mc4wp-form input[type="email"]:focus {
	border-color: {$colors['text_hover']};
}
.mc4wp-form input[type="submit"] {
	background-color: {$colors['text_hover']};
	color: {$colors['inverse_dark']};
}
.mc4wp-form input[type="submit"]:hover {
	
}

CSS;
		}

		return $css;
	}
}
?>