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
$petermason_columns = empty($petermason_blog_style[1]) ? 1 : max(1, $petermason_blog_style[1]);
$petermason_expanded = !petermason_sidebar_present() && petermason_is_on(petermason_get_theme_option('expand_content'));
$petermason_post_format = get_post_format();
$petermason_post_format = empty($petermason_post_format) ? 'standard' : str_replace('post-format-', '', $petermason_post_format);
$petermason_animation = petermason_get_theme_option('blog_animation');

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_chess post_layout_chess_'.esc_attr($petermason_columns).' post_format_'.esc_attr($petermason_post_format) ); ?>
	<?php echo (!petermason_is_off($petermason_animation) ? ' data-animation="'.esc_attr(petermason_get_animation_classes($petermason_animation)).'"' : ''); ?>
	>

	<?php
	// Add anchor
	if ($petermason_columns == 1 && shortcode_exists('trx_sc_anchor')) {
		echo do_shortcode('[trx_sc_anchor id="post_'.esc_attr(get_the_ID()).'" title="'.the_title_attribute( array( 'echo' => false ) ).'"]');
	}

	// Featured image
	petermason_show_post_featured( array(
											'class' => $petermason_columns == 1 ? 'trx-stretch-height' : '',
											'show_no_image' => true,
											'thumb_bg' => true,
											'thumb_size' => petermason_get_thumb_size(
																	strpos(petermason_get_theme_option('body_style'), 'full')!==false
																		? ( $petermason_columns > 1 ? 'huge' : 'original' )
																		: (	$petermason_columns > 2 ? 'big' : 'huge')
																	)
											) 
										);

	?><div class="post_inner"><div class="post_inner_content"><?php 

		?><div class="post_header entry-header"><?php 
			do_action('petermason_action_before_post_title'); 

			// Post title
			the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
			
			do_action('petermason_action_before_post_meta'); 

			// Post meta
			$petermason_post_meta = petermason_show_post_meta(array(
									'categories' => true,
									'date' => true,
									'edit' => $petermason_columns == 1,
									'seo' => false,
									'share' => false,
									'counters' => $petermason_columns < 3 ? 'comments' : '',
									'echo' => false
									)
								);
			petermason_show_layout($petermason_post_meta);
		?></div><!-- .entry-header -->
	
		<div class="post_content entry-content">
			<div class="post_content_inner">
				<?php
				$petermason_show_learn_more = !in_array($petermason_post_format, array('link', 'aside', 'status', 'quote'));
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
				petermason_show_layout($petermason_post_meta);
			}
			// More button
			if ( $petermason_show_learn_more ) {
				?><p><a class="more-link" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'petermason'); ?></a></p><?php
			}
			?>
		</div><!-- .entry-content -->

	</div></div><!-- .post_inner -->

</article>