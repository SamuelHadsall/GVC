<?php 
	global $gvc;
/*====================================================================*/
/*	STYLING OPTIONS
/*====================================================================*/


	$gvc_temp_color                       = ($gvc['gvc-main-color']) ? $gvc['gvc-main-color'] : '#f34a53';
	$gvc_skin                             = ($gvc['gvc-skin']) ? $gvc['gvc-skin'] : "light";
	
	$gvc_site_background_color            = ($gvc['gvc-site-background-color']) ? $gvc['gvc-site-background-color'] : (($gvc_skin == "dark") ? "#222222" : "#ffffff");
	$gvc_site_background_image            = (isset($gvc["gvc-site-background-image"]['url'])) ? $gvc["gvc-site-background-image"]['url'] : "";
	$gvc_site_background_image_repeat     = ($gvc["gvc-site-background-image-repeat"]) ? $gvc["gvc-site-background-image-repeat"] : "no-repeat";
	$gvc_site_background_image_position   = ($gvc["gvc-site-background-image-position"]) ? $gvc["gvc-site-background-image-position"] : "left_top";
	$gvc_site_background_image_attachment = ($gvc["gvc-site-background-image-attachment"]) ? $gvc["gvc-site-background-image-attachment"] : "scroll";
	$gvc_site_background_image_size       = ($gvc["gvc-site-background-image-size"]) ? $gvc["gvc-site-background-image-size"] : "auto";

	$gvc_light_skin_main_text_color       = ($gvc['gvc-light-skin-main-text-color']) ? $gvc['gvc-light-skin-main-text-color'] : "#777777";
	$gvc_light_skin_dark_text_color       = ($gvc['gvc-light-skin-dark-text-color']) ? $gvc['gvc-light-skin-dark-text-color'] : "#444444";
	$gvc_light_skin_light_text_color      = ($gvc['gvc-light-skin-light-text-color']) ? $gvc['gvc-light-skin-light-text-color'] : "#999999";

	$gvc_dark_skin_main_text_color        = ($gvc['gvc-dark-skin-main-text-color']) ? $gvc['gvc-dark-skin-main-text-color'] : "#999999";
	$gvc_dark_skin_dark_text_color        = ($gvc['gvc-dark-skin-dark-text-color']) ? $gvc['gvc-dark-skin-dark-text-color'] : "#ffffff";
	$gvc_dark_skin_light_text_color       = ($gvc['gvc-dark-skin-light-text-color']) ? $gvc['gvc-dark-skin-light-text-color'] : "#777777";

/*====================================================================*/
/*	HEADER OPTIONS
/*====================================================================*/

	$gvc_header_background_color = ($gvc['gvc-header-background-color']) ? $gvc['gvc-header-background-color'] : (($gvc_skin == "dark") ? '#2e2e2e' : '#ffffff');

	/*	HEADER TOP
	/*----------------------------------------------------------------*/

		$gvc_header_top_background_color 	           = ($gvc['gvc-header-top-background-color']) ? $gvc['gvc-header-top-background-color'] : "#f34a53";
		$gvc_header_top_text_color       	           = ($gvc['gvc-header-top-text-color']) ? $gvc['gvc-header-top-text-color'] : '#ffffff';
		$gvc_header_social_links_default_color          = ($gvc['gvc-header-social-links-default-color']) ? $gvc['gvc-header-social-links-default-color'] : '#ffffff';
		$gvc_header_social_links_hover_color            = ($gvc['gvc-header-social-links-hover-color']) ? $gvc['gvc-header-social-links-hover-color'] : '#ffffff';
		$gvc_header_social_links_hover_background_color = ($gvc['gvc-header-social-links-hover-background-color']) ? $gvc['gvc-header-social-links-hover-background-color'] : '#ea3d47';

	/*	HEADER TOP-LEVEL MENU
	/*----------------------------------------------------------------*/

		$gvc_menu_default_text_color = ($gvc['gvc-menu-default-text-color']) ? $gvc['gvc-menu-default-text-color'] : (($gvc_skin == "dark") ? '#ffffff' : '#333333');
		$gvc_menu_hover_text_color   = ($gvc['gvc-menu-hover-text-color']) ? $gvc['gvc-menu-hover-text-color'] : '#ffffff';
		$gvc_menu_hover_effect       = ($gvc['gvc-menu-hover-effect']) ? $gvc['gvc-menu-hover-effect'] : "fill";
		$gvc_menu_hover_effect_color = ($gvc['gvc-menu-hover-effect-color']) ? $gvc['gvc-menu-hover-effect-color'] : $gvc_temp_color;
		$gvc_menu_text_transform     = ($gvc['gvc-menu-text-transform']) ? $gvc['gvc-menu-text-transform'] : 'uppercase';
		$gvc_menu_font_weight        = ($gvc['gvc-menu-font-weight']) ? $gvc['gvc-menu-font-weight'] : 'normal';
		$gvc_menu_font_size          = ($gvc['gvc-menu-font-size']) ? $gvc['gvc-menu-font-size'] : '14';
		$gvc_menu_font_family        = ($gvc['gvc-menu-font-family']) ? $gvc['gvc-menu-font-family'] : 'arial';

	/*	HEADER SUBMENU
	/*----------------------------------------------------------------*/

		$gvc_submenu_text_transform  	    = ($gvc['gvc-submenu-text-transform']) ? $gvc['gvc-submenu-text-transform'] : 'none';
		$gvc_submenu_text_color  		    = ($gvc['gvc-submenu-text-color']) ? $gvc['gvc-submenu-text-color'] : '#dddddd';
		$gvc_submenu_hover_text_color  	    = ($gvc['gvc-submenu-hover-text-color']) ? $gvc['gvc-submenu-hover-text-color'] : "#ffffff";
		$gvc_submenu_background_color  	    = ($gvc['gvc-submenu-background-color']) ? $gvc['gvc-submenu-background-color'] : '#5c6366';
		$gvc_submenu_hover_background_color  = ($gvc['gvc-submenu-hover-background-color']) ? $gvc['gvc-submenu-hover-background-color'] : '#565e60';
		$gvc_submenu_border_color  		    = ($gvc['gvc-submenu-border-color']) ? $gvc['gvc-submenu-border-color'] : '#4b5051';
		$gvc_submenu_top_bottom_border_color = ($gvc['gvc-submenu-top-bottom-border-color']) ? $gvc['gvc-submenu-top-bottom-border-color'] : "#474d4f";
		$gvc_submenu_font_weight        	    = ($gvc['gvc-submenu-font-weight']) ? $gvc['gvc-submenu-font-weight'] : 'normal';
		$gvc_submenu_font_size          	    = ($gvc['gvc-submenu-font-size']) ? $gvc['gvc-submenu-font-size'] : '13';
		$gvc_submenu_font_family        	    = ($gvc['gvc-submenu-font-family']) ? $gvc['gvc-submenu-font-family'] : 'arial';
		$gvc_submenu_opacity        		    = ($gvc['gvc-submenu-opacity']) ? $gvc['gvc-submenu-opacity'] : '1';

	/*	HEADER MEGAMENU
	/*----------------------------------------------------------------*/

		$gvc_megamenu_border 		                      = ($gvc['gvc-megamenu-border'] && $gvc['gvc-megamenu-border'] == 1) ? "true" : "false";
		$gvc_megamenu_submenu_border 		              = ($gvc['gvc-megamenu-submenu-border'] && $gvc['gvc-megamenu-submenu-border'] == 1) ? "true" : "false";
		$gvc_megamenu_top_level_text_transform  	      = ($gvc['gvc-megamenu-top-level-text-transform']) ? $gvc['gvc-megamenu-top-level-text-transform'] : 'none';
		$gvc_megamenu_top_level_text_color  		      = ($gvc['gvc-megamenu-top-level-text-color']) ? $gvc['gvc-megamenu-top-level-text-color'] : '#dddddd';
		$gvc_megamenu_top_level_hover_text_color  	  = ($gvc['gvc-megamenu-top-level-hover-text-color']) ? $gvc['gvc-megamenu-top-level-hover-text-color'] : "#ffffff";
		$gvc_megamenu_top_level_background_color  	  = ($gvc['gvc-megamenu-top-level-background-color']) ? $gvc['gvc-megamenu-top-level-background-color'] : '';
		$gvc_megamenu_top_level_hover_background_color  = ($gvc['gvc-megamenu-top-level-hover-background-color']) ? $gvc['gvc-megamenu-top-level-hover-background-color'] : '';
		$gvc_megamenu_top_level_font_weight             = ($gvc['gvc-megamenu-top-level-font-weight']) ? $gvc['gvc-megamenu-top-level-font-weight'] : 'normal';


		$gvc_megamenu_sub_level_text_transform  	      = ($gvc['gvc-megamenu-sub-level-text-transform']) ? $gvc['gvc-megamenu-sub-level-text-transform'] : 'none';
		$gvc_megamenu_sub_level_text_color  		      = ($gvc['gvc-megamenu-sub-level-text-color']) ? $gvc['gvc-megamenu-sub-level-text-color'] : '#dddddd';
		$gvc_megamenu_sub_level_hover_text_color  	  = ($gvc['gvc-megamenu-sub-level-hover-text-color']) ? $gvc['gvc-megamenu-sub-level-hover-text-color'] : "#ffffff";
		$gvc_megamenu_sub_level_background_color  	  = ($gvc['gvc-megamenu-sub-level-background-color']) ? $gvc['gvc-megamenu-sub-level-background-color'] : '';
		$gvc_megamenu_sub_level_hover_background_color  = ($gvc['gvc-megamenu-sub-level-hover-background-color']) ? $gvc['gvc-megamenu-sub-level-hover-background-color'] : '';


