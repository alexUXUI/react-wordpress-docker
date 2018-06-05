<?php

class dikka_business_Latest_News_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'dikka-business-latest-news',
			__( 'DB: Latest News', 'dikka-business' ),
			array(
				'description' => __( 'Displays latest posts in grid', 'dikka-business' ),
			),
			array(),
			array(
				'section_title' => array(
					'type' => 'text',
					'label' => __( 'Title', 'dikka-business' ),
				),
				'posts' => array(
					'type'  => 'posts',
					'label' => __( 'Posts', 'dikka-business' ),
				),
				'settings' => array(
					'type'   => 'section',
					'label'  => __( 'Settings', 'dikka-business' ),
					'hide' => true,
					'fields' => array(
					    'featured_image' => array(
							'type'    => 'select',
							'label'   => __( 'Image Size', 'dikka-business' ),
							'default' => 'medium',
							'options' =>  array( 'disable', 'thumbnail', 'medium' ),
						),
						'more_text' => array(
							'type'    => 'text',
							'label'   => __( 'Read More Text', 'dikka-business' ),
							'default' => __( 'Read more', 'dikka-business' ),
						),
						'disable_date' => array(
							'type'  => 'checkbox',
							'label' => __( 'Disable Date in Post', 'dikka-business' ),
		    			),
		    			'disable_comment' => array(
							'type'  => 'checkbox',
							'label' => __( 'Disable Comment in Post', 'dikka-business' ),
		    			),
		    			'disable_excerpt' => array(
							'type'  => 'checkbox',
							'label' => __( 'Disable Post Excerpt', 'dikka-business' ),
		    			),
		    			'disable_date' => array(
							'type'  => 'checkbox',
							'label' => __( 'Disable Date in Post', 'dikka-business' ),
		    			),
		    			'disable_more_text' => array(
							'type'  => 'checkbox',
							'label' => __( 'Disable Read More Text', 'dikka-business' ),
		    			),
	    			),
				),
			),
			plugin_dir_path( __FILE__ )
		);
	}

	function get_template_name( $instance ) {
		return 'default';
	}
}

siteorigin_widget_register( 'dikka-business-latest-news', __FILE__, 'dikka_business_Latest_News_Widget' );
