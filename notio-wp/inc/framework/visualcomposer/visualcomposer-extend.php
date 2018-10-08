<?php
$thb_animation_array = array(
	"type" => "dropdown",
	"heading" => esc_html__("Animation", "notio"),
	"admin_label" => true,
	"param_name" => "animation",
	"value" => array(
		"None" => "",
		"Left" => "animation right-to-left",
		"Right" => "animation left-to-right",
		"Top" => "animation bottom-to-top",
		"Bottom" => "animation top-to-bottom",
		"Scale" => "animation scale",
		"Fade" => "animation fade-in"
	)
);
$thb_button_style_array = array(
	'Style 1' => "style1",
	'Style 2' => 'style2',
	'Style 3' => "style3",
	'Style 4' => "style4",
	'Style 5' => "style5",
	'Style 6' => "style6",
	'Style 7' => "style7",
	'Style 8' => "style8"
);
$thb_offset_array = array(
	'-100%' => '-100%',
	'-95%' => '-95%',
	'-90%' => '-90%',
	'-85%' => '-85%',
	'-80%' => '-80%',
	'-75%' => '-75%',
	'-70%' => '-70%',
	'-65%' => '-65%',
	'-60%' => '-60%',
	'-55%' => '-55%',
	'-50%' => '-50%',
	'-45%' => '-45%',
	'-40%' => '-40%',
	'-35%' => '-35%',
	'-30%' => '-30%',
	'-25%' => '-25%',
	'-20%' => '-20%',
	'-15%' => '-15%',
	'-10%' => '-10%',
	'-5%'  => '-5%',
	'0%'  => '0%',
	'5%'  => '5%',
	'10%' => '10%',
	'15%' => '15%',	
	'20%' => '20%',
	'25%' => '25%',
	'30%' => '30%',
	'35%' => '35%',	
	'40%' => '40%',
	'45%' => '45%',	
	'50%' => '50%',
	'55%' => '55%',
	'60%' => '60%',
	'65%' => '65%',	
	'70%' => '70%',
	'75%' => '75%',	
	'80%' => '80%',
	'85%' => '85%',	
	'90%' => '90%',
	'95%' => '95%',	
	'100%' => '100%'
);

// Shortcodes 
$shortcodes = Thb_Theme_Admin::$thb_theme_directory. 'vc_templates/';
$files = glob($shortcodes.'thb_?*.php');
foreach ($files as $filename) {
	require get_theme_file_path('vc_templates/'.basename($filename));
}

/* Visual Composer Mappings */

// Columns
vc_remove_param( "vc_column", "css_animation" );
vc_add_param("vc_column", array(
	"type" => "dropdown",
	"heading" => esc_html__("Column Content Color", "notio"),
	"param_name" => "thb_color",
	"value" => array(
		"Dark" => "thb-dark-column",
		"Light" => "thb-light-column"
	),
	'weight' => 1,
	"description" => esc_html__("If you white-colored contents for this column, select Light.", "notio")
));
vc_add_param("vc_column", array(
	"type" => "checkbox",
	"heading" => esc_html__("Enable Fixed Content", "notio"),
	"param_name" => "fixed",
	"value" => array(
		"Yes" => "thb-fixed"
	),
	'weight' => 1,
	"description" => esc_html__("If you enable this, this column will be fixed.", "notio")
));
vc_add_param("vc_column", array(
	"type" => "checkbox",
	"heading" => esc_html__("Scrolling Parallax", "notio"),
	"param_name" => "skrollr",
	"value" => array(
		"Yes" => "true"
	),
	"description" => esc_html__("If you enable this, this column will move up/down as you scroll.", "notio" )
));
vc_add_param("vc_column", array(
	"type" => "textfield",
	"heading" => esc_html__("Scrolling Parallax Speed", "notio"),
	"param_name" => "skrollr_speed",
	"value" => "100",
	"dependency" => array(
		"element" => "skrollr",
		"not_empty" => true
	),
	"description" => esc_html__("Speed of this column", "notio" )
));
vc_add_param("vc_column", array(
	"type" => "checkbox",
	"heading" => esc_html__("Enable Parallax Background", "notio"),
	"param_name" => "enable_parallax",
	"value" => array(
		"Yes" => "true"
	),
	"description" => esc_html__("If enabled, this will add parallax effect to the background image", "notio")
));
vc_add_param("vc_column_inner", array(
	"type" => "dropdown",
	"heading" => esc_html__("Column Content Color", "notio"),
	"param_name" => "thb_color",
	"value" => array(
		"Dark" => "thb-dark-column",
		"Light" => "thb-light-column"
	),
	'weight' => 1,
	"description" => esc_html__("If you white-colored contents for this column, select Light.", "notio")
));
vc_add_param("vc_column_inner", array(
	"type" => "checkbox",
	"heading" => esc_html__("Enable Parallax Background", "notio"),
	"param_name" => "enable_parallax",
	"value" => array(
		"Yes" => "true"
	),
	"description" => esc_html__("If enabled, this will add parallax effect to the background image", "notio")
));
vc_add_param("vc_column", $thb_animation_array);
vc_add_param("vc_column_inner", $thb_animation_array);

// Text Area
vc_remove_param("vc_column_text", "css_animation");
vc_add_param("vc_column_text", $thb_animation_array);

// Add parameters to rows
vc_remove_param( "vc_row", "full_width" );
vc_remove_param( "vc_row", "gap" );
vc_remove_param( "vc_row", "equal_height" );
vc_remove_param( "vc_row", "css_animation" );
vc_remove_param( "vc_row", "video_bg" );
vc_remove_param( "vc_row", "video_bg_url" );
vc_remove_param( "vc_row", "video_bg_parallax" );

vc_add_param("vc_row", array(
	"type" => "checkbox",
	"heading" => esc_html__("Enable Full Width", "notio"),
	"param_name" => "thb_full_width",
	"value" => array(
		"Yes" => "true"
	),
	'weight' => 1,
	"description" => esc_html__("If you enable this, this row will fill the screen", "notio")
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"heading" => esc_html__("Disable Padding", "notio"),
	"param_name" => "thb_row_padding",
	"value" => array(
		"Yes" => "true"
	),
	'weight' => 1,
	"description" => esc_html__("If you enable this, this row won't leave padding on the sides", "notio")
));

vc_add_param("vc_row", array(
	"type" => "checkbox",
	"heading" => esc_html__("Full Height Row", "notio"),
	"param_name" => "full_height",
	"value" => array(
		"Yes" => "true"
	),
	"description" => esc_html__("If enabled, this will cause this row to always fill the height of the window.", "notio" )
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"heading" => esc_html__("Video Background", "notio"),
	"param_name" => "thb_video_bg",
	'weight' => 1,
	"description" => esc_html__("You can specify a video background file here (mp4)", "notio")
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"heading" => esc_html__("Video Overlay Color", "notio"),
	"param_name" => "thb_video_overlay_color",
	'weight' => 1,
	"description" => esc_html__("If you want, you can select an overlay color.", "notio")
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"heading" => esc_html__("Disable AutoPlay", "notio"),
	"param_name" => "thb_video_play_button",
	'weight' => 1,
	"value" => array(
		"Yes" => "thb_video_play_button_enabled"
	),
	"description" => esc_html__("If enabled, the video won't start automatically and can be toggled using the Play Button Element.", "notio")
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"heading" => esc_html__("Insert Mouse Scroll Icon?", "notio"),
	"param_name" => "mouse_scroll",
	"value" => array(
		"Yes" => "true"
	),
	"description" => esc_html__("You can insert a mouse scroll icon to the bottom of the div.", "notio")
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"heading" => esc_html__("Scroll to Bottom Arrow Color", "notio"),
	"param_name" => "thb_scroll_bottom_color",
	"value" => array(
		"Dark" => "dark",
		"Light" => "light"
	),
	"std" => 'light',
	"description" => esc_html__("Color of the scroll to bottom arrow", "notio"),
	"dependency" => Array('element' => "thb_scroll_bottom", 'value' => array('true'))
));

// Inner Row
vc_remove_param( "vc_row_inner", "gap" );
vc_remove_param( "vc_row_inner", "equal_height" );
vc_remove_param( "vc_row_inner", "css_animation" );

vc_add_param("vc_row_inner", array(
	"type" => "checkbox",
	"heading" => esc_html__("Enable Max Width", "notio"),
	"param_name" => "thb_max_width",
	"value" => array(
		"Yes" => "max_width"
	),
	'weight' => 1,
	"description" => esc_html__("If you enable this, the row won't exceed the max width, especially inside a full-width parent row.", "notio")
));

vc_add_param("vc_row_inner", array(
	"type" => "checkbox",
	"heading" => esc_html__("Disable Padding", "notio"),
	"param_name" => "thb_row_padding",
	"value" => array(
		"Yes" => "true"
	),
	'weight' => 1,
	"description" => esc_html__("If you enable this, this row won't leave padding on the sides", "notio")
));

