<?php
/**
 * The template for displaying 404 pages (not found)
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
                            <section class="error-404 not-found text-center">
                                <div class="page-content">
                                    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'builderio' ); ?></p>
                
                                    <?php get_search_form(); ?>
                
                                </div><!-- .page-content -->
                            </section><!-- .error-404 -->
                        </main><!-- #main -->
                    </div><!-- #primary -->
                </div>
            </div><!-- .row -->
		</div>
	</div>
<?php get_footer();
