<?php
/**
 * The Header: Logo and main menu
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js scheme_<?php
										 // Class scheme_xxx need in the <html> as context for the <body>!
										 echo esc_attr(petermason_get_theme_option('color_scheme'));
										 ?>">
<head>
	<?php wp_head(); ?>
</head>

<body <?php	body_class(); ?>>
<?php wp_body_open(); ?>

	<?php do_action( 'petermason_action_before' ); ?>

	<div class="body_wrap">

		<div class="page_wrap">

			<?php
			// Desktop header
			$petermason_header_style = petermason_get_theme_option("header_style");
			if (strpos($petermason_header_style, 'header-custom-')===0) $petermason_header_style = 'header-custom';
			get_template_part( "templates/{$petermason_header_style}");

			// Side menu
			if (in_array(petermason_get_theme_option('menu_style'), array('left', 'right'))) {
				get_template_part( 'templates/header-navi-side' );
			}

			// Mobile header
			get_template_part( 'templates/header-mobile');
			?>

			<div class="page_content_wrap scheme_<?php echo esc_attr(petermason_get_theme_option('color_scheme')); ?>">

				<?php if (petermason_get_theme_option('body_style') != 'fullscreen') { ?>
				<div class="content_wrap">
				<?php } ?>

					<?php
					// Widgets area above page content
					petermason_create_widgets_area('widgets_above_page');
					?>				

					<div class="content">
						<?php
						// Widgets area inside page content
						petermason_create_widgets_area('widgets_above_content');
						?>				
