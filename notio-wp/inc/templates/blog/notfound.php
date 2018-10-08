<div class="not-found full-height-content">
		<?php if( is_search()) { ?>
			<h4><?php esc_html_e( 'Sorry, but no posts match your search criteria.', 'notio' ); ?></h4>
		<?php } else { ?>
			<h4><?php esc_html_e( 'Please add posts from your WordPress admin page.', 'notio' ); ?></h4>
		<?php } ?>
		<a href="<?php echo esc_url(home_url('/')); ?>" class="btn large"><?php esc_html_e( 'Back to Home Page', 'notio' ); ?></a>
</div>