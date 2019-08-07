<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package seed
 */

/*
 * Disabled by SeedThemes. We don't recommend using WordPress comments.
 */
if ($GLOBALS['s_wp_comments'] != 'enable') {
	return;
}

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
	if ( have_comments() ) : ?>
    <h2 class="comments-title">
        <?php esc_html_e( 'Comments', 'seed' ); ?>
    </h2><!-- .comments-title -->

    <?php the_comments_navigation(); ?>

    <ol class="comment-list">
        <?php
            wp_list_comments( array(
                'style'      => 'ol',
                'short_ping' => true,
            ) );
        ?>
    </ol>
    <?php 
	the_comments_navigation();
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() ) : 
	?>
    <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'seed' ); ?></p>
    <?php endif; ?>

    <?php endif; // Check for have_comments(). ?>

    <?php comment_form(); ?>

</div>