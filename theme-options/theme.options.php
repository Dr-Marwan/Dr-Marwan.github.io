<?php
/**
 * Default Theme Options and Internal Theme Settings
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0
 */

// -----------------------------------------------------------------
// -- ONLY FOR PROGRAMMERS, NOT FOR CUSTOMER
// -- Internal theme settings
// -----------------------------------------------------------------
petermason_storage_set('settings', array(
	
	'custom_sidebars'			=> 8,							// How many custom sidebars will be registered (in addition to theme preset sidebars): 0 - 10

	'ajax_views_counter'		=> true,						// Use AJAX for increment posts counter (if cache plugins used) 
																// or increment posts counter then loading page (without cache plugin)
	'disable_jquery_ui'			=> false,						// Prevent loading custom jQuery UI libraries in the third-party plugins

	'max_load_fonts'			=> 3,							// Max fonts number to load from Google fonts or from uploaded fonts

	'use_mediaelements'			=> true,						// Load script "Media Elements" to play video and audio

	'max_excerpt_length'		=> 60,							// Max words number for the excerpt in the blog style 'Excerpt'.
																// For style 'Classic' - get half from this value
	'message_maxlength'			=> 1000							// Max length of the message from contact form
	
));



// -----------------------------------------------------------------
// -- Theme fonts (Google and/or custom fonts)
// -----------------------------------------------------------------

// Fonts to load when theme start
// It can be Google fonts or uploaded fonts, placed in the folder /css/font-face/font-name inside the theme folder
// Attention! Font's folder must have name equal to the font's name, with spaces replaced on the dash '-'

petermason_storage_set('load_fonts', array(
	// Google font
	array(
		'name'	 => 'Raleway',
		'family' => 'sans-serif',
		'styles' => '100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i'		// Parameter 'style' used only for the Google fonts
		),
	array(
		'name'	 => 'Playfair Display',
		'family' => 'serif',
		'styles' => '400,400i,700,700i,900,900i'		// Parameter 'style' used only for the Google fonts
		),
	// Font-face packed with theme
	array(
		'name'   => 'Butler',
		'family' => 'serif'
		)
));

// Characters subset for the Google fonts. Available values are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese
petermason_storage_set('load_fonts_subset', 'latin,latin-ext');

// Settings of the main tags
petermason_storage_set('theme_fonts', array(
	'p' => array(
		'title'				=> esc_html__('Main text', 'petermason'),
		'description'		=> esc_html__('Font settings of the main text of the site', 'petermason'),
		'font-family'		=> '"Raleway", sans-serif',
		'font-size' 		=> '1rem',
		'font-weight'		=> '400',
		'font-style'		=> 'normal',
		'line-height'		=> '1.95em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '0.02em',
		'margin-top'		=> '0em',
		'margin-bottom'		=> '1.4em'
		),
	'h1' => array(
		'title'				=> esc_html__('Heading 1', 'petermason'),
		'font-family'		=> '"Butler", serif',
		'font-size' 		=> '4.286rem',
		'font-weight'		=> '400',
		'font-style'		=> 'normal',
		'line-height'		=> '1.2em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'uppercase',
		'letter-spacing'	=> '0.14em',
		'margin-top'		=> '0.9583em',
		'margin-bottom'		=> '0.95em'
		),
	'h2' => array(
		'title'				=> esc_html__('Heading 2', 'petermason'),
		'font-family'		=> '"Butler", serif',
		'font-size' 		=> '3.929rem',
		'font-weight'		=> '400',
		'font-style'		=> 'normal',
		'line-height'		=> '1.2em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'uppercase',
		'letter-spacing'	=> '0.04em',
		'margin-top'		=> '1.45em',
		'margin-bottom'		=> '0.72em'
		),
	'h3' => array(
		'title'				=> esc_html__('Heading 3', 'petermason'),
		'font-family'		=> '"Butler", serif',
		'font-size' 		=> '3.214rem',
		'font-weight'		=> '400',
		'font-style'		=> 'normal',
		'line-height'		=> '1.222em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'uppercase',
		'letter-spacing'	=> '0.04em',
		'margin-top'		=> '1.85em',
		'margin-bottom'		=> '0.94em'
		),
	'h4' => array(
		'title'				=> esc_html__('Heading 4', 'petermason'),
		'font-family'		=> '"Butler", serif',
		'font-size' 		=> '2.143rem',
		'font-weight'		=> '400',
		'font-style'		=> 'normal',
		'line-height'		=> '1.2em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'uppercase',
		'letter-spacing'	=> '0.1em',
		'margin-top'		=> '2.11em',
		'margin-bottom'		=> '0.85em'
		),
	'h5' => array(
		'title'				=> esc_html__('Heading 5', 'petermason'),
		'font-family'		=> '"Raleway", sans-serif',
		'font-size' 		=> '1.143em',
		'font-weight'		=> '400',
		'font-style'		=> 'normal',
		'line-height'		=> '1.35em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '0.02em',
		'margin-top'		=> '3.1em',
		'margin-bottom'		=> '1.8em'
		),
	'h6' => array(
		'title'				=> esc_html__('Heading 6', 'petermason'),
		'font-family'		=> '"Raleway", sans-serif',
		'font-size' 		=> '0.929rem',
		'font-weight'		=> '700',
		'font-style'		=> 'normal',
		'line-height'		=> '1.45em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'uppercase',
		'letter-spacing'	=> '0.54em',
		'margin-top'		=> '3.7em',
		'margin-bottom'		=> '2.25em'
		),
	'logo' => array(
		'title'				=> esc_html__('Logo text', 'petermason'),
		'description'		=> esc_html__('Font settings of the text case of the logo', 'petermason'),
		'font-family'		=> '"Butler", serif',
		'font-size' 		=> '1.8em',
		'font-weight'		=> '400',
		'font-style'		=> 'normal',
		'line-height'		=> '1.25em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'uppercase',
		'letter-spacing'	=> '1px'
		),
	'button' => array(
		'title'				=> esc_html__('Buttons', 'petermason'),
		'font-family'		=> '"Raleway", sans-serif',
		'font-size' 		=> '0.786rem',
		'font-weight'		=> '600',
		'font-style'		=> 'normal',
		'line-height'		=> '1',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'uppercase',
		'letter-spacing'	=> '0.25em'
		),
	'input' => array(
		'title'				=> esc_html__('Input fields', 'petermason'),
		'description'		=> esc_html__('Font settings of the input fields, dropdowns and textareas', 'petermason'),
		'font-family'		=> '"Raleway", sans-serif',
		'font-size' 		=> '1em',
		'font-weight'		=> '400',
		'font-style'		=> 'normal',
		'line-height'		=> '1',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> ''
		),
	'info' => array(
		'title'				=> esc_html__('Post meta', 'petermason'),
		'description'		=> esc_html__('Font settings of the post meta: date, counters, share, etc.', 'petermason'),
		'font-family'		=> '"Raleway", sans-serif',
		'font-size' 		=> '11px',
		'font-weight'		=> '600',
		'font-style'		=> 'normal',
		'line-height'		=> '1em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'uppercase',
		'letter-spacing'	=> '0.2em',
		'margin-top'		=> '3.3em',
		'margin-bottom'		=> ''
		),
	'menu' => array(
		'title'				=> esc_html__('Main menu', 'petermason'),
		'description'		=> esc_html__('Font settings of the main menu items', 'petermason'),
		'font-family'		=> '"Raleway", sans-serif',
		'font-size' 		=> '11px',
		'font-weight'		=> '600',
		'font-style'		=> 'normal',
		'line-height'		=> '1.55em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'uppercase',
		'letter-spacing'	=> '0.3em'
		),
	'submenu' => array(
		'title'				=> esc_html__('Dropdown menu', 'petermason'),
		'description'		=> esc_html__('Font settings of the dropdown menu items', 'petermason'),
		'font-family'		=> '"Raleway", sans-serif',
		'font-size' 		=> '11px',
		'font-weight'		=> '600',
		'font-style'		=> 'normal',
		'line-height'		=> '1.5em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'uppercase',
		'letter-spacing'	=> '0.3em'
		)
));


