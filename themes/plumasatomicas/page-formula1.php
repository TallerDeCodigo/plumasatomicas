<?php
/*
    Template Name: Formula 1
*/
?>

<?php get_header();?>
<style>
	.header-content {
		max-width: 970px;
		margin: 0 auto;
	}
</style>
	<div id="content_p">	
		<div id="lateral_izquierda" class="p_lateral_izquierda">
			<div id="content" role="main">
        	<?php /* Start the Loop */ $r = 1; $c=0; 
        		$args = array(
			    	'posts_per_page' => 25,
			    	'category_name' => 'formula1',
			    );

        	?>
        	<?php $formula_post = new WP_Query( $args ); ?>
        	<?php if ( $formula_post->have_posts() ) : ?>
     			<?php while ($formula_post->have_posts() ) : $formula_post->the_post(); ?>
        		<?php get_template_part( 'content', get_post_format() ); ?>
      			<?php /* Start the Loop */ $r = $r + 1;  ?>
      			<?php if($r==6){ ?>
      			<div style="width: 100%; margin: 0px 0 30px 0; height: auto; float: left; border-bottom: 1px solid #ccc; padding-bottom: 30px;">  
        		<!-- deportes Mobile <?php echo $c; ?> -->
        			<div id='div-gpt-ad-1424475070665-<?php echo $c; ?>' style="width: 300px; margin: 0 auto;">
          				<script type='text/javascript'>
            				googletag.cmd.push(function() { googletag.display('div-gpt-ad-1424475070665-<?php echo $c; ?>'); });
          				</script>
        			</div>
      			</div>
      			<?php $r = 0; $c++; } ?>
      			<?php endwhile; ?>
      			<?php wp_reset_postdata(); ?>
      			<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php endif; ?>
      			<div class="nav-previous alignleft"><?php next_posts_link( 'ANTERIOR' ); ?></div>
      			<div class="nav-next alignright"><?php previous_posts_link( 'SIGUIENTE' ); ?></div>
			</div>
    	</div> 			
	</div>
	<div id="lateral_derecha" class="p_lateral_derecha">
		<div id="posiciones_pilotos">
			<div id="posiciones_pilotos_titulo" class="p_titulo_caja" style="margin-top: 20px;">
				<span class="p_titulo">POSICIONES</span><span class="p_subtitulo"> POR PILOTO</span>
			</div>
			<div id="posiciones_pilotos_lista" class="p_lista_caja" style="margin-top: 20px;">
				<?= file_exist_curl('http://lautrec.lisahosting.com/lisahosting.com/files/sopitas/sopitasxml/formula1/posiciones_piloto.xml')?get_posicion_piloto('http://lautrec.lisahosting.com/lisahosting.com/files/sopitas/sopitasxml/formula1/posiciones_piloto.xml'):'' ?>
			</div>
		</div>
		<div id="posiciones_equipos">
			<div id="posiciones_equipos_titulo" class="p_titulo_caja" style="margin-top: 20px;">
				<span class="p_titulo">POSICIONES</span><span class="p_subtitulo"> POR EQUIPO</span>
			</div>
			<div id="posiciones_equipos_lista" class="p_lista_caja">
				<?= file_exist_curl('http://lautrec.lisahosting.com/lisahosting.com/files/sopitas/sopitasxml/formula1/posiciones_equipo.xml')?get_posicion_equipo('http://lautrec.lisahosting.com/lisahosting.com/files/sopitas/sopitasxml/formula1/posiciones_equipo.xml'):'' ?>
			</div>
		</div>
		<div id="calendario">
			<div id="calendario_titulo" class="p_titulo_caja">
				<span class="p_titulo">CALENDARIO</span>
			</div>
			<div id="calendario_lista" class="p_lista_caja">
				<?= file_exist_curl('http://lautrec.lisahosting.com/lisahosting.com/files/sopitas/sopitasxml/formula1/calendario.xml')?get_calendario('http://lautrec.lisahosting.com/lisahosting.com/files/sopitas/sopitasxml/formula1/calendario.xml'):'' ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>