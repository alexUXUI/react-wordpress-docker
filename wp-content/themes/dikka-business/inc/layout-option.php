<?php
/**
 * Functions related to customizer and options.
 *
 * @package Dikka Business
 */

if ( ! function_exists( 'dikka_business_get_page_layout_options' ) ) :

	/**
	 * Returns Page or Post layout and pagination options.
	 *
	 * @since 1.0
	 *
	 * @return array Options array.
	 */
	function dikka_business_get_page_layout_options() {

		$choices = array(
			'left-sidebar'  => esc_html__( 'Primary Sidebar - Content', 'dikka-business' ),
			'right-sidebar' => esc_html__( 'Content - Primary Sidebar', 'dikka-business' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'dikka-business' ),
		);
		$output = apply_filters( 'dikka_business_filter_layout_options', $choices );
		return $output;

	}

endif;

if ( ! function_exists( 'dikka_business_get_pagination_type_options' ) ) :

	/**
	 * Returns pagination type options.
	 *
	 * @since 1.0
	 *
	 * @return array Options array.
	 */
	function dikka_business_get_pagination_type_options() {

		$choices = array(
			'default' => esc_html__( 'Older/Newer Post', 'dikka-business' ),
			'numeric' => esc_html__( 'Numeric Pagination', 'dikka-business' ),
		);
		return $choices;

	}

endif;

if ( ! function_exists( 'dikka_business_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function dikka_business_typography_options() {

        $choices = array(
            'default'         => esc_html__( 'Raleway, sans-serif', 'dikka-business' ),
            'header-font-1'   => esc_html__( 'Montserrat, sans-serif', 'dikka-business' ),
            'header-font-2'   => esc_html__( 'Poppins, sans-serif', 'dikka-business' ),
            'header-font-3'   => esc_html__( 'Roboto, sans-serif', 'dikka-business' ),
            'header-font-4'   => esc_html__( 'Open Sans, sans-serif', 'dikka-business' ),
            'header-font-5'   => esc_html__( 'Lato, sans-serif', 'dikka-business' ),
            'header-font-6'   => esc_html__( 'Ubuntu, sans-serif', 'dikka-business' ),
            'header-font-7'   => esc_html__( 'Playfair Display, serif', 'dikka-business' ),
            'header-font-8'   => esc_html__( 'Lora, serif', 'dikka-business' ),
            'header-font-9'   => esc_html__( 'Titillium Web, sans-serif', 'dikka-business' ),
            'header-font-10'   => esc_html__( 'Muli, sans-serif', 'dikka-business' ),
            'header-font-11'   => esc_html__( 'Oxygen, sans-serif', 'dikka-business' ),
            'header-font-12'   => esc_html__( 'Nunito Sans, sans-serif', 'dikka-business' ),
            'header-font-13'   => esc_html__( 'Maven Pro, sans-serif', 'dikka-business' ),
            'header-font-14'   => esc_html__( 'Cairo, serif', 'dikka-business' ),
            'header-font-15'   => esc_html__( 'Philosopher, sans-serif', 'dikka-business' ),
        );
        $output = apply_filters( 'dikka_business_typography_options', $choices );
        return $output;

    }
endif;

if ( ! function_exists( 'dikka_business_body_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function dikka_business_body_typography_options() {
        $choices = array(
            'default'         => esc_html__( 'Raleway, sans-serif', 'dikka-business' ),
            'body-font-1'     => esc_html__( 'Montserrat, sans-serif', 'dikka-business' ),
            'body-font-2'     => esc_html__( 'Poppins, sans-serif', 'dikka-business' ),
            'body-font-3'     => esc_html__( 'Roboto, sans-serif', 'dikka-business' ),
            'body-font-4'     => esc_html__( 'Open Sans, sans-serif', 'dikka-business' ),
            'body-font-5'     => esc_html__( 'Lato, sans-serif', 'dikka-business' ),
            'body-font-6'     => esc_html__( 'Ubuntu, sans-serif', 'dikka-business' ),
            'body-font-7'     => esc_html__( 'Playfair Display, serif', 'dikka-business' ),
            'body-font-8'     => esc_html__( 'Lora, serif', 'dikka-business' ),
            'body-font-9'     => esc_html__( 'Titillium Web, sans-serif', 'dikka-business' ),
            'body-font-10'    => esc_html__( 'Muli, sans-serif', 'dikka-business' ),
            'body-font-11'    => esc_html__( 'Oxygen, sans-serif', 'dikka-business' ),
            'body-font-12'    => esc_html__( 'Nunito Sans, sans-serif', 'dikka-business' ),
            'body-font-13'    => esc_html__( 'Maven Pro, sans-serif', 'dikka-business' ),
            'body-font-14'    => esc_html__( 'Cairo, serif', 'dikka-business' ),
            'body-font-15'    => esc_html__( 'Philosopher, sans-serif', 'dikka-business' ),
        );

        $output = apply_filters( 'dikka_business_body_typography_options', $choices );
        return $output;
    }
endif;


