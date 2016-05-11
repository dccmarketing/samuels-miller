<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Samuels Miller
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"><?php

wp_head();

?></head>

<body <?php body_class( $post->post_name ); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'samuels-miller' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="header-wrap wrap">
			<div class="site-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img border="0" src="<?php bloginfo('template_directory'); ?>/images/sm_logo.jpg" alt="Samuels | Miller Law Firm" /></a>
			</div><!-- .site-branding -->
			<div class="header-contact-info">
				<p class="header-established">Established 1888</p>
				<p><a class="header-phone" href="tel:2174294325"><?php echo get_theme_mod( 'contact_phone' ); ?></a></p>
				<p><a class="header-email" href="mailto:<?php echo sanitize_email( get_theme_mod( 'contact_email' ) ); ?>"><?php echo get_theme_mod( 'contact_email' ); ?></a></p>
			</div>
		</div><!-- .header_wrap -->
	</header><!-- #masthead -->
	<nav id="site-navigation" class="main-navigation" role="navigation">
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'samuels-miller' ); ?></button><?php

			wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) );

	?></nav><!-- #site-navigation -->
	<div id="content" class="site-content">
		<div class="content-wrap wrap">