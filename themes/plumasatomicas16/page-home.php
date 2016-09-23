	<?php get_header(); ?>

	<section id="shower">
		<?php 
			$args = array(
					'post_type' => 'post',
					'posts_per_page' => 1
				);
			$shower = get_posts($args);

			foreach($shower as $post): setup_postdata($post);

		?>
		<img src="<?php echo the_post_thumbnail_url(); ?>">
		<?php //the_post_thumbnail('header_img', array('id' => 'big-image')); ?>
		<div class="wrapper wide">
			<div class="new big">
				<?php
					$hash = wp_get_post_terms($post->ID, "hashtag");
					if(!empty($hash))
					foreach($hash as $tag): ?>

					<code><?php echo "#".$tag->name; ?></code>
				<?php  
					endforeach; ?>
				<span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
			</div>
		<?php endforeach; wp_reset_query(); ?>
		
			<div class="news-container">
				<?php 
					$args = array(
							'post_type' => 'post',
							'posts_per_page' => 2,
							'offset' => 1
						);

					$small = get_posts($args);
					foreach($small as $post): setup_postdata($post);
					
				?>
				<div class="new small">
					<?php
						$hash = wp_get_post_terms($post->ID, "hashtag");
						if(!empty($hash))
						foreach($hash as $tag): ?>

						<code><?php echo "#".$tag->name; ?></code>
					<?php  
						endforeach; ?>
					<br>
					<span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
				</div>
				<?php endforeach; wp_reset_query(); ?>
			</div>
		</div>
		
	</section>

	<!--
		ARTICLES
				-->
	<section id="articles">
		<div id="news-out" class="wrapper wide">
			<?php 
				$args = array(
						'post_type' => 'post',
						'posts_per_page' => 3,
						'offset' => 1
					);

				$small = get_posts($args);
				foreach($small as $post): setup_postdata($post); ?>

				<div class="new small">
					<?php
						$hash = wp_get_post_terms($post->ID, "hashtag");
						if(!empty($hash))
						foreach($hash as $tag): ?>

						<code><?php echo "#".$tag->name; ?></code>
					<?php  
						endforeach; ?>
					<br>
					<span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
				</div>
			<?php endforeach; wp_reset_query(); ?>
			
		</div>
		<div class="wrapper normal">

			<!-- /9262827/plumasatomicas_728x90_sup
					ESPACIO PARA EL BANNER DEL COMERCIAL BANNER TOP
			 -->
			 <div style="margin:0 auto;">
				<div class="ad_space"  id='div-gpt-ad-1465487084939-3' style='height:100%; width:100%; margin-top: 40px'>
					<script type='text/javascript'>
						googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465487084939-3'); });
					</script>
				</div>
			 </div>

		</div>
	</section>

	<section>
		<div class="wrapper normal">
			<?php get_template_part("sidebar", "breaking"); ?>
			<div id="home-content" class="home_curated">
				<?php 
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 5,
						'offset' => 4
					);
					$posts = get_posts($args);

					$count = 0;
					foreach($posts as $post): setup_postdata($post);
					// echo "<pre>";
					// 	print_r(the_title() . " ".get_the_date() );
					// echo "</pre>";
					$count ++; ?>

				<?php if($count == 1){ ?>
				<a id="grandot" class="post topp" href="<?php the_permalink(); ?>">
					<div class="thumb_container">
					<?php
						if(has_post_thumbnail($post->ID)){
							$thumb = get_the_post_thumbnail_url($post->ID, "full");
							echo "<img src='{$thumb}'>";
						} ?>
					</div>
					<span><?php echo get_the_date(); ?></span>
					<span><?php the_title(); ?></span>
				</a>
				<?php } else { ?>
				<a class="post mini" href="<?php the_permalink(); ?>">
					<div class="thumb_container">
					<?php
						if(has_post_thumbnail($post->ID)){
							$thumb = get_the_post_thumbnail_url($post->ID, "full");
							echo "<img alt='plumas atomicas' src='{$thumb}'>";
						} ?>
					</div>
					<span class="fecha"><?php echo get_the_date(); ?></span>
					<span><?php the_title(); ?></span>
				</a>
				<?php } endforeach; wp_reset_query(); ?>

			</div>
			<!-- <div id="bottombar">
				<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
				<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
				<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
				<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
				<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
				<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
				<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
				<a class="side-link" href="#"><div></div><span>Lorem ipsum dolor sit amet, consectetur adipis</span></a>
			</div> -->
			<div style="margin-bottom: 50px;">
			<?php
				$stacks = fetch_stacks(3);

				foreach ($stacks as $each_stack) : ?>
				 
					<a class="ficha-link" href="<?php echo $each_stack->permalink; ?>">
						<div class="thumb_container">
						<?php if($each_stack->thumb): ?>
							<img src="<?php echo $each_stack->thumb; ?>" alt="<?php $each_stack->name; ?>">
						<?php else: ?>
							<img src="<?php echo THEMEPATH; ?>images/placeholder_stack.png" alt="Image not available">
						<?php endif; ?>
						</div>
						<span><?php echo $each_stack->name; ?></span><br>
						<span><?php echo $each_stack->card_count; ?> FICHAS</span>
					</a>
			<?php
				endforeach; ?>	
			</div>	
		</div>
		<div class="clearfix"></div><br>
		<!-- 
			/9262827/plumas_atomicas_970x90 
			ESPACIO PARA EL BANNER COMERCIAL DEL FOOTER
		-->
		<div style="margin:0 auto;">
			<div class="ad_space"  id='div-gpt-ad-1465487084939-4' style='height:250px; width:970px;'>
				<script type='text/javascript'>
					googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465487084939-4'); });
				</script>
			</div>
		</div>

	</section>
	
	<?php get_footer(); ?>