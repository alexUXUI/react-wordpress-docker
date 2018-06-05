<?php
/**
 * Theme Options.
 *
 * @package Dikka Business
 */

$default = dikka_business_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => __( 'Theme Options', 'dikka-business' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

// Setting show_title.
$wp_customize->add_setting( 'theme_options[show_title]',
	array(
	'default'           => $default['show_title'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'dikka_business_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_title]',
	array(
	'label'    => __( 'Show Site Title', 'dikka-business' ),
	'section'  => 'title_tagline',
	'type'     => 'checkbox',
	'priority' => 25,
	)
);
// Setting show_tagline.
$wp_customize->add_setting( 'theme_options[show_tagline]',
	array(
	'default'           => $default['show_tagline'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'dikka_business_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_tagline]',
	array(
	'label'    => __( 'Show Tagline', 'dikka-business' ),
	'section'  => 'title_tagline',
	'type'     => 'checkbox',
	'priority' => 25,
	)
);

// Add Custom Theme Color setting and control.
$wp_customize->add_setting( 'theme_options[color_layout]', array(
	'default'           => $default['color_layout'],
	'sanitize_callback' => 'sanitize_hex_color',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_options[color_layout]', array(
	'label'             => esc_html__( 'Theme Color', 'dikka-business' ),
	'description'		=> 'Recommended Other Color Values: Green: #0CC752, Red: #ef4a2b, Blue: #3A85E9',
	'section'           => 'colors',
) ) );

// Layout Section.
$wp_customize->add_section( 'section_layout',
	array(
	'title'      => __( 'Layout Options', 'dikka-business' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting page_layout.
$wp_customize->add_setting( 'theme_options[page_layout]',
	array(
	'default'           => $default['page_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'dikka_business_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[page_layout]',
	array(
	'label'    => __( 'Post / Page Layout', 'dikka-business' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => dikka_business_get_page_layout_options(),
	'priority' => 100,
	)
);

// Pagination Section.
$wp_customize->add_section( 'section_pagination',
	array(
	'title'      => __( 'Pagination Options', 'dikka-business' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting pagination_type.
$wp_customize->add_setting( 'theme_options[pagination_type]',
	array(
	'default'           => $default['pagination_type'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'dikka_business_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[pagination_type]',
	array(
	'label'       => __( 'Blog Posts Pagination Type', 'dikka-business' ),
	'section'     => 'section_pagination',
	'type'        => 'select',
	'choices'     => dikka_business_get_pagination_type_options(),
	'priority'    => 100,
	)
);

// Footer Section.
$wp_customize->add_section( 'section_excerpt',
	array(
	'title'      => __( 'Excerpt Options', 'dikka-business' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting Excerpt Length.
$wp_customize->add_setting( 'theme_options[excerpt_length]',
	array(
	'default'           => $default['excerpt_length'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'dikka_business_sanitize_number_range',
	)
);

$wp_customize->add_control( 'theme_options[excerpt_length]',
	array(
		'label'    => __( 'Excerpt Length', 'dikka-business' ),
		'section'  => 'section_excerpt',
		'type'     => 'number',
		'choices'  => array(
			'min' => 25,
			'step'=> 5,
		),
	)
);

// Footer Section.
$wp_customize->add_section( 'section_footer',
	array(
	'title'      => __( 'Footer Options', 'dikka-business' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
	'default'           => $default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'dikka_business_sanitize_footer_content',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
	'label'    => __( 'Footer Copyright Text', 'dikka-business' ),
	'section'  => 'section_footer',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Typography Section
$wp_customize->add_section( 'section_typography',
	array(
		'title'      		=> esc_html__( 'Typography', 'dikka-business' ),
		'priority'   		=> 600,
		'panel'      		=> 'theme_option_panel',
	)
);

$wp_customize->add_setting( 'theme_options[theme_typography]',
	array(
		'default'    		=> $default['theme_typography'],
		'sanitize_callback'	=> 'dikka_business_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[theme_typography]',
    array(
		'label'       		=> esc_html__( 'Choose Heading Font Family', 'dikka-business' ),
		'section'     		=> 'section_typography',
		'settings'    		=> 'theme_options[theme_typography]',
		'type'		  		=> 'select',
		'choices'			=> dikka_business_typography_options(),
    )
);

$wp_customize->add_setting( 'theme_options[body_theme_typography]',
	array(
		'default'    		=> $default['body_theme_typography'],
		'sanitize_callback'	=> 'dikka_business_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[body_theme_typography]',
    array(
		'label'       		=> esc_html__( 'Choose Body Font Family', 'dikka-business' ),
		'section'     		=> 'section_typography',
		'settings'    		=> 'theme_options[body_theme_typography]',
		'type'		  		=> 'select',
		'choices'			=> dikka_business_body_typography_options(),
    )
);
