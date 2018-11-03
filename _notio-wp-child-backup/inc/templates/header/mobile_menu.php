<?php
	$menu_social_link = ot_get_option('menu_social_link');
?>
<nav id="mobile-menu" class="<?php echo ot_get_option('mobile_menu_style', 'style1'); ?>">
	<div class="spacer"></div>
	<div class="menu-container custom_scroll">
		<a href="#" class="panel-close"><?php get_template_part('assets/svg/arrows_remove.svg'); ?></a>
		<div class="wk-socialMedia" style="text-align: center;margin-top:20px;">
			<a class="wk-instagram" href="#" target="_blanc">
				<img src="/wp-content/uploads/2018/01/instagram_white.svg" alt="Instagram" />
			</a>
			<a class="wk-facebook" href="#" target="_blanc">
				<img src="/wp-content/uploads/2018/01/facebook_white.svg" alt="Facebook" />
			</a>
			<a class="wk-youtube" href="#" target="_blanc">
				<img src="/wp-content/uploads/2018/01/youtube_white.svg" alt="Youtube" />
			</a>
			<a class="wk-mail" href="#" target="_blanc">
				<img src="/wp-content/uploads/2018/01/mail_white.svg" alt="Mail" />
			</a>
		</div>
		<div class="menu-holder">
			<?php if (has_nav_menu('nav-menu')) { ?>
			  <?php wp_nav_menu( array( 'theme_location' => 'nav-menu', 'depth' => 3, 'container' => false, 'menu_class' => 'mobile-menu', 'walker' => new thb_MegaMenu ) ); ?>
			<?php } else { ?>
				<ul class="mobile-menu">
					<li><a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Please assign a menu', 'notio' ); ?></a></li>
				</ul>
			<?php } ?>
		</div>
		
		<div class="menu-footer">
			<div class="wk-mobileMenuFooter">
				<?php dynamic_sidebar('footer_mobile_menu'); ?>
			</div>
			<?php echo do_shortcode(ot_get_option('menu_footer')); ?>
			<div class="social-links">
				<?php do_action( 'thb_social_links', $menu_social_link, false); ?>
			</div>
			<?php if (ot_get_option('menu_ls') == 'on') { do_action( 'thb_language_switcher' ); } ?>
		</div>
	</div>
</nav>