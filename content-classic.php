<?php
/**
 * The Classic template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0
 */

$petermason_blog_style = explode('_', petermason_get_theme_option('blog_style'));
$petermason_columns = empty($petermason_blog_style[1]) ? 2 : max(2, $petermason_blog_style[1]);
$petermason_expanded = !petermason_sidebar_present() && petermason_is_on(petermason_get_theme_option('expand_content'));
$petermason_post_format = get_post_format();
$petermason_post_format = empty($petermason_post_format) ? 'standard' : str_replace('post-format-', '', $petermason_post_format);
$petermason_animation = petermason_get_theme_option('blog_animation');

?><div class="column-1_<?php echo esc_attr($petermason_columns); ?>"><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_classic post_layout_classic_'.esc_attr($petermason_columns).' post_format_'.esc_attr($petermason_post_format) ); ?>
	<?php echo (!petermason_is_off($petermason_animation) ? ' data-animation="'.esc_attr(petermason_get_animation_classes($petermason_animation)).'"' : ''); ?>
	>

	<?php

	// Featured image
	petermason_show_post_featured( array( 'thumb_size' => petermason_get_thumb_size(
													strpos(petermason_get_theme_option('body_style'), 'full')!==false 
														? ( $petermason_columns > 2 ? 'big' : 'huge' )
														: (	$petermason_columns > 2
															? ($petermason_expanded ? 'med' : 'small')
															: ($petermason_expanded ? 'big' : 'med')
															)
														)
										) );

	if ( !in_array($petermason_post_format, array('link', 'aside', 'status', 'quote')) ) {
		?>
		<div class="post_header entry-header">
			<?php 
			do_action('petermason_action_before_post_title'); 

			// Post title
			the_title( sprintf( '<h4 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );

			do_action('petermason_action_before_post_meta'); 

			// Post meta
			petermason_show_post_meta(array(
				'categories' => true,
				'date' => true,
				'edit' => false,
				'seo' => false,
				'share' => false,
				'counters' => 'comments',
				)
			);
			?>
		</div><!-- .entry-header -->
		<?php
	}		
	?>

	<div class="post_content entry-content">
		<div class="post_content_inner">
			<?php
			$petermason_show_learn_more = false; 
			if (has_excerpt()) {
				the_excerpt();
			} else if (strpos(get_the_content('!--more'), '!--more')!==false) {
				the_content( '' );
			} else if (in_array($petermason_post_format, array('link', 'aside', 'status', 'quote'))) {
				the_content();
			} else if (substr(get_the_content(), 0, 1)!='[') {
				the_excerpt();
			}
			?>
		</div>
		<?php
		// Post meta
		if (in_array($petermason_post_format, array('link', 'aside', 'status', 'quote'))) {
			petermason_show_post_meta(array(
				'share' => false,
				'counters' => 'comments'
				)
			);
		}
		// More button
		if ( $petermason_show_learn_more ) {
			?><p><a class="more-link" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'petermason'); ?></a></p><?php
		}
		?>
	</div><!-- .entry-content -->

</article></div>