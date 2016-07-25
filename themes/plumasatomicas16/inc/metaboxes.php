<?php


// CUSTOM METABOXES //////////////////////////////////////////////////////////////////



	add_action('add_meta_boxes', function(){

		add_meta_box( 'columna_info_general', 'Información general de la columna', 'show_columna_info_general', 'wadafact', 'side', 'high' );
		add_meta_box( 'columna_cuestionario', 'Calificación de la columna', 'show_columna_cuestionario', 'wadafact', 'normal', 'high' );
		add_meta_box( 'fact_checker', 'Fact checker', 'show_fact_checker', 'wadafact', 'advanced', 'high' );
		add_meta_box( 'iterations', 'Iteraciones', 'show_iterations', 'wadafact', 'advanced', 'high' );

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
			$link_hecho_1 = get_post_meta($post->ID, 'link_hecho_1', true);

		$argumento_dos = get_post_meta($post->ID, 'argumento_dos', true);
			$calif_argumento_dos = get_post_meta($post->ID, 'calif_argumento_dos', true);
			$sel_dos_verdadero = selected( $calif_argumento_dos, 'verdadero', false);
			$sel_dos_falso = selected( $calif_argumento_dos, 'falso', false);
			$link_hecho_2 = get_post_meta($post->ID, 'link_hecho_2', true);

		$argumento_tres = get_post_meta($post->ID, 'argumento_tres', true);
			$calif_argumento_tres = get_post_meta($post->ID, 'calif_argumento_tres', true);
			$sel_tres_verdadero = selected( $calif_argumento_tres, 'verdadero', false);
			$sel_tres_descontextualizadas = selected( $calif_argumento_tres, 'verdades-descontextualizadas', false);
			$sel_tres_falso = selected( $calif_argumento_tres, 'falso', false);
			$link_dicho_1 = get_post_meta($post->ID, 'link_dicho_1', true);
			$comentario_dicho_1 = get_post_meta($post->ID, 'comentario_dicho_1', true);

		$argumento_cuatro = get_post_meta($post->ID, 'argumento_cuatro', true);
			$calif_argumento_cuatro = get_post_meta($post->ID, 'calif_argumento_cuatro', true);
			$sel_cuatro_verdadero = selected( $calif_argumento_cuatro, 'verdadero', false);
			$sel_cuatro_descontextualizadas = selected( $calif_argumento_cuatro, 'verdades-descontextualizadas', false);
			$sel_cuatro_falso = selected( $calif_argumento_cuatro, 'falso', false);
			$link_dicho_2 = get_post_meta($post->ID, 'link_dicho_2', true);
			$comentario_dicho_2 = get_post_meta($post->ID, 'comentario_dicho_2', true);

		wp_nonce_field(__FILE__, 'fact_checker_nonce');

		echo <<<HTML

			<h2 style="font-size: 1.5rem; display: block; text-align: center;"><b>Hechos</b></h2>
			
			<label>Hecho 1:</label>
			<textarea class='widefat' rows='4' cols='50' id='argumento_uno' name='argumento_uno' value='$argumento_uno'>$argumento_uno</textarea>
			<label>Link de apoyo</label>
			<input type="text" name="link_hecho_1" class="widefat" value="$link_hecho_1">
			<label>Calificación:  </label>
			<select id='calif_argumento_uno' name='calif_argumento_uno'>
				<option value=''>Selecciona un valor</option>
				<option value='verdadero' $sel_uno_verdadero >Verdadero</option>
				<option value='falso' $sel_uno_falso >Falso</option>
			</select>
			<br />
	
			<label>Hecho 2</label>
			<textarea class='widefat' rows='4' cols='50' id='argumento_dos' name='argumento_dos' value='$argumento_dos'>$argumento_dos</textarea>
			<label>Link de apoyo</label>
			<input type="text" name="link_hecho_2" class="widefat" value="$link_hecho_2">
			<label>Calificación:  </label>
			<select id='calif_argumento_dos' name='calif_argumento_dos'>
				<option value=''>Selecciona un valor</option>
				<option value='verdadero' $sel_dos_verdadero >Verdadero</option>
				<option value='falso' $sel_dos_falso >Falso</option>
			</select>
			<br /><br />
			<h2 style="font-size: 1.5rem; display: block; text-align: center;"><b>Dichos</b></h2>
			
			<label>Dicho 1</label>
			<textarea class='widefat' rows='4' cols='50' id='argumento_tres' name='argumento_tres'>$argumento_tres</textarea>
			<label>Link de apoyo</label>
			<input type="text" name="link_dicho_1" class="widefat" value="$link_dicho_1">
			<label>Comentario</label>
			<input type="text" name="comentario_dicho_1" class="widefat" value="$comentario_dicho_1">
			<label>Calificación</label>
			<select name="calif_argumento_tres" id="calif_argumento_tres">
				<option value="">Selecciona un valor</option>
				<option value="verdadero" $sel_tres_verdadero>Verdadero</option>
				<option value="verdades-descontextualizadas" $sel_cuatro_descontextualizadas>Verdades descontextualizadas</option>
				<option value="falso" $sel_tres_falso>Falso</option>
			</select>
			<br/>

			<label>Dicho 2</label>
			<textarea class='widefat' rows='4' cols='50' id='argumento_cuatro' name='argumento_cuatro'>$argumento_cuatro</textarea>
			<label>Link de apoyo</label>
			<input type="text" name="link_dicho_2" class="widefat" value="$link_dicho_2">
			<label>Comentario</label>
			<input type="text" name="comentario_dicho_2" class="widefat" value="$comentario_dicho_2">
			<label>Calificación</label>
			<select name="calif_argumento_cuatro" id="calif_argumento_cuatro">
				<option value="">Selecciona un valor</option>
				<option value="verdadero" $sel_cuatro_verdadero>Verdadero</option>
				<option value="verdades-descontextualizadas" $sel_cuatro_descontextualizadas>Verdades descontextualizadas</option>
				<option value="falso" $sel_cuatro_falso>Falso</option>
			</select>
			<br/>
HTML;

	}

	function show_iterations($post){
		$iter_tema_1 	= get_post_meta($post->ID, 'iter_tema_1', true);
			$iter_tema_adj_1 	= get_post_meta($post->ID, 'iter_tema_adj_1', true);
			$value_tema_1 		= get_post_meta($post->ID, 'value_tema_1', true);
			$value_sel_positive_1 = ($value_tema_1 == 'positivo') ? 'checked' : '';
			$value_sel_negative_1 = ($value_tema_1 == 'negativo') ? 'checked' : '';

		$iter_tema_2 	= get_post_meta($post->ID, 'iter_tema_2', true);
			$iter_tema_adj_2 	= get_post_meta($post->ID, 'iter_tema_adj_2', true);
			$value_tema_2 		= get_post_meta($post->ID, 'value_tema_2', true);
			$value_sel_positive_2 = ($value_tema_2 == 'positivo') ? 'checked' : '';
			$value_sel_negative_2 = ($value_tema_2 == 'negativo') ? 'checked' : '';

		$iter_tema_3 	= get_post_meta($post->ID, 'iter_tema_3', true);
			$iter_tema_adj_3 	= get_post_meta($post->ID, 'iter_tema_adj_3', true);
			$value_tema_3 		= get_post_meta($post->ID, 'value_tema_3', true);
			$value_sel_positive_3 = ($value_tema_3 == 'positivo') ? 'checked' : '';
			$value_sel_negative_3 = ($value_tema_3 == 'negativo') ? 'checked' : '';

		$iter_persona_1 	= get_post_meta($post->ID, 'iter_persona_1', true);
			$iter_persona_adj_1 	= get_post_meta($post->ID, 'iter_persona_adj_1', true);
			$value_persona_1 		= get_post_meta($post->ID, 'value_persona_1', true);
			$value_sel_positive_4 = ($value_persona_1 == 'positivo') ? 'checked' : '';
			$value_sel_negative_4 = ($value_persona_1 == 'negativo') ? 'checked' : '';

		$iter_persona_2 	= get_post_meta($post->ID, 'iter_persona_2', true);
			$iter_persona_adj_2 	= get_post_meta($post->ID, 'iter_persona_adj_2', true);
			$value_persona_2 		= get_post_meta($post->ID, 'value_persona_2', true);
			$value_sel_positive_5 = ($value_persona_2 == 'positivo') ? 'checked' : '';
			$value_sel_negative_5 = ($value_persona_2 == 'negativo') ? 'checked' : '';

		$iter_persona_3 	= get_post_meta($post->ID, 'iter_persona_3', true);
			$iter_persona_adj_3 	= get_post_meta($post->ID, 'iter_persona_adj_3', true);
			$value_persona_3 		= get_post_meta($post->ID, 'value_persona_3', true);
			$value_sel_positive_6 = ($value_persona_3 == 'positivo') ? 'checked' : '';
			$value_sel_negative_6 = ($value_persona_3 == 'negativo') ? 'checked' : '';

		$temas = get_terms( array(
							    'taxonomy' => 'tema',
							    'hide_empty' => false,
							) );
		$personajes = get_terms( array(
							    'taxonomy' => 'personaje',
							    'hide_empty' => false,
							) );

		/** Build options for topic select control **/
		$temas_options_1 = "<option value='' >Selecciona uno</option>";
		$temas_options_2 = "<option value='' >Selecciona uno</option>";
		$temas_options_3 = "<option value='' >Selecciona uno</option>";
		foreach ($temas as $index => $each_tema) {
			/*** Loop through possible multiple boxes ***/
			for($i = 1; $i<=3; $i++){

				$selected = selected( ${"iter_tema_$i"}, $each_tema->term_id, false);
				${"temas_options_$i"} .= "<option value='{$each_tema->term_id}' {$selected}>{$each_tema->name}</option>";
			}
		}

		/** Build options for people select control **/
		$personas_options_1 = "<option value='' >Selecciona uno</option>";
		$personas_options_2 = "<option value='' >Selecciona uno</option>";
		$personas_options_3 = "<option value='' >Selecciona uno</option>";
		foreach ($personajes as $index => $each_persona) {
			/*** Loop through possible multiple boxes ***/
			for($i = 1; $i<=3; $i++){

				$selected = selected( ${"iter_persona_$i"}, $each_persona->term_id, false);
				${"personas_options_$i"} .= "<option value='{$each_persona->term_id}' {$selected}>{$each_persona->name}</option>";
			}
		}

		wp_nonce_field(__FILE__, 'iterations_nonce');

		echo <<<HTML

			<h2 style="font-size: 1.5rem; display: block; text-align: center;"><b>Temas</b></h2>
			<article class="clone_metabox little_box" data-prefix="iter_tema_"> 
				<label>Tema</label>
				<select id="iter_tema_1" name="iter_tema_1" class="widefat">
					$temas_options_1
				</select>
				<label>Adjetivo(s)</label>
				<input type="text" name="iter_tema_adj_1" class="widefat" value="$iter_tema_adj_1">
				<label>Valoración:  </label>
				<section class="group_radio">
					<input type="radio" name="value_tema_1" value="positivo" $value_sel_positive_1>
					<label>Positivo</label>
					<input type="radio" name="value_tema_1" value="negativo" $value_sel_negative_1>
					<label>Negativo</label>
				</section>
			</article>
			
			<article class="clone_metabox little_box" data-prefix="iter_tema_"> 
				<label>Tema</label>
				<select id="iter_tema_2" name="iter_tema_2" class="widefat">
					$temas_options_2
				</select>
				<label>Adjetivo(s)</label>
				<input type="text" name="iter_tema_adj_2" class="widefat" value="$iter_tema_adj_2">
				<label>Valoración: </label>
				<section class="group_radio">
					<input type="radio" name="value_tema_2" value="positivo" $value_sel_positive_2>
					<label>Positivo</label>
					<input type="radio" name="value_tema_2" value="negativo" $value_sel_negative_2>
					<label>Negativo</label>
				</section>
			</article>
			
			<article class="clone_metabox little_box" data-prefix="iter_tema_"> 
				<label>Tema</label>
				<select id="iter_tema_3" name="iter_tema_3" class="widefat">
					$temas_options_3
				</select>
				<label>Adjetivo(s)</label>
				<input type="text" name="iter_tema_adj_3" class="widefat" value="$iter_tema_adj_3">
				<label>Valoración: </label>
				<section class="group_radio">
					<input type="radio" name="value_tema_3" value="positivo" $value_sel_positive_3>
					<label>Positivo</label>
					<input type="radio" name="value_tema_3" value="negativo" $value_sel_negative_3>
					<label>Negativo</label>
				</section>
			</article>
			<br />
			<br />

			<h2 style="font-size: 1.5rem; display: block; text-align: center;"><b>Personajes</b></h2>
			<article class="clone_metabox little_box" data-prefix="iter_persona_"> 
				<label>Personaje</label>
				<select id="iter_persona_1" name="iter_persona_1" class="widefat">
					$personas_options_1
				</select>
				<label>Adjetivo(s)</label>
				<input type="text" name="iter_persona_adj_1" class="widefat" value="$iter_persona_adj_1">
				<label>Valoración:  </label>
				<section class="group_radio">
					<input type="radio" name="value_persona_1" value="positivo" $value_sel_positive_4>
					<label>Positivo</label>
					<input type="radio" name="value_persona_1" value="negativo" $value_sel_negative_4>
					<label>Negativo</label>
				</section>
			</article>
			
			<article class="clone_metabox little_box" data-prefix="iter_persona_"> 
				<label>Personaje</label>
				<select id="iter_persona_2" name="iter_persona_2" class="widefat">
					$personas_options_2
				</select>
				<label>Adjetivo(s)</label>
				<input type="text" name="iter_persona_adj_2" class="widefat" value="$iter_persona_adj_2">
				<label>Valoración:  </label>
				<section class="group_radio">
					<input type="radio" name="value_persona_2" value="positivo" $value_sel_positive_5>
					<label>Positivo</label>
					<input type="radio" name="value_persona_2" value="negativo" $value_sel_negative_5>
					<label>Negativo</label>
				</section>
			</article>
			
			<article class="clone_metabox little_box" data-prefix="iter_persona_"> 
				<label>Personaje</label>
				<select id="iter_persona_3" name="iter_persona_3" class="widefat">
					$personas_options_3
				</select>
				<label>Adjetivo(s)</label>
				<input type="text" name="iter_persona_adj_3" class="widefat" value="$iter_persona_adj_3">
				<label>Valoración:  </label>
				<section class="group_radio">
					<input type="radio" name="value_persona_3" value="positivo" $value_sel_positive_6>
					<label>Positivo</label>
					<input type="radio" name="value_persona_3" value="negativo" $value_sel_negative_6>
					<label>Negativo</label>
				</section>
			</article>
			<br/>
			<br/>

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


		if ( isset($_POST['argumento_uno']) AND check_admin_referer(__FILE__, 'fact_checker_nonce') ){
			update_post_meta($post_id, 'argumento_uno', $_POST['argumento_uno']);
			update_post_meta($post_id, 'argumento_dos', $_POST['argumento_dos']);
			update_post_meta($post_id, 'argumento_tres', $_POST['argumento_tres']);
			update_post_meta($post_id, 'argumento_cuatro', $_POST['argumento_cuatro']);
			update_post_meta($post_id, 'calif_argumento_uno', $_POST['calif_argumento_uno']);
			update_post_meta($post_id, 'calif_argumento_dos', $_POST['calif_argumento_dos']);
			update_post_meta($post_id, 'calif_argumento_tres', $_POST['calif_argumento_tres']);
			update_post_meta($post_id, 'calif_argumento_cuatro', $_POST['calif_argumento_cuatro']);
			update_post_meta($post_id, 'link_hecho_1', $_POST['link_hecho_1']);
			update_post_meta($post_id, 'link_hecho_2', $_POST['link_hecho_2']);
			update_post_meta($post_id, 'link_dicho_1', $_POST['link_dicho_1']);
			update_post_meta($post_id, 'link_dicho_2', $_POST['link_dicho_2']);
			update_post_meta($post_id, 'comentario_dicho_1', $_POST['comentario_dicho_1']);
			update_post_meta($post_id, 'comentario_dicho_2', $_POST['comentario_dicho_2']);
		}

		if (isset($_POST['iter_tema_1']) AND check_admin_referer(__FILE__, 'iterations_nonce') ){
			/*** Save iterations metabox ***/
			update_post_meta($post_id, 'iter_tema_1', $_POST['iter_tema_1']);
			update_post_meta($post_id, 'iter_tema_adj_1', $_POST['iter_tema_adj_1']);
			update_post_meta($post_id, 'value_tema_1', $_POST['value_tema_1']);

			update_post_meta($post_id, 'iter_tema_2', $_POST['iter_tema_2']);
			update_post_meta($post_id, 'iter_tema_adj_2', $_POST['iter_tema_adj_2']);
			update_post_meta($post_id, 'value_tema_2', $_POST['value_tema_2']);

			update_post_meta($post_id, 'iter_tema_3', $_POST['iter_tema_3']);
			update_post_meta($post_id, 'iter_tema_adj_3', $_POST['iter_tema_adj_3']);
			update_post_meta($post_id, 'value_tema_3', $_POST['value_tema_3']);

			update_post_meta($post_id, 'iter_persona_1', $_POST['iter_persona_1']);
			update_post_meta($post_id, 'iter_persona_adj_1', $_POST['iter_persona_adj_1']);
			update_post_meta($post_id, 'value_persona_1', $_POST['value_persona_1']);
			
			update_post_meta($post_id, 'iter_persona_2', $_POST['iter_persona_2']);
			update_post_meta($post_id, 'iter_persona_adj_2', $_POST['iter_persona_adj_2']);
			update_post_meta($post_id, 'value_persona_2', $_POST['value_persona_2']);

			update_post_meta($post_id, 'iter_persona_3', $_POST['iter_persona_3']);
			update_post_meta($post_id, 'iter_persona_adj_3', $_POST['iter_persona_adj_3']);
			update_post_meta($post_id, 'value_persona_3', $_POST['value_persona_3']);

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
