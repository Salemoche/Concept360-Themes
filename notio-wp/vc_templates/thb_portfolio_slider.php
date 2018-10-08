<?php function thb_portfolio_slider( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'thb_portfolio_slider', $atts );
  extract( $atts );
  
  $source_data = VcLoopSettings::parseData( $source );
  $query_builder = new ThbLoopQueryBuilder( $source_data );
  $posts = $query_builder->build();
  $posts = $posts[1];	
  
 	$rand = mt_rand(10, 99);
 	
 	$classes[] = 'slick';
 	$classes[] = 'thb-portfolio';
 	$classes[] = $style == 'slider-style1' ? 'corner-nav' : 'full-height-content';
 	$classes[] = 'thb-portfolio-slider';
 	$classes[] = 'thb-portfolio-'.$style;
 	$wrapper_attributes[] = 'class="'.implode(' ', $classes).'"';
 	$wrapper_attributes[] = 'id="portfolio-section-'.esc_attr($rand).'"';
 	$wrapper_attributes[] = 'data-autoplay="'. esc_attr($autoplay).'"';
 	$wrapper_attributes[] = 'data-autoplay-speed="'. esc_attr($autoplay_speed).'"';
 	$wrapper_attributes[] = 'data-columns="1"';
 	$wrapper_attributes[] = 'data-navigation="true"';
 	$wrapper_attributes[] = $style == 'slider-style2' ?'data-pagination="true"' : false;
 	$wrapper_attributes[] = $style == 'slider-style2' ? 'data-fade="true"' : false;
 	ob_start();
 	
	$portfolios = array();
	if ( $posts->have_posts() ) { ?>
		<div <?php echo implode( ' ', $wrapper_attributes ); ?>>
			<?php while ( $posts->have_posts() ) : $posts->the_post(); // start of the loop
				set_query_var( 'thb_button_hide', $button_hide);
				set_query_var( 'thb_button_style', $button_style);
				get_template_part( 'inc/templates/portfolio/'.$style );
				endwhile; // end of the loop. 
			?>
		</div>
	<?php } else {
		get_template_part( 'inc/templates/not-found' );
	}

	$out = ob_get_clean();
	
	wp_reset_query();
	wp_reset_postdata();
     
  return $out;
}
thb_add_short('thb_portfolio_slider', 'thb_portfolio_slider');