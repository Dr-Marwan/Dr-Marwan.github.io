<?php
/* Woocommerce support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 1 - register filters, that add/remove lists items for the Theme Options
if (!function_exists('petermason_woocommerce_theme_setup1')) {
	add_action( 'after_setup_theme', 'petermason_woocommerce_theme_setup1', 1 );
	function petermason_woocommerce_theme_setup1() {
      	add_theme_support( 'woocommerce' );

        // Next setting from the WooCommerce 3.0+ enable built-in image zoom on the single product page
        add_theme_support( 'wc-product-gallery-zoom' );

        // Next setting from the WooCommerce 3.0+ enable built-in image slider on the single product page
        add_theme_support( 'wc-product-gallery-slider' );

        // Next setting from the WooCommerce 3.0+ enable built-in image lightbox on the single product page
        add_theme_support( 'wc-product-gallery-lightbox' );

		add_filter( 'petermason_filter_list_sidebars', 	'petermason_woocommerce_list_sidebars' );
		add_filter( 'petermason_filter_list_posts_types',	'petermason_woocommerce_list_post_types');

        // Detect if WooCommerce support 'Product Grid' feature
        $product_grid = petermason_exists_woocommerce() && function_exists( 'wc_get_theme_support' ) ? wc_get_theme_support( 'product_grid' ) : false;
        add_theme_support( 'wc-product-grid-enable', isset( $product_grid['min_columns'] ) && isset( $product_grid['max_columns'] ) );
	}
}

// Theme init priorities:
// 3 - add/remove Theme Options elements
if (!function_exists('petermason_woocommerce_theme_setup3')) {
	add_action( 'after_setup_theme', 'petermason_woocommerce_theme_setup3', 3 );
	function petermason_woocommerce_theme_setup3() {
		if (petermason_exists_woocommerce()) {
			petermason_storage_merge_array('options', '', array(
				// Section 'WooCommerce' - settings for show pages
				'shop' => array(
					"title" => esc_html__('Shop', 'petermason'),
					"desc" => wp_kses_data( __('Select parameters to display the shop pages', 'petermason') ),
					"type" => "section"
					),
				'header_style_shop' => array(
					"title" => esc_html__('Header style', 'petermason'),
					"desc" => wp_kses_data( __('Select style to display the site header', 'petermason') ),
					"std" => 'header-default',
					"options" => apply_filters('petermason_filter_list_header_styles', array(
						'header-default' => esc_html__('Default Header',	'petermason')
					)),
					"type" => "select"
					),				
				'expand_content_shop' => array(
					"title" => esc_html__('Expand content', 'petermason'),
					"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden', 'petermason') ),
					"refresh" => false,
					"std" => 1,
					"type" => "checkbox"
					),
				'blog_columns_shop' => array(
					"title" => esc_html__('Shop loop columns', 'petermason'),
					"desc" => wp_kses_data( __('How many columns should be used in the shop loop (from 2 to 4)?', 'petermason') ),
					"std" => 2,
					"options" => petermason_get_list_range(2,4),
					"hidden" => true,
					"type" => "select"
					),
				'related_posts_shop' => array(
					"title" => esc_html__('Related products', 'petermason'),
					"desc" => wp_kses_data( __('How many related products should be displayed in the single product page  (from 2 to 4)?', 'petermason') ),
					"std" => 2,
					"hidden" => true,
					"options" => petermason_get_list_range(2,4),
					"type" => "select"
					),
				'shop_mode' => array(
					"title" => esc_html__('Shop mode', 'petermason'),
					"desc" => wp_kses_data( __('Select style for the products list', 'petermason') ),
					"std" => 'thumbs',
					"options" => array(
						'thumbs'=> esc_html__('Thumbnails', 'petermason'),
						'list'	=> esc_html__('List', 'petermason'),
					),
					"type" => "select"
					),
				'header_widgets_shop' => array(
					"title" => esc_html__('Header widgets', 'petermason'),
					"desc" => wp_kses_data( __('Select set of widgets to show in the header on the shop pages', 'petermason') ),
					"std" => 'hide',
					"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
					"type" => "select"
					),
				'sidebar_widgets_shop' => array(
					"title" => esc_html__('Sidebar widgets', 'petermason'),
					"desc" => wp_kses_data( __('Select sidebar to show on the shop pages', 'petermason') ),
					"std" => 'woocommerce_widgets',
					"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
					"type" => "select"
					),
				'sidebar_position_shop' => array(
					"title" => esc_html__('Sidebar position', 'petermason'),
					"desc" => wp_kses_data( __('Select position to show sidebar on the shop pages', 'petermason') ),
					"refresh" => false,
					"std" => 'left',
					"options" => petermason_get_list_sidebars_positions(),
					"type" => "select"
					),
				'widgets_above_page_shop' => array(
					"title" => esc_html__('Widgets above the page', 'petermason'),
					"desc" => wp_kses_data( __('Select widgets to show above page (content and sidebar)', 'petermason') ),
					"std" => 'hide',
					"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
					"type" => "select"
					),
				'widgets_above_content_shop' => array(
					"title" => esc_html__('Widgets above the content', 'petermason'),
					"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'petermason') ),
					"std" => 'hide',
					"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
					"type" => "select"
					),
				'widgets_below_content_shop' => array(
					"title" => esc_html__('Widgets below the content', 'petermason'),
					"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'petermason') ),
					"std" => 'hide',
					"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
					"type" => "select"
					),
				'widgets_below_page_shop' => array(
					"title" => esc_html__('Widgets below the page', 'petermason'),
					"desc" => wp_kses_data( __('Select widgets to show below the page (content and sidebar)', 'petermason') ),
					"std" => 'hide',
					"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
					"type" => "select"
					),
				'footer_scheme_shop' => array(
					"title" => esc_html__('Footer Color Scheme', 'petermason'),
					"desc" => wp_kses_data( __('Select color scheme to decorate footer area', 'petermason') ),
					"std" => 'dark',
					"options" => petermason_get_list_schemes(true),
					"type" => "select"
					),
				'footer_widgets_shop' => array(
					"title" => esc_html__('Footer widgets', 'petermason'),
					"desc" => wp_kses_data( __('Select set of widgets to show in the footer', 'petermason') ),
					"std" => 'footer_widgets',
					"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
					"type" => "select"
					),
				'footer_columns_shop' => array(
					"title" => esc_html__('Footer columns', 'petermason'),
					"desc" => wp_kses_data( __('Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'petermason') ),
					"dependency" => array(
						'footer_widgets_shop' => array('^hide')
					),
					"std" => 4,
					"options" => petermason_get_list_range(0,6),
					"type" => "select"
					),
				'footer_wide_shop' => array(
					"title" => esc_html__('Footer fullwide', 'petermason'),
					"desc" => wp_kses_data( __('Do you want to stretch the footer to the entire window width?', 'petermason') ),
					"std" => 0,
					"type" => "checkbox"
					)
				)
			);
		}
	}
}

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('petermason_woocommerce_theme_setup9')) {
	add_action( 'after_setup_theme', 'petermason_woocommerce_theme_setup9', 9 );
	function petermason_woocommerce_theme_setup9() {
		
		if (petermason_exists_woocommerce()) {
			add_action( 'wp_enqueue_scripts', 								'petermason_woocommerce_frontend_scripts', 1100 );
			add_filter( 'petermason_filter_merge_styles',						'petermason_woocommerce_merge_styles' );
			add_filter( 'petermason_filter_get_css',							'petermason_woocommerce_get_css', 10, 4 );
			add_filter( 'petermason_filter_get_post_info',		 				'petermason_woocommerce_get_post_info');
			add_filter( 'petermason_filter_post_type_taxonomy',				'petermason_woocommerce_post_type_taxonomy', 10, 2 );
			add_filter( 'petermason_filter_get_blog_title', 'petermason_woocommerce_get_blog_title' );
			if (!is_admin()) {
				add_filter( 'petermason_filter_detect_blog_mode',				'petermason_woocommerce_detect_blog_mode' );
				add_filter( 'petermason_filter_sidebar_present',				'petermason_woocommerce_sidebar_present' );
				add_filter( 'petermason_filter_get_post_categories', 			'petermason_woocommerce_get_post_categories');
				add_filter( 'petermason_filter_allow_override_header_image',	'petermason_woocommerce_allow_override_header_image' );
				add_action( 'petermason_action_before_post_meta',				'petermason_woocommerce_action_before_post_meta');
			}
		}
		if (is_admin()) {
			add_filter( 'petermason_filter_tgmpa_required_plugins',			'petermason_woocommerce_tgmpa_required_plugins' );
		}

		// Add wrappers and classes to the standard WooCommerce output
		if (petermason_exists_woocommerce()) {

			// Remove WOOC sidebar
			remove_action( 'woocommerce_sidebar', 						'woocommerce_get_sidebar', 10 );

			// Remove link around product item
			remove_action('woocommerce_before_shop_loop_item',			'woocommerce_template_loop_product_link_open', 10);
			remove_action('woocommerce_after_shop_loop_item',			'woocommerce_template_loop_product_link_close', 5);

			// Remove add_to_cart button
			
			
			// Remove link around product category
			remove_action('woocommerce_before_subcategory',				'woocommerce_template_loop_category_link_open', 10);
			remove_action('woocommerce_after_subcategory',				'woocommerce_template_loop_category_link_close', 10);
			
			// Open main content wrapper - <article>
			remove_action( 'woocommerce_before_main_content',			'woocommerce_output_content_wrapper', 10);
			add_action(    'woocommerce_before_main_content',			'petermason_woocommerce_wrapper_start', 10);
			// Close main content wrapper - </article>
			remove_action( 'woocommerce_after_main_content',			'woocommerce_output_content_wrapper_end', 10);		
			add_action(    'woocommerce_after_main_content',			'petermason_woocommerce_wrapper_end', 10);

			// Close header section
			add_action(    'woocommerce_archive_description',			'petermason_woocommerce_archive_description', 15 );

			// Add theme specific search form
			add_filter(    'get_product_search_form',					'petermason_woocommerce_get_product_search_form' );

			// Change text on 'Add to cart' button
			add_filter(    'woocommerce_product_add_to_cart_text',		'petermason_woocommerce_add_to_cart_text' );
			add_filter(    'woocommerce_product_single_add_to_cart_text','petermason_woocommerce_add_to_cart_text' );

			// Add list mode buttons
			add_action(    'woocommerce_before_shop_loop', 				'petermason_woocommerce_before_shop_loop', 10 );

			// Set columns number for the products loop
            if ( ! get_theme_support( 'wc-product-grid-enable' ) ) {
                add_filter('loop_shop_columns', 'petermason_woocommerce_loop_shop_columns');
                add_filter('post_class', 'petermason_woocommerce_loop_shop_columns_class');
                add_filter('product_cat_class', 'petermason_woocommerce_loop_shop_columns_class', 10, 3);
            }
			// Open product/category item wrapper
			add_action(    'woocommerce_before_subcategory_title',		'petermason_woocommerce_item_wrapper_start', 9 );
			add_action(    'woocommerce_before_shop_loop_item_title',	'petermason_woocommerce_item_wrapper_start', 9 );
			// Close featured image wrapper and open title wrapper
			add_action(    'woocommerce_before_subcategory_title',		'petermason_woocommerce_title_wrapper_start', 20 );
			add_action(    'woocommerce_before_shop_loop_item_title',	'petermason_woocommerce_title_wrapper_start', 20 );

			// Add tags before title
			

			// Wrap product title into link
			add_action(    'the_title',									'petermason_woocommerce_the_title');
			// Wrap category title into link
            remove_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10 );
			add_action(		'woocommerce_shop_loop_subcategory_title',  'petermason_woocommerce_shop_loop_subcategory_title', 9, 1);

			// Close title wrapper and add description in the list mode
			add_action(    'woocommerce_after_shop_loop_item_title',	'petermason_woocommerce_title_wrapper_end', 7);
			add_action(    'woocommerce_after_subcategory_title',		'petermason_woocommerce_title_wrapper_end2', 10 );
			// Close product/category item wrapper
			add_action(    'woocommerce_after_subcategory',				'petermason_woocommerce_item_wrapper_end', 20 );
			add_action(    'woocommerce_after_shop_loop_item',			'petermason_woocommerce_item_wrapper_end', 20 );

			// Add product ID into product meta section (after categories and tags)
			add_action(    'woocommerce_product_meta_end',				'petermason_woocommerce_show_product_id', 10);
			
			// Set columns number for the product's thumbnails
			add_filter(    'woocommerce_product_thumbnails_columns',	'petermason_woocommerce_product_thumbnails_columns' );

			// Set columns number for the related products
			add_filter(    'woocommerce_output_related_products_args',	'petermason_woocommerce_output_related_products_args' );

			// Decorate price
			add_filter(    'woocommerce_get_price_html',				'petermason_woocommerce_get_price_html' );

			// Add 'Out of stock' label
			add_action( 'petermason_action_woocommerce_item_featured_link_start', 'petermason_woocommerce_add_out_of_stock_label' );
	
			// Detect current shop mode
			if (!is_admin()) {
				$shop_mode = petermason_get_value_gpc('petermason_shop_mode');
				if (empty($shop_mode) && petermason_check_theme_option('shop_mode'))
					$shop_mode = petermason_get_theme_option('shop_mode');
				if (empty($shop_mode))
					$shop_mode = 'thumbs';
				petermason_storage_set('shop_mode', $shop_mode);
			}
		}
	}
}



// Check if WooCommerce installed and activated
if ( !function_exists( 'petermason_exists_woocommerce' ) ) {
	function petermason_exists_woocommerce() {
		return class_exists('Woocommerce');
		
	}
}

// Return true, if current page is any woocommerce page
if ( !function_exists( 'petermason_is_woocommerce_page' ) ) {
	function petermason_is_woocommerce_page() {
		$rez = false;
		if (petermason_exists_woocommerce())
			$rez = is_woocommerce() || is_shop() || is_product() || is_product_category() || is_product_tag() || is_product_taxonomy() || is_cart() || is_checkout() || is_account_page();
		return $rez;
	}
}

// Detect current blog mode
if ( !function_exists( 'petermason_woocommerce_detect_blog_mode' ) ) {
	
	function petermason_woocommerce_detect_blog_mode($mode='') {
		if (is_shop() || is_product_category() || is_product_tag() || is_product_taxonomy())
			$mode = 'shop';
		else if (is_product() || is_cart() || is_checkout() || is_account_page())
			$mode = 'shop';	
		return $mode;
	}
}

// Return taxonomy for current post type
if ( !function_exists( 'petermason_woocommerce_post_type_taxonomy' ) ) {
	
	function petermason_woocommerce_post_type_taxonomy($tax='', $post_type='') {
		if ($post_type == 'product')
			$tax = 'product_cat';
		return $tax;
	}
}

// Return true if page title section is allowed
if ( !function_exists( 'petermason_woocommerce_allow_override_header_image' ) ) {
	
	function petermason_woocommerce_allow_override_header_image($allow=true) {
		return is_product() ? false : $allow;
	}
}

// Return shop page ID
if ( !function_exists( 'petermason_woocommerce_get_shop_page_id' ) ) {
	function petermason_woocommerce_get_shop_page_id() {
		return get_option('woocommerce_shop_page_id');
	}
}

// Return shop page link
if ( !function_exists( 'petermason_woocommerce_get_shop_page_link' ) ) {
	function petermason_woocommerce_get_shop_page_link() {
		$url = '';
		$id = petermason_woocommerce_get_shop_page_id();
		if ($id) $url = get_permalink($id);
		return $url;
	}
}

// Show categories of the current product
if ( !function_exists( 'petermason_woocommerce_get_post_categories' ) ) {
	
	function petermason_woocommerce_get_post_categories($cats='') {
		if (get_post_type()=='product') {
			$cats = petermason_get_post_terms(', ', get_the_ID(), 'product_cat');
		}
		return $cats;
	}
}

// Show categories of the team, courses, etc.
if ( !function_exists( 'petermason_woocommerce_list_post_types' ) ) {
	
	function petermason_woocommerce_list_post_types($list=array()) {
		$list['product'] = esc_html__('Products', 'petermason');
		return $list;
	}
}

// Show price of the current product in the widgets and search results
if ( !function_exists( 'petermason_woocommerce_get_post_info' ) ) {
	
	function petermason_woocommerce_get_post_info($post_info='') {
		if (get_post_type()=='product') {
			global $product;
			if ( $price_html = $product->get_price_html() ) {
				$post_info = '<div class="post_price product_price price">' . trim($price_html) . '</div>' . $post_info;
			}
		}
		return $post_info;
	}
}

// Show price of the current product in the search results streampage
if ( !function_exists( 'petermason_woocommerce_action_before_post_meta' ) ) {
	
	function petermason_woocommerce_action_before_post_meta() {
		if (get_post_type()=='product') {
			global $product;
			if ( $price_html = $product->get_price_html() ) {
				?><div class="post_price product_price price"><?php petermason_show_layout($price_html); ?></div><?php
			}
		}
	}
}
	
// Enqueue WooCommerce custom styles
if ( !function_exists( 'petermason_woocommerce_frontend_scripts' ) ) {
	
	function petermason_woocommerce_frontend_scripts() {
		
			if (petermason_is_on(petermason_get_theme_option('debug_mode')) && file_exists(petermason_get_file_dir('plugins/woocommerce/woocommerce.css')))
				wp_enqueue_style( 'petermason-woocommerce',  petermason_get_file_url('plugins/woocommerce/woocommerce.css'), array(), null );
	}
}
	
// Merge custom styles
if ( !function_exists( 'petermason_woocommerce_merge_styles' ) ) {
	
	function petermason_woocommerce_merge_styles($list) {
		$list[] = 'plugins/woocommerce/woocommerce.css';
		return $list;
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'petermason_woocommerce_tgmpa_required_plugins' ) ) {
	
	function petermason_woocommerce_tgmpa_required_plugins($list=array()) {
		if (in_array('woocommerce', petermason_storage_get('required_plugins')))
			$list[] = array(
					'name' 		=> esc_html__('WooCommerce', 'petermason'),
					'slug' 		=> 'woocommerce',
					'required' 	=> false
				);

		return $list;
	}
}



// Add WooCommerce specific items into lists
//------------------------------------------------------------------------

// Add sidebar
if ( !function_exists( 'petermason_woocommerce_list_sidebars' ) ) {
	
	function petermason_woocommerce_list_sidebars($list=array()) {
		$list['woocommerce_widgets'] = array(
											'name' => esc_html__('WooCommerce Widgets', 'petermason'),
											'description' => esc_html__('Widgets to be shown on the WooCommerce pages', 'petermason')
											);
		return $list;
	}
}




// Decorate WooCommerce output: Loop
//------------------------------------------------------------------------

// Before main content
if ( !function_exists( 'petermason_woocommerce_wrapper_start' ) ) {
	
	
	function petermason_woocommerce_wrapper_start() {
		if (is_product() || is_cart() || is_checkout() || is_account_page()) {
			?>
			<article class="post_item_single post_type_product">
			<?php
		} else {
			?>
			<div class="list_products shop_mode_<?php echo !petermason_storage_empty('shop_mode') ? petermason_storage_get('shop_mode') : 'thumbs'; ?>">
				<div class="list_products_header">
			<?php
		}
	}
}

// After main content
if ( !function_exists( 'petermason_woocommerce_wrapper_end' ) ) {
	
	
	function petermason_woocommerce_wrapper_end() {
		if (is_product() || is_cart() || is_checkout() || is_account_page()) {
			?>
			</article><!-- /.post_item_single -->
			<?php
		} else {
			?>
			</div><!-- /.list_products -->
			<?php
		}
	}
}

// Close header section
if ( !function_exists( 'petermason_woocommerce_archive_description' ) ) {
	
	function petermason_woocommerce_archive_description() {
		?>
		</div><!-- /.list_products_header -->
		<?php
	}
}

// Add list mode buttons
if ( !function_exists( 'petermason_woocommerce_before_shop_loop' ) ) {
	
	function petermason_woocommerce_before_shop_loop() {
		?>
		<div class="petermason_shop_mode_buttons"><form action="<?php echo esc_url(petermason_get_current_url()); ?>" method="post"><input type="hidden" name="petermason_shop_mode" value="<?php echo esc_attr(petermason_storage_get('shop_mode')); ?>" /><a href="#" class="woocommerce_thumbs icon-nine-squares" title="<?php esc_attr_e('Show products as thumbs', 'petermason'); ?>"></a><a href="#" class="woocommerce_list icon-list" title="<?php esc_attr_e('Show products as list', 'petermason'); ?>"></a></form></div><!-- /.petermason_shop_mode_buttons -->
		<?php
	}
}

// Number of columns for the shop streampage
if ( !function_exists( 'petermason_woocommerce_loop_shop_columns' ) ) {
	
	function petermason_woocommerce_loop_shop_columns($cols) {
		return max(2, min(4, petermason_get_theme_option('blog_columns')));
	}
}

// Add column class into product item in shop streampage
if ( !function_exists( 'petermason_woocommerce_loop_shop_columns_class' ) ) {
	
	
	function petermason_woocommerce_loop_shop_columns_class($classes, $class='', $cat='') {
		global $woocommerce_loop;
		if (is_product()) {
			if (!empty($woocommerce_loop['columns'])) {
				$classes[] = ' column-1_'.esc_attr($woocommerce_loop['columns']);
			}
		} else if (is_shop() || is_product_category() || is_product_tag() || is_product_taxonomy()) {
			$classes[] = ' column-1_'.esc_attr(max(2, min(4, petermason_get_theme_option('blog_columns'))));
		}
		return $classes;
	}
}


// Open item wrapper for categories and products
if ( !function_exists( 'petermason_woocommerce_item_wrapper_start' ) ) {
	
	
	function petermason_woocommerce_item_wrapper_start($cat='') {
		petermason_storage_set('in_product_item', true);
		?>
		<div class="post_item post_layout_<?php echo esc_attr(petermason_storage_get('shop_mode')); ?>">
			<div class="post_featured hover_shop">
				<a href="<?php echo esc_url(is_object($cat) ? get_term_link($cat->slug, 'product_cat') : get_permalink()); ?>">
		<?php
		do_action( 'petermason_action_woocommerce_item_featured_link_start' );
	}
}

// Open item wrapper for categories and products
if ( !function_exists( 'petermason_woocommerce_open_item_wrapper' ) ) {
	
	
	function petermason_woocommerce_title_wrapper_start($cat='') {
				?>
				</a>
			</div><!-- /.post_featured -->
			<div class="post_data">
				<div class="post_header entry-header">
				<?php
	}
}


// Display product's tags before the title
if ( !function_exists( 'petermason_woocommerce_title_tags' ) ) {
	
	function petermason_woocommerce_title_tags() {
		global $product;
		petermason_show_layout(wc_get_product_tag_list( $product->get_id(), ', ', '<div class="post_tags product_tags">', '</div>' ));
	}
}

// Wrap product title into link
if ( !function_exists( 'petermason_woocommerce_the_title' ) ) {
	
	function petermason_woocommerce_the_title($title) {
		if (petermason_storage_get('in_product_item') && get_post_type()=='product') {
			$title = '<a href="'.get_permalink().'">'.esc_html($title).'</a>';
		}
		return $title;
	}
}

// Wrap category title into link
if ( !function_exists( 'petermason_woocommerce_shop_loop_subcategory_title' ) ) {
	
	function petermason_woocommerce_shop_loop_subcategory_title($cat) {
        $cat->name = sprintf('<a href="%s">%s</a>', esc_url(get_term_link($cat->slug, 'product_cat')), $cat->name);
        ?>
        <h2 class="woocommerce-loop-category__title">
        <?php
        echo trim($cat->name);

        if ( $cat->count > 0 ) {
            echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . esc_html( $cat->count ) . ')</mark>', $cat ); // WPCS: XSS ok.
        }
        ?>
        </h2><?php
    }
}

// Add label 'out of stock'
if ( ! function_exists( 'petermason_woocommerce_add_out_of_stock_label' ) ) {
	
	function petermason_woocommerce_add_out_of_stock_label() {
		global $product;
		$cat = petermason_storage_get( 'in_product_category' );
		if ( empty($cat) || ! is_object($cat) ) {
			if ( is_object( $product ) && ! $product->is_in_stock() ) {
				?>
				<span class="outofstock_label"><?php esc_html_e( 'Out of stock', 'petermason' ); ?></span>
				<?php
			}
		}
	}
}


// Add excerpt in output for the product in the list mode
if ( !function_exists( 'petermason_woocommerce_title_wrapper_end' ) ) {
	
	function petermason_woocommerce_title_wrapper_end() {
		?>
			</div><!-- /.post_header -->
		<?php
		if (petermason_storage_get('shop_mode') == 'list' && (is_shop() || is_product_category() || is_product_tag() || is_product_taxonomy()) && !is_product()) {
		    $excerpt = apply_filters('the_excerpt', get_the_excerpt());
			?>
			<div class="post_content entry-content"><?php petermason_show_layout($excerpt); ?></div>
			<?php
		}
	}
}

// Add excerpt in output for the product in the list mode
if ( !function_exists( 'petermason_woocommerce_title_wrapper_end2' ) ) {
	
	function petermason_woocommerce_title_wrapper_end2($category) {
		?>
			</div><!-- /.post_header -->
		<?php
		if (petermason_storage_get('shop_mode') == 'list' && is_shop() && !is_product()) {
			?>
			<div class="post_content entry-content"><?php petermason_show_layout($category->description); ?></div><!-- /.post_content -->
			<?php
		}
	}
}

// Close item wrapper for categories and products
if ( !function_exists( 'petermason_woocommerce_close_item_wrapper' ) ) {
	
	
	function petermason_woocommerce_item_wrapper_end($cat='') {
		?>
			</div><!-- /.post_data -->
		</div><!-- /.post_item -->
		<?php
		petermason_storage_set('in_product_item', false);
	}
}



if ( ! function_exists( 'petermason_woocommerce_add_to_cart_text' ) ) {

	function petermason_woocommerce_add_to_cart_text( $text = '' ) {
		global $product;
		return is_object( $product )
				&& $product->is_in_stock()
				&& $product->is_purchasable()
				&& 'grouped' !== $product->get_type()
				&& ( 'external' !== $product->get_type() || $product->get_button_text() == '' )
					? esc_html__( 'Buy now', 'petermason' )
					: $text;
	}
}

// Decorate price
if ( !function_exists( 'petermason_woocommerce_get_price_html' ) ) {
	
	function petermason_woocommerce_get_price_html($price='') {
		if (!empty($price)) {
			$sep = get_option('woocommerce_price_decimal_sep');
			if (empty($sep)) $sep = '.';
			$price = preg_replace('/([0-9,]+)(\\'.trim($sep).')([0-9]{2})/', '\\1.<span class="decimals">\\3</span>', $price);
		}
		return $price;
	}
}


// Return current page title
if ( ! function_exists( 'petermason_woocommerce_get_blog_title' ) ) {
	//Handler of the add_filter( 'petermason_filter_get_blog_title', 'petermason_woocommerce_get_blog_title');
	function petermason_woocommerce_get_blog_title( $title = '' ) {
		if ( ! petermason_exists_trx_addons() && petermason_exists_woocommerce() && petermason_is_woocommerce_page() && is_shop() ) {
			$id    = petermason_woocommerce_get_shop_page_id();
			$title = $id ? get_the_title( $id ) : esc_html__( 'Shop', 'petermason' );
		}
		return $title;
	}
}



// Decorate WooCommerce output: Single product
//------------------------------------------------------------------------

// Hide sidebar on the single products and pages
if ( !function_exists( 'petermason_woocommerce_sidebar_present' ) ) {
	
	function petermason_woocommerce_sidebar_present($present) {
		return is_product() || is_cart() || is_checkout() || is_account_page() ? false : $present;
	}
}

// Add Product ID for the single product
if ( !function_exists( 'petermason_woocommerce_show_product_id' ) ) {
	
	function petermason_woocommerce_show_product_id() {
		$authors = wp_get_post_terms(get_the_ID(), 'pa_product_author');
		if (is_array($authors) && count($authors)>0) {
			echo '<span class="product_author">'.esc_html__('Author: ', 'petermason');
			$delim = '';
			foreach ($authors as $author) {
				echo  esc_html($delim) . '<span>' . esc_html($author->name) . '</span>';
				$delim = ', ';
			}
			echo '</span>';
		}
		echo '<span class="product_id">'.esc_html__('Product ID: ', 'petermason') . '<span>' . get_the_ID() . '</span></span>';
	}
}

// Number columns for the product's thumbnails
if ( !function_exists( 'petermason_woocommerce_product_thumbnails_columns' ) ) {
	
	function petermason_woocommerce_product_thumbnails_columns($cols) {
		return 4;
	}
}

// Set columns number for the related products
if ( !function_exists( 'petermason_woocommerce_output_related_products_args' ) ) {
	
	function petermason_woocommerce_output_related_products_args($args) {
		$args['posts_per_page'] = $args['columns'] = 4;
		return $args;
	}
}



// Decorate WooCommerce output: Widgets
//------------------------------------------------------------------------

// Search form
if ( !function_exists( 'petermason_woocommerce_get_product_search_form' ) ) {
	
	function petermason_woocommerce_get_product_search_form($form) {
		return '
		<form role="search" method="get" class="search_form" action="' . esc_url(home_url('/')) . '">
			<input type="text" class="search_field" placeholder="' . esc_attr__('Search for products &hellip;', 'petermason') . '" value="' . get_search_query() . '" name="s" /><button class="search_button" type="submit">' . esc_html__('Search', 'petermason') . '</button>
			<input type="hidden" name="post_type" value="product" />
		</form>
		';
	}
}



// Add WooCommerce specific styles into color scheme
//------------------------------------------------------------------------

// Add styles into CSS
if ( !function_exists( 'petermason_woocommerce_get_css' ) ) {
	
	function petermason_woocommerce_get_css($css, $colors, $fonts, $scheme='') {
		if (isset($css['fonts']) && $fonts) {
			$css['fonts'] .= <<<CSS

.woocommerce ul.products li.product h3, 
.woocommerce-page ul.products li.product h3,
.woocommerce .checkout table.shop_table .product-name .variation,
.woocommerce .shop_table.order_details td.product-name .variation {
	{$fonts['p_font-family']}
}
#btn-buy,
.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,
.woocommerce ul.products li.product .post_header, .woocommerce-page ul.products li.product .post_header,
.single-product div.product .trx-stretch-width .woocommerce-tabs .wc-tabs li a,
.woocommerce ul.products li.product .button, .woocommerce div.product form.cart .button,
.woocommerce .woocommerce-message .button,
.woocommerce #review_form #respond p.form-submit input[type="submit"], .woocommerce-page #review_form #respond p.form-submit input[type="submit"],
.woocommerce table.my_account_orders .order-actions .button,
.woocommerce .button, .woocommerce-page .button,
.woocommerce a.button,
.woocommerce button.button,
.woocommerce input.button
.woocommerce #respond input#submit,
.woocommerce input[type="button"], .woocommerce-page input[type="button"],
.woocommerce input[type="submit"], .woocommerce-page input[type="submit"],
.woocommerce .shop_table th,
.woocommerce span.onsale,
.woocommerce nav.woocommerce-pagination ul li a,
.woocommerce nav.woocommerce-pagination ul li span.current,
.woocommerce div.product p.price, .woocommerce div.product span.price,
.woocommerce div.product .summary .stock,
.woocommerce #reviews #comments ol.commentlist li .comment-text p.meta strong, .woocommerce-page #reviews #comments ol.commentlist li .comment-text p.meta strong,
.woocommerce table.cart td.product-name a, .woocommerce-page table.cart td.product-name a, 
.woocommerce #content table.cart td.product-name a, .woocommerce-page #content table.cart td.product-name a,
.woocommerce .checkout table.shop_table .product-name,
.woocommerce .shop_table.order_details td.product-name,
.woocommerce .order_details li strong,
.woocommerce-MyAccount-navigation,
.woocommerce-MyAccount-content .woocommerce-Address-title a {
	{$fonts['h5_font-family']}
}
.woocommerce ul.products li.product .post_header .post_tags,
.woocommerce div.product .product_meta span > a, .woocommerce div.product .product_meta span > span,
.woocommerce div.product form.cart .reset_variations,
.woocommerce #reviews #comments ol.commentlist li .comment-text p.meta time, .woocommerce-page #reviews #comments ol.commentlist li .comment-text p.meta time {
	{$fonts['info_font-family']}
}

CSS;
		}

		if (isset($css['colors']) && $colors) {
			$css['colors'] .= <<<CSS

/* Page header */
.woocommerce .woocommerce-breadcrumb {
	color: {$colors['text']};
}
.woocommerce .woocommerce-breadcrumb a {
	color: {$colors['text_link']};
}
.woocommerce .woocommerce-breadcrumb a:hover {
	color: {$colors['text_hover']};
}
.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
	background-color: {$colors['accent1']};
}

