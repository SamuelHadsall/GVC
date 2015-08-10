<?php get_header(); ?>
<header class="search-header rich-header">
	<div class="container gvc-clearfix">
		<h1 class="page-title"><?php echo __('Search', TEMP_NAME); ?></h1>
	</div>
</header>

<div class='container search-results'>

	<section class='content gvc-clearfix'>

		<div class="search-form">
			<?php get_search_form(); ?>
		</div>

		<p class="search-results-title">
			<?php
				global $wp_query;
				$total_results = $wp_query->found_posts;
			?>
			<?php echo $total_results.__(' search results for', TEMP_NAME).' <strong><i>"'.get_search_query().'</i></strong>"'; ?>
		</p>

		<?php if (have_posts()) : ?>


			<?php while (have_posts()) : the_post(); ?>

				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<div class="post-body">
						<?php if ( '' != get_the_title() ): ?>
							<h2 class="post-title">
								<a href="<?php the_permalink(); ?>" title="<?php echo __("Go to", TEMP_NAME).' '.get_the_title(); ?>" rel="bookmark">
									<?php the_title(); ?>
								</a>
							</h2>
						<?php endif; ?>
						<a class="search-result-permalink" href="<?php the_permalink(); ?>" title="<?php echo __("Go to", TEMP_NAME).' '.get_the_title(); ?>" rel="bookmark">
							<?php the_permalink(); ?>
						</a>
						<?php if ( '' != get_the_content() ): ?>
						<div class="post-content gvc-clearfix">
							<?php the_excerpt_max_charlength(300); gvc_excerpt_more(); ?>
						</div>
						<?php endif; ?>
					</div>
				</article>
				
			<?php endwhile; ?>

			<?php gvc_post_nav_num(); ?>

		<?php else : ?>

			<p><strong><?php echo __('Suggestions:', TEMP_NAME); ?></strong></p>

			<ol>
				<li><?php echo __('Make sure that all words are spelled correctly', TEMP_NAME); ?></li>
				<li><?php echo __('Try different keywords', TEMP_NAME); ?></li>
				<li><?php echo __('Try more general keywords', TEMP_NAME); ?></li>
				<li><?php echo __('Try fewer keywords', TEMP_NAME); ?></li>
			</ol>

		<?php endif; ?>

	</section>
	
</div>
<?php custom_tweets(); ?>
<?php get_footer(); ?>