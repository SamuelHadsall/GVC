<?php
$gvc_portfolio_yes         = ($gvc['gvc-portfolio-yes']) ? $gvc['gvc-portfolio-yes'] : 0;
/*====================================================================*/
/*  CLEAR EXTRA TAGS FROM SHORTCODES
/*====================================================================*/

	add_filter("the_content", "gvc_the_content_filter");
	add_filter('widget_text', 'gvc_the_content_filter');
	 
	function gvc_the_content_filter($content) {
	 
		$block = join("|",array("youtube","vimeo","soundcloud","gvc_button","dropcap","icon_list","font_size","splitter","line","gap","highlight","one_half","one_third","one_quarter","two_thirds","three_quarters","colorbox", "slider_colorbox","box_container","tagline","widebox","fullbox","animated_widebox","section_slider","tabs","accordion","clients","testimonials","persons","recent_posts","recent_portfolio","carousel","media_slider","gmap","pt","table","alert","social_links","icons","code","show_hide","registered_only","progress","circle_progress","counter","icon_progress"));
	 
		$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
			
		$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
	 
		return $rep;
	 
	}

/*====================================================================*/
/*  VALIDATION OPTIONS/DEFAULT VALUES
/*====================================================================*/

	$gvc_opt = array(
		array('large', 'medium', 'small'),
		array('_self', '_blank'),
		array('no', 'yes'),
		array('empty', 'full'),
		array('circle', 'square'),
		array('v1', 'v2', 'v3'),
		array('solid', 'double', 'dotted', 'dashed-thick', 'dashed-thin', 'textured'),
		array('left', 'right', 'center', 'justify'),
		array('note', 'success', 'warning', 'error', 'information'),
		array('repeat', 'repeat-x', 'repeat-y',  'no-repeat'),
		array('fixed','scroll'),
		array('horizontal', 'vertical'),
		array('youtube', 'vimeo', 'img'),
		array('roadmap', 'satellite', 'hybrid', 'terrain', 'grey'),
		array('left', 'right', 'top', 'bottom'),
		array('left', 'right', 'top', 'bottom', 'none'),
		array('left', 'right', 'center'),
		array('v1', 'v2')
	);

	$gvc_def = array(
		'small medium large',
		'yes no',
		'_self _blank',
		'icon name',
		'empty full',
		'circle square',
		'v1 v2 v3',
		'solid double dotted dashed-thick dashed-thin textured',
		'1 2 3 4 5',
		'left right center justify',
		'note success warning error information',
		'repeat repeat-x repeat-y no-repeat',
		'fixed scroll',
		'roadmap satellite hybrid terrain grey',
		'link goes here',
		'image link goes here',
		'youtube vimeo img',
		'youtube/vimeo id',
		'horizontal vertical',
		'1 2 3 4',
		'left right top bottom none',
		'left right center',
		'1 2 3 4 5 6',
		'v1 v2'
	);

	global $gvc;
	$gvc_temp_color = (isset($gvc['gvc-main-color']) && !empty($gvc['gvc-main-color'])) ? $gvc['gvc-main-color'] : '#c91239';

/*====================================================================*/
/*  BUTTONS SHORTCODE
/*====================================================================*/
	
	function gvc_button($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'size'        => 'medium',
				'back_color'  => '',
				'color'       => '',
				'href'        => '',
				'target'      => '_self',
				'icon'        => '',
				'text' => ''
			), $atts)
		);

		global $gvc_opt, $gvc_def;

		$output = "";
		$button_style = "";
		$icon_class = "";

		if(empty($size) || !in_array($size, $gvc_opt[0]) || $size == $gvc_def[0]) {$size = "medium";}

		if(empty($target) || !in_array($target, $gvc_opt[1]) || $target == $gvc_def[2]) {$target = "_self";}

		if($icon == $gvc_def[3]){$icon = '';}

		if(isset($icon) && !empty($icon)) {$icon_class = "button-icon";}

		if(isset($back_color) && !empty($back_color)) {
			$button_style .= 'background-color:'.$back_color.';';
		}

		if(isset($color) && !empty($color)) {
			$button_style .= 'color:'.$color.';';
		}

		$output .= '<a class="button '.$size.' '.$icon_class.'" style="'.$button_style.'" href="'.$href.'" target="'.$target.'">'.do_shortcode($content);

			if(isset($icon) && !empty($icon)) {
				$output .= '<i class="fa fa-'.$icon.'"></i>';
			}
			
			$output .= $text;

		$output .= '</a>';

		return $output;
	}

	add_shortcode('gvc_button', 'gvc_button');

/*====================================================================*/
/*  DROPCAP SHORTCODE
/*====================================================================*/

	function gvc_dropcap( $atts, $content = null ) {

		extract(shortcode_atts(
			array(
				'type' => 'empty',
				'color' => ''
			), $atts)
		);

		global $gvc_opt, $gvc_def;

		if (empty($type) || !in_array($type, $gvc_opt[3]) || $type == $gvc_def[4]) {$type = "empty";}

		if ($type == "full") {
			if (isset($color) && !empty($color)) {
				$output = '<span class="dropcap full" style="background-color:'.$color.';">'.do_shortcode($content).'</span>';
			} else {
				$output = '<span class="dropcap full">'.do_shortcode($content).'</span>';
			}
		} else {
			if (isset($color) && !empty($color)) {
				$output = '<span class="dropcap empty" style="color:'.$color.';">'.do_shortcode($content).'</span>';
			} else {
				$output = '<span class="dropcap empty">'.do_shortcode($content).'</span>';
			}
			
		}

		

		return $output;  		
	}

	add_shortcode('dropcap', 'gvc_dropcap');

/*====================================================================*/
/*  HIGHLIGHT SHORTCODE
/*====================================================================*/

	function gvc_highlight( $atts, $content = null ) {

		extract(shortcode_atts(
			array(
				'color' => ''
			), $atts)
		);

		$output = "";

		if (isset($color) && !empty($color)) {
			$output = '<span class="gvc-highlight" style="background-color:'.$color.'">'.do_shortcode($content).'</span>';
		} else {
			$output = '<span class="gvc-highlight">'.do_shortcode($content).'</span>';
		}

		return $output;  		
	}

	add_shortcode('highlight', 'gvc_highlight');

/*====================================================================*/
/*  SPLITTER SHORTCODE
/*====================================================================*/

	function gvc_splitter($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'top'    => '20',
				'bottom' => '20',
				'type'   => 'solid',
				'color'  => ''
			), $atts)
		);

		global $gvc_opt, $gvc_def;

		$styles = '';

		if(empty($type) || !in_array($type, $gvc_opt[6]) || $type == $gvc_def[7]){$type = "solid";}
		if(!is_numeric($top) || $top < 0){$top = "20";}
		if(!is_numeric($bottom) || $bottom < 0){$bottom = "20";}

		if(isset($color) && !empty($color)) {
			if($type == 'textured'){
				$styles .= "";
			} else {
				$styles .= 'border-bottom-color:'.$color.';';
			}	
		}
			
		$output = '<div class="splitter gvc-clearfix '.$type.'" style="margin-top:'.$top.'px; margin-bottom:'.$bottom.'px;'.$styles.'">&nbsp;</div>';
		return $output;

	}
	add_shortcode('splitter', 'gvc_splitter');

/*====================================================================*/
/*  FONT-SIZE SHORTCODE
/*====================================================================*/
	
	function gvc_font_size($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'font_size'   => '',
				'line_height' => ''
			), $atts)
		);

		return '<span style="font-size:'.$font_size.' !important; line-height:'.$line_height.' !important;" class="gvc-font-size">'.do_shortcode($content).'</span>';
	}

	add_shortcode('font_size', 'gvc_font_size');

/*====================================================================*/
/*  SOCIAL LINKS SHORTCODE
/*====================================================================*/
	
	function gvc_social_links($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'target'   => '_self',
				'align'    => 'left'
			), $atts)
		);

		global $gvc_opt, $gvc_def;
		$output = "";


		if(empty($align) || !in_array($align, $gvc_opt[16]) || $align == $gvc_def[21]) {$align = "left";}

		if(empty($target) || !in_array($target, $gvc_opt[1]) || $target == $gvc_def[2]) {$target = "_self";}

		$output .= '<div class="social-links gvc-clearfix '.$align.'">';
		
		foreach($atts as $social => $href) {

			if($href && $social != 'target' && $social != 'align') {
				if ($social == "vimeo") {
					$output .='<a class="vimeo" href="'.$href.'" title="vimeo" target="'.$target.'"><i class="fa fa-vimeo-square"></i></a>';
				} elseif($social == "email"){
					$output .='<a class="email" href="'.$href.'" title="email" target="'.$target.'"><i class="fa fa-envelope"></i></a>';
				} elseif($social == "google_plus"){
					$output .='<a class="google-plus" href="'.$href.'" title="email" target="'.$target.'"><i class="fa fa-google-plus"></i></a>';
				}
				else {
					$output .='<a class="'.$social.'" href="'.$href.'" title="'.$social.'" target="'.$target.'"><i class="fa fa-'.$social.'"></i></a>';
				}
			}
		}

		$output .= '</div>';

		return $output;
	}
	add_shortcode('social_links', 'gvc_social_links');

/*====================================================================*/
/*  ICONS SHORTCODE
/*====================================================================*/
	
	function gvc_icons($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'type'             => '',
				'size'             => 'small',
				'icon'             => 'check',
				'icon_color'       => '',
				'border_color'     => '',
				'background_color' => ''
			), $atts)
		);

		global $gvc_opt, $gvc_def;
		$output = '';
		$styles = '';

		if(empty($type) || !in_array($type, $gvc_opt[4]) || $type == $gvc_def[5]) {$type = "";}
		if(empty($size) || !in_array($size, $gvc_opt[0]) || $size == $gvc_def[0]) {$size = "small";}

		if($icon == $gvc_def[3]){$icon = 'check';}

		if(isset($icon_color) && !empty($icon_color)) {
			$styles .= 'color:'.$icon_color.';';
		}

		if(isset($background_color) && !empty($background_color)) {
			if(empty($type)) {
				$type="square";
			}
			$styles .= 'background-color:'.$background_color.';';
			if(empty($border_color)){
				$border_color = $background_color;
			}
		}

		if(isset($border_color) && !empty($border_color) && isset($type) && !empty($type)) {
			$styles .= 'border-color:'.$border_color.';';
		}

		$output .= '<i class="fa '.$type.' '.$size .' fa-'.$icon.'" style="'.$styles.'"></i>';

		return $output;
	}
	add_shortcode('icons', 'gvc_icons');

/*====================================================================*/
/*  GAP SHORTCODE
/*====================================================================*/

	function gvc_gap( $atts, $content = null ) {

		extract(shortcode_atts(array(
	        'height' => ''
	    ), $atts));

	   return "<div class='gvc-gap inline-gvc-clearfix' style='height:".$height."px'>&nbsp;</div>";
	}
	add_shortcode('gap', 'gvc_gap');

/*====================================================================*/
/*  REGISTERED ONLY SHORTCODE // (CONTAINER SHORTCODE) 
/*====================================================================*/
	
	function gvc_registered_only( $atts, $content = null ) {

		static $id_counter = 1;

		$output = "";
		if ( is_user_logged_in() && !is_null( $content ) && !is_feed() ){
			$output .='<div id="registered-only-'.$id_counter.'" class="container-shortcode registered-only gvc-clearfix">'.do_shortcode($content).'</div>';
		} else {
			$output .='<div class="registered-only-title">'.__("Visible only for registered users", TEMP_NAME).'</div>';
		}

		$id_counter++;

		return $output;  
	}

	add_shortcode( 'registered_only', 'gvc_registered_only' );

