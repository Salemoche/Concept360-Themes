<h1>Welcome to <strong><?php echo Thb_Theme_Admin::$thb_theme_name; ?></strong></h1>
<p class="about-text welcome-text">
	<?php echo Thb_Theme_Admin::$thb_theme_name; ?> is now installed and ready to use with your WordPress site. <?php if (!Thb_Theme_Admin::$thb_envato_hosted) { ?>Please activate your theme to import demo contents and get updates for your theme and bundled plugins.<?php } ?>
</p>
<p class="wp-badge wp-thb-badge">
	Version: <?php echo Thb_Theme_Admin::$thb_theme_version; ?></p>
<?php include 'tabs.php'; ?>