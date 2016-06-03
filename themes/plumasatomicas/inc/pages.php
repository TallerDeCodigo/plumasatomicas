<?php


// CUSTOM PAGES //////////////////////////////////////////////////////////////////////


	add_action('init', function(){


		// CONTACTO
		if( ! get_page_by_path('opinologo') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Perfil opinólogo',
				'post_name'   => 'opinologo',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// home
		if( ! get_page_by_path('home') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Homepage',
				'post_name'   => 'home',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// Blog archive
		if( ! get_page_by_path('archive') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Blog archive',
				'post_name'   => 'archive',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}

		// Card Stack
		if( ! get_page_by_path('card-stack') ){
			$page = array(
				'post_author' => 1,
				'post_status' => 'publish',
				'post_title'  => 'Card stack',
				'post_name'   => 'card-stack',
				'post_type'   => 'page'
			);
			wp_insert_post( $page, true );
		}


	});
