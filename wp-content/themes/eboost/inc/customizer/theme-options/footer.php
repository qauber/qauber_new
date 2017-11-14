<?php
global $eboost_sections;
global $eboost_settings_controls;
global $eboost_repeated_settings_controls;
global $eboost_customizer_defaults;

/*defaults values*/
$eboost_customizer_defaults['eboost-footer-sidebar-number'] = 3;
$eboost_customizer_defaults['eboost-copyright-text'] = __('Copyright &copy; All right reserved','eboost');
$eboost_customizer_defaults['eboost-enable-theme-name'] = 1;

$eboost_sections['eboost-footer-options'] =
    array(
        'priority'       => 60,
        'title'          => __( 'Footer Options', 'eboost' ),
        'panel'          => 'eboost-theme-options'
    );

    $eboost_settings_controls['eboost-footer-sidebar-number'] =
        array(
            'setting' =>     array(
                'default'              => $eboost_customizer_defaults['eboost-footer-sidebar-number'],
            ),
            'control' => array(
                'label'                 =>  __( 'Number of Sidebars In Footer Area', 'eboost' ),
                'section'               => 'eboost-footer-options',
                'type'                  => 'select',
                'choices'               => array(
                    0 => __( 'Disable footer sidebar area', 'eboost' ),
                    1 => __( '1', 'eboost' ),
                    2 => __( '2', 'eboost' ),
                    3 => __( '3', 'eboost' ),
                ),
                'priority'              => 10,
                'description'           => '',
                'active_callback'       => ''
            )
        );



$eboost_settings_controls['eboost-copyright-text'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-copyright-text'],
        ),
        'control' => array(
            'label'                 =>  __( 'Copyright Text', 'eboost' ),
            'section'               => 'eboost-footer-options',
            'type'                  => 'text_html',
            'priority'              => 20,
        )
    );