<?php
	$vars = $wp_query->query_vars;
	$thb_masonry = array_key_exists('thb_masonry', $vars) ? $vars['thb_masonry'] : false;
	$thb_grid_type = array_key_exists('thb_grid_type', $vars) ? $vars['thb_grid_type'] : 4;
	$thb_size = array_key_exists('thb_size', $vars) ? $vars['thb_size'] : false;
	$thb_hover_style = array_key_exists('thb_hover_style', $vars) ? $vars['thb_hover_style'] : false;
	$thb_title_position = array_key_exists('thb_title_position', $vars) ? $vars['thb_title_position'] : false;
	$id = get_the_ID();
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id,'full');
	$aspect_ratio = $image_id ? (($image_url[2] / $image_url[1]) * 100).'%' : '100%';
	$aspect_ratio = $thb_masonry && $thb_masonry !== 'custom' ? $aspect_ratio : '';

	$hover_id = get_post_meta($id, 'main_hover_image', true);

	$main_color_title = get_post_meta($id, 'main_color_title', true);

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
	// Link Class
	$link_class[] = 'portfolio-link';

	// Listing Type
	$main_listing_type = get_post_meta($id, 'main_listing_type', true) ? get_post_meta($id, 'main_listing_type', true) : 'regular';
	$permalink = '';
	if ($main_listing_type == 'lightbox') {
		$permalink = $image_url[0];
		$link_class[] = 'mfp-image';
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
	if ($thb_masonry !== 'custom') {
		$class[] = array_key_exists('class',$thb_size) ? $thb_size['class'] : false;
	}
	$class[] = $thb_hover_style;
	$class[] = $thb_title_position;
	$class[] = $main_color_title;
	$class[] = 'type-portfolio';
	$class[] = 'columns';
	$class[] = 'portfolio-style1';

	if (array_key_exists('image_size',$thb_size)) {
		$thb_size['image_size'] = $thb_masonry ? 'notio-masonry-x3' : $thb_size['image_size'];
	}

	// Image sizes

	if ($thb_masonry == 'custom') {
		$masonry_size = get_post_meta($id, 'masonry_size', true) ? get_post_meta($id, 'masonry_size', true) : 'small';
		$thb_masonry_size = thb_get_masonry_size($masonry_size, $thb_grid_type);
		$class[] = $thb_masonry_size['class'];
		$thb_size['image_size'] = $thb_masonry_size['image_size'];
	}

?>
<?php if ( $thb_hover_style !== 'hover-style7' ) { ?>
<div <?php post_class($class); ?> id="portfolio-<?php the_ID(); ?>">
	<div class="portfolio-holder" style="padding-bottom: <?php echo esc_attr($aspect_ratio); ?>">
		<div class="thb-placeholder first"><?php the_post_thumbnail( $thb_size['image_size']); ?></div>
		<?php if ($main_listing_type == 'video') { ?>
		<div class="thb-portfolio-video" data-vide-bg="mp4: <?php echo esc_url($main_listing_video); ?>, poster: <?php echo esc_attr($image_url[0]); ?>" data-vide-options="posterType: 'auto', autoplay: false, loop: true, muted: true, position: 50% 50%, resizing: true"></div>
		<?php } ?>
		<?php if ($thb_hover_style == 'hover-style8') { ?>
		<div class="thb-placeholder second"><?php echo wp_get_attachment_image( $hover_id, $thb_size['image_size']); ?></div>
		<?php }?>
		<a href="<?php echo esc_url($permalink); ?>" rel="bookmark" class="<?php echo esc_attr(implode(' ', $link_class)); ?>">
			<h2><span><?php the_title(); ?></span></h2>
			<?php if ($thb_hover_style == 'hover-style9') { ?>
			<div class="btn style8 <?php if ($main_color_title == 'light-title') { ?>white<?php } ?>"><?php esc_html_e('View Project'); ?></div>
			<?php } else { ?>
			<aside class="thb-categories"><span><?php echo esc_html($categories); ?></span></aside>
			<?php } ?>
		</a>
	</div>
</div>
<?php } else { $link_class[] = 'atvImg-layer'; ?>
<div <?php post_class($class); ?> id="portfolio-<?php the_ID(); ?>">
	<div class="portfolio-holder" style="padding-bottom: <?php echo esc_attr($aspect_ratio); ?>">
		<?php the_post_thumbnail($thb_size['image_size'], array('class' => 'visually-hidden')); ?>
		<div class="thb_3dimg">
			<?php if ($main_listing_type == 'video') { ?>
			<div class="thb-portfolio-video atvImg-layer" data-vide-bg="mp4: <?php echo esc_url($main_listing_video); ?>, poster: <?php echo esc_attr($image_url[0]); ?>" data-vide-options="posterType: 'auto', autoplay: false, loop: true, muted: true, position: 50% 50%, resizing: true"></div>
			<?php } ?>
			<div class="thb-placeholder atvImg-layer">
				<?php the_post_thumbnail($thb_size['image_size'], array('class' => 'thb_3dimage')); ?>
			</div>
			<a href="<?php echo esc_url($permalink); ?>" rel="bookmark" class="<?php echo esc_attr(implode(' ', $link_class)); ?>">
				<h2><span><?php the_title(); ?></span></h2>
				<aside class="thb-categories"><span><?php echo esc_html($categories); ?></span></aside>
			</a>
		</div>
	</div>
</div>
<?php } ?>
