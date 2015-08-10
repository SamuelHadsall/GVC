<?php

/*====================================================================*/
/*  CONSTANTAS
/*====================================================================*/

    define( 'TEMP_NAME', "gvc");
    define( 'TEMP_PATH', get_template_directory_uri());
    define( 'IMG_ASSETS', TEMP_PATH. "/images");

    // LANGAUAGE CONSTANTAS
    define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
    define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
	
	global $gvc;
	$gvc_portfolio_yes  = ($gvc['gvc-portfolio-yes']) ? $gvc['gvc-portfolio-yes'] : 0;
	$gvc_faq_widget_area  = ($gvc['gvc-faq-widget-area']) ? $gvc['gvc-faq-widget-area'] : 0;

/*====================================================================*/
/*  HANDLE EXTERNAL PLUGINS
/*====================================================================*/
    
    add_action( 'tgmpa_register', 'gvc_register_required_plugins' );
    function gvc_register_required_plugins() {

        $plugins = array(

            array(
                'name'      => 'Ninja Forms',
                'slug'      => 'ninja_forms',
				'source' 	=> get_template_directory() . '/plugins/ninja-forms.2.8.5.zip',
                'required'  => true,
            ),
			 array(
                'name'      => 'Login With Ajax',
                'slug'      => 'login-with-ajax',
				'source' 	=> get_template_directory() . '/plugins/login-with-ajax.3.1.4.zip',
                'required'  => true,
            ),
            array(
                'name'      => 'WPBakery Visual Composer',
                'slug'      => 'js_composer',
                'source'    => get_template_directory() . '/plugins/js_composer.zip',
                'version'   => '4.3.3',
                'required'  => true,
                'force_activation' => false,
                'force_deactivation' => false,
                'external_url' => ''
            )

        );

        $theme_text_domain = TEMP_NAME;


        $config = array(
            'domain'            => $theme_text_domain,
            'default_path'      => '',                          // Default absolute path to pre-packaged plugins
            'parent_menu_slug'  => 'themes.php',                // Default parent menu slug
            'parent_url_slug'   => 'themes.php',                // Default parent URL slug
            'menu'              => 'install-required-plugins',  // Menu slug
            'has_notices'       => true,                        // Show admin notices or not
            'is_automatic'      => false,                       // Automatically activate plugins after installation or not
            'message'           => '',                          // Message to output right before the plugins table
            'strings'           => array(
                'page_title'                                => __( 'Install Required Plugins', TEMP_NAME ),
                'menu_title'                                => __( 'Install Plugins', TEMP_NAME ),
                'installing'                                => __( 'Installing Plugin: %s', TEMP_NAME ), // %1$s = plugin name
                'oops'                                      => __( 'Something went wrong with the plugin API.', TEMP_NAME ),
                'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
                'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
                'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
                'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
                'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
                'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
                'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
                'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
                'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
                'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
                'return'                                    => __( 'Return to Required Plugins Installer', TEMP_NAME ),
                'plugin_activated'                          => __( 'Plugin activated successfully.', TEMP_NAME ),
                'complete'                                  => __( 'All plugins installed and activated successfully. %s', TEMP_NAME ), // %1$s = dashboard link
                'nag_type'                                  => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
            )
        );

        tgmpa( $plugins, $config );

    }

/*====================================================================*/
/*  INCLUDES
/*====================================================================*/

    if (!class_exists('MultiPostThumbnails') && file_exists( dirname( __FILE__ ) . '/includes/multi-post-thumbnails.php' ) ) {
        require_once(dirname( __FILE__ ) . '/includes/multi-post-thumbnails.php');
    }

    if (!class_exists('TGM_Plugin_Activation') && file_exists( dirname( __FILE__ ) . '/includes/class-tgm-plugin-activation.php' ) ) {
        require_once(dirname( __FILE__ ) . '/includes/class-tgm-plugin-activation.php');
    }

    if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/optionpanel/framework.php' ) ) {
        require_once(dirname( __FILE__ ) . '/optionpanel/framework.php' );
    }

    if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/optionpanel/config.php' ) ) {
        require_once( dirname( __FILE__ ) . '/optionpanel/config.php' );
    }

    require_once('includes/shortcodes.php' );

    if (defined( 'WPB_VC_VERSION' ) && file_exists( dirname( __FILE__ ) . '/plugins/js_composer.zip' ) ) {
        require_once('includes/gvc_vc.php' );
    }

    require_once('includes/page-extended-options.php' );
    require_once('includes/post-extended-options.php' );
    require_once('includes/custom-gvc-slider.php' );
    require_once('includes/custom-portfolio.php' );
    require_once('includes/custom-faq.php' );
    require_once('includes/widgets/custom-flickr-widget.php' );
    require_once('includes/widgets/custom-recent-portfolio-widget.php' );
    require_once('includes/widgets/custom-facebook-widget.php' );
    require_once('includes/widgets/custom-twitter-widget.php' );

