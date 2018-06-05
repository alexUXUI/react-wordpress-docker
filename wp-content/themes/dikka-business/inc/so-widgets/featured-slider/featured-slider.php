<?php

class dikka_business_Featuredslider_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'dikka-business-featuredslider',
			__( 'DB: Featured Slider', 'dikka-business' ),
			array(
				'description' => __( 'Displays Full Width Slider', 'dikka-business' ),
			),
			array(),
			array(
				'posts' => array(
					'type'  => 'posts',
					'label' => __( 'Posts', 'dikka-business' ),
				),
				'settings' => array(
					'type'   => 'section',
					'label'  => __( 'Settings', 'dikka-business' ),
					'hide' => true,
					'fields' => array(
						'more_text' => array(
							'type'    => 'text',
							'label'   => __( 'Read More Text', 'dikka-business' ),
							'default' => __( 'Read more', 'dikka-business' ),
						),
		    			'disable_excerpt' => array(
							'type'  => 'checkbox',
							'label' => __( 'Disable Post Excerpt', 'dikka-business' ),
		    			),
		    			'disable_more_text' => array(
							'type'  => 'checkbox',
							'label' => __( 'Disable Read More Text', 'dikka-business' ),
		    			),
	    			),
				),
			)
		);

	}

	function get_template_name( $instance ) {
		return 'default';
	}
}

siteorigin_widget_register( 'dikka-business-featuredslider', __FILE__, 'dikka_business_Featuredslider_Widget' );
