<?php
	$menu_social_link = ot_get_option('menu_social_link');
?>
<nav id="mobile-menu" class="<?php echo ot_get_option('mobile_menu_style', 'style1'); ?>">
	<div class="spacer"></div>
	<div class="menu-container custom_scroll">
		<a href="#" class="panel-close"><?php get_template_part('assets/svg/arrows_remove.svg'); ?></a>
		<div class="menu-holder">
			<?php if (has_nav_menu('nav-menu')) { ?>
			  <?php wp_nav_menu( array( 'theme_location' => 'nav-menu', 'depth' => 3, 'container' => false, 'menu_class' => 'mobile-menu', 'walker' => new thb_MegaMenu ) ); ?>
			<?php } else { ?>
				<ul class="mobile-menu">
					<li><a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Please assign a menu', 'notio' ); ?></a></li>
				</ul>		
			<?php } ?>
			<div class="language-select">
				<?php do_action('wpml_add_language_selector');?>
			</div>
		</div>

	</div>
</nav>