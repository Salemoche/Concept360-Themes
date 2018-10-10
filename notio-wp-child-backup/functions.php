<?php
//Add WK-Scripts
add_action('wp_enqueue_scripts','wk_wp_enqueue_scripts');

function wk_wp_enqueue_scripts(){
    wp_enqueue_script( 'wk-script-main', get_stylesheet_directory_uri().'/js/wk-main.js', array(), '1.0.0' );
}

//Register The Footer Widget for the Mobile Menu
function wk_widgets_init() {

	register_sidebar( array(
		'name'          => 'Footer Mobile Menu',
		'id'            => 'footer_mobile_menu',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'wk_widgets_init' );

// Before VC Init
add_action( 'vc_before_init', 'wk_vc_before_init' );
 
function wk_vc_before_init() {
	vc_add_param("thb_testimonial", array(
		"type" => "textfield",
        "class" => "wk-testimonialLink",
        "heading" => __( "Link", "wk-domain" ),
        "param_name" => "wk_link_href",
        "value" => __( "", "wk-domain" ),
        "description" => __( "Falls Ausgefüllt wird Testimonial verlinkt.", "wk-domain" )
	));
		
	vc_add_param("vc_column", array(
		"type" => "textfield",
        "class" => "wk-columnLink",
        "heading" => __( "Link", "wk-domain" ),
        "param_name" => "wk_link_href",
        "value" => __( "", "wk-domain" ),
        "description" => __( "Falls Ausgefüllt wird Zeile verlinkt.", "wk-domain" )
	));

	// Require new custom Element
	include_once(dirname(__FILE__).'/vc_templates/wk-video-preview.php' ); 
}

//Remove Shortcode for Visual Composer Elements and Add own
add_action('init', 'wk_init');

function wk_init(){
	remove_shortcode('thb_portfolio_grid');
	add_shortcode( 'thb_portfolio_grid' , 'wk_thb_portfolio_grid' );
	remove_shortcode('thb_testimonial');
	add_shortcode( 'thb_testimonial' , 'wk_thb_testimonial' );
}

function wk_thb_testimonial($atts, $content = null){
	$atts = vc_map_get_attributes( 'thb_testimonial', $atts );
	extract( $atts );

	$image = wpb_getImageBySize( array( 'attach_id' => $author_image, 'class' => 'author_image hide', 'thumb_size' => array('120','120') ) );

	$el_class[] = 'thb-testimonial';
	$out ='';
	ob_start();
	
	
	?>
	<div class="thb-testimonial">
		<blockquote>
			<?php
			if($wk_link_href != ""){
				echo '<a href="'.$wk_link_href.'">';
				echo wpautop($quote);
				echo '</a>';
			}else{
				echo wpautop($quote);
			} ?>
		</blockquote>
		<?php if($author_name) { ?>
			<?php echo $image['thumbnail']; ?>
			<div>
				<cite><?php echo esc_html($author_name); ?></cite>
				<span class="title"><?php echo esc_html($author_title); ?></span>
			</div>
		<?php } ?>
	</div>
	<?php
	$out = ob_get_contents();
	if (ob_get_contents()) ob_end_clean();
	return $out;
}

function wk_thb_portfolio_grid( $atts, $content = null ) {
	  $atts = vc_map_get_attributes( 'thb_portfolio_grid', $atts );
	  extract( $atts );
	  $filter_categories_array = $filter_categories ? explode(',',$filter_categories) : false;
	  $source_data = VcLoopSettings::parseData( $source );
	  $query_builder = new ThbLoopQueryBuilder( $source_data );
	  $posts = $query_builder->build();
	  $posts = $posts[1];
	
	  if ( $posts->have_posts() ) {
		while ( $posts->have_posts() ) : $posts->the_post();
			$portfolio_id_array[] = get_the_ID();
		endwhile;
	  }
	  
	  $rand = rand(0,1000);
      ob_start();

	  $thb_margins = $thb_margins ? 'thb_margins' : 'no-padding';

	  $classes[] = 'thb-portfolio masonry row';
	  $classes[] = $thb_margins;

	  $btn_classes[] = 'masonry_btn btn';
	  $btn_classes[] = $loadmore_style;
	  ?>

		<section class="<?php echo implode(' ', $classes); ?>" data-loadmore="#loadmore-<?php echo esc_attr($rand); ?>" data-filter="thb-filter-<?php echo esc_attr($rand); ?>">

			<?php do_action('thb-render-filter', $filter_categories_array, $rand, $filter_style, $portfolio_id_array ); ?>
			<?php
			
			// Set number of tiles per column
			$NMB_TILES_PER_ROW = 4;
			$NMB_TILES_PER_SECTION = 8;
			$post_ind = 0;
			$tile_ind = 0;
				
			// Traverse posts
			while ( $posts->have_posts() ) : $posts->the_post();
			
				// Add section on start and if new section starts
				if($post_ind == 0 || $post_ind %$NMB_TILES_PER_SECTION == 0){
					echo '<section class="wk-fullHeight wk-portfolioGrid"><div class="wk-portfolioPositionFix">';
				}
				
				// Set post_size
				$post_size = 1;
				
				// Check if current tile has double size
				if(get_post_meta(get_the_ID(), 'portfolioSingleWidth', true) == "1/2") 
				{
					// Set post_size
					$post_size = 2;
				
					// Check if it will cause overlap
					if( ($tile_ind + $post_size) > $NMB_TILES_PER_ROW-1 )
					{
						// Set overlap flag
						set_query_var( 'TILE_OVERLAP', true);
						
						// Correct post_size
						$post_size = 1;
						
						// Increment tile_ind one more
						$tile_ind++;
						$post_ind++;
						
					}
					else
					{
						// Reset overlap flag
						set_query_var( 'TILE_OVERLAP', false);
						
					}
				}
				
				// Output current tile				
				set_query_var( 'thb_size', $columns. ' padding-1' );
				set_query_var( 'thb_hover_style', $hover_style );
				set_query_var( 'thb_masonry', $true_aspect );
				set_query_var( 'thb_title_position', $title_position );
				get_template_part( 'inc/templates/portfolio/'.$style );
				
				// Increment tile
				$tile_ind++;
				$post_ind++;
				
				// Close section at end
				if($post_ind %8 == 0){
					echo '</div></section>';
				}
				
				// Reset tile_ind each 4
				if($tile_ind %4 == 0)
				{
					$tile_ind = 0;
				}
				
			endwhile;
				
		?>
		</section>
		<section class="wk-fullHeight wk-foundPortfolioElements" id="searchedPort0"><div class="wk-portfolioPositionFix"></div></section>
		<?php if ($loadmore) { 
			wp_localize_script( 'thb-app', 'portfolioajax', array( 
				'thb_i' => $post_ind,
				'aspect' => $true_aspect,
				'columns' => $columns. ' padding-1',
				'style' => $style,
				'count' => $source_data['size'],
				'loop' => $source,
				'thb_hover_style' => $hover_style,
				'thb_title_position' => $title_position
			) );
		?>
		<div class="text-center">
			<a class="<?php echo implode(' ', $btn_classes); ?>" href="#" id="loadmore-<?php echo esc_attr($rand); ?>"><?php _e( 'Load More', 'notio' ); ?></a>
		</div>
		<?php } ?>

		<?php 
	   $out = ob_get_contents();
	   if (ob_get_contents()) ob_end_clean();

	   wp_reset_postdata();

	  return $out;
}

// Blocks Username fetch via author request
// https://m0n.co/enum
if (!is_admin()) {
	// default URL format
	if (preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING'])) die();
	add_filter('redirect_canonical', 'shapeSpace_check_enum', 10, 2);
}
function shapeSpace_check_enum($redirect, $request) {
	// permalink URL format
	if (preg_match('/\?author=([0-9]*)(\/*)/i', $request)) die();
	else return $redirect;
}

//Allows SVGs in the Media Uploader
function add_svg_to_upload_mimes($upload_mimes)
{
	$upload_mimes['svg'] = 'image/svg+xml';
	$upload_mimes['svgz'] = 'image/svg+xml';
	return $upload_mimes;
}
add_filter('upload_mimes', 'add_svg_to_upload_mimes');
?>