/*====================================================================*/
/* SHOW/HIDE SHORTCODE // (CONTAINER SHORTCODE)
/*====================================================================*/

	/*----------------------------------------------------------------*/
	/* Container
	/*----------------------------------------------------------------*/
	
		function gvc_show_hide( $atts, $content = null ) {

			extract(shortcode_atts(array(
		        'lightbox'    => '',
		    ), $atts));

		    global $gvc_opt, $gvc_def;

		    if(empty($lightbox) || !in_array($lightbox, $gvc_opt[2]) || $lightbox == $gvc_def[1]){$lightbox = 'no';}

			$output = '';

			$output .= '<div class="container-shortcode show_hide gvc-clearfix lightbox-'.$lightbox.'">';
				$output .= do_shortcode($content);
			$output .= '</div>';

			return $output;

		}
		add_shortcode('show_hide', 'gvc_show_hide');

	/*----------------------------------------------------------------*/
	/* Content
	/*----------------------------------------------------------------*/
	
		function gvc_show_hide_content( $atts, $content = null ) {

			static $id = 1;

			$output = '<div class="show_hide_content" id="show-hide-content-'.$id.'">'.do_shortcode($content).'</div>';

			$id++;

			return $output;

		}
		add_shortcode('show_hide_content', 'gvc_show_hide_content');

/*====================================================================*/
/* SLIDER COLORBOX SHORTCODE
/*====================================================================*/

	function gvc_slider_colorbox( $atts, $content = null ) {

		extract(shortcode_atts(array(
	        'border_radius'    => '',
	        'border_width'     => '',
	        'background_color' => '',
	        'border_color'     => '',
	        'color'            => '',
	        'padding'          => '20px 20px 20px 20px',
	        'width'            => '',
	    ), $atts));


	    $style = "";
	    $output = "";

	    static $id_counter = 1;

	    if(empty($width)){
	    	$style .= 'width:100%;';
	    } else {
	    	$style .= 'width:'.$width.'px;';
	    }

	    if(!is_numeric($border_radius) || $border_radius < 0 ){$border_radius = "0";}
	    if(!is_numeric($border_width) || $border_width < 0 ){$border_width = "";}

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

	   $output = '<div data-id="gvc-colorbox-slider-'.$id_counter.'" class="gvc-slider-colorbox gvc-clearfix" style="'.$style.'">'.do_shortcode($content).'</div>';

	   $id_counter++;

	   return $output;

	}
	add_shortcode('slider_colorbox', 'gvc_slider_colorbox');

/*====================================================================*/
/* COLORBOX SHORTCODE // (CONTAINER SHORTCODE)
/*====================================================================*/

	function gvc_colorbox( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'id'               => '',
	        'border_radius'    => '',
	        'border_width'     => '',
	        'background_color' => '',
	        'border_color'     => '',
	        'color'            => '',
	        'padding'          => '20px 20px 20px 20px',
	        'width'            => '',
	        'align'            => 'left'
	    ), $atts));

		global $gvc_opt, $gvc_def;
	    $style = "";
	    $output = "";

	    static $id_counter = 1;

	    if(!is_numeric($border_radius) || $border_radius < 0 ){$border_radius = "0";}
	    if(!is_numeric($border_width) || $border_width < 0 ){$border_width = "";}

		if(empty($align) || !in_array($align, $gvc_opt[16]) || $align == $gvc_def[21]){$align = 'none';}

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

	    if (!isset($id) || empty($id)) {
	    	$id = "gvc-colorbox-".$id_counter;
	    }

	   $output = '<div id="'.$id.'" data-id="gvc-colorbox-'.$id_counter.'" class="gvc-colorbox shortcode container-shortcode align-'.$align.' gvc-clearfix" style="'.$style.'">'.do_shortcode($content).'</div><div class="inline-gvc-clearfix"></div>';

	   $id_counter++;

	   return $output;

	}
	add_shortcode('colorbox', 'gvc_colorbox');

/*====================================================================*/
/*  WIDEBOX SHORTCODE // (CONTAINER SHORTCODE)
/*====================================================================*/
	
	function gvc_widebox($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'id'                    => '',
				'background_color'      => '',
				'background_image'      => '',
				'background_repeat'     => 'no-repeat',
				'background_position'   => 'left top',
				'background_attachment' => 'scroll',
				'border_size'           => '1',
				'border_color'          => '',
				'text_color'            => '',
				'padding_top'           => '20',
				'padding_bottom'        => '20',
				'shadow'                => 'no',
				'parallax'              => 'no'
			), $atts)
		);

		global $gvc_opt, $gvc_def;
		$styles = '';
		$output = '';

		static $id_counter = 1;

		if(empty($shadow) || !in_array($shadow, $gvc_opt[2]) || $shadow == $gvc_def[1]){$shadow = 'no';}
		if(empty($parallax) || !in_array($parallax, $gvc_opt[2]) || $parallax == $gvc_def[1]){$parallax = 'no';}

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
				$background_position = "left top";
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

		if (!isset($id) || empty($id)) {
	    	$id = "widebox-".$id_counter;
	    }

		$output .= '<div id="'.$id.'" data-id="widebox-'.$id_counter.'" class="widebox container-shortcode shadow-'.$shadow.' parallax-'.$parallax.'" style="'.$styles.'">';

			$output .= '<div class="container">';
				$output .= '<div class="widebox-content gvc-clearfix">';
					$output .= do_shortcode($content);
				$output .= '</div>';
			$output .= '</div>';

		$output .= '</div>';

		$id_counter++;

		return $output;
	}

	add_shortcode('widebox', 'gvc_widebox');

/*====================================================================*/
/*  ANIMATED WIDEBOX SHORTCODE // (CONTAINER SHORTCODE)
/*====================================================================*/
	
	function gvc_animated_widebox($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'id'                    => '',
				'background_color'      => '',
				'background_image'      => '',
				'background_repeat'     => 'no-repeat',
				'background_position'   => 'top left',
				'background_attachment' => 'scroll',
				'border_size'           => '1',
				'border_color'          => '',
				'text_color'            => '',
				'padding_top'           => '20',
				'padding_bottom'        => '20',
				'shadow'                => 'no',
				'parallax'              => 'no',
				'img_position'          => 'left',
				'content_animation'     => 'left',
				'img_animation'         => 'right',
				'img_src'               => '',
				'img_description'       => '',
				'animate'               => 'yes',
			), $atts)
		);

		global $gvc_opt, $gvc_def;
		$styles = '';
		$output = '';

		static $id_counter = 1;	

		if(empty($shadow) || !in_array($shadow, $gvc_opt[2]) || $shadow == $gvc_def[1]){$shadow = 'no';}
		if(empty($animate) || !in_array($animate, $gvc_opt[2]) || $animate == $gvc_def[1]){$animate = 'yes';}
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

		if (!isset($id) || empty($id)) {
	    	$id = "animated-widebox-".$id_counter;
	    }

		$output .= '<div id="'.$id.'" data-id="animated-widebox-'.$id_counter.'" class="container-shortcode animated-widebox gvc-clearfix parallax-'.$parallax.' shadow-'.$shadow.' animate-'.$animate.'" style="'.$styles.'">';

			$output .= '<div class="container">';

				if($img_position == "left"){
					if(isset($img_src) && !empty($img_src)){
						$output .= '<div class="animated-widebox-img one_half col '.$img_animation.'">';
							$output .= '<div class="widebox-img-wrap">';
								$output .= '<img src="'.$img_src.'" alt="'.$img_description.'" title="'.$img_description.'">';
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
								$output .= '<img src="'.$img_src.'" alt="'.$img_description.'" title="'.$img_description.'">';
							$output .= '</div>';
						$output .= '</div>';
					}
					
				} elseif($img_position == "top"){
					if(isset($img_src) && !empty($img_src)){
						$output .= '<div class="animated-widebox-img '.$img_animation.'">';
							$output .= '<div class="widebox-img-wrap">';
								$output .= '<img src="'.$img_src.'" alt="'.$img_description.'" title="'.$img_description.'">';
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
								$output .= '<img src="'.$img_src.'" alt="'.$img_description.'" title="'.$img_description.'">';
							$output .= '</div>';
						$output .= '</div>';
					}
					
				}

			$output .= '</div>';

		$output .= '</div>';

		$id_counter++;

		return $output;
	}

	add_shortcode('animated_widebox', 'gvc_animated_widebox');

/*====================================================================*/
/*  FULLBOX SHORTCODE // (CONTAINER SHORTCODE)
/*====================================================================*/
	
	function gvc_fullbox($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'id'                    => '',
				'padding_top'           => '20',
				'padding_bottom'        => '20',
			), $atts)
		);

		static $id_counter = 1;

		global $gvc_opt, $gvc_def;
		if(!is_numeric($padding_top) || $padding_top < 0 ){$padding_top = "20";}
		if(!is_numeric($padding_bottom) || $padding_bottom < 0 ){$padding_bottom = "20";}

		$output = "";

		if (!isset($id) || empty($id)) {
	    	$id = "full-box-".$id_counter;
	    }

		$output .= '<div id="'.$id.'" data-id="full-box-'.$id_counter.'" class="full-box container-shortcode" style="padding-top:'.$padding_top.'px; padding-bottom:'.$padding_bottom.'px;">';
			$output .= '<div class="container gvc-clearfix">';
				$output .= do_shortcode($content);
			$output .= '</div>';
		$output .= '</div>';

		$id_counter++;

		return $output;
	}

	add_shortcode('fullbox', 'gvc_fullbox');

/*====================================================================*/
/*  SLIDER SECTION SHORTCODE // (CONTAINER SHORTCODE)
/*====================================================================*/
	
	function gvc_section_slider($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'id'             => '',
				'bullets'        => 'yes',
				'arrows'         => 'no',
				'bullets_align'  => 'left',
				'bullets_color'  => '',
				'autoplay'       => 'no'
			), $atts)
		);

		global $gvc_opt, $gvc_def;
		static $id_counter = 1;
		$output = "";

		if(empty($bullets_align) || !in_array($bullets_align, $gvc_opt[16]) || $bullets_align == $gvc_def[21]){$bullets_align = 'left';}
		if(empty($autoplay) || !in_array($autoplay, $gvc_opt[2]) || $autoplay == $gvc_def[1]){$autoplay = 'no';}

		if(empty($bullets) || !in_array($bullets, $gvc_opt[2]) || $bullets == $gvc_def[1]){$bullets = 'no';}
		if(empty($arrows) || !in_array($arrows, $gvc_opt[2]) || $arrows == $gvc_def[1]){$arrows = 'no';}

		if (!isset($id) || empty($id)) {
	    	$id = "slider-section-".$id_counter;
	    }

		$output .= '<div id="'.$id.'" data-id="slider-section-'.$id_counter.'" class="slider-section gvc-carousel ca-container gvc-clearfix carousel-yes autoplay-'.$autoplay.' bullets-'.$bullets.' arrows-'.$arrows.' bullets-'.$bullets_align.'">';
			if (isset($bullets_color) && !empty($bullets_color)) {
				$output .='<style scoped>#slider-section-'.$id_counter.' .ca-bullets span {background-color:'.$bullets_color.';} #slider-section-'.$id_counter.' .ca-bullets span.current-bullet {border-color:'.$bullets_color.';background-color:transparent;}</style>';
			}

			$output .= '<div class="ca-controls hidden gvc-clearfix">';
				$output .= '<span class="ca-nav-prev">'.__("Previous", TEMP_NAME).'</span><span class="ca-nav-next">'.__("Next", TEMP_NAME).'</span>';
			$output .= '</div>';
			
			$output .= '<div class="carousel-container-wrapper">';
				$output .= '<div class="carousel-container ca-wrapper gvc-clearfix  columns columns-1">';
					$output .= do_shortcode($content);
				$output .= '</div>';
			$output .= '</div>';

			$output .= '<div class="ca-bullets hidden gvc-clearfix"><div class="container"></div></div>';

		$output .= '</div>';
		

		$id_counter++;

		return $output;
	}

	add_shortcode('section_slider', 'gvc_section_slider');

	function gvc_section($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'background_color'      => '',
				'background_image'      => '',
				'background_repeat'     => 'no-repeat',
				'background_position'   => 'left top',
				'background_attachment' => 'scroll',
				'padding_top'    => '50',
				'padding_bottom' => '50',
			), $atts)
		);

		global $gvc_opt, $gvc_def;
		$styles = "";

		if(!is_numeric($padding_top) || $padding_top < 0 ){$padding_top = "50";}
		if(!is_numeric($padding_bottom) || $padding_bottom < 0 ){$padding_bottom = "50";}

		$styles.='padding-top:'.$padding_top.'px; padding-bottom:'.$padding_bottom.'px;';

		if(isset($background_color) && !empty($background_color)) {
			$styles .= 'background-color:'.$background_color.';';
		}

		if(isset($background_image) && !empty($background_image)) {

			if(empty($background_repeat) || !in_array($background_repeat, $gvc_opt[9]) || $background_repeat == $gvc_def[11]) {
				$background_repeat = "no-repeat";
			}

			if ($background_repeat == "no-repeat") {
				$styles .= "-webkit-background-size: cover !important; -moz-background-size: cover !important; background-size: cover !important;";
			}

			if(empty($background_position)){
				$background_position = "left top";
			}

			if(empty($background_attachment) || !in_array($background_attachment, $gvc_opt[12]) || $background_attachment == $gvc_def[14]) {
				$background_attachment = "scroll";
			}

			// Visual composer is on
			if (filter_var($background_image, FILTER_VALIDATE_URL) == false) {
				$image_attributes = wp_get_attachment_image_src($background_image, 'full');
				$background_image = $image_attributes[0];
			}

			$styles .= 'background-image:url('.$background_image.');background-repeat:'.$background_repeat.';background-position:'.$background_position.';background-attachment:'.$background_attachment.';';

		}

		$output = '';

		$output .= '<div class="ca-item carousel-item slider-section-item" style="'.$styles.'">';
			$output .= '<div class="container gvc-clearfix">'.do_shortcode($content).'</div>';
		$output .= '</div>';

		return $output;
	}
	add_shortcode('section', 'gvc_section');


