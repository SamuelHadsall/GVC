<?php

	$gvc_slider_settings = get_option('gvc_slider_settings');

	global  $gvc;

	$styles        = '';
	$styles_320    = '';
	$styles_480    = '';
	$styles_768    = ''; 
	$styles_1024   = '';
	$styles_1280   = '';

	$prefixes = array('-webkit-', '-moz-', '-o-', '-ms-', '');

	$data_height            = (!isset($gvc_slider_settings["gvc_slider_height"]) || empty($gvc_slider_settings["gvc_slider_height"])) ? "500" : $gvc_slider_settings["gvc_slider_height"];
	$data_autoplaydelay     = (!isset($gvc_slider_settings["gvc_slider_autoplaydelay"]) || empty($gvc_slider_settings["gvc_slider_autoplaydelay"])) ? "1500" : $gvc_slider_settings["gvc_slider_autoplaydelay"];
	$data_autoplay          = (isset($gvc_slider_settings["gvc_slider_autoplay"]) && $gvc_slider_settings["gvc_slider_autoplay"] == "yes") ? "true" : "false";
	$data_bullets           = (isset($gvc_slider_settings["gvc_slider_bullets"]) && $gvc_slider_settings["gvc_slider_bullets"] == "yes") ? "true" : "false";
	$data_mobile            = (isset($gvc_slider_settings["gvc_slider_mobile"]) && $gvc_slider_settings["gvc_slider_mobile"] == "yes") ? "true" : "false";
	$data_transition        = isset($gvc_slider_settings["gvc_slider_transition"]) ? $gvc_slider_settings["gvc_slider_transition"] : "fade";
	$data_layout            = ($gvc['gvc-layout']) ? $gvc['gvc-layout'] : "full";

	$gvc_slider_opt = array( 
		'post_type'      => 'gvc-slider', 
		'posts_per_page' => -1, 
		'orderby'        => 'menu_order', 
		'order'          => 'ASC'
	);

	$gvc_slider = new WP_Query($gvc_slider_opt);

