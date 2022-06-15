<?php
/**
 * The template to display the logo or the site name and the slogan in the Header
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0
 */

$petermason_args = get_query_var('petermason_logo_args');

// Site logo
$petermason_logo_image  = petermason_get_logo_image(isset($petermason_args['type']) ? $petermason_args['type'] : '');
$petermason_logo_text   = petermason_is_on(petermason_get_theme_option('logo_text')) ? get_bloginfo( 'name' ) : '';
$petermason_logo_slogan = get_bloginfo( 'description', 'display' );
if (!empty($petermason_logo_image) || !empty($petermason_logo_text)) {
	?><a class="sc_layouts_logo" href="<?php echo is_front_page() ? '#' : esc_url(home_url('/')); ?>"><?php
		if (!empty($petermason_logo_image)) {
			$petermason_attr = petermason_getimagesize($petermason_logo_image);
			echo '<img src="'.esc_url($petermason_logo_image).'" alt="'. esc_attr(basename($petermason_logo_image)).'"'.(!empty($petermason_attr[3]) ? sprintf(' %s', $petermason_attr[3]) : '').'>' ;
		} else {
			petermason_show_layout(petermason_prepare_macros($petermason_logo_text), '<span class="logo_text">', '</span>');
			petermason_show_layout(petermason_prepare_macros($petermason_logo_slogan), '<span class="logo_slogan">', '</span>');
		}
	?></a><?php
}
?>