/*====================================================================*/
/*  VIDEO EMBED SHORTCODE  * (WITH MARGIN BOTTOM 25px)
/*====================================================================*/
	
	function gvc_embed( $atts, $content = null, $tag ) {

	    extract( 
	    	shortcode_atts(
    		array(
    			'id' 	=> '',
    			'width' => ''
    		), $atts)
	    );

	    switch( $tag ) {
	        case "youtube":
	            $src = 'http://www.youtube-nocookie.com/embed/';
	            break;
	        case "vimeo":
	            $src = 'http://player.vimeo.com/video/';
	            break;
	    }

	    $style="";

	    if (!empty($width)) {$style = 'max-width:'.$width.'px;';}

	    $output ="";

	    if(isset($id) && !empty($id)){
	    	$output .='<div class="video-embed shortcode" style="'.$style.'">';
		    	$output .='<div class="flex-mod">';
		    		$output .= '<iframe src="'.$src.$id.'" class="iframevideo"></iframe>';
		    	$output .='</div>';
		    $output .='</div>';
	    }

	    return $output;
	}
	add_shortcode( 'youtube', 'gvc_embed' );
	add_shortcode( 'vimeo', 'gvc_embed' );

/*====================================================================*/
/*  SOUNDCLOUD SHORTCODE  * (WITH MARGIN BOTTOM 25px)
/*====================================================================*/
	
	function gvc_soundcloud($atts) {

		extract( 
		 	shortcode_atts(
			array(
				'url'    => '',
				'width'  => '100%',
				'height' => '166'
			), $atts)
		);

		global $gvc_temp_color;
		$output = "";

		$params = 'color='.substr($gvc_temp_color, -6).'&auto_play=false&show_artwork=true';

		if(empty($width)) {$width = "100%";}

		if(empty($height) || !is_numeric($height)) {$height = "166";}

		if(isset($url) && !empty($url)){
			$output .= '<div class="soundcloud shortcode"><iframe width="'.$width.'" height="'.$height.'" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='.$url.'&amp;'.$params.'"></iframe></div>';
		}
	    
		return $output;
	}

	add_shortcode('soundcloud', 'gvc_soundcloud');

/*====================================================================*/
/*  ICON LIST SHORTCODE  * (WITH MARGIN BOTTOM 25px)
/*====================================================================*/
	
	function gvc_icon_list($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'icon' 		       => 'check',
				'icon_color'       => '',
				'background_color' => '',
				'size'             => 'small',
				'type'             => ''
			), $atts)
		);

		global $gvc_opt, $gvc_def;

		$styles = '';
		$class= "";

		if(empty($icon) || $icon == $gvc_def[3]) {$icon = "check";}
		if(empty($type) || !in_array($type, $gvc_opt[4]) || $type == $gvc_def[5]) {$type = "";}
		if(empty($size) || !in_array($size, $gvc_opt[0]) || $size == $gvc_def[0]) {$size = "small";}

		if(isset($icon_color) && !empty($icon_color)){
			$styles .='color:'.$icon_color.';';
		}

		if(isset($type) && !empty($type) && empty($background_color)){
			$class .= "type-no-color";
		}

		if(isset($background_color) && !empty($background_color) && empty($type)){
			$type = 'square';
		}

		if(isset($background_color) && !empty($background_color) && isset($type) && !empty($type)){
			$styles .='background-color:'.$background_color.';';
		}

		$content = str_replace('<ul>', '<ul class="i-list shortcode '.$size.' '.$type.' '.$class.'">', do_shortcode($content));
		$content = str_replace('<li>', '<li><div><i class="fa fa-'.$icon.'" style="'.$styles.'"></i></div><div>', do_shortcode($content));
		$content = str_replace('</li>', '</div></li>', do_shortcode($content));
	
		return $content;

	}

	add_shortcode( 'icon_list', 'gvc_icon_list' );

/*====================================================================*/
/*  COLUMN SHORTCODE  * (WITH MARGIN BOTTOM 25px) // (CONTAINER SHORTCODE)
/*====================================================================*/

	function gvc_columns($atts, $content = null, $tag ) {

		extract(shortcode_atts(
			array(
				'last' => 'no'
			), $atts)
		);
		
		global $gvc_opt, $gvc_def;

		$output = "";
		$type = "";

		static $id_counter = 1;

		if(empty($last) || !in_array($last, $gvc_opt[2]) || $last == $gvc_def[1]) {$last = "no";}

		switch( $tag ) {
	        case "one_half":
	            $type = 'one_half';
	            break;
	        case "one_third":
	            $type = 'one_third';
	            break;
	        case "one_quarter":
	            $type = 'one_quarter';
	            break;
	        case "two_thirds":
	            $type = 'two_thirds';
	            break;
	        case "three_quarters":
	            $type = 'three_quarters';
	            break;
	    }

		$output .= '<div id="col_'.$tag.'_'.$id_counter.'" class="shortcode col '.$type.' last-'.$last.'">' .do_shortcode($content). '</div>';
		if ($last == 'yes') {$output .='<span class="inline-gvc-clearfix"></span>';}

		$id_counter++;

		return $output;

	}

	$tags = array(
	    'one_half',
	    'one_third',
	    'one_quarter',
	    'two_thirds',
	    'three_quarters'
	);
	foreach( $tags as $tag ) {
	    add_shortcode( $tag, 'gvc_columns' );
	}

/*====================================================================*/
/*  TAGLINE SHORTCODE  * (WITH MARGIN BOTTOM 25px)
/*====================================================================*/
	
	function gvc_tagline($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'title'       => '',
				'color'       => '',
				'back_color'  => '',
				'button_text' => '',
				'button_link' => ''
			), $atts)
		);

		$output = '';

		static $id_counter = 1;

		$styles        = "";
		$button_styles = "";

		if (!empty($color)) {
			$styles        .= 'color:'.$color.';';
			$button_styles .= 'color:'.$color.';border-color:'.$color.';';
		}

		if (!empty($back_color)) {
			$styles .= 'background-color:'.$back_color.';';
		}
		$output .= '<div style="'.$styles.'" id="tagline-'.$id_counter.'" class="tagline shortcode gvc-clearfix">';
			$output .= '<style scoped>';
			if (!empty($color) || !empty($back_color)) {
				$output .= '#tagline-'.$id_counter.' .button:hover {';
					if (!empty($color)) {
						$output .= 'background-color:'.$color.'!important;border-color:'.$color.'!important;';
					}
					if (!empty($back_color)) {
						$output .= 'color:'.$back_color.'!important;';
					}
				$output .= '}';
			}
			$output .= '</style>';
			$output .='<div class="container">';
				$output .='<div class="tagline-co tagline-title">';
					if(isset($title) && !empty($title)){
						$output .= '<h2>'.$title.'</h2>';
					}
				$output .= '</div>';

				$output .='<div class="tagline-co">';
					if (isset($button_link) && !empty($button_link)) {
						$output .= '<a class="tagline-button button" style="'.$button_styles.'" href="'.$button_link.'">'.$button_text.'</a>';
					}
				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div>';

		$id_counter++;

		return $output;
	}

	add_shortcode('tagline', 'gvc_tagline');

/*====================================================================*/
/*  ORDINARY TABLE SHORTCODE  * (WITH MARGIN BOTTOM 25px)
/*====================================================================*/
	
	/*----------------------------------------------------------------*/
	/*  Ordinary table
	/*----------------------------------------------------------------*/

		function gvc_table($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'header_back_color' => '',
					'header_color'  	=> '',
					'border_color'  	=> '',
					'align'         	=> 'left',
				), $atts)
			);

			static $id_counter = 1;
			global $gvc_opt, $gvc_def;

			$output = '';
			$styles = '<style scoped>';
			$color_status = '';

			if(empty($align) || !in_array($align, $gvc_opt[7]) || $align == $gvc_def[9]) {$align = "left";}

			if(isset($header_back_color) && !empty($header_back_color)){
				$styles .= '#table-'.$id_counter.' thead {background-color:'.$header_back_color.';} #table-'.$id_counter.' thead th {background-color:'.$header_back_color.'; border-color:'.$header_back_color.';}';
				$color_status = 'color';
			}
			if(isset($header_color) && !empty($header_color)){
				$styles .= '#table-'.$id_counter.' thead th {color:'.$header_color.';}';
			}

			$styles .='</style>';
			$output .= '<div id="table-'.$id_counter.'" class="shortcode table '.$align.' '.$color_status.'">';
				$output .= $styles.'<table>';
					$output .= do_shortcode($content);
				$output .= '</table>';
			$output .= '</div>';

			$id_counter++;

			return $output;
		}

		add_shortcode('table', 'gvc_table');

	/*----------------------------------------------------------------*/
	/* Ordinary table thead
	/*----------------------------------------------------------------*/

		function gvc_thead($atts, $content = null) {

			$output = '<thead><tr>'.do_shortcode($content).'</tr></thead>';
			return $output;
		}

		add_shortcode('thead', 'gvc_thead');

	/*----------------------------------------------------------------*/
	/* Ordinary table thead column
	/*----------------------------------------------------------------*/

		function gvc_th($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'colspan' => '1',
					'rowspan' => '1'
				), $atts)
			);

			if(!is_numeric($colspan) || $colspan < 0){$colspan = "1";}

			if(!is_numeric($rowspan) || $rowspan < 0){$rowspan = "1";}

			$output = '<th colspan="'.$colspan.'" rowspan="'.$rowspan.'">'.do_shortcode($content).'</th>';

			return $output;
		}

		add_shortcode('th', 'gvc_th');

	/*----------------------------------------------------------------*/
	/* Ordinary table tbody
	/*----------------------------------------------------------------*/

		function gvc_tbody($atts, $content = null) {

			$output = '<tbody>'.do_shortcode($content).'</tbody>';

			return $output;
		}

		add_shortcode('tbody', 'gvc_tbody');

	/*----------------------------------------------------------------*/
	/* Ordinary table row
	/*----------------------------------------------------------------*/

		function gvc_tr($atts, $content = null) {

			$output = '<tr>'.do_shortcode($content).'</tr>';

			return $output;
		}

		add_shortcode('tr', 'gvc_tr');

	/*----------------------------------------------------------------*/
	/* Ordinary table column
	/*----------------------------------------------------------------*/

		function gvc_td($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'colspan' => '1',
					'rowspan' => '1'
				), $atts)
			);

			if(!is_numeric($colspan) || $colspan < 0){$colspan = "1";}

			if(!is_numeric($rowspan) || $rowspan < 0){$rowspan = "1";}

			$output = '<td colspan="'.$colspan.'" rowspan="'.$rowspan.'">'.do_shortcode($content).'</td>';

			return $output;
		}

		add_shortcode('td', 'gvc_td');

