<?php function thb_button( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_button', $atts );
	extract( $atts );
	
	$link = ( $link == '||' ) ? '' : $link;
	$link = vc_build_link( $link  );
	
	$link_to = $link['url'];
	$a_title = $link['title'];
	$a_target = $link['target'] ? $link['target'] : '_self';	
	
	$class[] = 'btn';
	$class[] = $full_width;
	$class[] = $style;
	$class[] = $animation;
	$class[] = (in_array($style, array('style1', 'style2', 'style8')) ? $color : '');
	
	$out = '';
	
	ob_start();
	?>
	<a class="<?php echo implode(' ', $class); ?>" href="<?php echo esc_attr($link_to); ?>" target="<?php echo esc_attr( $a_target ); ?>" role="button" title="<?php echo esc_attr( $a_title ); ?>"><span><?php echo esc_attr($a_title); ?></span></a>
	
	<?php
	$out = ob_get_clean();
	   
	return $out;
}
thb_add_short('thb_button', 'thb_button');