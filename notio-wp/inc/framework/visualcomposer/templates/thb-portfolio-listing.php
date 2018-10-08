<?php 

function thb_get_portfolio_listing_templates($template_list) {
  
  $template_list['portfolio_listing_01'] = array(
  	'name' => esc_html__( 'Portfolio-Listing - Style 1', 'notio' ),
  	'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/listing/list-e1.jpg",
  	'cat' => array( 'Portfolio-Listing' ),
  	'sc' => '[vc_row thb_full_width="true" thb_row_padding="true"][vc_column][thb_portfolio add_filters="true" filter_categories="69,62,64,65,66" loadmore="true" source="size:8|post_type:portfolio|tax_query:69,63,62,64,65,66"][/vc_column][/vc_row]',
  );
  
  $template_list['portfolio_listing_02'] = array(
  	'name' => esc_html__( 'Portfolio-Listing - Style 2', 'notio' ),
  	'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/listing/list-e2.jpg",
  	'cat' => array( 'Portfolio-Listing' ),
  	'sc' => '[vc_row thb_full_width="true" thb_row_padding="true"][vc_column][thb_portfolio masonry_style="style2" add_filters="true" filter_categories="63,62,64,65,66" loadmore="true" source="size:10|post_type:portfolio|tax_query:63,62,64,65,66,67"][/vc_column][/vc_row]',
  );
  
  $template_list['portfolio_listing_03'] = array(
  	'name' => esc_html__( 'Portfolio-Listing - Style 3', 'notio' ),
  	'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/listing/list-e3.jpg",
  	'cat' => array( 'Portfolio-Listing' ),
  	'sc' => '[vc_row thb_full_width="true" thb_row_padding="true"][vc_column][thb_portfolio masonry_style="style3" add_filters="true" filter_categories="63,62,64,65,66" loadmore="true" source="size:10|post_type:portfolio|tax_query:66,65,62,64,63"][/vc_column][/vc_row]',
  );
  
  $template_list['portfolio_listing_04'] = array(
  	'name' => esc_html__( 'Portfolio-Listing - Style 4', 'notio' ),
  	'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/listing/list-e4.jpg",
  	'cat' => array( 'Portfolio-Listing' ),
  	'sc' => '[vc_row thb_full_width="true" thb_row_padding="true"][vc_column][thb_portfolio_grid columns="small-12 large-4" thb_margins="true" loadmore="true" hover_style="hover-style2" source="size:12|post_type:portfolio|tax_query:69,62,64,65,66,63"][/vc_column][/vc_row]',
  );
  
  $template_list['portfolio_listing_05'] = array(
  	'name' => esc_html__( 'Portfolio-Listing - Style 5', 'notio' ),
  	'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/listing/list-e5.jpg",
  	'cat' => array( 'Portfolio-Listing' ),
  	'sc' => '[vc_row thb_full_width="true" css=".vc_custom_1491821169911{padding-top: 10vh !important;padding-right: 5vw !important;padding-bottom: 10vh !important;padding-left: 5vw !important;}"][vc_column][thb_portfolio_text source="size:10|post_type:portfolio"][/vc_column][/vc_row]',
  );
  
  $template_list['portfolio_listing_06'] = array(
  	'name' => esc_html__( 'Portfolio-Listing - Style 6', 'notio' ),
  	'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/listing/list-e6.jpg",
  	'cat' => array( 'Portfolio-Listing' ),
  	'sc' => '[vc_row thb_full_width="true" thb_row_padding="true"][vc_column][thb_portfolio_text style="style2" thb_color="light-title" source="size:6|post_type:portfolio"][/vc_column][/vc_row]',
  );
  
  $template_list['portfolio_listing_07'] = array(
  	'name' => esc_html__( 'Portfolio-Listing - Style 7', 'notio' ),
  	'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/listing/list-e7.jpg",
  	'cat' => array( 'Portfolio-Listing' ),
  	'sc' => '[vc_row thb_full_width="true" thb_row_padding="true"][vc_column][thb_portfolio_carousel columns="small-12 medium-6 large-3" hover_style="hover-style4" thb_pagination="" thb_navigation="true" source="size:6|post_type:portfolio"][/vc_column][/vc_row]',
  );
  
  $template_list['portfolio_listing_08'] = array(
  	'name' => esc_html__( 'Portfolio-Listing - Style 8', 'notio' ),
  	'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/listing/list-e8.jpg",
  	'cat' => array( 'Portfolio-Listing' ),
  	'sc' => '[vc_row thb_full_width="true" thb_row_padding="true"][vc_column][thb_portfolio_text style="style3" thb_color="light-title" source="size:10|post_type:portfolio"][/vc_column][/vc_row]',
  );
  
  $template_list['portfolio_listing_09'] = array(
  	'name' => esc_html__( 'Portfolio-Listing - Style 9', 'notio' ),
  	'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/listing/list-e9.jpg",
  	'cat' => array( 'Portfolio-Listing' ),
  	'sc' => '[vc_row css=".vc_custom_1491686005201{padding-top: 9vh !important;padding-bottom: 9vh !important;}" el_class="align-center"][vc_column el_class="text-center" offset="vc_col-lg-6 vc_col-md-9"][vc_column_text el_class="large-h2"]
  	<h2><strong>Featured Work</strong></h2>
  	[/vc_column_text][vc_empty_space height="10px"][vc_column_text]<strong><span style="color: #a1a1a1;">Fiercely, but evenly incited by the taunts of the German, the Pequods three boats now began ranging almost abreast; and, so disposed.</span></strong>[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column][thb_portfolio style="style2" columns="small-12 large-4" thb_margins="true" add_filters="true" filter_categories="62,67,66" filter_style="style3" loadmore="true" loadmore_style="style3" title_position="title-topleft" source="size:9|post_type:portfolio|tax_query:62,67,66"][vc_empty_space height="130px"][/vc_column][/vc_row]',
  );
  
  $template_list['portfolio_listing_10'] = array(
  	'name' => esc_html__( 'Portfolio-Listing - Style 10', 'notio' ),
  	'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/listing/list-e10.jpg",
  	'cat' => array( 'Portfolio-Listing' ),
  	'sc' => '[vc_row thb_full_width="true" css=".vc_custom_1491819764554{padding-top: 9vh !important;}"][vc_column width="1/4" skrollr="true" skrollr_speed="300" css=".vc_custom_1491832492359{padding-right: 6vh !important;}"][vc_empty_space height="60px"][thb_portfolio_single style="style2" true_aspect="true" source="size:1|post_type:portfolio|by_id:273"][/vc_column][vc_column width="1/4" skrollr="true" skrollr_speed="80" css=".vc_custom_1491834404050{padding-right: 4vh !important;padding-left: 8vh !important;}"][thb_image alignment="center" lightbox="true" image="562"][/vc_column][vc_column width="1/4" skrollr="true" css=".vc_custom_1491832395447{padding-right: 8vh !important;padding-left: 8vh !important;}"][vc_empty_space height="30px"][thb_portfolio_single style="style2" true_aspect="true" source="post_type:portfolio|by_id:270"][/vc_column][vc_column width="1/4" skrollr="true" skrollr_speed="400"][vc_empty_space height="90px"][thb_portfolio_single style="style2" true_aspect="true" source="post_type:portfolio|by_id:269"][/vc_column][/vc_row][vc_row thb_full_width="true"][vc_column width="1/4" css=".vc_custom_1491832509460{padding-left: 10vh !important;}"][thb_image image="555"][/vc_column][vc_column width="1/2" skrollr="true" skrollr_speed="50" css=".vc_custom_1491834461676{padding-right: 12vh !important;padding-bottom: 10vh !important;padding-left: 12vh !important;}"][thb_image full_width="true" animation="animation fade-in" lightbox="true" image="551"][/vc_column][vc_column width="1/4"][thb_image alignment="right" image="556"][/vc_column][/vc_row][vc_row thb_full_width="true" css=".vc_custom_1491820211182{padding-top: 5vh !important;padding-bottom: 15vh !important;}"][vc_column width="1/2" skrollr="true" skrollr_speed="200"][thb_image full_width="true" animation="animation fade-in" lightbox="true" image="552"][/vc_column][vc_column width="1/4" skrollr="true" css=".vc_custom_1491833928558{padding-left: 6vh !important;}"][thb_image image="553"][/vc_column][vc_column width="1/4" skrollr="true" skrollr_speed="500"][thb_portfolio_single style="style2" true_aspect="true" source="size:1|post_type:portfolio|by_id:266"][/vc_column][/vc_row]',
  );
  
  $template_list['portfolio_listing_11'] = array(
  	'name' => esc_html__( 'Portfolio-Listing - Style 11', 'notio' ),
  	'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/listing/list-e11.jpg",
  	'cat' => array( 'Portfolio-Listing' ),
  	'sc' => '[vc_row thb_full_width="true" thb_row_padding="true" css=".vc_custom_1491895893195{padding-top: 9vh !important;padding-bottom: 9vh !important;background-color: #e0e4ed !important;}"][vc_column][vc_row_inner thb_max_width="max_width"][vc_column_inner][thb_styled_header title="Selected
  	Work." thb_color="#4c32ef"][thb_portfolio_grid columns="small-12 large-4" true_aspect="true" thb_margins="true" add_filters="true" filter_categories="63,62,67" filter_style="style2" loadmore="true" loadmore_style="style3" hover_style="hover-style6" title_position="title-topleft" source="size:6|post_type:portfolio"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]',
  );
  
  $template_list['portfolio_listing_12'] = array(
  	'name' => esc_html__( 'Portfolio-Listing - Style 12', 'notio' ),
  	'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/listing/list-e12.jpg",
  	'cat' => array( 'Portfolio-Listing' ),
  	'sc' => '[vc_row thb_full_width="true" thb_row_padding="true"][vc_column][thb_portfolio_horizontal hover_style="hover-style4" source="size:4|order_by:date|order:DESC|post_type:portfolio"][/vc_column][/vc_row]',
  );
  
  $template_list['portfolio_listing_13'] = array(
  	'name' => esc_html__( 'Portfolio-Listing - Style 13', 'notio' ),
  	'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/listing/list-e13.jpg",
  	'cat' => array( 'Portfolio-Listing' ),
  	'sc' => '[vc_row thb_full_width="true" thb_row_padding="true" css=".vc_custom_1508249669527{padding-top: 15vh !important;padding-bottom: 15vh !important;background-color: #f9fbfb !important;}"][vc_column][vc_column_text animation="animation bottom-to-top" el_class="text-center"]
  	<h6><span style="color: #a8abb0;">PROJECTS</span></h6>
  	[/vc_column_text][vc_empty_space height="30px"][vc_column_text animation="animation bottom-to-top" el_class="text-center"]
  	<h2>A selection of our featured works</h2>
  	[/vc_column_text][vc_empty_space height="70px"][vc_row_inner thb_max_width="max_width"][vc_column_inner][thb_portfolio_grid columns="small-12 large-6" thb_margins="true" hover_style="hover-style7" title_position="title-centerleft" source="size:4|post_type:portfolio"][/vc_column_inner][/vc_row_inner][vc_empty_space height="40px"][vc_row_inner el_class="text-center"][vc_column_inner][thb_button style="style7" animation="animation bottom-to-top" link="url:http%3A%2F%2Fnewnotio.fuelthemes.net%2Fspace%2F|title:VIEW%20ALL%20WORKS||"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]',
  );
  
  $template_list['portfolio_listing_14'] = array(
  	'name' => esc_html__( 'Portfolio-Listing - Style 14', 'notio' ),
  	'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/listing/list-e14.jpg",
  	'cat' => array( 'Portfolio-Listing' ),
  	'sc' => '[vc_row thb_full_width="true" thb_row_padding="true"][vc_column][thb_portfolio masonry_style="style4" hover_style="hover-style9" source="size:6|post_type:portfolio"][vc_row_inner thb_row_padding="true" css=".vc_custom_1532619792637{border-bottom-width: 1px !important;padding-top: 30px !important;padding-bottom: 30px !important;border-bottom-color: #171717 !important;border-bottom-style: solid !important;}"][vc_column_inner thb_color="thb-light-column" el_class="text-center"][thb_button_text style="style4" animation="animation fade-in" link="url:http%3A%2F%2Fnewnotio.fuelthemes.net%2Fmorrisward%2Fhome-masonry-style-3%2F|title:Explore%20More%20of%20our%20Work||"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]',
  );
  
  $template_list['portfolio_listing_15'] = array(
  	'name' => esc_html__( 'Portfolio-Listing - Style 15', 'notio' ),
  	'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/listing/list-e15.jpg",
  	'cat' => array( 'Portfolio-Listing' ),
  	'sc' => '[vc_row thb_full_width="true" css=".vc_custom_1532618953973{padding-right: 15px !important;padding-bottom: 20vh !important;padding-left: 15px !important;}"][vc_column][thb_portfolio style="style2" columns="small-12 large-4" thb_margins="true" style2_hover_style="style2-hover-style2" source="size:9|post_type:portfolio"][/vc_column][/vc_row]',
  );
  
  return $template_list;
}
