<?php
/**
 * The template to display default site footer
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0.10
 */

$petermason_footer_scheme =  petermason_is_inherit(petermason_get_theme_option('footer_scheme')) ? petermason_get_theme_option('color_scheme') : petermason_get_theme_option('footer_scheme');
$petermason_footer_id = str_replace('footer-custom-', '', petermason_get_theme_option("footer_style"));
if ((int) $petermason_footer_id == 0) {
    $petermason_footer_id = petermason_get_post_id(array(
            'name' => $petermason_footer_id,
            'post_type' => defined('TRX_ADDONS_CPT_LAYOUTS_PT') ? TRX_ADDONS_CPT_LAYOUTS_PT : 'cpt_layouts'
        )
    );
} else {
    $petermason_footer_id = apply_filters('trx_addons_filter_get_translated_layout', $petermason_footer_id);
}
?>
<footer class="footer_wrap footer_custom footer_custom_<?php echo esc_attr($petermason_footer_id); ?> scheme_<?php echo esc_attr($petermason_footer_scheme); ?>">
	<?php
    // Custom footer's layout
    do_action('petermason_action_show_layout', $petermason_footer_id);
	?>
</footer><!-- /.footer_wrap -->
