<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aizen_theme
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php

	// You can start editing here -- including this comment!
	if (have_comments()) :
	?>
		<h2 class="comments-title">Comments</h2><!-- .comments-title -->

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
					'comments_per_page' => 1,
					'callback' => 'aizen_constructor_comment',
				)
			);
			?>
		</ol><!-- .comment-list -->
		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if (!comments_open()) :
		?>
			<p class="no-comments"><?php esc_html_e('Comments are closed.', 'aizen_constructor_comment'); ?></p>
	<?php
		endif;

	endif; // Check for have_comments().

	// add_filter('comment_form_default_fields', 'comment_form_default_add_my_fields');

	// // function comment_form_default_add_my_fields($fields)
	// // {

	// // 	unset($fields['cookies']);
	// // 	unset($fields['url']);

	// // 	return $fields;
	// // }

	$comments_args = array(
		// Change the title of send button 
		'label_submit' => __('Post Comment', 'textdomain'),
		'submit_button' => '<button name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" >Post Comment</button>',

		// Remove "Text or HTML to be displayed after the set of comment fields".
		'comment_notes_before' => '<div>Your email address will not be published</div>',

		// Redefine your own textarea (the comment body).
		'comment_field' => '<p class="comment-form-comment"><label for="comment">Comment</label><textarea id="comment" placeholder="Leave your reply" name="comment" aria-required="true"></textarea></p>',
		// Add Name and Email fields
		'fields' => array(
			'author' => '<p class="comment-form-author"><label for="author">Name</label><input id="author" name="author" type="text" placeholder="Enter your name" value="' . esc_attr($commenter['comment_author']) . '" required="required" /></p>',
			'email' => '<p class="comment-form-email"><label for="email">E-mail</label><input id="email" name="email" type="email" placeholder="Enter your e-mail" value="' . esc_attr($commenter['comment_author_email']) . '" required="required" /></p>',
		),


	);


	comment_form($comments_args);

	?>

</div><!-- #comments -->