/*====================================================================*/
/*	WOOCOMMERCE OPTIONS
/*====================================================================*/
	
	//$gvc_shop_cart_text_color       = ($gvc['gvc-shop-cart-text-color']) ? $gvc['gvc-shop-cart-text-color'] : '#333333';
	//$gvc_shop_cart_background_color = ($gvc['gvc-shop-cart-background-color']) ? $gvc['gvc-shop-cart-background-color'] : '';

/*====================================================================*/
/*	FOOTER OPTIONS
/*====================================================================*/
	
	$gvc_footer_background_color               = ($gvc['gvc-footer-background-color']) ? $gvc['gvc-footer-background-color'] : '#19262b';
	$gvc_footer_text_color                     = ($gvc['gvc-footer-text-color']) ? $gvc['gvc-footer-text-color'] : '#ffffff';
	$gvc_footer_widget_area_background_color   = ($gvc['gvc-footer-widget-area-background-color']) ? $gvc['gvc-footer-widget-area-background-color'] : '#253237';
	$gvc_footer_widget_area_text_color         = ($gvc['gvc-footer-widget-area-text-color']) ? $gvc['gvc-footer-widget-area-text-color'] : '#737c80';
	$gvc_footer_widget_area_widget_title_color = ($gvc['gvc-footer-widget-area-widget-title-color']) ? $gvc['gvc-footer-widget-area-widget-title-color'] : '#ffffff';
	$gvc_footer_font_size                      = ($gvc['gvc-footer-font-size']) ? $gvc['gvc-footer-font-size'] : "13";
	$gvc_footer_line_height                    = ($gvc['gvc-footer-line-height']) ? $gvc['gvc-footer-line-height'] : "22";

/*====================================================================*/
/*	TYPOGRAPHY OPTIONS
/*====================================================================*/

	$gvc_content_font_family  = ($gvc['gvc-body-font-family']) ? $gvc['gvc-body-font-family'] : 'arial';
	$gvc_content_font_size    = ($gvc['gvc-body-font-size']) ? $gvc['gvc-body-font-size'] : '13';
	$gvc_content_line_height  = ($gvc['gvc-body-line-height']) ? $gvc['gvc-body-line-height'] : '22';

	$gvc_button_font_family  = ($gvc['gvc-button-font-family']) ? $gvc['gvc-button-font-family'] : 'arial';
	$gvc_button_font_weight  = ($gvc['gvc-buttons-font-weight']) ? $gvc['gvc-buttons-font-weight'] : 'bold';
	
	$gvc_headings_font_family = ($gvc['gvc-headings-font-family']) ? $gvc['gvc-headings-font-family'] : 'arial';
	
	$gvc_body_small_font_size   = ($gvc['gvc-body-small-font-size']) ? $gvc['gvc-body-small-font-size'] : '11';
	$gvc_body_small_line_height = ($gvc['gvc-body-small-line-height']) ? $gvc['gvc-body-small-line-height'] : '22';

	$gvc_h1_font_size         = ($gvc['gvc-h1-font-size']) ? $gvc['gvc-h1-font-size'] : '28';
	$gvc_h2_font_size         = ($gvc['gvc-h2-font-size']) ? $gvc['gvc-h2-font-size'] : '26';
	$gvc_h3_font_size         = ($gvc['gvc-h3-font-size']) ? $gvc['gvc-h3-font-size'] : '24';
	$gvc_h4_font_size         = ($gvc['gvc-h4-font-size']) ? $gvc['gvc-h4-font-size'] : '22';
	$gvc_h5_font_size         = ($gvc['gvc-h5-font-size']) ? $gvc['gvc-h5-font-size'] : '20';
	$gvc_h6_font_size         = ($gvc['gvc-h6-font-size']) ? $gvc['gvc-h6-font-size'] : '18';

	$gvc_h1_line_height       = ($gvc['gvc-h1-line-height']) ? $gvc['gvc-h1-line-height'] : '34';
	$gvc_h2_line_height       = ($gvc['gvc-h2-line-height']) ? $gvc['gvc-h2-line-height'] : '32';
	$gvc_h3_line_height       = ($gvc['gvc-h3-line-height']) ? $gvc['gvc-h3-line-height'] : '30';
	$gvc_h4_line_height       = ($gvc['gvc-h4-line-height']) ? $gvc['gvc-h4-line-height'] : '28';
	$gvc_h5_line_height       = ($gvc['gvc-h5-line-height']) ? $gvc['gvc-h5-line-height'] : '26';
	$gvc_h6_line_height       = ($gvc['gvc-h6-line-height']) ? $gvc['gvc-h6-line-height'] : '24';

/*====================================================================*/
/*	PORTFOLIO OPTIONS
/*====================================================================*/
	
	$gvc_portfolio_layout = ($gvc['gvc-portfolio-layout']) ? $gvc['gvc-portfolio-layout'] : "medium";

/*====================================================================*/
/*  CUSTOM FONTS LINK
/*====================================================================*/

	$gvc_content_font_family_link     = gvc_custom_fonts_link($gvc_content_font_family); 
	$gvc_headings_font_family_link    = gvc_custom_fonts_link($gvc_headings_font_family); 
	$gvc_menu_font_family_link        = gvc_custom_fonts_link($gvc_menu_font_family);
	$gvc_submenu_font_family_link     = gvc_custom_fonts_link($gvc_submenu_font_family);
	$gvc_button_font_family_link      = gvc_custom_fonts_link($gvc_button_font_family);

	if (($gvc_content_font_family_link == $gvc_headings_font_family_link) && ($gvc_content_font_family_link == $gvc_menu_font_family_link) && ($gvc_content_font_family_link == $gvc_submenu_font_family_link) && ($gvc_content_font_family_link == $gvc_button_font_family_link)) {
		
		echo $gvc_content_font_family_link;
	
	} elseif (($gvc_content_font_family_link == $gvc_headings_font_family_link) && ($gvc_content_font_family_link == $gvc_menu_font_family_link) && ($gvc_content_font_family_link == $gvc_submenu_font_family_link) && ($gvc_content_font_family_link != $gvc_button_font_family_link)) {
		
		echo $gvc_content_font_family_link;
		echo $gvc_button_font_family_link;

	} elseif (($gvc_content_font_family_link == $gvc_headings_font_family_link) && ($gvc_content_font_family_link == $gvc_menu_font_family_link) && ($gvc_content_font_family_link != $gvc_submenu_font_family_link) && ($gvc_content_font_family_link != $gvc_button_font_family_link)) {
		
		echo $gvc_content_font_family_link;
		echo $gvc_button_font_family_link;
		echo $gvc_submenu_font_family_link;

	} elseif (($gvc_content_font_family_link == $gvc_headings_font_family_link) && ($gvc_content_font_family_link != $gvc_menu_font_family_link) && ($gvc_content_font_family_link != $gvc_submenu_font_family_link) && ($gvc_content_font_family_link != $gvc_button_font_family_link)) {
		
		echo $gvc_content_font_family_link;
		echo $gvc_button_font_family_link;
		echo $gvc_submenu_font_family_link;
		echo $gvc_menu_font_family_link;

	} elseif (($gvc_content_font_family_link != $gvc_headings_font_family_link) && ($gvc_content_font_family_link == $gvc_menu_font_family_link) && ($gvc_content_font_family_link == $gvc_submenu_font_family_link) && ($gvc_content_font_family_link == $gvc_button_font_family_link)) {
		
		echo $gvc_content_font_family_link;
		echo $gvc_headings_font_family_link;

	} elseif (($gvc_content_font_family_link != $gvc_headings_font_family_link) && ($gvc_content_font_family_link != $gvc_menu_font_family_link) && ($gvc_content_font_family_link != $gvc_submenu_font_family_link) && ($gvc_content_font_family_link == $gvc_button_font_family_link)) {
		
		echo $gvc_content_font_family_link;
		echo $gvc_headings_font_family_link;
		echo $gvc_menu_font_family_link;
		echo $gvc_submenu_font_family_link;

	} elseif (($gvc_content_font_family_link != $gvc_headings_font_family_link) && ($gvc_content_font_family_link == $gvc_menu_font_family_link) && ($gvc_content_font_family_link != $gvc_submenu_font_family_link) && ($gvc_content_font_family_link == $gvc_button_font_family_link)) {
		
		echo $gvc_content_font_family_link;
		echo $gvc_headings_font_family_link;
		echo $gvc_menu_font_family_link;

	} elseif (($gvc_content_font_family_link != $gvc_headings_font_family_link) && ($gvc_content_font_family_link == $gvc_menu_font_family_link) && ($gvc_content_font_family_link == $gvc_submenu_font_family_link) && ($gvc_content_font_family_link != $gvc_button_font_family_link)) {
		
		echo $gvc_content_font_family_link;
		echo $gvc_headings_font_family_link;
		echo $gvc_button_font_family_link;

	} elseif (($gvc_content_font_family_link == $gvc_headings_font_family_link) && ($gvc_content_font_family_link != $gvc_menu_font_family_link) && ($gvc_content_font_family_link != $gvc_submenu_font_family_link) && ($gvc_content_font_family_link == $gvc_button_font_family_link)) {
		
		echo $gvc_content_font_family_link;
		echo $gvc_menu_font_family_link;
		echo $gvc_submenu_font_family_link;

	}elseif (($gvc_content_font_family_link != $gvc_headings_font_family_link) && ($gvc_content_font_family_link == $gvc_menu_font_family_link) && ($gvc_content_font_family_link != $gvc_submenu_font_family_link) && ($gvc_content_font_family_link != $gvc_button_font_family_link)) {
		
		echo $gvc_content_font_family_link;
		echo $gvc_headings_font_family_link;
		echo $gvc_submenu_font_family_link;
		echo $gvc_button_font_family_link;

	} else {
		echo $gvc_content_font_family_link;
		echo $gvc_headings_font_family_link;
		echo $gvc_menu_font_family_link;
		echo $gvc_submenu_font_family_link;
		echo $gvc_button_font_family_link;
	}

