<?php
	$id = get_the_ID();
	$main_color_title = get_post_meta($id, 'main_color_title', true);

	$meta = get_the_term_list( $id, 'project-category', '', ', ', '' );
	$meta = strip_tags($meta);

	$terms = get_the_terms( $id, 'project-category' );

	$cats = '';
	if (!empty($terms)) {
		foreach ($terms as $term) { $cats .= ' thb-cat-'.strtolower($term->slug); }
	} else {
		$cats = '';
	}
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
	// Video Item
	if ($main_listing_type == 'video') {
	  $main_listing_video = get_post_meta($id, 'main_listing_video', true);
	  $class[] = 'thb-video-item';
	}
	
	$class[] = $main_color_title;
	$class[] = 'columns';
	$class[] = 'type-portfolio';
	$class[] = $cats;
	$class[] = 'portfolio-text-style-2';
?>
<div class="small-12 columns">
	<a <?php post_class($class); ?> href="<?php echo esc_url($permalink); ?>">
		<h1><?php the_title(); ?></h1>
		<aside class="thb-categories"><span><?php echo esc_html($meta); ?></span></aside>
	</a>
</div>
