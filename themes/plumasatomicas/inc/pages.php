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


	});
