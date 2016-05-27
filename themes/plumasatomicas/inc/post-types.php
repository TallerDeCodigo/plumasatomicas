<?php


// CUSTOM POST TYPES /////////////////////////////////////////////////////////////////


	add_action('init', function(){


		// WHADAFACT
		$labels = array(
			'name'          => 'Wadafacts',
			'singular_name' => 'Wadafact',
			'add_new'       => 'Nueva Wadafact',
			'add_new_item'  => 'Nueva Wadafact',
			'edit_item'     => 'Editar Wadafact',
			'new_item'      => 'Nuevo Wadafact',
			'all_items'     => 'Todas',
			'view_item'     => 'Ver Wadafact',
			'search_items'  => 'Buscar Wadafact',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Wadafact'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'wadafact' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'wadafact', $args );

	});