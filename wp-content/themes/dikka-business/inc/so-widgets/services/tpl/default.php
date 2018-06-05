<div id="featured-services" class="widget widget_featured_services">
    <?php
    $post_selector_pseudo_query = $instance['posts'];
    $processed_query = siteorigin_widget_post_selector_process_query( $post_selector_pseudo_query );
    $all_posts = get_posts( $processed_query  );

    if ( ! empty( $all_posts ) ) : ?>

  	<?php global $post; ?>

    <div class="featured-services-wrapper column-per-row-3">
        <?php foreach ( $all_posts as $key => $post ) : ?>
        <?php setup_postdata( $post ); ?>

        <article>
			<div class="featured-services-content" style="background-image: url(<?php echo esc_url( get_the_post_thumbnail_url( $post_id ) ); ?>);">
                <header class="entry-header">
					<h2 class="entry-title"><?php the_title(); ?></h2>
                </header>
            
				<?php if ( false === $instance['settings']['disable_excerpt'] ): ?>
					<?php $excerpt_content = get_the_excerpt( $post ); ?>
					<div class="entry-content">
						<p><?php echo wp_kses_post( $excerpt_content ); ?></p>
					</div><!-- .entry-content -->
				<?php endif ?>

				<?php if ( false === $instance['settings']['disable_more_text'] ): ?>
					<div class="read-more">
						<a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php echo esc_html( $instance['settings']['more_text'] ); ?></a>
					</div><!-- .read-more -->
				<?php endif ?>
			</div><!-- .featured-services-content -->
		</article>
        <?php endforeach; ?>
    </div><!-- .featured-services-wrapper -->
</div><!-- #featured-services -->

	<?php wp_reset_postdata(); // Reset. ?>

<?php endif;