/* List and Single product */
.woocommerce .woocommerce-ordering select {
	border-color: {$colors['bd_color']};
}
.woocommerce span.onsale {
	color: {$colors['inverse_text']};
}
.single-product .post_item_single .product .onsale:before,
.woocommerce ul.products li.product .onsale:before, 
.woocommerce-page ul.products li.product .onsale:before {
	background-color: {$colors['accent1']};
}

.woocommerce ul.products li.product .outofstock_label {
	background-color: {$colors['accent1']};
}

.woocommerce .shop_mode_thumbs ul.products li.product .post_item, .woocommerce-page .shop_mode_thumbs ul.products li.product .post_item {
}
.woocommerce .shop_mode_thumbs ul.products li.product .post_item:hover, .woocommerce-page .shop_mode_thumbs ul.products li.product .post_item:hover {
}

.woocommerce ul.products li.product .post_header a {
	color: {$colors['text_link']};
}
.woocommerce ul.products li.product .post_header a:hover {
	color: {$colors['text_hover']};
}
.woocommerce ul.products li.product .post_header .post_tags,
.woocommerce ul.products li.product .post_header .post_tags a {
	color: {$colors['alter_link']};
}
.woocommerce ul.products li.product .post_header .post_tags a:hover {
	color: {$colors['alter_hover']};
}
.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,
.woocommerce ul.products li.product .price ins, .woocommerce-page ul.products li.product .price ins {
	color: {$colors['text_dark']};
}
.woocommerce ul.products li.product .price del, .woocommerce-page ul.products li.product .price del {
	color: {$colors['alter_light']};
}

