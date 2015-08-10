<?php

	extract(shortcode_atts(array(
		'last' => 'no',
		'width' => '1/1'
	), $atts));

    global $gvc_opt, $gvc_def;

		$output = "";
		$width = wpb_translateColumnWidthToSpan($width);

		if(empty($last) || !in_array($last, $gvc_opt[2]) || $last == $gvc_def[1]) {$last = "no";}

		$output .= '<div class="shortcode col '.$width.' last-'.$last.'">' .do_shortcode($content). '</div>';
		if ($last == 'yes') {$output .='<span class="inline-gvc-clearfix"></span>';}

	echo $output;
	
?>