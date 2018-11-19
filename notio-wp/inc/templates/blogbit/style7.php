<?php
	$vars = $wp_query->query_vars;
	$thb_columns = array_key_exists('thb_columns', $vars) ? $vars['thb_columns'] : 'small-12 medium-6 large-3';

	$format = get_post_format();
	$permalink = get_the_permalink();
	if ($format === 'link') {
		$permalink = get_post_meta(get_the_ID(), 'post_link', true);
	}
?>
<article itemscope itemtype="http://schema.org/Article" <?php post_class($thb_columns.' post blog-style7 columns'); ?> role="article">
	<figure class="post-gallery"><?php the_post_thumbnail('notio-general-x2'); ?></figure>
	<div class="blog-top">
		<header class="post-title entry-header">
			<?php get_template_part( 'inc/templates/postbits/post-meta' ); ?>
			<h3 itemprop="headline"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
		</header>
	</div>
	<div class="post-content">
		<a href="<?php the_permalink(); ?>" class="more-link"><?php _e( 'Read More', 'notio' ); ?></a>
	</div>
	<?php do_action( 'thb_PostMeta' ); ?>
</article>
