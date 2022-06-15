<?php
/**
 * The template for homepage posts with "Portfolio" style
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0
 */

petermason_storage_set('blog_archive', true);

// Load scripts for both 'Gallery' and 'Portfolio' layouts!
wp_enqueue_script( 'classie', petermason_get_file_url('js/theme.gallery/classie.min.js'), array(), null, true );
wp_enqueue_script( 'imagesloaded', petermason_get_file_url('js/theme.gallery/imagesloaded.min.js'), array(), null, true );
wp_enqueue_script( 'masonry', petermason_get_file_url('js/theme.gallery/masonry.min.js'), array(), null, true );
wp_enqueue_script( 'petermason-gallery-script', petermason_get_file_url('js/theme.gallery/theme.gallery.js'), array(), null, true );

get_header(); 

if (have_posts()) {

	echo get_query_var('blog_archive_start');

	$petermason_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$petermason_sticky_out = is_array($petermason_stickies) && count($petermason_stickies) > 0 && get_query_var( 'paged' ) < 1;
	
	// Show filters
	$petermason_cat = petermason_get_theme_option('parent_cat');
	$petermason_post_type = petermason_get_theme_option('post_type');
	$petermason_taxonomy = petermason_get_post_type_taxonomy($petermason_post_type);
	$petermason_show_filters = petermason_get_theme_option('show_filters');
	$petermason_tabs = array();
	if (!petermason_is_off($petermason_show_filters)) {
		$petermason_args = array(
			'type'			=> $petermason_post_type,
			'child_of'		=> $petermason_cat,
			'orderby'		=> 'name',
			'order'			=> 'ASC',
			'hide_empty'	=> 1,
			'hierarchical'	=> 0,
			'exclude'		=> '',
			'include'		=> '',
			'number'		=> '',
			'taxonomy'		=> $petermason_taxonomy,
			'pad_counts'	=> false
		);
		$petermason_portfolio_list = get_terms($petermason_args);
		if (is_array($petermason_portfolio_list) && count($petermason_portfolio_list) > 0) {
			$petermason_tabs[$petermason_cat] = esc_html__('All', 'petermason');
			foreach ($petermason_portfolio_list as $petermason_term) {
				if (isset($petermason_term->term_id)) $petermason_tabs[$petermason_term->term_id] = $petermason_term->name;
			}
		}
	}
	if (count($petermason_tabs) > 0) {
		$petermason_portfolio_filters_ajax = true;
		$petermason_portfolio_filters_active = $petermason_cat;
		$petermason_portfolio_filters_id = 'portfolio_filters';
		if (!is_customize_preview())
			wp_enqueue_script('jquery-ui-tabs', false, array('jquery', 'jquery-ui-core'), null, true);
		?>
		<div class="portfolio_filters petermason_tabs petermason_tabs_ajax">
			<ul class="portfolio_titles petermason_tabs_titles">
				<?php
				foreach ($petermason_tabs as $petermason_id=>$petermason_title) {
					?><li><a href="<?php echo esc_url(petermason_get_hash_link(sprintf('#%s_%s_content', $petermason_portfolio_filters_id, $petermason_id))); ?>" data-tab="<?php echo esc_attr($petermason_id); ?>"><?php echo esc_html($petermason_title); ?></a></li><?php
				}
				?>
			</ul>
			<?php
			$petermason_ppp = petermason_get_theme_option('posts_per_page');
			if (petermason_is_inherit($petermason_ppp)) $petermason_ppp = '';
			foreach ($petermason_tabs as $petermason_id=>$petermason_title) {
				$petermason_portfolio_need_content = $petermason_id==$petermason_portfolio_filters_active || !$petermason_portfolio_filters_ajax;
				?>
				<div id="<?php echo esc_attr(sprintf('%s_%s_content', $petermason_portfolio_filters_id, $petermason_id)); ?>"
					class="portfolio_content petermason_tabs_content"
					data-blog-template="<?php echo esc_attr(petermason_storage_get('blog_template')); ?>"
					data-blog-style="<?php echo esc_attr(petermason_get_theme_option('blog_style')); ?>"
					data-posts-per-page="<?php echo esc_attr($petermason_ppp); ?>"
					data-post-type="<?php echo esc_attr($petermason_post_type); ?>"
					data-taxonomy="<?php echo esc_attr($petermason_taxonomy); ?>"
					data-cat="<?php echo esc_attr($petermason_id); ?>"
					data-parent-cat="<?php echo esc_attr($petermason_cat); ?>"
					data-need-content="<?php echo (false===$petermason_portfolio_need_content ? 'true' : 'false'); ?>"
				>
					<?php
					if ($petermason_portfolio_need_content) 
						petermason_show_portfolio_posts(array(
							'cat' => $petermason_id,
							'parent_cat' => $petermason_cat,
							'taxonomy' => $petermason_taxonomy,
							'post_type' => $petermason_post_type,
							'page' => 1,
							'sticky' => $petermason_sticky_out
							)
						);
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	} else {
		petermason_show_portfolio_posts(array(
			'cat' => $petermason_cat,
			'parent_cat' => $petermason_cat,
			'taxonomy' => $petermason_taxonomy,
			'post_type' => $petermason_post_type,
			'page' => 1,
			'sticky' => $petermason_sticky_out
			)
		);
	}

	echo get_query_var('blog_archive_end');

} else {

	if ( is_search() )
		get_template_part( 'content', 'none-search' );
	else
		get_template_part( 'content', 'none-archive' );

}

get_footer();
?>