/*====================================================================*/
/*  ALERT MESSAGE SHORTCODE  * (WITH MARGIN BOTTOM 25px)
/*====================================================================*/
	
	function gvc_alert($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'type' => 'note'
			), $atts)
		);

		global $gvc_opt, $gvc_def;

		if(empty($type) || !in_array($type, $gvc_opt[8]) || $type == $gvc_def[10]) {$type = "note";}

		$output = '';

		$output .= '<div class="alert shortcode '.$type.'">';
			$output .= '<div class="alert-message">'.do_shortcode($content).'</div>';
			$output .= '<span class="close-alert">X</span>';
		$output .= '</div>';

		return $output;
	}

	add_shortcode('alert', 'gvc_alert');

/*====================================================================*/
/*  CODE SHORTCODE  * (WITH MARGIN BOTTOM 25px)
/*====================================================================*/
	
	function gvc_code( $atts, $content = null ) {

		$output = '<div class="shortcode code"><pre>'.strip_tags($content).'</pre></div>';
		return $output;
	}

	add_shortcode( 'code', 'gvc_code' );

/*====================================================================*/
/*  GOOGLE MAP SHORTCODE  * (WITH MARGIN BOTTOM 25px)
/*====================================================================*/
	
	function gvc_gmap($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'zoom'  => '18',
				'coords'=> '53.339381, -6.260405',
				'type'  => 'roadmap',
				'width' => '100%',
				'height'=> '480px',
				'marker'=> ''
			), $atts)
		);

		static $id = 1;
		$map_type_id = "";
		$output ='';

		global $gvc_opt, $gvc_def, $gvc;

		if(empty($type) || !in_array($type, $gvc_opt[13]) || $type == $gvc_def[13]){
			$type = "roadmap";
		}

		if(empty($width)) {$width = "100%";}
		if(empty($height)) {$height = "480px";}

		if(empty($zoom) || !is_numeric($zoom) || $zoom < 0){
			$zoom = "18";
		}
		
		switch ($type) {
			case "roadmap":
				$map_type_id = "google.maps.MapTypeId.ROADMAP";
				break;
			case "satellite":
				$map_type_id = "google.maps.MapTypeId.SATELLITE";
				break;
			case "hybrid":
				$map_type_id = "google.maps.MapTypeId.HYBRID";
				break;
			case "terrain":
				$map_type_id = "google.maps.MapTypeId.TERRAIN";
				break;
			case "grey":
				$map_type_id = "google.maps.MapTypeId.ROADMAP";
				break;
			default:
				$map_type_id = "google.maps.MapTypeId.ROADMAP";
				break;
		}

		if($gvc['gvc-google-map-api'] || $gvc['gvc-google-map-client-id']) {

			$output = '<div id="gmap-canvas-'.$id.'" class="map-canvas shortcode" style="width:'.$width.';height:'.$height.';" >';
				$output .= '<script type="text/javascript">
					jQuery(document).on("ready", function(){

						var styleArray = [
						    {
						        "featureType": "landscape",
						        "stylers": [
						            {"saturation": -100},
						            {"lightness": 65},
						            {"visibility": "on"}
						        ]
						    },
						    {
						        "featureType": "poi",
						        "stylers": [
						            {"saturation": -100},
						            {"lightness": 51},
						            {"visibility": "simplified"}
						        ]
						    },
						    {
						        "featureType": "road.highway",
						        "stylers": [
						            {"saturation": -100},
						            {"visibility": "simplified"}
						        ]
						    },
						    {
						        "featureType": "road.arterial",
						        "stylers": [
						            {"saturation": -100},
						            {"lightness": 30},
						            {"visibility": "on"}
						        ]
						    },
						    {
						        "featureType": "road.local",
						        "stylers": [
						            {"saturation": -100},
						            {"lightness": 40},
						            {"visibility": "on"}
						        ]
						    },
						    {
						        "featureType": "transit",
						        "stylers": [
						            {"saturation": -100},
						            {"visibility": "simplified"}
						        ]
						    },
						    {
						        "featureType": "administrative.province",
						        "stylers": [
						            {"visibility": "off"}
						        ]
						    },
						    {
						        "featureType": "water",
						        "elementType": "labels",
						        "stylers": [
						            {"visibility": "on"},
						            { "lightness": -25 },
						            { "saturation": -100}
						        ]
						    },
						    {
						        "featureType": "water",
						        "elementType": "geometry",
						        "stylers": [
						            {"hue": "#ffff00"},
						            {"lightness": -25},
						            {"saturation": -97}
						        ]
						    }
						];';


					if (isset($marker) && !empty($marker)) {
						// Visual composer is active
						if (filter_var($marker, FILTER_VALIDATE_URL) == false) {
							$image_attributes = wp_get_attachment_image_src($marker, 'full');
							$marker = $image_attributes[0];
					    }
						$output .= 'var iconBase = "'.$marker.'";';
					} else {
						$output .= 'var iconBase = "'.IMG_ASSETS.'" + "/google_map_marker.png";';
					}
						$output .= 'var options = { center: new google.maps.LatLng('.$coords.'),zoom: ' . $zoom . ', mapTypeId: ' . $map_type_id . ', ';
						if ($type === 'grey') {
							$output .= 'styles:styleArray, ';
						}
						$output .= 'scrollwheel: false};
						var map = new google.maps.Map(document.getElementById("gmap-canvas-'.$id.'"), options);
						var marker = new google.maps.Marker({ position: new google.maps.LatLng('.$coords.'), map: map, icon: iconBase});

					});</script>';

			$output .= '</div>';
		
		} else {
			$output .= '<p>'.__('Please specify your Google Maps API key/Client ID', TEMP_NAME).'</p>';
		}

		$id++;

		return $output;

	}
	add_shortcode('gmap', 'gvc_gmap');

/*====================================================================*/
/*  SLIDER SHORTCODE  * (WITH MARGIN BOTTOM 25px)
/*====================================================================*/
	
	/*----------------------------------------------------------------*/
	/*  Slider
	/*----------------------------------------------------------------*/

		function gvc_media_slider($atts, $content = null) {

			$output = '<div class="flexslider shortcode">';
				$output .= '<ul class="slides">';
					$output .= do_shortcode($content);
				$output .= '</ul>';
			$output .= '</div>';

			return $output;
		}
		add_shortcode('media_slider', 'gvc_media_slider');

	/*----------------------------------------------------------------*/
	/*  Slide
	/*----------------------------------------------------------------*/

		function gvc_slide($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'type'        => '',
					'id'          => '',
					'src'         => '',
					'description' => ''
				), $atts)
			);

			global $gvc_opt, $gvc_def;
			$error = __('Please provide correct slide attributes: choose correct type (youtube, vimeo, img); For youtube/vimeo use ID attribute, for img use SRC attribute. Description attribute is optional.', TEMP_NAME);

			if(!in_array($type, $gvc_opt[12]) || $type == $gvc_def[16]){
				$type = '';
			}

			if($id == $gvc_def[17]){$id = '';}
			if($src == $gvc_def[15]){$src = '';}

			if(isset($src) && !empty($src) && empty($id)){
				$type = "img";
			}

			$output = '';

			$output .= '<li>';
				switch ($type) {
					case 'youtube':

						if (isset($id) && !empty($id)) {
							$output .='<div class="video-embed">';
						    	$output .='<div class="flex-mod">';
						    		$output .= '<iframe src="http://www.youtube-nocookie.com/embed/'.$id.'" class="iframevideo" title="'.$description.'"></iframe>';
						    	$output .='</div>';
						    $output .='</div>';
						} else {
							$output .= '<div class="alert error"><div class="alert-message">'.$error.'</div><span class="close-alert">X</span></div>';
						}
						
						break;
					case 'vimeo':

						if (isset($id) && !empty($id)) {
							$output .='<div class="video-embed">';
						    	$output .='<div class="flex-mod">';
						    		$output .= '<iframe src="http://player.vimeo.com/video/'.$id.'" class="iframevideo" title="'.$description.'"></iframe>';
						    	$output .='</div>';
						    $output .='</div>';
						} else {
							$output .= '<div class="alert error"><div class="alert-message">'.$error.'</div><span class="close-alert">X</span></div>';
						}

						break;
					case 'img':
						if (isset($src) && !empty($src)) {
							// Visual composer is active
							if (filter_var($src, FILTER_VALIDATE_URL) == false) {
								$image_attributes = wp_get_attachment_image_src($src, 'full');
								$src = $image_attributes[0];
						    }
							$output .='<img src="'.$src.'" alt="'.$description.'" title="'.$description.'">';
						} else {
							$output .= '<div class="alert error"><div class="alert-message">'.$error.'</div><span class="close-alert">X</span></div>';
						}
						break;
					
					default:
						$output .= '<div class="alert error"><div class="alert-message">'.$error.'</div><span class="close-alert">X</span></div>';
						break;
				}
			$output .= '</li>';
			return $output;
		}
		add_shortcode('slide', 'gvc_slide');

/*====================================================================*/
/*  TABS SHORTCODE  * (WITH MARGIN BOTTOM 25px)
/*====================================================================*/
	
	/*----------------------------------------------------------------*/
	/*  Tabs container
	/*----------------------------------------------------------------*/

		function gvc_tabs( $atts, $content = null ) {
		
			extract(shortcode_atts(array(
				'type' => 'horizontal'
			), $atts));

			global $gvc_opt, $gvc_def;

			$output = "";

			static $id_counter = 1;

			if(empty($type) || !in_array($type, $gvc_opt[11]) || $type == $gvc_def[18]){
				$type = 'horizontal';
			}

		    $output .= '<div id="tabs-'.$id_counter.'" class="tabs shortcode '.$type.' gvc-clearfix">';
			
				$output .= '<div class="tabset gvc-clearfix">';
					foreach ($atts as $key => $tab) {
						if($key != 'type') {
							$output .= '<span class="tab">'.$tab.'</span>';
						}
					}
				$output .= '</div>';
				
				$output .= '<div class="tabs-container">'.do_shortcode($content).'</div>';

			$output .= '</div>';

			$id_counter++;
			
			return $output;
		}

		add_shortcode('tabs', 'gvc_tabs');

	/*----------------------------------------------------------------*/
	/*  Tab
	/*----------------------------------------------------------------*/

		function gvc_tab( $atts, $content = null ) {
			$output = '<div class="tab-content">' . do_shortcode($content) .'</div>';
			
			return $output;
		}
		add_shortcode('tab', 'gvc_tab');

/*====================================================================*/
/* ACCORDION SHORTCODE  * (WITH MARGIN BOTTOM 25px)
/*====================================================================*/

	/*----------------------------------------------------------------*/
	/*  Accordion
	/*----------------------------------------------------------------*/

		function gvc_accordion( $atts, $content = null ) {

			extract(shortcode_atts(array(
				'collapsible' => 'no'
			), $atts));

			global $gvc_opt, $gvc_def;
			$output = '';

			static $id_counter = 1;

			if(empty($collapsible) || !in_array($collapsible, $gvc_opt[2]) || $collapsible == $gvc_def[1]){
				$collapsible = 'no';
			}
			
			$output .= '<div id="accordion-'.$id_counter.'" class="accordion shortcode collapsible-'.$collapsible.'">';
				$output .= do_shortcode($content);
			$output .= '</div>';

			$id_counter++;

			return $output;

		}
		add_shortcode('accordion', 'gvc_accordion');	

	/*----------------------------------------------------------------*/
	/*  Toggle
	/*----------------------------------------------------------------*/

		function gvc_toggle( $atts, $content = null ) {

			extract(shortcode_atts(array(
		        'title'=> '',
		        'open' => 'no'
		    ), $atts));

		    $tt_class = "";

		    global $gvc_opt, $gvc_def;

			if(empty($open) || !in_array($open, $gvc_opt[2]) || $open == $gvc_def[1]){
				$open = 'no';
			}

			if($open == 'yes'){
				$tt_class = "active";
			}

			$output = '';

			$output .= '<div class="toggle-title '.$tt_class.' gvc-clearfix"><div class="toggle-title-header">'.$title.'</div><span class="arrow">+</span></div>';
			$output .= '<div class="toggle-content">';
				$output .= do_shortcode($content);
			$output .= '</div>';
			
		   return $output;
		}
		add_shortcode('toggle', 'gvc_toggle');