/*====================================================================*/
/*  HELPER FUNCTIONS
/*====================================================================*/

    /*----------------------------------------------------------------*/
    /*  Flush rewrite rules
    /*----------------------------------------------------------------*/

        add_action( 'after_switch_theme', 'gvc_flush_rewrite_rules' );
        function gvc_flush_rewrite_rules() {
             flush_rewrite_rules();
        }

    /*----------------------------------------------------------------*/
    /*  Custom excerpt length
    /*----------------------------------------------------------------*/

        function gvc_excerpt($limit) {
            
            $excerpt = get_the_excerpt();
            $limit++;

            $output = "";

            if ( mb_strlen( $excerpt ) > $limit ) {
                $subex = mb_substr( $excerpt, 0, $limit - 5 );
                $exwords = explode( ' ', $subex );
                $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );

                if ( $excut < 0 ) {
                    $output .= mb_substr( $subex, 0, $excut );
                } else {
                    $output .= $subex;
                }

                $output .= '[...]';

            } else {
                $output .= $excerpt;
            }

            return $output;
        }

        function the_excerpt_max_charlength($charlength) {

            $excerpt = get_the_excerpt();
            $charlength++;

            if ( mb_strlen( $excerpt ) > $charlength ) {
                $subex = mb_substr( $excerpt, 0, $charlength - 5 );
                $exwords = explode( ' ', $subex );
                $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
            if ( $excut < 0 ) {
                echo mb_substr( $subex, 0, $excut );
            } else {
                echo $subex;
            }
                echo '[...]';
            } else {
                echo $excerpt;
            }

        }

    /*----------------------------------------------------------------*/
    /*  Excerpt more
    /*----------------------------------------------------------------*/

        function gvc_excerpt_more() {
            global $post;
            echo '<span class="read-more"><a href="'. get_permalink($post->ID) . '" title="'.__("Read more about", TEMP_NAME).' '.get_the_title($post->ID).'" >'.__("Read more", TEMP_NAME).'</a></span>';
        }

    /*----------------------------------------------------------------*/
    /*  Simple pagination (Next & Prev Controls)
    /*----------------------------------------------------------------*/
        
        function gvc_post_nav($post_id){
            $post_type  = (get_post_type($post_id)) ? get_post_type($post_id) : 'post';
            $prev_title = (('portfolio' == $post_type) ?  __('Previous project', TEMP_NAME) : (('faq' == $post_type) ? __('Next faq', TEMP_NAME) : __('Previous post', TEMP_NAME)));
            $next_title = (('portfolio' == $post_type) ?  __('Next project', TEMP_NAME) : (('faq' == $post_type) ? __('Previous faq', TEMP_NAME) : __('Next post', TEMP_NAME)));

        ?>

            <?php if (is_single()): ?>
                <nav id="gvc-nav-single" class="gvc-clearfix">  
                  <div class="nav-previous" title="<?php echo $prev_title; ?>"><?php previous_post_link( '%link', ''); ?></div>  
                  <div class="nav-next" title="<?php echo $next_title; ?>"><?php next_post_link( '%link', ''); ?></div>  
                </nav>
            <?php endif ?>

        <?php }

    /*----------------------------------------------------------------*/
    /*  Advanced pagination (Numbered page navigation)
    /*----------------------------------------------------------------*/

        function gvc_post_nav_num(){

            if( is_singular() ){
                return;
            }

            global $wp_query;
            $big = 99999999;

            echo "<nav class='gvc-navigation'>";
                echo paginate_links(array(
                    'base'      => str_replace($big, '%#%', get_pagenum_link($big)),
                    'format'    => '?paged=%#%',
                    'total'     => $wp_query->max_num_pages,
                    'current'   => max(1, get_query_var('paged')),
                    'show_all'  => false,
                    'end_size'  => 2,
                    'mid_size'  => 3,
                    'prev_next' => true,
                    'prev_text' => __('Prev', TEMP_NAME),
                    'next_text' => __('Next', TEMP_NAME),
                    'type'      => 'list'
                ));
            echo "</nav>";
  
        }
            
    /*----------------------------------------------------------------*/
    /*  Not found
    /*----------------------------------------------------------------*/

        function gvc_not_found($post_type){

            $output = '';

            $output .= '<p class="gvc-not-found">';

            switch ($post_type) {

                case 'portfolio':
                    $output .= __('No projects found.', TEMP_NAME);
                    break;

                case 'gvc-slider':
                    $output .= __('No slides found, why not add one!', TEMP_NAME);
                    break;

                case 'faq':
                    $output .= __('No F.A.Q. items found', TEMP_NAME);
                    break;

                case 'general':
                    $output .= __('No search results found. Try a different search', TEMP_NAME);
                    break;
                
                default:
                    $output .= __('No posts found.', TEMP_NAME);
                    break;
            }

            $output .= '</p>';

            return $output;
        }

    /*----------------------------------------------------------------*/
    /*  gvc title
    /*----------------------------------------------------------------*/

        add_filter( 'wp_title', 'filter_wp_title' );
        function filter_wp_title( $title ) {
            global $page, $paged;

            if ( is_feed() ){
                return $title;
            }
                
            $site_description = get_bloginfo( 'description' );

            $filtered_title = $title . get_bloginfo( 'name' );
            $filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' | ' . $site_description: '';
            $filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' | ' . sprintf( __( 'Page %s', TEMP_NAME), max( $paged, $page ) ) : '';

            return $filtered_title;
        }

    /*----------------------------------------------------------------*/
    /*  Hex to rgb
    /*----------------------------------------------------------------*/

        function gvc_hex_to_rgba($hex, $o) {

           $hex = str_replace("#", "", $hex);

           if(strlen($hex) == 3) {
              $r = hexdec(substr($hex,0,1).substr($hex,0,1));
              $g = hexdec(substr($hex,1,1).substr($hex,1,1));
              $b = hexdec(substr($hex,2,1).substr($hex,2,1));
           } else {
              $r = hexdec(substr($hex,0,2));
              $g = hexdec(substr($hex,2,2));
              $b = hexdec(substr($hex,4,2));
           }

           $rgba = array($r, $g, $b, $o);

           return 'rgba('.implode(",", $rgba).')';
        }

    /*----------------------------------------------------------------*/
    /*  Post thumbnail based on layout
    /*----------------------------------------------------------------*/

        function gvc_thumbnail ($layout, $post_id){

            $thumb_size = 'gvc-Half';
            $post_type = (get_post_type($post_id)) ? get_post_type($post_id) : 'post';
			$thumb_meta = get_post_meta( get_post_thumbnail_id($post_id) ); // Get post meta by ID
			$alt = $thumb_meta['_wp_attachment_image_alt']['0']; // Display Alt text
            global $gvc;

            if (!is_single()) {

               switch ($layout) {
                    case 'large' :
                    case 'image-grid-large':
                    case 'no-gap-grid':
                        $thumb_size = 'gvc-Half';
                        break;

                    case 'medium':
                    case 'small' :
                    case 'image-grid-medium':
                    case 'image-grid-small':
                        $thumb_size = 'gvc-One-Third';
                        break;

                    case 'full' :
                        $thumb_size = 'gvc-Whole';
                        break;
                }

            } elseif (is_single()) {
                if ('portfolio' == $post_type) {
                    $thumb_size = 'gvc-Three-Quarters';
                } else {
                    $thumb_size = 'gvc-Whole';
                }
            }

            ?>
            <?php if (has_post_thumbnail()): ?>

                <div class="gvc-thumbnail">
                    <?php echo get_the_post_thumbnail( 
						$post_id, $thumb_size, 
						array( 
							'alt'	=> $alt,
							'title' => esc_attr( get_the_title($post_id))
						) 						 
					); ?>
                    <div class="gvc-overlay">
                        <?php if (!is_single()): ?>
                            <a class="gvc-more" href="<?php the_permalink(); ?>">&nbsp;</a>
                        <?php else: ?>
                            <?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'); ?>
                            <a class="gvc-zoom" href="<?php echo $large_image_url[0]; ?>" title="<?php $img_title; ?>" >&nbsp;</a>
                        <?php endif; ?>
                    </div>
                </div>

            <?php endif ?>

        <?php }

    /*----------------------------------------------------------------*/
    /*  Post gallery
    /*----------------------------------------------------------------*/

        function gvc_post_gallery ($layout, $post_id){

            global $gvc;
            $post_gallery_array = array();
            $thumb_size = 'gvc-Half';
            $post_type = (get_post_type($post_id)) ? get_post_type($post_id) : 'post';

            if (!is_single()) {
               switch ($layout) {
                    case 'large':
                    case 'image-grid-large':
                    case 'no-gap-grid':
                        $thumb_size = 'gvc-Half';
                        break;

                    case 'medium':
                    case 'small' :
                    case 'image-grid-medium':
                    case 'image-grid-small':
                        $thumb_size = 'gvc-One-Third';
                        break;

                    case 'full' :
                        $thumb_size = 'gvc-Whole';
                        break;
                }
            } elseif (is_single()) {
                if ('portfolio' == $post_type) {
                    $thumb_size = 'gvc-Three-Quarters';
                } else {
                    $thumb_size = 'gvc-Whole';
                }
            }

            if (class_exists('MultiPostThumbnails')) {

                if ('portfolio' == $post_type) {

                   if (MultiPostThumbnails::has_post_thumbnail('portfolio', 'feature-image-2')) {

                        $thumb_2 = array(
                            MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-2', $post_id, $size = $thumb_size),
                            MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-2', $post_id, $size = 'full')
                        );
                        array_push($post_gallery_array, $thumb_2);
                    }

                    if (MultiPostThumbnails::has_post_thumbnail('portfolio', 'feature-image-3')) {

                        $thumb_3 = array(
                            MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-3', $post_id, $size = $thumb_size),
                            MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-3', $post_id, $size = 'full')
                        );
                        array_push($post_gallery_array, $thumb_3);
                    }

                    if (MultiPostThumbnails::has_post_thumbnail('portfolio', 'feature-image-4')) {

                        $thumb_4 = array(
                            MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-4', $post_id, $size = $thumb_size),
                            MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-4', $post_id, $size = 'full')
                        );
                        array_push($post_gallery_array, $thumb_4);
                    }

                    if (MultiPostThumbnails::has_post_thumbnail('portfolio', 'feature-image-5')) {

                        $thumb_5 = array(
                            MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-5', $post_id, $size = $thumb_size),
                            MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-5', $post_id, $size = 'full')
                        );
                        array_push($post_gallery_array, $thumb_5);
                    }

                } else {

                    if (MultiPostThumbnails::has_post_thumbnail('post', 'feature-image-2')) {

                        $thumb_2 = array(
                            MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-2', $post_id, $size = $thumb_size),
                            MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-2', $post_id, $size = 'full')
                        );
                        array_push($post_gallery_array, $thumb_2);
                    }

                    if (MultiPostThumbnails::has_post_thumbnail('post', 'feature-image-3')) {

                        $thumb_3 = array(
                            MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-3', $post_id, $size = $thumb_size),
                            MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-3', $post_id, $size = 'full')
                        );
                        array_push($post_gallery_array, $thumb_3);
                    }

                    if (MultiPostThumbnails::has_post_thumbnail('post', 'feature-image-4')) {

                        $thumb_4 = array(
                            MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-4', $post_id, $size = $thumb_size),
                            MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-4', $post_id, $size = 'full')
                        );
                        array_push($post_gallery_array, $thumb_4);
                    }

                    if (MultiPostThumbnails::has_post_thumbnail('post', 'feature-image-5')) {

                        $thumb_5 = array(
                            MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-5', $post_id, $size = $thumb_size),
                            MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'feature-image-5', $post_id, $size = 'full')
                        );
                        array_push($post_gallery_array, $thumb_5);
                    }

                }

            }

            ?>
            <div class="flexslider">
                <ul class="slides">
                    <?php if (has_post_thumbnail()): ?>
                        <li>
                            <div class="gvc-thumbnail">
                                <?php echo get_the_post_thumbnail( $post_id, $thumb_size ); ?>
                                <div class="gvc-overlay">
                                    <?php if (!is_single()): ?>
                                        <a class="gvc-more" href="<?php the_permalink(); ?>">&nbsp;</a>
                                    <?php else: ?>
                                        <?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'); ?>
                                        <a class="gvc-zoom post-gallery-slideshow" href="<?php echo $large_image_url[0]; ?>" >&nbsp;</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </li>
                    <?php endif ?>
                    <?php foreach ($post_gallery_array as $thumb): ?>
                        <li>
                            <div class="gvc-thumbnail">
                                <img src="<?php echo $thumb[0]; ?>" alt="<?php echo get_the_title(); ?>">
                                <div class="gvc-overlay">
                                    <?php if (!is_single()): ?>
                                        <a class="gvc-more" href="<?php the_permalink(); ?>">&nbsp;</a>
                                    <?php else: ?>
                                        <?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'); ?>
                                        <a class="gvc-zoom post-gallery-slideshow" href="<?php echo $thumb[1]; ?>">&nbsp;</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php }

    /*----------------------------------------------------------------*/
    /*  Post format chat transcript
    /*----------------------------------------------------------------*/

        function gvc_post_chat_format($content) {
            global $post;
            if (has_post_format('chat')) {
                remove_filter ('the_content',  'wpautop');
                $chatoutput = "<ul class=\"chat\">\n";
                $split = preg_split("/(\r?\n)+|(<br\s*\/?>\s*)+/", $content);

                foreach($split as $haystack) {
                    if (strpos($haystack, ":")) {
                        $string = explode(":", trim($haystack), 2);
                        $who = strip_tags(trim($string[0]));
                        $what = strip_tags(trim($string[1]));
                        $row_class = empty($row_class)? " class=\"chat-highlight\"" : "";
                        $chatoutput = $chatoutput . "<li><span class='name'>$who</span><p>$what</p></li>\n";
                    } else {
                        $chatoutput = $chatoutput . $haystack . "\n";
                    }
                }

                $content = $chatoutput . "</ul>\n";
                return $content;
            } else { 
                return $content;
            }
        }
        add_filter( "the_content", "gvc_post_chat_format", 9);

    /*----------------------------------------------------------------*/
    /*  Twitter tweets
    /*----------------------------------------------------------------*/
    
        function custom_tweets() { ?>
            <?php

                global $gvc;

                $twitter_tweets = ($gvc['gvc-page-tweets'] && $gvc['gvc-page-tweets'] == 1) ? "yes" : 'no';
                $twitter_tweets_consumet_key = ($gvc['gvc-page-tweets-consumer-key']) ? $gvc['gvc-page-tweets-consumer-key'] : '';
                $twitter_tweets_consumet_secret = ($gvc['gvc-page-tweets-consumer-secret']) ? $gvc['gvc-page-tweets-consumer-secret'] : '';
                $twitter_tweets_access_token = ($gvc['gvc-page-tweets-access-token']) ? $gvc['gvc-page-tweets-access-token'] : '';
                $twitter_tweets_access_token_secret = ($gvc['gvc-page-tweets-access-token-secret']) ? $gvc['gvc-page-tweets-access-token-secret'] : '';
                $twitter_tweets_twitter_id = ($gvc['gvc-page-tweets-id']) ? $gvc['gvc-page-tweets-id'] : '';
                $twitter_tweets_number = ($gvc['gvc-page-tweets-number']) ? $gvc['gvc-page-tweets-number'] : '3';
                $temp_color = ($gvc['gvc-main-color']) ? $gvc['gvc-main-color'] : '#c91239';

            ?>
            <?php if (($twitter_tweets == "yes") && (isset($twitter_tweets_consumet_key) && !empty($twitter_tweets_consumet_key)) && (isset($twitter_tweets_consumet_secret) && !empty($twitter_tweets_consumet_secret)) && (isset($twitter_tweets_access_token) && !empty($twitter_tweets_access_token)) && (isset($twitter_tweets_access_token_secret) && !empty($twitter_tweets_access_token_secret)) && (isset($twitter_tweets_twitter_id) && !empty($twitter_tweets_twitter_id))): ?>
                <?php $count = (isset($twitter_tweets_number) && is_numeric($twitter_tweets_number)) ? $twitter_tweets_number : 5 ?>
                <div class="twitter_tweets_carousel">
                    <div class="container">
                        <?php the_widget( 'WP_Widget_Twitter', 'title=&consumer_key='.$twitter_tweets_consumet_key.'&consumer_secret='.$twitter_tweets_consumet_secret.'&access_token='.$twitter_tweets_access_token.'&access_token_secret='.$twitter_tweets_access_token_secret.'&twitter_id='.$twitter_tweets_twitter_id.'&count='.$count ); ?> 
                    </div>
                </div>
            <?php endif ?>
        <?php }

    /*----------------------------------------------------------------*/
    /*  Font Family
    /*----------------------------------------------------------------*/

        function gvc_font_family_styles($target){

             $font_family_array = array(
                'Verdana, Geneva, sans-serif',
                'Georgia, Times New Roman, Times, serif',
                '"Courier New", Courier, monospace',
                'Arial, Helvetica, sans-serif',
                'Tahoma, Geneva, sans-serif',
                '"Trebuchet MS", Arial, Helvetica, sans-serif',
                '"Arial Black", Gadget, sans-serif',
                '"Times New Roman", Times, serif',
                '"Palatino Linotype", "Book Antiqua", Palatino, serif',
                '"Lucida Sans Unicode", "Lucida Grande", sans-serif',
                '"MS Serif", "New York", serif',
                '"Lucida Console", Monaco, monospace',
                '"Comic Sans MS", cursive',
                '"Open Sans", sans-serif',
                '"Caesar Dressing", cursive',
                '"Cantata One", serif',
                '"Roboto", sans-serif',
                '"Arvo", serif',
                '"Vollkorn", serif',
                '"Ubuntu", sans-serif',
                '"Old Standard TT", serif',
                '"Droid Sans", sans-serif',
                '"Medula One", cursive',
                '"Oleo Script", cursive',
                '"Alice", serif',
                '"Dosis", sans-serif',
                '"Oswald", sans-serif',
                '"Lato", sans-serif',
                '"Droid Serif", sans-serif',
                '"Varela Round", sans-serif',
                '"Francois One", sans-serif',
                '"PT Serif", serif',
                '"Roboto Slab", serif',
                '"Play", sans-serif',
                '"Nunito", sans-serif',
                '"Fjalla One", sans-serif',
                '"Libre Baskerville", sans-serif',
                '"Cuprum", sans-serif',
                '"Istok Web", sans-serif',
                '"Archivo Narrow", sans-serif',
                '"Anton", sans-serif',
                '"Coming Soon", cursive',
                '"Cabin Condensed", sans-serif',
                '"Bree Serif", serif'
            );

            $font_style = $font_family_array[3];

            switch ($target) {
                case 'verdana':
                $font_style = $font_family_array[0];
                break;

                case 'georgia':
                $font_style = $font_family_array[1];
                break;

                case 'courier':
                $font_style = $font_family_array[2];
                break;

                case 'arial':
                $font_style = $font_family_array[3];
                break;

                case 'tahoma':
                $font_style = $font_family_array[4];
                break;

                case 'trebuchet':
                $font_style = $font_family_array[5];
                break;

                case 'arial-black':
                $font_style = $font_family_array[6];
                break;

                case 'times-new-roman':
                $font_style = $font_family_array[7];
                break;

                case 'palatino':
                $font_style = $font_family_array[8];
                break;

                case 'lucida':
                $font_style = $font_family_array[9];
                break;

                case 'ms-serif':
                $font_style = $font_family_array[10];
                break;

                case 'lucida-console':
                $font_style = $font_family_array[11];
                break;

                case 'comic':
                $font_style = $font_family_array[12];
                break;

                case 'open-sans':
                $font_style = $font_family_array[13];
                break;

                case 'caesar-dressing':
                $font_style = $font_family_array[14];
                break;

                case 'cantata':
                $font_style = $font_family_array[15];
                break;

                case 'roboto':
                $font_style = $font_family_array[16];
                break;

                case 'arvo':
                $font_style = $font_family_array[17];
                break;

                case 'vollkorn':
                $font_style = $font_family_array[18];
                break;

                case 'ubuntu':
                $font_style = $font_family_array[19];
                break;

                case 'old-standard-tt':
                $font_style = $font_family_array[20];
                break;

                case 'droid-sans':
                $font_style = $font_family_array[21];
                break;

                case 'medula-one':
                $font_style = $font_family_array[22];
                break;

                case 'oleo-script':
                $font_style = $font_family_array[23];
                break;

                case 'alice':
                $font_style = $font_family_array[24];
                break;

                case 'dosis':
                $font_style = $font_family_array[25];
                break;

                case 'oswald':
                $font_style = $font_family_array[26];
                break;

                case 'lato':
                $font_style = $font_family_array[27];
                break;

                case 'droid-serif':
                $font_style = $font_family_array[28];
                break;

                case 'varela-serif':
                $font_style = $font_family_array[29];
                break;

                case 'francois-one':
                $font_style = $font_family_array[30];
                break;

                case 'pt-serif':
                $font_style = $font_family_array[31];
                break;

                case 'roboto-slab':
                $font_style = $font_family_array[32];
                break;

                case 'play':
                $font_style = $font_family_array[33];
                break;

                case 'nunito':
                $font_style = $font_family_array[34];
                break;

                case 'fjalla':
                $font_style = $font_family_array[35];
                break;

                case 'libre-baskerville':
                $font_style = $font_family_array[36];
                break;

                case 'cuprum':
                $font_style = $font_family_array[37];
                break;

                case 'istok-web':
                $font_style = $font_family_array[38];
                break;

                case 'archivo-narrow':
                $font_style = $font_family_array[39];
                break;

                case 'anton':
                $font_style = $font_family_array[40];
                break;

                case 'coming-soon':
                $font_style = $font_family_array[41];
                break;

                case 'cabin-condensed':
                $font_style = $font_family_array[42];
                break;

                case 'bree-serif':
                $font_style = $font_family_array[43];
                break;
            }

            echo $font_style;

        }

        function gvc_custom_fonts_link($target){

            $font_link = "";

            switch ($target) {
                case 'open-sans':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,300' rel='stylesheet' type='text/css'>";
                    break;
                case 'caesar-dressing':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Caesar+Dressing' rel='stylesheet' type='text/css'>";
                    break;
                case 'cantata':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Cantata+One' rel='stylesheet' type='text/css'>";
                    break;
                case 'roboto':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>";
                    break;
                case 'arvo':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>";
                    break;
                case 'vollkorn':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Vollkorn:400,700' rel='stylesheet' type='text/css'>";
                    break;
                case 'ubuntu':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>";
                    break;
                case 'old-standard-tt':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Old+Standard+TT:400,700' rel='stylesheet' type='text/css'>";
                    break;
                case 'droid-sans':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>";
                    break;
                case 'medula-one':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Medula+One' rel='stylesheet' type='text/css'>";
                    break;
                case 'oleo-script':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Oleo+Script:400,700' rel='stylesheet' type='text/css'>";
                    break;
                case 'alice':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Alice' rel='stylesheet' type='text/css'>";
                    break;
                case 'dosis':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Dosis:300,400,600,700' rel='stylesheet' type='text/css'>";
                    break;
                case 'oswald':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>";
                    break;
                case 'lato':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>";
                    break;
                case 'droid-serif':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>";
                    break;
                case 'varela-serif':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>";
                    break;
                case 'francois-one':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'>";
                    break;
                case 'pt-serif':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=PT+Serif:400,700' rel='stylesheet' type='text/css'>";
                    break;
                case 'pt-serif':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,700' rel='stylesheet' type='text/css'>";
                    break;
                case 'play':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Play:400,700' rel='stylesheet' type='text/css'>";
                    break;
                case 'nunito':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'>";
                    break;
                case 'fjalla':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>";
                    break;
                case 'libre-baskerville':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,700' rel='stylesheet' type='text/css'>";
                    break;
                case 'cuprum':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Cuprum:400,700' rel='stylesheet' type='text/css'>";
                    break;
                case 'istok-web':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Istok+Web:400,700' rel='stylesheet' type='text/css'>";
                    break;
                case 'archivo-narrow':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Archivo+Narrow:400,700' rel='stylesheet' type='text/css'>";
                    break;
                case 'anton':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Anton' rel='stylesheet' type='text/css'>";
                    break;
                case 'coming-soon':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Coming+Soon' rel='stylesheet' type='text/css'>";
                    break;
                case 'cabin-condensed':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Cabin+Condensed:400,600,700' rel='stylesheet' type='text/css'>";
                    break;
                case 'bree-serif':
                    $font_link = "<link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>";
                    break;

            }

            if (!empty($font_link)) {
                return $font_link;
            }

        }

