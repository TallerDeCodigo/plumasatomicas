<?php

if ( function_exists( 'add_theme_support' ) )
        set_post_thumbnail_size( 640, 640, true );
        add_theme_support( 'post-thumbnails' );
        add_image_size('featured', 640, 640, true);
        add_image_size('featured_post', 300, 250, true);
        add_image_size('destacada', 1280, 640, true);

function sopitas_infinite_scroll_init() {
   add_theme_support( 'infinite-scroll', array(
    'type'              => 'sroll',  
    'container'         => 'content',
    'render'            => get_post_content,
    'wrapper'           => false,
    'footer'            => false,
    'posts_per_page' => 10,
    'footer_widgets' => false
    ) );
}


add_action( 'after_setup_theme', 'sopitas_infinite_scroll_init' );


 function  get_post_content() {
     get_template_part( 'content', get_post_format() );
 }


add_action('admin_menu', function(){
     add_meta_box( 'meta-box-home-type', 'Tipo de publicación', 'show_metabox_home_type', 'post', 'side', 'high' );
     add_meta_box( 'meta-box-home-agenda', 'Lanzadores de la publicación', 'show_metabox_home_kicker', 'post', 'normal', 'high' );

});


function show_metabox_home_type($post){

    global $wpdb, $post;
    $value          = (get_post_meta($post->ID, tpublicacion, true));
    $contet_post    = (get_post_meta($post->ID, tpublicacion_valor , true));
    $leer_mas       = (get_post_meta($post->ID, readmore , true));
    $p_destacada    = (get_post_meta($post->ID, p_destacada , true));

        echo "
        <div class='meta-container cf'>
            <input class='position_checkbox' type='radio' name='tpublicacion' value='1' ";
            echo ( $value == 1 ) ? 'checked> Normal <br/>' : '> Normal <br/>' ;
            echo "<input class='position_checkbox' type='radio' name='tpublicacion' value='2' ";
            echo ( $value == 2 ) ? 'checked> Tweet <br/>' : '> Tweet <br/>' ;
            echo "<input class='position_checkbox' type='radio' name='tpublicacion' value='7' ";
	    echo ( $value == 7 ) ? 'checked> Video FB <br/>' : '> Video FB <br/>' ;
            echo "<input class='position_checkbox' type='radio' name='tpublicacion' value='3' ";
            echo ( $value == 3 ) ? 'checked> Youtube <br/>' : '> Youtube <br/>' ;
            echo "<input class='position_checkbox' type='radio' name='tpublicacion' value='4' ";
            echo ( $value == 4 ) ? 'checked> Vine <br/>' : '> Vine<br/>' ;
            echo "<input class='position_checkbox' type='radio' name='tpublicacion' value='6' ";
            echo ( $value == 6 ) ? 'checked> Vimeo <br/>' : '> Vimeo<br/>' ;    
            echo "<input class='position_checkbox' type='radio' name='tpublicacion' value='5' ";
            echo ( $value == 5 ) ? 'checked> Instagram <br/>' : '> Instagram<br/><br/><br/>' ;
        echo "</div>";

        echo "Leer más: <input type='checkbox' name='readmore' value='1' ";  echo ( $leer_mas == 1 ) ? ' checked /> ' : '/>'  ;

        echo "<br/><br/>
            Valor: <br/> <textarea name='tpublicacion_valor' style='width: 250px; height:200px; resize: none;'>" . htmlspecialchars($contet_post) . "</textarea><br/><br/>";

        echo "<br/><br/> Destacado: <input type='checkbox' name='p_destacada' value='1' ";  echo ( $p_destacada == 1 ) ? ' checked /> ' : '/>'  ;


            
}


add_action('save_post', 'guardar_campos');
add_action('publish_post', 'guardar_campos');
add_action('save_post', 'save_agenda');
add_action('publish_post', 'save_agenda');



function guardar_campos() {
   global $wpdb, $post;
    if (!$post_id) $post_id = $_POST['post_ID'];
    if (!$post_id) return $post;
    
    $tipo_publicacion= $_POST['tpublicacion'];
    update_post_meta($post_id, 'tpublicacion', $tipo_publicacion);

    $valor_publicacion= $_POST['tpublicacion_valor'];
    update_post_meta($post_id, 'tpublicacion_valor', $valor_publicacion);

    $leermas = $_POST['readmore'];
    update_post_meta($post_id, 'readmore', $leermas);

    $p_destacada = $_POST['p_destacada'];
    update_post_meta($post_id, 'p_destacada', $p_destacada);


    
}

function show_metabox_home_kicker($post){ 


    $hashtag         = get_post_meta( $post->ID, 'hashtag', true );
    $kicker           = get_post_meta( $post->ID, 'kicker', true );
   
   echo '<br/>Lanzadores<br/><br/>';
   echo '<label for="hashtag"><strong>Hashtag: </strong></label>
   <input type="text" size="140" value="' . esc_attr( $hashtag ) . '" placeholder="#hashtag" name="hashtag"/><br/><br/><hr/>';
   echo '<br/><label for="kicker"><strong>kicker: </strong></label>
  <input type="text" size="200" placeholder="Subtitulo de la nota" value="' . esc_attr( $kicker ) . '" name="kicker"/>';


}

function save_agenda(){
    global $wpdb, $post;
    if (!$post_id) $post_id = $_POST['post_ID'];
    if (!$post_id) return $post;

    $hashtag         = $_POST['hashtag'];
    update_post_meta($post_id, 'hashtag', $hashtag);

    $kicker           = $_POST['kicker']; 
    update_post_meta($post_id, 'kicker', $kicker);

    

}




add_action('delete_post', 'borrar_campos');
function borrar_campos() {
   global $wpdb, $post;
    if (!$post_id) $post_id = $_POST['post_ID'];
    if (!$post_id) return $post;
    delete_post_meta($post_id, 'tpublicacion');
    delete_post_meta($post_id, 'tpublicacion_valor');
    delete_post_meta($post_id, 'readmore');
    delete_post_meta($post_id, 'p_destacada');
    delete_post_meta($post_id, 'hashtag');
    delete_post_meta($post_id, 'kicker');
    
}


// RSS FEED IMAGES ///////////////////////////////////////////////////////////////////



    add_theme_support( 'automatic-feed-links' );


    add_action('rss2_ns', function (){
        echo "xmlns:media='http://search.yahoo.com/mrss/'";
    });


    add_filter('rss2_item', function() use (&$post) {

        $thumbnail_id = get_post_thumbnail_id($post->ID);

        if ($thumbnail_id ) {
            $attachment_url = wp_get_attachment_url($thumbnail_id);
            $attributes     = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail' );
            $attachment_url = isset($attributes[0]) ? $attributes[0] : '';
            echo "<media:content url='$attachment_url' medium='image' />";
        }

    });

    


add_theme_support('automatic-feed-links');


/*
function myfeed_request($qv) {
    if (isset($qv['feed']))
        $qv['post_type'] = get_post_types();
    return $qv;
}
add_filter('request', 'myfeed_request');*/



/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';