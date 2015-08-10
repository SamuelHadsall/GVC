<?php


	global $gvc;

    $gvc_portfolio_loop_sidebar = "false";
	$gvc_portfolio_layout       = ($gvc['gvc-portfolio-layout']) ? $gvc['gvc-portfolio-layout'] : "medium";
	$gvc_portfolio_solo_layout  = ($gvc['gvc-portfolio-solo-layout'] && $gvc['gvc-portfolio-solo-layout'] == 1) ? "solo-layout" : "default-layout";
	$gvc_grid                   = "grid_3";

	switch ($gvc_portfolio_layout) {
		case 'small':
			$gvc_grid = "grid_4";
			break;

		case 'image-grid-small':
			$gvc_grid = "grid_4 image-grid";
			break;

		case 'medium':
			$gvc_grid = "grid_3";
			break;

		case 'image-grid-medium':
			$gvc_grid = "grid_3 image-grid";
			break;

		case 'large':
			$gvc_grid = "grid_2";
			break;

		case 'image-grid-large':
			$gvc_grid = "grid_2 image-grid";
			break;

		case 'full':
			$gvc_grid = "grid_1";
			break;

		case 'no-gap-grid':
			$gvc_grid = "fluid_grid";
			break;

		default:
			$gvc_grid = "grid_3";
			break;
	}


    if($gvc['gvc-portfolio-widget-area'] && $gvc['gvc-portfolio-widget-area'] == 1){
		$gvc_portfolio_loop_sidebar = "true";
	}

?>
	
<div class="container <?php echo $gvc_portfolio_solo_layout; ?> <?php echo $gvc_portfolio_layout; ?>">

	<?php if (!is_single()): ?>

		<section class="content loop gvc-clearfix <?php echo $gvc_grid; ?>">

				<?php if ($gvc_portfolio_loop_sidebar == "true" && $gvc_portfolio_layout != "no-gap-grid"): ?>

					<section class="main-content col three_quarters">

						<?php get_template_part( '/includes/portfolio/content-portfolio-term' ); ?>

						<div class="portfolio-layout gvc-clearfix <?php echo $gvc_portfolio_layout; ?>">

							<?php get_template_part( '/includes/portfolio/content-portfolio-post' ); ?>

						</div>
						
					</section>

					<aside class="sidebar col one_quarter last-yes">
						<?php

							if($gvc['gvc-portfolio-widget-area'] && $gvc['gvc-portfolio-widget-area'] == 1){
								get_sidebar('portfolio');
							}

						?>
					</aside>

				<?php else: ?>

					<?php get_template_part( '/includes/portfolio/content-portfolio-term' ); ?>
					<div class="portfolio-layout gvc-clearfix <?php echo $gvc_portfolio_layout; ?>">
						<?php get_template_part( '/includes/portfolio/content-portfolio-post' ); ?>
					</div>
					
				<?php endif ?>

		</section>

	<?php elseif(is_single()): ?>

		<section class='content gvc-clearfix'>
			<?php get_template_part( '/includes/portfolio/content-portfolio-post' ); ?>
		</section>
		
	<?php endif; ?>

	<?php gvc_post_nav_num(); ?>
	
</div>
<?php custom_tweets(); ?>