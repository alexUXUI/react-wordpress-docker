<?php
/**
 * Displays footer widgets if assigned
 *
 * @package Builderio
 * @version 1.0.6
 */

?>
<?php 
	$column_count = 0;
	for ( $i = 1; $i <= 4; $i++ ) {
	if ( is_active_sidebar( 'footer-' . $i ) ) {
		$column_count++;
		}
	}
?>
<div class="footer-top">
    <div class="container">
        <div class="row footer-wrap">
            <?php
                //$column_class = 'widget-column footer-active-' . absint( $column_count );
                for ( $i = 1; $i <= 4 ; $i++ ) {
                    if ( is_active_sidebar( 'footer-' . $i ) ) {
                
                    if($column_count == '1'){
                         $size = '12';
                        }
                        elseif($column_count == '2'){
                            $size = '6';
                        }
                        elseif($column_count == '3'){
                            $size = '4';
                        }
                        else{
                            $size = '3';
                        }
                ?>
                <div class="col-lg-<?php echo esc_attr( $size ); ?> col-md-<?php if($size == '3'): echo esc_attr( '6' ); elseif($size == '4'): 
				echo esc_attr('4'); else : echo esc_attr( $size ) ; endif ;?> ">
                    <div class="footer-column footer-active-<?php echo esc_attr( $column_count );?>" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'builderio' ); ?>">
                            
                        <?php dynamic_sidebar( 'footer-' . $i ); ?>
                               
                    </div>
                 </div>
                 <?php
                    }
                }
            ?>
        </div>
    </div>
</div>