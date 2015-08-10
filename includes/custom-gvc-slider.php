<?php

/*====================================================================*/
/*	REGISTER gvc-SLIDER
/*====================================================================*/

	function gvc_slider() {

		$labels = array(
			'name'               => __('gvc slider', TEMP_NAME),
			'singular_name'      => __('Slider', TEMP_NAME),
			'add_new'            => __('Add new', TEMP_NAME),
			'add_new_item'       => __('Add new slide', TEMP_NAME),
			'edit_item'          => __('Edit slide', TEMP_NAME),
			'new_item'           => __('New slide', TEMP_NAME),
			'all_items'          => __('All slides', TEMP_NAME),
			'view_item'          => __('View slide', TEMP_NAME),
			'search_items'       => __('Search slides', TEMP_NAME),
			'not_found'          => __('No slides found', TEMP_NAME),
			'not_found_in_trash' => __('No slides found in trash', TEMP_NAME), 
			'parent_item_colon'  => '',
			'menu_name'          => __('gvc slider', TEMP_NAME),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true, 
			'show_in_menu'       => true, 
			'query_var'          => true,
			'rewrite'            => array('slug' => 'gvc-slider'),
			'capability_type'    => 'post',
			'has_archive'        => false, 
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon'          => '',
			'supports'           => array('title')
		); 

		register_post_type( 'gvc-slider', $args );
	}
	add_action( 'init', 'gvc_slider' );

