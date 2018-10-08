<?php 

function thb_get_icons_templates($template_list) {
	$template_list['icons_section_01'] = array(
		'name' => esc_html__( 'Icons Section - 01', 'notio' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/icons/icon-e1.jpg",
		'cat' => array( 'icons' ),
		'sc' => '[vc_row el_class="align-center"][vc_column offset="vc_col-lg-10"][vc_empty_space height="100px"][vc_column_text]
		<h2><strong>TECHNOLOGY</strong></h2>
		<h4><strong>Creativity is the key to success in the future, and primary education is where teachers can bring creativity in children at that level.</strong></h4>
		[/vc_column_text][vc_empty_space height="60px"][vc_row_inner][vc_column_inner width="1/3"][thb_iconbox type="top type1 left-aligned" icon_family="style2" svg_icon="software_box_polygon.svg" heading="HTML5"]Next morning the not-yet-subsided sea rolled in long slow billows of mighty bulk, and striving in the Pequod’s gurgling track, pushed.[/thb_iconbox][/vc_column_inner][vc_column_inner width="1/3"][thb_iconbox type="top type1 left-aligned" icon_family="style2" svg_icon="software_layers1.svg" heading="CSS3 Animations"]Next morning the not-yet-subsided sea rolled in long slow billows of mighty bulk, and striving in the Pequod’s gurgling track, pushed.[/thb_iconbox][/vc_column_inner][vc_column_inner width="1/3"][thb_iconbox type="top type1 left-aligned" icon_family="style2" svg_icon="software_crop.svg" heading="Optimization"]Next morning the not-yet-subsided sea rolled in long slow billows of mighty bulk, and striving in the Pequod’s gurgling track, pushed.[/thb_iconbox][/vc_column_inner][/vc_row_inner][vc_empty_space height="60px"][/vc_column][/vc_row]',
	);
	$template_list['icons_section_02'] = array(
		'name' => esc_html__( 'Icons Section - 02', 'notio' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/icons/icon-e2.jpg",
		'cat' => array( 'icons', 'services' ),
		'sc' => '[vc_row css=".vc_custom_1491556080225{padding-top: 7vh !important;padding-bottom: 5vh !important;}"][vc_column width="1/4"][vc_column_text]
		<h5>Capabilities</h5>
		[/vc_column_text][vc_empty_space height="35px"][/vc_column][vc_column width="3/4"][vc_row_inner][vc_column_inner width="1/3"][thb_iconbox type="top type1 left-aligned" icon_family="style2" svg_icon="ecommerce_bag.svg" icon_animation_speed="1" heading="E-Commerce" icon_color="#006bff"]Magento, Shopify, Woo
		Platform Development
		Data Migration[/thb_iconbox][vc_empty_space height="40px"][/vc_column_inner][vc_column_inner width="1/3"][thb_iconbox type="top type1 left-aligned" icon_family="style2" svg_icon="software_add_vectorpoint.svg" icon_animation_speed="1" heading="Endpoints" icon_color="#006bff"]Brand Development
		Logo and Identity
		Brand Style Guides[/thb_iconbox][vc_empty_space height="40px"][/vc_column_inner][vc_column_inner width="1/3"][thb_iconbox type="top type1 left-aligned" icon_family="style2" svg_icon="software_layers2.svg" icon_animation_speed="1" heading="Segmentation" icon_color="#006bff"]Website Design
		App Design
		Digital Product Design[/thb_iconbox][vc_empty_space height="40px"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/3"][thb_iconbox type="top type1 left-aligned" icon_family="style2" svg_icon="basic_chronometer.svg" icon_animation_speed="1" heading="Performance" icon_color="#006bff"]Copywriting
		Lifestyle Content[/thb_iconbox][vc_empty_space height="40px"][/vc_column_inner][vc_column_inner width="1/3"][thb_iconbox type="top type1 left-aligned" icon_family="style2" svg_icon="basic_geolocalize-05.svg" icon_animation_speed="1" heading="Localization" icon_color="#006bff"]Web Applications
		Hosting Management
		Maintenance[/thb_iconbox][vc_empty_space height="40px"][/vc_column_inner][vc_column_inner width="1/3"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]',
	);
	
	return $template_list;
}