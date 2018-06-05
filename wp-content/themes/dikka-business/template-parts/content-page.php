<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dikka Business
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-container">
		<div class="entry-content">
	    <?php
		  /**
		   * Hook - dikka_business_single_image.
		   *
		   * @hooked dikka_business_add_image_in_single_display -  10
		   */
		  do_action( 'dikka_business_single_image' );
		?>
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dikka-business' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</div><!-- .entry-container -->

	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'dikka-business' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