/*====================================================================*/
/* gvc SLIDER SETTINGS
/*====================================================================*/

	/*----------------------------------------------------------------*/
	/* Setting registration
	/*----------------------------------------------------------------*/
	
		add_action( 'admin_menu', 'gvc_slider_settings' );
		function gvc_slider_settings(){
			add_submenu_page(
				'edit.php?post_type=gvc-slider',
				__( 'gvc slider settings', TEMP_NAME),
				__( 'Settings', TEMP_NAME),
				'administrator',
				'gvc_slider_settings',
				'render_gvc_slider_settings'
			);

			add_submenu_page(
				'edit.php?post_type=gvc-slider',
				__( 'Order slides', TEMP_NAME),
				__( 'Order slides', TEMP_NAME),
				'administrator',
				'gvc_slider_order',
				'render_gvc_slider_order'
			);
		}

		function render_gvc_slider_settings(){	
		?>
			<div class="gvc-slider-settings">
				<div class="gvc-slider-logo">
					<a href="http://www.goverticalcreative.com" title="gvc Slider" target="_blank">
						<img src="<?php echo IMG_ASSETS."/logo_white.png" ?>" alt="gvc Slider">
					</a>
				</div>
				<?php settings_errors(); ?>

				<form method="post" action="options.php">
					<?php
					
						settings_fields( 'gvc_slider_settings' );
						do_settings_sections( 'gvc_slider_settings' );
						submit_button();
					
					?>
				</form>
			</div>

		<?php }

		function render_gvc_slider_order(){	
		?>
			<div class="gvc-slider-order">
				<div class="gvc-slider-logo">
					<a href="http://www.gvc.com" title="gvc Slider" target="_blank">
						<img src="<?php echo IMG_ASSETS."/logo_white.png" ?>" alt="gvc Slider">
					</a>
				</div>
				<div>
					<h2><?php echo __("Sort slides", TEMP_NAME) ?></h2>
					<p><?php echo __("Simply drag the slides up or down and they will be saved in that order.", TEMP_NAME) ?></p>
				</div>
				<div class="gvc-success">
					<?php echo __("Slide order has been updated successfully!", TEMP_NAME) ?>
				</div>
				<div class="gvc-error">
					<?php echo __("An error occurred. Slide order has not been updated successfully!", TEMP_NAME) ?>
				</div>
				<br>
				<?php

					global $post;

					$gvc_slides_terms = get_terms("slider-group");

					$gvc_slides_opt = array( 
						'post_type'      => 'gvc-slider', 
						'posts_per_page' => -1, 
						'order'          => 'ASC', 
						'orderby'        => 'menu_order' 
					);

				?>
				<?php $slides = new WP_Query($gvc_slides_opt); ?>
				<?php if( $slides->have_posts() ) : ?>
					<div class="gvc-slider-order-wrap">
						<div class="gvc-slider-order-headers">
							<div class="column-order"><?php echo __("Order", TEMP_NAME); ?></div>
							<div class="column-title"><?php echo __("Title", TEMP_NAME); ?></div>
							<div class="column-thumbnail"><?php echo __("Background image", TEMP_NAME); ?></div>
						</div>
						<ul class="gvc-slider-excrepts" data-post-type="gvc-slider">
						<?php while( $slides->have_posts() ) : $slides->the_post(); ?>
							<li id="post-<?php the_ID(); ?>">
								<div class="column-order"><img class="gvc-move" src="<?php echo IMG_ASSETS.'/move_icon.png'; ?>" title="<?php echo __("Move Icon", TEMP_NAME); ?>" alt="<?php echo __("Move Icon", TEMP_NAME); ?>"></div>
								<div class="column-title"><strong><?php the_title(); ?></strong></div>
								<div class="column-thumbnail">
									<?php 
										$values = get_post_custom();
										if (empty($values["background_image"][0])) {
											echo '<img src="'.IMG_ASSETS.'/placeholders/gvc_slider_placeholder.png" alt="'.__("Slide background image").'">';
										} else {
											echo '<img src="'.$values["background_image"][0].'" alt="'.__("Slide background image").'">';
										}
									?>
								</div>
							</li>
						<?php endwhile; ?>
						</ul>
					</div>
					<br>
				<?php else: ?>
					<p><?php echo __("No slides found, why not", TEMP_NAME)." <a href='post-new.php?post_type=gvc-slider'>".__("create one?", TEMP_NAME)."</a>" ?></p>
				<?php endif; ?>
				<?php wp_reset_postdata();?>
			</div>

		<?php }

		add_action( 'wp_ajax_gvc_update_post_order', 'gvc_update_post_order' );

		function gvc_update_post_order() {
			global $wpdb;
			$post_type = $_POST['gvc-slider'];
			$order     = $_POST['order'];
			foreach( $order as $menu_order => $post_id )
			{
				$post_id    = intval( str_ireplace( 'post-', '', $post_id ) );
				$menu_order = intval($menu_order);
				$_POST['menu_order'] = $menu_order;
				wp_update_post( array( 'ID' => $post_id, 'menu_order' => $menu_order ) );
			}

			die( '1' );
		}

	/*----------------------------------------------------------------*/
	/* Section, settings
	/*----------------------------------------------------------------*/

		function gvc_slider_default_settings(){
			$defaults = array(
				'gvc_slider'                 => 'no',
				'gvc_slider_height'          => '400',
				'gvc_slider_transition'      => 'fade',
				'gvc_slider_autoplay'        => 'no',
				'gvc_slider_bullets'         => 'no',
				'gvc_slider_autoplaydelay'   => '5000'
			);
			return apply_filters( 'gvc_slider_default_settings', $defaults );
		}
		
		function initialize_gvc_slider_settings (){

			if( false == get_option( 'gvc_slider_settings' ) ) {	
				add_option( 'gvc_slider_settings', apply_filters( 'gvc_slider_default_settings', gvc_slider_default_settings() ) );
			}

			add_settings_section( 
		        'gvc_slider_settings_section',
		        'gvc slider settings',
		        'gvc_slider_settings_callback',
		        'gvc_slider_settings'
		    );

		    add_settings_field(	
				'gvc_slider',
				__( 'Turn On gvc Slider:', TEMP_NAME),
				'gvc_slider_callback',
				'gvc_slider_settings',
				'gvc_slider_settings_section',
				array(__('Check to activate gvc Slider', TEMP_NAME))
			);

			add_settings_field(	
				'gvc_slider_mobile',
				__( 'Turn On gvc Slider On Mobile Devices:', TEMP_NAME),
				'gvc_slider_mobile_callback',
				'gvc_slider_settings',
				'gvc_slider_settings_section',
				array(__('Check to activate gvc Slider on mobile devices', TEMP_NAME))
			);

			add_settings_field(	
				'gvc_slider_height',
				__( 'Slider height (px):', TEMP_NAME),
				'gvc_slider_height_callback',
				'gvc_slider_settings',
				'gvc_slider_settings_section',
				array(__('Set the height in px for the gvc slider (optimal is 400px to 600px)', TEMP_NAME))
			);

			add_settings_field(	
				'gvc_slider_transition',
				__( 'Slider transition:', TEMP_NAME),
				'gvc_slider_transition_callback',
				'gvc_slider_settings',
				'gvc_slider_settings_section',
				array(__('Choose transition for gvc slider, default is fade', TEMP_NAME))
			);

			add_settings_field(	
				'gvc_slider_autoplay',
				__( 'Autoplay:', TEMP_NAME),
				'gvc_slider_autoplay_callback',
				'gvc_slider_settings',
				'gvc_slider_settings_section',
				array(__('Cause gvc slider to automatically change between slides over a period of time, as defined in Autoplay delay', TEMP_NAME))
			);

			add_settings_field(	
				'gvc_slider_bullets',
				__( 'Bullets:', TEMP_NAME),
				'gvc_slider_bullets_callback',
				'gvc_slider_settings',
				'gvc_slider_settings_section',
				array(__('Add bullets navigation to gvc slider', TEMP_NAME))
			);

			add_settings_field(	
				'gvc_slider_autoplaydelay',
				__( 'Autoplay delay:', TEMP_NAME),
				'gvc_slider_autoplaydelay_callback',
				'gvc_slider_settings',
				'gvc_slider_settings_section',
				array(__('The duration in milliseconds at which slides should remain on screen before animating to the next. (optimal is not less than 5000ms)', TEMP_NAME))
			);

			register_setting(  
		        'gvc_slider_settings',  
		        'gvc_slider_settings'  
		    );
			
		}
		add_action( 'admin_init', 'initialize_gvc_slider_settings' );

	/*----------------------------------------------------------------*/
	/* Settigns callback
	/*----------------------------------------------------------------*/

		function gvc_slider_settings_callback() {  
		    echo '<p class="gvc-section-description">'.__("Set gvc slider settings", TEMP_NAME).'</p>';  
		}

		function gvc_slider_callback($args) {

			$settings = get_option('gvc_slider_settings');

			if(!isset($settings['gvc_slider'])) {
				$settings['gvc_slider'] = "no";
			}

			$output = "";

			$output .= '<input type="checkbox" id="gvc_slider_settings[gvc_slider]" name="gvc_slider_settings[gvc_slider]" value="yes" '.checked("yes", $settings["gvc_slider"], false ).'>';
			$output .= '<p>'.$args[0].'</p>';

			echo $output;
		     
		}

		function gvc_slider_mobile_callback($args) {

			$settings = get_option('gvc_slider_settings');

			if(!isset($settings['gvc_slider_mobile'])) {
				$settings['gvc_slider_mobile'] = "no";
			}

			$output = "";

			$output .= '<input type="checkbox" id="gvc_slider_settings[gvc_slider_mobile]" name="gvc_slider_settings[gvc_slider_mobile]" value="yes" '.checked("yes", $settings["gvc_slider_mobile"], false ).'>';
			$output .= '<p>'.$args[0].'</p>';

			echo $output;
		     
		}

		function gvc_slider_height_callback($args) {

			$settings = get_option('gvc_slider_settings');
			$gvc_slider_height = (isset($settings['gvc_slider_height']) && absint($settings['gvc_slider_height'])) ? esc_attr($settings['gvc_slider_height']) : 400;
      
		    $output = '<input type="text" id=gvc_slider_settings[gvc_slider_height]" name="gvc_slider_settings[gvc_slider_height]" value="'.$settings['gvc_slider_height'].'"/><p>'. $args[0].'</p>';
		    echo $output; 
		     
		}

		function gvc_slider_autoplay_callback($args) {

			$settings = get_option('gvc_slider_settings');

			if(!isset($settings['gvc_slider_autoplay'])) {
				$settings['gvc_slider_autoplay'] = "no";
			}

			$output = "";

			$output .= '<input type="checkbox" id="gvc_slider_settings[gvc_slider_autoplay]" name="gvc_slider_settings[gvc_slider_autoplay]" value="yes" '.checked("yes", $settings["gvc_slider_autoplay"], false ).'>';
			$output .= '<p>'.$args[0].'</p>';

			echo $output;
		     
		}

		function gvc_slider_transition_callback($args) {

			$settings = get_option('gvc_slider_settings');

			if(!isset($settings['gvc_slider_transition'])) {
				$settings['gvc_slider_transition'] = "fade";
			}

			$output = "";

			$output .= '<select id="gvc_slider_settings[gvc_slider_transition]" name="gvc_slider_settings[gvc_slider_transition]" >';
				$output .= '<option value="fade">'.__('Fade', TEMP_NAME).'</option>';
				$output .= '<option value="soft-scale"'.selected( $settings['gvc_slider_transition'], 'soft-scale', false) . '>'.__('Soft scale', TEMP_NAME).'</option>';
				$output .= '<option value="press-away"'.selected( $settings['gvc_slider_transition'], 'press-away', false) . '>'.__('Press away', TEMP_NAME).'</option>';
				$output .= '<option value="side-swing"'.selected( $settings['gvc_slider_transition'], 'side-swing', false) . '>'.__('Side swing', TEMP_NAME).'</option>';
				$output .= '<option value="fortune-wheel"'.selected( $settings['gvc_slider_transition'], 'fortune-wheel', false) . '>'.__('Fortune wheel', TEMP_NAME).'</option>';
				$output .= '<option value="push-reveal"'.selected( $settings['gvc_slider_transition'], 'push-reveal', false) . '>'.__('Push reveal', TEMP_NAME).'</option>';
				$output .= '<option value="stick-it"'.selected( $settings['gvc_slider_transition'], 'stick-it', false) . '>'.__('Stick it', TEMP_NAME).'</option>';
				$output .= '<option value="archive-me"'.selected( $settings['gvc_slider_transition'], 'archive-me', false) . '>'.__('Archive me', TEMP_NAME).'</option>';
				$output .= '<option value="vertical-growth"'.selected( $settings['gvc_slider_transition'], 'vertical-growth', false) . '>'.__('Vertical growth', TEMP_NAME).'</option>';
				$output .= '<option value="soft-pulse"'.selected( $settings['gvc_slider_transition'], 'soft-pulse', false) . '>'.__('Soft pulse', TEMP_NAME).'</option>';
				$output .= '<option value="cliff-diving"'.selected( $settings['gvc_slider_transition'], 'cliff-diving', false) . '>'.__('Cliff diving', TEMP_NAME).'</option>';
			$output .= '</select>';
			$output .= '<p>'.$args[0].'</p>';

			echo $output;
		     
		}

		function gvc_slider_bullets_callback($args) {

			$settings = get_option('gvc_slider_settings');

			if(!isset($settings['gvc_slider_bullets'])) {
				$settings['gvc_slider_bullets'] = "no";
			}

			$output = "";

			$output .= '<input type="checkbox" id="gvc_slider_settings[gvc_slider_bullets]" name="gvc_slider_settings[gvc_slider_bullets]" value="yes" '.checked("yes", $settings["gvc_slider_bullets"], false ).'>';
			$output .= '<p>'.$args[0].'</p>';

			echo $output;
		     
		}

		function gvc_slider_autoplaydelay_callback($args) {

			$settings = get_option('gvc_slider_settings');
			$gvc_slider_autoplaydelay = (isset($settings['gvc_slider_autoplaydelay']) && is_numeric($settings['gvc_slider_autoplaydelay'])) ? esc_attr($settings['gvc_slider_autoplaydelay']) : 5000;
      
		    $output = '<input type="text" id="gvc_slider_autoplaydelay" name="gvc_slider_settings[gvc_slider_autoplaydelay]" value="'.$gvc_slider_autoplaydelay.'"/><p>'. $args[0].'</p>';
		    echo $output; 
		     
		}