// -----------------------------------------------------------------
// -- Theme colors for customizer
// -- Attention! Inner scheme must be last in the array below
// -----------------------------------------------------------------
petermason_storage_set('schemes', array(

	// Color scheme: 'default'
	'default' => array(
		'title'	 => esc_html__('Default', 'petermason'),
		'colors' => array(
			
			// Whole block border and background
			'bg_color'				=> '#ffffff', //
			'bd_color'				=> '#be9667', //

			// Text and links colors
			'text'					=> '#757575', //
			'text_light'			=> '#b7b7b7', //
			'text_dark'				=> '#160c06', //
			'text_link'				=> '#160c06', //
			'text_hover'			=> '#be9667', //

			// Alternative blocks (submenu, buttons, tabs, etc.)
			'alter_bg_color'		=> '#f9f8f8', //
			'alter_bg_hover'		=> '#f3f7f8', //
			'alter_bd_color'		=> '#e8d7c2', //
			'alter_bd_hover'		=> '#be9667', //
			'alter_text'			=> '#e4e4e4', //
			'alter_light'			=> '#979797', //
			'alter_dark'			=> '#878686', //
			'alter_link'			=> '#5f5f5f', //
			'alter_hover'			=> '#33a1e3',

			// Input fields (form's fields and textarea)
			'input_bg_color'		=> '#f9f8f8', //
			'input_bg_hover'		=> '#f9f8f8', //
			'input_bd_color'		=> '#f9f8f8', //
			'input_bd_hover'		=> '#be9667', //
			'input_text'			=> '#a4a4a4', //
			'input_light'			=> '#b0b4c2', //
			'input_dark'			=> '#160c06',
			
			// Inverse blocks (text and links on accented bg)
			'inverse_text'			=> '#ffffff', //
			'inverse_light'			=> '#f7f7f7',
			'inverse_dark'			=> '#ffffff',
			'inverse_link'			=> '#ffffff',
			'inverse_hover'			=> '#13162b',

			// Additional accented colors (if used in the current theme)
			
			'accent1'				=> '#be9667' //
		
		)
	),

	// Color scheme: 'dark'
	'dark' => array(
		'title'  => esc_html__('Dark', 'petermason'),
		'colors' => array(
			
			// Whole block border and background
			'bg_color'				=> '#160c06', //
			'bd_color'				=> '#453d38', //

			// Text and links colors
			'text'					=> '#a4a4a4', //
			'text_light'			=> '#6b6765', //
			'text_dark'				=> '#ffffff', //
			'text_link'				=> '#ffffff', //
			'text_hover'			=> '#be9667', //

			// Alternative blocks (submenu, buttons, tabs, etc.)
			'alter_bg_color'		=> '#2a2a2a', //
			'alter_bg_hover'		=> '#f3f7f8', //
			'alter_bd_color'		=> '#e8d7c2', //
			'alter_bd_hover'		=> '#be9667', //
			'alter_text'			=> '#e4e4e4', //
			'alter_light'			=> '#979797', //
			'alter_dark'			=> '#ffffff', //
			'alter_link'			=> '#5f5f5f', //
			'alter_hover'			=> '#33a1e3',

			// Input fields (form's fields and textarea)
			'input_bg_color'		=> '#f9f8f8', //
			'input_bg_hover'		=> '#f9f8f8', //
			'input_bd_color'		=> '#f9f8f8', //
			'input_bd_hover'		=> '#be9667', //
			'input_text'			=> '#a4a4a4', //
			'input_light'			=> '#b0b4c2', //
			'input_dark'			=> '#ffffff',
			
			// Inverse blocks (text and links on accented bg)
			'inverse_text'			=> '#a4a4a4', //
			'inverse_light'			=> '#bac0c3',
			'inverse_dark'			=> '#ffffff',
			'inverse_link'			=> '#000000',
			'inverse_hover'			=> '#1e1d22',
		
			// Additional accented colors (if used in the current theme)
			
			'accent1'				=> '#be9667' //

		)
	)

));



