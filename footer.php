<?php if (!is_404()): ?>
	
	<?php 
		global $gvc;
	?>
	</div>
	<!-- page-content-container end -->
	
	<!-- footer start -->
	<footer class='footer'>
		<div class="footer-widget-area-wrap">
			<?php get_sidebar('footer'); ?>
		</div>
		<div class="footer-content">
			<div class="container gvc-clearfix">
				<?php if ($gvc['gvc-footer-social-links'] && $gvc['gvc-footer-social-links'] == 1): ?>
					<div class="social-links">
						<?php get_template_part("/includes/social-links"); ?>
					</div>
				<?php endif ?>
				<?php if (has_nav_menu("footer-menu")): ?>
					<nav class="footer-menu gvc-clearfix">
						<?php

							$arg = array( 
								'theme_location' => 'footer-menu', 
								'depth'          => 1, 
								'container'      => false, 
								'menu_id'        => 'footer-menu', 
							);
							wp_nav_menu($arg); 
						?>
					</nav>
				<?php endif ?>
				<div class="footer-info">
					<?php if ($gvc['gvc-copyright']) { ?>
						<?php echo $gvc['gvc-copyright']; ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</footer>
	<!-- footer end -->

<?php endif ?>

</div>
<!-- wrap end -->
<div id="toTop">&nbsp;</div>

<!-- =============================== OLD BROWSER MESSAGE =============================== -->

	<div class="old-browser alert warning">
		<div class="alert-message">
			<h2><?php echo __("Your browser is out of date. It has security vulnerabilities and may not display all features on this site and other sites.", TEMP_NAME) ?></h2>
			<p><?php echo __("Please update your browser using one of modern browsers (Google Chrome, Opera, Firefox, IE 10).", TEMP_NAME) ?></p>
		</div>
		<span class="close-alert">X</span>
	</div>
<?php wp_footer(); ?>
<?php include("includes/dynamic-scripts.php"); ?>
</body>
</html>