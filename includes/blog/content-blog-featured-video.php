<?php 

	$values                   = get_post_custom( $post->ID );
	$gvc_post_video_mp4    = isset($values["gvc_post_video_mp4"][0]) ? $values["gvc_post_video_mp4"][0] : "";
	$gvc_post_video_ogv    = isset($values["gvc_post_video_ogv"][0]) ? $values["gvc_post_video_ogv"][0] : "";
	$gvc_post_video_webm   = isset($values["gvc_post_video_webm"][0]) ? $values["gvc_post_video_webm"][0] : "";
	$gvc_post_video_embed  = isset($values["gvc_post_video_embed"][0]) ? $values["gvc_post_video_embed"][0] : "";
	$gvc_post_video_poster = isset($values["gvc_post_video_poster"][0]) ? $values["gvc_post_video_poster"][0] : "";

?>
<?php if (!empty($gvc_post_video_mp4) || !empty($gvc_post_video_ogv) || !empty($gvc_post_video_webm) || !empty($gvc_post_video_embed)): ?>
	<div class="post-video">
		
		<?php
			if(!empty($gvc_post_video_embed) && empty($gvc_post_video_mp4) && empty($gvc_post_video_ogv) && empty($gvc_post_video_webm)) {
				echo "<div class='post-video-embed'><div class='flex-mod'>".$gvc_post_video_embed."</div></div>";
			} elseif((!empty($gvc_post_video_mp4) || !empty($gvc_post_video_ogv) || !empty($gvc_post_video_webm))) {
				echo do_shortcode('[video mp4="'.$gvc_post_video_mp4.'" ogv="'.$gvc_post_video_ogv.'" webm="'.$gvc_post_video_webm.'" poster="'.$gvc_post_video_poster.'"][/video]');
			}
		?>
	</div>
<?php endif; ?>