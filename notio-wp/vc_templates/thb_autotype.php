<?php function thb_autotype( $atts, $content = null ) {
	
  $atts = vc_map_get_attributes( 'thb_autotype', $atts );
  extract( $atts );
  
	$out = $text = '';
	$element_id = uniqid('thb-autotype-');
	$typed_text_safe = vc_value_from_safe($typed_text);
	$typed_text_safe = thb_remove_vc_added_p($typed_text_safe);
	$typed_speed = $typed_speed !== '' ? $typed_speed : 50;
	$class[] = 'thb-autotype';
	$class[] = $extra_class;
	ob_start();
	?>
	<div id="<?php echo esc_attr($element_id); ?>" class="<?php echo esc_attr(implode(' ', $class)); ?>">
		<?php 
			if(preg_match_all("/(\*.*?\*)/is", $typed_text_safe, $entries)) {
				foreach($entries[0] as $entry) {
				  $text = substr($entry, 1, -1);
				  $autotype = explode(';', $text);
				  $autotype = array_map('trim', $autotype);
				  
				  $typed_text_safe = str_replace($entry, '<placeholder>', $typed_text_safe);
				}
			}
			echo str_replace('<placeholder>', '<span class="thb-autotype-entry" data-thb-cursor="'.esc_attr($cursor).'" data-thb-loop="'.esc_attr($loop).'" data-strings="'.esc_attr(json_encode($autotype)).'" data-speed="'.esc_attr($typed_speed).'"></span>', $typed_text_safe);
		?>
		<?php if($thb_animated_color) { ?>
		<style>
			#<?php echo esc_attr($element_id); ?> .thb-autotype-entry {
				color: <?php echo esc_attr($thb_animated_color); ?>;
			}
		</style>
		<?php } ?>
	</div>
  
  <?php
  $out = ob_get_clean();
     
  return $out;
}
thb_add_short('thb_autotype', 'thb_autotype');