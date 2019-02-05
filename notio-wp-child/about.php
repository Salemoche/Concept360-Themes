<?php /* Template Name: Concept 360 - About */ ?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

  <div class="row about">
    <div class="columns small-12 medium-8 about__content row">
      <div class="about__content__image 360-main-image">
        <img src="<?php echo wp_get_attachment_image_src( get_post_meta($post->ID, 'about_main-image', true), 'large' )[0]; ?>" alt="">
      </div>
      <div class="columns small-6 about__content__contact-info about__content__contact-info__title about__content__contact-info--medium">
        <div class="about__content__breadcrumbs concept-breadcrumbs">
          <nav class="breadcrumb">
            <!-- <a href="< ?php get_home_url();?>">Home</a>
            <span>/</span> -->
            <a href="<?php get_permalink();?>"><?php the_title();?></a>
          </nav>
        </div>
        <h2><?php the_title(); ?></h2>
      </div>
      <div class="columns small-12 medium-6 about__content__contact-info about__content__contact-info--medium">
        <h3><?php echo get_post_meta(779, 'footer_call_mail', true); ?></h3>
        <a href="mailto:<?php echo get_post_meta(779, 'settings_email', true); ?>"><p><?php echo get_post_meta(779, 'settings_email', true); ?></p></a>
        <h3><?php echo get_post_meta(779, 'footer_call_phone', true); ?></h3>
        <a href="tel:<?php echo get_post_meta(779, 'settings_telephone-number', true); ?>"><p><?php echo get_post_meta(779, 'settings_telephone-number', true); ?></p></a>
        <h3><?php echo get_post_meta(779, 'footer_call_address', true); ?></h3>
        <a href="https://www.google.ch/maps/dir//Regensbergstrasse+126,+8050+Z%C3%BCrich/@47.4077905,8.5416099,17z/data=!3m1!4b1!4m17!1m7!3m6!1s0x47900a8707c34b13:0xbaae1f04d467f11f!2sRegensbergstrasse+126,+8050+Z%C3%BCrich!3b1!8m2!3d47.4077905!4d8.5437986!4m8!1m0!1m5!1m1!1s0x47900a8707c34b13:0xbaae1f04d467f11f!2m2!1d8.5437986!2d47.4077905!3e1" target="_blank"><p><?php echo get_post_meta(779, 'settings_address', true); ?></p></a>	
      </div>
      <div class="about__content__text columns small-12">
        <?php the_content(); ?>
      </div>
    </div>
    <div class="columns small-4 about__content__contact-info about__content__contact-info--large">
      <div class="about__content__breadcrumbs concept-breadcrumbs">
          <nav class="breadcrumb">
            <!-- <a href="< ?php get_home_url();?>">Home</a>
            <span>/</span> -->
            <a href="<?php get_permalink();?>"><?php the_title();?></a>
          </nav>
      </div>
      <h1><?php the_title(); ?></h1>
      <h3><?php echo get_post_meta(779, 'footer_call_mail', true); ?></h3>
      <a href="mailto:<?php echo get_post_meta(779, 'settings_email', true); ?>"><p><?php echo get_post_meta(779, 'settings_email', true); ?></p></a>
      <h3><?php echo get_post_meta(779, 'footer_call_phone', true); ?></h3>
      <a href="tel:<?php echo get_post_meta(779, 'settings_telephone-number', true); ?>"><p><?php echo get_post_meta(779, 'settings_telephone-number', true); ?></p></a>
      <h3><?php echo get_post_meta(779, 'footer_call_address', true); ?></h3>
      <a href="https://www.google.ch/maps/dir//Regensbergstrasse+126,+8050+Z%C3%BCrich/@47.4077905,8.5416099,17z/data=!3m1!4b1!4m17!1m7!3m6!1s0x47900a8707c34b13:0xbaae1f04d467f11f!2sRegensbergstrasse+126,+8050+Z%C3%BCrich!3b1!8m2!3d47.4077905!4d8.5437986!4m8!1m0!1m5!1m1!1s0x47900a8707c34b13:0xbaae1f04d467f11f!2m2!1d8.5437986!2d47.4077905!3e1" target="_blank"><p><?php echo get_post_meta(779, 'settings_address', true); ?></p></a>	
    </div>
  </div>
  <div class="row team-member__container">
  <h3 class="columns small-12"><?php echo get_post_meta($post->ID, 'about-team_subtitle', true); ?></h3>
    <?php
    if( have_rows('team-member') ): 

      while ( have_rows('team-member') ) : the_row();
    
    ?>
        <?php if(get_sub_field('team-member_link')) :?>
        <a class="columns small-6 medium-4 team-member" href="<?php the_sub_field('team-member_link'); ?>">
          <div>
        <?php else : ?>
        <div class="columns small-6 medium-4 team-member">
        <?php endif; ?>
            <img src=" <?php the_sub_field('team-member_foto'); ?>" alt="">
            <div class="team-member-hover-info">
              <div class="team-member-hover-info__aligner">
                <h4><?php the_sub_field('team-member_name'); ?></h4>
                <p><?php the_sub_field('team-member_position'); ?></p>
              </div>
            </div>
          </div>
        <?php echo get_sub_field('team-member_link') ? '</a>' : ''; ?>

    <?php 

      endwhile;
    endif;
    ?>
  </div>

<div class="row quotes">
  <h3><?php echo get_post_meta($post->ID, 'quotes_subtitle', true); ?></h3>
  
  <div class="about__quote__container columns small-12 quote__container">

    <?php
    if( have_rows('quotes') ): 

      while ( have_rows('quotes') ) : the_row();
    
    ?>
      <a href="<?php the_sub_field('quote_link'); ?>" class="about__quote quote">
        <div >
          <h5><?php the_sub_field('quote_quote'); ?></h5>
          <p><?php the_sub_field('quote_name'); ?></p>
          <p><?php the_sub_field('quote_details'); ?></p>
        </div>
      </a>

    <?php 

      endwhile;
    endif;
    ?>
  </div>
</div>

<div class="row press">
  <h3><?php echo get_post_meta($post->ID, 'press_subtitle', true); ?></h3>
  
  <div class="about__press__container columns small-12 press__container">

    <?php
    if( have_rows('press') ): 

      while ( have_rows('press') ) : the_row();
    
    ?>
        
        <a href="<?php the_sub_field('press_link'); ?>">
          <div class="about__press press">
            <div class="press__logo__container">
              <?php if (get_sub_field('logo-hover') == true) : ?>
                <div class="about__press__logo press__logo  press__logo--regular" style="background-image: url( <?php the_sub_field('press_logo'); ?>);"></div>
                <div class="about__press__logo press__logo press__logo--hover" style="background-image: url( <?php the_sub_field('logo-hover'); ?>);"></div> 
              <?php else : ?>
                <div class="about__press__logo press__logo  press__logo--regular" style="background-image: url( <?php the_sub_field('press_logo'); ?>);"></div>
                <div class="about__press__logo press__logo press__logo--hover" style="background-image: url( <?php the_sub_field('press_logo'); ?>);"></div> 
              <?php endif ?>
            </div>
              <!-- <img src="" alt=""> -->
            <p class="about__press__article"><?php the_sub_field('press_article'); ?></p>
            <p><?php the_sub_field('press_details'); ?></p>
          </div>
        </a>

    <?php 

      endwhile;
    endif;
    ?>
  </div>
</div>

  
<div class="footer-spacer"></div>


<?php endwhile; ?>

<?php


  get_footer();

?>
