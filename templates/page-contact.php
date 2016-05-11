<?php
/**
 * Template Name: Contact page
 *
 * Description: The page template for the contact page
 *
 * @package Samuels Miller
 */

get_header(); ?>

	<div id="primary" class="content-area sidebar-content">
		<main id="main" class="site-main" role="main"><?php

			while ( have_posts() ) : the_post();

				?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="page-header contentpage"><?php

						the_title( '<h1 class="page-title">', '</h1>' );

					?></header><!-- .entry-header -->

					<div class="page-content"><?php

						$email = get_theme_mod( 'contact_email' );

						if ( ! empty( $email ) ) {

							?><a class="contact-email" href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_attr( $email ); ?></a><?php

						}

						$locations = get_field( 'locations' );

						if ( ! empty( $locations ) ) {

							foreach ( $locations as $location ) {

								?><div class="location">
									<div class="loc-info">
										<div class="loc-name"><?php echo $location['name']; ?></div>
										<address><span class="loc-address"><?php echo $location['address']; ?></span><br>
										<span class="loc-city"><?php echo $location['city']; ?></span>, <span class="loc-state"><?php echo $location['state']; ?></span> <span class="loc-zip"><?php echo $location['zip_code']; ?></span></address><?php

										if ( ! empty( $location['phone'] ) ) {

											?><div class="loc-phone"><a href="tel:<?php echo samuels_miller_get_tel_number( $location['phone'] ); ?>"><?php echo $location['phone']; ?></a> T</div><?php

										}

										if ( ! empty( $location['fax'] ) ) {

											?><div class="loc-fax"><?php echo $location['fax']; ?> F</div><?php

										}

									?></div><?php

									if ( ! empty( $location['map']['lat'] ) && ! empty( $location['map']['lng'] ) ) {

										?><div class="acf-map">
											<div class="marker" data-lat="<?php echo $location['map']['lat']; ?>" data-lng="<?php echo $location['map']['lng']; ?>"></div>
										</div><?php

									}

								?></div><?php

							}

						}

						the_content();

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'samuels-miller' ),
							'after'  => '</div>',
						) );

					?></div><!-- .entry-content -->

					<footer class="entry-footer"><?php

						edit_post_link( esc_html__( 'Edit', 'samuels-miller' ), '<span class="edit-link">', '</span>' );

					?></footer><!-- .entry-footer -->
				</article><!-- #post-## --><?php

			endwhile; // end of the loop.

		?></main><!-- #main -->
	</div><!-- #primary --><?php

get_sidebar( 'left' );
get_footer();
?>