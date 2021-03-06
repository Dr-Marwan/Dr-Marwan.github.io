/* global jQuery:false */
/* global PETERMASON_STORAGE:false */

jQuery(document).on('action.ready_petermason', petermason_js_composer_init);
jQuery(document).on('action.init_shortcodes', petermason_js_composer_init);
jQuery(document).on('action.init_hidden_elements', petermason_js_composer_init);

function petermason_js_composer_init(e, container) {
	"use strict";
	if (arguments.length < 2) var container = jQuery('body');
	if (container===undefined || container.length === undefined || container.length == 0) return;

	container.find('.vc_message_box_closeable:not(.inited)').addClass('inited').on('click', function(e) {
		"use strict";
		jQuery(this).fadeOut();
		e.preventDefault();
		return false;
	});
}