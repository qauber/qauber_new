<?php
if ( ! function_exists( 'eboost_set_global' ) ) :
/**
 * Setting global values for all saved customizer values
 *
 * @since Eboost 1.0.0
 *
 * @param null
 * @return null
 *
 */
function eboost_set_global() {
    /*Getting saved values start*/
    $GLOBALS['eboost_customizer_all_values'] = eboost_get_all_options(1);
}
endif;
add_action( 'eboost_action_before_head', 'eboost_set_global', 0 );

if ( ! function_exists( 'eboost_doctype' ) ) :
/**
 * Doctype Declaration
 *
 * @since Eboost 1.0.0
 *
 * @param null
 * @return null
 *
 */
function eboost_doctype() {
    ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
<?php
}
endif;
add_action( 'eboost_action_before_head', 'eboost_doctype', 10 );

if ( ! function_exists( 'eboost_before_wp_head' ) ) :
/**
 * Before wp head codes
 *
 * @since Eboost 1.0.0
 *
 * @param null
 * @return null
 *
 */
function eboost_before_wp_head() {
    ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php
}
endif;
add_action( 'eboost_action_before_wp_head', 'eboost_before_wp_head', 10 );

if( ! function_exists( 'eboost_default_layout' ) ) :
    /**
     * Eboost default layout function
     *
     * @since  Eboost 1.0.0
     *
     * @param int
     * @return string
     */
    function eboost_default_layout( $post_id = null ){

        global $eboost_customizer_all_values,$post;
        $eboost_default_layout = $eboost_customizer_all_values['eboost-default-layout'];
        if( is_home()){
            $post_id = get_option( 'page_for_posts' );
        }
        if( null == $post_id && isset ( $post->ID ) ){
            $post_id = $post->ID;
        }
        $eboost_default_layout_meta = get_post_meta( $post_id, 'eboost-default-layout', true );

        if( false != $eboost_default_layout_meta ) {
            $eboost_default_layout = $eboost_default_layout_meta;
        }
        return $eboost_default_layout;
    }
endif;

if ( ! function_exists( 'eboost_body_class' ) ) :
/**
 * add body class
 *
 * @since Eboost 1.0.0
 *
 * @param null
 * @return null
 *
 */
function eboost_body_class( $eboost_body_classes ) {
    if(!is_front_page() || ( is_front_page())){
        $eboost_default_layout = eboost_default_layout();
        if( !empty( $eboost_default_layout ) ){
            if( 'left-sidebar' == $eboost_default_layout ){
                $eboost_body_classes[] = 'salient-left-sidebar';
            }
            elseif( 'right-sidebar' == $eboost_default_layout ){
                $eboost_body_classes[] = 'salient-right-sidebar';
            }
            elseif( 'both-sidebar' == $eboost_default_layout ){
                $eboost_body_classes[] = 'salient-both-sidebar';
            }
            elseif( 'no-sidebar' == $eboost_default_layout ){
                $eboost_body_classes[] = 'salient-no-sidebar';
            }
            else{
                $eboost_body_classes[] = 'salient-right-sidebar';
            }
        }
        else{
            $eboost_body_classes[] = 'salient-right-sidebar';
        }
    }
    return $eboost_body_classes;

}
endif;
add_action( 'body_class', 'eboost_body_class', 10, 1);

if ( ! function_exists( 'eboost_before_page_start' ) ) :
/**
 * intro loader
 *
 * @since Eboost 1.0.0
 *
 * @param null
 * @return null
 *
 */
function eboost_before_page_start() {
    global $eboost_customizer_all_values;
    /*intro loader*/
}
endif;
add_action( 'eboost_action_before', 'eboost_before_page_start', 10 );

if ( ! function_exists( 'eboost_page_start' ) ) :
/**
 * page start
 *
 * @since Eboost 1.0.0
 *
 * @param null
 * @return null
 *
 */
function eboost_page_start() {
?>
    <div id="page" class="site">
<?php
}
endif;
add_action( 'eboost_action_before', 'eboost_page_start', 15 );

if ( ! function_exists( 'eboost_skip_to_content' ) ) :
/**
 * Skip to content
 *
 * @since Eboost 1.0.0
 *
 * @param null
 * @return null
 *
 */
function eboost_skip_to_content() {
    ?>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'eboost' ); ?></a>
<?php
}
endif;
add_action( 'eboost_action_before_header', 'eboost_skip_to_content', 10 );

if ( ! function_exists( 'eboost_header' ) ) :
/**
 * Main header
 *
 * @since Eboost 1.0.0
 *
 * @param null
 * @return null
 *
 */
function eboost_header() {
    global $eboost_customizer_all_values;
    global $wp_version;
    global $post;
    ?>
        <header id="masthead" class="wrapper site-header" role="banner">
            <?php if (  is_front_page() && !is_home() ) { do_action('eboost_header_section'); } ?>  
            <?php if( 1 != $eboost_customizer_all_values['eboost-home-banner-enable'] ){
                $eboost_menu_fix = 'eboost-menu-black';
            } else {
                $eboost_menu_fix = '';
            } ?>
            <div id="main-menu" class="eboost-main-menu-wrapper <?php echo esc_attr( $eboost_menu_fix ); ?>">          
                <div class="container main-menu">
                    <div class="row">
                        <!-- site branding -->
                        <div class="col-xs-9 col-sm-12 col-md-4">
                            <div class="site-branding">
                                        <?php eboost_the_custom_logo(); ?>
                                        <?php if ( is_front_page() && is_home() ) : ?>
                                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                        <?php else : ?>
                                            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                        <?php endif;

                                        $description = get_bloginfo( 'description', 'display' );
                                        if ( $description || is_customize_preview() ) : ?>
                                            <h2 class="site-description"><?php echo esc_html($description); ?></h2>
                                        <?php endif;
                                ?>
                            </div><!-- .site-branding -->
                        </div><!-- .col-md-3 -->

                        <div class="col-xs-12 col-sm-12 col-md-8 cleaxfix">                            
                            <nav class="nav main-navigation">
                                <div class="nav-mobile">
                                  <i class="fa fa-bars"></i>
                                </div>
                              <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
                            </nav>                 
                        </div><!-- .col-md-9 -->
                    </div>
                </div>
           </div> 
        </header>
    <?php if (  !is_front_page() && is_home() ) { ?>
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

    <?php } else if (!is_front_page()) {
        do_action('eboost-page-inner-title');
    }?>

<?php 
}
endif;
add_action( 'eboost_action_header', 'eboost_header', 10 );

if( ! function_exists( 'eboost_add_breadcrumb' ) ) :

/**
 * Breadcrumb
 *
 * @since Eboost 1.0.0
 *
 * @param null
 * @return null
 *
 */
    function eboost_add_breadcrumb(){
        global $eboost_customizer_all_values;
        // Bail if Breadcrumb disabled
        $breadcrumb_enable_breadcrumb = $eboost_customizer_all_values['eboost-enable-breadcrumb' ];
        if ( 1 != $breadcrumb_enable_breadcrumb ) {
            return;
        }
        // Bail if Home Page
        if ( is_front_page() || is_home() ) {
            return;
        }
        echo '<div id="breadcrumb" class="breadcrumb-wrap">';
         eboost_simple_breadcrumb();
        echo '</div><!-- #breadcrumb -->';
    }
endif;
add_action( 'eboost_action_after_title', 'eboost_add_breadcrumb', 10 );


