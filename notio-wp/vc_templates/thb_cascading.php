<?php function thb_cascading( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_cascading', $atts );
	extract( $atts );
	
	if ($image) {
		$image_src = wp_get_attachment_image_src( $image, 'full' );
		$image_url = $image_src[0];
		$image_alt = get_post_meta( $image, '_wp_attachment_image_alt', true );
	}
	
	$transform = 'translateX('.$image_x.') translateY('.$image_y.')';
	ob_start(); ?>
	
	<figure class="cascading_image">
		<div class="cascading_inner <?php echo esc_attr($animation); ?>">
			<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" style="transform: <?php echo esc_attr($transform); ?>; border-radius: <?php echo esc_attr($radius); ?>px;" class="<?php echo esc_attr($thb_box_shadow); ?>"/>
		</div>
	</figure>
	<?php 
	$out = ob_get_clean();
	return $out;
}
thb_add_short('thb_cascading', 'thb_cascading');