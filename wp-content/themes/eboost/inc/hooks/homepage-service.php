<?php
if ( ! function_exists( 'eboost_home_service_array' ) ) :
    /**
     * Service Section array creation
     *
     * @since eboost 1.0.0
     *
     * @param string $from_service
     * @return array
     */
    function eboost_home_service_array( $from_service ){
        global $eboost_customizer_all_values;
        $eboost_home_service_number = absint($eboost_customizer_all_values['eboost-home-service-number']);
        $eboost_home_service_single_words = absint($eboost_customizer_all_values['eboost-home-page-service-single-words']);

        $eboost_home_service_contents_array = array();

        $eboost_home_service_contents_array[1]['eboost-home-service-title'] = __('Clean Designs', 'eboost');
        $eboost_home_service_contents_array[1]['eboost-home-service-content'] = __("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.", 'eboost');
        $eboost_home_service_contents_array[1]['eboost-home-service-link'] = '#';

        $eboost_home_service_page = array('eboost-home-service-pages-ids');

        if ( 'from-category' ==  $from_service ){
            $eboost_home_service_category = $eboost_customizer_all_values['eboost-home-service-category'];
            if( 0 != $eboost_home_service_category ){
                $eboost_home_service_args =    array(
                    'post_type' => 'post',
                    'cat' => absint($eboost_home_service_category),
                    'posts_per_page' => absint($eboost_home_service_numbe)
                );
            }
        }else {
                $eboost_home_service_posts = salient_customizer_get_repeated_all_value(3 , $eboost_home_service_page);
                $eboost_home_service_posts_ids = array();
                if( null != $eboost_home_service_posts ) {
                    foreach( $eboost_home_service_posts as $eboost_home_service_post ) {
                        if( 0 != $eboost_home_service_post['eboost-home-service-pages-ids'] ){
                            $eboost_home_service_posts_ids[] = $eboost_home_service_post['eboost-home-service-pages-ids'];
                        }
                    }
                    if( !empty( $eboost_home_service_posts_ids )){
                        $eboost_home_service_args =    array(
                            'post_type' => 'page',
                            'post__in' => array_map( 'absint', $eboost_home_service_posts_ids ),
                            'posts_per_page' => absint($eboost_home_service_number),
                            'orderby' => 'post__in'
                        );
                    }
                }
            }
        // the query
        if( !empty( $eboost_home_service_args )){

            $eboost_home_service_contents_array = array(); /*again empty array*/
            $eboost_home_service_post_query = new WP_Query( $eboost_home_service_args );
            if ( $eboost_home_service_post_query->have_posts() ) :
                $i = 1;
                while ( $eboost_home_service_post_query->have_posts() ) : $eboost_home_service_post_query->the_post();
                    $eboost_home_service_contents_array[$i]['eboost-home-service-title'] = get_the_title();
                    if (has_excerpt()) {
                        $eboost_home_service_contents_array[$i]['eboost-home-service-content'] = get_the_excerpt();
                    }
                    else {
                        $eboost_home_service_contents_array[$i]['eboost-home-service-content'] = eboost_words_count( $eboost_home_service_single_words ,get_the_content());
                    }
                    $eboost_home_service_contents_array[$i]['eboost-home-service-link'] = get_permalink();
                    $thumb_image ='';
                    if(has_post_thumbnail()){
                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                        $thumb_image = $thumb['0'];
                    }
                    $eboost_home_service_contents_array[$i]['eboost-home-service-page-image'] = $thumb_image;

                    $i++;
                endwhile;
                wp_reset_postdata();
            endif;
        }
        return $eboost_home_service_contents_array;
    }
endif;

if ( ! function_exists( 'eboost_home_service' ) ) :
    /**
     * Service Section
     *
     * @since eboost 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function eboost_home_service() {
        global $eboost_customizer_all_values;
        if( 1 != $eboost_customizer_all_values['eboost-home-service-enable'] ){
            return null;
        }
        $eboost_home_service_selection_options = $eboost_customizer_all_values['eboost-home-service-selection'];
        $eboost_service_arrays = eboost_home_service_array( $eboost_home_service_selection_options );
        if( is_array( $eboost_service_arrays )){
            $eboost_home_service_number = absint($eboost_customizer_all_values['eboost-home-service-number']);
            $eboost_home_service_button_text = $eboost_customizer_all_values['eboost-home-service-button-text'];
            ?>
            <section class="eboost-service" id="eboost-service">       
            <?php
            $i = 1;
            foreach( $eboost_service_arrays as $eboost_service_array ){
                if( $eboost_home_service_number < $i){
                    break;
                }
                if ($i % 2 == 0) {
                    $alt_class = 'service-image-right';
                } else {
                    $alt_class = 'service-image-left';
                }
                ?>
                <div class="<?php echo esc_attr($alt_class); ?>">
                    <div class="container">
                        <div class="row">
                            <div class="eboost-icon-content">
                                    <div class="col-sm-12 col-md-12 col-xs-12">
                                        <div class="content">
                                        <?php if(! empty($eboost_service_array['eboost-home-service-page-image'])){ ?>
                                            <div class="col-xs-12 col-sm-4 col-md-4 img">
                                                <img src="<?php echo esc_url($eboost_service_array['eboost-home-service-page-image'])?>" class="img-responsive">
                                            </div>
                                        <?php } ?>
                                            <div class="col-sm-8 col-md-8 col-xs-12 eboost-service-description">
                                                <h3><?php echo esc_html( $eboost_service_array['eboost-home-service-title'] );?></h3>
                                                <p><?php echo wp_kses_post( $eboost_service_array['eboost-home-service-content'] );?></p>
                                                <?php if (!empty($eboost_customizer_all_values['eboost-home-service-button-text'])) { ?>
                                                <div class="additional-button">
                                                    <a href="<?php echo esc_url($eboost_service_array['eboost-home-service-link']);?>" class="btn eboost-btn btn-primary btn-second"><?php echo esc_html($eboost_customizer_all_values['eboost-home-service-button-text']);?></a>
                                                </div>
                                            <?php } ?>
                                            </div>                                        
                                       </div>
                                   </div> 
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $i++;
                }
                ?>
            </section>
            <?php
        }
    }
endif;
add_action( 'eboost_homepage', 'eboost_home_service', 15 );