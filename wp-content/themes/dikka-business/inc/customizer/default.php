<?php
/**
 * Default theme options.
 *
 * @package Dikka Business
 */

if ( ! function_exists( 'dikka_business_get_default_theme_options' ) ) :

	/**
	 * Get default theme options
	 *
	 * @since 1.0
	 *
	 * @return array Default theme options.
	 */
	function dikka_business_get_default_theme_options() {

		$defaults = array();

		// Header.
		$defaults['show_title']   = true;
		$defaults['show_tagline'] = true;

		// Layout.
		$defaults['page_layout']           = 'right-sidebar';
		$defaults['archive_layout']          = 'excerpt';

		// Pagination.
		$defaults['pagination_type'] = 'default';

		// Footer.
		$defaults['copyright_text']          = esc_html__( 'Copyright © All rights reserved. | Theme: Dikka Business by Creativ Themes', 'dikka-business' );

		// Colors and Typography.
		$defaults['theme_typography'] = 'default';
		$defaults['body_theme_typography'] = 'default';
		$defaults['color_layout'] = '#ef4a2b';

		// Excerpt 
		$defaults['excerpt_length'] = '25';

		// Pass through filter.
		$defaults = apply_filters( 'dikka_business_filter_default_theme_options', $defaults );
		return $defaults;
	}

endif;