/*====================================================================*/
/*  THEME SUPPORTS
/*====================================================================*/

    /*----------------------------------------------------------------*/
    /*  Thumbnail support
    /*----------------------------------------------------------------*/

        if ( function_exists( 'add_theme_support' ) ) {

            add_theme_support( 'post-thumbnails');

            add_image_size( 'gvc-Half', 600, 480, true );           // Half
            add_image_size( 'gvc-One-Third', 384, 300, true );      // One third
            add_image_size( 'gvc-Three-Quarters', 894, 588, true ); // Two thirds
            add_image_size( 'gvc-Whole', 1200, 588, true );         // Whole

        }

        function custom_image_sizes( $sizes ) {
        
            $new_sizes = array();
            
            $added_sizes = get_intermediate_image_sizes();

            foreach( $added_sizes as $key => $value) {
                if($value != 'post-thumbnails'){
                    $new_sizes[$value] = $value;
                }
            }
        
            $new_sizes = array_merge( $new_sizes, $sizes );
            
            return $new_sizes;
        }
        add_filter('image_size_names_choose', 'custom_image_sizes', 11, 1);

    /*----------------------------------------------------------------*/
    /*  Multiple post/portfolio thumbnails
    /*----------------------------------------------------------------*/

        if (class_exists('MultiPostThumbnails')) {

            // MultiPostThumbnails for posts

            new MultiPostThumbnails(
                array(
                    'label'     => __('2nd Featured Image', TEMP_NAME),
                    'id'        => 'feature-image-2',
                    'post_type' => 'post'
                )
            );
            new MultiPostThumbnails(
                array(
                    'label'     => __('3rd Featured Image', TEMP_NAME),
                    'id'        => 'feature-image-3',
                    'post_type' => 'post'
                )
            );
            new MultiPostThumbnails(
                array(
                    'label'     => __('4th Featured Image', TEMP_NAME),
                    'id'        => 'feature-image-4',
                    'post_type' => 'post'
                )
            );
            new MultiPostThumbnails(
                array(
                    'label'     => __('5th Featured Image', TEMP_NAME),
                    'id'        => 'feature-image-5',
                    'post_type' => 'post'
                )
            );

		if ( $gvc_portfolio_yes == 1 ):
            // MultiPostThumbnails for portfolio

            new MultiPostThumbnails(
                array(
                    'label'     => __('2nd Featured Image', TEMP_NAME),
                    'id'        => 'feature-image-2',
                    'post_type' => 'portfolio'
                )
            );
            new MultiPostThumbnails(
                array(
                    'label'     => __('3rd Featured Image', TEMP_NAME),
                    'id'        => 'feature-image-3',
                    'post_type' => 'portfolio'
                )
            );
            new MultiPostThumbnails(
                array(
                    'label'     => __('4th Featured Image', TEMP_NAME),
                    'id'        => 'feature-image-4',
                    'post_type' => 'portfolio'
                )
            );
            new MultiPostThumbnails(
                array(
                    'label'     => __('5th Featured Image', TEMP_NAME),
                    'id'        => 'feature-image-5',
                    'post_type' => 'portfolio'
                )
            );
		 endif;
        }

    /*----------------------------------------------------------------*/
    /*  Enable shorcodes in widgets
    /*----------------------------------------------------------------*/

        add_filter('widget_text', 'do_shortcode');

    /*----------------------------------------------------------------*/
    /*  HTML5 gallery and caption support (3.9 addition)
    /*----------------------------------------------------------------*/

        add_theme_support( 'html5', array( 'gallery', 'caption' ) );

    /*----------------------------------------------------------------*/
    /*  Content width
    /*----------------------------------------------------------------*/

        if ( ! isset( $content_width ) ) {
            $content_width = 1200;
        }

    /*----------------------------------------------------------------*/
    /*  Enable excerpt for pages
    /*----------------------------------------------------------------*/

        add_action('init', 'page_excerpt');
        function page_excerpt() {
            add_post_type_support( 'page', 'excerpt' );
        }

    /*----------------------------------------------------------------*/
    /*  Enable post formats for posts
    /*----------------------------------------------------------------*/

        add_theme_support( 'post-formats', array( 'aside', 'audio', 'video', 'image', 'gallery', 'link', 'quote', 'status', 'chat') );
        add_post_type_support( 'post', 'post-formats' );

    /*----------------------------------------------------------------*/
    /*  Enable automatic feed links
    /*----------------------------------------------------------------*/

        add_theme_support( 'automatic-feed-links' );

    /*----------------------------------------------------------------*/
    /*  Languages
    /*----------------------------------------------------------------*/

        add_action('after_setup_theme', 'gvc_language_setup');
        function gvc_language_setup(){
            load_theme_textdomain(TEMP_NAME, get_template_directory() . '/languages');
        }

    /*----------------------------------------------------------------*/
    /*  Menu
    /*----------------------------------------------------------------*/

        function gvc_register_menu() {

            if ( function_exists( 'register_nav_menu' ) ){
                register_nav_menu('header-menu',__( 'Header Menu', TEMP_NAME ));
                register_nav_menu('footer-menu',__( 'Footer Menu', TEMP_NAME ));
            }
          
        }
        add_action( 'init', 'gvc_register_menu' );

    /*----------------------------------------------------------------*/
    /*  Sidebar
    /*----------------------------------------------------------------*/

        if ( function_exists( 'register_sidebar' ) ){

            register_sidebar( 
                array (
                'name'          => __( 'Main widget area', TEMP_NAME),
                'id'            => 'main-widget-area',
                'description'   => __('Main widget area', TEMP_NAME),
                'class'         => 'main-widget-area',
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h6 class="widget_title">',
                'after_title'   => '</h6>' )
            );
		if ( $gvc_portfolio_yes == 1 ):
            register_sidebar( 
                array (
                'name'          => __( 'Portfolio widget area', TEMP_NAME),
                'id'            => 'portfolio-widget-area',
                'description'   => __('Portfolio widget area', TEMP_NAME),
                'class'         => 'portfolio-widget-area',
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h6 class="widget_title">',
                'after_title'   => '</h6>' )
            );
		endif;
		if( $gvc_faq_widget_area == 1 ):
            register_sidebar( 
                array (
                'name'          => __( 'FAQ widget area', TEMP_NAME),
                'id'            => 'faq-widget-area',
                'description'   => __('FAQ widget area', TEMP_NAME),
                'class'         => 'faq-widget-area',
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h6 class="widget_title">',
                'after_title'   => '</h6>' )
            );
		endif;
            register_sidebar( 
                array (
                'name'          => __( 'Page widget area', TEMP_NAME),
                'id'            => 'page-widget-area',
                'description'   => __('Page widget area', TEMP_NAME),
                'class'         => 'page-widget-area',
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h6 class="widget_title">',
                'after_title'   => '</h6>' )
            );

            register_sidebar( 
                array (
                'name'          => __( 'Footer widget area', TEMP_NAME),
                'id'            => 'footer-widget-area',
                'description'   => __('Footer widget area', TEMP_NAME),
                'class'         => 'footer-widget-area',
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h6 class="widget_title">',
                'after_title'   => '</h6>' )
            );

            /*register_sidebar( 
                array (
                'name'          => __( 'Shop widget area', TEMP_NAME),
                'id'            => 'shop-widget-area',
                'description'   => __('Shop widget area', TEMP_NAME),
                'class'         => 'shop-widget-area',
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h6 class="widget_title">',
                'after_title'   => '</h6>' )
            );
*/
        }

    /*----------------------------------------------------------------*/
    /*  WooCommerce
    /*----------------------------------------------------------------*/

        /*global $pagenow;
        if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'gvc_woocommerce_image_dimensions', 1 );

        function gvc_woocommerce_image_dimensions() {
            $catalog = array(
                'width'     => '384',
                'height'    => '410',
                'crop'      => 1
            );
            $single = array(
                'width'     => '600',
                'height'    => '640',
                'crop'      => 1
            );
            $thumbnail = array(
                'width'     => '100',
                'height'    => '100',
                'crop'      => 1 
            );

            update_option( 'shop_catalog_image_size', $catalog );
            update_option( 'shop_single_image_size', $single );
            update_option( 'shop_thumbnail_image_size', $thumbnail );
        }


        //change the position of add to cart
        remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
        remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
        add_action('woocommerce_before_shop_loop_item_title', 'gvc_product_thumbnail_with_cart', 10 );

        function gvc_product_thumbnail_with_cart() { ?>
            
           <div class="product-body">
                <div class="gvc-thumbnail">
                    <?php echo woocommerce_get_product_thumbnail();?>
                    <div class="gvc-overlay"><span class="gvc-more">&nbsp;</span></div>
                </div>
                <div class="gvc-card-wrapper">
                    <?php woocommerce_get_template( 'loop/add-to-cart.php' ); ?>
                    <div class="gvc-spinner">
                      <div class="gvc-rect1"></div>
                      <div class="gvc-rect2"></div>
                      <div class="gvc-rect3"></div>
                      <div class="gvc-rect4"></div>
                      <div class="gvc-rect5"></div>
                    </div>
                </div>
            </div>
        <?php 
        }

        //change the product-category structure
        add_action('woocommerce_before_subcategory_title', 'gvc_product_category_thumbnail_with_overlay_start', 5 );
        add_action('woocommerce_before_subcategory_title', 'gvc_product_category_thumbnail_with_overlay_end', 10 );

        function gvc_product_category_thumbnail_with_overlay_start() { ?>
            
           <div class="product-body">
                <div class="gvc-thumbnail">
                    <div class="gvc-overlay"><span class="gvc-more">&nbsp;</span></div>
        <?php 
        }

        function gvc_product_category_thumbnail_with_overlay_end() { ?>
                </div>
           </div>
        <?php 
        }

        // Ensure cart contents update when products are added to the cart via AJAX
        add_filter('add_to_cart_fragments', 'gvc_woocommerce_add_to_cart_fragment');
        function gvc_woocommerce_add_to_cart_fragment( $fragments ) {
            
            global $woocommerce;
            
            ob_start();
            
            ?>
            <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php echo __('View your shopping cart', TEMP_NAME); ?>">
                <i class="fa fa-shopping-cart"></i>
                <span class="cart-info"><?php echo $woocommerce->cart->get_cart_total(); ?> (<?php echo $woocommerce->cart->cart_contents_count; ?>)</span>
            </a>
            <?php
            
            $fragments['a.cart-contents'] = ob_get_clean();
            
            return $fragments;
            
        }

        // custom placeholders for images
        add_action( 'init', 'gvc_custom_woocommerce_thumb' );
        function gvc_custom_woocommerce_thumb() {
            add_filter('woocommerce_placeholder_img_src', 'gvc_custom_woocommerce_placeholder_img_src');
            function gvc_custom_woocommerce_placeholder_img_src( $src ) {

                global $gvc;

                $skin = ($gvc['gvc-skin']) ? $gvc['gvc-skin'] : "light";

                if ($skin == "light") {
                    if (is_product()) {
                       $src = IMAGES . '/placeholders/placeholder_large.jpg';
                    } else {
                       $src = IMAGES . '/placeholders/placeholder_small.jpg';
                    }
                } else {
                    if (is_product()) {
                       $src = IMAGES . '/placeholders/placeholder_large_dark.jpg';
                    } else {
                       $src = IMAGES . '/placeholders/placeholder_small_dark.jpg';
                    }
                }

                return $src;
            }
        }

        // insert tabs in summary
        remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
        add_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 1);  

        //wrap single product image in column div
        add_action( 'woocommerce_before_single_product_summary', 'gvc_column_open_div', 2);
        add_action( 'woocommerce_before_single_product_summary', 'gvc_column_close_div', 20);
        add_action( 'woocommerce_after_single_product_summary',  'gvc_clearfix_div', 2);

        function gvc_column_open_div(){ echo "<div class='one_half col gvc-single-product-image'>";}
        function gvc_column_close_div(){echo "</div><div class='one_half col gvc-single-product-summary last-yes'>";}
        function gvc_clearfix_div(){echo '</div><span class="inline-gvc-clearfix"></span>';}

        //remove wooCommerce prettyPhoto
        global $woocommerce;
        if($woocommerce) {
            
            function gvc_remove_pretty_photo(){
                wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
                wp_dequeue_style( 'woocommerce_chosen_styles' );
                wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
                wp_dequeue_script( 'prettyPhoto-init' );
                wp_dequeue_script( 'prettyPhoto' );
                wp_dequeue_script( 'wc-chosen' );
            }
            
            add_action( 'wp_enqueue_scripts', 'gvc_remove_pretty_photo', 99 );

            global $gvc;

            if ($gvc['gvc-shop-related-products'] == 0) {
                // remove related products
                remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
            }

        }

        // related products number
        function woo_related_products_limit() {
          global $product, $gvc;

            $posts_per_page = ($gvc['gvc-shop-related-products-number']) ? $gvc['gvc-shop-related-products-number'] : 4;
            
            $args = array(
                'post_type'             => 'product',
                'no_found_rows'         => 1,
                'posts_per_page'        => $posts_per_page,
                'ignore_sticky_posts'   => 1,
                'orderby'               => 'rand',
                'post__not_in'          => array($product->id)
            );
            return $args;
        }
        add_filter( 'woocommerce_related_products_args', 'woo_related_products_limit' );



        add_theme_support( 'woocommerce' );*/

    /*----------------------------------------------------------------*/
    /*  WooCommerce styles OFF
    /*----------------------------------------------------------------*/

        //add_filter( 'woocommerce_enqueue_styles', '__return_false' );

    /*----------------------------------------------------------------*/
    /*  Custom file upload mime types
    /*----------------------------------------------------------------*/

        add_filter('upload_mimes', 'gvc_custom_upload_mimes');
        function gvc_custom_upload_mimes ( $existing_mimes=array() ) {
            $existing_mimes['ttf']  = 'application/x-font-ttf';
            $existing_mimes['otf']  = 'application/x-font-opentype';
            $existing_mimes['woff'] = 'application/font-woff';
            $existing_mimes['svg']  = 'image/svg+xml';
            $existing_mimes['eot']  = 'application/vnd.ms-fontobject';
            return $existing_mimes;
        }

    /*----------------------------------------------------------------*/
    /*  Visual Composer
    /*----------------------------------------------------------------*/

        if(function_exists('vc_set_as_theme')) vc_set_as_theme();

