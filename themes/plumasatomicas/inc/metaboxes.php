<?php


// CUSTOM METABOXES //////////////////////////////////////////////////////////////////



	add_action('add_meta_boxes', function(){

		add_meta_box( 'columna_info_general', 'Información general de la columna', 'show_columna_info_general', 'what-the-fact', 'side', 'high' );
		add_meta_box( 'columna_cuestionario', 'Calificación de la columna', 'show_columna_cuestionario', 'what-the-fact', 'normal', 'high' );

	});



// CUSTOM METABOXES CALLBACK FUNCTIONS ///////////////////////////////////////////////



	function show_columna_info_general($post){
		$fecha_publicacion = get_post_meta($post->ID, 'fecha_publicacion', true);
		$nombre_columna = get_post_meta($post->ID, 'nombre_columna', true);
		$source_columna = get_post_meta($post->ID, 'source_columna', true);
		$source_url_columna = get_post_meta($post->ID, 'source_url_columna', true);
		$global_grade 	= get_post_meta($post->ID, 'global_grade', true);
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
		echo "<label>Calificación generada:</label>";
		echo "<input type='text' class='widefat' id='global_grade' name='global_grade' value='$global_grade'/>";
	}


	function show_columna_cuestionario($post){
		$social_axis_p1 	= get_post_meta($post->ID, 'social_axis_p1', true);
			$is_sel_social_p1_minus 	= ($social_axis_p1 == '-1' ) 	? 'checked' : '';
			$is_sel_social_p1_neutral 	= ($social_axis_p1 == '0' OR $social_axis_p1 == '' ) 	? 'checked' : '';
			$is_sel_social_p1_plus 		= ($social_axis_p1 == '1' ) 	? 'checked' : '';

		$social_axis_p2 	= get_post_meta($post->ID, 'social_axis_p2', TRUE);
			$is_sel_social_p2_minus 	= ($social_axis_p2 == '-1' ) 	? 'checked' : '';
			$is_sel_social_p2_neutral 	= ($social_axis_p2 == '0' OR $social_axis_p1 == '' ) 	? 'checked' : '';
			$is_sel_social_p2_plus 		= ($social_axis_p2 == '1' ) 	? 'checked' : '';

		$social_axis_p3 	= get_post_meta($post->ID, 'social_axis_p3', TRUE);
			$is_sel_social_p3_minus 	= ($social_axis_p3 == '-1' ) 	? 'checked' : '';
			$is_sel_social_p3_neutral 	= ($social_axis_p3 == '0' OR $social_axis_p1 == '' ) 	? 'checked' : '';
			$is_sel_social_p3_plus 		= ($social_axis_p3 == '1' ) 	? 'checked' : '';
		
		$economic_axis_p1 	= get_post_meta($post->ID, 'economic_axis_p1', TRUE);
			$is_sel_economic_p1_minus 	= ($economic_axis_p1 == '-1' ) 	? 'checked' : '';
			$is_sel_economic_p1_neutral = ($economic_axis_p1 == '0' OR $social_axis_p1 == '' ) 	? 'checked' : '';
			$is_sel_economic_p1_plus 	= ($economic_axis_p1 == '1' ) 	? 'checked' : '';
		
		$economic_axis_p2 	= get_post_meta($post->ID, 'economic_axis_p2', TRUE);
			$is_sel_economic_p2_minus 	= ($economic_axis_p2 == '-1' ) 	? 'checked' : '';
			$is_sel_economic_p2_neutral = ($economic_axis_p2 == '0' OR $social_axis_p1 == '' ) 	? 'checked' : '';
			$is_sel_economic_p2_plus 	= ($economic_axis_p2 == '1' ) 	? 'checked' : '';
		
		$economic_axis_p3 	= get_post_meta($post->ID, 'economic_axis_p3', TRUE);
			$is_sel_economic_p3_minus 	= ($economic_axis_p3 == '-1' ) 	? 'checked' : '';
			$is_sel_economic_p3_neutral = ($economic_axis_p3 == '0' OR $social_axis_p1 == '' ) 	? 'checked' : '';
			$is_sel_economic_p3_plus 	= ($economic_axis_p3 == '1' ) 	? 'checked' : '';

		wp_nonce_field(__FILE__, 'column_questions_nonce');

		echo <<<HTML
			<h3>Derechos sociales</h3>
			<p>Derechos civiles (enfocados a las libertades negativas).</p>
			<input type="radio" name="social_axis_p1" value="-1" {$is_sel_social_p1_minus} >No&nbsp;
			<input type="radio" name="social_axis_p1" value="0"  {$is_sel_social_p1_neutral} >N/A&nbsp;
			<input type="radio" name="social_axis_p1" value="1"  {$is_sel_social_p1_plus} >Si<br>
			<p>Derechos sociales (enfocados a las libertades positivas).</p>
			<input type="radio" name="social_axis_p2" value="-1" {$is_sel_social_p2_minus} >No&nbsp;
			<input type="radio" name="social_axis_p2" value="0"  {$is_sel_social_p2_neutral} >N/A&nbsp;
			<input type="radio" name="social_axis_p2" value="1" {$is_sel_social_p2_plus} >Si<br>
			<p>Derechos políticos (enfocados a la relación del individuo y organizaciones sociales frente al Estado).</p>
			<input type="radio" name="social_axis_p3" value="-1" {$is_sel_social_p3_minus} >No&nbsp;
			<input type="radio" name="social_axis_p3" value="0"  {$is_sel_social_p3_neutral} >N/A&nbsp;
			<input type="radio" name="social_axis_p3" value="1"  {$is_sel_social_p3_plus} >Si<br>

			<h3>Economía</h3>
			<p>Obtención y administración del patrimonio</p>
			<input type="radio" name="economic_axis_p1" value="-1" {$is_sel_economic_p1_minus} >No&nbsp;
			<input type="radio" name="economic_axis_p1" value="0" {$is_sel_economic_p1_neutral}  >N/A&nbsp;
			<input type="radio" name="economic_axis_p1" value="1" {$is_sel_economic_p1_plus} >Si<br>
			<p>Volumen de recaudación estatal y financiamiento de bienestar social</p>
			<input type="radio" name="economic_axis_p2" value="-1" {$is_sel_economic_p2_minus} >No&nbsp;
			<input type="radio" name="economic_axis_p2" value="0" {$is_sel_economic_p2_neutral} >N/A&nbsp;
			<input type="radio" name="economic_axis_p2" value="1" {$is_sel_economic_p2_plus} >Si<br>
			<p>Relación entre mercados</p>
			<input type="radio" name="economic_axis_p3" value="-1" {$is_sel_economic_p3_minus} >No&nbsp;
			<input type="radio" name="economic_axis_p3" value="0"  {$is_sel_economic_p3_neutral} >N/A&nbsp;
			<input type="radio" name="economic_axis_p3" value="1"  {$is_sel_economic_p3_plus} >Si<br>

HTML;
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

		if (check_admin_referer(__FILE__, 'column_questions_nonce') ){
			/*** Save questions ***/
			update_post_meta($post_id, 'social_axis_p1', $_POST['social_axis_p1']);
			update_post_meta($post_id, 'social_axis_p2', $_POST['social_axis_p2']);
			update_post_meta($post_id, 'social_axis_p3', $_POST['social_axis_p3']);
			update_post_meta($post_id, 'economic_axis_p1', $_POST['economic_axis_p1']);
			update_post_meta($post_id, 'economic_axis_p2', $_POST['economic_axis_p2']);
			update_post_meta($post_id, 'economic_axis_p3', $_POST['economic_axis_p3']);
		}


		// Guardar correctamente los checkboxes
		/*if ( isset($_POST['_checkbox_meta']) and check_admin_referer(__FILE__, '_checkbox_nonce') ){
			update_post_meta($post_id, '_checkbox_meta', $_POST['_checkbox_meta']);
		} else if ( ! defined('DOING_AJAX') ){
			delete_post_meta($post_id, '_checkbox_meta');
		}*/


	});



// OTHER METABOXES ELEMENTS //////////////////////////////////////////////////////////
