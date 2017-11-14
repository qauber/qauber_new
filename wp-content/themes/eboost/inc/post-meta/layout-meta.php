<?php
/**
 * eboost Custom Metabox
 *
 * @package eboost
 */
$eboost_post_types = array(
    'post',
    'page'
);

add_action('add_meta_boxes', 'eboost_add_layout_metabox');
function eboost_add_layout_metabox() {
    global $post;
    $frontpage_id = get_option('page_on_front');
    if( $post->ID == $frontpage_id ){
        return;
    }

    global $eboost_post_types;
    foreach ( $eboost_post_types as $post_type ) {
        add_meta_box(
            'eboost_layout_options', // $id
            __( 'Layout options', 'eboost' ), // $title
            'eboost_layout_options_callback', // $callback
            $post_type, // $page
            'normal', // $context
            'high'// $priority
        );
    }

}
/* eboost sidebar layout */
$eboost_default_layout_options = array(
    'left-sidebar' => array(
        'value'     => 'left-sidebar',
        'thumbnail' => get_template_directory_uri() . '/inc/images/left-sidebar.png'
    ),
    'right-sidebar' => array(
        'value' => 'right-sidebar',
        'thumbnail' => get_template_directory_uri() . '/inc/images/right-sidebar.png'
    ),
    'no-sidebar' => array(
        'value'     => 'no-sidebar',
        'thumbnail' => get_template_directory_uri() . '/inc/images/no-sidebar.png'
    )
);
/* eboost featured layout */
$eboost_single_post_image_align_options = array(
    'full' => array(
        'value' => 'full',
        'label' => __( 'Full', 'eboost' )
    ),
    'right' => array(
        'value' => 'right',
        'label' => __( 'Right ', 'eboost' ),
    ),
    'left' => array(
        'value'     => 'left',
        'label' => __( 'Left', 'eboost' ),
    ),
    'no-image' => array(
        'value'     => 'no-image',
        'label' => __( 'No Image', 'eboost' )
    )
);

function eboost_layout_options_callback() {

    global $post , $eboost_default_layout_options, $eboost_single_post_image_align_options;
    $eboost_customizer_saved_values = eboost_get_all_options(1);

    /*eboost-single-post-image-align*/
    $eboost_single_post_image_align = $eboost_customizer_saved_values['eboost-single-post-image-align'];

    /*eboost default layout*/
    $eboost_single_sidebar_layout = $eboost_customizer_saved_values['eboost-default-layout'];

    wp_nonce_field( basename( __FILE__ ), 'eboost_layout_options_nonce' );
    ?>
    <table class="form-table page-meta-box">
        <!--Image alignment-->
        <tr>
            <td colspan="4"><em class="f13"><?php esc_attr__( 'Choose Sidebar Template', 'eboost' ); ?></em></td>
        </tr>
        <tr>
            <td>
                <?php
                $eboost_single_sidebar_layout_meta = get_post_meta( $post->ID, 'eboost-default-layout', true );
                if( false != $eboost_single_sidebar_layout_meta ){
                   $eboost_single_sidebar_layout = $eboost_single_sidebar_layout_meta;
                }
                foreach ($eboost_default_layout_options as $field) {
                    ?>
                    <div class="hide-radio radio-image-wrapper" style="float:left; margin-right:30px;">
                        <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="eboost-default-layout"
                               value="<?php echo esc_attr( $field['value'] ); ?>"
                            <?php checked( $field['value'], $eboost_single_sidebar_layout ); ?>/>
                        <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                            <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" />
                        </label>
                    </div>
                <?php } // end foreach
                ?>
                <div class="clear"></div>
            </td>
        </tr>
        <tr>
            <td><em class="f13"><?php esc_attr__( 'You can set up the sidebar content', 'eboost' ); ?> <a href="<?php echo esc_url( admin_url('/widgets.php') ); ?>"><?php esc_attr__( 'here', 'eboost' ); ?></a></em></td>
        </tr>
        <!--Image alignment-->
        <tr>
            <td colspan="4"><?php esc_attr__( 'Featured Image Alignment', 'eboost' ); ?></td>
        </tr>
        <tr>
            <td>
                <?php
                $eboost_single_post_image_align_meta = get_post_meta( $post->ID, 'eboost-single-post-image-align', true );
                if( false != $eboost_single_post_image_align_meta ){
                    $eboost_single_post_image_align = $eboost_single_post_image_align_meta;
                }
                foreach ($eboost_single_post_image_align_options as $field) {
                    ?>
                    <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="eboost-single-post-image-align" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $eboost_single_post_image_align ); ?>/>
                    <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                        <?php echo esc_html( $field['label'] ); ?>
                    </label>
                <?php } // end foreach
                ?>
                <div class="clear"></div>
            </td>
        </tr>
    </table>

<?php }

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function eboost_save_sidebar_layout( $post_id ) {
    global $post;
    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'eboost_layout_options_nonce' ] ) || !wp_verify_nonce(sanitize_key( $_POST[ 'eboost_layout_options_nonce' ]), basename( __FILE__ ) ) ) {
        return;
    }
    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( !current_user_can( 'edit_page', $post_id ) ) {
        return $post_id;
    }
    
    if(isset($_POST['eboost-default-layout'])){
        $old = get_post_meta( $post_id, 'eboost-default-layout', true);
        $new = sanitize_text_field(wp_unslash($_POST['eboost-default-layout']));
        if ($new && $new != $old) {
            update_post_meta($post_id, 'eboost-default-layout', $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id,'eboost-default-layout', $old);
        }
    }

    /*image align*/
    if(isset($_POST['eboost-single-post-image-align'])){
        $old = get_post_meta( $post_id, 'eboost-single-post-image-align', true);
        $new = sanitize_text_field(wp_unslash($_POST['eboost-single-post-image-align']));
        if ($new && $new != $old) {
            update_post_meta($post_id, 'eboost-single-post-image-align', $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id,'eboost-single-post-image-align', $old);
        }
    }
}
add_action('save_post', 'eboost_save_sidebar_layout');
