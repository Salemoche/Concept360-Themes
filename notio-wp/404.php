<?php get_header(); ?>
<section class="content404">
	<div class="row full-height-content align-middle">
		<div class="small-12 medium-10 medium-centered large-8 columns text-center">
			<figure></figure>
			<h1><?php _e( "Page cannot be found.", 'notio' ); ?></h1>
			<p><?php _e( "We are sorry. But the page you're looking for cannot be found. <br>
			You might try searching our site.", 'notio' ); ?></p>
			
			<div class="small-12 medium-6 medium-centered columns">
				<?php get_search_form(); ?> 
			</div>
			<a href="<?php esc_url(home_url('/')); ?>" class="btn"><?php _e('Back To Home', 'notio'); ?></a>
		</div>
	</div>
</section>
<?php get_footer(); ?>