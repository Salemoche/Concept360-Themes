<?php function thb_portfolio_grid( $atts, $content = null ) {
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
		$i = 1;
		while ( $posts->have_posts() ) : $posts->the_post();
			set_query_var( 'thb_size', $columns. ' padding-1' );
			if ( $style === 'style1' ) {
			  set_query_var( 'thb_hover_style', $hover_style );
			} else {
			  set_query_var( 'thb_hover_style', $style2_hover_style );
			}
			set_query_var( 'thb_masonry', $true_aspect );
			set_query_var( 'thb_title_position', $title_position );
			get_template_part( 'inc/templates/portfolio/'.$style );
	 	$i++; endwhile; // end of the loop. ?>
	</section>
	<?php if ($loadmore) { 
		wp_localize_script( 'thb-app', 'portfolioajax', array( 
			'thb_i' => $i,
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
   $out = ob_get_clean();
   
   wp_reset_postdata();
     
  return $out;
}
thb_add_short('thb_portfolio_grid', 'thb_portfolio_grid');