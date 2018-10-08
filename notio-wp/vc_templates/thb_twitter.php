<?php function thb_twitter( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_twitter', $atts );
	extract( $atts );
	ob_start();

 	$tweets = thb_gettweets($count);
	
	$classes[] = 'thb_twitter_container';
	$classes[] = $style;
	
	if ($style == 'style2') {
		$classes[] = 'slick text-center';
	}
 	?>
 	<aside class="<?php echo implode(' ', $classes); ?>" data-pagination="true" data-columns="1">
 		<?php 
 			if ( is_wp_error( $tweets ) ) {
 				error_log($tweets->get_error_message());
 				echo $error_string = $tweets->get_error_message();
 			} else {
	 			if (is_array($tweets)) {
	 				foreach ($tweets as $tweet) {
	 					?>
	 					<div class="thb_tweet">
	 						<p><?php echo wp_kses_post($tweet['tweet']); ?></p>
	 						<a href="<?php echo esc_url($tweet['url']); ?>" class="thb_tweet_time" target="_blank"><?php echo wp_kses_post($tweet['time']); ?></a>
	 					</div>
	 					<?php
	 				}
	 			} else {
	 				echo esc_html($tweets);
	 			}
 			}
 		?>
 		<?php if ($style == 'style1') { ?>
 		<div class="thb_follow_us">
 			<a href="https://twitter.com/<?php echo esc_attr(ot_get_option('twitter_bar_username')); ?>" target="_blank"><i class="fa fa-twitter"></i> <?php esc_html_e('Follow us on Twitter', 'notio'); ?></a>
 		</div>
 		<?php } ?>
	</aside>
	<?php
   $out = ob_get_clean();
  return $out;
}
thb_add_short('thb_twitter', 'thb_twitter');