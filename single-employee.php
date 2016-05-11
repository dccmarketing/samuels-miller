<?php
/**
 * Template Name: Employee page
 *
 * Description: The page template for displaying employees
 *
 * @package Samuels Miller
 */

$meta = get_post_custom();

get_header();

	?><div class="sidebar"><?php

		wp_nav_menu(array(
			'theme_location' => 'primary',
			'walker' => new Selective_Walker(), // with ID
		));

	?></div>
	<div id="primary" class="content-area sidebar-content">
		<main id="main" class="site-main" role="main"><?php

			while ( have_posts() ) : the_post();

				?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="page-header contentpage"><?php

						the_title( '<h1 class="page-title">', '</h1>' );

					?></header><!-- .entry-header -->
					<div class="img-featured"><?php

						the_post_thumbnail( 'full' );

					?></div>
					<div class="employee-content"><?php

					if ( ! empty( $meta['url-vcard'][0] ) ) {

						?><p><a href="<?php echo $meta['url-vcard'][0]; ?>">
							<img class="img-vcard" title="vcard" src="<?php echo get_template_directory_uri(); ?>/images/vcard2.jpg" />
						</a></p><?php

					}

					?><h4>Contact</h4>
						<a href="mailto:<?php echo $meta['email-address'][0]; ?>"><?php echo $meta['email-address'][0]; ?></a> | <a class="phone" href="tel:<?php echo samuels_miller_get_tel_number( $meta['phone-office'][0] ); ?>"><?php echo $meta['phone-office'][0]; ?></a>
					<h4>Education</h4>
						<ul><?php

							$schools = get_field( 'education' );

							foreach ( $schools as $school ) {

								?><li><span class="name"><?php echo $school['institution']; ?></span> <span class="degree"><?php echo $school['degree']; ?></span></li><?php

							}

						?></ul>
					<h4>Bar Admissions</h4>
						<ul><?php

						$bars = get_field( 'bar_admissions' );

						foreach ( $bars as $bar ) {

							?><li><?php echo $bar['location']; ?></li><?php

						}

					?></ul>
					<h4>Practice Areas</h4>
						<ul><?php

							$areas = wp_get_post_terms( get_the_ID(), 'department' );

							foreach ( $areas as $area ) {

								$page = get_page_by_title( $area->name );

								if ( $page ) {

									?><li><a href="<?php echo esc_url( site_url( '/practice-areas/' . $area->slug ) ); ?>"><?php echo $area->name; ?></a></li><?php

								} else {

									?><li><?php echo $area->name; ?></li><?php

								}

							} // foreach

						?></ul><?php

					$born = get_field( 'born' );

					if ( ! empty( $born ) ) {

					?><h4>Born</h4>
						<p><?php the_field( 'born' ); ?></p><?php

					}

					$interests = get_field( 'interests' );

					if ( ! empty( $interests ) ) {

					?><h4>Interests</h4>
						<p><?php the_field( 'interests' ); ?></p><?php

					}

					?></div>
					<div class="page-content"><?php

						the_content();

					?></div><!-- .entry-content -->
				</article><!-- #post-## --><?php

			endwhile; // end of the loop.

		?></main><!-- #main -->
	</div><!-- #primary --><?php

get_sidebar( 'left' );
get_footer();
