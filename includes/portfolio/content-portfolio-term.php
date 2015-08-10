<?php if (is_tax('portfolio-category')): ?>
	<?php if ('' != tag_description()): ?>
		<aside class="term-info">
			<h3 class="term-info-title">"<?php single_term_title(); ?>"<?php echo __(" category description:", TEMP_NAME); ?> </h3>
			
				<div class="term-description"><?php echo term_description(); ?></div>
			
		</aside>
	<?php endif ?>
<?php endif ?>

<?php if (is_tax('portfolio-tag')): ?>
	<?php if ('' != tag_description()): ?>
		<aside class="term-info">
			<h3 class="term-info-title">"<?php single_term_title(); ?>"<?php echo __(" tag description:", TEMP_NAME); ?> </h3>
			
				<div class="term-description"><?php echo term_description(); ?></div>
			
		</aside>
	<?php endif ?>
<?php endif ?>
