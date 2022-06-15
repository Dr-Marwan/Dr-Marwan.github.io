<?php
/**
 * The template to display blog archive
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0
 */

/*
Template Name: Blog archive
*/

/**
 * Make page with this template and put it into menu
 * to display posts as blog archive
 * You can setup output parameters (blog style, posts per page, parent category, etc.)
 * in the Theme Options section (under the page content)
 * You can build this page in the WPBakery Page Builder to make custom page layout:
 * just insert %%CONTENT%% in the desired place of content
 */

// Get template page's content
$petermason_content = '';
$petermason_blog_archive_mask = '%%CONTENT%%';
$petermason_blog_archive_subst = sprintf('<div class="blog_archive">%s</div>', $petermason_blog_archive_mask);
if ( have_posts() ) {
	the_post(); 
	if (($petermason_content = apply_filters('the_content', get_the_content())) != '') {
		if (($petermason_pos = strpos($petermason_content, $petermason_blog_archive_mask)) !== false) {
			$petermason_content = preg_replace('/(\<p\>\s*)?'.$petermason_blog_archive_mask.'(\s*\<\/p\>)/i', $petermason_blog_archive_subst, $petermason_content);
		} else
			$petermason_content .= $petermason_blog_archive_subst;
		$petermason_content = explode($petermason_blog_archive_mask, $petermason_content);
	}
}

// Prepare args for a new query
$petermason_args = array(
	'post_status' => current_user_can('read_private_pages') && current_user_can('read_private_posts') ? array('publish', 'private') : 'publish'
);
$petermason_args = petermason_query_add_posts_and_cats($petermason_args, '', petermason_get_theme_option('post_type'), petermason_get_theme_option('parent_cat'));
$petermason_page_number = get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);
if ($petermason_page_number > 1) {
	$petermason_args['paged'] = $petermason_page_number;
	$petermason_args['ignore_sticky_posts'] = true;
}
$petermason_ppp = petermason_get_theme_option('posts_per_page');
if ((int) $petermason_ppp != 0)
	$petermason_args['posts_per_page'] = (int) $petermason_ppp;
// Make a new query
query_posts( $petermason_args );
// Set a new query as main WP Query
$GLOBALS['wp_the_query'] = $GLOBALS['wp_query'];

// Set query vars in the new query!
if (is_array($petermason_content) && count($petermason_content) == 2) {
	set_query_var('blog_archive_start', $petermason_content[0]);
	set_query_var('blog_archive_end', $petermason_content[1]);
}

get_template_part('index');
?>