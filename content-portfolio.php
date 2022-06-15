<?php
/**
 * The Portfolio template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0
 */

$petermason_blog_style = explode('_', petermason_get_theme_option('blog_style'));
$petermason_columns = empty($petermason_blog_style[1]) ? 2 : max(2, $petermason_blog_style[1]);
$petermason_post_format = get_post_format();
$petermason_post_format = empty($petermason_post_format) ? 'standard' : str_replace('post-format-', '', $petermason_post_format);
$petermason_animation = petermason_get_theme_option('blog_animation');

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_portfolio post_layout_portfolio_'.esc_attr($petermason_columns).' post_format_'.esc_attr($petermason_post_format) ); ?>
	<?php echo (!petermason_is_off($petermason_animation) ? ' data-animation="'.esc_attr(petermason_get_animation_classes($petermason_animation)).'"' : ''); ?>
	>

	<?php
	$petermason_image_hover = petermason_get_theme_option('image_hover');
	// Featured image
	petermason_show_post_featured(array(
		'thumb_size' => petermason_get_thumb_size(strpos(petermason_get_theme_option('body_style'), 'full')!==false || $petermason_columns < 3 ? 'masonry-big' : 'masonry'),
		'show_no_image' => true,
		'class' => $petermason_image_hover == 'dots' ? 'hover_with_info' : '',
		'post_info' => $petermason_image_hover == 'dots' ? '<div class="post_info">'.esc_html(get_the_title()).'</div>' : ''
	));
	?>
</article>