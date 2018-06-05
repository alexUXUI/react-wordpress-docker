<?php
/**
 * The template for displaying all pages
 * @package Builderio
 * @version 1.0.6
 */

get_header(); ?>
	<div id="content" class="site-content">
		<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">
                
                            <?php
                            while ( have_posts() ) : the_post();
                
                                get_template_part( 'template-parts/page/content', 'page' );
                
                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;
                
                            endwhile; // End of the loop.
                            ?>
                
                        </main><!-- #main -->
                    </div><!-- #primary -->
                </div>
            </div><!-- .row -->
		</div>
	</div>
<?php get_footer();
