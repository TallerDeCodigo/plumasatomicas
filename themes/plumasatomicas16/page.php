<?php
 	get_header();
 	the_post(); ?>

<section id="post-sec">
	<div class="wrapper-special centrado">
		<div class="contenido longr">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>