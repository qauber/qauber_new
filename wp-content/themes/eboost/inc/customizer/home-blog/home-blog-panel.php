<?php
global $eboost_panels;
global $eboost_sections;
global $eboost_settings_controls;
global $eboost_repeated_settings_controls;
global $eboost_customizer_defaults;


$eboost_customizer_defaults['eboost-home-blog-enable'] = 0;
$eboost_customizer_defaults['eboost-home-blog-title'] = __('FROM OUR BLOG','eboost');
$eboost_customizer_defaults['eboost-home-blog-single-words'] = 30;
$eboost_customizer_defaults['eboost-home-blog-category'] = 0;
$eboost_customizer_defaults['eboost-home-blog-button-text'] = __('Browse more','eboost');
$eboost_customizer_defaults['eboost-home-blog-button-link'] = home_url( '/blog' );

$eboost_sections['eboost-home-blog-panel'] =
    array(
        'priority'       => 190,
        'title'          => __( 'Home blog Section', 'eboost' ),
   	);

$eboost_settings_controls['eboost-home-blog-enable'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-home-blog-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Blog', 'eboost' ),
            'description'           => __( 'Enable "Blog Section" on checked' , 'eboost' ),
            'section'               => 'eboost-home-blog-panel',
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );


$eboost_settings_controls['eboost-home-blog-title'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-home-blog-title']
        ),
        'control' => array(
            'label'                 =>  __( 'Main Title', 'eboost' ),
            'section'               => 'eboost-home-blog-panel',
            'type'                  => 'text',
            'priority'              => 20,
            'active_callback'       => ''
        )
    );


    /*String in max to be appear as description on blog*/
    $eboost_settings_controls['eboost-home-blog-single-words'] =
        array(
            'setting' =>     array(
                'default'              => $eboost_customizer_defaults['eboost-home-blog-single-words']
            ),
            'control' => array(
                'label'                 =>  __( 'Number Of Words', 'eboost' ),
                'description'           =>  __( 'Give number of words you wish to be appear on home page blog section sticky post/ feature post', 'eboost' ),
                'section'               => 'eboost-home-blog-panel',
                'type'                  => 'number',
                'priority'              => 40,
                'input_attrs' => array( 'min' => 1, 'max' => 200),
                'active_callback'       => ''
            )
        );

/*creating setting control for eboost-fs-Category start*/
$eboost_settings_controls['eboost-home-blog-category'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-home-blog-category']
        ),
        'control' => array(
            'label'                 =>  __( 'Select Category For Blog', 'eboost' ),
            'description'           =>  __( 'Blog will only displayed from this category', 'eboost' ),
            'section'               => 'eboost-home-blog-panel',
            'type'                  => 'category_dropdown',
            'priority'              => 60,
            'active_callback'       => ''
        )
    );


    $eboost_settings_controls['eboost-home-blog-button-text'] =
        array(
            'setting' =>     array(
                'default'              => $eboost_customizer_defaults['eboost-home-blog-button-text']
            ),
            'control' => array(
                'label'                 =>  __( 'Browse All Button Text', 'eboost' ),
                'section'               => 'eboost-home-blog-panel',
                'type'                  => 'text',
                'priority'              => 70,
                'active_callback'       => ''
            )
        );

    $eboost_settings_controls['eboost-home-blog-button-link'] =
        array(
            'setting' =>     array(
                'default'              => $eboost_customizer_defaults['eboost-home-blog-button-link']
            ),
            'control' => array(
                'label'                 =>  __( 'Browse All Button Link', 'eboost' ),
                'section'               => 'eboost-home-blog-panel',
                'type'                  => 'url',
                'priority'              => 80,
                'active_callback'       => ''
            )
        );