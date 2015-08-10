<?php

$args = array();
$tabs = array();

/*===========================================================================================================================================================*/

	ob_start();

	$ct = wp_get_theme();
	$theme_data = $ct;
	$item_name = $theme_data->get('Name'); 
	$tags = $ct->Tags;
	$screenshot = $ct->get_screenshot();
	$class = $screenshot ? 'has-screenshot' : '';

	$customize_title = sprintf( __( 'Customize &#8220;%s&#8221;', TEMP_NAME), $ct->display('Name') );

	?>
	<div id="current-theme" class="<?php echo esc_attr( $class ); ?>">
		<?php if ( $screenshot ) : ?>
			<?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
			<a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr( $customize_title ); ?>">
				<img src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
			</a>
			<?php endif; ?>
			<img class="hide-if-customize" src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
		<?php endif; ?>

		<h4>
			<?php echo $ct->display('Name'); ?>
		</h4>

		<div>
			<ul class="theme-info">
				<li><?php printf( __('By %s',TEMP_NAME), $ct->display('Author') ); ?></li>
				<li><?php printf( __('Version %s',TEMP_NAME), $ct->display('Version') ); ?></li>
				<li><?php echo '<strong>'.__('Tags', TEMP_NAME).':</strong> '; ?><?php printf( $ct->display('Tags') ); ?></li>
			</ul>
			<p class="theme-description"><?php echo $ct->display('Description'); ?></p>
			<?php if ( $ct->parent() ) {
				printf( ' <p class="howto">' . __( 'This <a href="%1$s">child theme</a> requires its parent theme, %2$s.' ) . '</p>',
					__( 'http://codex.wordpress.org/Child_Themes',TEMP_NAME ),
					$ct->parent()->display( 'Name' ) );
			} ?>
			
		</div>

	</div>

	<?php
	$item_info = ob_get_contents();
	    
	ob_end_clean();

/*===========================================================================================================================================================*/

$args['dev_mode']    = false;
$args['opt_name']    = 'gvc';
$args['system_info'] = false;

$theme = wp_get_theme();

$args['display_name']       = $theme->get('Name');
$args['display_version']    = $theme->get('Version');
$args['last_tab']           = '0';
$args['admin_stylesheet']   = 'standard';
$args['show_import_export'] = true;
$args['import_icon']        = 'refresh';
$args['import_icon_class']  = 'icon-large';
$args['default_icon_class'] = 'icon-large';
$args['menu_title']         = __('Theme Settings', TEMP_NAME);
$args['page_title']         = __('Theme Settings', TEMP_NAME);
$args['page_slug']          = 'gvc_options';
$args['default_show']       = true;
$args['default_mark']       = '*';
$args['page_cap']           = 'manage_options';
$args['page_type']          = 'submenu';
$args['page_parent']        = 'themes.php';

$sections = array();

// General Settings
// ======================================================

	$sections[] = array(
		'title'      => __('General', TEMP_NAME),
		'icon_class' => 'icon-large',
	    'icon'       => 'el-icon-globe',
		'fields' => array(
			
			array(
				'id'       =>'gvc-favicon',
				'type'     => 'media', 
				'url'      => true,
				'preview'  => false,
				'title'    => __('Favicon upload', TEMP_NAME),
				'subtitle' => __('Upload a 32px x 32px .ico image that will be your favicon', TEMP_NAME)
			),

			array(
				'id'       =>'gvc-layout',
				'type'     => 'radio',
				'title'    => __('Main layout', TEMP_NAME), 
				'subtitle' => __('Set boxed or full layout.', TEMP_NAME),
				'options'  => array('full'=>'Full', 'boxed'=>'Boxed'),
				'default'  => 'full',
			),

			array(
				'id'      =>'gvc-page-comments',
				'type'    => 'switch', 
				'title'   => __('Comments on pages', TEMP_NAME),
				'subtitle'=> __('Toggle comments on pages', TEMP_NAME),
				"default" => 0,
			),

			array(
				'id'      =>'gvc-faq-widget-area',
				'type'    =>'switch', 
				'title'   => __('F.A.Q. widget area', TEMP_NAME),
				'subtitle' => __('Toggle F.A.Q. widget area', TEMP_NAME),
				"default" => 0,
			),

			array(
				'id'      =>'gvc-smooth-scroll',
				'type'    => 'switch', 
				'title'   => __('Smooth scroll', TEMP_NAME),
				'subtitle'=> __('Toggle smooth scroll', TEMP_NAME),
				"default" => 0,
			),

			array(
				'id'      =>'gvc-one-page',
				'type'    => 'switch', 
				'title'   => __('One page layout', TEMP_NAME),
				'subtitle'=> __('Toggle one page layout (with smooth scroll)', TEMP_NAME),
				"default" => 0,
			),

			array(
				'id'       =>'gvc-one-page-scroll-speed',
				'type'     => 'select',
				'title'    => __('One page scroll speed', TEMP_NAME),
				'subtitle' => __('Select one page layout scroll speed', TEMP_NAME),
				'options'  => array(
					'500'  =>'500ms', 
					'750'  =>'750ms', 
					'900'  =>'900ms',
					'1150' =>'1150ms',
					'1400' =>'1400ms' 
				),
				'default'  => 750,
			),

			array(
				'id'       =>'gvc-one-page-easing',
				'type'     => 'select',
				'title'    => __('One page easing', TEMP_NAME),
				'subtitle' => __('Select one page layout easing', TEMP_NAME),
				'options'  => array(
					'linear'           => 'linear',
					'swing'            => 'swing',
					'easeOutQuad'      => 'easeOutQuad',
					'easeInQuad'       => 'easeInQuad',
					'easeInOutQuad'    => 'easeInOutQuad',
					'easeInCubic'      => 'easeInCubic',
					'easeOutCubic'     => 'easeOutCubic',
					'easeInOutCubic'   => 'easeInOutCubic',
					'easeInQuart'      => 'easeInQuart',
					'easeOutQuart'     => 'easeOutQuart',
					'easeInOutQuart'   => 'easeInOutQuart',
					'easeInQuint'      => 'easeInQuint',
					'easeOutQuint'     => 'easeOutQuint',
					'easeInOutQuint'   => 'easeInOutQuint',
					'easeInSine'       => 'easeInSine',
					'easeOutSine'      => 'easeOutSine',
					'easeInOutSine'    => 'easeInOutSine',
					'easeInExpo'       => 'easeInExpo',
					'easeOutExpo'      => 'easeOutExpo',
					'easeInOutExpo'    => 'easeInOutExpo',
					'easeInCirc'       => 'easeInCirc',
					'easeOutCirc'      => 'easeOutCirc',
					'easeInOutCirc'    => 'easeInOutCirc',
					'easeInElastic'    => 'easeInElastic',
					'easeOutElastic'   => 'easeOutElastic',
					'easeInOutElastic' => 'easeInOutElastic', 
					'easeInBack'       => 'easeInBack',
					'easeOutBack'      => 'easeOutBack',
					'easeInOutBack'    => 'easeInOutBack',
					'easeInBounce'     => 'easeInBounce',
					'easeOutBounce'    => 'easeOutBounce',
					'easeInOutBounce'  => 'easeInOutBounce'
				),
				'default'  => 'swing',
			),

			array(
				'id'      =>'gvc-one-page-update-hash',
				'type'    => 'switch', 
				'title'   => __('One page layout hash', TEMP_NAME),
				'subtitle'=> __("Toggle one page layout hash. In browsers that support the history object, update the url's hash when clicking on the links ", TEMP_NAME),
				"default" => 0,
			),

			array(
				'id'       =>'gvc-one-page-filter',
				'type'     => 'text',
				'title'    => __('One page menu filter', TEMP_NAME),
				'subtitle' => __("Exclude links from one page menu by entering comma-separated menu items' ids", TEMP_NAME),
				'default'  => ''
			),

			array(
				'id'       =>'gvc-error-404-message',
				'type'     => 'textarea',
				'title'    => __('404 error page not found message', TEMP_NAME)
			),

			array(
	            'id'       => 'gvc-google-analytics',
	            'type'     => 'ace_editor',
				'mode'     => 'javascript',
				'theme'    => 'monokai',
	            'title'    => __('Google analytics', TEMP_NAME), 
	            'subtitle' => __('Please enter your google analytics tracking code here.', TEMP_NAME),
	        ),

	        array(
				'id'       =>'gvc-google-map-api',
				'type'     => 'text',
				'title'    => __('Google map API', TEMP_NAME),
				'subtitle' => __('Enter google map API here', TEMP_NAME),
				'default'  => ''
			),

			array(
				'id'       =>'gvc-google-map-client-id',
				'type'     => 'text',
				'title'    => __('Google map client ID', TEMP_NAME),
				'subtitle' => __('If you have Google Maps API for Business, enter your client ID here', TEMP_NAME),
				'default'  => ''
			)
		)
	);

