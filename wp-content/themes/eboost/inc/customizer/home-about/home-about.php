<?php
global $eboost_panels;
global $eboost_sections;
global $eboost_settings_controls;
global $eboost_repeated_settings_controls;
global $eboost_customizer_defaults;

/*defaults values feature portfolio options*/
$eboost_customizer_defaults['eboost-home-about-enable'] = 0;
$eboost_customizer_defaults['eboost-home-about-title'] = __('Look At It','eboost');
$eboost_customizer_defaults['eboost-home-page-about-single-words'] = 30;
$eboost_customizer_defaults['eboost-home-about-button-text'] = __('View More','eboost');
$eboost_customizer_defaults['eboost-home-about-selection'] = 'from-page';
$eboost_customizer_defaults['eboost-home-about-number'] = 4;
$eboost_customizer_defaults['eboost-home-about-page-icon'] = 'fa-desktop';
$eboost_customizer_defaults['eboost-home-about-pages'] = 0;


$eboost_sections['eboost-home-about'] =
    array(
        'title'          => __( 'Home About Section', 'eboost' ),
        'priority'       => 160
   	);

$eboost_settings_controls['eboost-home-about-enable'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-home-about-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable About', 'eboost' ),
            'section'               => 'eboost-home-about',
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );


$eboost_settings_controls['eboost-home-about-title'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-home-about-title']
        ),
        'control' => array(
            'label'                 =>  __( 'Main Title', 'eboost' ),
            'section'               => 'eboost-home-about',
            'type'                  => 'text',
            'priority'              => 20,
            'active_callback'       => ''
        )
    );

$eboost_settings_controls['eboost-home-page-about-single-words'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-home-page-about-single-words']
        ),
        'control' => array(
            'label'                 =>  __( 'Number Of Words in Single Column Content', 'eboost' ),
            'description'           =>  __( 'If you do not have selected from - Custom', 'eboost' ),
            'section'               => 'eboost-home-about',
            'type'                  => 'number',
            'priority'              => 30,
            'input_attrs' => array( 'min' => 1, 'max' => 200),
            'active_callback'       => ''
        )
    );

$eboost_repeated_settings_controls['eboost-home-about-font-icon'] =
    array(
        'repeated' => 4,
        'eboost-home-about-page-icon' => array(
            'setting' =>     array(
                'default'              => $eboost_customizer_defaults['eboost-home-about-page-icon'],
            ),
            'control' => array(
                'label'                 =>  __( 'Icon %s', 'eboost' ),
                'section'               => 'eboost-home-about',
                'type'                  => 'text',
                'priority'              => 40,
                'description'           => sprintf( __( 'Use font awesome icon: Eg: %1$s. %2$s See more here %3$s', 'eboost' ), 'fa-desktop','<a href="'.esc_url('http://fontawesome.io/cheatsheet/').'" target="_blank">','</a>' ),
            )
        ),
        'eboost-home-about-pages-ids' => array(
            'setting' =>     array(
                'default'              => $eboost_customizer_defaults['eboost-home-about-pages'],
            ),
            'control' => array(
                'label'                 =>  __( 'Select Page For about %s', 'eboost' ),
                'section'               => 'eboost-home-about',
                'type'                  => 'dropdown-pages',
                'priority'              => 60,
                'description'           => ''
            )
        ),
    );