?>

<style>

/*====================================================================*/
/*  COLORS
/*====================================================================*/
	
	/*----------------------------------------------------------------*/
	/* Dark text color
	/*----------------------------------------------------------------*/
		
		h1, h2, h3, h4, h5, h6,
		.post-body .post-title,
		.tabset .tab.active,
		.toggle-title.active .toggle-title-header,
		.pt .pt-price,
		.progress-bar .progress-title,
		.counter .counter-title,
		.circle-counter,
		.woocommerce .woocommerce-loop .products .product h3,
		.woocommerce .gvc-single-product-summary .quantity input[type="number"],
		.icl_languages_selector #lang_sel a:hover,
		.icl_languages_selector #lang_sel_list.lang_sel_list_horizontal li a:hover,
		.wp-playlist-light .wp-playlist-item {
			color:<?php echo $gvc_light_skin_dark_text_color; ?>;
		}

		.widget_rss .widget_title a,
		.icl_languages_selector #lang_sel_list a:hover,
		.icl_languages_selector #lang_sel_click a:hover,
		.wp-playlist-playing .wp-playlist-caption,
		.wpb_tabs .wpb_tabs_nav li.active a {
			color: <?php echo $gvc_light_skin_dark_text_color; ?> !important;
		}

		.dark-skin h1,
		.dark-skin h2,
		.dark-skin h3,
		.dark-skin h4,
		.dark-skin h5,
		.dark-skin h6,
		.dark-skin .post-body .post-title,
		.dark-skin .tabset .tab.active,
		.dark-skin .toggle-title.active .toggle-title-header,
		.dark-skin .pt .pt-price,
		.dark-skin .progress-bar .progress-title,
		.dark-skin .counter .counter-title,
		.dark-skin .circle-counter,
		.dark-skin .woocommerce .woocommerce-loop .products .product h3,
		.dark-skin .woocommerce .gvc-single-product-summary .quantity input[type="number"],
		.dark-skin .icl_languages_selector #lang_sel a:hover,
		.dark-skin .icl_languages_selector #lang_sel_list.lang_sel_list_horizontal li a:hover,
		.dark-skin .wp-playlist-light .wp-playlist-item {
			color: <?php echo $gvc_dark_skin_dark_text_color; ?>;
		}

		.dark-skin .widget_rss .widget_title a,
		.dark-skin .icl_languages_selector #lang_sel_list a:hover,
		.dark-skin .icl_languages_selector #lang_sel_click li a:hover,
		.dark-skin .wp-playlist-playing .wp-playlist-caption,
		.dark-skin .wpb_tabs .wpb_tabs_nav li.active a {
			color: <?php echo $gvc_dark_skin_dark_text_color; ?> !important;
		}
	
	/*----------------------------------------------------------------*/
	/* Main text color
	/*----------------------------------------------------------------*/
		
		body {color:<?php echo $gvc_light_skin_main_text_color; ?>;}

		.widget_categories a,
		.widget_pages a,
		.widget_nav_menu a,
		.widget_archive a,
		.sitemap-item a,
		.single .project-category a,
		.project-tags a,
		.widget_product_categories a,
		.widget_layered_nav a,
		.widget_layered_nav_filters a,
		.icl_languages_selector #lang_sel_list a,
		.icl_languages_selector #lang_sel_click a,
		.wp-playlist-caption {
			color: <?php echo $gvc_light_skin_main_text_color; ?> !important;
		}

		.dark-skin body {color:<?php echo $gvc_dark_skin_main_text_color; ?>;}

		.dark-skin .widget_categories a,
		.dark-skin .widget_pages a,
		.dark-skin .widget_nav_menu a,
		.dark-skin .widget_archive a,
		.dark-skin .sitemap-item a,
		.dark-skin .single .project-category a,
		.dark-skin .project-tags a,
		.dark-skin .widget_product_categories a,
		.dark-skin .widget_layered_nav a,
		.dark-skin .widget_layered_nav_filters a,
		.dark-skin .icl_languages_selector #lang_sel_list a,
		.dark-skin .icl_languages_selector #lang_sel_click a,
		.dark-skin .wp-playlist-caption {
			color: <?php echo $gvc_dark_skin_main_text_color; ?> !important;
		}

	/*----------------------------------------------------------------*/
	/* Light text color
	/*----------------------------------------------------------------*/
		
		textarea,
		select,
		blockquote,
		input[type="date"],
		input[type="datetime"],
		input[type="datetime-local"],
		input[type="email"],
		input[type="month"],
		input[type="number"],
		input[type="password"],
		input[type="search"],
		input[type="tel"],
		input[type="text"],
		input[type="time"],
		input[type="url"],
		input[type="week"],
		.post-author,
		.post-date,
		.post-comments,
		.post-category,
		.content .post-tags a,
		.post-type-archive-portfolio .portfolio .post-body .project-category a,
		.tax-portfolio-category .portfolio .post-body .project-category a,
		.tax-portfolio-tag .portfolio .post-body .project-category a,
		.post-comments-area .comment-notes,
		.gvc-navigation li a,
		.woocommerce-pagination li a,
		.widget_recent_entries ul li .post-date,
		.widget_twitter ul li a.tweet-time,
		.person .person-title,
		.woocommerce .woocommerce-loop .products .product .price,
		.widget_shopping_cart .cart_list > li > span.quantity,
		.widget_products .product_list_widget > li > del,
		.widget_products .product_list_widget > li > ins,
		.widget_products .product_list_widget > li > small,
		.product.woocommerce > del,
		.product.woocommerce > ins,
		.product.woocommerce > small,
		.icl_languages_selector #lang_sel a,
		.icl_languages_selector #lang_sel_list.lang_sel_list_horizontal li a,
		.icl_languages_selector #lang_sel_click a {
			color: <?php echo $gvc_light_skin_light_text_color; ?>;
		}

		.widget_categories ul li ul li a:before,
		.widget_pages ul li ul li a:before,
		.widget_nav_menu ul li ul li a:before,
		.sitemap-item ul li ul li a:before,
		.widget_product_categories ul li ul li a:before,
		.widget_layered_nav ul li ul li a:before,
		.widget_layered_nav_filters ul li ul li a:before {
			background-color: <?php echo $gvc_light_skin_light_text_color; ?>;
		}

		.widget_tag_cloud .tagcloud a,
		.widget_product_tag_cloud .tagcloud a,
		.recent-portfolio.v1 .post .project-category a,
		.woocommerce .gvc-single-product-summary .product_meta a {
			color: <?php echo $gvc_light_skin_light_text_color; ?> !important;
		}

		.dark-skin textarea,
		.dark-skin select,
		.dark-skin blockquote,
		.dark-skin input[type="date"],
		.dark-skin input[type="datetime"],
		.dark-skin input[type="datetime-local"],
		.dark-skin input[type="email"],
		.dark-skin input[type="month"],
		.dark-skin input[type="number"],
		.dark-skin input[type="password"],
		.dark-skin input[type="search"],
		.dark-skin input[type="tel"],
		.dark-skin input[type="text"],
		.dark-skin input[type="time"],
		.dark-skin input[type="url"],
		.dark-skin input[type="week"],
		.dark-skin .post-author,
		.dark-skin .post-date,
		.dark-skin .post-comments,
		.dark-skin .post-category,
		.dark-skin .content .post-tags a,
		.dark-skin .post-type-archive-portfolio .portfolio .post-body .project-category a,
		.dark-skin .tax-portfolio-category .portfolio .post-body .project-category a,
		.dark-skin .tax-portfolio-tag .portfolio .post-body .project-category a,
		.dark-skin .post-comments-area .comment-notes,
		.dark-skin .gvc-navigation li a,
		.dark-skin .woocommerce-pagination li a,
		.dark-skin .widget_recent_entries ul li .post-date,
		.dark-skin .widget_twitter ul li a.tweet-time,
		.dark-skin .person .person-title,
		.dark-skin .woocommerce .woocommerce-loop .products .product .price,
		.dark-skin .widget_shopping_cart .cart_list > li > span.quantity,
		.dark-skin .widget_products .product_list_widget > li > del,
		.dark-skin .widget_products .product_list_widget > li > ins,
		.dark-skin .widget_products .product_list_widget > li > small,
		.dark-skin .product.woocommerce > del,
		.dark-skin .product.woocommerce > ins,
		.dark-skin .product.woocommerce > small,
		.dark-skin .icl_languages_selector #lang_sel a,
		.dark-skin .icl_languages_selector #lang_sel_list.lang_sel_list_horizontal li a,
		.dark-skin .icl_languages_selector #lang_sel_click a {
			color: <?php echo $gvc_dark_skin_light_text_color; ?>;
		}

		.dark-skin .widget_categories ul li ul li a:before,
		.dark-skin .widget_pages ul li ul li a:before,
		.dark-skin .widget_nav_menu ul li ul li a:before,
		.dark-skin .sitemap-item ul li ul li a:before,
		.dark-skin .widget_product_categories ul li ul li a:before,
		.dark-skin .widget_layered_nav ul li ul li a:before,
		.dark-skin .widget_layered_nav_filters ul li ul li a:before {
			background-color: <?php echo $gvc_dark_skin_light_text_color; ?>;
		}

		.dark-skin .widget_tag_cloud .tagcloud a,
		.dark-skin .widget_product_tag_cloud .tagcloud a,
		.dark-skin .recent-portfolio.v1 .post .project-category a,
		.dark-skin .woocommerce .gvc-single-product-summary .product_meta a {
			color: <?php echo $gvc_dark_skin_light_text_color; ?> !important;
		}

