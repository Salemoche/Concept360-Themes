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
	$aspect_ratio = $thb_masonry ? $aspect_ratio : '';
	
	$hover_id = get_post_meta($id, 'main_hover_image', true);
	
	if ($hover_id !== '') {
		$hover_url = wp_get_attachment_image_src($hover_id, 'full');
	} else {
		$hover_url = $image_url;
	}
	
	$portfolio_type = get_post_meta($id, 'portfolio_type', true);
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

	if(get_post_meta(get_the_ID(), 'portfolioSingleWidth', true) == "1/2" && !get_query_var( 'TILE_OVERLAP')){
		$class[] = "small-12 medium-6 large-6 padding-1";
	}else{
		$class[] = "small-12 medium-3 large-3 padding-1";
	}

	if(get_post_meta(get_the_ID(), 'wk-video', true) !== ""){
		$class[] = "wk-videoWrapper";
	}
	
	$class[] = $thb_hover_style;
	$class[] = $thb_title_position;
	$class[] = $main_color_title;
	$class[] = 'type-portfolio';
	$class[] = 'columns';
	$class[] = 'portfolio-style1';

	$wk_custom_title = get_post_meta(get_the_ID(), 'wk-custom_title', true);	
	$wk_custom_text = get_post_meta(get_the_ID(), 'wk-custom_text', true);
?>
<?php if ( $thb_hover_style !== 'hover-style7' ) { ?>
<div <?php post_class($class); ?> id="portfolio-<?php the_ID(); ?>">
	<div class="portfolio-holder" style="padding-bottom: <?php echo esc_attr($aspect_ratio); ?>">
		<?php if(get_post_meta(get_the_ID(), 'wk-video', true) !== ""){ ?>
			<video class="wk-videoPreview" src="<?php echo get_post_meta(get_the_ID(), 'wk-video', true); ?>" loop></video>
		<?php }else{ ?>
		<div class="thb-placeholder first" style="background-image: url('<?php echo esc_url($image_url[0]); ?>');"></div>
		<?php if ($thb_hover_style === 'hover-style8') { ?>
		<div class="thb-placeholder second" style="background-image: url('<?php echo esc_url($hover_url[0]); ?>');"></div>
		<?php }}?>
		<a href="<?php the_permalink(); ?>" rel="bookmark" class="portfolio-link">
			<?php
				echo '<h4>'.$wk_custom_title.'</h4>';
				echo '<p>'.$wk_custom_text.'</p>';												   	
			?>
		</a>
	</div>
</div>
<?php } else { ?>
<div <?php post_class($class); ?> id="portfolio-<?php the_ID(); ?>">
	<div class="portfolio-holder" style="padding-bottom: <?php echo esc_attr($aspect_ratio); ?>">
		<div class="atvImg">
			<div class="thb-placeholder atvImg-layer" style="background-image: url('<?php echo esc_url($image_url[0]); ?>');"></div>
			<a href="<?php the_permalink(); ?>" rel="bookmark" class="atvImg-layer portfolio-link">
				<h2><span><?php the_title(); ?></span></h2>
				<aside class="thb-categories"><span><?php echo esc_html($categories); ?></span></aside>
			</a>
		</div>
	</div>
</div>
<?php } ?>