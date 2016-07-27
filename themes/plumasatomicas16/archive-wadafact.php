<?php 
	get_header(); ?>
<section style="margin:120px 0px 15px 0px;">
	<div class="wrapper normal">
		<div class="archivo wadafact clearfix">

			<div class="logo_wada clearfix">
				<img src="<?php echo THEMEPATH; ?>/images/wadafact_logo.png">
				<h3><a href="<?php echo site_url('como-medimos-el-discurso-politico'); ?>">¿Cómo medimos el discurso político?</a></h3>
			</div>

			<section class="columnists_slider">
				<div class="cycle-pager"></div>
		<?php
			$count = 1;
			$columnists = fetch_columnists();
			echo "<section class='slider_page'>";
			foreach ($columnists as $each_columnist):
				$render_row = ( $count % 6 == 0 ) 	? TRUE 	: FALSE; ?>

				<article class="opinologo_columnista">
				<?php
						$thumb_formatted = ($each_columnist->thumb) ? "<img src='$each_columnist->thumb'>" : "";
						$permalink = site_url("opinologos/".$each_columnist->slug);
						$bio = $each_columnist->bio;
						$bio_chica = substr($bio ,0, 140).'<br />...ver más';
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
			<?php 
				if( $count === count($columnists) ){
					echo "</section>";
				}else if($render_row AND $count){
					echo "</section><section class='slider_page'>";
				}
				$count++;
			endforeach; ?>
			</section>
			<hr class="divider">
			<div id="ensayo-wadafact" class="mini-wrapper full_three">
				<?php 
					$some_essays = fetch_some_essays(NULL, 6);
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

			<hr class="divider">
	</div>
</section>

<?php get_footer(); ?>