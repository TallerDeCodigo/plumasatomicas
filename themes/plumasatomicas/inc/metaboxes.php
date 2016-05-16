<?php


// CUSTOM METABOXES //////////////////////////////////////////////////////////////////



	add_action('add_meta_boxes', function(){

		add_meta_box( 'columna_info_general', 'Información general de la columna', 'show_columna_info_general', 'what-the-fact', 'side', 'high' );
		add_meta_box( 'fact_checker', 'Fact checker', 'show_fact_checker', 'what-the-fact', 'advanced', 'high' );

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

	function show_fact_checker($post){
		$argumento_uno = get_post_meta($post->ID, 'argumento_uno', true);
		$calif_argumento_uno = get_post_meta($post->ID, 'calif_argumento_uno', true);
		$argumento_dos = get_post_meta($post->ID, 'argumento_dos', true);
		$calif_argumento_dos = get_post_meta($post->ID, 'calif_argumento_dos', true);
		wp_nonce_field(__FILE__, 'fact_checker_nonce');

		echo "<label>Argumento 1:</label>";
		echo "<textarea class='widefat' rows='4' cols='50' id='argumento_uno' name='argumento_uno' value='$argumento_uno'>".$argumento_uno."</textarea>";
		echo "<br /><br />";
		echo "<label>Calificación:  </label>";
		echo "<select id='calif_argumento_uno' name='calif_argumento_uno'>";
		echo "<option value='verdadero'".selected( $calif_argumento_uno, 'verdadero' ).">verdadero</option>";
		echo "<option value='mayoritariamente_verdadero' ".selected( $calif_argumento_uno, 'mayoritariamente_verdadero' ).">Mayoritariamente verdadero</option>";
		echo "<option value='verdades_descontextualizadas' ".selected( $calif_argumento_uno, 'verdades_descontextualizadas' ).">Verdades descontextualizadas</option>";
		echo "<option value='falso'>Falso</option>";
		echo "<option value='escandalosamente_falso' ".selected( $calif_argumento_uno, 'escandalosamente_falso' ).">Escandalosamente falso</option>";
		echo "</select>";
		echo "<br /><br />";
		echo "<label>Argumento 2</label>";
		echo "<textarea class='widefat' rows='4' cols='50' id='argumento_dos' name='argumento_dos' value='$argumento_dos'>".$argumento_dos."</textarea>";
		echo "<br /><br />";
		echo "<label>Calificación:  </label>";
		echo "<select id='calif_argumento_dos' name='calif_argumento_dos'>";
		echo "<option value='verdadero'".selected( $calif_argumento_dos, 'verdadero' ).">verdadero</option>";
		echo "<option value='mayoritariamente_verdadero' ".selected( $calif_argumento_dos, 'mayoritariamente_verdadero' ).">Mayoritariamente verdadero</option>";
		echo "<option value='verdades_descontextualizadas' ".selected( $calif_argumento_dos, 'verdades_descontextualizadas' ).">Verdades descontextualizadas</option>";
		echo "<option value='falso'>Falso</option>";
		echo "<option value='escandalosamente_falso' ".selected( $calif_argumento_dos, 'escandalosamente_falso' ).">Escandalosamente falso</option>";
		echo "</select>";
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

		if ( isset($_POST['argumento_uno']) and check_admin_referer(__FILE__, 'fact_checker_nonce') ){
			update_post_meta($post_id, 'argumento_uno', $_POST['argumento_uno']);
			update_post_meta($post_id, 'argumento_dos', $_POST['argumento_dos']);
			update_post_meta($post_id, 'calif_argumento_uno', $_POST['calif_argumento_uno']);
			update_post_meta($post_id, 'calif_argumento_dos', $_POST['calif_argumento_dos']);
		}


		// Guardar correctamente los checkboxes
		/*if ( isset($_POST['_checkbox_meta']) and check_admin_referer(__FILE__, '_checkbox_nonce') ){
			update_post_meta($post_id, '_checkbox_meta', $_POST['_checkbox_meta']);
		} else if ( ! defined('DOING_AJAX') ){
			delete_post_meta($post_id, '_checkbox_meta');
		}*/


	});



// OTHER METABOXES ELEMENTS //////////////////////////////////////////////////////////
