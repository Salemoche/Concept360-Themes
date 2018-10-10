<?php 
	$header_cart = ot_get_option('header_cart');
	$header_search = ot_get_option('header_search');
	$logo = ot_get_option('logo', Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/logo.png');
	$mobile_menu_position = ot_get_option('mobile_menu_position', 'right');
	$header_max_width = ot_get_option('header_max_width', 'on');
?>
<header class="header style1">
	<div class="row align-middle <?php if ($header_max_width === 'off') { ?>full-width-row no-padding<?php } ?>">
		<div class="small-12 columns">
			<?php if ($mobile_menu_position === 'left') { ?>
			<a href="#" data-target="open-menu" class="mobile-toggle">
				<div>
					<span></span><span></span><span></span>
				</div>
			</a>
			<?php } else { ?>
				<div></div>
			<?php } ?>
			<a href="<?php echo esc_url(home_url('/')); ?>" class="logolink">
					<img src="<?php echo esc_url($logo); ?>" class="logoimg wk-socialMediaBlack" alt="<?php bloginfo('name'); ?>"/>
					<?php if(is_front_page()){ ?>
					<img src="/wp-content/uploads/2018/01/logo_white.png" class="logoimg wk-socialMediaWhite" alt="<?php bloginfo('name'); ?>"/>
					<?php } ?>
			</a>
			<?php if(is_front_page()) {?>
			<div class="wk-socialMedia wk-socialMediaWhite">
				<a href="#" target="_blanc" class="wk-instagram"><img src="/wp-content/uploads/2018/01/instagram_white.svg" alt="Instagram"></a>
				<a href="#" target="_blanc" class="wk-facebook"><img src="/wp-content/uploads/2018/01/facebook_white.svg" alt="Facebook"></a>
				<a href="#" target="_blanc" class="wk-youtube"><img src="/wp-content/uploads/2018/01/youtube_white.svg" alt="Youtube"></a>
				<a href="#" target="_blanc" class="wk-mail"><img src="/wp-content/uploads/2018/01/mail_white.svg" alt="Mail"></a>
			</div>
			<?php } ?>
			<div class="wk-socialMedia wk-socialMediaBlack">
				<a href="#" target="_blanc" class="wk-instagram"><img src="/wp-content/uploads/2018/01/instagram.svg" alt="Instagram"></a>
				<a href="#" target="_blanc" class="wk-facebook"><img src="/wp-content/uploads/2018/01/facebook.svg" alt="Facebook"></a>
				<a href="#" target="_blanc" class="wk-youtube"><img src="/wp-content/uploads/2018/01/youtube.svg" alt="Youtube"></a>
				<a href="#" target="_blanc" class="wk-mail"><img src="/wp-content/uploads/2018/01/mail.svg" alt="Mail"></a>
			</div>
			<div class="menu-holder icon-holder">
				<?php if ($header_search != 'off') { do_action( 'thb_quick_search' ); } ?>
				<?php if ($header_cart != 'off') { do_action( 'thb_quick_cart' ); } ?>
				<?php if ($mobile_menu_position === 'right') { ?>
				<a href="#" data-target="open-menu" class="mobile-toggle wk-socialMediaBlack">
					<div>
						<span></span><span></span><span></span>
					</div>
				</a>
				<?php if(is_front_page()){ ?>
				<a href="#" data-target="open-menu" class="mobile-toggle wk-socialMediaWhite">
					<div>
						<span></span><span></span><span></span>
					</div>
				</a>
				<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>
</header>