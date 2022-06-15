<?php
/**
 * The template to display Admin notices
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0.1
 */
?>
<div class="update-nag" id="petermason_admin_notice">
	<h3 class="petermason_notice_title"><?php echo sprintf(esc_html__('Welcome to %s', 'petermason'), wp_get_theme()->name); ?></h3>
	<?php if (!petermason_exists_trx_addons()) { ?>
	<p><?php echo wp_kses_data(__('<b>Attention!</b> Plugin "ThemeREX Addons is required! Please, install and activate it!', 'petermason')); ?></p>
	<?php } ?>
	<p>
		<?php if (petermason_get_value_gp('page')!='tgmpa-install-plugins') { ?>
		<a href="<?php echo esc_url(admin_url().'themes.php?page=tgmpa-install-plugins'); ?>" class="button-primary"><i class="dashicons dashicons-admin-plugins"></i> <?php esc_html_e('Install plugins', 'petermason'); ?></a>
		<?php } ?>
        <a href="<?php echo esc_url(admin_url().'customize.php'); ?>" class="button-primary"><i class="dashicons dashicons-admin-appearance"></i> <?php esc_html_e('Theme Customizer', 'petermason'); ?></a>
        <a href="#" class="button petermason_hide_notice"><i class="dashicons dashicons-dismiss"></i> <?php esc_html_e('Hide Notice', 'petermason'); ?></a>
	</p>
</div>