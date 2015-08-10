<?php 

	global $gvc;

	$gvc_blog_layout           = ($gvc['gvc-blog-layout']) ? $gvc['gvc-blog-layout'] : "medium";
	$gvc_portfolio_layout      = ($gvc['gvc-portfolio-layout']) ? $gvc['gvc-portfolio-layout'] : 'medium';
	$gvc_one_page_scroll_speed = ($gvc['gvc-one-page-scroll-speed']) ? $gvc['gvc-one-page-scroll-speed'] : 750;
	$gvc_one_page_easing       = ($gvc['gvc-one-page-easing']) ? $gvc['gvc-one-page-easing'] : 'swing';
	$gvc_header_height         = ($gvc['gvc-header-height']) ? $gvc['gvc-header-height'] : '90';
	$gvc_one_page_hash         = ($gvc['gvc-one-page-update-hash'] && $gvc['gvc-one-page-update-hash'] == 1) ? 'true' : 'false';
	$gvc_one_page_filter       = ($gvc['gvc-one-page-filter']) ? explode(',',$gvc['gvc-one-page-filter']) : '';
	$nz_filter_array                 = array();

	if (is_array($gvc_one_page_filter)) {
		foreach ($gvc_one_page_filter as $filter) {
			array_push($nz_filter_array, '.menu-item-'.$filter.'> a');
		}
	}

?>

<!-- =============================== BLOG MASONRY ============================== -->
	
	<?php if (!is_single()): ?>

		<?php if ($gvc_blog_layout == "large" || $gvc_blog_layout == "medium" || $gvc_blog_layout == "small"): ?>

			<script>
			//<![CDATA[
				(function($){
					$(document).ready(function(){
						var options = {
				          itemSelector:'.post',
				          singleMode:true,
				          gutter:24,
				          isFitWidth: true,
				          transitionDuration: '0.11s'
				        };

						var handler  = $('.blog-layout');

						handler.imagesLoaded( function() {
						  	$.when(handler.masonry(options)).done(
								function(){
									handler.addClass('animated-layout');
									setTimeout(function(){
										$('.gvc-navigation').show();
									}, 300);
								}
							)
						});
						
					});
				})(jQuery);
			//]]>
			</script>

		<?php endif; ?>

<!-- ============================= PORTFOLIO MASONRY =========================== -->
	
		<?php if ($gvc_portfolio_layout == "large" || $gvc_portfolio_layout == "medium" || $gvc_portfolio_layout == "small"): ?>
			<script>
				//<![CDATA[
				(function($){
					$(document).ready(function(){
						var options = {
				          itemSelector:'.portfolio',
				          singleMode:true,
				          gutter:24,
				          isFitWidth: true,
				          transitionDuration: '0.15s'
				        };

						var handler  = $('.portfolio-layout');

						handler.imagesLoaded( function() {
						  	$.when(handler.masonry(options)).done(
								function(){
									handler.addClass('animated-layout');
									setTimeout(function(){
										$('.gvc-navigation').show();
									}, 300);
								}
							)
						});

					});
				})(jQuery);
				//]]>
			</script>
		<?php endif; ?>

	<?php endif; ?>


<!-- ============================= ONE PAGE LAYOUT   =========================== -->

	<?php

		$gvc_one_page_status = "no";

		if (is_page()){
			$values = get_post_custom( get_the_ID() );
			if (isset($values['gvc_one_page'][0]) && $values['gvc_one_page'][0] == "yes") {
				$gvc_one_page_status = "yes";
			}
		}

	?>

	<?php if ($gvc['gvc-one-page'] && $gvc['gvc-one-page'] == 1): ?>

		<?php if ($gvc_one_page_status == "yes"): ?>

			<script>
				//<![CDATA[
					(function($){
						$(document).ready(function(){

							var condition = false;

								condition = (Modernizr.mq("only screen and (min-width: 1280px)")) ? true :
											(Modernizr.mq("only screen and (min-width: 1024px)") && $('.header').hasClass('responsive-false')) ? true : false;

							if (condition) {

								$('#header-menu').singlePageNav({
								    currentClass: 'one-page-active',
								    speed: <?php echo $gvc_one_page_scroll_speed; ?>,
									<?php if($gvc['gvc-header-attachment']): ?>
								    offset: <?php echo $gvc_header_height; ?>,
									<?php endif; ?>
								    easing: "<?php echo $gvc_one_page_easing; ?>",
								    updateHash: <?php echo $gvc_one_page_hash; ?>,
								    <?php if(!empty($nz_filter_array)): ?>
								    filter:':not(<?php echo implode(',', $nz_filter_array); ?>)'
								    <?php endif; ?>
								});

							};
							
						});
					})(jQuery);
				//]]>
			</script>
			
		<?php endif ?>

	<?php endif; ?>
