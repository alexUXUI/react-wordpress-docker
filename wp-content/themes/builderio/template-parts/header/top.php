<?php
/**
 * Displays header site branding
 *
 * @package Builderio
 * @version 1.0.6
 */

?>
<?php

$builderio_header_social_links  = builderio_get_option( 'builderio_header_social_links' );
$builderio_header_facebook_url  = builderio_get_option( 'builderio_header_facebook_url' );
$builderio_header_twitter_url   = builderio_get_option( 'builderio_header_twitter_url' );
$builderio_header_instagram_url = builderio_get_option( 'builderio_header_instagram_url' );
$builderio_header_google_url    = builderio_get_option( 'builderio_header_google_url' );

$builderio_show_header_trending_post = builderio_get_option( 'builderio_show_header_trending_post' );
?>
<?php if( $builderio_show_header_trending_post ): ?>         
	<div class="col-md-6">
		<div class="header-left">
			<div class="news-ticker-wrap">
				<?php 
	
				$trending_title         = builderio_get_option( 'builderio_header_trending_title' );
				$trending_category      = builderio_get_option( 'builderio_header_dropdown_category' );
				$trending_post_number   = builderio_get_option( 'builderio_header_trending_post_count' );
	
				if( !empty( $trending_title ) ): ?>
	
					<span class="news-ticker-title"><?php echo esc_html( $trending_title ). ' :'; ?></span>
					
				<?php endif;
	
				$query_args = array(
								'posts_per_page'        => absint( $trending_post_number ),
								'no_found_rows'         => true,
								'post__not_in'          => get_option( 'sticky_posts' ),
								'ignore_sticky_posts'   => true,
							);
	
				if ( absint( $trending_category ) > 0 ) {
	
					$query_args['cat'] = absint( $trending_category );
					
				} 
	
				$all_posts = new WP_Query( $query_args );
	
				if ( $all_posts->have_posts() ) : ?>
					<div class="news-ticker-list">
						<div class="news-ticker">  
							<ul class="news-ticker-items">
								<?php
								while ( $all_posts->have_posts() ) :
									
									$all_posts->the_post(); ?>
									
									<li class="news-item">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</li>
			
									<?php
			
								endwhile; 
			
								wp_reset_postdata(); ?>
								  
							</ul>
					   </div>
				   </div>
				<?php endif; ?>
			  </div>
			
		</div><!-- .header-left -->
	</div>
<?php endif; ?>
<?php if( $builderio_header_social_links ): ?>
	<div class="col-md-6">
		<div class="header-right">
			<ul class="social-info list-inline">
				<?php if( !empty( $builderio_header_facebook_url ) ){ ?>
					<li class="facebook list-inline-item">
						<a href="<?php echo esc_url( $builderio_header_facebook_url ); ?>">
							<i class="fa fa-facebook aria-hidden="true""></i>
						</a>
					</li>
				<?php } ?>

				<?php if( !empty( $builderio_header_twitter_url ) ){ ?>
					<li class="twitter list-inline-item">
						<a href="<?php echo esc_url( $builderio_header_twitter_url ); ?>">
							<i class="fa fa-twitter aria-hidden="true""></i>
						</a>
					</li>
				<?php } ?>

				<?php if( !empty( $builderio_header_instagram_url ) ){ ?>
					<li class="instagram list-inline-item">
						<a href="<?php echo esc_url( $builderio_header_instagram_url ); ?>">
							<i class="fa fa-instagram aria-hidden="true""></i>
						</a>
					</li>
				<?php } ?>
				<?php if( !empty( $builderio_header_google_url ) ){ ?>
					<li class="google list-inline-item">
						<a href="<?php echo esc_url( $builderio_header_google_url ); ?>">
							<i class="fa fa-google-plus" aria-hidden="true"></i> 
						</a>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
<?php endif; ?>
    
