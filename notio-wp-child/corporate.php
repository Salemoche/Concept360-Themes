<?php /* Template Name: Concept 360 - Corporate */ ?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
  <div class="corporate projects projects__corporate row">
  
    <?php $catquery = new WP_Query( 'type=post&cat=35&posts_per_page=-1' ); ?>
    <div class="projects__project-container">
      <?php while($catquery->have_posts()) : $catquery->the_post(); ?>
        <?php 
          // $image_id = get_post_thumbnail_id($post->ID);
          // $image_url = get_post_thumbnail_url( $post->ID);
          $post_description = get_post_meta($post->ID, 'project_description', true);
          $post_description_length = strlen($post_description);
          $post_description_short = get_post_meta($post->ID, 'project_teaser', true); 
        ?>
        <?php if(has_category(37)): ?>
          <div class="projects__project project__insight project__thumbnail <?php echo get_post_meta($post->ID, 'highlight', true) ? 'projects__project__highlight' : '' ?>">
            <a href="<?php the_permalink() ?>">
              <div>
                <h3><?php the_title(); ?></h3>
              </div>
            </a>
          </div>
        <?php else: ?>
          <div class="projects__project project__thumbnail <?php echo get_post_meta($post->ID, 'highlight', true) ? 'projects__project__highlight' : '' ?>">
            <a href="<?php the_permalink() ?>">
              <div>
                <?php echo the_post_thumbnail($post->ID) ? the_post_thumbnail($post->ID) : '<p>Bitte Bild hinzufügen</p>'; ?>
                <div class="projects__project__info project-hover-info">
                  <h3><?php echo esc_html_e(the_title()); ?></h3>
                  <p><?php echo $post_description_short ?></p>
                <?php echo has_category(37); ?>
                </div>
              </div>
            </a>
          </div>
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