.woocommerce div.product p.price, .woocommerce div.product span.price,
.woocommerce span.amount, .woocommerce-page span.amount {
	color: {$colors['text_dark']};
}
.woocommerce table.shop_table td span.amount {
	color: {$colors['text_dark']};
}
aside.woocommerce del,
.woocommerce del, .woocommerce del > span.amount, 
.woocommerce-page del, .woocommerce-page del > span.amount {
	color: {$colors['text_light']} !important;
}
.woocommerce .price del:before {
	background-color: {$colors['text_light']};
}
.woocommerce div.product form.cart .variations label {
	color: {$colors['text_dark']};
}
.woocommerce div.product form.cart div.quantity span, .woocommerce-page div.product form.cart div.quantity span {
	color: {$colors['text_link']};
}
.woocommerce div.product form.cart div.quantity span:hover, .woocommerce-page div.product form.cart div.quantity span:hover {
	color: {$colors['text_hover']};
}
.woocommerce div.product form.cart div.quantity input[type="number"], .woocommerce-page div.product form.cart div.quantity input[type="number"] {
	border-color: {$colors['text_link']};
}

.woocommerce div.product .product_meta span > a,
.woocommerce div.product .product_meta span > span {
	color: {$colors['text_dark']};
}
.woocommerce div.product .product_meta a:hover {
	color: {$colors['text_link']};
}
.woocommerce div.product .summary form.cart .button {
	border-color: {$colors['text_hover_05']};
}
.woocommerce div.product div.images img {
	border-color: {$colors['bd_color']};
}
.woocommerce div.product div.images a:hover img {
	border-color: {$colors['text_link']};
}
.single-product div.product .trx-stretch-width .woocommerce-tabs{
	border-color: {$colors['alter_bd_color']};
}
.single-product div.product .trx-stretch-width .woocommerce-tabs .wc-tabs li a {
	color: {$colors['bg_color']};
	background-color: {$colors['text_dark']};
}
.single-product div.product .trx-stretch-width .woocommerce-tabs .wc-tabs li.active a,
.single-product div.product .trx-stretch-width .woocommerce-tabs .wc-tabs li a:hover {
	color: {$colors['inverse_dark']} !important;
	background-color: {$colors['text_link']};
}
.woocommerce table.shop_attributes tr:nth-child(2n+1) > th {
	background-color: {$colors['alter_bg_color_04']};
}
.woocommerce table.shop_attributes tr:nth-child(2n) > th {
	background-color: {$colors['alter_bg_color_02']};
}
.woocommerce table.shop_attributes th {
	color: {$colors['text_dark']};
}


