<?php
/**
 * Displays footer site info
 *
 * @package Builderio
 * @version 1.0.6
 */

?>

<div class="site-info">
	<?php $copyright_text = builderio_get_option( 'copyright_text' ); 
    
        if ( ! empty( $copyright_text ) ) : ?>
    
            <p><?php echo wp_kses_data( $copyright_text ); ?></p> 
    
    <?php endif; ?>
        <a href="<?php echo esc_url( __( 'http://abileweb.com/', 'builderio' ) ); ?>"><?php printf( esc_html__( 'Designed by %s', 'builderio' ), 'Abileweb' ); ?></a>
</div><!-- .site-info -->
