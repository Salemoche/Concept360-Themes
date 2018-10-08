<?php
require Thb_Theme_Admin::$thb_theme_directory . 'inc/admin/plugins/class-tgm-plugin-activation.php';

function thb_register_required_plugins() {
	$data = thb_Theme_Admin()->thb_check_for_update_plugins();
	if (isset($data->plugins)) {
		foreach ($data->plugins as $plugin) {
			switch ($plugin->plugin_name) {
				case 'WPBakery Visual Composer':
				case 'WPBakery Page Builder':
					$slug = 'js_composer';
					break;
				case 'Slider Revolution':
					$slug = 'revslider';
					break;
			}
			$plugins[] = array(
				'name'	=> $plugin->plugin_name,
				'slug'		=> $slug,
				'source' => $plugin->download_url,
				'version' => $plugin->version,
				'required'	=> true,
				'external_url'	 => '',
				'image_url' => Thb_Theme_Admin::$thb_theme_directory_uri .'assets/img/admin/plugins/'.esc_attr($slug).'.png'
			);
		}
	} else {
		$plugins[] = array(
			'name'			=> 'WPBakery Visual Composer', // The plugin name
			'slug'			=> 'js_composer', // The plugin slug (typically the folder name)
			'source'			=> Thb_Theme_Admin::$thb_theme_directory_uri . 'inc/admin/plugins/plugins/codecanyon-242431-visual-composer-page-builder-for-wordpress-wordpress-plugin.zip', 
			'version'				=> '5.4.7',
			'required'			=> true, // If false, the plugin is only 'recommended' instead of required
			'image_url' => Thb_Theme_Admin::$thb_theme_directory_uri .'assets/img/admin/plugins/js_composer.png'
		);
		$plugins[] = array(
			'name'     				=> 'Slider Revolution', // The plugin name
			'slug'     				=> 'revslider', // The plugin slug (typically the folder name)
			'source'   				=> Thb_Theme_Admin::$thb_theme_directory_uri . 'inc/admin/plugins/plugins/codecanyon-2751380-slider-revolution-responsive-wordpress-plugin-wordpress-plugin.zip', 
			'version'				=> '5.4.7.4',
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'image_url' => Thb_Theme_Admin::$thb_theme_directory_uri .'assets/img/admin/plugins/revslider.png'
		);
	}
	$plugins[] = array(
		'name'     				=> 'WooCommerce', // The plugin name
		'slug'     				=> 'woocommerce', // The plugin slug (typically the folder name)
		'required'			=> true,
		'force_activation'		=> false,
		'force_deactivation'	=> false,
		'image_url' => Thb_Theme_Admin::$thb_theme_directory_uri .'assets/img/admin/plugins/woo.png'
	);
	
	$config = array(
		'domain'       		=> 'notio',         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'return'       	=> esc_html__( 'Return to Theme Plugins', 'notio' )
		)
	);
	tgmpa($plugins, $config);
}
add_action('tgmpa_register', 'thb_register_required_plugins');