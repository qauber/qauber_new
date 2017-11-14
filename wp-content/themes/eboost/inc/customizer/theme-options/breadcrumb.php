<?php
global $eboost_sections;
global $eboost_settings_controls;
global $eboost_repeated_settings_controls;
global $eboost_customizer_defaults;

/*defaults values*/
$eboost_customizer_defaults['eboost-enable-breadcrumb'] = 1;

$eboost_sections['eboost-breadcrumb-options'] =
    array(
        'priority'       => 30,
        'title'          => __( 'Breadcrumb Options', 'eboost' ),
        'panel'          => 'eboost-theme-options',
    );

$eboost_settings_controls['eboost-enable-breadcrumb'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-enable-breadcrumb'],
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Breadcrumb', 'eboost' ),
            'section'               => 'eboost-breadcrumb-options',
            'type'                  => 'checkbox',
            'priority'              => 10,
        )
    );