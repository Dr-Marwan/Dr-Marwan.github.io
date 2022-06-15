<?php
/* elegro Crypto Payment support functions
------------------------------------------------------------------------------- */
// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'petermason_elegro_payment_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'petermason_elegro_payment_theme_setup9', 9 );
	function petermason_elegro_payment_theme_setup9() {
		if ( petermason_exists_elegro_payment() ) {
            add_action('wp_enqueue_scripts', 'petermason_elegro_payment_frontend_scripts', 1100);
			add_filter( 'petermason_filter_merge_styles', 'petermason_elegro_payment_merge_styles' );
		}
		if ( is_admin() ) {
			add_filter( 'petermason_filter_tgmpa_required_plugins', 'petermason_elegro_payment_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'petermason_elegro_payment_tgmpa_required_plugins' ) ) {
	function petermason_elegro_payment_tgmpa_required_plugins( $list = array() ) {
            if (in_array('elegro-payment', petermason_storage_get('required_plugins'))) {
			$list[] = array(
                'name' 		=> esc_html__('elegro Crypto Payment', 'petermason'),
				'slug'     => 'elegro-payment',
				'required' => false,
			);
		}
		return $list;
	}
}

// Check if this plugin installed and activated
if ( ! function_exists( 'petermason_exists_elegro_payment' ) ) {
	function petermason_exists_elegro_payment() {
		return class_exists( 'WC_Elegro_Payment' );
	}
}

// Merge custom styles
if ( ! function_exists( 'petermason_elegro_payment_merge_styles' ) ) {
	function petermason_elegro_payment_merge_styles( $list ) {
		$list[] = 'plugins/elegro-payment/elegro-payment.css';
		return $list;
	}
}
// Enqueue custom styles
if (!function_exists('petermason_elegro_payment_frontend_scripts')) {
    function petermason_elegro_payment_frontend_scripts()
    {
        if (petermason_exists_elegro_payment()) {
            if (petermason_is_on(petermason_get_theme_option('debug_mode')) && petermason_get_file_dir('plugins/elegro-payment/elegro-payment.css') != '')
                wp_enqueue_style('petermason-elegro-payment', petermason_get_file_url('plugins/elegro-payment/elegro-payment.css'), array(), null);
        }
    }
}
