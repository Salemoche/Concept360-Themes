<?php 

function thb_get_hero_templates($template_list) {
	$template_list['hero_section_01'] = array(
		'name' => esc_html__( 'Hero Section - 01', 'notio' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/hero/hero-e1.jpg",
		'cat' => array( 'hero' ),
		'sc' => '[vc_row full_height="true" css=".vc_custom_1491670641745{padding-bottom: 10vh !important;}"][vc_column][vc_column_text animation="animation fade-in" el_class="small-title"]/ HELLO THERE[/vc_column_text][vc_empty_space height="40px"][vc_column_text animation="animation fade-in" el_class="large-h2"]
		<h2><strong>Hi, we’re a digital creative agency based in Los Angeles. We’re creatives driven by the synergy of design and technology.</strong></h2>
		[/vc_column_text][vc_empty_space height="40px"][vc_column_text animation="animation fade-in"]
		<h4><strong>We worked for Puma, Airbnb, Computer Arts, Nixon, Oglivy, Qlock Two, Adidas.</strong></h4>
		[/vc_column_text][vc_empty_space height="40px"][thb_button style="style5" animation="animation fade-in" link="url:http%3A%2F%2Fnewnotio.fuelthemes.net%2Fbroadwick%2Fcontact-us-2%2F|title:say%20hello||"][/vc_column][/vc_row]',
	);
	$template_list['hero_section_02'] = array(
		'name' => esc_html__( 'Hero Section - 02', 'notio' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/hero/hero-e2.jpg",
		'cat' => array( 'hero' ),
		'sc' => '[vc_row thb_full_width="true" thb_row_padding="true" thb_video_play_button="thb_video_play_button_enabled" full_height="true" content_placement="middle" css=".vc_custom_1491891904314{padding-top: 5vh !important;padding-bottom: 5vh !important;background-image: url(http://newnotio.fuelthemes.net/nordic/wp-content/uploads/sites/7/2017/04/nordic.jpg?id=550) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" thb_video_bg="http://newnotio.fuelthemes.net/nordic/wp-content/uploads/sites/7/2017/04/agency-digital-video-bg.mp4" el_class="align-center"][vc_column thb_color="thb-light-column" el_class="text-center" offset="vc_col-lg-5 vc_col-md-10"][thb_image retina="retina_size" animation="animation fade-in" alignment="center" image="564"][vc_empty_space height="40px"][vc_column_text]
		<h3>Our greatest motivation at the beginning of each project is the anticipation of the end result and its impact.</h3>
		[/vc_column_text][vc_empty_space height="30px"][thb_play][/vc_column][/vc_row]',
	);
	$template_list['hero_section_03'] = array(
		'name' => esc_html__( 'Hero Section - 03', 'notio' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/hero/hero-e3.jpg",
		'cat' => array( 'hero' ),
		'sc' => '[vc_row thb_full_width="true" thb_row_padding="true"][vc_column][thb_portfolio_slider button_style="style7" autoplay="1" autoplay_speed="4000" source="size:3|post_type:portfolio|by_id:273,272,271"][/vc_column][/vc_row]',
	);
	$template_list['hero_section_04'] = array(
		'name' => esc_html__( 'Hero Section - 04', 'notio' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/hero/hero-e4.jpg",
		'cat' => array( 'hero' ),
		'sc' => '[vc_row thb_full_width="true" thb_row_padding="true"][vc_column][thb_image_slider thb_navigation="true" images="358,359,360"][/vc_column][/vc_row]',
	);
	$template_list['hero_section_05'] = array(
		'name' => esc_html__( 'Hero Section - 05', 'notio' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/hero/hero-e5.jpg",
		'cat' => array( 'hero' ),
		'sc' => '[vc_row thb_full_width="true" thb_row_padding="true" full_height="true" mouse_scroll="true" el_class="text-center align-center" css=".vc_custom_1490807558640{background-image: url(http://newnotio.fuelthemes.net/wp-content/uploads/2017/03/header5.jpg?id=363) !important;}"][vc_column thb_color="thb-light-column" offset="vc_col-lg-8 vc_col-md-10"][vc_column_text]
		<h1>WATCH</h1>
		<h5><strong>ATTJOUREN IS A SERVICE PROVIDED BY STOCKHOLM’S STADSMISSIONEN,
		A NON-PROFIT ORGANIZATION THAT WORKS HARD TO MAKE. </strong></h5>
		[/vc_column_text][/vc_column][/vc_row]',
	);
	$template_list['hero_section_06'] = array(
		'name' => esc_html__( 'Hero Section - 06', 'notio' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri."assets/img/admin/demos/hero/hero-e6.jpg",
		'cat' => array( 'hero' ),
		'sc' => '[vc_row thb_full_width="true" thb_row_padding="true" css=".vc_custom_1491558417864{padding-top: 30vh !important;padding-bottom: 30vh !important;background-image: url(http://newnotio.fuelthemes.net/wp-content/uploads/2017/03/h1.jpg?id=500) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column thb_color="thb-light-column"][vc_column_text]
		<h1 style="text-align: center;">Girl In Pink</h1>
		[/vc_column_text][/vc_column][/vc_row]',
	);
	
	return $template_list;
}