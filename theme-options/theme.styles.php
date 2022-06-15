<?php
/**
 * Generate custom CSS
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0
 */


			
// Additional (calculated) theme-specific colors
// Attention! Don't forget setup custom colors also in the theme.customizer.color-scheme.js
if (!function_exists('petermason_customizer_add_theme_colors')) {
	function petermason_customizer_add_theme_colors($colors) {
		if (substr($colors['text'], 0, 1) == '#') {
			$colors['bg_color_0']  = petermason_hex2rgba( $colors['bg_color'], 0 );
			$colors['bg_color_009']  = petermason_hex2rgba( $colors['bg_color'], 0.09 );
			$colors['bg_color_02']  = petermason_hex2rgba( $colors['bg_color'], 0.2 );
			$colors['bg_color_07']  = petermason_hex2rgba( $colors['bg_color'], 0.7 );
			$colors['bg_color_08']  = petermason_hex2rgba( $colors['bg_color'], 0.8 );
			$colors['bg_color_09']  = petermason_hex2rgba( $colors['bg_color'], 0.9 );
			$colors['alter_bg_color_07']  = petermason_hex2rgba( $colors['alter_bg_color'], 0.7 );
			$colors['alter_bg_color_04']  = petermason_hex2rgba( $colors['alter_bg_color'], 0.4 );
			$colors['alter_bg_color_057']  = petermason_hex2rgba( $colors['alter_bg_color'], 0.57 );
			$colors['alter_bg_color_02']  = petermason_hex2rgba( $colors['alter_bg_color'], 0.2 );
			$colors['alter_bd_color_02']  = petermason_hex2rgba( $colors['alter_bd_color'], 0.2 );
			$colors['text_hover_01']  = petermason_hex2rgba( $colors['text_hover'], 0.1 );
			$colors['text_hover_02']  = petermason_hex2rgba( $colors['text_hover'], 0.2 );
			$colors['text_hover_03']  = petermason_hex2rgba( $colors['text_hover'], 0.3 );
			$colors['text_hover_05']  = petermason_hex2rgba( $colors['text_hover'], 0.5 );
			$colors['text_dark_07']  = petermason_hex2rgba( $colors['text_dark'], 0.7 );
			$colors['text_dark_09']  = petermason_hex2rgba( $colors['text_dark'], 0.9 );
			$colors['text_link_02']  = petermason_hex2rgba( $colors['text_link'], 0.2 );
			$colors['text_link_05']  = petermason_hex2rgba( $colors['text_link'], 0.5 );
			$colors['text_link_07']  = petermason_hex2rgba( $colors['text_link'], 0.7 );
			$colors['input_text_025']  = petermason_hex2rgba( $colors['input_text'], 0.25 );
			$colors['inverse_text_05']  = petermason_hex2rgba( $colors['inverse_text'], 0.5 );
			$colors['inverse_dark_05']  = petermason_hex2rgba( $colors['inverse_dark'], 0.5 );
		} else {
			$colors['bg_color_0'] = '{{ data.bg_color_0 }}';
			$colors['bg_color_009'] = '{{ data.bg_color_009 }}';
			$colors['bg_color_02'] = '{{ data.bg_color_02 }}';
			$colors['bg_color_07'] = '{{ data.bg_color_07 }}';
			$colors['bg_color_08'] = '{{ data.bg_color_08 }}';
			$colors['bg_color_09'] = '{{ data.bg_color_09 }}';
			$colors['alter_bg_color_07'] = '{{ data.alter_bg_color_07 }}';
			$colors['alter_bg_color_04'] = '{{ data.alter_bg_color_04 }}';
			$colors['alter_bg_color_057'] = '{{ data.alter_bg_color_057 }}';
			$colors['alter_bg_color_02'] = '{{ data.alter_bg_color_02 }}';
			$colors['alter_bd_color_02'] = '{{ data.alter_bd_color_02 }}';
			$colors['text_hover_01'] = '{{ data.text_hover_01 }}';
			$colors['text_hover_02'] = '{{ data.text_hover_02 }}';
			$colors['text_hover_03'] = '{{ data.text_hover_03 }}';
			$colors['text_hover_05'] = '{{ data.text_hover_05 }}';
			$colors['text_dark_07'] = '{{ data.text_dark_07 }}';
			$colors['text_dark_09'] = '{{ data.text_dark_09 }}';
			$colors['text_link_02'] = '{{ data.text_link_02 }}';
			$colors['text_link_05'] = '{{ data.text_link_05 }}';
			$colors['text_link_07'] = '{{ data.text_link_07 }}';
			$colors['input_text_025'] = '{{ data.input_text_025 }}';
			$colors['inverse_text_05'] = '{{ data.inverse_text_05 }}';
			$colors['inverse_dark_05'] = '{{ data.inverse_dark_05 }}';
		}
		return $colors;
	}
}


			
// Additional theme-specific fonts rules
// Attention! Don't forget setup fonts rules also in the theme.customizer.color-scheme.js
if (!function_exists('petermason_customizer_add_theme_fonts')) {
	function petermason_customizer_add_theme_fonts($fonts) {
		$rez = array();	
		foreach ($fonts as $tag => $font) {
			
			if (substr($font['font-family'], 0, 2) != '{{') {
				$rez[$tag.'_font-family'] 		= !empty($font['font-family']) && !petermason_is_inherit($font['font-family'])
														? 'font-family:' . trim($font['font-family']) . ';' 
														: '';
				$rez[$tag.'_font-size'] 		= !empty($font['font-size']) && !petermason_is_inherit($font['font-size'])
														? 'font-size:' . petermason_prepare_css_value($font['font-size']) . ";"
														: '';
				$rez[$tag.'_line-height'] 		= !empty($font['line-height']) && !petermason_is_inherit($font['line-height'])
														? 'line-height:' . trim($font['line-height']) . ";"
														: '';
				$rez[$tag.'_font-weight'] 		= !empty($font['font-weight']) && !petermason_is_inherit($font['font-weight'])
														? 'font-weight:' . trim($font['font-weight']) . ";"
														: '';
				$rez[$tag.'_font-style'] 		= !empty($font['font-style']) && !petermason_is_inherit($font['font-style'])
														? 'font-style:' . trim($font['font-style']) . ";"
														: '';
				$rez[$tag.'_text-decoration'] 	= !empty($font['text-decoration']) && !petermason_is_inherit($font['text-decoration'])
														? 'text-decoration:' . trim($font['text-decoration']) . ";"
														: '';
				$rez[$tag.'_text-transform'] 	= !empty($font['text-transform']) && !petermason_is_inherit($font['text-transform'])
														? 'text-transform:' . trim($font['text-transform']) . ";"
														: '';
				$rez[$tag.'_letter-spacing'] 	= !empty($font['letter-spacing']) && !petermason_is_inherit($font['letter-spacing'])
														? 'letter-spacing:' . trim($font['letter-spacing']) . ";"
														: '';
				$rez[$tag.'_margin-top'] 		= !empty($font['margin-top']) && !petermason_is_inherit($font['margin-top'])
														? 'margin-top:' . petermason_prepare_css_value($font['margin-top']) . ";"
														: '';
				$rez[$tag.'_margin-bottom'] 	= !empty($font['margin-bottom']) && !petermason_is_inherit($font['margin-bottom'])
														? 'margin-bottom:' . petermason_prepare_css_value($font['margin-bottom']) . ";"
														: '';
			} else {
				$rez[$tag.'_font-family']		= '{{ data["'.$tag.'_font-family"] }}';
				$rez[$tag.'_font-size']			= '{{ data["'.$tag.'_font-size"] }}';
				$rez[$tag.'_line-height']		= '{{ data["'.$tag.'_line-height"] }}';
				$rez[$tag.'_font-weight']		= '{{ data["'.$tag.'_font-weight"] }}';
				$rez[$tag.'_font-style']		= '{{ data["'.$tag.'_font-style"] }}';
				$rez[$tag.'_text-decoration']	= '{{ data["'.$tag.'_text-decoration"] }}';
				$rez[$tag.'_text-transform']	= '{{ data["'.$tag.'_text-transform"] }}';
				$rez[$tag.'_letter-spacing']	= '{{ data["'.$tag.'_letter-spacing"] }}';
				$rez[$tag.'_margin-top']		= '{{ data["'.$tag.'_margin-top"] }}';
				$rez[$tag.'_margin-bottom']		= '{{ data["'.$tag.'_margin-bottom"] }}';
			}
		}
		return $rez;
	}
}