/*====================================================================*/
/*  ADMIN AREA ICONS
/*====================================================================*/
    
    function gvc_add_menu_icons_styles(){
    ?>
     
        <style>
            #adminmenu .menu-icon-portfolio div.wp-menu-image:before {
              content: "\f322";
            }
            #adminmenu .menu-icon-gvc-slider div.wp-menu-image:before {
              content: "\f233";
            }
            #adminmenu .menu-icon-faq div.wp-menu-image:before {
              content: "\f223";
            }
        </style>
     
    <?php
    }
    add_action( 'admin_head', 'gvc_add_menu_icons_styles' );
	
/*===================================================================*/
/* Ajax Login
/*===================================================================*/

function ajax_login_init(){

    wp_register_script('ajax-login-script', get_template_directory_uri() . '/ajax-login-script.js', array('jquery') ); 
    wp_enqueue_script('ajax-login-script');

    wp_localize_script( 'ajax-login-script', 'ajax_login_object', array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => home_url(),
        'loadingmessage' => __('Sending user info, please wait...')
    ));

    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'ajax_login_init');
}

function ajax_login(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;

    $user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) ){
        echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
    } else {
        echo json_encode(array('loggedin'=>true, 'message'=>__('Login successful, redirecting...')));
    }

    die();
}

