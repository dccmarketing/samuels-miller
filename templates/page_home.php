<?php
/**
 * Template Name: Home Page
 *
 * Description: Page template for the home page
 *
 * @package Samuels Miller
 */

get_header();

	?><div id="primary" class="content-area content-sidebar">
		<main id="main" class="site-main" role="main"><?php

			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'home' );

			endwhile; // loop

		?></main><!-- #main -->
	</div><!-- #primary -->
	<aside class="home-sidebar">
		<h3><?php echo get_theme_mod( 'home_sidebar_title' ); ?></h3>
		<div class="side-content"><?php

			if ( has_nav_menu( 'homeside' ) ) {

				$menu['theme_location']		= 'homeside';
				$menu['container'] 			= 'div';
				$menu['container_id']    	= 'menu-homeside';
				$menu['container_class'] 	= 'menu nav-homeside';
				$menu['menu_id']         	= 'menu-homeside-items';
				$menu['menu_class']      	= 'menu-items';
				$menu['depth']           	= 2;
				$menu['fallback_cb']     	= '';

				wp_nav_menu( $menu );

			}

		?></div>
	</aside><?php

get_footer(); ?>