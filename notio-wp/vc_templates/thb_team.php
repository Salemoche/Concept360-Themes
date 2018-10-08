<?php function thb_team( $atts, $content = null ) {
	global $thb_columns,$thb_style, $thb_member_style;
	$atts = vc_map_get_attributes( 'thb_team', $atts );
	extract( $atts );
	
	if( ! $image){
		return;
	}
	$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ) );
	
	$el_class[] = 'thb-team-member';
	if ($thb_style !== 'slick') {
		$el_class[] = 'small-12';
		$el_class[] = $thb_columns;
	}
	$el_class[] = 'columns';
	$el_class[] = $thb_member_style;
	
	$icon_class = $thb_member_style === 'member_style2' ? 'boxed-icon fill' : '';
	$out ='';
	ob_start();
	
	?>
	<div class="<?php echo implode(' ', $el_class); ?>">
		<?php echo $image['thumbnail']; ?>
		<?php if ( $name ) : ?>
			<div class="team-information">
				<h5><?php echo esc_html($name); ?></h5>
				<p class="job-title"><?php echo esc_html($sub_title); ?></p>
				<?php if ($facebook || $pinterest || $twitter || $linkedin) { ?>
					<div class="thb-icons">
						<?php if ($facebook) { ?>
							<a href="<?php echo esc_url($facebook); ?>" class="facebook <?php echo esc_attr($icon_class); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
						<?php } ?>
						<?php if ($twitter) { ?>
							<a href="<?php echo esc_url($twitter); ?>" class="twitter <?php echo esc_attr($icon_class); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
						<?php } ?>
						<?php if ($pinterest) { ?>
							<a href="<?php echo esc_url($pinterest); ?>" class="pinterest <?php echo esc_attr($icon_class); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
						<?php } ?>
						<?php if ($linkedin) { ?>
							<a href="<?php echo esc_url($linkedin); ?>" class="linkedin <?php echo esc_attr($icon_class); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		<?php endif; ?>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short('thb_team', 'thb_team');