// Return CSS with custom colors and fonts
if (!function_exists('petermason_customizer_get_css')) {

	function petermason_customizer_get_css($colors=null, $fonts=null, $remove_spaces=true, $only_scheme='') {

		$css = array(
			'fonts' => '',
			'colors' => ''
		);
		
		// Prepare fonts
		if ($fonts === null) {
			$fonts = petermason_get_theme_fonts();
		}
		
		if ($fonts) {

			// Make theme-specific fonts rules
			$fonts = petermason_customizer_add_theme_fonts($fonts);

			$rez = array();
			$rez['fonts'] = <<<CSS

body {
	{$fonts['p_font-family']}
	{$fonts['p_font-size']}
	{$fonts['p_font-weight']}
	{$fonts['p_font-style']}
	{$fonts['p_line-height']}
	{$fonts['p_text-decoration']}
	{$fonts['p_text-transform']}
	{$fonts['p_letter-spacing']}
}
p, ul, ol, dl, blockquote, address {
	{$fonts['p_margin-top']}
	{$fonts['p_margin-bottom']}
}

h1 {
	{$fonts['h1_font-family']}
	{$fonts['h1_font-size']}
	{$fonts['h1_font-weight']}
	{$fonts['h1_font-style']}
	{$fonts['h1_line-height']}
	{$fonts['h1_text-decoration']}
	{$fonts['h1_text-transform']}
	{$fonts['h1_letter-spacing']}
	{$fonts['h1_margin-top']}
	{$fonts['h1_margin-bottom']}
}
h2 {
	{$fonts['h2_font-family']}
	{$fonts['h2_font-size']}
	{$fonts['h2_font-weight']}
	{$fonts['h2_font-style']}
	{$fonts['h2_line-height']}
	{$fonts['h2_text-decoration']}
	{$fonts['h2_text-transform']}
	{$fonts['h2_letter-spacing']}
	{$fonts['h2_margin-top']}
	{$fonts['h2_margin-bottom']}
}
h3 {
	{$fonts['h3_font-family']}
	{$fonts['h3_font-size']}
	{$fonts['h3_font-weight']}
	{$fonts['h3_font-style']}
	{$fonts['h3_line-height']}
	{$fonts['h3_text-decoration']}
	{$fonts['h3_text-transform']}
	{$fonts['h3_letter-spacing']}
	{$fonts['h3_margin-top']}
	{$fonts['h3_margin-bottom']}
}
h4 {
	{$fonts['h4_font-family']}
	{$fonts['h4_font-size']}
	{$fonts['h4_font-weight']}
	{$fonts['h4_font-style']}
	{$fonts['h4_line-height']}
	{$fonts['h4_text-decoration']}
	{$fonts['h4_text-transform']}
	{$fonts['h4_letter-spacing']}
	{$fonts['h4_margin-top']}
	{$fonts['h4_margin-bottom']}
}
h5 {
	{$fonts['h5_font-family']}
	{$fonts['h5_font-size']}
	{$fonts['h5_font-weight']}
	{$fonts['h5_font-style']}
	{$fonts['h5_line-height']}
	{$fonts['h5_text-decoration']}
	{$fonts['h5_text-transform']}
	{$fonts['h5_letter-spacing']}
	{$fonts['h5_margin-top']}
	{$fonts['h5_margin-bottom']}
}
h6 {
	{$fonts['h6_font-family']}
	{$fonts['h6_font-size']}
	{$fonts['h6_font-weight']}
	{$fonts['h6_font-style']}
	{$fonts['h6_line-height']}
	{$fonts['h6_text-decoration']}
	{$fonts['h6_text-transform']}
	{$fonts['h6_letter-spacing']}
	{$fonts['h6_margin-top']}
	{$fonts['h6_margin-bottom']}
}

input[type="text"],
input[type="number"],
input[type="email"],
input[type="tel"],
input[type="search"],
input[type="password"],
textarea,
textarea.wp-editor-area,
.select_container,
select,
.select_container select {
	{$fonts['input_font-family']}
	{$fonts['input_font-size']}
	{$fonts['input_font-weight']}
	{$fonts['input_font-style']}
	{$fonts['input_line-height']}
	{$fonts['input_text-decoration']}
	{$fonts['input_text-transform']}
	{$fonts['input_letter-spacing']}
}

button,
input[type="button"],
input[type="reset"],
input[type="submit"],
.theme_button,
.gallery_preview_show .post_readmore,
.more-link,
.petermason_tabs .petermason_tabs_titles li a {
	{$fonts['button_font-family']}
	{$fonts['button_font-size']}
	{$fonts['button_font-weight']}
	{$fonts['button_font-style']}
	{$fonts['button_line-height']}
	{$fonts['button_text-decoration']}
	{$fonts['button_text-transform']}
	{$fonts['button_letter-spacing']}
}

.top_panel .slider_engine_revo .slide_title {
	{$fonts['h1_font-family']}
}

blockquote,
mark, ins,
.logo_text,
.post_price.price,
.theme_scroll_down {
	{$fonts['h5_font-family']}
}

.wp-block-tag-cloud a,
.sc_edd_details .downloads_page_tags .downloads_page_data > a,
.widget_product_tag_cloud a, .widget_tag_cloud a,
.post_meta {
	{$fonts['info_font-family']}
	{$fonts['info_font-size']}
	{$fonts['info_font-weight']}
	{$fonts['info_font-style']}
	{$fonts['info_line-height']}
	{$fonts['info_text-decoration']}
	{$fonts['info_text-transform']}
	{$fonts['info_letter-spacing']}
	{$fonts['info_margin-bottom']}
}

em, i,
.post-date, .rss-date 
.post_date, .post_meta_item, .post_counters_item,
.comments_list_wrap .comment_date,
.comments_list_wrap .comment_time,
.comments_list_wrap .comment_counters,
.top_panel .slider_engine_revo .slide_subtitle,
.logo_slogan,
fieldset legend,
figure figcaption,
.wp-caption .wp-caption-text,
.wp-caption .wp-caption-dd,
.wp-caption-overlay .wp-caption .wp-caption-text,
.wp-caption-overlay .wp-caption .wp-caption-dd,
.format-audio .post_featured .post_audio_author,
.post_item_single .post_content .post_meta,
.author_bio .author_link,
.comments_list_wrap .comment_posted,
.comments_list_wrap .comment_reply {
	{$fonts['info_font-family']}
}
.search_wrap .search_results .post_meta_item,
.search_wrap .search_results .post_counters_item {
	{$fonts['p_font-family']}
}

.logo_text {
	{$fonts['logo_font-family']}
	{$fonts['logo_font-size']}
	{$fonts['logo_font-weight']}
	{$fonts['logo_font-style']}
	{$fonts['logo_line-height']}
	{$fonts['logo_text-decoration']}
	{$fonts['logo_text-transform']}
	{$fonts['logo_letter-spacing']}
}
.logo_footer_text {
	{$fonts['logo_font-family']}
}

.menu_main_nav_area {
	{$fonts['menu_font-size']}
	{$fonts['menu_line-height']}
}
.menu_main_nav > li,
.menu_main_nav > li > a {
	{$fonts['menu_font-family']}
	{$fonts['menu_font-weight']}
	{$fonts['menu_font-style']}
	{$fonts['menu_text-decoration']}
	{$fonts['menu_text-transform']}
	{$fonts['menu_letter-spacing']}
}
.menu_main_nav > li ul,
.menu_main_nav > li ul > li,
.menu_main_nav > li ul > li > a {
	{$fonts['submenu_font-family']}
	{$fonts['submenu_font-size']}
	{$fonts['submenu_font-weight']}
	{$fonts['submenu_font-style']}
	{$fonts['submenu_line-height']}
	{$fonts['submenu_text-decoration']}
	{$fonts['submenu_text-transform']}
	{$fonts['submenu_letter-spacing']}
}
.menu_mobile .menu_mobile_nav_area > ul > li,
.menu_mobile .menu_mobile_nav_area > ul > li > a {
	{$fonts['menu_font-family']}
}
.menu_mobile .menu_mobile_nav_area > ul > li li,
.menu_mobile .menu_mobile_nav_area > ul > li li > a {
	{$fonts['submenu_font-family']}
}


/* Custom Headers */
.sc_layouts_row,
.sc_layouts_row input[type="text"] {
	{$fonts['menu_font-family']}
	{$fonts['menu_font-weight']}
	{$fonts['menu_font-style']}
	{$fonts['menu_line-height']}
}
.sc_layouts_row .sc_button_wrap .sc_button {
	{$fonts['button_font-family']}
	{$fonts['button_font-size']}
	{$fonts['button_font-weight']}
	{$fonts['button_font-style']}
	{$fonts['button_line-height']}
	{$fonts['button_text-decoration']}
	{$fonts['button_text-transform']}
}
.sc_layouts_menu_nav > li,
.sc_layouts_menu_nav > li > a {
	{$fonts['menu_font-family']}
	{$fonts['menu_font-size']}
	{$fonts['menu_font-weight']}
	{$fonts['menu_font-style']}
	{$fonts['menu_text-decoration']}
	{$fonts['menu_text-transform']}
	{$fonts['menu_letter-spacing']}
}
.sc_layouts_menu_nav > li ul,
.sc_layouts_menu_nav > li ul > li,
.sc_layouts_menu_nav > li ul > li > a {
	{$fonts['submenu_font-family']}
	{$fonts['submenu_font-size']}
	{$fonts['submenu_font-weight']}
	{$fonts['submenu_font-style']}
	{$fonts['submenu_line-height']}
	{$fonts['submenu_text-decoration']}
	{$fonts['submenu_text-transform']}
	{$fonts['submenu_letter-spacing']}
}

/* --- Theme fonts --- */
/* Butler */
.sticky .post_title,
blockquote:before,
.author_title,
.trx_addons_dropcap {
	{$fonts['h1_font-family']}
}

/* Raleway */
.custom_1 .eg-custom_skin_1-element-1 i.eg-icon-plus:before,
.sc_layouts_item_details {
	{$fonts['p_font-family']}
}

CSS;
			$rez = apply_filters('petermason_filter_get_css', $rez, false, $fonts, '');
			$css['fonts'] = $rez['fonts'];
		}

		if ($colors !== false) {
			$schemes = empty($only_scheme) ? array_keys(petermason_get_list_schemes()) : array($only_scheme);
	
			if (count($schemes) > 0) {
				$rez = array();
				foreach ($schemes as $scheme) {
					// Prepare colors
					if (empty($only_scheme)) $colors = petermason_get_scheme_colors($scheme);
	
					// Make theme-specific colors and tints
					$colors = petermason_customizer_add_theme_colors($colors);
			
					// Make styles
					$rez['colors'] = <<<CSS

/* Common tags */
h1, h2, h3, h4, h5, h6,
h1 a, h2 a, h3 a, h4 a, h5 a, h6 a,
li a {
	color: {$colors['text_dark']};
}
h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover{
	color: {$colors['text_link']};
}

dt, b, strong, em, mark, ins {	
	color: {$colors['text_dark']};
}
s, strike, del {	
	color: {$colors['text_light']};
}

code {
	
}
code a {
	color: {$colors['alter_link']};
}
code a:hover {
	color: {$colors['alter_hover']};
}

a {
	color: {$colors['text_link']};
}
a:hover,
article li a:hover  {
	color: {$colors['text_hover']};
}

blockquote {
	color: {$colors['text_dark']};
	background-color: {$colors['alter_bg_color']};
}
blockquote:before {
	color: {$colors['text_hover']};
}
blockquote a {
	color: {$colors['text_hover']};
}
blockquote a:hover {
	color: {$colors['text_link']};
}

table th, table th + th, table td + th  {
	border-color: {$colors['bg_color_02']};
}
body table.booked-calendar td,
table td, table th + td, table td + td {
	color: {$colors['alter_dark']};
	border-color: {$colors['bg_color']};
}
/*table > tbody > tr:first-child > td,*/
table th {
	color: {$colors['bg_color']};
	background-color: {$colors['text_dark']};
}
table th a {
	color: {$colors['inverse_dark']};
}
table tr th a:hover {
	color: {$colors['text_hover']};
}
/*table > thead + tbody > tr:first-child > td,*/
/*table > tbody > tr:nth-child(2n+1) > th,*/
table > tbody > tr:nth-child(2n+1) > td {
	background-color: {$colors['alter_bg_color_057']};
}
/*table > tbody > tr:nth-child(2n) > th,*/
table > tbody > tr:nth-child(2n) > td {
	background-color: {$colors['alter_bg_color']};
}
table th a:hover {
	color: {$colors['bg_color']};
}

hr {
	border-color: {$colors['alter_bd_color']};
}
figure figcaption,
.wp-caption .wp-caption-text,
.wp-caption .wp-caption-dd,
.wp-caption-overlay .wp-caption .wp-caption-text,
.wp-caption-overlay .wp-caption .wp-caption-dd {
	color: {$colors['input_text']};
	background-color: {$colors['alter_bg_color']};
}
ul > li:before {
	color: {$colors['text_hover']};
}


/* Form fields */

button[disabled],
input[type="submit"][disabled],
input[type="button"][disabled] {
    background-color: {$colors['text_light']} !important;
    color: {$colors['text']} !important;
}

fieldset {
	border-color: {$colors['bd_color']};
}
fieldset legend {
	color: {$colors['text_dark']};
	background-color: {$colors['bg_color']};
}
input[type="text"],
input[type="number"],
input[type="email"],
input[type="tel"],
input[type="search"],
input[type="password"],
.widget_search form,
.select_container,
.select_container:before,
.select2-container .select2-choice,
textarea,
textarea.wp-editor-area {
	color: {$colors['input_light']};
	border-color: {$colors['input_bd_color']};
	background-color: {$colors['input_bg_color']};
}
.select2-container--default .select2-selection--single{
	border-color: {$colors['input_bd_color']};
	background-color: {$colors['input_bg_color']};
}
.select_container select {
	color: {$colors['input_light']};
}
input[type="text"]:focus,
input[type="number"]:focus,
input[type="email"]:focus,
input[type="tel"]:focus,
input[type="search"]:focus,
input[type="password"]:focus,
.select_container:hover,
.select_container:before:hover,
select option:hover,
select option:focus,
.select2-container .select2-choice:hover,
textarea:focus,
textarea.wp-editor-area:focus {
	color: {$colors['input_dark']};
	border-color: {$colors['input_bd_hover']};
	background-color: {$colors['input_bg_hover']};
}
.select_container select:focus {
	color: {$colors['input_dark']};
	border-color: {$colors['input_bd_hover']};
}

.select_container:after {
	color: {$colors['input_light']};
}
.select_container:hover:after {
	color: {$colors['input_dark']};
}
.widget_search form:hover:after {
	color: {$colors['input_dark']};
}

.wp-block-search.wp-block-search__button-inside .wp-block-search__inside-wrapper .wp-block-search__input,
.widget_search input[type="search"],
.widget_search .search-field {
	border-color: {$colors['bg_color']};
    background-color: {$colors['bg_color']};
}
.wp-block-search input[type="search"]:focus,
.widget_search input[type="search"]:focus,
.wp-block-search.wp-block-search__button-inside .wp-block-search__inside-wrapper .wp-block-search__input:focus,
.widget_search input[type="search"]:focus,
.widget_search .search-field:focus {
	border-color: {$colors['text_hover']};
}

input::-webkit-input-placeholder,
textarea::-webkit-input-placeholder {
	color: {$colors['input_text']};
}
.wpcf7-form input[type="checkbox"] + span:before,
input[type="radio"] + label:before,
input[type="checkbox"] + label:before {
	border-color: {$colors['input_bd_color']};
	background-color: {$colors['input_bg_color']};
}
button,
input[type="reset"],
input[type="submit"],
input[type="button"] {
	background-color: {$colors['text_link']};
	color: {$colors['inverse_text']};
}
input[type="submit"]:hover,
input[type="reset"]:hover,
input[type="button"]:hover,
button:hover,
input[type="submit"]:focus,
input[type="reset"]:focus,
input[type="button"]:focus,
button:focus {
	background-color: {$colors['text_dark']};
	color: {$colors['bg_color']};
}
.wp-block-search__button:hover{
	border-color: {$colors['text_hover']};
	background-color: {$colors['text_hover']};
}
.wp-editor-container input[type="button"] {
	background-color: {$colors['alter_bg_color']};
	border-color: {$colors['alter_bd_color']};
	color: {$colors['alter_dark']};
	-webkit-box-shadow: 0 1px 0 0 {$colors['alter_bd_hover']};
	   -moz-box-shadow: 0 1px 0 0 {$colors['alter_bd_hover']};
			box-shadow: 0 1px 0 0 {$colors['alter_bd_hover']};	
}
.wp-editor-container input[type="button"]:hover,
.wp-editor-container input[type="button"]:focus {
	background-color: {$colors['alter_bg_hover']};
	border-color: {$colors['alter_bd_hover']};
	color: {$colors['alter_link']};
}

.select2-results {
	color: {$colors['input_text']};
	border-color: {$colors['input_bd_hover']};
	background: {$colors['input_bg_color']};
}
.select2-results .select2-highlighted {
	color: {$colors['input_dark']};
	background: {$colors['input_bg_hover']};
}


/* WP Standard classes */
.sticky {
	border-color: {$colors['bd_color']};
}
.sticky .label_sticky {
	border-top-color: {$colors['text_link']};
}
	

/* Page */
body {
	color: {$colors['text']};
	background-color: {$colors['bg_color']};
}
#page_preloader,
.scheme_self.header_position_under .page_content_wrap,
.page_wrap {
	background-color: {$colors['bg_color']};
}
.preloader_wrap > div {
	background-color: {$colors['text_link']};
}

/* Header
------------------------------------------------ */
.scheme_self.top_panel.with_bg_image:before {
	
}
.top_panel .slider_engine_revo .slide_subtitle {
	color: {$colors['text_link']};
}

.header_style_header-default .top_panel_default.without_bg_image .top_panel_title.sc_layouts_row,
.header_style_header-default .top_panel_default.without_bg_image .top_panel_navi{
	background-color: {$colors['text_dark']};
}
.header_style_header-default .top_panel_default.without_bg_image .top_panel_title.sc_layouts_row .post_meta .post_meta_item a:hover{
	color: {$colors['inverse_dark']};
}

/* Custom Headers
----------------------------------------- */

.sc_layouts_row_delimiter,
.scheme_self.sc_layouts_row_delimiter {
	border-color: {$colors['bg_color_009']};
}

.sc_layouts_item_icon {
	color: {$colors['accent1']};
}
.sc_layouts_item_details_line1 {
	color: {$colors['inverse_dark_05']};
}
.sc_layouts_item_details_line2 {
	color: {$colors['inverse_dark_05']};
}

.sc_layouts_row_fixed_on {
	background-color: {$colors['text_dark']};
}

[class*="sc_layouts_row_"] .sc_button_wrap .sc_button.sc_button_style_2 {
	border-color: {$colors['text_hover_03']};
}
[class*="sc_layouts_row_"] .sc_button_wrap .sc_button.sc_button_style_2:hover {
	border-color: {$colors['text_hover']};
}
header a[href*="mailto:"]:hover span[class*='sc_layouts_item_details_'],
header a[href*="tel:"]:hover span[class*='sc_layouts_item_details_'],
.sc_layouts_cart .sc_layouts_cart_details:hover .sc_layouts_cart_totals{
	color: {$colors['text_hover']};
}
.sc_layouts_cart_widget .sc_layouts_cart_widget_items + .sc_layouts_cart_widget_close + .widget_shopping_cart {
	border-color: {$colors['text_hover']};
}

/* Row type: Narrow */
.sc_layouts_row_type_narrow .sc_layouts_item,
.scheme_self.sc_layouts_row_type_narrow .sc_layouts_item {
	color: {$colors['text']};
}
.sc_layouts_row_type_narrow .sc_layouts_item a,
.scheme_self.sc_layouts_row_type_narrow .sc_layouts_item a {
	color: {$colors['text']};
}
.sc_layouts_row_type_narrow .sc_layouts_item a:hover,
.sc_layouts_row_type_narrow .sc_layouts_item a:hover .sc_layouts_item_icon,
.scheme_self.sc_layouts_row_type_narrow .sc_layouts_item a:hover,
.scheme_self.sc_layouts_row_type_narrow .sc_layouts_item a:hover .sc_layouts_item_icon {
	color: {$colors['text_dark']};
}
.sc_layouts_row_type_narrow .sc_layouts_item_icon,
.scheme_self.sc_layouts_row_type_narrow .sc_layouts_item_icon {
	color: {$colors['accent1']};
}
.sc_layouts_row_type_narrow .sc_layouts_item_details_line1,
.sc_layouts_row_type_narrow .sc_layouts_item_details_line2,
.scheme_self.sc_layouts_row_type_narrow .sc_layouts_item_details_line1,
.scheme_self.sc_layouts_row_type_narrow .sc_layouts_item_details_line2 {
	color: {$colors['text']};
}

.sc_layouts_row_type_narrow .socials_wrap .social_item a,
.scheme_self.sc_layouts_row_type_narrow .socials_wrap .social_item a {
	background-color: transparent;
	color: {$colors['text_link']};
}
.sc_layouts_row_type_narrow .socials_wrap .social_item a:hover,
.scheme_self.sc_layouts_row_type_narrow .socials_wrap .social_item a:hover {
	background-color: transparent;
	color: {$colors['text_hover']};
}

.sc_layouts_row_type_narrow .sc_button_wrap .sc_button,
.scheme_self.sc_layouts_row_type_narrow .sc_button_wrap .sc_button {
	background-color: transparent;
	
}
.sc_layouts_row_type_narrow .sc_button_wrap .sc_button:not(.sc_button_style_2):hover,
.scheme_self.sc_layouts_row_type_narrow .sc_button_wrap .sc_button:not(.sc_button_style_2):hover {
	background-color: transparent;
	border-color: {$colors['text_hover']};
	color: {$colors['text_hover']} !important;
}

.sc_layouts_row_type_narrow .search_wrap .search_submit,
.scheme_self.sc_layouts_row_type_narrow .search_wrap .search_submit {
	background-color: transparent;
	color: {$colors['text_link']};
}


/* Row type: Compact */
.sc_layouts_row_type_compact .sc_layouts_item,
.scheme_self.sc_layouts_row_type_compact .sc_layouts_item {
	color: {$colors['text']};
}
.sc_layouts_row_type_compact .sc_layouts_item a,
.scheme_self.sc_layouts_row_type_compact .sc_layouts_item a {
	color: {$colors['text']};
}
.sc_layouts_row_type_compact .sc_layouts_item a:hover,
.scheme_self.sc_layouts_row_type_compact .sc_layouts_item a:hover,
.sc_layouts_row_type_compact .sc_layouts_item a:hover .sc_layouts_item_icon,
.scheme_self.sc_layouts_row_type_compact .sc_layouts_item a:hover .sc_layouts_item_icon {
	color: {$colors['text_dark']};
}
.sc_layouts_row_type_compact .sc_layouts_item_icon,
.scheme_self.sc_layouts_row_type_compact .sc_layouts_item_icon {
	color: {$colors['text_link']};
}
.sc_layouts_row_type_compact .sc_layouts_item_details_line1,
.sc_layouts_row_type_compact .sc_layouts_item_details_line2,
.scheme_self.sc_layouts_row_type_compact .sc_layouts_item_details_line1,
.scheme_self.sc_layouts_row_type_compact .sc_layouts_item_details_line2 {
	color: {$colors['text']};
}

.sc_layouts_row_type_compact .socials_wrap .social_item a,
.scheme_self.sc_layouts_row_type_compact .socials_wrap .social_item a {
	background-color: transparent;
	color: {$colors['text_dark']};
}
.sc_layouts_row_type_compact .socials_wrap .social_item a:hover,
.scheme_self.sc_layouts_row_type_compact .socials_wrap .social_item a:hover {
	background-color: transparent;
	color: {$colors['text_hover']};
}

.sc_layouts_row_type_compact .search_wrap .search_submit,
.scheme_self.sc_layouts_row_type_compact .search_wrap .search_submit {
	background-color: transparent;
	color: {$colors['text_dark']};
}
.sc_layouts_row_type_compact .search_wrap .search_submit:hover,
.scheme_self.sc_layouts_row_type_compact .search_wrap .search_submit:hover {
	background-color: transparent;
	color: {$colors['text_hover']};
}
.sc_layouts_row_type_compact .search_wrap.search_style_normal .search_submit,
.scheme_self.sc_layouts_row_type_compact .search_wrap.search_style_normal .search_submit {
	color: {$colors['text_link']};
}
.sc_layouts_row_type_compact .search_wrap.search_style_normal .search_submit:hover,
.scheme_self.sc_layouts_row_type_compact .search_wrap.search_style_normal .search_submit:hover {
	color: {$colors['text_hover']};
}


/* Row type: Normal */
.sc_layouts_row_type_normal .sc_layouts_item,
.scheme_self.sc_layouts_row_type_normal .sc_layouts_item {
	color: {$colors['text']};
}
.sc_layouts_row_type_normal .sc_layouts_item a,
.scheme_self.sc_layouts_row_type_normal .sc_layouts_item a {
	color: {$colors['input_text']};
}
.sc_layouts_row_type_normal .sc_layouts_item a:hover,
.scheme_self.sc_layouts_row_type_normal .sc_layouts_item a:hover,
.sc_layouts_row_type_normal .sc_layouts_item a:hover .sc_layouts_item_icon,
.scheme_self.sc_layouts_row_type_normal .sc_layouts_item a:hover .sc_layouts_item_icon {
	color: {$colors['text_hover']};
}

.sc_layouts_row_type_normal .search_wrap .search_submit,
.scheme_self.sc_layouts_row_type_normal .search_wrap .search_submit {
	background-color: transparent;
	color: {$colors['input_light']};
}
.sc_layouts_row_type_normal .search_wrap .search_submit:hover,
.scheme_self.sc_layouts_row_type_normal .search_wrap .search_submit:hover {
	background-color: transparent;
	color: {$colors['text_hover']};
}

/* Menu */
.sc_layouts_menu_nav > li > a {
	color: {$colors['text_dark']};
}
.sc_layouts_menu_nav > li > a:hover,
.sc_layouts_menu_nav > li.sfHover > a,
.sc_layouts_menu_nav > li.current-menu-item > a,
.sc_layouts_menu_nav > li.current-menu-parent > a,
.sc_layouts_menu_nav > li.current-menu-ancestor > a {
	color: {$colors['text_hover']} !important;
}
.sc_layouts_menu_nav > li + li:before{
	color: {$colors['input_text_025']} !important;
}

/* Submenu */
.sc_layouts_menu_nav > li ul {
	background-color: {$colors['text_hover']};
}
.sc_layouts_menu_nav > li li > a {
	color: {$colors['alter_link']};
}
.sc_layouts_menu_nav > li li > a {
	color: {$colors['inverse_dark']} !important;
}
.sc_layouts_menu_nav > li li > a:hover,
.sc_layouts_menu_nav > li li.sfHover > a {
	color: {$colors['text_dark']} !important;
}
.sc_layouts_menu_nav > li li.current-menu-item > a,
.sc_layouts_menu_nav > li li.current-menu-parent > a,
.sc_layouts_menu_nav > li li.current-menu-ancestor > a {
	color: {$colors['text_link']} !important;
}
.sc_layouts_menu_nav > li li[class*="icon-"]:before {
	color: {$colors['alter_link']};
}
.sc_layouts_menu_nav > li li[class*="icon-"]:hover:before,
.sc_layouts_menu_nav > li li[class*="icon-"].shHover:before,
.sc_layouts_menu_nav > li li.current-menu-item:before,
.sc_layouts_menu_nav > li li.current-menu-parent:before,
.sc_layouts_menu_nav > li li.current-menu-ancestor:before {
	color: {$colors['alter_hover']};
}

/* Logo */
.sc_layouts_logo b {
	color: {$colors['text_dark']};
}
.sc_layouts_logo i {
	color: {$colors['text_link']};
}
.sc_layouts_logo_text {
	color: {$colors['text_link']};
}
.sc_layouts_logo:hover .logo_text {
	color: {$colors['text_hover']};
}
.logo_slogan {
	color: {$colors['text']};
}

/* Social items */
.socials_wrap .social_item a,
.socials_wrap .social_item a i {
	color: {$colors['text_light']};
}
.socials_wrap .social_item a:hover,
.socials_wrap .social_item a:hover i {
	color: {$colors['text_dark']};
}


/* Search style 'Expand' */
.search_style_expand.search_opened {
	background-color: {$colors['bg_color']};
	border-color: {$colors['bd_color']};
}
.search_style_expand.search_opened .search_submit {
	color: {$colors['text']};
}
.search_style_expand .search_submit:hover,
.search_style_expand .search_submit:focus {
	color: {$colors['text_dark']};
}


/* Search style 'Fullscreen' */
.search_style_fullscreen.search_opened .search_form_wrap {
	background-color: {$colors['bg_color_09']};
}
.search_style_fullscreen.search_opened .search_form {
	border-color: {$colors['text_dark']};
}
.search_style_fullscreen.search_opened .search_close,
.search_style_fullscreen.search_opened .search_field,
.search_style_fullscreen.search_opened .search_submit {
	color: {$colors['input_dark']};
}
.search_style_fullscreen.search_opened .search_close:hover,
.search_style_fullscreen.search_opened .search_field:hover,
.search_style_fullscreen.search_opened .search_field:focus,
.search_style_fullscreen.search_opened .search_submit:hover,
.search_style_fullscreen.search_opened .search_submit:focus {
	color: {$colors['input_text']};
}
.search_style_fullscreen.search_opened input::-webkit-input-placeholder {color:{$colors['input_light']}; opacity: 1;}
.search_style_fullscreen.search_opened input::-moz-placeholder          {color:{$colors['input_light']}; opacity: 1;}/* Firefox 19+ */
.search_style_fullscreen.search_opened input:-moz-placeholder           {color:{$colors['input_light']}; opacity: 1;}/* Firefox 18- */
.search_style_fullscreen.search_opened input:-ms-input-placeholder      {color:{$colors['input_light']}; opacity: 1;}

.menu_mobile .search_mobile input:hover,
.menu_mobile .search_mobile input:focus,
.menu_mobile .search_mobile input:active,
.menu_mobile .search_mobile input{ color:{$colors['input_light']}; opacity: 1;}


/* Search results */
.search_wrap .search_results {
	background-color: {$colors['bg_color']};
	border-color: {$colors['bd_color']};
}
.search_wrap .search_results:after {
	background-color: {$colors['bg_color']};
	border-left-color: {$colors['bd_color']};
	border-top-color: {$colors['bd_color']};
}
.search_wrap .search_results .search_results_close {
	color: {$colors['text_light']};
}
.search_wrap .search_results .search_results_close:hover {
	color: {$colors['text_dark']};
}
.search_results.widget_area .post_item + .post_item {
	border-top-color: {$colors['bd_color']};
}

.post_item_none_search .search_wrap .search_submit, 
.post_item_none_archive .search_wrap .search_submit {
	color: {$colors['text_dark']};
}
.post_item_none_search .search_wrap .search_submit:hover, 
.post_item_none_archive .search_wrap .search_submit:hover {
	color: {$colors['text_hover']};
}

/* Mobile menu */
.scheme_self.menu_side_wrap .menu_side_button {
	color: {$colors['alter_dark']};
	border-color: {$colors['alter_bd_color']};
	background-color: {$colors['alter_bg_color_07']};
}
.scheme_self.menu_side_wrap .menu_side_button:hover {
	color: {$colors['inverse_text']};
	border-color: {$colors['alter_hover']};
	background-color: {$colors['alter_link']};
}
.menu_side_inner,
.menu_mobile_inner {
	color: {$colors['alter_text']};
	background-color: {$colors['alter_bg_color']};
}
.menu_mobile_button {
	color: {$colors['text_dark']};
}
.menu_mobile_button:hover {
	color: {$colors['text_link']};
}
.menu_mobile_close:before,
.menu_mobile_close:after {
	border-color: {$colors['alter_dark']};
}
.menu_mobile_close:hover:before,
.menu_mobile_close:hover:after {
	border-color: {$colors['alter_link']};
}
.menu_mobile_inner a {
	color: {$colors['alter_dark']};
}
.menu_mobile_inner a:hover,
.menu_mobile_inner .current-menu-ancestor > a,
.menu_mobile_inner .current-menu-item > a {
	color: {$colors['text_hover']};
}
.menu_mobile_inner .search_mobile .search_submit {
	color: {$colors['input_light']};
}
.menu_mobile_inner .search_mobile .search_submit:focus,
.menu_mobile_inner .search_mobile .search_submit:hover {
	color: {$colors['input_dark']};
}

.menu_mobile_inner .social_item a {
	color: {$colors['text_hover']};
}
.menu_mobile_inner .social_item a:hover {
	color: {$colors['inverse_dark']};
}

/* Page title and breadcrumbs */
.sc_layouts_title .sc_layouts_title_caption{
	color: {$colors['text_hover']};
}
.sc_layouts_title .sc_layouts_title_meta {
	color: {$colors['text']};
}
.sc_layouts_title .sc_layouts_title_description {
	color: {$colors['alter_light']};
}
.sc_layouts_title_breadcrumbs {
	color: {$colors['alter_light']};
}
.sc_layouts_title_breadcrumbs a {
	color: {$colors['inverse_dark']} !important;
}
.sc_layouts_title_breadcrumbs a:hover {
	color: {$colors['text_hover']} !important;
}


/* Tabs */
.petermason_tabs .petermason_tabs_titles li a {
	color: {$colors['alter_dark']};
	background-color: {$colors['alter_bg_color']};
}
.petermason_tabs .petermason_tabs_titles li a:hover {
	color: {$colors['inverse_text']};
	background-color: {$colors['text_link']};
}
.petermason_tabs .petermason_tabs_titles li.ui-state-active a {
	color: {$colors['bg_color']};
	background-color: {$colors['text_dark']};
}

/* Post layouts */
.post_item {
	color: {$colors['text']};
}
.post_meta,
.post_meta_item,
.post_meta_item a,
.post_meta_item:before,
.post_meta_item:hover:before,
.post_date a,
.post_date:before,
.post_info .post_info_item,
.post_info .post_info_item a,
.post_info_counters .post_counters_item,
.post_counters .socials_share .socials_caption:before,
.post_counters .socials_share .socials_caption:hover:before {
	color: {$colors['text_hover']};
}
.post_date a:hover,
a.post_meta_item:hover,
.post_meta_item a:hover,
.post_info .post_info_item a:hover,
.post_info_counters .post_counters_item:hover {
	color: {$colors['text_link']};
}

.post_item .post_title a{
	color: {$colors['text_link']};
}

.post_item .post_title a:hover {
	color: {$colors['text_hover']};
}

.post_meta_item.post_categories,
.post_meta_item.post_categories a {
	color: {$colors['text_hover']};
}
.post_meta_item.post_categories a:hover {
	color: {$colors['text_link']};
}

.post_meta_item .socials_share .social_items {
	background-color: {$colors['bg_color']};
}
.post_meta_item .social_items,
.post_meta_item .social_items:before {
	background-color: {$colors['bg_color']};
	border-color: {$colors['bd_color']};
	color: {$colors['text_light']};
}

.post_layout_excerpt + .post_layout_excerpt {
	border-color: {$colors['bd_color']};
}
.post_layout_classic {
	border-color: {$colors['bd_color']};
}

.scheme_self.gallery_preview:before {
	background-color: {$colors['bg_color']};
}
.scheme_self.gallery_preview {
	color: {$colors['text']};
}

/* Post Formats */
.format-audio .post_featured .post_audio_author {
	color: {$colors['text_link']};
}
.format-audio .post_featured.without_thumb .post_audio {
	border-color: {$colors['bd_color']};
}
.without_thumb .mejs-controls .mejs-currenttime,
.without_thumb .mejs-controls .mejs-duration {
	color: {$colors['inverse_dark']};
}

.mejs-controls .mejs-button,
.mejs-controls .mejs-time-rail .mejs-time-current,
.mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current {
	color: {$colors['inverse_dark']};
	background: {$colors['text_hover']};
}
.mejs-fullscreen-button>button {
	color: {$colors['inverse_dark']};
}
.mejs-controls .mejs-button:hover {
	color: {$colors['bg_color']};
	background: {$colors['text_hover_05']};
}
.mejs-controls .mejs-time-rail .mejs-time-total,
.mejs-controls .mejs-time-rail .mejs-time-loaded,
.mejs-container .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-total {
	background: {$colors['text_hover_02']};
}

.post_layout_excerpt.post_format_audio .post_featured.without_thumb .post_audio{
	background-color: {$colors['text_dark']};
	border-color: {$colors['text_dark']};
}
.post_layout_excerpt.post_format_audio .post_audio .post_audio_author{
	color: {$colors['accent1']};
}
.post_layout_excerpt.post_format_audio .post_audio .post_audio_title{
	color: {$colors['inverse_dark']};
}

.format-aside .post_content_inner {
	color: {$colors['alter_dark']};
	background-color: {$colors['alter_bg_color']};
}

.format-link .post_content_inner,
.format-status .post_content_inner {
	color: {$colors['text_dark']};
}

.format-chat p > b,
.format-chat p > strong {
	color: {$colors['text_dark']};
}

.post_layout_chess .post_content_inner:after {
	background: linear-gradient(to top, {$colors['bg_color']} 0%, {$colors['bg_color_0']} 100%) no-repeat scroll right top / 100% 100% {$colors['bg_color_0']};
}
.post_layout_chess_1 .post_meta:before {
	background-color: {$colors['bd_color']};
}

/* Pagination */
.nav-links-old {
	color: {$colors['text_dark']};
}
.nav-links-old a:hover {
	color: {$colors['text_dark']};
	border-color: {$colors['text_dark']};
}

.page_links > a,
.comments_pagination .page-numbers,
.nav-links .page-numbers {
	color: {$colors['text_dark']};
}
.page_links > a:hover,
.page_links > span:not(.page_links_title),
.comments_pagination a.page-numbers:hover,
.comments_pagination .page-numbers.current,
.nav-links a.page-numbers:hover,
.nav-links .page-numbers.current {
	color: {$colors['inverse_dark']};
	background-color: {$colors['text_link']};
}

/* Single post */
.post_item_single .post_header .post_date {
	color: {$colors['text_light']};
}
.post_item_single .post_header .post_categories,
.post_item_single .post_header .post_categories a {
	color: {$colors['text_link']};
}
.post_item_single .post_header .post_meta_item,
.post_item_single .post_header .post_meta_item:before,
.post_item_single .post_header .post_meta_item:hover:before,
.post_item_single .post_header .post_meta_item a,
.post_item_single .post_header .post_meta_item a:before,
.post_item_single .post_header .post_meta_item a:hover:before,
.post_item_single .post_header .post_meta_item .socials_caption,
.post_item_single .post_header .post_meta_item .socials_caption:before,
.post_item_single .post_header .post_edit a {
	color: {$colors['text_hover']};
}
.post_item_single .post_meta_item:hover,
.post_item_single .post_meta_item > a:hover,
.post_item_single .post_meta_item .socials_caption:hover,
.post_item_single .post_edit a:hover {
	color: {$colors['text_link']};
}
.post_item_single .post_content .post_meta_label,
.post_item_single .post_content .post_meta_item:hover .post_meta_label {
	color: {$colors['accent1']};
}
.post_item_single .post_content .post_tags,
.post_item_single .post_content .post_tags a {
	color: {$colors['alter_link']};
}
.post_item_single .post_content .post_tags a:hover {
	color: {$colors['text_hover']};
}
.post_item_single .post_content .post_meta .post_share .social_item a {
	color: {$colors['text_hover']} !important;
	border-color: {$colors['text_hover']} !important;
}
.post_item_single .post_content .post_meta .post_share .social_item a:hover {
	color: {$colors['inverse_dark']} !important;
	background-color: {$colors['text_hover']} !important;
}

.post-password-form input[type="submit"] {
	border-color: {$colors['text_dark']};
}
.post-password-form input[type="submit"]:hover,
.post-password-form input[type="submit"]:focus {
	background-color: {$colors['text_hover']};
	border-color: {$colors['text_hover']};
}

/* Single post navi */
.nav-links-single .nav-links {
	border-color: {$colors['bd_color']};
}
.nav-links-single .nav-links a .meta-nav {
	color: {$colors['text_light']};
}
.nav-links-single .nav-links a .post_date {
	color: {$colors['text_light']};
}
.nav-links-single .nav-links a:hover .meta-nav,
.nav-links-single .nav-links a:hover .post_date {
	color: {$colors['text_dark']};
}
.nav-links-single .nav-links a:hover .post-title {
	color: {$colors['text_link']};
}

/* Author info */
.author_info {
	color: {$colors['text']};
	background-color: {$colors['bg_color']};
	border-color: {$colors['accent1']};
}
.author_info .author_title {
	color: {$colors['text_link']};
}
.author_info a {
	color: {$colors['text_dark']};
}
.author_info a:hover {
	color: {$colors['text_link']};
}

.scheme_self.author_info {
	color: {$colors['text']};
	background-color: {$colors['bg_color']};
	border-color: {$colors['accent1']};
}
.scheme_self.author_info .author_title {
	color: {$colors['text_link']};
}
.scheme_self.author_info a {
	color: {$colors['text_dark']};
}
.scheme_self.author_info a:hover {
	color: {$colors['text_link']};
}

.author_bio p > b {
	color: {$colors['accent1']};
}

.author_bio .author_link {
	color: {$colors['text_hover']};
}
.author_bio .author_link:hover {
	color: {$colors['text_link']};
}

/* Related posts */
.related_wrap {
	border-color: {$colors['bd_color']};
}
.related_wrap .related_item_style_1 .post_header {
	background-color: {$colors['bg_color_07']};
}
.related_wrap .related_item_style_1:hover .post_header {
	background-color: {$colors['bg_color']};
}
.related_wrap .related_item_style_1 .post_date a {
	color: {$colors['text']};
}
.related_wrap .related_item_style_1:hover .post_date a {
	color: {$colors['text_light']};
}
.related_wrap .related_item_style_1:hover .post_date a:hover {
	color: {$colors['text_dark']};
}

/* Comments */
.comments_list_wrap,
.comments_list_wrap > ul {
	border-color: {$colors['bd_color']};
}
.comments_list_wrap li + li,
.comments_list_wrap li ul {
	border-color: {$colors['bd_color']};
}
.comments_list_wrap .comment_info {
	color: {$colors['input_text']};
}
.comments_list_wrap .comment_counters a {
	color: {$colors['text_link']};
}
.comments_list_wrap .comment_counters a:before {
	color: {$colors['text_link']};
}
.comments_list_wrap .comment_counters a:hover:before,
.comments_list_wrap .comment_counters a:hover {
	color: {$colors['text_hover']};
}
.comments_list_wrap .comment_text {
	color: {$colors['text']};
}
.comments_list_wrap .comment_reply a {
	color: {$colors['text_hover']};
}
.comments_list_wrap .comment_reply a:hover {
	color: {$colors['text_link']};
}
.comments_form_wrap {
	border-color: {$colors['bd_color']};
}
.comments_wrap .comments_notes {
	color: {$colors['text_light']};
}

.comments_wrap .comments_field input:focus,
.comments_wrap .comments_field textarea:focus {
	border-color: {$colors['text_hover']};
}

.comments_wrap .comment + .comment-respond .comments_form_title small a:hover {
	color: {$colors['text_hover']};
}

/* Page 404 */
.post_item_404 .page_title {
	color: {$colors['text_light']};
}
.post_item_404 .page_description {
	color: {$colors['text_link']};
}
.post_item_404 .go_home {
	border-color: {$colors['text_dark']};
}

/* Sidebar */
.sidebar_inner {
	background-color: {$colors['alter_bg_color']};
	color: {$colors['alter_text']};
}
.sidebar_inner .widget + .widget {
	border-color: {$colors['alter_bd_color']};
}
.sidebar_inner h1, .sidebar_inner h2, .sidebar_inner h3, .sidebar_inner h4, .sidebar_inner h5, .sidebar_inner h6,
.sidebar_inner h1 a, .sidebar_inner h2 a, .sidebar_inner h3 a, .sidebar_inner h4 a, .sidebar_inner h5 a, .sidebar_inner h6 a {
	color: {$colors['text_dark']};
}
.sidebar_inner h1 a:hover, .sidebar_inner h2 a:hover, .sidebar_inner h3 a:hover, .sidebar_inner h4 a:hover, .sidebar_inner h5 a:hover, .sidebar_inner h6 a:hover {
	color: {$colors['alter_link']};
}


/* Widgets */
.widget {
	color: {$colors['text']};
}
.widget li:before {
	background-color: {$colors['text_hover']};
}
.widget a {
	color: {$colors['text_hover']};
}
.widget a:hover {
	color: {$colors['alter_hover']};
}
.widget li > a,
.widget .post_title > a {
	color: {$colors['text_dark']};
}
.widget li > a:hover,
.widget .post_title > a:hover {
	color: {$colors['text_hover']};
}

/* Archive */
.widget_archive li {
	color: {$colors['alter_dark']};
}

/* Calendar */
.wp-block-calendar th,
.widget_calendar th {
	color: {$colors['input_text']};
}

.wp-block-calendar caption,
.wp-block-calendar tbody td a,
.widget_calendar caption,
.widget_calendar tbody td a {
	color: {$colors['text_link']};
}
.wp-block-calendar tbody td,
.widget_calendar tbody td {
	color: {$colors['input_text']} !important;
}
.wp-block-calendar tbody td a:hover,
.widget_calendar tbody td a:hover {
	color: {$colors['text_hover']};
}
.wp-block-calendar tbody td a:after,
.widget_calendar tbody td a:after {
	background-color: {$colors['text_hover']};
}
.wp-block-calendar td#today,
.widget_calendar td#today {
	color: {$colors['inverse_dark']} !important;
}
.wp-block-calendar td#today a,
.widget_calendar td#today a {
	color: {$colors['inverse_link']};
}
.wp-block-calendar td#today a:hover,
.widget_calendar td#today a:hover {
	color: {$colors['inverse_hover']};
}
.wp-block-calendar td#today:before,
.widget_calendar td#today:before {
	background-color: {$colors['text_hover']};
}
.wp-block-calendar td#today a:after,
.widget_calendar td#today a:after {
	background-color: {$colors['inverse_link']};
}
.wp-block-calendar td#today a:hover:after,
.widget_calendar td#today a:hover:after {
	background-color: {$colors['inverse_hover']};
}
.wp-calendar-nav a,
.widget_calendar #prev a,
.widget_calendar #next a {
	color: {$colors['text_hover']};
}
.wp-calendar-nav a:hover,
.widget_calendar #prev a:hover,
.widget_calendar #next a:hover {
	color: {$colors['text_link']};
}
.wp-calendar-nav a:before,
.widget_calendar td#prev a:before,
.widget_calendar td#next a:before {
	background-color: {$colors['alter_bg_color']};
}

