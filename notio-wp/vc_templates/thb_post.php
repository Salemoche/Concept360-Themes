<?php function thb_post( $atts, $content = null ) {
	$style = '';
	$atts = vc_map_get_attributes( 'thb_post', $atts );
	extract( $atts );

 	$posts = vc_build_loop_query($source);
 	$posts = $posts[1];
 	$style = $style === '' ? 'style6-alt' : $style;
 	
 	$classes[] = 'posts-shortcode align-stretch';
 	$classes[] = 'blog-listing-'.$style;
	$classes[] = $style !== 'style6' ? 'row' : '';
	$classes[] = $style === 'style2' ? 'masonry' : '';
 	ob_start();
 	?>
 	<div class="<?php echo implode(' ', $classes); ?>">
		<?php $i = 0; if ($posts->have_posts()) :  while ($posts->have_posts()) : $posts->the_post(); ?>
			<?php 
			set_query_var( 'thb_i', $i );
			set_query_var( 'thb_columns', $columns );
			get_template_part( 'inc/templates/blogbit/'.$style); 
			?>
		<?php $i++; endwhile; else : endif; ?>
	</div>
	<?php
	$out = ob_get_clean();
	
	wp_reset_postdata();
	 
	return $out;
}
thb_add_short('thb_post', 'thb_post');