/*====================================================================*/
/* EASING
/*====================================================================*/

    $nz_easing = array(
			'linear' => array(
				'label' => 'Linear',
				'value' => 'cubic-bezier(0.250, 0.250, 0.750, 0.750)'
			), 
			'ease' => array(
				'label' => 'Ease',
				'value' => 'cubic-bezier(0.250, 0.100, 0.250, 1.000)'
			), 
			'ease-out' => array(
				'label' => 'Ease-out',
				'value' => 'cubic-bezier(0.000, 0.000, 0.580, 1.000)'
			),
			'ease-out-quard' => array(
				'label' => 'EaseOutQuard',
				'value' => 'cubic-bezier(0.250, 0.460, 0.450, 0.940)'
			),
			'ease-out-cubic' => array(
				'label' => 'EaseOutCubic',
				'value' => 'cubic-bezier(0.215, 0.610, 0.355, 1.000)'
			),
			'ease-out-quart' => array(
				'label' => 'EaseOutQuart',
				'value' => 'cubic-bezier(0.165, 0.840, 0.440, 1.000)'
			),
			'ease-out-quint' => array(
				'label' => 'EaseOutQuint',
				'value' => 'cubic-bezier(0.230, 1.000, 0.320, 1.000)'
			),
			'ease-out-sine' => array(
				'label' => 'EaseOutSine',
				'value' => 'cubic-bezier(0.390, 0.575, 0.565, 1.000)'
			),
			'ease-out-expo' => array(
				'label' => 'EaseOutExpo',
				'value' => 'cubic-bezier(0.190, 1.000, 0.220, 1.000)'
			),
			'ease-out-circ' => array(
				'label' => 'EaseOutCirc',
				'value' => 'cubic-bezier(0.075, 0.820, 0.165, 1.000)'
			),
			'ease-out-back' => array(
				'label' => 'EaseOutBack',
				'value' => 'cubic-bezier(0.175, 0.885, 0.320, 1.275)'
			)
		);

	$gvc_slider_settings = get_option('gvc_slider_settings');
	$gvc_slider_height = empty($gvc_slider_settings["gvc_slider_height"]) ? 500 : $gvc_slider_settings["gvc_slider_height"];

