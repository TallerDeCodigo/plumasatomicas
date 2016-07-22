<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 * @package Hive
 */

function sopitas_jetpack_setup() {
	/**
	 * Add theme support for Infinite Scroll
	 * See: http://jetpack.me/support/infinite-scroll/
	 */
	add_theme_support( 'infinite-scroll', array(
		'container' => 'posts', //here is where the posts are - help yourself
		'wrapper'   => false, //we don't need a wrapper because it would mess with the masonry
		'footer'    => false, //match footer width to this id
	) );

}

add_action( 'after_setup_theme', 'sopitas_jetpack_setup' ); ?>