/*====================================================================*/
/*  ICON-PROGRESS-BAR SHORTCODE  == (WITH SELF CHILDREN EL.)
/*====================================================================*/
	
	function gvc_icon_progress($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'icon'           => 'male',
				'inactive_color' => '',
				'active_color'   => '',
				'active'         => '',
				'number'         => '',
				'align'          => ''
			), $atts)
		);

		global $gvc_opt, $gvc_temp_color, $gvc_def;

		$output = '';
		$data_color = '';
		$styles = '';

		static $id_counter = 1;

		if(!is_numeric($number) || $number < 0){$number = "";}

		if(!is_numeric($active) || $active < 0){$active = "";}
		if($active > $number){$active = $number;}

		if(empty($align) || !in_array($align, $gvc_opt[16]) || $align == $gvc_def[22]) {$align = "center";}

		if($icon == $gvc_def[3]){$icon = 'male';}

		if(isset($inactive_color) && !empty($inactive_color)) {
			$styles .= 'color:'.$inactive_color.';';
		}

		if(isset($active_color) && !empty($active_color)) {
			$data_color = $active_color;
		} else {
			$data_color = $gvc_temp_color;
		}

		if((isset($icon) && !empty($icon)) && (isset($active) && !empty($active))) {
			$output .= '<div id="i-progress-bar-'.$id_counter.'" class="child-element-shortcode i-progress-bar '.$align.'" data-color="'.$data_color.'" data-active="'.$active.'">';

			if(isset($inactive_color) && !empty($inactive_color)) {
				$output .= '<style scoped>#i-progress-bar-'.$id_counter.' i {color:'.$inactive_color.';}</style>';
			}
			
			if(isset($number) && !empty($number)){
				for ($i=0; $i < $number; $i++) { 
					$output .= '<i class="fa fa-'.$icon.'"></i>';
				}
			}
			$output .= '</div>';
		}

		$id_counter++;

		return $output;
	}
	add_shortcode('icon_progress', 'gvc_icon_progress');

/*====================================================================*/
/*  PRICING TABLE SHORTCODE  == (WITH SELF CHILDREN EL.)
/*====================================================================*/

	/*----------------------------------------------------------------*/
	/*  Pricing table
	/*----------------------------------------------------------------*/

		function gvc_pricing_table($atts, $content = null, $tag) {

			extract(shortcode_atts(
				array(
					'columns'    => '1',
					'align'      => 'center'
				), $atts)
			);

			global $gvc_opt, $gvc_def;

			$output = '';

			static $id_counter = 1;

			if(!is_numeric($columns) || empty($columns) || $columns < 0 || $columns == $gvc_def[8]) {$columns = 1;}
			if ($columns > 5) {$columns = 5;}

			if(empty($align) || !in_array($align, $gvc_opt[7]) || $align == $gvc_def[9]){$align = 'center';}

			$output .= '<div id="pt-'.$id_counter.'" class="pt child-element-shortcode gvc-clearfix '.$align.' columns-'.$columns.'">';

			$output .= do_shortcode($content);
			$output .= '</div>';

			$id_counter++;

			return $output;
		}

		add_shortcode('pt', 'gvc_pricing_table');

	/*----------------------------------------------------------------*/
	/*  Pricing table column
	/*----------------------------------------------------------------*/

		function gvc_pt_column($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'highlight'   	   => '',
					'color'   	       => '',
					'price'            => '',
					'tariff'           => '',
					'title'            => '',
					'button_text'      => '',
					'href'             => '',
					'target'           => '_self',
				), $atts)
			);

			global $gvc_opt, $gvc_def;

			$output = '';
			$pt_price = '';
			$pt_footer = '';
			$styles ="";

			if(empty($highlight) || !in_array($highlight, $gvc_opt[2]) || $highlight == $gvc_def[1]){$highlight = 'no';}		
			if(empty($target) || !in_array($target, $gvc_opt[1]) || $target == $gvc_def[2]) {$target = "_self";}

			if(isset($color) && !empty($color)) {
				$styles .= 'background-color:'.$color.';';
			}

			// Pricing table price
			$pt_price .= '<div class="pt-price-wrap">';
				if(isset($title)){
					$pt_price .= '<div class="pt-column-title" style="'.$styles.'">'.$title.'</div>';
				}
				$pt_price .= "<div class='price-attr'>";
					if(isset($price)){
						$pt_price .= '<span class="pt-price">'.$price.'</span>';
					}
					if(isset($tariff)) {
						$pt_price .= '<span class="pt-tariff">'.$tariff.'</span>';
					}
				$pt_price .= '</div>';
			$pt_price .= '</div>';


			// Pricing table footer
			$pt_footer .= '<div class="pt-footer">';
				$pt_footer .= '<a class="button medium" style="'.((isset($color) && !empty($color)) ? 'background-color:'.$color.';' : "").'" href="'.$href.'" target="'.$target.'">'.$button_text.'</a>';
			$pt_footer .= '</div>';

			$output .= '<div class="pt-column highlight-'.$highlight.'">';
			$output .= '<div class="ci-wrap">';
				$output .= $pt_price;
				$output .= do_shortcode($content);
				$output .= $pt_footer;
			$output .= '</div>';
			$output .= '</div>';

			return $output;
		}

		add_shortcode('pt_column', 'gvc_pt_column');

	/*----------------------------------------------------------------*/
	/*  Pricing table row
	/*----------------------------------------------------------------*/
		function gvc_pt_row($atts, $content = null) {

			$output = '<div class="pt-row">'.do_shortcode($content).'</div>';
			return $output;
		}
		add_shortcode('pt_row', 'gvc_pt_row');

/*====================================================================*/
/*  PROGRESS-BAR SHORTCODE == (WITH SELF CHILDREN EL.)
/*====================================================================*/
	
	function gvc_progress($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'percentage'  => '',
				'bar_color'   => '',
				'track_color' => '',
				'color'       => '',
				'gap'         => '20',
				'title'       => ''
			), $atts)
		);

		$output = '';
		$track_styles = '';
		$color_styles = '';
		$bar_styles = '';

		if(!is_numeric($percentage) || $percentage < 0){$percentage = "";} 
		elseif ($percentage > 100) {$percentage = "100";}

		if(!is_numeric($gap) || $gap < 0){$gap = "20";}

		if(isset($bar_color) && !empty($bar_color)) {
			$bar_styles .= 'background-color:'.$bar_color.';';
		}

		if(isset($track_color) && !empty($track_color)) {
			$track_styles .= 'background-color:'.$track_color.';';
		}

		if(isset($color) && !empty($color)) {
			$color_styles .= 'style="color:'.$color.';"';
		}

		$output .= '<div class="progress-bar">';

			if(isset($title)){
				$output .= '<span class="progress-title"'.$color_styles.'>'.$title.'</span>';
			}

			$output .='<div style="'.$track_styles.' margin-bottom:'.$gap.'px" class="progress-bar-line-wrap"><div class="progress-bar-line" data-percentage="'.$percentage.'" style="'.$bar_styles.' width:0px;"><span class="progress-percent">'.$percentage.'%</span></div></div>';

		$output .= '</div>';

		return $output;
	}

	add_shortcode('progress', 'gvc_progress');


	function gvc_progress_container($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'textured' => 'no'
			), $atts)
		);

		global $gvc_opt, $gvc_def;

		$output = "";

		static $id_counter = 1;

		if(empty($textured) || !in_array($textured, $gvc_opt[2]) || $textured == $gvc_def[1]) {$textured = "no";}

		$id_counter++;

		$output = '<div id="progress-bar-'.$id_counter.'" class="progress-container child-element-shortcode gvc-clearfix textured-'.$textured.'">'.do_shortcode($content).'</div>';
		
		return $output;
	}

	add_shortcode('progress_container', 'gvc_progress_container');

/*====================================================================*/
/*  PROGRESS-CIRCLE SHORTCODE == (WITH SELF CHILDREN EL.)
/*====================================================================*/
	
	function gvc_circle_progress($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'percentage'  => '',
				'bar_color'   => '',
				'track_color' => '',
				'color'       => '',
				'title'       => ''
			), $atts)
		);

		global $gvc_temp_color, $gvc_opt, $gvc_def;

		$output = '';
		$color_styles = '';
		$data_attr = '';

		if(empty($size) || !in_array($size, $gvc_opt[0]) || $size == $gvc_def[0]) {$size = "small";}

		if(!is_numeric($percentage) || $percentage < 0){$percentage = "";} 
		elseif ($percentage > 100) {$percentage = "100";}


		if(isset($bar_color) && !empty($bar_color)) {
			$data_attr .= 'data-bar="'.$bar_color.'"';
		} else {
			$data_attr .= 'data-bar="'.$gvc_temp_color.'"';
		}

		if(isset($track_color) && !empty($track_color)) {
			$data_attr .= 'data-track="'.$track_color.'"';
		}

		if(isset($color) && !empty($color)) {
			$color_styles .= 'style="color:'.$color.';"';
		}

		$output .= '<div class="circle-counter-wrap"><div class="circle-counter" '.$data_attr.' data-percent="'.$percentage.'"><span class="circle-counter-title"'.$color_styles.'>'.$title.'</span></div></div>';
		return $output;
	}

	add_shortcode('circle_progress', 'gvc_circle_progress');


	function gvc_circle_container($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'align'    => 'center'
			), $atts)
		);

		global $gvc_opt, $gvc_def;

		$output = "";

		static $id_counter = 1;

		if(empty($align) || !in_array($align, $gvc_opt[16]) || $align == $gvc_def[22]) {$align = "center";}

		$id_counter++;

		$output = '<div id="circle-progress-container-'.$id_counter.'" class="child-element-shortcode progress-container gvc-clearfix '.$align.'">'.do_shortcode($content).'</div>';
		
		return $output;
	}

	add_shortcode('circle_progress_container', 'gvc_circle_container');

/*====================================================================*/
/*  COUNTER SHORTCODE == (WITH SELF CHILDREN EL.)
/*====================================================================*/
	
	function gvc_counter($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'value'           => '',
				'title'           => '',
				'color'           => '',
				'icon'            => '',
				'icon_color'      => '',
			), $atts)
		);

		global $gvc_opt, $gvc_def;
		$output = '';
		$styles = '';
		$icon_styles = '';

		if(!is_numeric($value) || $value < 0){$value = "";}

		if($icon == $gvc_def[3]){$icon = '';}

		if(isset($color) && !empty($color)) {
			$styles .= 'color:'.$color.';';
		}

        $output .= '<div class="counter" data-value="'.$value.'" style="'.$styles.'">';

        		if(isset($icon) && !empty($icon)){

        			if(isset($icon_color) && !empty($icon_color)) {
						$icon_styles .= 'color:'.$icon_color.';';
					}

					$output .='<i class="fa fa-'.$icon.'" style="'.$icon_styles.'"></i>';
				}
			
				if(isset($value)){
					$output .= '<span class="counter-value">0</span>';
				}
				if(isset($title)){
					$output .= '<span class="counter-title">'.$title.'</span>';
				}
			
		$output .= '</div>';

		return $output;
	}

	add_shortcode('counter', 'gvc_counter');

	function gvc_counter_container($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'align' => 'center'
			), $atts)
		);

		global $gvc_opt, $gvc_def;

		static $id_counter = 1;

		$output = "";

		if(empty($align) || !in_array($align, $gvc_opt[16]) || $align == $gvc_def[22]) {$align = "center";}

		$output = '<div id="counter-container-'.$id_counter.'" class="child-element-shortcode counter-container gvc-clearfix '.$align.'">'.do_shortcode($content).'</div>';

		$id_counter++;

		return $output;
	}

	add_shortcode('counter_container', 'gvc_counter_container');