/*====================================================================*/
/*  FONT-SIZE
/*====================================================================*/
	
	body, button, input, select, 
	textarea, pre, code, kbd, samp, dt {
		font-size: <?php echo $gvc_content_font_size; ?>px;
		line-height: <?php echo $gvc_content_line_height; ?>px;
	}

	h1 {font-size: <?php echo $gvc_h1_font_size; ?>px; line-height: <?php echo $gvc_h1_line_height; ?>px;}
	h2 {font-size: <?php echo $gvc_h2_font_size; ?>px; line-height: <?php echo $gvc_h2_line_height; ?>px;}
	h3 {font-size: <?php echo $gvc_h3_font_size; ?>px; line-height: <?php echo $gvc_h3_line_height; ?>px;}
	h4,.woocommerce .products .product h3 {font-size: <?php echo $gvc_h4_font_size; ?>px; line-height: <?php echo $gvc_h4_line_height; ?>px;}
	h5 {font-size: <?php echo $gvc_h5_font_size; ?>px; line-height: <?php echo $gvc_h5_line_height; ?>px;}
	h6 {font-size: <?php echo $gvc_h6_font_size; ?>px; line-height: <?php echo $gvc_h6_line_height; ?>px;}

	.post-author,
	.post-date,
	.post-comments,
	.post-category,
	.post-tags,
	.post-comments-area #respond #reply-title small,
	.post-type-archive-portfolio .portfolio .post-body .project-category,
	.tax-portfolio-category .portfolio .post-body .project-category,
	.tax-portfolio-tag .portfolio .post-body .project-category,
	.gvc-overlay > .gvc-overlay-content .project-category,
	.widget_recent_entries ul li .post-date,
	.widget_twitter ul li a.tweet-time,
	.recent-portfolio .post .project-category,
	sub, 
	sup  {
		font-size: <?php echo $gvc_body_small_font_size; ?>px;
		line-height:<?php echo $gvc_body_small_line_height; ?>px;
	}

	.widget_tag_cloud .tagcloud a,
	.widget_product_tag_cloud .tagcloud a {
		font-size: <?php echo $gvc_body_small_font_size; ?>px !important;
		line-height:<?php echo $gvc_body_small_line_height; ?>px !important;
	}

	.woocommerce .gvc-single-product-summary .price {
		font-size: <?php echo $gvc_h1_font_size; ?>px; 
		line-height: <?php echo $gvc_h1_line_height; ?>px;
	}

/*====================================================================*/
/*  FONT-FAMILY
/*====================================================================*/
	
	body, button, input, select, 
	textarea, pre, code, kbd, samp, dt, optgroup {
		font-family:<?php echo gvc_font_family_styles($gvc_content_font_family); ?>;
	}

	h1,h2,h3,h4,h5,h6,
	.header .search input[type="text"],
	.error404-status,
	.pt .pt-price,
	.counter .counter-value,
	.circle-counter,
	.circle-counter-title {
		font-family:<?php echo gvc_font_family_styles($gvc_headings_font_family); ?>;
	}

	button,
	input[type="reset"],
	input[type="submit"],
	input[type="button"],
	.button {
		font-family:<?php echo gvc_font_family_styles($gvc_button_font_family); ?>;
		font-weight: <?php echo $gvc_button_font_weight; ?>;
	}

/*====================================================================*/
/*  HEADER STYLES
/*====================================================================*/
	
	.header {
		background-color: <?php echo $gvc_header_background_color; ?>;
	}

	.responsive-true.header.attachment-fixed,
	.responsive-false.header.attachment-fixed {
		background-color: <?php echo gvc_hex_to_rgba($gvc_header_background_color, 0.98); ?>;
	}

	.header-top {
		background-color: <?php echo $gvc_header_top_background_color; ?>;
		color: <?php echo $gvc_header_top_text_color; ?>;
	}

	.header-top #lang_sel ul li a,
	.header-top #lang_sel_list ul li a {
		color: <?php echo $gvc_header_social_links_default_color; ?> !important;
	}

	.header-top #lang_sel ul li > a:hover,
	.header-top #lang_sel_list ul li > a:hover {
		background-color: <?php echo $gvc_header_social_links_hover_background_color; ?> !important;
		color: <?php echo $gvc_header_social_links_hover_color; ?> !important;
	}

	.header-top .social-links i {
		color: <?php echo $gvc_header_social_links_default_color; ?> !important;
	}

	.header-top .social-links a:hover {
		background-color: <?php echo $gvc_header_social_links_hover_background_color; ?> !important;
	}

	.header-top .social-links a:hover i {
		color: <?php echo $gvc_header_social_links_hover_color; ?> !important;
	}

	.header-menu ul li a,
	.responsive-menu-toggle i, 
	.search-toggle i,
	.header .header-menu ul li:before,
	.user-login a {
		color: <?php echo $gvc_menu_default_text_color; ?>;
	}

	/*WooCommerce Shoping cart*/
	.responsive-true .cart-toggle,
	.responsive-true .cart-toggle > a,
	.responsive-true .cart-toggle > a > i,
	.responsive-false .cart-toggle,
	.responsive-false .cart-toggle > a,
	.responsive-false .cart-toggle > a > i {
		color: <?php echo $gvc_menu_default_text_color; ?>;
		
	}

	.header-menu ul li a {
		border-bottom: 1px solid <?php echo gvc_hex_to_rgba($gvc_menu_default_text_color, 0.2); ?>;
	}

	.header-menu > ul > li:first-child > a {
		border-top:1px solid <?php echo gvc_hex_to_rgba($gvc_menu_default_text_color, 0.2); ?>;
	}

	.header-menu ul li a:hover,
	.header-menu ul li > a:hover:after {
		color: <?php echo $gvc_menu_hover_text_color; ?>;
	}

	<?php if($gvc_menu_hover_effect == "fill"): ?>
		.header-menu ul li a:hover {
			background-color: <?php echo $gvc_menu_hover_effect_color; ?>;
		}
	<?php endif; ?>

	.header-menu > ul > li > a {
		text-transform: <?php echo $gvc_menu_text_transform; ?>;
		font-weight: <?php echo $gvc_menu_font_weight; ?>;
		font-family: <?php gvc_font_family_styles($gvc_menu_font_family); ?>
	}

	.header .header-menu > ul > li > a,
	.header .header-menu > ul > li > a:after,
	.header .header-menu > ul > li ul.submenu-languages li.menu-item-language > a {
		font-size: <?php echo $gvc_menu_font_size.'px'; ?>;
	}

	.header-menu > ul > li ul li > a {
		text-transform: <?php echo $gvc_submenu_text_transform; ?>;
		font-weight: <?php echo $gvc_submenu_font_weight; ?>;
		font-family: <?php gvc_font_family_styles($gvc_submenu_font_family); ?>
	}

	.header .header-menu > ul > li ul li > a,
	.header .header-menu > ul > li ul li > a:after {
		font-size: <?php echo $gvc_submenu_font_size.'px'; ?>;
	}