/* Related Products */
.single-product .related {
	border-color: {$colors['alter_bd_color']};
}
.single-product ul.products li.product .post_data {

}
.single-product ul.products li.product .post_data .price span.amount {
	color: {$colors['text_dark']};
}
.single-product ul.products li.product .post_data .post_header .post_tags,
.single-product ul.products li.product .post_data .post_header .post_tags a,
.single-product ul.products li.product .post_data a {
	color: {$colors['text_link']};
}
.single-product ul.products li.product .post_data .post_header .post_tags a:hover,
.single-product ul.products li.product .post_data a:hover {
	color: {$colors['text_hover']};
}
.single-product ul.products li.product .post_data .button {
}
.single-product ul.products li.product .post_data .button:hover {
	color: {$colors['inverse_dark']};
}

.single-product.woocommerce .related.products ul.products li.product .price {
	color: {$colors['text_dark']};
}

/* Rating */
.star-rating span,
.star-rating:before {
	color: {$colors['text_link']};
}
#review_form #respond p.form-submit input[type="submit"] {
	color: {$colors['inverse_text']};
	background-color: {$colors['text_hover']};
}
#review_form #respond p.form-submit input[type="submit"]:hover,
#review_form #respond p.form-submit input[type="submit"]:focus {
	color: {$colors['inverse_dark']};
	background-color: {$colors['text_link']};
}

