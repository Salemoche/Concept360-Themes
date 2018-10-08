<?php function thb_iconbox( $atts, $content = null ) {
	$icon_family = 'style1';
	$atts = vc_map_get_attributes( 'thb_iconbox', $atts );
	extract( $atts );
	$element_id = 'thb-iconbox-' . mt_rand(10, 99);
	$el_class[] = 'thb-iconbox';
	$el_class[] = $type;
	
	// Image & Icon
	if ($icon_family == 'style1') {
		$icon = '<i class="'.$icon.'"></i>';
	} else {
		$icon = thb_load_template_part( 'assets/svg/'.$svg_icon ); 	
	}
	if ($image) {
		$img_id = preg_replace('/[^\d]/', '', $image);
		$icon = wp_get_attachment_image($img_id, 'full', false, array(
			'alt'   => trim(strip_tags( get_post_meta($img_id, '_wp_attachment_image_alt', true) )),
		));
	}

	$out ='';
	ob_start();
	?>	
		<div id="<?php echo esc_attr($element_id); ?>" class="<?php echo implode(' ', $el_class); ?>" data-animation_speed="<?php echo esc_attr($icon_animation_speed); ?>">
			<span><?php echo $icon; ?></span>
			<div class="content">
				<h6><?php echo esc_attr($heading); ?></h6>
				<?php if (!strpos($type, 'type3')) { ?>
					<div><?php echo wp_kses_post(wpautop($content)); ?></div>
				<?php } ?>
			</div>
			<style>
				#<?php echo esc_attr($element_id); ?>>span {
					color: <?php echo esc_attr($icon_color); ?>;
				}
				#<?php echo esc_attr($element_id); ?>>span {
					background-color: <?php echo esc_attr($icon_bgcolor); ?>;
				}
				#<?php echo esc_attr($element_id); ?> .content h6 {
					color: <?php echo esc_attr($heading_color); ?>;
				}
				#<?php echo esc_attr($element_id); ?> .content div {
					color: <?php echo esc_attr($content_color); ?>;
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
thb_add_short('thb_iconbox', 'thb_iconbox');