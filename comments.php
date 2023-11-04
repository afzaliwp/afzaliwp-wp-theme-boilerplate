<?php
/**
 * The template for displaying comments
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$afzaliwp_bp_comment_count = get_comments_number();
			if ( '1' === $afzaliwp_bp_comment_count ) {
				printf(
				/* translators: 1: title. */
					esc_html__( 'One thought on “%1$s”', 'afzaliwp-bp' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf(
				/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on “%2$s”', '%1$s thoughts on “%2$s”', $afzaliwp_bp_comment_count, 'comments title', 'afzaliwp-bp' ) ),
					number_format_i18n( $afzaliwp_bp_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'afzaliwp-bp' ); ?></p>
		<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>

</div><!-- #comments -->
