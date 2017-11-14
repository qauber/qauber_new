<?php
/**
 * eboost functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package eboost
 */

/**
 * Get the path for the file ( to support child theme )
 *
 * @since eboost 1.0.0
 *
 * @param string $file_path, path from the theme
 * @return string full path of file inside theme
 *
 */
if( !function_exists('eboost_file_directory') ){
	function eboost_file_directory( $file_path ){

		if( file_exists( trailingslashit( get_stylesheet_directory() ) . $file_path) ){
			return trailingslashit( get_stylesheet_directory() ) . $file_path;
		}
		else{
			return trailingslashit( get_template_directory() ) . $file_path;
		}
	}
}

/**
 * require eboost int.
 */
require get_template_directory() . '/inc/init.php';

if ( ! function_exists( 'eboost_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function eboost_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on eboost-eye, use a find and replace
	 * to change 'eboost-eye' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'eboost', get_template_directory() . '/languages' );
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );


	/*
	 * Enable support for image sizes on posts and pages.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_image_size/
	 */
	add_image_size( 'eboost-main-banner', 1370, 650, true );
	add_image_size( 'eboost-blog', 900, 650, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'eboost' ),
        'social' => esc_html__( 'Social', 'eboost' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'eboost_custom_background_args', array(
		'default-color' => 'fff',
		'default-image' => '',
	) ) );

	/*implimenting new feature from 4.5*/
	add_theme_support( 'custom-logo', array(
	   'header-text' => array( 'site-title', 'site-description' ),
	   'height'      => 50,
	   'width'       => 165,
	   'flex-width' => true
	) );

	add_theme_support( 'custom-header', apply_filters( 'eboost_custom_header_args', array(
		'width'              => 1400,
		'height'             => 700,
		'flex-height'        => true,
		'video'              => true,
		'header-text'           => false,
	) ) );

}
endif;
add_action( 'after_setup_theme', 'eboost_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function eboost_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'eboost_content_width', 640 );
}
add_action( 'after_setup_theme', 'eboost_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */


function eboost_scripts() {
		wp_enqueue_style( 'eboost-style', get_stylesheet_uri() );
		/*google fonts*/
		wp_enqueue_style( 'eboost-google-fonts', '//fonts.googleapis.com/css?family=Gudea:400,400i,700|Magra:400,700');
		
	 	//  VARIABLES AND ARRAY
        $assets_url = get_template_directory_uri() .'/assets/';
        // REGISTER STYLE
	    wp_enqueue_style( 'bootstrap', $assets_url.'css/vendor/bootstrap.min.css');
	    wp_enqueue_style( 'font-awesome', $assets_url.'font-awesome/css/font-awesome.min.css', array(), '4.6.3' );
        wp_enqueue_style( 'slick', $assets_url.'css/vendor/slick.css');
        wp_enqueue_style( 'animation', $assets_url.'css/components/animation.css');
                
        // REGISTER SCRIPT
        wp_enqueue_script( 'jquery-bootstrap', $assets_url.'js/vender/bootstrap.min.js', array('jquery'), 'v3.3.6', true );
        wp_enqueue_script( 'jquery-slick', $assets_url.'js/vender/slick.js', array('jquery'));

        wp_enqueue_script( 'jquery-wow', $assets_url.'js/vender/wow.min.js', array('jquery'), '1.1.3', true );
        
        //ENQUEUE
        wp_enqueue_script( 'eboost-main', $assets_url.'js/main.js', array('jquery'),null,true );
        wp_enqueue_script( 'eboost-single-nav', $assets_url.'js/jquery.navScroll.js', array('jquery'),null,true );

	wp_enqueue_script( 'navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
		wp_add_inline_style( 'eboost-style', eboost_inline_style() );

}
add_action( 'wp_enqueue_scripts', 'eboost_scripts' );



/*added admin css for meta*/
function eboost_admin_style($hook) {
	if ( in_array( $hook, array( 'post.php', 'post-new.php' ) ) ) {
        wp_register_style( 'eboost-admin-meta-css', get_template_directory_uri() . '/assets/css/custom-meta.css',array(), ''  );
        wp_enqueue_style( 'eboost-admin-meta-css' );
    }
}
add_action( 'admin_enqueue_scripts', 'eboost_admin_style' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/*breadcrum function*/

if ( ! function_exists( 'eboost_simple_breadcrumb' ) ) :

	/**
	 * Simple breadcrumb.
	 *
	 * @since 1.0.0
	 */
	function eboost_simple_breadcrumb() {

		if ( ! function_exists( 'breadcrumb_trail' ) ) {
			require_once get_template_directory() . '/assets/breadcrumbs/breadcrumbs.php';
		}

		$breadcrumb_args = array(
			'container'   => 'div',
			'show_browse' => false,
		);
		breadcrumb_trail( $breadcrumb_args );

	}

endif;


/*update to pro added*/
require_once( trailingslashit( get_template_directory() ) . 'trt-customize-pro/eboost/class-customize.php' );


/**
*Inline style to use color options
**/
if( ! function_exists( 'eboost_inline_style' ) ) :

    /**
     * style to use color options
     *
     * @since  eboost 1.0.1
     */
    function eboost_inline_style(){
      
        global $eboost_customizer_all_values;
        $eboost_background_color = get_background_color();
        $eboost_primary_color_option = $eboost_customizer_all_values['eboost-primary-color'];
        ?>
        <style type="text/css">
        /*=====COLOR OPTION=====*/

        /*Color*/
        /*----------------------------------*/
        <?php 
        /*Primary*/
        if( !empty($eboost_primary_color_option) ){
        ?>

        .button,
        html input[type="button"],
        input[type="button"],
        input[type="reset"],
        input[type="submit"],
        .button:visited,
        button:visited,
        html input[type="button"]:visited,
        input[type="button"]:visited,
        input[type="reset"]:visited,
        input[type="submit"]:visited,
        .form-inner .wpcf7-submit,
        .form-inner .wpcf7-submit:visited,
        .slide-pager .cycle-pager-active,
        section.wrapper-slider .slide-pager .cycle-pager-active,
        section.wrapper-slider .slide-pager .cycle-pager-active:visited,
        section.wrapper-slider .slide-pager .cycle-pager-active:hover,
        section.wrapper-slider .slide-pager .cycle-pager-active:focus,
        section.wrapper-slider .slide-pager .cycle-pager-active:active,
        .title-divider,
        .title-divider:visited,
        .block-overlay-hover,
        .block-overlay-hover:visited,
        .btn-blue,
        .db-our-service .icons-n-titles-coll .wrapper .icon,
        .button, button, 
        html input[type="button"], 
        input[type="button"], 
        input[type="reset"], 
        input[type="submit"], 
        .button:visited, 
        button:visited,
        html input[type="button"]:visited,
        input[type="button"]:visited, 
        input[type="reset"]:visited, 
        input[type="submit"]:visited, 
        .form-inner .wpcf7-submit, 
        .form-inner .wpcf7-submit:visited, 
        .slide-pager .cycle-pager-active,        
        .title-divider, 
        .title-divider:visited, 
        .block-overlay-hover, 
        .block-overlay-hover:visited, 
        .db-our-service .icons-n-titles-coll .wrapper .icon, 
        .search-form .search-submit,
        .back-tonav, 
        .back-tonav:visited,
        .search-form .search-submit,
        .nicescroll-cursors,
        .db-meet-our-team .team-members section .img-wrapper:before,
        .sidenav .closebtn,
        .btn-blue-border:hover, .btn-blue-border:focus, .btn-blue-border:active,
        #masthead .navigation .main-navigation ul#primary-menu > li a:hover,
        button.slick-prev.slick-arrow:hover,
        button.slick-next.slick-arrow:hover,
        a.btn.eboost-btn.btn-primary.btn-second,
        .eboost-featured-content:hover i,
        td.actions input.button, .woocommerce ul.products li.product .button, button.single_add_to_cart_button.button.alt, div#respond input#submit, a.button.wc-backward,
        .clients-image h3:after,
        .testimonials-contain-wrapper:hover {
        	background-color: <?php echo esc_attr( $eboost_primary_color_option ) ;?>!important;;
        }

        .btn-blue-border,
        .slick-dots li.slick-active button:before,
        .site-title a:hover,
        aside#secondary ul li:hover,
        .col-md-8.top-contact-widget ul li a:hover,
        footer#colophon aside ul li a:hover,
        section.eboost-featured i,        
        b.fn a, b.fn,
        .nav-previous a:hover, .nav-next a:hover,
        .breadcrumb-trail.breadcrumbs ul li a span:hover, .breadcrumb-trail.breadcrumbs ul li a:hover, ul.trail-items a:hover, span.author.vcard a:hover, form#commentform p a:hover,
        .entry-meta.entry-inner a:hover, .wrapper.page-inner-title header.entry-header span.author.vcard a:hover, ul.trail-items a:hover,
        .clients-image h3 a:hover, .clients-image h3 a:focus, .clients-image h3 a:active {
           color: <?php echo esc_attr( $eboost_primary_color_option ) ;?>;;
        }

        .db-our-service .icons-n-titles-coll .wrapper section a,
        a.btn.eboost-btn.btn-primary.btn-second,
        a.btn.eboost-btn.btn-primary,
        section.eboost-featured i,
        h1.widget-title:after,
        button, input[type="button"], input[type="reset"], input[type="submit"],
        .nav-previous a:hover, .nav-next a:hover{
           border-color:  <?php echo esc_attr( $eboost_primary_color_option ) ;?>!important;;
        }

        .dm-banner-section .control svg:hover {
          fill :  <?php echo esc_attr( $eboost_primary_color_option ) ;?>!important;;
        }

       #secondary h2.widget-title {
           border-left: 5px solid  <?php echo esc_attr( $eboost_primary_color_option ) ;?>!important;;
        }     

        a.btn.eboost-btn.btn-primary:hover, 
        a.btn.eboost-btn.btn-primary.btn-second:hover {
           box-shadow: inset 19px 66px 100px 100px <?php echo esc_attr( $eboost_primary_color_option ) ;?>!important;;
        }     


        .btn-blue-border{
           border: 2px solid<?php echo esc_attr( $eboost_primary_color_option ) ;?>!important;;
        }

        .widget-title,
        .widgettitle,
        .wrapper-slider,
        .flip-container .front,
        .flip-container .back,
        .wrapper-about a.button,
        .widget .widgettitle, .blog article.hentry .widgettitle,
        #blog-post article.hentry .widgettitle,
        .search article.hentry .widgettitle,
        .archive article.hentry .widgettitle,
        .tag article.hentry .widgettitle,
        .category article.hentry .widgettitle,
        #ak-blog-post article.hentry .widgettitle,
        .page article.hentry .widgettitle,
        .single article.hentry .widgettitle,
        body.woocommerce article.hentry .widgettitle, body.woocommerce .site-main .widgettitle,
        .widget .widget-title, .blog article.hentry .widget-title,
        #blog-post article.hentry .widget-title,
        .search article.hentry .widget-title,
        .archive article.hentry .widget-title,
        .tag article.hentry .widget-title,
        .category article.hentry .widget-title,
        #ak-blog-post article.hentry .widget-title,
        .page article.hentry .widget-title,
        .single article.hentry .widget-title,
        body.woocommerce article.hentry .widget-title,
        body.woocommerce .site-main .widget-title,
        #secondary h2.widget-title,
        body.woocommerce #respond input#submit:hover, 
        body.woocommerce a.button:hover, 
        body.woocommerce button.button:hover, 
        body.woocommerce input.button:hover,
        body.woocommerce nav.woocommerce-pagination ul li a:focus, 
        body.woocommerce nav.woocommerce-pagination ul li a:hover,
        body.woocommerce nav.woocommerce-pagination ul li span.current{
          border-color: <?php echo esc_attr( $eboost_primary_color_option );?>;;
        }

        .latestpost-footer .moredetail a,
        .latestpost-footer .moredetail a:visited,
        .single-icon a .icon-holder,
        .wrapper-about a.button,
        .team-item:hover h3 a,
        .team-item:focus h3 a,
        .team-item:active h3 a,
        .post-content .cat a,
        .service-wrap .service-icon i,
        .eboost-main-menu-wrapper ul li a:hover,
        .site-branding p a:hover, 
        .site-branding p a:focus, 
        .site-branding h1 a:hover,
        span.tags-links a:hover, span.cat-links a:hover, span.posted-on a:hover,
        .detail a:hover, .img-n-des.clearfix .user a span:hover,
        div#eboost-blog h2 a:hover,
        aside#secondary ul li:before,
        div#eboost-blog h3.news-title a:hover,
        .img-n-des.clearfix:hover h3 a{
          color: <?php echo esc_attr( $eboost_primary_color_option );?>!important;;
        }
        <?php
        } 
        ?>
        </style>
    <?php
    }
endif;
