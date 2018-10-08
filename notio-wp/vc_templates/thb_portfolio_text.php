<?php function thb_portfolio_text( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'thb_portfolio_text', $atts );
  extract( $atts );
  $source_data = VcLoopSettings::parseData( $source );
  $query_builder = new ThbLoopQueryBuilder( $source_data );
  $posts = $query_builder->build();
  $posts = $posts[1];	
 	$rand = rand(0,1000);
 	ob_start();
	
	$classes[] = $thb_color;
	$classes[] = "thb-portfolio shortcode";
	$classes[] = "thb-text-".$style;
	
	
 	?>
	<?php if ($style == 'style1') { ?>
	<div class="<?php echo implode(' ', $classes); ?>">
		<?php 
			$i = 1;
			while ( $posts->have_posts() ) : $posts->the_post();
				set_query_var( 'thb_count', $i);
				set_query_var( 'thb_color', $thb_color);
				get_template_part( 'inc/templates/portfolio/horizontal-text-style1' );
			$i++; endwhile; // end of the loop. ?>
	</div>
	<?php } else if ($style == 'style2') { 
		$classes[] = "row";
	?>
	<div class="<?php echo implode(' ', $classes); ?>">
		<?php 
			while ( $posts->have_posts() ) : $posts->the_post();
				set_query_var( 'thb_color', $thb_color);
				get_template_part( 'inc/templates/portfolio/horizontal-text-style2' );
			endwhile; // end of the loop. ?>
	</div>
	<?php } else if ($style == 'style3') { 
		$classes[] = "full-height-content";
	?>
		<div class="<?php echo implode(' ', $classes); ?>">
			
			<div class="thb-content-side">
				<div class="row max_width">
					<div class="small-12 columns">
						<?php 
						while ( $posts->have_posts() ) : $posts->the_post();
							$id = get_the_id();
							$image_id = get_post_thumbnail_id($id);
							$image_url = wp_get_attachment_image_src($image_id, 'full');
							$portfolios[] = array(
								'image_url' => $image_url
							);
							set_query_var( 'thb_color', $thb_color);
							get_template_part( 'inc/templates/portfolio/horizontal-text-style3' );
						endwhile; // end of the loop. ?>
					</div>
				</div>
			</div>
			<div class="thb-image-side">
				<?php 
					 foreach ($portfolios as $portfolio) {
					 	$image_url = $portfolio["image_url"];
					 	echo '
					 	<div class="portfolio-image" style="background-image:url('. esc_attr($image_url[0]) .')"></div>';
					 }
				?>
			</div>
		</div>
	<?php } ?>
	 
	<?php 
   $out = ob_get_clean();
   
   wp_reset_postdata();
     
  return $out;
}
thb_add_short('thb_portfolio_text', 'thb_portfolio_text');