.content .wp-calendar-nav a::before{
	background-color: {$colors['bg_color']};
}

/* Categories */
.widget_categories li {
	color: {$colors['alter_dark']};
}

/* Tag cloud */
.wp-block-tag-cloud a,
.widget_product_tag_cloud a,
.widget_tag_cloud a {
	color: {$colors['alter_dark']};
	background-color: {$colors['alter_bd_color']};
}
.wp-block-tag-cloud a:hover,
.widget_product_tag_cloud a:hover,
.widget_tag_cloud a:hover {
	color: {$colors['inverse_dark']} !important;
	background-color: {$colors['alter_link']};
}

/* RSS */
.widget_rss .widget_title a:first-child {
	color: {$colors['alter_link']};
}
.widget_rss .widget_title a:first-child:hover {
	color: {$colors['alter_hover']};
}
.widget_rss .rss-date {
	color: {$colors['alter_light']};
}

/* Footer */
.scheme_self.footer_wrap {
	background-color: {$colors['alter_bg_color']};
	color: {$colors['alter_text']};
}
.scheme_self.footer_wrap .widget{
	background-color: {$colors['alter_bg_color']};
}
.scheme_self.footer_wrap .widget,
.scheme_self.footer_wrap .sc_content .wpb_column {
	border-color: {$colors['alter_bd_color']};
}
.scheme_self.footer_wrap h1, .scheme_self.footer_wrap h2, .scheme_self.footer_wrap h3, .scheme_self.footer_wrap h4, .scheme_self.footer_wrap h5, .scheme_self.footer_wrap h6,
.scheme_self.footer_wrap h1 a, .scheme_self.footer_wrap h2 a, .scheme_self.footer_wrap h3 a, .scheme_self.footer_wrap h4 a, .scheme_self.footer_wrap h5 a, .scheme_self.footer_wrap h6 a {
	color: {$colors['alter_dark']};
}
.scheme_self.footer_wrap h1 a:hover, .scheme_self.footer_wrap h2 a:hover, .scheme_self.footer_wrap h3 a:hover, .scheme_self.footer_wrap h4 a:hover, .scheme_self.footer_wrap h5 a:hover, .scheme_self.footer_wrap h6 a:hover {
	color: {$colors['alter_link']};
}
.scheme_self.footer_wrap a {
	color: {$colors['alter_dark']};
}
.scheme_self.footer_wrap a:hover {
	color: {$colors['alter_link']};
}
.footer_logo_inner {
	border-color: {$colors['alter_bd_color']};
}
.footer_logo_inner:after {
	background-color: {$colors['alter_text']};
}
.footer_socials_inner .social_item .social_icons {
	border-color: {$colors['alter_text']};
	color: {$colors['alter_text']};
}
.footer_socials_inner .social_item .social_icons:hover {
	border-color: {$colors['alter_dark']};
	color: {$colors['alter_dark']};
}
.menu_footer_nav_area ul li a {
	color: {$colors['alter_dark']};
}
.menu_footer_nav_area ul li a:hover {
	color: {$colors['alter_link']};
}
.menu_footer_nav_area ul li+li:before {
	border-color: {$colors['alter_light']};
}

