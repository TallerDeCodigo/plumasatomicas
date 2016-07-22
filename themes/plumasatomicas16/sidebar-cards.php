<div class="sidebar">
	<div class="filler"></div>
	<!-- /9262827/plumas_atomicas_300x600 -->
	<div id='div-gpt-ad-1465487084939-0-a' style='height:600px; width:300px;'>
		<script type='text/javascript'>
			googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465487084939-0'); });
		</script>
	</div>
	<br>
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
	<!-- /9262827/plumasatomicas_300x250_int -->
	<br>
	<div id='div-gpt-ad-1465487084939-2'>
		<script type='text/javascript'>
			googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465487084939-2'); });
		</script>
	</div>
	<br>
	<?php 
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 10,
			'offset' => 9
		);

		$side_posts = get_posts($args);
		
		foreach($side_posts as $post): 
			setup_postdata($post); ?>
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
	<br>
	<!-- /9262827/plumas_atomicas_300x600 -->
	<div id='div-gpt-ad-1465487084939-0' style='height:600px; width:300px;'>
		<script type='text/javascript'>
			googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465487084939-0'); });
		</script>
	</div>
</div>