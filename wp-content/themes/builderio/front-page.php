<?php
get_header();

$builderio_featured_status  = builderio_get_option( 'builderio_featured_status' );

	if ( has_header_image() ) { ?>
		<div class="header-image">
			<img src="<?php esc_url( header_image() ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" alt="<?php esc_attr_e( 'header-banner', 'builderio' );?>" />
		</div>
	<?php } elseif( $builderio_featured_status == 1 ){
		get_template_part( 'template-parts/page/slider' ); 
	} 
	   
	if ( is_active_sidebar( 'sidebar-2' ) ) :
	 
		dynamic_sidebar( 'sidebar-2' ); 
		
	endif; 

get_footer(); ?>