<?php
/*-----------------------------------------------------------------------------------*/
/*  Begin processing our comments
/*-----------------------------------------------------------------------------------*/
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<?php if ( have_comments() ) : ?>
		<div class="row max_width">
			<div class="small-12 medium-10 large-8 medium-centered columns">
				<h4 class="comments-title">
					<?php
						printf( _nx( '%1$s Comment', '%1$s Comments', get_comments_number(), 'comments', 'notio' ),
							number_format_i18n( get_comments_number() ) );
					?>
				</h4>
				<div class="text-center"><a href="#reply-title"><?php _e('LEAVE A REPLY', 'notio'); ?></a></div>
				<ul class="commentlist">
					<?php wp_list_comments(
						array(
							'type'		  => 'comment',
							'style'       => 'ul',
							'short_ping'  => true,
							'avatar_size' => 130
						)
					); ?>
				</ul>

				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
					<div class="navigation">
						<div class="nav-previous"><?php previous_comments_link(); ?></div>
						<div class="nav-next"><?php next_comments_link(); ?></div>
					</div><!-- .navigation -->
				<?php } ?>
			</div>
		</div>
<?php else : 
	if ( ! comments_open() ) :
?>
	<p class="nocomments"><?php _e("Comments are closed", 'notio'); ?></p>
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<div class="row">
	<div class="small-12 medium-10 large-8 medium-centered columns <?php echo esc_attr(get_comments_number() === '0' ? 'no-border' : ''); ?>">
<?php
	// Comment Form
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? ' aria-required="true" data-required="true"' : '' );
	
	$defaults = array( 'fields' => apply_filters( 'comment_form_default_fields', array(
	
		'author' => '<div class="row"><div class="small-12 medium-6 columns"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' class="placeholder" placeholder="' . __( 'Name', 'notio' ) . '"/></div>',
		
		'email'  => '<div class="small-12 medium-6 columns"><input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' class="placeholder" placeholder="' . __( 'Email', 'notio' ) . '" /></div>',
		
		'url'    => '<div class="small-12 columns"><input name="url" size="30" id="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" type="text" class="placeholder" placeholder="' . __( 'Website', 'notio' ) . '"/></div></div>' ) ),
		
		'comment_field' => '<div class="row"><div class="small-12 columns"><textarea name="comment" id="comment"' . $aria_req . ' rows="10" cols="58" class="placeholder" placeholder="' . __( 'Your Comment', 'notio' ) . '"></textarea></div></div>',
		
		'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'notio' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		
		'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'notio' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'id_form' => 'form-comment',
		'id_submit' => 'submit',
		'title_reply' => __( 'Leave a Reply', 'notio' ),
		'title_reply_to' => __( 'Leave a Reply to %s', 'notio' ),
		'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title">',
		'title_reply_after' => '</h4>',
		'cancel_reply_link' => __( 'Cancel reply', 'notio' ),
		'class_submit' => 'submit btn',
		'label_submit' => __( 'Submit Comment', 'notio' ),
	); 
comment_form($defaults); 

?>
	</div>
</div>