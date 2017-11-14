<?php
global $eboost_panels;
/*creating panel for fonts-setting*/
$eboost_panels['eboost-theme-options'] =
    array(
        'title'          => __( 'Theme Options', 'eboost' ),
        'priority'       => 200
    );

/*layout options */
require get_template_directory().'/inc/customizer/theme-options/layout-options.php';

/*footer options */
require get_template_directory().'/inc/customizer/theme-options/footer.php';

/*Breadcrumb section */
require get_template_directory().'/inc/customizer/theme-options/breadcrumb.php';

/*Back to top */
require get_template_directory().'/inc/customizer/theme-options/back-to-top.php';

/*added color option added*/
$eboost_customizer_defaults['eboost-primary-color'] = '#2595ff';

$eboost_settings_controls['eboost-primary-color'] =
    array(
        'setting' =>     array(
            'default'              => $eboost_customizer_defaults['eboost-primary-color'],
        ),
        'control' => array(
            'label'                 =>  __( 'Primary Color', 'eboost' ),
            'section'               => 'colors',
            'type'                  => 'color',
            'priority'              => 30,
            'active_callback'       => ''
        )
    );
