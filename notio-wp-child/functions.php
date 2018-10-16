  <?php

  //
  // Load Parent Styles
  //

    add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

    function enqueue_parent_styles() {
      wp_enqueue_style( 'parent-style', get_template_directory_uri().'/assets/css/app.css' );
    }

  //
  //menu
  //

  function register_my_menus() {
    register_nav_menus(
      array(
        'header-menu' => __( 'main' )
      )
    );
  }
  
  add_action( 'init', 'register_my_menus' );


  //
  // Breadcrumbs
  //

    function nav_breadcrumb() {

    $delimiter = '	&frasl;';
    $home = 'Home';
    $before = '<span class="current-page">';
    $after = '</span>';

    if ( !is_home() && !is_front_page() || is_paged() ) {

        echo '<nav class="breadcrumb">';

        global $post;
        $homeLink = get_bloginfo('url');
        echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

        if ( is_category()) {
          global $wp_query;
          $cat_obj = $wp_query->get_queried_object();
          $thisCat = $cat_obj->term_id;
          $thisCat = get_category($thisCat);
          $parentCat = get_category($thisCat->parent);
          if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' '));
          // echo $before . single_cat_title('', false) . $after;

        } elseif ( is_day() ) {
          echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
          echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a>  ';
          // echo $before . get_the_time('d') . $after;

        } elseif ( is_month() ) {
          echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>  ';
          // echo $before . get_the_time('F') . $after;

        } elseif ( is_year() ) {
          // echo $before . get_the_time('Y') . $after;

        } elseif ( is_single() && !is_attachment() ) {
          if ( get_post_type() != 'post' ) {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>  ';
            // echo $before . get_the_title() . $after;
          } else {
            $cat = get_the_category(); $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ');
            // echo $before . get_the_title() . $after;
          }

        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
          $post_type = get_post_type_object(get_post_type());
          // echo $before . $post_type->labels->singular_name . $after;


        } elseif ( is_attachment() ) {
          $parent = get_post($post->post_parent);
          $cat = get_the_category($parent->ID); $cat = $cat[0];
          echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
          echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>  ';
          // echo $before . get_the_title() . $after;

        } elseif ( is_page() && !$post->post_parent ) {
          // echo $before . get_the_title() . $after;

        } elseif ( is_page() && $post->post_parent ) {
          $parent_id = $post->post_parent;
          $breadcrumbs = array();
          while ($parent_id) {
          $page = get_page($parent_id);
          $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
          $parent_id = $page->post_parent;
        }
          $breadcrumbs = array_reverse($breadcrumbs);
          foreach ($breadcrumbs as $crumb) echo $crumb . '  ';
          // echo $before . get_the_title() . $after;

        } elseif ( is_search() ) {
          // echo $before . 'Ergebnisse für Ihre Suche nach "' . get_search_query() . '"' . $after;

        } elseif ( is_tag() ) {
          // echo $before . 'Beiträge mit dem Schlagwort "' . single_tag_title('', false) . '"' . $after;

        } elseif ( is_404() ) {
          // echo $before . 'Fehler 404' . $after;
        }

        if ( get_query_var('paged') ) {
          if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
          echo ': ' . __('Seite') . ' ' . get_query_var('paged');
          if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }

        echo '</nav>';

      }
    }


//
// Add Menu Item
//

  add_filter('wp_nav_menu_items', 'add_language', 10, 2);

	function add_language($items, $args){
		
	// $items .= '<li><a>Test-Idea</a></li>';
	
	// $items .= '<li>' . do_action('wpml_add_language_selector') . '</li>'
  // $items .= '<li>'. 'hey' . '</li>';
  
  $address =  '<a href="https://www.google.ch/maps/dir//Regensbergstrasse+126,+8050+Z%C3%BCrich/@47.4077905,8.5416099,17z/data=!3m1!4b1!4m17!1m7!3m6!1s0x47900a8707c34b13:0xbaae1f04d467f11f!2sRegensbergstrasse+126,+8050+Z%C3%BCrich!3b1!8m2!3d47.4077905!4d8.5437986!4m8!1m0!1m5!1m1!1s0x47900a8707c34b13:0xbaae1f04d467f11f!2m2!1d8.5437986!2d47.4077905!3e1" target="_blank">' . get_post_meta(779, 'settings_address', true) . '</a>';
  $phone = '<a href="tel:' . get_post_meta(779, 'settings_telephone-number', true) . '">' .  get_post_meta(779, 'settings_telephone-number', true) . '</a>';
  $mail = '<a href="mailto:' . get_post_meta(779, 'settings_email', true) . '">' . get_post_meta(779, 'settings_email', true) . '</a>';

  $languages = do_action('wpml_add_language_selector');


  $items .= 
  
  '<li class="address-item">
    <ul>
      <li>
        '.
          $mail . 
        '
      </li>
      <li>
        '.
          $address . 
        '
      </li>
      <li>
        '.
          $phone . 
        '
      </li>
    </ul>
  </li>'
  ;
	
	return $items;
	}


//
// Theme Support
//

  add_theme_support('html5', array('search-form'));
?>