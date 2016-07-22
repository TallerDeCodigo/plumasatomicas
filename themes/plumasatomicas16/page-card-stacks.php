<?php get_header(); ?>


	<?php 
		$args = array(
			'taxonomy' => 'stack',
    		'hide_empty' => true,
    	);

    	$stacks = get_terms($args);
    	foreach($stacks as $feat_stack):
    		$featured_stack_id = $feat_stack->term_id;
    		$thumb = get_term_meta($featured_stack_id, 'wp_image_card', true);
	?>
	<section id="fichas-men">
			<a class="ficha-main" href="<?php echo site_url('stack/'."$feat_stack->slug"); ?>">
				<img src="<?php echo $thumb['url']; ?>">
				<div id="sombreado">
					
				</div>
				<span class="titulo_stacks"><?php echo $feat_stack->name; ?></span>
				<br>
				<span><?php echo $feat_stack->count; ?> FICHAS</span>
			</a>
	</section>

	<?php endforeach; ?>

	<section id="fichas">
		<div class="wrapper normal">

		<?php 
			$args = array(
				'taxonomy' 		=> 'stack',
	    		'hide_empty' 	=> true,
	    		'exclude'		=> array($featured_stack_id)
	    	);

	    	$stacks2 = get_terms($args);
	    	foreach($stacks2 as $stack):
	    		

		?>
		<?php endforeach; ?>
		</div>
	</section>
	

<?php get_footer(); ?>