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
		<?php the_post_thumbnail('full', array('id' => 'big-image')); ?>
		<div class="wrapper wide">
			<div class="new big">
				<?php
					$tags = wp_get_post_tags($post->ID);
					//foreach($tags as $tag):
				?>
				<code>#HASHTAG</code>
				<?php // endforeach; ?>
				<span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
			</div>
		<?php endforeach; wp_reset_query(); ?>
		
			<div class="news-container">
				<?php 
					$args = array(
							'post_type' => 'post',
							'posts_per_page' => 3,
							'offset' => 1
						);

					$small = get_posts($args);
					foreach($small as $post): setup_postdata($post);
					
				?>
				<div class="new small">
					<code>#HASHTAG</code><br>
					<span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
				</div>
				<?php endforeach; wp_reset_query(); ?>
			</div>
		</div>
		
	</section>
	<section id="articles">
		<div id="news-out" class="wrapper wide">
			<?php 
				$args = array(
						'post_type' => 'post',
						'posts_per_page' => 3,
						'offset' => 1
					);

				$small = get_posts($args);
				foreach($small as $post): setup_postdata($post);
				
			?>
				<div class="new small">
					<code>#HASHTAG</code><br>
					<span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
				</div>
			<?php endforeach; wp_reset_query(); ?>
			
		</div>
		<div class="wrapper normal">
			<div class="adver size4" style="margin:50px 0px -10px">
		</div>
			<a class="ficha-link" href="#">
				<div>
					
				</div>
				<span>Lorem ipsum dolor sit amet co</span><br>
				<span>123 FICHAS</span>
			</a>
			<a class="ficha-link" href="#">
				<div></div>
				<span>Lorem ipsum dolor sit amet co</span><br>
				<span>123 FICHAS</span>
			</a>
			<a class="ficha-link" href="#">
				<div></div>
				<span>Lorem ipsum dolor sit amet co</span><br>
				<span>123 FICHAS</span>
			</a>
			<a id="last" class="ficha-link" href="#">
				<div></div>
				<span>Lorem ipsum dolor sit amet co</span><br>
				<span>123 FICHAS</span>
			</a>
		</div>
	</section>
	<section>
		<div class="wrapper normal">
			<div id="sidebar-left">
				<?php 
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 10,
						'offset' => 9
					);

					$side_posts = get_posts($args);
					
					foreach($side_posts as $post): setup_postdata($post);
					
					
				?>
				<a class="side-link" href="#">
					<div></div>
					<span><?php the_title_limit( 45, '...'); ?></span>
				</a>
				<?php endforeach; wp_reset_query(); ?>
			</div>
			<div id="home-content">
				<?php 
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 5,
						'offset' => 4
					);

					$posts = get_posts($args);
					$count = 0;
					foreach($posts as $post): setup_postdata($post);
					$count ++;
					
				?>

				<?php if($count == 1){ ?>
				<a id="grandot" class="post topp" href="<?php the_permalink(); ?>">
					<div></div>
					<span><?php the_title(); ?></span>
				</a>
				<?php } else { ?>
				<a class="post mini" href="<?php the_permalink(); ?>">
					<div></div>
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
		</div>
		<!-- <div class="wrapper normal" style="text-align:center">
			<div class="adver size4" style="margin:-20px 0px 60px"></div>
		</div> -->
	</section>
	
	<?php get_footer(); ?>