/* Buttons */
.petermason_shop_mode_buttons a {
	color: {$colors['text_hover']};
}
.petermason_shop_mode_buttons a:hover {
	color: {$colors['text_link']};
}
.woocommerce #respond input#submit,
.woocommerce .button, .woocommerce-page .button,
.woocommerce a.button, .woocommerce-page a.button,
.woocommerce button.button, .woocommerce-page button.button,
.woocommerce input.button, .woocommerce-page input.button,
.woocommerce input[type="button"], .woocommerce-page input[type="button"],
.woocommerce input[type="submit"], .woocommerce-page input[type="submit"],
.woocommerce nav.woocommerce-pagination ul li a {
	color: {$colors['bg_color']};
	background-color: {$colors['text_hover']};
}
#btn-buy{
	background-color: {$colors['bg_color']};
}
#btn-buy:hover,
.woocommerce #respond input#submit:hover,
.woocommerce .button:hover, .woocommerce-page .button:hover,
.woocommerce a.button:hover, .woocommerce-page a.button:hover,
.woocommerce button.button:hover, .woocommerce-page button.button:hover,
.woocommerce input.button:hover, .woocommerce-page input.button:hover,
.woocommerce input[type="button"]:hover, .woocommerce-page input[type="button"]:hover,
.woocommerce input[type="submit"]:hover, .woocommerce-page input[type="submit"]:hover,
.woocommerce nav.woocommerce-pagination ul li a:hover,
.woocommerce nav.woocommerce-pagination ul li span.current {
	color: {$colors['bg_color']} !important;
	background-color: {$colors['text_hover']};
}


