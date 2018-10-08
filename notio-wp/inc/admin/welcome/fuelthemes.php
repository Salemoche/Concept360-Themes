<?php 
class Thb_Theme_Admin {
	/**
	 *	Main instance
	 */
	private static $_instance;
	
	/**
	 *	Theme Name
	 */
	public static $thb_theme_name;
	
	/**
	 *	Theme Version
	 */
	public static $thb_theme_version;
	
	/**
	 *	Theme Slug
	 */
	public static $thb_theme_slug;
	
	/**
	 *	Theme Directory
	 */
	public static $thb_theme_directory;
	
	/**
	 *	Theme Directory URL
	 */
	public static $thb_theme_directory_uri;
	
	/**
	 *	Product Key
	 */
	public static $thb_product_key;
	
	/**
	 *	Product Key Expiration
	 */
	public static $thb_product_key_expired;
	
	/**
	 * Envato Hosted
	 */
	public static $thb_envato_hosted;
	
	/**
	 *	Theme Constructor executed only once per request
	 */
	public function __construct() {
		if ( self::$_instance ) {
			_doing_it_wrong( __FUNCTION__, 'Cheatin&#8217; huh?', '2.0' );
		}
	}
	
	/**
	 * You cannot clone this class
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, 'Cheatin&#8217; huh?', '2.0' );
	}

	/**
	 * You cannot unserialize instances of this class
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, 'Cheatin&#8217; huh?', '2.0' );
	}
	
	public static function instance() {
		global $thb_Theme_Admin;
		if ( ! self::$_instance ) {
			self::$_instance = new self();
			$thb_Theme_Admin = self::$_instance;
			
			// Theme Variables
			$theme = wp_get_theme();
			self::$thb_theme_name = $theme->get( 'Name' );
			self::$thb_theme_version = $theme->parent() ? $theme->parent()->get( 'Version' ) : $theme->get( 'Version' );
			self::$thb_theme_slug = $theme->template;
			self::$thb_theme_directory = get_template_directory() . '/';
			self::$thb_theme_directory_uri = get_template_directory_uri() . '/';
			
			self::$thb_product_key = get_option("thb_".self::$thb_theme_slug."_key");
			self::$thb_product_key_expired = get_option("thb_".self::$thb_theme_slug."_key_expired");
			
			// Envato Hosted
			self::$thb_envato_hosted = defined('ENVATO_HOSTED_SITE');
			
			// After Setup Theme
			add_action( 'after_setup_theme', array( self::$_instance, 'afterSetupTheme' ) );
			
			// Setup Admin Menus
			if ( is_admin() ) {
				self::$_instance->initAdminPages();
			}
		}
		
		return self::$_instance;
	}
	/**
	 *	After Theme Setup
	 */
	public function afterSetupTheme() {
		/* WooCommerce Support */
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		
		/* Text Domain */
		load_theme_textdomain('notio', self::$thb_theme_directory . '/inc/languages');
		
		/* Add Support Support */
		add_theme_support( 'html5' );
		add_theme_support( 'nav-menus' );
		add_theme_support( 'automatic-feed-links' );
		
		
		/* Background Support */
		add_theme_support( 'custom-background', array( 'default-color' => 'f9f9f9') );
		add_filter( 'use_default_gallery_style', '__return_false' );
		
		/* Title Support */
		add_theme_support( 'title-tag' );
		
		/* WooCommerce Products per Page */
		add_filter( 'loop_shop_per_page', 'thb_shops_per_page', 20 );
		
		function thb_shops_per_page($products_per_page) {
			$products_per_page = isset($_GET['products_per_page']) ? wp_unslash($_GET['products_per_page']) : ot_get_option('products_per_page');
			return $products_per_page; 
		}
		
		/* Required Settings */
		global $content_width;
		if (!isset($content_width)) { $content_width = 1170; }
		add_theme_support( 'automatic-feed-links' );
		
		/* Image Settings */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 70, 60, true );
		add_image_size('notio-single', 1200, 600, true );
		add_image_size('notio-masonry', 900, 9999, false );
		add_image_size('notio-general', 900, 600, true );
		add_image_size('notio-small', 340, 240, true );
		
