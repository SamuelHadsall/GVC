<?php 

add_action("admin_init", "gvc_add_post_meta_box");
function gvc_add_post_meta_box(){

    add_meta_box(
        "gvc-post-format-options", 
        __("Post Format Options", TEMP_NAME),
        "render_gvc_post_options", 
        "post",
        "normal", 
        "high"
    );

}

function render_gvc_post_options($post) {
    
    $values = get_post_custom( $post->ID );
    $gvc_post_audio_mp3         = isset( $values['gvc_post_audio_mp3'] ) ? esc_url( $values["gvc_post_audio_mp3"][0] ) : "";
    $gvc_post_audio_ogg         = isset( $values['gvc_post_audio_ogg'] ) ? esc_url( $values["gvc_post_audio_ogg"][0] ) : "";
    $gvc_post_audio_embed       = isset( $values['gvc_post_audio_embed'] ) ? esc_attr( $values["gvc_post_audio_embed"][0] ) : "";
    $gvc_post_video_mp4         = isset( $values['gvc_post_video_mp4'] ) ? esc_url( $values["gvc_post_video_mp4"][0] ) : "";
    $gvc_post_video_ogv         = isset( $values['gvc_post_video_ogv'] ) ? esc_url( $values["gvc_post_video_ogv"][0] ) : "";
    $gvc_post_video_webm        = isset( $values['gvc_post_video_webm'] ) ? esc_url( $values["gvc_post_video_webm"][0] ) : "";
    $gvc_post_video_embed       = isset( $values['gvc_post_video_embed'] ) ? esc_attr( $values["gvc_post_video_embed"][0] ) : "";
    $gvc_post_video_poster      = isset( $values['gvc_post_video_poster'] ) ? esc_attr( $values["gvc_post_video_poster"][0] ) : "";
    $gvc_post_link_url          = isset( $values['gvc_post_link_url'] ) ? esc_url( $values["gvc_post_link_url"][0] ) : "";
    $gvc_post_image_url         = isset( $values['gvc_post_image_url'] ) ? esc_url( $values["gvc_post_image_url"][0] ) : "";
    $gvc_post_image_description = isset( $values['gvc_post_image_description'] ) ? esc_attr( $values["gvc_post_image_description"][0] ) : "";
    $gvc_post_status_author     = isset( $values['gvc_post_status_author'] ) ? esc_attr( $values["gvc_post_status_author"][0] ) : "";
    $gvc_post_quote_author      = isset( $values['gvc_post_quote_author'] ) ? esc_attr( $values["gvc_post_quote_author"][0] ) : "";
    $gvc_post_featured_media    = isset( $values['gvc_post_featured_media'] ) ? esc_attr( $values["gvc_post_featured_media"][0] ) : "yes";

    wp_nonce_field( 'gvc_post_meta_nonce', 'gvc_post_meta_nonce' );

?>
    <div id="gvc-post-featured-media">
        <label for="post-featured-media">
            <input type="checkbox" id="post-featured-media" name="gvc_post_featured_media" value="no" <?php checked( $gvc_post_featured_media, "no" ); ?> />
            <?php echo __(' - Disable Featured Media in this post (Featured Image / Featured Gallery / Featured Video)', TEMP_NAME); ?>
        </label>
    </div>
    <div id="gvc-post-format-audio" class="gvc-post-option">
        <h4><?php echo __("Audio post format options", TEMP_NAME); ?></h4>
        <div>
            <label for="gvc_post_audio_mp3"><?php echo __('Enter  MP3 audio file link here:', TEMP_NAME); ?></label>
            <input name="gvc_post_audio_mp3" id="post-audio-mp3" type="text" value="<?php echo $gvc_post_audio_mp3;?>"/>
        </div>
        <div>
            <label for="gvc_post_audio_ogg"><?php echo __('Enter  OGG audio file link here:', TEMP_NAME); ?></label>
            <input name="gvc_post_audio_ogg" id="post-audio-ogg" type="text" value="<?php echo $gvc_post_audio_ogg;?>"/>
        </div>
        <div>
            <label for="gvc_post_audio_embed"><?php echo __('Embed audio here:', TEMP_NAME); ?></label>
            <textarea name="gvc_post_audio_embed" id="post-audio-embed"><?php echo $gvc_post_audio_embed;?></textarea>
        </div>
    </div>
    <div id="gvc-post-format-video" class="gvc-post-option">
        <h4><?php echo __("Video post format options", TEMP_NAME); ?></h4>
        <div>
            <label for="gvc_post_video_mp4"><?php echo __('Enter  MP4 video file link here:', TEMP_NAME); ?></label>
            <input name="gvc_post_video_mp4" id="post-video-mp3" type="text" value="<?php echo $gvc_post_video_mp4;?>"/>
        </div>
        <div>
            <label for="gvc_post_video_ogv"><?php echo __('Enter  OGV video file link here:', TEMP_NAME); ?></label>
            <input name="gvc_post_video_ogv" id="post-video-ogv" type="text" value="<?php echo $gvc_post_video_ogv;?>"/>
        </div>
        <div>
            <label for="gvc_post_video_webm"><?php echo __('Enter  WEBM video file link here:', TEMP_NAME); ?></label>
            <input name="gvc_post_video_webm" id="post-video-webm" type="text" value="<?php echo $gvc_post_video_webm;?>"/>
        </div>
        <br>
        <div>
            <div class="gvc-upload">
                <input name="gvc_post_video_poster" id="post-video-poster" type="hidden" class="gvc-upload-path" value="<?php echo $gvc_post_video_poster;?>"/> 
                <input class="gvc-button-upload button" type="button" value="<?php echo __('Upload video poster image', TEMP_NAME) ?>" />
                <input class="gvc-button-remove button" type="button" value="<?php echo __('Remove video poster image', TEMP_NAME) ?>" />
                <img src='<?php echo $gvc_post_video_poster; ?>' class='gvc-preview-upload'/>
            </div>
        </div>

        <div>
            <label for="gvc_post_video_embed"><?php echo __('Embed video here:', TEMP_NAME); ?></label>
            <textarea name="gvc_post_video_embed" id="post-video-embed"><?php echo $gvc_post_video_embed;?></textarea>
        </div>
    </div>
    <div id="gvc-post-format-gallery" class="gvc-post-option">
        <h4><?php echo __("Gallery post format options", TEMP_NAME); ?></h4>
        <div><?php echo __('Use 2nd/3rd ... Featured Images (in the right sidebar, right after main featured image) to upload images for the gallery post format', TEMP_NAME); ?></div>
    </div>
    <div id="gvc-post-format-link" class="gvc-post-option">
        <h4><?php echo __("Link post format options", TEMP_NAME); ?></h4>
        <div>
            <label for="gvc_post_link_url"><?php echo __('Enter link URL here:', TEMP_NAME); ?></label>
            <input name="gvc_post_link_url" id="post-link-url" type="text" value="<?php echo $gvc_post_link_url;?>"/>
        </div>
    </div>
    <div id="gvc-post-format-image" class="gvc-post-option">
        <h4><?php echo __("Image post format options", TEMP_NAME); ?></h4>
        <div>
            <label for="gvc_post_image_url"><?php echo __('Enter image URL here:', TEMP_NAME); ?></label>
            <input name="gvc_post_image_url" id="post-image-url" type="text" value="<?php echo $gvc_post_image_url;?>"/>
        </div>
        <div>
            <label for="gvc_post_image_description"><?php echo __('Enter image DESCRIPTION here:', TEMP_NAME); ?></label>
            <input name="gvc_post_image_description" id="post-image-description" type="text" value="<?php echo $gvc_post_image_description;?>"/>
        </div>
    </div>
    <div id="gvc-post-format-status" class="gvc-post-option">
        <h4><?php echo __("Status post format options", TEMP_NAME); ?></h4>
        <div>
            <label for="gvc_post_status_author"><?php echo __('Enter status author name here:', TEMP_NAME); ?></label>
            <input name="gvc_post_status_author" id="post-status-author" type="text" value="<?php echo $gvc_post_status_author;?>"/>
        </div>
    </div>
    <div id="gvc-post-format-quote" class="gvc-post-option">
        <h4><?php echo __("Quote post format options", TEMP_NAME); ?></h4>
        <div>
            <label for="gvc_post_quote_author"><?php echo __('Enter quote author name here:', TEMP_NAME); ?></label>
            <input name="gvc_post_quote_author" id="post-quote-author" type="text" value="<?php echo $gvc_post_quote_author;?>"/>
        </div>
    </div>
<?php
}

