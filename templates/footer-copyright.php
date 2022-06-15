<?php
/**
 * The template to display the copyright info in the footer
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0.10
 */

// Copyright area
$petermason_footer_scheme =  petermason_is_inherit(petermason_get_theme_option('footer_scheme')) ? petermason_get_theme_option('color_scheme') : petermason_get_theme_option('footer_scheme');
$petermason_copyright_scheme = petermason_is_inherit(petermason_get_theme_option('copyright_scheme')) ? $petermason_footer_scheme : petermason_get_theme_option('copyright_scheme');
?> 
<div class="footer_copyright_wrap scheme_<?php echo esc_attr($petermason_copyright_scheme); ?>">
	<div class="footer_copyright_inner">
		<div class="content_wrap">
			<div class="copyright_text"><?php
				// Replace {{...}} and [[...]] on the <i>...</i> and <b>...</b>
				$petermason_copyright = petermason_prepare_macros(petermason_get_theme_option('copyright'));
				if (!empty($petermason_copyright)) {
					// Replace {date_format} on the current date in the specified format
					if (preg_match("/(\\{[\\w\\d\\\\\\-\\:]*\\})/", $petermason_copyright, $petermason_matches)) {
						$petermason_copyright = str_replace($petermason_matches[1], date(str_replace(array('{', '}'), '', $petermason_matches[1])), $petermason_copyright);
                        $petermason_copyright = str_replace(array('{{Y}}', '{Y}'), date('Y'), $petermason_copyright);
					}
					// Display copyright
					echo wp_kses_data(nl2br($petermason_copyright));
				}
			?></div>
		</div>
	</div>
</div>
