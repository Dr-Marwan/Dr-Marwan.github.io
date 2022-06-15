<?php
/**
 * The template to display default site header
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0
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

?><header class="top_panel top_panel_default<?php
					echo !empty($petermason_header_image) || !empty($petermason_header_video) ? ' with_bg_image' : ' without_bg_image';
					if ($petermason_header_video!='') echo ' with_bg_video';
					if ($petermason_header_image!='') echo ' '.esc_attr(petermason_add_inline_style('background-image: url('.esc_url($petermason_header_image).');'));
					if (is_single() && has_post_thumbnail()) echo ' with_featured_image';
					if (petermason_is_on(petermason_get_theme_option('header_fullheight'))) echo ' header_fullheight trx-stretch-height';
					?> scheme_<?php echo esc_attr(petermason_is_inherit(petermason_get_theme_option('header_scheme')) 
													? petermason_get_theme_option('color_scheme') 
													: petermason_get_theme_option('header_scheme'));
					?>"><?php
	
	// Main menu
	if (petermason_get_theme_option("menu_style") == 'top') {
		get_template_part( 'templates/header-navi' );
	}

	// Page title and breadcrumbs area
	get_template_part( 'templates/header-title');

	// Header widgets area
	get_template_part( 'templates/header-widgets' );

	// Header for single posts
	

?></header>