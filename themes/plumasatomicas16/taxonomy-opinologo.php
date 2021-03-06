<?php 
	get_header();
	$opinologo = get_the_terms($post->ID, 'opinologo');
	$opinologo = !empty($opinologo) ? $opinologo[0] : NULL;
	$grade = get_profile_grade($opinologo->term_id);
	$truthfulness = get_profile_truthfulness($opinologo->term_id);

	extract($truthfulness);


	$res_x = 50+$grade[x]*25;
	$res_y = 50+$grade[y]*25;

	$x_axis_name = ($grade[x] <= -0.75) ? "Progresista" : "Centro";
	$x_axis_name = ($grade[x] >=  0.75) ? "Conservador" : $x_axis_name;
	$y_axis_name = ($grade[y] >=  0.5) ? "Totalitario" : "Centro";
	$y_axis_name = ($grade[y] <= -0.5) ? "Liberal"     : $y_axis_name;

	$n_opinologo = $opinologo->name;;

	if(isset($_GET['charts'])){ $charts = $_GET['charts']; }

?>

<section id="post-sec">
	<div class="wrapper-special">
		<div class="contenido opinologo">
			<h1><?php echo $opinologo->name; ?></h1>
			<div class="who">
				<div>
					<?php 
						if(get_term_meta($opinologo->term_id, 'wp_image_field_id', true)){

							$opinologo_img = get_term_meta($opinologo->term_id, 'wp_image_field_id', true);
							echo '<img src="'.$opinologo_img['url'].'">';
							
						} else {
							echo '';
						}
					?>
				</div><br>
				<!-- <span><?php echo $opinologo->name; ?></span> -->
				<span><?php echo $opinologo->description; ?></span>
			</div>
			<p>Número de entregas de esta columna analizados: <?php echo $opinologo->count;?></p>

			<h3>"Postura política vertida en esta columna" </h3>
			<a class="postura_link" href="<?php echo site_url('como-medimos-el-discurso-politico'); ?>">
				<div class="postura">
					<div>
						<img src="<?php echo THEMEPATH; ?>images/postura.svg">
						<div class="pointer" style="<?php echo 'left: '.($res_x-5).'%;'.'top: '.($res_y-5).'%;'; ?>"></div>
					</div><br>
					<!-- <span><?php echo $x_axis_name."-".$y_axis_name; ?></span> -->
				</div>
				<div class="overscreen">
					<p>
						¿Qué es esto? Wadafact analiza los postulados de los columnistas en sus espacios y ubica la posición política correspondiente. Usamos el gráfico de Nolan para mostrar los resultados.
					</p>
				</div>		
			</a>

			
			
			<div class="charts">
				<h3 style="text-align:left;">"De las columnas analizadas (<?php echo $opinologo->count;?>) de este autor, estas son las veces que ha utilizado dichos (opiniones) vs. hechos (cifras) en sus argumentos."</h3>
				<a class="chart_checker" href="<?php echo site_url('como-medimos-el-discurso-politico'); ?>">
					<section id="global_chart" class="unit_chart drop_shadow radius_2 blue">
						<p class="dichos">Dichos <span><?php echo $dichos_percentage; ?></span></p>
						<p class="hechos">Hechos <span><?php echo $hechos_percentage; ?></span></p>
						<p class="centered">Hechos <br>vs <br>Dichos</p>
						<section class="pie chart_container">
							<canvas id="actual_piechart" class="actual_piechart"></canvas>
						</section>
					</section>
				</a>
				<h3 style="text-align:left;">"Estas son las veces que los hechos (cifras) utilizados por el columnista han resultado verdaderos o falsos."</h3>
				<a class="chart_checker" href="<?php echo site_url('como-medimos-el-discurso-politico'); ?>">
					<section id="said_chart" class="unit_chart bar_right topt drop_shadow radius_2 green">
						<p class="hechos">Hechos</p>
						<section class="bar chart_container">
							<div class="chart-col">
								<div class="ch-item">
									<?php echo $hechos['verdadero']."%"; ?> VERDADERO
									<div class="ver1" style="width: <?php echo $hechos['verdadero']; ?>%!important"></div>
								</div>
								<div class="ch-item">
									<?php echo $hechos['falso']."%"; ?> FALSO
									<div class="fal1" style="width: <?php echo $hechos['falso']; ?>%!important"></div>
								</div>
								<div class="chart-anim green"></div>
							</div>
						</section>
					</section>
				</a>
				<h3 style="text-align:left;">"Estas son las veces que los dichos (opiniones) utilizados por el columnista han resultado verdaderos, falsos, o verdades descontextualizadas."</h3>
				<a class="chart_checker" href="<?php echo site_url('como-medimos-el-discurso-politico'); ?>">
					<section id="fact_chart" class="unit_chart last bar_right drop_shadow radius_2 red">
						<p class="dichos">Dichos</p>
						<section class="bar chart_container">
							<div class="chart-col">
								<div class="ch-item">
									<?php echo $dichos['verdadero']."%"; ?> VERDADERO
									<div class="ver2" style="width: <?php echo $dichos['verdadero']; ?>%!important"></div>
								</div>
								<div class="ch-item">
									<?php echo $dichos['verdades_descontextualizadas']."%"; ?> VERDADES DESCONTEXTUALIZADAS
									<div class="verd2" style="width: <?php echo $dichos['verdades_descontextualizadas']; ?>%!important"></div>
								</div>
								<div class="ch-item">
									<?php echo $dichos['falso']."%"; ?> FALSO
									<div class="fal2" style="width: <?php echo $dichos['falso']; ?>%!important"></div>
								</div>
								<div class="chart-anim red"></div>
							</div>
						</section>
					</section>
				</a>
			</div><!-- charts -->

			<div class="separador">
				<span>¿DE QUIÉNES HABLA MÁS?</span>
			</div>

			<div class="tag_cloud">
	
				<?php 

					//print_r($opinologo);
					$args = array(
							'post_type' => 'wadafact',
							'tax_query' => array(
									array(
										'taxonomy' => 'opinologo',
										'field' => 'term_id',
										'terms' => $opinologo->term_id
									),
								),
							'posts_per_page' => -1,
							'post_status' => 'publish',
						); 

					$ids = get_posts($args);
		
					$ids_personajes = array();
					foreach($ids as $id):
						//$ids_posts[] = $id->ID;
						if(get_post_meta($id->ID, 'iter_persona_1', true)){
							$ids_personajes[] = get_post_meta($id->ID, 'iter_persona_1', true);
						}
						if(get_post_meta($id->ID, 'iter_persona_2', true)){
							$ids_personajes[] = get_post_meta($id->ID, 'iter_persona_2', true);
						}
						if(get_post_meta($id->ID, 'iter_persona_3', true)){
							$ids_personajes[] = get_post_meta($id->ID, 'iter_persona_3', true);
						}
					endforeach;
					$ids_personajes_conteo = array_count_values($ids_personajes);

					arsort($ids_personajes_conteo);

					foreach($ids_personajes_conteo as $x => $x_value) {
						$personaje = get_term_by('id', $x, 'personaje');

					    echo '<code class="tamano_fuente" data-id="' . $personaje->term_id . '" data-peso="' .$x_value. '">#'. $personaje->name . '<br> ('. $x_value. ')</code>';
					}	
				?>

			</div>

			<div class="separador">
				<span>¿DE QUÉ TEMAS HABLA MÁS?</span>
			</div>

			<div class="tag_cloud">
	
				<?php 

					//print_r($opinologo);
					$args = array(
							'post_type' => 'wadafact',
							'tax_query' => array(
									array(
										'taxonomy' => 'opinologo',
										'field' => 'term_id',
										'terms' => $opinologo->term_id
									),
								),
							'posts_per_page' => -1,
							'post_status' => 'publish',
						); 

					$ids = get_posts($args);
		
					$ids_personajes = array();
					foreach($ids as $id):
						//$ids_posts[] = $id->ID;
						if(get_post_meta($id->ID, 'iter_tema_1', true)){
							$ids_personajes[] = get_post_meta($id->ID, 'iter_tema_1', true);
						}
						if(get_post_meta($id->ID, 'iter_tema_2', true)){
							$ids_personajes[] = get_post_meta($id->ID, 'iter_tema_2', true);
						}
						if(get_post_meta($id->ID, 'iter_tema_3', true)){
							$ids_personajes[] = get_post_meta($id->ID, 'iter_tema_3', true);
						}
					endforeach;

					//print_r($ids_personajes);
					$ids_personajes_conteo = array_count_values($ids_personajes);
					arsort($ids_personajes_conteo);

					foreach($ids_personajes_conteo as $x => $x_value) {
						$personaje = get_term_by('id', $x, 'tema');

					    echo '<code class="tamano_fuente" data-id="' . $personaje->term_id . '" data-peso="' .$x_value. '">#'. $personaje->name . ' <br>('. $x_value. ')</code>';
					}
					?>

			</div>

			<hr class="divider">

			<h3>Más entregas de columna de <?php echo $n_opinologo; ?></h3>
			<div class="post-list">
			<?php
				if(have_posts()): while(have_posts()):
					the_post();
					$fecha = $post->post_date;
					$fecha = date('d/m/Y');
					$permalink = get_the_permalink($post->ID);
					$thumb_formatted = (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail($post->ID, "medium") : "";
					echo <<<HTML
					<a class="post columna" href=$permalink>
						<div class="thumb_container">
							$thumb_formatted
						</div>
						<span class="fecha"> $fecha </span>
						<span class="titulo_post_opinologo">Análisis de la entrega de columna: $post->post_title</span>
					</a>
HTML;
				endwhile; endif; ?>
			</div>

			<hr class="divider"></hr>
			<h3>El color de las plumas</h3>
			<div id="ensayo-wadafact" class="mini-wrapper full_two">
				<?php 
					$some_essays = fetch_some_essays($opinologo->term_id, 4);
					foreach ($some_essays as $each_essay):
						$random_thumb = (has_post_thumbnail($each_essay->ID)) ? get_the_post_thumbnail($each_essay->ID, "medium") : "";
						$permalink = get_the_permalink($each_essay->ID);
					echo <<<HTML
						<a class="post mini" href="$permalink">
							<div class="thumb_container">$random_thumb</div>
							<span>$each_essay->post_title</span>
						</a>
HTML;
					endforeach;

			?>
			</div>
			<!-- Share buttons -->
			<!-- <div class="addthis_sharing_toolbox center"></div> -->
			<br>
			<!-- /9262827/plumasatomicas_728x90_sup -->
			<div class="ad_space" id='div-gpt-ad-1465487084939-3' style='height:90px; width:100%;'>
				<script type='text/javascript'>
					googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465487084939-3'); });
				</script>
			</div>
			<br/>
			<br/>
			<!-- <div id="dissappear" class="mini-wrapper">
			<?php /*
				$some_news = fetch_some_random_news();
				foreach ($some_news as $random_news):
					$random_thumb = (has_post_thumbnail($random_news->ID)) ? get_the_post_thumbnail($random_news->ID, "medium") : "";
				$permalink = get_the_permalink($random_news->ID);
				echo <<<HTML
					<a class="post mini" href=$permalink>
						<div class="thumb_container">$random_thumb</div>
						<span>$random_news->post_title</span>
					</a>
HTML;
				endforeach;
*/
		?>
			</div> -->
			<!-- <div id="bottombar" style="margin-top:10px">
				<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
				<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
				<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
				<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
			</div> -->
		</div>
		<?php //get_template_part("sidebar", "cards"); ?>
	</div>

</section>

<?php get_footer(); ?>