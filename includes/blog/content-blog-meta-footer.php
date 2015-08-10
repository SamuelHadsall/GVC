<?php 
	global $gvc;
	$gvc_blog_layout         = ($gvc['gvc-blog-layout']) ? $gvc['gvc-blog-layout'] : "medium";

?>
<?php if ($gvc_blog_layout != "full"): ?>
		
	<?php if (!is_single()): ?>
		<aside class="post-meta-footer gvc-clearfix">

			<div class="post-date"><?php echo the_time( get_option( 'date_format' ) ); ?></div>	

			<?php if ($gvc['gvc-blog-comments'] && $gvc['gvc-blog-comments'] == 1): ?>
				<div class="post-comments">
					<?php if (comments_open()) : ?>
						
						<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', TEMP_NAME) . '</span>', __( 'One comment so far', TEMP_NAME), __( 'View all % comments', TEMP_NAME) ); ?>
						
					<?php else : ?>
						<?php echo __('Comments are off for this post', TEMP_NAME); ?>
					<?php endif;?>
				</div>
			<?php endif ?>
			
		</aside>
	<?php endif ?>

<?php endif ?>