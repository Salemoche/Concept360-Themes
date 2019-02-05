<?php get_header(); ?>
<?php 

	$blog_style = (isset($_GET['blog_style']) ? htmlspecialchars($_GET['blog_style']) : ot_get_option('blog_style', 'style1')); 
	//get_template_part( 'inc/templates/blog/'.$blog_style ); 
?>

<?php $blog_pagination_style = is_home() ? ot_get_option('blog_pagination_style', 'style1') : 'style1'; ?>
<div class="search-results row">
<?php 
    if (have_posts()) :  while (have_posts()) : the_post();
 
        $image_id = get_post_meta($post->ID, 'project_image-main', true);
        $image_url = wp_get_attachment_image_src( $image_id, 'large'  )[0];
        $post_description = get_post_meta($post->ID, 'project_description', true);
        $post_description_length = strlen($post_description);
        $post_description_short = get_post_meta($post->ID, 'project_teaser', true); 
    ?>
    <?php if(has_category(37)): ?>
        <!-- <div class="search-results__project project__insight project__thumbnail <?php echo get_post_meta($post->ID, 'highlight', true) ? 'projects__project__highlight' : '' ?>">
        <a href="<?php //the_permalink() ?>">
            <div>
            <h3><?php// the_title(); ?></h3>
            </div>
        </a>
        </div> -->
    <?php else: ?>
        <div class="search-results__project project__thumbnail <?php echo get_post_meta($post->ID, 'highlight', true) ? 'projects__project__highlight' : '' ?>">
        <h5><?php echo $image_url ?></h5>
        <a href="<?php the_permalink() ?>">
            <div>
                <?php echo the_post_thumbnail($post->ID) ? the_post_thumbnail($post->ID) : '<p>Bitte Bild hinzufügen</p>'; ?>
                <div class="search-results__project__info project-hover-info">
                    <h4><?php echo the_title(); ?></h4>
                    <p><?php echo $post_description_short ?></p>
                <?php echo has_category(37); ?>
                </div>
            </div>
        </a>
        </div>
    <?php endif; endwhile; else : ?>
        <div class="not-found full-height-content">
            <?php if( is_search()) { ?>
                <h4><?php esc_html_e( 'Leider hat Ihre Suche keine Ergebnisse geliefert', 'notio' ); ?></h4>
            <?php } else { ?>
                <h4><?php esc_html_e( 'Bitte fügen Sie Posts von Ihrem Wordpress Admin hinzu.', 'notio' ); ?></h4>
            <?php } ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn large"><?php esc_html_e( 'Zurück zur Home Page', 'notio' ); ?></a>
        </div>
    <?php endif; 
    ?>
</div>
<?php do_action('thb_blog_pagination'); ?>


<?php get_footer(); ?>