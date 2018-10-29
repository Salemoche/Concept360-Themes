<?php /* Template Name: Concept 360 - Landing */ ?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
  <div class="landing row">
    <div class="landing__landing columns small-12">
      <div class="landing__landing__video">
      <?php

      // get iframe HTML
      $iframe = get_field('landing_video');


      // use preg_match to find iframe src
      preg_match('/src="(.+?)"/', $iframe, $matches);
      $src = $matches[1];
      // $src .= 'vq=hd1080';


      // add extra params to iframe src
      $params = array(
          'controls'    => 0,
          'hd'        => 3,
          'autohide'    => 1,
          'autoplay' => 1,
          'mute' => 1
      );

      $new_src = add_query_arg($params, $src);

      $iframe = str_replace($src, $new_src, $iframe);


      // add extra attributes to iframe html
      $attributes = 'frameborder="2"';

      $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);


      // echo $iframe
      echo $iframe;

      ?>
      </div>
      <div class="landing__landing__text">
        <div class="landing__landing__text__title">
          <h2><?php echo get_post_meta($post->ID, 'landing_subtitle', true); ?></h2>
          <h1><?php echo get_post_meta($post->ID, 'landing_title', true); ?></h1>
        </div>
        <div class="landing__landing__text__project-category__container row">
          <div class="landing__landing__text__project-category landing__landing_project-category--projects columns small-4">
          <p><?php echo get_post_meta($post->ID, 'landing_showcase_text', true); ?></p>
          </div>
        </div>
        <div class="landing__landing__scroll">
          <?php echo get_field('landing_scroll'); ?>
          <div class="landing__landing__scroll__icon"></div>
        </div>
      </div>
    </div>
    <div class="columns small-12 landing__info row">
      
      <div class="columns small-12 medium-8 landing__info__main">
      <?php echo do_shortcode( '[rev_slider alias="landing"]' ); ?>
      <?php
        //Get the images ids from the post_metadata
        $images = acf_photo_gallery('landing_images', $post->ID);
        //Check if return array has anything in it
        if( count($images) && false==true ):
        //Cool, we got some data so now let's loop over it
        foreach($images as $image):
          $id = $image['id']; // The attachment id of the media
          $title = $image['title']; //The title
          $caption= $image['caption']; //The caption
          $full_image_url= $image['full_image_url']; //Full size image url
          // $full_image_url = acf_photo_gallery_resize_image($full_image_url, 262, 160); //Resized size to 262px width by 160px height image url
          $thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
          $url= $image['url']; //Goto any link when clicked
          $target= $image['target']; //Open normal or new tab
          $alt = get_field('photo_gallery_alt', $id); //Get the alt which is a extra field (See below how to add extra fields)
          $class = get_field('photo_gallery_class', $id); //Get the class which is a extra field (See below how to add extra fields)
      ?>
          <div class="landing__info__main__carousel">
            <div class="landing__info__main__carousel__item">
              <?php if( !empty($url) ){ ?><a href="<?php echo $url; ?>" <?php echo ($target == 'true' )? 'target="_blank"': ''; ?>><?php } ?>
                <img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>">
              <?php if( !empty($url) ){ ?></a><?php } ?>
            </div>
          </div>
      <?php endforeach; endif; ?>
      <?php the_content(); ?>
      </div>
      <div class="columns small-12 medium-4 landing__info__information">
        <div class=" landing__info__information__breadcrumbs concept-breadcrumbs">
          <?php if (function_exists('nav_breadcrumb')) nav_breadcrumb(); ?>
        </div>
        <?php echo get_post_meta($post->ID, 'landing_information', true); ?>        
      </div>
    </div>
    <div class="landing__quote__container columns small-12 quote__container">
    <?php
    if( have_rows('quotes', 482) ): 

      while ( have_rows('quotes', 482) ) : the_row();
    
    ?>

        <div class="landing__quote quote">
          <h4><?php the_sub_field('quote_quote'); ?></h4>
          <p><?php the_sub_field('quote_name'); ?></p>
          <p><?php the_sub_field('quote_details'); ?></p>
        </div>

    <?php 

      endwhile;
    endif;
    ?>
    </div>
    <div class="landing__ueber-uns columns small-12">
      <div class="landing__ueber-uns__text">
        <h4><?php echo get_post_meta($post->ID, 'landing_about-us_title', true); ?></h4>
        <p><?php echo get_post_meta($post->ID, 'landing_about-us_text', true); ?></p>
      </div>
      <div class="landing__ueber-uns__info__container">
        <div class="landing__ueber-uns__info__item">
          <h5><?php echo get_post_meta($post->ID, 'landing_conception_title', true); ?></h5>
          <p><?php echo get_post_meta($post->ID, 'landing_conception_text', true); ?></p>
        </div>
        <div class="landing__ueber-uns__info__item">
          <h5><?php echo get_post_meta($post->ID, 'landing_production_title', true); ?></h5>
          <p><?php echo get_post_meta($post->ID, 'landing_production_text', true); ?></p>
        </div>
        <div class="landing__ueber-uns__info__item">
          <h5><?php echo get_post_meta($post->ID, 'landing_trainings_title', true); ?></h5>
          <p><?php echo get_post_meta($post->ID, 'landing_trainings_text', true); ?></p>
        </div>
      </div>
    </div>
    <div class="landing__random-projects columns small-12">
    <?php 

for ($i=0; $i < 3; $i++) { 
  $randIndex = rand(0, count(get_posts())-1); 
  $randPost = get_posts()[$randIndex];
  // echo $post->ID;
  // echo $post->title;
  $image_id = get_post_meta($randPost->ID, 'project_image-main', true);
  $image_url = wp_get_attachment_image_src( $image_id, 'large' )[0];
  $post_description = get_post_meta($randPost->ID, 'project_description', true);
  $post_description_length = strlen($post_description);
  $post_description_short = $post_description_length > 80 ? substr($post_description, 0, 80) . "..." : $post_description; 
?>
<?php if(has_category(37)): ?>
  <div class="projects__project project__insight project__thumbnail <?php echo get_post_meta($randPost->ID, 'highlight', true) ? 'projects__project__highlight' : '' ?>">
    <a href="<?php the_permalink($randPost->ID) ?>">
      <div class="projects__project__info__container">
        <h3><?php get_the_title($randPost->ID); ?></h3>
      </div>
    </a>
  </div>
<?php else: ?>
  <div class="projects__project project__thumbnail <?php echo get_post_meta($randPost->ID, 'highlight', true) ? 'projects__project__highlight' : '' ?>">
    <a href="<?php the_permalink($randPost->ID) ?>">
      <div class="projects__project__info__container">
        <?php echo get_the_post_thumbnail( $randPost->ID, 'medium_large' ); ?>
        <div class="projects__project__info project-hover-info">
          <h3><?php echo get_the_title($randPost->ID); ?></h3>
          <p><?php echo $post_description_short ?></p>
        <?php echo has_category(37); ?>
        </div>
      </div>
    </a>
  </div>
<?php endif; ?>
<?php
}
?>
    </div>
    

    
  </div>
<?php endwhile; ?>


<?php


  get_footer();

?>
