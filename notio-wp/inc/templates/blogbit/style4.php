<?php
	$vars = $wp_query->query_vars;
	$thb_i = array_key_exists('thb_i', $vars) ? $vars['thb_i'] : false;
?>
<article itemscope itemtype="http://schema.org/BlogPosting" <?php post_class('post row full-width-row full-height-content no-padding blog-style4'); ?> id="post-<?php the_ID(); ?>" data-i="<?php echo esc_attr($thb_i); ?>">
	<div class="small-12 small-order-1 medium-6<?php if ($thb_i % 2 != 0) { echo ' medium-push-6'; } ?> columns ">
		<?php if ( has_post_thumbnail() ) { ?>
		<figure class="post-gallery parallax">
			<?php 
				$image_id = get_post_thumbnail_id(); 
				$image_url = wp_get_attachment_image_src($image_id, 'full'); 
			?>
			<div class="parallax_bg" 
						data-top-bottom="transform: translate3d(0px, 10%, 0px);"
						data-bottom-top="transform: translate3d(0px, -10%, 0px);"
						style="background-image: url(<?php echo esc_html($image_url[0]); ?>);"></div>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
		</figure>
		<?php } ?>
	</div>
	<div class="small-12 small-order-2 medium-6<?php if ($thb_i % 2 != 0) { echo ' medium-pull-6'; } ?> columns content-side">
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