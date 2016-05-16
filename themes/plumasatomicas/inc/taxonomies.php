<?php


// TAXONOMIES ////////////////////////////////////////////////////////////////////////


	add_action( 'init', 'custom_taxonomies_callback', 0 );

	function custom_taxonomies_callback(){

		// AUTORES
		if( ! taxonomy_exists('opinologos')){

			$labels = array(
				'name'              => 'Opinólogos',
				'singular_name'     => 'Opinólogo',
				'search_items'      => 'Buscar',
				'all_items'         => 'Todos',
				'edit_item'         => 'Editar Opinólogo',
				'update_item'       => 'Actualizar Opinólogo',
				'add_new_item'      => 'Nuevo Opinólogo',
				'new_item_name'     => 'Nombre Nuevo Opinólogo',
				'menu_name'         => 'Opinólogos'
			);

			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'opinologos' ),
			);

			register_taxonomy( 'opinologo', 'what-the-fact', $args );
		}
		
		
		// TERMS
		/*if ( ! term_exists( 'some-term', 'autor' ) ){
			wp_insert_term( 'Some term', 'category', array('slug' => 'some-term') );
		}*/

		/* // SUB TERMS CREATION
		if(term_exists('parent-term', 'category')){
			$term = get_term_by( 'slug', 'parent-term', 'category');
			$term_id = intval($term->term_id);
			if ( ! term_exists( 'child-term', 'category' ) ){
				wp_insert_term( 'A child term', 'category', array('slug' => 'child-term', 'parent' => $term_id) );
			}
			
		} */
	}
