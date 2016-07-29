<?php 
	get_header();
	the_post();
	$terms = wp_get_post_terms( $post->ID, "opinologo");
	$opinologo = $terms[0];
	$grade = get_profile_grade($opinologo->term_id);
	
	$res_x = 50+$grade[x]*25;
	$res_y = 50+$grade[y]*25;

	$x_axis_name = ($grade[x] <= -0.75) ? "Progresista" : "Centro";
	$x_axis_name = ($grade[x] >=  0.75) ? "Conservador" : $x_axis_name;
	$y_axis_name = ($grade[y] >=  0.5) ? "Totalitario" : "Centro";
	$y_axis_name = ($grade[y] <= -0.5) ? "Liberal"     : $y_axis_name;
?>
<section id="post-sec">
	<div class="wrapper-special">
		<div class="contenido whatthefact">
			<h1><?php the_title(); ?></h1>
		<?php if(has_post_thumbnail($post->ID)){ ?>
			<div class="imagen-post">
				<?php the_post_thumbnail($post->ID, 'full'); ?>
			</div>
		<?php } ?>
		<?php the_content(); ?>
		<a class="link_nota_src" target="_blank" href="<?php echo get_post_meta($post->ID, 'source_url_columna', true); ?>">Link a la nota.</a>
		<br /><br />
			<div class="separador">
				<span>PERFIL</span>
			</div>
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
				<span><a href="<?php echo site_url("opinologos/".$opinologo->slug); ?>"><?php echo $opinologo->name; ?></a></span>
				<span><?php echo $opinologo->description; ?></span>
			</div>
			<a class="postura_link" href="<?php echo site_url('como-medimos-el-discurso-politico'); ?>"><div class="postura">
					<div>
						<img src="<?php echo THEMEPATH; ?>images/postura.svg">
						<div class="pointer" style="<?php echo 'left: '.($res_x-5).'%;'.'top: '.($res_y-5).'%;'; ?>"></div>
					</div>
					<!-- <span><?php echo $x_axis_name."-".$y_axis_name; ?></span> -->
			</div></a>
	<?php 
		$hecho_1 = get_post_meta($post->ID, 'argumento_uno', true);
		$hecho_1_link = get_post_meta($post->ID, 'link_hecho_1', true);
		$hecho_1_calificacion = get_post_meta($post->ID, 'calif_argumento_uno', true);
		if($hecho_1 !== "" AND $hecho_2 !== ""): ?>	
			<div class="separador">
				<span>HECHOS</span>
			</div>
		<?php
		endif;
			if($hecho_1 !== ""): ?>
				<blockquote class="quote quote_opinologo fact <?php echo $hecho_1_calificacion; ?>"><?php echo $hecho_1; ?>
					<br>
					<span class="<?php echo "btn_".$hecho_1_calificacion; ?>"><?php echo $hecho_1_calificacion ?></span>
					<?php if($hecho_1_link):?>
						<a href="<?php echo $hecho_1_link; ?>"><span class="link">prueba</span></a>
					<?php endif; ?>
				</blockquote>
		<?php
			endif;

			$hecho_2 = get_post_meta($post->ID, 'argumento_dos', true);
			$hecho_2_link = get_post_meta($post->ID, 'link_hecho_2', true);
			$hecho_2_calificacion = get_post_meta($post->ID, 'calif_argumento_dos', true);
			if($hecho_2 !== ""): ?>
				<blockquote class="quote quote_opinologo fact <?php echo $hecho_1_calificacion; ?>"><?php echo $hecho_2; ?>
					<br>
					<span class="<?php echo "btn_".$hecho_1_calificacion; ?>"><?php echo $hecho_2_calificacion ?></span>
					<?php if($hecho_2_link):?>
						<a href="<?php echo $hecho_2_link; ?>"><span class="link">prueba</span></a>
					<?php endif; ?>
				</blockquote>
		<?php
			endif; ?>
	<?php 
		$dicho_1 = get_post_meta($post->ID, 'argumento_tres', true);
		$dicho_1_link = get_post_meta($post->ID, 'link_dicho_1', true);
		$dicho_1_calificacion = get_post_meta($post->ID, 'calif_argumento_tres', true);
		if($dicho_1 !== "" AND $dicho_2 !== ""): ?>	
			<div class="separador">
				<span>DICHOS</span>
			</div>
		<?php
		endif;
			if($dicho_1 !== ""): ?>
				<blockquote class="quote quote_opinologo <?php echo $dicho_1_calificacion; ?>"><?php echo $dicho_1; ?>
					<br>
					<span class="<?php echo "btn_".$dicho_1_calificacion; ?>"><?php echo $dicho_1_calificacion ?></span>
					<?php if($dicho_1_link):?>
						<a href="<?php echo $dicho_1_link; ?>"><span class="link">prueba</span></a>
					<?php endif; ?>
					<p>Comentario: <?php echo get_post_meta($post->ID, 'comentario_dicho_1', true); ?></p>
				</blockquote>
		<?php
			endif; 
			$dicho_2 = get_post_meta($post->ID, 'argumento_cuatro', true);
			$dicho_2_link = get_post_meta($post->ID, 'link_dicho_2', true);
			$dicho_2_calificacion = get_post_meta($post->ID, 'calif_argumento_cuatro', true);
			if($dicho_2 !== ""): ?>
				<blockquote class="quote quote_opinologo <?php echo $dicho_2_calificacion; ?>"><?php echo $dicho_2; ?>
					<br>
					<span class="<?php echo "btn_".$dicho_2_calificacion; ?>"><?php echo $dicho_2_calificacion ?></span>
					<?php if($dicho_2_link):?>
						<a href="<?php echo $dicho_2_link; ?>"><span class="link">prueba</span></a>
					<?php endif; ?>
					<p>Comentario: <?php echo get_post_meta($post->ID, 'comentario_dicho_2', true); ?></p>
				</blockquote>
		<?php
			endif; ?>

		<div class="separador">
				<span><span>¿DE QUIÉNES HABLA MÁS?</span></span>
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
					//print_r($ids_personajes);
					$ids_personajes_conteo = array_count_values($ids_personajes);
					//print_r($ids_personajes_conteo);
					$ids_finales = array_unique($ids_personajes);

					foreach($ids_finales as $id_personaje):
						$personaje = get_term_by('id', $id_personaje, 'personaje');
					?>
					
					<code data-peso="<?php echo $ids_personajes_conteo[$id_personaje]; ?>">#<?php echo $personaje->name; ?></code>

					<?php endforeach;?>

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
					//print_r($ids_personajes_conteo);
					$ids_finales = array_unique($ids_personajes);

					foreach($ids_finales as $id_personaje):
						$personaje = get_term_by('id', $id_personaje, 'tema');
					?>
					
					<code data-peso="<?php echo $ids_personajes_conteo[$id_personaje]; ?>">#<?php echo $personaje->name; ?></code>

					<?php endforeach;?>

			</div>
			
			<hr class="divider"></hr>

			<div class="addthis_sharing_toolbox center"></div>

			<hr class="divider"></hr>
			<div class="post-list">
				<?php
				$by_same_guy = fetch_by_same_columnist($opinologo->term_id, 3, array($post->ID));
				foreach ($by_same_guy as $each_column):
					$permalink = get_the_permalink($each_column->ID);
					$same_thumb = (has_post_thumbnail($each_column->ID)) ? get_the_post_thumbnail($each_column->ID, "medium") : "";
					
					echo <<<HTML
					<a class="post columna" href="$permalink">	
						<div class="thumb_container">
							$same_thumb
						</div>
						<span class="titulo_post_opinologo">$each_column->post_title</span>
					</a>
