<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0
 */

						// Widgets area inside page content
						petermason_create_widgets_area('widgets_below_content');
						?>				
					</div><!-- </.content> -->

					<?php
					// Show main sidebar
					get_sidebar();

					// Widgets area below page content
					petermason_create_widgets_area('widgets_below_page');

					$petermason_body_style = petermason_get_theme_option('body_style');
					if ($petermason_body_style != 'fullscreen') {
						?></div><!-- </.content_wrap> --><?php
					}
					?>
			</div><!-- </.page_content_wrap> -->

			<?php
			// Footer
			$petermason_footer_style = petermason_get_theme_option("footer_style");
			if (strpos($petermason_footer_style, 'footer-custom-')===0) $petermason_footer_style = 'footer-custom';
			get_template_part( "templates/{$petermason_footer_style}");
			?>

		</div><!-- /.page_wrap -->

	</div><!-- /.body_wrap -->

	<?php if (petermason_is_on(petermason_get_theme_option('debug_mode')) && file_exists(petermason_get_file_dir('images/makeup.jpg'))) { ?>
		<img src="<?php echo esc_url(petermason_get_file_url('images/makeup.jpg')); ?>" id="makeup">
	<?php } ?>

	<?php wp_footer(); ?>

</body>
</html>