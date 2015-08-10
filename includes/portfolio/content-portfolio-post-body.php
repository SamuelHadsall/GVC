<?php 
	global $gvc;
	$values = get_post_custom( $post->ID );
	$gvc_portfolio_client       = isset($values["gvc_portfolio_client"][0]) ? $values["gvc_portfolio_client"][0] : "";
	$gvc_portfolio_project_link = isset($values["gvc_portfolio_project_link"][0]) ? $values["gvc_portfolio_project_link"][0] : "";
	$gvc_portfolio_format       = isset($values["gvc_portfolio_format"][0]) ? $values["gvc_portfolio_format"][0] : "image";
?>
<section class="post-body">

	<?php if (!is_single()): ?>

		<?php if ( '' != get_the_title() ): ?>
			<h4 class="post-title">
				<a href="<?php the_permalink(); ?>" title="<?php echo __("Explore", TEMP_NAME).' '.get_the_title(); ?>" rel="bookmark">
					<?php the_title(); ?>
				</a>
			</h4>
		<?php endif; ?>
		<?php if('' != get_the_term_list($post->ID, 'portfolio-category')): ?>
			<div class="project-category">
				<span><?php echo get_the_term_list( $post->ID, 'portfolio-category', '', '<span class="comma">, </span>', '' ); ?></span>
			</div>
		<?php endif ?>
			
	<?php else: ?>

		<div class="gvc-clearfix">

			<?php if ('' != get_the_content()): ?>

				<div class="project-content gvc-clearfix"><?php the_content() ?></div>

			<?php endif ?>

			<?php if ($gvc['gvc-portfolio-solo-layout'] == 0): ?>

				<?php if ($gvc['gvc-portfolio-social-share'] && $gvc['gvc-portfolio-social-share'] == 1): ?>
			
					<div class="post-social-share gvc-clearfix">
						<a class="post-twitter-share" target="_blank" href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="<?php echo __("Tweet this!", TEMP_NAME); ?>"><i class="fa fa-twitter"></i></a>
						<a class="post-facebook-share" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="<?php echo __("Share on Facebook", TEMP_NAME); ?>"><i class="fa fa-facebook"></i></a>
						<a class="post-linkedin-share" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" title="<?php echo __("Share on LinkedIn", TEMP_NAME); ?>"><i class="fa fa-linkedin"></i></a>
						<a class="post-google-share" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" title="<?php echo __("Share on Google+", TEMP_NAME); ?>"><i class="fa fa-google-plus"></i></a>
						<a class="post-pinterest-share" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $url; ?>" title="<?php echo __("Share on Pinterest", TEMP_NAME); ?>"><i class="fa fa-pinterest"></i></a>
					</div>

				<?php endif ?>

			<?php endif ?>

		</div>

		<?php if ($gvc['gvc-portfolio-solo-layout'] == 0): ?>

			<div class="project-details">

				<?php if('' != get_the_term_list($post->ID, 'portfolio-category')): ?>
					<div class="project-category">
						<span><?php echo __('Category: ', TEMP_NAME); ?></span>
						<span><?php echo get_the_term_list( $post->ID, 'portfolio-category', '', '<span class="comma">, </span>', '' ); ?></span>
					</div>
				<?php endif ?>

				<?php if('' != get_the_term_list($post->ID, 'portfolio-tag')): ?>
					<div class="project-tags">
						<span><?php echo __('Tags: ', TEMP_NAME); ?></span>
						<span><?php echo get_the_term_list( $post->ID, 'portfolio-tag', '', ', ', '' ); ?></span>
					</div>
				<?php endif ?>

				<?php if (!empty($gvc_portfolio_client)): ?>
					<div class="project-client">
						<span><?php echo __('Client: ', TEMP_NAME); ?></span>
						<span><?php echo $gvc_portfolio_client; ?></span>
					</div>
				<?php endif ?>

				<?php if (!empty($gvc_portfolio_project_link)): ?>
					<a href="<?php echo $gvc_portfolio_project_link; ?>" target="_blank" class="project-link medium button"><?php echo __("Launch project", TEMP_NAME); ?></a>
				<?php endif ?>

			</div>
			
		<?php endif ?>

	<?php endif ?>	

</section>
