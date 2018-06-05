<?php
/**
 * @package Builderio
 */

// Register Widget

if ( ! function_exists( 'builderio_register_widget' ) ) :

    function builderio_register_widget() {

        register_widget( 'Builderio_Get_A_Quote' );
		register_widget( 'Builderio_Counter' );
		register_widget( 'Builderio_Recent_Blog_Post' );
		register_widget( 'Builderio_Our_Works' );
		register_widget( 'Builderio_Our_Service' );
		register_widget( 'Builderio_Aboutus' );
		register_widget( 'Builderio_Testimonial' );
    }

endif;

add_action( 'widgets_init', 'builderio_register_widget' );

?>