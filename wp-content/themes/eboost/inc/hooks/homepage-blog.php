<?php
if ( ! function_exists( 'eboost_home_blog' ) ) :
    /**
     * Blog Section
     *
     * @since Eboost 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function eboost_home_blog() {
        global $eboost_customizer_all_values;
        global $post;
        $author_id=$post->post_author;
        $eboost_home_blog_title = $eboost_customizer_all_values['eboost-home-blog-title'];
        $eboost_home_blog_button_text = $eboost_customizer_all_values['eboost-home-blog-button-text'];
        $eboost_home_blog_button_link = $eboost_customizer_all_values['eboost-home-blog-button-link'];
        $eboost_home_blog_single_words = absint( $eboost_customizer_all_values['eboost-home-blog-single-words'] );
        
        $eboost_home_blog_category = $eboost_customizer_all_values['eboost-home-blog-category'];
        if( 1 != $eboost_customizer_all_values['eboost-home-blog-enable'] ){
            return null;
        }
        ?>
        <div class="db-latest-news" id="eboost-blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="s-title">
                            <h2 class="blog-heading"><?php echo esc_html( $eboost_home_blog_title );?></h2>
                            <div class="divider-v1"></div>
                        </div><!-- .title -->
                    </div><!-- .col-md-12 -->
                    <div class="news-coll">
                        <?php
                        $eboost_home_blog_args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 3,
                            'cat'           => absint($eboost_home_blog_category),
                            'ignore_sticky_posts' => 1
                        );
                        $eboost_home_about_post_query = new WP_Query($eboost_home_blog_args);
                        if ($eboost_home_about_post_query->have_posts()) :
                            while ($eboost_home_about_post_query->have_posts()) : $eboost_home_about_post_query->the_post();
                                if(has_post_thumbnail()){
                                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'eboost-blog' );
                                    $url = $thumb['0'];
                                }
                                else{
                                    $url = get_template_directory_uri().'/assets/img/placeholder-banner.png';
                                } ?>

                                <div class="col-sm-6 col-md-4">
                                    <section class="blog-section" id="blog-section">
                                        <div class="img-n-des clearfix">
                                            <div class="img-wrapper"> 
                                                <div class="overlay">  
                                                   <!-- date block -->
                                                        <div class="blog-date">
                                                            <span>
                                                                <?php
                                                                $archive_year  = get_the_time('Y'); 
                                                                $archive_month = get_the_time('m'); 
                                                                $archive_day   = get_the_time('d'); 
                                                                ?>
                                                                <a href="<?php echo get_day_link($archive_year, $archive_month, $archive_day); ?>"><i class="fa fa-calendar"></i> <?php echo get_the_date('M j');?></a>
                                                            </span>
                                                        </div>                                            
                                                    <img class="blog-img img-responsive" src="<?php echo esc_url( $url); ?>" alt="<?php the_title();?>">                                                   
                                                </div><!-- overlay-->
                                            </div><!-- .img-wrapper -->
                                            <h3 class="news-title"><a href="<?php the_permalink();?>">
                                                <?php the_title(); ?>
                                            </a></h3>
                                            <p>
                                                <?php
                                                if ( has_excerpt() ) {
                                                    the_excerpt();
                                                } else {
                                                    $content_blog = get_the_content();
                                                    echo wp_kses_post(eboost_words_count( $eboost_home_blog_single_words, $content_blog ));
                                                } ?>
                                            </p>
                                            <div class="detail">
                                                    <div class="user">
                                                       <a href="<?php echo esc_url( get_author_posts_url( $author_id ) )?>" ><i class="fa fa-user"></i><span><?php echo esc_html( get_the_author_meta( 'user_nicename', $author_id )); ?></span> </a>
                                                    </div>                                                        
                                                        <!-- category div -->
                                                    <div class = "f-blog-cat clearfix">
                                                        <span class="cat-links">
                                                        <?php echo wp_kses_post(get_the_category_list( " ", "", get_the_id())); ?>
                                                        </span>
                                                   </div>
                                            </div><!-- .detail --> 
                                        </div><!-- .img-n-des -->
                                       
                                    </section><!-- section -->
                                </div><!-- .col-md-4 -->

                            <?php endwhile; 
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div><!-- .news-coll -->

                    <div class="clearfix"></div>
                    <?php
                        if( !empty ( $eboost_home_blog_button_text ) ){
                            ?><div class="more-blog">
                                    <a class="btn eboost-btn btn-primary btn-second" href="<?php echo esc_url( $eboost_home_blog_button_link );?>">
                                     <?php echo esc_html( $eboost_home_blog_button_text );?></a>
                                </div>
                            <?php
                        }
                    ?>
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .db premium media -->
        <?php
    }
endif;
add_action( 'eboost_homepage', 'eboost_home_blog', 50 );