// Awards Parent
vc_map( array(
	"name" => esc_html__("Awards", "notio"),
	"base" => "thb_awards_parent",
	"icon" => "thb_vc_ico_awards",
	"class" => "thb_vc_sc_awards",
	"content_element"	=> true,
	"category" => esc_html__("by Fuel Themes", "notio"),
	"as_parent" => array('only' => 'thb_awards'),
	"show_settings_on_create" => false,
	"description" => esc_html__("Display Awards you have received", "notio"),
	"js_view" => 'VcColumnView'
) );
vc_map( array(
	"name" => esc_html__("Single Award", "notio"),
	"base" => "thb_awards",
	"icon" => "thb_vc_ico_awards",
	"class" => "thb_vc_sc_awards",
	"category" => esc_html__("by Fuel Themes", "notio"),
	"as_child" => array('only' => 'thb_awards_parent'),
	"params"	=> array(
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Date', "notio" ),
			'admin_label'	 => true,
			'param_name'     => 'date'
		),
		array(
		'type'           => 'textfield',
			'heading'        => esc_html__( 'Name', "notio" ),
			'param_name'     => 'name',
			'admin_label'	 => true,
			'description'    => esc_html__( 'Name of the award', "notio" ),
		),
		array(
			'type'           => 'textarea_safe',
			'heading'        => esc_html__( 'Description', "notio" ),
			'param_name'     => 'description',
			'description'    => esc_html__( 'Award description, you can use html here.', "notio" ),
		)
	),
	"description" => esc_html__("Single Award", "notio")
) );
class WPBakeryShortCode_thb_awards_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_awards extends WPBakeryShortCode {}

// Button shortcode
vc_map( array(
	"name" => __("Button", 'notio'),
	"base" => "thb_button",
	"icon" => "thb_vc_ico_button",
	"class" => "thb_vc_sc_button",
	"class" => "thb_vc_sc_testimonial",
	"category" => esc_html__("by Fuel Themes", "notio"),
	"params" => array(
		array(
		  "type" => "vc_link",
		  "heading" => esc_html__("link", "notio"),
		  "param_name" => "link",
		  "description" => esc_html__("Enter url for link", "notio"),
		  "admin_label" => true,
		),
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Style", "notio"),
		  "param_name" => "style",
		  "value" => $thb_button_style_array,
		  "description" => esc_html__("This changes the look of the button", "notio")
		),
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Color", "notio"),
		  "param_name" => "color",
		  "value" => array(
		  	'Default' => "",
		  	'Accent' => 'accent',
		  	'Blue' => "blue",
		  	'White' => "white"
		  ),
		  "description" => esc_html__("This changes the color of the button", "notio"),
		  "dependency" => Array('element' => "style", 'value' => array('style1', 'style2', 'style8'))
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Full Width?", "notio"),
			"param_name" => "full_width",
			"value" => array(
				"Yes" => "full"
			),
			"description" => esc_html__("If selected, the button will be full width", "notio")
		),
		$thb_animation_array
	),
	"description" => esc_html__("Add an animated button", "notio" )
) );

// Text Button
vc_map( array(
	"name" => esc_html__( "Text Button", 'notio'),
	"base" => "thb_button_text",
	"icon" => "thb_vc_ico_button_text",
	"class" => "thb_vc_sc_button_text",
	"category" => esc_html__('by Fuel Themes', 'notio'),
	"params" => array(
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Style", "revolution"),
		  "param_name" => "style",
		  "value" => array(
		  	'Style 1 (Line Left)' => "style1",
		  	'Style 2 (Line Bottom)' => 'style2',
		  	'Style 3 (Arrow Left)' => "style3",
		  	'Style 4 (Arrow Right)' => "style4",
		  	'Style 5 (Arrow Right Small)' => "style5"
		  ),
		  "description" => esc_html__("This changes the look of the button", "revolution")
		),
		array(
		  "type" => "vc_link",
		  "heading" => esc_html__("Link", "revolution"),
		  "param_name" => "link",
		  "description" => esc_html__("Set your url & text for your button", "revolution"),
		  "admin_label" => true,
		),
		$thb_animation_array,
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra Class Name", "revolution"),
			"param_name" => "extra_class",
		),
	),
	"description" => esc_html__("Add a text button", "revolution")
) );

// Cascading Images
vc_map( array(
	"name" => esc_html__("Cascading Images", "notio"),
	"base" => "thb_cascading_parent",
	"icon" => "thb_vc_ico_cascading",
	"class" => "thb_vc_sc_cascading",
	"content_element"	=> true,
	"show_settings_on_create" => false,
	"category" => esc_html__("by Fuel Themes", "notio"),
	"as_parent" => array('only' => 'thb_cascading'),
	"description" => esc_html__("Insert a cascading Image", "notio" ),
	"js_view" => 'VcColumnView'
) );

vc_map( array(
	"name" => esc_html__("Single Image", "notio"),
	"base" => "thb_cascading",
	"icon" => "thb_vc_ico_cascading",
	"class" => "thb_vc_sc_cascading",
	"category" => esc_html__("by Fuel Themes", "notio"),
	"as_child"         => array('only' => 'thb_cascading_parent'),
	"params"           => array(
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'Select Image', "notio" ),
			'param_name'     => 'image',
			'description'    => esc_html__( 'Select Image for the layer', "notio" )
		),
		array(
		  "type" => "dropdown",
		  "heading" => __("Offset X", "notio"),
		  "param_name" => "image_x",
		  "value" => $thb_offset_array,
		  "std" => "0%"
		),
		array(
		  "type" => "dropdown",
		  "heading" => __("Offset Y", "notio"),
		  "param_name" => "image_y",
		  "value" => $thb_offset_array,
		  "std" => "0%"
		),
		$thb_animation_array,
		array(
	    "type" => "textfield",
	    "heading" => esc_html__("Add Border Radius?", "notio"),
	    "param_name" => "radius",
	    "description" => esc_html__("You can add Border Radius in px value.", "notio")
		),
		array(
		  "type" => "checkbox",
		  "heading" => esc_html__("Add Box Shadow?", "notio"),
		  "param_name" => "thb_box_shadow",
		  "value" => array(
		  	"Yes" => "thb_box_shadow"
		  ),
		  "description" => esc_html__("You can add a Box Shadow to your image.", "notio")
		),
	)
) );

class WPBakeryShortCode_thb_cascading_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_cascading extends WPBakeryShortCode {}

// Clients shortcode
vc_map( array(
	"name" => __("Clients", 'notio'),
	"base" => "thb_clients",
	"icon" => "thb_vc_ico_clients",
	"class" => "thb_vc_sc_clients",
	"class" => "thb_vc_sc_testimonial",
	"category" => esc_html__("by Fuel Themes", "notio"),
	"params" => array(
		array(
			"type" => "attach_images", //attach_images
			"heading" => esc_html__("Select Images", "notio"),
			"param_name" => "images",
			"description" => esc_html__("Add as many client images as possible.", "notio" ),
			"admin_label" => true,
		),
		array(
	    "type" => "dropdown",
	    "heading" => esc_html__("Carousel", "notio"),
	    "param_name" => "carousel",
	    "value" => array(
	    	'Yes' => "yes",
	    	'No' => "no",
	    	),
	    "description" => esc_html__("Select yes to display the client images in a carousel.", "notio" )
		),
		array(
	    "type" => "dropdown",
	    "heading" => esc_html__("Columns", "notio"),
	    "param_name" => "columns",
	    "value" => array(
	    	'Six Columns' => "6",
	    	'Five Columns' => "5",
	    	'Four Columns' => "4",
	    	'Three Columns' => "3",
	    	'Two Columns' => "2"
	    ),
	    "description" => esc_html__("Select the layout.", "notio" )
		),
	),
	"description" => esc_html__("Show your clients proudly", "notio" )
) );

// Counter shortcode
vc_map( array(
	"name" => esc_html__("Counter", "notio"),
	"base" => "thb_counter",
	"icon" => "thb_vc_ico_counter",
	"class" => "thb_vc_sc_counter",
	"category" => esc_html__("by Fuel Themes", "notio"),
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Icon", "notio"),
			"param_name" => "icon",
			"value" => thb_getSvgIconArray()
		),
		array(
		  "type"              => "colorpicker",
		  "holder"            => "div",
		  "heading"           => "Icon Color",
		  "param_name"        => "icon_color",
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Number to Count", "notio"),
			"param_name" => "counter",
			"admin_label" => true
		),
		array(
		  "type"              => "colorpicker",
		  "holder"            => "div",
		  "heading"           => "Number Color",
		  "param_name"        => "number_color",
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Speed of the counter animation", "notio"),
			"param_name" => "speed",
			"value" => "2000",
			"description" => esc_html__("Speed of the counter animation, default 1500", "notio"),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Heading", "notio"),
			"param_name" => "heading",
			"admin_label" => true
		),
		array(
			"type" => "textarea_safe",
			"heading" => esc_html__("Content", "notio"),
			"param_name" => "content"
		),
	),
	"description" => esc_html__("Counters with icons", "notio")
) );

