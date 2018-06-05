<div id="latest-post" class="relative">
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

        <div class="section-content">
            <?php foreach ( $all_posts as $key => $post ) : ?>
            <?php setup_postdata( $post ); ?>
      		    <article class="<?php echo (has_post_thumbnail()) ? 'has-post-thumbnail' : 'no-post-thumbnail'; ?>">
    				<?php if ( 'disable' !== $instance['settings']['featured_image'] && has_post_thumbnail() ) : ?>
    					<div class="featured-image">
    						<a href="<?php the_permalink(); ?>">
    							<?php
    							$featured_image = esc_attr( $instance['settings']['featured_image'] );
    							$img_attributes = array( 'class' => 'aligncenter' );
    							the_post_thumbnail( esc_attr( $featured_image ), $img_attributes );
    							?>
    						</a>
    					</div><!-- .featured-image -->
      				<?php endif ?>

    				<div class="entry-container">
                        <?php if ( false === $instance['settings']['disable_date'] || ( false === $instance['settings']['disable_comment'] && comments_open( get_the_ID() ) ) ): ?>
                            <div class="entry-meta">
                                <?php if ( false === $instance['settings']['disable_date'] ): ?>
                                    <span class="posted-on"><?php the_time( get_option('date_format') ); ?></span><!-- .posted-on -->
                                <?php endif ?>

                                <?php if ( false === $instance['settings']['disable_comment'] ): ?>
                                    <?php
                                    if ( comments_open( get_the_ID() ) ) {
                                        echo '<span class="comments-link">';
                                        comments_popup_link( '<span class="leave-reply">' . __( 'No Comment', 'dikka-business' ) . '</span>', __( '1 Comment', 'dikka-business' ), __( '% Comments', 'dikka-business' ) );
                                        echo '</span>';
                                    }
                                    ?>
                                <?php endif; ?>
                            </div><!-- .entry-meta -->
                        <?php endif; ?>
                        
    					<header class="entry-header">
                            <h2 class="entry-title">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="post-title"><?php the_title(); ?></a>
                            </h2>
                        </header>

    						<?php if ( false === $instance['settings']['disable_excerpt'] ): ?>
    							<?php $excerpt_content = get_the_excerpt( $post ); ?>
                            <div class="entry-content">
    							<p><?php echo wp_kses_post( $excerpt_content ); ?></p>
                            </div><!-- .entry-content -->
    						<?php endif ?>
    						<?php if ( false === $instance['settings']['disable_more_text'] ): ?>
    							<div class="read-more"><a href="<?php the_permalink(); ?>"><?php echo esc_html( $instance['settings']['more_text'] ); ?></a></div><!-- .latest-news-read-more -->
    						<?php endif ?>
                    </div><!-- .entry-container -->
    			</article><!-- .post-wrapper -->
            <?php endforeach; ?>
        </div><!-- .entry-content -->
    </div><!-- .container -->
</div><!-- #latest-post -->

  	<?php wp_reset_postdata(); // Reset. ?>

<?php endif;

