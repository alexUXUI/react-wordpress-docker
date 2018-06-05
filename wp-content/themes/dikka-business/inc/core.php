<?php
/**
 * Core functions.
 *
 * @package Dikka Business
 */

/**
 * Get theme option.
 *
 * @since 1.0
 *
 * @param string $key Option key.
 * @return mixed Option value.
 */
function dikka_business_get_option( $key = '' ) {

	global $dikka_business_default_options;
	if ( empty( $key ) ) {
		return;
	}

	$default = ( isset( $dikka_business_default_options[ $key ] ) ) ? $dikka_business_default_options[ $key ] : '';
	$theme_options = get_theme_mod( 'theme_options', $dikka_business_default_options );
	$theme_options = array_merge( $dikka_business_default_options, $theme_options );
	$value = '';
	if ( isset( $theme_options[ $key ] ) ) {
		$value = $theme_options[ $key ];
	}
	return $value;

}
