/* global jQuery:false */
/* global PETERMASON_STORAGE:false */
/* global TRX_ADDONS_STORAGE:false */

jQuery(document).on('action.add_googlemap_styles', petermason_trx_addons_add_googlemap_styles);
jQuery(document).on('action.init_shortcodes', petermason_trx_addons_init);
jQuery(document).on('action.init_hidden_elements', petermason_trx_addons_init);

// Add theme specific styles to the Google map
function petermason_trx_addons_add_googlemap_styles(e) {
	TRX_ADDONS_STORAGE['googlemap_styles']['dark'] = [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"lightness":20},{"color":"#13162b"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#13162b"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#5fc6ca"},{"lightness":21}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"simplified"},{"color":"#cccdd2"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#13162b"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#ff0000"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#13162b"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#13162b"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#13162b"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#13162b"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#f4f9fc"},{"lightness":17}]}];
	TRX_ADDONS_STORAGE['googlemap_styles']['paper'] = [{"featureType": "administrative", "elementType": "all", "stylers": [{"visibility": "off"} ] }, {"featureType": "landscape", "elementType": "all", "stylers": [{"visibility": "simplified"}, {"hue": "#0066ff"}, {"saturation": 74 }, {"lightness": 100 } ] }, {"featureType": "poi", "elementType": "all", "stylers": [{"visibility": "simplified"} ] }, {"featureType": "road", "elementType": "all", "stylers": [{"visibility": "simplified"} ] }, {"featureType": "road.highway", "elementType": "all", "stylers": [{"visibility": "off"}, {"weight": 0.6 }, {"saturation": -85 }, {"lightness": 61 } ] }, {"featureType": "road.highway", "elementType": "geometry", "stylers": [{"visibility": "on"} ] }, {"featureType": "road.arterial", "elementType": "all", "stylers": [{"visibility": "off"} ] }, {"featureType": "road.local", "elementType": "all", "stylers": [{"visibility": "on"} ] }, {"featureType": "transit", "elementType": "all", "stylers": [{"visibility": "simplified"} ] }, {"featureType": "water", "elementType": "all", "stylers": [{"visibility": "simplified"}, {"color": "#5f94ff"}, {"lightness": 26 }, {"gamma": 5.86 } ] } ];
}


function petermason_trx_addons_init(e, container) {
	"use strict";
	if (arguments.length < 2) var container = jQuery('body');
	if (container===undefined || container.length === undefined || container.length == 0) return;

	container.find('.sc_countdown_item canvas:not(.inited)').addClass('inited').attr('data-color', PETERMASON_STORAGE['alter_link_color']);
}