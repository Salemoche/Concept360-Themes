<?php 

function thb_get_maps_templates($template_list) {
	$template_list['maps_section_01'] = array(
		'name' => esc_html__( 'Maps Section - 01', 'notio' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/maps/map-e1.jpg",
		'cat' => array( 'maps' ),
		'sc' => '[vc_row thb_full_width="true" thb_row_padding="true" full_height="true" columns_placement="top" content_placement="top"][vc_column thb_color="thb-light-column" width="1/2" css=".vc_custom_1490791720524{background-color: #1aa97f !important;}"][vc_column_text css=".vc_custom_1490791812687{padding-top: 10% !important;padding-right: 10% !important;padding-bottom: 10% !important;padding-left: 10% !important;background: #454d74 url(http://newnotio.fuelthemes.net/wp-content/uploads/2017/03/contact_bg.jpg?id=315) !important;}"]
		<h2>HELLO NOTIO</h2>
		Creativity is the key to success in the future, and primary education is where teachers can bring creativity in children at that level.[/vc_column_text][vc_column_text css=".vc_custom_1490792116976{padding-top: 10% !important;padding-right: 10% !important;padding-bottom: 10% !important;padding-left: 10% !important;}"]
		<h2><strong>32 AVE AMERICAS,</strong>
		<strong>5TH FLOOR,</strong>
		<strong>NEW YORK 10013</strong></h2>
		[/vc_column_text][/vc_column][vc_column width="1/2"][thb_map_parent height="60" full_height="true" expand="true" position="right" map_controls="panControl"][thb_map latitude="42.78" longitude="-75" marker_title="Amsterdam" marker_description="6100 Wilshire Blvd 2nd Floor Los Angeles CA 90048 +1 310 499 7700
		info@stylesuite.nl"][thb_map latitude="42.20" longitude="-75.30" marker_title="Paris" marker_description="3400 Wilshire 2nd Floor Paris CA 90048 +1 310 499 7700
		info@stylesuite.nl"][/thb_map_parent][/vc_column][/vc_row]',
	);
	$template_list['maps_section_02'] = array(
		'name' => esc_html__( 'Maps Section - 02', 'notio' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/maps/map-e2.jpg",
		'cat' => array( 'maps' ),
		'sc' => '[vc_row thb_full_width="true" thb_row_padding="true"][vc_column][thb_map_parent height="50" map_controls="panControl"][thb_map latitude="42.78" longitude="-75" marker_title="Amsterdam" marker_description="6100 Wilshire Blvd 2nd Floor Los Angeles CA 90048 +1 310 499 7700
		info@stylesuite.nl"][thb_map latitude="42.20" longitude="-75.30" marker_title="Paris" marker_description="3400 Wilshire 2nd Floor Paris CA 90048 +1 310 499 7700
		info@stylesuite.nl"][/thb_map_parent][vc_empty_space height="100px"][/vc_column][/vc_row]',
	);
	
	return $template_list;
}