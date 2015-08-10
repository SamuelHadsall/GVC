<?php if ( current_user_can('manage_options') ): ?>

	<?php get_header(); ?>

	<?php 
		$gvc_slider_settings = get_option('gvc_slider_settings');
	?>

	<?php if (isset($gvc_slider_settings["gvc_slider"]) && $gvc_slider_settings["gvc_slider"] == "yes") : ?>

		<?php if (have_posts()) : ?>

			<?php

				$styles = '';

				$prefixes = array('-webkit-', '-moz-', '-o-', '-ms-', '');

				$gvc_slider_settings = get_option('gvc_slider_settings');
				$data_height            = (!isset($gvc_slider_settings["gvc_slider_height"]) || empty($gvc_slider_settings["gvc_slider_height"])) ? "500" : $gvc_slider_settings["gvc_slider_height"];

			?>

			<section id="gvc-slider" class="preview" data-height="<?php echo $data_height; ?>">

				<div class="grid">
					<span class="grid-line grid_1_v">&nbsp;</span>
					<span class="grid-line grid_2_v">&nbsp;</span>
					<span class="grid-line grid_3_v">&nbsp;</span>
					<span class="grid-line grid_4_v">&nbsp;</span>
					<span class="grid-line grid_5_v">&nbsp;</span>
					<span class="grid-line grid_6_v">&nbsp;</span>
					<span class="grid-line grid_7_v">&nbsp;</span>
					<span class="grid-line grid_8_v">&nbsp;</span>
					<span class="grid-line grid_9_v">&nbsp;</span>
					<span class="grid-line grid_1_h">&nbsp;</span>
					<span class="grid-line grid_2_h">&nbsp;</span>
					<span class="grid-line grid_3_h">&nbsp;</span>
					<span class="grid-line grid_4_h">&nbsp;</span>
					<span class="grid-line grid_5_h">&nbsp;</span>
				</div>

				<ul class="gvc-slides">

					<?php while (have_posts()) : the_post(); ?>
						
						<li <?php post_class() ?>  id="post-<?php the_ID(); ?>">

							<?php

								$values = get_post_custom( $post->ID ); 
								$background_video_mp4  = (isset( $values['background_video_mp4'][0] ) && !empty( $values['background_video_mp4'][0])) ? $values["background_video_mp4"][0] : "";
							    $background_video_ogv  = (isset( $values['background_video_ogv'][0] ) && !empty( $values['background_video_ogv'][0])) ? $values["background_video_ogv"][0] : "";
							    $background_video_webm = (isset( $values['background_video_webm'][0] ) && !empty($values['background_video_webm'][0])) ? $values["background_video_webm"][0] : "";
							    $background_image      = (isset($values["background_image"][0]) && !empty($values["background_image"][0])) ? $values["background_image"][0] : "";
							?>

							<?php if (!empty($background_video_mp4) || !empty($background_video_ogv) || !empty($background_video_webm)): ?>

								<video autoplay="autoplay" loop="loop" muted="muted" poster="<?php echo $background_image; ?>">
									<?php if ($background_video_webm): ?>
										<source src="<?php echo $background_video_webm; ?>" type="video/webm; codecs=vp8,vorbis">
									<?php endif ?>
									<?php if ($background_video_mp4): ?>
										<source src="<?php echo $background_video_mp4; ?>" type="video/mp4; codecs=avc1.42E01E,mp4a.40.2">
									<?php endif ?>
									<?php if ($background_video_ogv): ?>
										<source src="<?php echo $background_video_ogv; ?>" type="video/ogg; codecs=theora,vorbis">
									<?php endif ?>
								</video>
										
							<?php endif ?>

							<div class="slider-canvas container">

								<?php

									$values = get_post_custom( $post->ID );

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

														$styles .= " #gvc-layer-$post->ID-$i{";
															$styles .='top:'.$values["layer_posy_$i"][0].'px !important;';
														$styles .= "}";

													}

													break;

													case 'top':
													case 'bottom':

													if (isset($values["layer_posx_$i"][0])) {

														$styles .= " #gvc-layer-$post->ID-$i{";
															$styles .='left:'.$values["layer_posx_$i"][0].'px !important;';
														$styles .= "}";

													}

													break;
												}

											/*----------------------------------------------------------------*/
											// LAYER ANIMATE-IN COORDS STYLES
											/*----------------------------------------------------------------*/

												if (isset($values["layer_posx_$i"][0])) {

													$styles .= " .animate-in #gvc-layer-$post->ID-$i, #gvc-layer-$post->ID-$i.none {";
														$styles .='left:'.$values["layer_posx_$i"][0].'px !important;';
													$styles .= "}";

												}

												if (isset($values["layer_posy_$i"][0])) {

													$styles .= " .animate-in #gvc-layer-$post->ID-$i, #gvc-layer-$post->ID-$i.none {";
														$styles .='top:'.$values["layer_posy_$i"][0].'px !important;';
													$styles .= "}";

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
					#gvc-slider {height: <?php echo $data_height; ?>px;}
				</style>

			</section>

			<aside class="container gvc-clearfix" id="gvc-slider-preview-panel">
				<div id="gvc-slider-coords">
					<div><span class="posx-label"><?php echo __("X coordinate:", TEMP_NAME); ?></span>&nbsp;<span class="posx"></span></div>
					<div><span class="posy-label"><?php echo __("Y coordinate:", TEMP_NAME); ?></span>&nbsp;<span class="posy"></span></div>
				</div>
				<div id="gvc-slider-controls">
					<a class="button small" id="animate-in" href="#"><?php echo __("Animate-in", TEMP_NAME) ?></a>
					<a class="button small" id="animate-out" href="#"><?php echo __("Animate-out", TEMP_NAME) ?></a>
				</div>
			</aside>

			<div class="error-message device-message">
				<?php echo __("In order to preview gvc Slider you need a device with a screen at least 768 pixels wide.", TEMP_NAME); ?>
			</div>

		<?php else : ?>

			<?php gvc_not_found('slider'); ?>

		<?php endif; ?>
			
	<?php else: ?>

		<p class="error-message"><?php echo __("You need to activate gvc Slider from gvc slider settings panel.", TEMP_NAME); ?></p>

	<?php endif; ?>

	<?php get_footer(); ?>

<?php else: ?>

	<p class="error-message"><?php echo __("You do not have permission to view this page.", TEMP_NAME); ?></p>

<?php endif; ?>