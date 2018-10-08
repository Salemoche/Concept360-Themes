<?php 

function thb_get_blog_templates($template_list) {
	$template_list['blog_section_01'] = array(
		'name' => esc_html__( 'Blog Section - 01', 'revolution' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/blog/blog-e1.jpg",
		'cat' => array( 'blogs' ),
		'sc' => '[vc_row thb_full_width="true" thb_row_padding="true" css=".vc_custom_1491671621531{padding-top: 10vh !important;padding-bottom: 10vh !important;background-color: #f8f8f8 !important;}"][vc_column][vc_row_inner thb_max_width="max_width"][vc_column_inner][vc_column_text animation="animation fade-in" el_class="small-title"]/ HELLO THERE[/vc_column_text][vc_empty_space height="40px"][thb_post style="style6" source="size:7|post_type:post"][vc_empty_space height="50px"][/vc_column_inner][/vc_row_inner][vc_row_inner thb_max_width="max_width"][vc_column_inner el_class="text-center"][thb_button style="style5" animation="animation fade-in" link="url:http%3A%2F%2Fnewnotio.fuelthemes.net%2Fbroadwick%2Fblog%2F|title:View%20All%20Journal||"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]',
	);
	$template_list['blog_section_02'] = array(
		'name' => esc_html__( 'Blog Section - 02', 'revolution' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/blog/blog-e2.jpg",
		'cat' => array( 'blogs' ),
		'sc' => '[vc_row thb_full_width="true" thb_row_padding="true" css=".vc_custom_1491896518834{padding-top: 9vh !important;padding-bottom: 9vh !important;background-color: #f7ece9 !important;}"][vc_column][vc_row_inner thb_max_width="max_width" thb_row_padding="true" el_class="align-center"][vc_column_inner][thb_styled_header title="We BLOG
		SOMETIMES." thb_color="#f45b4b"][thb_post style="style8" columns="small-12 large-4" source="size:3|post_type:post"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner el_class="text-center"][vc_empty_space height="30px"][thb_button style="style3" link="url:http%3A%2F%2Fnewnotio.fuelthemes.net%2Fnordic%2Fblog%2F|title:View%20All%20News||"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]',
	);

	return $template_list;
}