<?php
/**
 * The template to display the widgets area in the footer
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0.10
 */

// Footer sidebar
$petermason_footer_name = petermason_get_theme_option('footer_widgets');
$petermason_footer_present = !petermason_is_off($petermason_footer_name) && is_active_sidebar($petermason_footer_name);
if ($petermason_footer_present) { 
	petermason_storage_set('current_sidebar', 'footer');
	$petermason_footer_wide = petermason_get_theme_option('footer_wide');
	ob_start();
	if ( !dynamic_sidebar($petermason_footer_name) ) {
		// Put here html if user no set widgets in sidebar
	}
	$petermason_out = trim(ob_get_contents());
	ob_end_clean();
	if (trim(strip_tags($petermason_out)) != '') {
		$petermason_out = preg_replace("/<\\/aside>[\r\n\s]*<aside/", "</aside><aside", $petermason_out);
		$petermason_need_columns = true;	//or check: strpos($petermason_out, 'columns_wrap')===false;
		if ($petermason_need_columns) {
			$petermason_columns = max(0, (int) petermason_get_theme_option('footer_columns'));
			if ($petermason_columns == 0) $petermason_columns = min(6, max(1, substr_count($petermason_out, '<aside ')));
			if ($petermason_columns > 1)
				$petermason_out = preg_replace("/class=\"widget /", "class=\"column-1_".esc_attr($petermason_columns).' widget ', $petermason_out);
			else
				$petermason_need_columns = false;
		}
		?>
		<div class="footer_widgets_wrap widget_area<?php echo !empty($petermason_footer_wide) ? ' footer_fullwidth' : ''; ?>">
			<div class="footer_widgets_inner widget_area_inner">
				<?php 
				if (!$petermason_footer_wide) { 
					?><div class="content_wrap"><?php
				}
				if ($petermason_need_columns) {
					?><div class="columns_wrap"><?php
				}
				do_action( 'petermason_action_before_sidebar' );
				petermason_show_layout($petermason_out);
				do_action( 'petermason_action_after_sidebar' );
				if ($petermason_need_columns) {
					?></div><!-- /.columns_wrap --><?php
				}
				if (!$petermason_footer_wide) {
					?></div><!-- /.content_wrap --><?php
				}
				?>
			</div><!-- /.footer_widgets_inner -->
		</div><!-- /.footer_widgets_wrap -->
		<?php
	}
}
?>