// Google Map
vc_map( array(
	"name" => esc_html__("Contact Map Parent", "notio"),
	"base" => "thb_map_parent",
	"icon" => "thb_vc_ico_contactmap",
	"class" => "thb_vc_sc_contactmap",
	"content_element"	=> true,
	"category" => esc_html__("by Fuel Themes", "notio"),
	"as_parent" => array('only' => 'thb_map'),
	"params" => array(
		array(
		  "type" => "textfield",
		  "heading" => esc_html__("Map Height", "notio"),
		  "param_name" => "height",
		  "admin_label" => true,
		  "value" => 50,
		  "description" => esc_html__("Enter height of the map in vh (0-100). For example, 50 will be 50% of viewport height and 100 will be full height. <small>Make sure you have filled in your Google Maps API inside Appearance > Theme Options.</small>", "notio")
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Full Height Map", "notio"),
			"param_name" => "full_height",
			"admin_label" => true,
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If enabled, this will cause this map to always fill the height of the window.", "notio")
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Expand Toggle", "notio"),
			"param_name" => "expand",
			"admin_label" => true,
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If enabled, this will show an expand button on the map.", "notio")
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Map Position", "notio"),
			"param_name" => "position",
			"admin_label" => true,
			"value" => array(
				"Map on the Left" => "left",
				"Map on the Right" => "right"
			),
			"description" => esc_html__("This affects which side the map will grow.", "notio" ),
			"dependency" => Array('element' => "expand", 'value' => array('true'))
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Map Zoom', "notio" ),
			'param_name'     => 'zoom',
			'value'			 => '0',
			'description'    => esc_html__( 'Set map zoom level. Leave 0 to automatically fit to bounds.', "notio" )
		),
		array(
			'type'           => 'checkbox',
			'heading'        => esc_html__( 'Map Controls', "notio" ),
			'param_name'     => 'map_controls',
			'std'            => 'panControl, zoomControl, mapTypeControl, scaleControl',
			'value'          => array(
				__('Pan Control', "notio")             => 'panControl',
				__('Zoom Control', "notio")            => 'zoomControl',
				__('Map Type Control', "notio")        => 'mapTypeControl',
				__('Scale Control', "notio")           => 'scaleControl',
				__('Street View Control', "notio")     => 'streetViewControl'
			),
			'description'    => esc_html__( 'Toggle map options.', "notio" )
		),
		array(
			'type'           => 'dropdown',
			'heading'        => esc_html__( 'Map Type', "notio" ),
			'param_name'     => 'map_type',
			'std'            => 'roadmap',
			'value'          => array(
				__('Roadmap', "notio")   => 'roadmap',
				__('Satellite', "notio") => 'satellite',
				__('Hybrid', "notio")    => 'hybrid',
			),
			'description' => esc_html__( 'Choose map style.', "notio" )
		),
		array(
			'type' => 'textarea_raw_html',
			'heading' => esc_html__( 'Map Style', "notio" ),
			'param_name' => 'map_style',
			'value' => '',
			'description' => esc_html__( 'Paste the style code here. Browse map styles in <a href="https://snazzymaps.com/" target="_blank">SnazzyMaps</a>', "notio" )
		),
	),
	"description" => esc_html__("Insert your Contact Map", "notio" ),
	"js_view" => 'VcColumnView'
) );

vc_map( array(
	"name" => esc_html__("Contact Map Location", "notio"),
	"base" => "thb_map",
	"icon" => "thb_vc_ico_contactmap",
	"class" => "thb_vc_sc_contactmap",
	"category" => esc_html__("by Fuel Themes", "notio"),
	"as_child"         => array('only' => 'thb_map_parent'),
	"params"           => array(
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'Marker Image', "notio" ),
			'param_name'     => 'marker_image',
			'value'          => '',
			'description'    => esc_html__( 'Add your Custom marker image or use default one.', "notio" )
		),
		array(
			'type'           => 'checkbox',
			'heading'        => esc_html__( 'Retina Marker', "notio" ),
			'param_name'     => 'retina_marker',
			'std'            => '',
			'value'          => array(
				__('Yes', "notio") => 'yes',
			),
			'description'    => esc_html__( 'Enabling this option will reduce the size of marker for 50%, example if marker is 32x32 it will be 16x16.', "notio" )
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Latitude', "notio" ),
			'admin_label' 	 => true,
			'param_name'     => 'latitude',
			'value'			 => '',
			'description'    => esc_html__( 'Enter latitude coordinate. To select map coordinates <a href="http://www.latlong.net/convert-address-to-lat-long.html" target="_blank">click here</a>.', "notio" ),
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Longitude', "notio" ),
			'admin_label' 	 => true,
			'param_name'     => 'longitude',
			'value'			 => '',
			'description'    => esc_html__( 'Enter longitude coordinate.', "notio" ),
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Marker Title', "notio" ),
			'param_name'     => 'marker_title',
			'value'			 => '',
		),
		array(
			'type'           => 'textarea',
			'heading'        => esc_html__( 'Marker Description', "notio" ),
			'param_name'     => 'marker_description',
			'value'			 => '',
		)
	)
) );

class WPBakeryShortCode_thb_map_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_map extends WPBakeryShortCode {}

// Flip Box shortcode
vc_map( array(
	"name" => esc_html__("Flip Box", "notio"),
	"base" => "thb_flipbox",
	"icon" => "thb_vc_ico_flipbox",
	"class" => "thb_vc_sc_flipbox",
	"category" => esc_html__('by Fuel Themes', "notio"),
	"params" => array(
		array(
			"type" => "textarea_safe",
			"heading" => esc_html__("Content", "notio"),
			"param_name" => "front_content",
			"group" => esc_html__("Front Side", "notio")
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Background Color", "notio"),
			"param_name" => "front_bg_color",
			"group" => esc_html__("Front Side", "notio")
		),
		array(
			"type" => "attach_image", //attach_images
			"heading" => esc_html__("Background Image", "notio"),
			"param_name" => "front_bg_image",
			"group" => esc_html__("Front Side", "notio")
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Content Color", "notio"),
			"param_name" => "front_text_color",
			"value" => array(
				"Dark" => "dark",
				"Light" => "light"
			),
			"description" => esc_html__("If you want white-colored contents for this side, select Light.", "notio"),
			"group" => esc_html__("Front Side", "notio")
		),
		array(
			"type" => "textarea_safe",
			"heading" => esc_html__("Back Content", "notio"),
			"param_name" => "back_content",
			"group" => esc_html__("Back Side", "notio")
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Background Color", "notio"),
			"param_name" => "back_bg_color",
			"group" => esc_html__("Back Side", "notio")
		),
		array(
			"type" => "attach_image", //attach_images
			"heading" => esc_html__("Background Image", "notio"),
			"param_name" => "back_bg_image",
			"group" => esc_html__("Back Side", "notio")
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Content Color", "notio"),
			"param_name" => "back_text_color",
			"value" => array(
				"Dark" => "dark",
				"Light" => "light"
			),
			"description" => esc_html__("If you want white-colored contents for this side, select Light.", "notio"),
			"group" => esc_html__("Back Side", "notio")
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Min Height", "notio"),
		  "param_name" => "min_height",
		  "admin_label" => false,
		  "group" => esc_html__("General", "notio"),
		  "description" => esc_html__("Please enter the minimum height you would like for you box. Enter in number of pixels - Don't enter \"px\", default is \"300\"", "notio")
		),
	),
	"description" => esc_html__("Add a Flip Box", "notio")
) );

