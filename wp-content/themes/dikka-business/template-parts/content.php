<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dikka Business
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="featured-image">
		<?php if ( has_post_thumbnail() ) :  ?>
				<?php
				$archive_image           = dikka_business_get_option( 'archive_image' );
				$archive_image_alignment = dikka_business_get_option( 'archive_image_alignment' );
				?>
				<?php if ( 'disable' !== $archive_image ) : ?>
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( esc_attr( $archive_image ), array( 'class' => 'post-thumbnail' ) ); ?>
					</a>
				<?php endif; ?>

			<?php endif; ?>
	</div><!-- .featured-image -->

	<div class="entry-container">
		<?php if ( 'post' === get_post_type() ) : ?>
			<p class="entry-meta">
				<?php dikka_business_posted_on(); ?>
			</p><!-- .entry-meta -->
		<?php endif; ?>

		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
		    <?php $archive_layout = dikka_business_get_option( 'archive_layout' ); ?>

			<?php if ( 'full' === $archive_layout ) :  ?>
			<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'dikka-business' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			?>
	    <?php else : ?>
			<?php the_excerpt(); ?>
	    <?php endif ?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dikka-business' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php dikka_business_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .entry-container -->
</article><!-- #post-## -->
