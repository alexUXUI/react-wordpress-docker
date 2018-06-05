<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dikka Business
 */

	/**
	 * Hook - dikka_business_action_after_content.
	 *
	 * @hooked dikka_business_content_end - 10
	 */
	do_action( 'dikka_business_action_after_content' );
	?>

	<?php
	/**
	 * Hook - dikka_business_action_before_footer.
	 *
	 * @hooked dikka_business_footer_start - 10
	 */
	do_action( 'dikka_business_action_before_footer' );
	?>
    <?php
	  /**
	   * Hook - dikka_business_action_footer.
	   *
	   * @hooked dikka_business_footer_copyright - 10
	   */
	  do_action( 'dikka_business_action_footer' );
	?>
	<?php
	/**
	 * Hook - dikka_business_action_after_footer.
	 *
	 * @hooked dikka_business_footer_end - 10
	 */
	do_action( 'dikka_business_action_after_footer' );
	?>

<?php
	/**
	 * Hook - dikka_business_action_after.
	 *
	 * @hooked dikka_business_page_end - 10
	 * @hooked dikka_business_footer_goto_top - 20
	 */
	do_action( 'dikka_business_action_after' );
?>

<?php wp_footer(); ?>
</body>
</html>
