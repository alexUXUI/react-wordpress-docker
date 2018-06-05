<?php
/**
 * Builderio: Customizer
 *
 * @package Builderio
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
add_action( 'customize_register', 'builderio_child_customize_register' );

function builderio_child_customize_register( WP_Customize_Manager $wp_customize ) {
/**
 * Category Dropdown.
 */
require_once trailingslashit( get_template_directory() ) .  '/include/dropdown-category.php';

}
 
 

function builderio_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_image'  )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'builderio_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'builderio_customize_partial_blogdescription',
	) );
	
	
	/**
	 * Theme options.
	 */
	 $default = builderio_default_theme_options();
	 
	 $wp_customize->add_panel( 'theme_option_panel',
		array(
			'title'      => esc_html__( 'Theme Options', 'builderio' ),
			'priority'   => 200,
			'capability' => 'edit_theme_options',
		)
	);
	//page loader section
	$wp_customize->add_section( 'builderio_pageloader_section',
		array(
			'title'      => esc_html__( 'Page Loader Options', 'builderio' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);
	
	// Setting header top.
	$wp_customize->add_setting( 'builderio_pageloader_status',
		array(
			'default'           => $default['builderio_pageloader_status'],
			'sanitize_callback' => 'builderio_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'builderio_pageloader_status',
		array(
			'label'    			=> esc_html__( 'Page Loader', 'builderio' ),
			'section'  			=> 'builderio_pageloader_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);
	//page loader image
	$wp_customize->add_setting('builderio_pageloader_image',
		array(
			'default' 		=> $default['builderio_pageloader_image'],
			'transport'		=> 'refresh',
			'height'        => 300,
			'width'        => 300,
			'sanitize_callback' => 'esc_url_raw',
    ));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'builderio_pageloader_image', array(
        'label' 		=> __('Page Loader Image', 'builderio'),
		'description' 	=> 'maximum size 300x300',
        'section' 		=> 'builderio_pageloader_section',
        'settings' 		=> 'builderio_pageloader_image',
    )));
	
	// Header Section.
	$wp_customize->add_section( 'builderio_header_section',
		array(
			'title'      => esc_html__( 'Header Options', 'builderio' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);
	
	// Setting header top.
	$wp_customize->add_setting( 'builderio_show_top_header',
		array(
			'default'           => $default['builderio_show_top_header'],
			'sanitize_callback' => 'builderio_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'builderio_show_top_header',
		array(
			'label'    			=> esc_html__( 'Header Top', 'builderio' ),
			'section'  			=> 'builderio_header_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);
	
	// Setting sticky header.
	$wp_customize->add_setting( 'builderio_sticky_header_status',
		array(
			'default'           => $default['builderio_sticky_header_status'],
			'sanitize_callback' => 'builderio_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'builderio_sticky_header_status',
		array(
			'label'    			=> esc_html__( 'Sticky Header', 'builderio' ),
			'section'  			=> 'builderio_header_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);
	
	//social link setting
	$wp_customize->add_setting( 'builderio_header_social_links',
		array(
			'default'           => $default['builderio_header_social_links'],
			'sanitize_callback' => 'builderio_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'builderio_header_social_links',
		array(
			'label'    			=> esc_html__( 'Social Links', 'builderio' ),
			'section'  			=> 'builderio_header_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);
	
	// Setting facebook.
	$wp_customize->add_setting( 'builderio_header_facebook_url',
		array(
		
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control( 'builderio_header_facebook_url',
		array(
			'label'    		=> esc_html__( 'facebook', 'builderio' ),
			'description'      =>  __( 'e.g: http://example.com', 'builderio' ),
			'section'  		  => 'builderio_header_section',
			'type'     		 => 'url',
			'priority' 		 => 100
		)
	);
	
	// Setting twitter.
	$wp_customize->add_setting( 'builderio_header_twitter_url',
		array(
		
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control( 'builderio_header_twitter_url',
		array(
			'label'    		=> esc_html__( 'Twitter', 'builderio' ),
			'description'      =>  __( 'e.g: http://example.com', 'builderio' ),
			'section'  		  => 'builderio_header_section',
			'type'     		 => 'url',
			'priority' 		 => 100
		)
	);
	
	// Setting instagram.
	$wp_customize->add_setting( 'builderio_header_instagram_url',
		array(
		
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control( 'builderio_header_instagram_url',
		array(
			'label'    		=> esc_html__( 'Instagram', 'builderio' ),
			'description'      =>  __( 'e.g: http://example.com', 'builderio' ),
			'section'  		  => 'builderio_header_section',
			'type'     		 => 'url',
			'priority' 		 => 100
		)
	);
	
	// Setting google_plus.
	$wp_customize->add_setting( 'builderio_header_google_url',
		array(
		
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control( 'builderio_header_google_url',
		array(
			'label'    		=> esc_html__( 'Google Plus', 'builderio' ),
			'description'      =>  __( 'e.g: http://example.com', 'builderio' ),
			'section'  		  => 'builderio_header_section',
			'type'     		 => 'url',
			'priority' 		 => 100
		)
	);

	//setting recent post
	$wp_customize->add_setting( 'builderio_show_header_trending_post',
		array(
			'default'           => $default['builderio_show_header_trending_post'],
			'sanitize_callback' => 'builderio_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'builderio_show_header_trending_post',
		array(
			'label'    			=> esc_html__( 'Trending Post', 'builderio' ),
			'section'  			=> 'builderio_header_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);
	
	// Setting post title.
	$wp_customize->add_setting( 'builderio_header_trending_title',
		array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'builderio_header_trending_title',
		array(
			'label'    => esc_html__( 'Title', 'builderio' ),
			'section'  => 'builderio_header_section',
			'type'     => 'text',
			'priority' => 100,
		)
	);
	
	$wp_customize->add_setting( 'builderio_header_dropdown_category', array(
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( new Builderio_Dropdown_Category_Control( $wp_customize, 'builderio_header_dropdown_category', array(
		'section'       => 'builderio_header_section',
		'label'         => esc_html__( 'Select Category', 'builderio' ),
		'priority' 	  => 100,
	) ) );
	
	// Setting trending_post_number.
	$wp_customize->add_setting( 'builderio_header_trending_post_count',
		array(
			'sanitize_callback' => 'builderio_sanitize_positive_integer',
		)
	);
	$wp_customize->add_control( 'builderio_header_trending_post_count',
		array(
			'label'           => esc_html__( 'Number of Posts', 'builderio' ),
			'section'         => 'builderio_header_section',
			'type'            => 'number',
			'priority'        => 100,
			'input_attrs'     => array( 'min' => 1, 'max' => 10, 'style' => 'width: 55px;' ),
		)
	);
	
	// Breadcrumb Section.
	$wp_customize->add_section( 'section_breadcrumb',
		array(
			'title'      => esc_html__( 'Breadcrumb Options', 'builderio' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);
	
	// Setting breadcrumb_type.
	$wp_customize->add_setting( 'breadcrumb_type',
		array(
			'default'           => $default['breadcrumb_type'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'builderio_sanitize_select',
		)
	);
	
	$wp_customize->add_control( 'breadcrumb_type',
		array(
			'label'       => esc_html__( 'Breadcrumb Type', 'builderio' ),
			'section'     => 'section_breadcrumb',
			'type'        => 'radio',
			'priority'    => 100,
			'choices'     => array(
				'disable' => esc_html__( 'Disable', 'builderio' ),
				'normal'  => esc_html__( 'Normal', 'builderio' ),
			),
		)
	);

	
	// Footer Section.
	$wp_customize->add_section( 'section_footer',
		array(
			'title'      => esc_html__( 'Footer Options', 'builderio' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);
	
	// Setting copyright_text.
	$wp_customize->add_setting( 'copyright_text',
		array(
			'default'           => $default['copyright_text'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'copyright_text',
		array(
			'label'    => esc_html__( 'Copyright Text', 'builderio' ),
			'section'  => 'section_footer',
			'type'     => 'text',
			'priority' => 100,
		)
	);
	
	// Back To Top Section.
	$wp_customize->add_section( 'section_back_to_top',
		array(
			'title'      => esc_html__( 'Back To Top Options', 'builderio' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);
	
	// Setting breadcrumb_type.
	$wp_customize->add_setting( 'back_to_top_type',
		array(
			'default'           => $default['back_to_top'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'builderio_sanitize_select',
		)
	);
	
	$wp_customize->add_control( 'back_to_top_type',
		array(
			'label'       => esc_html__( 'Active?', 'builderio' ),
			'section'     => 'section_back_to_top',
			'type'        => 'radio',
			'priority'    => 100,
			'choices'     => array(
				'disable' => esc_html__( 'Disable', 'builderio' ),
				'enable'  => esc_html__( 'Enable', 'builderio' ),
			),
		)
	);
	
	// Slider Section.
	$wp_customize->add_section( 'builderio_post_slider',
		array(
			'title'      => esc_html__( 'Post Slider', 'builderio' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);
	
	// Setting slider.
	$wp_customize->add_setting( 'builderio_post_status',
		array(
			'default'           => $default['builderio_post_status'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'builderio_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'builderio_post_status',
		array(
			'label'       => esc_html__( 'Post Slider', 'builderio' ),
			'description' => esc_html__('Note: Hide Header Image If you Want Post Slider.', 'builderio' ),
			'section'     => 'builderio_post_slider',
			'type'        => 'checkbox',
			'priority'    => 100		
		)
	);
	
	
	//post count
	$wp_customize->add_setting( 'builderio_post_count',
		array(
			'default'           => absint( $default['builderio_post_count'] ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'builderio_sanitize_select',
		)
	);
	
	$wp_customize->add_control( 'builderio_post_count',
		array(
			'label'       => esc_html__( 'Number Of Slider', 'builderio' ),
			'section'     => 'builderio_post_slider',
			'type'        => 'select',
			'priority'    => 100,
			'choices'     => array(
				'2' => esc_html__( '2', 'builderio' ),
				'3'  => esc_html__( '3', 'builderio' ),
				'4'  => esc_html__( '4', 'builderio' ),
				'5'  => esc_html__( '5', 'builderio' )
			),
		)
	);
	
	
	//post navigation
	$wp_customize->add_setting( 'builderio_post_navigation',
		array(
			'default'           => $default['builderio_post_navigation'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'builderio_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'builderio_post_navigation',
		array(
			'label'       => esc_html__( 'Post Navigation', 'builderio' ),
			'section'     => 'builderio_post_slider',
			'type'        => 'checkbox',
			'priority'    => 100
		)
	);
	
	//post pagination
	$wp_customize->add_setting( 'builderio_post_pagination',
		array(
			'default'           => $default['builderio_post_pagination'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'builderio_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'builderio_post_pagination',
		array(
			'label'       => esc_html__( 'Post Pagination', 'builderio' ),
			'section'     => 'builderio_post_slider',
			'type'        => 'checkbox',
			'priority'    => 100
		)
	);
	
	//post content
	$wp_customize->add_setting( 'builderio_post_content',
		array(
			'default'           => $default['builderio_post_content'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'builderio_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'builderio_post_content',
		array(
			'label'       => esc_html__( 'Post Content', 'builderio' ),
			'section'     => 'builderio_post_slider',
			'type'        => 'checkbox',
			'priority'    => 100
		)
	);
	
	//post time
	$wp_customize->add_setting( 'builderio_post_time',
		array(
			'default'           => $default['builderio_post_time'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'builderio_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'builderio_post_time',
		array(
			'label'       => esc_html__( 'Post Time', 'builderio' ),
			'section'     => 'builderio_post_slider',
			'type'        => 'checkbox',
			'priority'    => 100
		)
	);
	
	// Setting post_excerpt.
	$wp_customize->add_setting( 'builderio_post_excerpt',
		array(
			'default'           => absint( $default['builderio_post_excerpt'] ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'builderio_post_excerpt',
		array(
			'label'    => esc_html__( 'Post Excerpt', 'builderio' ),
			'section'  => 'builderio_post_slider',
			'type'     => 'text',
			'priority' => 100,
		)
	);
	
	
	//frontpage panel
	$wp_customize->add_panel( 'builderio_fontpage_section_panel',
		array(
			'title'      => esc_html__( 'Frontpage Section', 'builderio' ),
			'priority'   => 200,
			'capability' => 'edit_theme_options',
		)
	);
	//featured slider section
	
	/* Option list of all post */  
    $pages = array();
	$args = array(
		'sort_order' => 'desc',
		'sort_column' => 'post_title',
		'hierarchical' => 1,
		'meta_key' => '',
		'meta_value' => '',
		'child_of' => 0,
		'parent' => -1,
		'exclude_tree' => '',
		'number' => '',
		'offset' => 0,
		'post_type' => 'page',
		'post_status' => 'publish'
	); 
    $pages_obj = get_pages( $args );
    $pages[''] = esc_html__( 'Choose Page', 'builderio' );
    foreach ( $pages_obj as $posts ) {
    	$pages[$posts->ID] = $posts->post_title;
    }
	 
	$wp_customize->add_section( 'builderio_featured_slider',
		array(
			'title'      => esc_html__( 'Page Slider', 'builderio' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'builderio_fontpage_section_panel',
		)
	);
	
	// Setting slider.
	$wp_customize->add_setting( 'builderio_featured_status',
		array(
			'default'           => $default['builderio_featured_status'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'builderio_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'builderio_featured_status',
		array(
			'label'       => esc_html__( 'Enable Slider', 'builderio' ),
			'description' => esc_html__('Note: Hide Header Image If you Want Page Slider. How to create a slider :- First, when you create a page, Enter the page title, page descritpion or upload image to the page,if you have created a slider page, get it selected here. You can slide on only Frontpage', 'builderio' ),
			'section'     => 'builderio_featured_slider',
			'type'        => 'checkbox',
			'priority'    => 100		
		)
	);
	
	//Select Post One
	$wp_customize->add_setting('builderio_slider_post_one',
		array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=>'builderio_sanitize_select',
		)
	);
            
	$wp_customize->add_control('builderio_slider_post_one',
		array(
			'label'		=> esc_html__( 'Select Page One', 'builderio'),
			'section'	  => 'builderio_featured_slider',
			'type'  		 => 'select',
			'priority'    => 100,
			'choices'	  => $pages
		)
	);
	
	//Select Post Two
	$wp_customize->add_setting('builderio_slider_post_two',
		array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=>'builderio_sanitize_select',
		)
	);
            
	$wp_customize->add_control('builderio_slider_post_two',
		array(
			'label'		=> esc_html__( 'Select Page Two', 'builderio'),
			'section'	  => 'builderio_featured_slider',
			'type'  		 => 'select',
			'priority'    => 100,
			'choices'	  => $pages
		)
	);
	
	//Select Post Three
	$wp_customize->add_setting('builderio_slider_post_three',
		array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=>'builderio_sanitize_select',
		)
	);
            
	$wp_customize->add_control('builderio_slider_post_three',
		array(
			'label'		=> esc_html__( 'Select Page Three', 'builderio'),
			'section'	  => 'builderio_featured_slider',
			'type'  		 => 'select',
			'priority'    => 100,
			'choices'	  => $pages
		)
	);
	
	//page navigation
	$wp_customize->add_setting( 'builderio_featured_navigation',
		array(
			'default'           => $default['builderio_featured_navigation'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'builderio_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'builderio_featured_navigation',
		array(
			'label'       => esc_html__( 'Slider Navigation', 'builderio' ),
			'section'     => 'builderio_featured_slider',
			'type'        => 'checkbox',
			'priority'    => 100
		)
	);
	
	//page pagination
	$wp_customize->add_setting( 'builderio_featured_pagination',
		array(
			'default'           => $default['builderio_featured_pagination'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'builderio_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'builderio_featured_pagination',
		array(
			'label'       => esc_html__( 'Slider Pagination', 'builderio' ),
			'section'     => 'builderio_featured_slider',
			'type'        => 'checkbox',
			'priority'    => 100
		)
	);
	
	//page content
	$wp_customize->add_setting( 'builderio_featured_content',
		array(
			'default'           => $default['builderio_featured_content'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'builderio_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'builderio_featured_content',
		array(
			'label'       => esc_html__( 'Page Content', 'builderio' ),
			'section'     => 'builderio_featured_slider',
			'type'        => 'checkbox',
			'priority'    => 100
		)
	);
	
	// Setting page_excerpt.
	$wp_customize->add_setting( 'builderio_slider_excerpt',
		array(
			'default'           => absint( $default['builderio_slider_excerpt'] ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'builderio_slider_excerpt',
		array(
			'label'    => esc_html__( 'Slider Excerpt', 'builderio' ),
			'section'  => 'builderio_featured_slider',
			'type'     => 'text',
			'priority' => 100,
		)
	);
	
	//contact infobox
	$wp_customize->add_section( 'builderio_contact_infobox_section',
		array(
			'title'      => esc_html__( 'Contact Info Box', 'builderio' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'builderio_fontpage_section_panel',
		)
	);
	
	$wp_customize->add_setting( 'builderio_infobox_status',
		array(
			'default'           => $default['builderio_infobox_status'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'builderio_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'builderio_infobox_status',
		array(
			'label'       => esc_html__( 'Enable Contact Info Box', 'builderio' ),
			'section'     => 'builderio_contact_infobox_section',
			'type'        => 'checkbox',
			'priority'    => 100		
		)
	);
	
	//setting location title
	$wp_customize->add_setting( 'builderio_location_title',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'builderio_location_title',
		array(
			'label'       => esc_html__( 'Location Title', 'builderio' ),
			'section'     => 'builderio_contact_infobox_section',
			'type'        => 'text',
			'priority'    => 100		
		)
	);
	
	//setting location address
	$wp_customize->add_setting( 'builderio_location_address',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'builderio_location_address',
		array(
			'label'       => esc_html__( 'Location Address', 'builderio' ),
			'section'     => 'builderio_contact_infobox_section',
			'type'        => 'text',
			'priority'    => 100		
		)
	);
	
	//setting location icon
	$wp_customize->add_setting( 'builderio_location_icon',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'builderio_location_icon',
		array(
			'label'       => esc_html__( 'Location Icon', 'builderio' ),
			'section'     => 'builderio_contact_infobox_section',
			'type'        => 'text',
			'priority'    => 100		
		)
	);
	
	//setting mail title
	$wp_customize->add_setting( 'builderio_mail_title',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'builderio_mail_title',
		array(
			'label'       => esc_html__( 'Mail Title', 'builderio' ),
			'section'     => 'builderio_contact_infobox_section',
			'type'        => 'text',
			'priority'    => 100		
		)
	);
	
	//setting mail id
	$wp_customize->add_setting( 'builderio_mail_id',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_email',
		)
	);
	
	$wp_customize->add_control( 'builderio_mail_id',
		array(
			'label'       => esc_html__( 'Mail ID', 'builderio' ),
			'section'     => 'builderio_contact_infobox_section',
			'type'        => 'email',
			'priority'    => 100		
		)
	);
	
	//setting mail icon
	$wp_customize->add_setting( 'builderio_mail_icon',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'builderio_mail_icon',
		array(
			'label'       => esc_html__( 'Mail Icon', 'builderio' ),
			'section'     => 'builderio_contact_infobox_section',
			'type'        => 'text',
			'priority'    => 100		
		)
	);
	
	//setting contact title
	$wp_customize->add_setting( 'builderio_contact_title',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'builderio_contact_title',
		array(
			'label'       => esc_html__( 'Contact Title', 'builderio' ),
			'section'     => 'builderio_contact_infobox_section',
			'type'        => 'text',
			'priority'    => 100		
		)
	);
	
	//setting contact number
	$wp_customize->add_setting( 'builderio_contact_number',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'builderio_contact_number',
		array(
			'label'       => esc_html__( 'Contact Number', 'builderio' ),
			'section'     => 'builderio_contact_infobox_section',
			'type'        => 'text',
			'priority'    => 100		
		)
	);
	
	//setting contact number
	$wp_customize->add_setting( 'builderio_contact_icon',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'builderio_contact_icon',
		array(
			'label'       => esc_html__( 'Contact Icon', 'builderio' ),
			'section'     => 'builderio_contact_infobox_section',
			'type'        => 'text',
			'priority'    => 100		
		)
	);
		
}
add_action( 'customize_register', 'builderio_customize_register' );


/**
 * Sanitize the colorscheme.
 *
 * @param string $input Color scheme.
 */
function builderio_sanitize_colorscheme( $input ) {
	$valid = array( 'light', 'dark', 'custom' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'light';
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Builderio 1.0
 * @see builderio_customize_register()
 *
 * @return void
 */
function builderio_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Builderio 1.0
 * @see builderio_customize_register()
 *
 * @return void
 */
function builderio_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're previewing the front page and it's a static page.
 */
function builderio_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function builderio_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

if ( ! function_exists( 'builderio_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 *
	 * @since 1.0.0
	 *
	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	function builderio_sanitize_checkbox( $checked ) {

		return ( ( isset( $checked ) && true === $checked ) ? true : false );

	}

endif;

if ( ! function_exists( 'builderio_sanitize_positive_integer' ) ) :

	/**
	 * Sanitize positive integer.
	 *
	 * @since 1.0.0
	 *
	 * @param int                  $input Number to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return int Sanitized number; otherwise, the setting default.
	 */
	function builderio_sanitize_positive_integer( $input, $setting ) {

		$input = absint( $input );

		// If the input is an absolute integer, return it.
		// otherwise, return the default.
		return ( $input ? $input : $setting->default );

	}

endif;

if ( ! function_exists( 'builderio_sanitize_select' ) ) :

	/**
	 * Sanitize select.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed                $input The value to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return mixed Sanitized value.
	 */
	function builderio_sanitize_select( $input, $setting ) {

		// Ensure input is clean.
		$input = sanitize_text_field( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}

endif;


if ( ! function_exists( 'builderio_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function builderio_default_theme_options() {

		$defaults = array();

		//page loader
		$defaults['builderio_pageloader_status'] = false;
		
		//page loader image
		$defaults['builderio_pageloader_image'] = get_template_directory_uri() . '/assets/images/loader.gif';
		
		// Header.
		$defaults['builderio_show_top_header'] 	= false;
		
		//Header Sticky
		$defaults['builderio_sticky_header_status'] = false;
		
		//Header Social Links
		$defaults['builderio_header_social_links'] = false;
		
		//Header Recent Post
		$defaults['builderio_show_header_trending_post'] = false;
		
		//Back To Top
		$defaults['back_to_top']  	= 'disable';

		// Footer.
		$defaults['copyright_text'] 	= esc_html__( 'Copyright &copy; All rights reserved.', 'builderio' );

		// Breadcrumb.
		$defaults['breadcrumb_type'] 	= 'disable';
		
		//slider active
		$defaults['builderio_post_status'] = false;
		
		//post count
		$defaults['builderio_post_count'] = 2;
		
		//post navigation
		$defaults['builderio_post_navigation'] = true;
		
		//post pagination
		$defaults['builderio_post_pagination'] = true;
		
		//post content
		$defaults['builderio_post_content'] = false;
		
		//post date
		$defaults['builderio_post_time'] = false;
		
		//post excerpt
		$defaults['builderio_post_excerpt'] = 25;
		
		//featured slider
		$defaults['builderio_featured_status'] = false;
		
		//featured navigation
		$defaults['builderio_featured_navigation'] = true;
		
		//featured pagination
		$defaults['builderio_featured_pagination'] = true;
		
		//featured content
		$defaults['builderio_featured_content'] = true;
		
		//featured excerpt
		$defaults['builderio_slider_excerpt'] = 10;
		
		$defaults['builderio_infobox_status'] = false;
		
		return $defaults;
	}

endif;

if ( ! function_exists( 'builderio_is_top_header_active' ) ) :

	/**
	 * Check if featured slider is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function builderio_is_top_header_active( $control ) {

		if ( true == $control->manager->get_setting( 'builderio_show_top_header' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'builderio_get_option' ) ) :

	/**
	 * Get theme option.
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function builderio_get_option( $key ) {

		if ( empty( $key ) ) {

			return;

		}

		$value 			= '';

		$default 		= builderio_default_theme_options();

		$default_value 	= null;

		if ( is_array( $default ) && isset( $default[ $key ] ) ) {

			$default_value = $default[ $key ];

		}

		if ( null !== $default_value ) {

			$value = get_theme_mod( $key, $default_value );

		}else {

			$value = get_theme_mod( $key );

		}

		return $value;

	}

endif;
if ( ! function_exists( 'builderio_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see builderio_custom_header_setup().
 */
function builderio_header_style() { 

$header_text_color = get_header_textcolor();
	if( !empty( $header_text_color ) ): ?>
		<style type="text/css">
			   .site-header a,
			   .site-header p{
					color: #<?php echo esc_attr( $header_text_color ); ?>;
			   }
		</style>
			
		<?php
	endif;
}

endif;

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function builderio_customize_preview_js() {
	wp_enqueue_script( 'builderio-customize-preview', get_theme_file_uri( '/assets/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'builderio_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function builderio_panels_js() {
	wp_enqueue_script( 'builderio-customize-controls', get_theme_file_uri( '/assets/js/customize-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'builderio_panels_js' );
