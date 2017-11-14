<?php

if ( ! function_exists( 'eboost_home_callback_section' ) ) :
    /**
     * Callback
     *
     * @since eboost 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function eboost_home_callback_section() {
        global $eboost_customizer_all_values;
        if( 1 != $eboost_customizer_all_values['eboost-callback-enable'] ){
            return null;
        }
        $eboost_home_callback_single_words = absint( $eboost_customizer_all_values['eboost-home-callback-single-words'] );
        $eboost_home_callback_posts = absint($eboost_customizer_all_values['eboost-callback-page']);
        $eboost_home_callback_button = esc_html($eboost_customizer_all_values['eboost-home-callback-button-text'] );

    ?>
    <?php
    if( !empty( $eboost_home_callback_posts )){
        $eboost_feature_callback_args =    array(
            'post_type' => 'page',
            'p' => $eboost_home_callback_posts,
            'posts_per_page' => 1

        );
        $eboost_fature_section_post_query = new WP_Query( $eboost_feature_callback_args );
        if ( $eboost_fature_section_post_query->have_posts() ) :
        while ( $eboost_fature_section_post_query->have_posts() ) : $eboost_fature_section_post_query->the_post();
        if(has_post_thumbnail()){
            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
        }
        else{
            $thumb[0] = get_template_directory_uri() .'/assets/img/no-image-570-370.png';
        }
        $callback_image = $thumb[0];
        ?>               
        <!-- call back section start -->
        <div id="eboost-call-to-action" class="eb-callback-section">
            <div id="eb-callback-background" class="callback-image" style="background: url( <?php echo esc_url($callback_image); ?>)" >
                <div class="overlay">
                    <!-- Wrapper for banner -->
                    <div class="container">
                       <div class="col-md-8 col-xs-12 col-sm-8 eb-callback-caption">
                          <div class="s-title">
                            <h2><?php the_title(); ?></h2>
                        </div><!-- .title -->
                           <?php
                           if (has_excerpt()) {
                               $eboost_home_callback_content = get_the_excerpt();
                           }
                           else {
                               $eboost_home_callback_content = eboost_words_count( $eboost_home_callback_single_words ,get_the_content());
                           } ?>
                           <?php echo wp_kses_post($eboost_home_callback_content); ?>
                           <?php if( 1 == $eboost_customizer_all_values['eboost-home-callback-remove-button'] ){ ?><br /><br />
                                <a href="<?php the_permalink(); ?>" class="btn eboost-btn btn-primary btn-first"><?php echo esc_html($eboost_home_callback_button);?></a>                               
                           <?php } ?>
                       </div>
                       <div class="col-md-4 hidden-xs col-sm-4 col-xs-12">
                        <div class="eboost-callback-right">
                           <img src="<?php echo esc_url($eboost_customizer_all_values['eboost-default-banner-image']); ?> " class="img-responsive">
                        </div>
                     </div>
                   </div>
                </div><!-- .dm banner slider -->
            </div>
        </div><!-- .dm banner section -->         
        <?php
            wp_reset_postdata();
            endwhile;
        endif;
    }
}
endif;
add_action( 'eboost_homepage', 'eboost_home_callback_section', 40 );