/*====================================================================*/
/*	gvc SLIDE OPTIONS
/*====================================================================*/

	add_action("admin_init", "gvc_slider_add_meta_box");
	function gvc_slider_add_meta_box(){

		add_meta_box(
			"gvc-slide-options", 
			__("gvc Slide Options", TEMP_NAME),
			"render_gvc_slide_options", 
			"gvc-slider",
			"normal", 
			"high"
		);

	}

	function render_gvc_slide_options($post) {

		global $nz_easing, $gvc_slider_height;
    	
    	$values = get_post_custom( $post->ID );
    	$background_image            = isset( $values['background_image'] ) ? esc_url( $values["background_image"][0] ) : "";
    	$background_color            = isset( $values['background_color'] ) ? esc_attr( $values["background_color"][0] ) : "";
    	$background_image_parallax   = isset( $values['background_image_parallax'] ) ? esc_attr( $values["background_image_parallax"][0] ) : "no";


    	$background_video_mp4  = isset( $values['background_video_mp4'] ) ? esc_url( $values["background_video_mp4"][0] ) : "";
	    $background_video_ogv  = isset( $values['background_video_ogv'] ) ? esc_url( $values["background_video_ogv"][0] ) : "";
	    $background_video_webm = isset( $values['background_video_webm'] ) ? esc_url( $values["background_video_webm"][0] ) : "";

    	for ($i=1; $i <= 7; $i++) {
    		${"layer_$i"}           = isset( $values["layer_$i"] ) ? $values["layer_$i"][0] : "";
    		${"layer_index_$i"}     = isset( $values["layer_index_$i"] ) ? esc_attr( $values["layer_index_$i"][0] ) : "";
    		${"layer_delay_$i"}     = isset( $values["layer_delay_$i"] )? esc_attr( $values["layer_delay_$i"][0] ) : "0";
    		${"layer_duration_$i"}  = isset( $values["layer_duration_$i"] )? esc_attr( $values["layer_duration_$i"][0] ) : "0";
    		${"layer_opacity_$i"}   = isset( $values["layer_opacity_$i"] )? esc_attr( $values["layer_opacity_$i"][0] ) : "1";
    		${"layer_zindex_$i"}    = isset( $values["layer_zindex_$i"] )? esc_attr( $values["layer_zindex_$i"][0] ) : "1";
    		${"layer_easing_$i"}    = isset( $values["layer_easing_$i"] ) ? esc_attr( $values["layer_easing_$i"][0] ) : "linear";
    		${"layer_direction_$i"} = isset( $values["layer_direction_$i"] ) ? esc_attr( $values["layer_direction_$i"][0] ) : "none";
    		${"layer_posx_$i"}      = isset( $values["layer_posx_$i"] )? esc_attr( $values["layer_posx_$i"][0] ) : "0";
    		${"layer_posy_$i"}      = isset( $values["layer_posy_$i"] )? esc_attr( $values["layer_posy_$i"][0] ) : "0";
    	}
    
    	wp_nonce_field( 'gvc_slide_options_nonce', 'gvc_slide_options_nonce' );

    ?>
		<div class="gvc-slider-logo">
			<a href="http://www.goverticalcreative.com" title="gvc Slider" target="_blank">
				GVC Slider
			</a>
		</div>
    	<!-- Hidden inputs for active tabs indexes -->
    	<div id="gvc-slide-background-image" class="gvc-section">
    		<div class="gvc-section-title"><span><?php echo __("Slide background options", TEMP_NAME) ?></span></div>
    		<div class="gvc-section-content">
    			<div class="gvc-slide-background-color">
    				<label><?php echo __('Slide background color:', TEMP_NAME); ?></label>
       				<input name="background_color" id="background_color" class="gvc-color-picker" value="<?php echo $background_color; ?>" />
    			</div>
    			<div class="gvc-section-description"><?php echo __("Upload slide background image. The image should be between 1600px - 2000px in width and have a minimum height of ", TEMP_NAME).$gvc_slider_height.__("px for best results.", TEMP_NAME) ?></div>
    			<div class="gvc-upload">
					<input name="background_image" id="background-image" type="hidden" class="gvc-upload-path" value="<?php echo $background_image;?>"/> 
				    <input class="gvc-button-upload button" type="button" value="<?php echo __('Upload background image', TEMP_NAME) ?>" />
				    <input class="gvc-button-remove button" type="button" value="<?php echo __('Remove background image', TEMP_NAME) ?>" />
					<img src='<?php echo $background_image; ?>' class='gvc-preview-upload'/>
				</div>
			    <br>
				<div class="background-image-parallax">
			        <label>
			            <input type="checkbox" id="background-image-parallax" name="background_image_parallax" value="yes" <?php checked( $background_image_parallax, "yes" ); ?> />
			            <?php echo __(' - Parallax (Activate parallax effect on this slide. Use IMG_ASSETS with a height greater than slider height (1:1.5 ratio))', TEMP_NAME); ?>
			        </label>
			    </div>
				<br>
				<div class="gvc-section-description"><?php echo __("Enter video files links for background video (use background image for video poster) ", TEMP_NAME); ?></div>
				<div class="video_background">
		            <label for="background_video_webm"><?php echo __('Enter  WEBM video file link here:', TEMP_NAME); ?></label>
		            <input name="background_video_webm" type="text" value="<?php echo $background_video_webm;?>"/>
		        </div>
				<div class="video_background">
		            <label for="background_video_mp4"><?php echo __('Enter  MP4 video file link here:', TEMP_NAME); ?></label>
		            <input name="background_video_mp4" type="text" value="<?php echo $background_video_mp4;?>"/>
		        </div>
		        <div class="video_background">
		            <label for="background_video_ogv"><?php echo __('Enter  OGV video file link here:', TEMP_NAME); ?></label>
		            <input name="background_video_ogv" type="text" value="<?php echo $background_video_ogv;?>"/>
		        </div>
    		</div>
    	</div>

    	<script>
			jQuery(document).ready(function(){
			    jQuery('.gvc-layer').each(function(){
			    	var self = jQuery(this),
			    		title = self.find('.gvc-ui'),
			    		layerAnimation = self.find('.layer-animation'),
			    		dashboard = new Array();
			    		dashboard[0] = '<span title="<?php echo __("Delay", TEMP_NAME) ?>" class="title-item title-delay">' + layerAnimation.find('.delay').val() + 'ms</span>';
			    		dashboard[1] = '<span title="<?php echo __("Duration", TEMP_NAME) ?>" class="title-item title-duration">' + layerAnimation.find('.duration').val() + 'ms</span>';
			    		dashboard[2] = '<span title="<?php echo __("Pos-x", TEMP_NAME) ?>" class="title-item title-posx">' + layerAnimation.find('.posx').val() + 'px</span>';
			    		dashboard[3] = '<span title="<?php echo __("Pos-y", TEMP_NAME) ?>" class="title-item title-posy">' + layerAnimation.find('.posy').val() + 'px</span>';
			    		title.append(dashboard.join(''));
			    });

			     // Animation form validation
			    var label = jQuery(".layer-animation label.gvc-validation");
			     	input = label.find('input');

			    input.each(function(){
			    	var self = jQuery(this),
			    		index = input.index(this);
			    	self.on('focusout', function(){
				        if(isNaN(self.val())){
				           label.eq(index).append("<span class='validation-warning'><?php echo __('Input should be numeric', TEMP_NAME) ?></span>")
				           self.addClass('gvc-validate');
				        } else {
				        	label.eq(index).find('.validation-warning').remove();
				    		self.removeClass('gvc-validate');
				        }
				    })
			    })

			});
		</script>
    	<div id="gvc-slide-layers" class="gvc-section">
    		<div class="gvc-section-title"><span><?php echo __("Slide layers", TEMP_NAME) ?></span></div>
    		<div class="gvc-section-content">
				<?php for ($i=1; $i <= 7 ; $i++) { ?>
	    			<div class="gvc-accordion-container gvc-layer">
	    				<input type="hidden" class="gvc-hidden" id="layer-index-<?php echo $i; ?>" name="layer_index_<?php echo $i; ?>" value="<?php echo ${"layer_index_$i"} ?>" />
	    				<div class="gvc-accordion-title gvc-ui <?php echo ${"layer_index_$i"} ?>"><span class="title-item title-index"><?php echo __("Layer ", TEMP_NAME).$i ?></span></div>
	    				<div class="gvc-accordion-content layer-animation">
	    					<div class="gvc-accordion-container">
	    						<div class="gvc-accordion-title gvc-clearfix">
	    							<span class="layer-animation-title"><?php echo __("Animation", TEMP_NAME); ?></span>
	    						</div>
	    						<div class="gvc-accordion-content">
	    							<label class="gvc-validation">
										<?php echo __('Delay (ms):', TEMP_NAME); ?><br>
										<input type="text" class="gvc-spinner  gvc-slider-animation delay" id="layer-delay-<?php echo($i); ?>" name="layer_delay_<?php echo($i); ?>" value="<?php echo ${"layer_delay_$i"}; ?>" />
									</label>
									<label class="gvc-validation">
										<?php echo __('Duration (ms):', TEMP_NAME); ?><br>
										<input type="text" class="gvc-spinner gvc-slider-animation duration" id="layer-duration-<?php echo($i); ?>" name="layer_duration_<?php echo($i); ?>" value="<?php echo ${"layer_duration_$i"}; ?>" />
									</label>
									<label class="gvc-validation">
										<?php echo __('Opacity:', TEMP_NAME); ?><br>
										<input type="text" class="gvc-spinner gvc-slider-animation opacity" id="layer-opacity-<?php echo($i); ?>" name="layer_opacity_<?php echo($i); ?>" value="<?php echo ${"layer_opacity_$i"}; ?>" />
									</label>
									<label class="gvc-validation">
										<?php echo __('Z-index:', TEMP_NAME); ?><br>
										<input type="text" class="gvc-spinner gvc-slider-animation zindex" id="layer-zindex-<?php echo($i); ?>" name="layer_zindex_<?php echo($i); ?>" value="<?php echo ${"layer_zindex_$i"}; ?>" />
									</label>
									<label>
										<?php echo __('Easing:', TEMP_NAME); ?><br>
										<select name="layer_easing_<?php echo($i); ?>" class="gvc-slider-animation easing" id="layer-easing-<?php echo($i); ?>">
											<?php foreach ($nz_easing as $key => $val) { ?>
												<option value="<?php echo $val['value']; ?>" <?php selected( ${"layer_easing_$i"}, $val['value'] ); ?>><?php echo $val['label']; ?></option>  
											<?php } ?>
										</select>
									</label>
									<label>
										<?php echo __('Direction:', TEMP_NAME); ?><br>
										<select id="layer-direction-<?php echo($i); ?>" class="gvc-slider-animation direction" name="layer_direction_<?php echo($i); ?>">
											<option value="none" <?php selected( ${"layer_direction_$i"}, 'none' ); ?>><?php echo __("None", TEMP_NAME); ?></option>
											<option value="left" <?php selected( ${"layer_direction_$i"}, 'left' ); ?>><?php echo __("Left", TEMP_NAME); ?></option>
											<option value="right" <?php selected( ${"layer_direction_$i"}, 'right' ); ?>><?php echo __("Right", TEMP_NAME); ?></option>
											<option value="top" <?php selected( ${"layer_direction_$i"}, 'top' ); ?>><?php echo __("Top", TEMP_NAME); ?></option>
											<option value="bottom" <?php selected( ${"layer_direction_$i"}, 'bottom' ); ?>><?php echo __("Bottom", TEMP_NAME); ?></option>
											<option value="left_top" <?php selected( ${"layer_direction_$i"}, 'left_top' ); ?>><?php echo __("Left Top", TEMP_NAME); ?></option>
											<option value="right_top" <?php selected( ${"layer_direction_$i"}, 'right_top' ); ?>><?php echo __("Right Top", TEMP_NAME); ?></option>
											<option value="left_bottom" <?php selected( ${"layer_direction_$i"}, 'left_bottom' ); ?>><?php echo __("Left Bottom", TEMP_NAME); ?></option>
											<option value="right_bottom" <?php selected( ${"layer_direction_$i"}, 'right_bottom' ); ?>><?php echo __("Right Bottom", TEMP_NAME); ?></option>
										</select>
									</label>
									<label class="gvc-validation">
										<?php echo __('Pos-x (px):', TEMP_NAME); ?><br>
										<input type="text" class="gvc-slider-animation posx" id="layer-posx-<?php echo($i); ?>" name="layer_posx_<?php echo($i); ?>" value="<?php echo ${"layer_posx_$i"}; ?>" />
									</label>
									<label class="gvc-validation">
										<?php echo __('Pos-y (px):', TEMP_NAME); ?><br>
										<input type="text" class="gvc-slider-animation posy" id="layer-posy-<?php echo($i); ?>" name="layer_posy_<?php echo($i); ?>" value="<?php echo ${"layer_posy_$i"}; ?>" />
									</label>
	    						</div>
	    					</div>
			    			<div class="gvc-custom-editor">
			    				
			    				<?php

			    					global $tinymce_version;

			    					$tinymce_opt = array(
			    						'height'  => "250",
			    						'plugins' => "gvc_button, gap, slider_colorbox, icon_list, icons, font_size,textcolor,wplink,paste",
			    						'toolbar1' => "bold,italic,strikethrough,bullist,numlist,alignleft,aligncenter,alignright,link,unlink,formatselect,underline,alignjustify,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help",
									  	'toolbar2' => "gvc_button, gap, slider_colorbox, icon_list, icons, font_size",
									  	'toolbar3' => "",
			    					);

									$old_tinymce_opt = array(
									  'height' 		 					  => "250",
									  'theme'  							  => "advanced",
									  'plugins'                           => "gvc_button, gap, slider_colorbox, icon_list, icons, font_size",
									  'theme_advanced_buttons1' 		  => "formatselect,fontselect, styleselect,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,|,forecolor,removeformat,charmap,undo,redo",
									  'theme_advanced_buttons2'           => "gvc_button, gap, slider_colorbox, icon_list, icons, font_size",
									  'theme_advanced_buttons3'           => "",
									  'theme_advanced_toolbar_location'   => "top",
									  'theme_advanced_toolbar_align'      => "left",
									  'theme_advanced_statusbar_location' => "bottom",
									  'theme_advanced_resizing' => true
									);


									if ( version_compare( $tinymce_version, '359-20131026' ) > 0 ){
										$settings = array ('tinymce' => $tinymce_opt);
									} else {
										$settings = array ('tinymce' => $old_tinymce_opt);
									}

			    					wp_editor( ${"layer_$i"}, "layer_$i", $settings); 


			    				?>
			    			</div>
		    			</div>
	    			</div>

    			<?php } ?>
			</div>
    	</div>

    <?php
	}

	add_action( 'save_post', 'save_gvc_slide_options' );  
	function save_gvc_slide_options( $post_id )  
	{  
	    
	    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
	    if( !isset( $_POST['gvc_slide_options_nonce'] ) || !wp_verify_nonce( $_POST['gvc_slide_options_nonce'], 'gvc_slide_options_nonce' ) ) return;  
	    if( !current_user_can( 'edit_post' ) ) return;

	    if( isset( $_POST['background_image'] ) ){update_post_meta($post_id, "background_image",$_POST["background_image"]);}
	    if( isset( $_POST['background_color'] ) ){update_post_meta($post_id, "background_color",$_POST["background_color"]);}

	    if( isset( $_POST['background_video_mp4'] ) ){update_post_meta($post_id, "background_video_mp4",$_POST["background_video_mp4"]);}
	    if( isset( $_POST['background_video_ogv'] ) ){update_post_meta($post_id, "background_video_ogv",$_POST["background_video_ogv"]);}
	    if( isset( $_POST['background_video_webm'] ) ){update_post_meta($post_id, "background_video_webm",$_POST["background_video_webm"]);}

	    $background_image_parallax_checked = ( isset( $_POST['background_image_parallax'] ) ) ? "yes" : "no";
    	update_post_meta($post_id, "background_image_parallax", $background_image_parallax_checked);
	   
	    for ($i=1; $i <= 7 ; $i++) { 
	    	if( isset( $_POST["layer_$i"] ) ) { update_post_meta( $post_id, "layer_$i", $_POST["layer_$i"]);}
	    	if( isset( $_POST["layer_index_$i"] ) ) { update_post_meta( $post_id, "layer_index_$i", $_POST["layer_index_$i"]);}
	    	if( isset( $_POST["layer_delay_$i"] ) ) { update_post_meta( $post_id, "layer_delay_$i", $_POST["layer_delay_$i"]);}
	    	if( isset( $_POST["layer_duration_$i"] ) ) { update_post_meta( $post_id, "layer_duration_$i", $_POST["layer_duration_$i"]);}
	    	if( isset( $_POST["layer_opacity_$i"] ) ) { update_post_meta( $post_id, "layer_opacity_$i", $_POST["layer_opacity_$i"]);}
	    	if( isset( $_POST["layer_zindex_$i"] ) ) { update_post_meta( $post_id, "layer_zindex_$i", $_POST["layer_zindex_$i"]);}
	    	if( isset( $_POST["layer_easing_$i"] ) ) { update_post_meta( $post_id, "layer_easing_$i", $_POST["layer_easing_$i"]);}
	    	if( isset( $_POST["layer_direction_$i"] ) ) { update_post_meta( $post_id, "layer_direction_$i", $_POST["layer_direction_$i"]);}
	    	if( isset( $_POST["layer_posx_$i"] ) ) { update_post_meta( $post_id, "layer_posx_$i", $_POST["layer_posx_$i"]);}
	    	if( isset( $_POST["layer_posy_$i"] ) ) { update_post_meta( $post_id, "layer_posy_$i", $_POST["layer_posy_$i"]);}
		}
	}

/*====================================================================*/
/*	gvc SLIDER ADMIN COLUMNS
/*====================================================================*/
	
	add_filter("manage_edit-gvc-slider_columns", "gvc_slider_edit_columns");

	function gvc_slider_edit_columns($columns){

		$columns = array(
			"cb" 		          => "<input type=\"checkbox\" />",
			"title" 	          => "Slide Title",
			"background_image"    => __("Background Image", TEMP_NAME)
		);

		return $columns;
	}

	add_action("manage_gvc-slider_posts_custom_column", "gvc_slider_custom_columns");

	function gvc_slider_custom_columns($column){

		global $post;
		$values = get_post_custom();

		switch ($column){

			case "background_image":
				if (empty($values["background_image"][0])) {
					echo '<img class="gvc-slider-background-image-column" src="'.IMG_ASSETS.'/placeholders/gvc_slider_placeholder.png" alt="'.__("Slide background image").'">';
				} else {
					echo '<img class="gvc-slider-background-image-column" src="'.$values["background_image"][0].'" alt="'.__("Slide background image").'">';
				}
				
			break;

		}
	}


?>