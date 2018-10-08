<?php get_header(); ?>
<?php 
	$blog_style = (isset($_GET['blog_style']) ? htmlspecialchars($_GET['blog_style']) : ot_get_option('blog_style', 'style1')); 
	get_template_part( 'inc/templates/blog/'.$blog_style ); 
?>
<?php get_footer(); ?>