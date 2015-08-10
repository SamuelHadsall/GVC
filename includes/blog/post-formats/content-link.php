<?php 
	$values = get_post_custom( $post->ID );
	$gvc_post_link_url = isset($values["gvc_post_link_url"][0]) ? $values["gvc_post_link_url"][0] : "";
?>

<?php if (!empty($gvc_post_link_url)): ?>

	<div class="post-body">

		<?php if (!is_single()): ?>

			<?php if ( '' != get_the_title() ): ?>
				<h3 class="post-title">
					<a href="<?php echo $gvc_post_link_url; ?>" rel="bookmark" title="<?php echo __("Read more about", TEMP_NAME).' '.get_the_title(); ?>" target="_blank"><?php the_title(); ?></a>
				</h3>
			<?php else: ?>
				<h3 class="post-title">
					<a href="<?php echo $gvc_post_link_url; ?>" rel="bookmark" title="<?php echo __("Read more about", TEMP_NAME).' '.$gvc_post_link_url; ?>" target="_blank"><?php echo $gvc_post_link_url; ?></a>
				</h3>
			<?php endif ?>

		<?php endif ?>

		<div class="post-date"><?php echo the_time( get_option( 'date_format' ) ); ?></div>	
		<div class="post-link"><a href="<?php echo $gvc_post_link_url; ?>" rel="bookmark" title="<?php echo __("Go to", TEMP_NAME).' '.$gvc_post_link_url; ?>" target="_blank"><?php echo $gvc_post_link_url; ?></a></div>

	</div>

<?php endif ?>

<?php if (is_single() && has_tag()): ?>
	<div class="post-tags">
		<?php the_tags('', '', ''); ?>
	</div>
<?php endif ?>

<?php get_template_part('/includes/blog/content-blog-social-share');?>