<?php function thb_portfolio_horizontal( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'thb_portfolio_horizontal', $atts );
  extract( $atts );
  $source_data = VcLoopSettings::parseData( $source );
  $query_builder = new ThbLoopQueryBuilder( $source_data );
  $posts = $query_builder->build();
  $posts = $posts[1];	
 	$rand = rand(0,1000);
 	ob_start();
 	
 	$classes[] = 'thb-portfolio masonry portfolio-horizontal row';
 	
 	$btn_classes[] = 'masonry_btn btn';
 	?>

	<section class="<?php echo implode(' ', $classes); ?>">
		
		<?php if ( $posts->have_posts() ) { ?>
				<?php 
					while ( $posts->have_posts() ) : $posts->the_post();
						set_query_var( 'thb_size', 'small-12');
						set_query_var( 'thb_hover_style', $hover_style );
						set_query_var( 'thb_title_position', $title_position );
						get_template_part( 'inc/templates/portfolio/style1' );
					endwhile; // end of the loop. 
				?>
		<?php } ?>
	</section>
	<?php 
   $out = ob_get_clean();
   
   wp_reset_postdata();
     
  return $out;
}
thb_add_short('thb_portfolio_horizontal', 'thb_portfolio_horizontal');