<?php 

add_action("admin_init", "gvc_add_page_meta_box");
function gvc_add_page_meta_box(){

    add_meta_box(
        "gvc-page-options", 
        __("Page options", TEMP_NAME),
        "render_gvc_page_options", 
        "page",
        "normal", 
        "high"
    );

}

function render_gvc_page_options($post) {

    global $gvc;
    $gvc_skin = ($gvc['gvc-skin']) ? $gvc['gvc-skin'] : "light";

    $values                  = get_post_custom( $post->ID );

    $gvc_slider           = isset( $values["gvc_slider"][0] ) ? esc_attr( $values["gvc_slider"][0] ) : "no";
	$above_menu           = isset( $values["above_menu"][0] ) ? esc_attr( $values["above_menu"][0] ) : "no";
    $gvc_one_page         = isset( $values["gvc_one_page"][0] ) ? esc_attr( $values["gvc_one_page"][0] ) : "no";
    $gvc_rich_header      = isset( $values["gvc_rich_header"][0] ) ? esc_attr( $values["gvc_rich_header"][0] ) : "yes";
    $gvc_page_sidebar     = isset( $values['gvc_page_sidebar'] ) ? esc_attr( $values["gvc_page_sidebar"][0] ) : "none";
    $gvc_page_layout      = isset( $values['gvc_page_layout'] ) ? esc_attr( $values["gvc_page_layout"][0] ) : "no";
    $gvc_page_twitter     = isset( $values['gvc_page_twitter'] ) ? esc_attr( $values["gvc_page_twitter"][0] ) : "no";
    $gvc_page_padding_top = isset( $values['gvc_page_padding_top'] ) ? esc_attr( $values["gvc_page_padding_top"][0] ) : "yes";

    $gvc_page_subtitle                                  = isset( $values['gvc_page_subtitle'] ) ? esc_attr( $values["gvc_page_subtitle"][0] ) : "";
    $gvc_page_title_background_color                    = isset( $values['gvc_page_title_background_color'] ) ? esc_attr( $values["gvc_page_title_background_color"][0] ) : "";
    $gvc_page_title_background_color_opacity            = isset( $values['gvc_page_title_background_color_opacity'] ) ? esc_attr( $values["gvc_page_title_background_color_opacity"][0] ) : "1";
    $gvc_page_title_text_color                          = isset( $values['gvc_page_title_text_color'] ) ? esc_attr( $values["gvc_page_title_text_color"][0] ) : "#444444";
    
    $gvc_page_subtitle_background_color                 = isset( $values['gvc_page_subtitle_background_color'] ) ? esc_attr( $values["gvc_page_subtitle_background_color"][0] ) : "";
    $gvc_page_subtitle_background_color_opacity         = isset( $values['gvc_page_subtitle_background_color_opacity'] ) ? esc_attr( $values["gvc_page_subtitle_background_color_opacity"][0] ) : "1";
    $gvc_page_subtitle_text_color                       = isset( $values['gvc_page_subtitle_text_color'] ) ? esc_attr( $values["gvc_page_subtitle_text_color"][0] ) : (($gvc_skin == "dark") ? "#777777" : "#444444");

    $gvc_page_title_section_background_color            = isset( $values['gvc_page_title_section_background_color'] ) ? esc_attr( $values["gvc_page_title_section_background_color"][0] ) : (($gvc_skin == "dark") ? "#3b3b3b" : "#f6f6f6");
    $gvc_page_title_section_background_image            = isset( $values['gvc_page_title_section_background_image'] ) ? esc_url( $values["gvc_page_title_section_background_image"][0] ) : "";
    $gvc_page_title_section_background_image_repeat     = isset( $values['gvc_page_title_section_background_image_repeat'] ) ? esc_attr( $values["gvc_page_title_section_background_image_repeat"][0] ) : "no-repeat";
    $gvc_page_title_section_background_image_position   = isset( $values['gvc_page_title_section_background_image_position'] ) ? esc_attr( $values["gvc_page_title_section_background_image_position"][0] ) : "left_top";
    $gvc_page_title_section_background_image_attachment = isset( $values['gvc_page_title_section_background_image_attachment'] ) ? esc_attr( $values["gvc_page_title_section_background_image_attachment"][0] ) : "scroll";
    $gvc_page_title_section_background_image_size       = isset( $values['gvc_page_title_section_background_image_size'] ) ? esc_attr( $values["gvc_page_title_section_background_image_size"][0] ) : "auto";
    $gvc_page_title_section_background_image_parallax   = isset( $values['gvc_page_title_section_background_image_parallax'] ) ? esc_attr( $values["gvc_page_title_section_background_image_parallax"][0] ) : "no";
	$gvc_page_keywords = isset( $values['gvc_page_keywords'] ) ? esc_attr( $values["gvc_page_keywords"][0] ) : "";
	$gvc_page_description = isset( $values['gvc_page_description'] ) ? esc_attr( $values["gvc_page_description"][0] ) : "";


    wp_nonce_field( 'gvc_page_meta_nonce', 'gvc_page_meta_nonce' );

?>
    <div class="gvc-page-subtitle gvc-page-subsection dynamic">
        <label for="page_subtitle"><?php echo __('Enter page subtitle here', TEMP_NAME); ?></label>
        <input name="gvc_page_subtitle" id="gvc-page-subtitle" type="text" value="<?php echo $gvc_page_subtitle;?>"/>
    </div>

    <div class="gvc-page-layout gvc-page-subsection">
        <h2>Layout options</h2>
        <div class="gvc-page-option">
            <label>
                <input type="checkbox" id="page-layout" name="gvc_page_layout" value="yes" <?php checked( $gvc_page_layout, "yes" ); ?> />
                <?php echo __(' - Full width', TEMP_NAME); ?>
            </label>
            <p><?php echo __("For better design use WIDEBOX/ ANIMATED WIDEBOX / VIDEO WIDEBOX / FULLBOX shortcodes as sections", TEMP_NAME); ?></p>
        </div>

        <div class="gvc-page-option dynamic">
            <label>
                <input type="checkbox" id="page-twitter" name="gvc_page_twitter" value="yes" <?php checked( $gvc_page_twitter, "yes" ); ?> />
                <?php echo __(' - Page tweets', TEMP_NAME); ?>
            </label>
            <p><?php echo __("Toggle tweets carousel on this page", TEMP_NAME); ?></p>
        </div>
        
        
        <div class="gvc-page-option dynamic">
            <label>
                <input type="checkbox" id="gvc-slider" name="gvc_slider" value="yes" <?php checked( $gvc_slider, "yes" ); ?> />
                <?php echo __(' - gvc slider', TEMP_NAME); ?>
            </label>
            <p><?php echo __("Toggle gvc slider on this page", TEMP_NAME); ?></p>
        </div>
        <div class="gvc-page-option dynamic">
            <label>
                <input type="checkbox" id="above-menu" name="above_menu" value="yes" <?php checked( $above_menu, "yes" ); ?> />
                <?php echo __(' - Above menu', TEMP_NAME); ?>
            </label>
            <p><?php echo __("Toggle slider above menu on this page", TEMP_NAME); ?></p>
        </div>

        <div class="gvc-page-option dynamic">
            <label>
                <input type="checkbox" id="gvc-one-page" name="gvc_one_page" value="yes" <?php checked( $gvc_one_page, "yes" ); ?> />
                <?php echo __(' - One page', TEMP_NAME); ?>
            </label>
            <p><?php echo __("Toggle one page layout for this page (make sure, you have configured one page options from theme option panel)", TEMP_NAME); ?></p>
        </div>

        <div class="gvc-page-option sitemap-off">
            <label>
                <input type="checkbox" id="page-padding-top" name="gvc_page_padding_top" value="no" <?php checked( $gvc_page_padding_top, "no" ); ?> />
                <?php echo __(' - Page padding top OFF', TEMP_NAME); ?>
            </label>
            <p><?php echo __("Turn off padding top of this page", TEMP_NAME); ?></p>
        </div>

        <div class="gvc-page-option dynamic">
            <label><?php echo __("Page sidebar", TEMP_NAME); ?></label>
            <select name="gvc_page_sidebar" id="gvc-page-sidebar">  
                <option value="none" <?php selected( $gvc_page_sidebar, 'none' ); ?>><?php echo __('none', TEMP_NAME) ?></option>
                <option value="left" <?php selected( $gvc_page_sidebar, 'left' ); ?>><?php echo __('left', TEMP_NAME) ?></option>
                <option value="right" <?php selected( $gvc_page_sidebar, 'right' ); ?>><?php echo __('right', TEMP_NAME) ?></option>
            </select>
        </div>

    </div>

    <div class="page-rich-header gvc-page-subsection dynamic">

        <h2>Page title section options (Rich header)</h2>
        <p><?php echo __("All options are available if rich header is turned ON", TEMP_NAME); ?></p>
        <div class="gvc-page-option">
            <label>
                <input type="checkbox" id="rich-header" name="gvc_rich_header" value="no" <?php checked( $gvc_rich_header, "no" ); ?> />
                <?php echo __(' - Rich header OFF', TEMP_NAME); ?>
            </label>
            <p><?php echo __("Turn off rich header (page title section)", TEMP_NAME); ?></p>
        </div>

        <div class="gvc-page-option">
            <label><?php echo __('Page title background color:', TEMP_NAME); ?></label>
            <input name="gvc_page_title_background_color" id="gvc-page-title-background-color" class="gvc-color-picker" value="<?php echo $gvc_page_title_background_color; ?>" />
        </div>

        <div class="gvc-page-option">
            <label><?php echo __("Page title background color opacity", TEMP_NAME); ?></label>
            <select name="gvc_page_title_background_color_opacity" id="gvc-page-title-background-color-opacity">  
                <option value="1" <?php selected( $gvc_page_title_background_color_opacity, '1' ); ?>>100%</option>
                <option value="0.95" <?php selected( $gvc_page_title_background_color_opacity, '0.95' ); ?>>95%</option>
                <option value="0.90" <?php selected( $gvc_page_title_background_color_opacity, '0.90' ); ?>>90%</option>
                <option value="0.85" <?php selected( $gvc_page_title_background_color_opacity, '0.85' ); ?>>85%</option>
                <option value="0.80" <?php selected( $gvc_page_title_background_color_opacity, '0.80' ); ?>>80%</option>
                <option value="0.75" <?php selected( $gvc_page_title_background_color_opacity, '0.75' ); ?>>75%</option>
                <option value="0.70" <?php selected( $gvc_page_title_background_color_opacity, '0.70' ); ?>>70%</option>
                <option value="0.65" <?php selected( $gvc_page_title_background_color_opacity, '0.65' ); ?>>65%</option>
                <option value="0.60" <?php selected( $gvc_page_title_background_color_opacity, '0.60' ); ?>>60%</option>
                <option value="0.55" <?php selected( $gvc_page_title_background_color_opacity, '0.55' ); ?>>55%</option>
                <option value="0.50" <?php selected( $gvc_page_title_background_color_opacity, '0.50' ); ?>>50%</option>
                <option value="0.45" <?php selected( $gvc_page_title_background_color_opacity, '0.45' ); ?>>45%</option>
                <option value="0.40" <?php selected( $gvc_page_title_background_color_opacity, '0.40' ); ?>>40%</option>
                <option value="0.35" <?php selected( $gvc_page_title_background_color_opacity, '0.35' ); ?>>35%</option>
                <option value="0.30" <?php selected( $gvc_page_title_background_color_opacity, '0.30' ); ?>>30%</option>
                <option value="0.25" <?php selected( $gvc_page_title_background_color_opacity, '0.25' ); ?>>25%</option>
                <option value="0.20" <?php selected( $gvc_page_title_background_color_opacity, '0.20' ); ?>>20%</option>
                <option value="0.15" <?php selected( $gvc_page_title_background_color_opacity, '0.15' ); ?>>15%</option>
                <option value="0.1" <?php selected( $gvc_page_title_background_color_opacity, '0.1' ); ?>>10%</option>
            </select>
        </div>

        <div class="gvc-page-option">
            <label><?php echo __('Page title text color:', TEMP_NAME); ?></label>
            <input name="gvc_page_title_text_color" id="gvc-page-title-text-color" class="gvc-color-picker" value="<?php echo $gvc_page_title_text_color; ?>" />
        </div>

        <div class="gvc-page-option">
            <label><?php echo __('Page subtitle background color:', TEMP_NAME); ?></label>
            <input name="gvc_page_subtitle_background_color" id="gvc-page-subtitle-background-color" class="gvc-color-picker" value="<?php echo $gvc_page_subtitle_background_color; ?>" />
        </div>

        <div class="gvc-page-option">
            <label><?php echo __("Page subtitle background color opacity", TEMP_NAME); ?></label>
            <select name="gvc_page_subtitle_background_color_opacity" id="gvc-page-subtitle-background-color-opacity">  
                <option value="1" <?php selected( $gvc_page_subtitle_background_color_opacity, '1' ); ?>>100%</option>
                <option value="0.95" <?php selected( $gvc_page_subtitle_background_color_opacity, '0.95' ); ?>>95%</option>
                <option value="0.90" <?php selected( $gvc_page_subtitle_background_color_opacity, '0.90' ); ?>>90%</option>
                <option value="0.85" <?php selected( $gvc_page_subtitle_background_color_opacity, '0.85' ); ?>>85%</option>
                <option value="0.80" <?php selected( $gvc_page_subtitle_background_color_opacity, '0.80' ); ?>>80%</option>
                <option value="0.75" <?php selected( $gvc_page_subtitle_background_color_opacity, '0.75' ); ?>>75%</option>
                <option value="0.70" <?php selected( $gvc_page_subtitle_background_color_opacity, '0.70' ); ?>>70%</option>
                <option value="0.65" <?php selected( $gvc_page_subtitle_background_color_opacity, '0.65' ); ?>>65%</option>
                <option value="0.60" <?php selected( $gvc_page_subtitle_background_color_opacity, '0.60' ); ?>>60%</option>
                <option value="0.55" <?php selected( $gvc_page_subtitle_background_color_opacity, '0.55' ); ?>>55%</option>
                <option value="0.50" <?php selected( $gvc_page_subtitle_background_color_opacity, '0.50' ); ?>>50%</option>
                <option value="0.45" <?php selected( $gvc_page_subtitle_background_color_opacity, '0.45' ); ?>>45%</option>
                <option value="0.40" <?php selected( $gvc_page_subtitle_background_color_opacity, '0.40' ); ?>>40%</option>
                <option value="0.35" <?php selected( $gvc_page_subtitle_background_color_opacity, '0.35' ); ?>>35%</option>
                <option value="0.30" <?php selected( $gvc_page_subtitle_background_color_opacity, '0.30' ); ?>>30%</option>
                <option value="0.25" <?php selected( $gvc_page_subtitle_background_color_opacity, '0.25' ); ?>>25%</option>
                <option value="0.20" <?php selected( $gvc_page_subtitle_background_color_opacity, '0.20' ); ?>>20%</option>
                <option value="0.15" <?php selected( $gvc_page_subtitle_background_color_opacity, '0.15' ); ?>>15%</option>
                <option value="0.1" <?php selected( $gvc_page_subtitle_background_color_opacity, '0.1' ); ?>>10%</option>
            </select>
        </div>

        <div class="gvc-page-option">
            <label><?php echo __('Page subtitle text color:', TEMP_NAME); ?></label>
            <input name="gvc_page_subtitle_text_color" id="gvc-page-subtitle-text-color" class="gvc-color-picker" value="<?php echo $gvc_page_subtitle_text_color; ?>" />
        </div>

        <div class="gvc-page-option">
            <label><?php echo __('Page header section background color:', TEMP_NAME); ?></label>
            <input name="gvc_page_title_section_background_color" id="gvc-page-title-section-background-color" class="gvc-color-picker" value="<?php echo $gvc_page_title_section_background_color; ?>" />
        </div>

        <div class="gvc-page-option">
            <label><?php echo __('Page header section background image:', TEMP_NAME); ?></label>
            <div class="gvc-upload">
                <input name="gvc_page_title_section_background_image" id="gvc-page-title-section-background-image" type="hidden" class="gvc-upload-path" value="<?php echo $gvc_page_title_section_background_image;?>"/> 
                <input class="gvc-button-upload button" type="button" value="<?php echo __('Upload background image', TEMP_NAME) ?>" />
                <input class="gvc-button-remove button" type="button" value="<?php echo __('Remove background image', TEMP_NAME) ?>" />
                <br>
                <img src='<?php echo $gvc_page_title_section_background_image; ?>' class='gvc-preview-upload'/>
            </div>
        </div>

        <div class="gvc-page-option">
            <label><?php echo __("Page header section background image repeat", TEMP_NAME); ?></label>
            <select name="gvc_page_title_section_background_image_repeat" id="gvc-page-title-section-background-image-repeat">  
                <option value="no-repeat" <?php selected( $gvc_page_title_section_background_image_repeat, 'no-repeat' ); ?>><?php echo __('no-repeat',TEMP_NAME); ?></option>
                <option value="repeat-x" <?php selected( $gvc_page_title_section_background_image_repeat, 'repeat-x' ); ?>><?php echo __('repeat-x',TEMP_NAME); ?></option>
                <option value="repeat-y" <?php selected( $gvc_page_title_section_background_image_repeat, 'repeat-y' ); ?>><?php echo __('repeat-y',TEMP_NAME); ?></option>
                <option value="repeat" <?php selected( $gvc_page_title_section_background_image_repeat, 'repeat' ); ?>><?php echo __('repeat',TEMP_NAME); ?></option>
            </select>
        </div>

        <div class="gvc-page-option">
            <label><?php echo __("Page header section background image position", TEMP_NAME); ?></label>
            <select name="gvc_page_title_section_background_image_position" id="gvc-page-title-section-background-image-position">  
                <option value="left_top" <?php selected( $gvc_page_title_section_background_image_position, 'left_top' ); ?>><?php echo __('left top',TEMP_NAME); ?></option>
                <option value="left_bottom" <?php selected( $gvc_page_title_section_background_image_position, 'left_bottom' ); ?>><?php echo __('left bottom',TEMP_NAME); ?></option>
                <option value="right_top" <?php selected( $gvc_page_title_section_background_image_position, 'right_top' ); ?>><?php echo __('right top',TEMP_NAME); ?></option>
                <option value="right_bottom" <?php selected( $gvc_page_title_section_background_image_position, 'right_bottom' ); ?>><?php echo __('right bottom',TEMP_NAME); ?></option>
                <option value="center_center" <?php selected( $gvc_page_title_section_background_image_position, 'center_center' ); ?>><?php echo __('center center',TEMP_NAME); ?></option>
                <option value="center_top" <?php selected( $gvc_page_title_section_background_image_position, 'center_top' ); ?>><?php echo __('center top',TEMP_NAME); ?></option>
                <option value="center_bottom" <?php selected( $gvc_page_title_section_background_image_position, 'center_bottom' ); ?>><?php echo __('center bottom',TEMP_NAME); ?></option>
            </select>
        </div>

        <div class="gvc-page-option">
            <label><?php echo __("Page header section background image attachment", TEMP_NAME); ?></label>
            <select name="gvc_page_title_section_background_image_attachment" id="gvc-page-title-section-background-image-attachment">  
                <option value="scroll" <?php selected( $gvc_page_title_section_background_image_attachment, 'scroll' ); ?>><?php echo __('scroll',TEMP_NAME); ?></option>
                <option value="fixed" <?php selected( $gvc_page_title_section_background_image_attachment, 'fixed' ); ?>><?php echo __('fixed',TEMP_NAME); ?></option>
            </select>
        </div>

        <div class="gvc-page-option">
            <label><?php echo __("Page title section background image size", TEMP_NAME); ?></label>
            <select name="gvc_page_title_section_background_image_size" id="gvc-page-title-section-background-image-size">  
                <option value="auto" <?php selected( $gvc_page_title_section_background_image_size, 'auto' ); ?>><?php echo __('auto',TEMP_NAME); ?></option>
                <option value="cover" <?php selected( $gvc_page_title_section_background_image_size, 'cover' ); ?>><?php echo __('cover',TEMP_NAME); ?></option>
            </select>
        </div>
        <div class="gvc-page-option">
            <label>
                <input type="checkbox" id="page-title-section-background-image-parallax" name="gvc_page_title_section_background_image_parallax" value="yes" <?php checked( $gvc_page_title_section_background_image_parallax, "yes" ); ?> />
                <?php echo __(' - Parallax', TEMP_NAME); ?>
            </label>
            <p><?php echo __("Activate parallax effect on page title section (not available on mobile devices). Use images with a height greater than page title section (1:1.5 ratio)", TEMP_NAME); ?></p>
        </div>
    </div>
    <div class="gvc-page-keywords gvc-page-subsection dynamic">
        <label for="gvc_page_keywords"><?php echo __('Enter page keywords here', TEMP_NAME); ?></label>
        <input name="gvc_page_keywords" id="gvc-page-keywords" type="text" value="<?php echo $gvc_page_keywords;?>"/>
    </div>
    <div class="gvc-page-description gvc-page-subsection dynamic">
        <label for="page_description"><?php echo __('Enter page description here', TEMP_NAME); ?></label>
        <textarea name="gvc_page_description" id="gvc-page-description"><?php echo $gvc_page_description;?></textarea>
    </div>
<?php
}

