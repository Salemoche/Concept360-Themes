<?php $blog_pagination_style = is_home() ? ot_get_option('blog_pagination_style', 'style1') : 'style1'; ?>
<section class="blog-section <?php echo esc_attr('pagination-'.$blog_pagination_style); ?>" data-count="<?php echo esc_attr(get_option('posts_per_page')); ?>">
  <?php 
  	if (have_posts()) :  while (have_posts()) : the_post();
			get_template_part( 'inc/templates/blogbit/style1' ); 
  	endwhile; else :
    	get_template_part( 'inc/templates/blog/notfound' ); 
  	endif; 
  ?>
</section>
<?php do_action('thb_blog_pagination'); ?>