<?php
/**
 * Template part for displaying posts
 * @package Builderio
 * @version 1.0.6
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-inner-wrapper">
    	<div class="row">
        	<div class="col-md-12">
            	
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="post-thumbnail">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
						<div class="post-date-wrap">
							<h6 class="month"><?php echo esc_html( get_the_date('M') ); ?></h6>
							<span class="date"><?php echo esc_html( get_the_date('d') ); ?></span>
						</div>
					</div><!-- .post-thumbnail -->
				<?php endif; ?>
				<header class="entry-header">
				
					<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>'); ?>
					
        		</header><!-- .entry-header -->
				
				<div class="entry-content">
					<?php the_excerpt(); ?>
				</div><!-- .entry-content -->
				
            </div><!-- .col-md-12 -->
            
        </div>
    </div>
</article><!-- #post-## -->
