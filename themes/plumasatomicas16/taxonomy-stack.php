<?php get_header();
	$objeto = get_queried_object();
	//print_r($objeto);
	$stack_id = $objeto->term_id;
	$stack_info = fetch_stack($stack_id);

 ?>

	
	<div id="ficha-icon"><a><img src="<?php echo THEMEPATH; ?>images/ficha-icon2.png"></a></div>
	<div id="menu-resp">
	<div class="wrap-resp">
		<h1><?php echo $stack_info['stack_name']; ?></h1>
		<!-- Share buttons -->
		<div class="addthis_sharing_toolbox"></div>
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
					<div id="elmenu" class="wrapper normal">
						<div class="nuevocell">
							<h1><?php echo $stack_info['stack_name']; ?></h1>
							
							<!-- Share buttons -->
							<div class="addthis_sharing_toolbox"></div>
							<p><?php echo $stack_info['stack_description']; ?></p>
							<a id="start-btn" class="fp-controlArrow fp-next">EMPEZAR</a>
						</div>
						<div id="lalista" class="nuevocell">
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
							<h1><?php echo $stack_info['stack_name']; ?></h1>
							
							<!-- Share buttons -->
							<div class="addthis_sharing_toolbox"></div>
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
				<div class="wrapper normal">
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
						<!-- Share buttons -->
						<div class="addthis_sharing_toolbox"></div>
						<a class="mover fp-controlArrow fp-prev"><img src="<?php echo THEMEPATH; ?>images/left.png"></a>
						<a class="mover fp-controlArrow fp-next"><img src="<?php echo THEMEPATH; ?>images/right.png"></a>
					</div>
				</div>
				</div>
			</div>
		<?php
			endforeach; ?>
		   
			<div class="single list" style="display:none">
				<h1><a href="<?php echo $stack_info['permalink']; ?>"><?php echo $stack_info['stack_name']; ?></a></h1>
				<!-- Share buttons -->
				<div class="addthis_sharing_toolbox"></div>
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