<aside id="sidebar-left">
	<!-- /9262827/plumasatomicas_300x250_int -->

	<!--
		ESPACIO PARA EL COMERCIAL EN EL SIDEBAR
		-->
	<div class="ad_space" id='div-gpt-ad-1465487084939-2'>
		<script type='text/javascript'>
			googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465487084939-2'); });
		</script>
	</div>
	<br/>
	<br/>
	<?php 
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 6,
			'offset' => 9
		);

		$side_posts = get_posts($args);
		
		foreach($side_posts as $post): setup_postdata($post);
		
	?>
	<a class="side-link" href="<?php the_permalink(); ?>">
		<div class="thumb_container">
		<?php
			if(has_post_thumbnail($post->ID)){
				$thumb = get_the_post_thumbnail_url($post->ID, "thumbnail");
				echo "<img src='{$thumb}'>";
			} ?>
		</div>
		<span class="fecha2"><?php  echo get_the_date(); ?></span>
		<span><?php the_title_limit( 60, '...'); ?></span>
	</a>
	<?php endforeach; wp_reset_query(); ?>
</aside>