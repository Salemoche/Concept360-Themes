	</div><!-- End role["main"] -->
	<div class="footer row">
		<a href="#contact-form"class="footer__call-to-action columns small-12">
        	<p><?php echo get_post_meta(779, 'footer_call-to-action', true); ?></p>
		</a>
		<div class="footer__info columns small-12 row">
			<div class="footer__info__telefon columns small-4 medium-4">
				<h4><?php echo get_post_meta(779, 'footer_call_phone', true); ?></h4>
				<a href="tel:<?php echo get_post_meta(779, 'settings_telephone-number', true); ?>"><p><?php echo get_post_meta(779, 'settings_telephone-number', true); ?></p></a>
			</div>
			<div class="footer__info__adresse columns small-4 medium-4">
				<h4><?php echo get_post_meta(779, 'footer_call_address', true); ?></h4>
				<a href="https://www.google.ch/maps/dir//Regensbergstrasse+126,+8050+Z%C3%BCrich/@47.4077905,8.5416099,17z/data=!3m1!4b1!4m17!1m7!3m6!1s0x47900a8707c34b13:0xbaae1f04d467f11f!2sRegensbergstrasse+126,+8050+Z%C3%BCrich!3b1!8m2!3d47.4077905!4d8.5437986!4m8!1m0!1m5!1m1!1s0x47900a8707c34b13:0xbaae1f04d467f11f!2m2!1d8.5437986!2d47.4077905!3e1" target="_blank"><p><?php echo get_post_meta(779, 'settings_address', true); ?></p></a>
			</div>
			<div class="footer__info__bail columns small-4 medium-4">
				<h4><?php echo get_post_meta(779, 'footer_call_mail', true); ?></h4>
				<a href="mailto:<?php echo get_post_meta(779, 'settings_email', true); ?>"><p><?php echo get_post_meta(779, 'settings_email', true); ?></p></a>
			</div>
		</div>
		<div id="contact-form" class="footer__contact-form columns small-12">
			<h4><?php echo get_post_meta(779, 'footer_call_mail', true); ?></h4>
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
