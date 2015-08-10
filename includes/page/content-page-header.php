<?php

	global $gvc;
	$values                  = get_post_custom( get_the_ID() );
	$gvc_slider_status    = "no";
	$gvc_slider_settings  = get_option('gvc_slider_settings');
	$gvc_rich_header_styles         = "";
	$gvc_rich_header_text_styles    = "";
	$gvc_rich_header_subtext_styles = "";
	
	if (isset($gvc_slider_settings["gvc_slider"]) && $gvc_slider_settings["gvc_slider"] == "yes") {
		if (isset($values['gvc_slider'][0]) && $values['gvc_slider'][0] == "yes") {
			$gvc_slider_status = "yes";
		}
	}

	$gvc_page_title_background_color                    = (isset( $values['gvc_page_title_background_color']) && !empty($values['gvc_page_title_background_color'][0])) ? $values["gvc_page_title_background_color"][0] : "";
    $gvc_page_title_background_color_opacity            = (isset( $values['gvc_page_title_background_color_opacity']) && !empty($values['gvc_page_title_background_color_opacity'][0])) ? $values["gvc_page_title_background_color_opacity"][0] : "1";
    $gvc_page_title_text_color                          = (isset( $values['gvc_page_title_text_color']) && !empty($values['gvc_page_title_text_color'][0])) ? $values["gvc_page_title_text_color"][0] : "";
    $gvc_page_subtitle_background_color                 = (isset( $values['gvc_page_subtitle_background_color']) && !empty($values['gvc_page_subtitle_background_color'][0])) ? $values["gvc_page_subtitle_background_color"][0] : "";
    $gvc_page_subtitle_background_color_opacity         = (isset( $values['gvc_page_subtitle_background_color_opacity']) && !empty($values['gvc_page_subtitle_background_color_opacity'][0])) ? $values["gvc_page_subtitle_background_color_opacity"][0] : "1";
    $gvc_page_subtitle_text_color                       = (isset( $values['gvc_page_subtitle_text_color']) && !empty($values['gvc_page_subtitle_text_color'][0])) ? $values["gvc_page_subtitle_text_color"][0] : "";
    $gvc_page_title_section_background_color            = (isset( $values['gvc_page_title_section_background_color']) && !empty($values['gvc_page_title_section_background_color'][0])) ? $values["gvc_page_title_section_background_color"][0] : "";
    $gvc_page_title_section_background_image            = (isset( $values['gvc_page_title_section_background_image']) && !empty($values['gvc_page_title_section_background_image'][0])) ? $values["gvc_page_title_section_background_image"][0] : "";
    $gvc_page_title_section_background_image_repeat     = (isset( $values['gvc_page_title_section_background_image_repeat']) && !empty($values['gvc_page_title_section_background_image_repeat'][0])) ? $values["gvc_page_title_section_background_image_repeat"][0] : "no-repeat";
    $gvc_page_title_section_background_image_position   = (isset( $values['gvc_page_title_section_background_image_position']) && !empty($values['gvc_page_title_section_background_image_position'][0])) ? $values["gvc_page_title_section_background_image_position"][0] : "left_top";
    $gvc_page_title_section_background_image_attachment = (isset( $values['gvc_page_title_section_background_image_attachment']) && !empty($values['gvc_page_title_section_background_image_attachment'][0])) ? $values["gvc_page_title_section_background_image_attachment"][0] : "scroll";
    $gvc_page_title_section_background_image_size       = (isset( $values['gvc_page_title_section_background_image_size']) && !empty($values['gvc_page_title_section_background_image_size'][0])) ? $values["gvc_page_title_section_background_image_size"][0] : "auto";
    $gvc_page_title_section_background_image_parallax   = (isset( $values['gvc_page_title_section_background_image_parallax']) && !empty($values['gvc_page_title_section_background_image_parallax'][0])) ? $values["gvc_page_title_section_background_image_parallax"][0] : "no";


    if ($gvc_page_title_section_background_image_parallax == "yes") {
    	$gvc_page_title_section_background_image_repeat     = "no-repeat";
		$gvc_page_title_section_background_image_position   = "center_top";
		$gvc_page_title_section_background_image_attachment = "fixed";
		$gvc_page_title_section_background_image_size       = "cover";
    }
    
    if (!empty($gvc_page_title_section_background_color)) {
    	$gvc_rich_header_styles .= 'background-color:'.$gvc_page_title_section_background_color.';';
	}

    if (!empty($gvc_page_title_section_background_image)) {
    	$gvc_rich_header_styles .= 'background-image:url('.$gvc_page_title_section_background_image.');';
    	$gvc_rich_header_styles .= 'background-repeat:'.$gvc_page_title_section_background_image_repeat.';';
    	$gvc_rich_header_styles .= 'background-attachment:'.$gvc_page_title_section_background_image_attachment.';';
    	if ($gvc_page_title_section_background_image_size == "cover") {
    		$gvc_rich_header_styles .= '-webkit-background-size: cover;-moz-background-size: cover;background-size: cover;';
    	}
    	switch($gvc_page_title_section_background_image_position){

			case 'left_top':
			$gvc_rich_header_styles .= "background-position:left top;";
	        break;

	        case 'left_bottom':
			$gvc_rich_header_styles .= "background-position:left bottom;";
	        break;

	        case 'right_top':
			$gvc_rich_header_styles .= "background-position:right top;";
	        break;

	        case 'right_bottom':
			$gvc_rich_header_styles .= "background-position:right bottom;";
	        break;

	        case 'center_center':
			$gvc_rich_header_styles .= "background-position:center center;";
	        break;

	        case 'center_top':
			$gvc_rich_header_styles .= "background-position:center top;";
	        break;

	        case 'center_bottom':
			$gvc_rich_header_styles .= "background-position:center bottom;";
	        break;

			default:
			$gvc_rich_header_styles .= "background-position:left top;";
	        break;

        }
    }

    if (!empty($gvc_page_title_background_color)) {
    	$gvc_rich_header_text_styles.='background-color:'.gvc_hex_to_rgba($gvc_page_title_background_color, $gvc_page_title_background_color_opacity).';';
    	$gvc_rich_header_text_styles.='padding-left:40px;padding-right:40px;';
    }

    if (!empty($gvc_page_title_text_color)) {
    	$gvc_rich_header_text_styles.='color:'.$gvc_page_title_text_color.';';
	}

	if (!empty($gvc_page_subtitle_background_color)) {
    	$gvc_rich_header_subtext_styles.='background-color:'.gvc_hex_to_rgba($gvc_page_subtitle_background_color, $gvc_page_subtitle_background_color_opacity).';';
    	$gvc_rich_header_subtext_styles.='padding-left:20px;padding-right:20px;margin-top: 15px;';
    }

    if (!empty($gvc_page_subtitle_text_color)) {
    	$gvc_rich_header_subtext_styles.='color:'.$gvc_page_subtitle_text_color.';';
	}
    

?>
<?php if ($gvc_slider_status == "yes") : ?>
	<?php get_template_part('includes/gvc-slider'); ?>
<?php else: ?>
	<?php if (isset($values['gvc_rich_header'][0]) && $values['gvc_rich_header'][0] == "yes"): ?>
		<header class="rich-header page-header" data-parallax="<?php echo $gvc_page_title_section_background_image_parallax; ?>" style="<?php echo $gvc_rich_header_styles; ?>">
			<div class="container gvc-clearfix">
				<?php if ( '' != get_the_title()): ?>
					<div>
						<h1 class="page-title" style="<?php echo $gvc_rich_header_text_styles; ?>"><?php the_title(); ?></h1>
					</div>
				<?php endif; ?>
				<?php if (isset($values['gvc_page_subtitle'][0]) && !empty($values['gvc_page_subtitle'][0])): ?>
					<div>
						<p class="page-subtitle" style="<?php echo $gvc_rich_header_subtext_styles; ?>"><?php echo $values['gvc_page_subtitle'][0]; ?></p>
					</div>
				<?php endif ?>
			</div>
		</header>
	<?php endif ?>
<?php endif ?>