// Icon shortcode
vc_map( array(
	"name" => __("Icon", 'notio'),
	"base" => "thb_icon",
	"icon" => "thb_vc_ico_icon",
	"class" => "thb_vc_sc_icon",
	"class" => "thb_vc_sc_testimonial",
	"category" => esc_html__("by Fuel Themes", "notio"),
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Icon Size", "notio"),
			"param_name" => "icon_size",
			"value" => array(
				"Size: 1x" => "fa-1x",
				"Size: 2x" => "fa-2x",
				"Size: 3x" => "fa-3x",
				"Size: 4x" => "fa-4x",
				"Size: 5x" => "fa-5x"
			),
			"std" => "fa-1x"
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Icon Family", "notio"),
			"param_name" => "icon_family",
			"value" => array(
				"Font Awesome" => "style1",
				"Animated SVG" => "style2",
			),
			"std" => "style1"
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'notio' ),
			'param_name' => 'icon',
			'value' => 'fa fa-adjust', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
			),
			'description' => __( 'Select icon from library.', 'notio' ),
			"dependency" => Array('element' => "icon_family", 'value' => array('style1'))
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("SVG Icon", "notio"),
			"param_name" => "svg_icon",
			"value" => thb_getSvgIconArray(),
			"dependency" => Array('element' => "icon_family", 'value' => array('style2'))
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Animation Speed", "notio"),
			"param_name" => "icon_animation_speed",
			"value" => "1.5",
			'description'    => esc_html__( 'Speed of the animation in seconds', "notio" ),
			"dependency" => Array('element' => "icon_family", 'value' => array('style2'))
		),
		array(
		  "type"              => "colorpicker",
		  "holder"            => "div",
		  "heading"           => "Icon Color",
		  "param_name"        => "icon_color",
		),
	),
	"description" => esc_html__("Add a Single Icon", "notio" )
) );

// Iconbox shortcode
vc_map( array(
	"name" => __("Iconbox", 'notio'),
	"base" => "thb_iconbox",
	"icon" => "thb_vc_ico_iconbox",
	"class" => "thb_vc_sc_iconbox",
	"class" => "thb_vc_sc_testimonial",
	"category" => esc_html__("by Fuel Themes", "notio"),
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Type", "notio"),
			"param_name" => "type",
			"value" => array(
				"Top Icon - Type 1" => "top type1",
				"Top Icon - Type 2" => "top type2",
				"Top Icon - Type 3" => "top type1 left-aligned",
				"Left Icon - Type 1" => "left type1",
				"Left Icon - Type 2" => "left type2",
				"Left Icon - Type 3" => "left type3",
				"Right Icon - Type 1" => "right type1",
				"Right Icon - Type 2" => "right type2",
				"Right Icon - Type 3" => "right type3"
			),
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Icon Family", "notio"),
			"param_name" => "icon_family",
			"value" => array(
				"Font Awesome" => "style1",
				"Animated SVG" => "style2",
			),
			"std" => "style1"
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'notio' ),
			'param_name' => 'icon',
			'value' => 'fa fa-adjust', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
			),
			'description' => __( 'Select icon from library.', 'notio' ),
			"dependency" => Array('element' => "icon_family", 'value' => array('style1'))
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("SVG Icon", "notio"),
			"param_name" => "svg_icon",
			"value" => thb_getSvgIconArray(),
			"dependency" => Array('element' => "icon_family", 'value' => array('style2'))
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Animation Speed", "notio"),
			"param_name" => "icon_animation_speed",
			"value" => "1.5",
			'description'    => esc_html__( 'Speed of the animation in seconds', "notio" ),
			"dependency" => Array('element' => "icon_family", 'value' => array('style2'))
		),
		array(
		  "type"              => "colorpicker",
		  "holder"            => "div",
		  "heading"           => esc_html__("Icon Background Color", "notio"),
		  "param_name"        => "icon_bgcolor",
		  "dependency" => Array('element' => "type", 'value' => array('top type2','left type2', 'right type2'))
		),
		array(
		  "type"              => "colorpicker",
		  "holder"            => "div",
		  "heading"           => "Icon Color",
		  "param_name"        => "icon_color",
		),
		array(
			"type" => "attach_image", //attach_images
			"heading" => esc_html__("Image", "notio"),
			"param_name" => "image",
			"description" => esc_html__("Use image instead of icon? Image uploaded should be 60*60 or 120*120 for retina.", "notio")
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Heading", "notio"),
			"param_name" => "heading",
			"admin_label" => true,
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Heading Color", "notio"),
			"param_name" => "heading_color",
			"description" => esc_html__("You can change the heading color from here", "notio")
		),
		array(
			"type" => "textarea_safe",
			"heading" => esc_html__("Content", "notio"),
			"param_name" => "content",
			"dependency" => Array('element' => "type", 'value' => array('top type1','left type1', 'top type1 left-aligned', 'right type1','top type2','left type2', 'right type2'))
		),
		array(
		  "type"              => "colorpicker",
		  "holder"            => "div",
		  "heading"           => esc_html__("Content Color", "notio"),
		  "param_name"        => "content_color",
		  "dependency" => Array('element' => "type", 'value' => array('top type1','left type1', 'top type1 left-aligned', 'right type1','top type2','left type2', 'right type2'))
		)
	),
	"description" => esc_html__("Iconboxes with different animations", "notio" )
) );

// Image shortcode
vc_map( array(
	"name" => esc_html__("Image", "notio"),
	"base" => "thb_image",
	"icon" => "thb_vc_ico_image",
	"class" => "thb_vc_sc_image",
	"category" => esc_html__('by Fuel Themes', "notio"),
	"params" => array(
		array(
			"type" => "attach_image", //attach_images
			"heading" => esc_html__("Select Image", "notio"),
			"param_name" => "image"
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Retina Size?", "notio"),
			"param_name" => "retina",
			"value" => array(
				"Yes" => "retina_size"
			),
			"description" => esc_html__("If selected, the image will be display half-size, so it looks crisps on retina screens. Full Width setting will override this.", "notio")
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Full Width?", "notio"),
			"param_name" => "full_width",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If selected, the image will always fill its container", "notio")
		),
		$thb_animation_array,
		array(
		  "type" => "textfield",
		  "heading" => esc_html__("Image size", "notio"),
		  "param_name" => "img_size",
		  "description" => esc_html__("Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'thumbnail' size.", "notio")
		),
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Image alignment", "notio"),
		  "param_name" => "alignment",
		  "value" => array("Align left" => "left", "Align right" => "right", "Align center" => "center"),
		  "description" => esc_html__("Select image alignment.", "notio")
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Link to Full-Width Image?", "notio"),
			"param_name" => "lightbox",
			"value" => array(
				"Yes" => "true"
			)
		),
		array(
		  "type" => "vc_link",
		  "heading" => esc_html__("Image link", "notio"),
		  "param_name" => "img_link",
		  "description" => esc_html__("Enter url if you want this image to have link.", "notio"),
		  "dependency" => Array('element' => "lightbox", 'is_empty' => true)
		)
	),
	"description" => esc_html__("Add an animated image", "notio")
) );

// Image Slider
vc_map( array(
	"name" => esc_html__("Image Slider", "notio"),
	"base" => "thb_image_slider",
	"icon" => "thb_vc_ico_image_slider",
	"class" => "thb_vc_sc_image_slider",
	"category" => esc_html__("by Fuel Themes", "notio"),
	"params"	=> array(
		array(
			"type" => "attach_images", //attach_images
			"class" => "",
			"heading" => esc_html__("Select Images", "notio"),
			"param_name" => "images"
		),
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Columns", "notio"),
		  "param_name" => "thb_columns",
		  "value" => array(
		  	'Single Column' => "1",
		  	'Two Columns' => "2",
		  	'Three Columns' => "3",
		  	'Four Columns' => "4",
		  ),
		  "description" => esc_html__("Select the layout.", "notio" )
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Use lightbox?", "notio"),
			"param_name" => "lightbox",
			"value" => array(
				"Yes" => "thb_gallery"
			)
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Center Images", "notio"),
			"param_name" => "thb_center",
			"value" => array(
				"Yes" => "true"
			)
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Use Pagination", "notio"),
			"param_name" => "thb_pagination",
			"value" => array(
				"Yes" => "true"
			),
			"std" => "true"
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Use Arrows", "notio"),
			"param_name" => "thb_navigation",
			"value" => array(
				"Yes" => "true"
			),
			"std" => false
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Auto Play", "notio"),
			"param_name" => "autoplay",
			"value" => array(
				"Yes" => "1"
			),
			"description" => esc_html__("If enabled, the carousel will autoplay.", "notio"),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Speed of the AutoPlay", "notio"),
			"param_name" => "autoplay_speed",
			"value" => "4000",
			"description" => esc_html__("Speed of the autoplay, default 4000 (4 seconds)", "notio"),
			"dependency" => Array('element' => "autoplay", 'value' => array('true'))
		),
	),
	"description" => esc_html__("Add Slider with your images", "notio")
) );

