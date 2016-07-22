<?php 
	get_header(); ?>
<section style="margin:120px 0px 15px 0px;">
	<div class="wrapper-special">
		<!-- /9262827/plumasatomicas_728x90_sup -->
		<div class="ad_space"  id='div-gpt-ad-1465487084939-3' style='height:90px; width:728px;'>
			<script type='text/javascript'>
				googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465487084939-3'); });
			</script>
		</div>

		<div class="archivo half news contenido">
			<h1>Resultados para: "<?php echo $_GET['s']; ?>"</h1>

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
				</a>
HTML;
			endwhile; endif; ?>
			</section>

			<div class="separador"></div>
		</div>
		<?php get_template_part("sidebar"); ?>
		<!-- /9262827/plumas_atomicas_970x90 -->
		<div class="ad_space"  id='div-gpt-ad-1465487084939-4' style='height:250px; width:970px;'>
			<script type='text/javascript'>
				googletag.cmd.push(function() { googletag.display('div-gpt-ad-1465487084939-4'); });
			</script>
		</div>
	</div>
</section>

<?php get_footer(); ?>