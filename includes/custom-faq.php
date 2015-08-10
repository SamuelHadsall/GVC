<?php

global $gvc;
$gvc_faq_widget_area         = ($gvc['gvc-faq-widget-area']) ? $gvc['gvc-faq-widget-area'] : 0;

if ( $gvc_faq_widget_area == 1 ):	
	function gvc_faq() {

	  $labels = array(
		'name'               => __('Faq', TEMP_NAME),
		'singular_name'      => __('Faq', TEMP_NAME),
		'add_new'            => __('Add new', TEMP_NAME),
		'add_new_item'       => __('Add new faq', TEMP_NAME),
		'edit_item'          => __('Edit faq', TEMP_NAME),
		'new_item'           => __('New faq', TEMP_NAME),
		'all_items'          => __('All faq', TEMP_NAME),
		'view_item'          => __('View faq', TEMP_NAME),
		'search_items'       => __('Search faq', TEMP_NAME),
		'not_found'          => __('No faq found', TEMP_NAME),
		'not_found_in_trash' => __('No faq found in trash', TEMP_NAME), 
		'parent_item_colon'  => '',
		'menu_name'          => __('Faq', TEMP_NAME)
	  );

	  $args = array(
	    'labels'             => $labels,
	    'public'             => true,
	    'publicly_queryable' => true,
	    'show_ui'            => true, 
	    'show_in_menu'       => true, 
	    'query_var'          => true,
	    'rewrite'            => array( 'slug' => 'faq' ),
	    'capability_type'    => 'post',
	    'has_archive'        => true, 
	    'hierarchical'       => false,
	    'menu_position'      => null,
	    'menu_icon'          => '',
	    'supports'           => array( 'title', 'editor')
	  ); 

	  register_post_type( 'faq', $args );

	}

	add_action( 'init', 'gvc_faq' );

	function faq_taxonomies() {

		register_taxonomy('faq-category', 'faq', array(
			'hierarchical' => true,
			'labels' => array(
				'name' 				=> __( 'Faq category', TEMP_NAME),
				'singular_name' 	=> __( 'Faq category', TEMP_NAME),
				'search_items' 		=> __( 'Search faq category', TEMP_NAME ),
				'all_items' 		=> __( 'All faq categories', TEMP_NAME ),
				'parent_item' 		=> __( 'Parent faq category', TEMP_NAME ),
				'parent_item_colon' => __( 'Parent faq category', TEMP_NAME ),
				'edit_item' 		=> __( 'Edit faq category', TEMP_NAME ),
				'update_item' 		=> __( 'Update faq category', TEMP_NAME ),
				'add_new_item' 		=> __( 'Add new faq category', TEMP_NAME ),
				'new_item_name' 	=> __( 'New faq category', TEMP_NAME ),
				'menu_name' 		=> __( 'Faq categories', TEMP_NAME ),
			),
			'rewrite' => array(
				'slug' 		   => 'faq-category',
				'with_front'   => true,
				'hierarchical' => true
			),
		));

		register_taxonomy('faq-tag', 'faq', array(
			'hierarchical' => false,
			'labels' => array(
				'name' 				=> __( 'Faq tags', TEMP_NAME),
				'singular_name' 	=> __( 'Faq tag', TEMP_NAME),
				'search_items' 		=> __( 'Search faq tags', TEMP_NAME ),
				'all_items' 		=> __( 'All faq tags', TEMP_NAME ),
				'parent_item' 		=> __( 'Parent faq tags', TEMP_NAME ),
				'parent_item_colon' => __( 'Parent faq tag', TEMP_NAME ),
				'edit_item' 		=> __( 'Edit faq tag', TEMP_NAME ),
				'update_item' 		=> __( 'Update faq tag', TEMP_NAME ),
				'add_new_item'	    => __( 'Add new faq tag', TEMP_NAME ),
				'new_item_name' 	=> __( 'New faq tag', TEMP_NAME ),
				'menu_name' 		=> __( 'Faq tags', TEMP_NAME ),
			),
			'rewrite' 		   => array(
				'slug' 		   => 'faq-tag',
				'with_front'   => true,
				'hierarchical' => false
			),
		));

	}
	add_action( 'init', 'faq_taxonomies', 0 );

/*====================================================================*/
/*	FAQ ADMIN COLUMNS
/*====================================================================*/
	
	add_filter("manage_edit-faq_columns", "faq_edit_columns");

	function faq_edit_columns($columns){

		$columns['cb']             = "<input type=\"checkbox\" />";
		$columns['title']          = __("Faq item title", TEMP_NAME);
		$columns['category']       = __("Category", TEMP_NAME);
		$columns['faq-tags'] = __("Tags", TEMP_NAME);

		return $columns;
	}

	add_action("manage_faq_posts_custom_column", "faq_custom_columns");

	function faq_custom_columns($column){

		global $post;
		$values = get_post_custom();

		switch ($column){

			case "category":

				$terms = get_the_terms( $post->ID, 'faq-category' );

				if ( !empty( $terms ) ) {
					$out = array();
					foreach ( $terms as $term ) {
						$out[] = sprintf( '<a href="%s">%s</a>',
							esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'faq-category' => $term->slug ), 'edit.php' ) ),
							esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'faq-category', 'display' ) )
						);
					}

					echo join( ', ', $out );

				} else {
					echo __("No categories", TEMP_NAME);
				}
				
			break;

			case "faq-tags":

				$terms = get_the_terms( $post->ID, 'faq-tag' );

				if ( !empty( $terms ) ) {
					$out = array();
					foreach ( $terms as $term ) {
						$out[] = sprintf( '<a href="%s">%s</a>',
							esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'faq-tag' => $term->slug ), 'edit.php' ) ),
							esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'faq-tag', 'display' ) )
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