// Instagram
vc_map( array(
	"name" => esc_html__("Instagram", "notio"),
	"base" => "thb_instagram",
	"icon" => "thb_vc_ico_instagram",
	"class" => "thb_vc_sc_instagram",
	"category" => esc_html__("by Fuel Themes", "notio"),
	"params"	=> array(
	  array(
      "type" => "textfield",
      "heading" => esc_html__("Number of Photos", "notio"),
      "param_name" => "number",
      "description" => esc_html__("Number of Instagram Photos to retrieve.", "notio")
	  ),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Columns", "notio"),
			"param_name" => "columns",
			"admin_label" => true,
			"value" => array(
				'2 Columns' => "large-6",
				'3 Columns' => "large-4",
				'4 Columns' => "large-3",
				'5 Columns' => "thb-5",
				'6 Columns' => "large-2"
			),
		),
		array(
	    "type" => "checkbox",
	    "heading" => esc_html__("Add Padding between photos?", "notio"),
	    "param_name" => "padding",
	    "value" => array(
				"Yes" => "true"
			),
	    "description" => esc_html__("You can add spaces between photos", "notio")
		),
	  array(
      "type" => "checkbox",
      "heading" => esc_html__("Link Photos to Instagram?", "notio"),
      "param_name" => "link",
      "value" => array(
				"Yes" => "true"
			),
      "description" => esc_html__("Do you want to link the Instagram photos to instagram.com website?", "notio")
	  )
	),
	"description" => esc_html__("Add Instagram Photos", "notio")
) );

// Play Button
vc_map( array(
	"name" => esc_html__("Play Button", "notio"),
	"base" => "thb_play",
	"icon" => "thb_vc_ico_play",
	"class" => "thb_vc_sc_play",
	"category" => esc_html__("by Fuel Themes", "notio"),
	"show_settings_on_create" => false,
	"description" => esc_html__("For Row Video Backgrounds", "notio")
) );

// Portfolio
vc_map( array(
	"name" => __("Portfolio Masonry", 'notio'),
	"base" => "thb_portfolio",
	"icon" => "thb_vc_ico_portfolio",
	"class" => "thb_vc_sc_portfolio",
	"category" => esc_html__("by Fuel Themes", "notio"),
	"params"	=> array(
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Portfolio Style", "notio"),
	      "param_name" => "style",
	      "value" => array(
	      	'Style 1 - Hover Titles' => "style1",
	      	'Style 2 - Titles under Images' => "style2"
	      ),
	      "admin_label" => true,
	      "description" => esc_html__("Select Portfolio Style", "notio")
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Masonry Layout", "notio"),
	      "param_name" => "masonry_style",
	      "value" => array(
	      	'Layout 1' => "style1",
	      	'Layout 2' => "style2",
	      	'Layout 3' => "style3",
	      	'Layout 4' => "style4"
	      ),
	      "admin_label" => true,
	      "description" => esc_html__("Select Masonry Layout for Style 1", "notio" ),
	      "dependency" => Array('element' => "style", 'value' => array('style1'))
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Columns", "notio"),
	      "param_name" => "columns",
	      "value" => array(
	      	'Six Columns' => "small-12 medium-4 large-2",
	      	'Five Columns' => "small-12 medium-3 thb-5",
	      	'Four Columns' => "small-12 medium-6 large-3",
	      	'Three Columns' => "small-12 large-4",
	      	'Two Columns' => "small-12 large-6"
	      ),
	      "admin_label" => true,
	      "description" => esc_html__("Select columns for Masonry Style 2", "notio" ),
	      "dependency" => Array('element' => "style", 'value' => array('style2'))
	  ),
	  array(
	      "type" => "loop",
	      "heading" => esc_html__("Portfolio Source", "notio"),
	      "param_name" => "source",
	      "description" => esc_html__("Set your portfolio source here. Make sure you select portfolio post type", "notio")
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("Margins between items?", "notio"),
	      "param_name" => "thb_margins",
	      "value" => array(
	      		"Yes" => "true"
	      	),
	      "description" => esc_html__("This will add margins between your portfolio items", "notio")
	  ),
	  array(
	  	"type" => "colorpicker",
	  	"heading" => esc_html__("Text Color", "notio"),
	  	"param_name" => "color",
	  	"dependency" => Array('element' => "style", 'value' => array('text1'))
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("Add Filters?", "notio"),
	      "param_name" => "add_filters",
	      "group" => "Filters",
	      "value" => array(
	      		"Yes" => "true"
	      	),
	      "description" => esc_html__("This will display filters on the top", "notio" )
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Filter Style", "notio"),
	      "param_name" => "filter_style",
	      "group" => "Filters",
	      "value" => array(
	      	'Style 1 - Over Portfolio Items' => "style1",
	      	'Style 2 - On top of Portfolio Items' => "style2",
	      	'Style 3 - Inside Header as Icon' => "style3",
	      ),
	      "description" => esc_html__("Select your filter style", "notio")
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("Filter Categories", "notio"),
	      "param_name" => "filter_categories",
	      "group" => "Filters",
	      "value" => thb_portfolioCategories(),
	      "description" => esc_html__("Select which categories you want to filter", "notio"),
	      "dependency" => Array('element' => "add_filters", 'value' => array('true'))
	  ),
	  
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("Add Load More Button?", "notio"),
	      "param_name" => "loadmore",
	      "group" => "Load More",
	      "value" => array(
	      		"Yes" => "true"
	      	),
	      "description" => esc_html__("Add Load More button at the bottom", "notio")
	  ),
	  array(
	    "type" => "dropdown",
	    "heading" => esc_html__("Load More Button Style", "notio"),
	    "param_name" => "loadmore_style",
	     "group" => "Load More",
	    "value" => array(
	    	'Default' => 'loadmore',
	    	'Style 1' => "style1",
	    	'Style 2' => 'style2',
	    	'Style 3' => "style3",
	    	'Style 4' => "style4",
	    	'Style 5' => "style5",
	    	'Style 6' => "style6"
	    ),
	    "std" => "loadmore",
	    "description" => esc_html__("This changes the look of the button", "notio"),
	    "dependency" => Array('element' => "loadmore", 'value' => array('true'))
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Hover Style", "notio"),
	      "param_name" => "hover_style",
	      "value" => array(
	      	'Style 1' => "hover-style1",
	      	'Style 2' => "hover-style2",
	      	'Style 3' => "hover-style3",
	      	'Style 4' => "hover-style4",
	      	'Style 5' => "hover-style5",
	      	'Style 6' => "hover-style6",
	      	'Style 7 - 3D' => "hover-style7",
	      	'Style 8 - Hover Image' => "hover-style8",
	      	'Style 9 - With Button' => "hover-style9",
	      ),
	      "description" => esc_html__("Changes the effect of your hover styles.", "notio"),
	      "dependency" => Array('element' => "style", 'value' => array('style1'))
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Hover Style", "notio"),
	      "param_name" => "style2_hover_style",
	      "value" => array(
	      	'Style 1 - Opacity' => "style2-hover-style1",
	      	'Style 2 - Color & Scale' => "style2-hover-style2"
	      ),
	      "description" => esc_html__("Changes the effect of your hover styles.", "notio"),
	      "dependency" => Array('element' => "style", 'value' => array('style2'))
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Title Position", "notio"),
	      "param_name" => "title_position",
	      "value" => array(
	      	'Center' => "title-center",
	      	'Center Left' => "title-centerleft",
	      	'Top Left' => "title-topleft",
	      	'Bottom Left' => "title-bottomleft"
	      ),
	      "description" => esc_html__("This changes the position of the title", "notio")
	  ),
	),
	"description" => esc_html__("Display Your Portfolio in style", "notio")
) );

