<?php
/*-----------------------------------------------------------------------------------*/
/*	Create a new post type called portfolios
/*-----------------------------------------------------------------------------------*/

function thb_create_post_type_portfolios() {
	$slug = function_exists('ot_get_option') ? sanitize_title(ot_get_option('portfolio_slug','portfolio')) : 'portfolio';
	$labels = array(
		'name' => esc_html__( 'Portfolio','notio'),
		'singular_name' => esc_html__( 'Portfolio','notio' ),
		'rewrite' => array('slug' => esc_html__( 'portfolios','notio' )),
		'add_new' => _x('Add New', 'portfolio', 'notio'),
		'add_new_item' => esc_html__('Add New Portfolio','notio'),
		'edit_item' => esc_html__('Edit Portfolio','notio'),
		'new_item' => esc_html__('New Portfolio','notio'),
		'view_item' => esc_html__('View Portfolio','notio'),
		'search_items' => esc_html__('Search Portfolio','notio'),
		'not_found' =>  esc_html__('No portfolios found','notio'),
		'not_found_in_trash' => esc_html__('No portfolios found in Trash','notio'), 
		'parent_item_colon' => ''
  );
  
  $args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true,
		'menu_icon' => 'dashicons-schedule',
		'query_var' => true,
		'taxonomies' => array( 'post_tag' ),
		'rewrite' => array('slug' => $slug, 'with_front' => false),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor', 'excerpt', 'thumbnail', 'comments', 'revisions')
  ); 
  
  register_post_type('portfolio',$args);
  flush_rewrite_rules();
  
  $category_labels = array(
  	'name' => esc_html__( 'Project Categories', 'notio'),
  	'singular_name' => esc_html__( 'Project Category', 'notio'),
  	'search_items' =>  esc_html__( 'Search Project Categories', 'notio'),
  	'all_items' => esc_html__( 'All Project Categories', 'notio'),
  	'parent_item' => esc_html__( 'Parent Project Category', 'notio'),
  	'edit_item' => esc_html__( 'Edit Project Category', 'notio'),
  	'update_item' => esc_html__( 'Update Project Category', 'notio'),
  	'add_new_item' => esc_html__( 'Add New Project Category', 'notio'),
    'menu_name' => esc_html__( 'Project Categories', 'notio')
  ); 	
  
  register_taxonomy("project-category", 
  		array("portfolio"), 
  		array("hierarchical" => true, 
  				'labels' => $category_labels,
  				'show_ui' => true,
      		'query_var' => true,
  				'rewrite' => array( 'slug' => 'project-category' )
  ));
  
  /* Add Custom Columns */
  function thb_column_value($column_name, $id) {
  	if ($column_name == 'thbpid') { echo esc_attr($id); }
  }
  function thb_column_add_clean($cols) {
  	$cols['thbpid'] = esc_html__('ID', 'notio');
  	return $cols;
  }

  add_filter("manage_portfolio_posts_custom_column", 'thb_column_value', 10, 2);
  add_filter("manage_portfolio_posts_columns", 'thb_column_add_clean', 10 );
  
}

/* Initialize post types */
add_action( 'init', 'thb_create_post_type_portfolios', 1 );
