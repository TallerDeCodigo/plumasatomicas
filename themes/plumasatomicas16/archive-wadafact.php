<?php 
	get_header(); ?>
<section style="margin:120px 0px 15px 0px;">
	<div class="wrapper normal">
		<div class="archivo wadafact clearfix">

			<div class="logo_wada clearfix">
				<img src="<?php echo THEMEPATH; ?>/images/wadafact_logo.png">
				<h3>¿Cómo medimos el discurso político?</h3>
			</div>
		<?php
			$columnists = fetch_columnists();
			foreach ($columnists as $each_columnist):
		?>

		<div class="opinologo_columnista">
		<?php
				$thumb_formatted = ($each_columnist->thumb) ? "<img src='$each_columnist->thumb'>" : "";
				$permalink = site_url("opinologos/".$each_columnist->slug);
				echo <<<HTML
				<a href="$permalink" class="who-archive who">
					<div class="thumb_container">
						$thumb_formatted
					</div>
					<br>
					<span>$each_columnist->name</span>
					<span>$each_columnist->bio</span>
					<span>$each_columnist->position</span>
				</a>
HTML;

		?>

		</div>
		<?php endforeach; ?>


			<!-- <nav class="archii">
				<a class="arrow leftside" href="#"><img src="images/arrow.svg"></a>
				<a class="arrow rightside" href="#"><img src="images/arrow.svg"></a>
				<a href="#">1</a>
				<a href="#">2</a>
				<a href="#">3</a>
				<a href="#">4</a>
				<a href="#">5</a>
				<a href="#">6</a>
				<a href="#">7</a>
				<a href="#">8</a>
				<a href="#">9</a>
			</nav> -->
		</div>
	</div>
</section>

<?php get_footer(); ?>