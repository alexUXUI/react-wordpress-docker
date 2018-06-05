<?php
/**
 * Theme Customizer.
 *
 * @package Dikka Business
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @since 1.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function dikka_business_customize_register( $wp_customize ) {

	// Load custom control function.
	require get_template_directory() . '/inc/customizer/controls.php';

	// Register custom section types.
	$wp_customize->register_section_type( 'dikka_business_Customize_Section_Upsell' );

	// Register section.
	$wp_customize->add_section(
		new dikka_business_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Dikka Business Pro', 'dikka-business' ),
				'pro_text' => esc_html__( 'Buy Pro', 'dikka-business' ),
				'pro_url'  => 'http://www.creativthemes.com/downloads/dikka-business-pro/',
				'priority'  => 10,
			)
		)
	);

	// Load customize helpers.
	require get_template_directory() . '/inc/layout-option.php';

	// Load customize sanitize.
	require get_template_directory() . '/inc/customizer/sanitize.php';

	// Load customize callback.
	require get_template_directory() . '/inc/customizer/callback.php';

	// Load customize option.
	require get_template_directory() . '/inc/customizer/option.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

}
add_action( 'customize_register', 'dikka_business_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since 1.0
 */
function dikka_business_customize_preview_js() {

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_script( 'dikka-business-customizer', get_template_directory_uri() . '/assets/js/customizer' . $min . '.js', array( 'customize-preview' ), '1.1', true );

}
add_action( 'customize_preview_init', 'dikka_business_customize_preview_js' );

/**
 * Enqueue styles on customizer preview.
 */
function dikka_business_customizer_styles() {
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	if ( is_customize_preview() ) {
		// Add custom css for customizer
		wp_enqueue_style( 'dikka-business-customizer', get_template_directory_uri() . '/assets/css/customizer'. $min .'.css' );
	}
}
add_action( 'customize_controls_print_styles', 'dikka_business_customizer_styles' );


/**
 * Add update to pro button
 */
function dikka_business_update_button() {
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	wp_register_script( 'dikka-business-update-button-scripts', get_template_directory_uri() . '/assets/js/update-pro'. $min .'.js', array("jquery"), '20120206', true  );

	wp_localize_script( 'dikka-business-update-button-scripts', 'updateButtonObj', array(

		'pro' => __('Update to PRO version','dikka-business')

	) );

	wp_enqueue_script( 'dikka-business-update-button-scripts' );
}
add_action( 'customize_controls_enqueue_scripts', 'dikka_business_update_button' );

