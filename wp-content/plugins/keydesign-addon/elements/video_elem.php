<?php
if (!class_exists('KD_ELEM_VIDEO')) {
    class KD_ELEM_VIDEO extends KEYDESIGN_ADDON_CLASS {
        function __construct() {
            add_action('admin_init', array($this, 'kd_video_init'));
            add_shortcode('tek_video', array($this, 'kd_video_shrt'));
        }
        // Element configuration in admin
        function kd_video_init() {
            if (function_exists('vc_map')) {
                vc_map(array(
                    "name" => esc_html__("Video Modal", "keydesign"),
                    "description" => esc_html__("Video modal", "keydesign"),
                    "base" => "tek_video",
                    "class" => "",
                    "icon" => plugins_url('assets/element_icons/video-modal.png', dirname(__FILE__)),
                    "category" => esc_html__("KeyDesign Elements", "keydesign"),
                    "params" => array(
                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Video link", "keydesign"),
                            "param_name" => "video_url",
                            "value" => "",
		                        "description" => esc_html__("Enter link to video.", "keydesign")
                        ),
                        array(
                            "type" => "attach_image",
                            "heading" => esc_html__("Video preview image:", "keydesign"),
                            "param_name" => "video_image",
                            "description" => esc_html__("Upload Video preview image", "keydesign")
                        ),
                        array(
                            "type" => "textfield",
                            "class" => "",
                            "heading" => esc_html__("Extra class name", "keydesign"),
                            "param_name" => "video_extra_class",
                            "value" => "",
                            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "keydesign")
                        ),
                    )
                ));
            }
        }

		// Render the element on front-end
        public function kd_video_shrt($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'video_url' 			=> '',
                'video_image' 			=> '',
                'video_extra_class'     => '',
            ), $atts));

            $embed = $video_w = $video_h = '';

            $video_w = 500;
            $video_h = $video_w / 1.61; //1.61 golden ratio

            global $wp_embed;
            $embed = '';
            if ( is_object( $wp_embed ) ) {
            	$embed = $wp_embed->run_shortcode( '[embed width="' . $video_w . '" height="' . $video_h . '"]' . $video_url . '[/embed]' );
            }

            $image  = wpb_getImageBySize($params = array(
                'post_id' => NULL,
                'attach_id' => $video_image,
                'thumb_size' => 'full',
                'class' => ""
            ));

            $new_video_url = substr($video_url, -3);

            $output = '<div class="video-container '.$video_extra_class.'">
                        '.$image['thumbnail'].'
                        <a data-toggle="modal" data-target="#video-modal-'.$new_video_url.'" data-backdrop="true">
                        <span class="play-video"><span class="fa fa-play"></span></span></a>
                        </div>
                        <h6 class="video-socials">
                            <span class="share-icon"></span>
                            <a href="https://www.facebook.com/sharer.php?u='.$video_url.'" target="_blank"><span class="video-social-text">Facebook</span><span class="fa fa-facebook"></span></a>
                            <a href="https://twitter.com/share?url='.$video_url.'" target="_blank"><span class="video-social-text">Twitter</span><span class="fa fa-twitter"></span></a>
                            <a href="https://plusone.google.com/_/+1/confirm?hl=en&url='.$video_url.'" target="_blank"><span class="video-social-text">Google Plus</span><span class="fa fa-google-plus"></span></a>
                        </h6>
                        <div class="modal fade video-modal" id="video-modal-'.$new_video_url.'" role="dialog">
                          <div class="modal-content">'.$embed.'</div>
                        </div>';
            return $output;
        }
    }
}
if (class_exists('KD_ELEM_VIDEO')) {
    $KD_ELEM_VIDEO = new KD_ELEM_VIDEO;
}
?>
