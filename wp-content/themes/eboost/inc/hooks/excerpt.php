<?php
if( ! function_exists( 'eboost_excerpt_length' ) ) :

    /**
     * Excerpt length
     *
     * @since  Eboost 1.0.0
     *
     * @param null
     * @return int
     */
    function eboost_excerpt_length( $length ){
        if ( is_admin() ) {
            return $length;
        }
        global $eboost_customizer_all_values;
        $excerpt_length = $eboost_customizer_all_values['eboost-number-of-words'];
        if ( empty( $excerpt_length) ) {
            $excerpt_length = $length;
        }
        return absint( $excerpt_length );

    }

endif;
add_filter( 'excerpt_length', 'eboost_excerpt_length', 999 );