<?php
/**
 * Template for displaying search forms in Builderio
 *
 * @package Builderio
 * @version 1.0.6
 */

?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $unique_id ); ?>">
		<span class="screen-reader-text"><?php esc_attr_e( 'Search for:', 'builderio' ); ?></span>
        <input type="search" id="<?php echo esc_attr( $unique_id ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'builderio' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit">
    	<span class="screen-reader-text">
			<?php esc_attr_e( 'Search', 'builderio' ); ?>
        </span>
        <i class="fa fa-search" aria-hidden="true"></i>
    </button>
</form>
