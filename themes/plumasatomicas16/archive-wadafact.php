<?php 
	get_header(); ?>
<section style="margin:120px 0px 15px 0px;">
	<div class="wrapper normal">
		<div class="archivo wadafact clearfix">

			<div class="logo_wada clearfix">
				<img src="<?php echo THEMEPATH; ?>/images/wadafact_logo.png">
				<h3><a href="<?php echo site_url('como-medimos-el-discurso-politico'); ?>">¿Cómo medimos el discurso político?</a></h3>
			</div>
			<p class="intro">En Plumas Atómicas nos dimos a la tarea de crear una herramienta de análisis de las columnas de opinión política mexicanas. Wadafact es esa herramienta que te dejará ver claramente, hacia dónde se inclina un columnista y puedas entender mejor el panorama en los medios.</p>

			<p class="intro">¿Qué analizamos de las columnas? Simple: Si los argumentos se basan en Dichos o Hechos La postura política del columnista expresada en ese espacio Qué temas tocan más, qué temas evaden De qué personajes prefieren no hablar </p>

			<p>TOTAL DE COLUMNAS ANALIZADAS: </p>

			<section class="columnists_slider">
			
		<?php
			$columnists = fetch_columnists();
			echo "<section class='slider_page'>";
			foreach ($columnists as $each_columnist): ?>

				<article class="opinologo_columnista">
				<?php
						$thumb_formatted = ($each_columnist->thumb) ? "<img alt='$each_columnist->name' src='$each_columnist->thumb'>" : "";
						$permalink = site_url("opinologos/".$each_columnist->slug);
						$bio = $each_columnist->bio;
						$bio_chica = substr($bio ,0, 140);
						echo <<<HTML
						<a href="$permalink" class="who-archive who">
							<div class="thumb_container">
								$thumb_formatted
							</div>
							<br>
							<span>$each_columnist->name</span>
							<span class="bio_columnista">$bio_chica</span>
							<span>$each_columnist->position</span>
						</a>
HTML;
?>
				</article>
			<?php endforeach; ?>
				</section>
			</section>
			<hr class="divider">

			<h2>EL COLOR DE LAS PLUMAS: Nuestro análisis de las columnas</h2>

			<div id="ensayo-wadafact" class="mini-wrapper full_three">
				<?php 
					$some_essays = fetch_some_essays(NULL, 6);
					foreach ($some_essays as $each_essay):
						$random_thumb = (has_post_thumbnail($each_essay->ID)) ? get_the_post_thumbnail($each_essay->ID, "medium") : "";
						$permalink = get_the_permalink($each_essay->ID);
						// print_r($each_essay);
					echo <<<HTML
						<a class="post mini" href="$permalink">
							<div class="thumb_container">$random_thumb</div>
							<span>$each_essay->post_title</span>
							<p class="excerpt">$each_essay->post_excerpt</p>
						</a>
HTML;
					endforeach;

			?>
			</div>

			<!-- <hr class="divider"> -->
	</div>
</section>

<?php get_footer(); ?>