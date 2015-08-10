<?php global $gvc; ?>
<aside class="footer-widget-area widget-area <?php echo (($gvc['gvc-footer-widget-area-columns']) ? 'columns-'.$gvc['gvc-footer-widget-area-columns'] : 'columns-4'); ?>">
	<div class="container gvc-clearfix">     
		<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar('footer-widget-area') ) : ?>
		<?php endif; ?>
	</div>
</aside>