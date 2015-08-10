<?php
global $gvc;
$values = get_post_custom( $post->ID );
$gvc_portfolio_layout         = ($gvc['gvc-portfolio-layout']) ? $gvc['gvc-portfolio-layout'] : "medium";
$gvc_portfolio_format = isset($values["gvc_portfolio_format"][0]) ? $values["gvc_portfolio_format"][0] : "image";

$gvc_portfolio_audio_mp3           = isset($values["gvc_portfolio_audio_mp3"][0]) ? $values["gvc_portfolio_audio_mp3"][0] : "";
$gvc_portfolio_audio_ogg           = isset($values["gvc_portfolio_audio_ogg"][0]) ? $values["gvc_portfolio_audio_ogg"][0] : "";
$gvc_portfolio_audio_embed         = isset($values["gvc_portfolio_audio_embed"][0]) ? $values["gvc_portfolio_audio_embed"][0] : "";

$gvc_portfolio_video_mp4           = isset($values["gvc_portfolio_video_mp4"][0]) ? $values["gvc_portfolio_video_mp4"][0] : "";
$gvc_portfolio_video_ogv           = isset($values["gvc_portfolio_video_ogv"][0]) ? $values["gvc_portfolio_video_ogv"][0] : "";
$gvc_portfolio_video_webm          = isset($values["gvc_portfolio_video_webm"][0]) ? $values["gvc_portfolio_video_webm"][0] : "";
$gvc_portfolio_video_embed         = isset($values["gvc_portfolio_video_embed"][0]) ? $values["gvc_portfolio_video_embed"][0] : "";
$gvc_portfolio_video_poster        = isset($values["gvc_portfolio_video_poster"][0]) ? $values["gvc_portfolio_video_poster"][0] : "";

?>
<?php if ($gvc_portfolio_format == "gallery"): ?>

	<aside class="post-gallery">
		<?php gvc_post_gallery($gvc_portfolio_layout, $post->ID); ?>
	</aside>

<?php elseif($gvc_portfolio_format == "audio"): ?>

	<?php if (!empty($gvc_portfolio_audio_mp3) || !empty($gvc_portfolio_audio_ogg) || !empty($gvc_portfolio_audio_embed)): ?>
		<aside class="post-audio">

			<?php
				if(!empty($gvc_portfolio_audio_embed) && empty($gvc_portfolio_audio_ogg) && empty($gvc_portfolio_audio_mp3)) {
					echo "<div class='post-audio-embed'>".$gvc_portfolio_audio_embed."</div>";
				} elseif (!empty($gvc_portfolio_audio_ogg) || !empty($gvc_portfolio_audio_mp3)) {
					echo do_shortcode('[audio mp3="'.$gvc_portfolio_audio_mp3.'" ogg="'.$gvc_portfolio_audio_ogg.'"][/audio]'); 
				}
			?>

		</aside>
	<?php endif ?>

<?php elseif($gvc_portfolio_format == "video"): ?>

	<?php if (!empty($gvc_portfolio_video_mp4) || !empty($gvc_portfolio_video_ogv) || !empty($gvc_portfolio_video_webm) || !empty($gvc_portfolio_video_embed)): ?>
		<aside class="post-video">
			
			<?php
				if(!empty($gvc_portfolio_video_embed) && empty($gvc_portfolio_video_mp4) && empty($gvc_portfolio_video_ogv) && empty($gvc_portfolio_video_webm)) {
					echo "<div class='post-video-embed'><div class='flex-mod'>".$gvc_portfolio_video_embed."</div></div>";
				} elseif((!empty($gvc_portfolio_video_mp4) || !empty($gvc_portfolio_video_ogv) || !empty($gvc_portfolio_video_webm))) {
					echo do_shortcode('[video mp4="'.$gvc_portfolio_video_mp4.'" ogv="'.$gvc_portfolio_video_ogv.'" webm="'.$gvc_portfolio_video_webm.'" poster="'.$gvc_portfolio_video_poster.'"][/video]');
				}
			?>
		</aside>
	<?php endif; ?>

<?php elseif($gvc_portfolio_format == "image"): ?>

	<?php gvc_thumbnail($gvc_portfolio_layout, $post->ID); ?>
	
<?php endif ?>