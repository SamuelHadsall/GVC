<?php

	global $gvc;
	$gvc_portfolio_layout       = ($gvc['gvc-portfolio-layout']) ? $gvc['gvc-portfolio-layout'] : "medium";
	$values = get_post_custom( $post->ID );
	$gvc_portfolio_featured_media = isset($values["gvc_portfolio_featured_media"][0]) ? $values["gvc_portfolio_featured_media"][0] : "yes";
	$gvc_portfolio_format         = isset($values["gvc_portfolio_format"][0]) ? $values["gvc_portfolio_format"][0] : "image";

	$thumb_size = 'gvc-Half';
	switch ($gvc_portfolio_layout) {
	    case 'image-grid-large':
	    case 'no-gap-grid':
	        $thumb_size = 'gvc-Half';
	        break;

	    case 'medium':
	    case 'small' :
	    case 'image-grid-medium':
	    case 'image-grid-small':
	        $thumb_size = 'gvc-One-Third';
	        break;
	        
	    case 'full' :
	        $thumb_size = 'gvc-Whole';
	        break;
	}

	if ($gvc['gvc-portfolio-pagination'] == 0) {
		global $query_string;
		query_posts( $query_string . '&posts_per_page=-1' );
	}

?>
	
<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>

		<article data-grid="gvc_01" data-format="<?php echo $gvc_portfolio_format; ?>" <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<?php if ($gvc_portfolio_layout == "small" || $gvc_portfolio_layout == "medium" || $gvc_portfolio_layout == "large" || $gvc_portfolio_layout == "full"): ?>

				<?php if (!is_single()): ?>

					<?php 
						gvc_thumbnail($gvc_portfolio_layout, $post->ID);
						get_template_part('/includes/portfolio/content-portfolio-post-body');
					?>


				<?php else: ?>	

					<?php
						if ($gvc['gvc-portfolio-solo-layout'] == 0) {
							if (isset($gvc_portfolio_featured_media) && $gvc_portfolio_featured_media == "yes") {
								get_template_part('/includes/portfolio/content-portfolio-media');
							} 
						}
						get_template_part('/includes/portfolio/content-portfolio-post-body'); 
					?>

				<?php endif ?>

			<?php else: ?>

				<?php if (!is_single()): ?>

					<div class="gvc-thumbnail">
						<?php if (has_post_thumbnail()): ?>
							<?php echo get_the_post_thumbnail( $post->ID, $thumb_size ); ?>
						<?php endif; ?>
			            <div class="gvc-overlay with-content">
			            	<div class="gvc-overlay-content">
				                <h3 class='post-title'><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
								<?php if('' != get_the_term_list($post->ID, 'portfolio-category')): ?>
									<div class="project-category">
										<span><?php echo get_the_term_list( $post->ID, 'portfolio-category', '', '<span class="comma">, </span>', '' ); ?></span>
									</div>
								<?php endif ?>
							</div>
							<a class="dark-gvc-more" href="<?php the_permalink(); ?>">&nbsp;</a>
			            </div>
			        </div>

				<?php else: ?>	

					<?php
						if ($gvc['gvc-portfolio-solo-layout'] == 0) {
							if (isset($gvc_portfolio_featured_media) && $gvc_portfolio_featured_media == "yes") {
								get_template_part('/includes/portfolio/content-portfolio-media');
							} 
						} 
						get_template_part('/includes/portfolio/content-portfolio-post-body'); 
					?>

				<?php endif ?>
				
			<?php endif ?>
		</article>

		<?php if (is_single()): ?>

			<?php if ($gvc['gvc-portfolio-solo-layout'] == 1): ?>

				<?php if ($gvc['gvc-portfolio-social-share'] && $gvc['gvc-portfolio-social-share'] == 1): ?>
			
					<div class="post-social-share gvc-clearfix">
						<a class="post-twitter-share" target="_blank" href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="<?php echo __("Tweet this!", TEMP_NAME); ?>"><i class="fa fa-twitter"></i></a>
						<a class="post-facebook-share" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="<?php echo __("Share on Facebook", TEMP_NAME); ?>"><i class="fa fa-facebook"></i></a>
						<a class="post-linkedin-share" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" title="<?php echo __("Share on LinkedIn", TEMP_NAME); ?>"><i class="fa fa-linkedin"></i></a>
						<a class="post-google-share" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" title="<?php echo __("Share on Google+", TEMP_NAME); ?>"><i class="fa fa-google-plus"></i></a>
						<a class="post-pinterest-share" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $url; ?>" title="<?php echo __("Share on Pinterest", TEMP_NAME); ?>"><i class="fa fa-pinterest"></i></a>
					</div>

				<?php endif; ?>

			<?php endif; ?>

			<?php if ($gvc['gvc-portfolio-comments'] && $gvc['gvc-portfolio-comments'] == 1) {comments_template();} ?>

		<?php endif; ?>

	<?php endwhile; ?>

<?php else : ?>

	<?php gvc_not_found('portfolio'); ?>

<?php endif; ?>