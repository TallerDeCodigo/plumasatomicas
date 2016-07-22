<?php 
	get_header();
	$opinologo = get_the_terms($post->ID, 'opinologo');
	$opinologo = !empty($opinologo) ? $opinologo[0] : NULL;
	$grade = get_profile_grade($opinologo->term_id);
	$truthfulness = get_profile_truthfulness($opinologo->term_id);
	file_put_contents(
		'/logs/php.log',
		var_export( $truthfulness, true ) . PHP_EOL,
		FILE_APPEND
	);
	extract($truthfulness);


	$res_x = 50+$grade[x]*25;
	$res_y = 50+$grade[y]*25;

	$x_axis_name = ($grade[x] <= -0.75) ? "Progresista" : "Centro";
	$x_axis_name = ($grade[x] >=  0.75) ? "Conservador" : $x_axis_name;
	$y_axis_name = ($grade[y] >=  0.5) ? "Totalitario" : "Centro";
	$y_axis_name = ($grade[y] <= -0.5) ? "Liberal"     : $y_axis_name;
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
			<a class="postura_link" href="<?php echo site_url('como-medimos-el-discurso-politico'); ?>"><div class="postura">
					<div>
						<img src="<?php echo THEMEPATH; ?>images/postura.svg">
						<div class="pointer" style="<?php echo 'left: '.($res_x-5).'%;'.'top: '.($res_y-5).'%;'; ?>"></div>
					</div><br>
					<!-- <span><?php echo $x_axis_name."-".$y_axis_name; ?></span> -->
			</div></a>
			
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
			<a class="chart_checker" href="<?php echo site_url('como-medimos-el-discurso-politico'); ?>">
				<section id="said_chart" class="unit_chart bar_right topt drop_shadow radius_2 green">
					<p class="hechos">Hechos</p>
					<section class="bar chart_container">
						<div class="chart-col">
							<div class="ch-item">
								<?php echo $dichos['verdadero']."%"; ?> VERDADERO
								<div class="ver1" style="width: <?php echo $dichos['verdadero']; ?>%!important"></div>
							</div>
							<div class="ch-item">
								<?php echo $dichos['falso']."%"; ?> FALSO
								<div class="fal1" style="width: <?php echo $dichos['falso']; ?>%!important"></div>
							</div>
							<div class="chart-anim green"></div>
						</div>
					</section>
				</section>
			</a>
			<a class="chart_checker" href="<?php echo site_url('como-medimos-el-discurso-politico'); ?>">
				<section id="fact_chart" class="unit_chart last bar_right drop_shadow radius_2 red">
					<p class="dichos">Dichos</p>
					<section class="bar chart_container">
						<div class="chart-col">
							<div class="ch-item">
								<?php echo $hechos['verdadero']."%"; ?> VERDADERO
								<div class="ver2" style="width: <?php echo $hechos['verdadero']; ?>%!important"></div>
							</div>
							<div class="ch-item">
								<?php echo $hechos['verdades_descontextualizadas']."%"; ?> VERDADES DESCONTEXTUALIZADAS
								<div class="verd2" style="width: <?php echo $hechos['verdades_descontextualizadas']; ?>%!important"></div>
							</div>
							<div class="ch-item">
								<?php echo $hechos['falso']."%"; ?> FALSO
								<div class="fal2" style="width: <?php echo $hechos['falso']; ?>%!important"></div>
							</div>
							<div class="chart-anim red"></div>
						</div>
					</section>
				</section>
			</a>
			
			<div id="ensayo-wadafact" class="mini-wrapper full_two">
				<?php 
					$some_essays = fetch_some_essays($opinologo->term_id, 4);
					foreach ($some_essays as $each_essay):
						$random_thumb = (has_post_thumbnail($each_essay->ID)) ? get_the_post_thumbnail($each_essay->ID, "medium") : "";
						$permalink = get_permalink();
					echo <<<HTML
						<a class="post mini" href="$permalink">
							<div class="thumb_container">$random_thumb</div>
							<span>$each_essay->post_title</span>
						</a>
HTML;
					endforeach;

			?>
			</div>

			<hr class="divider"></hr>
			<div class="post-list">
			<?php
				if(have_posts()): while(have_posts()):
					the_post();
					$permalink = get_the_permalink();
					$thumb_formatted = (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail($post->ID, "medium") : "";
					echo <<<HTML
					<a class="post columna" href="$permalink">
						<div class="thumb_container">
							$thumb_formatted
						</div>
						<span class="titulo_post_opinologo">$post->post_title</span>
					</a>
HTML;
				endwhile; endif; ?>
			</div>
			
			<!-- Share buttons -->
			<div class="addthis_sharing_toolbox center"></div>
			<br>
			<!-- /9262827/plumasatomicas_728x90_sup -->
			<div id='div-gpt-ad-1465487084939-3' style='height:90px; width:100%;'>
				<script type='text/javascript'>
					googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465487084939-3'); });
				</script>
			</div>
			<br>
			<div id="dissappear" class="mini-wrapper">
			<?php 
				$some_news = fetch_some_random_news();
				foreach ($some_news as $random_news):
					$random_thumb = (has_post_thumbnail($random_news->ID)) ? get_the_post_thumbnail($random_news->ID, "medium") : "";
				echo <<<HTML
					<a class="post mini" href="#">
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
		<?php get_template_part("sidebar", "cards"); ?>
	</div>

</section>

<?php get_footer(); ?>