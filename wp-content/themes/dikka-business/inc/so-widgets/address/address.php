<?php

class dikka_business_Address_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'dikka-business-address',
			__( 'DB: Contact Address', 'dikka-business' ),
			array(
				'description' => __( 'Displays Contact Address', 'dikka-business' ),
				),
			array(),
			array(
				'title' => array(
					'type'  => 'text',
					'label' => __( 'Enter Widget Title', 'dikka-business' ),
				),
				'location' => array(
					'type'  => 'text',
					'label' => __( 'Enter Location', 'dikka-business' ),
				),
				'phone' => array(
					'type'  => 'text',
					'label' => __( 'Enter Phone Number', 'dikka-business' ),
				),
				'email' => array(
					'type'  => 'text',
					'label' => __( 'Enter Email', 'dikka-business' ),
				),
			)
		);

	}

	function get_template_name( $instance ) {
		return 'default';
	}
}

siteorigin_widget_register( 'dikka-business-address', __FILE__, 'dikka_business_Address_Widget' );
