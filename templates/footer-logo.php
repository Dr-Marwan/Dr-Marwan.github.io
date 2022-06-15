<?php
/**
 * The template to display the site logo in the footer
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0.10
 */

// Logo
if (petermason_is_on(petermason_get_theme_option('logo_in_footer'))) {
	$petermason_logo_image = '';
	if (petermason_get_retina_multiplier(2) > 1)
		$petermason_logo_image = petermason_get_theme_option( 'logo_footer_retina' );
	if (empty($petermason_logo_image)) 
		$petermason_logo_image = petermason_get_theme_option( 'logo_footer' );
	$petermason_logo_text   = get_bloginfo( 'name' );
	if (!empty($petermason_logo_image) || !empty($petermason_logo_text)) {
		?>
		<div class="footer_logo_wrap">
			<div class="footer_logo_inner">
				<?php
				if (!empty($petermason_logo_image)) {
					$petermason_attr = petermason_getimagesize($petermason_logo_image);
					echo '<a href="'.esc_url(home_url('/')).'"><img src="'.esc_url($petermason_logo_image).'" class="logo_footer_image" alt="'. esc_attr(basename($petermason_logo_image)).'"'.(!empty($petermason_attr[3]) ? sprintf(' %s', $petermason_attr[3]) : '').'></a>' ;
				} else if (!empty($petermason_logo_text)) {
					echo '<h1 class="logo_footer_text"><a href="'.esc_url(home_url('/')).'">' . esc_html($petermason_logo_text) . '</a></h1>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
?>