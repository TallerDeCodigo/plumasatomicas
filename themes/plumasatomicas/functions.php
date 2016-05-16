<?php


// DEFINIR LOS PATHS A LOS DIRECTORIOS DE JAVASCRIPT Y CSS ///////////////////////////



	define( 'JSPATH', get_template_directory_uri() . '/js/' );

	define( 'CSSPATH', get_template_directory_uri() . '/css/' );

	define( 'THEMEPATH', get_template_directory_uri() . '/' );
	
	define( 'SITEURL', site_url('/') );



// FRONT END SCRIPTS AND STYLES //////////////////////////////////////////////////////



	add_action( 'wp_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'plugins', JSPATH.'plugins.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'functions', JSPATH.'functions.js', array('plugins'), '1.0', true );

		// localize scripts
		wp_localize_script( 'functions', 'ajax_url', admin_url('admin-ajax.php') );

		// styles
		wp_enqueue_style( 'styles', get_stylesheet_uri() );

	});



// ADMIN SCRIPTS AND STYLES //////////////////////////////////////////////////////////



	add_action( 'admin_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'admin-js', JSPATH.'admin.js', array('jquery'), '1.0', true );

		// localize scripts
		wp_localize_script( 'admin-js', 'ajax_url', admin_url('admin-ajax.php') );

		// styles
		wp_enqueue_style( 'admin-css', CSSPATH.'admin.css' );

	});



// FRONT PAGE DISPLAYS A STATIC PAGE /////////////////////////////////////////////////



	/*add_action( 'after_setup_theme', function () {
		
		$frontPage = get_page_by_path('home', OBJECT);
		$blogPage  = get_page_by_path('blog', OBJECT);
		
		if ( $frontPage AND $blogPage ){
			update_option('show_on_front', 'page');
			update_option('page_on_front', $frontPage->ID);
			update_option('page_for_posts', $blogPage->ID);
		}
	});*/



// REMOVE ADMIN BAR FOR NON ADMINS ///////////////////////////////////////////////////



	add_filter( 'show_admin_bar', function($content){
		return ( current_user_can('administrator') ) ? $content : false;
	});



// CAMBIAR EL CONTENIDO DEL FOOTER EN EL DASHBOARD ///////////////////////////////////



	add_filter( 'admin_footer_text', function() {
		echo 'Creado por <a href="http://tallerdecodigo.com">TDC</a>. ';
		echo 'Powered by <a href="http://www.wordpress.org">WordPress</a>';
	});



// POST THUMBNAILS SUPPORT ///////////////////////////////////////////////////////////



	if ( function_exists('add_theme_support') ){
		add_theme_support('post-thumbnails');
	}

	if ( function_exists('add_image_size') ){
		
		// add_image_size( 'size_name', 200, 200, true );
		
		// cambiar el tamaño del thumbnail
		/*
		update_option( 'thumbnail_size_h', 100 );
		update_option( 'thumbnail_size_w', 200 );
		update_option( 'thumbnail_crop', false );
		*/
	}



// POST TYPES, METABOXES, TAXONOMIES AND CUSTOM PAGES ////////////////////////////////



	require_once('inc/post-types.php');


	require_once('inc/metaboxes.php');


	require_once('inc/taxonomies.php');


	require_once('inc/pages.php');


	require_once('Tax-meta-class/Tax-meta-class.php');
	
	
// MODIFICAR EL MAIN QUERY ///////////////////////////////////////////////////////////



	add_action( 'pre_get_posts', function($query){

		if ( $query->is_main_query() and ! is_admin() ) {

		}
		return $query;

	});



// THE EXECRPT FORMAT AND LENGTH /////////////////////////////////////////////////////



	/*add_filter('excerpt_length', function($length){
		return 20;
	});*/


	/*add_filter('excerpt_more', function(){
		return ' &raquo;';
	});*/



// REMOVE ACCENTS AND THE LETTER Ñ FROM FILE NAMES ///////////////////////////////////



	add_filter( 'sanitize_file_name', function ($filename) {
		$filename = str_replace('ñ', 'n', $filename);
		return remove_accents($filename);
	});



