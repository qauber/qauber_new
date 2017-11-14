<?php
global $eboost_panels;
global $eboost_sections;
global $eboost_settings_controls;
global $eboost_repeated_settings_controls;
global $eboost_customizer_defaults;

/*defaults values feature portfolio options*/
$eboost_customizer_defaults['eboost-home-service-enable'] = 0;
$eboost_customizer_defaults['eboost-home-page-service-single-words'] = 30;
$eboost_customizer_defaults['eboost-home-service-button-text'] = __('View More','eboost');
$eboost_customizer_defaults['eboost-home-service-selection'] = 'from-page';
$eboost_customizer_defaults['eboost-home-service-number'] = 3;
$eboost_customizer_defaults['eboost-home-service-pages'] = 0;


/*creating panel for fonts-setting*/

$eboost_sections['eboost-home-service'] =
    array(
        'title'          => __( 'Home Service Section', 'eboost' ),
        'priority'       => 160
   	);

$eboost_settings_controls['eboost-home-service-enable'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-home-service-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Service', 'eboost' ),
            'section'               => 'eboost-home-service',
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );


$eboost_settings_controls['eboost-home-page-service-single-words'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-home-page-service-single-words']
        ),
        'control' => array(
            'label'                 =>  __( 'Number Of Words in Single Column Content', 'eboost' ),
            'description'           =>  __( 'If you do not have selected from - Custom', 'eboost' ),
            'section'               => 'eboost-home-service',
            'type'                  => 'number',
            'priority'              => 30,
            'input_attrs' => array( 'min' => 1, 'max' => 200),
            'active_callback'       => ''
        )
    );

/*creating setting control for eboost-home-service-page start*/
$eboost_repeated_settings_controls['eboost-home-service-pages'] =
    array(
        'repeated' => 3,
        'eboost-home-service-pages-ids' => array(
            'setting' =>     array(
                'default'              => $eboost_customizer_defaults['eboost-home-service-pages'],
            ),
            'control' => array(
                'label'                 =>  __( 'Select Page For Service %s', 'eboost' ),
                'section'               => 'eboost-home-service',
                'type'                  => 'dropdown-pages',
                'priority'              => 60,
                'description'           => ''
            )
        ),
    );



$eboost_settings_controls['eboost-home-service-button-text'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-home-service-button-text']
        ),
        'control' => array(
            'label'                 =>  __( 'Button Text', 'eboost' ),
            'section'               => 'eboost-home-service',
            'type'                  => 'text',
            'priority'              => 70,
            'active_callback'       => ''
        )
    );