		/* Register Menus */
		register_nav_menus(
			array(
				'nav-menu' => esc_html__( 'Navigation Menu','notio' )
			)
		);
		
		$sidebars = ot_get_option('sidebars');
		if(!empty($sidebars)) {
			foreach($sidebars as $sidebar) {
				register_sidebar( array(
					'name' => $sidebar['title'],
					'id' => $sidebar['id'],
					'description' => '',
					'before_widget' => '<div id="%1$s" class="widget cf %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h6>',
					'after_title' => '</h6>',
				));
			}
		}
	}
	public function thbDemos() {
		return array(
		    array(
	        'import_file_name'       => 'Notio',
	        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/notio/notio/democontent.xml",
	        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/notio/notio/theme-options.txt",
	        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/notio.jpg",
	        'import_demo_url' => "http://newnotio.fuelthemes.net"
		    ),
		    array(
	        'import_file_name'       => 'Adam Warlock',
	        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/notio/adamwarlock/democontent.xml",
	        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/notio/adamwarlock/theme-options.txt",
	        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/adam_warlock.jpg",
	        'import_demo_url' => "http://newnotio.fuelthemes.net/adamwarlock"
		    ),
		    array(
		      'import_file_name'       => 'Brielle',
		      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/notio/brielle/democontent.xml",
		      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/notio/brielle/theme-options.txt",
		      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/brielle.jpg",
		      'import_demo_url' => "http://newnotio.fuelthemes.net/brielle"
		    ),
		    array(
		      'import_file_name'       => 'Broadwick',
		      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/notio/broadwick/democontent.xml",
		      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/notio/broadwick/theme-options.txt",
		      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/broadwick.jpg",
		      'import_demo_url' => "http://newnotio.fuelthemes.net/broadwick"
		    ),
		    array(
		      'import_file_name'       => 'Burttton',
		      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/notio/burttton/democontent.xml",
		      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/notio/burttton/theme-options.txt",
		      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/burttton.jpg",
		      'import_demo_url' => "http://newnotio.fuelthemes.net/burttton"
		    ),
		    array(
		      'import_file_name'       => 'Nordic',
		      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/notio/nordic/democontent.xml",
		      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/notio/nordic/theme-options.txt",
		      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/nordic.jpg",
		      'import_demo_url' => "http://newnotio.fuelthemes.net/nordic"
		    ),
		    array(
		      'import_file_name'       => 'Orwell',
		      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/notio/orwell/democontent.xml",
		      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/notio/orwell/theme-options.txt",
		      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/orwell.jpg",
		      'import_demo_url' => "http://newnotio.fuelthemes.net/orwell"
		    ),
		    array(
		      'import_file_name'       => 'Quasar',
		      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/notio/quasar/democontent.xml",
		      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/notio/quasar/theme-options.txt",
		      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/quasar.jpg",
		      'import_demo_url' => "http://newnotio.fuelthemes.net/quasar"
		    ),
		    array(
		      'import_file_name'       => 'Sam Dunn',
		      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/notio/samdunn/democontent.xml",
		      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/notio/samdunn/theme-options.txt",
		      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/sam_dunn.jpg",
		      'import_demo_url' => "http://newnotio.fuelthemes.net/samdunn"
		    ),
		    array(
		      'import_file_name'       => 'Taneleer',
		      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/notio/taneleer/democontent.xml",
		      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/notio/taneleer/theme-options.txt",
		      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/taneleer.jpg",
		      'import_demo_url' => "http://newnotio.fuelthemes.net/taneleer"
		    ),
		    array(
		      'import_file_name'       => 'Space',
		      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/notio/space/democontent.xml",
		      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/notio/space/theme-options.txt",
		      'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/notio/space/widget_data.json",
		      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/space.jpg",
		      'import_demo_url' => "http://newnotio.fuelthemes.net/space"
		    ),
		    array(
		      'import_file_name'       => 'Canvas',
		      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/notio/canvas/democontent.xml",
		      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/notio/canvas/theme-options.txt",
		      'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/notio/canvas/widget_data.json",
		      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/canvas.jpg",
		      'import_demo_url' => "http://newnotio.fuelthemes.net/canvas"
		    ),
		    array(
		      'import_file_name'       => 'Morrisward',
		      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/notio/morrisward/democontent.xml",
		      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/notio/morrisward/theme-options.txt",
		      'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/notio/morrisward/widget_data.json",
		      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/morris.jpg",
		      'import_demo_url' => "http://newnotio.fuelthemes.net/morrisward"
		    ),
		    array(
		      'import_file_name'       => 'Shanua',
		      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/notio/shanua/democontent.xml",
		      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/notio/shanua/theme-options.txt",
		      'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/notio/shanua/widget_data.json",
		      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/shanua.jpg",
		      'import_demo_url' => "http://newnotio.fuelthemes.net/shanua"
		    )
		);
	}
	/**
	 *	Inintialize Admin Pages
	 */
	public function initAdminPages() {
		global $pagenow;
		
		// Script and styles
		add_action( 'admin_enqueue_scripts', array( & $this, 'adminPageEnqueue' ) );
		
		// Menu Pages
		add_action( 'admin_menu', array( & $this, 'adminSetupMenu' ), 1 );
		
		// Theme Options Redirect
		if ( isset($_GET['page']) ) {
			if ( 'admin.php' == $pagenow && 'thb-theme-options' == $_GET['page'] ) {
				if ( ! ( defined( 'WP_CLI' ) && WP_CLI ) ) {
					wp_redirect( admin_url( "themes.php?page=ot-theme-options" ) );
					die();
				}
			}
		}
		
		// Redirect to Main Page
		add_action( 'after_switch_theme', array( & $this, 'thb_activation_redirect' ) );
		
		// Ajax Option Update
		add_action( 'wp_ajax_thb_update_options', array( & $this, 'thb_update_options' ));
		add_action( 'wp_ajax_nopriv_thb_update_options', array( & $this, 'thb_update_options' ));
		
		// Admin Notices
		add_action( 'admin_notices', array( & $this, 'thb_admin_notices' ) );
		
		// Theme Updates
		add_action( 'admin_init', array( & $this, 'thb_theme_update') );
		
		// Plugin Update Nonce
		add_action( 'register_sidebar', array( & $this, 'thb_theme_admin_init' ) );
		
	}
	function thb_admin_notices() {
		$remote_ver = get_option("thb_".self::$thb_theme_slug."_remote_ver") ? get_option("thb_".self::$thb_theme_slug."_remote_ver") : self::$thb_theme_version;
		$local_ver = self::$thb_theme_version;

		if(version_compare($local_ver, $remote_ver, '<')) {
			if ( 
				( !self::$thb_product_key && ( self::$thb_product_key_expired == 0 ) && !self::$thb_envato_hosted ) || 
				( self::$thb_product_key && ( self::$thb_product_key_expired == 1 ) && !self::$thb_envato_hosted ) 
			) {
				echo '<div class="notice is-dismissible error thb_admin_notices">
				<p>There is an update available for the <strong>' . self::$thb_theme_name . '</strong> theme. Go to <a href="' . admin_url( 'admin.php?page=thb-product-registration' ) . '">Product Registration</a> to enable theme updates.</p>
				</div>';
			}
	
			if ( ( self::$thb_product_key && ( self::$thb_product_key_expired == 0 ) ) || self::$thb_envato_hosted ) {
				echo '<div class="notice is-dismissible error thb_admin_notices">
				<p>There is an update available for the <strong>' . self::$thb_theme_name . '</strong> theme. <a href="' . admin_url() . 'update-core.php">Update now</a>.</p>
				</div>';
			}
    }
	}
	public function thb_update_options() {
		$key = $_POST['key'];
		$expired = $_POST['expired'];  
		update_option("thb_".self::$thb_theme_slug."_key", $key);
		update_option("thb_".self::$thb_theme_slug."_key_expired", $expired);
		wp_die();
	}
	public function thb_theme_update() {
		add_filter( 'pre_set_site_transient_update_themes', array( & $this, 'thb_check_for_update' ) );
		add_filter( 'upgrader_pre_download', array( $this, 'thb_upgradeFilter' ), 10, 4 );
	}
	public function thb_check_for_update_plugins() {
		$args = array(
			'timeout' => 30,
			'body' => array( 
				"item_ids" => '242431,2751380',
				"product_key" => self::$thb_product_key,
				"envato_hosted" => self::$thb_envato_hosted
			)
		);
		$request = wp_remote_get( self::$_instance->dashboardUrl('plugin/version'), $args);
		
		$data = '';
		if (!is_wp_error($request) || wp_remote_retrieve_response_code($request) === 200) {
			$data = json_decode( wp_remote_retrieve_body($request));
		}
		return $data;
	}
	public function thb_check_for_update( $transient ) {
		global $wp_filesystem;
		$args = array(
			'timeout' => 30,
			'body' => array( 
				"theme_name" => self::$thb_theme_name,
				"product_key" => self::$thb_product_key,
				"envato_hosted" => self::$thb_envato_hosted
			)
		);
		
		$request = wp_remote_get( self::$_instance->dashboardUrl('version'), $args);

    if (!is_wp_error($request) || wp_remote_retrieve_response_code($request) === 200) {
    	$data = json_decode( wp_remote_retrieve_body($request));
			update_option("thb_".self::$thb_theme_slug."_key_expired", 0);	
			
			if (isset($data->success) && $data->success == false) {
				self::$thb_product_key_expired = 1;
				update_option("thb_".self::$thb_theme_slug."_key_expired", 1);	
			} else {
				if(version_compare(self::$thb_theme_version, $data->version, '<')) {
					$transient->response[self::$thb_theme_slug] = array(
						"new_version"	=> 		$data->version,
						"package"		=>	    $data->download_url,
						"url"			=>		'http://fuelthemes.net'		
					);
	
					update_option("thb_".self::$thb_theme_slug."_remote_ver", $data->version);
				}
			}
		}
		return $transient;
	}
	public function thb_upgradeFilter( $reply, $package, $updater ) {
		global $wp_filesystem;
		$cond = ( !self::$thb_product_key || ( self::$thb_product_key_expired == 1 ) ) && !self::$thb_envato_hosted;
		
		if ( isset( $updater->skin->theme_info ) && $updater->skin->theme_info['Name'] == self::$thb_theme_name ) {
			if ( $cond ) {
				return new WP_Error( 'no_credentials', sprintf( __( 'To receive automatic updates, registration is required. Please visit <a href="%1$s" target="_blank">Product Registration</a> to activate your theme.', 'notio' ), admin_url( 'admin.php?page=thb-product-registration' ) ) );
			}
		}
		
		// VisualComposer
		if ( (isset( $updater->skin->plugin )) && ( $updater->skin->plugin == 'js_composer/js_composer.php') ) {
			if ( $cond ) {
				return new WP_Error( 'no_credentials', sprintf( __( 'To receive automatic updates, registration is required. Please visit <a href="%1$s" target="_blank">Product Registration</a> to activate your theme.', 'notio' ), admin_url( 'admin.php?page=thb-product-registration' ) ) );
			}
		}
		return $reply;
	}
	public function thb_plugins_install( $item ) {
		if ( ! function_exists( 'get_plugins' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}
		$installed_plugins = get_plugins();

		$item['sanitized_plugin'] = $item['name'];

		// WordPress Repository
		if ( ! $item['version'] ) {
			$item['version'] = TGM_Plugin_Activation::$instance->does_plugin_have_update( $item['slug'] );
		}

		// Install Link
		if ( ! isset( $installed_plugins[$item['file_path']] ) ) {
			$actions = array(
				'install' => sprintf(
					'<a href="%1$s" class="button" title="Install %2$s">Install Now</a>',
					esc_url( wp_nonce_url(
						add_query_arg(
							array(
								'page'          => urlencode( TGM_Plugin_Activation::$instance->menu ),
								'plugin'        => urlencode( $item['slug'] ),
								'plugin_name'   => urlencode( $item['sanitized_plugin'] ),
								'tgmpa-install' => 'install-plugin',
								'return_url'    => network_admin_url( 'admin.php?page=thb-plugins' )
							),
							TGM_Plugin_Activation::$instance->get_tgmpa_url()
						),
						'tgmpa-install',
						'tgmpa-nonce'
					) ),
					$item['sanitized_plugin']
				),
			);
		}
		// Activate Link
		else if ( is_plugin_inactive( $item['file_path'] ) ) {
			$actions = array(
				'activate' => sprintf(
					'<a href="%1$s" class="button button-primary" title="Activate %2$s">Activate</a>',
					esc_url( add_query_arg(
						array(
							'plugin'               => urlencode( $item['slug'] ),
							'plugin_name'          => urlencode( $item['sanitized_plugin'] ),
							'thb-activate'       => 'activate-plugin',
							'thb-activate-nonce' => wp_create_nonce( 'thb-activate' ),
							'return_url'    => network_admin_url( 'admin.php?page=thb-plugins' )
						),
						admin_url( 'admin.php?page=thb-plugins' )
					) ),
					$item['sanitized_plugin']
				),
			);
		}
		// Update Link
		
		else if ( version_compare( $installed_plugins[$item['file_path']]['Version'], $item['version'], '<' ) ) {
			$actions = array(
				'update' => sprintf(
					'<a href="%1$s" class="button button-update" title="Install %2$s"><span class="dashicons dashicons-update"></span> Update</a>',
					wp_nonce_url(
						add_query_arg(
							array(
								'page'          => urlencode( TGM_Plugin_Activation::$instance->menu ),
								'plugin'        => urlencode( $item['slug'] ),
								'tgmpa-update'  => 'update-plugin',
								'version'       => urlencode( $item['version'] ),
								'return_url'    => network_admin_url( 'admin.php?page=thb-plugins' )
							),
							TGM_Plugin_Activation::$instance->get_tgmpa_url()
						),
						'tgmpa-update',
						'tgmpa-nonce'
					),
					$item['sanitized_plugin']
				),
			);
		} else if ( is_plugin_active( $item['file_path'] ) ) {
			$actions = array(
				'deactivate' => sprintf(
					'<a href="%1$s" class="button" title="Deactivate %2$s">Deactivate</a>',
					esc_url( add_query_arg(
						array(
							'plugin'                 => urlencode( $item['slug'] ),
							'plugin_name'            => urlencode( $item['sanitized_plugin'] ),
							// 'plugin_source'          => urlencode( $item['source'] ),
							'thb-deactivate'       => 'deactivate-plugin',
							'thb-deactivate-nonce' => wp_create_nonce( 'thb-deactivate' ),
						),
						admin_url( 'admin.php?page=thb-plugins' )
					) ),
					$item['sanitized_plugin']
				),
			);
		}

		return $actions;
	}
	public function thb_theme_admin_init() {
	
		if ( isset( $_GET['thb-deactivate'] ) && $_GET['thb-deactivate'] == 'deactivate-plugin' ) {
			
			check_admin_referer( 'thb-deactivate', 'thb-deactivate-nonce' );

			if ( ! function_exists( 'get_plugins' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}

			$plugins = get_plugins();

			foreach ( $plugins as $plugin_name => $plugin ) {
				if ( $plugin['Name'] == $_GET['plugin_name'] ) {
						deactivate_plugins( $plugin_name );
				}
			}

		} 

		if ( isset( $_GET['thb-activate'] ) && $_GET['thb-activate'] == 'activate-plugin' ) {
			
			check_admin_referer( 'thb-activate', 'thb-activate-nonce' );

			if ( ! function_exists( 'get_plugins' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}

			$plugins = get_plugins();

			foreach ( $plugins as $plugin_name => $plugin ) {
				if ( $plugin['Name'] == $_GET['plugin_name'] ) {
					activate_plugin( $plugin_name );
				}
			}

		}

	}
	public function thb_activation_redirect() {
		if ( ! ( defined( 'WP_CLI' ) && WP_CLI ) ) {
			$notio_installed = 'notio_installed';
			
			if ( false == get_option( $notio_installed, false ) ) {		
				update_option( $notio_installed, true );
				wp_redirect( admin_url( 'admin.php?page=thb-product-registration' ) );
				die();
			} 
			
			delete_option( $notio_installed );
		}
	}
	public function adminPageEnqueue() {
		wp_enqueue_script( 'thb-admin-meta', Thb_Theme_Admin::$thb_theme_directory_uri .'assets/js/admin-meta.min.js', array('jquery'), esc_attr(self::$thb_theme_version));
		wp_enqueue_style("thb-admin-css", Thb_Theme_Admin::$thb_theme_directory_uri . "assets/css/admin.css", null, esc_attr(self::$thb_theme_version));
		wp_enqueue_style( 'thb-admin-vs-css', Thb_Theme_Admin::$thb_theme_directory_uri . "assets/css/admin_vc.css", null, esc_attr(self::$thb_theme_version));
		
		if (class_exists('WPBakeryVisualComposerAbstract')) {
			wp_enqueue_style( 'vc_extra_css', Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/css/vc_extra.css' );
			wp_enqueue_script( 'thb-admin-vc', Thb_Theme_Admin::$thb_theme_directory_uri .'assets/js/admin-vc.min.js', array('jquery'), esc_attr(self::$thb_theme_version));
		}
	}
	public function adminSetupMenu() {
		
		// Product Registration
		add_menu_page( Thb_Theme_Admin::$thb_theme_name, Thb_Theme_Admin::$thb_theme_name, 'edit_theme_options', 'thb-product-registration', array( & $this, 'thb_Product_Registration' ), '', 3 );
		
		// Product Registration
		add_submenu_page( 'thb-product-registration', 'Registration', 'Registration', 'edit_theme_options', 'thb-product-registration', array( & $this, 'thb_Product_Registration' ) );
		
		// Plugins
		add_submenu_page( 'thb-product-registration', 'Plugins', 'Plugins', 'edit_theme_options', 'thb-plugins', array( & $this, 'thb_Plugins' ) );

		// Demo Import
		add_submenu_page( 'thb-product-registration', 'Demo Import', 'Demo Import', 'edit_theme_options', 'thb-demo-import', array( & $this, 'thb_Demo_Import' ) );
		
		// Theme Options
		add_submenu_page( 'thb-product-registration', 'Theme Options', 'Theme Options', 'edit_theme_options', 'thb-theme-options', '__return_false' ); 
		
	}
	public function thb_Plugins() {
		get_template_part( 'inc/admin/welcome/pages/plugins' );
	}
	public function thb_Product_Registration() {
		get_template_part( 'inc/admin/welcome/pages/registration' );
	}
	public function thb_Demo_Import() {
		get_template_part( 'inc/admin/welcome/pages/demo-import' );
	}
	/**
	 *	Inintialize API
	 */
	public function dashboardUrl($type = null) {
		$url = 'https://my.fuelthemes.net';
		switch ( $type ) {
			case 'verify':
				$url .= '/api/verify';
				break;
			case 'version':
				$url .= '/api/version';
				break;
			case 'plugin/version':
				$url .= '/api/plugin/version';
				break;
		}
		return $url;
	}
}
// Main instance shortcut
function thb_Theme_Admin() {
	global $thb_Theme_Admin;
	return $thb_Theme_Admin;
}
Thb_Theme_Admin::instance();