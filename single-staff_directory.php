<?php
/**
 * Template Name: Employee page
 *
 * Description: The page template for displaying employees
 *
 * @package Samuels Miller
 */

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

					$vcard = get_field( 'vcard' );

					if ( ! empty( $vcard ) ) {

						?><p><a href="<?php echo get_field( 'vcard' ); ?>">
							<img class="img-vcard" title="vcard" src="<?php echo get_template_directory_uri(); ?>/images/vcard2.jpg" />
						</a></p><?php

					}

					?><h4>Contact</h4>
						<a href="mailto:<?php echo get_field( 'email' ); ?>"><?php the_field( 'email' ); ?></a> | <a class="phone" href="tel:<?php echo samuels_miller_get_tel_number( get_field( 'phone' ) ); ?>"><?php the_field( 'phone' ); ?></a>
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

							$areas = get_field( 'practice_areas' );

							foreach ( $areas as $area ) {

								if ( empty( $area['page'] ) ) {

									?><li><?php echo $area['name']; ?></li><?php

								} else {

									?><li><a href="<?php echo $area['page']; ?>"><?php echo $area['name']; ?></a></li><?php

								}

							}

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
?>