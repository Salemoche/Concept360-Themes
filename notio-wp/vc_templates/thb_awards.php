<?php function thb_awards( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_awards', $atts );
	extract( $atts );
	$description_safe = vc_value_from_safe($description);
	
	$el_class[] = 'thb-awards';
	$el_class[] = 'row';
	
	$out ='';
	ob_start();

	?>
	<div class="<?php echo implode(' ', $el_class); ?>">
		<div class="small-12 large-2 columns">
			<span class="award-date"><?php echo esc_html($date); ?></span>
		</div>
		<div class="columns">
			<div class="award-container">
				<div class="row">
					<div class="small-6 large-5 columns">
						<?php echo esc_html($name); ?>
					</div>
					<div class="small-6 large-7 columns small-text-left medium-text-right thb-award-description">
						<?php echo $description_safe; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short('thb_awards', 'thb_awards');