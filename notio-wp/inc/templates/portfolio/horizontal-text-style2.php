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
	
	$class[] = $main_color_title;
	$class[] = 'columns';
	$class[] = 'type-portfolio';
	$class[] = $cats;
	$class[] = 'portfolio-text-style-2';
?>
<div class="small-12 columns">
	<a <?php post_class($class); ?> href="<?php the_permalink(); ?>">
		<h1><?php the_title(); ?></h1>
		<aside class="thb-categories"><span><?php echo esc_html($meta); ?></span></aside>
	</a>
</div>