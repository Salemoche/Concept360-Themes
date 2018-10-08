<?php function thb_play( $atts, $content = null ) {
	ob_start();
	$out = '';
	?>
	<a class="thb_video_play" href="#"><?php get_template_part('assets/img/play_pause.svg'); ?></a>
	
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short('thb_play', 'thb_play');