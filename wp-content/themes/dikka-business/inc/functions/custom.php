<?php
/**
 * Custom theme functions.
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package Dikka Business
 */

if ( ! function_exists( 'dikka_business_skip_to_content' ) ) :

	/**
	 * Add Skip to content.
	 *
	 * @since 1.0
	 */
	function dikka_business_skip_to_content() {
	?><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'dikka-business' ); ?></a><?php
	}

endif;

add_action( 'dikka_business_action_before', 'dikka_business_skip_to_content', 15 );

if ( ! function_exists( 'dikka_business_site_branding' ) ) :

	/**
	 * Site branding.
	 *
	 * @since 1.0
	 */
	function dikka_business_site_branding() {

	?>
	
    <div class="site-branding">
		<?php dikka_business_the_custom_logo(); ?>
		<?php $show_title = dikka_business_get_option( 'show_title' ); ?>
		<?php $show_tagline = dikka_business_get_option( 'show_tagline' ); ?>
		<?php if ( true === $show_title || true === $show_tagline ) : ?>
			<div id="site-header">
				<?php if ( true === $show_title ) :  ?>
					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif; ?>
				<?php endif; ?>

				<?php if ( true === $show_tagline ) : ?>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				<?php endif; ?>
			</div><!-- #site-identity -->
		<?php endif; ?>
    </div><!-- .site-branding -->

    <?php

	}

endif;

add_action( 'dikka_business_action_header', 'dikka_business_site_branding' );


if ( ! function_exists( 'dikka_business_add_primary_navigation' ) ) :

	/**
	 * Site branding.
	 *
	 * @since 1.0
	 */
	function dikka_business_add_primary_navigation() {
	?>
    <nav id="site-navigation" class="main-navigation" role="navigation">
    	<button type="button" class="menu-toggle">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        
		<?php
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'menu_id'        => 'primary-menu',
			'menu_class'     => 'nav-menu',
			'fallback_cb'    => 'dikka_business_primary_navigation_fallback',
		) );
		?>
    </nav><!-- #site-navigation -->
    <?php
	}

endif;
add_action( 'dikka_business_action_header', 'dikka_business_add_primary_navigation', 20 );




if ( ! function_exists( 'dikka_business_footer_copyright' ) ) :

	/**
	 * Footer copyright
	 *
	 * @since 1.0
	 */
	function dikka_business_footer_copyright() {

		// Check if footer is disabled.
		$footer_status = apply_filters( 'dikka_business_filter_footer_status', true );
		if ( true !== $footer_status ) {
			return;
		}

		// Copyright content.
		$copyright_text = dikka_business_get_option( 'copyright_text' );
		$copyright_text = apply_filters( 'dikka_business_filter_copyright_text', $copyright_text );
		if ( ! empty( $copyright_text ) ) {
			$copyright_text = wp_kses_data( $copyright_text );
		}

	?>

    <?php if ( ! empty( $footer_menu_content ) ) :  ?>
		<?php echo wp_kses_post( $footer_menu_content ); ?>
    <?php endif ?>

    	
    <div class="site-info">
    	<div class="container">
			<p><?php echo wp_kses_data( $copyright_text ); ?></p>
    	</div><!-- .container -->
    </div><!-- .site-info -->
        
    <?php
	}

endif;

add_action( 'dikka_business_action_footer', 'dikka_business_footer_copyright', 10 );


if ( ! function_exists( 'dikka_business_add_sidebar' ) ) :

	/**
	 * Add sidebar.
	 *
	 * @since 1.0
	 */
	function dikka_business_add_sidebar() {

		global $post;

		$page_layout = dikka_business_get_option( 'page_layout' );
		$page_layout = apply_filters( 'dikka_business_filter_theme_page_layout', $page_layout );

		// Check if single.
		if ( $post && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'dikka_business_theme_settings', true );
			if ( isset( $post_options['post_layout'] ) && ! empty( $post_options['post_layout'] ) ) {
				$page_layout = $post_options['post_layout'];
			}
		}

		// Include primary sidebar.
		if ( 'no-sidebar' !== $page_layout ) {
			get_sidebar();
		}
	}

endif;

add_action( 'dikka_business_action_sidebar', 'dikka_business_add_sidebar' );


if ( ! function_exists( 'dikka_business_custom_posts_navigation' ) ) :
	/**
	 * Posts navigation.
	 *
	 * @since 1.0
	 */
	function dikka_business_custom_posts_navigation() {

		$pagination_type = dikka_business_get_option( 'pagination_type' );

		switch ( $pagination_type ) {

			case 'default':
				the_posts_navigation();
			break;

			case 'numeric':
				the_posts_pagination();
			break;

			default:
			break;
		}

	}
