<?php get_header();
	$stack_id = isset($_GET['id']) ? $_GET['id'] : NULL;
	$stack_info = fetch_stack($stack_id);

 ?>

	<header>
		<div class="wrapper normal">
			<nav class="menu">
				<div id="nav-icon3"><span></span><span></span><span></span><span></span></div>
				<a href="#"><img id="header-logo" width="289" height="56" src="<?php echo THEMEPATH; ?>images/logo.svg"></a>
			</nav>
			<nav class="social">
				<div class="searchbar">
					<form action="<?php echo site_url(); ?>" method="GET">
						<input type="text" value="Búsqueda" name="s">
					</form>
					<a><img src="<?php echo THEMEPATH; ?>images/header/search.png"></a>
				</div>
				<a><img id="header-search" src="<?php echo THEMEPATH; ?>images/header/search.png"></a>
				<a class="socc" href="#"><img src="<?php echo THEMEPATH; ?>images/header/fb.png"></a>
				<a class="socc" href="#"><img src="<?php echo THEMEPATH; ?>images/header/tw.png"></a>
				<a class="socc" href="#"><img src="<?php echo THEMEPATH; ?>images/header/yt.png"></a>
				<a class="socc" href="#"><img src="<?php echo THEMEPATH; ?>images/header/in.png"></a>
			</nav>
		</div>
	</header>
	<div id="ficha-icon" style="display:none"><a><img src="<?php echo THEMEPATH; ?>images/ficha-icon2.png"></a></div>
	<div id="menu-resp">
	<div class="wrap-resp">
		<h1><?php echo $stack_info['stack_name']; ?></h1>
		<nav>
			<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/fb.png"></a>
			<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/tw.png"></a>
			<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/wp.png"></a>
		</nav>
		<div id="list-resp">
			<ol>
				<li style="display:none"><a>null</a></li>
				<?php
				foreach ($stack_info['index'] as $index_elements) { ?>
					
					<li><a data-id="<?php echo $index_elements['index']; ?>	"><?php echo $index_elements['name']; ?></a></li>
				<?php
				} ?>
			</ol>
		</div>
		<div id="close-icon"><a><img src="<?php echo THEMEPATH; ?>images/close.png"></a></div>
	</div>
	</div>
	<section id="resumen">
	<img id="resumen-bkg" src="<?php echo $stack_info['stack_thumb']; ?>">
	<div id="fullpage">
		<div id="prueba-stack" class="section">
		    <div class="slide">
		    	<div class="card-container">
					<div id="res-cont" class="wrapper normal">
						<div class="cell">
							<h1><?php echo $stack_info['stack_name']; ?></h1>
							<nav>
								<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/fb.png"></a>
								<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/tw.png"></a>
								<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/wp.png"></a>
							</nav>
							<p><?php echo $stack_info['stack_description']; ?></p>
							<a id="start-btn" class="fp-controlArrow fp-next">EMPEZAR</a>
						</div>
						<div id="lalista" class="cell">
							<ol class="fp-slidesNav">
								<li style="display:none"><a>null</a></li>
							<?php
								foreach ($stack_info['index'] as $index_elements) { ?>
									
									<li><a data-id="<?php echo $index_elements['index']; ?>	"><?php echo $index_elements['name']; ?></a></li>
								<?php
								} ?>
							</ol>
						</div>
						<div id="resp-main">
							<h1><?php echo $stack_info['name']; ?></h1>
							<nav>
								<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/fb.png"></a>
								<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/tw.png"></a>
								<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/wp.png"></a>
							</nav>
							<p><?php echo $stack_info['stack_description']; ?></p>
							<div>
								<ol class="fp-slidesNav">
									<li style="display:none"><a>null</a></li>
								<?php
									foreach ($stack_info['index'] as $index_elements) { ?>
										
										<li><a data-id="<?php echo $index_elements['index']; ?>	"><?php echo $index_elements['name']; ?></a></li>
									<?php
									} ?>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
			foreach ($stack_info['pool'] as $pool_index => $each_pool_object) :
			 ?>
		    <div class="slide">
		    	<div class="card-container">
				<div id="res-cont" class="wrapper normal">
					<div class="single descrip">
						<div class="miheader">
							<span>FICHA <b><?php echo $pool_index+1; ?> de <?php echo $stack_info['card_count']; ?></b></span>
							<a class="fp-controlArrow fp-prev">
								<img src="<?php echo THEMEPATH; ?>images/up.png">
							</a>
							<a class="fp-controlArrow fp-next">
								<img src="<?php echo THEMEPATH; ?>images/down.png">
							</a>
						</div>
						<?php 
							// echo '<pre>';
							// print_r($each_pool_object);
							// echo '</pre>';
						?>
						<h1><?php echo $each_pool_object['name']; ?></h1>

						<?php
							 echo $each_pool_object['thumb']; 
							 //agregar clase ilustración
						?>
						<?php echo $each_pool_object['content']; ?>
						<nav>
							<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/fb.png"></a>
							<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/tw.png"></a>
							<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/wp.png"></a>
						</nav>
						<a class="mover fp-controlArrow fp-prev"><img src="<?php echo THEMEPATH; ?>images/left.png"></a>
						<a class="mover fp-controlArrow fp-next"><img src="<?php echo THEMEPATH; ?>images/right.png"></a>
					</div>
				</div>
				</div>
			</div>
		<?php
			endforeach; ?>
		   
			<div class="single list" style="display:none">
				<h1><?php echo $stack_info['stack_name']; ?></h1>
				<nav>
					<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/fb.png"></a>
					<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/tw.png"></a>
					<a href="#"><img src="<?php echo THEMEPATH; ?>images/social/wp.png"></a>
				</nav>
				<div id="list-container">
					<ol class="fp-slidesNav">
						<li style="display:none"><a>null</a></li>
					<?php
						foreach ($stack_info['index'] as $index_elements) { ?>
							
							<li><a data-id="<?php echo $index_elements['index']; ?>	"><?php echo $index_elements['name']; ?></a></li>
						<?php
						} ?>
					</ol>
				</div>
				<a id="up-btn" class="despla"><img src="<?php echo THEMEPATH; ?>images/up.png"></a>
				<a id="dw-btn" class="despla"><img src="<?php echo THEMEPATH; ?>images/down.png"></a>
			</div>
			
			<!--
			<div id="footer-cards">
				<span>Copyright © 2010 Plumas Atómicas. <a href="#">Términos y condiciones</a> | <a href="#">Políticas de privacidad</a></span>
			</div>
			-->
		</div>
	</div>
	</section>
<?php get_footer(); ?>