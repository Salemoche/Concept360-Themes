<?php function thb_awards_parent( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_awards_parent', $atts );
	extract( $atts );
	
	$element_id = 'thb-awards-' . mt_rand(10, 99);
	$el_class[] = 'thb-awards-parent';

	$out ='';
	ob_start();
	?>
	<div id="<?php echo esc_attr($element_id); ?>" class="<?php echo implode(' ', $el_class); ?>">
		<?php echo wpb_js_remove_wpautop($content, false); ?>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short('thb_awards_parent', 'thb_awards_parent');