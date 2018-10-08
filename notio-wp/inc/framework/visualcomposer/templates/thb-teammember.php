<?php 

function thb_get_teammember_templates($template_list) {
	$template_list['teammember_section_01'] = array(
		'name' => esc_html__( 'Team Member Section - 01', 'notio' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/teammember/team-e1.jpg",
		'cat' => array( 'teammember' ),
		'sc' => '[vc_row css=".vc_custom_1490810787348{padding-top: 5vh !important;padding-bottom: 5vh !important;}"][vc_column width="1/4"][vc_column_text]
		<h5>Our Team</h5>
		[/vc_column_text][vc_empty_space height="35px"][/vc_column][vc_column width="3/4"][thb_team_parent thb_member_style="member_style2" thb_columns="large-4"][thb_team image="389" name="Kenny J. Soranson" sub_title="Creative Director" facebook="#" twitter="#"][thb_team image="390" name="Jenny Silverstone" sub_title="Art Director" facebook="#" twitter="#" pinterest="#"][thb_team image="391" name="Frank Georgetown" sub_title="Project Manager" twitter="#" linkedin="#"][thb_team image="392" name="Dominique Magaru" sub_title="Lead Designer" twitter="#" linkedin="#" facebook="#"][thb_team image="393" name="Jeanaette Etsy" sub_title="Senior Developer" twitter="#" linkedin="#" facebook="#"][/thb_team_parent][/vc_column][/vc_row]',
	);
	$template_list['teammember_section_02'] = array(
		'name' => esc_html__( 'Team Member Section - 02', 'notio' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/teammember/team-e2.jpg",
		'cat' => array( 'teammember', 'about' ),
		'sc' => '[vc_row][vc_column][vc_empty_space height="80px"][vc_column_text el_class="text-center"]
		<h2>TEAM</h2>
		We partner with our clients to understand their individual needs and
		elevate the value of their brands through thoughtfully designed experiences.[/vc_column_text][vc_empty_space height="30px"][thb_team_parent thb_columns="large-4"][thb_team image="322" name="Jason Briggs" sub_title="Creative Director" facebook="#" twitter="#" pinterest="#" linkedin="#"][thb_team image="323" name="Frisk Oberer" sub_title="Development Director" facebook="#" twitter="#" pinterest="#" linkedin="#"][thb_team image="324" name="Mary Oppenheim" sub_title="Business Director" facebook="#" twitter="#" pinterest="#" linkedin="#"][/thb_team_parent][vc_empty_space height="80px"][/vc_column][/vc_row]',
	);
	
	return $template_list;
}