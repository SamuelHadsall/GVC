<?php get_header(); ?>
<?php  global $gvc; ?>
<div class='container'>
	<!-- content start -->
	<section class='content gvc-clearfix'>
		<div class="error404-wrap">
			<div class="error404-status">404</div>
			<h2 class="error404-title"><?php echo __("Page not found", TEMP_NAME); ?></h2>
			<?php if ($gvc['gvc-error-404-message']): ?>
				<div class="error404-message"><?php echo $gvc['gvc-error-404-message']; ?></div>
			<?php else: ?>
				<div class="error404-message"><?php echo __("The page you are looking for no longer exists. Perhaps you can return back to the site's homepage and see if you can find what you are looking for.", TEMP_NAME); ?></div>
			<?php endif ?>
			<div class="error404-suggestions">
				<div class="home-suggestion">
					<a href="<?php echo home_url(); ?>" class="button"><?php echo __("Goto homepage", TEMP_NAME); ?></a>
				</div>
				<div class="search-form">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</section>
	<!-- content end -->
</div>
<!-- container end -->
<?php get_footer(); ?>
