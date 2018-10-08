<?php

	$subfooter_classes[] = 'subfooter';
	$subfooter_classes[] = 'style1';
	$subfooter_classes[] = ot_get_option('subfooter_color', 'light');
	$subfooter_classes[] = ot_get_option('subfooter_max_width', 'off') === 'off' ? 'full-width-subfooter' : false;
	$subfooter_menu = ot_get_option('subfooter_menu');
?>
<div class="<?php echo esc_attr(implode(' ', $subfooter_classes)); ?>">
	<div class="row">
		<div class="small-12 medium-6 columns subfooter-left-side">
			<?php echo wp_kses_post(ot_get_option('subfooter_text')); ?>
		</div>
		<div class="small-12 medium-6 columns subfooter-right-side">
			<?php if ($subfooter_menu) { wp_nav_menu( array( 'menu' => $subfooter_menu, 'depth' => 1, 'menu_class' => 'thb-subfooter-menu ' ) ); } ?>
		</div>
	</div>
</div>
