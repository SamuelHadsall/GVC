<header class="rich-header faq-header">

	<div class="container gvc-clearfix">

		<?php if (!is_single()): ?>
			<?php if ((is_tax('faq-tag') || is_tax('faq-category'))): ?>
				<h1 class="page-title">
					<?php echo single_cat_title("", false); ?>
				</h1>
			<?php endif ?>
		<?php else: ?>
		
			<h1 class="page-title">
				<?php echo (( '' != get_the_title() ) ? get_the_title() : __("FAQ", TEMP_NAME)); ?>
			</h1>
			
		<?php endif; ?>
		
		<?php gvc_post_nav($post->ID); ?>
			
	</div>

</header>