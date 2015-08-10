<?php
global $gvc;
$gvc_portfolio_yes         = ($gvc['gvc-portfolio-yes']) ? $gvc['gvc-portfolio-yes'] : 0;

if ( $gvc_portfolio_yes == 1 ):
	
	function gvc_portfolio() {

	  $labels = array(
		'name'               => __('Portfolio', TEMP_NAME),
		'singular_name'      => __('Portfolio', TEMP_NAME),
		'add_new'            => __('Add new', TEMP_NAME),
		'add_new_item'       => __('Add new project', TEMP_NAME),
		'edit_item'          => __('Edit project', TEMP_NAME),
		'new_item'           => __('New project', TEMP_NAME),
		'all_items'          => __('All projects', TEMP_NAME),
		'view_item'          => __('View project', TEMP_NAME),
		'search_items'       => __('Search projects', TEMP_NAME),
		'not_found'          => __('No projects found', TEMP_NAME),
		'not_found_in_trash' => __('No projects found in trash', TEMP_NAME), 
		'parent_item_colon'  => '',
		'menu_name'          => __('Portfolio', TEMP_NAME)
	  );

	  $args = array(
	    'labels'             => $labels,
	    'public'             => true,
	    'publicly_queryable' => true,
	    'show_ui'            => true, 
	    'show_in_menu'       => true, 
	    'query_var'          => true,
	    'rewrite'            => array( 'slug' => 'portfolio' ),
	    'capability_type'    => 'post',
	    'has_archive'        => true, 
	    'hierarchical'       => false,
	    'menu_position'      => null,
	    'menu_icon'          => '',
	    'supports'           => array( 'title', 'editor', 'thumbnail', 'comments', 'excerpt'),
	  ); 

	  register_post_type( 'portfolio', $args );

	}

	add_action( 'init', 'gvc_portfolio' );

	function portfolio_taxonomies() {

		register_taxonomy('portfolio-category', 'portfolio', array(
			'hierarchical' => true,
			'labels' => array(
				'name' 				=> __( 'Portfolio category', TEMP_NAME ),
				'singular_name' 	=> __( 'Portfolio category', TEMP_NAME ),
				'search_items' 		=> __( 'Search portfolio category', TEMP_NAME ),
				'all_items' 		=> __( 'All portfolio categories', TEMP_NAME ),
				'parent_item' 		=> __( 'Parent portfolio category', TEMP_NAME ),
				'parent_item_colon' => __( 'Parent portfolio category', TEMP_NAME ),
				'edit_item' 		=> __( 'Edit portfolio category', TEMP_NAME ),
				'update_item' 		=> __( 'Update portfolio category', TEMP_NAME ),
				'add_new_item' 		=> __( 'Add new portfolio category', TEMP_NAME ),
				'new_item_name' 	=> __( 'New portfolio category', TEMP_NAME ),
				'menu_name' 		=> __( 'Portfolio categories', TEMP_NAME ),
			),
			'rewrite' => array(
				'slug' 		   => 'portfolio-category',
				'with_front'   => true,
				'hierarchical' => true
			),
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_admin_column' => true
		));

		register_taxonomy('portfolio-tag', 'portfolio', array(
			'hierarchical' => false,
			'labels' => array(
				'name' 				=> __( 'Portfolio tags', TEMP_NAME ),
				'singular_name' 	=> __( 'Portfolio tag', TEMP_NAME ),
				'search_items' 		=> __( 'Search portfolio tags', TEMP_NAME ),
				'all_items' 		=> __( 'All portfolio tags', TEMP_NAME ),
				'parent_item' 		=> __( 'Parent portfolio tags', TEMP_NAME ),
				'parent_item_colon' => __( 'Parent portfolio tag:', TEMP_NAME ),
				'edit_item' 		=> __( 'Edit portfolio tag', TEMP_NAME ),
				'update_item' 		=> __( 'Update portfolio tag', TEMP_NAME ),
				'add_new_item'	    => __( 'Add new portfolio tag', TEMP_NAME ),
				'new_item_name' 	=> __( 'New portfolio tag', TEMP_NAME ),
				'menu_name' 		=> __( 'Portfolio tags', TEMP_NAME ),
			),
			'rewrite' 		   => array(
				'slug' 		   => 'portfolio-tag',
				'with_front'   => true,
				'hierarchical' => false
			),
		));

	}
	add_action( 'init', 'portfolio_taxonomies', 0 );


	add_action("admin_init", "gvc_add_portfolio_meta_box");
	function gvc_add_portfolio_meta_box(){

		add_meta_box(
	        "gvc-portfolio-format-options", 
	        __("Format", TEMP_NAME),
	        "render_gvc_portfolio_format_options", 
	        "portfolio",
	        "normal", 
	        "high"
	    );

		add_meta_box(
	        "gvc-portfolio-details-options", 
	        __("Project details ", TEMP_NAME),
	        "render_gvc_portfolio_details_options", 
	        "portfolio",
	        "normal", 
	        "high"
	    );

	    add_meta_box(
	        "gvc-portfolio-media-options", 
	        __("Project media", TEMP_NAME),
	        "render_gvc_portfolio_media_options", 
	        "portfolio",
	        "normal", 
	        "high"
	    );

	}

	function render_gvc_portfolio_details_options($post) {

		$values                         = get_post_custom( $post->ID );
	    $gvc_portfolio_client               = isset( $values['gvc_portfolio_client'] ) ? esc_attr( $values["gvc_portfolio_client"][0] ) : "";
	    $gvc_portfolio_project_link         = isset( $values['gvc_portfolio_project_link'] ) ? esc_url( $values["gvc_portfolio_project_link"][0] ) : "";

?>
        <div>
            <label for="gvc_portfolio_client"><?php echo __('Enter  client name here:', TEMP_NAME); ?></label>
            <input name="gvc_portfolio_client" id="portfolio-client" type="text" value="<?php echo $gvc_portfolio_client;?>"/>
        </div>
        <div>
            <label for="gvc_portfolio_project_link"><?php echo __('Enter project URL here:', TEMP_NAME); ?></label>
            <input name="gvc_portfolio_project_link" id="portfolio-project-link" type="text" value="<?php echo $gvc_portfolio_project_link;?>"/>
        </div>

<?php

	}

	function render_gvc_portfolio_media_options($post) {

		$values                          = get_post_custom( $post->ID );
		$gvc_portfolio_featured_media = isset( $values['gvc_portfolio_featured_media'] ) ? esc_attr( $values["gvc_portfolio_featured_media"][0] ) : "yes";
	    $gvc_portfolio_audio_mp3      = isset( $values['gvc_portfolio_audio_mp3'] ) ? esc_url( $values["gvc_portfolio_audio_mp3"][0] ) : "";
	    $gvc_portfolio_audio_ogg      = isset( $values['gvc_portfolio_audio_ogg'] ) ? esc_url( $values["gvc_portfolio_audio_ogg"][0] ) : "";
	    $gvc_portfolio_audio_embed    = isset( $values['gvc_portfolio_audio_embed'] ) ? esc_attr( $values["gvc_portfolio_audio_embed"][0] ) : "";
	    $gvc_portfolio_video_mp4      = isset( $values['gvc_portfolio_video_mp4'] ) ? esc_url( $values["gvc_portfolio_video_mp4"][0] ) : "";
	    $gvc_portfolio_video_ogv  	 = isset( $values['gvc_portfolio_video_ogv'] ) ? esc_url( $values["gvc_portfolio_video_ogv"][0] ) : "";
	    $gvc_portfolio_video_webm     = isset( $values['gvc_portfolio_video_webm'] ) ? esc_url( $values["gvc_portfolio_video_webm"][0] ) : "";
	    $gvc_portfolio_video_embed    = isset( $values['gvc_portfolio_video_embed'] ) ? esc_attr( $values["gvc_portfolio_video_embed"][0] ) : "";
	    $gvc_portfolio_video_poster   = isset( $values['gvc_portfolio_video_poster'] ) ? esc_attr( $values["gvc_portfolio_video_poster"][0] ) : "";

	    wp_nonce_field( 'gvc_portfolio_meta_nonce', 'gvc_portfolio_meta_nonce' );
?>	
		<div class="portfolio-featured-media-wrap">
			<label for="portfolio-featured-media">
	            <input type="checkbox" id="portfolio-featured-media" name="gvc_portfolio_featured_media" value="no" <?php checked( $gvc_portfolio_featured_media, "no" ); ?> />
	            <?php echo __(' - Disable Featured Media in this project (Featured Image / Featured Gallery / Featured Video / Featured Audio)', TEMP_NAME); ?>
	        </label>
		</div>

		<div id="gvc-portfolio-featured-image" class="gvc-portfolio-option">
			<?php echo __("Set featured image at the right sidebar, like regular posts' featured image", TEMP_NAME); ?>
		</div>

		<div id="gvc-portfolio-featured-audio" class="gvc-portfolio-option">
	        <h4><?php echo __("Audio options", TEMP_NAME); ?></h4>
	        <div>
	            <label for="gvc_portfolio_audio_mp3"><?php echo __('Enter  MP3 audio file link here:', TEMP_NAME); ?></label>
	            <input name="gvc_portfolio_audio_mp3" id="portfolio-audio-mp3" type="text" value="<?php echo $gvc_portfolio_audio_mp3;?>"/>
	        </div>
	        <div>
	            <label for="gvc_portfolio_audio_embed"><?php echo __('Enter  OGG audio file link here:', TEMP_NAME); ?></label>
	            <input name="gvc_portfolio_audio_embed" id="portfolio-audio-ogg" type="text" value="<?php echo $gvc_portfolio_audio_ogg;?>"/>
	        </div>
	        <div>
	            <label for="gvc_portfolio_audio_embed"><?php echo __('Embed audio here:', TEMP_NAME); ?></label>
	            <textarea name="gvc_portfolio_audio_embed" id="portfolio-audio-embed"><?php echo $gvc_portfolio_audio_embed;?></textarea>
	        </div>
	    </div>

	    <div id="gvc-portfolio-featured-video" class="gvc-portfolio-option">
	        <h4><?php echo __("Video options", TEMP_NAME); ?></h4>
	        <div>
	            <label for="gvc_portfolio_video_mp4"><?php echo __('Enter  MP4 video file link here:', TEMP_NAME); ?></label>
	            <input name="gvc_portfolio_video_mp4" id="portfolio-video-mp3" type="text" value="<?php echo $gvc_portfolio_video_mp4;?>"/>
	        </div>
	        <div>
	            <label for="gvc_portfolio_video_ogv"><?php echo __('Enter  OGV video file link here:', TEMP_NAME); ?></label>
	            <input name="gvc_portfolio_video_ogv" id="portfolio-video-ogv" type="text" value="<?php echo $gvc_portfolio_video_ogv;?>"/>
	        </div>
	        <div>
	            <label for="gvc_portfolio_video_webm"><?php echo __('Enter  WEBM video file link here:', TEMP_NAME); ?></label>
	            <input name="gvc_portfolio_video_webm" id="portfolio-video-webm" type="text" value="<?php echo $gvc_portfolio_video_webm;?>"/>
	        </div>
	        <br>
	        <div>
	            <div class="gvc-upload">
	                <input name="gvc_portfolio_video_poster" id="portfolio-video-poster" type="hidden" class="gvc-upload-path" value="<?php echo $gvc_portfolio_video_poster;?>"/> 
	                <input class="gvc-button-upload button" type="button" value="<?php echo __('Upload video poster image', TEMP_NAME) ?>" />
	                <input class="gvc-button-remove button" type="button" value="<?php echo __('Remove video poster image', TEMP_NAME) ?>" />
	                <br>
	                <img src='<?php echo $gvc_portfolio_video_poster; ?>' class='gvc-preview-upload'/>
	            </div>
	        </div>
	        <div>
	            <label for="gvc_portfolio_video_embed"><?php echo __('Embed video here:', TEMP_NAME); ?></label>
	            <textarea name="gvc_portfolio_video_embed" id="portfolio-video-embed"><?php echo $gvc_portfolio_video_embed;?></textarea>
	        </div>
	    </div>

	    <div id="gvc-portfolio-featured-gallery" class="gvc-portfolio-option">
	        <h4><?php echo __("Gallery options", TEMP_NAME); ?></h4>
        	<div><?php echo __('Use 2nd/3rd ... Featured Images (in the right sidebar, right after main featured image) to upload images for the project gallery', TEMP_NAME); ?></div>
	    </div>

<?php 

	}

	function render_gvc_portfolio_format_options($post) {

		$values                  = get_post_custom( $post->ID );
	    $gvc_portfolio_format = isset( $values['gvc_portfolio_format'] ) ? esc_attr( $values["gvc_portfolio_format"][0] ) : "";

?>
		<div class="select-featured-media-type">
			<fieldset class="gvc-clearfix">
				<div id="p-image" class="featured-media-type-option">
	            	<input type="radio" id="portfolio-featured-image" name="gvc_portfolio_format" class="portfolio-featured-media-option" value="image" checked <?php checked( $gvc_portfolio_format, "image" ); ?> />
					<label for="gvc_portfolio_format"><?php echo __("Image", TEMP_NAME); ?></label>
				</div>
				<div id="p-gallery" class="featured-media-type-option">
	           		<input type="radio" id="portfolio-featured-gallery" name="gvc_portfolio_format" class="portfolio-featured-media-option" value="gallery" <?php checked( $gvc_portfolio_format, "gallery" ); ?> /> 
					<label for="gvc_portfolio_format"><?php echo __("Gallery", TEMP_NAME); ?></label>
				</div>
	            <div id="p-video" class="featured-media-type-option">
	            	<input type="radio" id="portfolio-featured-video" name="gvc_portfolio_format" class="portfolio-featured-media-option" value="video" <?php checked( $gvc_portfolio_format, "video" ); ?> /> 
	            	<label for="gvc_portfolio_format"><?php echo __("Video", TEMP_NAME); ?></label>
	            </div>
	            <div id="p-audio" class="featured-media-type-option">
	            	<input type="radio" id="portfolio-featured-audio" name="gvc_portfolio_format" class="portfolio-featured-media-option" value="audio" <?php checked( $gvc_portfolio_format, "audio" ); ?> /> 
	            	<label for="gvc_portfolio_format"><?php echo __("Audio", TEMP_NAME); ?></label>
	            </div>  
		    </fieldset>
		</div>

<?php

	}

	add_action( 'save_post', 'save_gvc_portfolio_options' );  
	function save_gvc_portfolio_options( $post_id )  
	{  
	    
	    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
	    if( !isset( $_POST['gvc_portfolio_meta_nonce'] ) || !wp_verify_nonce( $_POST['gvc_portfolio_meta_nonce'], 'gvc_portfolio_meta_nonce' ) ) return;  
	    if( !current_user_can( 'edit_post' ) ) return;

	    if( isset( $_POST['gvc_portfolio_format'] ) ){update_post_meta($post_id, "gvc_portfolio_format",$_POST["gvc_portfolio_format"]);}
	    if( isset( $_POST['gvc_portfolio_audio_mp3'] ) ){update_post_meta($post_id, "gvc_portfolio_audio_mp3",$_POST["gvc_portfolio_audio_mp3"]);}
	    if( isset( $_POST['gvc_portfolio_audio_ogg'] ) ){update_post_meta($post_id, "gvc_portfolio_audio_ogg",$_POST["gvc_portfolio_audio_ogg"]);}
	    if( isset( $_POST['gvc_portfolio_audio_embed'] ) ){update_post_meta($post_id, "gvc_portfolio_audio_embed",$_POST["gvc_portfolio_audio_embed"]);}
	    if( isset( $_POST['gvc_portfolio_video_mp4'] ) ){update_post_meta($post_id, "gvc_portfolio_video_mp4",$_POST["gvc_portfolio_video_mp4"]);}
	    if( isset( $_POST['gvc_portfolio_video_ogv'] ) ){update_post_meta($post_id, "gvc_portfolio_video_ogv",$_POST["gvc_portfolio_video_ogv"]);}
	    if( isset( $_POST['gvc_portfolio_video_webm'] ) ){update_post_meta($post_id, "gvc_portfolio_video_webm",$_POST["gvc_portfolio_video_webm"]);}
	    if( isset( $_POST['gvc_portfolio_video_embed'] ) ){update_post_meta($post_id, "gvc_portfolio_video_embed",$_POST["gvc_portfolio_video_embed"]);}
	    if( isset( $_POST['gvc_portfolio_video_poster'] ) ){update_post_meta($post_id, "gvc_portfolio_video_poster",$_POST["gvc_portfolio_video_poster"]);}

	    if( isset( $_POST['gvc_portfolio_client'] ) ){update_post_meta($post_id, "gvc_portfolio_client",$_POST["gvc_portfolio_client"]);}
	    if( isset( $_POST['gvc_portfolio_project_link'] ) ){update_post_meta($post_id, "gvc_portfolio_project_link",$_POST["gvc_portfolio_project_link"]);}

    	$gvc_portfolio_featured_media_checked = ( isset( $_POST['gvc_portfolio_featured_media'] ) ) ? "no" : "yes";
        update_post_meta($post_id, "gvc_portfolio_featured_media", $gvc_portfolio_featured_media_checked);

	}

