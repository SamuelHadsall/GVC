<?php

	extract(shortcode_atts(array(
		'lightbox'         => '',
		'button_text'      => ''
	), $atts));
    
    $output = "";
    $output .= '<a class="button" href="#">'.$button_text.'</a>';
    $output .= '<div class="container-shortcode show_hide gvc-clearfix lightbox-'.$lightbox.'">';
        $output .= '<div class="show_hide_content">'.do_shortcode($content).'</div>';
    $output .= '</div>';
    echo $output;
	
?>