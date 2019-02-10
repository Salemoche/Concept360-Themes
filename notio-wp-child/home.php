<?php /* Template Name: Concept 360 - Home */ ?>

<?php get_header(); ?>

  <div class="home row">
    <div class="home__landing columns small-12">
    <div class="home__landing__video">
        <?php if(wp_is_mobile()) : ?>
          <div class="home__landing__video__fallback" style="background-image:url('<?php echo get_field('home_video_fallback'); ?>');"></div>
        <?php //the_content(); // the_field('home_video'); ?>
        <?php else : ?>
        <?php

        // get iframe HTML
        $iframe = get_field('home_video');


        // use preg_match to find iframe src
        preg_match('/src="(.+?)"/', $iframe, $matches);
        $src = $matches[1];

		// Change width: height
        $iframe = preg_replace('/(width="\d+" height="\d+")/', 'width="auto" height="100%"', $iframe);
		
		

        // add extra params to iframe src
        $params = array(
            'controls'    => 0,
            'disablekb' => 1,
            'modestbranding' => 1,
            'hd'        => 3,
            'autohide'    => 1,
            'autoplay' => 1,
            'mute' => 1,
            'loop' => 1,
			      'playlist' => '65N0noy0aEI',
        );

        $new_src = add_query_arg($params, $src);

        $iframe = str_replace($src, $new_src, $iframe);


        // add extra attributes to iframe html
        $attributes = 'frameborder="2"';

        $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);


        echo $iframe

      ?>
      
      <!-- < ?php echo get_field('iframe');  ?> -->
      <?php endif; ?>
	  <!-- <iframe width="100%" height="100%" src="https://www.youtube.com/embed/65N0noy0aEI?autoplay=1&controls=0&disablekb=1&modestbranding=1&hd=1&autohide=1&mute=1&loop=1&playlist=65N0noy0aEI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
      </div>
      <div class="home__landing__text">
        <div class="home__landing__text__title">
          <h2><?php echo get_post_meta($post->ID, 'landing_subtitle', true); ?></h2>
          <h1><?php echo get_post_meta($post->ID, 'landing_title', true); ?></h1>
        </div>
        <div class="home__landing__text__project-category__container row">
          <div class="home__landing__text__project-category home__landing_project-category--projects columns small-4">
            <a href="<?php echo get_permalink(686)?>">
              <h5>Projekte</h5>
              <p><?php echo get_post_meta($post->ID, 'landing_projects_text', true); ?></p>
            </a>
          </div>
          <!--<div class="home__landing__text__project-category home__landing_project-category--insights columns small-4">
            <a href="https://showcase.concept360.ch/" target="_blank">
              <h3>Insights</h3>
              <p><?php echo get_post_meta($post->ID, 'landing_insights_text', true); ?></p>
            </a>
            </div>-->
          <!--<div class="home__landing__text__project-category home__landing_project-category--showcase columns small-4">
            <a href="<?php echo get_permalink(686)?>">
              <h3>Showcase</h3>
              <p><?php echo get_post_meta($post->ID, 'landing_showcase_text', true); ?></p>
            </a>
          </div>-->
        </div>
        <a href="#home__about__slider">
          <div class="home__landing__scroll">
            <?php echo get_field('home_scroll'); ?>
            <div class="home__landing__scroll__icon"></div>
          </div>
        </a>
      </div>
    </div>
    <div class="home__about__slider columns small-12" id="home__about__slider">
      <?php echo do_shortcode( '[rev_slider alias="home"]' ); ?>
    </div>
    <div class="home__ueber-uns columns small-12">
      <div class="home__ueber-uns__text">
        <h4><?php echo get_post_meta($post->ID, 'home_about-us_title', true); ?></h4>
        <p><?php echo get_post_meta($post->ID, 'home_about-us_text', true); ?></p>
      </div>
      <div class="home__ueber-uns__info__container">
        <div class="home__ueber-uns__info__item">
          <h5><a href="<?php the_permalink(500) ?>"><?php echo get_post_meta($post->ID, 'home_conception_title', true); ?></a></h5>
          <p><?php echo get_post_meta($post->ID, 'home_conception_text', true); ?></p>
        </div>
        <div class="home__ueber-uns__info__item">
          <h5><a href="<?php the_permalink(500) ?>"><?php echo get_post_meta($post->ID, 'home_production_title', true); ?></a></h5>
          <p><?php echo get_post_meta($post->ID, 'home_production_text', true); ?></p>
        </div>
        <div class="home__ueber-uns__info__item">
          <h5><a href="<?php the_permalink(500) ?>"><?php echo get_post_meta($post->ID, 'home_trainings_title', true); ?></a></h5>
          <p><?php echo get_post_meta($post->ID, 'home_trainings_text', true); ?></p>
        </div>
      </div>
    </div>
    <div class="home__random-projects columns small-12">

      <?php

        $i=0;
        $allPosts = array();

        while ($i < 3) { 
          $randIndex = rand(0, count(get_posts(array('suppress_filters' => false)))-1); 
          $randPost = get_posts(array('suppress_filters' => false))[$randIndex];
          $image_id = get_post_meta($randPost->ID, 'project_image-main', true);
          $image_url = wp_get_attachment_image_src( $image_id, 'large' )[0];
          $post_description = get_post_meta($randPost->ID, 'project_description', true);
          $post_description_length = strlen($post_description);
          $post_description_short = get_post_meta($randPost->ID, 'project_teaser', true); 
           
        
          $project_id = get_post_meta($randPost->ID, 'project_image-main', true);
        ?>

        
        <?php 
        if(in_array($randPost->ID, $allPosts)) {
        } else if(has_category('Insight', $randPost->ID)) {

        } else {      
          if(has_category(37)): ?>
            <div class="projects__project project__insight project__thumbnail">
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
                  <!-- <img src="<?php //echo $image_url ?>" alt=""> -->
                  <?php echo get_the_post_thumbnail( $randPost->ID, 'large' ); ?>
                  <div class="projects__project__info project-hover-info">
                    <div class="project-hover-info__aligner">
                      <h4><?php echo get_the_title($randPost->ID); ?></h4>
                      <p><?php echo $post_description_short ?></p>
                    </div>
                  <?php echo has_category(37); ?>
                  </div>
                </div>
              </a>
            </div>
          <?php endif; 
          
          $i = $i + 1;

        }

        array_push($allPosts, $randPost->ID);

        }
      ?>
    </div>
    <div class="home__customers columns small-12 row">
        <h3><?php echo get_post_meta($post->ID, 'home_customers_title', true); ?></h3>
        <p><?php echo get_post_meta($post->ID, 'home_customers_text', true); ?></p>
      <?php
        //Get the images ids from the post_metadata
        $images = acf_photo_gallery('customer_logos', $post->ID);
        //Check if return array has anything in it
        if( count($images) ):
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
          <div class="home__customers__item columns small-3 medium-2">
            <div class="thumbnail">
              <?php if( !empty($url) ){ ?><a href="<?php echo $url; ?>" <?php echo ($target == 'true' )? 'target="_blank"': ''; ?>><?php } ?>
                <img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>">
              <?php if( !empty($url) ){ ?></a><?php } ?>
            </div>
          </div>
      <?php endforeach; endif; ?>
    </div>
  </div>

<?php


  get_footer();

?>
