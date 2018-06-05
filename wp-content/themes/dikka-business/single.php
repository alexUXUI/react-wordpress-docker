<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Dikka Business
 */

get_header(); ?>

<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="single-post-wrapper">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'single' ); ?>

					<?php the_post_navigation(); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
						endif;
					?>

				<?php endwhile; // End of the loop. ?>
			</div><!-- .blog-posts -->
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
