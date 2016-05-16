<?php 
	get_header();
	the_post();
	$terms = wp_get_post_terms( $post->ID, "opinologo");
	$opinologo = $terms[0];
	$grade = get_profile_grade($opinologo->ID);

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
			<div class="imagen-post"><?php echo the_post_thumbnail('large'); ?></div>
			<!-- <h2>Proin a felis ac nisi facilisis rhoncus. Donec ac elit et neque luctus hendrerit non non sem. Sed vel nisi urna.</h2> -->
			<?php the_content(); ?>
			<div class="separador"><span>PERFIL</span></div>
			<div class="prefil" style="text-align:center">
				<div class="who">
					<div></div><br>
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
			<div class="separador"><span>FACT CHECKER</span></div>
			<blockquote class="quote">Proin a felis ac nisi facilisis rhoncus. Donec ac elit et neque luctus hendrerit non non sem. Sed vel nisi urna”<br><span>– LOREM IPSUM DOLOR SIT AMET</span></blockquote>
			<p>Aliquam erat volutpat. Morbi in leo tempus, pellentesque ligula at, porta sem. Maecenas dignissim, tellus a malesuada lacinia, nunc tortor accumsan dui, et rhoncus ipsum ante fermentum est. Donec sagittis facilisis ipsum, in consectetur lorem egestas vitae.</p>
			<blockquote class="fact">Proin a felis ac nisi facilisis rhoncus. Donec ac elit et neque luctus hendrerit non non sem. Sed vel nisi urna”<br><span>LOREM IPSUM DOLOR SIT AMET</span></blockquote>
			<div class="separador"><span>ITERACIÓN</span></div>
			<p>Aliquam erat volutpat. Morbi in leo tempus, pellentesque ligula at, porta sem. Maecenas dignissim, tellus a malesuada lacinia, nunc tortor accumsan dui, et rhoncus ipsum ante fermentum est. Donec sagittis facilisis ipsum, in consectetur lorem egestas vitae.</p>
			
			
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
			<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
			<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
			<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
			<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
			<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
			<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
			
		</div>
	</div>
</section>
<?php get_footer(); ?>