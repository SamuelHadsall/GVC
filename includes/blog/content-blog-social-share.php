<?php global $gvc; ?>
<?php if (is_single()): ?>
	
	<?php if ($gvc['gvc-blog-social-share'] && $gvc['gvc-blog-social-share'] == 1): ?>
	<div class="post-social-share gvc-clearfix">
			<span class="share-message"><?php echo __("Share this post:", TEMP_NAME); ?></span>
			<a class="post-twitter-share" target="_blank" href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="<?php echo __("Tweet this!", TEMP_NAME); ?>"><i class="fa fa-twitter"></i></a>
		    <a class="post-facebook-share" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="<?php echo __("Share on Facebook", TEMP_NAME); ?>"><i class="fa fa-facebook"></i></a>
		    <a class="post-linkedin-share" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" title="<?php echo __("Share on LinkedIn", TEMP_NAME); ?>"><i class="fa fa-linkedin"></i></a>
		    <a class="post-google-share" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" title="<?php echo __("Share on Google+", TEMP_NAME); ?>"><i class="fa fa-google-plus"></i></a>
		    <a class="post-pinterest-share" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $url; ?>" title="<?php echo __("Share on Pinterest", TEMP_NAME); ?>"><i class="fa fa-pinterest"></i></a>

	</div>

	<?php endif ?>

<?php endif ?>