<?php function thb_portfolio_single( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'thb_portfolio_single', $atts );
  extract( $atts );
  $source_data = VcLoopSettings::parseData( $source );
  $query_builder = new ThbLoopQueryBuilder( $source_data );
  $posts = $query_builder->build();
  $posts = $posts[1];	
 	ob_start();
 	?>
 	<div class="thb-portfolio masonry row">
		<?php
		$i = 1;
		while ( $posts->have_posts() ) : $posts->the_post();
			set_query_var( 'thb_hover_style', $hover_style );
			set_query_var( 'thb_masonry', true );
			set_query_var( 'thb_title_position', $title_position );
			set_query_var( 'thb_class', 'single_portfolio' );
			get_template_part( 'inc/templates/portfolio/'.$style );
	 	$i++; endwhile; // end of the loop. ?>		
	</div>
	 
	<?php 
   $out = ob_get_clean();
   
   wp_reset_postdata();
     
  return $out;
}
thb_add_short('thb_portfolio_single', 'thb_portfolio_single');