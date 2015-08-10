<?php

	extract(shortcode_atts(array(
		'id'               => '',
		'class'			   => '',
		'border_radius'    => '',
		'border_width'     => '',
		'background_color' => '',
		'border_color'     => '',
		'color'            => '',
		'padding'          => '0px 0px 0px 0px',
		'width'            => '',
		'align'            => 'left',
        'animate'          => 'no',
        'animation'        => "scale"
	), $atts));
	
	 
    global $gvc_opt, $gvc_def;
    $style = "";
    $output = "";

    if(!is_numeric($border_radius) || $border_radius < 0 ){$border_radius = "0";}
    if(!is_numeric($border_width) || $border_width < 0 ){$border_width = "";}

	if(empty($align) || !in_array($align, $gvc_opt[16]) || $align == $gvc_def[21]){$align = 'none';}
    if(empty($animate) || !in_array($animate, $gvc_opt[2]) || $animate == $gvc_def[1]){$animate = 'no';}

    if(empty($width)){
    	$style .= 'width:100%;';
    } else {
    	$style .= 'width:'.$width.'px;';
    }

    if (isset($padding) && !empty($padding)) {
    	$style .= "padding:".$padding.";";
    }

    if (isset($border_radius) && !empty($border_radius)) {
    	$style .= "border-radius:".$border_radius."px;";
    }

    if (isset($border_width) && !empty($border_width)){
    	$style .= "border-width:".$border_width."px; border-style:solid;";
    }

    if (isset($border_color) && !empty($border_color)){
    	$style .= "border-color:".$border_color.";";
    }

    if (isset($background_color) && !empty($background_color)){
    	$style .= "background-color:".$background_color.";";
    }

    if (isset($color) && !empty($color)){
    	$style .= "color:".$color.";";
    }

   $output = '<div id="'.$id.'" class="'.$class. 'gvc-colorbox shortcode container-shortcode animate-'.$animate.' '.$animation.' align-'.$align.' gvc-clearfix" style="'.$style.'">'.do_shortcode($content).'</div><div class="inline-gvc-clearfix"></div>';

   echo $output;
	
?>