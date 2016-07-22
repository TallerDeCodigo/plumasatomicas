<?php
/*
    Template Name: Agenda Deportiva
*/

    get_header();
?>


    <span style="font-size: 48px; font-weight: 900">AGENDA</span>
    
    <?php

   

    $args = array(
    'post_type' => 'agenda',
    'post_status' => 'publish');    
    $agenda = new WP_Query($args);

    if ( $agenda->have_posts() ) : while ($agenda->have_posts()) : $agenda->the_post();
    ?>
    <?php $local = get_post_meta( $post->ID, '_equipo_local', true ); ?> 
    <?php $visitante = get_post_meta( $post->ID, '_equipo_visitante', true ); ?>
    <?php $liga = get_post_meta( $post->ID, '_liga', true ); ?>  
    <?php $fecha = get_post_meta( $post->ID, '_evento_fecha', true ); ?>
    <?php $hora = get_post_meta( $post->ID, '_evento_hora', true ); ?>
    <?php $canal = get_post_meta( $post->ID, '_evento_canal', true ); ?>
    <section class="content">
        <section class="single">
            <div class="agenda">
                <div class="info_agenda">
                    <div style="width: 100%; height: auto; float: left; padding: 5px 0 0 40px;">
                        <img width="40" height="40" style="float:left;" src="<?php echo get_thumb_equipo($local); ?> ">
                        <h4 class="equipo"><?php echo $local; ?></h4>
                    </div> 
                     <div style="width: 100%; height: auto; float: left; padding: 10px 0 0 40px;"> 
                        <img width="40" height="40" style="float:left;" src="<?php echo get_thumb_equipo($visitante); ?>">
                        <h4 class="equipo"><?php echo $visitante; ?></h4>
                    </div>         
                </div>    
                <div class="info_transmicion">
                    <span class="liga"><?php echo $liga; ?></span><br/>
                    <span class="fecha"><?php echo $fecha; ?></span><br/>
                    <span class="hora"><?php echo $hora; ?></span><br/>
                    <span class="canal"><?php echo $canal; ?></span>
                </div>    
            </div>    
        </section>
    </section>

    
    <?php endwhile; endif; ?>
     
     
<?php get_footer(); ?>