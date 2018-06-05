<?php
//featured slider
$builderio_slider_post_one = array( builderio_get_option('builderio_slider_post_one') );
$builderio_slider_post_two = array( builderio_get_option('builderio_slider_post_two') );
$builderio_slider_post_three = array( builderio_get_option('builderio_slider_post_three') );
$builderio_featured_navigation = builderio_get_option('builderio_featured_navigation');
$builderio_featured_pagination = builderio_get_option('builderio_featured_pagination');
$builderio_featured_content = builderio_get_option('builderio_featured_content');
$builderio_slider_excerpt = builderio_get_option('builderio_slider_excerpt');

if( $builderio_featured_navigation == 1 ){
	$owl_nav = '1';
}else{
	$owl_nav = '0';
}

if( $builderio_featured_pagination == 1 ){
	$owl_pag = '1';
}else{
	$owl_pag = '0';
}

$post_img = get_template_directory_uri() . '/assets/images/post-thumbnail.png';
?>

<div class="builderio-banner-slider-wrapper">
	<div id="builderio-banner-slider" class="owl-carousel owl-theme" data-nav="<?php echo esc_attr( $owl_nav ); ?>" data-pag="<?php echo esc_attr( $owl_pag ); ?>">
    	<?php if( $builderio_slider_post_one ): 
			
			$query = new WP_Query( array( 'post_type' => 'page', 'post__in' => $builderio_slider_post_one ) );
				if( $query->have_posts() ):
						while( $query->have_posts() ):
							$query->the_post();
				?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="post-wrapper">
                        <?php if ( has_post_thumbnail() ) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('builderio-featured-image'); ?></a>
                                </div><!-- .post-thumbnail -->
                        <?php else: ?>
                                <div class="post-thumbnail">
                                    <img src="<?php echo esc_url( $post_img ); ?>" class="img-responsive" height="750" width="1600" />
                                </div>
                        <?php endif; ?>
                        <div class="post-content overlay">
                            <div class="post-inner-wrapper text-center">
                                <header class="entry-header animation animated-item-1">
                    
                                    <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                                </header><!-- .entry-header -->
                                <?php if( $builderio_featured_content ): ?>
                                    <div class="entry-content animation animated-item-2">
                                        <p><?php printf( esc_html( wp_trim_words( get_the_content(), $builderio_slider_excerpt ) ) ); ?></p>
                                    </div><!-- .entry-content -->
                                <?php endif; ?>
                                <p class="read-more animation animated-item-3">
                                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn">
                                        <?php esc_html_e( 'Read More','builderio' );?>
                                    </a>
                                </p>
                                
                            </div>  
                        </div>
                    </div>
                </article><!-- #post-## -->
		
			<?php endwhile; wp_reset_query();
			endif;
		endif;
		?>
        
		<?php if( $builderio_slider_post_two ): 
			
			$query = new WP_Query( array( 'post_type' => 'page', 'post__in' => $builderio_slider_post_two ) );
				if( $query->have_posts() ):
						while( $query->have_posts() ):
							$query->the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="post-wrapper">
                        <?php if ( has_post_thumbnail() ) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('builderio-featured-image'); ?></a>
                                </div><!-- .post-thumbnail -->
                        <?php else: ?>
                                <div class="post-thumbnail">
                                    <img src="<?php echo esc_url( $post_img ); ?>" class="img-responsive" height="1920" width="700" />
                                </div>
                        <?php endif; ?>
                        <div class="post-content overlay">
                            <div class="post-inner-wrapper text-center">
                                <header class="entry-header animation animated-item-1">
                    
                                    <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                                </header><!-- .entry-header -->
                                <?php if( $builderio_featured_content ): ?>
                                    <div class="entry-content animation animated-item-2">
                                        <p><?php printf( esc_html( wp_trim_words( get_the_content(), $builderio_slider_excerpt ) ) ); ?></p>
                                    </div><!-- .entry-content -->
                                <?php endif; ?>
                                <p class="read-more animation animated-item-3">
                                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn">
                                        <?php esc_html_e( 'Read More','builderio' );?>
                                    </a>
                                </p>
                                
                            </div>  
                        </div>
                    </div>
                </article><!-- #post-## -->
		
			<?php endwhile; wp_reset_query();
			endif;
		endif;
		?>
        
		<?php if( $builderio_slider_post_three ): 
			
			$query = new WP_Query( array( 'post_type' => 'page', 'post__in' => $builderio_slider_post_three ) );
				if( $query->have_posts() ):
						while( $query->have_posts() ):
							$query->the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="post-wrapper">
                        <?php if ( has_post_thumbnail() ) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('builderio-featured-image'); ?></a>
                                </div><!-- .post-thumbnail -->
                        <?php else: ?>
                                <div class="post-thumbnail">
                                    <img src="<?php echo esc_url( $post_img ); ?>" class="img-responsive" height="1920" width="700" />
                                </div>
                        <?php endif; ?>
                        <div class="post-content overlay">
                            <div class="post-inner-wrapper text-center">
                                <header class="entry-header animation animated-item-1">
                    
                                    <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                                </header><!-- .entry-header -->
                                <?php if( $builderio_featured_content ): ?>
                                    <div class="entry-content animation animated-item-2">
                                        <p><?php printf( esc_html( wp_trim_words( get_the_content(), $builderio_slider_excerpt ) ) ); ?></p>
                                    </div><!-- .entry-content -->
                                <?php endif; ?>
                                <p class="read-more animation animated-item-3">
                                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn">
                                        <?php esc_html_e( 'Read More','builderio' );?>
                                    </a>
                                </p>
                                
                            </div>  
                        </div>
                    </div>
                </article><!-- #post-## -->
		
			<?php endwhile; wp_reset_query();
			endif;
		endif;
		?>
        
    </div><!-- end post slider-->
	<?php 
	$builderio_infobox_status  = builderio_get_option( 'builderio_infobox_status' );
	$builderio_location_title  = builderio_get_option( 'builderio_location_title' );
	$builderio_location_address  = builderio_get_option( 'builderio_location_address' );
	$builderio_location_icon  = builderio_get_option( 'builderio_location_icon' );
	$builderio_mail_title  = builderio_get_option( 'builderio_mail_title' );
	$builderio_mail_id  = builderio_get_option( 'builderio_mail_id' );
	$builderio_mail_icon  = builderio_get_option( 'builderio_mail_icon' );
	$builderio_contact_title  = builderio_get_option( 'builderio_contact_title' );
	$builderio_contact_number  = builderio_get_option( 'builderio_contact_number' );
	$builderio_contact_icon  = builderio_get_option( 'builderio_contact_icon' );

	if( $builderio_infobox_status ): ?>
		<div class="contact-infobox infobox-top">
			<div class="container">
				<div class="row infobox-wrap">
					<div class="col-md-4">
						<div class="item-wrap">
							<?php if( !empty( $builderio_location_icon ) ): ?>
								<div class="icon-wrap">
									<i class="<?php echo esc_attr( $builderio_location_icon ); ?>"></i>
								</div>
							<?php endif; ?>
							<div class="details-wrap">
								<?php if( !empty( $builderio_location_title ) ): ?>
									<h5 class="title"><?php echo esc_html( $builderio_location_title ); ?></h5>
								<?php endif; ?>
								<?php if( !empty( $builderio_location_address ) ): ?>
									<p class="content"><?php echo esc_html( $builderio_location_address ); ?></p>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="item-wrap">
							<?php if( !empty( $builderio_mail_icon ) ): ?>
								<div class="icon-wrap">
									<i class="<?php echo esc_attr( $builderio_mail_icon ); ?>"></i>
								</div>
							<?php endif; ?>
							<div class="details-wrap">
								<?php if( !empty( $builderio_mail_title ) ): ?>
									<h5 class="title"><?php echo esc_html( $builderio_mail_title ); ?></h5>
								<?php endif; ?>
								<?php if( !empty( $builderio_mail_id ) ): ?> 
									<a href="mailto:<?php echo esc_url( $builderio_mail_id ); ?>" class="content"><?php echo esc_html( $builderio_mail_id ); ?></a>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="item-wrap">
							<?php if( !empty( $builderio_contact_icon ) ): ?> 
								<div class="icon-wrap">
									<i class="<?php echo esc_attr( $builderio_contact_icon ); ?>"></i>
								</div>
							<?php endif; ?>
							<div class="details-wrap">
								<?php if( !empty( $builderio_contact_title ) ): ?>
									<h5 class="title"><?php echo esc_html( $builderio_contact_title ); ?></h5>
								<?php endif; ?>
								<?php if( !empty( $builderio_contact_number ) ): ?>
									<p class="content"><?php echo esc_html( $builderio_contact_number ); ?></p>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	
</div>