/*====================================================================*/
/*  FOOTER STYLES
/*====================================================================*/

	.footer {
		background-color:<?php echo $gvc_footer_background_color; ?>;
		font-size: <?php echo $gvc_footer_font_size; ?>px;
		line-height: <?php echo $gvc_footer_line_height; ?>px;
	}

	.header .search {background-color:<?php echo $gvc_footer_background_color; ?>;}

	.footer .footer-content a,
	.footer .footer-content
	{color:<?php echo $gvc_footer_text_color; ?> !important;}

	.footer-widget-area-wrap {
		background-color:<?php echo $gvc_footer_widget_area_background_color; ?>;
	}

	.footer-widget-area-wrap .widget,
	.footer-widget-area-wrap .widget a,
	.footer-widget-area-wrap .widget_categories ul li a, 
	.footer-widget-area-wrap .widget_pages ul li a, 
	.footer-widget-area-wrap .widget_nav_menu ul li a, 
	.footer-widget-area-wrap .widget_archive ul li a,
	.footer-widget-area-wrap .widget_tag_cloud .tagcloud a,
	.footer-widget-area-wrap .widget_product_tag_cloud .tagcloud a,
	.footer-widget-area-wrap .widget_product_categories ul li a,
	.footer-widget-area-wrap .widget_layered_nav ul li a,
	.footer-widget-area-wrap .widget_layered_nav_filters ul li a,
	.footer-widget-area-wrap .buttons .button,
	.footer-widget-area-wrap .widget_price_filter .price_slider_amount .button {
		color: <?php echo $gvc_footer_widget_area_text_color; ?> !important;
	}

	.footer-widget-area-wrap .widget .widget_title,
	.footer-widget-area-wrap .widget .widget_title a {
		color: <?php echo $gvc_footer_widget_area_widget_title_color; ?> !important;
	}

	.footer-widget-area-wrap .widget_categories ul li a:before,
    .footer-widget-area-wrap .widget_pages ul li a:before,
    .footer-widget-area-wrap .widget_nav_menu ul li a:before,
    .footer-widget-area-wrap .widget_archive ul li a:before,
    .footer-widget-area-wrap .widget_product_categories ul li a:before,
    .footer-widget-area-wrap .widget_layered_nav ul li a:before,
    .footer-widget-area-wrap .widget_layered_nav_filters ul li a:before {
    	background-color: <?php echo $gvc_footer_widget_area_text_color; ?> !important;
    }

    .footer-widget-area-wrap .widget_categories ul li ul li a:before,
	.footer-widget-area-wrap .widget_pages ul li ul li a:before,
	.footer-widget-area-wrap .widget_nav_menu ul li ul li a:before,
	.footer-widget-area-wrap .widget_product_categories ul li ul li a:before,
	.footer-widget-area-wrap .widget_layered_nav ul li ul li a:before,
	.footer-widget-area-wrap .widget_layered_nav_filters ul li ul li a:before {
		background-color:<?php echo gvc_hex_to_rgba($gvc_footer_widget_area_text_color, 0.4); ?> !important;
	}

	.footer-widget-area-wrap .widget_recent_entries ul li .post-date {
		color:<?php echo gvc_hex_to_rgba($gvc_footer_widget_area_text_color, 0.6); ?> !important;
	}

	.footer-widget-area-wrap .widget_calendar caption,
	.footer-widget-area-wrap .widget_calendar td#prev,
	.footer-widget-area-wrap .widget_calendar td#next,
	.footer-widget-area-wrap .widget_calendar td {
		border-color:<?php echo gvc_hex_to_rgba($gvc_footer_widget_area_text_color, 0.2); ?>;
	}

	.footer-widget-area-wrap .widget_calendar th:first-child {
		border-left-color:<?php echo gvc_hex_to_rgba($gvc_footer_widget_area_text_color, 0.2); ?>;
	}

	.footer-widget-area-wrap .widget_calendar th:last-child {
		border-right-color:<?php echo gvc_hex_to_rgba($gvc_footer_widget_area_text_color, 0.2); ?>;
	}

	.footer-widget-area-wrap .widget_calendar td#today {
		background-color:<?php echo gvc_hex_to_rgba($gvc_footer_widget_area_text_color, 0.2); ?>;
	}

	.footer-widget-area-wrap .widget_rss ul li,
	.footer-widget-area-wrap .widget_recent_entries ul li,
	.footer-widget-area-wrap .widget_recent_comments ul li,
	.footer-widget-area-wrap .widget_twitter ul li,
	.footer-widget-area-wrap .widget_nav_menu ul li a {
		border-bottom-color:<?php echo gvc_hex_to_rgba($gvc_footer_widget_area_text_color, 0.2); ?>;
	}

	.footer-widget-area-wrap .widget_tag_cloud .tagcloud a,
	.footer-widget-area-wrap .widget_product_tag_cloud .tagcloud a {
		background-color:<?php echo gvc_hex_to_rgba($gvc_footer_widget_area_text_color, 0.2); ?>;
	}

	.footer-widget-area-wrap .widget_tag_cloud .tagcloud a:hover,
	.footer-widget-area-wrap .widget_product_tag_cloud .tagcloud a:hover {
		background-color:<?php echo gvc_hex_to_rgba($gvc_footer_widget_area_text_color, 0.4); ?>;
	}

	.footer-widget-area-wrap textarea,
	.footer-widget-area-wrap select,
	.footer-widget-area-wrap input[type="date"],
	.footer-widget-area-wrap input[type="datetime"],
	.footer-widget-area-wrap input[type="datetime-local"],
	.footer-widget-area-wrap input[type="email"],
	.footer-widget-area-wrap input[type="month"],
	.footer-widget-area-wrap input[type="number"],
	.footer-widget-area-wrap input[type="password"],
	.footer-widget-area-wrap input[type="search"],
	.footer-widget-area-wrap input[type="tel"],
	.footer-widget-area-wrap input[type="text"],
	.footer-widget-area-wrap input[type="time"],
	.footer-widget-area-wrap input[type="url"],
	.footer-widget-area-wrap input[type="week"],
	.footer-widget-area-wrap .widget_price_filter .price_slider_amount .price_label {
		border-color:<?php echo gvc_hex_to_rgba($gvc_footer_widget_area_text_color, 0.2); ?>;
		color:<?php echo $gvc_footer_widget_area_text_color; ?>;
		background-color:<?php echo gvc_hex_to_rgba($gvc_footer_widget_area_text_color, 0.1); ?>;
	}

	.footer-widget-area-wrap textarea:focus,
	.footer-widget-area-wrap select:focus,
	.footer-widget-area-wrap input[type="date"]:focus,
	.footer-widget-area-wrap input[type="datetime"]:focus,
	.footer-widget-area-wrap input[type="datetime-local"]:focus,
	.footer-widget-area-wrap input[type="email"]:focus,
	.footer-widget-area-wrap input[type="month"]:focus,
	.footer-widget-area-wrap input[type="number"]:focus,
	.footer-widget-area-wrap input[type="password"]:focus,
	.footer-widget-area-wrap input[type="search"]:focus,
	.footer-widget-area-wrap input[type="tel"]:focus,
	.footer-widget-area-wrap input[type="text"]:focus,
	.footer-widget-area-wrap input[type="time"]:focus,
	.footer-widget-area-wrap input[type="url"]:focus,
	.footer-widget-area-wrap input[type="week"]:focus {
	 	background-color:<?php echo gvc_hex_to_rgba($gvc_footer_widget_area_text_color, 0.2); ?>;
	}

	.footer-widget-area-wrap .widget_shopping_cart .cart_list > li,
	.footer-widget-area-wrap .widget_products .product_list_widget > li,
	.footer-widget-area-wrap .widget_recently_viewed_products .product_list_widget > li,
	.footer-widget-area-wrap .widget_recent_reviews .product_list_widget > li,
	.footer-widget-area-wrap .widget_top_rated_products .product_list_widget > li,
	.footer-widget-area-wrap .buttons .button,
	.footer-widget-area-wrap .widget_price_filter .price_slider_amount .button,
	.footer-widget-area-wrap .widget_price_filter .price_slider_wrapper .ui-widget-content {
		background-color:<?php echo gvc_hex_to_rgba($gvc_footer_widget_area_text_color, 0.2); ?> !important;
	}

	.footer-widget-area-wrap .widget_price_filter .ui-slider .ui-slider-handle {
		background-color: <?php echo $gvc_footer_widget_area_text_color; ?> !important;
		border-color:<?php echo $gvc_footer_widget_area_text_color; ?> !important; 
	}

	.footer-widget-area-wrap .widget_recent_reviews .star-rating:before,
	.footer-widget-area-wrap .widget_top_rated_products .star-rating:before {
		color: <?php echo $gvc_footer_widget_area_text_color; ?> !important;
	}

	.footer-widget-area-wrap .icl_languages_selector #lang_sel_list.lang_sel_list_horizontal li a,
	.footer-widget-area-wrap .icl_languages_selector #lang_sel a:hover,
	.footer-widget-area-wrap .icl_languages_selector #lang_sel_click a:hover {
		background-color:<?php echo gvc_hex_to_rgba($gvc_footer_widget_area_text_color, 0.1); ?> !important;
	}

	.footer-widget-area-wrap .icl_languages_selector #lang_sel_list.lang_sel_list_horizontal li a:hover {
		background-color:<?php echo gvc_hex_to_rgba($gvc_footer_widget_area_text_color, 0.2); ?> !important;
	}

	.footer-widget-area-wrap .icl_languages_selector #lang_sel a,
	.footer-widget-area-wrap .icl_languages_selector #lang_sel_click a {
		border-color:<?php echo gvc_hex_to_rgba($gvc_footer_widget_area_text_color, 0.2); ?> !important;
		background-color:<?php echo gvc_hex_to_rgba($gvc_footer_widget_area_text_color, 0.1); ?> !important;
	}

	.footer-widget-area-wrap .icl_languages_selector #lang_sel_list.lang_sel_list_vertical a,
	.footer-widget-area-wrap .icl_languages_selector #lang_sel > ul > li > a,
	.footer-widget-area-wrap .icl_languages_selector #lang_sel > ul > li > ul > li:last-child > a,
	.footer-widget-area-wrap .icl_languages_selector #lang_sel_click > ul > li > a,
	.footer-widget-area-wrap .icl_languages_selector #lang_sel_click > ul > li > ul > li:last-child > a {
		border-bottom-color:<?php echo gvc_hex_to_rgba($gvc_footer_widget_area_text_color, 0.2); ?> !important;
	}

	.footer-widget-area-wrap .icl_languages_selector #lang_sel a,
	.footer-widget-area-wrap .icl_languages_selector #lang_sel_list a:hover,
	.footer-widget-area-wrap .icl_languages_selector #lang_sel_click a,
	.footer-widget-area-wrap .icl_languages_selector #lang_sel_click a:hover {
		color: <?php echo $gvc_footer_widget_area_text_color; ?> !important;
	}

	.footer .footer-menu ul li a {
		line-height: <?php echo $gvc_footer_line_height; ?>px;
	}