vc_map( array(
	"name" => __("Portfolio Grid", 'notio'),
	"base" => "thb_portfolio_grid",
	"icon" => "thb_vc_ico_portfolio_grid",
	"class" => "thb_vc_sc_portfolio_grid",
	"category" => esc_html__("by Fuel Themes", "notio"),
	"params"	=> array(
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Portfolio Style", "notio"),
		    "param_name" => "style",
		    "value" => array(
		    	'Style 1 - Hover Titles' => "style1",
		    	'Style 2 - Titles under Images' => "style2"
		    ),
		    "admin_label" => true,
		    "description" => esc_html__("Select Portfolio Style", "notio" )
		),
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Columns", "notio"),
		    "param_name" => "columns",
		    "value" => array(
		    	'Six Columns' => "small-12 medium-4 large-2",
		    	'Five Columns' => "small-12 medium-3 thb-5",
		    	'Four Columns' => "small-12 medium-6 large-3",
		    	'Three Columns' => "small-12 large-4",
		    	'Two Columns' => "small-12 large-6"
		    ),
		    "admin_label" => true,
		    "description" => esc_html__("Select the layout of the portfolios.", "notio" )
		),
	  array(
	      "type" => "loop",
	      "heading" => esc_html__("Portfolio Source", "notio"),
	      "param_name" => "source",
	      "description" => esc_html__("Set your portfolio source here. Make sure you select portfolio post type", "notio")
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("True Aspect Ratios", "notio"),
	      "param_name" => "true_aspect",
	      "value" => array(
	      		"Yes" => "true"
	      	),
	      "description" => esc_html__("This will change the aspect ratios of the portfolio so that they are displayed same as their featured image.", "notio")
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("Margins between items?", "notio"),
	      "param_name" => "thb_margins",
	      "value" => array(
	      		"Yes" => "true"
	      	),
	      "description" => esc_html__("This will add margins between your portfolio items", "notio" )
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("Add Filters?", "notio"),
	      "param_name" => "add_filters",
	      "value" => array(
	      		"Yes" => "true"
	      	),
	      "description" => esc_html__("This will display filters on the top", "notio" )
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("Filter Categories", "notio"),
	      "param_name" => "filter_categories",
	      "value" => thb_portfolioCategories(),
	      "description" => esc_html__("Select which categories you want to filter", "notio"),
	      "dependency" => Array('element' => "add_filters", 'value' => array('true'))
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Filter Style", "notio"),
	      "param_name" => "filter_style",
	      "value" => array(
	      	'Style 1 - Over Portfolio Items' => "style1",
	      	'Style 2 - On top of Portfolio Items' => "style2",
	      	'Style 3 - Inside Header as Icon' => "style3",
	      ),
	      "description" => esc_html__("Select your filter style", "notio" )
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("Add Load More Button?", "notio"),
	      "param_name" => "loadmore",
	      "value" => array(
	      		"Yes" => "true"
	      	),
	      "description" => esc_html__("Add Load More button at the bottom", "notio" )
	  ),
	  array(
	    "type" => "dropdown",
	    "heading" => esc_html__("Load More Button Style", "notio"),
	    "param_name" => "loadmore_style",
	    "value" => array(
	    	'Default' => 'loadmore',
	    	'Style 1' => "style1",
	    	'Style 2' => 'style2',
	    	'Style 3' => "style3",
	    	'Style 4' => "style4",
	    	'Style 5' => "style5",
	    	'Style 6' => "style6"
	    ),
	    "std" => "loadmore",
	    "description" => esc_html__("This changes the look of the button", "notio"),
	    "dependency" => Array('element' => "loadmore", 'value' => array('true'))
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Hover Style", "notio"),
	      "param_name" => "hover_style",
	      "value" => array(
	      	'Style 1' => "hover-style1",
	      	'Style 2' => "hover-style2",
	      	'Style 3' => "hover-style3",
	      	'Style 4' => "hover-style4",
	      	'Style 5' => "hover-style5",
	      	'Style 6' => "hover-style6",
	      	'Style 7 - 3D' => "hover-style7",
	      	'Style 8 - Hover Image' => "hover-style8",
	      	'Style 9 - With Button' => "hover-style9",
	      ),
	      "description" => esc_html__("Changes the effect of your hover styles.", "notio"),
	      "dependency" => Array('element' => "style", 'value' => array('style1'))
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Hover Style", "notio"),
	      "param_name" => "style2_hover_style",
	      "value" => array(
	      	'Style 1 - Opacity' => "style2-hover-style1",
	      	'Style 2 - Color & Scale' => "style2-hover-style2"
	      ),
	      "description" => esc_html__("Changes the effect of your hover styles.", "notio"),
	      "dependency" => Array('element' => "style", 'value' => array('style2'))
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Title Position", "notio"),
	      "param_name" => "title_position",
	      "value" => array(
	      	'Center' => "title-center",
	      	'Center Left' => "title-centerleft",
	      	'Top Left' => "title-topleft",
	      	'Bottom Left' => "title-bottomleft"
	      ),
	      "description" => esc_html__("This changes the position of the title", "notio")
	  ),
	),
	"description" => esc_html__("Display Your Portfolio in style", "notio" )
) );

// Portfolio Slider
vc_map( array(
	"name" => esc_html__("Portfolio Slider", 'notio'),
	"base" => "thb_portfolio_slider",
	"icon" => "thb_vc_ico_portfolio_slider",
	"class" => "thb_vc_sc_portfolio_slider",
	"category" => esc_html__("by Fuel Themes", "notio"),
	"params"	=> array(
		array(
		    "type" => "loop",
		    "heading" => esc_html__("Portfolio Source", "notio"),
		    "param_name" => "source",
		    "description" => esc_html__("Set your portfolio source here. Make sure you select portfolio post type", "notio")
		),
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Slider Style", "notio"),
		  "param_name" => "style",
		  "value" => array(
		  	'Style 1' => "slider-style1",
		  	'Style 2' => "slider-style2"
		  ),
		  "description" => esc_html__("This changes the look of the slider", "notio")
		),
	  array(
	    "type" => "dropdown",
	    "heading" => esc_html__("Button Style", "notio"),
	    "param_name" => "button_style",
	    "value" => $thb_button_style_array,
	    "description" => esc_html__("This changes the look of the button", "notio")
	  ),
	  array(
	  	"type" => "checkbox",
	  	"heading" => esc_html__("Hide View Project Button?", "notio"),
	  	"param_name" => "button_hide",
	  	"value" => array(
	  		"Yes" => "1"
	  	),
	  	"description" => esc_html__("If enabled, view project link will be hidden.", "notio"),
	  ),
	  array(
	  	"type" => "checkbox",
	  	"heading" => esc_html__("Auto Play", "notio"),
	  	"param_name" => "autoplay",
	  	"value" => array(
	  		"Yes" => "1"
	  	),
	  	"description" => esc_html__("If enabled, the carousel will autoplay.", "notio"),
	  ),
	  array(
	  	"type" => "textfield",
	  	"heading" => esc_html__("Speed of the AutoPlay", "notio"),
	  	"param_name" => "autoplay_speed",
	  	"value" => "5000",
	  	"description" => esc_html__("Speed of the autoplay, default 5000 (5 seconds)", "notio"),
	  	"dependency" => Array('element' => "autoplay", 'value' => array('1'))
	  ),
	),
	"description" => esc_html__("Display Your Portfolio in a Slider Layout", "notio")
) );

// Portfolio Text
vc_map( array(
	"name" => __("Portfolio Text", 'notio'),
	"base" => "thb_portfolio_text",
	"icon" => "thb_vc_ico_portfolio_text",
	"class" => "thb_vc_sc_portfolio_text",
	"category" => esc_html__("by Fuel Themes", "notio"),
	"params"	=> array(
	  array(
      "type" => "dropdown",
      "heading" => esc_html__("Style", "notio"),
      "param_name" => "style",
      "admin_label" => true,
      "value" => array(
      	'Style 1' => "style1",
      	'Style 2' => "style2",
      	'Style 3' => "style3"
      ),
      "description" => esc_html__("This changes the style of the portfolios", "notio" )
	  ),
	  array(
      "type" => "loop",
      "heading" => esc_html__("Portfolio Source", "notio"),
      "param_name" => "source",
      "description" => esc_html__("Set your portfolio source here. Make sure you select portfolio post type", "notio")
	  ),
	  array(
	  	"type" => "dropdown",
	  	"heading" => esc_html__("Text Color", "notio"),
	  	"param_name" => "thb_color",
	  	"value" => array(
	  		"Dark" => "dark-title",
	  		"Light" => "light-title"
	  	),
	  	"description" => esc_html__("If you white-colored contents for this element, select Light.", "notio")
	  )
	),
	"description" => esc_html__("Display Your Portfolio in text style", "notio" )
) );

// Portfolio carousel
vc_map( array(
	"name" => __("Portfolio Carousel", 'notio'),
	"base" => "thb_portfolio_carousel",
	"icon" => "thb_vc_ico_portfolio_carousel",
	"class" => "thb_vc_sc_portfolio_carousel",
	"category" => esc_html__("by Fuel Themes", "notio"),
	"params"	=> array(
	  array(
	      "type" => "loop",
	      "heading" => esc_html__("Portfolio Source", "notio"),
	      "param_name" => "source",
	      "description" => esc_html__("Set your portfolio source here. Make sure you select portfolio post type", "notio")
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Columns", "notio"),
	      "param_name" => "columns",
	      "value" => array(
	      	'Six Columns' => "small-12 medium-4 large-2",
	      	'Five Columns' => "small-12 medium-3 thb-5",
	      	'Four Columns' => "small-12 medium-6 large-3",
	      	'Three Columns' => "small-12 large-4",
	      	'Two Columns' => "small-12 large-6"
	      ),
	      "admin_label" => true,
	      "description" => esc_html__("Select the layout of the portfolios.", "notio" )
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Hover Style", "notio"),
	      "param_name" => "hover_style",
	      "value" => array(
	      	'Style 1' => "hover-style1",
	      	'Style 2' => "hover-style2",
	      	'Style 3' => "hover-style3",
	      	'Style 4' => "hover-style4",
	      	'Style 5' => "hover-style5",
	      	'Style 6' => "hover-style6",
	      ),
	      "description" => esc_html__("Changes the effect of your hover styles.", "notio" )
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Title Position", "notio"),
	      "param_name" => "title_position",
	      "value" => array(
	      	'Center' => "title-center",
	      	'Center Left' => "title-centerleft",
	      	'Top Left' => "title-topleft",
	      	'Bottom Left' => "title-bottomleft"
	      ),
	      "description" => esc_html__("This changes the position of the title", "notio")
	  ),
	  array(
	  	"type" => "checkbox",
	  	"heading" => esc_html__("Use Pagination", "notio"),
	  	"param_name" => "thb_pagination",
	  	"value" => array(
	  		"Yes" => "true"
	  	),
	  	"std" => "true"
	  ),
	  array(
	  	"type" => "checkbox",
	  	"heading" => esc_html__("Use Arrows", "notio"),
	  	"param_name" => "thb_navigation",
	  	"value" => array(
	  		"Yes" => "true"
	  	),
	  	"std" => false
	  ),
	),
	"description" => esc_html__("Display Your Portfolio in a carousel", "notio" )
) );

