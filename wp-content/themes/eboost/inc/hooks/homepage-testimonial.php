<?php
if (!function_exists('eboost_home_testimonial_array')) :
    /**
     * Testimonial array creation
     *
     * @since Eboost 1.0.0
     *
     * @param string $from_testimonial
     * @return array
     */
    function eboost_home_testimonial_array($from_testimonial){
        global $eboost_customizer_all_values;
        $eboost_home_testimonial_number = absint( $eboost_customizer_all_values['eboost-home-testimonial-number'] );
        $eboost_home_testimonial_single_words = absint( $eboost_customizer_all_values['eboost-home-testimonial-single-words'] );

        $eboost_home_testimonial_contents_array = array();
        $eboost_home_testimonial_contents_array[0]['eboost-home-testimonial-title'] = __('John Doe','eboost');
        $eboost_home_testimonial_contents_array[0]['eboost-home-testimonial-content'] = __("The set doesn't moved. Deep don't fru it fowl gathering heaven days moving creeping under from i air. Set it fifth Meat was darkness. every bring in it.",'eboost');
        $eboost_home_testimonial_contents_array[0]['eboost-home-testimonial-image'] = get_template_directory_uri()."/assets/img/no-img.png";
        $eboost_home_testimonial_contents_array[0]['eboost-home-testimonial-link'] = '#';
        $eboost_home_testimonial_contents_array[0]['eboost-testimonial-class'] = 'active';
        $eboost_home_testimonial_contents_array[0]['eboost-testimonial-slider-number'] = 0;
        $repeated_page = array('eboost-home-testimonial-pages-ids');

        if ('from-category' == $from_testimonial) {
            $eboost_home_testimonial_category = $eboost_customizer_all_values['eboost-home-testimonial-category'];
            if( 0 != $eboost_home_testimonial_category ){
                $eboost_home_testimonial_args = array(
                    'post_type' => 'post',
                    'cat' => absint($eboost_home_testimonial_category),
                    'posts_per_page' => absint($eboost_home_testimonial_number),
                );
            }

        }
        else {
            $eboost_home_testimonial_posts = salient_customizer_get_repeated_all_value(3 , $repeated_page);
            $eboost_home_testimonial_posts_ids = array();
            if (null != $eboost_home_testimonial_posts) {
                foreach ($eboost_home_testimonial_posts as $eboost_home_testimonial_post) {
                    if (0 != $eboost_home_testimonial_post['eboost-home-testimonial-pages-ids']) {
                        $eboost_home_testimonial_posts_ids[] = $eboost_home_testimonial_post['eboost-home-testimonial-pages-ids'];
                    }
                }
                if( !empty( $eboost_home_testimonial_posts_ids )){
                    $eboost_home_testimonial_args = array(
                        'post_type' => 'page',
                        'post__in' => array_map( 'absint', $eboost_home_testimonial_posts_ids ),
                        'posts_per_page' => absint($eboost_home_testimonial_number),
                        'orderby' => 'post__in'
                    );
                }
            }
        }
        // the query
        if( !empty( $eboost_home_testimonial_args )){
            $eboost_home_testimonial_contents_array = array();
            $eboost_home_testimonial_post_query = new WP_Query($eboost_home_testimonial_args);
            if ($eboost_home_testimonial_post_query->have_posts()) :
                $i = 0;
                while ($eboost_home_testimonial_post_query->have_posts()) : $eboost_home_testimonial_post_query->the_post();
                    $thumb_image ='';
                    if(has_post_thumbnail()){
                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'thumbnail' );
                        $thumb_image = $thumb['0'];
                    }

                    $eboost_home_testimonial_contents_array[$i]['eboost-home-testimonial-title'] = get_the_title();
                    if (has_excerpt()) {
                        $eboost_home_testimonial_contents_array[$i]['eboost-home-testimonial-content'] = get_the_excerpt();
                    }
                    else {
                        $eboost_home_testimonial_contents_array[$i]['eboost-home-testimonial-content'] = eboost_words_count( $eboost_home_testimonial_single_words ,get_the_content());
                    }
                    $eboost_home_testimonial_contents_array[$i]['eboost-home-testimonial-image'] = $thumb_image;
                    $eboost_home_testimonial_contents_array[$i]['eboost-home-testimonial-link'] = get_permalink();
                    if ($i == 0) {
                        $eboost_home_testimonial_contents_array[$i]['eboost-testimonial-class'] = 'active';
                    }
                    else{
                        $eboost_home_testimonial_contents_array[$i]['eboost-testimonial-class'] = '';
                    }
                        $eboost_home_testimonial_contents_array[$i]['eboost-testimonial-slider-number'] = $i;
                    $i++;
                endwhile;
                wp_reset_postdata();
            endif;
        }
        return $eboost_home_testimonial_contents_array;
    }
