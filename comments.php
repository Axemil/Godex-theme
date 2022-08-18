<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package godex
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// $args = array(
	// 	'fields' => array(
	// 		'author' => '<p class="comment-form-author">
	// 			<label for="author">Your name</label>
	// 			<input id="author" placeholder="Name" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' />
	// 		</p>',
	// 		'email'  => '<p class="comment-form-email">
	// 			<label for="email">Your e-mail</label>
	// 			<input id="email" placeholder="E-mail" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' />
	// 		</p>',
	// 	),
	// 	'comment_notes_before' => '',
	// 	'title_reply' => 'Leave your comment',
	// 	'title_reply_to' => '',
	// 	'class_container' => 'comment_form_block',
	// 	'label_submit' => 'Your comment',
	// 	'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" placeholder="Your text" aria-required="true"></textarea></p>'
	// 	);
	// 	// comment_form_block
	// comment_form($args);
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<!-- <h2 class="comments-title">
			<?php
			$godex_comment_count = get_comments_number();
			if ( '1' === $godex_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'godex' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $godex_comment_count, 'comments title', 'godex' ) ),
					number_format_i18n( $godex_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2> -->

		<?php the_comments_navigation(); ?>

			<?php
			wp_list_comments(
				array(
					'callback' => 'better_comments',
					'style'      => 'comment_item',
					'short_ping' => true,
					'reply_text' => ''
				)
			);
			?>

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'godex' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().
	?>

</div><!-- #comments -->