// Header Settings
// ======================================================

	$sections[] = array(
		'title'      => __('Header', TEMP_NAME),
		'icon_class' => 'icon-large',
	    'icon'       => 'el-icon-website',
		'fields' => array(

			array(
				'id'       =>'gvc-normal-logo',
				'type'     => 'media', 
				'url'      => false,
				'title'    => __('Normal logo upload', TEMP_NAME),
				'subtitle' => __('Upload .jpg, .png or .gif image that will be your logo.', TEMP_NAME)
			),

			array(
				'id'       =>'gvc-retina-logo',
				'type'     => 'media', 
				'url'      => false,
				'title'    => __('Retina logo upload', TEMP_NAME),
				'subtitle' => __('Upload .jpg, .png or .gif image that will be your retina logo. Make sure that your image ends with symbols @2x (example logo@2x.png)', TEMP_NAME)
			),

			array(
				'id'       =>'gvc-header-attachment',
				'type'     => 'radio',
				'title'    => __('Header attachment', TEMP_NAME), 
				'subtitle' => __('Set header attachment to fixed or scroll', TEMP_NAME),
				'options'  => array('scroll' => 'Scroll', 'fixed' => 'Fixed'),
				'default'  => 'scroll'
			),

			array(
				'id'       =>'gvc-header-responsive',
				'type'    => 'switch',
				'title'    => __('Header mobile menu on 1024px', TEMP_NAME), 
				'subtitle' => __('Set header menu to mobile on 1024px screen (use this option, if you have too many menu items to fit 1024px width)', TEMP_NAME),
				"default" => 0
			),

			array(
				'id'      =>'gvc-header-search',
				'type'    => 'switch', 
				'title'   => __('Header search', TEMP_NAME),
				'subtitle'=> __('Toggle header search', TEMP_NAME),
				"default" => 1,
			),

			array(
				'id'      =>'gvc-header-menu-dropdown-indicator',
				'type'    => 'switch', 
				'title'   => __('Header menu dropdown indicator', TEMP_NAME),
				'subtitle'=> __('Toggle header menu dropdown indicator', TEMP_NAME),
				"default" => 0,
			),

			array(
				'id'       =>'gvc-header-height',
				'type'     => 'select',
				'title'    => __('Header height', TEMP_NAME),
				'subtitle' => __('Set header height in px', TEMP_NAME),
				'options'  => array(
					'60'  =>'60px', 
					'70'  =>'70px', 
					'80'  =>'80px',
					'90'  =>'90px',
					'100'  =>'100px', 
					'110'  =>'110px', 
					'120' =>'120px', 
				),
				'default'  => 90,
			),

			array(
				'id'      =>'gvc-header-top',
				'type'    => 'switch', 
				'title'   => __('Header top section', TEMP_NAME),
				'subtitle'=> __('Toggle header top section', TEMP_NAME),
				"default" => 0,
			),

			array(
				'id'       =>'gvc-header-top-background-color',
				'type'     => 'color',
				'title'    => __('Header top section background color', TEMP_NAME),
				'subtitle' => __('Pick a background color for header top section', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#f34a53',
			),

			array(
				'id'       =>'gvc-header-top-text-color',
				'type'     => 'color',
				'title'    => __('Header top section text color', TEMP_NAME),
				'subtitle' => __('Pick a text color for header top section', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#ffffff',
			),

			array(
				'id'      =>'gvc-language-switch',
				'type'    => 'switch', 
				'title'   => __('Header top section language switcher', TEMP_NAME),
				'subtitle'=> __('Toggle header top section language switcher (available if WPML plugin is installed and activated)', TEMP_NAME),
				"default" => 0,
			),

			array(
				'id'      =>'gvc-header-social-links',
				'type'    => 'switch', 
				'title'   => __('Header top social links', TEMP_NAME),
				'subtitle'=> __('Toggle social links in header (activate header top to see social links)', TEMP_NAME),
				"default" => 0,
			),

			array(
				'id'       =>'gvc-header-social-links-default-color',
				'type'     => 'color',
				'title'    => __('Header top section social links default color', TEMP_NAME),
				'subtitle' => __('Pick a default color for header top section social links', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#ffffff',
			),

			array(
				'id'       =>'gvc-header-social-links-hover-color',
				'type'     => 'color',
				'title'    => __('Header top section social links hover color', TEMP_NAME),
				'subtitle' => __('Pick a hover color for header top section social links', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#ffffff',
			),

			array(
				'id'       =>'gvc-header-social-links-hover-background-color',
				'type'     => 'color',
				'title'    => __('Header top section social links hover background color', TEMP_NAME),
				'subtitle' => __('Pick a hover background color for header top section social links', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#ea3d47',
			),

			array(
				'id'       =>'gvc-slogan',
				'type'     => 'textarea',
				'title'    => __('Slogan', TEMP_NAME), 
				'subtitle' => __('Enter slogan here (activate header top to see slogan)', TEMP_NAME)
			),

			array(
				'id'       =>'gvc-header-background-color',
				'type'     => 'color',
				'title'    => __('Header background color', TEMP_NAME),
				'subtitle' => __('Pick a background color for header', TEMP_NAME),
				'validate' => 'color',
				'default'  => '',
			),

			array(
				'id'       =>'gvc-menu-default-text-color',
				'type'     => 'color',
				'title'    => __('Menu default text color (top-level menu only)', TEMP_NAME),
				'subtitle' => __('Pick a default text color for the menu', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#333333',
			),

			array(
				'id'       =>'gvc-menu-hover-text-color',
				'type'     => 'color',
				'title'    => __('Menu hover text color (top-level menu only)', TEMP_NAME),
				'subtitle' => __('Pick a hover text color for the menu', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#ffffff',
			),

			array(
				'id'       =>'gvc-menu-hover-effect',
				'type'     => 'select',
				'title'    => __('Choose menu hover effect', TEMP_NAME), 
				'options'  => array(
					'none'      => 'none', 
					'fill'      => 'fill', 
					'underline' => 'underline', 
				),
				'default'  => 'fill'
			),

			array(
				'id'       =>'gvc-menu-hover-effect-color',
				'type'     => 'color',
				'title'    => __('Choose menu hover effect color', TEMP_NAME),
				'subtitle' => __('Refers to underline/fill hover effect', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#f34a53',
			),

			array(
				'id'       =>'gvc-menu-text-transform',
				'type'     => 'select',
				'title'    => __('Menu text transform', TEMP_NAME), 
				'subtitle' => __('Transform menu items text to uppercase (refers to top level menu)', TEMP_NAME),
				'options'  => array('uppercase'=>'uppercase', 'none'=>'none'),
				'default'  => 'uppercase',
			),

			array(
				'id'       =>'gvc-menu-font-weight',
				'type'     => 'select',
				'title'    => __('Menu font weight', TEMP_NAME),
				'subtitle' => __('Choose menu font-weight', TEMP_NAME),
				'options'  => array('normal'=>'normal','300'=>'light','600'=>'semibold', 'bold'=>'bold'),
				'default'  => 'normal',
			),

			array(
				'id'       =>'gvc-menu-font-size',
				'type'     => 'select',
				'title'    => __('Menu font size', TEMP_NAME), 
				'subtitle' => __('Set menu font-size (refers to top level menu)', TEMP_NAME),
				'options'  => array(
					'10'=>'10px',
					'11'=>'11px',
					'12'=>'12px', 
					'13'=>'13px', 
					'14'=>'14px', 
					'15'=>'15px',
					'16'=>'16px',
					'17'=>'17px',
					'18'=>'18px' 
				),
				'default'  => '14',
			),

			array(
				'id'       =>'gvc-menu-font-family',
				'type'     => 'select',
				'title'    => __('Menu font family', TEMP_NAME),
				'subtitle' => __('Set menu font-family (refers to top level menu)', TEMP_NAME),
				'options'  => array(
					'verdana'           =>'Verdana', 
					'georgia'           =>'Georgia',
					'courier'           =>'Courier',
					'arial'             =>'Arial',
					'tahoma'            =>'Tahoma',
					'trebuchet'         =>'Trebuchet',
					'arial-black'       =>'Arial Black',
					'times-new-roman'   =>'Times New Roman',
					'palatino'          =>'Palatino',
					'lucida'            =>'Lucida',
					'ms-serif'          =>'Ms-serif',
					'lucida-console'    =>'Lucida-console',
					'comic'             =>'Comic',
					'open-sans'         =>'Open-sans',
					'caesar-dressing'   =>'Caesar-dressing',
					'cantata'           =>'Cantata',
					'roboto'            =>'Roboto',
					'arvo'              =>'Arvo',
					'vollkorn'          =>'Vollkorn',
					'ubuntu'            =>'Ubuntu',
					'old-standard-tt'   =>'Old standard tt',
					'droid-sans'        =>'Droid sans',
					'medula-one'        =>'Medula one',
					'oleo-script'       =>'Oleo script',
					'alice'             =>'Alice',
					'dosis'             =>'Dosis',
					'oswald'            =>'Oswald',
					'lato'              =>'Lato',
					'droid-serif'       =>'Droid-serif',
					'varela-round'      =>'Varela Round',
					'francois-one'      =>'Francois One',
					'pt-serif'          =>'PT Serif',
					'roboto-slab'       =>'Roboto Slab',
					'play'              =>'Play',
					'nunito'            =>'Nunito',
					'fjalla-one'        =>'Fjalla One',
					'libre-baskerville' =>'Libre Baskerville',
					'cuprum'            =>'Cuprum',
					'istok-web'         =>'Istok Web',
					'archivo-narrow'    =>'Archivo Narrow',
					'anton'             =>'Anton',
					'coming'            =>'Coming Soon',
					'cabin-condensed'   =>'Cabin Condensed'
				),
				'default'  => 'arial',
			),

			array(
				'id'       =>'gvc-submenu-text-transform',
				'type'     => 'select',
				'title'    => __('Submenu text transform', TEMP_NAME), 
				'subtitle' => __('Transform submenu items text to uppercase (refers to submenu only)', TEMP_NAME),
				'options'  => array('uppercase'=>'uppercase', 'none'=>'none'),
				'default'  => 'none',
			),

			array(
				'id'       =>'gvc-submenu-font-weight',
				'type'     => 'select',
				'title'    => __('Submenu font weight', TEMP_NAME),
				'subtitle' => __('Choose submenu font-weight', TEMP_NAME),
				'options'  => array('normal'=>'normal','300'=>'light','600'=>'semibold', 'bold'=>'bold'),
				'default'  => 'normal',
			),

			array(
				'id'       =>'gvc-submenu-font-size',
				'type'     => 'select',
				'title'    => __('Submenu font size', TEMP_NAME), 
				'subtitle' => __('Set submenu font-size (refers to submenu only)', TEMP_NAME),
				'options'  => array(
					'10'=>'10px',
					'11'=>'11px',
					'12'=>'12px', 
					'13'=>'13px', 
					'14'=>'14px', 
					'15'=>'15px',
					'16'=>'16px',
					'17'=>'17px',
					'18'=>'18px' 
				),
				'default'  => '13',
			),

			array(
				'id'       =>'gvc-submenu-font-family',
				'type'     => 'select',
				'title'    => __('Submenu font family', TEMP_NAME),
				'subtitle' => __('Set submenu font-family (refers to submenu only)', TEMP_NAME),
				'options'  => array(
					'verdana'           =>'Verdana', 
					'georgia'           =>'Georgia',
					'courier'           =>'Courier',
					'arial'             =>'Arial',
					'tahoma'            =>'Tahoma',
					'trebuchet'         =>'Trebuchet',
					'arial-black'       =>'Arial Black',
					'times-new-roman'   =>'Times New Roman',
					'palatino'          =>'Palatino',
					'lucida'            =>'Lucida',
					'ms-serif'          =>'Ms-serif',
					'lucida-console'    =>'Lucida-console',
					'comic'             =>'Comic',
					'open-sans'         =>'Open-sans',
					'caesar-dressing'   =>'Caesar-dressing',
					'cantata'           =>'Cantata',
					'roboto'            =>'Roboto',
					'arvo'              =>'Arvo',
					'vollkorn'          =>'Vollkorn',
					'ubuntu'            =>'Ubuntu',
					'old-standard-tt'   =>'Old standard tt',
					'droid-sans'        =>'Droid sans',
					'medula-one'        =>'Medula one',
					'oleo-script'       =>'Oleo script',
					'alice'             =>'Alice',
					'dosis'             =>'Dosis',
					'oswald'            =>'Oswald',
					'lato'              =>'Lato',
					'droid-serif'       =>'Droid-serif',
					'varela-round'      =>'Varela Round',
					'francois-one'      =>'Francois One',
					'pt-serif'          =>'PT Serif',
					'roboto-slab'       =>'Roboto Slab',
					'play'              =>'Play',
					'nunito'            =>'Nunito',
					'fjalla-one'        =>'Fjalla One',
					'libre-baskerville' =>'Libre Baskerville',
					'cuprum'            =>'Cuprum',
					'istok-web'         =>'Istok Web',
					'archivo-narrow'    =>'Archivo Narrow',
					'anton'             =>'Anton',
					'coming'            =>'Coming Soon',
					'cabin-condensed'   =>'Cabin Condensed'
				),
				'default'  => 'arial',
			),

			array(
				'id'       =>'gvc-submenu-text-color',
				'type'     => 'color',
				'title'    => __('Submenu items text color', TEMP_NAME),
				'subtitle' => __('Pick a text color for header submenu items', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#dddddd',
			),

			array(
				'id'       =>'gvc-submenu-hover-text-color',
				'type'     => 'color',
				'title'    => __('Submenu items hover text color', TEMP_NAME),
				'subtitle' => __('Pick a hover text color for header submenu items', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#ffffff',
			),

			array(
				'id'       =>'gvc-submenu-background-color',
				'type'     => 'color',
				'title'    => __('Submenu items background color', TEMP_NAME),
				'subtitle' => __('Pick a background color for header submenu items', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#5c6366',
			),

			array(
				'id'       =>'gvc-submenu-hover-background-color',
				'type'     => 'color',
				'title'    => __('Submenu items hover background color', TEMP_NAME),
				'subtitle' => __('Pick a hover background color for header submenu items', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#565e60',
			),

			array(
				'id'       =>'gvc-submenu-border-color',
				'type'     => 'color',
				'title'    => __('Submenu border color', TEMP_NAME),
				'subtitle' => __('Pick a border color for header submenu', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#4b5051',
			),

			array(
				'id'       =>'gvc-submenu-top-bottom-border-color',
				'type'     => 'color',
				'title'    => __('Submenu top and bottom border color', TEMP_NAME),
				'subtitle' => __('Pick a border color for header submenu top border and bottom border', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#474d4f',
			),

			array(
				'id'       =>'gvc-submenu-opacity',
				'type'     => 'select',
				'title'    => __('Submenu opacity', TEMP_NAME),
				'subtitle' => __('Set submenu opacity', TEMP_NAME),
				'options'  => array(
					'0.8' =>'80%',
					'0.82'=>'82%',
					'0.84'=>'84%',
					'0.86'=>'86%',
					'0.88'=>'88%',
					'0.9' =>'90%',
					'0.92'=>'92%',
					'0.94'=>'94%',
					'0.96'=>'96%',
					'0.98'=>'98%',
					'1'   =>'100%', 
				),
				'default'  => '1',
			),

			array(
				'id'      =>'gvc-megamenu-border',
				'type'    => 'switch', 
				'title'    => __('Megamenu submenu separator', TEMP_NAME), 
				'subtitle' => __('Toggle megamenu submenu separators (right border of each megamenu submenu blocks)', TEMP_NAME),
				"default" => 1,
			),

			array(
				'id'      =>'gvc-megamenu-submenu-border',
				'type'    => 'switch', 
				'title'    => __('Megamenu submenu items border', TEMP_NAME), 
				'subtitle' => __('Toggle megamenu submenu items border', TEMP_NAME),
				"default" => 0,
			),

			array(
				'id'       =>'gvc-megamenu-top-level-font-weight',
				'type'     => 'select',
				'title'    => __('Megamenu top level font weight', TEMP_NAME),
				'subtitle' => __('Choose megamenu top level font-weight', TEMP_NAME),
				'options'  => array('normal'=>'normal','300'=>'light','600'=>'semibold', 'bold'=>'bold'),
				'default'  => 'normal',
			),

			array(
				'id'       =>'gvc-megamenu-top-level-text-transform',
				'type'     => 'select',
				'title'    => __('Megamenu top level text transform', TEMP_NAME), 
				'subtitle' => __('Transform megamenu top level items text to uppercase (refers to megamenu top level only)', TEMP_NAME),
				'options'  => array('uppercase'=>'uppercase', 'none'=>'none'),
				'default'  => 'none',
			),

			array(
				'id'       =>'gvc-megamenu-top-level-text-color',
				'type'     => 'color',
				'title'    => __('Megamenu top level items text color', TEMP_NAME),
				'subtitle' => __('Pick a text color for header megamenu top level items', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#dddddd',
			),

			array(
				'id'       =>'gvc-megamenu-top-level-hover-text-color',
				'type'     => 'color',
				'title'    => __('Megamenu top level items hover text color', TEMP_NAME),
				'subtitle' => __('Pick a hover text color for header megamenu top level items', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#ffffff',
			),

			array(
				'id'       =>'gvc-megamenu-top-level-background-color',
				'type'     => 'color',
				'title'    => __('Megamenu top level items background color', TEMP_NAME),
				'subtitle' => __('Pick a background color for header megamenu top level items', TEMP_NAME),
				'validate' => 'color',
				'default'  => '',
			),

			array(
				'id'       =>'gvc-megamenu-top-level-hover-background-color',
				'type'     => 'color',
				'title'    => __('Megamenu top level items hover background color', TEMP_NAME),
				'subtitle' => __('Pick a hover background color for header megamenu top level items', TEMP_NAME),
				'validate' => 'color',
				'default'  => '',
			),

			array(
				'id'       =>'gvc-megamenu-sub-level-text-transform',
				'type'     => 'select',
				'title'    => __('Megamenu sub level text transform', TEMP_NAME), 
				'subtitle' => __('Transform megamenu sub level items text to uppercase (refers to megamenu sub level only)', TEMP_NAME),
				'options'  => array('uppercase'=>'uppercase', 'none'=>'none'),
				'default'  => 'none',
			),

			array(
				'id'       =>'gvc-megamenu-sub-level-text-color',
				'type'     => 'color',
				'title'    => __('Megamenu sub level items text color', TEMP_NAME),
				'subtitle' => __('Pick a text color for header megamenu sub level items', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#dddddd',
			),

			array(
				'id'       =>'gvc-megamenu-sub-level-hover-text-color',
				'type'     => 'color',
				'title'    => __('Megamenu sub level items hover text color', TEMP_NAME),
				'subtitle' => __('Pick a hover text color for header megamenu sub level items', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#ffffff',
			),

			array(
				'id'       =>'gvc-megamenu-sub-level-background-color',
				'type'     => 'color',
				'title'    => __('Megamenu sub level items background color', TEMP_NAME),
				'subtitle' => __('Pick a background color for header megamenu sub level items', TEMP_NAME),
				'validate' => 'color',
				'default'  => '',
			),

			array(
				'id'       =>'gvc-megamenu-sub-level-hover-background-color',
				'type'     => 'color',
				'title'    => __('Megamenu sub level items hover background color', TEMP_NAME),
				'subtitle' => __('Pick a hover background color for header megamenu sub level items', TEMP_NAME),
				'validate' => 'color',
				'default'  => '',
			),

		)
	);

// Footer Settings
// ======================================================

	$sections[] = array(
		'title'      => __('Footer', TEMP_NAME),
		'icon_class' => 'icon-large',
	    'icon'       => 'el-icon-arrow-down',
		'fields' => array(

			array(
				'id'       =>'gvc-footer-background-color',
				'type'     => 'color',
				'title'    => __('Footer background color', TEMP_NAME),
				'subtitle' => __('Pick a background color for footer', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#19262b',
			),

			array(
				'id'       =>'gvc-footer-text-color',
				'type'     => 'color',
				'title'    => __('Footer text color', TEMP_NAME),
				'subtitle' => __('Pick a text color for the footer', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#ffffff',
			),

			array(
				'id'       =>'gvc-footer-font-size',
				'type'     => 'select',
				'title'    => __('Footer font size', TEMP_NAME),
				'subtitle' => __('Choose font size for footer', TEMP_NAME),
				'options'  => array(
					'11'=>'11px', 
					'12'=>'12px', 
					'13'=>'13px', 
					'14'=>'14px', 
					'15'=>'15px',
					'16'=>'16px',
					'17'=>'17px',
					'18'=>'18px',
					'19'=>'19px',
					'20'=>'20px',
					'21'=>'21px',
					'22'=>'22px',
					'23'=>'23px',
					'24'=>'24px',
					'25'=>'25px',
					'26'=>'26px',
					'27'=>'27px',
					'28'=>'28px',
					'29'=>'29px',
					'30'=>'30px',
					'31'=>'31px',
					'32'=>'32px' 
				),
				'default'  => '13',
			),

			array(
				'id'       =>'gvc-footer-line-height',
				'type'     => 'select',
				'title'    => __('Footer text line height', TEMP_NAME),
				'subtitle' => __('Choose footer text line height for your site', TEMP_NAME),
				'options'  => array(
					'11'=>'11px', 
					'12'=>'12px', 
					'13'=>'13px', 
					'14'=>'14px', 
					'15'=>'15px',
					'16'=>'16px',
					'17'=>'17px',
					'18'=>'18px',
					'19'=>'19px',
					'20'=>'20px',
					'21'=>'21px',
					'22'=>'22px',
					'23'=>'23px',
					'24'=>'24px',
					'25'=>'25px',
					'26'=>'26px',
					'27'=>'27px',
					'28'=>'28px',
					'29'=>'29px',
					'30'=>'30px',
					'31'=>'31px',
					'32'=>'32px',
					'33'=>'33px',
					'34'=>'34px',
					'35'=>'35px',
					'36'=>'36px',
					'37'=>'37px',
					'38'=>'38px',
					'39'=>'39px',
					'40'=>'40px'        
				),
				'default'  => '22',
			),

			array(
				'id'      =>'gvc-footer-social-links',
				'type'    => 'switch', 
				'title'   => __('Footer social links', TEMP_NAME),
				'subtitle'=> __('Toggle social links in footer', TEMP_NAME),
				"default" => 1,
			),

			array(
				'id'      =>'gvc-copyright',
				'type'    => 'textarea', 
				'title'   => __('Copyright info', TEMP_NAME),
				"default" => '&copy gvc Team',
			),

			array(
				'id'       =>'gvc-footer-widget-area-background-color',
				'type'     => 'color',
				'title'    => __('Footer widget area background color', TEMP_NAME),
				'subtitle' => __('Pick a background color for footer widget area', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#253237',
			),

			array(
				'id'       =>'gvc-footer-widget-area-widget-title-color',
				'type'     => 'color',
				'title'    => __('Footer widget area widget title color', TEMP_NAME),
				'subtitle' => __('Pick a title color for the footer widgets', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#ffffff',
			),

			array(
				'id'       =>'gvc-footer-widget-area-text-color',
				'type'     => 'color',
				'title'    => __('Footer widget area text color', TEMP_NAME),
				'subtitle' => __('Pick a text color for the footer widget area', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#737c80',
			),

			array(
				'id'       =>'gvc-footer-widget-area-columns',
				'type'     => 'radio',
				'title'    => __('Footer widget area columns', TEMP_NAME), 
				'subtitle' => __('Set columns for footer widget area.', TEMP_NAME),
				'options'  => array('3'=>'3', '4'=>'4'),
				'default'  => '4',
			)

		)
	);

// Styling Settings
// ======================================================

	$sections[] = array(
		'title'      => __('Styling', TEMP_NAME),
		'icon_class' => 'icon-large',
	    'icon'       => 'el-icon-eye-open',
		'fields' => array(

			array(
				'id'       =>'gvc-main-color',
				'type'     => 'color',
				'title'    => __('Main color', TEMP_NAME), 
				'subtitle' => __('Pick a main color', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#f34a53',
			),

			array(
				'id'       =>'gvc-skin',
				'type'     => 'radio',
				'title'    => __('Template skin', TEMP_NAME), 
				'subtitle' => __('Set template skin.', TEMP_NAME),
				'options'  => array('light' => 'Light', 'dark' => 'Dark'),
				'default'  => 'light'
			),

			array(
				'id'       =>'gvc-site-background-color',
				'type'     => 'color',
				'title'    => __('Site background color', TEMP_NAME), 
				'subtitle' => __('Pick a background color for site (choose "Boxed" layout option to see site background color)', TEMP_NAME),
				'validate' => 'color',
				'default'  => '',
			),

			array(
				'id'       =>'gvc-site-background-image',
				'type'     => 'media', 
				'url'      => false,
				'title'    => __('Site background image upload', TEMP_NAME),
				'subtitle' => __('Upload .jpg, .png or .gif image that will be site background image (Choose "Boxed" layout option to see site background image)', TEMP_NAME)
			),

			array(
				'id'       =>'gvc-site-background-image-repeat',
				'type'     => 'select',
				'title'    => __('Site background image repeat', TEMP_NAME), 
				'subtitle' => __('Repeat your background image horizontally, vertically, both horizontally and vertically or no repeat', TEMP_NAME),
				'options'  => array('repeat'=>'repeat', 'repeat-x'=>'repeat-x', 'repeat-y'=>'repeat-y', 'no-repeat'=>'no-repeat'),
				'default'  => 'no-repeat',
			),

			array(
				'id'       =>'gvc-site-background-image-position',
				'type'     => 'select',
				'title'    => __('Site background image position', TEMP_NAME),
				'subtitle' => __('Position your background image', TEMP_NAME),
				'options'  => array('left_top'=>'left top', 'left_bottom'=>'left bottom', 'right_top'=>'right top', 'right_bottom'=>'right bottom', 'center_center'=>'center center'),
				'default'  => 'left_top',
			),

			array(
				'id'       =>'gvc-site-background-image-attachment',
				'type'     => 'radio',
				'title'    => __('Site background image attachment', TEMP_NAME),
				'subtitle' => __('Choose fixed or scroll for your background image', TEMP_NAME),
				'options'  => array('scroll' => 'scroll', 'fixed' => 'fixed'),
				'default'  => 'scroll'
			),

			array(
				'id'       =>'gvc-site-background-image-size',
				'type'     => 'radio',
				'title'    => __('Site background image size', TEMP_NAME),
				'subtitle' => __('Choose cover or auto for your background image size', TEMP_NAME),
				'options'  => array('auto' => 'auto', 'cover' => 'cover'),
				'default'  => 'auto'
			),

			array(
				'id'       =>'gvc-light-skin-main-text-color',
				'type'     => 'color',
				'title'    => __('Light skin main text color', TEMP_NAME), 
				'subtitle' => __('Pick a main text color for light skin', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#777777',
			),

			array(
				'id'       =>'gvc-light-skin-dark-text-color',
				'type'     => 'color',
				'title'    => __('Light skin dark text color', TEMP_NAME), 
				'subtitle' => __('Pick a color for emphasized text (refers to headings, several shortcodes, etc.)', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#444444',
			),

			array(
				'id'       =>'gvc-light-skin-light-text-color',
				'type'     => 'color',
				'title'    => __('Light skin light text color', TEMP_NAME), 
				'subtitle' => __('Pick a color for light text (refers to several shortcodes, etc.)', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#999999',
			),

			array(
				'id'       =>'gvc-dark-skin-main-text-color',
				'type'     => 'color',
				'title'    => __('Dark skin main text color', TEMP_NAME), 
				'subtitle' => __('Pick a main text color for light skin', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#999999',
			),

			array(
				'id'       =>'gvc-dark-skin-dark-text-color',
				'type'     => 'color',
				'title'    => __('Dark skin dark text color', TEMP_NAME), 
				'subtitle' => __('Pick a color for emphasized text (refers to headings, several shortcodes, etc.)', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#ffffff',
			),

			array(
				'id'       =>'gvc-dark-skin-light-text-color',
				'type'     => 'color',
				'title'    => __('Dark skin light text color', TEMP_NAME), 
				'subtitle' => __('Pick a color for light text (refers to several shortcodes, etc.)', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#777777',
			),

			array(
	            'id'       => 'gvc-custom-css',
	            'type'     => 'ace_editor',
				'mode'     => 'css',
				'theme'    => 'monokai',
	            'title'    => __('Custom CSS Styles', TEMP_NAME), 
	            'subtitle' => __('Enter custom css code here.', TEMP_NAME),
	        ),
		)
	);

// Typography Settings
// ======================================================

	$sections[] = array(
		'title'      => __('Typography', TEMP_NAME),
		'icon_class' => 'icon-large',
	    'icon'       => 'el-icon-font',
		'fields' => array(

			array(
				'id'       =>'gvc-body-font-family',
				'type'     => 'select',
				'title'    => __('Main font family', TEMP_NAME),
				'subtitle' => __('Choose main font family for your site', TEMP_NAME),
				'options'  => array(
					'verdana'           =>'Verdana', 
					'georgia'           =>'Georgia',
					'courier'           =>'Courier',
					'arial'             =>'Arial',
					'tahoma'            =>'Tahoma',
					'trebuchet'         =>'Trebuchet',
					'arial-black'       =>'Arial Black',
					'times-new-roman'   =>'Times New Roman',
					'palatino'          =>'Palatino',
					'lucida'            =>'Lucida',
					'ms-serif'          =>'Ms-serif',
					'lucida-console'    =>'Lucida-console',
					'comic'             =>'Comic',
					'open-sans'         =>'Open-sans',
					'caesar-dressing'   =>'Caesar-dressing',
					'cantata'           =>'Cantata',
					'roboto'            =>'Roboto',
					'arvo'              =>'Arvo',
					'vollkorn'          =>'Vollkorn',
					'ubuntu'            =>'Ubuntu',
					'old-standard-tt'   =>'Old standard tt',
					'droid-sans'        =>'Droid sans',
					'medula-one'        =>'Medula one',
					'oleo-script'       =>'Oleo script',
					'alice'             =>'Alice',
					'dosis'             =>'Dosis',
					'oswald'            =>'Oswald',
					'lato'              =>'Lato',
					'droid-serif'       =>'Droid-serif',
					'varela-round'      =>'Varela Round',
					'francois-one'      =>'Francois One',
					'pt-serif'          =>'PT Serif',
					'roboto-slab'       =>'Roboto Slab',
					'play'              =>'Play',
					'nunito'            =>'Nunito',
					'fjalla-one'        =>'Fjalla One',
					'libre-baskerville' =>'Libre Baskerville',
					'cuprum'            =>'Cuprum',
					'istok-web'         =>'Istok Web',
					'archivo-narrow'    =>'Archivo Narrow',
					'anton'             =>'Anton',
					'coming'            =>'Coming Soon',
					'cabin-condensed'   =>'Cabin Condensed'
				),
				'default'  => 'arial',
			),

			array(
				'id'       =>'gvc-body-font-size',
				'type'     => 'select',
				'title'    => __('Main font size', TEMP_NAME),
				'subtitle' => __('Choose main font size for your site', TEMP_NAME),
				'options'  => array(
					'11'=>'11px', 
					'12'=>'12px', 
					'13'=>'13px', 
					'14'=>'14px', 
					'15'=>'15px',
					'16'=>'16px',
					'17'=>'17px',
					'18'=>'18px',
					'19'=>'19px',
					'20'=>'20px',
					'21'=>'21px',
					'22'=>'22px',
					'23'=>'23px',
					'24'=>'24px',
					'25'=>'25px',
					'26'=>'26px',
					'27'=>'27px',
					'28'=>'28px',
					'29'=>'29px',
					'30'=>'30px',
					'31'=>'31px',
					'32'=>'32px' 
				),
				'default'  => '13',
			),

			array(
				'id'       =>'gvc-body-line-height',
				'type'     => 'select',
				'title'    => __('Main text line height', TEMP_NAME),
				'subtitle' => __('Choose main text line height for your site', TEMP_NAME),
				'options'  => array(
					'11'=>'11px', 
					'12'=>'12px', 
					'13'=>'13px', 
					'14'=>'14px', 
					'15'=>'15px',
					'16'=>'16px',
					'17'=>'17px',
					'18'=>'18px',
					'19'=>'19px',
					'20'=>'20px',
					'21'=>'21px',
					'22'=>'22px',
					'23'=>'23px',
					'24'=>'24px',
					'25'=>'25px',
					'26'=>'26px',
					'27'=>'27px',
					'28'=>'28px',
					'29'=>'29px',
					'30'=>'30px',
					'31'=>'31px',
					'32'=>'32px',
					'33'=>'33px',
					'34'=>'34px',
					'35'=>'35px',
					'36'=>'36px',
					'37'=>'37px',
					'38'=>'38px',
					'39'=>'39px',
					'40'=>'40px'        
				),
				'default'  => '22',
			),

			array(
				'id'       =>'gvc-body-small-font-size',
				'type'     => 'select',
				'title'    => __('Small text font size', TEMP_NAME),
				'subtitle' => __('Choose small text font size for your site (refers to post meta information and several shortcodes)', TEMP_NAME),
				'options'  => array(
					'11'=>'11px', 
					'12'=>'12px', 
					'13'=>'13px', 
					'14'=>'14px', 
					'15'=>'15px',
					'16'=>'16px',
					'17'=>'17px',
					'18'=>'18px',
					'19'=>'19px',
					'20'=>'20px',
					'21'=>'21px',
					'22'=>'22px',
					'23'=>'23px',
					'24'=>'24px',
					'25'=>'25px',
					'26'=>'26px',
					'27'=>'27px',
					'28'=>'28px',
					'29'=>'29px',
					'30'=>'30px',
					'31'=>'31px',
					'32'=>'32px' 
				),
				'default'  => '11',
			),

			array(
				'id'       =>'gvc-body-small-line-height',
				'type'     => 'select',
				'title'    => __('Small text line height', TEMP_NAME),
				'subtitle' => __('Choose small text line height for your site', TEMP_NAME),
				'options'  => array(
					'11'=>'11px', 
					'12'=>'12px', 
					'13'=>'13px', 
					'14'=>'14px', 
					'15'=>'15px',
					'16'=>'16px',
					'17'=>'17px',
					'18'=>'18px',
					'19'=>'19px',
					'20'=>'20px',
					'21'=>'21px',
					'22'=>'22px',
					'23'=>'23px',
					'24'=>'24px',
					'25'=>'25px',
					'26'=>'26px',
					'27'=>'27px',
					'28'=>'28px',
					'29'=>'29px',
					'30'=>'30px',
					'31'=>'31px',
					'32'=>'32px',
					'33'=>'33px',
					'34'=>'34px',
					'35'=>'35px',
					'36'=>'36px',
					'37'=>'37px',
					'38'=>'38px',
					'39'=>'39px',
					'40'=>'40px'        
				),
				'default'  => '22',
			),

			array(
				'id'       =>'gvc-headings-font-family',
				'type'     => 'select',
				'title'    => __('Headings font family', TEMP_NAME),
				'subtitle' => __('Choose headings font family', TEMP_NAME),
				'options'  => array(
					'verdana'           =>'Verdana', 
					'georgia'           =>'Georgia',
					'courier'           =>'Courier',
					'arial'             =>'Arial',
					'tahoma'            =>'Tahoma',
					'trebuchet'         =>'Trebuchet',
					'arial-black'       =>'Arial Black',
					'times-new-roman'   =>'Times New Roman',
					'palatino'          =>'Palatino',
					'lucida'            =>'Lucida',
					'ms-serif'          =>'Ms-serif',
					'lucida-console'    =>'Lucida-console',
					'comic'             =>'Comic',
					'open-sans'         =>'Open-sans',
					'caesar-dressing'   =>'Caesar-dressing',
					'cantata'           =>'Cantata',
					'roboto'            =>'Roboto',
					'arvo'              =>'Arvo',
					'vollkorn'          =>'Vollkorn',
					'ubuntu'            =>'Ubuntu',
					'old-standard-tt'   =>'Old standard tt',
					'droid-sans'        =>'Droid sans',
					'medula-one'        =>'Medula one',
					'oleo-script'       =>'Oleo script',
					'alice'             =>'Alice',
					'dosis'             =>'Dosis',
					'oswald'            =>'Oswald',
					'lato'              =>'Lato',
					'droid-serif'       =>'Droid-serif',
					'varela-round'      =>'Varela Round',
					'francois-one'      =>'Francois One',
					'pt-serif'          =>'PT Serif',
					'roboto-slab'       =>'Roboto Slab',
					'play'              =>'Play',
					'nunito'            =>'Nunito',
					'fjalla-one'        =>'Fjalla One',
					'libre-baskerville' =>'Libre Baskerville',
					'cuprum'            =>'Cuprum',
					'istok-web'         =>'Istok Web',
					'archivo-narrow'    =>'Archivo Narrow',
					'anton'             =>'Anton',
					'coming'            =>'Coming Soon',
					'cabin-condensed'   =>'Cabin Condensed'
				),
				'default'  => 'arial',
			),

			array(
				'id'       =>'gvc-h1-font-size',
				'type'     => 'select',
				'title'    => __('H1 font size', TEMP_NAME),
				'subtitle' => __('Choose H1 heading font size', TEMP_NAME),
				'options'  => array(
					'11'=>'11px', 
					'12'=>'12px', 
					'13'=>'13px', 
					'14'=>'14px', 
					'15'=>'15px',
					'16'=>'16px',
					'17'=>'17px',
					'18'=>'18px',
					'19'=>'19px',
					'20'=>'20px',
					'21'=>'21px',
					'22'=>'22px',
					'23'=>'23px',
					'24'=>'24px',
					'25'=>'25px',
					'26'=>'26px',
					'27'=>'27px',
					'28'=>'28px',
					'29'=>'29px',
					'30'=>'30px',
					'31'=>'31px',
					'32'=>'32px'
				),
				'default'  => '28',
			),

			array(
				'id'       =>'gvc-h1-line-height',
				'type'     => 'select',
				'title'    => __('H1 line height', TEMP_NAME),
				'subtitle' => __('Choose H1 heading line height', TEMP_NAME),
				'options'  => array(
					'11'=>'11px', 
					'12'=>'12px', 
					'13'=>'13px', 
					'14'=>'14px', 
					'15'=>'15px',
					'16'=>'16px',
					'17'=>'17px',
					'18'=>'18px',
					'19'=>'19px',
					'20'=>'20px',
					'21'=>'21px',
					'22'=>'22px',
					'23'=>'23px',
					'24'=>'24px',
					'25'=>'25px',
					'26'=>'26px',
					'27'=>'27px',
					'28'=>'28px',
					'29'=>'29px',
					'30'=>'30px',
					'31'=>'31px',
					'32'=>'32px',
					'33'=>'33px',
					'34'=>'34px',
					'35'=>'35px',
					'36'=>'36px',
					'37'=>'37px',
					'38'=>'38px',
					'39'=>'39px',
					'40'=>'40px'        
				),
				'default'  => '34',
			),

			array(
				'id'       =>'gvc-h2-font-size',
				'type'     => 'select',
				'title'    => __('H2 font size', TEMP_NAME),
				'subtitle' => __('Choose H2 heading font size', TEMP_NAME),
				'options'  => array(
					'11'=>'11px', 
					'12'=>'12px', 
					'13'=>'13px', 
					'14'=>'14px', 
					'15'=>'15px',
					'16'=>'16px',
					'17'=>'17px',
					'18'=>'18px',
					'19'=>'19px',
					'20'=>'20px',
					'21'=>'21px',
					'22'=>'22px',
					'23'=>'23px',
					'24'=>'24px',
					'25'=>'25px',
					'26'=>'26px',
					'27'=>'27px',
					'28'=>'28px',
					'29'=>'29px',
					'30'=>'30px',
					'31'=>'31px',
					'32'=>'32px'
				),
				'default'  => '26',
			),

			array(
				'id'       =>'gvc-h2-line-height',
				'type'     => 'select',
				'title'    => __('H2 line height', TEMP_NAME),
				'subtitle' => __('Choose H2 heading line height', TEMP_NAME),
				'options'  => array(
					'11'=>'11px', 
					'12'=>'12px', 
					'13'=>'13px', 
					'14'=>'14px', 
					'15'=>'15px',
					'16'=>'16px',
					'17'=>'17px',
					'18'=>'18px',
					'19'=>'19px',
					'20'=>'20px',
					'21'=>'21px',
					'22'=>'22px',
					'23'=>'23px',
					'24'=>'24px',
					'25'=>'25px',
					'26'=>'26px',
					'27'=>'27px',
					'28'=>'28px',
					'29'=>'29px',
					'30'=>'30px',
					'31'=>'31px',
					'32'=>'32px',
					'33'=>'33px',
					'34'=>'34px',
					'35'=>'35px',
					'36'=>'36px',
					'37'=>'37px',
					'38'=>'38px',
					'39'=>'39px',
					'40'=>'40px'        
				),
				'default'  => '32',
			),

			array(
				'id'       =>'gvc-h3-font-size',
				'type'     => 'select',
				'title'    => __('H3 font size', TEMP_NAME),
				'subtitle' => __('Choose H3 heading font size', TEMP_NAME),
				'options'  => array(
					'11'=>'11px', 
					'12'=>'12px', 
					'13'=>'13px', 
					'14'=>'14px', 
					'15'=>'15px',
					'16'=>'16px',
					'17'=>'17px',
					'18'=>'18px',
					'19'=>'19px',
					'20'=>'20px',
					'21'=>'21px',
					'22'=>'22px',
					'23'=>'23px',
					'24'=>'24px',
					'25'=>'25px',
					'26'=>'26px',
					'27'=>'27px',
					'28'=>'28px',
					'29'=>'29px',
					'30'=>'30px',
					'31'=>'31px',
					'32'=>'32px'
				),
				'default'  => '24',
			),

			array(
				'id'       =>'gvc-h3-line-height',
				'type'     => 'select',
				'title'    => __('H3 line height', TEMP_NAME),
				'subtitle' => __('Choose H3 heading line height', TEMP_NAME),
				'options'  => array(
					'11'=>'11px', 
					'12'=>'12px', 
					'13'=>'13px', 
					'14'=>'14px', 
					'15'=>'15px',
					'16'=>'16px',
					'17'=>'17px',
					'18'=>'18px',
					'19'=>'19px',
					'20'=>'20px',
					'21'=>'21px',
					'22'=>'22px',
					'23'=>'23px',
					'24'=>'24px',
					'25'=>'25px',
					'26'=>'26px',
					'27'=>'27px',
					'28'=>'28px',
					'29'=>'29px',
					'30'=>'30px',
					'31'=>'31px',
					'32'=>'32px',
					'33'=>'33px',
					'34'=>'34px',
					'35'=>'35px',
					'36'=>'36px',
					'37'=>'37px',
					'38'=>'38px',
					'39'=>'39px',
					'40'=>'40px'        
				),
				'default'  => '30',
			),

			array(
				'id'       =>'gvc-h4-font-size',
				'type'     => 'select',
				'title'    => __('H4 font size', TEMP_NAME),
				'subtitle' => __('Choose H4 heading font size', TEMP_NAME),
				'options'  => array(
					'11'=>'11px', 
					'12'=>'12px', 
					'13'=>'13px', 
					'14'=>'14px', 
					'15'=>'15px',
					'16'=>'16px',
					'17'=>'17px',
					'18'=>'18px',
					'19'=>'19px',
					'20'=>'20px',
					'21'=>'21px',
					'22'=>'22px',
					'23'=>'23px',
					'24'=>'24px',
					'25'=>'25px',
					'26'=>'26px',
					'27'=>'27px',
					'28'=>'28px',
					'29'=>'29px',
					'30'=>'30px',
					'31'=>'31px',
					'32'=>'32px'
				),
				'default'  => '22',
			),

			array(
				'id'       =>'gvc-h4-line-height',
				'type'     => 'select',
				'title'    => __('H4 line height', TEMP_NAME),
				'subtitle' => __('Choose H4 heading line height', TEMP_NAME),
				'options'  => array(
					'11'=>'11px', 
					'12'=>'12px', 
					'13'=>'13px', 
					'14'=>'14px', 
					'15'=>'15px',
					'16'=>'16px',
					'17'=>'17px',
					'18'=>'18px',
					'19'=>'19px',
					'20'=>'20px',
					'21'=>'21px',
					'22'=>'22px',
					'23'=>'23px',
					'24'=>'24px',
					'25'=>'25px',
					'26'=>'26px',
					'27'=>'27px',
					'28'=>'28px',
					'29'=>'29px',
					'30'=>'30px',
					'31'=>'31px',
					'32'=>'32px',
					'33'=>'33px',
					'34'=>'34px',
					'35'=>'35px',
					'36'=>'36px',
					'37'=>'37px',
					'38'=>'38px',
					'39'=>'39px',
					'40'=>'40px'        
				),
				'default'  => '28',
			),

			array(
				'id'       =>'gvc-h5-font-size',
				'type'     => 'select',
				'title'    => __('H5 font size', TEMP_NAME),
				'subtitle' => __('Choose H5 heading font size', TEMP_NAME),
				'options'  => array(
					'11'=>'11px', 
					'12'=>'12px', 
					'13'=>'13px', 
					'14'=>'14px', 
					'15'=>'15px',
					'16'=>'16px',
					'17'=>'17px',
					'18'=>'18px',
					'19'=>'19px',
					'20'=>'20px',
					'21'=>'21px',
					'22'=>'22px',
					'23'=>'23px',
					'24'=>'24px',
					'25'=>'25px',
					'26'=>'26px',
					'27'=>'27px',
					'28'=>'28px',
					'29'=>'29px',
					'30'=>'30px',
					'31'=>'31px',
					'32'=>'32px'
				),
				'default'  => '20',
			),

			array(
				'id'       =>'gvc-h5-line-height',
				'type'     => 'select',
				'title'    => __('H5 line height', TEMP_NAME),
				'subtitle' => __('Choose H5 heading line height', TEMP_NAME),
				'options'  => array(
					'11'=>'11px', 
					'12'=>'12px', 
					'13'=>'13px', 
					'14'=>'14px', 
					'15'=>'15px',
					'16'=>'16px',
					'17'=>'17px',
					'18'=>'18px',
					'19'=>'19px',
					'20'=>'20px',
					'21'=>'21px',
					'22'=>'22px',
					'23'=>'23px',
					'24'=>'24px',
					'25'=>'25px',
					'26'=>'26px',
					'27'=>'27px',
					'28'=>'28px',
					'29'=>'29px',
					'30'=>'30px',
					'31'=>'31px',
					'32'=>'32px',
					'33'=>'33px',
					'34'=>'34px',
					'35'=>'35px',
					'36'=>'36px',
					'37'=>'37px',
					'38'=>'38px',
					'39'=>'39px',
					'40'=>'40px'        
				),
				'default'  => '26',
			),

			array(
				'id'       =>'gvc-h6-font-size',
				'type'     => 'select',
				'title'    => __('H6 font size', TEMP_NAME),
				'subtitle' => __('Choose H6 heading font size', TEMP_NAME),
				'options'  => array(
					'11'=>'11px', 
					'12'=>'12px', 
					'13'=>'13px', 
					'14'=>'14px', 
					'15'=>'15px',
					'16'=>'16px',
					'17'=>'17px',
					'18'=>'18px',
					'19'=>'19px',
					'20'=>'20px',
					'21'=>'21px',
					'22'=>'22px',
					'23'=>'23px',
					'24'=>'24px',
					'25'=>'25px',
					'26'=>'26px',
					'27'=>'27px',
					'28'=>'28px',
					'29'=>'29px',
					'30'=>'30px',
					'31'=>'31px',
					'32'=>'32px'
				),
				'default'  => '18',
			),

			array(
				'id'       =>'gvc-h6-line-height',
				'type'     => 'select',
				'title'    => __('H6 line height', TEMP_NAME),
				'subtitle' => __('Choose H6 heading line height', TEMP_NAME),
				'options'  => array(
					'11'=>'11px', 
					'12'=>'12px', 
					'13'=>'13px', 
					'14'=>'14px', 
					'15'=>'15px',
					'16'=>'16px',
					'17'=>'17px',
					'18'=>'18px',
					'19'=>'19px',
					'20'=>'20px',
					'21'=>'21px',
					'22'=>'22px',
					'23'=>'23px',
					'24'=>'24px',
					'25'=>'25px',
					'26'=>'26px',
					'27'=>'27px',
					'28'=>'28px',
					'29'=>'29px',
					'30'=>'30px',
					'31'=>'31px',
					'32'=>'32px',
					'33'=>'33px',
					'34'=>'34px',
					'35'=>'35px',
					'36'=>'36px',
					'37'=>'37px',
					'38'=>'38px',
					'39'=>'39px',
					'40'=>'40px'        
				),
				'default'  => '24',
			),

			array(
				'id'       =>'gvc-button-font-family',
				'type'     => 'select',
				'title'    => __('Buttons font family', TEMP_NAME),
				'subtitle' => __('Set buttons font-family (refers to all buttons)', TEMP_NAME),
				'options'  => array(
					'verdana'           =>'Verdana', 
					'georgia'           =>'Georgia',
					'courier'           =>'Courier',
					'arial'             =>'Arial',
					'tahoma'            =>'Tahoma',
					'trebuchet'         =>'Trebuchet',
					'arial-black'       =>'Arial Black',
					'times-new-roman'   =>'Times New Roman',
					'palatino'          =>'Palatino',
					'lucida'            =>'Lucida',
					'ms-serif'          =>'Ms-serif',
					'lucida-console'    =>'Lucida-console',
					'comic'             =>'Comic',
					'open-sans'         =>'Open-sans',
					'caesar-dressing'   =>'Caesar-dressing',
					'cantata'           =>'Cantata',
					'roboto'            =>'Roboto',
					'arvo'              =>'Arvo',
					'vollkorn'          =>'Vollkorn',
					'ubuntu'            =>'Ubuntu',
					'old-standard-tt'   =>'Old standard tt',
					'droid-sans'        =>'Droid sans',
					'medula-one'        =>'Medula one',
					'oleo-script'       =>'Oleo script',
					'alice'             =>'Alice',
					'dosis'             =>'Dosis',
					'oswald'            =>'Oswald',
					'lato'              =>'Lato',
					'droid-serif'       =>'Droid-serif',
					'varela-round'      =>'Varela Round',
					'francois-one'      =>'Francois One',
					'pt-serif'          =>'PT Serif',
					'roboto-slab'       =>'Roboto Slab',
					'play'              =>'Play',
					'nunito'            =>'Nunito',
					'fjalla-one'        =>'Fjalla One',
					'libre-baskerville' =>'Libre Baskerville',
					'cuprum'            =>'Cuprum',
					'istok-web'         =>'Istok Web',
					'archivo-narrow'    =>'Archivo Narrow',
					'anton'             =>'Anton',
					'coming'            =>'Coming Soon',
					'cabin-condensed'   =>'Cabin Condensed'
				),
				'default'  => 'arial',
			),

			array(
				'id'       =>'gvc-buttons-font-weight',
				'type'     => 'select',
				'title'    => __('Buttons font weight', TEMP_NAME),
				'subtitle' => __('Choose buttons font-weight', TEMP_NAME),
				'options'  => array('normal'=>'normal','300'=>'light','600'=>'semibold', 'bold'=>'bold'),
				'default'  => 'normal',
			),

			array(
                'id'        => 'gvc-custom-fonts',
                'type'      => 'media',
                'title'     => __('Upload custom fonts', TEMP_NAME),
                'subtitle'  => __('Upload custom fonts here (eot, woff,truetype, svg formats)', TEMP_NAME),
                'compiler'  => 'true',
                'mode'      => false
            ),

            array(
	            'id'       => 'gvc-font-custom-css',
	            'type'     => 'ace_editor',
				'mode'     => 'css',
				'theme'    => 'monokai',
	            'title'    => __('Custom @font-face CSS Styles', TEMP_NAME), 
	            'subtitle' => __('Enter custom @font-face css code here. Step by step instruction of custom font @font-face definitions can be found in help file (Customization >> Typography options)', TEMP_NAME),
	        ),

		)
	);

// Social Settings
// ======================================================

	$sections[] = array(
		'title'      => __('Social', TEMP_NAME),
		'icon_class' => 'icon-large',
	    'icon'       => 'el-icon-group',
		'fields'     => array(

			array(
				'id'      =>'gvc-page-tweets',
				'type'    => 'switch', 
				'title'   => __('Page tweets', TEMP_NAME),
				'subtitle' => __('Toggle tweets carousel at the bottom of a page', TEMP_NAME),
				"default" => 0,
			),

			array(
				'id'      =>'gvc-page-tweets-consumer-key',
				'type'     => 'text',
				'title'    => __('Page tweets consumer key', TEMP_NAME),
				'default'  => ''
			),

			array(
				'id'      =>'gvc-page-tweets-consumer-secret',
				'type'     => 'text',
				'title'    => __('Page tweets consumer secret', TEMP_NAME),
				'subtitle' => __('Enter your consumer key here', TEMP_NAME),
				'default'  => ''
			),

			array(
				'id'      =>'gvc-page-tweets-access-token',
				'type'     => 'text',
				'title'    => __('Page tweets access token', TEMP_NAME),
				'subtitle' => __('Enter your access token here', TEMP_NAME),
				'default'  => ''
			),

			array(
				'id'      =>'gvc-page-tweets-access-token-secret',
				'type'     => 'text',
				'title'    => __('Page tweets access token secret', TEMP_NAME),
				'subtitle' => __('Enter your access token secret here', TEMP_NAME),
				'default'  => ''
			),

			array(
				'id'      =>'gvc-page-tweets-id',
				'type'     => 'text',
				'title'    => __('Page tweets twitter user ID', TEMP_NAME),
				'subtitle' => __('Enter twiter user ID here, (example: tutsplus)', TEMP_NAME),
				'default'  => ''
			),

			array(
				'id'       =>'gvc-page-tweets-number',
				'type'     => 'select',
				'title'    => __('Number of tweets to display', TEMP_NAME), 
				'options'  => array(
					'1'=>'1', 
					'2'=>'2', 
					'3'=>'3', 
					'4'=>'4', 
					'5'=>'5', 
					'6'=>'6', 
					'7'=>'7', 
					'8'=>'8', 
					'9'=>'9', 
					'10'=>'10'
				),
				'default'  => '3',
			),

			array(
				'id'      =>'gvc-social-rss',
				'type'     => 'text',
				'title'    => __('RSS Feed URL', TEMP_NAME),
				'validate' => 'url',
				'default'  => ''
			),

			array(
				'id'      =>'gvc-social-facebook',
				'type'     => 'text',
				'title'    => __('Facebook URL', TEMP_NAME),
				'validate' => 'url',
				'default'  => ''
			),

			array(
				'id'      =>'gvc-social-twitter',
				'type'     => 'text',
				'title'    => __('Twitter URL', TEMP_NAME),
				'validate' => 'url',
				'default'  => ''
			),

			array(
				'id'      =>'gvc-social-googleplus',
				'type'     => 'text',
				'title'    => __('Google Plus URL', TEMP_NAME),
				'validate' => 'url',
				'default'  => ''
			),

			array(
				'id'      =>'gvc-social-youtube',
				'type'     => 'text',
				'title'    => __('Yotube URL', TEMP_NAME),
				'validate' => 'url',
				'default'  => ''
			),

			array(
				'id'      =>'gvc-social-vimeo',
				'type'     => 'text',
				'title'    => __('Vimeo URL', TEMP_NAME),
				'validate' => 'url',
				'default'  => ''
			),

			array(
				'id'      =>'gvc-social-linkedin',
				'type'     => 'text',
				'title'    => __('LinkedIn URL', TEMP_NAME),
				'validate' => 'url',
				'default'  => ''
			),

			array(
				'id'      =>'gvc-social-pinterest',
				'type'     => 'text',
				'title'    => __('Pinterest URL', TEMP_NAME),
				'validate' => 'url',
				'default'  => ''
			),

			array(
				'id'      =>'gvc-social-flickr',
				'type'     => 'text',
				'title'    => __('Flickr URL', TEMP_NAME),
				'validate' => 'url',
				'default'  => ''
			),

			array(
				'id'      =>'gvc-social-instagram',
				'type'     => 'text',
				'title'    => __('Instagram URL', TEMP_NAME),
				'validate' => 'url',
				'default'  => ''
			),

			array(
				'id'      =>'gvc-social-apple',
				'type'     => 'text',
				'title'    => __('Apple URL', TEMP_NAME),
				'validate' => 'url',
				'default'  => ''
			),

			array(
				'id'      =>'gvc-social-tumblr',
				'type'     => 'text',
				'title'    => __('Tumblr URL', TEMP_NAME),
				'validate' => 'url',
				'default'  => ''
			),

			array(
				'id'      =>'gvc-social-dribbble',
				'type'     => 'text',
				'title'    => __('Dribbble URL', TEMP_NAME),
				'validate' => 'url',
				'default'  => ''
			),

			array(
				'id'      =>'gvc-social-android',
				'type'     => 'text',
				'title'    => __('Android URL', TEMP_NAME),
				'validate' => 'url',
				'default'  => ''
			),

			array(
				'id'      =>'gvc-social-email',
				'type'     => 'text',
				'title'    => __('Email', TEMP_NAME),
				'default'  => ''
			),

		)
	);

// Blog Settings
// ======================================================

	$sections[] = array(
		'title'      => __('Blog', TEMP_NAME),
		'icon_class' => 'icon-large',
	    'icon'       => 'el-icon-pencil',
		'fields' => array(
			
			array(
				'id'       =>'gvc-blog-layout',
				'type'     => 'select',
				'title'    => __('Choose blog layout', TEMP_NAME), 
				'options'  => array(
					'small'  => 'small', 
					'medium' => 'medium', 
					'large'  => 'large',
					'full'   => 'full'
				),
				'default'  => 'medium'
			),

			array(
				'id'       =>'gvc-blog-excerpt-length',
				'type'     => 'text',
				'title'    => __('Enter blog excerpt length here', TEMP_NAME),
				'default'  => 285,
			),

			array(
				'id'      =>'gvc-blog-main-widget-area',
				'type'    =>'switch', 
				'title'   => __('Blog widget area', TEMP_NAME),
				'subtitle' => __('Toggle blog widget area in blog archive', TEMP_NAME),
				"default" => 0,
			),

			array(
				'id'      =>'gvc-blog-single-main-widget-area',
				'type'    =>'switch', 
				'title'   => __('Blog widget area (single post page)', TEMP_NAME),
				'subtitle' => __('Toggle blog widget area in blog single post page', TEMP_NAME),
				"default" => 0,
			),

			array(
				'id'      =>'gvc-blog-author',
				'type'    =>'switch', 
				'title'   => __('Author box', TEMP_NAME),
				'subtitle' => __('Toggle author information box on single post page (after post, there is a Author Information Box)', TEMP_NAME),
				"default" => 1,
			),

			array(
				'id'      =>'gvc-blog-comments',
				'type'    =>'switch', 
				'title'   => __('Comment box', TEMP_NAME),
				'subtitle' => __('Toggle comments on single post page (after post, there is a "Leave a comment" section)', TEMP_NAME),
				"default" => 1,
			),

			array(
				'id'      =>'gvc-blog-social-share',
				'type'    =>'switch', 
				'title'   => __('Social sharing', TEMP_NAME),
				'subtitle' => __('Toggle social sharing on single post page', TEMP_NAME),
				"default" => 1,
			)

		)
	);

// Portfolio Settings
// ======================================================

	$sections[] = array(
		'title'      => __('Portfolio', TEMP_NAME),
		'icon_class' => 'icon-large',
	    'icon'       => 'el-icon-folder-close',
		'fields' => array(
		
			array(
				'id'	=>'gvc-portfolio-yes',
				'type'	=>'switch',
				'title'   => __('Turn on Portfolio', TEMP_NAME),
				'subtitle' => __('Toggle Portfolio. If turned ON, you will be able to add a portfolio to your website.', TEMP_NAME),
				"default" => 0,
				),

			array(
				'id'      =>'gvc-portfolio-title',
				'type'     => 'text',
				'title'    => __('Portfolio title', TEMP_NAME),
				'subtitle' => __('Enter portfolio title here', TEMP_NAME),
				'default'  => 'Portfolio'
			),
			
			array(
				'id'       =>'gvc-portfolio-layout',
				'type'     => 'select',
				'title'    => __('Choose portfolio layout', TEMP_NAME), 
				'options'  => array(
					'small'  => 'small', 
					'medium' => 'medium', 
					'large'  => 'large',
					'full'   => 'full',
					'image-grid-small'   => 'image-grid-small', 
					'image-grid-medium'  => 'image-grid-medium', 
					'image-grid-large'   => 'image-grid-large',
					'no-gap-grid'        => 'no-gap-grid'
				),
				'default'  => 'medium'
			),

			array(
				'id'      =>'gvc-portfolio-solo-layout',
				'type'    =>'switch', 
				'title'   => __('Project solo layout', TEMP_NAME),
				'subtitle' => __('Toggle project solo layout. If turned ON, you can build custom layout with shortcodes for each project', TEMP_NAME),
				"default" => 0,
			),

			array(
				'id'      =>'gvc-portfolio-widget-area',
				'type'    =>'switch', 
				'title'   => __('Portfolio widget area', TEMP_NAME),
				'subtitle' => __('Toggle portfolio widget area', TEMP_NAME),
				"default" => 0,
			),

			array(
				'id'      =>'gvc-portfolio-pagination',
				'type'    =>'switch', 
				'title'   => __('Portfolio pagination', TEMP_NAME),
				"default" => 1,
			),

			array(
				'id'      =>'gvc-portfolio-comments',
				'type'    =>'switch', 
				'title'   => __('Comment box', TEMP_NAME),
				'subtitle' => __('Toggle comments on single project page (after project, there is a "Leave a comment" section)', TEMP_NAME),
				"default" => 1,
			),

			array(
				'id'      =>'gvc-portfolio-social-share',
				'type'    =>'switch', 
				'title'   => __('Social sharing', TEMP_NAME),
				'subtitle' => __('Toggle social sharing on single project page', TEMP_NAME),
				"default" => 1
			),

		)
	);

// WooCommerce Settings
// ======================================================

/*	$sections[] = array(
		'title'      => __('WooCommerce', TEMP_NAME),
		'icon_class' => 'icon-large',
	    'icon'       => 'el-icon-shopping-cart',
	    'desc'       => 'Options are available only if WooCommerce plugin is installed and activated',
		'fields' => array(

			array(
				'id'      =>'gvc-shop-rich-header',
				'type'    => 'switch', 
				'title'   => __('Rich header in shop', TEMP_NAME),
				'subtitle'=> __('Toggle rich header in shop', TEMP_NAME),
				"default" => 0,
			),

			array(
				'id'      =>'gvc-shop-gvc-slider',
				'type'    => 'switch', 
				'title'   => __('gvc slider in shop', TEMP_NAME),
				'subtitle'=> __('Toggle gvc slider in shop', TEMP_NAME),
				"default" => 0,
			),

			array(
				'id'       =>'gvc-shop-title',
				'type'     => 'text',
				'title'    => __('Title', TEMP_NAME), 
				'subtitle' => __('Enter shop title here', TEMP_NAME)
			),

			array(
				'id'       =>'gvc-shop-subtitle',
				'type'     => 'text',
				'title'    => __('Subtitle', TEMP_NAME), 
				'subtitle' => __('Enter shop subtitle here', TEMP_NAME)
			),

			array(
				'id'       =>'gvc-shop-title-background-color',
				'type'     => 'color',
				'title'    => __('Shop page title background color', TEMP_NAME), 
				'validate' => 'color',
				'default'  => '#000000',
			),

			array(
				'id'       =>'gvc-shop-title-background-color-opacity',
				'type'     => 'select',
				'title'    => __('Shop page title background color opacity', TEMP_NAME),
				'options'  => array(
					'1'    =>'100%',
					'0.95' =>'95%',
					'0.9'  =>'90%',
					'0.85' =>'85%',
					'0.8'  =>'80%',
					'0.75' =>'75%',
					'0.7'  =>'70%',
					'0.65' =>'65%',
					'0.6'  =>'60%', 
					'0.55' =>'55%', 
					'0.5'  =>'50%', 
					'0.45' =>'45%', 
					'0.4'  =>'40%', 
					'0.35' =>'35%', 
					'0.3'  =>'30%', 
					'0.25' =>'25%', 
					'0.2'  =>'20%', 
					'0.15' =>'15%', 
					'0.1'  =>'10%'
				),
				'default'  => '0.6',
			),

			
			array(
				'id'       =>'gvc-shop-title-text-color',
				'type'     => 'color',
				'title'    => __('Shop page title text color', TEMP_NAME), 
				'validate' => 'color',
				'default'  => '#ffffff',
			),

			array(
				'id'       =>'gvc-shop-subtitle-background-color',
				'type'     => 'color',
				'title'    => __('Shop page subtitle background color', TEMP_NAME), 
				'validate' => 'color',
				'default'  => '#f34a53',
			),

			array(
				'id'       =>'gvc-shop-subtitle-background-color-opacity',
				'type'     => 'select',
				'title'    => __('Shop page subtitle background color opacity', TEMP_NAME),
				'options'  => array(
					'1'    =>'100%',
					'0.95' =>'95%',
					'0.9'  =>'90%',
					'0.85' =>'85%',
					'0.8'  =>'80%',
					'0.75' =>'75%',
					'0.7'  =>'70%',
					'0.65' =>'65%',
					'0.6'  =>'60%', 
					'0.55' =>'55%', 
					'0.5'  =>'50%', 
					'0.45' =>'45%', 
					'0.4'  =>'40%', 
					'0.35' =>'35%', 
					'0.3'  =>'30%', 
					'0.25' =>'25%', 
					'0.2'  =>'20%', 
					'0.15' =>'15%', 
					'0.1'  =>'10%'
				),
				'default'  => '0.95',
			),

			array(
				'id'       =>'gvc-shop-subtitle-text-color',
				'type'     => 'color',
				'title'    => __('Shop page subtitle text color', TEMP_NAME), 
				'validate' => 'color',
				'default'  => '#ffffff',
			),

			array(
				'id'       =>'gvc-shop-header-background-color',
				'type'     => 'color',
				'title'    => __('Shop page header section background color', TEMP_NAME), 
				'validate' => 'color',
				'default'  => '#f6f6f6',
			),

			array(
				'id'       =>'gvc-shop-header-background-image',
				'type'     => 'media', 
				'url'      => false,
				'title'    => __('Shop page header section background image upload', TEMP_NAME),
				'subtitle' => __('Upload .jpg, .png or .gif image that will be shop page header section background image', TEMP_NAME)
			),

			array(
				'id'       =>'gvc-shop-header-background-image-repeat',
				'type'     => 'select',
				'title'    => __('Shop page header section background image repeat', TEMP_NAME), 
				'subtitle' => __('Repeat background image horizontally, vertically, both horizontally and vertically or no repeat', TEMP_NAME),
				'options'  => array('repeat'=>'repeat', 'repeat-x'=>'repeat-x', 'repeat-y'=>'repeat-y', 'no-repeat'=>'no-repeat'),
				'default'  => 'no-repeat',
			),

			array(
				'id'       =>'gvc-shop-header-background-image-position',
				'type'     => 'select',
				'title'    => __('Shop page header section background image position', TEMP_NAME),
				'subtitle' => __('Position your background image', TEMP_NAME),
				'options'  => array('left_top'=>'left top', 'left_bottom'=>'left bottom', 'right_top'=>'right top', 'right_bottom'=>'right bottom', 'center_center'=>'center center', 'center_top'=>'center top','center_bottom'=>'center bottom'),
				'default'  => 'left_top',
			),

			array(
				'id'       =>'gvc-shop-header-background-image-attachment',
				'type'     => 'radio',
				'title'    => __('Shop page header section background image attachment', TEMP_NAME),
				'subtitle' => __('Choose fixed or scroll for your background image', TEMP_NAME),
				'options'  => array('scroll' => 'scroll', 'fixed' => 'fixed'),
				'default'  => 'scroll'
			),

			array(
				'id'       =>'gvc-shop-header-background-image-size',
				'type'     => 'radio',
				'title'    => __('Shop page header section background image size', TEMP_NAME),
				'subtitle' => __('Choose cover or auto for your background image size', TEMP_NAME),
				'options'  => array('auto' => 'auto', 'cover' => 'cover'),
				'default'  => 'auto'
			),

			array(
				'id'      =>'gvc-shop-header-parallax',
				'type'    => 'switch', 
				'title'   => __('Parallax effect for shop page header section background image', TEMP_NAME),
				"default" => 0,
			),

			array(
				'id'       =>'gvc-shop-gvc-sidebar',
				'type'     => 'select',
				'title'    => __('Shop sidebar', TEMP_NAME),
				'subtitle' => __('Select sidebar for shop', TEMP_NAME),
				'options'  => array(
					'none'  =>'None', 
					'left'  =>'Left', 
					'right' =>'Right' 
				),
				'default'  => 'none',
			),

			array(
				'id'       =>'gvc-shop-gvc-layout',
				'type'     => 'select',
				'title'    => __('Choose shop layout', TEMP_NAME), 
				'options'  => array(
					'small'  => 'small', 
					'medium' => 'medium'
				),
				'default'  => 'medium'
			),

			array(
				'id'      =>'gvc-shop-cart',
				'type'    => 'switch', 
				'title'   => __('Toogle cart in header section', TEMP_NAME),
				"default" => 1,
			),

			array(
				'id'       =>'gvc-shop-cart-text-color',
				'type'     => 'color',
				'title'    => __('Header shopping cart text color', TEMP_NAME),
				'subtitle' => __('Pick a text color for the header shopping cart', TEMP_NAME),
				'validate' => 'color',
				'default'  => '#333333',
			),

			array(
				'id'       =>'gvc-shop-cart-background-color',
				'type'     => 'color',
				'title'    => __('Header shopping cart background color', TEMP_NAME),
				'subtitle' => __('Pick a background color for the header shopping cart', TEMP_NAME),
				'validate' => 'color',
				'default'  => ''
			),

			array(
				'id'      =>'gvc-shop-related-products',
				'type'    => 'switch', 
				'title'   => __('Toggle related products in single product page', TEMP_NAME),
				"default" => 1,
			),

			array(
				'id'       =>'gvc-shop-related-products-number',
				'type'     => 'select',
				'title'    => __('Single product related products number', TEMP_NAME),
				'options'  => array(
					'3' =>'3',
					'4' =>'4'
				),
				'default'  => '4',
			),

			array(
				'id'       =>'gvc-shop-shortcode-area',
				'type'     => 'editor',
				'title'    => __('Shop loop content area', TEMP_NAME),
				'subtitle' => __('Add shortcodes, content, images to Shop (Category and Tags pages included). After product list you have area, where you can add any content, shortcode you wish', TEMP_NAME),
				'editor_options'    => array(
			        'media_buttons' => true
			    )
			),

			array(
				'id'       =>'gvc-shop-single-shortcode-area',
				'type'     => 'editor',
				'title'    => __('Shop single product content area', TEMP_NAME),
				'subtitle' => __('Add shortcodes, content, images to Shop single product page. After product summary you have area, where you can add any content, shortcode you wish', TEMP_NAME),
				'editor_options'    => array(
			        'media_buttons' => true
			    )
			)

		)
	);*/
		
if (function_exists('wp_get_theme')){
	$theme_data = wp_get_theme();
	$theme_uri = $theme_data->get('ThemeURI');
	$description = $theme_data->get('Description');
	$author = $theme_data->get('Author');
	$version = $theme_data->get('Version');
	$tags = $theme_data->get('Tags');
}else{
	$theme_data = wp_get_theme(trailingslashit(get_stylesheet_directory()).'style.css');
	$theme_uri = $theme_data['URI'];
	$description = $theme_data['Description'];
	$author = $theme_data['Author'];
	$version = $theme_data['Version'];
	$tags = $theme_data['Tags'];
}	

$theme_info = '<div class="redux-framework-section-desc">';
$theme_info .= '<p class="redux-framework-theme-data description theme-uri"><strong>'.__('Theme URL: ', TEMP_NAME).'</strong><a href="'.$theme_uri.'" target="_blank">'.$theme_uri.'</a></p>';
$theme_info .= '<p class="redux-framework-theme-data description theme-author"><strong>'.__('Author: ', TEMP_NAME).'</strong>'.$author.'</p>';
$theme_info .= '<p class="redux-framework-theme-data description theme-version"><strong>'.__('Version: ', TEMP_NAME).'</strong>'.$version.'</p>';
$theme_info .= '<p class="redux-framework-theme-data description theme-description">'.$description.'</p>';
if ( !empty( $tags ) ) {
	$theme_info .= '<p class="redux-framework-theme-data description theme-tags"><strong>'.__('Tags: ', TEMP_NAME).'</strong>'.implode(', ', $tags).'</p>';	
}
$theme_info .= '</div>';

$sections[] = array(
	'icon' => 'el-icon-info-sign',
	'title' => __('Theme Information', TEMP_NAME),
	'fields' => array(
		array(
			'id'=>'raw_new_info',
			'type' => 'raw',
			'content' => $item_info
		)
	),   
);

global $ReduxFramework;
$ReduxFramework = new ReduxFramework($sections, $args, $tabs);



