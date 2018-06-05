<?php

$slider_navigation 	= builderio_get_option( 'builderio_post_navigation' );
$slider_pagination 	= builderio_get_option( 'builderio_post_pagination' );
$slider_content 	= builderio_get_option( 'builderio_post_content' );
$slider_time 	= builderio_get_option( 'builderio_post_time' );
$slider_item 		  = builderio_get_option( 'builderio_post_count' );
$post_excerpt 	     = builderio_get_option( 'builderio_post_excerpt');
if( $slider_navigation == 1 ){
	$owl_nav = '1';
}else{
	$owl_nav = '0';
}

if( $slider_pagination == 1 ){
	$owl_pag = '1';
}else{
	$owl_pag = '0';
}
$post_img = get_template_directory_uri() . '/assets/images/post-thumbnail.png';
?>


<!-- Wrap Slider Area -->
<div class="recent-post-slider">
	<!-- Post Slider -->
        <div id="recent-slider" class="owl-carousel owl-theme" data-nav="<?php echo esc_attr( $owl_nav ); ?>" data-pag="<?php echo esc_attr( $owl_pag ); ?>">
        
          <?php
        
                // Query Args
                $args = array(
                    'post_type'	=> 'post',
                    'orderby'	=> 'post_date',
                    'order'	=> 'DESC',
                    'posts_per_page' => $slider_item,
                    'ignore_sticky_posts' => 1 ,
                    'post_status' => 'publish'
                );
            
                
                $sliderQuery = new WP_Query();
                $sliderQuery->query( $args );
                
                // Loop Start
        if ( $sliderQuery->have_posts() ) :
    
        while ( $sliderQuery->have_posts() ) : $sliderQuery->the_post();
    
        ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="post-wrapper">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('builderio-featured-image'); ?></a>
                        </div><!-- .post-thumbnail -->
                    <?php else: ?>
                    	<div class="post-thumbnail">
                        	<img src="<?php echo esc_url( $post_img )?>" class="img-responsive" height="750" width="1600" />
                        </div>
                    <?php endif; ?>
                    <div class="post-content overlay">
                        <div class="post-inner-wrapper text-center">
                            <div class="post-meta animation animated-item-1">
                                <?php if( has_category()):
                                            echo '<div class="slider-post-categories list-inline-item">';
                                                the_category( ',' );
                                            echo '</div>';
                                endif; ?>
                            </div>
                            <header class="entry-header animation animated-item-2">
                
                                <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                            </header><!-- .entry-header -->
                			
							<?php if( $slider_content == 1 ): ?>
								<div class="entry-content">
									<p><?php printf( esc_html( wp_trim_words( get_the_content(), $post_excerpt ) ) ); ?></p>
								</div><!-- .entry-content -->
                            <?php endif; ?>
                            
                            <p class="read-more animation animated-item-3">
                                <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn">
                                    <?php esc_html_e( 'Read More','builderio' );?>
                                </a>
                            </p>
                            <?php if( $slider_time == 1 ): ?>
                                <div class="slider-post-time">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php the_time( get_option('date_format') ); ?>
                                </div>
                        	<?php endif; ?>
                        </div>  
                    </div>
                </div>
            </article><!-- #post-## -->
       <?php
    
        endwhile; wp_reset_query();
        endif;
    
        ?>
	</div>
</div>
