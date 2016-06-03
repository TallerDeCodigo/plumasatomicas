<?php 
	get_header(); ?>
<section style="margin:120px 0px 15px 0px;">
	<div class="wrapper-special">
		<div class="archivo half news contenido">
			<h1>ARCHIVO</h1>

			<section class="post-list">
			<?php
			if(have_posts()): while(have_posts()): 
				the_post();
				$thumb_formatted = (has_post_thumbnail($post->ID)) ? "<img src='".get_the_post_thumbnail_url($post->ID, "medium")."'>" : "";
				$permalink 	= get_permalink($post->ID);
				$excerpt = wpautop($post->post_excerpt);
				echo <<<HTML

				<a class="post columna" href="$permalink">
					<div class="thumb_container">
						$thumb_formatted
					</div>
					<span>$post->post_title</span>
					<section class="excerpt">
						$excerpt
					</section>
				</a>
HTML;
			endwhile; endif; ?>
			</section>

			<div class="separador"></div>
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
		<?php get_template_part("sidebar"); ?>
	</div>
</section>

<?php get_footer(); ?>