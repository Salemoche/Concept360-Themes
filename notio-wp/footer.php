	</div><!-- End role["main"] -->
	<?php if (ot_get_option('footer') != 'off') { ?>
	<!-- Start Footer -->
	<?php get_template_part( 'inc/templates/footer/'.ot_get_option('footer_style', 'style1').''); ?>
	<!-- End Footer -->
	<?php } ?>
</div> <!-- End #wrapper -->
<?php if (ot_get_option('scroll_totop') != 'off') { ?>
	<a href="#" id="scroll_totop"><?php get_template_part( 'assets/svg/arrows_up.svg' ); ?></a>
<?php } ?>
<?php 
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	 wp_footer(); 
?>
</body>
</html>