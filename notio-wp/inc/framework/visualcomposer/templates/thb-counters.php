<?php 

function thb_get_counters_templates($template_list) {
	$template_list['counters_section_01'] = array(
		'name' => esc_html__( 'Counters Section - 01', 'notio' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/counters/counter-e1.jpg",
		'cat' => array( 'counters' ),
		'sc' => '[vc_row css=".vc_custom_1491556080225{padding-top: 7vh !important;padding-bottom: 5vh !important;}"][vc_column width="1/4"][vc_empty_space height="5px"][vc_column_text]
		<h5>Some Numbers</h5>
		[/vc_column_text][vc_empty_space height="35px"][/vc_column][vc_column width="3/4"][vc_row_inner][vc_column_inner width="1/3" css=".vc_custom_1491559823762{padding-right: 5% !important;}"][thb_counter speed="1000" counter="333" heading="Clients Served" number_color="#006bff"]It was risky business, this entering a paddock of thoats alone and at night first.[/thb_counter][vc_empty_space height="40px"][/vc_column_inner][vc_column_inner width="1/3" css=".vc_custom_1491559829600{padding-right: 5% !important;}"][thb_counter speed="1000" counter="900" heading="API Requests" number_color="#006bff"]Comfort reached gay perhaps chamber his six detract besides add. [/thb_counter][vc_empty_space height="40px"][/vc_column_inner][vc_column_inner width="1/3" css=".vc_custom_1491559840790{padding-right: 5% !important;}"][thb_counter speed="1000" counter="2400" heading="Instances" number_color="#006bff"]Moments its musical age explain. But extremity sex now education concluded earnestly her continual.[/thb_counter][vc_empty_space height="40px"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]',
	);
	
	return $template_list;
}