<?php

	$subfooter_classes[] = 'subfooter';
	$subfooter_classes[] = 'style2';
	$subfooter_classes[] = ot_get_option('subfooter_color', 'light');
	$subfooter_classes[] = ot_get_option('subfooter_max_width', 'off') === 'off' ? 'full-width-subfooter' : false;
	$subfooter_menu = ot_get_option('subfooter_menu');

	$subfooter_logo = ot_get_option('subfooter_logo', 'off');
	$subfooter_logo_upload = ot_get_option('subfooter_logo_upload', Thb_Theme_Admin::$thb_theme_directory_uri. 'assets/img/logo.png');
?>
<div class="<?php echo esc_attr(implode(' ', $subfooter_classes)); ?>">
	<div class="row">
		<div class="small-12 columns text-center">
			<?php if ($subfooter_logo == 'on') { ?>
				<div class="footer-logo-holder">
					<a href="<?php echo esc_url(home_url('/')); ?>" class="subfooter-logolink" title="<?php bloginfo('name'); ?>">
						<img src="<?php echo esc_url($subfooter_logo_upload); ?>" class="logoimg" alt="<?php bloginfo('name'); ?>"/>
					</a>
				</div>
			<?php } ?>
			<?php if ($subfooter_menu) { wp_nav_menu( array( 'menu' => $subfooter_menu, 'depth' => 1, 'menu_class' => 'thb-subfooter-menu ' ) ); } ?>
			<?php echo wp_kses_post(ot_get_option('subfooter_text')); ?>
		</div>
	</div>
</div>
