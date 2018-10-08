<?php /* Template Name: Concept 360 - Insights */ ?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
  <div class="insights projects projects__insights row">
    <?php $catquery = new WP_Query( 'type=post&cat=37' ); ?>
    <div class="projects__project-container">
      <?php while($catquery->have_posts()) : $catquery->the_post(); ?>
        <?php 
          $image_id = get_post_meta($post->ID, 'project_image-main', true);
          $image_url = wp_get_attachment_image_src( $image_id )[0];
          $post_description = get_post_meta($post->ID, 'project_description', true);
          $post_description_length = strlen($post_description);
          $post_description_short = $post_description_length > 80 ? substr($post_description, 0, 80) . "..." : $post_description; 
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
                <img src="<?php echo $image_url ?>" alt="">
                <div class="projects__project__info project-hover-info">
                  <h3><?php echo the_title(); ?></h3>
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




<div class="row">
  <div class="small-12 columns">
    <p>
      <?php // echo get_meta($page->ID, 'home_video', true); ?>
    </p>
    <div class="post-content no-vc">
      <?php the_content();?>
    </div>
  </div>
</div>

<?php


  get_footer();

?>
