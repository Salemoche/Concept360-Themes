<?php function thb_portfolio( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'thb_portfolio', $atts );
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
  $is_custom = $style == 'style1' && $masonry_style == 'custom';
 	$thb_masonry = $style == 'style2' ? true : false;
 	$thb_margins = $thb_margins ? 'thb_margins' : 'no-padding';

 	$classes[] = 'thb-portfolio masonry row';
 	$classes[] = $thb_margins;
  $classes[] = $is_custom ? 'variable-height' : false;
 	$classes[] = $style;

 	$btn_classes[] = 'masonry_btn btn';
 	$btn_classes[] = $loadmore_style;

  if ($is_custom) {
    $thb_masonry = 'custom';
  }
 	?>

	<section class="<?php echo esc_attr(implode(' ', $classes)); ?>" data-loadmore="#loadmore-<?php echo esc_attr($rand); ?>" data-filter="thb-filter-<?php echo esc_attr($rand); ?>" data-layoutmode="packery" data-grid-type="<?php echo esc_attr($grid_type); ?>">

		<?php do_action('thb-render-filter', $filter_categories_array, $rand, $filter_style, $portfolio_id_array ); ?>
		<?php
		$i = 1;
		while ( $posts->have_posts() ) : $posts->the_post();
			$size = $style === 'style1' ? thb_get_portfolio_size($masonry_style, $i, 0) : array( 'class' => $columns, 'image_size' => 'notio-masonry-x2');
			set_query_var( 'thb_size', $size );
			if ( $style === 'style1' ) {
			  set_query_var( 'thb_hover_style', $hover_style );
			} else {
			  set_query_var( 'thb_hover_style', $style2_hover_style );
			}
      if ($is_custom) {
        set_query_var( 'thb_grid_type', $grid_type );
      }
			set_query_var( 'thb_masonry', $thb_masonry );
			set_query_var( 'thb_title_position', $title_position );
			get_template_part( 'inc/templates/portfolio/'.$style );
	 	$i++; endwhile; // end of the loop.
    set_query_var( 'thb_masonry', false );
    ?>
	</section>
	<?php if ($loadmore) {
		wp_localize_script( 'thb-app', 'portfolioajax', array(
			'thb_i' => $i,
			'aspect' => false,
			'columns' => $columns,
			'style' => $style,
      'thb_masonry' => $thb_masonry,
      'thb_size' => $size,
      'grid_type' => $grid_type,
			'layout' => $masonry_style,
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
thb_add_short('thb_portfolio', 'thb_portfolio');
