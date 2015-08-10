<?php get_header(); ?>
<?php
	
	global $gvc;

	$gvc_slider_status                   = "no";
	$gvc_shop_sidebar                    = ($gvc['gvc-shop-gvc-sidebar']) ? $gvc['gvc-shop-gvc-sidebar'] : "none";
	$gvc_shop_gvc_layout              = ($gvc['gvc-shop-gvc-layout']) ? $gvc['gvc-shop-gvc-layout'] : "medium";
	$gvc_slider_settings                 = get_option('gvc_slider_settings');
	$gvc_shop_rich_header_styles         = "";
	$gvc_shop_rich_header_text_styles    = "";
	$gvc_shop_rich_header_subtext_styles = "";
	$gvc_shop_grid                       = "grid_3";
	$nz_posts_per_page                         = ($gvc['gvc-shop-related-products-number']) ? $gvc['gvc-shop-related-products-number'] : 4;

	switch ($gvc_shop_gvc_layout) {
		case 'small':
			$gvc_shop_grid = "grid_4";
			break;
		case 'medium':
			$gvc_shop_grid = "grid_3";
			break;
		default:
			$gvc_shop_grid = "grid_3";
			break;
	}

	if (isset($gvc_slider_settings["gvc_slider"]) && $gvc_slider_settings["gvc_slider"] == "yes") {
		if ($gvc['gvc-shop-gvc-slider'] && $gvc['gvc-shop-gvc-slider'] == 1) {
			$gvc_slider_status = "yes";
		}
	}

	$gvc_shop_title_background_color                    = ($gvc['gvc-shop-title-background-color']) ? $gvc['gvc-shop-title-background-color'] : "#000000";
    $gvc_shop_title_background_color_opacity            = ($gvc['gvc-shop-title-background-color-opacity']) ? $gvc["gvc-shop-title-background-color-opacity"]: "0.6";
    $gvc_shop_title_text_color                          = ($gvc['gvc-shop-title-text-color']) ? $gvc['gvc-shop-title-text-color'] : "#ffffff";
    $gvc_shop_subtitle_background_color                 = ($gvc['gvc-shop-subtitle-background-color']) ? $gvc['gvc-shop-subtitle-background-color'] : "#f34a53";
    $gvc_shop_subtitle_background_color_opacity         = ($gvc['gvc-shop-subtitle-background-color-opacity']) ? $gvc["gvc-shop-subtitle-background-color-opacity"] : "1";
    $gvc_shop_subtitle_text_color                       = ($gvc['gvc-shop-subtitle-text-color']) ? $gvc["gvc-shop-subtitle-text-color"] : "#ffffff";
    $gvc_shop_title_section_background_color            = ($gvc['gvc-shop-header-background-color']) ? $gvc["gvc-shop-header-background-color"] : "#f6f6f6";
    $gvc_shop_title_section_background_image            = isset( $gvc['gvc-shop-header-background-image']['url']) ? $gvc['gvc-shop-header-background-image']['url'] : "";
    $gvc_shop_title_section_background_image_repeat     = ($gvc['gvc-shop-header-background-image-repeat']) ? $gvc["gvc-shop-header-background-image-repeat"] : "no-repeat";
    $gvc_shop_title_section_background_image_position   = ($gvc['gvc-shop-header-background-image-position']) ? $gvc['gvc-shop-header-background-image-position'] : "left_top";
    $gvc_shop_title_section_background_image_attachment = ($gvc['gvc-shop-header-background-image-attachment']) ? $gvc["gvc-shop-header-background-image-attachment"] : "scroll";
    $gvc_shop_title_section_background_image_size       = ($gvc['gvc-shop-header-background-image-size']) ? $gvc['gvc-shop-header-background-image-size'] : "auto";
    $gvc_shop_title_section_background_image_parallax   = ($gvc['gvc-shop-header-parallax']) ? "yes" : "no";


    if ($gvc_shop_title_section_background_image_parallax == "yes") {
    	$gvc_shop_title_section_background_image_repeat     = "no-repeat";
		$gvc_shop_title_section_background_image_position   = "center_top";
		$gvc_shop_title_section_background_image_attachment = "fixed";
		$gvc_shop_title_section_background_image_size       = "cover";
    }
    
    if (!empty($gvc_shop_title_section_background_color)) {
    	$gvc_shop_rich_header_styles .= 'background-color:'.$gvc_shop_title_section_background_color.';';
	}

    if (!empty($gvc_shop_title_section_background_image)) {
    	$gvc_shop_rich_header_styles .= 'background-image:url('.$gvc_shop_title_section_background_image.');';
    	$gvc_shop_rich_header_styles .= 'background-repeat:'.$gvc_shop_title_section_background_image_repeat.';';
    	$gvc_shop_rich_header_styles .= 'background-attachment:'.$gvc_shop_title_section_background_image_attachment.';';
    	if ($gvc_shop_title_section_background_image_size == "cover") {
    		$gvc_shop_rich_header_styles .= '-webkit-background-size: cover;-moz-background-size: cover;background-size: cover;';
    	}
    	switch($gvc_shop_title_section_background_image_position){

			case 'left_top':
			$gvc_shop_rich_header_styles .= "background-position:left top;";
	        break;

	        case 'left_bottom':
			$gvc_shop_rich_header_styles .= "background-position:left bottom;";
	        break;

	        case 'right_top':
			$gvc_shop_rich_header_styles .= "background-position:right top;";
	        break;

	        case 'right_bottom':
			$gvc_shop_rich_header_styles .= "background-position:right bottom;";
	        break;

	        case 'center_center':
			$gvc_shop_rich_header_styles .= "background-position:center center;";
	        break;

	        case 'center_top':
			$gvc_shop_rich_header_styles .= "background-position:center top;";
	        break;

	        case 'center_bottom':
			$gvc_shop_rich_header_styles .= "background-position:center bottom;";
	        break;

			default:
			$gvc_shop_rich_header_styles .= "background-position:left top;";
	        break;

        }
    }

    if (!empty($gvc_shop_title_background_color)) {
    	$gvc_shop_rich_header_text_styles.='background-color:'.gvc_hex_to_rgba($gvc_shop_title_background_color, $gvc_shop_title_background_color_opacity).';';
    	$gvc_shop_rich_header_text_styles.='padding-left:40px;padding-right:40px;';
    }

    if (!empty($gvc_shop_title_text_color)) {
    	$gvc_shop_rich_header_text_styles.='color:'.$gvc_shop_title_text_color.';';
	}

	if (!empty($gvc_shop_subtitle_background_color)) {
    	$gvc_shop_rich_header_subtext_styles.='background-color:'.gvc_hex_to_rgba($gvc_shop_subtitle_background_color, $gvc_shop_subtitle_background_color_opacity).';';
    	$gvc_shop_rich_header_subtext_styles.='padding-left:20px;padding-right:20px;margin-top: 15px;';
    }

    if (!empty($gvc_shop_subtitle_text_color)) {
    	$gvc_shop_rich_header_subtext_styles.='color:'.$gvc_shop_subtitle_text_color.';';
	}

