<?php
	$id = get_the_ID();
	
	$vars = $wp_query->query_vars;
	$thb_button_hide = array_key_exists('thb_button_hide', $vars) ? $vars['thb_button_hide'] : false;
	$thb_button_style = array_key_exists('thb_button_style', $vars) ? $vars['thb_button_style'] : 'style1';
	
	$image_id = get_post_thumbnail_id($id);
	$image_url = wp_get_attachment_image_src($image_id, 'full');
	
	$main_color_title = get_post_meta($id, 'main_color_title', true);
	
	$categories = get_the_term_list( $id, 'project-category', '', ', ', '' ); 
	if ($categories !== '' && !empty($categories)) {
		$categories = strip_tags($categories);
	}

	$terms = get_the_terms( $id, 'project-category' );
	$cats = '';
	if (!empty($terms)) {
		foreach ($terms as $term) { $cats .= ' thb-cat-'.strtolower($term->slug); }
	} else {
		$cats = '';	
	}
	
	$class[] = $main_color_title;
	$class[] = $cats;
	$class[] = 'slider-style1';
	$class[] = 'type-portfolio';
	
	$main_listing_type = get_post_meta($id, 'main_listing_type', true);
	$permalink = '';
	if ($main_listing_type == 'link') {
		$permalink = get_post_meta($id, 'main_listing_link', true);	
	} else {
		$permalink = get_the_permalink();	
	}
?>
<div <?php post_class($class); ?> id="portfolio-<?php the_ID(); ?>" data-title="<?php the_title(); ?>">
	<div class="portfolio-holder">
		<div class="thb-placeholder" style="background-image: url(<?php echo esc_url($image_url[0]); ?>);"></div>
		<div class="portfolio-link">
			<div class="row max_width align-middle">
				<div class="small-12 large-8 columns">
				<aside class="thb-categories"><span><?php echo esc_html($categories); ?></span></aside>
				<h1><span><?php the_title(); ?></span></h1>
				<?php if (has_excerpt()) { the_excerpt(); } ?>
				<?php if ($thb_button_hide !== '1') { ?>
				<a href="<?php echo esc_url($permalink); ?>" title="<?php esc_html_e('View Project', 'notio'); ?>" class="btn <?php echo esc_attr($thb_button_style); ?>"><?php esc_html_e('View Project', 'notio'); ?></a>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>