// Portfolio Horizontal
vc_map( array(
	"name" => __("Portfolio Horizontal", 'notio'),
	"base" => "thb_portfolio_horizontal",
	"icon" => "thb_vc_ico_portfolio_horizontal",
	"class" => "thb_vc_sc_portfolio_horizontal",
	"category" => esc_html__("by Fuel Themes", "notio"),
	"params"	=> array(
	  array(
	      "type" => "loop",
	      "heading" => esc_html__("Portfolio Source", "notio"),
	      "param_name" => "source",
	      "description" => esc_html__("Set your portfolio source here. Make sure you select portfolio post type", "notio")
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Hover Style", "notio"),
	      "param_name" => "hover_style",
	      "value" => array(
	      	'Style 1' => "hover-style1",
	      	'Style 2' => "hover-style2",
	      	'Style 3' => "hover-style3",
	      	'Style 4' => "hover-style4",
	      	'Style 5' => "hover-style5",
	      	'Style 6' => "hover-style6",
	      ),
	      "description" => esc_html__("Changes the effect of your hover styles.", "notio" )
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Title Position", "notio"),
	      "param_name" => "title_position",
	      "value" => array(
	      	'Center' => "title-center",
	      	'Top Left' => "title-topleft",
	      	'Bottom Left' => "title-bottomleft"
	      ),
	      "description" => esc_html__("This changes the position of the title", "notio")
	  ),
	),
	"description" => esc_html__("Display Your Portfolio in a horizontal layout", "notio" )
) );

vc_map( array(
	"name" => __("Single Portfolio", 'notio'),
	"base" => "thb_portfolio_single",
	"icon" => "thb_vc_ico_portfolio_single",
	"class" => "thb_vc_sc_portfolio_single",
	"category" => esc_html__("by Fuel Themes", "notio"),
	"params"	=> array(
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Portfolio Style", "notio"),
		    "param_name" => "style",
		    "value" => array(
		    	'Style 1 - Hover Titles' => "style1",
		    	'Style 2 - Titles under Images' => "style2"
		    ),
		    "admin_label" => true,
		    "description" => esc_html__("Select Portfolio Style", "notio" )
		),
	  array(
	      "type" => "loop",
	      "heading" => esc_html__("Portfolio Source", "notio"),
	      "param_name" => "source",
	      "description" => esc_html__("Set your portfolio source here. Make sure you select portfolio post type", "notio")
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Hover Style", "notio"),
	      "param_name" => "hover_style",
	      "value" => array(
	      	'Style 1' => "hover-style1",
	      	'Style 2' => "hover-style2",
	      	'Style 3' => "hover-style3",
	      	'Style 4' => "hover-style4",
	      	'Style 5' => "hover-style5",
	      	'Style 6' => "hover-style6",
	      ),
	      "description" => esc_html__("Changes the effect of your hover styles.", "notio" ),
	      "dependency" => Array('element' => "style", 'value' => array('style1'))
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Title Position", "notio"),
	      "param_name" => "title_position",
	      "value" => array(
	      	'Center' => "title-center",
	      	'Top Left' => "title-topleft",
	      	'Bottom Left' => "title-bottomleft"
	      ),
	      "description" => esc_html__("This changes the position of the title", "notio")
	  ),
	),
	"description" => esc_html__("Adds a Single Portfolio item.", "notio" )
) );

// Portfolio Attributes
vc_map( array(
	"name" => esc_html__( "Portfolio Attributes", "notio"),
	"base" => "thb_portfolio_attribute",
	"icon" => "thb_vc_ico_portfolio_attribute",
	"class" => "thb_vc_sc_portfolio_attribute",
	"category" => esc_html__('by Fuel Themes', "notio"),
	"params" => array(
		array(
	    "type" => "dropdown",
	    "heading" => esc_html__("Style", "notio"),
	    "param_name" => "style",
	    "admin_label" => true,
	    "value" => array(
	    	'Style 1 - Vertical' => 'style1',
	    	'Style 2 - Horizontal' => 'style2'
	    ),
	    "description" => esc_html__("This changes the layout of the attributes", "notio")
		)
	),
	"description" => esc_html__("Add your Portfolio Attributes to the page", "notio")
) );

// Blog Posts
vc_map( array(
	"name" => esc_html__("Blog Posts", "notio"),
	"base" => "thb_post",
	"icon" => "thb_vc_ico_post",
	"class" => "thb_vc_sc_post",
	"category" => esc_html__("by Fuel Themes", "notio"),
	"params"	=> array(
	  array(
	      "type" => "loop",
	      "heading" => esc_html__("Post Source", "notio"),
	      "param_name" => "source",
	      "description" => esc_html__("Set your post source here", "notio")
	  ),
	  array(
	  	"type" => "dropdown",
	  	"heading" => esc_html__("Style", "notio"),
	  	"param_name" => "style",
	  	"admin_label" => true,
	  	"value" => array(
	  		'Style 1' => "style1",
	  		'Style 2' => "style2",
	  		'Style 3' => "style3",
	  		'Style 4' => "style4",
	  		'Style 5' => "style5",
	  		'Style 6' => "style6",
	  		'Style 7' => "style7",
	  		'Style 8' => "style8"
	  	),
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Columns", "notio"),
	      "param_name" => "columns",
	      "value" => array(
	      	'Five Columns' => "small-12 medium-3 thb-5",
	      	'Four Columns' => "small-12 medium-6 large-3",
	      	'Three Columns' => "small-12 large-4",
	      	'Two Columns' => "small-12 large-6"
	      ),
	      "admin_label" => true,
	      "description" => esc_html__("Select columns for this blog layout", "notio" ),
	      "dependency" => Array('element' => "style", 'value' => array('style3','style7','style8'))
	  ),
	),
	"description" => esc_html__("Display Blog Posts from your blog", "notio")
) );

// Share shortcode
vc_map( array(
	"name" => __("Share", 'notio'),
	"base" => "thb_share",
	"icon" => "thb_vc_ico_share",
	"class" => "thb_vc_sc_share",
	"category" => esc_html__("by Fuel Themes", "notio"),
	"params" => array(
		array(
		  "type" => "textfield",
		  "heading" => esc_html__("Share Text", "notio"),
		  "param_name" => "text",
		  "description" => esc_html__("Enter the title of the share button", "notio" )
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Facebook", "notio"),
			"param_name" => "facebook",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If you enable this, Facebook share icon will be displayed inside lightbox", "notio" )
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Twitter", "notio"),
			"param_name" => "twitter",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If you enable this, Twitter share icon will be displayed inside lightbox", "notio" )
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Pinterest", "notio"),
			"param_name" => "pinterest",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If you enable this, Pinterest share icon will be displayed inside lightbox", "notio" )
		)
	),
	"description" => esc_html__("Display a Share Button", "notio" )
) );

// Styled Header
vc_map( array(
	"name" => esc_html__("Styled Header", 'notio'),
	"base" => "thb_styled_header",
	"icon" => "thb_vc_ico_styled",
	"class" => "thb_vc_sc_styled",
	"category" => esc_html__("by Fuel Themes", "notio"),
	"params" => array(
		array(
		  "type" => "textarea",
		  "heading" => esc_html__("Title", 'notio'),
		  "param_name" => "title",
		  "admin_label" => true,
		  "description" => esc_html__("Title of the header", 'notio')
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Color", "notio"),
			"param_name" => "thb_color"
		),
	),
	"description" => esc_html__("Different Styled Headers", "notio"),
) );

