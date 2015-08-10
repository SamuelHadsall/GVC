<?php  
	
	global $gvc;
	$gvc_portfolio_title = ($gvc["gvc-portfolio-title"]) ? $gvc["gvc-portfolio-title"] : __("Portfolio", TEMP_NAME);

?>
	
<header class="rich-header portfolio-header">

	<div class="container gvc-clearfix">

		<?php if (!is_single()): ?>

			<?php if (is_post_type_archive('portfolio') || is_tax('portfolio-category')): ?>
				
				<div class="portfolio-title col one_third">
					<h1>
						<?php echo ((is_tax('portfolio-category')) ? single_cat_title("", false) : $gvc_portfolio_title); ?>
					</h1>
				</div>

				<?php $taxonomy  = 'portfolio-category'; $tax_terms = get_terms($taxonomy); ?>
				<?php if (count($tax_terms) != 0): ?>

					<div class="gvc-filter col two_thirds last-yes">
						<ul class="gvc-clearfix">
							<li><a href="<?php echo get_post_type_archive_link( 'portfolio' ); ?>" title="<?php echo __( 'All', TEMP_NAME ) ?>"><?php echo __( "All", TEMP_NAME ) ?></a></li>
							<?php
								foreach ($tax_terms as $tax_term) {
									echo '<li>' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "View all projects in %s", TEMP_NAME ), $tax_term->name ) . '" ' . '>' . $tax_term->name.'</a></li>';
								}
							?>
						</ul>
					</div>

				<?php endif; ?>

			<?php else: ?>

				<h1 class="page-title">
					<?php echo ((is_tax('portfolio-tag')) ? __('Tag: ', TEMP_NAME).single_cat_title("", false) : $gvc_portfolio_title); ?>
				</h1>
				
			<?php endif; ?>

		<?php else: ?>
		
			<h1 class="page-title">
				<?php echo (( '' != get_the_title() ) ? get_the_title() : $gvc_portfolio_title); ?>
			</h1>
			
		<?php endif; ?>
		
		<?php gvc_post_nav($post->ID); ?>
			
	</div>

</header>
