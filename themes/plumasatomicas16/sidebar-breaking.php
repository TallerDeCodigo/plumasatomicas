<aside id="sidebar-left">
	<?php 
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 10,
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
		<span><?php the_title_limit( 35, '...'); ?></span>
	</a>
	<?php endforeach; wp_reset_query(); ?>
</aside>