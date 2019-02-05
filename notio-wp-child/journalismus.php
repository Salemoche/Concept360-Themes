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
	
	    // Fetch master post, if not in master language
	    $masterPostID = apply_filters( 'wpml_object_id', $post->ID, 'post', false, 'de');
		$isHighlighted = get_post_meta($post->ID, 'highlight', true) || get_post_meta( $masterPostID , 'highlight', true);
	  
		// Check for wrapper, as comment_count
		if($post->comment_count == 1 && !$wrapperFlag) { $wrapperFlag = 1 ?><div class="project-wrapper" style="flex-basis: calc(100%/3); float: left"> <?php ; }
		else if($post->comment_count == 0 && $wrapperFlag) { $wrapperFlag = 0; ?></div><?php }
	
		$post_description = get_post_meta($post->ID, 'project_description', true);
		$post_description_short = get_post_meta($post->ID, 'project_teaser', true); 
        ?>
        <?php if(has_category(37)): ?>
          <div class="projects__project project__insight project__thumbnail <?php echo ($isHighlighted && $post->comment_status != 1) ? 'projects__project__highlight' : '' ?>">
            <a href="<?php the_permalink() ?>">
              <div>
                <h4><?php the_title(); ?></h4>
              </div>
            </a>
          </div>
        <?php else: ?>
          <div class="projects__project project__thumbnail <?php echo ($isHighlighted && $post->comment_status != 1) ? 'projects__project__highlight' : '' ?>">
            <a href="<?php the_permalink() ?>">
              <div>
                <?php echo get_the_post_thumbnail($masterPostID, 'large') ? get_the_post_thumbnail($masterPostID, 'large') : ''; ?>
                <div class="projects__project__info project-hover-info">
                  <div class="project-hover-info__aligner">
                    <h4><?php echo the_title(); ?></h4>
                    <p><?php echo $post_description_short ?></p>
                  </div>
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