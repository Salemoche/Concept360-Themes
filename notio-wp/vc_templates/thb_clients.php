<?php function thb_clients( $atts, $content = null ) {
	global $thb_columns, $thb_border_color,$thb_style;
	$atts = vc_map_get_attributes( 'thb_clients', $atts );
	extract( $atts );
	
	if( !$image ){
		return;
	}
	$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ) );
	
	$link = vc_build_link($link);
	if($link['url']) {
		$el_class[] = 'has-link';
	}
	
	$el_class[] = 'thb-client';
	if ($thb_style !== 'slick') {
	$el_class[] = $thb_columns;
	}
	$el_class[] = 'columns';
	$out ='';
	ob_start();
	
	
	?>
	<div class="<?php echo implode(' ', $el_class); ?>" style="border-color: <?php echo esc_attr($thb_border_color); ?>">
		<?php if($link['url']): ?>
			<a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"><?php echo $image['thumbnail']; ?></a>
		<?php else: ?>
			<?php echo $image['thumbnail']; ?>
		<?php endif; ?>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short('thb_clients', 'thb_clients');