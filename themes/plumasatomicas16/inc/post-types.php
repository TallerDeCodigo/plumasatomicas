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
		
		// WHADAFACT
		$labels = array(
			'name'          => 'Cards',
			'singular_name' => 'Card',
			'add_new'       => 'Nueva card',
			'add_new_item'  => 'Nueva card',
			'edit_item'     => 'Editar card',
			'new_item'      => 'Nuevo card',
			'all_items'     => 'Todas',
			'view_item'     => 'Ver card',
			'search_items'  => 'Buscar card',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Cards'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'cards' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'stack' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'cards', $args );

		// ENSAYO WHADAFACT
		$labels = array(
			'name'          => 'Ensayo Whadafact',
			'singular_name' => 'Ensayo',
			'add_new'       => 'Nuevo ensayo',
			'add_new_item'  => 'Nuevo ensayo',
			'edit_item'     => 'Editar ensayo',
			'new_item'      => 'Nuevo ensayo',
			'all_items'     => 'Todas',
			'view_item'     => 'Ver ensayo',
			'search_items'  => 'Buscar ensayo',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'Whada-Ensayo'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'ensayo' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'opinologo' ),
			'supports'           => array( 'title', 'editor', 'thumbnail','excerpt' )
		);
		register_post_type( 'ensayo', $args );

	});