.woocommerce #respond input#submit.alt,
.woocommerce a.button.alt,
.woocommerce button.button.alt,
.woocommerce input.button.alt {
	color: {$colors['inverse_text']};
	background-color: {$colors['text_hover']};
}

.woocommerce #respond input#submit.alt:hover,
.woocommerce a.button.alt:hover,
.woocommerce button.button.alt:hover,
.woocommerce input.button.alt:hover {
	background-color: {$colors['text_hover']};
}


/* Messages */
.woocommerce .woocommerce-message,
.woocommerce .woocommerce-info {
	background-color: {$colors['alter_bg_color']};
	border-top-color: {$colors['alter_dark']};
}
.woocommerce .woocommerce-error {
	background-color: {$colors['alter_bg_color']};
	border-top-color: {$colors['alter_link']};
}
.woocommerce .woocommerce-message:before,
.woocommerce .woocommerce-info:before {
	color: {$colors['alter_dark']};
}
.woocommerce .woocommerce-error:before {
	color: {$colors['alter_link']};
}
.woocommerce .woocommerce-message .button,
.woocommerce .woocommerce-error .button,
.woocommerce .woocommerce-info .button {
	color: {$colors['inverse_dark']};
	background-color: {$colors['text_hover']};
}


/* Cart */
.woocommerce table.shop_table td {
	border-color: {$colors['alter_bd_color']} !important;
}
.woocommerce table.shop_table th {
	border-color: {$colors['alter_bd_color_02']} !important;
}
.woocommerce table.shop_table tfoot th, .woocommerce-page table.shop_table tfoot th {
	color: {$colors['text_dark']};
	border-color: transparent !important;
	background-color: transparent;
}
.woocommerce .quantity input.qty, .woocommerce #content .quantity input.qty, .woocommerce-page .quantity input.qty, .woocommerce-page #content .quantity input.qty {
	color: {$colors['input_dark']};
}
.woocommerce .cart-collaterals .cart_totals table select, .woocommerce-page .cart-collaterals .cart_totals table select {
	color: {$colors['input_light']};
	background-color: {$colors['input_bg_color']};
}
.woocommerce .cart-collaterals .cart_totals table select:focus, .woocommerce-page .cart-collaterals .cart_totals table select:focus {
	color: {$colors['input_text']};
	background-color: {$colors['input_bg_hover']};
}
.woocommerce .cart-collaterals .shipping_calculator .shipping-calculator-button:after, .woocommerce-page .cart-collaterals .shipping_calculator .shipping-calculator-button:after {
	color: {$colors['text_dark']};
}
.woocommerce table.shop_table .cart-subtotal .amount, .woocommerce-page table.shop_table .cart-subtotal .amount,
.woocommerce table.shop_table .shipping td, .woocommerce-page table.shop_table .shipping td {
	color: {$colors['text_dark']};
}
.woocommerce table.cart td+td a, .woocommerce #content table.cart td+td a, .woocommerce-page table.cart td+td a, .woocommerce-page #content table.cart td+td a,
.woocommerce table.cart td+td span, .woocommerce #content table.cart td+td span, .woocommerce-page table.cart td+td span, .woocommerce-page #content table.cart td+td span {
	color: {$colors['text_dark']};
}
.woocommerce table.cart td+td a:hover, .woocommerce #content table.cart td+td a:hover, .woocommerce-page table.cart td+td a:hover, .woocommerce-page #content table.cart td+td a:hover {
	color: {$colors['text_link']};
}
#add_payment_method table.cart td.actions .coupon .input-text, .woocommerce-cart table.cart td.actions .coupon .input-text, .woocommerce-checkout table.cart td.actions .coupon .input-text {
	border-color: {$colors['input_bd_color']};
}


