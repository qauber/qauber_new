<?php
/**
 * The default template for displaying header
 *
 * @package salient themes
 * @subpackage Eboost
 * @since Eboost 1.0.0
 */

/**
 * eboost_action_before_head hook
 * @since Eboost 1.0.0
 *
 * @hooked eboost_set_global -  0
 * @hooked eboost_doctype -  10
 */
do_action( 'eboost_action_before_head' );?>



<head>

	<?php
	/**
	 * eboost_action_before_wp_head hook
	 * @since Eboost 1.0.0
	 *
	 * @hooked eboost_before_wp_head -  10
	 */
	do_action( 'eboost_action_before_wp_head' );

	wp_head();

	/**
	 * eboost_action_after_wp_head hook
	 * @since Eboost 1.0.0
	 *
	 * @hooked null
	 */
	do_action( 'eboost_action_after_wp_head' );
	?>

</head>

<body <?php body_class(); ?>>

<?php
/**
 * eboost_action_before hook
 * @since Eboost 1.0.0
 *
 * @hooked eboost_page_start - 15
 */
do_action( 'eboost_action_before' );

/**
 * eboost_action_before_header hook
 * @since Eboost 1.0.0
 *
 * @hooked eboost_skip_to_content - 10
 */
do_action( 'eboost_action_before_header' );

/**
 * eboost_action_header hook
 * @since Eboost 1.0.0
 *
 * @hooked eboost_after_header - 10
 */
do_action( 'eboost_action_header' );

/**
 * eboost_action_before_content hook
 * @since Eboost 1.0.0
 *
 * @hooked null
 */
do_action( 'eboost_action_before_content' );
?>
