<?php function thb_clients_parent( $atts, $content = null ) {
	global $thb_columns, $thb_border_color, $thb_style;
	$atts = vc_map_get_attributes( 'thb_clients_parent', $atts );
	extract( $atts );
	
	$element_id = 'thb-client-logos-' . mt_rand(10, 99);
	$el_class[] = 'thb-client-row';
	$el_class[] = $thb_hover_effect;
	if($thb_image_borders == 'true') {
		$el_class[] = 'has-border';
	}

	$out ='';
	ob_start();
	
	
	?>
	<div id="<?php echo esc_attr($element_id); ?>" class="<?php echo implode(' ', $el_class); ?>">
		<div class="row no-padding <?php echo esc_attr($thb_style); ?>" data-columns="<?php echo esc_attr($thb_columns); ?>" data-navigation="true">
			<?php echo wpb_js_remove_wpautop($content, false); ?>
		</div>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short('thb_clients_parent', 'thb_clients_parent');