/*====================================================================*/
/*	WPML FOOTER LANGUAGE SELECT
/*====================================================================*/

	#lang_sel_footer,
	#wpml_credit_footer {
		background-color:<?php echo $gvc_footer_background_color; ?> !important;
	}

	#lang_sel_footer ul li a,
	#wpml_credit_footer a {
		color:<?php echo $gvc_footer_text_color; ?> !important;
	}

	.icl_languages_selector #lang_sel_click a {
		font-size: <?php echo $gvc_content_font_size; ?>px !important;
		line-height: <?php echo $gvc_content_line_height; ?>px !important;
	}

/*====================================================================*/
/*	PORTFOLIO OPTIONS
/*====================================================================*/

	<?php if($gvc_portfolio_layout == "no-gap-grid"): ?>
		.post-type-archive-portfolio .page-content-container > .container,
		.tax-portfolio-category .page-content-container > .container,
		.tax-portfolio-tag .page-content-container > .container {
			width: 100%;
			max-width: 100%;
		}

		.post-type-archive-portfolio .page-content-container > .container > .content,
		.tax-portfolio-category .page-content-container > .container > .content,
		.tax-portfolio-tag .page-content-container > .container > .content {
			padding: 0;
		}
	<?php endif ?>

	<?php if($gvc['gvc-portfolio-solo-layout'] && $gvc['gvc-portfolio-solo-layout'] == 1): ?>
		.single-portfolio .page-content-container > .container {
			width: 100%;
			max-width: 100%;
		}
	<?php endif ?>

/*====================================================================*/
/*  STYLING OPTIONS
/*====================================================================*/

	<?php if(!is_404()): ?>

		html,
		html.dark-skin {
			background-color:<?php echo $gvc_site_background_color; ?>;
			<?php if(!empty($gvc_site_background_image)): ?>
				background-image:url(<?php echo $gvc_site_background_image; ?>);
				background-repeat:<?php echo $gvc_site_background_image_repeat; ?>;
				background-attachment: <?php echo $gvc_site_background_image_attachment; ?>;
				<?php if($gvc_site_background_image_size == "cover"): ?>
					-webkit-background-size: cover;
					-moz-background-size: cover;
					background-size: cover;
				<?php endif; ?>
				<?php 
					switch($gvc_site_background_image_position){

						case 'left_top':
	            		echo "background-position:left top;";
	                    break;

	                    case 'left_bottom':
	            		echo "background-position:left bottom;";
	                    break;

	                    case 'right_top':
	            		echo "background-position:right top;";
	                    break;

	                    case 'right_bottom':
	           			echo "background-position:right bottom;";
	                    break;

	                    case 'center_center':
	            		echo "background-position:center center;";
	                    break;

						default:
	            		echo "background-position:left top;";
	                    break;
					} 
				?>
			<?php endif; ?>
		}

	<?php endif; ?>
	
	button,
	input[type="reset"],
	input[type="submit"],
	input[type="button"],
	.button,
	.twitter_tweets_carousel,
	.post-gallery .flex-direction-nav a,
	.widget_categories ul li a:before,
	.widget_product_categories ul li a:before,
	.widget_layered_nav ul li a:before,
	.widget_layered_nav_filters ul li a:before,
	.widget_pages ul li a:before,
	.widget_nav_menu ul li a:before,
	.widget_archive ul li a:before,
	.sitemap-item ul li a:before,
	.table thead th,
	.gvc-highlight,
	.i-list.type-no-color li i.fa,
	.flex-direction-nav .flex-next,
	.flex-direction-nav .flex-prev,
	.progress-bar .progress-bar-line,
	.content-box .box .icon-wrap,
	.content-box.v1 > .box:hover,
	.tagline,
	.post-social-share .share-message,
	.recent-posts.v2 .post.format-link .post-meta-footer,
	.woocommerce .product .onsale,
	.woocommerce-tabs .tabs > li.active,
	.woocommerce .gvc-single-product-summary .product_meta > *:before,
	.ui-slider .ui-slider-range {
		background-color: <?php echo $gvc_temp_color; ?>;
	}

	.table thead th {
		border-color:<?php echo $gvc_temp_color; ?>; 
	}

	.post-social-share .share-message:after {
		border-color: transparent transparent transparent <?php echo $gvc_temp_color; ?>;
	}

	.content a:not(.button):not(.page-numbers),
	.format-quote .quote-author,
	.format-status .status-author,
	.format-chat .chat .name,
	.widget_calendar td a,
	.counter i.fa,
	.toggle-title.active .arrow,
	.tagline .button:hover,
	.tagline .button:hover {
		color: <?php echo $gvc_temp_color; ?>;
	}

	.post-author a:hover,
	.post-comments a:hover,
	.post-category a:hover,
	.single .project-category a:hover,
	.single .project-tags a:hover,
	.dark-skin .single .project-category a:hover,
	.dark-skin .single .project-tags a:hover,
	.post-body .post-title a:hover,
	.post-type-archive-portfolio .portfolio .post-body .project-category a:hover,
	.tax-portfolio-category .portfolio .post-body .project-category a:hover,
	.tax-portfolio-tag .portfolio .post-body .project-category a:hover,
	.widget_categories a:hover,
	.widget_pages a:hover,
	.widget_nav_menu a:hover,
	.widget_archive a:hover,
	.widget_product_categories a:hover,
	.widget_layered_nav a:hover,
	.widget_layered_nav_filters a:hover,
	.sitemap-item a:hover,
	.person .social-links a i,
	.recent-portfolio.v1 .post .project-category a:hover,
	.dark-skin .recent-portfolio.v1 .post .project-category a:hover,
	.woocommerce .gvc-single-product-summary .price,
	.woocommerce .gvc-single-product-summary .product_meta a:hover,
	.dark-skin .woocommerce .gvc-single-product-summary .product_meta a:hover,
	.woocommerce .star-rating,
	.woocommerce-page .star-rating,
	.content-box.v1 > .box:hover .icon-wrap i {
		color: <?php echo $gvc_temp_color; ?> !important;
	}

	.gvc-overlay,
	.widget_photos_from_flickr .flickr_badge_image a:before,
	.gvc-gallery .gallery-icon > a:before {
		background-color: <?php echo gvc_hex_to_rgba($gvc_temp_color, 0.9); ?>;
	}

	.content-box.v1 > .box .icon-wrap-border {border-color:<?php echo gvc_hex_to_rgba($gvc_temp_color, 0.7); ?>;}

	.mejs-controls .mejs-time-rail .mejs-time-loaded,
	.gvc-navigation li a:hover,
	.gvc-navigation li span.current,
	.woocommerce-pagination li a:hover,
	.woocommerce-pagination li span.current,
	.format-link .post-body {
		background:<?php echo $gvc_temp_color; ?> !important;
	}

	blockquote,
	.code {
		border-left-color:<?php echo $gvc_temp_color; ?>;
	}

	::-moz-selection {
		background-color:<?php echo $gvc_temp_color; ?>;
		color: #ffffff;
	}

	::selection {
		background-color:<?php echo $gvc_temp_color; ?>;
		color: #ffffff;
	}

