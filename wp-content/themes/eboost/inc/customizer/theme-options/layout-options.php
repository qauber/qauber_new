<?php
global $eboost_sections;
global $eboost_settings_controls;
global $eboost_repeated_settings_controls;
global $eboost_customizer_defaults;

/*defaults values*/
$eboost_customizer_defaults['eboost-enable-static-page'] = 1;

$eboost_customizer_defaults['eboost-default-layout'] = 'right-sidebar';
$eboost_customizer_defaults['eboost-number-of-words'] = 30;
$eboost_customizer_defaults['eboost-archive-layout'] = 'thumbnail-and-excerpt';
$eboost_customizer_defaults['eboost-archive-image-align'] = 'full';
$eboost_customizer_defaults['eboost-single-post-image-align'] = 'full';
$eboost_customizer_defaults['eboost-single-post-image'] = '';



$eboost_sections['eboost-layout-options'] =
    array(
        'priority'       => 20,
        'title'          => __( 'Layout Options', 'eboost' ),
        'panel'          => 'eboost-theme-options',
    );


/*home page static page display*/
$eboost_settings_controls['eboost-enable-static-page'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-enable-static-page'],
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Static Front Page', 'eboost' ),
            'description'           =>  __( 'If you disable this the static page will be disappera form the home page and other section from customizer will reamin as it is', 'eboost' ),
            'section'               => 'eboost-layout-options',
            'type'                  => 'checkbox',
            'priority'              => 10,
        )
    );
    
/*layout-options option responsive lodader start*/
$eboost_settings_controls['eboost-default-layout'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-default-layout'],
        ),
        'control' => array(
            'label'                 =>  __( 'Default Layout', 'eboost' ),
            'description'           =>  __( 'Layout for all archives, single posts and pages', 'eboost' ),
            'section'               => 'eboost-layout-options',
            'type'                  => 'select',
            'choices'               => array(
                'right-sidebar' => __( 'Content - Primary Sidebar', 'eboost' ),
                'left-sidebar' => __( 'Primary Sidebar - Content', 'eboost' ),
                'no-sidebar' => __( 'No Sidebar', 'eboost' )
            ),
            'priority'              => 30,
            'active_callback'       => ''
        )
    );

$eboost_settings_controls['eboost-archive-layout'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-archive-layout'],
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Archive Layout', 'eboost' ),
            'section'               => 'eboost-layout-options',
            'type'                  => 'select',
            'choices'               => array(
                'excerpt-only' => esc_html__( 'Excerpt Only', 'eboost' ),
                'thumbnail-and-excerpt' => esc_html__( 'Thumbnail and Excerpt', 'eboost' ),
            ),
            'priority'              => 34,
        )
    );


$eboost_settings_controls['eboost-archive-image-align'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-archive-image-align'],
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Archive Image Alignment', 'eboost' ),
            'section'               => 'eboost-layout-options',
            'type'                  => 'select',
            'choices'               => array(
                'full' => esc_html__( 'Full', 'eboost' ),
                'right' => esc_html__( 'Right', 'eboost' ),
            ),
            'priority'              => 35,
            'description'              => esc_html__('This option only work if you have selected "Thumbnail and Excerpt" or "Thumbnail and Full Post" in Archive Layout options','eboost'),
        )
    );

$eboost_settings_controls['eboost-number-of-words'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-number-of-words']
        ),
        'control' => array(
            'label'                 =>  __( 'Number Of Words For Excerpt', 'eboost' ),
            'description'           =>  __( 'This will controll the excerpt length on listing page', 'eboost' ),
            'section'               => 'eboost-layout-options',
            'type'                  => 'number',
            'input_attrs' => array( 'min' => 1, 'max' => 200),
            'priority'              => 40,
            'active_callback'       => ''
        )
    );


$eboost_settings_controls['eboost-single-post-image-align'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-single-post-image-align'],
        ),
        'control' => array(
            'label'                 =>  __( 'Alignment Of Image In Single Post/Page', 'eboost' ),
            'section'               => 'eboost-layout-options',
            'type'                  => 'select',
            'choices'               => array(
                'full' => __( 'Full', 'eboost' ),
                'right' => __( 'Right', 'eboost' ),
                'left' => __( 'Left', 'eboost' ),
                'no-image' => __( 'No image', 'eboost' )
            ),
            'priority'              => 50,
            'description'           =>  __( 'Please note that this setting can be override from individual post/page', 'eboost' ),
        )
    );