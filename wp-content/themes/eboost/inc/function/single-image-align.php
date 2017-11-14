<?php 
/*image alignment single post*/

if( ! function_exists( 'eboost_single_post_image_align' ) ) :
    /**
     * Eboost default layout function
     *
     * @since  Eboost 1.0.0
     *
     * @param int
     * @return string
     */
    function eboost_single_post_image_align( $post_id = null ){
        global $eboost_customizer_all_values,$post;
        if( null == $post_id && isset ( $post->ID ) ){
            $post_id = $post->ID;
        }
        $eboost_single_post_image_align = $eboost_customizer_all_values['eboost-single-post-image-align'];
        $eboost_single_post_image_align_meta = get_post_meta( $post_id, 'eboost-single-post-image-align', true );

        if( false != $eboost_single_post_image_align_meta ) {
            $eboost_single_post_image_align = $eboost_single_post_image_align_meta;
        }
        return $eboost_single_post_image_align;
    }
endif;