// HELPER METHODS AND FUNCTIONS //////////////////////////////////////////////////////



	/**
	 * Print the <title> tag based on what is being viewed.
	 * @return string
	 */
	function print_title(){
		global $page, $paged;

		wp_title( '|', true, 'right' );
		bloginfo( 'name' );

		// Add a page number if necessary
		if ( $paged >= 2 || $page >= 2 ){
			echo ' | ' . sprintf( __( 'Página %s' ), max( $paged, $page ) );
		}
	}



	/**
	 * Imprime una lista separada por commas de todos los terms asociados al post id especificado
	 * los terms pertenecen a la taxonomia especificada. Default: Category
	 *
	 * @param  int     $post_id
	 * @param  string  $taxonomy
	 * @return string
	 */
	function print_the_terms($post_id, $taxonomy = 'category'){
		$terms = get_the_terms( $post_id, $taxonomy );

		if ( $terms and ! is_wp_error($terms) ){
			$names = wp_list_pluck($terms ,'name');
			echo implode(', ', $names);
		}
	}



	/**
	 * Regresa la url del attachment especificado
	 * @param  int     $post_id
	 * @param  string  $size
	 * @return string  url de la imagen
	 */
	function attachment_image_url($post_id, $size){
		$image_id   = get_post_thumbnail_id($post_id);
		$image_data = wp_get_attachment_image_src($image_id, $size, true);
		echo isset($image_data[0]) ? $image_data[0] : '';
	}



	/*
	 * Echoes active if the page showing is associated with the parameter
	 * @param  string $compare, Array $compare
	 * @param  Bool $echo use FALSE to use with php, default is TRUE to echo value
	 * @return string
	 */
	function nav_is($compare = array(), $echo = TRUE){

		$query = get_queried_object();
		$inner_array = array();
		if(gettype($compare) == 'string'){
			
			$inner_array[] = $compare;
		}else{
			$inner_array = $compare;
		}

		foreach ($inner_array as $value) {
			if( isset($query->slug) AND preg_match("/$value/i", $query->slug)
				OR isset($query->name) AND preg_match("/$value/i", $query->name)
				OR isset($query->rewrite) AND preg_match("/$value/i", $query->rewrite['slug'])
				OR isset($query->post_name) AND preg_match("/$value/i", $query->post_name)
				OR isset($query->post_title) AND preg_match("/$value/i", remove_accents(str_replace(' ', '-', $query->post_title) ) ) )
			{
				if($echo){
					echo 'active';
				}else{
					return 'active';
				}
				return FALSE;
			}

		}
		return FALSE;
	}

	/*
	 * Get grade by column
	 * @param $post_id
	 */
	function get_column_grade($post_id = NULL){
		$array_califs = array();
		$calif = array();
		$factor = 1;
		$count_elems = 0;
		$array_califs['social'][] 	= get_post_meta($post_id, 'social_axis_p1', TRUE);
		$array_califs['social'][] 	= get_post_meta($post_id, 'social_axis_p2', TRUE);
		$array_califs['social'][] 	= get_post_meta($post_id, 'social_axis_p3', TRUE);
		$array_califs['economic'][] = get_post_meta($post_id, 'economic_axis_p1', TRUE);
		$array_califs['economic'][]	= get_post_meta($post_id, 'economic_axis_p2', TRUE);
		$array_califs['economic'][] = get_post_meta($post_id, 'economic_axis_p3', TRUE);

		/** Loop through social grade **/
		foreach ($array_califs['social'] as $social_bits) {
			if($social_bits != 0)
				$count_elems ++;
			$acum_social += $social_bits;
		}
		/** Loop through economic grade **/
		foreach ($array_califs['economic'] as $economic_bits) {
			if($economic_bits != 0)
				$count_elems ++;
			$acum_economic += $economic_bits;
		}
		if($count_elems == 1){
			$factor = 0.5;
		}else if($count_elems == 0){
			$factor = 0.25;
		}

		$calif[x] = $acum_social * $factor;
		$calif[y] = $acum_economic * $factor;

		return $calif;
	}

	// $grade = get_column_grade(376172);
	

	 /*
	 * Get grade by column
	 * @param $opinologo
	 */
	function get_profile_grade($opinologo = NULL){
		
		$global = array();
		$args = array(
					'post_type' => 'what-the-fact',
					'tax_query' => 	array(
										array(
										'taxonomy' => 'opinologo',
										'field' => 'term_id',
										'terms' => $opinologo
										)
									),
					'post_status' => 'publish',
					'posts_per_page' => -1,
				);

		$posts = get_posts( $args );

		foreach ($posts as $columna) {
			$partial_grade = get_column_grade($columna->ID);
			$global[x] += $partial_grade[x]; 
			$global[y] += $partial_grade[y]; 
		}
		$global[x] = $global[x]/count($posts);
		$global[y] = $global[y]/count($posts);
		return $global;
	}

/*
Plugin Name: Demo Tax meta class
Plugin URI: https://en.bainternet.info
Description: Tax meta class usage demo
Version: 2.1.0
Author: Bainternet, Ohad Raz
Author URI: https://en.bainternet.info
*/


//include the main class file

if (is_admin()){
  /* 
   * prefix of meta keys, optional
   */
  $prefix = 'wp_';
  /* 
   * configure your meta box
   */
  $config = array(
    'id' => 'demo_meta_box',          // meta box id, unique per meta box
    'title' => 'Demo Meta Box',          // meta box title
    'pages' => array('opinologo'),        // taxonomy name, accept categories, post_tag and custom taxonomies
    'context' => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'fields' => array(),            // list of meta fields (can be added by field arrays)
    'local_images' => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => true          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );
  
  $my_meta =  new Tax_Meta_Class($config);
  

  //$my_meta->addColor($prefix.'color_field_id',array('name'=> __('My Color ','tax-meta')));
  //Image field
  $my_meta->addImage($prefix.'image_field_id',array('name'=> __('My Image ','tax-meta')));
  
  
 
  $my_meta->Finish();
}