?>
<?php if(is_shop() || is_product_category() || is_product_tag()): ?>
	<?php if ($gvc_slider_status == "yes") : ?>
		<?php get_template_part('includes/gvc-slider'); ?>
	<?php else: ?>
		<?php if ($gvc['gvc-shop-rich-header'] && $gvc['gvc-shop-rich-header'] == 1): ?>
			
			<header class="rich-header shop-header page-header" data-parallax="<?php echo $gvc_shop_title_section_background_image_parallax; ?>" style="<?php echo $gvc_shop_rich_header_styles; ?>">
				<div class="container gvc-clearfix">
					<?php if ($gvc['gvc-shop-title']): ?>
						<div>
							<h1 class="page-title" style="<?php echo $gvc_shop_rich_header_text_styles; ?>"><?php echo $gvc['gvc-shop-title']; ?></h1>
						</div>
					<?php endif; ?>
					<?php if ($gvc['gvc-shop-subtitle']): ?>
						<div>
							<p class="page-subtitle" style="<?php echo $gvc_shop_rich_header_subtext_styles; ?>"><?php echo $gvc['gvc-shop-subtitle']; ?></p>
						</div>
					<?php endif ?>
				</div>
			</header>

		<?php endif ?>
	<?php endif ?>
	<div class='container'>
		<!-- content start -->
		<section class='woocommerce-loop content gvc-clearfix <?php echo $gvc_shop_grid; ?>'>
			<?php

				if($gvc_shop_sidebar == "left") {

					echo '<aside class="sidebar col one_quarter">';
						get_sidebar('shop');
					echo '</aside>';

					echo '<section class="main-content col three_quarters last-yes">';
						woocommerce_content();
					echo '</section>';
					
				} elseif ($gvc_shop_sidebar == "right") {

					echo '<section class="main-content col three_quarters">';
						woocommerce_content();
					echo '</section>';

					echo '<aside class="sidebar col one_quarter last-yes">';
						get_sidebar('shop');
					echo '</aside>';

				} else {
					woocommerce_content();
				}

			?>
		</section>
		<!-- content end -->
		
	</div>
	<!-- container end -->
	<?php if ($gvc['gvc-shop-shortcode-area']): ?>
		<div class="shop-loop-shortcode-area">
			<?php echo do_shortcode($gvc['gvc-shop-shortcode-area']); ?>
		</div>	
	<?php endif ?>
<?php endif; ?>
<?php if (is_product()): ?>
	<div class="container">
		<section class='content gvc-clearfix <?php echo "related-products-column-".$nz_posts_per_page; ?>'>
			<?php woocommerce_content(); ?>
		</section>
	</div>
	<?php if ($gvc['gvc-shop-single-shortcode-area']): ?>
		<div class="shop-single-shortcode-area">
			<?php echo do_shortcode($gvc['gvc-shop-single-shortcode-area']); ?>
		</div>	
	<?php endif ?>
<?php endif ?>
<?php if($gvc['gvc-page-tweets'] && $gvc['gvc-page-tweets'] == 1): ?>
	<?php custom_tweets(); ?>
<?php endif; ?>
<?php get_footer(); ?>