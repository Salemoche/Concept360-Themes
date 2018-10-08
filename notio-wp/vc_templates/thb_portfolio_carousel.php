<?php function thb_portfolio_carousel( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'thb_portfolio_carousel', $atts );
  extract( $atts );
  $source_data = VcLoopSettings::parseData( $source );
  $query_builder = new ThbLoopQueryBuilder( $source_data );
  $posts = $query_builder->build();
  $posts = $posts[1];	

 	$rand = rand(0,1000);
 	ob_start();

 	?>
		<?php if ( $posts->have_posts() ) { ?>
		<div class="row thb-portfolio portfolio-vertical shortcode no-padding slick" data-columns="<?php echo esc_attr($columns); ?>" data-navigation="<?php echo esc_attr($thb_navigation); ?>" data-pagination="<?php echo esc_attr($thb_pagination); ?>">
			<?php 
			while ( $posts->have_posts() ) : $posts->the_post();
				set_query_var( 'thb_size', $columns . ' full-height-content');
				set_query_var( 'thb_hover_style', $hover_style );
				set_query_var( 'thb_title_position', $title_position );
				get_template_part( 'inc/templates/portfolio/style1' );
			endwhile; // end of the loop. ?>
		</div>
	<?php } ?>
	<?php 
   $out = ob_get_clean();
   
   wp_reset_postdata();
     
  return $out;
}
thb_add_short('thb_portfolio_carousel', 'thb_portfolio_carousel');