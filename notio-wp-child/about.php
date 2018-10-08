<?php /* Template Name: Concept 360 - About */ ?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

  <div class="row about">
    <div class="columns small-8 about__content">
      <div class="about__content__image">
        <img src="<?php echo wp_get_attachment_image_src( get_post_meta($post->ID, 'about_main-image', true) )[0]; ?>" alt="">
      </div>
      <?php the_content(); ?>
    </div>
    <div class="columns small-4">
      <h2><?php the_title(); ?></h2>
      <h3><?php echo get_post_meta(779, 'footer_call_mail', true); ?></h3>
      <a href="mailto:<?php echo get_post_meta(779, 'settings_email', true); ?>"><p><?php echo get_post_meta(779, 'settings_email', true); ?></p></a>
      <h3><?php echo get_post_meta(779, 'footer_call_phone', true); ?></h3>
      <p><?php echo get_post_meta(779, 'settings_telephone-number', true); ?></p>
      <h4><?php echo get_post_meta(779, 'footer_call_address', true); ?></h4>
      <a href="https://www.google.ch/maps/dir//Regensbergstrasse+126,+8050+Z%C3%BCrich/@47.4077905,8.5416099,17z/data=!3m1!4b1!4m17!1m7!3m6!1s0x47900a8707c34b13:0xbaae1f04d467f11f!2sRegensbergstrasse+126,+8050+Z%C3%BCrich!3b1!8m2!3d47.4077905!4d8.5437986!4m8!1m0!1m5!1m1!1s0x47900a8707c34b13:0xbaae1f04d467f11f!2m2!1d8.5437986!2d47.4077905!3e1" target="_blank"><p><?php echo get_post_meta(779, 'settings_address', true); ?></p></a>
			
    </div>
  </div>
  <h2><?php echo get_post_meta($post->ID, 'about-team_subtitle', true); ?></h2>
  <div class="row team-member__container">
    <?php
    if( have_rows('team-member') ): 

      while ( have_rows('team-member') ) : the_row();
    
    ?>
        <div class="columns small-4 team-member">
          <img src=" <?php the_sub_field('team-member_foto'); ?>" alt="">
          <div class="team-member__info">
            <h3><?php the_sub_field('team-member_name'); ?></h3>
            <p><?php the_sub_field('team-member_position'); ?></p>
          </div>
        </div>

    <?php 

      endwhile;
    endif;
    ?>
  </div>
  
  <h2><?php echo get_post_meta($post->ID, 'about-team-freelance_subtitle', true); ?></h2>
  <div class="row team-member-freelance__container">
    <?php
    if( have_rows('team-member-freelance') ): 

      while ( have_rows('team-member-freelance') ) : the_row();
    
    ?>
        <div class="columns small-4 team-member-freelancer">
          <img src=" <?php the_sub_field('team-member-freelance_foto'); ?>" alt="">
          <div class="team-member__info">
            <h3><?php the_sub_field('team-member-freelance_name'); ?></h3>
            <p><?php the_sub_field('team-member-freelance_position'); ?></p>
          </div>
        </div>

    <?php 

      endwhile;
    endif;
    ?>
  </div>


<?php endwhile; ?>

<?php


  get_footer();

?>
