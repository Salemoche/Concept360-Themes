	</div><!-- End role["main"] -->
	<div class="footer row">
		<a href="#contact-form"class="footer__call-to-action columns small-12">
        	<p><?php echo get_post_meta(779, 'footer_call-to-action', true); ?></p>
		</a>
		<div class="footer__info columns small-12 row">
			<div class="footer__info__telefon columns small-4 medium-4">
				<!--<h4><?php echo get_post_meta(779, 'footer_call_phone', true); ?></h4>-->
				<a href="tel:<?php echo get_post_meta(779, 'settings_telephone-number', true); ?>"><div class="icon-phone icons"></div> <p><?php echo get_post_meta(779, 'settings_telephone-number', true); ?></p></a>
			</div>
			<div class="footer__info__adresse columns small-4 medium-4">
				<!--<h4><?php echo get_post_meta(779, 'footer_call_address', true); ?></h4>-->
				<a href="https://goo.gl/maps/7VjCJjTFGHk" target="_blank"><div class="icon-address icons"></div> <p><?php echo get_post_meta(779, 'settings_address', true); ?></p></a>
			</div>
			<div class="footer__info__bail columns small-4 medium-4">
				<!--<h4><?php echo get_post_meta(779, 'footer_call_mail', true); ?></h4>-->
				<a href="mailto:<?php echo get_post_meta(779, 'settings_email', true); ?>"><div class="icon-mail icons"></div> <p><?php echo get_post_meta(779, 'settings_email', true); ?></p></a>
			</div>
		</div>
		<div id="contact-form" class="footer__contact-form columns small-12" style="background: rgb(40,40,40);">
			<p><?php echo __('Gerne stehen wir Ihnen für weitere Informationen zur Verfügung.<br />Wir freuen uns von Ihnen zu hören.', 'c360'); ?></p>
			<?php echo do_shortcode( '[contact-form-7 id="676" title="Contact Form"]' ); ?>
		</div>
		<div class="footer__copyright columns small-12">

			<p>Copyright © 2018 by CONCEPT360 GmbH. All rights reserved.</p>
			<div class="footer__copyright__links">
				<!-- <a href="<?php //echo get_permalink(609) ?>"><?php// echo get_the_title(609) ?></a> -->
				<a href="<?php echo get_permalink(17) ?>"><?php echo get_the_title(17) ?></a>
			</div>

		</div>


	</div>
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your thbe, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	 wp_footer();
?>
</body>
</html>
