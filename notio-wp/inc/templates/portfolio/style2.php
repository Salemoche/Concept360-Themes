<?php
	$vars = $wp_query->query_vars;
	$thb_masonry = array_key_exists('thb_masonry', $vars) ? $vars['thb_masonry'] : false;
	$thb_size = array_key_exists('thb_size', $vars) ? $vars['thb_size'] : false;
	$thb_hover_style = array_key_exists('thb_hover_style', $vars) ? $vars['thb_hover_style'] : false;
	$thb_title_position = array_key_exists('thb_title_position', $vars) ? $vars['thb_title_position'] : false;
	
	$id = get_the_ID();
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id,'full');
	$aspect_ratio = $image_id ? (($image_url[2] / $image_url[1]) * 100).'%' : '100%';
	$aspect_ratio = $thb_masonry ? $aspect_ratio : '80%';
	
	$hover_id = get_post_meta($id, 'main_hover_image', true);
	
	if ($hover_id !== '') {
		$hover_url = wp_get_attachment_image_src($hover_id, 'full');
	} else {
		$hover_url = $image_url;
	}
	
	$portfolio_type = get_post_meta($id, 'portfolio_type', true);
	
	$categories = get_the_term_list( $id, 'project-category', '', ', ', '' ); 
	if ($categories !== '') {
		$categories = strip_tags($categories);
	}
	
	$meta = get_the_term_list( $id, 'project-category', '<span>', '</span>, <span>', '</span>' ); 
	$meta = strip_tags($meta, '<span>');
	
	$terms = get_the_terms( $id, 'project-category' );
	if (!empty($terms)) {
		foreach ($terms as $term) { $class[] = 'thb-cat-'.strtolower($term->slug); }
	}
	
	$class[] = $thb_size;
	$class[] = $thb_hover_style;
	$class[] = $thb_title_position;
	$class[] = 'columns';
	$class[] = 'type-portfolio';
	$class[] = 'portfolio-style2';
?>
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" <?php post_class($class); ?> id="portfolio-<?php the_ID(); ?>">
	<div class="portfolio-holder">
		<div class="portfolio-inner" style="<?php echo esc_attr('padding-bottom: '.$aspect_ratio.';'); ?>">
			<div class="thb-placeholder first" style="background-image: url(<?php echo esc_url($image_url[0]); ?>);"></div>
			<?php if ($thb_hover_style == 'style2-hover-style2') { ?>
			<div class="thb-placeholder second"></div>
			<?php }?>
		</div>
		<div class="portfolio-link">
			<h2><?php the_title(); ?></h2>
			<aside class="thb-categories"><?php echo esc_html($categories); ?></aside>
		</div>
	</div>
</a>