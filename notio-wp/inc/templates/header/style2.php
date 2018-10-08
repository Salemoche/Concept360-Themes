<?php 
	$header_cart = ot_get_option('header_cart');
	$header_search = ot_get_option('header_search');
	$logo = ot_get_option('logo', Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/logo.png');
	$logo_light = ot_get_option('logo_light', Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/logo.png');
	$mobile_menu_position = ot_get_option('mobile_menu_position', 'right');
	$header_max_width = ot_get_option('header_max_width', 'on');
?>
<header class="header style2">
	<div class="row align-middle <?php if ($header_max_width === 'off') { ?>full-width-row no-padding <?php } ?>">
		<div class="small-12 columns">
			<div class="logo-holder">
				<?php if ($mobile_menu_position === 'left') { ?>
				<a href="#" data-target="open-menu" class="mobile-toggle">
					<div>
						<span></span><span></span><span></span>
					</div>
				</a>
				<?php } ?>
				<a href="<?php echo esc_url(home_url('/')); ?>" class="logolink">
					<img src="<?php echo esc_url($logo); ?>" class="logoimg" alt="<?php bloginfo('name'); ?>"/>
					<img src="<?php echo esc_url($logo_light); ?>" class="logoimg logo_light" alt="<?php bloginfo('name'); ?>"/>
				</a>
			</div>
			<div class="menu-holder icon-holder">
				<?php $full_menu_true = ot_get_option('menu_style', 'style1'); ?>
				<?php if ($full_menu_true) { ?>
					<nav id="full-menu" role="navigation">
						<?php if (has_nav_menu('nav-menu')) { ?>
						  <?php wp_nav_menu( array( 'theme_location' => 'nav-menu', 'depth' => 3, 'container' => false, 'menu_class' => 'sf-menu', 'walker' => new thb_MegaMenu ) ); ?>
						<?php } else { ?>
							<ul class="sf-menu">
								<li><a href="<?php echo get_admin_url().'nav-menus.php'; ?>"><?php esc_html_e( 'Please assign a menu', 'notio' ); ?></a></li>
							</ul>
						<?php } ?>
					</nav>
				<?php } ?>
				<?php if ($header_search != 'off') { do_action( 'thb_quick_search' ); } ?>
				<?php if ($header_cart != 'off') { do_action( 'thb_quick_cart' ); } ?>
				<?php if ($mobile_menu_position === 'right') { ?>
				<a href="#" data-target="open-menu" class="mobile-toggle">
					<div>
						<span></span><span></span><span></span>
					</div>
				</a>
				<?php } ?>
			</div>
		</div>
	</div>
</header>