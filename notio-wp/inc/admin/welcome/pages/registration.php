<div class="wrap about-wrap thb_welcome thb_product_registration">
	<?php include 'header.php'; ?>
</div>
<div class="wrap about-wrap">
	<div class="thb-registration thb-content">
		<div class="postbox">
			<?php
				$key = Thb_Theme_Admin::$thb_product_key;
				$expired = Thb_Theme_Admin::$thb_product_key_expired;
				$thb_envato_hosted = Thb_Theme_Admin::$thb_envato_hosted;
				
			if ($key != '' && $expired != 1 && !$thb_envato_hosted) {
			?>
			<div class="steps2">
				<div class="thb-box thb-left">
					<figure><img src="<?php echo Thb_Theme_Admin::$thb_theme_directory_uri.'assets/img/admin/step3.png'; ?>" width="282" alt="Product Key Active" /></figure>
				</div>
				<div class="thb-box thb-right">
					<h2>Product Key Active!</h2>
					<strong><?php echo esc_attr($key); ?></strong>
					<div>
						<button class="button thb-delete-key button-update" type="submit">Remove Key</button>
						<a class="button thb-change-domain button-primary" href="<?php echo Thb_Theme_Admin()->dashboardUrl(); ?>" target="_blank">Change Domain Name</a>
					</div>
				</div>
			</div>
			<?php } else if ( $thb_envato_hosted ) { ?>
			<div class="steps2">
				<div class="thb-box thb-left">
					<figure><img src="<?php echo Thb_Theme_Admin::$thb_theme_directory_uri.'assets/img/admin/step3.png'; ?>" width="282" alt="Product Key Active" /></figure>
				</div>
				<div class="thb-box thb-right">
					<h2>Welcome to Envato Hosted!</h2> 
					<?php if ( defined('SUBSCRIPTION_CODE') ) { ?>
					<strong><?php echo esc_attr(SUBSCRIPTION_CODE); ?></strong>
					<?php } ?>
					<p>Your theme is automatically registered with the Envato Hosted system. You can update your theme &amp; plugins without manual registration.</p>
				</div>
			</div>
			<?php } else { ?>
			
			<p>By generating a product key with our system, you can use license key on 1 production and 1 development domain.</p>
			<ul class="steps">
				<li>
					<div class="step">
						<span class="count">Step 01</span>
						<figure><img src="<?php echo Thb_Theme_Admin::$thb_theme_directory_uri.'assets/img/admin/step1.png'; ?>" width="189" alt="Generate a Product Key" /></figure>
						<a class="button thb-generate" href="<?php echo Thb_Theme_Admin()->dashboardUrl(); ?>" target="_blank">Generate a Product Key</a>
					</div>
				</li>
				<li>
					<div class="step">
						<span class="count">Step 02</span>
						<figure><img src="<?php echo Thb_Theme_Admin::$thb_theme_directory_uri.'assets/img/admin/step2.png'; ?>" width="185" alt="Paste your Product Key Here" /></figure>
						<div class="thb-form">
							<input type="text" id="thb_product_key" name="thb_product_key" value="" placeholder="Paste your Product Key Here" />
							<button class="button button-primary thb-register" type="submit" data-verify="<?php echo Thb_Theme_Admin()->dashboardUrl('verify'); ?>" data-verify-by-purchase="<?php echo Thb_Theme_Admin()->dashboardUrl('verify-by-purchase'); ?>" data-domain="<?php echo get_site_url(); ?>">Activate</button>
						</div>
						<div id="thb_error_messages"></div>
					</div>
				</li>
				<li>
					<div class="step">
						<span class="count large">OR</span>
						<p>You can also use the Envato Purchase Code directly, but you will only be able use it on this domain.</p>
						<div class="thb-form">
							<?php get_template_part('assets/img/admin/envato.svg'); ?>
							<input type="text" id="thb_purchase_code" name="thb_purchase_code" value="" placeholder="Paste your Envato Purchase Code Here" />
							<button class="button button-primary thb-register thb_purchase_code" type="submit" data-verify="<?php echo Thb_Theme_Admin()->dashboardUrl('verify'); ?>" data-verify-by-purchase="<?php echo Thb_Theme_Admin()->dashboardUrl('verify-by-purchase'); ?>" data-domain="<?php echo get_site_url(); ?>">Activate</button>
						</div>
					</div>
				</li>
			</ul>
			<?php } ?>
		</div>
	</div>
</div>