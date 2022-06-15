<?php
/* Theme-specific action to configure ThemeREX Addons components
------------------------------------------------------------------------------- */

// Theme init priorities:
// 1 - register filters, that add/remove lists items for the Theme Options
if (!function_exists('petermason_trx_addons_theme_specific_setup')) {
	add_action( 'after_setup_theme', 'petermason_trx_addons_theme_specific_setup' );
	function petermason_trx_addons_theme_specific_setup() {
		if (petermason_exists_trx_addons()) {
			add_filter( 'trx_addons_filter_default_layouts',	'petermason_trx_addons_theme_specific_default_layouts');
			add_filter( 'trx_addons_sc_type', 				'petermason_specific_trx_addons_sc_type', 10, 2);
			add_filter( 'trx_addons_sc_title_style', 				'petermason_specific_trx_addons_sc_title_style', 10, 2);
			add_filter( 'trx_addons_sc_map', 				'petermason_specific_trx_addons_sc_map', 10, 2);
			
			if (is_admin()) {
				add_filter( 'tiny_mce_before_init', 'petermason_specific_trx_addons_editor_init', 11);
			}
		}
	}
}

// Add theme-specific layouts to the VC user's layouts
if (!function_exists('petermason_trx_addons_theme_specific_default_layouts')) {
	
	function petermason_trx_addons_theme_specific_default_layouts($default_layouts=array()) {
		require_once trailingslashit( get_template_directory() ) . 'theme-specific/trx_addons.layouts.php';
		return isset($layouts) && is_array($layouts) && count($layouts) > 0
						? array_merge($default_layouts, $layouts)
						: $default_layouts;
	}
}

// Add new types in the shortcodes
if ( !function_exists( 'petermason_specific_trx_addons_sc_type' ) ) {
	function petermason_specific_trx_addons_sc_type($list, $sc='') {
		if ($sc == 'trx_sc_button') {
			
			$list[esc_html__('Style 2', 'petermason')] = 'style_2';
		}
		if ($sc == 'trx_sc_action') {
			unset($list['Simple']);
			unset($list['Event']);
			$list[esc_html__('Modern', 'petermason')] = 'modern';
		}
		return $list;
	}
}
if ( !function_exists( 'petermason_specific_trx_addons_sc_title_style' ) ) {
	function petermason_specific_trx_addons_sc_title_style($list, $sc='') {
		if ($sc == 'trx_sc_title') {
			unset($list['Shadow']);
			$list[esc_html__('Style 2', 'petermason')] = 'style_2';
			$list[esc_html__('Style 3', 'petermason')] = 'style_3';
			$list[esc_html__('Style H1', 'petermason')] = 'style_h1';
		}		
		if ($sc == 'trx_sc_action') {
			unset($list['Shadow']);
			$list[esc_html__('Style 2', 'petermason')] = 'style_2';
			$list[esc_html__('Style 3', 'petermason')] = 'style_3';
			$list[esc_html__('Style H1', 'petermason')] = 'style_h1';
		}
		if ($sc == 'trx_sc_promo') {
			unset($list['Shadow']);
			$list[esc_html__('Style 2', 'petermason')] = 'style_2';
			$list[esc_html__('Style 3', 'petermason')] = 'style_3';
			$list[esc_html__('Style H1', 'petermason')] = 'style_h1';
		}
		return $list;
	}
}
// VC map
if ( !function_exists( 'petermason_specific_trx_addons_sc_map' ) ) {
	function petermason_specific_trx_addons_sc_map($params, $sc) {

		// Shortcode: Button
		if ($sc == 'trx_sc_button'){
			foreach($params["params"] as $k => $v) {
				if ($v["param_name"] == 'size') {
					unset($v["value"]['Small']);
					unset($v["value"]['Large']);
				}
				$params["params"][$k] = $v;
			}
		}
		return $params;
	}
}

// Remove some style from editor
if ( !function_exists( 'petermason_specific_trx_addons_editor_init' ) ) {
	function petermason_specific_trx_addons_editor_init($opt) {
		if (!empty($opt['style_formats'])) {
			$style_formats = json_decode($opt['style_formats'], true);
			if (is_array($style_formats) && count($style_formats)>0 ) {
						unset($style_formats[2]['items'][1]);
						unset($style_formats[2]['items'][1]);
						unset($style_formats[2]['items'][2]);
						unset($style_formats[2]['items'][3]);
						unset($style_formats[2]['items'][4]);
						unset($style_formats[2]['items'][5]);
						unset($style_formats[2]['items'][6]);
						unset($style_formats[2]['items'][7]);
						unset($style_formats[2]['items'][8]);
						unset($style_formats[2]['items'][9]);
						unset($style_formats[2]['items'][10]);
						unset($style_formats[2]['items'][11]);
						unset($style_formats[2]['items'][12]);
						unset($style_formats[2]['items'][13]);
						unset($style_formats[2]['items'][14]);
						unset($style_formats[2]['items'][15]);
						unset($style_formats[2]['items'][16]);

				$opt['style_formats'] = json_encode( $style_formats );		
			}
		}
		return $opt;
	}
}


/* ------------------------------------------ */
