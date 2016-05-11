<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Samuels Miller
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 *
 * @uses 	add_theme_support()
 */
function samuels_miller_jetpack_setup() {

	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );

} // samuels_miller_jetpack_setup()
add_action( 'after_setup_theme', 'samuels_miller_jetpack_setup' );
