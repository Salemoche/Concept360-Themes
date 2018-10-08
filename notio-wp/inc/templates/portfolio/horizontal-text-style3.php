<?php
	$vars = $wp_query->query_vars;
	$thb_color = array_key_exists('thb_color', $vars) ? $vars['thb_color'] : false;
	$class[] = 'portfolio-text-style3';
	$class[] = $thb_color;
	$class[] = 'type-portfolio';
?>
<a <?php post_class($class); ?> href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	<h2><?php the_title(); ?></h2>
</a>