/*====================================================================*/
/*	PORTFOLIO ADMIN COLUMNS
/*====================================================================*/
	
	add_filter("manage_edit-portfolio_columns", "portfolio_edit_columns");

	function portfolio_edit_columns($columns){


		$columns['cb']             = "<input type=\"checkbox\" />";
		$columns['title']          = __("Project title", TEMP_NAME);
		$columns['format']         = __("Format", TEMP_NAME);
		$columns['category']       = __("Category", TEMP_NAME);
		$columns['portfolio-tags'] = __("Tags", TEMP_NAME);

		return $columns;
	}

	add_action("manage_portfolio_posts_custom_column", "portfolio_custom_columns");

	function portfolio_custom_columns($column){

		global $post;
		$values = get_post_custom();

		$gvc_portfolio_format = isset($values["gvc_portfolio_format"][0]) ? $values["gvc_portfolio_format"][0] : "image";

		switch ($column){

			case "format":
				
				echo '<span title="'.$gvc_portfolio_format.' format" class="'.$gvc_portfolio_format.'">&nbsp;</span>';
				
			break;

			case "category":

				$terms = get_the_terms( $post->ID, 'portfolio-category' );

				if ( !empty( $terms ) ) {
					$out = array();
					foreach ( $terms as $term ) {
						$out[] = sprintf( '<a href="%s">%s</a>',
							esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'portfolio-category' => $term->slug ), 'edit.php' ) ),
							esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'portfolio-category', 'display' ) )
						);
					}

					echo join( ', ', $out );

				} else {
					echo __("No categories", TEMP_NAME);
				}
				
			break;

			case "portfolio-tags":

				$terms = get_the_terms( $post->ID, 'portfolio-tag' );

				if ( !empty( $terms ) ) {
					$out = array();
					foreach ( $terms as $term ) {
						$out[] = sprintf( '<a href="%s">%s</a>',
							esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'portfolio-tag' => $term->slug ), 'edit.php' ) ),
							esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'portfolio-tag', 'display' ) )
						);
					}

					echo join( ', ', $out );

				} else {
					echo __("No tags", TEMP_NAME);
				}
				
			break;

		}
	}
endif;
?>