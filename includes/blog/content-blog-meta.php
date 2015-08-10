<?php 
	global $gvc;
	$gvc_blog_layout = ($gvc['gvc-blog-layout']) ? $gvc['gvc-blog-layout'] : "medium";
?>

<aside class="post-meta">

	<?php if (!is_single()): ?>

		<?php if ($gvc_blog_layout != "full"): ?>

			<div class="post-author"><?php echo __("Posted by", TEMP_NAME); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" title="<?php echo __('View all posts by', TEMP_NAME); ?> <?php the_author(); ?>"><?php the_author(); ?></a></div>
			<div class="post-category gvc-clearfix"><?php the_category("<span class='comma'>, </span>"); ?></div>

		<?php else: ?>

			<div class="post-date"><?php echo the_time( get_option( 'date_format' ) ); ?></div>	
			<div class="post-author"><?php echo __("Posted by", TEMP_NAME); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" title="<?php echo __('View all posts by', TEMP_NAME); ?> <?php the_author(); ?>"><?php the_author(); ?></a></div>
			<div class="post-category gvc-clearfix"><?php the_category("<span class='comma'>, </span>"); ?></div>
			<?php if ($gvc['gvc-blog-comments'] && $gvc['gvc-blog-comments'] == 1): ?>
				<div class="post-comments">
					<?php if (comments_open()) : ?>
						
						<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', TEMP_NAME) . '</span>', __( 'One comment so far', TEMP_NAME), __( 'View all % comments', TEMP_NAME) ); ?>
						
					<?php else : ?>
						<?php echo __('Comments are off for this post', TEMP_NAME); ?>
					<?php endif;?>
				</div>
			<?php endif ?>	

		<?php endif ?>

	<?php else: ?>

		<div class="post-date"><?php echo the_time( get_option( 'date_format' ) ); ?></div>	
		<div class="post-author"><?php echo __("Posted by", TEMP_NAME); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" title="<?php echo __('View all posts by', TEMP_NAME); ?> <?php the_author(); ?>"><?php the_author(); ?></a></div>
		<div class="post-category gvc-clearfix"><?php the_category("<span class='comma'>, </span>"); ?></div>
		<?php if ($gvc['gvc-blog-comments'] && $gvc['gvc-blog-comments'] == 1): ?>
			<div class="post-comments">
				<?php if (comments_open()) : ?>
					
					<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', TEMP_NAME) . '</span>', __( 'One comment so far', TEMP_NAME), __( 'View all % comments', TEMP_NAME) ); ?>
					
				<?php else : ?>
					<?php echo __('Comments are off for this post', TEMP_NAME); ?>
				<?php endif;?>
			</div>
		<?php endif ?>

	<?php endif ?>

</aside>