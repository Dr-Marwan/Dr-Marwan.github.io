<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0
 */

$petermason_sidebar_position = petermason_get_theme_option('sidebar_position');
if (petermason_sidebar_present()) {
	ob_start();
	$petermason_sidebar_name = petermason_get_theme_option('sidebar_widgets');
	petermason_storage_set('current_sidebar', 'sidebar');
	if ( !dynamic_sidebar($petermason_sidebar_name) ) {
		dynamic_sidebar( $petermason_sidebar_name );
	}
	$petermason_out = trim(ob_get_contents());
	ob_end_clean();
	if (trim(strip_tags($petermason_out)) != '') {
		?>
		<div class="sidebar <?php echo esc_attr($petermason_sidebar_position); ?> widget_area<?php if (!petermason_is_inherit(petermason_get_theme_option('sidebar_scheme'))) echo ' scheme_'.esc_attr(petermason_get_theme_option('sidebar_scheme')); ?>" role="complementary">
			<div class="sidebar_inner">
				<?php
				do_action( 'petermason_action_before_sidebar' );
				petermason_show_layout(preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $petermason_out));
				do_action( 'petermason_action_after_sidebar' );
				?>
			</div><!-- /.sidebar_inner -->
		</div><!-- /.sidebar -->
		<?php
	}
}
?>