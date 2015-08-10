<?php

	$values = get_post_custom( $post->ID );
	global $gvc;
	$gvc_post_image_url         = isset($values["gvc_post_image_url"][0]) ? $values["gvc_post_image_url"][0] : "";
	$gvc_post_image_description = isset($values["gvc_post_image_description"][0]) ? $values["gvc_post_image_description"][0] : "";
?>
<?php 
	
?>
<?php if (!empty($gvc_post_image_url)): ?>

	<div class="gvc-thumbnail">

		<img src="<?php echo $gvc_post_image_url; ?>" alt="<?php echo $gvc_post_image_description; ?>">

		<div class="gvc-overlay">

			<?php if (!is_single()): ?>
                <a class="gvc-more" href="<?php the_permalink(); ?>">&nbsp;</a>
            <?php else: ?>
                <a class="gvc-more" href="<?php echo $gvc_post_image_url; ?>" >&nbsp;</a>
            <?php endif; ?>

		</div>
	</div>

<?php endif ?>

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
			<?php $limit = ($gvc['gvc-blog-excerpt-length']) ? $gvc['gvc-blog-excerpt-length'] : 285 ?>
			<?php if(is_single()) { 
				the_content(); 
				$defaults = array(
					'before'           => '<div id="page-links">',
					'after'            => '</div>',
					'link_before'      => '',
					'link_after'       => '',
					'next_or_number'   => 'next',
					'separator'        => ' ',
					'nextpagelink'     => __( 'Continue reading', TEMP_NAME ),
					'previouspagelink' => __( 'Go back' , TEMP_NAME),
					'pagelink'         => '%',
					'echo'             => 1
				);
				wp_link_pages($defaults);
			} else { the_excerpt_max_charlength($limit); gvc_excerpt_more(); } ?>
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