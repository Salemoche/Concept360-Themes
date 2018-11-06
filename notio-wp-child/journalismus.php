<?php /* Template Name: Concept 360 - Journalismus */ ?>

<?php get_header(); ?>

  <div class="journalismus projects projects__journalismus row">
    <?php $catquery = new WP_Query( 'type=post&cat=42&posts_per_page=-1' ); ?>
    <div class="projects__project-container">
      <?php 
	  $posts = $catquery->get_posts();
	  $posts = c360_rearrange_posts($posts);
	  
	  // Set wrapper flag
	  $wrapperFlag = 0;
	  
	  foreach($posts as $post) { //while($catquery->have_posts()) : $catquery->the_post(); 
	
		// Check for wrapper, as comment_count
		if($post->comment_count == 1 && !$wrapperFlag) { $wrapperFlag = 1 ?><div class="project-wrapper" style="flex-basis: calc(100%/3); float: left"> <?php ; }
		else if($post->comment_count == 0 && $wrapperFlag) { $wrapperFlag = 0; ?></div><?php }
	
		$image_id = get_post_meta($post->ID, 'project_image-main', true);
		$image_url = wp_get_attachment_image_src( $image_id, 'large'  )[0];
		$post_description = get_post_meta($post->ID, 'project_description', true);
		$post_description_length = strlen($post_description);
		$post_description_short = get_post_meta($post->ID, 'project_teaser', true); 
        ?>
        <?php if(has_category(37)): ?>
          <div class="projects__project project__insight project__thumbnail <?php echo get_post_meta($post->ID, 'highlight', true) && $post->comment_status != 1 ? 'projects__project__highlight' : '' ?>">
            <a href="<?php the_permalink() ?>">
              <div>
                <h3><?php the_title(); ?></h3>
              </div>
            </a>
          </div>
        <?php else: ?>
          <div class="projects__project project__thumbnail <?php echo get_post_meta($post->ID, 'highlight', true) && $post->comment_status != 1 ? 'projects__project__highlight' : '' ?>">
            <a href="<?php the_permalink() ?>">
              <div>
                <?php echo the_post_thumbnail($post->ID) ? the_post_thumbnail($post->ID) : ''; ?>
                <div class="projects__project__info project-hover-info">
                  <h3><?php echo esc_html_e(the_title()); ?></h3>
                  <p><?php echo $post_description_short ?></p>
                <?php echo has_category(37); ?>
                </div>
              </div>
            </a>
          </div>
        <?php endif; ?>
      <?php } 
        wp_reset_postdata();
      ?>
    </div>
  </div>
<?php
  get_footer();
?>