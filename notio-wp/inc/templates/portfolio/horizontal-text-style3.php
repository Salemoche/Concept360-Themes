<?php
	$vars = $wp_query->query_vars;
	$thb_color = array_key_exists('thb_color', $vars) ? $vars['thb_color'] : false;
	$class[] = 'portfolio-text-style3';
	$class[] = $thb_color;
	$class[] = 'type-portfolio';

	// Listing Type
	$main_listing_type = get_post_meta($id, 'main_listing_type', true);
	$permalink = '';
	if ($main_listing_type == 'lightbox') {
		$permalink = $image_url[0];
		$class[] = 'mfp-image';
	} else if ($main_listing_type == 'link') {
		$permalink = get_post_meta($id, 'main_listing_link', true);
	} else {
		$permalink = get_the_permalink();
	}
?>
<a <?php post_class($class); ?> href="<?php echo esc_url($permalink); ?>">
	<h2><?php the_title(); ?></h2>
</a>
