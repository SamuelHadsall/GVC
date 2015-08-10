<?php
global $gvc;
$gvc_portfolio_yes         = ($gvc['gvc-portfolio-yes']) ? $gvc['gvc-portfolio-yes'] : 0;

	
    vc_remove_element("vc_button");
	vc_remove_element("vc_posts_slider");
	vc_remove_element("vc_gmaps");
	vc_remove_element("vc_teaser_grid");
	vc_remove_element("vc_progress_bar");
	vc_remove_element("vc_facebook");
	vc_remove_element("vc_tweetmeme");
	vc_remove_element("vc_googleplus");
	vc_remove_element("vc_facebook");
	vc_remove_element("vc_pinterest");
	vc_remove_element("vc_message");
	vc_remove_element("vc_posts_grid");
	vc_remove_element("vc_carousel");
	vc_remove_element("vc_flickr");
	vc_remove_element("vc_tour");
	vc_remove_element("vc_separator");
	vc_remove_element("vc_single_image");
	vc_remove_element("vc_cta_button");
	vc_remove_element("vc_accordion");
	vc_remove_element("vc_accordion_tab");
	vc_remove_element("vc_toggle");
	vc_remove_element("vc_images_carousel");
	vc_remove_element("vc_gallery");
	vc_remove_element("vc_button2");
	vc_remove_element("vc_pie");
	vc_remove_element("vc_cta_button2");
	vc_remove_element("vc_video");
	vc_remove_element("vc_wp_archives");
	vc_remove_element("vc_wp_calendar");
	vc_remove_element("vc_wp_categories");
	vc_remove_element("vc_wp_custommenu");
	vc_remove_element("vc_wp_links");
	vc_remove_element("vc_wp_meta");
	vc_remove_element("vc_wp_pages");
	vc_remove_element("vc_wp_posts");
	vc_remove_element("vc_wp_recentcomments");
	vc_remove_element("vc_wp_rss");
	vc_remove_element("vc_wp_search");
	vc_remove_element("vc_wp_tagcloud");
	vc_remove_element("vc_wp_text");
	vc_remove_element("vc_text_separator");

	/*  TABS                                                   (EXISTING)
	/*-----------------------------------------------------------------*/

		vc_add_param('vc_tabs', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Type",
			"param_name" => "type",
			"value"      => array(
				"Horizontal" => 'horizontal',
				"Vertical"   => 'vertical'
			)
		));

		vc_remove_param("vc_tabs", "el_class");
		vc_remove_param("vc_tabs", "title");
		vc_remove_param("vc_tabs", "interval");

	/*  TEXT COLUMN                                            (EXISTING)
	/*-----------------------------------------------------------------*/

		vc_add_param('vc_column_text', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "ID (optional)",
			"param_name" => "id",
			"value"      => "",
			'description' => 'Give unique ID (Useful if your layout is one-page)',
		));

		vc_add_param('vc_column_text', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Border radius (only integer value, without any string)",
			"param_name" => "border_radius",
			"value"      => ""
		));

		vc_add_param('vc_column_text', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Border width (only integer value, without any string)",
			"param_name" => "border_width",
			"value"      => ""
		));

		vc_add_param('vc_column_text', array(
			"type"       => "colorpicker",
			"class"      => "",
			"heading"    => "Border color",
			"param_name" => "border_color",
			"value"      => ""
		));

		vc_add_param('vc_column_text', array(
			"type"       => "colorpicker",
			"class"      => "",
			"heading"    => "Background color",
			"param_name" => "background_color",
			"value"      => ""
		));

		vc_add_param('vc_column_text', array(
			"type"       => "colorpicker",
			"class"      => "",
			"heading"    => "Text color",
			"param_name" => "color",
			"value"      => ""
		));

		vc_add_param('vc_column_text', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Padding (top, right, bottom, left)",
			"param_name" => "padding",
			"value"      => "0px 0px 0px 0px"
		));

		vc_add_param('vc_column_text', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Animate",
			"param_name" => "animate",
			"value"      => array(
				"No"  => 'no',
				"Yes" => 'yes'
			)
		));

		vc_add_param('vc_column_text', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Animation",
			"param_name" => "animation",
			"value"      => array(
				"None"      => 'none',
				"Fade"      => 'fade',
				"Scale"     => 'scale',
				"Translate" => 'translate'
			),
			"dependency" => Array('element' => "animate", 'value' => 'yes')
		));

		vc_remove_param("vc_column_text", "el_class");
		vc_remove_param("vc_column_text", "css");
		vc_remove_param("vc_column_text", "css_animation");

	/*  COLUMNS                                                (EXISTING)
	/*-----------------------------------------------------------------*/

		vc_add_param('vc_column', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Last column ?",
			"param_name" => "last",
			"value"      => array(
				"No"  => 'no',
				"Yes" => 'yes'
			)
		));	
		
		

	/*  ROW                                                    (EXISTING)
	/*-----------------------------------------------------------------*/

		vc_add_param('vc_row', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Show content to registered users only?",
			"param_name" => "registered_only",
			"value"      => array(
				"No"  => 'no',
				"Yes" => 'yes'
			)
		));

		vc_add_param('vc_row', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Full width layout (100% screen wide)",
			"param_name" => "full_width",
			"value"      => array(
				"No"  => 'no',
				"Yes" => 'yes'
			)
		));

		vc_add_param('vc_row', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "ID (optional)",
			"param_name" => "id",
			"value"      => "",
			'description' => 'Give unique ID (Useful if your layout is one-page)',
		));
		vc_add_param('vc_row', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "CLASS (optional)",
			"param_name" => "class",
			"value"      => "",
			'description' => 'Give a class to use. Use a space for multiple class names',
		));


		vc_add_param('vc_row', array(
			"type"       => "colorpicker",
			"class"      => "",
			"heading"    => "Background color",
			"param_name" => "background_color",
			"value"      => ""
		));

		vc_add_param('vc_row', array(
			"type"       => "attach_image",
			"class"      => "",
			"heading"    => "Background image",
			"param_name" => "background_image",
			"value"      => ""
		));

		vc_add_param('vc_row', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Background repeat",
			"param_name" => "background_repeat",
			"value"      => array(
				"No-repeat" => 'no-repeat',
				"Repeat-x"  => 'repeat-x',
				"Repeat-y"  => 'repeat-y',
				"Repeat"    => 'repeat',
			)
		));

		vc_add_param('vc_row', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Background position",
			"param_name" => "background_position",
			"value"      => array(
				"Left top"      => 'left top',
				"Left bottom"   => 'left bottom',
				"Left center"   => 'left center',
				"Right top"     => 'right top',
				"Right bottom"  => 'right bottom',
				"Right center"  => 'right center',
				"Center center" => 'Center center',
			)
		));

		vc_add_param('vc_row', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Background attachment",
			"param_name" => "background_attachment",
			"value"      => array(
				"Scroll" => 'scroll',
				"Fixed"  => 'fixed'
			)
		));

		vc_add_param('vc_row', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Border size (only integer value, without any string)",
			"param_name" => "border_size",
			"value"      => ""
		));

		vc_add_param('vc_row', array(
			"type"       => "colorpicker",
			"class"      => "",
			"heading"    => "Border color",
			"param_name" => "border_color",
			"value"      => ""
		));

		vc_add_param('vc_row', array(
			"type"       => "colorpicker",
			"class"      => "",
			"heading"    => "Text color",
			"param_name" => "text_color",
			"value"      => ""
		));

		vc_add_param('vc_row', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Padding top (only integer value, without any string)",
			"param_name" => "padding_top",
			"value"      => "20"
		));

		vc_add_param('vc_row', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Padding bottom (only integer value, without any string)",
			"param_name" => "padding_bottom",
			"value"      => "20"
		));

		vc_add_param('vc_row', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Shadow",
			"param_name" => "shadow",
			"value"      => array(
				"No"  => 'no',
				"Yes" => 'yes'
			)
		));

		vc_add_param('vc_row', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Parallax",
			"param_name" => "parallax",
			"value"      => array(
				"No"  => 'no',
				"Yes" => 'yes'
			)
		));

		vc_add_param('vc_row', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Animate the layout?",
			"param_name" => "animate",
			"value"      => array(
				"No"  => 'no',
				"Yes" => 'yes'
			)
		));

		vc_add_param('vc_row', array(
			"type"       => "attach_image",
			"class"      => "",
			"heading"    => "Image to animate",
			"param_name" => "img_src",
			"value"      => "",
			"dependency" => Array('element' => "animate", 'value' => 'yes')
		));

		vc_add_param('vc_row', array(
			"type"       => "textfield",
			"class"      => "",
			"heading"    => "Animated image description (optional)",
			"param_name" => "img_description",
			"value"      => "",
			"dependency" => Array('element' => "animate", 'value' => 'yes')
		));

		vc_add_param('vc_row', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Animated image position",
			"param_name" => "img_position",
			"value"      => array(
				"Left"   => 'left',
				"Right"  => 'right',
				"Top"    => 'top',
				"Bottom" => 'bottom'
			),
			"dependency" => Array('element' => "animate", 'value' => 'yes')
		));

		vc_add_param('vc_row', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Image animation direction",
			"param_name" => "img_animation",
			"value"      => array(
				"Left"   => 'left',
				"Right"  => 'right',
				"Top"    => 'top',
				"Bottom" => 'bottom'
			),
			"dependency" => Array('element' => "animate", 'value' => 'yes')
		));

		vc_add_param('vc_row', array(
			"type"       => "dropdown",
			"class"      => "",
			"heading"    => "Content animation direction",
			"param_name" => "content_animation",
			"value"      => array(
				"Left"   => 'left',
				"Right"  => 'right',
				"Top"    => 'top',
				"Bottom" => 'bottom'
			),
			"dependency" => Array('element' => "animate", 'value' => 'yes')
		));

		vc_remove_param("vc_row", "css");
		vc_remove_param("vc_row", "font_color");
		vc_remove_param("vc_row", "el_class");

    add_action( 'init', 'gvc_integrateVC');
    function gvc_integrateVC() {

    	/*  GAP SHORTCODE                                         (STRUCTURE)
		/*-----------------------------------------------------------------*/

			vc_map(array(
	    		'name'                    => "Gap",
	    		'base'                    => "gap",
	    		'class'                   => 'gvc-gap',
	    		'show_settings_on_create' => false,
	    		'category'                => __("Structure","js_composer"),
	    		'icon'                    => 'tmce-icon-gap',
	    		'js_view'                 => '',
	    		'description'             => 'Insert gap in content',
	    		'params'                  => array(
	    			array(
						"type"       => "textfield",
						"class"      => "",
						"heading"    => "Gep size (only integer value, without any string)",
						"param_name" => "height",
						"value"      => "25"
					)
	    		)
	    	));

	    /*  SPLITTER SHORTCODE                                    (STRUCTURE)
		/*-----------------------------------------------------------------*/

			vc_map(array(
	    		'name'                    => "Separator",
	    		'base'                    => "splitter",
	    		'class'                   => 'gvc-splitter',
	    		'show_settings_on_create' => false,
	    		'category'                => __("Structure","js_composer"),
	    		'icon'                    => 'tmce-icon-splitter',
	    		'description'             => 'Use this element to separate content',
	    		'js_view'                 => '',
	    		'params'                  => array(
	    			array(
						"type"       => "dropdown",
						"class"      => "",
						"heading"    => "Separator type",
						"param_name" => "type",
						"value"      => array(
							"Solid"        => 'solid',
							"Double"       => 'double',
							"Dotted"       => 'dotted',
							"Dashed thick" => 'dashed-thick',
							"Dashed thin"  => 'dashed-thin',
							"Textured"     => 'textured'
						)
					),
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => "Separator color",
						"param_name" => "color",
						"value"      => ""
					),
	    			array(
						"type"       => "textfield",
						"class"      => "",
						"heading"    => "Gap from top (only integer value, without any string)",
						"param_name" => "top",
						"value"      => "20"
					),
					array(
						"type"       => "textfield",
						"class"      => "",
						"heading"    => "Gap from bottom (only integer value, without any string)",
						"param_name" => "bottom",
						"value"      => "20"
					)
	    		)
	    	));

    	/*  BUTTONS SHORTCODE                                       (CONTENT)
		/*-----------------------------------------------------------------*/

	    	vc_map(array(
	    		'name'                    => "Button",
	    		'base'                    => "gvc_button",
	    		'class'                   => 'gvc-button',
	    		'show_settings_on_create' => true,
	    		'category'                => __("Content","js_composer"),
	    		'icon'                    => 'tmce-icon-button',
	    		'js_view'                 => '',
	    		'description'             => 'Use this element to insert buttons',
	    		'params'                  => array(
	    			array(
						"type"       => "textfield",
						"class"      => "",
						"heading"    => "Button text",
						"param_name" => "text",
						"value"      => "Button text here"
					),
					array(
						"type"       => "textfield",
						"class"      => "",
						"heading"    => "Button link",
						"param_name" => "href",
						"value"      => "#"
					),
					array(
						"type"       => "dropdown",
						"class"      => "",
						"heading"    => "Button link target",
						"param_name" => "target",
						"value"      => array(
							"Self"  => '_self',
							"Blank" => '_blank'
						)
					),
					array(
						"type"        => "textfield",
						"class"       => "",
						"heading"     => "Button icon",
						"param_name"  => "icon",
						"value"       => "icon name",
						'description' => "Enter icon name (icon list can be found at http://fortawesome.github.io/Font-Awesome/icons)"
					),
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => "Button background color",
						"param_name" => "back_color",
						"value"      => ""
					),
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => "Button text color",
						"param_name" => "color",
						"value"      => ""
					),
					array(
						"type"       => "dropdown",
						"class"      => "",
						"heading"    => "Button size",
						"param_name" => "size",
						"value"      => array(
							"Small"  => 'small',
							"Medium" => 'medium',
							"Large"  => 'large'
						)
					)
	    		)
	    	));

		/*  SOCIAL LINKS SHORTCODE                                  (CONTENT)
		/*-----------------------------------------------------------------*/

			vc_map(array(
	    		'name'                    => "Social links",
	    		'base'                    => "social_links",
	    		'class'                   => 'gvc-social-links',
	    		'show_settings_on_create' => true,
	    		'category'                => __("Content","js_composer"),
	    		'icon'                    => 'tmce-icon-social-links',
	    		'js_view'                 => '',
	    		'description'             => 'Insert social service links'
	    	));

			$social_links_array = array(
	    		'rss',
				'facebook',
				'twitter',
				'google_plus',
				'youtube',
				'vimeo',
				'linkedin',
				'pinterest',
				'flickr',
				'instagram',
				'skype',
				'apple',
				'dribbble',
				'android',
				'email'
			);

			vc_add_param("social_links", array(
				"type"       => "dropdown",
				"class"      => "",
				"heading"    => "Social links target",
				"param_name" => "target",
				"value"      => array(
					"Self"  => '_self',
					"Blank" => '_blank'
				)
			));

			vc_add_param("social_links", array(
				"type"       => "dropdown",
				"class"      => "",
				"heading"    => "Social links alignment",
				"param_name" => "align",
				"value"      => array(
					"Left"   => 'left',
					"Right"  => 'right',
					"Center" => 'center',
				)
			));

			foreach ($social_links_array as $social) {
				vc_add_param("social_links", array(
					"type"       => "textfield",
					"class"      => "",
					"heading"    => ucfirst($social)." link",
					"param_name" => $social,
					"value"      => ""
				));
			}
     	
     	/*  ICONS SHORTCODE                                         (CONTENT)
		/*-----------------------------------------------------------------*/

			vc_map(array(
	    		'name'                    => "Icon",
	    		'base'                    => "icons",
	    		'class'                   => 'gvc-icons',
	    		'show_settings_on_create' => true,
	    		'category'                => __("Content","js_composer"),
	    		'icon'                    => 'tmce-icon-icons',
	    		'description'             => 'Insert font-awesome icons',
	    		'js_view'                 => '',
	    		'params'                  => array(
	    			array(
						"type"       => "textfield",
						"class"      => "",
						"heading"    => "Icon name",
						"param_name" => 'icon',
						"value"      => "check",
						'description' => "Enter icon name (icon list can be found at http://fortawesome.github.io/Font-Awesome/icons)"
					),
					array(
						"type"       => "dropdown",
						"class"      => "",
						"heading"    => "Icon type",
						"param_name" => "type",
						"value"      => array(
							"None"   => 'none',
							"Circle" => 'circle',
							"Square" => 'square'
						)
					),
					array(
						"type"       => "dropdown",
						"class"      => "",
						"heading"    => "Icon size",
						"param_name" => "size",
						"value"      => array(
							"Small"  => 'small',
							"Medium" => 'medium',
							"Large"  => 'large'
						)
					),
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => "Icon color",
						"param_name" => "icon_color",
						"value"      => ""
					),
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => "Icon background color",
						"param_name" => "background_color",
						"value"      => ""
					),
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => "Icon border color",
						"param_name" => "border_color",
						"value"      => ""
					)
	    		)
	    	));	

		/*  YOUTUBE SHORTCODE                                       (CONTENT)
		/*-----------------------------------------------------------------*/

			vc_map(array(
	    		'name'                    => "Youtube",
	    		'base'                    => "youtube",
	    		'class'                   => 'gvc-youtube',
	    		'show_settings_on_create' => true,
	    		'category'                => __("Content","js_composer"),
	    		'icon'                    => 'tmce-icon-youtube',
	    		'description'             => 'Insert youtube videos',
	    		'js_view'                 => '',
	    		'params'                  => array(
	    			array(
						"type"       => "textfield",
						"class"      => "",
						"heading"    => "Video ID",
						"param_name" => "id",
						"value"      => "KDOLHClNTOI",
						"description" => "For example https://www.youtube.com/watch?v=KDOLHClNTOI (Use video id after watch?v=)"
					),
					array(
						"type"       => "textfield",
						"class"      => "",
						"heading"    => "Width optional (only integer value, without any string)",
						"param_name" => "width",
						"value"      => ""
					)
	    		)
	    	));

		/*  VIMEO SHORTCODE                                         (CONTENT) 
		/*-----------------------------------------------------------------*/

			vc_map(array(
	    		'name'                    => "Vimeo",
	    		'base'                    => "vimeo",
	    		'class'                   => 'gvc-vimeo',
	    		'show_settings_on_create' => true,
	    		'category'                => __("Content","js_composer"),
	    		'icon'                    => 'tmce-icon-vimeo',
	    		'description'             => 'Insert vimeo videos',
	    		'js_view'                 => '',
	    		'params'                  => array(
	    			array(
						"type"       => "textfield",
						"class"      => "",
						"heading"    => "Video ID",
						"param_name" => "id",
						"value"      => "5121526",
						"description" => "For example http://vimeo.com/5121526 (Use video id after last /)"
					),
					array(
						"type"       => "textfield",
						"class"      => "",
						"heading"    => "Width optional (only integer value, without any string)",
						"param_name" => "width",
						"value"      => ""
					)
	    		)
	    	));

		/*  SOUNDCLOUD SHORTCODE                                    (CONTENT)
		/*-----------------------------------------------------------------*/

			/*vc_map(array(
	    		'name'                    => "Soundcloud",
	    		'base'                    => "soundcloud",
	    		'class'                   => 'gvc-soundcloud',
	    		'show_settings_on_create' => true,
	    		'category'                => __("Content","js_composer"),
	    		'icon'                    => 'tmce-icon-soundcloud',
	    		'js_view'                 => '',
	    		'description'             => 'Insert soundcloud audio',
	    		'params'                  => array(
	    			array(
						"type"       => "textfield",
						"class"      => "",
						"heading"    => "Url",
						"param_name" => "url",
						"value"      => "https://api.soundcloud.com/tracks/151325062",
						"description" => "For example https://api.soundcloud.com/tracks/151325062"
					),
					array(
						"type"       => "textfield",
						"class"      => "",
						"heading"    => "Width (optional)",
						"param_name" => "width",
						"value"      => "100%"
					),
					array(
						"type"       => "textfield",
						"class"      => "",
						"heading"    => "Height (optional)",
						"param_name" => "height",
						"value"      => "166"
					)
	    		)
	    	));*/

		/*  TAGLINE SHORTCODE                                       (CONTENT)
		/*-----------------------------------------------------------------*/

			vc_map(array(
	    		'name'                    => "Tagline",
	    		'base'                    => "tagline",
	    		'class'                   => 'gvc-tagline',
	    		'show_settings_on_create' => true,
	    		'category'                => __("Content","js_composer"),
	    		'icon'                    => 'tmce-icon-tagline',
	    		'js_view'                 => '',
	    		'description'             => 'Insert colorfull call to action promo',
	    		'params'                  => array(
	    			array(
						"type"       => "textfield",
						"class"      => "",
						"heading"    => "Title",
						"param_name" => "title",
						"value"      => "Super call to action title goes here"
					),
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => "Tagline text color",
						"param_name" => "color",
						"value"      => ""
					),
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => "Tagline background color",
						"param_name" => "back_color",
						"value"      => ""
					),
					array(
						"type"       => "textfield",
						"class"      => "",
						"heading"    => "Tagline button link",
						"param_name" => "button_link",
						"value"      => "#"
					),
					array(
						"type"       => "textfield",
						"class"      => "",
						"heading"    => "Tagline button text",
						"param_name" => "button_text",
						"value"      => "Click to buy"
					)
	    		)
	    	));

		/*  ALERT SHORTCODE                                         (CONTENT)
		/*-----------------------------------------------------------------*/

			vc_map(array(
	    		'name'                    => "Alert message",
	    		'base'                    => "alert",
	    		'class'                   => 'gvc-alert',
	    		'show_settings_on_create' => true,
	    		'category'                => __("Content","js_composer"),
	    		'icon'                    => 'tmce-icon-alert',
	    		'js_view'                 => '',
	    		'description'             => 'Insert different UI messages',
	    		'params'                  => array(
	    			array(
						"type"       => "dropdown",
						"class"      => "",
						"heading"    => "Message type",
						"param_name" => "type",
						"value"      => array(
							"Note"        => 'note',
							"Success"     => 'success',
							"Warning"     => 'warning',
							"Error"       => 'error',
							"Information" => 'information'
						)
					),
					array(
						"type"       => "textarea",
						"class"      => "",
						"param_name" => "content",
						"value"      => 'Alert message content goes here'
					)
	    		)
	    	));

		/*  CODE SHORTCODE                                          (CONTENT)
		/*-----------------------------------------------------------------*/

			vc_map(array(
	    		'name'                    => "Code",
	    		'base'                    => "code",
	    		'class'                   => 'gvc-code',
	    		'show_settings_on_create' => true,
	    		'category'                => __("Content","js_composer"),
	    		'icon'                    => 'tmce-icon-code',
	    		'js_view'                 => '',
	    		'description'             => 'Use this element to insert any code as plain text',
	    		'params'                  => array(
	    			array(
						"type"       => "textarea",
						"class"      => "",
						"param_name" => "content",
						"value"      => '<p>Hello, i am <strong>code</strong> element</p>'
					)
	    		)
	    	));

		/*  GOOGLE MAP SHORTCODE                                    (CONTENT)
		/*-----------------------------------------------------------------*/

			vc_map(array(
	    		'name'                    => "Google map",
	    		'base'                    => "gmap",
	    		'class'                   => 'gvc-gmap',
	    		'show_settings_on_create' => true,
	    		'category'                => __("Content","js_composer"),
	    		'icon'                    => 'tmce-icon-gmap',
	    		'js_view'                 => '',
	    		'description'             => 'Insert google maps',
	    		'params'                  => array(
	    			array(
						"type"        => "textfield",
						"class"       => "",
						"heading"     => "Coords",
						"param_name"  => "coords",
						"value"       => "53.339381, -6.260405",
						'description' => 'Use latitude and longitude coordinates (for example 53.339381, -6.260405)',
					),
	    			array(
						"type"       => "textfield",
						"class"      => "",
						"heading"    => "Google map zoom level (from 1 to 19 only integer value, without any string)",
						"param_name" => "zoom",
						"value"      => "18"
					),
					array(
						"type"       => "dropdown",
						"class"      => "",
						"heading"    => "Type",
						"param_name" => "type",
						"value"      => array(
							"Roadmap"   => 'roadmap',
							"Satellite" => 'satellite',
							"Hybrid"    => 'hybrid',
							"Terrain"   => 'terrain',
							"Grey"      => 'grey'
						)
					),
					array(
						"type"       => "textfield",
						"class"      => "",
						"heading"    => "Width",
						"param_name" => "width",
						"value"      => "100%"
					),
					array(
						"type"       => "textfield",
						"class"      => "",
						"heading"    => "Height",
						"param_name" => "height",
						"value"      => "480px"
					),
					array(
						"type"       => "attach_image",
						"class"      => "",
						"heading"    => "Upload custom marker",
						"param_name" => "marker",
						"value"      => ""
					)
	    		)
	    	));

		/*  RECENT POSTS SHORTCODE                                  (CONTENT)
		/*-----------------------------------------------------------------*/

			vc_map(array(
	    		'name'                    => "Recent posts",
	    		'base'                    => "recent_posts",
	    		'class'                   => 'gvc-recent-posts',
	    		'show_settings_on_create' => true,
	    		'category'                => __("Content","js_composer"),
	    		'icon'                    => 'tmce-icon-recent-posts',
	    		'js_view'                 => '',
	    		'description'             => 'Query recent posts',
	    		'params'                  => array(
	    			array(
						"type"        => "textfield",
						"class"       => "",
						"heading"     => "Number of posts to display",
						"param_name"  => "posts_number",
						"value"       => "3",
					),
					array(
						"type"        => "textfield",
						"class"       => "",
						"heading"     => "Posts excerpt characters limit",
						"param_name"  => "limit",
						"value"       => "150",
					),
					array(
						"type"       => "dropdown",
						"class"      => "",
						"heading"    => "Version",
						"param_name" => "version",
						"value"      => array(
							"Version 1" => 'v1',
							"Version 2" => 'v2'
						)
					),
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => "Text color (version 1 only)",
						"param_name" => "color",
						"value"      => "",
						"dependency" => Array('element' => "version", 'value' => 'v1')
					),
					array(
						"type"       => "dropdown",
						"class"      => "",
						"heading"    => "Columns (version 2 only)",
						"param_name" => "columns",
						"value"      => array(
							"1" => '1',
							"2" => '2',
							"3" => '3',
							"4" => '4'
						),
						"dependency" => Array('element' => "version", 'value' => 'v2')
					)
	    		)
	    	));
    
		/*  RECENT PORTFOLIO SHORTCODE                              (CONTENT)
		/*-----------------------------------------------------------------*/
		if ( $gvc_portfolio_yes == 1 ):
			vc_map(array(
	    		'name'                    => "Recent projects",
	    		'base'                    => "recent_portfolio",
	    		'class'                   => 'gvc-recent-portfolio',
	    		'show_settings_on_create' => true,
	    		'category'                => __("Content","js_composer"),
	    		'icon'                    => 'tmce-icon-recent-portfolio',
	    		'js_view'                 => '',
	    		'description'             => 'Query recent projects',
	    		'params'                  => array(
	    			array(
						"type"        => "textfield",
						"class"       => "",
						"heading"     => "Number of projects to display",
						"param_name"  => "posts_number",
						"value"       => "3",
					),
					array(
						"type"       => "dropdown",
						"class"      => "",
						"heading"    => "Version",
						"param_name" => "version",
						"value"      => array(
							"Version 1" => 'v1',
							"Version 2" => 'v2',
							"Version 3" => 'v3'
						)
					),
					array(
						"type"       => "dropdown",
						"class"      => "",
						"heading"    => "Columns (version 1 and 2 only)",
						"param_name" => "columns",
						"value"      => array(
							"1" => '1',
							"2" => '2',
							"3" => '3',
							"4" => '4'
						),
						"dependency" => Array('element' => "version", 'value' => array('v1','v2'))
					),
					array(
						"type"        => "textfield",
						"class"       => "",
						"heading"     => "Category filter (enter comma-separated list of categories slug/id)",
						"param_name"  => "category",
						"value"       => "",
					),
					array(
						"type"       => "dropdown",
						"class"      => "",
						"heading"    => "Animate",
						"param_name" => "animate",
						"value"      => array(
							"Yes" => 'yes',
							"No"  => 'no'
						)
					)
	    		)
	    	));
		endif;
		
		/*  SLIDER SECTION SHORTCODE                                 (NESTED)
		/*-----------------------------------------------------------------*/

			vc_map(array(
	    		'name'                    => "Slider section",
	    		'base'                    => "section_slider",
	    		"as_parent"               => array('only' => 'section'),
	    		"content_element"         => true,
	    		'class'                   => 'gvc-section-slider',
	    		'show_settings_on_create' => true,
	    		'category'                => __("Nested elements","js_composer"),
	    		'is_container'            => true,
	    		'icon'                    => 'tmce-icon-section-slider',
				'description'             => 'Use this element to create impresive rotatable slider sections',
	    		"js_view"                 => 'VcColumnView',
	    		'params'                  => array(
	    			array(
	    				"type"       => "textfield",
						"heading"    => "ID (optional)",
						"param_name" => "id",
						"value"      => '',
						'description' => 'Give unique ID (Useful if your layout is one-page)',
					),
					array(
	    				"type"       => "dropdown",
						"heading"    => "Bullets",
						"param_name" => "bullets",
						"value"      => array("Yes"=>"yes","No"=>"no")
					),
					array(
	    				"type"       => "dropdown",
						"heading"    => "Bullets align",
						"param_name" => "bullets_align",
						"value"      => array("Left"=>"left","Right"=>"right","Center"=>"center")
					),
					array(
						"type"       => "colorpicker",
						"heading"    => "Bullets color",
						"param_name" => "bullets_color",
						"value"      => ""
					),
					array(
	    				"type"       => "dropdown",
						"heading"    => "Arrows",
						"param_name" => "arrows",
						"value"      => array("Yes"=>"yes","No"=>"no")
					),
					array(
	    				"type"       => "dropdown",
						"heading"    => "Autoplay",
						"param_name" => "autoplay",
						"value"      => array("Yes"=>"yes","No"=>"no")
					)
	    		)
	    	));

			vc_map(array(
	    		'name'                    => "Section",
	    		'base'                    => "section",
	    		"as_child"                => array('only' => 'section_slider'),
	    		"content_element"         => true,
	    		'params'                  => array(
	    			array(
						"type"       => "colorpicker",
						"heading"    => "Background color",
						"param_name" => "background_color",
						"value"      => ""
					),
					array(
						"type"       => "attach_image",
						"heading"    => "Background image",
						"param_name" => "background_image",
					),
					array(
	    				"type"       => "dropdown",
						"heading"    => "Background repeat",
						"param_name" => "background_repeat",
						"value"      => array(
							"No-repeat" =>"no-repeat",
							"Repeat-x"  =>"repeat-x",
							"Repeat-y"  =>"repeat-y",
							"Repeat"    =>"repeat"
						)
					),
					array(
	    				"type"       => "dropdown",
						"heading"    => "Background position",
						"param_name" => "background_position",
						"value"      => array(
							"Left top"     =>"left top",
							"Left bottom"  =>"left bottom",
							"Left center"  =>"Left Center",
							"Right top"    =>"right top",
							"Right bottom" =>"right bottom",
							"Right center" =>"Right Center",
							"Center center"=>"Center Center"
						)
					),
					array(
	    				"type"       => "dropdown",
						"heading"    => "Background attachment",
						"param_name" => "background_attachment",
						"value"      => array(
							"Scroll" =>"scroll",
							"Fixed"  =>"fixed"
						)
					),
					array(
						"type"       => "textfield",
						"class"      => "",
						"heading"    => "Padding top (only integer value, without any string)",
						"param_name" => "padding_top",
						"value"      => "50"
					),
					array(
						"type"       => "textfield",
						"class"      => "",
						"heading"    => "Padding bottom (only integer value, without any string)",
						"param_name" => "padding_bottom",
						"value"      => "50"
					),
					array(
						"type"       => "textarea_html",
						"param_name" => "content",
						"value"      => 'Slider section content'
					)
	    		)
	    	));

	    /*  SLIDER SHORTCODE                                         (NESTED)
		/*-----------------------------------------------------------------*/

			vc_map(array(
	    		'name'                    => "Media slider",
	    		'base'                    => "media_slider",
	    		"as_parent"               => array('only' => 'slide'),
	    		"content_element"         => true,
	    		'class'                   => 'gvc-media-slider',
	    		'show_settings_on_create' => false,
	    		'category'                => __("Nested elements","js_composer"),
	    		'is_container'            => true,
	    		'icon'                    => 'tmce-icon-media-slider',
	    		"js_view"                 => '',
	    		'description'             => 'Use this element to insert video/image slider'
	    	));

			vc_map(array(
	    		'name'                    => "Slide",
	    		'base'                    => "slide",
	    		"as_child"                => array('only' => 'media_slider'),
	    		"content_element"         => true,
	    		'params'                  => array(
					array(
	    				"type"       => "dropdown",
						"heading"    => "Type",
						"param_name" => "type",
						"value"      => array("Youtube"=>"youtube","Vimeo"=>"vimeo","Img"=>"img")
					),
					array(
	    				"type"       => "textfield",
						"heading"    => "Youtube/Vimeo Id",
						"param_name" => "id",
						"value"      => '',
						"dependency" => Array('element' => "type", 'value' => array('youtube','vimeo'))
					),
					array(
						"type"       => "attach_image",
						"heading"    => "Image",
						"param_name" => "src",
						"dependency" => Array('element' => "type", 'value' => 'img')
					),
					array(
	    				"type"       => "textfield",
						"heading"    => "Image description",
						"param_name" => "description",
						"value"      => '',
						"dependency" => Array('element' => "type", 'value' => 'img')
					)
	    		)
	    	));

		/*  CAROUSEL SHORTCODE                                       (NESTED)
		/*-----------------------------------------------------------------*/

			vc_map(array(
	    		'name'                    => "Carousel",
	    		'base'                    => "carousel",
	    		"as_parent"               => array('only' => 'item'),
	    		"content_element"         => true,
	    		'class'                   => 'gvc-carousel',
	    		'show_settings_on_create' => true,
	    		'category'                => __("Nested elements","js_composer"),
	    		'is_container'            => true,
	    		'icon'                    => 'tmce-icon-carousel',
	    		"js_view"                 => 'VcColumnView',
	    		'description'             => 'Carousel anythig with this element (image/text/video)',
	    		'params'                  => array(
					array(
	    				"type"       => "dropdown",
						"heading"    => "Columns",
						"param_name" => "columns",
						"value"      => array("1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6")
					),
					array(
	    				"type"       => "dropdown",
						"heading"    => "Autoplay",
						"param_name" => "autoplay",
						"value"      => array("No"=>"no","Yes"=>"yes")
					)
	    		)
	    	));

			vc_map(array(
	    		'name'                    => "Item",
	    		'base'                    => "item",
	    		"as_child"                => array('only' => 'carousel'),
	    		"content_element"         => true,
	    		'params'                  => array(
	    			array(
						"type"       => "textarea_html",
						"param_name" => "content",
						"value"      => 'Carousel content goes here'
					)
	    		)
	    	));

	    /*  ACCORDION SHORTCODE                                      (NESTED)
		/*-----------------------------------------------------------------*/

			vc_map(array(
	    		'name'                    => "Accordion",
	    		'base'                    => "accordion",
	    		"as_parent"               => array('only' => 'toggle'),
	    		"content_element"         => true,
	    		'class'                   => 'gvc-accordion',
	    		'show_settings_on_create' => false,
	    		'category'                => __("Nested elements","js_composer"),
	    		'is_container'            => true,
	    		'icon'                    => 'tmce-icon-accordion',
	    		"js_view"                 => 'VcColumnView',
	    		'params'                  => array(
					array(
	    				"type"       => "dropdown",
						"heading"    => "Collapsible",
						"param_name" => "collapsible",
						"value"      => array("No"=>"no","Yes"=>"yes")
					)
	    		),
	    		'description'             => 'Use this element to toggle content (accordion)'
	    	));

			vc_map(array(
	    		'name'                    => "Toggle",
	    		'base'                    => "toggle",
	    		"as_child"                => array('only' => 'accordion'),
	    		"content_element"         => true,
	    		'params'                  => array(
	    			array(
	    				"type"       => "textfield",
						"heading"    => "Title",
						"param_name" => "title",
						"value"      => 'Title goes here'
					),
					array(
	    				"type"       => "dropdown",
						"heading"    => "Open",
						"param_name" => "open",
						"value"      => array("No"=>"no","Yes"=>"yes")
					),
					array(
						"type"       => "textarea_html",
						"param_name" => "content",
						"value"      => 'Toggle content goes here'
					)
	    		)
	    	));

	    /*  ICON-PROGRESS-BAR SHORTCODE                              (NESTED)
		/*-----------------------------------------------------------------*/

			vc_map(array(
	    		'name'                    => "Icon progress",
	    		'base'                    => "icon_progress",
	    		'class'                   => 'gvc-icon-progress',
	    		'show_settings_on_create' => true,
	    		'category'                => __("Nested elements","js_composer"),
	    		'icon'                    => 'tmce-icon-icon-progress',
	    		'js_view'                 => '',
	    		"js_view"                 => 'VcColumnView',
	    		'description'             => 'Used to insert icon-based animated infographics',
	    		'params'                  => array(
	    			array(
						"type"        => "textfield",
						"class"       => "",
						"heading"     => "Icon name",
						"param_name"  => "icon",
						"value"       => "male",
						'description' => "Enter icon name (icon list can be found at http://fortawesome.github.io/Font-Awesome/icons)"
					),
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => "Inactive icons color",
						"param_name" => "inactive_color",
						"value"      => ""
					),
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => "Active icons color",
						"param_name" => "active_color",
						"value"      => ""
					),
					array(
						"type"       => "textfield",
						"class"      => "",
						"heading"    => "Number of icons total",
						"param_name" => "number",
						"value"      => "10"
					),
					array(
						"type"       => "textfield",
						"class"      => "",
						"heading"    => "Number of icons to animate (active icons)",
						"param_name" => "active",
						"value"      => "7"
					),
					array(
						"type"       => "dropdown",
						"class"      => "",
						"heading"    => "Align",
						"param_name" => "align",
						"value"      => array(
							"Left"   => 'left',
							"Right"  => 'right',
							"Center" => 'center'
						)
					)
	    		)
	    	));

	    /*  PROGRESS-BAR SHORTCODE                                   (NESTED)
		/*-----------------------------------------------------------------*/

			vc_map(array(
	    		'name'                    => "Progress bar",
	    		'base'                    => "progress_container",
	    		"as_parent"               => array('only' => 'progress'),
	    		"content_element"         => true,
	    		'class'                   => 'gvc-progress',
	    		'show_settings_on_create' => true,
	    		'category'                => __("Nested elements","js_composer"),
	    		'is_container'            => true,
	    		"js_view"                 => 'VcColumnView',
	    		'icon'                    => 'tmce-icon-progress',
	    		'params'                  => array(
					array(
	    				"type"       => "dropdown",
						"heading"    => "Textured",
						"param_name" => "textured",
						"value"      => array("No"=>"no","Yes"=>"yes")
					)
	    		),
	    		'description'             => 'Insert animated progress bars'
	    	));

			vc_map(array(
	    		'name'                    => "Progress",
	    		'base'                    => "progress",
	    		"as_child"                => array('only' => 'progress_container'),
	    		"content_element"         => true,
	    		'params'                  => array(
	    			array(
	    				"type"       => "textfield",
						"heading"    => "Percentage (only integer value, without any string)",
						"param_name" => "percentage",
						"value"      => '70'
					),
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => "Bar color",
						"param_name" => "bar_color",
						"value"      => ""
					),
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => "Track color",
						"param_name" => "track_color",
						"value"      => ""
					),
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => "Color",
						"param_name" => "color",
						"value"      => ""
					),
					array(
	    				"type"       => "textfield",
						"heading"    => "Gap (only integer value, without any string)",
						"param_name" => "gap",
						"value"      => '20'
					),
					array(
	    				"type"       => "textfield",
						"heading"    => "Title",
						"param_name" => "title",
						"value"      => 'Progress title'
					)
	    		)
	    	));
		
		/*  PROGRESS-CIRCLE SHORTCODE                                (NESTED)
		/*-----------------------------------------------------------------*/

			vc_map(array(
	    		'name'                    => "Circle progress",
	    		'base'                    => "circle_progress_container",
	    		"as_parent"               => array('only' => 'circle_progress'),
	    		"content_element"         => true,
	    		'class'                   => 'gvc-circle-progress',
	    		'show_settings_on_create' => true,
	    		'category'                => __("Nested elements","js_composer"),
	    		'is_container'            => true,
	    		"js_view"                 => 'VcColumnView',
	    		'icon'                    => 'tmce-icon-circle-progress',
	    		'params'                  => array(
					array(
	    				"type"       => "dropdown",
						"heading"    => "Align",
						"param_name" => "align",
						"value"      => array("Left"=>"left","Right"=>"right","Center"=>"center")
					),
	    		),
	    		'description'             => 'Insert animated circle progresses'
	    	));

			vc_map(array(
	    		'name'                    => "Circle bar",
	    		'base'                    => "circle_progress",
	    		"as_child"                => array('only' => 'circle_progress_container'),
	    		"content_element"         => true,
	    		'params'                  => array(
	    			array(
	    				"type"       => "textfield",
						"heading"    => "Percentage (only integer value, without any string)",
						"param_name" => "percentage",
						"value"      => '70'
					),
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => "Bar color",
						"param_name" => "bar_color",
						"value"      => ""
					),
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => "Track color",
						"param_name" => "track_color",
						"value"      => ""
					),
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => "Color",
						"param_name" => "color",
						"value"      => ""
					),
					array(
	    				"type"       => "textfield",
						"heading"    => "Title",
						"param_name" => "title",
						"value"      => 'Progress title'
					)
	    		)
	    	));

		/*  COUNTER SHORTCODE                                        (NESTED)
		/*-----------------------------------------------------------------*/

			vc_map(array(
	    		'name'                    => "Counter",
	    		'base'                    => "counter_container",
	    		"as_parent"               => array('only' => 'counter'),
	    		"content_element"         => true,
	    		'class'                   => 'gvc-counter',
	    		'show_settings_on_create' => true,
	    		'category'                => __("Nested elements","js_composer"),
	    		'is_container'            => true,
	    		"js_view"                 => 'VcColumnView',
	    		'icon'                    => 'tmce-icon-counter',
	    		'params'                  => array(
					array(
	    				"type"       => "dropdown",
						"heading"    => "Align",
						"param_name" => "align",
						"value"      => array("Center"=>"center","Left"=>"left","Right"=>"right")
					)
	    		),
	    		'description'             => 'Count anything with animated counters'

	    	));

			vc_map(array(
	    		'name'                    => "Counter item",
	    		'base'                    => "counter",
	    		"as_child"                => array('only' => 'counter_container'),
	    		"content_element"         => true,
	    		'params'                  => array(
	    			array(
	    				"type"       => "textfield",
						"heading"    => "Value (only integer value, without any string)",
						"param_name" => "value",
						"value"      => '70'
					),
					array(
	    				"type"       => "textfield",
						"heading"    => "Title",
						"param_name" => "title",
						"value"      => 'Title'
					),
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => "Text color",
						"param_name" => "color",
						"value"      => ""
					),
					array(
						"type"        => "textfield",
						"class"       => "",
						"heading"     => "Icon",
						"param_name"  => "icon",
						"value"       => "icon name",
						'description' => "Enter icon name (icon list can be found at http://fortawesome.github.io/Font-Awesome/icons)"
					),
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => "Icon color",
						"param_name" => "icon_color",
						"value"      => ""
					)
					
	    		)
	    	));

		/*  CONTENTBOX SHORTCODE                                     (NESTED)
		/*-----------------------------------------------------------------*/

			vc_map(array(
	    		'name'                    => "Content boxes",
	    		'base'                    => "box_container",
	    		"as_parent"               => array('only' => 'box'),
	    		"content_element"         => true,
	    		'class'                   => 'gvc-box',
	    		'show_settings_on_create' => true,
	    		'category'                => __("Nested elements","js_composer"),
	    		'is_container'            => true,
	    		"js_view"                 => 'VcColumnView',
	    		'icon'                    => 'tmce-icon-box-container',
	    		'params'                  => array(
					array(
	    				"type"       => "dropdown",
						"heading"    => "Columns",
						"param_name" => "columns",
						"value"      => array("1"=>"1","2"=>"2","3"=>"3","4"=>"4")
					),
					array(
	    				"type"       => "dropdown",
						"heading"    => "Version",
						"param_name" => "version",
						"value"      => array("v1"=>"v1","v2"=>"v2")
					),
					array(
	    				"type"       => "dropdown",
						"heading"    => "Animate",
						"param_name" => "animate",
						"value"      => array("Yes"=>"yes","No"=>"no")
					)
	    		),
	    		'description'             => 'Insert icon-based boxes with columns'
	    	));

			vc_map(array(
	    		'name'                    => "Box",
	    		'base'                    => "box",
	    		"as_child"                => array('only' => 'box_container'),
	    		"content_element"         => true,
	    		'params'                  => array(
	    			array(
	    				"type"       => "textfield",
						"heading"    => "Title",
						"param_name" => "title",
						"value"      => 'Title goes here'
					),
					array(
						"type"        => "textfield",
						"class"       => "",
						"heading"     => "Icon",
						"param_name"  => "icon",
						"value"       => "icon name",
						'description' => "Enter icon name (icon list can be found at http://fortawesome.github.io/Font-Awesome/icons)"
					),
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => "Icon color",
						"param_name" => "icon_color",
						"value"      => ""
					),
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => "Icon background color",
						"param_name" => "icon_back_color",
						"value"      => ""
					),
					array(
	    				"type"       => "textfield",
						"heading"    => "Link",
						"param_name" => "link",
						"value"      => '',
					),
					array(
	    				"type"       => "textfield",
						"heading"    => "Link text",
						"param_name" => "link_text",
						"value"      => '',
						"dependency" => Array('element' => "link", 'not_empty' => true)
					),
					array(
	    				"type"       => "textarea",
						"heading"    => "Box content",
						"param_name" => "content",
						"value"      => 'Box content goes here',
					)
	    		)
	    	));

		/*  CLIENT SHORTCODE                                         (NESTED)
		/*-----------------------------------------------------------------*/

			vc_map(array(
	    		'name'                    => "Clients",
	    		'base'                    => "clients",
	    		"as_parent"               => array('only' => 'client'),
	    		"content_element"         => true,
	    		'class'                   => 'gvc-client',
	    		'show_settings_on_create' => true,
	    		'category'                => __("Nested elements","js_composer"),
	    		'is_container'            => true,
	    		"js_view"                 => 'VcColumnView',
	    		'icon'                    => 'tmce-icon-clients',
	    		'description'             => 'Highlight your clients with this element',
	    		'params'                  => array(
					array(
	    				"type"       => "dropdown",
						"heading"    => "Columns",
						"param_name" => "columns",
						"value"      => array("1"=>"1","2"=>"2","3"=>"3","4"=>"4")
					),
					array(
	    				"type"       => "dropdown",
						"heading"    => "Autoplay",
						"param_name" => "autoplay",
						"value"      => array("No"=>"no","Yes"=>"yes")
					),
					array(
	    				"type"       => "dropdown",
						"heading"    => "Carousel",
						"param_name" => "carousel",
						"value"      => array("No"=>"no","Yes"=>"yes")
					)
	    		)
	    	));

			vc_map(array(
	    		'name'                    => "Client",
	    		'base'                    => "client",
	    		"as_child"                => array('only' => 'client'),
	    		"content_element"         => true,
	    		'params'                  => array(
	    			array(
	    				"type"       => "textfield",
						"heading"    => "Client link",
						"param_name" => "href",
						"value"      => '#'
					),
					array(
	    				"type"       => "dropdown",
						"heading"    => "Link target",
						"param_name" => "target",
						"value"      => array("Self"=>"_self","Blank"=>"_blank")
					),
					array(
						"type"        => "attach_image",
						"class"       => "",
						"heading"     => "Client image",
						"param_name"  => "src",
						"value"       => ""
					),
					array(
	    				"type"       => "textfield",
						"heading"    => "Name",
						"param_name" => "name",
						"value"      => 'Enter client name here'
					)
					
	    		)
	    	));

	    /*  TESTIMONIALS SHORTCODE                                   (NESTED)
		/*-----------------------------------------------------------------*/

			vc_map(array(
	    		'name'                    => "Testimonials",
	    		'base'                    => "testimonials",
	    		"as_parent"               => array('only' => 'testimonial'),
	    		"content_element"         => true,
	    		'class'                   => 'gvc-testimonials',
	    		'show_settings_on_create' => true,
	    		"js_view"                 => 'VcColumnView',
	    		'category'                => __("Nested elements","js_composer"),
	    		'is_container'            => true,
	    		'icon'                    => 'tmce-icon-testimonials',
	    		'description'             => 'Add testimonials carousel with this element',
	    		'params'                  => array(
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => "Text color",
						"param_name" => "color",
						"value"      => ""
					)
	    		)
	    	));

			vc_map(array(
	    		'name'                    => "Testimonial",
	    		'base'                    => "testimonial",
	    		"as_child"                => array('only' => 'testimonials'),
	    		"content_element"         => true,
	    		'params'                  => array(
	    			array(
	    				"type"       => "textfield",
						"heading"    => "Person name",
						"param_name" => "name",
						"value"      => 'John Dow'
					),
					array(
						"type"        => "textfield",
						"heading"     => "Company",
						"param_name"  => "company",
						"value"       => "Company name"
					),
					array(
						"type"       => "textarea",
						"param_name" => "content",
						"value"      => 'Testimonial goes here'
					)
	    		)
	    	));

	    /*  PERSONS SHORTCODE                                        (NESTED)
		/*-----------------------------------------------------------------*/

			vc_map(array(
	    		'name'                    => "Team",
	    		'base'                    => "team",
	    		"as_parent"               => array('only' => 'members'),
	    		"content_element"         => true,
	    		'class'                   => 'gvc-team',
	    		'show_settings_on_create' => true,
	    		'category'                => __("Nested elements","js_composer"),
	    		'is_container'            => true,
	    		"js_view"                 => 'VcColumnView',
	    		'icon'                    => 'tmce-icon-team',
	    		'description'             => 'Add a team with image, bio info and contact data',
	    		'params'                  => array(
					array(
	    				"type"       => "dropdown",
						"heading"    => "Columns",
						"param_name" => "columns",
						"value"      => array("1"=>"1","2"=>"2","3"=>"3","4"=>"4")
					),
					array(
	    				"type"       => "dropdown",
						"heading"    => "Animate",
						"param_name" => "animate",
						"value"      => array("Yes"=>"yes","No"=>"no")
					)
	    		)
	    	));

			vc_map(array(
	    		'name'                    => "Team Member",
	    		'base'                    => "members",
	    		"as_child"                => array('only' => 'team'),
	    		"content_element"         => true,
	    		'params'                  => array(
	    			array(
						"type"        => "attach_image",
						"heading"     => "Team members image",
						"param_name"  => "src",
						"value"       => ""
					),
					array(
	    				"type"       => "textfield",
						"heading"    => "Name",
						"param_name" => "name",
						"value"      => 'Enter team members name here'
					),
					array(
	    				"type"       => "textfield",
						"heading"    => "Title",
						"param_name" => "title",
						"value"      => 'Team Members title/position'
					),
					array(
	    				"type"       => "dropdown",
						"heading"    => "Link target for social links",
						"param_name" => "target",
						"value"      => array("Self"=>"_self","Blank"=>"_blank")
					),
					array(
	    				"type"       => "textfield",
						"heading"    => "Twitter link",
						"param_name" => "twitter",
						"value"      => '#'
					),
					array(
	    				"type"       => "textfield",
						"heading"    => "Facebook link",
						"param_name" => "facebook",
						"value"      => '#'
					),
					array(
	    				"type"       => "textfield",
						"heading"    => "Linkedin link",
						"param_name" => "linkedin",
						"value"      => '#'
					),
					array(
	    				"type"       => "textfield",
						"heading"    => "Google+ link",
						"param_name" => "google_plus",
						"value"      => '#'
					),
					array(
	    				"type"       => "textfield",
						"heading"    => "Email link",
						"param_name" => "email",
						"value"      => '#'
					),
					array(
	    				"type"       => "textarea",
						"heading"    => "Bio",
						"param_name" => "bio",
						"value"      => 'Team members short bio goes here'
					)
	    		)
	    	));

    }

    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	    class WPBakeryShortCode_Section_Slider extends WPBakeryShortCodesContainer {}
	    class WPBakeryShortCode_Media_Slider extends WPBakeryShortCodesContainer {}
	    class WPBakeryShortCode_Tabs extends WPBakeryShortCodesContainer {}
	    class WPBakeryShortCode_Accordion extends WPBakeryShortCodesContainer {}
	    class WPBakeryShortCode_Progress_Container extends WPBakeryShortCodesContainer {}
	    class WPBakeryShortCode_Circle_Progress_Container extends WPBakeryShortCodesContainer {}
	    class WPBakeryShortCode_Counter_Container extends WPBakeryShortCodesContainer {}
	    class WPBakeryShortCode_Box_Container extends WPBakeryShortCodesContainer {}
	    class WPBakeryShortCode_Clients extends WPBakeryShortCodesContainer {}
	    class WPBakeryShortCode_Testimonials extends WPBakeryShortCodesContainer {}
	    class WPBakeryShortCode_team extends WPBakeryShortCodesContainer {}
	    class WPBakeryShortCode_Carousel extends WPBakeryShortCodesContainer {}
	}

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_Section extends WPBakeryShortCode {}
	    class WPBakeryShortCode_Slide extends WPBakeryShortCode {}
	    class WPBakeryShortCode_Tab extends WPBakeryShortCode {}
	    class WPBakeryShortCode_Toggle extends WPBakeryShortCode {}
	    class WPBakeryShortCode_Progress extends WPBakeryShortCode {}
	    class WPBakeryShortCode_Circle_Progress extends WPBakeryShortCode {}
	    class WPBakeryShortCode_Counter extends WPBakeryShortCode {}
	    class WPBakeryShortCode_Box extends WPBakeryShortCode {}
	    class WPBakeryShortCode_Client extends WPBakeryShortCode {}
	    class WPBakeryShortCode_Testimonial extends WPBakeryShortCode {}
	    class WPBakeryShortCode_Member extends WPBakeryShortCode {}
	    class WPBakeryShortCode_Item extends WPBakeryShortCode {}
	}

?>