<?php
/**
 * salient themes Theme Customizer
 *
 * @package salient themes
 * @subpackage eboost
 * @since eboost 1.0.0
 */
add_filter('salient_customizer_framework_url', 'eboost_customizer_framework_url');

if( ! function_exists( 'eboost_customizer_framework_url' ) ):

    function eboost_customizer_framework_url(){
        return trailingslashit( get_template_directory_uri() ) . 'inc/frameworks/salient-customizer/';
    }

endif;

add_filter('salient_customizer_framework_path', 'eboost_customizer_framework_path');

if( ! function_exists( 'eboost_customizer_framework_path' ) ):
    function eboost_customizer_framework_path(){
        return trailingslashit( get_template_directory() ) . 'inc/frameworks/salient-customizer/';
    }
endif;

/*define constant for coder-customizer-constant*/
if(!defined('salient_CUSTOMIZER_NAME')){
    define('salient_CUSTOMIZER_NAME','eboost-options');
}


/**
 * reset options
 * @param  array $reset_options
 * @return void
 *
 * @since eboost 1.0
 */
if ( ! function_exists( 'eboost_reset_options' ) ) :
    function eboost_reset_options( $reset_options ) {
        set_theme_mod( salient_CUSTOMIZER_NAME, $reset_options );
    }
endif;
/**
 * Customizer framework added.
 */
require get_template_directory().'/inc/frameworks/salient-customizer/salient-customizer.php';

global $eboost_panels;
global $eboost_sections;
global $eboost_settings_controls;
global $eboost_repeated_settings_controls;
global $eboost_customizer_defaults;


/******************************************
Home banner options
 *******************************************/
require get_template_directory().'/inc/customizer/home-banner/home-banner.php';

/******************************************
Home Service options
 *******************************************/
require get_template_directory().'/inc/customizer/home-service/service-panel.php';

/******************************************
Home about options
 *******************************************/
require get_template_directory().'/inc/customizer/home-about/home-about.php';

/******************************************
Home Testimonial options 
 *******************************************/
require get_template_directory().'/inc/customizer/home-testimonial/testimonial-panel.php';

/******************************************
Home Call back options 
 *******************************************/
require get_template_directory().'/inc/customizer/home-callback/callback-section.php';

/******************************************
Home Blog options 
 *******************************************/
require get_template_directory().'/inc/customizer/home-blog/home-blog-panel.php';


/******************************************
Theme options panel
 *******************************************/
require get_template_directory().'/inc/customizer/theme-options/option-panel.php';
/******************************************
Removing section setting control
 *******************************************/

$eboost_customizer_args = array(
    'panels'            => $eboost_panels, /*always use key panels */
    'sections'          => $eboost_sections,/*always use key sections*/
    'settings_controls' => $eboost_settings_controls,/*always use key settings_controls*/
    'repeated_settings_controls' => $eboost_repeated_settings_controls,/*always use key sections*/
);

/*registering panel section setting and control start*/
function eboost_add_panels_sections_settings() {
    global $eboost_customizer_args;
    return $eboost_customizer_args;
}
add_filter( 'salient_customizer_panels_sections_settings', 'eboost_add_panels_sections_settings' );
/*registering panel section setting and control end*/

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function eboost_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'eboost_customize_register' );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function eboost_customize_preview_js() {
    wp_enqueue_script( 'eboost-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20160105', true );
}
add_action( 'customize_preview_init', 'eboost_customize_preview_js' );



/**
 * get all saved options
 * @param  null
 * @return array saved options
 *
 * @since eboost 1.0
 */
if ( ! function_exists( 'eboost_get_all_options' ) ) :
    function eboost_get_all_options( $merge_default = 0 ) {
        $eboost_customizer_saved_values = salient_customizer_get_all_values( );
        if( 1 == $merge_default ){
            global $eboost_customizer_defaults;
            if(is_array( $eboost_customizer_saved_values )){
                $eboost_customizer_saved_values = array_merge($eboost_customizer_defaults, $eboost_customizer_saved_values );
            }
            else{
                $eboost_customizer_saved_values = $eboost_customizer_defaults;
            }
        }
        return $eboost_customizer_saved_values;
    }
endif;