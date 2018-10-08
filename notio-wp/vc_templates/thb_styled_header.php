<?php function thb_styled_header( $atts, $content = null ) {
 $atts = vc_map_get_attributes( 'thb_styled_header', $atts );
 extract( $atts );
 ob_start();
 $element_id = 'thb-styled-header-' . mt_rand(10, 99);
 ?>
 <div class="thb_styled_header style1" id="<?php echo esc_attr($element_id); ?>">
 	<?php echo wp_kses_post($title); ?>
 	<?php if ($thb_color) { ?>
 	<style>
 		#<?php echo esc_attr($element_id); ?>.style1 {
 			color: <?php echo esc_attr($thb_color); ?>;
 		}
 		#<?php echo esc_attr($element_id); ?>.style1:after {
 			background-color: <?php echo esc_attr($thb_color); ?>;
 		}
 	</style>
 	<?php } ?>
 </div>
 <?php
 
 $out = ob_get_clean();
 return $out;
}
thb_add_short('thb_styled_header', 'thb_styled_header');