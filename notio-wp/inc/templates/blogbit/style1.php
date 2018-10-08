<article itemscope itemtype="http://schema.org/BlogPosting" <?php post_class('post blog-style1'); ?> id="post-<?php the_ID(); ?>">
	<?php if ( has_post_thumbnail() ) { ?>
		<figure class="post-gallery parallax">
			<?php 
				$image_id = get_post_thumbnail_id(); 
				$image_url = wp_get_attachment_image_src($image_id, 'full'); 
			?>
			<div class="parallax_bg" 
						data-top-bottom="transform: translate3d(0px, 20%, 0px);"
						data-bottom-top="transform: translate3d(0px, -20%, 0px);"
						style="background-image: url(<?php echo esc_html($image_url[0]); ?>);"></div>
		</figure>
	<?php } ?>
	<div class="row align-center">
		<div class="small-12 medium-10 large-8 columns">
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