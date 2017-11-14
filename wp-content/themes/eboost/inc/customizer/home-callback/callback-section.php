<?php
global $eboost_panels;
global $eboost_sections;
global $eboost_settings_controls;
global $eboost_repeated_settings_controls;
global $eboost_customizer_defaults;

/*defaults values callback options*/
$eboost_customizer_defaults['eboost-callback-enable'] = 0;
$eboost_customizer_defaults['eboost-callback-page'] = 0;
$eboost_customizer_defaults['eboost-default-banner-image'] = '';
$eboost_customizer_defaults['eboost-home-callback-single-words'] = 40;
$eboost_customizer_defaults['eboost-home-callback-remove-button'] = 1;
$eboost_customizer_defaults['eboost-home-callback-button-text'] = esc_html__('View More','eboost');

/* Feature section Enable settings*/
$eboost_sections['eboost-callback-options'] =
    array(
        'priority'       => 160,
        'title'          => esc_html__( 'Home Callback Section', 'eboost' ),
    );

/*callback section enable control*/
$eboost_settings_controls['eboost-callback-enable'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-callback-enable']
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Enable callback Section', 'eboost' ),
            'description'           =>  esc_html__( 'Enable "callback Section" on checked', 'eboost' ),
            'section'               => 'eboost-callback-options',
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );


/*creating setting control for eboost-callback-page start*/
$eboost_settings_controls['eboost-callback-page'] =
    array(
            'setting' =>     array(
                'default'              => $eboost_customizer_defaults['eboost-callback-page'],
                ),
            'control' => array(
                'label'                 =>  esc_html__( 'Select Page For callback Section', 'eboost' ),
                'description'           => '',
                'section'               => 'eboost-callback-options',
                'type'                  => 'dropdown-pages',
                'priority'              => 20
            )
    );
    
/*String in max to be appear as description on callback*/
$eboost_settings_controls['eboost-home-callback-single-words'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-home-callback-single-words']
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Number Of Words', 'eboost' ),
            'description'           =>  esc_html__( 'Give number of words you wish to be appear on home page callback section', 'eboost' ),
            'section'               => 'eboost-callback-options',
            'type'                  => 'number',
            'input_attrs' => array( 'min' => 1, 'max' => 200),
            'priority'              => 20,
            'active_callback'       => ''
        )
    );

$eboost_settings_controls['eboost-default-banner-image'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-default-banner-image'],
        ),
        'control' => array(
            'label'                 =>  __( 'Default Banner Image', 'eboost' ),
            'description'           =>  __( 'Please note that if you remove this image default banner image will appear', 'eboost' ),
            'section'               => 'eboost-callback-options',
            'type'                  => 'image',
            'priority'              => 20,
        )
    );

$eboost_settings_controls['eboost-home-callback-remove-button'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-home-callback-remove-button']
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Enable Button', 'eboost' ),
            'section'               => 'eboost-callback-options',
            'type'                  => 'checkbox',
            'priority'              => 30,
            'active_callback'       => ''
        )
    );

$eboost_settings_controls['eboost-home-callback-button-text'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-home-callback-button-text']
        ),
        'control' => array(
            'label'                 =>  __( 'Button Text', 'eboost' ),
            'section'               => 'eboost-callback-options',
            'type'                  => 'text',
            'priority'              => 40,
            'active_callback'       => ''
        )
    );