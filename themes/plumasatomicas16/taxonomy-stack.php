<?php 
	get_header();
	$stack = get_the_terms($post->ID, 'stack');
	$stack = !empty($stack) ? $stack[0] : NULL; ?>

	<section id="fichas-men">
			<a class="ficha-main"><div id="sombreado"><img src="images/2.png"></div><span>LOREM IPSUM DOLOR SIT AMET, CONSECTETÚR ADIPISCING ELIT. INTEGER</span><br><span>123 FICHAS</span></a>
	</section>
	<section id="fichas">
		<div class="wrapper normal">
			<a class="ficha-link" href="#"><div></div><span>Lorem ipsum dolor sit amet co</span><span>123 FICHAS</span></a>
			<a class="ficha-link" href="#"><div></div><span>Lorem ipsum dolor sit amet co</span><span>123 FICHAS</span></a>
			<a class="ficha-link" href="#"><div></div><span>Lorem ipsum dolor sit amet co</span><span>123 FICHAS</span></a>
			<a class="ficha-link" href="#"><div></div><span>Lorem ipsum dolor sit amet co</span><span>123 FICHAS</span></a>
			<a class="ficha-link" href="#"><div></div><span>Lorem ipsum dolor sit amet co</span><span>123 FICHAS</span></a>
			<a class="ficha-link" href="#"><div></div><span>Lorem ipsum dolor sit amet co</span><span>123 FICHAS</span></a>
			<a class="ficha-link" href="#"><div></div><span>Lorem ipsum dolor sit amet co</span><span>123 FICHAS</span></a>
			<a class="ficha-link" href="#"><div></div><span>Lorem ipsum dolor sit amet co</span><span>123 FICHAS</span></a>
			<a class="ficha-link" href="#"><div></div><span>Lorem ipsum dolor sit amet co</span><span>123 FICHAS</span></a>
			<a class="ficha-link" href="#"><div></div><span>Lorem ipsum dolor sit amet co</span><span>123 FICHAS</span></a>
			<a class="ficha-link" href="#"><div></div><span>Lorem ipsum dolor sit amet co</span><span>123 FICHAS</span></a>
			<a class="ficha-link" href="#"><div></div><span>Lorem ipsum dolor sit amet co</span><span>123 FICHAS</span></a>
		</div>
	</section>
	
<?php get_footer(); ?>