<?php
	$footer_content = ot_get_option('footer_content', 'footer-icons');
	$footer_social_link = ot_get_option('footer_social_link');
?>
<footer id="footer" class="footer style1">
	<div class="row">
		<div class="small-12 columns social-links">
			<?php if($footer_content == 'footer-icons') {  ?>
				<?php do_action( 'thb_social_links', $footer_social_link, false ); ?>
			<?php } else if ($footer_content == 'footer-text') { ?>
				<p><?php echo do_shortcode(ot_get_option('footer_text')); ?></p>
			<?php } else if ($footer_content == 'footer-menu') { ?>
				<?php wp_nav_menu( array( 'menu' => ot_get_option('footer_menu'), 'depth' => 1, 'container' => false  ) ); ?>
			<?php } ?>
		</div>
	</div>
</footer>