.footer_copyright_inner {
	background-color: {$colors['bg_color']};
	border-color: {$colors['bd_color']};
	color: {$colors['text_dark']};
}
.footer_copyright_inner a {
	color: {$colors['text_dark']};
}
.footer_copyright_inner a:hover {
	color: {$colors['text_hover']};
}
.footer_copyright_inner .copyright_text {
	color: {$colors['text']};
}

/* Buttons */
.theme_button,
.more-link,
.socials_share:not(.socials_type_drop) .social_icons,
.comments_wrap .form-submit input[type="submit"] {
	color: {$colors['inverse_dark']};
	background-color: {$colors['text_hover']};
}
.theme_button:hover,
.more-link:hover,
.socials_share:not(.socials_type_drop) .social_icons:hover,
.comments_wrap .form-submit input[type="submit"]:hover,
.comments_wrap .form-submit input[type="submit"]:focus {
	color: {$colors['inverse_dark']};
}

.format-video .post_featured.with_thumb .post_video_hover {
	color: {$colors['inverse_dark']};
	background-color: {$colors['text_hover']};
}
.format-video .post_featured.with_thumb .post_video_hover:after {
	border-color: {$colors['text_hover']};
}

.theme_scroll_down:hover {
	color: {$colors['text_link']};
}

/* Third-party plugins */

