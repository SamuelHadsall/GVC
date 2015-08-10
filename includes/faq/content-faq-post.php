<?php global $gvc; ?>
<?php global $query_string; query_posts( $query_string . '&posts_per_page=-1' ); ?>
			
<?php if(have_posts()) : ?>

	<?php if (!is_single()): ?>

		<div class="accordion collapsible-no">

			<?php while (have_posts()) : the_post(); ?>

				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

					<div class="post-body">

						<div class="toggle-title gvc-clearfix">
							<?php if ( '' != get_the_title() ): ?>
								<h6 class="post-title toggle-title-header"><?php the_title(); ?></h6>
							<?php else: ?>
								<h6 class="post-title toggle-title-header"><?php echo __('No F.A.Q. Title', TEMP_NAME); ?></h6>
							<?php endif; ?>
							<span class="arrow">+</span>
						</div>
						<div class="toggle-content">
							<?php if('' != get_the_term_list($post->ID, 'faq-category')): ?>
								<div class="post-meta">
									<div class="post-category">
										<?php echo get_the_term_list( $post->ID, 'faq-category', '<div class="gvc-clearfix">', '', '</div>' ); ?>
									</div>
								</div>
							<?php endif ?>

							<div class="post-content gvc-clearfix">
								<?php if ( '' != get_the_content() ): ?>
									<?php the_content(); ?>
								<?php else: ?>
									<?php echo __('No F.A.Q. Content', TEMP_NAME); ?>
								<?php endif; ?>
							</div>
						</div>

					</div>

				</article>

			<?php endwhile; ?>

		</div>

	<?php else: ?>

		<?php while (have_posts()) : the_post(); ?>

			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<div class="post-body">

					<?php if('' != get_the_term_list($post->ID, 'faq-category')): ?>
						<div class="post-meta">
							<div class="post-category">
								<?php echo get_the_term_list( $post->ID, 'faq-category', '', '', '' ); ?>
							</div>
						</div>
					<?php endif ?>

					<div class="post-content gvc-clearfix">
						<?php if ( '' != get_the_content() ): ?>
							<?php the_content(); ?>
						<?php else: ?>
							<?php echo __('No F.A.Q. Content', TEMP_NAME); ?>
						<?php endif; ?>
					</div>

					<?php if('' != get_the_term_list($post->ID, 'faq-tag')): ?>
						<div class="post-tags">
							<?php echo get_the_term_list( $post->ID, 'faq-tag', '', '', '' ); ?>
						</div>
					<?php endif ?>

				</div>

			</article>

		<?php endwhile; ?>

	<?php endif ?>

<?php else : ?>

	<?php echo gvc_not_found('faq'); ?>

<?php endif; ?>

<?php wp_reset_postdata(); ?>