add_action( 'save_post', 'save_gvc_post_format_options' );  
function save_gvc_post_format_options( $post_id )  
{  
    
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
    if( !isset( $_POST['gvc_post_meta_nonce'] ) || !wp_verify_nonce( $_POST['gvc_post_meta_nonce'], 'gvc_post_meta_nonce' ) ) return;  
    if( !current_user_can( 'edit_post' ) ) return;

    if( isset( $_POST['gvc_post_audio_mp3'] ) ){update_post_meta($post_id, "gvc_post_audio_mp3",$_POST["gvc_post_audio_mp3"]);}
    if( isset( $_POST['gvc_post_audio_ogg'] ) ){update_post_meta($post_id, "gvc_post_audio_ogg",$_POST["gvc_post_audio_ogg"]);}
    if( isset( $_POST['gvc_post_audio_embed'] ) ){update_post_meta($post_id, "gvc_post_audio_embed",$_POST["gvc_post_audio_embed"]);}
    if( isset( $_POST['gvc_post_video_mp4'] ) ){update_post_meta($post_id, "gvc_post_video_mp4",$_POST["gvc_post_video_mp4"]);}
    if( isset( $_POST['gvc_post_video_ogv'] ) ){update_post_meta($post_id, "gvc_post_video_ogv",$_POST["gvc_post_video_ogv"]);}
    if( isset( $_POST['gvc_post_video_webm'] ) ){update_post_meta($post_id, "gvc_post_video_webm",$_POST["gvc_post_video_webm"]);}
    if( isset( $_POST['gvc_post_video_embed'] ) ){update_post_meta($post_id, "gvc_post_video_embed",$_POST["gvc_post_video_embed"]);}
    if( isset( $_POST['gvc_post_video_poster'] ) ){update_post_meta($post_id, "gvc_post_video_poster",$_POST["gvc_post_video_poster"]);}
    if( isset( $_POST['gvc_post_link_url'] ) ){update_post_meta($post_id, "gvc_post_link_url",$_POST["gvc_post_link_url"]);}
    if( isset( $_POST['gvc_post_image_url'] ) ){update_post_meta($post_id, "gvc_post_image_url",$_POST["gvc_post_image_url"]);}
    if( isset( $_POST['gvc_post_image_description'] ) ){update_post_meta($post_id, "gvc_post_image_description",$_POST["gvc_post_image_description"]);}
    if( isset( $_POST['gvc_post_status_author'] ) ){update_post_meta($post_id, "gvc_post_status_author",$_POST["gvc_post_status_author"]);}
    if( isset( $_POST['gvc_post_quote_author'] ) ){update_post_meta($post_id, "gvc_post_quote_author",$_POST["gvc_post_quote_author"]);}

    $gvc_post_featured_media_checked = ( isset( $_POST['gvc_post_featured_media'] ) ) ? "no" : "yes";
    update_post_meta($post_id, "gvc_post_featured_media", $gvc_post_featured_media_checked);
    
}

?>