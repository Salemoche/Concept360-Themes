<?php
	$vars = $wp_query->query_vars;
	$thb_i = array_key_exists('thb_i', $vars) ? $vars['thb_i'] : false;
	$color = ($thb_i % 2 != 0) ? ' alternate' : '';
?>
<article itemscope itemtype="http://schema.org/BlogPosting" <?php post_class('post row full-width-row no-padding blog-style5 ' . $color); ?> id="post-<?php the_ID(); ?>" data-i="<?php echo esc_attr($thb_i); ?>">
	<div class="small-12 medium-4 columns">
		<?php if ( has_post_thumbnail() ) { ?>
		<?php 
			$image_id = get_post_thumbnail_id(); 
			$image_url = wp_get_attachment_image_src($image_id, 'full'); 
		?>
		<figure class="post-gallery" style="background-image: url(<?php echo esc_html($image_url[0]); ?>);">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
		</figure>
		<?php } ?>
	</div>
	<div class="small-12 medium-8 columns">
		<div class="inner-padding">
			<header class="post-title">
				<?php get_template_part( 'inc/templates/postbits/post-meta' ); ?>
				<h3 itemprop="headline"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
			</header>
			<div class="post-content">
				<?php the_excerpt(); ?>
				<a href="<?php the_permalink(); ?>" class="more-link"><?php _e( 'Read More', 'notio' ); ?></a>
			</div>
		</div>
	</div>
	<?php do_action( 'thb_PostMeta' ); ?>
</article>