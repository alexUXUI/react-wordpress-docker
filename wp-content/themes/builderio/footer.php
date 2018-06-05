<?php
/**
 * The template for displaying the footer
 * @package Builderio
 * @version 1.0.6
 */

?>


	<footer id="colophon" class="site-footer">
		<?php 

			if ( is_active_sidebar( 'footer-1' ) ||
				 is_active_sidebar( 'footer-2' ) ||
				 is_active_sidebar( 'footer-3' ) ||
				 is_active_sidebar( 'footer-4' ) ) :
		 
		 get_template_part( 'template-parts/footer/widgets' );
		 
		 endif; ?>
		<div class="footer-bottom">
			<div class="container">
				<div class="row footer-wrap">
					<div class="col-md-12 text-center">
						<?php if ( has_nav_menu( 'social' ) ) : ?>
							<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'builderio' ); ?>">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'social',
										'container_class'     => 'social-links-menu',
										'depth'          => 1,
										'link_before'    => '<span class="screen-reader-text">',
										'link_after'     => '</span>' . builderio_get_svg( array( 'icon' => 'chain' ) ),
									) );
								?>
							</nav><!-- .social-navigation -->
						<?php endif; ?>
						<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php $back_to_top_type = builderio_get_option( 'back_to_top_type' );
if($back_to_top_type == 'enable'): ?>
<a href="#page" class="back-to-top" id="back-to-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>