/*====================================================================*/
/* RESPONSIVE
/*====================================================================*/
	
	@media only screen and (min-width: 1024px)  {

		.responsive-false.header .search-toggle i{
			color: <?php echo $gvc_menu_default_text_color; ?>;
		}

		.responsive-false .header-menu > ul > li:hover > a,
		.responsive-false.header .header-menu ul li:hover:before {
			color: <?php echo $gvc_menu_hover_text_color; ?>;
		}

		.responsive-false .header-menu > ul > li {
			border-radius:3px;
		}

		<?php if($gvc_menu_hover_effect == "fill"): ?>

			.responsive-false .header-menu > ul > li > a:hover {
				background-color: transparent;
			}
			.responsive-false .header-menu > ul > li:hover {
				background-color: <?php echo $gvc_menu_hover_effect_color; ?>;
			}

			<?php if ($gvc['gvc-one-page'] && $gvc['gvc-one-page'] == 1): ?>
				.responsive-false .header-menu > ul > li > a.one-page-active {
					background-color: <?php echo $gvc_menu_hover_effect_color; ?> !important;
					color: <?php echo $gvc_menu_hover_text_color; ?> !important;
				}
			<?php endif; ?>

		<?php elseif($gvc_menu_hover_effect == "underline"): ?>
			.responsive-false .header-menu > ul > li > a:before {
				content: "";
				width: 30px;
				height: 3px;
				display: block;
				left: 50%;
				margin-left: -15px;
				bottom:0px;
				visibility: hidden;
				position: absolute;
				-webkit-transition: all ease 0.15s;
				-moz-transition: all ease 0.15s;
				-o-transition: all ease 0.15s;
				-ms-transition: all ease 0.15s;
				transition: all ease 0.15s;
			}
			.responsive-false .header-menu > ul > li:hover > a:before {
				background-color: <?php echo $gvc_menu_hover_effect_color; ?>;
				visibility: visible;
			}

			<?php if ($gvc['gvc-one-page'] && $gvc['gvc-one-page'] == 1): ?>
				.responsive-false .header-menu > ul > li > a.one-page-active:before {
					background-color: <?php echo $gvc_menu_hover_effect_color; ?>;
					visibility: visible;
				}
			<?php endif; ?>

		<?php endif; ?>

		.responsive-false.header .header-menu > ul > li > a > .gvc-da {
			border-bottom-color:<?php echo $gvc_submenu_top_bottom_border_color; ?>;
		}

		.responsive-false.header .header-menu ul ul li a,
		.responsive-false.header .header-menu > ul > li ul.submenu-languages li.menu-item-language > a {

			background:<?php echo gvc_hex_to_rgba($gvc_submenu_background_color, $gvc_submenu_opacity); ?>;
			color:<?php echo $gvc_submenu_text_color; ?>;
			text-transform: <?php echo $gvc_submenu_text_transform; ?>;
			font-weight: <?php echo $gvc_submenu_font_weight; ?>;
			font-family: <?php gvc_font_family_styles($gvc_submenu_font_family); ?>;
			font-size: <?php echo $gvc_submenu_font_size.'px'; ?>;
			border-top-color:<?php echo $gvc_submenu_border_color; ?>;
		}

		.responsive-false.header .header-menu ul ul li:before {
			color:<?php echo $gvc_submenu_text_color; ?>;
		}

		.responsive-false.header .header-menu ul ul > li:first-child > a {
			border-top-color:<?php echo $gvc_submenu_top_bottom_border_color; ?>;
		}

		.responsive-false.header .header-menu ul ul > li:last-child > a {
			border-bottom-color:<?php echo $gvc_submenu_top_bottom_border_color; ?>;
		}

		.responsive-false.header .header-menu ul ul li:hover > a {
			background:<?php echo gvc_hex_to_rgba($gvc_submenu_hover_background_color, $gvc_submenu_opacity); ?>;
			color:<?php echo $gvc_submenu_hover_text_color; ?>;
		}

		.responsive-false.header .header-menu ul ul li:hover:before {
			color:<?php echo $gvc_submenu_hover_text_color; ?>;
		}

		.responsive-false.header .header-menu ul ul li:hover > a:after {
			color:<?php echo $gvc_submenu_hover_text_color; ?>;
		}

		/*Megamenu*/
		.responsive-false.header .header-menu ul li.megamenu > .megamenu-submenu-wrap > ul {
			background:<?php echo gvc_hex_to_rgba($gvc_submenu_background_color, $gvc_submenu_opacity); ?>;
			color:<?php echo $gvc_submenu_text_color; ?>;
			text-transform: <?php echo $gvc_submenu_text_transform; ?>;
			font-weight: <?php echo $gvc_submenu_font_weight; ?>;
			font-family: <?php gvc_font_family_styles($gvc_submenu_font_family); ?>;
			font-size: <?php echo $gvc_submenu_font_size.'px'; ?>;
			border-top-color:<?php echo $gvc_submenu_top_bottom_border_color; ?>;
			border-bottom-color:<?php echo $gvc_submenu_top_bottom_border_color; ?>;
		}

		.responsive-false.header .header-menu ul li.megamenu > .megamenu-submenu-wrap > ul ul li:hover > a {
			background:<?php echo gvc_hex_to_rgba($gvc_submenu_hover_background_color, $gvc_submenu_opacity); ?> !important;
			color:<?php echo $gvc_submenu_hover_text_color; ?> !important;
		}

		.responsive-false.header .header-menu ul > li.megamenu .megamenu-submenu-wrap > ul > li {
			border-right-color:<?php echo $gvc_submenu_border_color; ?>;
		}

		.responsive-false.header .header-menu ul li.megamenu > .megamenu-submenu-wrap > ul > li > a {
			<?php if(!empty($gvc_megamenu_top_level_background_color)): ?>
				background:<?php echo gvc_hex_to_rgba($gvc_megamenu_top_level_background_color, $gvc_submenu_opacity); ?> !important;
			<?php endif; ?>
			color:<?php echo $gvc_megamenu_top_level_text_color; ?>;
			text-transform: <?php echo $gvc_megamenu_top_level_text_transform; ?>;
			font-weight: <?php echo $gvc_megamenu_top_level_font_weight;?>
		}
		.responsive-false.header .header-menu ul li.megamenu > .megamenu-submenu-wrap > ul > li:hover > a {
			<?php if(!empty($gvc_megamenu_top_level_hover_background_color)): ?>
				background:<?php echo $gvc_megamenu_top_level_hover_background_color; ?> !important;
			<?php endif; ?>
			color:<?php echo $gvc_megamenu_top_level_hover_text_color; ?>;
		}

		.responsive-false.header .header-menu ul li.megamenu > .megamenu-submenu-wrap > ul > li:before {
			color:<?php echo $gvc_megamenu_top_level_text_color; ?>;
		}

		.responsive-false.header .header-menu ul li.megamenu > .megamenu-submenu-wrap > ul > li:hover:before {
			color:<?php echo $gvc_megamenu_top_level_hover_text_color; ?>;
		}

		.responsive-false.header .header-menu ul li.megamenu > .megamenu-submenu-wrap > ul > li > ul > li > a {
			<?php if(!empty($gvc_megamenu_sub_level_background_color)): ?>
				background:<?php echo gvc_hex_to_rgba($gvc_megamenu_sub_level_background_color, $gvc_submenu_opacity); ?> !important;
			<?php endif; ?>
			color:<?php echo $gvc_megamenu_sub_level_text_color; ?>;
			text-transform: <?php echo $gvc_megamenu_sub_level_text_transform; ?>;
		}
		.responsive-false.header .header-menu ul li.megamenu > .megamenu-submenu-wrap > ul > li > ul > li:hover > a {
			<?php if(!empty($gvc_megamenu_sub_level_hover_background_color)): ?>
				background:<?php echo $gvc_megamenu_sub_level_hover_background_color; ?> !important;
			<?php endif; ?>
			color:<?php echo $gvc_megamenu_sub_level_hover_text_color; ?>;
		}

		<?php if($gvc_megamenu_border == "false"): ?>

			.responsive-false.header .header-menu ul > li.megamenu .megamenu-submenu-wrap > ul > li {
				border-right:none !important; 
			}

		<?php endif; ?>

		<?php if($gvc_megamenu_submenu_border == "true"): ?>
			.responsive-false.header .header-menu ul > li.megamenu .megamenu-submenu-wrap > ul > li > ul > li > a {
				border-bottom:1px solid <?php echo $gvc_submenu_border_color; ?> !important;
			}
			.responsive-false.header .header-menu ul > li.megamenu .megamenu-submenu-wrap > ul > li > ul > li:first-child > a {
				border-top:1px solid <?php echo $gvc_submenu_border_color; ?> !important;
			}
			.responsive-false.header .header-menu ul > li.megamenu .megamenu-submenu-wrap > ul > li > ul > li:last-child > a {
				border-bottom:none !important;
			}
		<?php endif; ?>
		

		/*WooCommerce Shoping cart*/

		.responsive-false .cart-toggle,
		.responsive-false .cart-toggle > a,
		.responsive-false .cart-toggle > a > i {
			color:<?php echo $gvc_shop_cart_text_color; ?>
			
		}

		<?php if(!empty($gvc_shop_cart_background_color)): ?>
			.responsive-false .cart-toggle {
				background-color:<?php echo $gvc_shop_cart_background_color; ?> !important;
				padding:0px 10px;
				border-radius: 3px;
			}
		<?php endif; ?>

		.header-top #lang_sel ul li ul li a {
			background-color: <?php echo $gvc_header_social_links_hover_background_color; ?> !important;
		}

		.header-top #lang_sel ul li:hover > a {
			background-color: <?php echo $gvc_header_social_links_hover_background_color; ?> !important;
			color: <?php echo $gvc_header_social_links_hover_color; ?> !important;
		}

	}

	@media only screen and (min-width: 1280px)  {

		.responsive-true.header .search-toggle i{
			color: <?php echo $gvc_menu_default_text_color; ?>;
		}

		.responsive-true .header-menu > ul > li:hover > a,
		.responsive-true.header .header-menu ul li:hover:before {
			color: <?php echo $gvc_menu_hover_text_color; ?>;
		}

		.responsive-true .header-menu > ul > li {
			border-radius:3px;
		}

		<?php if($gvc_menu_hover_effect == "fill"): ?>

			.responsive-true .header-menu > ul > li > a:hover {
				background-color: transparent;
			}
			.responsive-true .header-menu > ul > li:hover {
				background-color: <?php echo $gvc_menu_hover_effect_color; ?>;
			}

			<?php if ($gvc['gvc-one-page'] && $gvc['gvc-one-page'] == 1): ?>
				.responsive-true .header-menu > ul > li > a.one-page-active {
					background-color: <?php echo $gvc_menu_hover_effect_color; ?> !important;
					color: <?php echo $gvc_menu_hover_text_color; ?> !important;
				}
			<?php endif; ?>

		<?php elseif($gvc_menu_hover_effect == "underline"): ?>
			.responsive-true .header-menu > ul > li > a:before {
				content: "";
				width: 30px;
				height: 3px;
				display: block;
				left: 50%;
				margin-left: -15px;
				bottom:0px;
				visibility: hidden;
				position: absolute;
				-webkit-transition: all ease 0.15s;
				-moz-transition: all ease 0.15s;
				-o-transition: all ease 0.15s;
				-ms-transition: all ease 0.15s;
				transition: all ease 0.15s;
			}
			.responsive-true .header-menu > ul > li:hover > a:before {
				background-color: <?php echo $gvc_menu_hover_effect_color; ?>;
				visibility: visible;
			}

			<?php if ($gvc['gvc-one-page'] && $gvc['gvc-one-page'] == 1): ?>
				.responsive-true .header-menu > ul > li > a.one-page-active:before {
					background-color: <?php echo $gvc_menu_hover_effect_color; ?>;
					visibility: visible;
				}
			<?php endif; ?>

		<?php endif; ?>

		.responsive-true.header .header-menu > ul > li > a > .gvc-da {
			border-bottom-color:<?php echo $gvc_submenu_top_bottom_border_color; ?>;
		}

		.responsive-true.header .header-menu ul ul li a,
		.responsive-true.header .header-menu > ul > li ul.submenu-languages li.menu-item-language > a {

			background:<?php echo gvc_hex_to_rgba($gvc_submenu_background_color, $gvc_submenu_opacity); ?>;
			color:<?php echo $gvc_submenu_text_color; ?>;
			text-transform: <?php echo $gvc_submenu_text_transform; ?>;
			font-weight: <?php echo $gvc_submenu_font_weight; ?>;
			font-family: <?php gvc_font_family_styles($gvc_submenu_font_family); ?>;
			font-size: <?php echo $gvc_submenu_font_size.'px'; ?>;
			border-top-color:<?php echo $gvc_submenu_border_color; ?>;
		}

		.responsive-true.header .header-menu ul ul li:before {
			color:<?php echo $gvc_submenu_text_color; ?>;
		}

		.responsive-true.header .header-menu ul ul > li:first-child > a {
			border-top-color:<?php echo $gvc_submenu_top_bottom_border_color; ?>;
		}

		.responsive-true.header .header-menu ul ul > li:last-child > a {
			border-bottom-color:<?php echo $gvc_submenu_top_bottom_border_color; ?>;
		}

		.responsive-true.header .header-menu ul ul li:hover > a {
			background:<?php echo gvc_hex_to_rgba($gvc_submenu_hover_background_color, $gvc_submenu_opacity); ?>;
			color:<?php echo $gvc_submenu_hover_text_color; ?>;
		}

		.responsive-true.header .header-menu ul ul li:hover:before {
			color:<?php echo $gvc_submenu_hover_text_color; ?>;
		}

		.responsive-true.header .header-menu ul ul li:hover > a:after {
			color:<?php echo $gvc_submenu_hover_text_color; ?>;
		}

		/*Megamenu*/
		.responsive-true.header .header-menu ul li.megamenu > .megamenu-submenu-wrap > ul {
			background:<?php echo gvc_hex_to_rgba($gvc_submenu_background_color, $gvc_submenu_opacity); ?>;
			color:<?php echo $gvc_submenu_text_color; ?>;
			text-transform: <?php echo $gvc_submenu_text_transform; ?>;
			font-weight: <?php echo $gvc_submenu_font_weight; ?>;
			font-family: <?php gvc_font_family_styles($gvc_submenu_font_family); ?>;
			font-size: <?php echo $gvc_submenu_font_size.'px'; ?>;
			border-top-color:<?php echo $gvc_submenu_top_bottom_border_color; ?>;
			border-bottom-color:<?php echo $gvc_submenu_top_bottom_border_color; ?>;
		}

		.responsive-true.header .header-menu ul li.megamenu > .megamenu-submenu-wrap > ul ul li:hover > a {
			background:<?php echo gvc_hex_to_rgba($gvc_submenu_hover_background_color, $gvc_submenu_opacity); ?> !important;
			color:<?php echo $gvc_submenu_hover_text_color; ?> !important;
		}

		.responsive-true.header .header-menu ul > li.megamenu .megamenu-submenu-wrap > ul > li {
			border-right-color:<?php echo $gvc_submenu_border_color; ?>;
		}

		.responsive-true.header .header-menu ul li.megamenu > .megamenu-submenu-wrap > ul > li > a {
			<?php if(!empty($gvc_megamenu_top_level_background_color)): ?>
				background:<?php echo gvc_hex_to_rgba($gvc_megamenu_top_level_background_color, $gvc_submenu_opacity); ?> !important;
			<?php endif; ?>
			color:<?php echo $gvc_megamenu_top_level_text_color; ?>;
			text-transform: <?php echo $gvc_megamenu_top_level_text_transform; ?>;
			font-weight: <?php echo $gvc_megamenu_top_level_font_weight;?>
		}
		.responsive-true.header .header-menu ul li.megamenu > .megamenu-submenu-wrap > ul > li:hover > a {
			<?php if(!empty($gvc_megamenu_top_level_hover_background_color)): ?>
				background:<?php echo $gvc_megamenu_top_level_hover_background_color; ?> !important;
			<?php endif; ?>
			color:<?php echo $gvc_megamenu_top_level_hover_text_color; ?>;
		}

		.responsive-true.header .header-menu ul li.megamenu > .megamenu-submenu-wrap > ul > li:before {
			color:<?php echo $gvc_megamenu_top_level_text_color; ?>;
		}

		.responsive-true.header .header-menu ul li.megamenu > .megamenu-submenu-wrap > ul > li:hover:before {
			color:<?php echo $gvc_megamenu_top_level_hover_text_color; ?>;
		}

		.responsive-true.header .header-menu ul li.megamenu > .megamenu-submenu-wrap > ul > li > ul > li > a {
			<?php if(!empty($gvc_megamenu_sub_level_background_color)): ?>
				background:<?php echo gvc_hex_to_rgba($gvc_megamenu_sub_level_background_color, $gvc_submenu_opacity); ?> !important;
			<?php endif; ?>
			color:<?php echo $gvc_megamenu_sub_level_text_color; ?>;
			text-transform: <?php echo $gvc_megamenu_sub_level_text_transform; ?>;
		}
		.responsive-true.header .header-menu ul li.megamenu > .megamenu-submenu-wrap > ul > li > ul > li:hover > a {
			<?php if(!empty($gvc_megamenu_sub_level_hover_background_color)): ?>
				background:<?php echo $gvc_megamenu_sub_level_hover_background_color; ?> !important;
			<?php endif; ?>
			color:<?php echo $gvc_megamenu_sub_level_hover_text_color; ?>;
		}

		<?php if($gvc_megamenu_border == "false"): ?>

			.responsive-true.header .header-menu ul > li.megamenu .megamenu-submenu-wrap > ul > li {
				border-right:none !important; 
			}

		<?php endif; ?>

		<?php if($gvc_megamenu_submenu_border == "true"): ?>
			.responsive-true.header .header-menu ul > li.megamenu .megamenu-submenu-wrap > ul > li > ul > li > a {
				border-bottom:1px solid <?php echo $gvc_submenu_border_color; ?> !important;
			}
			.responsive-true.header .header-menu ul > li.megamenu .megamenu-submenu-wrap > ul > li > ul > li:first-child > a {
				border-top:1px solid <?php echo $gvc_submenu_border_color; ?> !important;
			}
			.responsive-true.header .header-menu ul > li.megamenu .megamenu-submenu-wrap > ul > li > ul > li:last-child > a {
				border-bottom:none !important;
			}
		<?php endif; ?>
		

		/*WooCommerce Shoping cart*/

		.responsive-true .cart-toggle,
		.responsive-true .cart-toggle > a,
		.responsive-true .cart-toggle > a > i {
			color:<?php echo $gvc_shop_cart_text_color; ?>
			
		}

		<?php if(!empty($gvc_shop_cart_background_color)): ?>
			.responsive-true .cart-toggle {
				background-color:<?php echo $gvc_shop_cart_background_color; ?> !important;
				padding:0px 10px;
				border-radius: 3px;
			}
		<?php endif; ?>

	}

</style>