.mfp-bg {
	background-color: {$colors['bg_color_07']};
}
.mfp-image-holder .mfp-close,
.mfp-iframe-holder .mfp-close {
	color: {$colors['text_dark']};
}
.mfp-image-holder .mfp-close:hover,
.mfp-iframe-holder .mfp-close:hover {
	color: {$colors['text_link']};
}
/* ESG */
.custom_1 .eg-custom_skin_1-element-1 i{
	color: {$colors['text_hover']};
}
.custom_1 .eg-custom_skin_1-element-1:hover i{
	color: {$colors['inverse_dark']};
}
.custom_1 .eg-custom_skin_1-element-1:after {
	border-color: {$colors['text_hover']};
}
.custom_1 .eg-custom_skin_1-element-1:hover:after {
	background-color: {$colors['text_hover']};
}

/* revolution slider */
.slider_1_big_text span {
	color: {$colors['text_hover']};
}

.tp-bullet {
	background-color: {$colors['text_hover_05']};
}
.tp-bullet:hover,
.tp-bullet.selected {
	background-color: {$colors['text_hover']};
}

/* Booked */
body table.booked-calendar thead tr:first-child th {
	background-color: {$colors['bg_color']} !important;
	border-color: {$colors['bg_color']} !important;
	color: {$colors['text_link']} !important;
}
body table.booked-calendar thead tr + tr th{
	background-color: {$colors['text_dark']} !important;
	border-color: {$colors['text_dark']} !important;
}

