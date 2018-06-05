<?php

class dikka_business_Team_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'dikka-business-team',
			__( 'DB: Team', 'dikka-business' ),
			array(
				'description' => __( 'Displays List of Team Members', 'dikka-business' ),
			),
			array(),
			array(
				'section_title' => array(
					'type'  => 'text',
					'label' => __( 'Enter Team Section Title', 'dikka-business' ),
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

siteorigin_widget_register( 'dikka-business-team', __FILE__, 'dikka_business_Team_Widget' );
