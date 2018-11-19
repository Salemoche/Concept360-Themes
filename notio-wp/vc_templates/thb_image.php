<?php function thb_image( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_image', $atts );
	extract( $atts );

	$element_id = uniqid('thb-image-');

	$img_id = preg_replace('/[^\d]/', '', $image);

	$full = $full_width === 'true' ? 'full' : '';
	$img_size = ($img_size === '' ? 'full' : $img_size);
	$img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'thumb_size' => $img_size, 'class' => 'thb_image '. $retina . ' ' . $box_shadow ) );
	if ( $img == NULL ) $img['thumbnail'] = '<img src="http://placekitten.com/g/400/300" />';

	$link_to = $c_lightbox = $a_title = $a_target = '';
  $image_post = get_post($img_id);
  $image_title = $image_post ? $image_post->post_title : false;
  $image_caption = $image_post ? $image_post->post_excerpt : false;
  $c_lightbox = '';

	$img_url = wp_get_attachment_image_src( $img_id, 'full');
  if ($lightbox == true) {
    $link_to = $img_url[0];
    $c_lightbox = 'mfp-image';
    $a_title = $image_title;
  } else {
		$img_link = ( $img_link == '||' ) ? '' : $img_link;
		$link = vc_build_link( $img_link );

    $link_to = $link['url'];
    $a_title = $link['title'];
    $a_target = $link['target'] ? $link['target'] : '_self';
  }

	$classes[] = 'caption-'.$caption_style;
	$classes[] = $animation;
	$classes[] = $alignment;
	$classes[] = $full;
	$classes[] = $extra_class;
	$classes[] = 'thb_image_link';
	$classes[] = 'wp-caption';
	$classes[] = ($video === 'true' && $video_url) ? 'thb-video-item' : false;

	$out ='';
	ob_start();
	?>
	<div id="<?php echo esc_attr($element_id); ?>" class="<?php echo esc_attr(implode(' ', $classes)); ?>">
	  <?php if (!empty($link_to)) { ?>
			<a class="<?php echo esc_attr($c_lightbox); ?>" href="<?php echo esc_url($link_to); ?>" target="<?php echo sanitize_text_field( $a_target ); ?>" title="<?php echo esc_attr($a_title); ?>">
		<?php } ?>
			<div class="thb-image-inner <?php echo esc_attr($max_width); ?>">
				<?php echo $img['thumbnail']; ?>
				<?php if ($video == 'true') { ?>
			  <div class="thb-portfolio-video" data-vide-bg="mp4: <?php echo esc_url($video_url); ?>, poster: <?php echo esc_attr($img_url[0]); ?>" data-vide-options="posterType: 'auto', autoplay: false, loop: true, muted: true, position: 50% 50%, resizing: true">
			  </div>
			<?php } ?>
			</div>
		<?php if (!empty($link_to)) { ?>
		</a>
		<?php } ?>
		<?php if ($image_caption && $caption === 'true') { ?>
			<div class="wp-caption-text"><?php echo esc_html($image_caption); ?></div>
		<?php } ?>
		<?php if ($content) { ?>
			<div class="thb-image-content">
			<?php echo wp_kses_post($content); ?>
			</div>
		<?php } ?>
		<?php if ($thb_border_radius) { ?>
		<style>
				#<?php echo esc_attr($element_id); ?>,
				#<?php echo esc_attr($element_id); ?> img {
					border-radius: <?php echo esc_attr($thb_border_radius); ?>;
				}
		</style>
	<?php } ?>
	</div>
	<?php

	$out = ob_get_clean();
	return $out;
}
thb_add_short('thb_image', 'thb_image');