body table.booked-calendar td {
	border-color: {$colors['bg_color']} !important;
}

body table.booked-calendar > tbody > tr:nth-child(2n+1) > td {
	background-color: {$colors['alter_bg_color']} !important;
}

body table.booked-calendar > tbody > tr:nth-child(2n+0) > td {
    background-color: {$colors['alter_bg_color_057']} !important;
}

body table.booked-calendar td.prev-date .date span {
    color: {$colors['text_link']};
}
body table.booked-calendar td.prev-date .date:hover span {
    color: {$colors['text_hover']};
}

body table.booked-calendar td.prev-month .date span,
body table.booked-calendar td.next-month .date span{
    color: {$colors['text_link_05']};
}
body table.booked-calendar td.prev-month.prev-date .date:hover span,
body table.booked-calendar td.next-month.prev-date .date:hover span{
    color: {$colors['text_hover_03']};
}

body table.booked-calendar td.today .date span {
    border-color: {$colors['text_link']};
}
body table.booked-calendar td.today:hover .date span {
    color: {$colors['text_hover']} !important;
    border-color: {$colors['text_hover']};
}

body table.booked-calendar td .date {
	background-color: {$colors['text_hover_02']};
}




CSS;
				
					$rez = apply_filters('petermason_filter_get_css', $rez, $colors, false, $scheme);
					$css['colors'] .= $rez['colors'];
				}
			}
		}
				
		$css_str = (!empty($css['fonts']) ? $css['fonts'] : '')
				. (!empty($css['colors']) ? $css['colors'] : '');
		return apply_filters( 'petermason_filter_prepare_css', $css_str, $remove_spaces );
	}
}
?>