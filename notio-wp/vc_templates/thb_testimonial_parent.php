<?php function thb_testimonial_parent( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_testimonial_parent', $atts );
	extract( $atts );
	
	$element_id = 'thb-testimonials-' . mt_rand(10, 99);
	$el_class[] = 'thb-testimonials';
	$el_class[] = 'slick';
	$el_class[] = $thb_style;

	$out ='';
	ob_start();
	?>
	<div id="<?php echo esc_attr($element_id); ?>" class="<?php echo implode(' ', $el_class); ?>" data-columns="1" data-pagination="true" data-fade="true">
		<?php echo wpb_js_remove_wpautop($content, false); ?>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short('thb_testimonial_parent', 'thb_testimonial_parent');