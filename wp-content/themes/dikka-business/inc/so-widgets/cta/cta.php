<?php

class dikka_business_Cta_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'dikka-business-cta',
			__( 'DB: Call to action', 'dikka-business' ),
			array(
				'description' => __( 'Displays Call to Action', 'dikka-business' ),
				),
			array(),
			array(
				'title' => array(
					'type'  => 'text',
					'label' => __( 'Enter Heading', 'dikka-business' ),
				),
				'description' => array(
					'type'  => 'text',
					'label' => __( 'Enter Sub-Heading', 'dikka-business' ),
				),
				'buttonOne_title' => array(
					'type'  => 'text',
					'label' => __( 'Enter Button 1 Name', 'dikka-business' ),
				),
				'buttonOne_url' => array(
					'type'  => 'link',
					'label' => __( 'Enter Button 1 Url', 'dikka-business' ),
				),
			)
		);

	}

	function get_template_name( $instance ) {
		return 'default';
	}
}

siteorigin_widget_register( 'dikka-business-cta', __FILE__, 'dikka_business_Cta_Widget' );