endif;

if ( ! function_exists( 'eboost_home_testimonial' ) ) :
    /**
     * About Section
     *
     * @since Eboost 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function eboost_home_testimonial() {
        global $eboost_customizer_all_values;
        if( (1 != $eboost_customizer_all_values['eboost-home-testimonial-enable']) ){
            return;
        }
        $eboost_home_testimonial_selection_options = $eboost_customizer_all_values['eboost-home-testimonial-selection'];
        $eboost_testimonial_arrays = eboost_home_testimonial_array($eboost_home_testimonial_selection_options);
        if(1 == $eboost_customizer_all_values['eboost-home-testimonial-enable']) {
            if (is_array($eboost_testimonial_arrays)) {
                $eboost_home_testimonial_title = $eboost_customizer_all_values['eboost-home-testimonial-main-title'];
                $eboost_home_testimonial_number = absint( $eboost_customizer_all_values['eboost-home-testimonial-number'] );
                $eboost_home_testimonial_icon_no = ($eboost_home_testimonial_number - 1) ;
                ?>
                <div class="db-testimonials" id="eboost-testimonial">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="s-title">
                                    <h2><?php echo esc_html(  $eboost_home_testimonial_title); ?></h2>
                                    <div class="divider-v1"></div>
                                </div><!-- .title -->
                            </div><!-- .col-md-12 -->

                            <div class="col-md-12">
                                <div class="center">
                                    <?php
                                    $i = 1;
                                    foreach( $eboost_testimonial_arrays as $eboost_testimonial_array ){
                                        if( $eboost_home_testimonial_number < $i){
                                            break;
                                        }
                                        if(empty($eboost_testimonial_array['eboost-home-testimonial-image'])){
                                            $eboost_feature_testimonial_slider_image = get_template_directory_uri().'/assets/img/no-img.png';
                                        }
                                        else{
                                            $eboost_feature_testimonial_slider_image =$eboost_testimonial_array['eboost-home-testimonial-image'];
                                        }
                                        ?>                              
                                        <div class="testimonials-contain">
                                            <div class="testimonials-contain-wrapper">
                                                 <div class="clients-image">
                                                     <div class="testimonials-image">
                                                            <img src="<?php echo esc_url( $eboost_feature_testimonial_slider_image)?>" class="img-response">
                                                             <?php if (!empty($eboost_testimonial_array['eboost-home-testimonial-title'])) {?>
                                                        </div>
                                                       <h3> <a href="<?php echo esc_url($eboost_testimonial_array['eboost-home-testimonial-link']);?>">
                                                            <?php echo esc_html( $eboost_testimonial_array['eboost-home-testimonial-title'] ); ?>
                                                        </a> </h3>
                                                    <?php } ?>
                                                 </div>
                                                 <div class="clients-text">
                                                    <?php echo wp_kses_post( $eboost_testimonial_array['eboost-home-testimonial-content'] ); ?>
                                                 </div>
                                            </div> 
                                      </div>
                                      <?php } ?>
                                </div>
                            </div><!-- .col-md-12 -->
                        </div><!-- .row -->
                    </div><!-- .container -->
                </div><!-- .db-testimoials -->
            <?php
            }
        }
    }
endif;
add_action( 'eboost_homepage', 'eboost_home_testimonial', 45 );