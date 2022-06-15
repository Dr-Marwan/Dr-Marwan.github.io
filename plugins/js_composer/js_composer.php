<?php
/* WPBakery Page Builder support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('petermason_vc_theme_setup9')) {
	add_action( 'after_setup_theme', 'petermason_vc_theme_setup9', 9 );
	function petermason_vc_theme_setup9() {
		if (petermason_exists_visual_composer()) {
			add_action( 'wp_enqueue_scripts', 								'petermason_vc_frontend_scripts', 1100 );
			add_filter( 'petermason_filter_merge_styles',						'petermason_vc_merge_styles' );
			add_filter( 'petermason_filter_merge_scripts',						'petermason_vc_merge_scripts' );
			add_filter( 'petermason_filter_get_css',							'petermason_vc_get_css', 10, 4 );
	
			// Add/Remove params in the standard VC shortcodes
			//-----------------------------------------------------
			add_filter( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,					'petermason_vc_add_params_classes', 10, 3 );
			
			// Color scheme
			$scheme = array(
				"param_name" => "scheme",
				"heading" => esc_html__("Color scheme", 'petermason'),
				"description" => wp_kses_data( __("Select color scheme to decorate this block", 'petermason') ),
				"group" => esc_html__('Colors', 'petermason'),
				"admin_label" => true,
				"value" => array_flip(petermason_get_list_schemes(true)),
				"type" => "dropdown"
			);
			vc_add_param("vc_row", $scheme);
			vc_add_param("vc_row_inner", $scheme);
			vc_add_param("vc_column", $scheme);
			vc_add_param("vc_column_inner", $scheme);
			vc_add_param("vc_column_text", $scheme);
			
			// Alter height and hide on mobile for Empty Space
			vc_add_param("vc_empty_space", array(
				"param_name" => "alter_height",
				"heading" => esc_html__("Alter height", 'petermason'),
				"description" => wp_kses_data( __("Select alternative height instead value from the field above", 'petermason') ),
				"admin_label" => true,
				"value" => array(
					esc_html__('Tiny', 'petermason') => 'tiny',
					esc_html__('Small', 'petermason') => 'small',
					esc_html__('Medium', 'petermason') => 'medium',
					esc_html__('Large', 'petermason') => 'large',
					esc_html__('Huge', 'petermason') => 'huge',
					esc_html__('From the value above', 'petermason') => 'none'
				),
				"type" => "dropdown"
			));
			vc_add_param("vc_empty_space", array(
				"param_name" => "hide_on_mobile",
				"heading" => esc_html__("Hide on mobile", 'petermason'),
				"description" => wp_kses_data( __("Hide this block on the mobile devices, when the columns are arranged one under another", 'petermason') ),
				"admin_label" => true,
				"std" => 0,
				"value" => array(
					esc_html__("Hide on mobile", 'petermason') => "1",
					esc_html__("Hide on notebook", 'petermason') => "2" 
					),
				"type" => "checkbox"
			));
			
			// Add Narrow style to the Progress bars
			vc_add_param("vc_progress_bar", array(
				"param_name" => "narrow",
				"heading" => esc_html__("Narrow", 'petermason'),
				"description" => wp_kses_data( __("Use narrow style for the progress bar", 'petermason') ),
				"std" => 0,
				"value" => array(esc_html__("Narrow style", 'petermason') => "1" ),
				"type" => "checkbox"
			));
			
			// Add param 'Closeable' to the Message Box
			vc_add_param("vc_message", array(
				"param_name" => "closeable",
				"heading" => esc_html__("Closeable", 'petermason'),
				"description" => wp_kses_data( __("Add 'Close' button to the message box", 'petermason') ),
				"std" => 0,
				"value" => array(esc_html__("Closeable", 'petermason') => "1" ),
				"type" => "checkbox"
			));
		}
		if (is_admin()) {
			add_filter( 'petermason_filter_tgmpa_required_plugins',		'petermason_vc_tgmpa_required_plugins' );
			add_filter( 'vc_iconpicker-type-fontawesome',				'petermason_vc_iconpicker_type_fontawesome' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'petermason_vc_tgmpa_required_plugins' ) ) {
	
	function petermason_vc_tgmpa_required_plugins($list=array()) {
		if (in_array('js_composer', petermason_storage_get('required_plugins'))) {
			$path = petermason_get_file_dir('plugins/js_composer/js_composer.zip');
			$list[] = array(
					'name' 		=> esc_html__('WPBakery Page Builder', 'petermason'),
					'slug' 		=> 'js_composer',
					'source'	=> !empty($path) ? $path : 'upload://js_composer.zip',
					'version'  => '5.5.2',
					'required' 	=> false
			);
		}
		return $list;
	}
}

// Check if WPBakery Page Builder installed and activated
if ( !function_exists( 'petermason_exists_visual_composer' ) ) {
	function petermason_exists_visual_composer() {
		return class_exists('Vc_Manager');
	}
}

// Check if WPBakery Page Builder in frontend editor mode
if ( !function_exists( 'petermason_vc_is_frontend' ) ) {
	function petermason_vc_is_frontend() {
		return (isset($_GET['vc_editable']) && $_GET['vc_editable']=='true')
			|| (isset($_GET['vc_action']) && $_GET['vc_action']=='vc_inline');
		
	}
}
	
// Enqueue VC custom styles
if ( !function_exists( 'petermason_vc_frontend_scripts' ) ) {
	
	function petermason_vc_frontend_scripts() {
		if (petermason_exists_visual_composer()) {
			if (petermason_is_on(petermason_get_theme_option('debug_mode')) && file_exists(petermason_get_file_dir('plugins/js_composer/js_composer.css')))
				wp_enqueue_style( 'petermason-js-composer',  petermason_get_file_url('plugins/js_composer/js_composer.css'), array(), null );
			if (petermason_is_on(petermason_get_theme_option('debug_mode')) && file_exists(petermason_get_file_dir('plugins/js_composer/js_composer.js')))
				wp_enqueue_script( 'petermason-js-composer', petermason_get_file_url('plugins/js_composer/js_composer.js'), array('jquery'), null, true );
		}
	}
}
	
// Merge custom styles
if ( !function_exists( 'petermason_vc_merge_styles' ) ) {
	
	function petermason_vc_merge_styles($list) {
		$list[] = 'plugins/js_composer/js_composer.css';
		return $list;
	}
}
	
// Merge custom scripts
if ( !function_exists( 'petermason_vc_merge_scripts' ) ) {
	
	function petermason_vc_merge_scripts($list) {
		$list[] = 'plugins/js_composer/js_composer.js';
		return $list;
	}
}
	
// Add theme icons into VC iconpicker list
if ( !function_exists( 'petermason_vc_iconpicker_type_fontawesome' ) ) {
	
	function petermason_vc_iconpicker_type_fontawesome($icons) {
		$list = petermason_get_list_icons();
		if (!is_array($list) || count($list) == 0) return $icons;
		$rez = array();
		foreach ($list as $icon)
			$rez[] = array($icon => str_replace('icon-', '', $icon));
		return array_merge( $icons, array(esc_html__('Theme Icons', 'petermason') => $rez) );
	}
}



// Shortcodes
//------------------------------------------------------------------------

// Add params to the standard VC shortcodes
if ( !function_exists( 'petermason_vc_add_params_classes' ) ) {
	
	function petermason_vc_add_params_classes($classes, $sc, $atts) {
		if (in_array($sc, array('vc_row', 'vc_row_inner', 'vc_column', 'vc_column_inner', 'vc_column_text'))) {
			if (!empty($atts['scheme']) && !petermason_is_inherit($atts['scheme']))
				$classes .= ($classes ? ' ' : '') . 'scheme_' . $atts['scheme'];
		} else if (in_array($sc, array('vc_empty_space'))) {
			if (!empty($atts['alter_height']) && !petermason_is_off($atts['alter_height']))
				$classes .= ($classes ? ' ' : '') . 'height_' . $atts['alter_height'];
			if (!empty($atts['hide_on_mobile'])) {
				if (strpos($atts['hide_on_mobile'], '1')!==false)	$classes .= ($classes ? ' ' : '') . 'hide_on_mobile';
				if (strpos($atts['hide_on_mobile'], '2')!==false)	$classes .= ($classes ? ' ' : '') . 'hide_on_notebook';
			}
		} else if (in_array($sc, array('vc_progress_bar'))) {
			if (!empty($atts['narrow']) && (int) $atts['narrow']==1)
				$classes .= ($classes ? ' ' : '') . 'vc_progress_bar_narrow';
		} else if (in_array($sc, array('vc_message'))) {
			if (!empty($atts['closeable']) && (int) $atts['closeable']==1)
				$classes .= ($classes ? ' ' : '') . 'vc_message_box_closeable';
		}
		return $classes;
	}
}


// Add VC specific styles into color scheme
//------------------------------------------------------------------------

// Add styles into CSS
if ( !function_exists( 'petermason_vc_get_css' ) ) {
	
	function petermason_vc_get_css($css, $colors, $fonts, $scheme='') {
		if (isset($css['fonts']) && $fonts) {
			$css['fonts'] .= <<<CSS
.vc_tta.vc_tta-accordion .vc_tta-panel-title .vc_tta-title-text {
	{$fonts['p_font-family']}
}
.vc_progress_bar.vc_progress_bar_narrow .vc_single_bar .vc_label .vc_label_units {
	{$fonts['info_font-family']}
}

.vc_tta[class*="vc_tta-color-"].vc_tta-style-modern .vc_tta-tabs-container .vc_tta-tab a .vc_tta-title-text{
	{$fonts['h1_font-family']}
}

CSS;
		}

		if (isset($css['colors']) && $colors) {
			$css['colors'] .= <<<CSS

/* Row and columns */
.scheme_self.wpb_row,
.scheme_self.wpb_column > .vc_column-inner > .wpb_wrapper,
.scheme_self.wpb_text_column {
	color: {$colors['text']};
	background-color: {$colors['bg_color']};
}
.scheme_self.vc_row.vc_parallax[class*="scheme_"] .vc_parallax-inner:before {
	background-color: {$colors['bg_color_08']};
}