/*====================================================================*/
/*  GALLERY SHORTCODE == (WITH SELF CHILDREN EL.)
/*====================================================================*/
	
	remove_shortcode('gallery', 'gallery_shortcode');
	add_shortcode('gallery', 'gvc_gallery_shortcode');

	function gvc_gallery_shortcode($attr) {

		$post = get_post();

		static $instance = 0;
		$instance++;

		if ( ! empty( $attr['ids'] ) ) {
			// 'ids' is explicitly ordered, unless you specify otherwise.
			if ( empty( $attr['orderby'] ) )
				$attr['orderby'] = 'post__in';
			$attr['include'] = $attr['ids'];
		}

		// Allow plugins/themes to override the default gallery template.
		$output = apply_filters('post_gallery', '', $attr);
		if ( $output != '' )
			return $output;

		// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
		if ( isset( $attr['orderby'] ) ) {
			$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
			if ( !$attr['orderby'] )
				unset( $attr['orderby'] );
		}

		extract(shortcode_atts(array(
			'order'      => 'ASC',
			'orderby'    => 'menu_order ID',
			'id'         => $post ? $post->ID : 0,
			'itemtag'    => 'dl',
			'icontag'    => 'dt',
			'captiontag' => 'dd',
			'columns'    => 3,
			'size'       => 'gvc-Half',
			'include'    => '',
			'exclude'    => '',
			'link'       => ''
		), $attr, 'gallery'));


		if ($size == "medium" || $size == "thumbnail") {
			$size = 'gvc-Half';
		} elseif ($size == "large") {
			$size = 'gvc-Whole';
		}

		if ($columns == '3' || $columns == '2' || $columns == '4') {
			$size = 'gvc-Half';
		} elseif ($columns == '1') {
			$size = 'gvc-Whole';
		}

		$id = intval($id);
		if ( 'RAND' == $order )
			$orderby = 'none';

		if ( !empty($include) ) {
			$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

			$attachments = array();
			foreach ( $_attachments as $key => $val ) {
				$attachments[$val->ID] = $_attachments[$key];
			}
		} elseif ( !empty($exclude) ) {
			$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		} else {
			$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		}

		if ( empty($attachments) )
			return '';

		if ( is_feed() ) {
			$output = "\n";
			foreach ( $attachments as $att_id => $attachment )
				$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
			return $output;
		}

		$itemtag = tag_escape($itemtag);
		$captiontag = tag_escape($captiontag);
		$icontag = tag_escape($icontag);

		$columns = intval($columns);
		$selector = "gallery-{$instance}";
		
		$size_class = sanitize_html_class( $size );

		$output = "<div id='$selector' class='gvc-gallery child-element-shortcode galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";

			$i = 0;
			foreach ( $attachments as $id => $attachment ) {
				if ( ! empty( $link ) && 'file' === $link )
					$image_output = wp_get_attachment_link( $id, $size, false, false );
				elseif ( ! empty( $link ) && 'none' === $link )
					$image_output = wp_get_attachment_image( $id, $size, false );
				else
					$image_output = wp_get_attachment_link( $id, $size, true, false );

				$image_meta  = wp_get_attachment_metadata( $id );

				$orientation = '';
				if ( isset( $image_meta['height'], $image_meta['width'] ) )
					$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';

				$output .= "<div class='gallery-item'>";

				$output .= "
					<div class='gallery-icon {$orientation}'>
						$image_output
					</div>";

					$output .= "
						<div class='wp-caption-text gallery-caption'>
						" . wptexturize($attachment->post_excerpt) . "
						</div>";

				$output .= "</div>";
			}

		$output .= "</div>\n";

		return $output;
	}

/*====================================================================*/
/*  CONTENTBOX SHORTCODE == (WITH SELF CHILDREN EL.)
/*====================================================================*/
	
	/*----------------------------------------------------------------*/
	/*  Contentbox container
	/*----------------------------------------------------------------*/
	
		function gvc_box_container($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'columns' => '3',
					'version' => 'v1',
					'animate' => 'yes'
				), $atts)
			);

			global $gvc_def, $gvc_opt;
			$output = '';

			static $id_counter = 1;

			if(!is_numeric($columns) || empty($columns) || $columns < 0 || $columns == $gvc_def[19]) {$columns = 3;}
			if ($columns > 4) {$columns = 4;}

			if(empty($version) || !in_array($version, $gvc_opt[17]) || $version == $gvc_def[23]){
				$version = "v1";
			}

			if(empty($animate) || !in_array($animate, $gvc_opt[2]) || $animate == $gvc_def[1]){$animate = 'no';}

			$output .= '<div id="content-box-'.$id_counter.'" class="child-element-shortcode content-box '.$version.' animate-'.$animate.' gvc-clearfix columns-'.$columns.'">';
				$output .= do_shortcode($content);
			$output .= '</div>';

			$id_counter++;

			return $output;
		}

		add_shortcode('box_container', 'gvc_box_container');

	/*----------------------------------------------------------------*/
	/*  Contentbox box
	/*----------------------------------------------------------------*/

		function gvc_box($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'title'           => '',
					'icon'       	  => '',
					'icon_color' 	  => '',
					'icon_back_color' => '',
					'link'            => '',
					'link_text'       => ''
				), $atts)
			);

			global $gvc_opt, $gvc_def;
			$output  = '';

			static $id_counter = 1;

			if($icon == $gvc_def[3]){$icon = '';}

			$output .= '<div id="box-'.$id_counter.'" class="box">';

				$output .='<style scoped>';
					if(isset($icon_back_color) && !empty($icon_back_color)){
						$output .= '#box-'.$id_counter.' .icon-wrap {background-color:'.$icon_back_color.';}';
						$output .= '.content-box.v1 #box-'.$id_counter.':hover {background-color:'.$icon_back_color.';}';
						$output .= '.content-box.v1 #box-'.$id_counter.':hover .icon-wrap i {color:'.$icon_back_color.'!important;}';
						$output .= '.content-box #box-'.$id_counter.' .icon-wrap-border {border-color:'.gvc_hex_to_rgba($icon_back_color, 0.7).';}';
					}
					if(isset($icon_color) && !empty($icon_color)){
						$output .= '#box-'.$id_counter.' .icon-wrap i {color:'.$icon_color.';}';
					}
				$output .='</style>';

				if(isset($icon) && !empty($icon)){

					$output .= '<div class="icon-container">';
						$output .= '<div class="icon-wrap-border">';
							$output .= '<div class="icon-wrap">';
								$output .='<i class="fa fa-'.$icon.'"></i>';
							$output .='</div>';
						$output .='</div>';
					$output .='</div>';
				}

				$output .= "<div class='box-text'>";

					if(isset($title) && !empty($title)) {
						$output .= '<h4 class="box-title">'.$title.'</h4>';
					}

					$output .= '<p class="box-content">'.do_shortcode($content).'</p>';

					if(isset($link) && !empty($link)) {
						$output .= '<a href="'.$link.'" class="button small box-read-more">';
							if(isset($link_text) && !empty($link_text)) {
								$output .= $link_text;
								$output .= '<i class="fa fa-angle-right"></i>';
							}
						$output .= '</a>';
					}
					
				$output .= '</div>';

			$output .= '</div>';

			$id_counter++;

			return $output;
		}

		add_shortcode('box', 'gvc_box');


/*====================================================================*/
/*  CLIENT SHORTCODE == (WITH SELF CHILDREN EL.)
/*====================================================================*/
	
	/*----------------------------------------------------------------*/
	/*  Clients container
	/*----------------------------------------------------------------*/

		function gvc_clients($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'columns'               => '3',
					'autoplay'              => 'no',
					'carousel'              => 'no'
				), $atts)
			);

			global $gvc_opt, $gvc_def;
			$output = "";

			static $id_counter = 1;

			if(empty($autoplay) || !in_array($autoplay, $gvc_opt[2]) || $autoplay == $gvc_def[1]){$autoplay = 'no';}

			if(!is_numeric($columns) || empty($columns) || $columns < 0 || $columns == $gvc_def[22]) {$columns = 3;}
			if ($columns > 6) {$columns = 6;}

			if(empty($carousel) || !in_array($carousel, $gvc_opt[2]) || $carousel == $gvc_def[1]){
				$carousel = 'no';
			}

			$output .= '<div id="clients-'.$id_counter.'" class="ca-container gvc-clearfix autoplay-'.$autoplay.' carousel-'.$carousel.'">';

				if ($carousel == "yes") {
					$output .= '<div class="ca-controls hidden gvc-clearfix">';
						$output .= '<span class="ca-nav-prev">'.__("Previous", TEMP_NAME).'</span><span class="ca-nav-next">'.__("Next", TEMP_NAME).'</span>';
					$output .= '</div>';
				}

				$output .= '<div class="carousel-container-wrapper">';
					$output .= '<div class="clients-container ca-wrapper gvc-clearfix  columns columns-'.$columns.'">';
						$output .= do_shortcode($content);
					$output .= '</div>';
				$output .= '</div>';

			$output .= '</div>';

			$id_counter++;
			return $output;
		}
		add_shortcode('clients', 'gvc_clients');

	/*----------------------------------------------------------------*/
	/*  Clients
	/*----------------------------------------------------------------*/

		function gvc_client($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'href'   => '',
					'target' => '_self',
					'src'    => '',
					'name' 	 => ''
				), $atts)
			);

			global $gvc_opt, $gvc_def;
			$output = '';

			if(empty($target) || !in_array($target, $gvc_opt[1]) || $target == $gvc_def[2]) {
				$target = "_self";
			}

			if($href == $gvc_def[14]){$href = '';}
			if($src == $gvc_def[15]){$src = '';}

			$output .= '<article class="ca-item" title="'.$name.'">';
				$output .= "<div class='client'>";
					if(isset($href) && !empty($href)){
						$output .= '<a href="'.$href.'" title="'.$name.'" target="'.$target.'">';
					}
					if(isset($src) && !empty($src)){
						// Visual composer is active
						if (filter_var($src, FILTER_VALIDATE_URL) == false) {
							$image_attributes = wp_get_attachment_image_src($src, 'full');
							$src = $image_attributes[0];
					    }
						$output .= '<img src="'.$src.'" alt="'.$name.'" title="'.$name.'" />';
					} else {
						if(isset($name) && !empty($name)){
							$output .= '<span class="client-name">'.$name.'</span>';
						}
					}
					if(isset($href) && !empty($href)){	
						$output .= '</a>';
					}
				$output .= "</div>";
			$output .= '</article>';
			return $output;
		}
		add_shortcode('client', 'gvc_client');

/*====================================================================*/
/*  TESTIMONIAL SHORTCODE == (WITH SELF CHILDREN EL.)
/*====================================================================*/
	
	/*----------------------------------------------------------------*/
	/*  Testimonial container
	/*----------------------------------------------------------------*/

		function gvc_testimonials($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'color'=>''
				), $atts)
			);

			static $id_counter = 1;

			$output = "";
			$styles = "";

			if (isset($color) && !empty($color)) {
				$output .= '<style scoped> #testimonials-'.$id_counter.' .flex-control-paging li a {background-color:'.$color.';} #testimonials-'.$id_counter.' .flex-control-paging li a.flex-active {border-color:'.$color.';} </style>';
			} else {
				$color = "inherit";
			}
			static $id_counter = 1;
			$output .= '<div id="testimonials-'.$id_counter.'" class="child-element-shortcode testimonials control-nav-enabled flexslider" style="color:'.$color.';">';
				$output .= '<ul class="slides">';
					$output .= do_shortcode($content);
				$output .= '</ul>';
			$output .= '</div>';

			$id_counter++;

			return $output;
		}
		add_shortcode('testimonials', 'gvc_testimonials');

	/*----------------------------------------------------------------*/
	/*  Testimonial
	/*----------------------------------------------------------------*/

		function gvc_testimonial($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'name'     => '',
					'company'  => ''
				), $atts)
			);

			global $gvc_opt, $gvc_def;
			$output = '';
			$fill = '';

			$output .= '<li>';
					$output .= '<span class="symbol">&#8243;</span>';
					$output .= '<blockquote>';
						$output .= do_shortcode(''.$content.'');
					$output .= '</blockquote>';

					$output .='<div class="client-meta">';

						if(isset($name) && !empty($name)){
							$output .= '<span class="client-name">- '.$name.'</span>';
						}

						if(isset($company) && !empty($company)){
							$output .= '<span class="at">,&nbsp;</span>';
							$output .= '<span class="client-company">'.$company.'</span>';
						}

					$output .= '</div>';
						
			$output .= '</li>';

			return $output;
		}
		add_shortcode('testimonial', 'gvc_testimonial');

