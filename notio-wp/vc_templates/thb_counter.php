<?php function thb_counter( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_counter', $atts );
	extract( $atts );
	$speed = $speed === '' ? 2000 : $speed;
	$out = '';
	$element_id = 'thb-counter-' . mt_rand(10, 99);
	ob_start();
	?>
	<div class="thb-counter" id="<?php echo esc_attr($element_id); ?>">
		<style>
		#<?php echo esc_attr($element_id); ?> .odometer.odometer-auto-theme.odometer-animating-up .odometer-ribbon-inner, 
		#<?php echo esc_attr($element_id); ?> .odometer.odometer-theme-minimal.odometer-animating-up .odometer-ribbon-inner {
			transition: transform <?php echo esc_attr($speed / 1000); ?>s;
		}
		#<?php echo esc_attr($element_id); ?> figure {
			color: <?php echo esc_attr($icon_color); ?>;
		}
		#<?php echo esc_attr($element_id); ?> svg path,
		#<?php echo esc_attr($element_id); ?> svg circle, 
		#<?php echo esc_attr($element_id); ?> rect, 
		#<?php echo esc_attr($element_id); ?> svg ellipse {
			stroke: <?php echo esc_attr($icon_color); ?>;
		}
		#<?php echo esc_attr($element_id); ?> .number {
			color: <?php echo esc_attr($number_color); ?>;
		}
		</style>
		<?php if ($icon) { ?>
		<figure>
			<?php get_template_part( 'assets/svg/'.$icon ); ?>
		</figure>
		<?php } ?>
		<div class="number" data-count="<?php echo esc_attr($counter); ?>" data-speed="<?php echo esc_attr($speed); ?>">0</div>
		<h6><?php echo esc_attr($heading); ?></h6>
		<?php if ($content) { ?>
		<div><?php echo wp_kses_post($content); ?></div>
		<?php } ?>
	</div>
	<?php
	
  $out = ob_get_clean();
     
  return $out;
}
thb_add_short('thb_counter', 'thb_counter');
