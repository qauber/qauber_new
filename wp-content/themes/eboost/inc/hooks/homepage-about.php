<?php
if ( ! function_exists( 'eboost_home_about_array' ) ) :
    /**
     * about Section array creation
     *
     * @since eboost 1.0.0
     *
     * @param string $from_about
     * @return array
     */
    function eboost_home_about_array( $from_about ){
        global $eboost_customizer_all_values;
        $eboost_home_about_number = 4;
        $eboost_home_about_single_words = absint($eboost_customizer_all_values['eboost-home-page-about-single-words']);

        $eboost_home_about_contents_array = array();

        $eboost_home_about_contents_array[1]['eboost-home-about-title'] = __('Clean Designs', 'eboost');
        $eboost_home_about_contents_array[1]['eboost-home-about-content'] = __("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.", 'eboost');
        $eboost_home_about_contents_array[1]['eboost-home-about-link'] = '#';
        $eboost_home_about_contents_array[1]['eboost-home-about-page-icon'] = 'fa-desktop';
        $eboost_home_about_contents_array[1]['eboost-home-about-page-link-text'] = __('Know More','eboost');
        $eboost_home_about_contents_array[1]['eboost-home-about-page-image'] = '';

        $eboost_icons_array = array('eboost-home-about-page-icon');
        $eboost_home_about_page = array('eboost-home-about-pages-ids');

        $eboost_icons_arrays = salient_customizer_get_repeated_all_value(4 , $eboost_icons_array);

        if ( 'from-category' ==  $from_about ){
            $eboost_home_about_category = $eboost_customizer_all_values['eboost-home-about-category'];
            if( 0 != $eboost_home_about_category ){
                $eboost_home_about_args =    array(
                    'post_type' => 'post',
                    'cat' => absint($eboost_home_about_category),
                    'posts_per_page' => absint($eboost_home_about_numbe)
                );
            }
        }else {
                $eboost_home_about_posts = salient_customizer_get_repeated_all_value(4 , $eboost_home_about_page);
                $eboost_home_about_posts_ids = array();
                if( null != $eboost_home_about_posts ) {
                    foreach( $eboost_home_about_posts as $eboost_home_about_post ) {
                        if( 0 != $eboost_home_about_post['eboost-home-about-pages-ids'] ){
                            $eboost_home_about_posts_ids[] = $eboost_home_about_post['eboost-home-about-pages-ids'];
                        }
                    }
                    if( !empty( $eboost_home_about_posts_ids )){
                        $eboost_home_about_args =    array(
                            'post_type' => 'page',
                            'post__in' => array_map( 'absint', $eboost_home_about_posts_ids ),
                            'posts_per_page' => absint($eboost_home_about_number),
                            'orderby' => 'post__in'
                        );
                    }
                }
            }
        // the query
        if( !empty( $eboost_home_about_args )){

            $eboost_home_about_contents_array = array(); /*again empty array*/
            $eboost_home_about_post_query = new WP_Query( $eboost_home_about_args );
            if ( $eboost_home_about_post_query->have_posts() ) :
                $i = 1;
                while ( $eboost_home_about_post_query->have_posts() ) : $eboost_home_about_post_query->the_post();
                    $eboost_home_about_contents_array[$i]['eboost-home-about-title'] = get_the_title();
                    if (has_excerpt()) {
                        $eboost_home_about_contents_array[$i]['eboost-home-about-content'] = get_the_excerpt();
                    }
                    else {
                        $eboost_home_about_contents_array[$i]['eboost-home-about-content'] = eboost_words_count( $eboost_home_about_single_words ,get_the_content());
                    }
                    $eboost_home_about_contents_array[$i]['eboost-home-about-link'] = get_permalink();
                    $thumb_image = '';
                    if(has_post_thumbnail()){
                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
                        $thumb_image = $thumb['0'];
                    }
                    $eboost_home_about_contents_array[$i]['eboost-home-about-page-image'] = $thumb_image;
                    if(isset( $eboost_icons_arrays[$i] )){
                        $eboost_home_about_contents_array[$i]['eboost-home-about-page-icon'] = $eboost_icons_arrays[$i]['eboost-home-about-page-icon'];
                    }
                    else{
                        $eboost_home_about_contents_array[$i]['eboost-home-about-page-icon'] = 'fa-desktop';
                    }
                    $eboost_home_about_contents_array[$i]['eboost-home-about-page-link-text'] = __('Know More','eboost');

                    $i++;
                endwhile;
                wp_reset_postdata();
            endif;
        }
        return $eboost_home_about_contents_array;
    }
endif;

