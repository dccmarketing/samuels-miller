<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Samuels Miller
 */

?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<img class="home-header-img" src="<?php echo get_theme_mod( 'home_header_img' ); ?>">
	<a class="home-contact-link" href="mailto:<?php echo get_theme_mod( 'contact_email' ); ?>">Contact Us</a>
	<section class="entry-content"><?php

		the_content();

	?></section><!-- .entry-content -->
</article><!-- #post-## -->