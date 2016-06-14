<?php 
	get_header();
	$opinologo = get_the_terms($post->ID, 'opinologo');
	$opinologo = !empty($opinologo) ? $opinologo[0] : NULL;
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
		<div class="contenido">
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
			<div class="postura">
					<div>
						<img src="<?php echo THEMEPATH; ?>images/postura.svg">
						<div class="pointer" style="<?php echo 'left: '.($res_x-5).'%;'.'top: '.($res_y-5).'%;'; ?>"></div>
					</div>
					<span><?php echo $x_axis_name."-".$y_axis_name; ?></span>
			</div>
			<nav>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/fb.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/tw.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/gp.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/pi.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/wp.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/em.png"></a>
			</nav>
			<div class="separador"></div>
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
			<nav>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/fb.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/tw.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/gp.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/pi.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/wp.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/em.png"></a>
			</nav>
			
			<div class="adver size3"></div>
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