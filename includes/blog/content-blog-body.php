<?php

	global $gvc;				

	$gvc_blog_loop_sidebar   = "false";
	$gvc_blog_single_sidebar = "false";
	$gvc_blog_layout         = ($gvc['gvc-blog-layout']) ? $gvc['gvc-blog-layout'] : "medium";
	$gvc_grid                = "grid_3";

	switch ($gvc_blog_layout) {
		case 'small':
			$gvc_grid = "grid_4";
			break;
		case 'medium':
			$gvc_grid = "grid_3";
			break;
		case 'large':
			$gvc_grid = "grid_2";
			break;
		case 'full':
			$gvc_grid = "grid_1";
			break;
		default:
			$gvc_grid = "grid_3";
			break;
	}

	if($gvc['gvc-blog-main-widget-area'] && $gvc['gvc-blog-main-widget-area'] == 1){
		$gvc_blog_loop_sidebar = "true";
	}

	if($gvc['gvc-blog-single-main-widget-area'] && $gvc['gvc-blog-single-main-widget-area'] == 1){
		$gvc_blog_single_sidebar = "true";
	}

?>
	
<div class="container">

	<?php if (!is_single()): ?>

		<section class="content loop gvc-clearfix <?php echo $gvc_grid; ?>">

				<?php if ($gvc_blog_loop_sidebar == "true"): ?>

					<section class="main-content col three_quarters">

						<?php get_template_part( '/includes/blog/content-blog-term' ); ?>

						<div class="blog-layout <?php echo $gvc_blog_layout; ?>">

							<?php get_template_part( '/includes/blog/content-blog-post' ); ?>

						</div>
						
					</section>

					<aside class="sidebar col one_quarter last-yes">
						<?php

							if($gvc['gvc-blog-main-widget-area'] && $gvc['gvc-blog-main-widget-area'] == 1){
								get_sidebar();
							}

						?>
					</aside>

				<?php else: ?>

					<?php get_template_part( '/includes/blog/content-blog-term' ); ?>
					<div class="blog-layout <?php echo $gvc_blog_layout; ?>">
						
						<?php get_template_part( '/includes/blog/content-blog-post' ); ?>

					</div>
					
				<?php endif ?>

		</section>

	<?php elseif(is_single()): ?>

		<section class='content gvc-clearfix'>

				<?php if ($gvc_blog_single_sidebar == "true"): ?>

					<section class="main-content col three_quarters">
						<?php get_template_part( '/includes/blog/content-blog-post' ); ?>
					</section>

					<aside class="sidebar col one_quarter last-yes">
						<?php

							if($gvc['gvc-blog-single-main-widget-area'] && $gvc['gvc-blog-single-main-widget-area'] == 1){
								get_sidebar();
							}

						?>
					</aside>

				<?php else: ?>

					<?php get_template_part( '/includes/blog/content-blog-post' ); ?>
					
				<?php endif ?>	
		</section>
		
	<?php endif; ?>

	<?php gvc_post_nav_num(); ?>
	
</div>
<?php custom_tweets(); ?>