/* Checkout */
.woocommerce-checkout #payment {
	background-color:{$colors['alter_bg_color']};
}
#add_payment_method #payment div.payment_box, .woocommerce-cart #payment div.payment_box, .woocommerce-checkout #payment div.payment_box {
	color:{$colors['input_dark']};
	background-color:{$colors['input_bg_hover']};
}
#add_payment_method #payment div.payment_box:before, .woocommerce-cart #payment div.payment_box:before, .woocommerce-checkout #payment div.payment_box:before {
	border-color: transparent transparent {$colors['input_bg_hover']};
}
.woocommerce .order_details li strong, .woocommerce-page .order_details li strong {
	color: {$colors['text_dark']};
}
.woocommerce .order_details.woocommerce-thankyou-order-details {
	color:{$colors['alter_text']};
	background-color:{$colors['alter_bg_color']};
}
.woocommerce .order_details.woocommerce-thankyou-order-details strong {
	color:{$colors['alter_dark']};
}

/* My Account */
.woocommerce-account .woocommerce-MyAccount-navigation,
.woocommerce-MyAccount-navigation ul li,
.woocommerce-MyAccount-navigation li+li {
	border-color: {$colors['bd_color']};
}
.woocommerce-MyAccount-navigation li.is-active a {
	color: {$colors['text_link']};
}

