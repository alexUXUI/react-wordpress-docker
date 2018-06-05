<div id="portfolio" class="relative">
	<div class="container">
		<?php if ( ! empty( $instance['section_title'] ) ) : ?>
	        <header class="entry-header align-center">
	            <h2 class="section-title"><?php echo esc_html( $instance['section_title'] ); ?></h2>
	        </header>
	    <?php endif; ?>
		
	    <?php
	    $post_selector_pseudo_query = $instance['posts'];
	    $processed_query = siteorigin_widget_post_selector_process_query( $post_selector_pseudo_query );
	    $all_posts = get_posts( $processed_query  );

	    if ( ! empty( $all_posts ) ) : ?>

	  	<?php global $post; ?>
		<div class="entry-content">
		    <div class="grid gallery-popup column-4">
		        <?php foreach ( $all_posts as $key => $post ) : ?>
		        <?php setup_postdata( $post ); ?>

		        <div class="grid-item">
					<div class="grid-item-wrapper" style="background-image: url(<?php echo esc_url( get_the_post_thumbnail_url( $post_id ) ); ?>);">
						<div class="overlay"></div>
		                <div class="portfolio-title">
							<h3><?php the_title(); ?></h3>
		                </div><!-- .portfolio-title -->
					</div><!-- .grid-item-wrapper -->
				</div><!-- .grid-item -->
		        <?php endforeach; ?>
		    </div><!-- .grid -->
		</div><!-- .entry-content -->
	</div><!-- .container -->
</div><!-- #featured-services -->

	<?php wp_reset_postdata(); // Reset. ?>

<?php endif;

