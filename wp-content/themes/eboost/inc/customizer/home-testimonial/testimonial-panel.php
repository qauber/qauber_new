<?php
global $eboost_panels;
global $eboost_sections;
global $eboost_settings_controls;
global $eboost_repeated_settings_controls;
global $eboost_customizer_defaults;

/*defaults values feature portfolio options*/
$eboost_customizer_defaults['eboost-home-testimonial-enable'] = 0;
$eboost_customizer_defaults['eboost-home-testimonial-main-title'] =  __('VOICE OF CLIENTS','eboost');
$eboost_customizer_defaults['eboost-home-testimonial-number'] = 2;
$eboost_customizer_defaults['eboost-home-testimonial-single-words'] = 30;
$eboost_customizer_defaults['eboost-home-testimonial-selection'] = 'from-page';
$eboost_customizer_defaults['eboost-home-testimonial-slider-mode'] = 'fade';
$eboost_customizer_defaults['eboost-home-testimonial-slider-time'] = 2;
$eboost_customizer_defaults['eboost-home-testimonial-slider-pause-time'] = 7;
$eboost_customizer_defaults['eboost-home-testimonial-pages'] = 0;


/*creating panel for fonts-setting*/

$eboost_sections['eboost-home-testimonial'] =
    array(
        'title'          => __( 'Home Testimonial Section', 'eboost' ),
        'priority'       => 160
   	);

$eboost_settings_controls['eboost-home-testimonial-enable'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-home-testimonial-enable']
        ),
        'control' => array(
            'label'                 =>  __( 'Enable Testimonial', 'eboost' ),
            'description'           => __( 'Enable "Testimonial selection" on checked', 'eboost' ),
            'section'               => 'eboost-home-testimonial',
            'type'                  => 'checkbox',
            'priority'              => 2,
            'active_callback'       => ''
        )
    );



/*Testimonial Title control*/
$eboost_settings_controls['eboost-home-testimonial-main-title'] =
array(
    'setting' =>     array(
        'default'              => $eboost_customizer_defaults['eboost-home-testimonial-main-title']
    ),
    'control' => array(
        'label'                 =>  __( 'Main Title', 'eboost' ),
        'section'               => 'eboost-home-testimonial',
        'type'                  => 'text',
        'priority'              => 5,
        'active_callback'       => ''
    )
);

/*No of Testimonial needed*/
$eboost_settings_controls['eboost-home-testimonial-number'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-home-testimonial-number']
        ),
        'control' => array(
            'label'                 =>  __( 'Number Of Testimonial/s', 'eboost' ),
            'description'           => __( 'Choose number of Testimonial to be displayed', 'eboost' ),
            'section'               => 'eboost-home-testimonial',
            'type'                  => 'select',
            'choices'               => array(
                1 => __( '1', 'eboost' ),
                2 => __( '2', 'eboost' ),
                3 => __( '3', 'eboost' ),
            ),
            'priority'              => 10,
            'active_callback'       => ''
        )
    );

/*String in max to be appear as description on testimonial*/
$eboost_settings_controls['eboost-home-testimonial-single-words'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-home-testimonial-single-words']
        ),
        'control' => array(
            'label'                 =>  __( 'Single Testimonial- Number Of Words', 'eboost' ),
            'description'           =>  __( 'If you do not have selected from - Custom', 'eboost' ),
            'section'               => 'eboost-home-testimonial',
            'type'                  => 'number',
            'input_attrs' => array( 'min' => 1, 'max' => 200),
            'priority'              => 20,
            'active_callback'       => ''
        )
    );

/*creating setting control for eboost-home-testimonial-page start*/
$eboost_repeated_settings_controls['eboost-home-testimonial-pages'] =
    array(
        'repeated' => 3,
        'eboost-home-testimonial-pages-ids' => array(
            'setting' =>     array(
                'default'              => $eboost_customizer_defaults['eboost-home-testimonial-pages'],
            ),
            'control' => array(
                'label'                 =>  __( 'Select Page For Testimonial %s', 'eboost' ),
                'section'               => 'eboost-home-testimonial',
                'type'                  => 'dropdown-pages',
                'priority'              => 90,
                'description'           => ''
            )
        ),
        'eboost-home-testimonial-pages-divider' => array(
            'control' => array(
                'section'               => 'eboost-home-testimonial',
                'type'                  => 'message',
                'priority'              => 90,
                'description'           => '<hr />'
            )
        )
    );

