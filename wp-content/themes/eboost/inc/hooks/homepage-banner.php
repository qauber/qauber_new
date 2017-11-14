<?php 
if ( ! function_exists( 'eboost_home_banner' ) ) :
    /**
     * Banner Section
     *
     * @since Eboost 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function eboost_home_banner() { 
    global $eboost_customizer_all_values;
    if( 1 != $eboost_customizer_all_values['eboost-home-banner-enable'] ){
        return null;
    }
      ?>
        <section class="banner-section" id="banner-section">
          <div class="banner-wrapper">
            <div class="overlay">
              <?php if (has_header_video()) {
                echo "<div class='video-wrapper'>";
                the_custom_header_markup();
                echo "</div>";
              } else{ ?> 
                <img class="img-responsive" src="<?php header_image(); ?>">
              <?php } ?>
            </div>
            <div class="container">
                <div class="eboost-banner-content">
                   <h2><?php echo esc_html($eboost_customizer_all_values['eboost-home-banner-title']);?></h2>
                   <p><?php echo esc_html($eboost_customizer_all_values['eboost-home-banner-discription']);?></p>
                   <?php if ((!empty($eboost_customizer_all_values['eboost-home-banner-button1']))) { ?>
                     <div class="eboost-banner-btn">
                     <?php if ((!empty($eboost_customizer_all_values['eboost-home-banner-button1']))){?>
                        <a href="<?php echo esc_html($eboost_customizer_all_values['eboost-home-banner-button-url1']);?>" class="btn eboost-btn btn-primary btn-first"><?php echo esc_html($eboost_customizer_all_values['eboost-home-banner-button1']);?></a>
                      <?php } ?>
                     </div>
                  <?php } ?>
                </div>
             </div>
          </div>           
        </section>
        <!-- eboost header section end --> 
    <?php }
endif;
add_action( 'eboost_header_section', 'eboost_home_banner', 10 );
