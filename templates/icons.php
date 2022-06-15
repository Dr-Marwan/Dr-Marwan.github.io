<?php
/**
 * The template to displaying popup with Theme Icons
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0
 */

$petermason_icons = petermason_get_list_icons();
if (is_array($petermason_icons)) {
	?>
	<div class="petermason_list_icons">
		<?php
		foreach($petermason_icons as $icon) {
			?><span class="<?php echo esc_attr($icon); ?>" title="<?php echo esc_attr($icon); ?>"></span><?php
		}
		?>
	</div>
	<?php
}
?>