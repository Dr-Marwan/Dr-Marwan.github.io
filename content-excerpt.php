<?php
/**
 * The default template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0
 */

$petermason_post_format = get_post_format();
$petermason_post_format = empty($petermason_post_format) ? 'standard' : str_replace('post-format-', '', $petermason_post_format);
$petermason_full_content = petermason_get_theme_option('blog_content') != 'excerpt' || in_array($petermason_post_format, array('link', 'aside', 'status', 'quote'));
$petermason_animation = petermason_get_theme_option('blog_animation');

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_excerpt post_format_'.esc_attr($petermason_post_format) ); ?>
	<?php echo (!petermason_is_off($petermason_animation) ? ' data-animation="'.esc_attr(petermason_get_animation_classes($petermason_animation)).'"' : ''); ?>
	><?php

	// Featured image
	petermason_show_post_featured(array( 'thumb_size' => petermason_get_thumb_size( strpos(petermason_get_theme_option('body_style'), 'full')!==false ? 'full' : 'big' ) ));

	// Title and post meta
	if (get_the_title() != '') {
		?>
		<div class="post_header entry-header">
			<?php
			do_action('petermason_action_before_post_title'); 

			// Post title
			the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );

			do_action('petermason_action_before_post_meta'); 

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
		</div><!-- .post_header --><?php
	}
	
	// Post content
	?><div class="post_content entry-content"><?php
		if ($petermason_full_content) {
			// Post content area
			?><div class="post_content_inner"><?php
				the_content( '' );
			?></div><?php
			// Inner pages
			wp_link_pages( array(
				'before'      => '<div class="page_links"><span class="page_links_title">' . esc_html__( 'Pages:', 'petermason' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'petermason' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

		} else {

			$petermason_show_learn_more = !in_array($petermason_post_format, array('link', 'aside', 'status', 'quote'));

			// Post content area
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
			// More button
			if ( $petermason_show_learn_more ) {
				?><p><a class="more-link" href="<?php the_permalink(); ?>"><?php esc_html_e('more info	', 'petermason'); ?></a></p><?php
			}

		}
	?></div><!-- .entry-content -->
</article>