<?php get_header(); ?>
<?php
  $posttags = get_the_tags();
?>
<?php 
  $image_id = get_post_meta($post->ID, 'project_image-main', true);
  $image_url = wp_get_attachment_image_src( $image_id, 'large'  )[0];
?>
  <div class="project row <?php echo has_category(37) ? 'project__insight' : '';?>">
    <!-- <div class="project__content columns medium-8 small-12 collapse"> -->
      <div class="project__content__image columns medium-8 small-12 360-main-image">
        <div id="iframe0"  style="display: none;">
          <?php echo get_field('iframe'); ?>
        </div>
        <a href="#iframe0" target="foobox" class="foobox" rel="concept-gallery">
          <?php echo the_post_thumbnail( 'medium_large' ); ?>
          <div class="project__content__image__play-button"></div>
        </a>
        <?php //the_content(); // the_field('home_video'); ?>
      </div>
      
      <div class="project__info project__info columns small-12 medium-4 ">
        <div class="project__info__breadcrumbs concept-breadcrumbs">
          <nav class="breadcrumb">
            <a href="<?php echo get_permalink(686);?>">Projekte</a>
            <span>/</span>
            <?php if(has_category(35)) : ?>
              <a href="<?php echo get_permalink(684);?>"><?php echo get_cat_name(35); ?></a>
            <?php elseif(has_category(37)) : ?>
              <a href="<?php echo get_permalink(704);?>"><?php echo get_cat_name(37); ?></a>
            <?php elseif(has_category(42)) : ?>
              <a href="<?php echo get_permalink(702);?>"><?php echo get_cat_name(42); ?></a>
            <?php endif; ?>
            <!-- <a href="< ?php get_permalink();?>"><?php the_title();?></a> -->
          </nav>
        </div>
        <div class="project__info__spacer">
          <div class="project__info__title">
            <h3><?php the_title(); ?></h3>
          </div>
          <div class="project__info__description">
            <p><?php if(get_post_meta($post->ID, 'project_description', true)) echo get_post_meta($post->ID, 'project_description', true); ?>  </p>
          </div>
          <div class="project__info__tags">
            <?php
              if ($posttags) {
                foreach($posttags as $tag) {
                  echo '<a href="' . get_home_url() . '/?s='. $tag->name . '" ><div class="project__info__tags__tag tag hover">' . $tag->name . '</div></a>';
                }
              }
            ?>
          </div>
        </div>
        <div class="project__info__quotes">
          <?php
            $quotes = get_post_meta($post->ID, 'project_quote', true);
            if(get_post_meta($post->ID, 'project_quote', true)):
              foreach ($quotes as $quote):
            ?>
            <p> <?php echo get_post_meta($post->ID, 'project_quote', true); ?></p>
          <?php endforeach; endif; ?>
        </div>
      </div>
      <div class="project__content__content columns small-12">
        <?php the_content(); ?>
      </div>
    <!-- </div> -->
    
    <div class="project__images columns small-12">
    <?php
      if( have_rows('project_media') ): 

        while ( have_rows('project_media') ) : the_row();
        ?>
          <div class="project__image">
            <?php $video_id = get_row_index(); ?>  
            <div class="hidden-iframe" id="iframe<?php echo $video_id; ?>"  style="display: none;">
              <?php the_sub_field('iframe_gallery'); ?>
            </div>
            <a href="#iframe<?php echo $video_id; ?>" target="foobox" class="foobox" rel="concept-gallery">
              <img src="<?php the_sub_field('iframe_gallery_image'); ?>" alt="">
              <div class="project__image__play-button"></div>
            </a>
          </div>
      <?php 
        endwhile;
      endif;
      $images = acf_photo_gallery('project_images', $post->ID) ? acf_photo_gallery('project_images', $post->ID) : '';
      //Check if return array has anything in it
      if( $images && count($images) ):
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
        <div class="project__image">
          <?php if( !empty($url) ){ ?><a href="<?php echo $full_image_url; ?>" <?php echo ($target == 'true' )? 'target="_blank"': ''; ?>><?php } ?>
          <a href="<?php echo $full_image_url; ?>" rel="concept-gallery">
            <img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>">
          </a>
            <?php if( !empty($url) ){ ?></a><?php } ?>
        </div>
      <?php endforeach; endif; ?>
    </div>
    <div class="project__related-projects row columns small-12">
      <h4><?php esc_html_e("Weitere Projekte"); ?></h4>
      <?php
      $tags = wp_get_post_terms( get_queried_object_id(), 'post_tag', ['fields' => 'ids'] );
      // $args = [
      //     'post__not_in'        => array( get_queried_object_id() ),
      //     'posts_per_page'      => 5,
      //     'ignore_sticky_posts' => 1,
      //     'orderby'             => 'rand',
      //     'tax_query' => [
      //         [
      //             'taxonomy' => 'post_tag',
      //             'terms'    => $tags
      //         ]
      //     ]
      // ];

      $args = [
          'post__not_in'        => array($post->ID),
          'orderby'             => 'rand',
          'posts_per_page'      => 3,
          'tax_query' => [
              [
                  'taxonomy' => 'post_tag',
                  'terms'    => $tags
              ]
          ]
      ];

      $my_query = new wp_query( $args );
      if( $my_query->have_posts() ) {
              while( $my_query->have_posts() ) {
                $my_query->the_post(); ?>
                  <div class="columns small-12 medium-4 projects__project project__thumbnail <?php echo get_post_meta($randPost->ID, 'highlight', true) ? 'projects__project__highlight' : '' ?>">
                    <a href="<?php the_permalink() ?>">
                      <div class="projects__project__info__container">
                      <?php echo the_post_thumbnail( 'large' ); ?>
                        <div class="projects__project__info project-hover-info">
                          <div class="project-hover-info__aligner">
                            <h3><?php echo the_title(); ?></h3>
                            <p><?php echo get_field('project_teaser') ?></p>
                          </div>
                        <?php echo has_category(37); ?>
                        </div>
                      </div>
                    </a>
                  </div>
              <?php }
              wp_reset_postdata();
      } else {
        echo '<p>Nothing found</p>';
      }
      ?> 
    </div>
  </div>
  <div class="footer-spacer"></div>
<?php //endwhile; else : endif; ?>
<?php get_footer(); ?>
