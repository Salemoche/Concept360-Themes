<?php function thb_team_parent( $atts, $content = null ) {
	global $thb_columns, $thb_border_color, $thb_style, $thb_member_style;
	$atts = vc_map_get_attributes( 'thb_team_parent', $atts );
	extract( $atts );
	
	$element_id = 'thb-team-' . mt_rand(10, 99);
	$el_class[] = 'thb-team-row';
	
	$out ='';
	ob_start();
	
	
	?>
	<div id="<?php echo esc_attr($element_id); ?>" class="<?php echo implode(' ', $el_class); ?>">
		<div class="row <?php echo esc_attr($thb_style); ?>" data-columns="<?php echo esc_attr($thb_columns); ?>" data-center="true" data-navigation="true">
			<?php echo wpb_js_remove_wpautop($content, false); ?>
		</div>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short('thb_team_parent', 'thb_team_parent');