<?php
/**
 * Implement Editor Styles
 *
 * @since Eboost 1.0.0
 *
 * @param null
 * @return null
 *
 */
add_action( 'init', 'eboost_add_editor_styles' );

if ( ! function_exists( 'eboost_add_editor_styles' ) ) :
    function eboost_add_editor_styles() {
        add_editor_style( 'editor-style.css' );
    }
endif;