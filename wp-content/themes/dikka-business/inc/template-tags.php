<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Creativ Themes
 * @subpackage Dikka Business
 * @since Dikka Business 1.0
 */

if ( ! function_exists( 'dikka_business_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function dikka_business_posted_on() {
		$show_meta_date   = true;
		$show_meta_author = true;

		$posted_on = '';
		if ( true === $show_meta_date ) {
			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
			}

			$time_string = sprintf( $time_string,
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() ),
				esc_attr( get_the_modified_date( 'c' ) ),
				esc_html( get_the_modified_date() )
			);

			$posted_on = sprintf(
				'%s',
				'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
			);
		}

		$byline = '';
		if ( true === $show_meta_author ) {
			$byline = sprintf(
				'%s',
				'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
			);
		}

		if ( ! empty( $posted_on ) ) {
			echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
		}
		if ( ! empty( $byline ) ) {
			echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
		}
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			$show_meta_comment = true;
			if ( true === $show_meta_comment ) {
				echo '<span class="comments-link">';
				comments_popup_link( esc_html__( 'Leave a comment', 'dikka-business' ), esc_html__( '1 Comment', 'dikka-business' ), esc_html__( '% Comments', 'dikka-business' ) );
				echo '</span>';
			}
		}

	}
endif;

if ( ! function_exists( 'dikka_business_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function dikka_business_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			$show_meta_categories = true;
			if ( true === $show_meta_categories ) {
				/* Translators: used between list items, there is a space after the comma. */
				$categories_list = get_the_category_list( esc_html__( ', ', 'dikka-business' ) );
				if ( $categories_list && dikka_business_categorized_blog() ) {
					printf( '<span class="cat-links">%1$s</span>', $categories_list ); // WPCS: XSS OK.
				}
			}
			$show_meta_tags = true;
			if ( true === $show_meta_tags ) {
				/* Translators: used between list items, there is a space after the comma. */
				$tags_list = get_the_tag_list( '', esc_html__( ', ', 'dikka-business' ) );
				if ( $tags_list ) {
					printf( '<span class="tags-links">%1$s</span>', $tags_list ); // WPCS: XSS OK.
				}
			}
		}
	}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function dikka_business_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'dikka_business_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'dikka_business_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so dikka_business_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so dikka_business_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in dikka_business_categorized_blog.
 */
function dikka_business_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'dikka_business_categories' );
}
add_action( 'edit_category', 'dikka_business_category_transient_flusher' );
add_action( 'save_post',     'dikka_business_category_transient_flusher' );

if ( ! function_exists( 'dikka_business_posted_on_custom' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function dikka_business_posted_on_custom() {

		global $post;

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . wp_kses_post( $posted_on ) . '</span>';

		$byline = sprintf( '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( $post->post_author ) ) . '">' . esc_html( get_the_author_meta( 'display_name', $post->post_author ) ) . '</a></span>'
		);
		echo '<span class="byline"> ' . wp_kses_post( $byline ) . '</span>';
	}

endif;
