<?php
/**
 * Basic theme functions.
 *
 * This file contains hook functions attached to core hooks.
 *
 * @package Dikka Business
*/

if ( ! function_exists( 'dikka_business_custom_body_class' ) ) :
	/**
	 * Custom body class
	 *
	 * @since 1.0
	 *
	 * @param string|array $input One or more classes to add to the class list.
	 * @return array Array of classes.
	 */
	function dikka_business_custom_body_class( $input ) {

		// Global layout.
		global $post;
		$page_layout = dikka_business_get_option( 'page_layout' );
		$page_layout = apply_filters( 'dikka_business_filter_theme_page_layout', $page_layout );

		// Check if single.
		if ( $post  && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'dikka_business_theme_settings', true );
			if ( isset( $post_options['post_layout'] ) && ! empty( $post_options['post_layout'] ) ) {
				$page_layout = $post_options['post_layout'];
			}
		}

		$input[] = esc_attr( $page_layout );

		// Add common class for sidebar enabled condition.
		if ( 'no-sidebar' !== $page_layout ) {
			$input[] = 'sidebar-enabled';
		}

		// Overlap class.
		$overlap_class = 'builder-overlap';
		if ( is_front_page() && 'posts' === get_option( 'show_on_front' ) ) {
			$overlap_class = '';
		} else if ( is_home() && ( $blog_page_id = dikka_business_get_index_page_id( 'blog' ) ) > 0 ) {
			// Function is_home() specific.
			$disable_overlap = absint( get_post_meta( $blog_page_id, 'dikka-business-disable-overlap', true ) );
			if ( 1 === $disable_overlap ) {
				$overlap_class = '';
			}
		} else if ( $post ) {
			// Post specific.
			$disable_overlap = absint( get_post_meta( $post->ID, 'dikka-business-disable-overlap', true ) );
			if ( 1 === $disable_overlap ) {
				$overlap_class = '';
			}
		}
		if ( ! empty( $overlap_class ) ) {
			$input[] = $overlap_class;
		} else {
			$input[] = 'builder-overlap-disabled';
		}

		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$input[] = 'group-blog';
		}

		// Add a class for typography
		$typography = ( ( dikka_business_get_option( 'theme_typography' ) ) == 'default' ) ? '' :  ( dikka_business_get_option( 'theme_typography' ) );
		$input[] = esc_attr( $typography );

		$body_typography = ( ( dikka_business_get_option( 'body_theme_typography' ) ) == 'default' ) ? '' :  ( dikka_business_get_option( 'body_theme_typography' ) );
		$input[] = esc_attr( $body_typography );


		return $input;

	}
endif;

add_filter( 'body_class', 'dikka_business_custom_body_class' );

if ( ! function_exists( 'dikka_business_featured_image_instruction' ) ) :

	/**
	 * Message to show in the Featured Image Meta box.
	 *
	 * @since 1.0
	 *
	 * @param string $content Admin post thumbnail HTML markup.
	 * @param int    $post_id Post ID.
	 * @return string HTML.
	 */
	function dikka_business_featured_image_instruction( $content, $post_id ) {

		$allowed = array( 'post' );
		if ( in_array( get_post_type( $post_id ), $allowed ) ) {
			$content .= '<strong>' . __( 'Recommended Image Size', 'dikka-business' ) . ':</strong><br/>';
			$content .= __( 'Banner Image', 'dikka-business' ) . ' : 800px X 600px';
		}

		return $content;

	}

endif;
add_filter( 'admin_post_thumbnail_html', 'dikka_business_featured_image_instruction', 10, 2 );

if ( ! function_exists( 'dikka_business_custom_content_width' ) ) :

	/**
	 * Custom content width.
	 *
	 * @since 1.0
	 */
	function dikka_business_custom_content_width() {

		global $post, $content_width;

		$page_layout = dikka_business_get_option( 'page_layout' );
		$page_layout = apply_filters( 'dikka_business_filter_theme_page_layout', $page_layout );

		// Check if single.
		if ( $post && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'dikka_business_theme_settings', true );
			if ( isset( $post_options['post_layout'] ) && ! empty( $post_options['post_layout'] ) ) {
				$page_layout = esc_attr( $post_options['post_layout'] );
			}
		}

		switch ( $page_layout ) {

			case 'no-sidebar':
				$content_width = 1170;
				break;

			case 'left-sidebar':
			case 'right-sidebar':
				$content_width = 900;
				break;

			default:
				break;
		}

	}
endif;

add_action( 'template_redirect', 'dikka_business_custom_content_width' );