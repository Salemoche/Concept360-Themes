<?php /* Template Name: Concept 360 - Insights */ ?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
  <div class="insights projects projects__insights row">
    <?php $catquery = new WP_Query( 'type=post&cat=37&posts_per_page=-1' ); ?>
    <div class="projects__project-container">
      <?php while($catquery->have_posts()) : $catquery->the_post(); ?>
        <?php 
	    // Fetch master post, if not in master language
	    $masterPostID = icl_object_id( $post->ID, 'post', true, 'de' );
	  
          $image_id = get_post_meta($post->ID, 'project_image-main', true);
          $image_url = wp_get_attachment_image_src( $image_id, 'large'  )[0];
          $post_description = get_post_meta($post->ID, 'project_description', true);
          $post_description_length = strlen($post_description);
          $post_description_short = get_post_meta($post->ID, 'project_teaser', true); 
        ?>
        <?php if(has_category(37)): ?>
          <a href="<?php the_permalink() ?>">
            <div class="projects__project project__insight project__thumbnail <?php echo get_post_meta($masterPostID, 'highlight', true) ? 'projects__project__highlight' : '' ?>">
                <div class="project__insight__title__container">
                  <h4><?php the_title(); ?></h4>
                </div>
            </div>
          </a>
        <?php else: ?>
          <a href="<?php the_permalink() ?>">
            <div class="projects__project project__thumbnail <?php echo get_post_meta($masterPostID, 'highlight', true) ? 'projects__project__highlight' : '' ?>">
              <div>
                <?php echo the_post_thumbnail($masterPostID) ? the_post_thumbnail($masterPostID) : '<p>Bitte Bild hinzufügen</p>'; ?>
                <div class="projects__project__info project-hover-info">
                  <h4><?php echo the_title(); ?></h4>
                  <p><?php echo $post_description_short ?></p>
                <?php echo has_category(37); ?>
                </div>
              </div>
            </div>
          </a>
        <?php endif; ?>
      <?php endwhile;
        wp_reset_postdata();
      ?>
    </div>
  </div>
<?php endwhile; ?>


<?php


  get_footer();

?>
