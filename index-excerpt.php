<?php
/**
 * The template for homepage posts with "Excerpt" style
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0
 */

petermason_storage_set('blog_archive', true);

get_header(); 

if (have_posts()) {

	echo get_query_var('blog_archive_start');

	?><div class="posts_container"><?php
	
	$petermason_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$petermason_sticky_out = is_array($petermason_stickies) && count($petermason_stickies) > 0 && get_query_var( 'paged' ) < 1;
	if ($petermason_sticky_out) {
		?><div class="sticky_wrap columns_wrap"><?php	
	}
	while ( have_posts() ) { the_post(); 
		if ($petermason_sticky_out && !is_sticky()) {
			$petermason_sticky_out = false;
			?></div><?php
		}
		get_template_part( 'content', $petermason_sticky_out && is_sticky() ? 'sticky' : 'excerpt' );
	}
	if ($petermason_sticky_out) {
		$petermason_sticky_out = false;
		?></div><?php
	}
	
	?></div><?php

	petermason_show_pagination();

	echo get_query_var('blog_archive_end');

} else {

	if ( is_search() )
		get_template_part( 'content', 'none-search' );
	else
		get_template_part( 'content', 'none-archive' );

}

get_footer();
?>