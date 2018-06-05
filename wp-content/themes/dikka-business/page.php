<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dikka Business
 */

get_header(); 
if ( true === apply_filters( 'dikka_business_filter_frontpage_content_enable', true ) ) :
?>

	<div class="container">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
			
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'page' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
						endif;
					?>

				<?php endwhile; // End of the loop. ?>

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

<?php endif;

get_footer();
