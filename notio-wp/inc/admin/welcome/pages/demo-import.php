<div class="wrap about-wrap thb_welcome thb_product_registration">
	<?php include 'header.php'; ?>
</div>
<div class="wrap about-wrap">

<?php
	$key = Thb_Theme_Admin::$thb_product_key;
	$expired = Thb_Theme_Admin::$thb_product_key_expired;
	$thb_envato_hosted = Thb_Theme_Admin::$thb_envato_hosted;

	$cond = ($key != '' && $expired != 1) || $thb_envato_hosted;
	
?>
<div class="theme-browser thb-demo-import thb-content">
<?php if (!$cond) { ?>
	<div class="thb-error">
		<p><span class="dashicons dashicons-warning"></span> To install any of the demo content sites below you must <a href="<?php echo esc_url(admin_url( 'admin.php?page=thb-product-registration' )); ?>">Activate your Theme</a>.</p>
	</div>
<?php 
	} else if ( !$thb_envato_hosted ) {
		include 'requirements.php'; 
 	}
?>
<?php 
	$demos = thb_Theme_Admin()->thbDemos();
	$i = 0;
 	foreach ($demos as $demo) {
 		?>
 		<div class="theme <?php if (!$cond) { ?>disabled<?php } ?> <?php if (($i+1) % 3 == 0) { ?>last<?php }?>">
 			<div class="theme-screenshot"><div class="loading">Page will refresh after import is done.</div><img src="<?php echo esc_attr($demo['import_image']); ?>" /></div>
 			<h2 class="theme-name" id=""><?php echo esc_attr($demo['import_file_name']); ?></h2>
 			<div class="theme-actions">
 					<a class="button button-primary thb-load-demo <?php if (!$cond) { ?>disabled<?php } ?>" data-demo="<?php echo esc_attr($i++); ?>" href="">Import</a>
 					<a class="button" href="<?php echo esc_attr($demo['import_demo_url']); ?>" target="_blank"><i class="dashicons-before dashicons-share-alt2"></i></a>
 			</div>
 		</div>
 		<?php
 	}
?>
</div>