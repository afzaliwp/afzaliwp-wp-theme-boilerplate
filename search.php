<?php
/**
 * The template for displaying search results pages
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php _e( 'Search results for: ', 'afzaliwp-bp' ); ?>
						<span class="page-description"><?php echo get_search_query(); ?></span>
					</h1>
				</header><!-- .page-header -->

				<?php
				// Start the Loop.
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/post/content', 'excerpt' );

				endwhile;

			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'template-parts/post/content', 'none' );

			endif;
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
