<?php
/**
 * The template to display menu in the footer
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0.10
 */

// Footer menu
$petermason_menu_footer = petermason_get_nav_menu('menu_footer');
if (!empty($petermason_menu_footer)) {
	?>
	<div class="footer_menu_wrap">
		<div class="footer_menu_inner">
			<?php petermason_show_layout($petermason_menu_footer); ?>
		</div>
	</div>
	<?php
}
?>