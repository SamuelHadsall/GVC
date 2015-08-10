<?php

	global $gvc;
	$values                  = get_post_custom( get_the_ID() );
	$skin_class                            = ($gvc['gvc-skin'] && $gvc['gvc-skin'] == "dark") ? "dark-skin" : "light-skin";
	$gvc_header_top                  = ($gvc['gvc-header-top'] && $gvc['gvc-header-top'] == 1) ? "true" : "false";
	$gvc_header_search               = ($gvc['gvc-header-search'] && $gvc['gvc-header-search'] == 1) ? "true" : "false";
	$gvc_header_menu_dropdown_indicator = ($gvc['gvc-header-menu-dropdown-indicator'] && $gvc['gvc-header-menu-dropdown-indicator'] == 1) ? "true" : "false";
	$gvc_header_height               = ($gvc['gvc-header-height']) ? $gvc['gvc-header-height'] : '80';
	$gvc_smooth_scroll               = ($gvc['gvc-smooth-scroll'] && $gvc['gvc-smooth-scroll'] == 1) ? "true" : "false";
	$gvc_responsive_menu             = ($gvc['gvc-header-responsive'] && $gvc['gvc-header-responsive'] == 1) ? "true" : "false";
?>
<!doctype html>
<!--[if lt IE 7]> <html class="<?php echo $skin_class; ?> no-js ie6 oldie smooth-scroll-<?php echo $gvc_smooth_scroll; ?>" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="<?php echo $skin_class; ?> no-js ie7 oldie smooth-scroll-<?php echo $gvc_smooth_scroll; ?>" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="<?php echo $skin_class; ?> no-js ie8 oldie smooth-scroll-<?php echo $gvc_smooth_scroll; ?>" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="<?php echo $skin_class; ?> no-js smooth-scroll-<?php echo $gvc_smooth_scroll; ?>" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

	<!-- META TAGS -->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php if (isset($values['gvc_page_keywords'][0]) && !empty($values['gvc_page_keywords'][0])): ?>
	<meta name="keywords" content="<?php echo $values['gvc_page_keywords'][0]; ?>">
    <?php endif; ?>
    <?php if (isset($values['gvc_page_description'][0]) && !empty($values['gvc_page_description'][0])): ?>
	<meta name="description" content="<?php echo $values['gvc_page_description'][0]; ?>">
    <?php endif; ?>
	<!-- LINK TAGS -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php if(isset($gvc['gvc-favicon']['url'])): ?>
	<link rel="shortcut icon" href="<?php echo $gvc['gvc-favicon']['url']; ?>" type="image/x-icon" />
	<?php endif; ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" /> 
	<?php include("includes/dynamic-styles.php");?>     
	<?php if(isset($gvc['gvc-custom-css']) && !empty($gvc['gvc-custom-css'])){echo ("<style>".$gvc['gvc-custom-css']."</style>");} ?>
	<?php if(isset($gvc['gvc-font-custom-css']) && !empty($gvc['gvc-font-custom-css'])){echo ("<style>".$gvc['gvc-font-custom-css']."</style>");} ?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<?php wp_head(); ?>
	 
</head>
<body <?php body_class(); ?>>
<form id="login" action="login" method="post">
        <h1>Site Login</h1>
        <p class="status"></p>
        <div class="input-group">
          <span class="input-group-addon">
          	<i class="fa fa-user"></i>
          </span>
            <input id="username" type="text" name="username" class="form-control" placeholder="Username">
        </div>
        <div class="input-group">
          <span class="input-group-addon">        
            <i class="fa fa-key"></i>
          </span>
            <input id="password" type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <a class="lost" href="<?php echo wp_lostpassword_url(); ?>">Lost your password?</a>
        <input class="submit_button" type="submit" value="Login" name="submit">
        <a class="close" href=""><i class="fa fa-times"></i></a>
        <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
    </form>