endif;

add_action( 'dikka_business_action_posts_navigation', 'dikka_business_custom_posts_navigation' );


if ( ! function_exists( 'dikka_business_add_image_in_single_display' ) ) :

	/**
	 * Add image in single post.
	 *
	 * @since 1.0
	 */
	function dikka_business_add_image_in_single_display() {

		global $post;

		// Bail if current post is built with Page Builder.
        if ( true === dikka_business_content_is_pagebuilder() ) {
			return;
        }
		// Bail if checkbox Use Featured Image as Banner is enabled.
		$values = get_post_meta( $post->ID, 'dikka_business_theme_settings', true );
        if ( isset( $values['use_featured_image_as_banner'] ) && 1 === absint( $values['use_featured_image_as_banner'] ) ) {
			return;
        }
		if ( has_post_thumbnail() ) {

			$values = get_post_meta( $post->ID, 'dikka_business_theme_settings', true );
			$single_image = isset( $values['single_image'] ) ? esc_attr( $values['single_image'] ) : '';

			if ( ! $single_image ) {
				$single_image = dikka_business_get_option( 'single_image' );
			}

			if ( 'disable' !== $single_image ) {
				$args = array(
					'class' => 'aligncenter',
				);
				the_post_thumbnail( esc_attr( $single_image ), $args );
			}
		}

	}

endif;

add_action( 'dikka_business_single_image', 'dikka_business_add_image_in_single_display' );

if( ! function_exists( 'dikka_business_check_custom_header_status' ) ) :

	/**
	 * Check status of custom header.
	 *
	 * @since 1.0
	 */
	function dikka_business_check_custom_header_status( $input ) {

		global $post;

		if ( is_front_page() && 'posts' === get_option( 'show_on_front' ) ) {
			$input = false;
		}
		else if ( is_home() && ( $blog_page_id = dikka_business_get_index_page_id( 'blog' ) ) > 0 ) {
			$values = get_post_meta( $blog_page_id, 'dikka_business_theme_settings', true );
			$disable_banner_area = isset( $values['disable_banner_area'] ) ? absint( $values['disable_banner_area'] ) : 0;
			if ( 1 === $disable_banner_area ) {
				$input = false;
			}
		}
		else if ( $post ) {
			if ( is_singular() ) {
				$values = get_post_meta( $post->ID, 'dikka_business_theme_settings', true );
				$disable_banner_area = isset( $values['disable_banner_area'] ) ? absint( $values['disable_banner_area'] ) : 0;
				if ( 1 === $disable_banner_area ) {
					$input = false;
				}
			}
		}

		return $input;

	}

endif;

add_filter( 'dikka_business_filter_custom_header_status', 'dikka_business_check_custom_header_status' );


if ( ! function_exists( 'dikka_business_add_custom_header' ) ) :

	/**
	 * Add Custom Header.
	 *
	 * @since 1.0
	 */
	function dikka_business_add_custom_header() {

		$flag_apply_custom_header = apply_filters( 'dikka_business_filter_custom_header_status', true );
		if ( true !== $flag_apply_custom_header ) {
			return;
		}
		$attribute = '';
		$attribute = apply_filters( 'dikka_business_filter_custom_header_style_attribute', $attribute );
		?>
		<?php if( !is_front_page() ): ?>
		<section id="innerpage-banner" <?php echo ( ! empty( $attribute ) ) ? ' style="' . esc_attr( $attribute ) . '" ' : ''; ?>>
			<div class="black-overlay"></div>
			<div class="container">
				<?php
					/**
					 * Hook - dikka_business_action_custom_header.
					 */
					do_action( 'dikka_business_action_custom_header' );
				?>
			</div><!-- .container -->
		</section><!-- #innerpage-banner -->
		<?php endif; ?>
		<?php

	}
endif;

add_action( 'dikka_business_action_before_content', 'dikka_business_add_custom_header', 5 );

if ( ! function_exists( 'dikka_business_add_title_in_custom_header' ) ) :

	/**
	 * Add title in Custom Header.
	 *
	 * @since 1.0
	 */
	function dikka_business_add_title_in_custom_header() {
		
		$custom_page_title = apply_filters( 'dikka_business_filter_custom_page_title', '' );
		?>
		<div class="banner-wrapper align-center">
			<header class="page-header">
				<?php if ( ! empty( $custom_page_title ) ) : ?>
					<?php echo '<h2 class="entry-title">'; ?>
					<?php echo esc_html( $custom_page_title ); ?>
					<?php echo '</h2>'; ?>
				<?php endif ?>
				<div class="title-divider">
                    <div class="title-divider-before"></div>
                    <div class="title-divider-after"></div>
                </div>
	        </header><!-- .page-header -->
        </div><!-- .banner-wrapper -->
		<?php
	}