HTML;
				endforeach; ?>
			</div>
			
			<div class="addthis_sharing_toolbox center"></div>

			<div class="comments">
				<div class="fb-comments" data-href="<?php echo get_permalink($post->ID); ?>" data-width="100%" data-numposts="5"></div>
			</div>
			
			<!-- /9262827/plumasatomicas_728x90_sup -->
			<div class="ad_space" id='div-gpt-ad-1465487084939-3' style='height:250px; width:970px;'>
				<script type='text/javascript'>
					googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465487084939-3'); });
				</script>
			</div>
			<div id="dissappear" class="mini-wrapper">
				<?php 
				$some_news = fetch_some_random_news();
				foreach ($some_news as $random_news):
					$permalink = get_the_permalink($random_news->ID);
					$random_thumb = (has_post_thumbnail($random_news->ID)) ? get_the_post_thumbnail($random_news->ID, "medium") : "";
				echo <<<HTML
					<a class="post mini" href="$permalink">
						<div class="thumb_container">$random_thumb</div>
						<span>$random_news->post_title</span>
					</a>
HTML;
				endforeach;

		?>
			</div>
			<!-- <div id="bottombar" style="margin-top:10px">
				<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
				<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
				<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
				<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
			</div> -->
		</div>

		<?php get_template_part("sidebar", "cards" ); ?>

	</div>
</section>



<?php get_footer(); ?>