/*====================================================================*/
/*  PERSON SHORTCODE == (WITH SELF CHILDREN EL.)
/*====================================================================*/
	
	/*----------------------------------------------------------------*/
	/*  Persons container
	/*----------------------------------------------------------------*/

		function gvc_persons($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'columns'  => '3',
					'animate'  => 'yes'
				), $atts)
			);

			global $gvc_opt, $gvc_def;
			$output = "";

			static $id_counter = 1;

			if(!is_numeric($columns) || empty($columns) || $columns < 0 || $columns == $gvc_def[19]) {$columns = 3;}
			if ($columns > 4) {$columns = 4;}

			if(empty($carousel) || !in_array($carousel, $gvc_opt[2]) || $carousel == $gvc_def[1]){
				$carousel = 'no';
			}

			if(empty($animate) || !in_array($animate, $gvc_opt[2]) || $animate == $gvc_def[1]){$animate = 'no';}

			$output .= '<div id="persons-'.$id_counter.'" class="child-element-shortcode ca-container gvc-clearfix carousel-no">';
				$output .= '<div class="carousel-container-wrapper">';
					$output .= '<div class="persons-container ca-wrapper gvc-clearfix  columns animate-'.$animate.' columns-'.$columns.'">';
					$output .= do_shortcode($content);
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';

			$id_counter++;

			return $output;
		}
		add_shortcode('persons', 'gvc_persons');

	/*----------------------------------------------------------------*/
	/*  Persons
	/*----------------------------------------------------------------*/

		function gvc_person($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'target'       => '_self',
					'src'          => '',
					'name'         => '',
					'title'        => '',
					'twitter'      => '',
					'facebook'     => '',
					'linkedin'     => '',
					'google_plus'  => '',
					'email'        => '',
					'bio'          => ''
				), $atts)
			);

			global $gvc_opt, $gvc_def, $gvc;
			$output = '';

			if(empty($target) || !in_array($target, $gvc_opt[1]) || $target == $gvc_def[2]) {$target = "_self";}
			if($src == $gvc_def[17]){$src = '';}

			$output .= '<article class="ca-item">';

				$output .= '<div class="person '.(empty($src) ? 'no-image' : 'with-image').'">';
				
					if(isset($src) && !empty($src)){
						// Visual composer is active
						if (filter_var($src, FILTER_VALIDATE_URL) == false) {
							$image_attributes = wp_get_attachment_image_src($src, 'full');
							$src = $image_attributes[0];
					    }
						$output .= '<div class="person-image-wrap">';
							$output .='<img class="person-image" src="'. $src.'" alt="'. $name.'" title="'. $title.'" />';
							$output .= '<div class="gvc-overlay with-content">';
								$output .= '<div class="gvc-overlay-content">';
									$output .= '<div class="social-links gvc-clearfix center">';

										foreach($atts as $social => $href) {

											if($href && $social != 'target' && $social != 'src' && $social != 'name' && $social != 'title' && $social != 'bio') {
												if($social == "email"){
													$output .='<a class="email" href="'.$href.'" title="email" target="'.$target.'"><i class="fa fa-envelope"></i></a>';
												}elseif ($social == "google_plus") {
													$output .='<a class="google-plus" href="'.$href.'" title="google-plus" target="'.$target.'"><i class="fa fa-google-plus"></i></a>';
												}
												else {
													$output .='<a class="'.$social.'" href="'.$href.'" title="'.$social.'" target="'.$target.'"><i class="fa fa-'.$social.'"></i></a>';
												}
											}

										}
									$output .= '</div>';
								$output .= '</div>';
							$output .= '</div>';
						$output .= '</div>';
					}
					
					$output .= '<div class="person-meta">';

						if(isset($name) && !empty($name)){
							$output .= '<h3 class="person-name">'.$name.'</h3>';
						}
						if(isset($title) && !empty($title)){
							$output .= '<div class="person-title">'.$title.'</div>';
						}
						if(isset($bio) && !empty($bio)){
							$output .= '<div class="person-bio">'.$bio.'</div>';
						}

					$output .= '</div>';

				$output .= '</div>';

			$output .= '</article>';

			return $output;
		}
		add_shortcode('person', 'gvc_person');

/*====================================================================*/
/*  CAROUSEL SHORTCODE == (WITH SELF CHILDREN EL.)
/*====================================================================*/
	
	/*----------------------------------------------------------------*/
	/*  Carousel
	/*----------------------------------------------------------------*/

		function gvc_carousel($atts, $content = null) {

			extract(shortcode_atts(
				array(
					'columns'  => '3',
					'autoplay' => 'no'
				), $atts)
			);

			global $gvc_def, $gvc_opt;

			static $id_counter = 1;

			$output = "";

			if(empty($autoplay) || !in_array($autoplay, $gvc_opt[2]) || $autoplay == $gvc_def[1]){$autoplay = 'no';}
			
			if(!is_numeric($columns) || empty($columns) || $columns < 0 || $columns == $gvc_def[22]) {$columns = 3;}
			if ($columns > 6) {$columns = 6;}

			$output .= '<div id="gvc-carousel-'.$id_counter.'" class="child-element-shortcode gvc-carousel ca-container gvc-clearfix autoplay-'.$autoplay.' carousel-yes">';

				$output .= '<div class="ca-controls hidden gvc-clearfix">';
					$output .= '<span class="ca-nav-prev">'.__("Previous", TEMP_NAME).'</span><span class="ca-nav-next">'.__("Next", TEMP_NAME).'</span>';
				$output .= '</div>';
				$output .= '<div class="carousel-container-wrapper">';
					$output .= '<div class="carousel-container ca-wrapper gvc-clearfix  columns columns-'.$columns.'">';
						$output .= do_shortcode($content);
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';

			$id_counter++;

			return $output;
		}
		add_shortcode('carousel', 'gvc_carousel');

	/*----------------------------------------------------------------*/
	/*  Item
	/*----------------------------------------------------------------*/

		function gvc_item($atts, $content = null) {

			$output = '';

			$output .= '<div class="ca-item carousel-item">'.do_shortcode($content).'</div>';

			return $output;
		}
		add_shortcode('item', 'gvc_item');

/*====================================================================*/
/*  RECENT POSTS SHORTCODE == (WITH SELF CHILDREN EL.)
/*====================================================================*/

	function gvc_recent_posts($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'posts_number' => '3',
				'limit'        => '150',
				'color'        => '',
				'version'      => 'v1',
				'columns'      => '3'
			), $atts)
		);

		global $gvc_opt, $gvc_def, $post;
		$output         = "";
		$gvc_grid = "grid_4";
		$size           = 'gvc-Half';

		static $id_counter = 1;

		if(!is_numeric($limit) || !isset($limit) || empty($limit) || $limit < 0) {
			$limit = 500;
		}

		if(!is_numeric($posts_number) || !isset($posts_number) || empty($posts_number) || $posts_number < 0) {
			$posts_number = 3;
		}

		if(!is_numeric($columns) || empty($columns) || $columns < 0 || $columns == $gvc_def[19]) {$columns = 3;}
		if ($columns > 4) {$columns = 4;}

		if(empty($version) || !in_array($version, $gvc_opt[17]) || $version == $gvc_def[23]){
			$version = "v1";
		}

		

		if ($columns == "1") {
			$size = 'gvc-Whole';
		}

		switch ($columns) {
			case '1':
				$gvc_grid   = "grid_1";
				break;
			case '2':
				$gvc_grid   = "grid_2";
				break;
			case '3':
				$gvc_grid   = "grid_3";
				break;
			case '4':
				$gvc_grid   = "grid_4";
				break;
			
			default:
				$gvc_grid   = "grid_3";
				break;
		}

		$recent_posts = new WP_Query(array( 'orderby' => 'date', 'posts_per_page' => $posts_number));

			if($recent_posts->have_posts()){

				if ($version == 'v1') {

					if (isset($color) && !empty($color)) {
						$output .= '<style scoped>#recent-posts-'.$id_counter.' .flex-control-paging li a {background-color:'.$color.';} #recent-posts-'.$id_counter.' .flex-control-paging li a.flex-active {border-color:'.$color.';}</style>';
					} else {
						$color = "inherit";
					}
					$output .= '<div id="recent-posts-'.$id_counter.'" class="child-element-shortcode recent-posts flexslider control-nav-enabled '.$version.'" style="color:'.$color.';">';
						$output .= '<ul class="slides">';
							while($recent_posts->have_posts()) : $recent_posts->the_post();

								$output .= '<li class="post gvc-clearfix ca-item">';

										if ( '' != get_the_title() ){
											$output .= '<h2 class="post-title">';
												$output .='<a href="'.get_permalink().'" title="'.__("Read more about", TEMP_NAME).' '.get_the_title().'" rel="bookmark">';
													$output .= get_the_title();
												$output .='</a>';
											$output .='</h2>';
										}

										$output .= '<div class="post-date">'.get_the_date().'</div>';

										if ( '' != get_the_content() ) {
											$output .= '<div class="post-content gvc-clearfix">';
												$output .= gvc_excerpt($limit);
												$output .= '<span class="read-more"> <a href="'. get_permalink($post->ID) . '" title="'.__("Read more about", TEMP_NAME).' '.get_the_title($post->ID).'" >'.__("Read more", TEMP_NAME).'</a></span>';
											$output .= '</div>';
										}

								$output .= '</li>';

							endwhile;
						$output .= '</ul>';
					$output .= '</div>';

				} elseif ($version == 'v2') {

					$output .= '<div id="recent-posts-'.$id_counter.'" class="child-element-shortcode recent-posts gvc-clearfix '.$version.' '.$gvc_grid.'">';
							
						while($recent_posts->have_posts()) : $recent_posts->the_post();

							$output .= '<div class="post format-'.get_post_format().' gvc-clearfix" data-grid="gvc_01">';

								if (has_post_thumbnail()) {

									$output .= '<div class="gvc-thumbnail">';
										
										$output .= get_the_post_thumbnail( $post->ID, $size );
										$output .= '<div class="gvc-overlay">';
											$output .='<a class="gvc-more" href="'.get_permalink().'">&nbsp;</a>';
										$output .='</div>';

									$output .='</div>';

								}


								if (get_post_format() == 'link') {

									$output .= '<div class="post-body">';

										$values = get_post_custom( $post->ID );
										$gvc_post_link_url = isset($values["gvc_post_link_url"][0]) ? $values["gvc_post_link_url"][0] : "";

										if ( '' != get_the_title() ){
											$output .= '<h3 class="post-title">';
												$output .='<a href="'.get_permalink().'" title="'.__("Read more about", TEMP_NAME).' '.get_the_title().'" rel="bookmark">';
													$output .= get_the_title();
												$output .='</a>';
											$output .='</h3>';
										} else {
											$output .= '<h3 class="post-title">';
												$output .='<a href="'.$gvc_post_link_url.'" title="'.__("Read more about", TEMP_NAME).' '.$gvc_post_link_url.'" rel="bookmark">';
													$output .= get_the_title();
												$output .='</a>';
											$output .='</h3>';
										}
										$output .= '<div class="post-date">'.get_the_date().'</div>';
										$output .= '<div class="post-link"><a href="'.$gvc_post_link_url.'" rel="bookmark" title="'.$gvc_post_link_url.'" target="_blank">'.$gvc_post_link_url.'</a></div>';

									$output .= '</div>';

								} else {

									$output .= '<div class="post-body">';

										if ( '' != get_the_title() ){
											$output .= '<h3 class="post-title">';
												$output .='<a href="'.get_permalink().'" title="'.__("Read more about", TEMP_NAME).' '.get_the_title().'" rel="bookmark">';
													$output .= get_the_title();
												$output .='</a>';
											$output .='</h3>';
										}

										if ( '' != get_the_content() ) {
											$output .= '<div class="post-content gvc-clearfix">';
												$output .= gvc_excerpt($limit);
											$output .= '</div>';
										}

									$output .= '</div>';

									$output .= '<div class="post-meta-footer gvc-clearfix">';
										$output .= '<div class="post-date">'.get_the_date().'</div>';
									$output .= '</div>';

								}

							$output .= '</div>';

						endwhile;

					$output .= '</div>';

				}

				$id_counter++;

				return $output;

			} else {

				return gvc_not_found('post');

			}

		wp_reset_postdata();
			
	}

	add_shortcode('recent_posts', 'gvc_recent_posts');

