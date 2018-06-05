<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dikka Business
 */

?>
<?php
$default_sidebar = apply_filters( 'dikka_business_filter_default_sidebar_id', 'sidebar-1', 'primary' );
?>
<div id="secondary" class="widget-area" role="complementary">
	<?php if ( is_active_sidebar( $default_sidebar ) ) :  ?>
		<?php dynamic_sidebar( $default_sidebar ); ?>
	<?php else : ?>
		<?php
			/**
			 * Hook - dikka_business_action_default_sidebar.
			 */
			do_action( 'dikka_business_action_default_sidebar', $default_sidebar, 'primary' );
		?>
	<?php endif ?>
</div><!-- #sidebar-primary -->
