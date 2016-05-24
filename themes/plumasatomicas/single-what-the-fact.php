<?php 
	get_header();
	the_post();
	$terms = wp_get_post_terms( $post->ID, "opinologo");
	$opinologo = $terms[0];
	$grade = get_profile_grade($opinologo->term_id);

	$res_x = 50+$grade[x]*25;
	$res_y = 50+$grade[y]*25;

?>
<section id="post-sec">
	<div class="wrapper-special">
		<div class="contenido whatthefact">
			<code>#HASHTAG</code><br>
			<h1><?php the_title(); ?></h1>
			<nav>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/fb.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/tw.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/gp.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/pi.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/wp.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/em.png"></a>
			</nav>
			<?php if(has_post_thumbnail($post->ID)){ ?>
				<div class="imagen-post">
					<?php echo the_post_thumbnail('large'); ?>
				</div>
			<?php } ?>
			<!-- <h2>Proin a felis ac nisi facilisis rhoncus. Donec ac elit et neque luctus hendrerit non non sem. Sed vel nisi urna.</h2> -->
			<?php the_content(); ?>
			<div class="separador"><span>PERFIL</span></div>
			<div class="prefil" style="text-align:center">
				<div class="who">
					<div>
						<?php 
							if(get_term_meta($opinologo->term_id, 'wp_image_field_id', true)){

								$opinologo_img = get_term_meta($opinologo->term_id, 'wp_image_field_id', true);
								echo '<img src="'.$opinologo_img['url'].'">';
								
							} else {
								echo 'nothing really';
							}
						?>
					</div><br>
					<span><?php echo $opinologo->name; ?></span>
					<span><?php echo $opinologo->description; ?></span>
				</div>
				<div class="postura">
					<div>
						<img src="<?php echo THEMEPATH; ?>images/postura.svg">
						<div class="pointer" style="<?php echo 'left: '.($res_x-5).'%;'.'top: '.($res_y-5).'%;'; ?>"></div>
					</div><!-- <span>PROGRESISTA</span>
 -->				</div>
			</div>
			<div class="separador">
				<span>FACT CHECKER</span>
			</div>
			<blockquote class="quote"><?php echo get_post_meta($post->ID, 'argumento_uno', true); ?><br>
				<span><?php echo get_post_meta($post->ID, 'calif_argumento_uno', true); ?></span>
			</blockquote>
			
			<blockquote class="fact"><?php echo get_post_meta($post->ID, 'argumento_dos', true); ?><br>
				<span><?php echo get_post_meta($post->ID, 'calif_argumento_dos', true); ?></span>
			</blockquote>
			
			
			
			
			<nav>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/fb.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/tw.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/gp.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/pi.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/wp.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/em.png"></a>
			</nav>
				
		</div>
		<div class="sidebar"><div class="filler"></div>
			
			<a class="ficha-link" href="#"><div></div><span>Lorem ipsum dolor sit amet co</span><span>123 FICHAS</span></a>
			<a class="ficha-link" href="#"><div></div><span>Lorem ipsum dolor sit amet co</span><span>123 FICHAS</span></a>
			<a class="ficha-link" href="#"><div></div><span>Lorem ipsum dolor sit amet co</span><span>123 FICHAS</span></a>
			<div class="adver size2" style="margin-top:50px"></div>
			<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
			<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
			<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
			
			
		</div>
	</div>
</section>



<?php get_footer(); ?>