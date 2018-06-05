<?php
/**
 * The main template file
 * @package Builderio
 * @version 1.0.6
 */

get_header(); 
$builderio_post_status = builderio_get_option('builderio_post_status');
?>
	<?php if( is_home() && is_front_page()):  
			if ( has_header_image() ) { ?>
                <div class="header-image">
                    <img src="<?php esc_url( header_image() ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" alt="<?php esc_attr_e( 'banner-image', 'builderio'); ?>" />
                </div>
                <?php } else if( $builderio_post_status == 1 ):
    
                get_template_part( 'template-parts/post/slider' ); 
        endif; ?>
	<?php endif; ?>
    
	<div id="content" class="site-content">
		<div class="container">
			<div class="row">
                <div class="col-md-8">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main class-layout" role="main">
                
                            <?php
                            if ( have_posts() ) :
                
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                
                                    get_template_part( 'template-parts/post/content');
                
                                endwhile;
                
                                the_posts_pagination();
                
                            else :
                
                                get_template_part( 'template-parts/post/content', 'none' );
                
                            endif;
                            ?>
                
                        </main><!-- #main -->
                    </div><!-- #primary -->
                </div><!-- .col-md-8 -->
				
				<div class="col-md-4">    
                
                <?php get_sidebar(); ?>
            
            </div>
			
		</div><!-- .row -->
	</div>
</div>
<?php get_footer();
