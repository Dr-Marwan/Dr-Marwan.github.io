// Buttons decoration (add 'hover' class)
// Attention! Not use cont.find('selector')! Use jQuery('selector') instead!
jQuery(document).on('action.init_hidden_elements', function(e, cont) {
	"use strict";
	if (PETERMASON_STORAGE['button_hover'] && PETERMASON_STORAGE['button_hover']!='default') {
		jQuery('button.sc_button_style_2:not(.search_submit):not([class*="sc_button_hover_"]),\
				.theme_button.sc_button_style_2:not([class*="sc_button_hover_"]),\
				.sc_item_button > a.sc_button_style_2:not([class*="sc_button_hover_"]):not([class*="sc_button_simple"]),\
				.sc_form_field button.sc_button_style_2:not([class*="sc_button_hover_"]),\
				.sc_price_link.sc_button_style_2:not([class*="sc_button_hover_"])\
				').addClass('sc_button_hover_just_init sc_button_hover_'+PETERMASON_STORAGE['button_hover']);
		if (PETERMASON_STORAGE['button_hover']!='arrow') {
			jQuery('input[type="button"]:not([class*="sc_button_hover_"]),\
					.woocommerce nav.woocommerce-pagination ul li a:not([class*="sc_button_hover_"]),\
					.tribe-events-button:not([class*="sc_button_hover_"]),\
					#tribe-bar-views .tribe-bar-views-list .tribe-bar-views-option a:not([class*="sc_button_hover_"]),\
					.tribe-bar-mini #tribe-bar-views .tribe-bar-views-list .tribe-bar-views-option a:not([class*="sc_button_hover_"]),\
					.tribe-events-cal-links a:not([class*="sc_button_hover_"]),\
					.tribe-events-sub-nav li a:not([class*="sc_button_hover_"]),\
					.isotope_filters_button:not([class*="sc_button_hover_"]),\
					.trx_addons_scroll_to_top:not([class*="sc_button_hover_"]),\
					.sc_promo_modern .sc_promo_link2:not([class*="sc_button_hover_"]),\
					.sc_slider_controller_titles .slider_controls_wrap > a:not([class*="sc_button_hover_"]),\
					.tagcloud > a:not([class*="sc_button_hover_"])\
					').addClass('sc_button_hover_just_init sc_button_hover_'+PETERMASON_STORAGE['button_hover']);
		}
		// Add alter styles of buttons
		jQuery('.sc_slider_controller_titles .slider_controls_wrap > a:not([class*="sc_button_hover_style_"])\
				').addClass('sc_button_hover_just_init sc_button_hover_style_default');
		jQuery('.trx_addons_hover_content .trx_addons_hover_links a:not([class*="sc_button_hover_style_"]),\
				.single-product ul.products li.product .post_data .button:not([class*="sc_button_hover_style_"])\
				').addClass('sc_button_hover_just_init sc_button_hover_style_inverse');
		// jQuery('').addClass('sc_button_hover_just_init sc_button_hover_style_hover');
		jQuery('.woocommerce .woocommerce-message .button:not([class*="sc_button_hover_style_"]),\
				.woocommerce .woocommerce-info .button:not([class*="sc_button_hover_style_"])\
				').addClass('sc_button_hover_just_init sc_button_hover_style_alter');
		jQuery('.sidebar .trx_addons_tabs .trx_addons_tabs_titles li a:not([class*="sc_button_hover_style_"]),\
				.petermason_tabs .petermason_tabs_titles li a:not([class*="sc_button_hover_style_"]),\
				.widget_tag_cloud a:not([class*="sc_button_hover_style_"]),\
				.widget_product_tag_cloud a:not([class*="sc_button_hover_style_"])\
				').addClass('sc_button_hover_just_init sc_button_hover_style_alterbd');
		jQuery('.vc_tta-accordion .vc_tta-panel-heading .vc_tta-controls-icon:not([class*="sc_button_hover_style_"]),\
				.sc_action_item_event .sc_action_item_link:not([class*="sc_button_hover_style_"]),\
				.trx_addons_video_player.with_cover .video_hover:not([class*="sc_button_hover_style_"]),\
				.trx_addons_tabs .trx_addons_tabs_titles li a:not([class*="sc_button_hover_style_"])\
				').addClass('sc_button_hover_just_init sc_button_hover_style_dark');


		jQuery('.sc_form_field button:not([class*="sc_button_hover_"])\
				').addClass('sc_button sc_button_default sc_button_size_normal');

		jQuery('.single-product div.product .trx-stretch-width .woocommerce-tabs .wc-tabs li a:not([class*="sc_button_hover_style_"]),\
				.woocommerce div.product .summary form.cart .button\
				').addClass('sc_button');


		jQuery('.woocommerce ul.products li.product .post_data .add_to_cart_button,\
				#btn-buy,\
				.woocommerce ul.products li.product .button,\
				.woocommerce-page ul.products li.product .button,\
				.woocommerce-page ul.products li.product .post_data .add_to_cart_button,\
				.woocommerce table.shop_table td.actions input[type="submit"],\
				.woocommerce div.product .summary form.cart .button,\
				.vc_tta-accordion .vc_tta-panel-heading .vc_tta-controls-icon:not([class*="sc_button_hover_"]),\
				.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab > a:not([class*="sc_button_hover_"]),\
				.single-product div.product .trx-stretch-width .woocommerce-tabs .wc-tabs li a:not([class*="sc_button_hover_style_"])\
				').addClass('sc_button_style_2');

		jQuery('.woocommerce ul.products li.product .post_data .add_to_cart_button,\
				.woocommerce ul.products li.product .button,\
				#btn-buy,\
				.woocommerce-page ul.products li.product .button,\
				.woocommerce-page ul.products li.product .post_data .add_to_cart_button,\
				.woocommerce table.shop_table td.actions input[type="submit"],\
				.woocommerce div.product .summary form.cart .button,\
				.vc_tta-accordion .vc_tta-panel-heading .vc_tta-controls-icon:not([class*="sc_button_hover_"]),\
				.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab > a:not([class*="sc_button_hover_"]),\
				.single-product div.product .trx-stretch-width .woocommerce-tabs .wc-tabs li a\
				').addClass('sc_button_hover_just_init sc_button_hover_'+PETERMASON_STORAGE['button_hover']);

		// Remove just init hover class
		setTimeout(function() {
			"use strict";
			jQuery('.sc_button_hover_just_init').removeClass('sc_button_hover_just_init');
			}, 500);
		// Remove hover class
		jQuery('.mejs-controls button,\
				.mfp-close,\
				.sc_button_bg_image,\
				.woocommerce.widget_shopping_cart .buttons a.button,\
				.woocommerce .widget_shopping_cart .buttons a.button,\
				.woocommerce-page.widget_shopping_cart .buttons a.button,\
				.woocommerce-page .widget_shopping_cart .buttons a.button\
				').removeClass('sc_button_hover_'+PETERMASON_STORAGE['button_hover']);

	}
	
});