add_action( 'save_post', 'save_gvc_page_options' );  
function save_gvc_page_options( $post_id )  
{  
    
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
    if( !isset( $_POST['gvc_page_meta_nonce'] ) || !wp_verify_nonce( $_POST['gvc_page_meta_nonce'], 'gvc_page_meta_nonce' ) ) return;  
    if( !current_user_can( 'edit_post' ) ) return;

    if( isset( $_POST['gvc_page_subtitle'] ) ){update_post_meta($post_id, "gvc_page_subtitle",$_POST["gvc_page_subtitle"]);}
    if( isset( $_POST['gvc_page_sidebar'] ) ){update_post_meta($post_id, "gvc_page_sidebar",$_POST["gvc_page_sidebar"]);}
    if( isset( $_POST['gvc_page_title_background_color'] ) ){update_post_meta($post_id, "gvc_page_title_background_color",$_POST["gvc_page_title_background_color"]);}
    if( isset( $_POST['gvc_page_title_background_color_opacity'] ) ){update_post_meta($post_id, "gvc_page_title_background_color_opacity",$_POST["gvc_page_title_background_color_opacity"]);}
    if( isset( $_POST['gvc_page_title_text_color'] ) ){update_post_meta($post_id, "gvc_page_title_text_color",$_POST["gvc_page_title_text_color"]);}
    if( isset( $_POST['gvc_page_subtitle_background_color'] ) ){update_post_meta($post_id, "gvc_page_subtitle_background_color",$_POST["gvc_page_subtitle_background_color"]);}
    if( isset( $_POST['gvc_page_subtitle_background_color_opacity'] ) ){update_post_meta($post_id, "gvc_page_subtitle_background_color_opacity",$_POST["gvc_page_subtitle_background_color_opacity"]);}
    if( isset( $_POST['gvc_page_subtitle_text_color'] ) ){update_post_meta($post_id, "gvc_page_subtitle_text_color",$_POST["gvc_page_subtitle_text_color"]);}
    if( isset( $_POST['gvc_page_title_section_background_color'] ) ){update_post_meta($post_id, "gvc_page_title_section_background_color",$_POST["gvc_page_title_section_background_color"]);}
    if( isset( $_POST['gvc_page_title_section_background_image'] ) ){update_post_meta($post_id, "gvc_page_title_section_background_image",$_POST["gvc_page_title_section_background_image"]);}
    if( isset( $_POST['gvc_page_title_section_background_image_repeat'] ) ){update_post_meta($post_id, "gvc_page_title_section_background_image_repeat",$_POST["gvc_page_title_section_background_image_repeat"]);}
    if( isset( $_POST['gvc_page_title_section_background_image_position'] ) ){update_post_meta($post_id, "gvc_page_title_section_background_image_position",$_POST["gvc_page_title_section_background_image_position"]);}
    if( isset( $_POST['gvc_page_title_section_background_image_attachment'] ) ){update_post_meta($post_id, "gvc_page_title_section_background_image_attachment",$_POST["gvc_page_title_section_background_image_attachment"]);}
    if( isset( $_POST['gvc_page_title_section_background_image_size'] ) ){update_post_meta($post_id, "gvc_page_title_section_background_image_size",$_POST["gvc_page_title_section_background_image_size"]);}
	if( isset( $_POST['gvc_page_keywords'] ) ){update_post_meta($post_id, "gvc_page_keywords", $_POST["gvc_page_keywords"]);}
	if( isset( $_POST['gvc_page_description'] ) ){update_post_meta($post_id, "gvc_page_description", $_POST["gvc_page_description"]);}
    
    $gvc_one_page_checked = ( isset( $_POST['gvc_one_page'] ) ) ? "yes" : "no";
    update_post_meta($post_id, "gvc_one_page", $gvc_one_page_checked);

    $gvc_slider_checked = ( isset( $_POST['gvc_slider'] ) ) ? "yes" : "no";
    update_post_meta($post_id, "gvc_slider", $gvc_slider_checked);
	
	$above_menu_checked = ( isset( $_POST['above_menu'] ) ) ? "yes" : "no";
    update_post_meta($post_id, "above_menu", $above_menu_checked);

    $gvc_page_layout_checked = ( isset( $_POST['gvc_page_layout'] ) ) ? "yes" : "no";
    update_post_meta($post_id, "gvc_page_layout", $gvc_page_layout_checked);

    $gvc_page_twitter_checked = ( isset( $_POST['gvc_page_twitter'] ) ) ? "yes" : "no";
    update_post_meta($post_id, "gvc_page_twitter", $gvc_page_twitter_checked);

    $gvc_page_padding_top_checked = ( isset( $_POST['gvc_page_padding_top'] ) ) ? "no" : "yes";
    update_post_meta($post_id, "gvc_page_padding_top", $gvc_page_padding_top_checked);

    $gvc_rich_header_checked = ( isset( $_POST['gvc_rich_header'] ) ) ? "no" : "yes";
    update_post_meta($post_id, "gvc_rich_header", $gvc_rich_header_checked);

    $gvc_page_title_section_background_image_parallax_checked = ( isset( $_POST['gvc_page_title_section_background_image_parallax'] ) ) ? "yes" : "no";
    update_post_meta($post_id, "gvc_page_title_section_background_image_parallax", $gvc_page_title_section_background_image_parallax_checked);
}

?>