// Team Member Parent
vc_map( array(
	"name" => esc_html__("Team Members", "notio"),
	"base" => "thb_team_parent",
	"icon" => "thb_vc_ico_team",
	"class" => "thb_vc_sc_team",
	"content_element"	=> true,
	"category" => esc_html__("by Fuel Themes", "notio"),
	"as_parent" => array('only' => 'thb_team, thb_team_addnew'),
	"params"	=> array(
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Layout", "notio"),
		    "param_name" => "thb_style",
		    "admin_label" => true,
		    "value" => array(
		    	'Style 1 (Grid)' => "style1",
		    	'Style 2 (Carousel)' => "slick"
		    ),
		    "description" => esc_html__("This changes the layout style of the team members", "notio")
		),
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Team Member Style", "notio"),
		    "param_name" => "thb_member_style",
		    "value" => array(
		    	'Style 1 (Text over Image)' => "member_style1",
		    	'Style 2 (Text under Image)' => "member_style2"
		    ),
		    "description" => esc_html__("This changes the style of the members", "notio")
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Columns", "notio"),
			"param_name" => "thb_columns",
			"admin_label" => true,
			"value" => array(
				'2 Columns' => "large-6",
				'3 Columns' => "large-4",
				'4 Columns' => "medium-4 large-3",
				'5 Columns' => "medium-6 thb-5",
				'6 Columns' => "medium-4 large-2"
			)
		),
	),
	"description" => esc_html__("Team Members", "notio"),
	"js_view" => 'VcColumnView'
) );

vc_map( array(
	"name" => esc_html__("Team Member", "notio"),
	"base" => "thb_team",
	"icon" => "thb_vc_ico_team",
	"class" => "thb_vc_sc_team",
	"as_child" => array('only' => 'thb_team_parent'),
	"params"	=> array(
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'Image', "notio" ),
			'param_name'     => 'image',
			'value'          => '',
			'description'    => esc_html__( 'Add Team Member image here.', "notio" )
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Name', "notio" ),
			'param_name'     => 'name',
			'admin_label'	 => true,
			'description'    => esc_html__( 'Name of the member.', "notio" ),
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Sub Title', "notio" ),
			'param_name'     => 'sub_title',
			'description'    => esc_html__( 'Position or title of the member.', "notio" ),
		),
		array(
		  "type" => "textfield",
		  "heading" => esc_html__("Facebook", "notio"),
		  "param_name" => "facebook",
		  "description" => esc_html__("Enter Facebook Link", "notio" )
		),
		array(
		  "type" => "textfield",
		  "heading" => esc_html__("Twitter", "notio"),
		  "param_name" => "twitter",
		  "description" => esc_html__("Enter Twitter Link", "notio" )
		),
		array(
		  "type" => "textfield",
		  "heading" => esc_html__("Pinterest", "notio"),
		  "param_name" => "pinterest",
		  "description" => esc_html__("Enter Pinterest Link", "notio" )
		),
		array(
		  "type" => "textfield",
		  "heading" => esc_html__("Linkedin", "notio"),
		  "param_name" => "linkedin",
		  "description" => esc_html__("Enter Linkedin Link", "notio" )
		)
	),
	"description" => esc_html__("Single Team Member", "notio")
) );

class WPBakeryShortCode_thb_team_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_team extends WPBakeryShortCode {}

// Clients Parent
vc_map( array(
	"name" => esc_html__("Clients", "notio"),
	"base" => "thb_clients_parent",
	"icon" => "thb_vc_ico_clients",
	"class" => "thb_vc_sc_clients",
	"content_element"	=> true,
	"category" => esc_html__("by Fuel Themes", "notio"),
	"as_parent" => array('only' => 'thb_clients'),
	"params"	=> array(
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Style", "notio"),
		    "param_name" => "thb_style",
		    "admin_label" => true,
		    "value" => array(
		    	'Style 1 (Grid)' => "style1",
		    	'Style 2 (Carousel)' => "slick"
		    ),
		    "description" => esc_html__("This changes the layout style of the client logos", "notio")
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Columns", "notio"),
			"param_name" => "thb_columns",
			"admin_label" => true,
			"value" => array(
				'2 Columns' => "small-6 large-6",
				'3 Columns' => "small-6 large-4",
				'4 Columns' => "small-6 large-3",
				'5 Columns' => "small-6 thb-5",
				'6 Columns' => "small-6 large-2"
			)
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Image Borders", "notio"),
			"param_name" => "thb_image_borders",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If you enable this, the logos will have border", "notio")
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Border Color", "notio"),
			"param_name" => "thb_border_color",
			"admin_label" => true,
			"value" => "#f0f0f0",
			"dependency" => Array('element' => "thb_image_borders", 'value' => array('true'))
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Hover Effect", "notio"),
			"param_name" => "thb_hover_effect",
			"admin_label" => true,
			"value" => array(
				'None' => "",
				'Opacity' => "thb-opacity",
				'Grayscale' => "thb-grayscale",
				'Opacity with Accent hover' => "thb-opacity with-accent"
			)
		),
	),
	"description" => esc_html__("Partner/Client logos", "notio"),
	"js_view" => 'VcColumnView'
) );
vc_map( array(
	"name" => esc_html__("Client", "notio"),
	"base" => "thb_clients",
	"icon" => "thb_vc_ico_clients",
	"class" => "thb_vc_sc_clients",
	"category" => esc_html__("by Fuel Themes", "notio"),
	"as_child" => array('only' => 'thb_clients_parent'),
	"params"	=> array(
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'Image', "notio" ),
			'param_name'     => 'image',
			'value'          => '',
			'description'    => esc_html__( 'Add logo image here.', "notio" )
		),
		array(
			'type'           => 'vc_link',
			'heading'        => esc_html__( 'Link', "notio" ),
			'param_name'     => 'link',
			"admin_label" => true,
			'description'    => esc_html__( 'Add a link to client website if desired.', "notio" ),
		),
	),
	"description" => esc_html__("Single Client", "notio")
) );
class WPBakeryShortCode_thb_clients_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_clients extends WPBakeryShortCode {}

// Testimonial Parent
vc_map( array(
	"name" => esc_html__("Testimonial Slider", "notio"),
	"base" => "thb_testimonial_parent",
	"icon" => "thb_vc_ico_testimonial",
	"class" => "thb_vc_sc_testimonial",
	"content_element"	=> true,
	"category" => esc_html__("by Fuel Themes", "notio"),
	"as_parent" => array('only' => 'thb_testimonial'),
	"params"	=> array(
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Style", "notio"),
		    "param_name" => "thb_style",
		    "admin_label" => true,
		    "value" => array(
		    	'Style 1' => "testimonial-style1",
		    	'Style 2' => "testimonial-style2"
		    ),
		    "description" => esc_html__("This changes the layout style of the testimonials", "notio")
		)
	),
	"description" => esc_html__("Testimonials Slider", "notio"),
	"js_view" => 'VcColumnView'
) );
vc_map( array(
	"name" => esc_html__("Testimonial", "notio"),
	"base" => "thb_testimonial",
	"icon" => "thb_vc_ico_testimonial",
	"class" => "thb_vc_sc_testimonial",
	"category" => esc_html__("by Fuel Themes", "notio"),
	"as_child" => array('only' => 'thb_testimonial_parent'),
	"params"	=> array(
		array(
			'type'           => 'textarea',
			'heading'        => esc_html__( 'Quote', "notio" ),
			'param_name'     => 'quote',
			'description'    => esc_html__( 'Quote you want to show', "notio" ),
		),
		array(
		'type'           => 'textfield',
			'heading'        => esc_html__( 'Author', "notio" ),
			'param_name'     => 'author_name',
			'admin_label'	 => true,
			'description'    => esc_html__( 'Name of the member.', "notio" ),
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Author Title', "notio" ),
			'param_name'     => 'author_title',
			'description'    => esc_html__( 'Title that will appear below author name.', "notio" ),
		),
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'Author Image', "notio" ),
			'param_name'     => 'author_image',
			'description'    => esc_html__( 'Add Author image here. Could be used depending on style.', "notio" )
		)
	),
	"description" => esc_html__("Single Testimonial", "notio")
) );
class WPBakeryShortCode_thb_testimonial_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_testimonial extends WPBakeryShortCode {}

// Twitter shortcode
vc_map( array(
	"name" => __("Twitter", 'notio'),
	"base" => "thb_twitter",
	"icon" => "thb_vc_ico_twitter",
	"class" => "thb_vc_sc_twitter",
	"class" => "thb_vc_sc_testimonial",
	"category" => esc_html__("by Fuel Themes", "notio"),
	"params" => array(
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Style", "notio"),
		    "param_name" => "style",
		    "value" => array(
		    	'Style 1 - List' => "style1",
		    	'Style 2 - Slider' => "style2",
		    ),
		    "description" => esc_html__("This changes layout", "notio" )
		),
		array(
		  "type" => "textfield",
		  "heading" => esc_html__("Number of Tweets", "notio"),
		  "param_name" => "count",
		  "admin_label" => true
		)
	),
	"description" => esc_html__("Display your Tweets", "notio" )
) );