<!-- wrap start -->
<div id="wrap" class="<?php if($gvc['gvc-layout']){echo $gvc['gvc-layout'];} ?>">
	
	<?php if (!is_404()): ?>
		<header data-height="<?php echo $gvc_header_height; ?>" class="header dropdown-<?php echo $gvc_header_menu_dropdown_indicator; ?> header-search-<?php echo $gvc_header_search; ?> with-transition header-top-<?php echo $gvc_header_top; ?> responsive-<?php echo $gvc_responsive_menu; ?> height-<?php echo $gvc_header_height; ?> attachment-<?php if($gvc['gvc-header-attachment']){echo $gvc['gvc-header-attachment'];} ?>">
			
			<?php if ($gvc_header_search == 'true'): ?>
				<div class="search">
					<div class="container">
					<?php get_search_form(); ?>
					<div class="search-off">&nbsp;</div>
					</div>
				</div>	
			<?php endif ?>

			<?php if ($gvc_header_top == "true"): ?>
				<div class="header-top">
					<div class="container gvc-clearfix">
						<?php if ($gvc['gvc-slogan']): ?>
							<div class="slogan"><?php echo $gvc['gvc-slogan']; ?></div>
						<?php endif ?>

						<?php if ($gvc['gvc-language-switch'] && $gvc['gvc-language-switch'] == 1): ?>
							<?php do_action('icl_language_selector'); ?>
						<?php endif ?>
						
						<?php if ($gvc['gvc-header-social-links'] && $gvc['gvc-header-social-links'] == 1): ?>
							<div class="social-links gvc-clearfix">
								<?php get_template_part('/includes/social-links' ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endif ?>        
			<div class="header-content">
				<div class="container gvc-clearfix">
		
					<div class="logo">
						<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
							<?php if (isset($gvc['gvc-normal-logo']['url']) && !empty($gvc['gvc-normal-logo']['url'])): ?>
								<img src="<?php echo $gvc['gvc-normal-logo']['url']; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>">
							<?php else: ?>
								<img src="<?php echo IMG_ASSETS; ?>/logo.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>">
							<?php endif ?>
						</a>
					</div>

					<div class="inline-clear gvc-clearfix">&nbsp;</div>
					<?php if (class_exists('Woocommerce')): ?>
						<?php if ($gvc['gvc-shop-cart'] && $gvc['gvc-shop-cart'] == 1): ?>
							<?php global $woocommerce;?>
							<div class="cart-toggle">
								<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php echo __('View your shopping cart', TEMP_NAME); ?>">
									<i class="fa fa-shopping-cart"></i>
									<span class="cart-info"><?php echo $woocommerce->cart->get_cart_total(); ?> (<?php echo $woocommerce->cart->cart_contents_count; ?>)</span>
								</a>
							</div>
						<?php endif; ?>
					<?php endif; ?>
                    <div class="user-login"><?php if (is_user_logged_in()) { ?>
                            <a class="login_button" href="<?php echo wp_logout_url( home_url() ); ?>" title="Log Out">
                                <i class="fa fa-sign-out"></i>
                            </a>
                        <?php } else { ?>
                            <a class="login_button" id="show_login" href="" title="Login"><i class="fa fa-sign-in"></i>
</a>
                        <?php } ?>
                    </div>
					<div class="search-toggle"><i class="fa fa-search"></i></div>
					<div class="responsive-menu-toggle"><i class="fa fa-th-list"></i></div>

					<nav class="header-menu gvc-clearfix">
						<?php

							$arg = array( 
								'theme_location' => 'header-menu', 
								'depth'          => 3, 
								'container'      => false, 
								'menu_id'        => 'header-menu', 
							);

							if(has_nav_menu("header-menu")){
								wp_nav_menu($arg); 
							} else {
								echo '<span class="menu-fallback">'.__("No menu is found why not add one!", TEMP_NAME).'</span>';
							}
						?>
					</nav>

				</div>
			</div>

		</header>

	<?php endif ?>

	<div class="page-content-container">