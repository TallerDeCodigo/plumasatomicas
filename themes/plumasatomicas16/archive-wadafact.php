<?php 
	get_header(); ?>
<section style="margin:120px 0px 15px 0px;">
	<div class="wrapper normal">
		<h1>WADAFACT</h1>
		<div class="separador"></div>
		<div class="archivo">

		<?php
			$columnists = fetch_columnists();
			foreach ($columnists as $each_columnist):
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
			endforeach;
			?>

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