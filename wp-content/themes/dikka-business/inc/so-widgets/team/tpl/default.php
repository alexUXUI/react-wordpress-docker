<div id="team" class="relative">
    <div class="container">
		<?php if ( ! empty( $instance['section_title'] ) ) : ?>
            <div class="section-header align-center">
                <h2 class="section-title"><?php echo esc_html( $instance['section_title'] ); ?></h2>
            </div>
        <?php endif; ?>

	    <?php
	    $post_selector_pseudo_query = $instance['posts'];
	    $processed_query = siteorigin_widget_post_selector_process_query( $post_selector_pseudo_query );
	    $all_posts = get_posts( $processed_query  );

	    if ( ! empty( $all_posts ) ) : ?>

	  	<?php global $post; ?>

	    <div class="entry-content col-3">
	        <?php foreach ( $all_posts as $key => $post ) : ?>
	        <?php setup_postdata( $post ); ?>

	        <div class="team-item">
	        	<div class="team-item-wrapper">
		        	<?php if ( 'disable' !== $instance['settings']['featured_image'] && has_post_thumbnail() ) : ?>
					<div class="featured-image">
						<a href="<?php the_permalink(); ?>">
							<?php
							$featured_image = esc_attr( $instance['settings']['featured_image'] );
							$img_attributes = array();
							the_post_thumbnail( esc_attr( $featured_image ), $img_attributes );
							?>
						</a>
					</div><!-- .featured-image -->
					<?php endif ?>

					<div class="team-contents-wrapper">
		                <div class="team-content">
							<h4>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							</h4>
		            
							<?php if ( false === $instance['settings']['disable_excerpt'] ): ?>
								<?php $excerpt_content = get_the_excerpt( $post ); ?>
								<p><?php echo wp_kses_post( $excerpt_content ); ?></p>
							<?php endif ?>
						</div>
					</div><!-- .team-contents-wrapper -->
				</div><!-- .team-item-wrapper -->
			</div><!-- .team-item -->
	        <?php endforeach; ?>
	    </div><!-- .entry-content -->
    </div><!-- .container -->
</div><!-- #our-team -->

	<?php wp_reset_postdata(); // Reset. ?>

<?php endif;

