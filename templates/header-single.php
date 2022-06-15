<?php
/**
 * The template to display the featured image in the single post
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0
 */

if ( get_query_var('petermason_header_image')=='' && is_singular() && has_post_thumbnail() && in_array(get_post_type(), array('post', 'page')) )  {
	set_query_var('petermason_featured_showed', true);
	$petermason_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
	if (!empty($petermason_src[0])) {
		?><div class="post_featured post_featured_fullwide <?php echo esc_attr(petermason_add_inline_style('background-image:url('.esc_url($petermason_src[0]).');')); ?>"></div><?php
	}
}
?>