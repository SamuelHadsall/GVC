<?php if (is_author()): ?>
	<?php global $author; $userdata = get_userdata($author); ?>
	<?php if ('' != $userdata->description): ?>
		<aside class="post-author-info term-info">
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
	<?php endif ?>
<?php endif ?>

<?php if (is_tag()): ?>
	<?php if ('' != tag_description()): ?>
		<aside class="term-info">
			<h3 class="term-info-title">"<?php single_tag_title(); ?>"<?php echo __(" tag description:", TEMP_NAME); ?> </h3>
			<div class="term-description"><?php echo tag_description(); ?></div>
		</aside>
	<?php endif ?>
<?php endif ?>

<?php if (is_category()): ?>
	<?php if ('' != category_description()): ?>
		<aside class="term-info">
			<h3 class="term-info-title">"<?php single_cat_title(); ?>"<?php echo __(" category description:", TEMP_NAME); ?> </h3>
			<div class="term-description"><?php echo category_description(); ?></div>
		</aside>
	<?php endif ?>
<?php endif ?>
