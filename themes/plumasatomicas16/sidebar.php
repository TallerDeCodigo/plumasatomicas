<div class="sidebar">
	<div class="filler"></div>
	<div class="adver size1" style="margin-top:15px"></div>
	<?php
		$card_stacks = fetch_stacks(3);
		foreach ($card_stacks as $each_stack) :
			echo <<<HTML
			<a class="ficha-link" data-id="$each_stack->ID" href="$each_stack->permalink">
				<div class="thumb_container"><img class="thumb_stack" src="$each_stack->thumb"></div>
				<span>$each_stack->name</span><span>$each_stack->card_count FICHAS</span>
			</a>
HTML;
		endforeach; ?>
	<div class="adver size2" style="margin-top:50px"></div>
	<?php 
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 10,
			'offset' => 9
		);

		$side_posts = get_posts($args);
		
		foreach($side_posts as $post): 
			setup_postdata($post); ?>
			<a class="side-link" href="#">
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
	<div class="adver size1" style="margin-top:20px"></div>
</div>