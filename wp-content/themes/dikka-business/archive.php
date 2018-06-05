<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dikka Business
 */

get_header(); ?>

<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="blog-archive-wrapper">
				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );
						?>

					<?php endwhile; ?>

				<?php
				/**
				 * Hook - dikka_business_action_posts_navigation.
				 *
				 * @hooked: dikka_business_custom_posts_navigation - 10
				 */
				do_action( 'dikka_business_action_posts_navigation' ); ?>


				<?php else : ?>

					<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; ?>
			</div><!-- .blog-archive-wrapper -->
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
		/**
		 * Hook - dikka_business_action_sidebar.
		 *
		 * @hooked: dikka_business_add_sidebar - 10
		 */
		do_action( 'dikka_business_action_sidebar' );
	?>
</div><!-- .container -->

<?php get_footer(); ?>
