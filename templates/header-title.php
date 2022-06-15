<?php
/**
 * The template to display the page title and breadcrumbs
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0
 */

// Page (category, tag, archive, author) title

if ( petermason_need_page_title() ) {
	set_query_var('petermason_title_showed', true);
	?>
	<div class="top_panel_title sc_layouts_row">
		<div class="content_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_center">
				<div class="sc_layouts_item">
					<div class="sc_layouts_title">
						<?php
						// Post meta on the single post
						
						
						// Blog/Post title
						?><div class="sc_layouts_title_title"><?php
							$petermason_blog_title = petermason_get_blog_title();
							$petermason_blog_title_text = $petermason_blog_title_class = $petermason_blog_title_link = $petermason_blog_title_link_text = '';
							if (is_array($petermason_blog_title)) {
								$petermason_blog_title_text = $petermason_blog_title['text'];
								$petermason_blog_title_class = !empty($petermason_blog_title['class']) ? ' '.$petermason_blog_title['class'] : '';
								$petermason_blog_title_link = !empty($petermason_blog_title['link']) ? $petermason_blog_title['link'] : '';
								$petermason_blog_title_link_text = !empty($petermason_blog_title['link_text']) ? $petermason_blog_title['link_text'] : '';
							} else
								$petermason_blog_title_text = $petermason_blog_title;
							?>
							<h1 class="sc_layouts_title_caption<?php echo esc_attr($petermason_blog_title_class); ?>"><?php
								$petermason_top_icon = petermason_get_category_icon();
								if (!empty($petermason_top_icon)) {
									$petermason_attr = petermason_getimagesize($petermason_top_icon);
									?><img src="<?php echo esc_url($petermason_top_icon); ?>" alt="<?php echo esc_attr(basename($petermason_top_icon)); ?>" <?php if (!empty($petermason_attr[3])) petermason_show_layout($petermason_attr[3]);?>><?php
								}
								echo wp_kses_post($petermason_blog_title_text);
							?></h1>
							<?php
							if (!empty($petermason_blog_title_link) && !empty($petermason_blog_title_link_text)) {
								?><a href="<?php echo esc_url($petermason_blog_title_link); ?>" class="theme_button theme_button_small sc_layouts_title_link"><?php echo esc_html($petermason_blog_title_link_text); ?></a><?php
							}
							
							// Category/Tag description
							if ( is_category() || is_tag() || is_tax() ) 
								the_archive_description( '<div class="sc_layouts_title_description">', '</div>' );
		
						?></div><?php
	
						// Breadcrumbs
						?><div class="sc_layouts_title_breadcrumbs"><?php
							do_action( 'petermason_action_breadcrumbs');
						?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>