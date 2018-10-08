<?php function thb_icon( $atts, $content = null ) {
	$icon_family = 'style1';
	$atts = vc_map_get_attributes( 'thb_icon', $atts );
	extract( $atts );
	$element_id = 'thb-icon-' . mt_rand(10, 99);
	$el_class[] = 'thb-icon';
	$el_class[] = $icon_size;
	
	// Image & Icon
	if ($icon_family == 'style1') {
		$icon = '<i class="'.esc_attr($icon. ' ' .$icon_size).'"></i>';
	} else {
		$icon = thb_load_template_part( 'assets/svg/'.$svg_icon ); 	
	}

	$out ='';
	ob_start();
	?>	
		<div id="<?php echo esc_attr($element_id); ?>" class="<?php echo implode(' ', $el_class); ?>" data-animation_speed="<?php echo esc_attr($icon_animation_speed); ?>">
			<?php echo $icon; ?>
			<style>
				#<?php echo esc_attr($element_id); ?> {
					color: <?php echo esc_attr($icon_color); ?>;
				}
				<?php if ($icon_family === 'style2' && $icon_color) { ?>
				#<?php echo esc_attr($element_id); ?> svg path,
				#<?php echo esc_attr($element_id); ?> svg circle, 
				#<?php echo esc_attr($element_id); ?> rect, 
				#<?php echo esc_attr($element_id); ?> svg ellipse {
					stroke: <?php echo esc_attr($icon_color); ?>;
				}
				<?php } ?>
			</style>
		
		</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short('thb_icon', 'thb_icon');