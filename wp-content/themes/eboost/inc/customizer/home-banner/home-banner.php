<?php
global $eboost_panels;
global $eboost_sections;
global $eboost_settings_controls;
global $eboost_repeated_settings_controls;
global $eboost_customizer_defaults;

$eboost_sections['header_image'] =
    array(
        'priority'       => 150,
        'title'          => __( 'Home Banner Section', 'eboost' )
    );
$eboost_customizer_defaults['eboost-home-banner-title'] = __( 'Eboost Your Apps', 'eboost' );
$eboost_customizer_defaults['eboost-home-banner-discription'] = __( 'Our best product for you', 'eboost' );
$eboost_customizer_defaults['eboost-home-banner-button1'] = __( 'App Store', 'eboost' );
$eboost_customizer_defaults['eboost-home-banner-button-url1'] = '';
$eboost_customizer_defaults['eboost-home-banner-enable'] = 0;



$eboost_settings_controls['eboost-home-banner-enable'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-home-banner-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Home Banner', 'eboost' ),
            'section'               => 'header_image',
            'type'                  => 'checkbox',
            'priority'              => 5,
            'active_callback'       => ''
        )
    );

$eboost_settings_controls['eboost-home-banner-title'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-home-banner-title']
        ),
        'control' => array(
            'label'                 =>  __( 'Heading Title', 'eboost' ),
            'section'               => 'header_image',
            'type'                  => 'text',
            'priority'              => 50,
            'active_callback'       => ''
        )
    );

$eboost_settings_controls['eboost-home-banner-discription'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-home-banner-discription']
        ),
        'control' => array(
            'label'                 =>  __( 'Heading content', 'eboost' ),
            'section'               => 'header_image',
            'type'                  => 'text',
            'priority'              => 60,
            'active_callback'       => ''
        )
    );
$eboost_settings_controls['eboost-home-banner-button1'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-home-banner-button1']
        ),
        'control' => array(
            'label'                 =>  __( 'Button Text 1', 'eboost' ),
            'section'               => 'header_image',
            'type'                  => 'text',
            'priority'              => 70,
            'active_callback'       => ''
        )
    );
$eboost_settings_controls['eboost-home-banner-button-url1'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-home-banner-button-url1']
        ),
        'control' => array(
            'label'                 =>  __( 'Button URL 1', 'eboost' ),
            'section'               => 'header_image',
            'type'                  => 'url',
            'priority'              => 80,
            'active_callback'       => ''
        )
    );