/*====================================================================*/
/*  STYLES
/*====================================================================*/

        function gvc_styles() {

            global $post_type;

            wp_enqueue_style( 'font-awesome', TEMP_PATH . '/css/font-awesome.css', array(), '', 'all' );
            wp_enqueue_style( 'colorbox', TEMP_PATH . '/css/colorbox.css', array(), '', 'all' );
            wp_enqueue_style( 'gvc-slider', TEMP_PATH . '/css/gvc-slider.css', array(), '', 'all' );

            if( 'gvc-slider' == $post_type ) {
                wp_enqueue_style( 'gvc-slider-preview', TEMP_PATH . '/css/gvc-slider-preview.css', array(), '', 'all' );
            }
        }
            
        add_action( 'wp_enqueue_scripts', 'gvc_styles' );
		

/*====================================================================*/
/*  SCRIPTS
/*====================================================================*/

    function gvc_script()
    {
        if(!is_admin())
        {
            
            global $gvc,$post_type;

            wp_enqueue_script( 'modernizer', TEMP_PATH . '/js/modernizer.js', array(), false);
            wp_enqueue_script( 'retina', TEMP_PATH . '/js/retina-1.1.0.min.js', array(), true);
            wp_enqueue_script( 'easing', TEMP_PATH . '/js/jquery.easing.min.js', array('jquery'), '', true);
            wp_enqueue_script( 'mobileEvents', TEMP_PATH . '/js/jquery.mobile-events.min.js', array('jquery'), '', true);
            wp_enqueue_script( 'contentcarousel', TEMP_PATH . '/js/jquery.contentcarousel.js', array('jquery'), '', true);
            wp_enqueue_script( 'colorbox', TEMP_PATH . '/js/jquery.colorbox-min.js', array('jquery'), '', true);
            wp_enqueue_script( 'imagesloaded', TEMP_PATH . '/js/imagesloaded.pkgd.min.js', array('jquery'), '', true);
            wp_enqueue_script( 'gvcslider', TEMP_PATH . '/js/jquery.gvc-slider.js', array('jquery'), '', true);

            if( 'gvc-slider' == $post_type ) {
                wp_enqueue_script( 'gvcsliderpreview', TEMP_PATH . '/js/jquery.gvc-slider-preview.js', array('jquery'), '', true);
            }

            if($gvc['gvc-google-map-api']) {
                wp_enqueue_script( 'gmap', 'https://maps.googleapis.com/maps/api/js?key='.$gvc['gvc-google-map-api'].'&sensor=true', array('jquery'), '', true);
            } elseif ($gvc['gvc-google-map-client-id']) {
                wp_enqueue_script( 'gmap', 'http://maps.googleapis.com/maps/api/js?client='.$gvc['gvc-google-map-client-id'].'&sensor=true&v=3.12', array('jquery'), '', true);
            }

            wp_enqueue_script( 'fromTo', TEMP_PATH . '/js/fromTo.js', array('jquery'), '', true);
            wp_enqueue_script( 'easy-pie-chart', TEMP_PATH . '/js/jquery.easy-pie-chart.js', array('jquery'), '', true);
            wp_enqueue_script( 'animateColors', TEMP_PATH . '/js/jquery.animate-colors-min.js', array('jquery'), '', true);
            wp_enqueue_script( 'flexslider', TEMP_PATH . '/js/jquery.flexslider-min.js', array('jquery'), '', true);
            wp_enqueue_script( 'masonry', TEMP_PATH . '/js/masonry.pkgd.min.js', array('jquery'), '', true);
            wp_enqueue_script( 'totop', TEMP_PATH . '/js/jquery.ui.totop.min.js', array('jquery'), '', true);
            wp_enqueue_script( 'inview', TEMP_PATH . '/js/jquery.inview.min.js', array('jquery'), '', true);
            wp_enqueue_script( 'mousewheel', TEMP_PATH . '/js/jquery.mousewheel.js', array('jquery'), '', true);
            wp_enqueue_script( 'smoothscroll', TEMP_PATH . '/js/jquery.simplr.smoothscroll.js', array('jquery'), '', true);

            if ($gvc['gvc-one-page'] && $gvc['gvc-one-page'] == 1) {
                wp_enqueue_script( 'single-page-nav', TEMP_PATH . '/js/jquery.singlePageNav.min.js', array('jquery'), '', true);
            }
            
            wp_enqueue_script( 'controller', TEMP_PATH . '/js/controller.js', array('jquery'), '', true);
        }  
    
    }
    add_action( 'wp_enqueue_scripts', 'gvc_script' );

/*====================================================================*/
/* ADMIN STYLES/SCRIPTS
/*====================================================================*/

    function admin_scripts_styles() {

        wp_enqueue_script( 'gvc-slider-admin', TEMP_PATH . '/js/admin-scripts.js', array('jquery'), '', true);
        wp_enqueue_style( 'admin-styles', TEMP_PATH . '/css/admin-styles.css', array(), '', 'all' );

        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker' );

        wp_enqueue_script( 'jquery-ui-spinner' );
        wp_enqueue_script( 'jquery-ui-sortable' );

        wp_enqueue_style( 'thickbox' );
        wp_enqueue_script( 'thickbox' );
        wp_enqueue_media();

        return;
    }
    add_action('admin_enqueue_scripts','admin_scripts_styles');

?>