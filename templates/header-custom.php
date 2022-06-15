<?php
/**
 * The template to display custom header from the ThemeREX Addons Layouts
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0.06
 */

$petermason_header_css = $petermason_header_image = '';
$petermason_header_video = wp_is_mobile() ? '' : petermason_get_theme_option('header_video');
if (true || empty($petermason_header_video)) {
	$petermason_header_image = get_header_image();
	if (petermason_is_on(petermason_get_theme_option('header_image_override')) && apply_filters('petermason_filter_allow_override_header_image', true)) {
		if (is_category()) {
			if (($petermason_cat_img = petermason_get_category_image()) != '')
				$petermason_header_image = $petermason_cat_img;
		} else if (is_singular() || petermason_storage_isset('blog_archive')) {
			if (has_post_thumbnail()) {
				$petermason_header_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				if (is_array($petermason_header_image)) $petermason_header_image = $petermason_header_image[0];
			} else
				$petermason_header_image = '';
		}
	}
}

$petermason_header_id = str_replace('header-custom-', '', petermason_get_theme_option("header_style"));
if ((int) $petermason_header_id == 0) {
    $petermason_header_id = petermason_get_post_id(array(
            'name' => $petermason_header_id,
            'post_type' => defined('TRX_ADDONS_CPT_LAYOUTS_PT') ? TRX_ADDONS_CPT_LAYOUTS_PT : 'cpt_layouts'
        )
    );
} else {
    $petermason_header_id = apply_filters('trx_addons_filter_get_translated_layout', $petermason_header_id);
}

?><header class="top_panel top_panel_custom top_panel_custom_<?php echo esc_attr($petermason_header_id);
						echo !empty($petermason_header_image) || !empty($petermason_header_video) ? ' with_bg_image' : ' without_bg_image';
						if ($petermason_header_video!='') echo ' with_bg_video';
						if ($petermason_header_image!='') echo ' '.esc_attr(petermason_add_inline_style('background-image: url('.esc_url($petermason_header_image).');'));
						if (is_single() && has_post_thumbnail()) echo ' with_featured_image';
						if (petermason_is_on(petermason_get_theme_option('header_fullheight'))) echo ' header_fullheight trx-stretch-height';
						?> scheme_<?php echo esc_attr(petermason_is_inherit(petermason_get_theme_option('header_scheme')) 
														? petermason_get_theme_option('color_scheme') 
														: petermason_get_theme_option('header_scheme'));
						?>"><?php
		
	// Custom header's layout
	do_action('petermason_action_show_layout', $petermason_header_id);

	// Header widgets area
	get_template_part( 'templates/header-widgets' );

	// Header for single posts
	get_template_part( 'templates/header-single' );
		
?></header>