<?php
/* De-register Contact Form 7 styles */
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

// Main Styles
function thb_main_styles() {	
	global $post;
	$i = 0;
	$self_hosted_fonts = ot_get_option('self_hosted_fonts');
	// Enqueue 
	wp_enqueue_style("thb-app", Thb_Theme_Admin::$thb_theme_directory_uri .  "assets/css/app.css", null, esc_attr(Thb_Theme_Admin::$thb_theme_version));
	
	if ( $_SERVER['HTTP_HOST'] !== 'newnotio.fuelthemes.net') {
		wp_enqueue_style('thb-style', get_stylesheet_uri(), null, null);	
	}
	wp_enqueue_style( 'thb-google-fonts', thb_google_webfont() );
	wp_add_inline_style( 'thb-app', thb_selection() );
	
	if ($self_hosted_fonts) {
		foreach ($self_hosted_fonts as $font) {
			$i++;
			wp_enqueue_style("thb-self-hosted-".$i, $font['font_url'], null, esc_attr(Thb_Theme_Admin::$thb_theme_version));
		}
	}
	
	if ( $post ) {
		if ( has_shortcode($post->post_content, 'contact-form-7') && function_exists( 'wpcf7_enqueue_styles' ) ) {
			wpcf7_enqueue_styles();
		}
	}
}

add_action('wp_enqueue_scripts', 'thb_main_styles');

// Main Scripts
function register_js() {
	if (!is_admin()) {
		global $post;
		$thb_api_key = ot_get_option('map_api_key');
		
		// Register 
		wp_enqueue_script('thb-vendor', Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/js/vendor.min.js', array('jquery'), esc_attr(Thb_Theme_Admin::$thb_theme_version), TRUE);
		wp_enqueue_script('thb-app', Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/js/app.min.js', array('jquery', 'thb-vendor', 'underscore'), esc_attr(Thb_Theme_Admin::$thb_theme_version), TRUE);
		
		// Enqueue
		if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
			wp_enqueue_script('comment-reply');
		}
		if ( $post ) {
			if ( has_shortcode($post->post_content, 'thb_map_parent') ) {
				wp_enqueue_script('gmapdep', 'https://maps.google.com/maps/api/js?key='.esc_attr($thb_api_key).'', false, null, false);
			}
			
			if ( has_shortcode($post->post_content, 'contact-form-7') && function_exists( 'wpcf7_enqueue_scripts' ) ) {
				wpcf7_enqueue_scripts();
			}
		}
		
		// Typekit 
		if ($typekit_id = ot_get_option('typekit_id')) {
			wp_enqueue_script('thb-typekit', 'https://use.typekit.net/'.esc_attr($typekit_id).'.js', array(), NULL, FALSE );
			wp_add_inline_script( 'thb-typekit', 'try{Typekit.load({ async: true });}catch(e){}' );
		}
		
		wp_enqueue_script('thb-vendor');
		wp_enqueue_script('underscore');
		wp_enqueue_script('thb-app');
		wp_localize_script( 'thb-app', 'themeajax', array( 
			'url' => admin_url( 'admin-ajax.php' ),
			'l10n' => array (
				'loading' => esc_html__("Loading ...", 'notio'),
				'nomore' => esc_html__("No More Posts", 'notio'),
				'added' => esc_html__("Added To Cart", 'notio'),
				'copied' => esc_html__("Copied", 'notio')
			),
			'settings' => array (
				'keyboard_nav' => ot_get_option('keyboard_nav', 'on'),
				'is_cart'  => thb_wc_supported() ? is_cart() : false,
				'is_checkout' => thb_wc_supported() ? is_checkout() : false
			),
			'arrows' => array (
				'left' => thb_load_template_part('assets/svg/arrows_slim_left.svg'),
				'right' => thb_load_template_part('assets/svg/arrows_slim_right.svg'),
				'top' => thb_load_template_part('assets/img/svg/up-arrow.svg'),
				'bottom' => thb_load_template_part('assets/img/svg/down-arrow.svg')	
			)
		) );
	}
}
add_action('wp_enqueue_scripts', 'register_js');

/* WooCommerce */
add_filter( 'woocommerce_enqueue_styles', '__return_false' );