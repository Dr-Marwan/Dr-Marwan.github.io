<?php
/**
 * The template to display posts in widgets and/or in the search results
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0
 */

$petermason_post_id    = get_the_ID();
$petermason_post_date  = petermason_get_date();
$petermason_post_title = get_the_title();
$petermason_post_link  = get_permalink();
$petermason_post_author_id   = get_the_author_meta('ID');
$petermason_post_author_name = get_the_author_meta('display_name');
$petermason_post_author_url  = get_author_posts_url($petermason_post_author_id, '');

$petermason_args = get_query_var('petermason_args_widgets_posts');
$petermason_show_date = isset($petermason_args['show_date']) ? (int) $petermason_args['show_date'] : 1;
$petermason_show_image = isset($petermason_args['show_image']) ? (int) $petermason_args['show_image'] : 1;
$petermason_show_author = isset($petermason_args['show_author']) ? (int) $petermason_args['show_author'] : 1;
$petermason_show_counters = isset($petermason_args['show_counters']) ? (int) $petermason_args['show_counters'] : 1;
$petermason_show_categories = isset($petermason_args['show_categories']) ? (int) $petermason_args['show_categories'] : 1;

$petermason_output = petermason_storage_get('petermason_output_widgets_posts');

$petermason_post_counters_output = '';
if ( $petermason_show_counters ) {
	$petermason_post_counters_output = '<span class="post_info_item post_info_counters">'
								. petermason_get_post_counters('comments')
							. '</span>';
}


$petermason_output .= '<article class="post_item with_thumb">';

if ($petermason_show_image) {
	$petermason_post_thumb = get_the_post_thumbnail($petermason_post_id, petermason_get_thumb_size('tiny'), array(
		'alt' => the_title_attribute( array( 'echo' => false ) )
	));
	if ($petermason_post_thumb) $petermason_output .= '<div class="post_thumb">' . ($petermason_post_link ? '<a href="' . esc_url($petermason_post_link) . '">' : '') . ($petermason_post_thumb) . ($petermason_post_link ? '</a>' : '') . '</div>';
}

$petermason_output .= '<div class="post_content">'
			. ($petermason_show_categories 
					? '<div class="post_categories">'
						. petermason_get_post_categories()
						. $petermason_post_counters_output
						. '</div>' 
					: '')
			. '<h6 class="post_title">' . ($petermason_post_link ? '<a href="' . esc_url($petermason_post_link) . '">' : '') . ($petermason_post_title) . ($petermason_post_link ? '</a>' : '') . '</h6>'
			. apply_filters('petermason_filter_get_post_info', 
								'<div class="post_info">'
									. ($petermason_show_date 
										? '<span class="post_info_item post_info_posted">'
											. ($petermason_post_link ? '<a href="' . esc_url($petermason_post_link) . '" class="post_info_date">' : '') 
											. esc_html($petermason_post_date) 
											. ($petermason_post_link ? '</a>' : '')
											. '</span>'
										: '')
									. ($petermason_show_author 
										? '<span class="post_info_item post_info_posted_by">' 
											. esc_html__('by', 'petermason') . ' ' 
											. ($petermason_post_link ? '<a href="' . esc_url($petermason_post_author_url) . '" class="post_info_author">' : '') 
											. esc_html($petermason_post_author_name) 
											. ($petermason_post_link ? '</a>' : '') 
											. '</span>'
										: '')
									. (!$petermason_show_categories && $petermason_post_counters_output
										? $petermason_post_counters_output
										: '')
								. '</div>')
		. '</div>'
	. '</article>';
petermason_storage_set('petermason_output_widgets_posts', $petermason_output);
?>