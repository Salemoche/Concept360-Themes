<?php get_header(); ?>
<?php 
	$VC = class_exists('WPBakeryVisualComposerAbstract'); 
?>
<?php if ( post_password_required() ) { ?>
	<?php get_template_part( 'inc/templates/blog/password' ); ?>
<?php } else if ($VC && !thb_is_woocommerce()) { ?>
	<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
			<?php if ( comments_open() || get_comments_number() ) : ?>
			<!-- Start #comments -->
			<?php comments_template('', true); ?>
			<!-- End #comments -->
			<?php endif; ?>
	<?php endwhile; else : endif; ?>
<?php } else if (thb_is_woocommerce()) { ?>
	<div <?php post_class('page-padding'); ?>>
		<div class="row">
			<div class="small-12 columns">
				<div class="post-content no-vc">
					<?php the_content();?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<?php get_footer(); ?>