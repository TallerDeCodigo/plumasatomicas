<?php


// CUSTOM POST TYPES /////////////////////////////////////////////////////////////////


	add_action('init', function(){


		// COLUMNAS
		$labels = array(
			'name'          => 'What the facts',
			'singular_name' => 'What the fact',
			'add_new'       => 'Nueva What the fact',
			'add_new_item'  => 'Nueva What the fact',
			'edit_item'     => 'Editar What the fact',
			'new_item'      => 'Nuevo What the fact',
			'all_items'     => 'Todas',
			'view_item'     => 'Ver What the fact',
			'search_items'  => 'Buscar What the fact',
			'not_found'     => 'No se encontró',
			'menu_name'     => 'What the facts'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'what-the-fact' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 6,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);
		register_post_type( 'what-the-fact', $args );

	});