// -----------------------------------------------------------------
// -- Theme options for customizer
// -----------------------------------------------------------------
if (!function_exists('petermason_options_create')) {

	function petermason_options_create() {

		petermason_storage_set('options', array(
		
			// Section 'Title & Tagline' - add theme options in the standard WP section
			'title_tagline' => array(
				"title" => esc_html__('Title, Tagline & Site icon', 'petermason'),
				"desc" => wp_kses_data( __('Specify site title and tagline (if need) and upload the site icon', 'petermason') ),
				"type" => "section"
				),
		
		
			// Section 'Header' - add theme options in the standard WP section
			'header_image' => array(
				"title" => esc_html__('Header', 'petermason'),
				"desc" => wp_kses_data( __('Select or upload logo images, select header type and widgets set for the header', 'petermason') ),
				"type" => "section"
				),
			'header_image_override' => array(
				"title" => esc_html__('Header image override', 'petermason'),
				"desc" => wp_kses_data( __("Allow override the header image with the page's/post's/product's/etc. featured image", 'petermason') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'petermason')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'header_video' => array(
				"title" => esc_html__('Header video', 'petermason'),
				"desc" => wp_kses_data( __("Select video to use it as background for the header", 'petermason') ),
				
				
				
				
				"std" => '',
				"hidden" => true,
				"type" => "video"
				),
			'header_fullheight' => array(
				"title" => esc_html__('Header fullheight', 'petermason'),
				"desc" => wp_kses_data( __("Enlarge header area to fill whole screen. Used only if header have a background image", 'petermason') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'petermason')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'header_wide' => array(
				"title" => esc_html__('Header fullwide', 'petermason'),
				"desc" => wp_kses_data( __('Do you want to stretch the header widgets area to the entire window width?', 'petermason') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'petermason')
				),
				"std" => 1,
				"type" => "checkbox"
				),
			'header_style' => array(
				"title" => esc_html__('Header style', 'petermason'),
				"desc" => wp_kses_data( __('Select style to display the site header', 'petermason') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'petermason')
				),
				"std" => 'header-default',
				"options" => apply_filters('petermason_filter_list_header_styles', array(
					'header-default' => esc_html__('Default Header',	'petermason')
				)),
				"type" => "select"
				),
			'header_position' => array(
				"title" => esc_html__('Header position', 'petermason'),
				"desc" => wp_kses_data( __('Select position to display the site header', 'petermason') ),
				"hidden" => true,
				"std" => 'default',
				"options" => array(
					'default' => esc_html__('Default','petermason')
				),
				"type" => "select"
				),
			'header_widgets' => array(
				"title" => esc_html__('Header widgets', 'petermason'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the header on each page', 'petermason') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'petermason'),
					"desc" => wp_kses_data( __('Select set of widgets to show in the header on this page', 'petermason') ),
				),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
				"type" => "select"
				),
			'header_columns' => array(
				"title" => esc_html__('Header columns', 'petermason'),
				"desc" => wp_kses_data( __('Select number columns to show widgets in the Header. If 0 - autodetect by the widgets count', 'petermason') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'petermason')
				),
				"dependency" => array(
					'header_widgets' => array('^hide')
				),
				"std" => 0,
				"options" => petermason_get_list_range(0,6),
				"type" => "select"
				),
			'header_scheme' => array(
				"title" => esc_html__('Header Color Scheme', 'petermason'),
				"desc" => wp_kses_data( __('Select color scheme to decorate header area', 'petermason') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'petermason')
				),
				"std" => 'inherit',
				"options" => petermason_get_list_schemes(true),
				"refresh" => false,
				"type" => "select"
				),
			'menu_info' => array(
				"title" => esc_html__('Menu settings', 'petermason'),
				"desc" => wp_kses_data( __('Select main menu style, position, color scheme and other parameters', 'petermason') ),
				"type" => "info"
				),
			'menu_style' => array(
				"title" => esc_html__('Menu position', 'petermason'),
				"desc" => wp_kses_data( __('Select position of the main menu', 'petermason') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'petermason')
				),
				"std" => 'top',
				"options" => array(
					'top'	=> esc_html__('Top',	'petermason')
				),
				"type" => "switch"
				),
			'menu_scheme' => array(
				"title" => esc_html__('Menu Color Scheme', 'petermason'),
				"desc" => wp_kses_data( __('Select color scheme to decorate main menu area', 'petermason') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'petermason')
				),
				"std" => 'inherit',
				"options" => petermason_get_list_schemes(true),
				"refresh" => false,
				"type" => "select"
				),
			'menu_side_stretch' => array(
				"title" => esc_html__('Stretch sidemenu', 'petermason'),
				"desc" => wp_kses_data( __('Stretch sidemenu to window height (if menu items number >= 5)', 'petermason') ),
				"dependency" => array(
					'menu_style' => array('left', 'right')
				),
				"std" => 1,
				"type" => "checkbox"
				),
			'menu_side_icons' => array(
				"title" => esc_html__('Iconed sidemenu', 'petermason'),
				"desc" => wp_kses_data( __('Get icons from anchors and display it in the sidemenu or mark sidemenu items with simple dots', 'petermason') ),
				"dependency" => array(
					'menu_style' => array('left', 'right')
				),
				"std" => 1,
				"type" => "checkbox"
				),
			'menu_mobile_fullscreen' => array(
				"title" => esc_html__('Mobile menu fullscreen', 'petermason'),
				"desc" => wp_kses_data( __('Display mobile and side menus on full screen (if checked) or slide narrow menu from the left or from the right side (if not checked)', 'petermason') ),
				"dependency" => array(
					'menu_style' => array('left', 'right')
				),
				"std" => 1,
				"type" => "checkbox"
				),
			'logo_info' => array(
				"title" => esc_html__('Logo settings', 'petermason'),
				"desc" => wp_kses_data( __('Select logo images for the normal and Retina displays', 'petermason') ),
				"type" => "info"
				),
			'logo' => array(
				"title" => esc_html__('Logo', 'petermason'),
				"desc" => wp_kses_data( __('Select or upload site logo', 'petermason') ),
				"std" => '',
				"type" => "image"
				),
			'logo_retina' => array(
				"title" => esc_html__('Logo for Retina', 'petermason'),
				"desc" => wp_kses_data( __('Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'petermason') ),
				"std" => '',
				"type" => "image"
				),
			'logo_inverse' => array(
				"title" => esc_html__('Logo inverse', 'petermason'),
				"desc" => wp_kses_data( __('Select or upload site logo to display it on the dark background', 'petermason') ),
				"std" => '',
				"type" => "image"
				),
			'logo_inverse_retina' => array(
				"title" => esc_html__('Logo inverse for Retina', 'petermason'),
				"desc" => wp_kses_data( __('Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'petermason') ),
				"std" => '',
				"type" => "image"
				),
			'logo_side' => array(
				"title" => esc_html__('Logo side', 'petermason'),
				"desc" => wp_kses_data( __('Select or upload site logo (with vertical orientation) to display it in the side menu', 'petermason') ),
				"std" => '',
				"hidden" => true,
				"type" => "image"
				),
			'logo_side_retina' => array(
				"title" => esc_html__('Logo side for Retina', 'petermason'),
				"desc" => wp_kses_data( __('Select or upload site logo (with vertical orientation) to display it in the side menu on Retina displays (if empty - use default logo from the field above)', 'petermason') ),
				"std" => '',
				"hidden" => true,
				"type" => "image"
				),
			'logo_text' => array(
				"title" => esc_html__('Logo from Site name', 'petermason'),
				"desc" => wp_kses_data( __('Do you want use Site name and description as Logo if images above are not selected?', 'petermason') ),
				"std" => 1,
				"type" => "checkbox"
				),
			
		
		
			// Section 'Content'
			'content' => array(
				"title" => esc_html__('Content', 'petermason'),
				"desc" => wp_kses_data( __('Options for the content area', 'petermason') ),
				"type" => "section",
				),
			'body_style' => array(
				"title" => esc_html__('Body style', 'petermason'),
				"desc" => wp_kses_data( __('Select width of the body content', 'petermason') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'petermason')
				),
				"refresh" => false,
				"std" => 'wide',
				"options" => array(
					'boxed'		=> esc_html__('Boxed',		'petermason'),
					'wide'		=> esc_html__('Wide',		'petermason')
				),
				"type" => "select"
				),
			'color_scheme' => array(
				"title" => esc_html__('Site Color Scheme', 'petermason'),
				"desc" => wp_kses_data( __('Select color scheme to decorate whole site. Attention! Case "Inherit" can be used only for custom pages, not for root site content in the Appearance - Customize', 'petermason') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'petermason')
				),
				"std" => 'default',
				"options" => petermason_get_list_schemes(true),
				"refresh" => false,
				"type" => "select"
				),
			'expand_content' => array(
				"title" => esc_html__('Expand content', 'petermason'),
				"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden', 'petermason') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Content', 'petermason')
				),
				"refresh" => false,
				"std" => 1,
				"type" => "checkbox"
				),
			'remove_margins' => array(
				"title" => esc_html__('Remove margins', 'petermason'),
				"desc" => wp_kses_data( __('Remove margins above and below the content area', 'petermason') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Content', 'petermason')
				),
				"refresh" => false,
				"std" => 0,
				"type" => "checkbox"
				),
			'seo_snippets' => array(
				"title" => esc_html__('SEO snippets', 'petermason'),
				"desc" => wp_kses_data( __('Add structured data markup to the single posts and pages', 'petermason') ),
				"std" => 0,
				"type" => "checkbox"
				),
            'privacy_text' => array(
                "title" => esc_html__("Text with Privacy Policy link", 'petermason'),
                "desc"  => wp_kses_data( __("Specify text with Privacy Policy link for the checkbox 'I agree ...'", 'petermason') ),
                "std"   => wp_kses( __( 'I agree that my submitted data is being collected and stored.', 'petermason' ), 'petermason_kses_content' ),
                "type"  => "text"
            ),
			'boxed_bg_image' => array(
				"title" => esc_html__('Boxed bg image', 'petermason'),
				"desc" => wp_kses_data( __('Select or upload image, used as background in the boxed body', 'petermason') ),
				"dependency" => array(
					'body_style' => array('boxed')
				),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'petermason')
				),
				"std" => '',
				"type" => "image"
				),
			'no_image' => array(
				"title" => esc_html__('No image placeholder', 'petermason'),
				"desc" => wp_kses_data( __('Select or upload image, used as placeholder for the posts without featured image', 'petermason') ),
				"std" => '',
				"type" => "image"
				),
			'sidebar_widgets' => array(
				"title" => esc_html__('Sidebar widgets', 'petermason'),
				"desc" => wp_kses_data( __('Select default widgets to show in the sidebar', 'petermason') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'petermason')
				),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
				"type" => "select"
				),
			'sidebar_scheme' => array(
				"title" => esc_html__('Color Scheme', 'petermason'),
				"desc" => wp_kses_data( __('Select color scheme to decorate sidebar', 'petermason') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'petermason')
				),
				"std" => 'default',
				"options" => petermason_get_list_schemes(true),
				"refresh" => false,
				"type" => "select"
				),
			'sidebar_position' => array(
				"title" => esc_html__('Sidebar position', 'petermason'),
				"desc" => wp_kses_data( __('Select position to show sidebar', 'petermason') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'petermason')
				),
				"refresh" => false,
				"std" => 'right',
				"options" => petermason_get_list_sidebars_positions(),
				"type" => "select"
				),
			'widgets_above_page' => array(
				"title" => esc_html__('Widgets above the page', 'petermason'),
				"desc" => wp_kses_data( __('Select widgets to show above page (content and sidebar)', 'petermason') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Widgets', 'petermason')
				),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_above_content' => array(
				"title" => esc_html__('Widgets above the content', 'petermason'),
				"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'petermason') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Widgets', 'petermason')
				),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_below_content' => array(
				"title" => esc_html__('Widgets below the content', 'petermason'),
				"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'petermason') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Widgets', 'petermason')
				),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_below_page' => array(
				"title" => esc_html__('Widgets below the page', 'petermason'),
				"desc" => wp_kses_data( __('Select widgets to show below the page (content and sidebar)', 'petermason') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Widgets', 'petermason')
				),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
				"type" => "select"
				),
		
		
		
			// Section 'Footer'
			'footer' => array(
				"title" => esc_html__('Footer', 'petermason'),
				"desc" => wp_kses_data( __('Select set of widgets and columns number for the site footer', 'petermason') ),
				"type" => "section"
				),
			'footer_style' => array(
				"title" => esc_html__('Footer style', 'petermason'),
				"desc" => wp_kses_data( __('Select style to display the site footer', 'petermason') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Footer', 'petermason')
				),
				"std" => 'footer-default',
				"options" => apply_filters('petermason_filter_list_footer_styles', array(
					'footer-default' => esc_html__('Default Footer',	'petermason')
				)),
				"type" => "select"
				),
			'footer_scheme' => array(
				"title" => esc_html__('Footer Color Scheme', 'petermason'),
				"desc" => wp_kses_data( __('Select color scheme to decorate footer area', 'petermason') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'petermason')
				),
				"std" => 'dark',
				"options" => petermason_get_list_schemes(true),
				"refresh" => false,
				"type" => "select"
				),
			'footer_widgets' => array(
				"title" => esc_html__('Footer widgets', 'petermason'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the footer', 'petermason') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'petermason')
				),
				"std" => 'footer_widgets',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
				"type" => "select"
				),
			'footer_columns' => array(
				"title" => esc_html__('Footer columns', 'petermason'),
				"desc" => wp_kses_data( __('Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'petermason') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'petermason')
				),
				"dependency" => array(
					'footer_widgets' => array('^hide')
				),
				"std" => 4,
				"options" => petermason_get_list_range(0,6),
				"type" => "select"
				),
			'footer_wide' => array(
				"title" => esc_html__('Footer fullwide', 'petermason'),
				"desc" => wp_kses_data( __('Do you want to stretch the footer to the entire window width?', 'petermason') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'petermason')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'logo_in_footer' => array(
				"title" => esc_html__('Show logo', 'petermason'),
				"desc" => wp_kses_data( __('Show logo in the footer', 'petermason') ),
				'refresh' => false,
				'hidden' => true,
				"std" => 0,
				"type" => "checkbox"
				),
			'logo_footer' => array(
				"title" => esc_html__('Logo for footer', 'petermason'),
				"desc" => wp_kses_data( __('Select or upload site logo to display it in the footer', 'petermason') ),
				"dependency" => array(
					'logo_in_footer' => array('1')
				),
				'hidden' => true,
				"std" => '',
				"type" => "image"
				),
			'logo_footer_retina' => array(
				"title" => esc_html__('Logo for footer (Retina)', 'petermason'),
				"desc" => wp_kses_data( __('Select or upload logo for the footer area used on Retina displays (if empty - use default logo from the field above)', 'petermason') ),
				"dependency" => array(
					'logo_in_footer' => array('1')
				),
				'hidden' => true,
				"std" => '',
				"type" => "image"
				),
			'socials_in_footer' => array(
				"title" => esc_html__('Show social icons', 'petermason'),
				"desc" => wp_kses_data( __('Show social icons in the footer (under logo or footer widgets)', 'petermason') ),
				"std" => 0,
				'hidden' => true,
				"type" => "checkbox"
				),
			'copyright' => array(
				"title" => esc_html__('Copyright', 'petermason'),
				"desc" => wp_kses_data( __('Copyright text in the footer', 'petermason') ),
				"std" => esc_html__('ThemeREX &copy; {Y}. All rights reserved. Terms of use and Privacy Policy', 'petermason'),
				"refresh" => false,
				"type" => "textarea"
				),
		
		
		
			// Section 'Homepage' - settings for home page
			'homepage' => array(
				"title" => esc_html__('Homepage', 'petermason'),
				"desc" => wp_kses_data( __('Select blog style and widgets to display on the homepage', 'petermason') ),
				"type" => "section"
				),
			'expand_content_home' => array(
				"title" => esc_html__('Expand content', 'petermason'),
				"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden on the Homepage', 'petermason') ),
				"refresh" => false,
				"std" => 1,
				"type" => "checkbox"
				),
			'blog_style_home' => array(
				"title" => esc_html__('Blog style', 'petermason'),
				"desc" => wp_kses_data( __('Select posts style for the homepage', 'petermason') ),
				"std" => 'excerpt',
				"options" => petermason_get_list_blog_styles(),
				"type" => "select"
				),
			'first_post_large_home' => array(
				"title" => esc_html__('First post large', 'petermason'),
				"desc" => wp_kses_data( __('Make first post large (with Excerpt layout) on the Classic layout of the Homepage', 'petermason') ),
				"dependency" => array(
					'blog_style_home' => array('classic')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'header_widgets_home' => array(
				"title" => esc_html__('Header widgets', 'petermason'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the header on the homepage', 'petermason') ),
				"std" => 'header_widgets',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
				"type" => "select"
				),
			'sidebar_widgets_home' => array(
				"title" => esc_html__('Sidebar widgets', 'petermason'),
				"desc" => wp_kses_data( __('Select sidebar to show on the homepage', 'petermason') ),
				"std" => 'sidebar_widgets',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
				"type" => "select"
				),
			'sidebar_position_home' => array(
				"title" => esc_html__('Sidebar position', 'petermason'),
				"desc" => wp_kses_data( __('Select position to show sidebar on the homepage', 'petermason') ),
				"refresh" => false,
				"std" => 'right',
				"options" => petermason_get_list_sidebars_positions(),
				"type" => "select"
				),
			'widgets_above_page_home' => array(
				"title" => esc_html__('Widgets above the page', 'petermason'),
				"desc" => wp_kses_data( __('Select widgets to show above page (content and sidebar)', 'petermason') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_above_content_home' => array(
				"title" => esc_html__('Widgets above the content', 'petermason'),
				"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'petermason') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_below_content_home' => array(
				"title" => esc_html__('Widgets below the content', 'petermason'),
				"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'petermason') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_below_page_home' => array(
				"title" => esc_html__('Widgets below the page', 'petermason'),
				"desc" => wp_kses_data( __('Select widgets to show below the page (content and sidebar)', 'petermason') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
				"type" => "select"
				),
			
		
		
			// Section 'Blog archive'
			'blog' => array(
				"title" => esc_html__('Blog archive', 'petermason'),
				"desc" => wp_kses_data( __('Options for the blog archive', 'petermason') ),
				"type" => "section",
				),
			'expand_content_blog' => array(
				"title" => esc_html__('Expand content', 'petermason'),
				"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden on the blog archive', 'petermason') ),
				"refresh" => false,
				"std" => 1,
				"type" => "checkbox"
				),
			'blog_style' => array(
				"title" => esc_html__('Blog style', 'petermason'),
				"desc" => wp_kses_data( __('Select posts style for the blog archive', 'petermason') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'petermason')
				),
				"dependency" => array(
                    '#page_template' => array( 'blog.php' ),
                    '.editor-page-attributes__template select' => array( 'blog.php' )
				),
				"std" => 'excerpt',
				"options" => petermason_get_list_blog_styles(),
				"type" => "select"
				),
			'blog_columns' => array(
				"title" => esc_html__('Blog columns', 'petermason'),
				"desc" => wp_kses_data( __('How many columns should be used in the blog archive (from 2 to 4)?', 'petermason') ),
				"std" => 2,
				"options" => petermason_get_list_range(2,4),
				"type" => "hidden"
				),
			'post_type' => array(
				"title" => esc_html__('Post type', 'petermason'),
				"desc" => wp_kses_data( __('Select post type to show in the blog archive', 'petermason') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'petermason')
				),
				"dependency" => array(
                    '#page_template' => array( 'blog.php' ),
                    '.editor-page-attributes__template select' => array( 'blog.php' )
				),
				"linked" => 'parent_cat',
				"refresh" => false,
				"hidden" => true,
				"std" => 'post',
				"options" => petermason_get_list_posts_types(),
				"type" => "select"
				),
			'parent_cat' => array(
				"title" => esc_html__('Category to show', 'petermason'),
				"desc" => wp_kses_data( __('Select category to show in the blog archive', 'petermason') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'petermason')
				),
				"dependency" => array(
                    '#page_template' => array( 'blog.php' ),
                    '.editor-page-attributes__template select' => array( 'blog.php' )
				),
				"refresh" => false,
				"hidden" => true,
				"std" => '0',
				"options" => petermason_array_merge(array(0 => esc_html__('- Select category -', 'petermason')), petermason_get_list_categories()),
				"type" => "select"
				),
			'posts_per_page' => array(
				"title" => esc_html__('Posts per page', 'petermason'),
				"desc" => wp_kses_data( __('How many posts will be displayed on this page', 'petermason') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'petermason')
				),
				"dependency" => array(
                    '#page_template' => array( 'blog.php' ),
                    '.editor-page-attributes__template select' => array( 'blog.php' )
				),
				"hidden" => true,
				"std" => '10',
				"type" => "text"
				),
			"blog_pagination" => array( 
				"title" => esc_html__('Pagination style', 'petermason'),
				"desc" => wp_kses_data( __('Show Older/Newest posts or Page numbers below the posts list', 'petermason') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'petermason')
				),
				"std" => "pages",
				"options" => array(
					'pages'	=> esc_html__("Page numbers", 'petermason'),
					'links'	=> esc_html__("Older/Newest", 'petermason')
				),
				"type" => "select"
				),
			'show_filters' => array(
				"title" => esc_html__('Show filters', 'petermason'),
				"desc" => wp_kses_data( __('Show categories as tabs to filter posts', 'petermason') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'petermason')
				),
				"dependency" => array(
                    '#page_template' => array( 'blog.php' ),
                    '.editor-page-attributes__template select' => array( 'blog.php' ),
					'blog_style' => array('portfolio', 'gallery')
				),
				"hidden" => true,
				"std" => 0,
				"type" => "checkbox"
				),
			'first_post_large' => array(
				"title" => esc_html__('First post large', 'petermason'),
				"desc" => wp_kses_data( __('Make first post large (with Excerpt layout) on the Classic layout of blog archive', 'petermason') ),
				"dependency" => array(
					'blog_style' => array('classic')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			"blog_content" => array( 
				"title" => esc_html__('Posts content', 'petermason'),
				"desc" => wp_kses_data( __("Show full post's content in the blog or only post's excerpt", 'petermason') ),
				"std" => "excerpt",
				"options" => array(
					'excerpt'	=> esc_html__('Excerpt',	'petermason'),
					'fullpost'	=> esc_html__('Full post',	'petermason')
				),
				"type" => "select"
				),
			"blog_animation" => array( 
				"title" => esc_html__('Animation for the posts', 'petermason'),
				"desc" => wp_kses_data( __('Select animation to show posts in the blog. Attention! Do not use any animation on pages with the "wheel to the anchor" behaviour (like a "Chess 2 columns")!', 'petermason') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'petermason')
				),
				"dependency" => array(
                    '#page_template' => array( 'blog.php' ),
                    '.editor-page-attributes__template select' => array( 'blog.php' ),
				),
				"std" => "none",
				"options" => petermason_get_list_animations_in(),
				"type" => "select"
				),
			'header_widgets_blog' => array(
				"title" => esc_html__('Header widgets', 'petermason'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the header on the blog archive', 'petermason') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
				"type" => "select"
				),
			'sidebar_widgets_blog' => array(
				"title" => esc_html__('Sidebar widgets', 'petermason'),
				"desc" => wp_kses_data( __('Select sidebar to show on the blog archive', 'petermason') ),
				"std" => 'sidebar_widgets',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
				"type" => "select"
				),
			'sidebar_position_blog' => array(
				"title" => esc_html__('Sidebar position', 'petermason'),
				"desc" => wp_kses_data( __('Select position to show sidebar on the blog archive', 'petermason') ),
				"refresh" => false,
				"std" => 'right',
				"options" => petermason_get_list_sidebars_positions(),
				"type" => "select"
				),
			'widgets_above_page_blog' => array(
				"title" => esc_html__('Widgets above the page', 'petermason'),
				"desc" => wp_kses_data( __('Select widgets to show above page (content and sidebar)', 'petermason') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_above_content_blog' => array(
				"title" => esc_html__('Widgets above the content', 'petermason'),
				"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'petermason') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_below_content_blog' => array(
				"title" => esc_html__('Widgets below the content', 'petermason'),
				"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'petermason') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
				"type" => "select"
				),
			'widgets_below_page_blog' => array(
				"title" => esc_html__('Widgets below the page', 'petermason'),
				"desc" => wp_kses_data( __('Select widgets to show below the page (content and sidebar)', 'petermason') ),
				"std" => 'hide',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'petermason')), petermason_get_list_sidebars()),
				"type" => "select"
				),
			
		
		
		
			// Section 'Colors' - choose color scheme and customize separate colors from it
			'scheme' => array(
				"title" => esc_html__('* Color scheme editor', 'petermason'),
				"desc" => wp_kses_data( __("<b>Simple settings</b> - you can change only accented color, used for links, buttons and some accented areas.", 'petermason') )
						. '<br>'
						. wp_kses_data( __("<b>Advanced settings</b> - change all scheme's colors and get full control over the appearance of your site!", 'petermason') ),
				"priority" => 1000,
				"type" => "section"
				),
		
			'color_settings' => array(
				"title" => esc_html__('Color settings', 'petermason'),
				"desc" => '',
				"std" => 'simple',
				"options" => array(
					"simple"  => esc_html__("Simple", 'petermason'),
					"advanced" => esc_html__("Advanced", 'petermason')
				),
				"refresh" => false,
				"type" => "switch"
				),
		
			'color_scheme_editor' => array(
				"title" => esc_html__('Color Scheme', 'petermason'),
				"desc" => wp_kses_data( __('Select color scheme to edit colors', 'petermason') ),
				"std" => 'default',
				"options" => petermason_get_list_schemes(),
				"refresh" => false,
				"type" => "select"
				),
		
			'scheme_storage' => array(
				"title" => esc_html__('Colors storage', 'petermason'),
				"desc" => esc_html__('Hidden storage of the all color from the all color shemes (only for internal usage)', 'petermason'),
				"std" => '',
				"refresh" => false,
				"type" => "hidden"
				),
		
			'scheme_info_single' => array(
				"title" => esc_html__('Colors for single post/page', 'petermason'),
				"desc" => wp_kses_data( __('Specify colors for single post/page (not for alter blocks)', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"type" => "info"
				),
				
			'bg_color' => array(
				"title" => esc_html__('Background color', 'petermason'),
				"desc" => wp_kses_data( __('Background color of the whole page', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'bd_color' => array(
				"title" => esc_html__('Border color', 'petermason'),
				"desc" => wp_kses_data( __('Color of the bordered elements, separators, etc.', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
		
			'text' => array(
				"title" => esc_html__('Text', 'petermason'),
				"desc" => wp_kses_data( __('Plain text color on single page/post', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'text_light' => array(
				"title" => esc_html__('Light text', 'petermason'),
				"desc" => wp_kses_data( __('Color of the post meta: post date and author, comments number, etc.', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'text_dark' => array(
				"title" => esc_html__('Dark text', 'petermason'),
				"desc" => wp_kses_data( __('Color of the headers, strong text, etc.', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'text_link' => array(
				"title" => esc_html__('Links', 'petermason'),
				"desc" => wp_kses_data( __('Color of links and accented areas', 'petermason') ),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'text_hover' => array(
				"title" => esc_html__('Links hover', 'petermason'),
				"desc" => wp_kses_data( __('Hover color for links and accented areas', 'petermason') ),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
		
			'scheme_info_alter' => array(
				"title" => esc_html__('Colors for alternative blocks', 'petermason'),
				"desc" => wp_kses_data( __('Specify colors for alternative blocks - rectangular blocks with its own background color (posts in homepage, blog archive, search results, widgets on sidebar, footer, etc.)', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"type" => "info"
				),
		
			'alter_bg_color' => array(
				"title" => esc_html__('Alter background color', 'petermason'),
				"desc" => wp_kses_data( __('Background color of the alternative blocks', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_bg_hover' => array(
				"title" => esc_html__('Alter hovered background color', 'petermason'),
				"desc" => wp_kses_data( __('Background color for the hovered state of the alternative blocks', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_bd_color' => array(
				"title" => esc_html__('Alternative border color', 'petermason'),
				"desc" => wp_kses_data( __('Border color of the alternative blocks', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_bd_hover' => array(
				"title" => esc_html__('Alternative hovered border color', 'petermason'),
				"desc" => wp_kses_data( __('Border color for the hovered state of the alter blocks', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_text' => array(
				"title" => esc_html__('Alter text', 'petermason'),
				"desc" => wp_kses_data( __('Text color of the alternative blocks', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_light' => array(
				"title" => esc_html__('Alter light', 'petermason'),
				"desc" => wp_kses_data( __('Color of the info blocks inside block with alternative background', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_dark' => array(
				"title" => esc_html__('Alter dark', 'petermason'),
				"desc" => wp_kses_data( __('Color of the headers inside block with alternative background', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_link' => array(
				"title" => esc_html__('Alter link', 'petermason'),
				"desc" => wp_kses_data( __('Color of the links inside block with alternative background', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_hover' => array(
				"title" => esc_html__('Alter hover', 'petermason'),
				"desc" => wp_kses_data( __('Color of the hovered links inside block with alternative background', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
		
			'scheme_info_input' => array(
				"title" => esc_html__('Colors for the form fields', 'petermason'),
				"desc" => wp_kses_data( __('Specify colors for the form fields and textareas', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"type" => "info"
				),
		
			'input_bg_color' => array(
				"title" => esc_html__('Inactive background', 'petermason'),
				"desc" => wp_kses_data( __('Background color of the inactive form fields', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_bg_hover' => array(
				"title" => esc_html__('Active background', 'petermason'),
				"desc" => wp_kses_data( __('Background color of the focused form fields', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_bd_color' => array(
				"title" => esc_html__('Inactive border', 'petermason'),
				"desc" => wp_kses_data( __('Color of the border in the inactive form fields', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_bd_hover' => array(
				"title" => esc_html__('Active border', 'petermason'),
				"desc" => wp_kses_data( __('Color of the border in the focused form fields', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_text' => array(
				"title" => esc_html__('Inactive field', 'petermason'),
				"desc" => wp_kses_data( __('Color of the text in the inactive fields', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_light' => array(
				"title" => esc_html__('Disabled field', 'petermason'),
				"desc" => wp_kses_data( __('Color of the disabled field', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_dark' => array(
				"title" => esc_html__('Active field', 'petermason'),
				"desc" => wp_kses_data( __('Color of the active field', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
		
			'scheme_info_inverse' => array(
				"title" => esc_html__('Colors for inverse blocks', 'petermason'),
				"desc" => wp_kses_data( __('Specify colors for inverse blocks, rectangular blocks with background color equal to the links color or one of accented colors (if used in the current theme)', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"type" => "info"
				),
		
			'inverse_text' => array(
				"title" => esc_html__('Inverse text', 'petermason'),
				"desc" => wp_kses_data( __('Color of the text inside block with accented background', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'inverse_light' => array(
				"title" => esc_html__('Inverse light', 'petermason'),
				"desc" => wp_kses_data( __('Color of the info blocks inside block with accented background', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'inverse_dark' => array(
				"title" => esc_html__('Inverse dark', 'petermason'),
				"desc" => wp_kses_data( __('Color of the headers inside block with accented background', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'inverse_link' => array(
				"title" => esc_html__('Inverse link', 'petermason'),
				"desc" => wp_kses_data( __('Color of the links inside block with accented background', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'inverse_hover' => array(
				"title" => esc_html__('Inverse hover', 'petermason'),
				"desc" => wp_kses_data( __('Color of the hovered links inside block with accented background', 'petermason') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$petermason_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),


			// Section 'Hidden'
			'media_title' => array(
				"title" => esc_html__('Media title', 'petermason'),
				"desc" => wp_kses_data( __('Used as title for the audio and video item in this post', 'petermason') ),
				"override" => array(
					'mode' => 'post',
					'section' => esc_html__('Title', 'petermason')
				),
				"hidden" => true,
				"std" => '',
				"type" => "text"
				),
			'media_author' => array(
				"title" => esc_html__('Media author', 'petermason'),
				"desc" => wp_kses_data( __('Used as author name for the audio and video item in this post', 'petermason') ),
				"override" => array(
					'mode' => 'post',
					'section' => esc_html__('Title', 'petermason')
				),
				"hidden" => true,
				"std" => '',
				"type" => "text"
				),


			// Internal options.
			// Attention! Don't change any options in the section below!
			'reset_options' => array(
				"title" => '',
				"desc" => '',
				"std" => '0',
				"type" => "hidden",
				),

		));


		// Prepare panel 'Fonts'
		$fonts = array(
		
			// Panel 'Fonts' - manage fonts loading and set parameters of the base theme elements
			'fonts' => array(
				"title" => esc_html__('* Fonts settings', 'petermason'),
				"desc" => '',
				"priority" => 1500,
				"type" => "panel"
				),

			// Section 'Load_fonts'
			'load_fonts' => array(
				"title" => esc_html__('Load fonts', 'petermason'),
				"desc" => wp_kses_data( __('Specify fonts to load when theme start. You can use them in the base theme elements: headers, text, menu, links, input fields, etc.', 'petermason') )
						. '<br>'
						. wp_kses_data( __('<b>Attention!</b> Press "Refresh" button to reload preview area after the all fonts are changed', 'petermason') ),
				"type" => "section"
				),
			'load_fonts_subset' => array(
				"title" => esc_html__('Google fonts subsets', 'petermason'),
				"desc" => wp_kses_data( __('Specify comma separated list of the subsets which will be load from Google fonts', 'petermason') )
						. '<br>'
						. wp_kses_data( __('Available subsets are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese', 'petermason') ),
				"refresh" => false,
				"std" => '$petermason_get_load_fonts_subset',
				"type" => "text"
				)
		);

		for ($i=1; $i<=petermason_get_theme_setting('max_load_fonts'); $i++) {
			$fonts["load_fonts-{$i}-info"] = array(
				"title" => esc_html(sprintf(esc_html__('Font %s', 'petermason'), $i)),
				"desc" => '',
				"type" => "info",
				);
			$fonts["load_fonts-{$i}-name"] = array(
				"title" => esc_html__('Font name', 'petermason'),
				"desc" => '',
				"refresh" => false,
				"std" => '$petermason_get_load_fonts_option',
				"type" => "text"
				);
			$fonts["load_fonts-{$i}-family"] = array(
				"title" => esc_html__('Font family', 'petermason'),
				"desc" => $i==1 
							? wp_kses_data( __('Select font family to use it if font above is not available', 'petermason') )
							: '',
				"refresh" => false,
				"std" => '$petermason_get_load_fonts_option',
				"options" => array(
					'inherit' => esc_html__("Inherit", 'petermason'),
					'serif' => esc_html__('serif', 'petermason'),
					'sans-serif' => esc_html__('sans-serif', 'petermason'),
					'monospace' => esc_html__('monospace', 'petermason'),
					'cursive' => esc_html__('cursive', 'petermason'),
					'fantasy' => esc_html__('fantasy', 'petermason')
				),
				"type" => "select"
				);
			$fonts["load_fonts-{$i}-styles"] = array(
				"title" => esc_html__('Font styles', 'petermason'),
				"desc" => $i==1 
							? wp_kses_data( __('Font styles used only for the Google fonts. This is a comma separated list of the font weight and styles. For example: 400,400italic,700', 'petermason') )
											. '<br>'
								. wp_kses_data( __('<b>Attention!</b> Each weight and style increase download size! Specify only used weights and styles.', 'petermason') )
							: '',
				"refresh" => false,
				"std" => '$petermason_get_load_fonts_option',
				"type" => "text"
				);
		}
		$fonts['load_fonts_end'] = array(
			"type" => "section_end"
			);

		// Sections with font's attributes for each theme element
		$theme_fonts = petermason_get_theme_fonts();
		foreach ($theme_fonts as $tag=>$v) {
			$fonts["{$tag}_section"] = array(
				"title" => !empty($v['title']) 
								? $v['title'] 
								: esc_html(sprintf(esc_html__('%s settings', 'petermason'), $tag)),
				"desc" => !empty($v['description']) 
								? $v['description'] 
								: wp_kses_post( sprintf(__('Font settings of the "%s" tag.', 'petermason'), $tag) ),
				"type" => "section",
				);
	
			foreach ($v as $css_prop=>$css_value) {
				if (in_array($css_prop, array('title', 'description'))) continue;
				$options = '';
				$type = 'text';
				$title = ucfirst(str_replace('-', ' ', $css_prop));
				if ($css_prop == 'font-family') {
					$type = 'select';
					$options = petermason_get_list_load_fonts(true);
				} else if ($css_prop == 'font-weight') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'petermason'),
						'100' => esc_html__('100 (Light)', 'petermason'), 
						'200' => esc_html__('200 (Light)', 'petermason'), 
						'300' => esc_html__('300 (Thin)',  'petermason'),
						'400' => esc_html__('400 (Normal)', 'petermason'),
						'500' => esc_html__('500 (Semibold)', 'petermason'),
						'600' => esc_html__('600 (Semibold)', 'petermason'),
						'700' => esc_html__('700 (Bold)', 'petermason'),
						'800' => esc_html__('800 (Black)', 'petermason'),
						'900' => esc_html__('900 (Black)', 'petermason')
					);
				} else if ($css_prop == 'font-style') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'petermason'),
						'normal' => esc_html__('Normal', 'petermason'), 
						'italic' => esc_html__('Italic', 'petermason')
					);
				} else if ($css_prop == 'text-decoration') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'petermason'),
						'none' => esc_html__('None', 'petermason'), 
						'underline' => esc_html__('Underline', 'petermason'),
						'overline' => esc_html__('Overline', 'petermason'),
						'line-through' => esc_html__('Line-through', 'petermason')
					);
				} else if ($css_prop == 'text-transform') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'petermason'),
						'none' => esc_html__('None', 'petermason'), 
						'uppercase' => esc_html__('Uppercase', 'petermason'),
						'lowercase' => esc_html__('Lowercase', 'petermason'),
						'capitalize' => esc_html__('Capitalize', 'petermason')
					);
				}
				$fonts["{$tag}_{$css_prop}"] = array(
					"title" => $title,
					"desc" => '',
					"refresh" => false,
					"std" => '$petermason_get_theme_fonts_option',
					"options" => $options,
					"type" => $type
				);
			}
			
			$fonts["{$tag}_section_end"] = array(
				"type" => "section_end"
				);
		}

		$fonts['fonts_end'] = array(
			"type" => "panel_end"
			);

		// Add fonts parameters into Theme Options
		petermason_storage_merge_array('options', '', $fonts);
	}
}




// -----------------------------------------------------------------
// -- Create and manage Theme Options
// -----------------------------------------------------------------

// Theme init priorities:
// 2 - create Theme Options
if (!function_exists('petermason_options_theme_setup2')) {
	add_action( 'after_setup_theme', 'petermason_options_theme_setup2', 2 );
	function petermason_options_theme_setup2() {
		petermason_options_create();
	}
}

// Step 1: Load default settings and previously saved mods
if (!function_exists('petermason_options_theme_setup5')) {
	add_action( 'after_setup_theme', 'petermason_options_theme_setup5', 5 );
	function petermason_options_theme_setup5() {
		petermason_storage_set('options_reloaded', false);
		petermason_load_theme_options();
	}
}

// Step 2: Load current theme customization mods
if (is_customize_preview()) {
	if (!function_exists('petermason_load_custom_options')) {
		add_action( 'wp_loaded', 'petermason_load_custom_options' );
		function petermason_load_custom_options() {
			if (!petermason_storage_get('options_reloaded')) {
				petermason_storage_set('options_reloaded', true);
				petermason_load_theme_options();
			}
		}
	}
}

// Load current values for each customizable option
if ( !function_exists('petermason_load_theme_options') ) {
	function petermason_load_theme_options() {
		$options = petermason_storage_get('options');
		$reset = (int) get_theme_mod('reset_options', 0);
		foreach ($options as $k=>$v) {
			if (isset($v['std'])) {
				if (strpos($v['std'], '$petermason_')!==false) {
					$func = substr($v['std'], 1);
					if (function_exists($func)) {
						$v['std'] = $func($k);
					}
				}
				$value = $v['std'];
				if (!$reset) {
					if (isset($_GET[$k]))
						$value = sanitize_text_field($_GET[$k]);
					else {
						$tmp = get_theme_mod($k, -987654321);
						if ($tmp != -987654321) $value = $tmp;
					}
				}
				petermason_storage_set_array2('options', $k, 'val', $value);
				if ($reset) remove_theme_mod($k);
			}
		}
		if ($reset) {
			// Unset reset flag
			set_theme_mod('reset_options', 0);
			// Regenerate CSS with default colors and fonts
			petermason_customizer_save_css();
		} else {
			do_action('petermason_action_load_options');
		}
	}
}

// Override options with stored page/post meta
if ( !function_exists('petermason_override_theme_options') ) {
	add_action( 'wp', 'petermason_override_theme_options', 1 );
	function petermason_override_theme_options($query=null) {
		if (is_page_template('blog.php')) {
			petermason_storage_set('blog_archive', true);
			petermason_storage_set('blog_template', get_the_ID());
		}
		petermason_storage_set('blog_mode', petermason_detect_blog_mode());
		if (is_singular()) {
			petermason_storage_set('options_meta', get_post_meta(get_the_ID(), 'petermason_options', true));
		}
	}
}


// Return customizable option value
if (!function_exists('petermason_get_theme_option')) {
	function petermason_get_theme_option($name, $defa='', $strict_mode=false, $post_id=0) {
		$rez = $defa;
		$from_post_meta = false;
		if ($post_id > 0) {
			if (!petermason_storage_isset('post_options_meta', $post_id))
				petermason_storage_set_array('post_options_meta', $post_id, get_post_meta($post_id, 'petermason_options', true));
			if (petermason_storage_isset('post_options_meta', $post_id, $name)) {
				$tmp = petermason_storage_get_array('post_options_meta', $post_id, $name);
				if (!petermason_is_inherit($tmp)) {
					$rez = $tmp;
					$from_post_meta = true;
				}
			}
		}
		if (!$from_post_meta && petermason_storage_isset('options')) {
			if ( !petermason_storage_isset('options', $name) ) {
				$rez = $tmp = '_not_exists_';
				if (function_exists('trx_addons_get_option'))
					$rez = trx_addons_get_option($name, $tmp, false);
				if ($rez === $tmp) {
					if ($strict_mode) {
						$s = debug_backtrace();
						
						$s = array_shift($s);
						echo '<pre>' . sprintf(esc_html__('Undefined option "%s" called from:', 'petermason'), $name);
						if (function_exists('dco')) dco($s);
						else print_r($s);
						echo '</pre>';
                        wp_die();
					} else
						$rez = $defa;
				}
			} else {
				$blog_mode = petermason_storage_get('blog_mode');
				// Override option from GET or POST for current blog mode
				if (!empty($blog_mode) && isset($_REQUEST[$name . '_' . $blog_mode])) {
					$rez = wp_kses_data( wp_unslash( $_REQUEST[ $name . '_' . $blog_mode ] ) );
				// Override option from GET
				} else if (isset($_REQUEST[$name])) {
					$rez = sanitize_text_field($_REQUEST[$name]);
				// Override option from current page settings (if exists)
				} else if (petermason_storage_isset('options_meta', $name) && !petermason_is_inherit(petermason_storage_get_array('options_meta', $name))) {
					$rez = petermason_storage_get_array('options_meta', $name);
				// Override option from current blog mode settings: 'home', 'search', 'page', 'post', 'blog', etc. (if exists)
				} else if (!empty($blog_mode) && petermason_storage_isset('options', $name . '_' . $blog_mode, 'val') && !petermason_is_inherit(petermason_storage_get_array('options', $name . '_' . $blog_mode, 'val'))) {
					$rez = petermason_storage_get_array('options', $name . '_' . $blog_mode, 'val');
				// Get saved option value
				} else if (petermason_storage_isset('options', $name, 'val')) {
					$rez = petermason_storage_get_array('options', $name, 'val');
				// Get ThemeREX Addons option value
				} else if (function_exists('trx_addons_get_option')) {
					$rez = trx_addons_get_option($name, $defa, false);
				}
			}
		}
		return $rez;
	}
}


// Check if customizable option exists
if (!function_exists('petermason_check_theme_option')) {
	function petermason_check_theme_option($name) {
		return petermason_storage_isset('options', $name);
	}
}

// Get dependencies list from the Theme Options
if ( !function_exists('petermason_get_theme_dependencies') ) {
	function petermason_get_theme_dependencies() {
		$options = petermason_storage_get('options');
		$depends = array();
		foreach ($options as $k=>$v) {
			if (isset($v['dependency'])) 
				$depends[$k] = $v['dependency'];
		}
		return $depends;
	}
}

// Return internal theme setting value
if (!function_exists('petermason_get_theme_setting')) {
	function petermason_get_theme_setting($name) {
		return petermason_storage_isset('settings', $name) ? petermason_storage_get_array('settings', $name) : false;
	}
}


// Set theme setting
if ( !function_exists( 'petermason_set_theme_setting' ) ) {
	function petermason_set_theme_setting($option_name, $value) {
		if (petermason_storage_isset('settings', $option_name))
			petermason_storage_set_array('settings', $option_name, $value);
	}
}
?>