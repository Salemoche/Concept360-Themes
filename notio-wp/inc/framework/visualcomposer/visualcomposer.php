<?php
// Remove actions
remove_action( 'vc_activation_hook', 'vc_page_welcome_set_redirect' );
remove_action( 'init', 'vc_page_welcome_redirect' );
remove_action( 'admin_init', 'vc_page_welcome_redirect' );

// Remove menu item
function wpex_vc_remove_welcome_page() {
	remove_submenu_page( 'vc-general', 'vc-welcome' );
}
add_action( 'admin_menu', 'wpex_vc_remove_welcome_page', 999 );

// Set As Theme
add_action( 'vc_before_init', 'thb_vcSetAsTheme' );
function thb_vcSetAsTheme() {
    vc_manager()->disableUpdater(true);
		vc_set_as_theme();
}

// Remove IE & MetaData
add_action( 'init', 'thb_VC_init' );
function thb_VC_init() {
	if (function_exists('visual_composer')) {
		remove_action('wp_head', array(visual_composer(), 'addMetaData'));
		remove_action('wp_head', array(visual_composer(), 'addIEMinimalSupport'));
	}
}

add_action('init', 'thb_TheShortcodesForVC');
function thb_TheShortcodesForVC() {
	if (!function_exists('visual_composer')) { return; }
	
	if (function_exists('vc_set_default_editor_post_types')) { vc_set_default_editor_post_types( array('page','product','portfolio') ); }
	
	
	add_filter( 'vc_load_default_templates', 'thb_custom_template_modify_array' );
	function thb_custom_template_modify_array() {
	    return array();
	}
	
	if (is_admin()) {
		function remove_vc_teaser() {
			remove_meta_box('vc_teaser', 'post' , 'side');
			remove_meta_box('vc_teaser', 'page' , 'side');
			remove_meta_box('vc_teaser', 'product' , 'side');
		}
		add_action( 'admin_head', 'remove_vc_teaser' );
	}
	
	// Shortcodes 
	require get_theme_file_path('/inc/framework/visualcomposer/visualcomposer-extend.php');
	
	// Templates
	require get_theme_file_path('/inc/framework/visualcomposer/visualcomposer-templates.php');
	
	/* Offsets */
	function thb_column_offset_class_merge($class_string, $tag) {

		if($tag === 'vc_column' || $tag === 'vc_column_inner') {
			$class_string = preg_replace('/offset-/', 'push-', $class_string);
			$class_string = preg_replace('/vc_col-/', '', $class_string);
			$class_string = preg_replace('/lg/', 'large', $class_string);
			$class_string = preg_replace('/md/', 'medium', $class_string);
			$class_string = preg_replace('/sm/', 'small-12 medium', $class_string);
			$class_string = preg_replace('/xs/', 'small', $class_string);
			$class_string = preg_replace('/vc_column_container/', 'columns', $class_string);
			
			/* Change visibility */
			$class_string = preg_replace('/vc_hidden-large/', 'hide-for-large', $class_string);
			$class_string = preg_replace('/vc_hidden-medium/', 'hide-for-medium-only', $class_string);
			$class_string = preg_replace('/vc_hidden-small/', 'hide-for-small-only', $class_string);
			$class_string = preg_replace('/vc_hidden-smallall/', 'hide-for-small-only', $class_string);
		} else if ($tag === 'vc_row' || $tag === 'vc_row_inner') {
			$class_string = preg_replace('/vc_row/', 'row', $class_string);
		}
		return $class_string;
	}
	add_filter('vc_shortcodes_css_class', 'thb_column_offset_class_merge', 10, 2);
	
	require_once vc_path_dir( 'PARAMS_DIR', '/loop/loop.php' );
	class ThbLoopQueryBuilder extends VcLoopQueryBuilder {
	  function parse_paged( $value ) {
	  	$this->args['paged'] = $value;
	  }
	}
}