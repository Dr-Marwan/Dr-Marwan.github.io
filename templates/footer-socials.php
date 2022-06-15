<?php
/**
 * The template to display the socials in the footer
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0.10
 */


// Socials
if ( petermason_is_on(petermason_get_theme_option('socials_in_footer')) && ($petermason_output = petermason_get_socials_links()) != '') {
	?>
	<div class="footer_socials_wrap socials_wrap">
		<div class="footer_socials_inner">
			<?php petermason_show_layout($petermason_output); ?>
		</div>
	</div>
	<?php
}
?>