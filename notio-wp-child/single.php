<?php get_header(); ?>
<?php
  $posttags = get_the_tags();
?>
<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
<?php 
  $image_id = get_post_meta($post->ID, 'project_image-main', true);
  $image_url = wp_get_attachment_image_src( $image_id )[0];
?>
  <div class="project row">
    <div class="project__content columns medium-8 small-12 collapse">
      <div class="project__content__image">
        <img src="<?php if($image_url) echo $image_url ?>" alt="" srcset="">
      </div>
      <?php the_content(); ?>
    </div>
    <div class="project__info columns small-12 medium-4">
      <div class="project__info__breadcrumbs concept-breadcrumbs">
        <?php if (function_exists('nav_breadcrumb')) nav_breadcrumb(); ?>
      </div>
      <div class="project__info__title">
        <h2><?php the_title(); ?></h2>
      </div>
      <div class="project__info__description">
        <p><?php if(get_post_meta($post->ID, 'project_description', true)) echo get_post_meta($post->ID, 'project_description', true); ?>  </p>
      </div>
      <div class="project__info__tags">
        <?php
          if ($posttags) {
            foreach($posttags as $tag) {
              echo '<div class="project__info__tags__tag">' . $tag->name . '</div>';
            }
          }
        ?>
      </div>
      <?php if(get_post_meta($post->ID, 'project_information', true)): ?>
        <div class="project__info__more-info">
          <?php echo get_post_meta($post->ID, 'project_information', true); ?>
        </div>
      <?php endif; ?>
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
    <div class="project__images columns small-12">
    <?php
    //Get the images ids from the post_metadata
    $images = acf_photo_gallery('project_images', $post->ID) ? acf_photo_gallery('project_images', $post->ID) : '';
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
      <div class="project__image">
        <?php if( !empty($url) ){ ?><a href="<?php echo $full_image_url; ?>" <?php echo ($target == 'true' )? 'target="_blank"': ''; ?>><?php } ?>
        <a href="<?php echo $full_image_url; ?>" class="foobox" rel="concept-gallery">
          <img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>">
        </a>
          <?php if( !empty($url) ){ ?></a><?php } ?>
      </div>
    <?php endforeach; endif; ?>
    </div>
    <!-- <div class="project__related-projects columns small-12">
      <h4>Ähnliche Projekte</h4>
    </div> -->
  </div>
<?php endwhile; else : endif; ?>
<?php get_footer(); ?>
