<?php

	extract(shortcode_atts(array(
		'full_width'            => 'no',
		'registered_only'       => 'no',
		'id'                    => '',
		'class'					=> '',
		'background_color'      => '',
		'background_image'      => '',
		'background_repeat'     => 'no-repeat',
		'background_position'   => 'left top',
		'background_attachment' => 'scroll',
		'border_size'           => '',
		'border_color'          => '',
		'text_color'            => '',
		'padding_top'           => '20',
		'padding_bottom'        => '20',
		'shadow'                => 'no',
		'parallax'              => 'no',
		'animate'               => 'no',
		'img_position'          => 'left',
		'content_animation'     => 'left',
		'img_animation'         => 'right',
		'img_src'               => '',
		'img_description'       => ''
	), $atts));
	
	 
    global $gvc_opt, $gvc_def;
	$styles = '';
	$output = '';

	if(empty($shadow) || !in_array($shadow, $gvc_opt[2]) || $shadow == $gvc_def[1]){$shadow = 'no';}
	if(empty($full_width) || !in_array($full_width, $gvc_opt[2]) || $full_width == $gvc_def[1]){$full_width = 'no';}
	if(empty($animate) || !in_array($animate, $gvc_opt[2]) || $animate == $gvc_def[1]){$animate = 'no';}
	if(empty($registered_only) || !in_array($registered_only, $gvc_opt[2]) || $registered_only == $gvc_def[1]){$registered_only = 'no';}
	if(empty($img_position) || !in_array($img_position, $gvc_opt[14]) || $img_position == $gvc_def[21]){$img_position = 'left';}
	if(empty($parallax) || !in_array($parallax, $gvc_opt[2]) || $parallax == $gvc_def[1]){$parallax = 'no';}

	if(empty($img_animation) || !in_array($img_animation, $gvc_opt[15]) || $img_animation == $gvc_def[21]){$img_animation = 'left';}
	if(empty($content_animation) || !in_array($content_animation, $gvc_opt[15]) || $content_animation == $gvc_def[21]){$content_animation = 'right';}

	if(!is_numeric($border_size) || $border_size < 0 ){$border_size = "";}
	if(!is_numeric($padding_top) || $padding_top < 0 ){$padding_top = "20";}
	if(!is_numeric($padding_bottom) || $padding_bottom < 0 ){$padding_bottom = "20";}

	if(isset($background_color) && !empty($background_color)) {
		$styles .= 'background-color:'.$background_color.';';
	}
	if(isset($text_color) && !empty($text_color)) {
		$styles .= 'color:'.$text_color.';';
	}

	if(isset($background_image) && !empty($background_image)) {

		if(empty($background_repeat) || !in_array($background_repeat, $gvc_opt[9]) || $background_repeat == $gvc_def[11]) {
			$background_repeat = "no-repeat";
		}

		if(empty($background_position)){
			$background_position = "50% 50%";
		}

		if(empty($background_attachment) || !in_array($background_attachment, $gvc_opt[10]) || $background_attachment == $gvc_def[12]) {
			$background_attachment = "scroll";
		}

		if ($parallax == "yes") {
			$background_repeat = "no-repeat";
			$background_position = "center top";
			$background_attachment = "fixed";
		}

		if ($background_repeat == "no-repeat") {
			$styles .= "-webkit-background-size: cover !important; -moz-background-size: cover !important; background-size: cover !important;";
		}

		$image_attributes = wp_get_attachment_image_src($background_image, 'full');
		$background_image = $image_attributes[0];

		$styles .= 'background-image:url('.$background_image.');background-repeat:'.$background_repeat.';background-position:'.$background_position.';background-attachment:'.$background_attachment.';';
	}

	if(isset($border_size) && !empty($border_size)) {
		$styles .= 'border-bottom-style: solid; border-top-style: solid; border-top-width:'.$border_size.'px; border-bottom-width:'.$border_size.'px;';
	}
	if(isset($border_color) && !empty($border_color)) {
		$styles .= 'border-bottom-color:'.$border_color.';border-top-color:'.$border_color.';';
	}
	if(isset($padding_top) && !empty($padding_top)) {
		$styles .= 'padding-top:'.$padding_top.'px;';
	}
	if(isset($padding_bottom) && !empty($padding_bottom)) {
		$styles .= 'padding-bottom:'.$padding_bottom.'px;';
	}

    if ($registered_only == "no" || ($registered_only == "yes" && is_user_logged_in() && !is_null( $content ) && !is_feed())) {

    	if ($animate ==="no") {

	    	$output .= '<div id="'.$id.'" class="'.$class.' vc-gvc-row widebox container-shortcode shadow-'.$shadow.' parallax-'.$parallax.' full-width-gvc-row-'.$full_width.'" style="'.$styles.'">';

				$output .= '<div class="container">';
					$output .= '<div class="widebox-content gvc-clearfix">';
						$output .= do_shortcode($content);
					$output .= '</div>';
				$output .= '</div>';

			$output .= '</div>';

	    } elseif($animate == "yes") {

	    	$output .= '<div id="'.$id.'" class="'.$class.' vc-gvc-row container-shortcode animated-widebox gvc-clearfix parallax-'.$parallax.' shadow-'.$shadow.' animate-'.$animate.' full-width-widebox-'.$full_width.'" style="'.$styles.'">';

				$output .= '<div class="container">';

					$animated_img_src = wp_get_attachment_image_src($img_src, 'full');
					$img_src          = $animated_img_src[0];

					if($img_position == "left"){
						if(isset($img_src) && !empty($img_src)){
							$output .= '<div class="animated-widebox-img one_half col '.$img_animation.'">';
								$output .= '<div class="widebox-img-wrap">';
									$output .= '<img src="'.$img_src.'" alt="'.$img_description.'">';
								$output .= '</div>';
							$output .= '</div>';
						}
						$output .= '<div class="animated-widebox-content gvc-clearfix col one_half last-yes '.$content_animation.'">';
							$output .= '<div>'.do_shortcode($content).'</div>';
						$output .= '</div>';
					} elseif($img_position == "right"){
						$output .= '<div class="animated-widebox-content gvc-clearfix col one_half '.$content_animation.'">';
							$output .= '<div>'.do_shortcode($content).'</div>';
						$output .= '</div>';
						if(isset($img_src) && !empty($img_src)){
							$output .= '<div class="animated-widebox-img one_half col last-yes '.$img_animation.'">';
								$output .= '<div class="widebox-img-wrap">';
									$output .= '<img src="'.$img_src.'" alt="'.$img_description.'">';
								$output .= '</div>';
							$output .= '</div>';
						}
						
					} elseif($img_position == "top"){
						if(isset($img_src) && !empty($img_src)){
							$output .= '<div class="animated-widebox-img '.$img_animation.'">';
								$output .= '<div class="widebox-img-wrap">';
									$output .= '<img src="'.$img_src.'" alt="'.$img_description.'">';
								$output .= '</div>';
							$output .= '</div>';
						}
						$output .= '<div class="animated-widebox-content gvc-clearfix '.$content_animation.'">';
							$output .= '<div>'.do_shortcode($content).'</div>';
						$output .= '</div>';
						
					} elseif($img_position == "bottom"){
						
						$output .= '<div class="animated-widebox-content gvc-clearfix '.$content_animation.'">';
							$output .= '<div>'.do_shortcode($content).'</div>';
						$output .= '</div>';

						if(isset($img_src) && !empty($img_src)){
							$output .= '<div class="animated-widebox-img '.$img_animation.'">';
								$output .= '<div class="widebox-img-wrap">';
									$output .= '<img src="'.$img_src.'" alt="'.$img_description.'">';
								$output .= '</div>';
							$output .= '</div>';
						}
						
					}

				$output .= '</div>';

			$output .= '</div>';

	    }

    } else {
    	$output .='<div class="registered-only-title">'.__("Visible only for registered users", TEMPNAME).'</div>';
    }

	echo $output;
	
?>