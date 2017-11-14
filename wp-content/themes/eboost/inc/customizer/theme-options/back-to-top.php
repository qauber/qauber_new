<?php
global $eboost_sections;
global $eboost_settings_controls;
global $eboost_repeated_settings_controls;
global $eboost_customizer_defaults;

/*defaults values*/
$eboost_customizer_defaults['eboost-enable-back-to-top'] = 1;

$eboost_sections['eboost-back-to-top-options'] =
    array(
        'priority'       => 80,
        'title'          => __( 'Back To Top Options', 'eboost' ),
        'panel'          => 'eboost-theme-options'
    );

$eboost_settings_controls['eboost-enable-back-to-top'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-enable-back-to-top'],
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Back To Top', 'eboost' ),
            'section'               => 'eboost-back-to-top-options',
            'type'                  => 'checkbox',
            'priority'              => 50,
        )
    );