<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function eboost_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'eboost' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    $eboost_get_all_options = eboost_get_all_options(1);
    $eboost_footer_widgets_number = $eboost_get_all_options['eboost-footer-sidebar-number'];

    if( $eboost_footer_widgets_number > 0 ){
        register_sidebar(array(
            'name' => __('Footer Column One', 'eboost'),
            'id' => 'footer-col-one',
            'description' => __('Displays items on footer section.','eboost'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ));
        if( $eboost_footer_widgets_number > 1 ){
            register_sidebar(array(
                'name' => __('Footer Column Two', 'eboost'),
                'id' => 'footer-col-two',
                'description' => __('Displays items on footer section.','eboost'),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget' => '</aside>',
                'before_title'  => '<h1 class="widget-title">',
                'after_title'   => '</h1>',
            ));
        }
        if( $eboost_footer_widgets_number > 2 ){
            register_sidebar(array(
                'name' => __('Footer Column Three', 'eboost'),
                'id' => 'footer-col-three',
                'description' => __('Displays items on footer section.','eboost'),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget' => '</aside>',
                'before_title'  => '<h1 class="widget-title">',
                'after_title'   => '</h1>',
            ));
        }
    }
}
add_action( 'widgets_init', 'eboost_widgets_init' );