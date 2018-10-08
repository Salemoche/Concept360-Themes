<div class="small-6 large-3 columns">
	<div <?php post_class('post related-post'); ?>>
		<?php if ( has_post_thumbnail() ) { ?>
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>" class="post-image">
				<?php the_post_thumbnail('notio-small'); ?>
			</a>
		<?php } ?>
		<header class="post-title entry-header">
			<h6 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h6>
		</header>
	</div>
</div>