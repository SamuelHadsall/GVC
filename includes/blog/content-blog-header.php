<?php  
	
	global $gvc;
	$gvc_slider_status   = "no";

	if (is_front_page()) {
		$gvc_slider_settings = get_option("gvc_slider_settings");
		if (isset($gvc_slider_settings["gvc_slider"]) && $gvc_slider_settings["gvc_slider"] == "yes") {
			$gvc_slider_status = "yes";
		}
	}

?>

<?php if ($gvc_slider_status == "yes") : ?>
	<?php get_template_part('includes/gvc-slider'); ?>
<?php else: ?>

		<header class="rich-header blog-header">

			<div class="container gvc-clearfix">

				<?php if (is_author() || is_archive() || is_day() || is_tag() || is_category() || is_month() || is_day() || is_year()): ?>

					<h1 class="page-title">
						<?php if (is_category()): ?>
							<?php echo single_cat_title("", true); ?>
						<?php elseif(is_tag()): ?>
							<?php echo single_tag_title("", true); ?>
						<?php elseif(is_day()): ?>
							<?php echo the_time('F jS, Y'); ?>
						<?php elseif(is_month()): ?>
							<?php echo the_time('F, Y'); ?>
						<?php elseif(is_year()): ?>
							<?php echo the_time('Y'); ?>
						<?php elseif(is_author()): ?>
							<?php global $author; $userdata = get_userdata($author); ?>
							<?php echo __("Articles posted by", TEMP_NAME); ?> "<?php echo $userdata->display_name; ?>"
						<?php else: ?>
							<?php echo __("Archive", TEMP_NAME); ?>
						<?php endif ?>
					</h1>
				
				<?php else: ?>

					<?php if (is_single() && ( '' != get_the_title() )): ?>
					
					<h1 class="page-title">
						<?php echo get_the_title(); ?>
					</h1>
					
					<?php endif ?>
					
				<?php endif; ?>
				
				<?php if (is_single()){gvc_post_nav($post->ID);} ?>
					
			</div>

		</header>

<?php endif ?>