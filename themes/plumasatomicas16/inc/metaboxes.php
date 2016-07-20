<?php


// CUSTOM METABOXES //////////////////////////////////////////////////////////////////



	add_action('add_meta_boxes', function(){

		add_meta_box( 'columna_info_general', 'Información general de la columna', 'show_columna_info_general', 'wadafact', 'side', 'high' );
		add_meta_box( 'columna_cuestionario', 'Calificación de la columna', 'show_columna_cuestionario', 'wadafact', 'normal', 'high' );
		add_meta_box( 'fact_checker', 'Fact checker', 'show_fact_checker', 'wadafact', 'advanced', 'high' );

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

	function show_fact_checker($post){
		$argumento_uno = get_post_meta($post->ID, 'argumento_uno', true);
		$calif_argumento_uno = get_post_meta($post->ID, 'calif_argumento_uno', true);
		$sel_uno_verdadero = selected( $calif_argumento_uno, 'verdadero', false);
		$sel_uno_falso = selected( $calif_argumento_uno, 'falso', false);
		$argumento_dos = get_post_meta($post->ID, 'argumento_dos', true);
		$calif_argumento_dos = get_post_meta($post->ID, 'calif_argumento_dos', true);
		$sel_dos_verdadero = selected( $calif_argumento_dos, 'verdadero', false);
		$sel_dos_falso = selected( $calif_argumento_dos, 'falso', false);
		$argumento_tres = get_post_meta($post->ID, 'argumento_tres', true);
		$calif_argumento_tres = get_post_meta($post->ID, 'calif_argumento_dos', true);
		$argumento_cuatro = get_post_meta($post->ID, 'argumento_cuatro', true);
		$calif_argumento_cuatro = get_post_meta($post->ID, 'calif_argumento_dos', true);

		wp_nonce_field(__FILE__, 'fact_checker_nonce');

		echo <<<HTML

			<h2><b>Hechos</b></h2>
			<label>Hecho 1:</label>
			<textarea class='widefat' rows='4' cols='50' id='argumento_uno' name='argumento_uno' value='$argumento_uno'>$argumento_uno</textarea>
			<br /><br />
			<label>Calificación:  </label>
			<select id='calif_argumento_uno' name='calif_argumento_uno'>
			<option value='verdadero' $sel_uno_verdadero >Verdadero</option>
			<option value='falso' $sel_uno_falso >Falso</option>
			</select>
			<br /><br />
			<label>Hecho 2</label>
			<textarea class='widefat' rows='4' cols='50' id='argumento_dos' name='argumento_dos' value='$argumento_dos'>$argumento_dos</textarea>
			<br /><br />
			<label>Calificación:  </label>
			<select id='calif_argumento_dos' name='calif_argumento_dos'>
			<option value='verdadero' $sel_dos_verdadero >Verdadero</option>
			<option value='falso' $sel_dos_falso >Falso</option>
			</select>

			<h2><b>Dichos</b></h2>
			<label>Dicho 1</label>
			<textarea class='widefat' rows='4' cols='50' id='argumento_tres' name='argumento_tres'>$argumento_tres</textarea>
			<label>Link de apoyo</label>
			<input type="text" name="link_dicho_1" class="widefat" value="$link_dicho_1">
			<label>Calificación</label>
			<select name="argumento_cuatro" id="argumento_cuatro">
				<option value="">Selecciona un valor</option>
				<option value="">Verdadero</option>
				<option value="">Verdades descontextualizadas</option>
				<option value="">Falso</option>
			</select>
			<br/><br/>

			<label>Dicho 2</label>
			<textarea class='widefat' rows='4' cols='50' id='argumento_cuatro' name='argumento_cuatro' value='$argumento_cuatro'>$argumento_cuatro</textarea>
			<label>Link de apoyo</label>
			<input type="text" name="link_dicho_2" class="widefat" value="$link_dicho_2">
			<label>Calificación</label>
			<select name="argumento_cuatro" id="argumento_cuatro">
				<option value="">Selecciona un valor</option>
				<option value="">Verdadero</option>
				<option value="">Verdades descontextualizadas</option>
				<option value="">Falso</option>
			</select>
			<br/><br/>
HTML;
	}


	function show_columna_cuestionario($post){
		$social_axis_p1 	= get_post_meta($post->ID, 'social_axis_p1', TRUE);
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


		if ( isset($_POST['argumento_uno']) and check_admin_referer(__FILE__, 'fact_checker_nonce') ){
			update_post_meta($post_id, 'argumento_uno', $_POST['argumento_uno']);
			update_post_meta($post_id, 'argumento_dos', $_POST['argumento_dos']);
			update_post_meta($post_id, 'calif_argumento_uno', $_POST['calif_argumento_uno']);
			update_post_meta($post_id, 'calif_argumento_dos', $_POST['calif_argumento_dos']);
		}

		if ( isset($_POST['social_axis_p1']) and check_admin_referer(__FILE__, 'column_questions_nonce') ){
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