if ( ! function_exists( 'eboost_home_about' ) ) :
    /**
     * about Section
     *
     * @since eboost 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function eboost_home_about() {
        global $eboost_customizer_all_values;
        if( 1 != $eboost_customizer_all_values['eboost-home-about-enable'] ){
            return null;
        }
        $eboost_home_about_selection_options = $eboost_customizer_all_values['eboost-home-about-selection'];
        $eboost_about_arrays = eboost_home_about_array( $eboost_home_about_selection_options );
        if( is_array( $eboost_about_arrays )){
            $eboost_home_about_number = 4;
            $eboost_home_about_title = $eboost_customizer_all_values['eboost-home-about-title'];
            $eboost_home_about_button_text = $eboost_customizer_all_values['eboost-home-about-button-text'];
            $about_title_1 = ''; $about_content_1= ''; $about_icon_1 = ''; $about_image_1 = '';
            $about_title_2 = ''; $about_content_2= ''; $about_icon_2 = ''; $about_image_2 = '';
            $about_title_3 = ''; $about_content_3= ''; $about_icon_3 = ''; $about_image_3 = '';
            $about_title_4 = ''; $about_content_4= ''; $about_icon_4 = ''; $about_image_4 = '';
            ?>          
             <section class="eboost-featured" id="eboost-featured">
               <div class="container">
                  <div class="row">
                     <div class="eboost-section-heading">
                        <?php if(!empty( $eboost_home_about_title ) ){ ?>
                            <h2><?php echo esc_html(  $eboost_home_about_title); ?></h2>
                        <?php } ?>                 
                     </div>

                     <?php
                     $i = 1;
                     foreach( $eboost_about_arrays as $eboost_about_array ){
                         if( $eboost_home_about_number < $i){
                             break;
                         } 
                            ${'about_title_'.$i} = esc_html( $eboost_about_array['eboost-home-about-title'] );
                            ${'about_content_'.$i} =  wp_kses_post( $eboost_about_array['eboost-home-about-content'] );
                            ${'about_icon_'.$i} =  esc_attr( $eboost_about_array['eboost-home-about-page-icon'] );
                            ${'about_image_'.$i} =  esc_url( $eboost_about_array['eboost-home-about-page-image'] );
                     $i++;
                     }
                     ?>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                       <a href="#tab-1" data-toggle="tab"> 
                            <div class="eboost-featured-content left-featured-content">
                                <?php if (!empty($about_icon_1)){?><i class="fa <?php echo esc_attr($about_icon_1); ?>"></i><?php } ?>
                                <h3><?php echo esc_html($about_title_1); ?></h3>
                                <p><?php echo wp_kses_post($about_content_1); ?></p>
                           </div>  
                       </a>            
                       <a href="#tab-3" data-toggle="tab">
                           <div class="eboost-featured-content left-featured-content">
                                <?php if (!empty($about_icon_3)){?><i class="fa <?php echo esc_attr($about_icon_3); ?>"></i><?php } ?>
                              <h3><?php echo esc_html($about_title_3); ?></h3>
                              <p><?php echo wp_kses_post($about_content_3); ?></p>
                           </div>    
                       </a>          
                    </div>
                    <div class="col-md-4 hidden-xs col-sm-4 col-xs-12">
                       <div class="eboost-featured-content middle-featured-image">  
                         <div class="tab-content">
                             <div class="tab-pane active" id="tab-1"> <img src="<?php echo esc_url($about_image_1); ?>"></div>
                             <div class="tab-pane" id="tab-2"> <img src="<?php echo esc_url($about_image_2); ?>"></div>
                             <div class="tab-pane " id="tab-3"> <img src="<?php echo esc_url($about_image_3); ?>"></div>
                             <div class="tab-pane" id="tab-4"> <img src="<?php echo esc_url($about_image_4); ?>"></div>                          
                         </div>
                       </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                       <a href="#tab-2" data-toggle="tab">
                           <div class="eboost-featured-content right-featured-content">
                              <?php if (!empty($about_icon_2)){?><i class="fa <?php echo esc_attr($about_icon_2); ?>"></i><?php } ?>
                              <h3><?php echo esc_html($about_title_2); ?></h3>
                              <p><?php echo wp_kses_post($about_content_2); ?></p>
                           </div>
                       </a>   
                       <a href="#tab-4" data-toggle="tab">               
                           <div class="eboost-featured-content right-featured-content">
                              <?php if (!empty($about_icon_4)){?><i class="fa <?php echo esc_attr($about_icon_4); ?>"></i><?php } ?>
                            <h3><?php echo esc_html($about_title_4); ?></h3>
                              <p><?php echo wp_kses_post($about_content_4); ?></p>
                           </div>     
                       </a>             
                    </div>
                  </div>
               </div>
               <!-- container -->
            </section>

            <?php
        }
    }
endif;
add_action( 'eboost_homepage', 'eboost_home_about', 20 );