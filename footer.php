<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Samuels Miller
 */
?>
		</div><!-- .wrap -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="footer-wrap wrap">

			<div class="footer-left"><?php

				if ( has_nav_menu( 'footer' ) ) {

					$menu['theme_location']		= 'footer';
					$menu['container'] 			= 'div';
					$menu['container_id']    	= 'menu-footer-media';
					$menu['container_class'] 	= 'menu nav-footer';
					$menu['menu_id']         	= 'menu-footer-items';
					$menu['menu_class']      	= 'menu-items';
					$menu['depth']           	= 1;
					$menu['fallback_cb']     	= '';

					wp_nav_menu( $menu );

				}

			?></div><!-- .footer_left -->

			<div class="footer-right">
				<h3>Contact Us</h3>
				<div class="address">
					<h4>Decatur Office</h4>
					<address>225 North Water Street<br />Suite 301<br />Decatur, Illinois 62523</address>
					<p><a href="tel:2174294325"><?php echo get_theme_mod( 'contact_phone' ); ?> T </a> &middot; 217.425.6313 F</p>
					<p><a href="http://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=225+North+Water+Street+Suite+301+Decatur,+Illinois+62523&aq=&sll=37.09024,-86.748047&sspn=37.052328,76.376953&ie=UTF8&hq=&hnear=225+N+Water+St+%23301,+Decatur,+Macon,+Illinois+62523&z=16" target="_blank">Get Directions &raquo;</a></p>
				</div>
				<div class="address">
					<h4>Mailing Address</h4>
					<address>PO Box 1400<br />Decatur, Illinois 62525</address>
				</div>
				<div class="address">
					<h4>Arthur Office</h4>
					<address>1318 South Vine<br />Arthur, Illinois 61911</address>
					<p><a href="tel:2175433403">217.543.3403 T</a></p>
					<p><a href="http://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=131B+South+Vine+Street,+Arthur,+Illinois+61911&aq=0&sll=37.0625,-95.677068&sspn=37.462243,77.607422&ie=UTF8&hq=&hnear=131+S+Vine+St,+Arthur,+Moultrie,+Illinois+61911&ll=39.716744,-88.472493&spn=0.008896,0.018947&z=16&iwloc=A" target="_blank">GET DIRECTIONS &raquo;</a></p>
				</div>
			</div><!-- .site-info -->

		</div><!-- .footer-wrap -->

	</footer><!-- #colophon -->

	<div class="site-info">
		<div class="copyright">&copy <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( get_admin_url(), 'samuels-miller' ); ?>"><?php echo get_bloginfo( 'name' ); ?></a></div>
		<div class="credits"><?php printf( esc_html__( 'Site created by %1$s', 'samuels-miller' ), '<a href="https://dccmarketing.com/" target="_blank">DCC Marketing</a>' ); ?></div>
	</div><!-- .site-info -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>