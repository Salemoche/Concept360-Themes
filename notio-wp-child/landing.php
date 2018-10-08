<?php /* Template Name: Concept 360 - Landing */ ?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
  <div class="landing row">
    <div class="landing__landing columns small-12">
      <div class="landing__landing__video">
        <?php the_content(); // the_field('landing_video'); ?>
        <h1>*VIDEO*</h1>
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
        function wpb_rand_posts() { 
  
          $args = array(
              'post_type' => 'post',
              'orderby'   => 'rand',
              'posts_per_page' => 5, 
              );
          
          $the_query = new WP_Query( $args );
          
          if ( $the_query->have_posts() ) {
          
          $string .= '<ul>';
              while ( $the_query->have_posts() ) {
                  $the_query->the_post();
                  $string .= '<li><a href="'. get_permalink() .'">'. get_the_title() .'</a></li>';
              }
              $string .= '</ul>';
              /* Restore original Post Data */
              wp_reset_postdata();
          } else {
          
          $string .= 'no posts found';
          }
          
          return $string; 
          } 
          
          add_shortcode('wpb-random-posts','wpb_rand_posts');
          add_filter('widget_text', 'do_shortcode'); 
      ?>
    </div>
    <div class="landing__customers columns small-12 row">
        <h3><?php echo get_post_meta($post->ID, 'landing_customers_title', true); ?></h3>
        <p><?php echo get_post_meta($post->ID, 'landing_customers_text', true); ?></p>
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
          <div class="landing__customers__item columns small-6 medium-2">
            <div class="thumbnail">
              <?php if( !empty($url) ){ ?><a href="<?php echo $url; ?>" <?php echo ($target == 'true' )? 'target="_blank"': ''; ?>><?php } ?>
                <img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>">
              <?php if( !empty($url) ){ ?></a><?php } ?>
            </div>
          </div>
      <?php endforeach; endif; ?>
    </div>
  </div>
<?php endwhile; ?>


<?php


  get_footer();

?>
