<?php
/**
 * The template to display the widgets area in the header
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0
 */

// Header sidebar
$petermason_header_name = petermason_get_theme_option('header_widgets');
$petermason_header_present = !petermason_is_off($petermason_header_name) && is_active_sidebar($petermason_header_name);
if ($petermason_header_present) { 
	petermason_storage_set('current_sidebar', 'header');
	$petermason_header_wide = petermason_get_theme_option('header_wide');
	ob_start();
	if ( !dynamic_sidebar($petermason_header_name) ) {
		// Put here html if user no set widgets in sidebar
	}
	$petermason_widgets_output = ob_get_contents();
	ob_end_clean();
	if (trim(strip_tags($petermason_widgets_output)) != '') {
		$petermason_widgets_output = preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $petermason_widgets_output);
		$petermason_need_columns = strpos($petermason_widgets_output, 'columns_wrap')===false;
		if ($petermason_need_columns) {
			$petermason_columns = max(0, (int) petermason_get_theme_option('header_columns'));
			if ($petermason_columns == 0) $petermason_columns = min(6, max(1, substr_count($petermason_widgets_output, '<aside ')));
			if ($petermason_columns > 1)
				$petermason_widgets_output = preg_replace("/class=\"widget /", "class=\"column-1_".esc_attr($petermason_columns).' widget ', $petermason_widgets_output);
			else
				$petermason_need_columns = false;
		}
		?>
		<div class="header_widgets_wrap widget_area<?php echo !empty($petermason_header_wide) ? ' header_fullwidth' : ' header_boxed'; ?>">
			<div class="header_widgets_inner widget_area_inner">
				<?php 
				if (!$petermason_header_wide) { 
					?><div class="content_wrap"><?php
				}
				if ($petermason_need_columns) {
					?><div class="columns_wrap"><?php
				}
				do_action( 'petermason_action_before_sidebar' );
				petermason_show_layout($petermason_widgets_output);
				do_action( 'petermason_action_after_sidebar' );
				if ($petermason_need_columns) {
					?></div>	<!-- /.columns_wrap --><?php
				}
				if (!$petermason_header_wide) {
					?></div>	<!-- /.content_wrap --><?php
				}
				?>
			</div>	<!-- /.header_widgets_inner -->
		</div>	<!-- /.header_widgets_wrap -->
		<?php
	}
}
?>