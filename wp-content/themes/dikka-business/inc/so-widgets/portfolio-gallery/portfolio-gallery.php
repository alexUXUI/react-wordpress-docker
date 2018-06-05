<?php

class dikka_business_Portfolio_Gallery_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'dikka-business-portfolio-gallery',
			__( 'DB: Portfolio Gallery', 'dikka-business' ),
			array(
				'description' => __( 'Displays Gallery of Images', 'dikka-business' ),
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
			)
		);

	}

	function get_template_name( $instance ) {
		return 'default';
	}
}

siteorigin_widget_register( 'dikka-business-portfolio-gallery', __FILE__, 'dikka_business_Portfolio_Gallery_Widget' );