/*====================================================================*/
/*  RECENT PORTFOLIO SHORTCODE == (WITH SELF CHILDREN EL.)
/*====================================================================*/
if ( $gvc_portfolio_yes == 1 ):
	function gvc_recent_portfolio($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'columns'      => '3',
				'posts_number' => '3',
				'version'      => 'v1',
				'animate'      => 'yes',
				'category'     => ''
			), $atts)
		);

		global $gvc_opt, $gvc_def, $post;
		$output = "";
		$gvc_grid   = "grid_4";
		$size          = 'gvc-Half';
		$version_class = "";

		if ($version == "v2") {
			$version_class = "image-grid";
		}

		if ($columns == "1") {
			$size          = 'gvc-Whole';
		}

		switch ($columns) {
			case '1':
				$gvc_grid   = "grid_1";
				break;
			case '2':
				$gvc_grid   = "grid_2";
				break;
			case '3':
				$gvc_grid   = "grid_3";
				break;
			case '4':
				$gvc_grid   = "grid_4";
				break;
			
			default:
				$gvc_grid   = "grid_3";
				break;
		}

		static $id_counter = 1;

		if(!is_numeric($columns) || empty($columns) || $columns < 0 || $columns == $gvc_def[19]) {$columns = 3;}
		if ($columns > 4) {$columns = 4;}

		if(empty($version) || !in_array($version, $gvc_opt[5]) || $version == $gvc_def[6]){
			$version = "v1";
		}

		if(!is_numeric($posts_number) || !isset($posts_number) || empty($posts_number) || $posts_number < 0) {
			$posts_number = 3;
		}

		if(empty($animate) || !in_array($animate, $gvc_opt[2]) || $animate == $gvc_def[1]){$animate = 'no';}

		$recent_query_opt = array( 
			'orderby' => 'date', 
			'post_type' => 'portfolio', 
			'posts_per_page' => $posts_number
		);

		if (isset($category) && !empty($category)) {
			$recent_query_opt = array( 
				'orderby' => 'date', 
				'post_type' => 'portfolio', 
				'posts_per_page' => $posts_number,
				'portfolio-category' => $category
			);
		}

		$recent_portfolio = new WP_Query($recent_query_opt);

			if($recent_portfolio->have_posts()){

					$output .= '<div id="recent-portfolio-'.$id_counter.'" class="child-element-shortcode recent-portfolio '.$version.' '.$version_class.' animate-'.$animate.' gvc-clearfix '.$gvc_grid.'">';

						while($recent_portfolio->have_posts()) : $recent_portfolio->the_post();

							$output .= '<div class="post gvc-clearfix" data-grid="gvc_01">';

								$output .= '<div class="gvc-thumbnail">';
									
									if (has_post_thumbnail()) {

										$output .= get_the_post_thumbnail( $post->ID, $size );
									}
									
									if ($version == "v3" || $version == "v2") {
										$output .= '<div class="gvc-overlay with-content">';
											$output .= '<div class="gvc-overlay-content">';

												if ( '' != get_the_title() ){
													$output .= '<h3 class="post-title">';
														$output .='<a href="'.get_permalink().'" rel="bookmark" title="'.
														get_the_title().'">';
															$output .= get_the_title();
														$output .='</a>';
													$output .='</h3>';
												}

												if('' != get_the_term_list($post->ID, 'project-category')){
													$output .= '<div class="project-category">'.get_the_term_list( $post->ID, 'portfolio-category', '', '<span class="comma">, </span>', '' ).'</div>';
												}
											
											$output .='</div>';
											$output .= '<a class="dark-gvc-more" href="'.get_permalink().'" title="'.
														get_the_title().'">&nbsp;</a>';
										$output .='</div>';

									} else {
										$output .= '<div class="gvc-overlay">';
											$output .='<a class="gvc-more" href="'.get_permalink().'" title="'.
														get_the_title().'">&nbsp;</a>';
										$output .='</div>';
									}
									

								$output .='</div>';

								if ($version == 'v1') {

									$output .='<div class="post-body">';

										if ( '' != get_the_title() ){
											$output .= '<h3 class="post-title">';
												$output .='<a href="'.get_permalink().'" rel="bookmark" title="'.
														get_the_title().'">';
													$output .= get_the_title();
												$output .='</a>';
											$output .='</h3>';
										}

										if('' != get_the_term_list($post->ID, 'project-category')){
											$output .= '<div class="project-category">'.get_the_term_list( $post->ID, 'portfolio-category', '', '<span class="comma">, </span>', '' ).'</div>';
										}
											
									$output .='</div>';
								}
								

							$output .='</div>';

						endwhile;

					$output .= '</div>';

				$id_counter++;

				return $output;

			} else {
				return gvc_not_found('portfolio');
			}

		wp_reset_postdata();
	}

	add_shortcode('recent_portfolio', 'gvc_recent_portfolio');
endif;
/*====================================================================*/
/*  DROPDOWN LIST OF FONT SIZE
/*====================================================================*/

	function gvc_mce_buttons_2( $buttons ) {
		array_unshift( $buttons, 'styleselect' );
		return $buttons;
	}

	add_filter('mce_buttons_2', 'gvc_mce_buttons_2');

	function font_weight_styles( $settings ) {

	    $style_formats = array(
	    	array(
	        	'title'   => 'Text font-weight Light',
	        	'inline'  => 'span',
	        	'styles'  => array('fontWeight' => '300')
	        ),
	    	array(
	        	'title'   => 'Text font-weight Semibold',
	        	'inline'  => 'span',
	        	'styles'  => array('fontWeight' => '600')
	        ),
	        array(
	        	'title'   => 'H1 font-weight Light',
	        	'block'  => 'h1',
	        	'styles'  => array('fontWeight' => '300')
	        ),
	        array(
	        	'title'   => 'H1 font-weight Semibold',
	        	'block'  => 'h1',
	        	'styles'  => array('fontWeight' => '600')
	        ),
	        array(
	        	'title'   => 'H2 font-weight Light',
	        	'block'  => 'h2',
	        	'styles'  => array('fontWeight' => '300')
	        ),
	        array(
	        	'title'   => 'H2 font-weight Semibold',
	        	'block'  => 'h2',
	        	'styles'  => array('fontWeight' => '600')
	        ),
	        array(
	        	'title'   => 'H3 font-weight Light',
	        	'block'  => 'h3',
	        	'styles'  => array('fontWeight' => '300')
	        ),
	        array(
	        	'title'   => 'H3 font-weight Semibold',
	        	'block'  => 'h3',
	        	'styles'  => array('fontWeight' => '600')
	        ),
	        array(
	        	'title'   => 'H4 font-weight Light',
	        	'block'  => 'h4',
	        	'styles'  => array('fontWeight' => '300')
	        ),
	        array(
	        	'title'   => 'H4 font-weight Semibold',
	        	'block'  => 'h4',
	        	'styles'  => array('fontWeight' => '600')
	        ),
	        array(
	        	'title'   => 'H5 font-weight Light',
	        	'block'  => 'h5',
	        	'styles'  => array('fontWeight' => '300')
	        ),
	        array(
	        	'title'   => 'H5 font-weight Semibold',
	        	'block'  => 'h5',
	        	'styles'  => array('fontWeight' => '600')
	        ),
	        array(
	        	'title'   => 'H6 font-weight Light',
	        	'block'  => 'h6',
	        	'styles'  => array('fontWeight' => '300')
	        ),
	        array(
	        	'title'   => 'H6 font-weight Semibold',
	        	'block'  => 'h6',
	        	'styles'  => array('fontWeight' => '600')
	        ),
	    );

	    $settings['style_formats'] = json_encode( $style_formats );

	    return $settings;

	}

	add_filter( 'tiny_mce_before_init', 'font_weight_styles' );  

/*====================================================================*/
/*  DROPDOWN LIST OF FONT FAMILY
/*====================================================================*/

	add_filter('mce_buttons_2', 'add_font_selection_to_tinymce');

	function add_font_selection_to_tinymce($buttons) {
		array_unshift($buttons, 'fontselect');
		return $buttons;
	}

/*====================================================================*/
/*  ADD BUTTONS TO TINYMCE
/*====================================================================*/

	add_action('admin_head', 'gvc_add_tinymce_button');

	function gvc_register_tinymce_plugins($buttons) {  
		array_push(
			$buttons,
			'youtube',
			'vimeo',
			'soundcloud',
			'gvc_button',
			'dropcap',
			'icon_list',
			'font_size',
			'splitter',
			'line',
			'gap',
			'highlight',
			'one_half',
		    'one_third',
		    'one_quarter',
		    'two_thirds',
		    'three_quarters',
		    'colorbox',
		    'box_container',
		    'tagline',
		    'widebox',
		    'fullbox',
		    'animated_widebox',
		    'section_slider',
		    'tabs',
			'accordion',
		    'clients',
			'testimonials',
			'persons',
			'recent_posts',
			'recent_portfolio',
			'carousel',
			'media_slider',
			'gmap',
			'pt',
		    'table',
		    'alert',
			'social_links',
			'icons',
			'code',
			'show_hide',
		    'registered_only',
		    'progress',
		    'circle_progress',
		    'counter',
		    'icon_progress'
		);  
		return $buttons;  
	}

	function old_tinymce_register_tinymce_plugins($buttons) {  
		array_push(
			$buttons,
			'youtube',
			'vimeo',
			'soundcloud',
			'gvc_button',
			'dropcap',
			'icon_list',
			'font_size',
			'splitter',
			'line',
			'gap',
			'highlight',
			'one_half',
		    'one_third',
		    'one_quarter',
		    'two_thirds',
		    'three_quarters',
		    'colorbox',
		    'box_container',
		    'tagline',
		    'widebox',
		    'fullbox',
		    'animated_widebox',
		    'section_slider',
		    'tabs',
			'accordion',
		    'clients',
			'testimonials',
			'persons',
			'recent_posts',
			'recent_portfolio'
		);  
		return $buttons;  
	}

	function old_tinymce_register_tinymce_plugins_2($buttons) {  
		array_push(
			$buttons,
			'carousel',
			'media_slider',
			'gmap',
			'pt',
		    'table',
		    'alert',
			'social_links',
			'icons',
			'code',
			'show_hide',
		    'registered_only',
		    'progress',
		    'circle_progress',
		    'counter',
		    'icon_progress'
		);  
		return $buttons;  
	}

	function gvc_add_tinymce_plugins($plugin_array) {

	   $plugin_array['youtube'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['vimeo'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['soundcloud'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['gvc_button'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['dropcap'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['icon_list'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['one_half'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['one_third'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['one_quarter'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['two_thirds'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['three_quarters'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['font_size'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['box_container'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['box_container_alt'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['tagline'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['splitter'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['line'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['gap'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['highlight'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['widebox'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['fullbox'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['animated_widebox'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['section_slider'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['colorbox'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['slider_colorbox'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['media_slider'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['clients'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['testimonials'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['persons'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['recent_posts'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['recent_portfolio'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['tabs'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['accordion'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['carousel'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['gvc_colorbox'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['gmap'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['progress'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['circle_progress'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['counter'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['icon_progress'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['pt'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['table'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['alert'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['registered_only'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['social_links'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['icons'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['show_hide'] = get_template_directory_uri().'/tinymce/plugins.js';
	   $plugin_array['code'] = get_template_directory_uri().'/tinymce/plugins.js';
	   return $plugin_array;
	}

	function gvc_add_tinymce_button() { 
		global $tinymce_version;
		if(!current_user_can('edit_posts') && !current_user_can('edit_pages') ) {return;}

		if (get_user_option('rich_editing') == 'true') {

			add_filter("mce_external_plugins", "gvc_add_tinymce_plugins");

			if ( version_compare( $tinymce_version, '359-20131026' ) > 0 ) {
				add_filter('mce_buttons_3', 'gvc_register_tinymce_plugins');
			} else {
				add_filter('mce_buttons_3', 'old_tinymce_register_tinymce_plugins');
				add_filter('mce_buttons', 'old_tinymce_register_tinymce_plugins_2');
			}
			
		}
	}
	
?>