<?php
/*--------------------------------------------------------------------*/
/*     Register Google Fonts
/*--------------------------------------------------------------------*/
function builderio_fonts_url() {
	
    $fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('Poppins:300,400,500,700','Hind:400,500,600,700');
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return esc_url_raw($fonts_url);
}
function builderio_scripts_styles() {
    wp_enqueue_style( 'google-fonts', builderio_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'builderio_scripts_styles' );
?>