endif;

add_action( 'dikka_business_action_custom_header', 'dikka_business_add_title_in_custom_header' );

if ( ! function_exists( 'dikka_business_customize_page_title' ) ) :

	/**
	 * Add title in Custom Header.
	 *
	 * @since 1.0
	 *
	 * @param string $title Title.
	 * @return string Modified title.
	 */
	function dikka_business_customize_page_title( $title ) {

		if ( is_home() && ( $blog_page_id = dikka_business_get_index_page_id( 'blog' ) ) > 0 ) {
			$title = get_the_title( $blog_page_id );
		}
		elseif ( is_singular() ) {
			$title = get_the_title();
		}
		elseif ( is_archive() ) {
			$title = strip_tags( get_the_archive_title() );
		}
		elseif ( is_search() ) {
			/* translators: %s: search query input */
			$title = sprintf( __( 'Search Results for: %s', 'dikka-business' ),  get_search_query() );
		}
		elseif ( is_404() ) {
			$title = __( '404!', 'dikka-business' );
		}
		return $title;
	}
endif;

add_filter( 'dikka_business_filter_custom_page_title', 'dikka_business_customize_page_title' );


if ( ! function_exists( 'dikka_business_add_image_in_custom_header' ) ) :

	/**
	 * Add image in Custom Header.
	 *
	 * @since 1.0
	 */
	function dikka_business_add_image_in_custom_header( $input ) {

		$image_details = array();

		// For is_home().
		if ( is_home() && ( $blog_page_id = dikka_business_get_index_page_id( 'blog' ) ) > 0 ) {
			$values = get_post_meta( $blog_page_id, 'dikka_business_theme_settings', true );
			$use_featured_image_as_banner = isset( $values['use_featured_image_as_banner'] ) ? absint( $values['use_featured_image_as_banner'] ) : 0;
			if ( 1 === $use_featured_image_as_banner ) {
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $blog_page_id ), 'dikka-business-featured-banner' );
				if ( ! empty( $image ) ) {
					$image_details['url']    = $image[0];
					$image_details['width']  = $image[1];
					$image_details['height'] = $image[2];
				}
			}
		}
		// Fetch image info if singular.
		else if ( is_singular() ) {
			global $post;
			$values = get_post_meta( $post->ID, 'dikka_business_theme_settings', true );
			$use_featured_image_as_banner = isset( $values['use_featured_image_as_banner'] ) ? absint( $values['use_featured_image_as_banner'] ) : 0;
			if ( 1 === $use_featured_image_as_banner ) {
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'dikka-business-featured-banner' );
				if ( ! empty( $image ) ) {
					$image_details['url']    = $image[0];
					$image_details['width']  = $image[1];
					$image_details['height'] = $image[2];
				}
			}

		}
		if ( empty( $image_details ) ) {
			// Fetch from Custom Header Image.
			$image = get_header_image();
			if ( ! empty( $image ) ) {
				$image_details['url']    = $image;
				$image_details['width']  =  get_custom_header()->width;
				$image_details['height'] =  get_custom_header()->height;
			}
		}

		if ( ! empty( $image_details ) ) {
			$input .= 'background-image:url(' . esc_url( $image_details['url'] ) . ');';
			$input .= 'background-size:cover;';
		}

		return $input;

	}

endif;

add_filter( 'dikka_business_filter_custom_header_style_attribute', 'dikka_business_add_image_in_custom_header' );


if ( ! function_exists( 'dikka_business_add_author_bio_in_single' ) ) :

	/**
	 * Display Author bio.
	 *
	 * @since 1.0
	 */
	function dikka_business_add_author_bio_in_single() {

		if ( is_singular( 'post' ) ) {
			global $post;
			if ( get_the_author_meta( 'description', $post->post_author ) ) {
				get_template_part( 'template-parts/author-bio', 'single' );
			}
		}

	}

endif;

add_action( 'dikka_business_author_bio', 'dikka_business_add_author_bio_in_single' );

if ( ! function_exists( 'dikka_business_primary_navigation_fallback' ) ) :

	/**
	 * Fallback for primary navigation.
	 *
	 * @since 1.0
	 */
	function dikka_business_primary_navigation_fallback() {
		echo '<ul>';
		echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'dikka-business' ). '</a></li>';
		wp_list_pages( array(
			'title_li' => '',
			'depth'    => 1,
			'number'   => 7,
		) );
		echo '</ul>';

	}

endif;
