<?php
/**
 * Sanitization functions.
 *
 * @package Dikka Business
 */

if ( ! function_exists( 'dikka_business_sanitize_select' ) ) :

	/**
	 * Sanitize select.
	 *
	 * @since 1.0
	 *
	 * @param mixed                $input The value to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return mixed Sanitized value.
	 */
	function dikka_business_sanitize_select( $input, $setting ) {

		// Ensure input is a slug.
		$input = sanitize_key( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}

endif;


if ( ! function_exists( 'dikka_business_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 *
	 * @since 1.0
	 *
	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	function dikka_business_sanitize_checkbox( $checked ) {

		return ( ( isset( $checked ) && true === $checked ) ? true : false );

	}

endif;

if ( ! function_exists( 'dikka_business_sanitize_footer_content' ) ) :

	/**
	 * Sanitize footer content.
	 *
	 * @since 1.0
	 *
	 * @param string               $input Content to be sanitized.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return string Sanitized content.
	 */
	function dikka_business_sanitize_footer_content( $input, $setting ) {

		return ( stripslashes( wp_filter_post_kses( addslashes( $input ) ) ) );

	}
endif;

if ( ! function_exists( 'dikka_business_sanitize_number_range' ) ) :
	/**
	 * Number Range sanitization callback.
	 *
	 */
	function dikka_business_sanitize_number_range( $number, $setting ) {

		// Ensure input is an absolute integer.
		$number = absint( $number );

		// Get the input attributes associated with the setting.
		$atts = $setting->manager->get_control( $setting->id )->input_attrs;


		// Get minimum number in the range.
		$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

		// Get maximum number in the range.
		$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

		// Get step.
		$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

		// If the number is within the valid range, return it; otherwise, return the default
		return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
	}
endif;
