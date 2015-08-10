<?php 

	$values = get_post_custom( $post->ID );
	global $gvc;

	$gvc_blog_layout         = ($gvc['gvc-blog-layout']) ? $gvc['gvc-blog-layout'] : "medium";
	$gvc_post_featured_media = isset($values["gvc_post_featured_media"][0]) ? $values["gvc_post_featured_media"][0] : "yes";

?>

<?php if (!is_single()): ?>
	<aside class="post-gallery">
		<?php gvc_post_gallery($gvc_blog_layout, $post->ID); ?>
	</aside>	
<?php else: ?>
	<?php if ($gvc_post_featured_media == "yes") : ?>
		<aside class="post-gallery">
			<?php gvc_post_gallery($gvc_blog_layout, $post->ID); ?>
		</aside>
	<?php endif; ?>
<?php endif; ?>

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