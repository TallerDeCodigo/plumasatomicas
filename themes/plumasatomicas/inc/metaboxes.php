<?php


// CUSTOM METABOXES //////////////////////////////////////////////////////////////////



	add_action('add_meta_boxes', function(){

		add_meta_box( 'columna_info_general', 'Información general de la columna', 'show_columna_info_general', 'what-the-fact', 'side', 'high' );

	});



// CUSTOM METABOXES CALLBACK FUNCTIONS ///////////////////////////////////////////////



	function show_columna_info_general($post){
		$fecha_publicacion = get_post_meta($post->ID, 'fecha_publicacion', true);
		$nombre_columna = get_post_meta($post->ID, 'nombre_columna', true);
		$source_columna = get_post_meta($post->ID, 'source_columna', true);
		$source_url_columna = get_post_meta($post->ID, 'source_url_columna', true);
		wp_nonce_field(__FILE__, 'info_general_nonce');

		echo "<label>Fecha de publicación de la columna:</label>";
		echo "<input type='text' class='widefat' id='fecha_publicacion' name='fecha_publicacion' value='$fecha_publicacion'/>";
		echo "<br /><br />";
		echo "<label>Nombre de la columna:</label>";
		echo "<input type='text' class='widefat' id='nombre_columna' name='nombre_columna' value='$nombre_columna'/>";
		echo "<br /><br />";
		echo "<label>Periódico o blog:</label>";
		echo "<input type='text' class='widefat' id='source_columna' name='source_columna' value='$source_columna'/>";
		echo "<br /><br />";
		echo "<label>URL de la nota:</label>";
		echo "<input type='text' class='widefat' id='source_url_columna' name='source_url_columna' value='$source_url_columna'/>";
	}



// SAVE METABOXES DATA ///////////////////////////////////////////////////////////////



	add_action('save_post', function($post_id){


		if ( ! current_user_can('edit_page', $post_id)) 
			return $post_id;


		if ( defined('DOING_AUTOSAVE') and DOING_AUTOSAVE ) 
			return $post_id;
		
		
		if ( wp_is_post_revision($post_id) OR wp_is_post_autosave($post_id) ) 
			return $post_id;


		if ( isset($_POST['fecha_publicacion']) and check_admin_referer(__FILE__, 'info_general_nonce') ){
			update_post_meta($post_id, 'fecha_publicacion', $_POST['fecha_publicacion']);
			update_post_meta($post_id, 'nombre_columna', $_POST['nombre_columna']);
			update_post_meta($post_id, 'source_columna', $_POST['source_columna']);
			update_post_meta($post_id, 'source_url_columna', $_POST['source_url_columna']);
		}


		// Guardar correctamente los checkboxes
		/*if ( isset($_POST['_checkbox_meta']) and check_admin_referer(__FILE__, '_checkbox_nonce') ){
			update_post_meta($post_id, '_checkbox_meta', $_POST['_checkbox_meta']);
		} else if ( ! defined('DOING_AJAX') ){
			delete_post_meta($post_id, '_checkbox_meta');
		}*/


	});



// OTHER METABOXES ELEMENTS //////////////////////////////////////////////////////////