/* Widgets */
.widget_product_search form:after {
	color: {$colors['input_light']};
}
.widget_product_search form:hover:after {
	color: {$colors['input_dark']};
}
.widget_product_search .search_button {
	background-color: {$colors['text_link']};
	color: {$colors['inverse_text']};
}
.widget_shopping_cart .total {
	color: {$colors['text_dark']};
	border-color: {$colors['bd_color']};
}
.widget_layered_nav ul li.chosen a {
	color: {$colors['text_dark']};
}
.widget_price_filter .price_slider_wrapper .ui-widget-content { 
	background: {$colors['text_light']};
}
.widget_price_filter .price_label {
	color: {$colors['text_dark']};
}
.widget_price_filter .price_label span {
	color: {$colors['text_dark']};
}

.woocommerce .widget_shopping_cart .cart_list li a.remove, .woocommerce.widget_shopping_cart .cart_list li a.remove{
	color: {$colors['text_hover']} !important;
}
.woocommerce .widget_shopping_cart .cart_list li a.remove:hover, .woocommerce.widget_shopping_cart .cart_list li a.remove:hover{
	color: {$colors['text_link']} !important;
}
.woocommerce.widget_shopping_cart .quantity, .woocommerce .widget_shopping_cart .quantity, .woocommerce-page.widget_shopping_cart .quantity, .woocommerce-page .widget_shopping_cart .quantity{
	color: {$colors['text_light']};
}

.widget_shopping_cart ul.cart_list li a, 
.widget_shopping_cart ul.product_list_widget li a, 
.widget_shopping_cart ul.cart_list li a, 
.widget_shopping_cart ul.product_list_widget li a {
	color: {$colors['text_dark']};
}
.widget_shopping_cart ul.cart_list li a:hover, 
.widget_shopping_cart ul.product_list_widget li a:hover, 
.widget_shopping_cart ul.cart_list li a:hover, 
.widget_shopping_cart ul.product_list_widget li a:hover {
	color: {$colors['text_hover']};
}

.woocommerce.widget_shopping_cart .total:before, .woocommerce .widget_shopping_cart .total:before, .woocommerce-page.widget_shopping_cart .total:before, .woocommerce-page .widget_shopping_cart .total:before{
	border-color: {$colors['text_hover']};
}

.woocommerce.widget_shopping_cart .total .amount, .woocommerce .widget_shopping_cart .total .amount, .woocommerce-page.widget_shopping_cart .total .amount, .woocommerce-page .widget_shopping_cart .total .amount {
	color: {$colors['text_hover']};
}
#btn-buy,
.woocommerce ul.products li.product .button,
.woocommerce-page ul.products li.product .button,
.woocommerce ul.products li.product .post_data .add_to_cart_button,
.woocommerce-page ul.products li.product .post_data .add_to_cart_button {
	color: {$colors['text_hover']};
	border-color: {$colors['text_hover_05']};
}

.woocommerce p.stars a {
	color: {$colors['text_hover']};
	border-color: {$colors['text_hover']};
}

.woocommerce input.button:disabled, 
.woocommerce input.button[disabled]:disabled {
}

.woocommerce table.shop_table td.actions input[type="submit"] {
	color:  {$colors['text_hover']};
	border-color:  {$colors['text_hover']};

}

.woocommerce div.product form.cart .variations td.value .select_container select {
	color:  {$colors['text_link']};
}

CSS;
		}
		
		return $css;
	}
}
?>