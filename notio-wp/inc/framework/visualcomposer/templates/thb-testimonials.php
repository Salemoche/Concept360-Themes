<?php 

function thb_get_testimonials_templates($template_list) {
	$template_list['testimonials_section_01'] = array(
		'name' => esc_html__( 'Testimonials Section - 01', 'notio' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/testimonials/testimonials-e1.jpg",
		'cat' => array( 'testimonials', 'about' ),
		'sc' => '[vc_row thb_full_width="true" thb_row_padding="true" parallax="content-moving" css=".vc_custom_1491770268254{padding-top: 14vh !important;padding-bottom: 14vh !important;background-image: url(http://newnotio.fuelthemes.net/samdunn/wp-content/uploads/sites/4/2017/04/test-bg.jpg?id=551) !important;}"][vc_column thb_color="thb-light-column"][vc_row_inner thb_max_width="max_width" el_class="align-center"][vc_column_inner offset="vc_col-lg-9 vc_col-md-10"][thb_testimonial_parent thb_style="testimonial-style2"][thb_testimonial quote="“Social media campaign that I received was fantastic! There was a comprehensive campaign packed with value that really opened my eyes to what was possible.”" author_name="Michael Giresco" author_title="Co-Founder"][thb_testimonial quote="“Still court no small think death so an wrote. Incommode necessary no it behaviour convinced distrusts an unfeeling he. Could death since do we hoped is in.”" author_name="Jason Bourne" author_title="CEO of TrueVert"][thb_testimonial quote="“Started his hearted any civilly. So me by marianne admitted speaking. Men bred fine call ask. Cease one miles truth day above seven. Cease one miles truth day above seven. ”" author_name="Brienne Truth" author_title="Marketing Specialist"][/thb_testimonial_parent][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]',
	);
	$template_list['testimonials_section_02'] = array(
		'name' => esc_html__( 'Testimonials Section - 02', 'notio' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/testimonials/testimonials-e2.jpg",
		'cat' => array( 'testimonials', 'about' ),
		'sc' => '[vc_row el_class="align-center" css=".vc_custom_1492026068820{padding-top: 9vh !important;padding-bottom: 9vh !important;}"][vc_column el_class="text-center" offset="vc_col-lg-6 vc_col-md-9"][thb_image retina="retina_size" alignment="center" image="584"][thb_testimonial_parent][thb_testimonial quote="Not in a million years did I expect you to read my mind, but you did. Thank you for everything!" author_name="Sofia Joelsson" author_title="Creative Director at CSA Design" author_image="393"][thb_testimonial quote="In show dull give need so held. One order all scale sense her gay style wrote." author_name="Jacob Mosselson" author_title="CFO at CSA Design" author_image="392"][thb_testimonial quote="Incommode our not one ourselves residence. Shall there whose those stand she end. " author_name="Jesse Hardingen" author_title="Senior UX Designer at CSA Design" author_image="390"][/thb_testimonial_parent][/vc_column][/vc_row]',
	);
	
	return $template_list;
}