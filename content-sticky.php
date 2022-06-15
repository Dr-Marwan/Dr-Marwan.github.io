<?php
/**
 * The Sticky template to display the sticky posts
 *
 * Used for index/archive
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0
 */

$petermason_columns = max(1, min(3, count(get_option( 'sticky_posts' ))));
$petermason_post_format = get_post_format();
$petermason_post_format = empty($petermason_post_format) ? 'standard' : str_replace('post-format-', '', $petermason_post_format);
$petermason_animation = petermason_get_theme_option('blog_animation');

?><div class="column-1_<?php echo esc_attr($petermason_columns); ?>"><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_sticky post_format_'.esc_attr($petermason_post_format) ); ?>
	<?php echo (!petermason_is_off($petermason_animation) ? ' data-animation="'.esc_attr(petermason_get_animation_classes($petermason_animation)).'"' : ''); ?>
	>

	<?php
	if ( is_sticky() && is_home() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	// Featured image
	petermason_show_post_featured(array(
		'thumb_size' => petermason_get_thumb_size($petermason_columns==1 ? 'big' : ($petermason_columns==2 ? 'med' : 'avatar'))
	));

	if ( !in_array($petermason_post_format, array('link', 'aside', 'status', 'quote')) ) {
		?>
		<div class="post_header entry-header">
			<?php
			// Post title
			the_title( sprintf( '<h6 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' );

			?><div class="post_content_inner"><?php
				if (has_excerpt()) {
					the_excerpt();
				} else if (strpos(get_the_content('!--more'), '!--more')!==false) {
					the_content( '' );
				} else if (in_array($petermason_post_format, array('link', 'aside', 'status', 'quote'))) {
					the_content();
				} else if (substr(get_the_content(), 0, 1)!='[') {
					the_excerpt();
				}
			?></div><?php			
			// Post meta
			petermason_show_post_meta(array(
				'categories' => true,
				'date' => true,
				'edit' => false,
				'seo' => false,
				'share' => false,
				'counters' => 'comments'	//comments,likes,views - comma separated in any combination
				)
			);
			?>
		</div><!-- .entry-header -->
		<?php
	}
	?>
</article></div>