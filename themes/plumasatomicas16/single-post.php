<?php
 	get_header();
 	the_post(); ?>

<section id="post-sec">
	<div class="wrapper-special">
		<div class="contenido">
			<?php
				$hash = wp_get_post_terms($post->ID, "hashtag");
				if(!empty($hash))
				foreach($hash as $tag): ?>

				<code><?php echo "#".$tag->name; ?></code>
			<?php  
				endforeach; ?>
			<br>
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
			<nav>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/fb.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/tw.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/gp.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/pi.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/wp.png"></a>
				<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/em.png"></a>
			</nav>
		<!-- 	<div class="question"><div class="question-filler"></div><div class="mini-wrapper"><span>¿Lorem ipsum dolor sit amet, consectetur adipiscing<br>elit. Integer aliquam magna non erat semper?</span><br><a href="#">SI</a><a href="#">NO</a></div></div>
			<div class="adver size3"></div> -->
			<div class="comments">
				<div class="fb-comments" data-href="<?php echo get_permalink($post->ID); ?>" data-width="100%" data-numposts="5"></div>
			</div>
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
					endforeach; ?>
			</div>
			<!-- <div id="bottombar" style="margin-top:10px">
				<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
				<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
				<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
				<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
			</div> -->
		</div>
		<?php get_sidebar(); ?>
	</div>
</section>

<?php get_footer(); ?>