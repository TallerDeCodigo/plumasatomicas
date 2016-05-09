<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
<section id="post-sec">
	<div class="wrapper-special">
		<div class="contenido">
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
			<div class="imagen-post">
				<?php the_post_thumbnail('full'); ?>
			</div>
			<?php the_content(); ?>
			<?php endwhile; endif; wp_reset_postdata(); ?>
			<nav>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/fb.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/tw.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/gp.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/pi.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/wp.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/em.png"></a>
			</nav>
			<div class="question"><div class="question-filler"></div><div class="mini-wrapper"><span>¿Lorem ipsum dolor sit amet, consectetur adipiscing<br>elit. Integer aliquam magna non erat semper?</span><br><a href="#">SI</a><a href="#">NO</a></div></div>
			<div class="adver size3"></div>
			<div class="comments"></div>
			<div id="dissappear" class="mini-wrapper">
				<a class="post mini" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur</span></a>
				<a class="post mini" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur</span></a>
				<a class="post mini" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur</span></a>
				<a class="post mini" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur</span></a>
			</div>
			<div id="bottombar" style="margin-top:10px">
				<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
				<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
				<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
				<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
			</div>
		</div>
		<div class="sidebar"><div class="filler"></div>
			<div class="adver size1" style="margin-top:15px"></div>
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
			<div class="adver size1" style="margin-top:20px"></div>
		</div>
	</div>
</section>

<?php get_footer(); ?>