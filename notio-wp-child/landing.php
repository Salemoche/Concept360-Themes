<?php /* Template Name: Concept 360 - Landing */ ?>

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
        <a href="#home__about__slider">
          <div class="home__landing__scroll">
            <?php echo get_field('home_scroll'); ?>
            <div class="home__landing__scroll__icon"></div>
          </div>
        </a>
      </div>
    </div>
    <div class="landing__content columns small-12 row" id="home__about__slider">
      <div class="landing__content__about--small columns small-12 medium-4">
        <div class="concept-breadcrumbs">
          <a href="<?php get_home_url(); ?>">Home</a>
        </div>
        <?php echo get_field('landing_text'); ?>
      </div>
      <div class="landing__content__left columns small-12 medium-8">
        <div class="landing__content__left__slider">
          <?php echo do_shortcode( '[rev_slider alias="landing"]' ); ?>
        </div>
        <div class="landing__content__left__content">
          <?php the_content(); ?>
        </div>
      </div>
      <div class="landing__content__right landing__content__about--large columns small-12 medium-4">
        <div class="concept-breadcrumbs">
          <a href="<?php get_home_url(); ?>">Home</a>
        </div>
        <?php echo get_field('landing_text'); ?>
      </div>
    </div>
    <div class="row quotes landing__quotes columns small-12">
      <h4><?php echo get_field('quotes_subtitle'); ?></h4>
      
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
      
      <h4><?php echo get_field('related_projects_title'); ?></h4>

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
  </div>
  <div class="footer-spacer"></div>

<?php


  get_footer();

?>