/* Accordion */
.vc_tta.vc_tta-accordion .vc_tta-panel-heading .vc_tta-controls-icon {
	color: {$colors['inverse_text']};
	background-color: {$colors['text_dark']};
}
.vc_tta.vc_tta-accordion .vc_tta-panel-heading .vc_tta-controls-icon:before,
.vc_tta.vc_tta-accordion .vc_tta-panel-heading .vc_tta-controls-icon:after {
	border-color: {$colors['inverse_text']};
}
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title > a {
	color: {$colors['text_dark']};
}
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title > a,
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title > a:hover {
	color: {$colors['text_link']};
}
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title > a .vc_tta-controls-icon,
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title > a:hover .vc_tta-controls-icon {
	color: {$colors['inverse_text']};
	background-color: {$colors['text_link']};
}
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title > a .vc_tta-controls-icon:before,
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title > a .vc_tta-controls-icon:after {
	border-color: {$colors['inverse_text']};
}

/* Tabs */
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tabs-list .vc_tta-tab > a {
	color: {$colors['text_hover']};
	border-color: {$colors['text_hover']};
	
	background-color: {$colors['text_hover']};
}
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tabs-list .vc_tta-tab > a:hover,
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tabs-list .vc_tta-tab.vc_active > a,
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tabs-list .vc_tta-tab > a:hover i,
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tabs-list .vc_tta-tab.vc_active > a i{
	color: {$colors['inverse_dark']};
	
}

