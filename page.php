<?php get_header(); ?>
<?php get_template_part( '/includes/page/content-page-header' ); ?>
<?php

	$values                   = get_post_custom( get_the_ID() );
	$gvc_page_sidebar      = (isset($values["gvc_page_sidebar"][0])) ? $values["gvc_page_sidebar"][0] : "none";
	$gvc_page_layout_class = "";
	$gvc_page_padding_top  = (isset($values["gvc_page_padding_top"][0]) && $values["gvc_page_padding_top"][0] == "no") ? (($gvc_page_sidebar == "none") ? "padding-top:0px;" : "padding-top:70px;") : "padding-top:70px;";

	if(isset($values["gvc_page_layout"][0]) && $values["gvc_page_layout"][0] == "yes"){
		$gvc_page_layout_class = "page-full-width";
	} else {
		$gvc_page_layout_class = "page-standard-width";
	}

	if($gvc_page_sidebar != "none"){
		$gvc_page_layout_class = "page-standard-width";
	}

?>
<div class='container <?php echo $gvc_page_layout_class; ?>'>
	<!-- content start -->
	<section class='content gvc-clearfix' style="<?php echo $gvc_page_padding_top; ?>">
		<?php

			if($gvc_page_sidebar == "left") {

				echo '<aside class="sidebar col one_quarter">';
					get_sidebar('page');
				echo '</aside>';

				echo '<section class="main-content col three_quarters last-yes">';
					get_template_part( '/includes/page/content-page-body' );
				echo '</section>';
				
			} elseif ($gvc_page_sidebar == "right") {

				echo '<section class="main-content col three_quarters">';
					get_template_part( '/includes/page/content-page-body' );
				echo '</section>';

				echo '<aside class="sidebar col one_quarter last-yes">';
					get_sidebar('page');
				echo '</aside>';

			} else {
				echo get_template_part( '/includes/page/content-page-body' );
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