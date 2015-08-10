/*====================================================================*/
/*  BUTTONS BUTTON
/*====================================================================*/
    
    (function() {    
        tinymce.PluginManager.add('gvc_button', function( editor) {
            editor.addButton( 'gvc_button', {
                text: 'Shortcodes',
				icon: 'dashicons-media-code',
                type: 'menubutton',
				menu: [
					{
						text: 'Text Button',
						onclick: function() {
							editor.insertContent('[gvc_button text="Button text" size="small medium large" target="_self 							_blank" icon="icon name" back_color="" color="" href="#" /]');  
						}
					},
					{
						text: 'Dropcap',
						onclick: function() {
						editor.insertContent('[dropcap type="empty full" color=""]' + editor.selection.getContent() + 
						'[/dropcap]');
						}
					},
					{
						text: 'Highlight',
						onclick: function() {
						editor.insertContent('[highlight color=""]' + editor.selection.getContent() + '[/highlight]');  
						}
					},
					{
						text: 'Splitter',
						onclick: function() {
						editor.insertContent('[splitter type="solid double dotted dashed-thick dashed-thin textured" color="" top="25" bottom="25" /]');  
						}
					},
					{
						text: 'Font Size',
						onclick: function() {
						editor.insertContent('[font_size font_size="22px" line_height="26px"]' + editor.selection.getContent() + '[/font_size]');  
						}
					},
					{
						text: 'Social Links',
						onclick: function() {
						editor.insertContent('[social_links align="left right center" target="_self _blank" rss="" facebook="" twitter="" google_plus="" youtube="" vimeo="" linkedin="" pinterest="" flickr="" instagram="" skype="" apple="" dribbble="" android="" email="" /]');
						}
					},
					{
						text: 'Icon Buttons',
						 onclick: function() {
						editor.insertContent('[icons icon="icon name" size="small medium large" type="circle square" icon_color="" background_color="" border_color="" /]');
						}
					},
					{
						text: 'Gap',
						onclick: function() {
						editor.insertContent('[gap height="25" /]');
						}
					},
					{
						text: 'Registered Users',
						onclick: function() {
						editor.insertContent('[registered_only]' + editor.selection.getContent() + '[/registered_only]'); 
						}
					},
					{
						text: 'Show Hide',
						onclick: function() {
						editor.insertContent('[show_hide lightbox="yes no"][gvc_button text="Button text" size="small medium large" target="_self _blank" icon="icon name" back_color="" color="" href="#" /][show_hide_content]' + editor.selection.getContent() + '[/show_hide_content][/show_hide]');
						}
					},
					{
						text: 'ColorBox',
						onclick: function() {
						editor.insertContent('[colorbox id="" color="" border_color="" background_color="" border_width="" border_radius="" padding="20px 20px 20px 20px" width="" align=""]' + editor.selection.getContent() + '[/colorbox]');  
						}
					},
					{
						text: 'Slider ColorBox',
						onclick: function() {
                    editor.insertContent('[slider_colorbox width="" color="" border_color="" background_color="" border_width="" border_radius="" padding="20px 20px 20px 20px"]' + editor.selection.getContent() + '[/slider_colorbox]');  
						}
					},
					{
						text: 'WideBox',
						onclick: function() {
						editor.insertContent('[widebox id="" shadow="" parallax="" text_color="" background_color="" background_image="" background_repeat="" background_position="" background_attachment="" border_size="" border_color="" padding_top="20" padding_bottom="20"]' + editor.selection.getContent() + '[/widebox]');  
						}
					},
					{
						text: 'Animated WideBox',
						onclick: function() {
						editor.insertContent('[animated_widebox id="" shadow="" parallax="" text_color="" background_color="" background_image="" background_repeat="" background_position="" background_attachment="" border_size="" border_color="" padding_top="20" padding_bottom="20" img_position="" img_src="" img_description="" content_animation="" img_animation="" animate="yes no"]' + editor.selection.getContent() + '[/animated_widebox]');  
						}
					},
					{
						text: 'FullBox',
						onclick: function() {
						editor.insertContent('[fullbox id="" padding_top="20" padding_bottom="20"]' + editor.selection.getContent() + '[/fullbox]');  
						}
					},
					{
						text: 'Slider Section',
						onclick: function() {
                    editor.insertContent('[section_slider id="" bullets="yes no" arrows="yes no" bullets_color="" bullets_align="left right center" autoplay="yes no"][section background_color="" background_image="" background_repeat="" background_position="" background_attachment="" padding_top="50" padding_bottom="50"]...[/section][/section_slider]');  
						}
					},
					{
						text: 'YouTube',
						onclick: function() {
                    editor.insertContent('[youtube id="" width=""/]');
						}
					},
					{
						text: 'Vimeo',
						onclick: function() {
                    editor.insertContent('[vimeo id="" width=""/]');
						}
					},
					{
						text: 'SoundCloud',
						onclick: function() {
                    editor.insertContent('[soundcloud url="" width="" height="" /]');
						}
					},
					{
						text: 'Icon List',
						onclick: function() {
                    editor.insertContent('[icon_list size="small medium large" type="circle square" icon="icon name" icon_color="" background_color=""]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/icon_list]');  
						}
					},
					{
						text: 'Columns 1/2',
						onclick: function() {
                    editor.insertContent('[one_half last="yes no"]' + editor.selection.getContent() + '[/one_half]');  
						}
					},
					{
						text: 'Column 1/3',
						onclick: function() {
                    editor.insertContent('[one_third last="yes no"]' + editor.selection.getContent() + '[/one_third]');  
						}
					},
					{
						text: 'Column 1/4',
						onclick: function() {
                    editor.insertContent('[one_quarter last="yes no"]' + editor.selection.getContent() + '[/one_quarter]');  
						}
					},
					{
						text: 'Column 2/3',
						onclick: function() {
                    editor.insertContent('[two_thirds last="yes no"]' + editor.selection.getContent() + '[/two_thirds]');  
						}
					},
					{
						text: 'Column 3/4',
						 onclick: function() {
                    editor.insertContent('[three_quarters last="yes no"]' + editor.selection.getContent() + '[/three_quarters]');
						}
					},
					{
						text: 'Tagline',
						onclick: function() {
                    editor.insertContent('[tagline title="title goes here" button_text="" button_link="" color="" back_color="" /]');
						}
					},
					{
						text: 'Ordinary Table',
						 onclick: function() {
                    editor.insertContent('[table align="left right center justify" header_color="" header_back_color=""][thead][th colspan="" rowspan=""]Head #1[/th][th colspan="" rowspan=""]Head #2[/th][th colspan="" rowspan=""]Head #3[/th][/thead][tbody][tr][td colspan="" rowspan=""]Item #1[/td][td colspan="" rowspan=""]Item #2[/td][td colspan="" rowspan=""]Item #3[/td][/tr][tr][td colspan="" rowspan=""]Item #4[/td][td colspan="" rowspan=""]Item #5[/td][td colspan="" rowspan=""]Item #6[/td][/tr][/tbody][/table]');
						}
					},
					{
						text: 'Alert',
						onclick: function() {
                    editor.insertContent('[alert type="note success warning error information"]' + editor.selection.getContent() + '[/alert]');
						}
					},
					{
						text: 'Code',
						onclick: function() {
                    editor.insertContent('[code]' + editor.selection.getContent() + '[/code]');
						}
					},
					{
						text: 'Google Map',
						onclick: function() {
                    editor.insertContent('[gmap zoom="18" coords="53.339381, -6.260405" type="roadmap satellite hybrid terrain grey" width="100%" height="480px" marker="" /]');
						}
					},
					{
						text: 'Slider',
						onclick: function() {
                    editor.insertContent('[media_slider][slide type="youtube vimeo img" id="youtube/vimeo id" src="image link goes here" description="" /][/media_slider]');  
						}
					},
					{
						text: 'Tabs',
						onclick: function() {
                    editor.insertContent('[tabs tab1="Tab title 1" tab2="Tab title 2" tab3="Tab title 3" type="horizontal vertical"][tab]Tab content 1[/tab][tab]Tab content 2[/tab][tab]Tab content 3[/tab][/tabs]');  
						}
					},
					{
						text: 'Accordion',
						onclick: function() {
                    editor.insertContent('[accordion collapsible="yes no"][toggle title="title goes here" open="yes no"]Toggle content 1[/toggle][toggle title="title goes here" open="yes no"]Toggle content 2[/toggle][toggle title="title goes here" open="yes no"]Toggle content 3[/toggle][/accordion]');  
						}
					},
					{
						text: 'Icon Progress-Bar',
						onclick: function() {
                    editor.insertContent('[icon_progress align="left right center" icon="icon name" number="10" active="8" inactive_color="" active_color="" /]');
						}
					},
					{
						text: 'Pricing Table',
						onclick: function() {
                    editor.insertContent('[pt columns="1 2 3 4 5" align="left right center justify"][pt_column target="self _blank" highlight="yes no" href="#" color="" price="99.99" tariff="Tariff" title="title goes here" button_text="Button text"][pt_row]Row 1[/pt_row][pt_row]Row 2[/pt_row][pt_row]Row 3[/pt_row][/pt_column][/pt]');
						}
					},
					{
						text: 'Progress Bar',
						onclick: function() {
                    editor.insertContent('[progress_container textured="yes no"][progress title="title goes here" percentage="75" gap="20" color="" bar_color="" track_color=""/][/progress_container]');
						}
					},
					{
						text: 'Progress Circle',
						onclick: function() {
                    editor.insertContent('[circle_progress_container align="left right center" ][circle_progress title="title goes here" percentage="75" color="" bar_color="" track_color=""/][/circle_progress_container]');
						}
					},
					{
						text: 'Counter',
						onclick: function() {
                    editor.insertContent('[counter_container align="left right center"][counter value="100" icon="icon name" title="title goes here" icon_color="" color=""/][/counter_container]');
						}
					},
					{
						text: 'ContentBox',
						onclick: function() {
                    editor.insertContent('[box_container columns="1 2 3 4" version="v1 v2" animate="yes no"][box title="title goes here" icon="icon name" icon_color="" icon_back_color="" link="#" link_text="Read more"]Box content goes here[/box][/box_container]');
						}
					},
					{
						text: 'Client',
						 onclick: function() {
                    editor.insertContent('[clients carousel="yes no" autoplay="yes no" columns="1 2 3 4 5 6"][client href="link goes here" target="_self _blank" src="image link goes here" name="Client name"/][/clients]');
						}
					},
					{
						text: 'Testimonials',
						onclick: function() {
                    editor.insertContent('[testimonials color=""][testimonial name="Name Surname" company="Company"]Testimonial content goes here[/testimonial][/testimonials]');
						}
					},
					{
						text: 'Person',
						onclick: function() {
                    editor.insertContent('[persons columns="1 2 3 4" animate="yes no"][person target="_self _blank" src="image link goes here" name="Name Surname" title="title" twitter="#" facebook="#" linkedin="#" google-plus="#" email="mailto:email@email.com" bio="' + editor.selection.getContent() + '"][/persons]');
						}
					},
					{
						text: 'Carousel',
						onclick: function() {
                    editor.insertContent('[carousel columns="1 2 3 4 5 6" autoplay="yes no"][item]...[/item][item]...[/item][item]...[/item][item]...[/item][item]...[/item][/carousel]');  
						}
					},
					{
						text: 'Recent Posts',
						onclick: function() {
                    editor.insertContent('[recent_posts columns="1 2 3 4" version="v1 v2" limit="150" color="" posts_number="3" /]');
						}
					},
					{
						text: 'Recent Portfolio',
						onclick: function() {
                    editor.insertContent('[recent_portfolio columns="1 2 3 4" posts_number="3" category="" version="v1 v2 v3" animate="yes no" /]');
						}
					}
				]
            });
        });
    })();
