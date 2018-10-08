<?php
	$vars = $wp_query->query_vars;
?>
<article itemscope itemtype="http://schema.org/BlogPosting" <?php post_class('post blog-style6'); ?> id="post-<?php the_ID(); ?>">
	<div class="row align-middle no-padding">
		<div class="small-12 medium-3 columns">
			<span class="date"><?php echo get_the_date(); ?></span>
		</div>
		<header class="post-title columns">
			<h3 itemprop="headline"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
		</header>
		<div class="small-12 medium-2 large-1 columns text-right show-for-medium">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php get_template_part( 'assets/img/general-next.svg' ); ?></a>
		</div>
	</div>
	<?php do_action( 'thb_PostMeta' ); ?>
</article>