<?php
/**
 * WordPress.com-specific functions and definitions.
 *
 * This file is centrally included from `wp-content/mu-plugins/wpcom-theme-compat.php`.
 *
 * @package Samuels Miller
 */

/**
 * Adds support for wp.com-specific theme functions.
 *
 * @global array $themecolors
 */
function samuels_miller_wpcom_setup() {

	global $themecolors;

	// Set theme colors for third party services.
	if ( ! isset( $themecolors ) ) {

		$themecolors = array(
			'bg'     => '',
			'border' => '',
			'text'   => '',
			'link'   => '',
			'url'    => '',
		);

	}

} // samuels_miller_wpcom_setup()
add_action( 'after_setup_theme', 'samuels_miller_wpcom_setup' );
