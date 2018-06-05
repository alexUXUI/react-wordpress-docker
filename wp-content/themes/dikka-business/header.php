<?php
/**
 * Displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dikka Business
 */

?><?php
	/**
	 * Hook - dikka_business_action_doctype.
	 *
	 * @hooked dikka_business_doctype -  10
	 */
	do_action( 'dikka_business_action_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - dikka_business_action_head.
	 *
	 * @hooked dikka_business_head -  10
	 */
	do_action( 'dikka_business_action_head' );
	?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	/**
	 * Hook - dikka_business_action_before.
	 *
	 * @hooked dikka_business_page_start - 10
	 * @hooked dikka_business_skip_to_content - 15
	 */
	do_action( 'dikka_business_action_before' );
	?>

    <?php
	  /**
	   * Hook - dikka_business_action_before_header.
	   *
	   * @hooked dikka_business_header_start - 10
	   */
	  do_action( 'dikka_business_action_before_header' );
	?>
		<?php
		/**
		 * Hook - dikka_business_action_header.
		 *
		 * @hooked dikka_business_site_branding - 10
		 */
		do_action( 'dikka_business_action_header' );
		?>
    <?php
	  /**
	   * Hook - dikka_business_action_after_header.
	   *
	   * @hooked dikka_business_header_end - 10
	   * @hooked dikka_business_add_primary_navigation - 20
	   */
	  do_action( 'dikka_business_action_after_header' );
	?>

	<?php
	/**
	 * Hook - dikka_business_action_before_content.
	 *
	 * @hooked dikka_business_add_breadcrumb - 7
	 * @hooked dikka_business_content_start - 10
	 */
	do_action( 'dikka_business_action_before_content' );
	?>
    <?php
	  /**
	   * Hook - dikka_business_action_content.
	   */
	  do_action( 'dikka_business_action_content' );
	?>
