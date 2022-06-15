<?php
/**
 * The Gallery template to display posts
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
$petermason_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_portfolio post_layout_gallery post_layout_gallery_'.esc_attr($petermason_columns).' post_format_'.esc_attr($petermason_post_format) ); ?>
	<?php echo (!petermason_is_off($petermason_animation) ? ' data-animation="'.esc_attr(petermason_get_animation_classes($petermason_animation)).'"' : ''); ?>
	data-size="<?php if (!empty($petermason_image[1]) && !empty($petermason_image[2])) echo intval($petermason_image[1]) .'x' . intval($petermason_image[2]); ?>"
	data-src="<?php if (!empty($petermason_image[0])) echo esc_url($petermason_image[0]); ?>"
	>

	<?php
	$petermason_image_hover = 'icon';	
	if (in_array($petermason_image_hover, array('icons', 'zoom'))) $petermason_image_hover = 'dots';
	// Featured image
	petermason_show_post_featured(array(
		'hover' => $petermason_image_hover,
		'thumb_size' => petermason_get_thumb_size( strpos(petermason_get_theme_option('body_style'), 'full')!==false || $petermason_columns < 3 ? 'masonry-big' : 'masonry' ),
		'thumb_only' => true,
		'show_no_image' => true,
		'post_info' => '<div class="post_details">'
							. '<h2 class="post_title"><a href="'.esc_url(get_permalink()).'">'. esc_html(get_the_title()) . '</a></h2>'
							. '<div class="post_description">'
								. petermason_show_post_meta(array(
									'categories' => true,
									'date' => true,
									'edit' => false,
									'seo' => false,
									'share' => true,
									'counters' => 'comments',
									'echo' => false
									))
								. '<div class="post_description_content">'
									. apply_filters('the_excerpt', get_the_excerpt())
								. '</div>'
								. '<a href="'.esc_url(get_permalink()).'" class="theme_button post_readmore"><span class="post_readmore_label">' . esc_html__('Learn more', 'petermason') . '</span></a>'
							. '</div>'
						. '</div>'
	));
	?>
</article>