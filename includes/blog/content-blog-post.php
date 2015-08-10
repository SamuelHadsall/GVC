<?php

	global $gvc;

?>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<article data-grid="gvc_01" <?php post_class() ?> id="post-<?php the_ID(); ?>">

					<?php

						if (has_post_format( 'aside' )) {
							get_template_part('/includes/blog/post-formats/content-aside');
						} elseif (has_post_format('audio')) {
							get_template_part('/includes/blog/post-formats/content-audio');
						} elseif (has_post_format('video')) {
							get_template_part('/includes/blog/post-formats/content-video');
						} elseif (has_post_format('link')) {
							get_template_part('/includes/blog/post-formats/content-link');
						} elseif (has_post_format('image')) {
							get_template_part('/includes/blog/post-formats/content-image');
						} elseif (has_post_format('gallery')) {
							get_template_part('/includes/blog/post-formats/content-gallery');
						} elseif (has_post_format('quote')) {
							get_template_part('/includes/blog/post-formats/content-quote');
						} elseif (has_post_format('status')) {
							get_template_part('/includes/blog/post-formats/content-status');
						} elseif (has_post_format('chat')) {
							get_template_part('/includes/blog/post-formats/content-chat');
						} else {
							get_template_part('/includes/blog/post-formats/content');
						}

					?>

			</article>

			<?php if (is_single()): ?>

				<?php if ($gvc['gvc-blog-author'] && $gvc['gvc-blog-author'] == 1): ?>

					<aside class="post-author-info">
						<?php if ('' != get_avatar(get_the_author_meta('email'), '60')): ?>
							<div class="author-gavatar gvc-gavatar"><?php echo get_avatar(get_the_author_meta('email'), '60'); ?></div>
						<?php endif ?>
						<div class="author-info-box">
							<h3 class="post-author-info-title"><?php echo __("About the author:", TEMP_NAME); ?> <a href="<?php echo get_author_posts_url( get_the_author_meta("ID") ); ?>"><?php echo get_the_author_meta("display_name"); ?></a></h3>
							<?php if ('' != get_the_author_meta("description")): ?>
								<div class="author-description"><?php echo get_the_author_meta("description"); ?></div>
							<?php endif ?>
						</div>
					</aside>

				<?php endif; ?>

				<?php if ($gvc['gvc-blog-comments'] && $gvc['gvc-blog-comments'] == 1) {
					comments_template();
				} ?>

			<?php endif; ?>
			
		<?php endwhile; ?>

	<?php else : ?>

		<?php gvc_not_found('post'); ?>

	<?php endif; ?>