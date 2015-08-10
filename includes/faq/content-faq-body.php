<?php


	global $gvc;

    $gvc_faq_sidebar = "false";


    if($gvc['gvc-faq-widget-area'] && $gvc['gvc-faq-widget-area'] == 1){
		$gvc_faq_sidebar = "true";
	}

?>
	
<div class="container">

	<section class="content gvc-clearfix">

			<?php if ($gvc_faq_sidebar == "true"): ?>

				<section class="main-content col three_quarters">

					<?php get_template_part( '/includes/faq/content-faq-term' ); ?>

					<div class="faq-layout gvc-clearfix">

						<?php get_template_part( '/includes/faq/content-faq-post' ); ?>

					</div>
					
				</section>

				<aside class="sidebar col one_quarter last-yes">
					<?php

						if($gvc['gvc-faq-widget-area'] && $gvc['gvc-faq-widget-area'] == 1){
							get_sidebar('faq');
						}

					?>
				</aside>

			<?php else: ?>

				<?php get_template_part( '/includes/faq/content-faq-term' ); ?>
				<div class="faq-layout gvc-clearfix">
					<?php get_template_part( '/includes/faq/content-faq-post' ); ?>
				</div>
				
			<?php endif ?>

	</section>

</div>
<?php custom_tweets(); ?>