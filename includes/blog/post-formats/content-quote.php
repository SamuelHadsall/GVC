<?php 

	$values = get_post_custom( $post->ID );
	$gvc_post_quote_author = isset($values["gvc_post_quote_author"][0]) ? $values["gvc_post_quote_author"][0] : "";

?>

<div class="post-body">

	<?php if (!is_single()): ?>

		<?php if ( '' != get_the_title() ): ?>
			<h3 class="post-title">
				<?php if (is_single()): ?>
					<?php the_title(); ?>
				<?php else: ?>
					<a href="<?php the_permalink(); ?>" title="<?php echo __("Read more about", TEMP_NAME).' '.get_the_title(); ?>" rel="bookmark">
						<?php the_title(); ?>
					</a>
				<?php endif ?>
			</h3>
		<?php endif; ?>

	<?php endif; ?>

	<?php get_template_part('/includes/blog/content-blog-meta');?>

	<?php if ( '' != get_the_content() ): ?>

		<div class="post-content gvc-clearfix">
			<?php the_content(); ?>
		</div>

	<?php endif; ?>

	<?php if (!empty($gvc_post_quote_author)) : ?>
		<div class="quote-author">
			<?php echo "- ". $gvc_post_quote_author; ?>
		</div>
	<?php endif; ?>

</div>

<?php get_template_part('/includes/blog/content-blog-meta-footer');?>

<?php if (is_single() && has_tag()): ?>
	<div class="post-tags">
		<?php the_tags('', '', ''); ?>
	</div>
<?php endif ?>

<?php get_template_part('/includes/blog/content-blog-social-share');?>