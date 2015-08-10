<?php // Template name: Sitemap ?>
<?php get_header(); ?>
<?php get_template_part( '/includes/page/content-page-header' ); ?>
<?php

	$values                   = get_post_custom( get_the_ID() );
	$gvc_page_sidebar      = (isset($values["gvc_page_sidebar"][0])) ? $values["gvc_page_sidebar"][0] : "none";
	$page_sidebar             = "false";

?>
<div class='container sidebar-<?php echo $page_sidebar; ?>'>
	<!-- content start -->
	<section class='content gvc-clearfix'>
		<?php

			if($gvc_page_sidebar == "left") {

				echo '<aside class="sidebar col one_quarter">';
					get_sidebar('page');
				echo '</aside>';

				echo '<section class="main-content col three_quarters last-yes">';
					get_template_part( '/includes/page/content-page-sitemap' );
				echo '</section>';
				
			} elseif ($gvc_page_sidebar == "right") {

				echo '<section class="main-content col three_quarters">';
					get_template_part( '/includes/page/content-page-sitemap' );
				echo '</section>';

				echo '<aside class="sidebar col one_quarter last-yes">';
					get_sidebar('page');
				echo '</aside>';

			} else {
				echo get_template_part( '/includes/page/content-page-sitemap' );
			}

		?>
	</section>
	<!-- content end -->
</div>
<!-- container end -->
<?php if(isset($values["gvc_page_twitter"][0]) && $values["gvc_page_twitter"][0] == "yes"): ?>
	<?php custom_tweets(); ?>
<?php endif; ?>
<?php get_footer(); ?>