if ( ! function_exists( 'dikka_business_inline_css' ) ) :
	// Add Custom Css
	function dikka_business_inline_css() {
		
		$color_layout = dikka_business_get_option( 'color_layout' );
		$color_layout_css = '';
		if ( ( '#fc7f0b' == $color_layout ) ) {
			$color_layout = '';
		}

		if ( ! empty( $color_layout ) ) {
			$color_layout_css = '

			/*---------------------------------------------------
			Choose Theme Color
			---------------------------------------------------*/
			a,
			.btn-default,
			.widget_featured_slider .entry-title a:hover,
			.widget_featured_slider .entry-title a:focus,
			.navbar-brand:hover .navbar-brand:hover
			.navbar-brand:hover .navbar-brand:focus,
			b.fn a:hover,
			b.fn a:focus,
			.sow-accordion-title,
			.sow-accordion-panel-header:before,
			.each-faq.open .faq-trigger:before,
			.each-faq.open .faq-trigger h5,
			.team-item h4 a:hover,
			.team-item h4 a:focus,
			.testimonial-wrapper .position .client-name a:hover,
			.testimonial-wrapper .position .client-name a:focus,
			#latest-post .entry-title a:hover,
			#latest-post .entry-title a:focus,
			.cat-links a:hover,
			.cat-links a:focus,
			ul.address-block li a:hover,
			ul.address-block li a:focus,
			ul.address-block i,
			body:not(.siteorigin-panels) .template-wrapper .entry-title a:hover,
			body:not(.siteorigin-panels) .template-wrapper .entry-title a:focus,
			.entry-meta a:hover,
			.entry-meta a:focus,
			.blog-archive-wrapper article .entry-title a:hover,
			.blog-archive-wrapper article .entry-title a:focus,
			span.comments-link a:hover:before,
			span.comments-link a:focus:before,
			span.byline a:hover:before,
			span.byline a:focus:before,
			.blog-archive-wrapper span.posted-on a:hover:before,
			.blog-archive-wrapper span.posted-on a:focus:before,
			.single-post-wrapper span.posted-on a:hover:before,
			.single-post-wrapper span.posted-on a:focus:before,
			#secondary .widget a:hover,
			#secondary .widget a:focus,
			.comment-reply-link,
			.big-title,
			#footer-widgets a:hover,
			#footer-widgets a:focus,
			.site-info a:hover,
			.site-info a:focus,
			#secondary .widget ul li:hover:before,
			#footer-widgets .widget ul li:hover:before,
			#site-navigation li.current_page_item > a,
			#site-navigation li.current-menu-item > a,
			#site-navigation li a:hover,
			#site-navigation li a:focus {
			    color: '.esc_attr( $color_layout ).';
			} 
			@media screen and (min-width: 992px){
				#site-navigation ul li.menu-item-has-children:hover > a,
				#site-navigation ul ul li.menu-item-has-children:hover > a {
			    	color: '.esc_attr( $color_layout ).';
				}
				.main-navigation ul ul > li > a:focus, 
			    .main-navigation ul ul > li > a:hover {
					background-color: '.esc_attr( $color_layout ).';
			    }
			}
			@media screen and (min-width: 567px){
				.site-branding:after {
					background-color: '.esc_attr( $color_layout ).';
				}
			}
			.ow-pt-price {
			    color: '.esc_attr( $color_layout ).' !important;
			}
			.site-branding,
			button,
			input[type="button"],
			input[type="reset"],
			input[type="submit"],
			button:focus,
			input[type="button"]:focus,
			input[type="reset"]:focus,
			input[type="submit"]:focus,
			button:active,
			input[type="button"]:active,
			input[type="reset"]:active,
			input[type="submit"]:active,
			a.post-edit-link,
			.site-branding:before,
			.site-branding:after,
			.site-main .navigation .nav-links .page-numbers,
			.site-main .navigation .nav-links a,
			.btn,
			.btn-primary,
			.slick-prev,
			.slick-next,
			.slick-prev:focus,
			.slick-next:focus,
			.slick-dots li.slick-active button:before,
			.sow-features-feature .sow-icon-container span,
			.sow-icon-container span,
			.statwrap span:not(.stat-count),
			.progress-bar.custom_progress_bar,
			.portfolio-title,
			#client-testimonial .slick-dots li.slick-active button:before,
			.wpcf7 input[type="submit"],
			.widget_social_medias li a,
			.backtotop {
				background-color: '.esc_attr( $color_layout ).';
			}
			.ow-button-hover,
			input.sow-submit,
			.ow-pt-button a:hover,
			.ow-pt-button a:focus {
				background-color: '.esc_attr( $color_layout ).' !important;
			}
			.main-navigation ul ul {
				border-top-color: '.esc_attr( $color_layout ).';
			}
			.sow-accordion-panel-header {
				border-bottom-color: '.esc_attr( $color_layout ).';
			}
			.sow-contact-form input:not(.sow-submit):focus,
			.sow-contact-form textarea:focus {
				border-color: '.esc_attr( $color_layout ).' !important;
			}
			button,
			input[type="button"],
			input[type="reset"],
			input[type="submit"],
			button:hover,
			input[type="button"]:hover,
			input[type="reset"]:hover,
			input[type="submit"]:hover,
			button:focus,
			input[type="button"]:focus,
			input[type="reset"]:focus,
			input[type="submit"]:focus,
			button:active,
			input[type="button"]:active,
			input[type="reset"]:active,
			input[type="submit"]:active,
			input[type="text"]:focus,
			input[type="email"]:focus,
			input[type="url"]:focus,
			input[type="password"]:focus,
			input[type="search"]:focus,
			input[type="number"]:focus,
			input[type="tel"]:focus,
			input[type="range"]:focus,
			input[type="date"]:focus,
			input[type="month"]:focus,
			input[type="week"]:focus,
			input[type="time"]:focus,
			input[type="datetime"]:focus,
			input[type="datetime-local"]:focus,
			input[type="color"]:focus,
			textarea:focus,
			.site-main .navigation .nav-links .page-numbers,
			.site-main .navigation .nav-links a,
			.sow-features-feature .sow-icon-container span,
			.sow-icon-container span,
			.each-faq.open .faq-trigger,
			.widget_tag ul li:hover a,
			.backtotop {
				border-color: '.esc_attr( $color_layout ).';
			}';
		}

		$css = $color_layout_css;	
		wp_add_inline_style( 'dikka-business-style', $css );
	}
endif;
add_action( 'wp_enqueue_scripts', 'dikka_business_inline_css', 10 );