.vc_tta[class*="vc_tta-color-"].vc_tta-style-modern .vc_tta-tabs-container .vc_tta-tab a i:before {
	border-color: {$colors['text_hover']};
}
.vc_tta[class*="vc_tta-color-"].vc_tta-style-modern .vc_tta-tabs-container .vc_tta-tab:hover a i:before,
.vc_tta[class*="vc_tta-color-"].vc_tta-style-modern .vc_tta-tabs-container .vc_tta-tab.vc_active a i:before {
	border-color: {$colors['text_link']};
	background-color: {$colors['text_link']};
}
.vc_tta[class*="vc_tta-color-"].vc_tta-style-modern.vc_tta-tabs .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab:hover > a:before,
.vc_tta[class*="vc_tta-color-"].vc_tta-style-modern.vc_tta-tabs .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab.vc_active > a:before {
	
}

.vc_tta[class*="vc_tta-color-"].vc_tta-style-modern.vc_tta-tabs .vc_tta-tab.vc_active > a {
	color: {$colors['text_dark']};
}

.vc_tta[class*="vc_tta-color-"].vc_tta-style-modern .vc_tta-panel-title a i:before{
	border-color: {$colors['text_hover']};
}

.vc_tta[class*="vc_tta-color-"].vc_tta-style-modern .vc_tta-panel .vc_tta-panel-heading:hover .vc_tta-panel-title a i:before,
.vc_tta[class*="vc_tta-color-"].vc_tta-style-modern .vc_tta-panel.vc_active .vc_tta-panel-title a i:before{
	border-color: {$colors['text_dark']};
	background-color: {$colors['text_dark']};
}

/* Separator */
.vc_separator.vc_sep_color_grey .vc_sep_line {
	border-color: {$colors['bd_color']};
}

/* Progress bar */
.vc_progress_bar.vc_progress_bar_narrow .vc_single_bar {
	background-color: {$colors['alter_bg_color']};
}
.vc_progress_bar.vc_progress_bar_narrow.vc_progress-bar-color-bar_red .vc_single_bar .vc_bar {
	background-color: {$colors['alter_link']};
}
.vc_progress_bar.vc_progress_bar_narrow .vc_single_bar .vc_label {
	color: {$colors['text_dark']};
}
.vc_progress_bar.vc_progress_bar_narrow .vc_single_bar .vc_label .vc_label_units {
	color: {$colors['alter_light']};
}

CSS;
		}
		
		return $css;
	}
}
?>