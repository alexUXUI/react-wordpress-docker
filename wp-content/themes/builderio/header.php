<?php
/**
 * The header for our theme
 *
 * @package Builderio
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
<?php $builderio_pageloader_status = builderio_get_option( 'builderio_pageloader_status' );
	  $builderio_pageloader_image  = builderio_get_option( 'builderio_pageloader_image' );
	
	if( $builderio_pageloader_status ): ?>
		<div class="page-loader">
			<div class="image-wrap">
				<?php if( $builderio_pageloader_image ): ?>
					<img src="<?php echo esc_url( $builderio_pageloader_image );?>" alt="<?php echo esc_attr_e('page-loader', 'builderio'); ?>"/>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
	
	<?php 
		// For top header
		$header_top_status = builderio_get_option( 'builderio_show_top_header' );
		$header_sticky_status = builderio_get_option( 'builderio_sticky_header_status' );
		$breadcrumb_type = builderio_get_option( 'breadcrumb_type' );
		
		if( $header_sticky_status == 'enable'){ $sticky_status = ' sticky-activated'; } else{ $sticky_status = ''; }
	?>
    
	<header id="masthead" class="site-header" role="banner">
		<div class="header-wrapper">
			<?php if( $header_top_status ): ?>
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <?php get_template_part( 'template-parts/header/top' ); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
            <div class="header-menu<?php echo esc_attr( $sticky_status ); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
                            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                                <div class="navigation-section">
                                	<div class="mobile-menu-wrapper">
                                    	<span class="mobile-menu-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
                                    </div>
                                    <nav id="site-navigation" class="main-navigation" role="navigation">
                                        <?php wp_nav_menu( array(
                                            'theme_location' => 'primary',
                                            'menu_id'        => 'primary-menu',
                                            'menu_class' 	 => 'main-menu',
                                        ) ); 
                                        ?>
                                    </nav>
                                </div><!-- .navigation-section -->
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</header><!-- #masthead -->
	
<?php if( !is_front_page()):  ?>
    <section class="page-header jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if(is_page() || is_single() ){ ?>
                            <h2 class="page-title"><?php echo esc_html( get_the_title() ); ?></h2>

                        <?php } elseif( is_search() ){ ?>
						<?php /* translators: %s: search term */
							$page_title = sprintf(
								__( 'Search Results for: %s', 'builderio' ),
								'<span>' . get_search_query() . '</span>'
							); 
						?>
						<h2 class="page-title"><?php echo esc_html( $page_title ); ?></h2>
    
                        <?php }elseif( is_404() ){ ?>
    
                        <h2 class="page-title"><?php echo esc_html( 'Page Not Found: 404', 'builderio'); ?></h2>
    
                        <?php }elseif( is_home() ){ ?>
    
                        <h2 class="page-title"><?php single_post_title(); ?></h2>
    
                        <?php } else{
    
                            the_archive_title( '<h2 class="page-title">', '</h2>' );
                        }
                    ?>
                    <?php if($breadcrumb_type == 'normal'): ?>
                        <div class="header-breadcrumb">
                            <?php builderio_breadcrumb_trail(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


	
