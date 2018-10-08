<?php
/**
 * Initialize the options before anything else. 
 */
add_action( 'admin_init', 'thb_theme_options', 1 );

/**
 * Theme Mode demo code of all the available option types.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function thb_theme_options() {
  
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Create a custom settings array that we pass to 
   * the OptionTree Settings API Class.
   */
  $custom_settings = array(
    'sections'        => array(
      array(
        'title'       => esc_html__('General', 'notio'),
        'id'          => 'general'
      ),
      array(
        'title'       => esc_html__('Blog Settings', 'notio'),
        'id'          => 'blog'
      ),
      array(
        'title'       => esc_html__('Portfolio Settings', 'notio'),
        'id'          => 'portfolio'
      ),
      array(
        'title'       => esc_html__('Header Settings', 'notio'),
        'id'          => 'header'
      ),
      array(
        'title'       => esc_html__('Typography', 'notio'),
        'id'          => 'typography'
      ),
      array(
        'title'       => esc_html__('Customization', 'notio'),
        'id'          => 'customization'
      ),
      array(
        'title'       => esc_html__('Footer Settings', 'notio'),
        'id'          => 'footer'
      ),
      array(
        'title'       => esc_html__('Shop Settings', 'notio'),
        'id'          => 'shop'
      ),
     
      array(
        'title'       => esc_html__('Misc', 'notio'),
        'id'          => 'misc'
      )
    ),
    'settings'        => array(
    	array(
    	  'id'          => 'general_tab1',
    	  'label'       => esc_html__('General', 'notio'),
    	  'type'        => 'tab',
    	  'section'     => 'general'
    	),
    	array(
    	  'label'       => esc_html__('Display Bars on the side', 'notio'),
    	  'id'          => 'site_bars',
    	  'type'        => 'on_off',
    	  'desc'        => esc_html__('Would you like to display the bars on the left & right?', 'notio'),
    	  'std'         => 'on',
    	  'section'     => 'general'
    	),
    	array(
    	  'label'        => esc_html__('Left Bar Text', 'notio'),
    	  'id'          => 'left_bar',
    	  'type'        => 'text',
    	  'desc'        => esc_html__('The text to display inside left bar', 'notio'),
    	  'section'     => 'general',
    	  'condition'   => 'site_bars:is(on)'
    	),
    	array(
    	  'label'        => esc_html__('Right Bar Text', 'notio'),
    	  'id'          => 'right_bar',
    	  'type'        => 'text',
    	  'desc'        => esc_html__('The text to display inside right bar', 'notio'),
    	  'section'     => 'general',
    	  'condition'   => 'site_bars:is(on)'
    	),
    	array(
    	  'label'        => esc_html__('Scroll to Top Arrow', 'notio'),
    	  'id'          => 'scroll_totop',
    	  'type'        => 'on_off',
    	  'desc'        => esc_html__('You can disable scroll to top arrow from here', 'notio'),
    	  'std'         => 'on',
    	  'section'     => 'general'
    	),
    	array(
    	  'label'        => esc_html__('Preloader', 'notio'),
    	  'id'          => 'preloader',
    	  'type'        => 'on_off',
    	  'desc'        => esc_html__('You can disable preloader here. You can also customize it inside Customization > Backgrounds.', 'notio'),
    	  'std'         => 'on',
    	  'section'     => 'general'
    	),
    	array(
    	  'label'        => esc_html__('Keyboard Navigation', 'notio'),
    	  'id'          => 'keyboard_nav',
    	  'type'        => 'on_off',
    	  'desc'        => esc_html__('You can disable the keyboard navigation feature (p/n) inside article and portfolio pages here.', 'notio'),
    	  'std'         => 'on',
    	  'section'     => 'general'
    	),
    	array(
    	  'id'          => 'general_tab2',
    	  'label'        => esc_html__('Quick Portfolio', 'notio'),
    	  'type'        => 'tab',
    	  'section'     => 'general'
    	),
    	array(
    	  'id'          => 'qp_text',
    	  'label'        => esc_html__('About the Quick Portfolio Settings', 'notio'),
    	  'desc'        => esc_html__('Quick portfolio can only be used when the Site Bars are active', 'notio'),
    	  'type'        => 'textblock',
    	  'section'     => 'general'
    	),
    	array(
    	  'label'       => esc_html__('Quick Portfolio Listing', 'notio'),
    	  'id'          => 'site_bars_portfolio',
    	  'type'        => 'on_off',
    	  'desc'        => esc_html__('Would you like to display the portfolios on site bars?', 'notio'),
    	  'std'         => 'off',
    	  'section'     => 'general'
    	),
    	array(
    	  'label'        => esc_html__('Quick Portfolio Position', 'notio'),
    	  'id'          => 'site_bars_portfolio_position',
    	  'type'        => 'radio',
    	  'desc'        => esc_html__('Which bar would you like to use for Portfolio Listing?', 'notio'),
    	  'choices'     => array(
    	    array(
    	      'label'        => esc_html__('Left Bar', 'notio'),
    	      'value'       => 'left'
    	    ),
    	    array(
    	      'label'        => esc_html__('Right Bar', 'notio'),
    	      'value'       => 'right'
    	    )
    	  ),
    	  'std'         => 'left',
    	  'section'     => 'general',
    	  'condition'   => 'site_bars_portfolio:is(on)'
    	),
    	array(
    	  'label'        => esc_html__('Select Portfolio Items to Display', 'notio'),
    	  'id'          => 'site_bars_portfolio_list',
    	  'type'        => 'list-item',
    	  'desc'        => esc_html__('Please choose which portfolios to display', 'notio'),
    	  'section'     => 'general',
    	  'settings'    => array(
    	    array(
    	      'label'        => esc_html__('Portfolio', 'notio'),
    	      'id'          => 'portfolio',
    	      'type'        => 'custom_post_type_select',
    	      'post_type'		=> 'portfolio'
    	    )
    	  ),
    	  'condition'   => 'site_bars_portfolio:is(on)'
    	),
      array(
        'id'          => 'header_tab1',
        'label'        => esc_html__('Header Settings', 'notio'),
        'type'        => 'tab',
        'section'     => 'header'
      ),
      array(
        'label'        => esc_html__('Header Style', 'notio'),
        'id'          => 'header_style',
        'type'        => 'radio',
        'desc'        => esc_html__('Which Style would you like to use?', 'notio'),
        'choices'     => array(
          array(
            'label'        => esc_html__('Style 1 - Center Logo', 'notio'),
            'value'       => 'style1'
          ),
          array(
            'label'        => esc_html__('Style 2 - Left Logo with right aligned menu & icons', 'notio'),
            'value'       => 'style2'
          ),
          array(
            'label'        => esc_html__('Style 3 - Left Logo with center aligned menu & right aligned icons', 'notio'),
            'value'       => 'style3'
          )
        ),
        'std'         => 'style1',
        'section'     => 'header'
      ),
      array(
        'label'        => esc_html__('Header Max Width', 'notio'),
        'id'          => 'header_max_width',
        'type'        => 'on_off',
        'desc'        => esc_html__('The header will be constrained to the grid if you enable this.', 'notio'),
        'section'     => 'header',
        'std'         => 'off'
      ),
      array(
        'label'        => esc_html__('Full Menu', 'notio'),
        'id'          => 'header_full_menu',
        'type'        => 'on_off',
        'desc'        => esc_html__('Would you like to display the full menu?', 'notio'),
        'section'     => 'header',
        'std'         => 'on',
        'condition'   => 'header_style:not(style1)'
      ),
      array(
        'label'       => esc_html__('Full Menu Sub-Menu Color', 'notio'),
        'id'          => 'header_full_menu_submenu_color',
        'type'        => 'radio',
        'desc'        => esc_html__('Changes the submenu color for the full menu', 'notio'),
        'choices'     => array(
        	array(
        	  'label'       => esc_html__('Light', 'notio'),
        	  'value'       => 'style1'
        	),
          array(
            'label'       => esc_html__('Dark', 'notio'),
            'value'       => 'style2'
          )
        ),
        'std'         => 'style1',
        'section'     => 'header',
        'condition'   => 'header_full_menu:is(on)'
      ),
			array(
			  'label'        => esc_html__('Header Search Icon', 'notio'),
			  'id'          => 'header_search',
			  'type'        => 'on_off',
			  'desc'        => esc_html__('Would you like to display the search icon in the header?', 'notio'),
			  'section'     => 'header',
			  'std'         => 'on'
			),
      array(
        'label'        => esc_html__('Header Shopping Cart Icon', 'notio'),
        'id'          => 'header_cart',
        'type'        => 'on_off',
        'desc'        => esc_html__('Would you like to display the shopping cart icon in the header', 'notio'),
        'section'     => 'header',
        'std'         => 'on'
      ),
      array(
        'id'          => 'header_tab12',
        'label'        => esc_html__('Mobile Menu Settings', 'notio'),
        'type'        => 'tab',
        'section'     => 'header'
      ),
      array(
        'label'        => esc_html__('Mobile Menu Style', 'notio'),
        'id'          => 'mobile_menu_style',
        'type'        => 'radio',
        'desc'        => esc_html__('You can change the mobile menu style here', 'notio'),
        'choices'     => array(
          array(
            'label'        => esc_html__('Style 1', 'notio'),
            'value'       => 'style1'
          ),
          array(
            'label'        => esc_html__('Style 2', 'notio'),
            'value'       => 'style2'
          )
        ),
        'std'         => 'style1',
        'section'     => 'header'
      ),
      array(
        'label'        => esc_html__('Mobile Menu Position', 'notio'),
        'id'          => 'mobile_menu_position',
        'type'        => 'radio',
        'desc'        => esc_html__('You can place the mobile menu icon and the menu on different positions.', 'notio'),
        'choices'     => array(
          array(
            'label'        => esc_html__('Left', 'notio'),
            'value'       => 'left'
          ),
          array(
            'label'        => esc_html__('Right', 'notio'),
            'value'       => 'right'
          )
        ),
        'std'         => 'right',
        'section'     => 'header'
      ),
      array(
        'label'        => esc_html__('Language Switcher', 'notio'),
        'id'          => 'menu_ls',
        'type'        => 'on_off',
        'desc'        => esc_html__('Would you like to display the language switcher inside the mobile menu? <small>Requires that you have WPML installed. <a href="https://wpml.org/?aid=85928&affiliate_key=PIP3XupfKQOZ">You can purchase WPML here.</a></small>', 'notio'),
        'section'     => 'header',
        'std'         => 'off'
      ),
      array(
        'label'        => esc_html__('Mobile Menu Footer', 'notio'),
        'id'          => 'menu_footer',
        'type'        => 'textarea',
        'desc'        => esc_html__('This content appears at the bottom of the mobile menu. You can use your shortcodes here.', 'notio'),
        'rows'        => '4',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Mobile Menu Social Links', 'notio' ),
        'id'          => 'menu_social_link',
        'type'        => 'social-links',
        'desc'        => esc_html__('Add your desired Social Links for the mobile menu here', 'notio' ),
        'section'     => 'header'
      ),
      array(
        'id'          => 'header_tab2',
        'label'        => esc_html__('Logo Settings', 'notio'),
        'type'        => 'tab',
        'section'     => 'header'
      ),
      array(
        'label'        => esc_html__('Logo Upload', 'notio'),
        'id'          => 'logo',
        'type'        => 'upload',
        'desc'        => esc_html__('You can upload your own logo here. Since this theme is retina-ready, <strong>please upload a double size image.</strong> The image should be maximum 80 pixels in height.', 'notio'),
        'section'     => 'header'
      ),
      array(
        'label'        => esc_html__('Light Logo Upload', 'notio'),
        'id'          => 'logo_light',
        'type'        => 'upload',
        'desc'        => esc_html__('This is used when the transparent header is enabled and header color is set to Light inside Page Settings.', 'notio'),
        'section'     => 'header'
      ),
      array(
        'label'        => esc_html__('Logo Height', 'notio'),
        'id'          => 'logo_height',
        'type'        => 'measurement',
        'desc'        => esc_html__('You can modify the logo height from here. This is maximum height, so your logo may get smaller depending on spacing inside header', 'notio'),
        'section'     => 'header'
      ),
      array(
        'label'        => esc_html__('Logo Mobile Height', 'notio'),
        'id'          => 'logo_mobile_height',
        'type'        => 'measurement',
        'desc'        => esc_html__('You can modify the mobile logo height from here.', 'notio'),
        'section'     => 'header'
      ),
      array(
        'id'          => 'header_tab3',
        'label'        => esc_html__('Header Measurements', 'notio'),
        'type'        => 'tab',
        'section'     => 'header'
      ),
      array(
        'label'        => esc_html__('Header Height', 'notio'),
        'id'          => 'header_height',
        'type'        => 'measurement',
        'desc'        => esc_html__('You can modify the header height from here', 'notio'),
        'section'     => 'header'
      ),
      array(
        'label'        => esc_html__('Header Mobile Height', 'notio'),
        'id'          => 'header_mobile_height',
        'type'        => 'measurement',
        'desc'        => esc_html__('You can modify the mobile header height from here', 'notio'),
        'section'     => 'header'
      ),
      array(
        'id'          => 'menu_margin',
        'label'       => esc_html__('Full Menu Item Margin', 'notio'),
        'desc'        => esc_html__('If you want to fit more menu items to the given space, you can decrease the margin between them here. The default margin is 30px', 'notio'),
        'type'        => 'measurement',
        'section'     => 'header'
      ),
      array(
        'id'          => 'shop_tab1',
        'label'        => esc_html__('General', 'notio'),
        'type'        => 'tab',
        'section'     => 'shop'
      ),
      array(
       'label'        => esc_html__('Shop Full Width', 'notio'),
       'id'          => 'shop_full_width',
       'type'        => 'on_off',
       'desc'        => esc_html__('This will make the shop page full width.', 'notio'),
       'section'     => 'shop',
       'std'         => 'on'
      ),
      array(
        'label'       => esc_html__('Shop Sidebar', 'notio' ),
        'id'          => 'shop_sidebar',
        'type'        => 'radio',
        'desc'        => esc_html__('Would you like to display sidebar on shop main and category pages?', 'notio'),
        'choices'     => array(
          array(
            'label'       => esc_html__('No Sidebar', 'notio'),
            'value'       => 'no'
          ),
          array(
            'label'       => esc_html__('Right Sidebar', 'notio'),
            'value'       => 'right'
          ),
          array(
            'label'       => esc_html__('Left Sidebar', 'notio'),
            'value'       => 'left'
          )
        ),
        'std'         => 'no',
        'section'     => 'shop'
      ),
      array(
        'label'       => esc_html__('Products Per Page', 'notio' ),
        'id'          => 'products_per_page',
        'type'        => 'text',
        'section'     => 'shop',
        'std' 				=> '12'
      ),
      array(
      	'label'       => esc_html__('Products Per Row', 'notio' ),
        'id'          => 'products_per_row',
        'std'         => '4',
        'type'        => 'numeric-slider',
        'section'     => 'shop',
        'min_max_step'=> '2,6,1'
      ),
      array(
        'label'        => esc_html__('Product "Just Arrived" Badge time', 'notio'),
        'id'          => 'shop_newness',
        'type'        => 'radio',
        'desc'        => esc_html__('Products that are added before the below time will display the new product page', 'notio'),
        'choices'     => array(
          array(
            'label'        => esc_html__('Never - "Just Arrived" Badge will never be shown', 'notio'),
            'value'       => '0'
          ),
          array(
            'label'        => esc_html__('1 Day', 'notio'),
            'value'       => '1'
          ),
          array(
            'label'        => esc_html__('2 Days', 'notio'),
            'value'       => '2'
          ),
          array(
            'label'        => esc_html__('3 Days', 'notio'),
            'value'       => '3'
          ),
          array(
            'label'        => esc_html__('1 Week', 'notio'),
            'value'       => '7'
          ),
          array(
            'label'        => esc_html__('2 Weeks', 'notio'),
            'value'       => '14'
          ),
          array(
            'label'        => esc_html__('3 Weeks', 'notio'),
            'value'       => '21'
          ),
          array(
            'label'        => esc_html__('1 Month', 'notio'),
            'value'       => '30'
          )
          
        ),
        'std'         => '7',
        'section'     => 'shop'
      ),
      array(
        'id'          => 'shop_tab2',
        'label'        => esc_html__('Product Page', 'notio'),
        'type'        => 'tab',
        'section'     => 'shop'
      ),
			array(
			 'label'        => esc_html__('Full Width', 'notio'),
			 'id'          => 'product_full_width',
			 'type'        => 'on_off',
			 'desc'        => esc_html__('This will make the product page full width.', 'notio'),
			 'section'     => 'shop',
			 'std'         => 'on'
			),
      array(
        'label'       => esc_html__('Product Image Position Style', 'notio' ),
        'id'          => 'product_image_position',
        'type'        => 'radio',
        'desc'        => esc_html__('This changes the position of the image', 'notio'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Left', 'notio'),
            'value'       => 'left'
          ),
          array(
            'label'       => esc_html__('Right', 'notio'),
            'value'       => 'right'
          )
        ),
        'std'         => 'left',
        'section'     => 'shop'
      ),
      array(
        'label'       => esc_html__('Product Image Size', 'notio' ),
        'id'          => 'product_image_size',
        'type'        => 'radio',
        'desc'        => esc_html__('This changes the space image takes up', 'notio'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Small', 'notio'),
            'value'       => '4'
          ),
          array(
            'label'       => esc_html__('Medium', 'notio'),
            'value'       => '6'
          ),
          array(
            'label'       => esc_html__('Large', 'notio'),
            'value'       => '8'
          )
        ),
        'std'         => '6',
        'section'     => 'shop'
      ),
      array(
        'label'       => esc_html__('Display Product Navigation?', 'notio'),
        'id'          => 'product_nav',
        'type'        => 'on_off',
        'desc'        => esc_html__('Displays product navigation at the bottom', 'notio'),
        'std'         => 'on',
        'section'     => 'shop'
      ),
      array(
        'id'          => 'shop_tab3',
        'label'        => esc_html__('Social Sharing', 'notio'),
        'type'        => 'tab',
        'section'     => 'shop'
      ),
      array(
        'label'        => esc_html__('Sharing buttons', 'notio'),
        'id'          => 'sharing_buttons_product',
        'type'        => 'checkbox',
        'desc'        => esc_html__('You can choose which social networks to display', 'notio'),
        'choices'     => array(
          array(
            'label'        => esc_html__('Facebook', 'notio'),
            'value'       => 'facebook'
          ),
          array(
            'label'        => esc_html__('Twitter', 'notio'),
            'value'       => 'twitter'
          ),
          array(
            'label'        => esc_html__('Pinterest', 'notio'),
            'value'       => 'pinterest'
          ),
          array(
            'label'        => esc_html__('Google Plus', 'notio'),
            'value'       => 'google-plus'
          ),
          array(
            'label'        => esc_html__('Linkedin', 'notio'),
            'value'       => 'linkedin'
          ),
          array(
            'label'        => esc_html__('Vkontakte', 'notio'),
            'value'       => 'vkontakte'
          ),
          array(
            'label'        => esc_html__('WhatsApp', 'notio'),
            'value'       => 'whatsapp'
          ),
          array(
            'label'        => esc_html__('E-Mail', 'notio'),
            'value'       => 'email'
          )
        ),
        'section'     => 'shop'
      ),
      array(
        'id'          => 'blog_tab1',
        'label'        => esc_html__('General Blog Settings', 'notio'),
        'type'        => 'tab',
        'section'     => 'blog'
      ),
	  	array(
	  		'label'        => esc_html__('Blog Style', 'notio'),
	  		'id'          => 'blog_style',
	  		'type'        => 'radio',
	  		'desc'        => esc_html__('Which blog style would you like to use?', 'notio'),
	  		'choices'     => array(
					array(
						'label'        => esc_html__('Standard', 'notio'),
						'value'       => 'style1'
					),
					array(
						'label'        => esc_html__('Masonry', 'notio'),
						'value'       => 'style2'
					),
					array(
						'label'        => esc_html__('Grid', 'notio'),
						'value'       => 'style3'
					),
					array(
						'label'        => esc_html__('Vertical Split', 'notio'),
						'value'       => 'style4'
					),
					array(
						'label'        => esc_html__('Horizontal', 'notio'),
						'value'       => 'style5'
					),
					array(
						'label'        => esc_html__('List', 'notio'),
						'value'       => 'style6'
					),
					array(
						'label'        => esc_html__('Hover Image - Border', 'notio'),
						'value'       => 'style7'
					),
					array(
						'label'        => esc_html__('Hover Image - Solid', 'notio'),
						'value'       => 'style8'
					)
	  		),
	  		'std'         => 'style1',
	  		'section'     => 'blog'
	  	),
	  	array(
	  	  'label'       => esc_html__('Blog Pagination Style', 'notio'),
	  	  'id'          => 'blog_pagination_style',
	  	  'type'        => 'radio',
	  	  'desc'        => esc_html__('You can choose different blog pagination styles here. The regular pagination will be used for archive pages.', 'notio'),
	  	  'choices'     => array(
	  	    array(
	  	      'label'       => esc_html__('Regular Pagination', 'notio'),
	  	      'value'       => 'style1'
	  	    ),
	  	    array(
	  	      'label'       => esc_html__('Load More Button', 'notio'),
	  	      'value'       => 'style2'
	  	    ),
	  	    array(
	  	      'label'       => esc_html__('Infinite Scroll', 'notio'),
	  	      'value'       => 'style3'
	  	    ),
	  	    array(
	  	      'label'       => esc_html__('Prev / Next', 'notio'),
	  	      'value'       => 'style4'
	  	    )
	  	  ),
	  	  'std'         => 'style4',
	  	  'section'     => 'blog'
	  	),
  		array(
  		  'id'          => 'blog_tab2',
  		  'label'       => esc_html__('Article Settings', 'notio'),
  		  'type'        => 'tab',
  		  'section'     => 'blog'
  		),
  		array(
  		  'label'       => esc_html__('Display Tags?', 'notio'),
  		  'id'          => 'article_tags',
  		  'type'        => 'on_off',
  		  'desc'        => esc_html__('Displays article tags at the bottom', 'notio'),
  		  'std'         => 'on',
  		  'section'     => 'blog'
  		),
  		array(
  		  'label'       => esc_html__('Display Author Info?', 'notio'),
  		  'id'          => 'article_author',
  		  'type'        => 'on_off',
  		  'desc'        => esc_html__('Displays author information at the bottom. Will only be displayed if the author description is filled.', 'notio'),
  		  'std'         => 'on',
  		  'section'     => 'blog'
  		),
  		array(
  		  'label'       => esc_html__('Display Related Posts?', 'notio'),
  		  'id'          => 'article_related',
  		  'type'        => 'on_off',
  		  'desc'        => esc_html__('Displays related posts at the bottom.', 'notio'),
  		  'std'         => 'on',
  		  'section'     => 'blog'
  		),
  		array(
  		  'label'       => esc_html__('Display Article Navigation?', 'notio'),
  		  'id'          => 'blog_nav',
  		  'type'        => 'on_off',
  		  'desc'        => esc_html__('Displays article navigation at the bottom', 'notio'),
  		  'std'         => 'on',
  		  'section'     => 'blog'
  		),
  		array(
  		  'id'          => 'blog_tab3',
  		  'label'       => esc_html__('Sharing Settings', 'notio'),
  		  'type'        => 'tab',
  		  'section'     => 'blog'
  		),
  		array(
  		  'label'       => 'Sharing buttons',
  		  'id'          => 'sharing_buttons',
  		  'type'        => 'checkbox',
  		  'desc'        => 'You can choose which social networks to display and get counts from. Please visit <strong>Theme Options > Misc</strong> to fill out application details for the social media sites you choose.',
  		  'choices'     => array(
  		    array(
  		      'label'       => 'Facebook',
  		      'value'       => 'facebook'
  		    ),
  		    array(
  		      'label'       => 'Twitter',
  		      'value'       => 'twitter'
  		    ),
  		    array(
  		      'label'       => 'Pinterest',
  		      'value'       => 'pinterest'
  		    ),
  		    array(
  		      'label'       => 'Google Plus',
  		      'value'       => 'google-plus'
  		    ),
  		    array(
  		      'label'       => 'Linkedin',
  		      'value'       => 'linkedin'
  		    ),
  		    array(
  		      'label'       => 'Vkontakte',
  		      'value'       => 'vkontakte'
  		    ),
  		    array(
  		      'label'       => 'WhatsApp',
  		      'value'       => 'whatsapp'
  		    ),
  		    array(
  		      'label'       => 'E-Mail',
  		      'value'       => 'email'
  		    )
  		  ),
  		  'section'     => 'blog'
  		),
  		array(
  		  'id'          => 'portfolio_tab0',
  		  'label'       => esc_html__('General', 'notio'),
  		  'type'        => 'tab',
  		  'section'     => 'portfolio'
  		),
  		array(
  		  'label'       => esc_html__('Portfolio Slug', 'notio'),
  		  'id'          => 'portfolio_slug',
  		  'type'        => 'text',
  		  'desc'        => esc_html__('The portfolio slug used for the portfolio permalinks', 'notio'),
  		  'section'     => 'portfolio'
  		),
  		array(
  		  'id'          => 'portfolio_tab1',
  		  'label'       => esc_html__('Detail', 'notio'),
  		  'type'        => 'tab',
  		  'section'     => 'portfolio'
  		),
  		array(
  		  'label'       => esc_html__('Display Portfolio Navigation?', 'notio'),
  		  'id'          => 'portfolio_nav',
  		  'type'        => 'on_off',
  		  'desc'        => esc_html__('Displays portfolio navigation at the bottom', 'notio'),
  		  'std'         => 'on',
  		  'section'     => 'portfolio'
  		),
  		array(
  		  'label'       => esc_html__('Limit Navigation to Same Categories?', 'notio'),
  		  'id'          => 'portfolio_nav_cat',
  		  'type'        => 'on_off',
  		  'desc'        => esc_html__('When enabled, the portfolio navigation will be limited within same categories', 'notio'),
  		  'std'         => 'off',
  		  'section'     => 'portfolio',
  		  'condition'   => 'portfolio_nav:is(on)'
  		),
  		array(
  		  'id'          => 'portfolio_tab2',
  		  'label'        => esc_html__('Social Sharing', 'notio'),
  		  'type'        => 'tab',
  		  'section'     => 'portfolio'
  		),
  		array(
  		  'label'        => esc_html__('Sharing buttons', 'notio'),
  		  'id'          => 'sharing_buttons_portfolio',
  		  'type'        => 'checkbox',
  		  'desc'        => esc_html__('You can choose which social networks to display', 'notio'),
  		  'choices'     => array(
  		    array(
  		      'label'        => esc_html__('Facebook', 'notio'),
  		      'value'       => 'facebook'
  		    ),
  		    array(
  		      'label'        => esc_html__('Twitter', 'notio'),
  		      'value'       => 'twitter'
  		    ),
  		    array(
  		      'label'        => esc_html__('Pinterest', 'notio'),
  		      'value'       => 'pinterest'
  		    ),
  		    array(
  		      'label'        => esc_html__('Google Plus', 'notio'),
  		      'value'       => 'google-plus'
  		    ),
  		    array(
  		      'label'        => esc_html__('Linkedin', 'notio'),
  		      'value'       => 'linkedin'
  		    ),
  		    array(
  		      'label'        => esc_html__('Vkontakte', 'notio'),
  		      'value'       => 'vkontakte'
  		    ),
  		    array(
  		      'label'        => esc_html__('WhatsApp', 'notio'),
  		      'value'       => 'whatsapp'
  		    ),
  		    array(
  		      'label'        => esc_html__('E-Mail', 'notio'),
  		      'value'       => 'email'
  		    )
  		  ),
  		  'section'     => 'portfolio'
  		),
      array(
        'id'          => 'misc_tab0',
        'label'        => esc_html__('General', 'notio'),
        'type'        => 'tab',
        'section'     => 'misc'
      ),
      array(
        'label'        => esc_html__('Google Maps API Key', 'notio'),
        'id'          => 'map_api_key',
        'type'        => 'text',
        'desc'        => esc_html__('Please enter the Google Maps Api Key. <small>You need to create a browser API key. For more information, please visit: <a href="https://developers.google.com/maps/documentation/javascript/get-api-key">https://developers.google.com/maps/documentation/javascript/get-api-key</a></small>', 'notio'),
        'section'     => 'misc'
      ),
      array(
        'label'        => esc_html__('Extra CSS', 'notio'),
        'id'          => 'extra_css',
        'type'        => 'css',
        'desc'        => esc_html__('Any CSS that you would like to add to the theme.', 'notio'),
        'section'     => 'misc'
      ),
      array(
        'id'          => 'misc_tab1',
        'label'        => esc_html__('Twitter OAuth', 'notio'),
        'type'        => 'tab',
        'section'     => 'misc'
      ),
      array(
        'id'          => 'twitter_text',
        'label'        => esc_html__('About the Twitter Settings', 'notio'),
        'desc'        => esc_html__('You should fill out these settings if you want to use the Twitter related widgets or Visual Composer Elements', 'notio'),
        'type'        => 'textblock',
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Twitter Sharing Cache', 'notio'),
        'id'          => 'twitter_cache',
        'type'        => 'select',
        'desc'        => esc_html__('Amount of time before the new tweets are fetched.', 'notio'),
        'choices'     => array(
        	array(
        	  'label'       => esc_html__('1 Hour', 'notio'),
        	  'value'       => '1h'
        	),
          array(
            'label'       => esc_html__('1 Day', 'notio'),
            'value'       => '1'
          ),
          array(
            'label'       => esc_html__('7 Days', 'notio'),
            'value'       => '7'
          ),
          array(
            'label'       => esc_html__('30 Days', 'notio'),
            'value'       => '30'
          )
        ),
        'std'         => '1',
        'section'     => 'misc'
      ),
      array(
        'label'        => esc_html__('Twitter Username', 'notio'),
        'id'          => 'twitter_bar_username',
        'type'        => 'text',
        'desc'        => esc_html__('Username to pull tweets for', 'notio'),
        'section'     => 'misc'
      ),
      array(
        'label'        => esc_html__('Consumer Key', 'notio'),
        'id'          => 'twitter_bar_consumerkey',
        'type'        => 'text',
        'desc'        => esc_html__('Visit <a href="https://dev.twitter.com/apps">this link</a> in a new tab, sign in with your account, click on Create a new application and create your own keys in case you dont have already', 'notio'),
        'section'     => 'misc'
      ),
      array(
        'label'        => esc_html__('Consumer Secret', 'notio'),
        'id'          => 'twitter_bar_consumersecret',
        'type'        => 'text',
        'desc'        => esc_html__('Visit <a href="https://dev.twitter.com/apps">this link</a> in a new tab, sign in with your account, click on Create a new application and create your own keys in case you dont have already', 'notio'),
        'section'     => 'misc'
      ),
      array(
        'label'        => esc_html__('Access Token', 'notio'),
        'id'          => 'twitter_bar_accesstoken',
        'type'        => 'text',
        'desc'        => esc_html__('Visit <a href="https://dev.twitter.com/apps">this link</a> in a new tab, sign in with your account, click on Create a new application and create your own keys in case you dont have already', 'notio'),
        'section'     => 'misc'
      ),
      array(
        'label'        => esc_html__('Access Token Secret', 'notio'),
        'id'          => 'twitter_bar_accesstokensecret',
        'type'        => 'text',
        'desc'        => esc_html__('Visit <a href="https://dev.twitter.com/apps">this link</a> in a new tab, sign in with your account, click on Create a new application and create your own keys in case you dont have already', 'notio'),
        'section'     => 'misc'
      ),
      array(
        'id'          => 'misc_tab2',
        'label'       => esc_html__('Instagram Settings', 'notio'),
        'type'        => 'tab',
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Instagram ID', 'notio' ),
        'id'          => 'instagram_id',
        'type'        => 'text',
        'desc'        => sprintf(esc_html__('Your Instagram ID, you can find your ID from here: %1$shttp://www.otzberg.net/iguserid/%2$s', 'notio' ),
        	'<a href="http://www.otzberg.net/iguserid/">',
        	'</a>'
        	),
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Instagram Username', 'notio' ),
        'id'          => 'instagram_username',
        'type'        => 'text',
        'desc'        => esc_html__('Your Instagram Username', 'notio' ),
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Access Token', 'notio' ),
        'id'          => 'instagram_accesstoken',
        'type'        => 'text',
        'desc'        => sprintf(esc_html__('Visit %1$sthis link%2$s in a new tab, sign in with your Instagram account, click on Create a new application and create your own keys in case you dont have already. After that, you can get your Access Token using %3$shttp://instagram.pixelunion.net/%4$s', 'notio' ),
        	'<a href="http://instagr.am/developer/register/" target="_blank">',
        	'</a>',
        	'<a href="http://instagram.pixelunion.net/" target="_blank">',
        	'</a>'
        	),
        'section'     => 'misc'
      ),
      array(
        'id'          => 'misc_tab3',
        'label'        => esc_html__('Create Additional Sidebars', 'notio'),
        'type'        => 'tab',
        'section'     => 'misc'
      ),
      array(
        'id'          => 'sidebars_text',
        'label'        => esc_html__('About the sidebars', 'notio'),
        'desc'        => esc_html__('All sidebars that you create here will appear both in the Widgets Page(Appearance > Widgets), from where you will have to configure them, and in the pages, where you will be able to choose a sidebar for each page', 'notio'),
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'misc'
      ),
      array(
        'label'        => esc_html__('Create Sidebars', 'notio'),
        'id'          => 'sidebars',
        'type'        => 'list-item',
        'desc'        => esc_html__('Please choose a unique title for each sidebar!', 'notio'),
        'section'     => 'misc',
        'settings'    => array(
          array(
            'label'        => esc_html__('ID', 'notio'),
            'id'          => 'id',
            'type'        => 'text',
            'desc'        => esc_html__('Please write a lowercase id, with <strong>no spaces</strong>',  'notio'),
          )
        )
      ),
      array(
        'id'          => 'typography_tab9',
        'label'        => esc_html__('Font Families', 'notio'),
        'type'        => 'tab',
        'section'     => 'typography'
      ),
      array(
        'label'        => esc_html__('Font Subsets', 'notio'),
        'id'          => 'font_subsets',
        'type'        => 'radio',
        'desc'        => esc_html__('You can add additional character subset specific to your language.', 'notio'),
        'choices'     => array(
        	array(
        	  'label'        => esc_html__('No Subset', 'notio'),
        	  'value'       => 'no-subset'
        	),
        	array(
        	  'label'       => esc_html__('Latin Extended', 'notio'),
        	  'value'       => 'latin-ext'
        	),
          array(
            'label'        => esc_html__('Greek', 'notio'),
            'value'       => 'greek'
          ),
          array(
            'label'        => esc_html__('Cyrillic', 'notio'),
            'value'       => 'cyrillic'
          ),
          array(
            'label'        => esc_html__('Vietnamese', 'notio'),
            'value'       => 'vietnamese'
          )
        ),
        'std'         => 'no-subset',
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Primary Font', 'notio'),
        'id'          => 'primary_type',
        'type'        => 'typography',
        'std'					=> 'Work Sans',
        'desc'        => esc_html__('Font Family Setting for the primary font. Affects all headings.', 'notio'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Secondary Font', 'notio'),
        'id'          => 'secondary_type',
        'type'        => 'typography',
        'std'					=> 'Karla',
        'desc'        => esc_html__('Font Family Setting for the secondary font', 'notio'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Button Font', 'notio'),
        'id'          => 'button_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Family Setting for the button. Uses the Secondary Font by default', 'notio'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Mobile Menu Font', 'notio'),
        'id'          => 'menu_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Family Setting for the menu. This also overrides the header font. Uses the Secondary Font by default', 'notio'),
        'section'     => 'typography'
      ),
      array(
        'id'          => 'typography_tab0',
        'label'        => esc_html__('Typography', 'notio'),
        'type'        => 'tab',
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Full Menu Font', 'notio'),
        'id'          => 'fullmenu_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Family Setting for the full menu style', 'notio'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Full Menu Dropdown Font', 'notio'),
        'id'          => 'submenu_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Family Setting for the full menu style', 'notio'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Body Font', 'notio'),
        'id'          => 'body_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Family Setting for the body.', 'notio'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Footer Font', 'notio'),
        'id'          => 'footer_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Family Setting for the body.', 'notio'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Footer Widget Title Font', 'notio'),
        'id'          => 'footer_widget_title_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Family Setting for the footer widget titles.', 'notio'),
        'section'     => 'typography'
      ),
      array(
        'id'          => 'typography_tab1',
        'label'       => esc_html__('Heading Typography', 'notio'),
        'type'        => 'tab',
        'section'     => 'typography'
      ),
      array(
        'id'          => 'heading_text',
        'label'       => esc_html__('About Heading Typography', 'notio'),
        'desc'        => esc_html__('These affect all h* tags inside the theme, so use wisely. Some particular headings may need additional css to target.', 'notio'),
        'type'        => 'textblock',
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Heading 1', 'notio'),
        'id'          => 'h1_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Settings for the H1 tag', 'notio'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Heading 2', 'notio'),
        'id'          => 'h2_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Settings for the H2 tag', 'notio'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Heading 3', 'notio'),
        'id'          => 'h3_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Settings for the H3 tag', 'notio'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Heading 4', 'notio'),
        'id'          => 'h4_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Settings for the H4 tag', 'notio'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Heading 5', 'notio'),
        'id'          => 'h5_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Settings for the H5 tag', 'notio'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Heading 6', 'notio'),
        'id'          => 'h6_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Settings for the H6 tag', 'notio'),
        'section'     => 'typography'
      ),
      array(
        'id'          => 'typography_tab2',
        'label'       => esc_html__('Typekit Support', 'notio'),
        'type'        => 'tab',
        'section'     => 'typography'
      ),
      array(
        'id'          => 'typekit_text',
        'label'       => esc_html__('About Typekit Support', 'notio'),
        'desc'        => esc_html__('Please make sure that you enter your Typekit ID or the fonts wont work. After adding Typekit Font Names, these names will appear on the font selection dropdown on the Typography tab.', 'notio'),
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Typekit Kit ID', 'notio'),
        'id'          => 'typekit_id',
        'type'        => 'text',
        'desc'        => esc_html__('Paste the provided Typekit Kit ID. <small>Usually 6-7 random letters</small>', 'notio'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Typekit Font Names', 'notio'),
        'id'          => 'typekit_fonts',
        'type'        => 'text',
        'desc'        => esc_html__('Enter your Typekit Font Name, seperated by comma. For example: futura-pt,aktiv-grotesk <strong>Do not leave spaces between commas</strong>', 'notio'),
        'section'     => 'typography'
      ),
      array(
        'id'          => 'typography_tab3',
        'label'       => esc_html__('Self Hosted Font Support', 'notio'),
        'type'        => 'tab',
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Self Hosted Fonts', 'notio'),
        'id'          => 'self_hosted_fonts',
        'type'        => 'list-item',
        'settings'    => array(
        	array(
        	  'label'       => esc_html__('Font Stylesheet URL', 'notio'),
        	  'id'          => 'font_url',
        	  'type'        => 'text',
        	  'desc'        => esc_html__('URL of the font stylesheet (.css file) you want to use.', 'notio'),
        	  'section'     => 'typography',
        	),
        	array(
        	  'label'       => esc_html__('Font Family Names', 'notio'),
        	  'id'          => 'font_name',
        	  'type'        => 'text',
        	  'desc'        => esc_html__('Enter your Font Family Name, use the name that will be used in css. For example: futura-pt, aktiv-grotesk. After saving, you will be able to use this name in the typography settings.', 'notio'),
        	  'section'     => 'typography',
        	),
        ),
        'section'     => 'typography'
      ),
      array(
        'id'          => 'customization_tab1',
        'label'        => esc_html__('Colors', 'notio'),
        'type'        => 'tab',
        'section'     => 'customization'
      ),
      array(
        'label'        => esc_html__('Accent Color', 'notio'),
        'id'          => 'accent_color',
        'type'        => 'colorpicker',
        'desc'        => esc_html__('Change the accent color used throughout the theme', 'notio'),
        'section'     => 'customization',
        'std'		  => ''
      ),
      array(
        'label'        => esc_html__('Full Menu Link Colors', 'notio'),
        'id'          => 'fullmenu_color',
        'type'        => 'link_color',
        'desc'        => esc_html__('This changes link colors for the full menu.', 'notio'),
        'section'     => 'customization'
      ),
      array(
        'label'        => esc_html__('Full Menu Dropdown Link Colors', 'notio'),
        'id'          => 'submenu_color',
        'type'        => 'link_color',
        'desc'        => esc_html__('This changes link colors inside the dropdowns of the full menu.', 'notio'),
        'section'     => 'customization'
      ),
      array(
        'label'        => esc_html__('Mobile Menu Link Colors', 'notio'),
        'id'          => 'mobilemenu_color',
        'type'        => 'link_color',
        'desc'        => esc_html__('This changes link colors for the mobile menu.', 'notio'),
        'section'     => 'customization'
      ),
      array(
        'label'        => esc_html__('Mobile Menu Dropdown Link Colors', 'notio'),
        'id'          => 'mobilesubmenu_color',
        'type'        => 'link_color',
        'desc'        => esc_html__('This changes link colors inside the dropdowns of the mobile menu.', 'notio'),
        'section'     => 'customization'
      ),
      array(
        'id'          => 'customization_tab4',
        'label'        => esc_html__('Backgrounds', 'notio'),
        'type'        => 'tab',
        'section'     => 'customization'
      ),
      array(
        'label'        => esc_html__('Preloader Background', 'notio'),
        'id'          => 'preloader_bg',
        'type'        => 'background',
        'desc'        => esc_html__('Background settings for the preloader', 'notio'),
        'section'     => 'customization'
      ),
      array(
        'label'        => esc_html__('Header Background', 'notio'),
        'id'          => 'header_bg',
        'type'        => 'background',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('Background settings for the header', 'notio'),
        'section'     => 'customization'
      ),
      array(
        'label'        => esc_html__('Bar Background', 'notio'),
        'id'          => 'bar_bg',
        'type'        => 'background',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('Background settings for the bars on the side.', 'notio'),
        'section'     => 'customization'
      ),
      array(
        'label'        => esc_html__('Navigation Bar Background', 'notio'),
        'id'          => 'nav_bg',
        'type'        => 'background',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('Background settings for the navigation below posts, portfolios & products', 'notio'),
        'section'     => 'customization'
      ),
      array(
        'label'        => esc_html__('Footer Background', 'notio'),
        'id'          => 'footer_bg',
        'type'        => 'background',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('Background settings for the footer', 'notio'),
        'section'     => 'customization'
      ),
      array(
        'label'        => esc_html__('Sub-Footer Background', 'notio'),
        'id'          => 'subfooter_bg',
        'type'        => 'background',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('Background settings for the sub-footer', 'notio'),
        'section'     => 'customization'
      ),
      array(
        'id'          => 'footer_tab1',
        'label'        => esc_html__('General', 'notio'),
        'type'        => 'tab',
        'section'     => 'footer'
      ),
      array(
        'label'        => esc_html__('Display Footer', 'notio'),
        'id'          => 'footer',
        'type'        => 'on_off',
        'desc'        => esc_html__('Would you like to display the Footer?', 'notio'),
        'std'         => 'on',
        'section'     => 'footer'
      ),
      array(
        'label'        => esc_html__('Footer Style', 'notio'),
        'id'          => 'footer_style',
        'type'        => 'radio',
        'desc'        => esc_html__('Which style would you like to use for footer?', 'notio'),
        'choices'     => array(
          array(
            'label'        => esc_html__('Simple Footer', 'notio'),
            'value'       => 'style1'
          ),
          array(
            'label'        => esc_html__('Widgetized Footer', 'notio'),
            'value'       => 'style2'
          )
        ),
        'std'         => 'style1',
        'section'     => 'footer'
      ),
      array(
        'id'          => 'footer_tab2',
        'label'        => esc_html__('Simple Footer Settings', 'notio'),
        'type'        => 'tab',
        'section'     => 'footer'
      ),
      array(
        'label'        => esc_html__('Fixed Simple Footer', 'notio'),
        'id'          => 'footer_simple_fixed',
        'type'        => 'on_off',
        'desc'        => esc_html__('This will make sure that your footer is always inside viewport.', 'notio'),
        'std'         => 'off',
        'section'     => 'footer'
      ),
      array(
        'label'        => esc_html__('Simple Footer Content', 'notio'),
        'id'          => 'footer_content',
        'type'        => 'radio',
        'desc'        => esc_html__('What type of content would you like to use for footer?', 'notio'),
        'choices'     => array(
          array(
            'label'        => esc_html__('Social Icons', 'notio'),
            'value'       => 'footer-icons'
          ),
          array(
            'label'        => esc_html__('Text', 'notio'),
            'value'       => 'footer-text'
          ),
          array(
            'label'        => esc_html__('Menu', 'notio'),
            'value'       => 'footer-menu'
          )
        ),
        'std'         => 'footer-icons',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Social Links', 'notio' ),
        'id'          => 'footer_social_link',
        'type'        => 'social-links',
        'desc'        => esc_html__('Add your desired Social Links for the footer here', 'notio' ),
        'section'     => 'footer',
        'condition'   => 'footer_content:is(footer-icons)'
      ),
      array(
        'label'        => esc_html__('Footer Menu', 'notio'),
        'id'          => 'footer_menu',
        'type'        => 'menu_select',
        'section'     => 'footer',
        'condition'   => 'footer_content:is(footer-menu)'
      ),
      array(
        'label'        => esc_html__('Footer Text Content', 'notio'),
        'id'          => 'footer_text',
        'type'        => 'text',
        'desc'        => esc_html__('Enter your desired text for footer', 'notio'),
        'section'     => 'footer',
        'condition'   => 'footer_content:is(footer-text)'
      ),
      array(
        'id'          => 'footer_tab3',
        'label'        => esc_html__('Widgetized Footer Settings', 'notio'),
        'type'        => 'tab',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Display Widgetized Footer', 'notio'),
        'id'          => 'footer_widgetized',
        'type'        => 'on_off',
        'desc'        => esc_html__('You can hide the widget section if you want to just show the subfooter.', 'notio'),
        'std'         => 'on',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Footer Max-Width', 'notio'),
        'id'          => 'footer_max_width',
        'type'        => 'on_off',
        'desc'        => esc_html__('Disabling this will make the footer full-width on large screens', 'notio'),
        'std'         => 'on',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Footer Color', 'notio'),
        'id'          => 'footer_color',
        'type'        => 'radio',
        'desc'        => esc_html__('You can choose your footer color here. You can also change your footer background from "Customization"', 'notio'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Light', 'notio'),
            'value'       => 'light'
          ),
          array(
            'label'       => esc_html__('Dark', 'notio'),
            'value'       => 'dark'
          )
        ),
        'std'         => 'light',
        'section'     => 'footer',
      ),
      array(
        'label'       => esc_html__('Footer Columns', 'notio'),
        'id'          => 'footer_columns',
        'type'        => 'radio-image',
        'desc'        => esc_html__('You can change the layout of footer columns here', 'notio'),
        'std'         => 'fourcolumns',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Footer Padding', 'notio'),
        'id'          => 'footer_padding',
        'type'        => 'spacing',
        'desc'        => esc_html__('You can modify the footer padding here', 'notio'),
        'section'     => 'footer'
      ),
      array(
        'id'          => 'footer_tab4',
        'label'       => esc_html__('Sub-Footer Settings', 'notio'),
        'type'        => 'tab',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Display Sub-Footer', 'notio'),
        'id'          => 'subfooter',
        'type'        => 'on_off',
        'desc'        => esc_html__('Would you like to display the Sub-Footer? Only works with widgetized footer', 'notio'),
        'std'         => 'off',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Sub-Footer Max Width', 'notio'),
        'id'          => 'subfooter_max_width',
        'type'        => 'on_off',
        'desc'        => esc_html__('By default, the sub-footer on Notio is limited to the grid. You can extend it to full width using this option.', 'notio'),
        'std'         => 'off',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Sub-Footer Color', 'notio'),
        'id'          => 'subfooter_color',
        'type'        => 'radio',
        'desc'        => esc_html__('You can choose your sub-footer color here. You can also change your sub-footer background from "Customization"', 'notio'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Light', 'notio'),
            'value'       => 'light'
          ),
          array(
            'label'       => esc_html__('Dark', 'notio'),
            'value'       => 'dark'
          )
        ),
        'std'         => 'light',
        'section'     => 'footer',
      ),
      array(
        'label'       => esc_html__('Sub-Footer Text', 'notio' ),
        'id'          => 'subfooter_text',
        'type'        => 'textarea',
        'desc'        => esc_html__('Text Content to be displayed on the subfooter', 'notio' ),
        'section'     => 'footer',
        'std' 				=> esc_html__('&copy; 2019 Notio', 'notio')
      ),
      array(
        'label'       => esc_html__('Sub-Footer Menu', 'notio'),
        'id'          => 'subfooter_menu',
        'type'        => 'menu_select',
        'desc'        => esc_html__('Menu to be displayed on the subfooter', 'notio' ),
        'section'     => 'footer',
        
      )
    )
  );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }

}

/**
 * Menu Select option type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_menu_select' ) ) {
  
  function ot_type_menu_select( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );
    
    /* verify a description */
    $has_desc = $field_desc ? true : false;
    
    /* format setting outer wrapper */
    echo '<div class="format-setting type-category-select ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';
      
      /* description */
      echo $has_desc ? '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>' : '';
      
      /* format setting inner wrapper */
      echo '<div class="format-setting-inner">';
      
        /* build category */
        echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="option-tree-ui-select ' . $field_class . '">';
        
        /* get category array */
        $menus = get_terms( 'nav_menu');
        
        /* has cats */
        if ( ! empty( $menus ) ) {
          echo '<option value="">-- ' . esc_html__( 'Choose One', 'notio' ) . ' --</option>';
          foreach ( $menus as $menu ) {
            echo '<option value="' . esc_attr( $menu->slug ) . '"' . selected( $field_value, $menu->slug, false ) . '>' . esc_attr( $menu->name ) . '</option>';
          }
        } else {
          echo '<option value="">' . esc_html__( 'No Menus Found', 'notio' ) . '</option>';
        }
        
        echo '</select>';
      
      echo '</div>';
    
    echo '</div>';
    
  }
  
}