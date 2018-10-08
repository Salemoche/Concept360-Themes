<?php
	$vars = $wp_query->query_vars;
	$thb_count = array_key_exists('thb_count', $vars) ? $vars['thb_count'] : false;
	$thb_color = array_key_exists('thb_color', $vars) ? $vars['thb_color'] : false;
	
	$id = get_the_ID();
	$image_id = get_post_thumbnail_id();
	
	$terms = get_the_terms( $id, 'project-category' );
	
	$cats = '';
	if (!empty($terms)) {
		foreach ($terms as $term) { $cats .= ' thb-cat-'.strtolower($term->slug); }
	} else {
		$cats = '';	
	}

	$class[] = $cats;
	$class[] = $thb_color;
	$class[] = 'type-portfolio';
	$class[] = 'portfolio-text-style1';
	
	$id = get_the_ID();
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id,'full');
?>
<a <?php post_class($class); ?> href="<?php the_permalink(); ?>">
	<span class="thb_count"><?php echo str_pad($thb_count, 2, '0', STR_PAD_LEFT); ?></span>
	<h1><?php the_title(); ?></h1>
	<figure style="background-image: url(<?php echo esc_url($image_url[0]); ?>);"></figure>
</a>