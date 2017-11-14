<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 *
 * @package Eboost 
 * @since Eboost 1.0.0
 */


/**
 * eboost_action_after_content hook
 * @since Eboost 1.0.0
 *
 * @hooked null
 */
do_action( 'eboost_action_after_content' );

/**
 * eboost_action_before_footer hook
 * @since Eboost 1.0.0
 *
 * @hooked eboost_before_footer - 10
 */
do_action( 'eboost_action_before_footer' );

/**
 * eboost_action_widget_before_footer hook
 * @since Eboost 1.0.0
 *
 * @hooked eboost_widget_before_footer - 10
 */
do_action( 'eboost_action_widget_before_footer' );

/**
 * eboost_action_footer hook
 * @since Eboost 1.0.0
 *
 * @hooked eboost_footer - 10
 */
do_action( 'eboost_action_footer' );

/**
 * eboost_action_after_footer hook
 * @since Eboost 1.0.0
 *
 * @hooked null
 */
do_action( 'eboost_action_after_footer' );

/**
 * eboost_action_after hook
 * @since Eboost 1.0.0
 *
 * @hooked eboost_page_end - 10
 */
do_action( 'eboost_action_after' );
?>
<?php wp_footer(); ?>
</body>
</html>