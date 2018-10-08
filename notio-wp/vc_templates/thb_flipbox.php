<?php function thb_flipbox( $atts, $content = null ) {
	$thb_margins = $thb_arrow_color = '';
	$thb_pagination = 'true';
  $atts = vc_map_get_attributes( 'thb_flipbox', $atts );
  extract( $atts );

  $element_id = 'thb-flip-box-' . mt_rand(10, 999);
  $el_class[] = 'thb-flip-box';
  $el_class[] = 'thb-flip-box-front-'.$front_text_color;
  $el_class[] = 'thb-flip-box-back-'.$back_text_color;
  
  $front_bg_image = wpb_getImageBySize( array( 'attach_id' => $front_bg_image, 'thumb_size' => 'full' ) );
  $back_bg_image  = wpb_getImageBySize( array( 'attach_id' => $back_bg_image, 'thumb_size' => 'full' ) );
  
 	$out ='';
 	
 	$front_content_safe = vc_value_from_safe($front_content);
 	$back_content_safe = vc_value_from_safe($back_content);
	ob_start();
	
	?>
	<div id="<?php echo esc_attr($element_id); ?>" class="<?php echo implode(' ', $el_class); ?>">
		<div class="thb-flip-box-front thb-flip-box-side">
			<div class="thb-flip-box-inner">
				<?php echo wp_kses_post($front_content_safe); ?>
			</div>
		</div>
		<div class="thb-flip-box-back thb-flip-box-side">
			<div class="thb-flip-box-inner">
				<?php echo wp_kses_post($back_content_safe); ?>
			</div>
		</div>
		<style>
			#<?php echo esc_attr($element_id); ?> {
				min-height: <?php echo esc_html($min_height); ?>px;
			}
			#<?php echo esc_attr($element_id); ?> .thb-flip-box-front{
				background-color: <?php echo esc_html($front_bg_color); ?>;
				background-image: url(<?php echo esc_html($front_bg_image['p_img_large'][0]); ?>);
			}
			#<?php echo esc_attr($element_id); ?> .thb-flip-box-back{
				background-color: <?php echo esc_html($back_bg_color); ?>;
				background-image: url(<?php echo esc_html($back_bg_image['p_img_large'][0]); ?>);
			}
		</style>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short('thb_flipbox', 'thb_flipbox');