?>
<?php if($gvc_slider->have_posts()){ ?>

	<section id="gvc-slider" data-transition="<?php echo $data_transition; ?>" data-layout="<?php echo $data_layout; ?>" data-height="<?php echo $data_height; ?>" data-mobile="<?php echo $data_mobile; ?>" data-autoplaydelay="<?php echo $data_autoplaydelay; ?>" data-autoplay="<?php echo $data_autoplay; ?>" data-bullets="<?php echo $data_bullets; ?>">

		<ul class="gvc-slides">

			<?php while($gvc_slider->have_posts()) : $gvc_slider->the_post(); ?>	

				<?php

					$values = get_post_custom( $post->ID ); 
					$background_video_mp4        = (isset( $values['background_video_mp4'][0] ) && !empty( $values['background_video_mp4'][0])) ? $values["background_video_mp4"][0] : "";
				    $background_video_ogv        = (isset( $values['background_video_ogv'][0] ) && !empty( $values['background_video_ogv'][0])) ? $values["background_video_ogv"][0] : "";
				    $background_video_webm       = (isset( $values['background_video_webm'][0] ) && !empty($values['background_video_webm'][0])) ? $values["background_video_webm"][0] : "";
				    $background_image            = (isset($values["background_image"][0]) && !empty($values["background_image"][0])) ? $values["background_image"][0] : "";
					$background_image_parallax   = (isset($values["background_image_parallax"][0]) && !empty($values["background_image_parallax"][0])) ? $values["background_image_parallax"][0] : "no";
					$background_video            = (!empty($background_video_mp4) || !empty($background_video_ogv) || !empty($background_video_webm)) ? "true" : "false";
				?>

				<li <?php post_class() ?> data-parallax="<?php echo $background_image_parallax; ?>" data-video="<?php echo $background_video; ?>" id="post-<?php the_ID(); ?>">

					<?php if ($background_video == "true"): ?>

						<video class="slide-back-video" preload="auto" loop="loop" muted="muted" poster="<?php echo IMAGES.'/transparent.png'; ?>">
						    
							<?php if ($background_video_mp4): ?>
						    	<!-- MP4 for Safari, IE9, iPhone, iPad, Android, and Windows Phone 7 -->
						    	<source type="video/mp4; codecs=avc1.42E01E,mp4a.40.2" src="<?php echo $background_video_mp4; ?>"></source>
						    <?php endif ?>
						    <?php if ($background_video_webm): ?>
						   		<!-- WebM/VP8 for Firefox4, Opera, and Chrome -->
						    	<source type="video/webm; codecs=vp8,vorbis" src="<?php echo $background_video_webm; ?>"></source>
						    <?php endif ?>
						    <?php if ($background_video_ogv): ?>
						    	<!-- Ogg/Vorbis for older Firefox and Opera versions -->
						    	<source type="video/ogg; codecs=theora,vorbis" src="<?php echo $background_video_ogv; ?>"></source>
						    <?php endif ?>

						</video>
								
					<?php endif ?>

					<div class="slider-canvas container">

						<?php

							$styles .= '.gvc-slides li#post-'.get_the_ID().'{';

								if (isset($values["background_color"][0]) && !empty($values["background_color"][0])) {
									$styles .= 'background-color:'.$values["background_color"][0].';';
								}

								if (!empty($background_image)) {
									$styles .= 'background-image:url('.$background_image.');';
								}

							$styles .= "}";

						?>

						<?php for ($i=1; $i <= 7; $i++) { ?>
							<?php if(!empty($values["layer_$i"][0])) { ?>
								<?php

									/*----------------------------------------------------------------*/
									// LAYER DEFAULT COORDS STYLES
									/*----------------------------------------------------------------*/

										switch ($values["layer_direction_$i"][0]) {

											case 'left':
											case 'right':

											if (isset($values["layer_posy_$i"][0])) {

												if ($data_mobile) {

													$styles_320 .= " #gvc-layer-$post->ID-$i{";
														$styles_320 .='top:'.round($values["layer_posy_$i"][0]*0.235, 0).'px !important;';
													$styles_320 .= "}";

													$styles_480 .= " #gvc-layer-$post->ID-$i{";
														$styles_480 .='top:'.round($values["layer_posy_$i"][0]*0.32, 0).'px !important;';
													$styles_480 .= "}";

												}

												$styles_768 .= " #gvc-layer-$post->ID-$i{";
													$styles_768 .='top:'.round($values["layer_posy_$i"][0]*0.6, 0).'px !important;';
												$styles_768 .= "}";

												$styles_1024 .= " #gvc-layer-$post->ID-$i{";
													$styles_1024 .='top:'.round($values["layer_posy_$i"][0]*0.8, 0).'px !important;';
												$styles_1024 .= "}";

												$styles_1280 .= " #gvc-layer-$post->ID-$i{";
													$styles_1280 .='top:'.$values["layer_posy_$i"][0].'px !important;';
												$styles_1280 .= "}";

											}

											break;

											case 'top':
											case 'bottom':

											if (isset($values["layer_posx_$i"][0])) {

												if ($data_mobile) {

													$styles_320 .= " #gvc-layer-$post->ID-$i{";
														$styles_320 .='left:'.round($values["layer_posx_$i"][0]*0.235, 0).'px !important;';
													$styles_320 .= "}";

													$styles_480 .= " #gvc-layer-$post->ID-$i{";
														$styles_480 .='left:'.round($values["layer_posx_$i"][0]*0.32, 0).'px !important;';
													$styles_480 .= "}";

												}

												$styles_768 .= " #gvc-layer-$post->ID-$i{";
													$styles_768 .='left:'.round($values["layer_posx_$i"][0]*0.6, 0).'px !important;';
												$styles_768 .= "}";

												$styles_1024 .= " #gvc-layer-$post->ID-$i{";
													$styles_1024 .='left:'.round($values["layer_posx_$i"][0]*0.8, 0).'px !important;';
												$styles_1024 .= "}";

												$styles_1280 .= " #gvc-layer-$post->ID-$i{";
													$styles_1280 .='left:'.$values["layer_posx_$i"][0].'px !important;';
												$styles_1280 .= "}";

											}

											break;
										}

									/*----------------------------------------------------------------*/
									// LAYER ANIMATE-IN COORDS STYLES
									/*----------------------------------------------------------------*/

										if (isset($values["layer_posx_$i"][0])) {

											if ($data_mobile) {

												$styles_320 .= " .animate-in #gvc-layer-$post->ID-$i, #gvc-layer-$post->ID-$i.none {";
													$styles_320 .='left:'.round($values["layer_posx_$i"][0]*0.235, 0).'px !important;';
												$styles_320 .= "}";

												$styles_480 .= " .animate-in #gvc-layer-$post->ID-$i, #gvc-layer-$post->ID-$i.none {";
													$styles_480 .='left:'.round($values["layer_posx_$i"][0]*0.32, 0).'px !important;';
												$styles_480 .= "}";

											}

											$styles_768 .= " .animate-in #gvc-layer-$post->ID-$i, #gvc-layer-$post->ID-$i.none {";
												$styles_768 .='left:'.round($values["layer_posx_$i"][0]*0.6, 0).'px !important;';
											$styles_768 .= "}";

											$styles_1024 .= " .animate-in #gvc-layer-$post->ID-$i, #gvc-layer-$post->ID-$i.none {";
												$styles_1024 .='left:'.round($values["layer_posx_$i"][0]*0.8, 0).'px !important;';
											$styles_1024 .= "}";

											$styles_1280 .= " .animate-in #gvc-layer-$post->ID-$i, #gvc-layer-$post->ID-$i.none {";
												$styles_1280 .='left:'.$values["layer_posx_$i"][0].'px !important;';
											$styles_1280 .= "}";

										}

										if (isset($values["layer_posy_$i"][0])) {

											if ($data_mobile) {

												$styles_320 .= " .animate-in #gvc-layer-$post->ID-$i, #gvc-layer-$post->ID-$i.none {";
													$styles_320 .='top:'.round($values["layer_posy_$i"][0]*0.235, 0).'px !important;';
												$styles_320 .= "}";

												$styles_480 .= " .animate-in #gvc-layer-$post->ID-$i, #gvc-layer-$post->ID-$i.none {";
													$styles_480 .='top:'.round($values["layer_posy_$i"][0]*0.32, 0).'px !important;';
												$styles_480 .= "}";

											}

											$styles_768 .= " .animate-in #gvc-layer-$post->ID-$i, #gvc-layer-$post->ID-$i.none {";
												$styles_768 .='top:'.round($values["layer_posy_$i"][0]*0.6, 0).'px !important;';
											$styles_768 .= "}";

											$styles_1024 .= " .animate-in #gvc-layer-$post->ID-$i, #gvc-layer-$post->ID-$i.none {";
												$styles_1024 .='top:'.round($values["layer_posy_$i"][0]*0.8, 0).'px !important;';
											$styles_1024 .= "}";

											$styles_1280 .= " .animate-in #gvc-layer-$post->ID-$i, #gvc-layer-$post->ID-$i.none {";
												$styles_1280 .='top:'.$values["layer_posy_$i"][0].'px !important;';
											$styles_1280 .= "}";

										}

									/*----------------------------------------------------------------*/
									// LAYER ANIMATE-OUT EFFECTS STYLES
									/*----------------------------------------------------------------*/

										$styles .= " .animate-out #gvc-layer-$post->ID-$i {";
											if(isset($values["layer_opacity_$i"][0]) && !empty($values["layer_opacity_$i"][0])){ 
												$styles .='opacity:'.$values["layer_opacity_$i"][0].' ;';
											}
										$styles .= "}";

									/*----------------------------------------------------------------*/
									// LAYER EFFECTS STYLES
									/*----------------------------------------------------------------*/

										$styles .= " #gvc-layer-$post->ID-$i{";

											if(isset($values["layer_zindex_$i"][0])){ 
												$styles .='z-index:'.$values["layer_zindex_$i"][0].';';
											}

											if(isset($values["layer_opacity_$i"][0])){ 
												$styles .='opacity:'.$values["layer_opacity_$i"][0].';';
											}

										$styles .= "}";

										$styles .= " .active #gvc-layer-$post->ID-$i{";

											foreach ($prefixes as $prefix) {

												if(isset($values["layer_delay_$i"][0]) && !empty($values["layer_delay_$i"][0])){
													$styles .= $prefix.'transition-delay:'.$values["layer_delay_$i"][0].'ms;';
												}
												if(isset($values["layer_duration_$i"][0]) && !empty($values["layer_duration_$i"][0])){
													$styles .= $prefix.'transition-duration:'.$values["layer_duration_$i"][0].'ms;';
												}
												if(isset($values["layer_easing_$i"][0]) && !empty($values["layer_easing_$i"][0])){
													$styles .= $prefix.'transition-timing-function:'.$values["layer_easing_$i"][0].';';
												}
												
											}

										$styles .= "}";
										
								?> 
								<div class="gvc-layer <?php echo $values["layer_direction_$i"][0]; ?>" data-posx="<?php echo $values["layer_posx_$i"][0]; ?>" data-posy="<?php echo $values["layer_posy_$i"][0]; ?>" data-direction="<?php echo $values["layer_direction_$i"][0]; ?>" id="gvc-layer-<?php echo $post->ID."-".$i; ?>">
									<?php echo apply_filters('the_content', $values["layer_$i"][0] ); ?>
								</div>
							<?php } ?>
						<?php } ?>

					</div>

				</li>

			<?php endwhile; ?>

		</ul>

		<style>

			<?php echo $styles; ?>

			<?php if($data_mobile): ?>

				@media only screen and (min-width: 320px){

					#gvc-slider .gvc-layer {
						-webkit-transform: scale(0.235,0.235);
						-moz-transform: scale(0.235,0.235);
						-o-transform: scale(0.235,0.235);
						-ms-transform: scale(0.235,0.235);
						transform: scale(0.235,0.235);
					}

					#gvc-slider {height: <?php echo round($data_height*0.235, 0); ?>px;}

					<?php echo $styles_320; ?>

				}

				@media only screen and (min-width: 480px){

					#gvc-slider .gvc-layer {
						-webkit-transform: scale(0.32,0.32);
						-moz-transform: scale(0.32,0.32);
						-o-transform: scale(0.32,0.32);
						-ms-transform: scale(0.32,0.32);
						transform: scale(0.32,0.32);
					}

					#gvc-slider {height: <?php echo round($data_height*0.32, 0); ?>px;}

					<?php echo $styles_480; ?>

				}

			<?php endif; ?>

			@media only screen and (min-width: 768px){

					#gvc-slider .gvc-layer {
						-webkit-transform: scale(0.6,0.6);
						-moz-transform: scale(0.6,0.6);
						-o-transform: scale(0.6,0.6);
						-ms-transform: scale(0.6,0.6);
						transform: scale(0.6,0.6);
					}

					#gvc-slider {height: <?php echo round($data_height*0.6, 0); ?>px;}

					<?php echo $styles_768; ?>

			}

			@media only screen and (min-width: 1024px){

				#gvc-slider .gvc-layer {
					-webkit-transform: scale(0.8,0.8);
					-moz-transform: scale(0.8,0.8);
					-o-transform: scale(0.8,0.8);
					-ms-transform: scale(0.8,0.8);
					transform: scale(0.8,0.8);
				}

				#gvc-slider {height: <?php echo round($data_height*0.8, 0); ?>px;}

				<?php echo $styles_1024; ?>

			}

			@media only screen and (min-width: 1280px){

				#gvc-slider .gvc-layer {
					-webkit-transform: scale(1,1);
					-moz-transform: scale(1,1);
					-o-transform: scale(1,1);
					-ms-transform: scale(1,1);
					transform: scale(1,1);
				}

				#gvc-slider {height: <?php echo $data_height; ?>px;}

				<?php echo $styles_1280; ?>
			}
				
		</style>

	</section>

<?php } else { echo(gvc_not_found('gvc-slider')); }

	wp_reset_query();

?>