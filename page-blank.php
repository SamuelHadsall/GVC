<?php // Template name: Blank ?>

<?php

	global $gvc;

	$skin_class                  = ($gvc['gvc-skin'] && $gvc['gvc-skin'] == "dark") ? "dark-skin" : "light-skin";
	$values                      = get_post_custom( get_the_ID() ); 
	$gvc_page_layout_class = "";

	if(isset($values["gvc_page_layout"][0]) && $values["gvc_page_layout"][0] == "yes"){
		$gvc_page_layout_class = "page-full-width";
	} else {
		$gvc_page_layout_class = "page-standard-width";
	}

	$gvc_page_padding_top  = (isset($values["gvc_page_padding_top"][0]) && $values["gvc_page_padding_top"][0] == "no") ? "padding-top:0px;" : "padding-top:70px;";

?>
<!doctype html>
<!--[if lt IE 7]> <html class="<?php echo $skin_class; ?> no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="<?php echo $skin_class; ?> no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="<?php echo $skin_class; ?> no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="<?php echo $skin_class; ?> no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

	<!-- META TAGS -->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- LINK TAGS -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

    <?php if(isset($gvc['gvc-favicon']['url'])): ?>
	<link rel="shortcut icon" href="<?php echo $gvc['gvc-favicon']['url']; ?>" type="image/x-icon" />
	<?php endif; ?>


	<?php include("includes/dynamic-styles.php");?>
	<?php if($gvc['gvc-custom-css'] && !empty($gvc['gvc-custom-css'])){echo ("<style>".$gvc['gvc-custom-css']."</style>");} ?>
	<?php if($gvc['gvc-font-custom-css'] && !empty($gvc['gvc-font-custom-css'])){echo ("<style>".$gvc['gvc-font-custom-css']."</style>");} ?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<?php wp_head(); ?>
	 
</head>
<body <?php body_class(); ?>>
<!-- wrap start -->
<div id="wrap" class="<?php if($gvc['gvc-layout']){echo $gvc['gvc-layout'];} ?>">
	
	<div class="page-content-container">
		<div class='container blank-page <?php echo $gvc_page_layout_class; ?>'>
			<section class='content gvc-clearfix' style="<?php echo $gvc_page_padding_top; ?>">
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<section class="page-content gvc-clearfix">
							<?php the_content(); ?>
						</section>
					</article>
				<?php endwhile; ?>
			</section>
		</div>
		<?php if(isset($values["gvc_page_twitter"][0]) && $values["gvc_page_twitter"][0] == "yes"): ?>
			<?php custom_tweets(); ?>
		<?php endif; ?>
	</div>

</div>
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

<?php if ($gvc['gvc-google-analytics']) {
	echo '<script>'.$gvc['gvc-google-analytics'].'</script>';
} ?>
</body>
</html>