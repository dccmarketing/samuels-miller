<?php

/**
 * Returns a string of HTML attributes for the menu item
 *
 * @param 	object 		$item 			The menu item object
 * @return 	string 						A string of attributes
 */
function samuels_miller_get_attributes( $item ) {

	if ( empty( $item ) ) { return; }

	$atts = array();
	$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
	$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
	$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
	$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

	$attributes = '';

	foreach ( $atts as $attr => $value ) {

		if ( ! empty( $value ) ) {

			$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
			$attributes .= ' ' . $attr . '="' . $value . '"';

		}

	}

	return $attributes;

} // samuels_miller_get_attributes()

/**
 * Add Down Caret to Menus with Children
 *
 * @param 	string 		$item_output		//
 * @param 	object 		$item				//
 * @param 	int 		$depth 				//
 * @param 	array 		$args 				//
 *
 * @return 	string 							modified menu
 */
function samuels_miller_menu_caret( $item_output, $item, $depth, $args ) {

	if ( ! in_array( 'menu-item-has-children', $item->classes ) ) { return $item_output; }

	$output = '<a href="' . $item->url . '">';
	$output .= $item->title;
	$output .= '<span class="children">' . samuels_miller_get_svg( 'caret-down' ) . '</span>';
	$output .= '</a>';

	return $output;

} // samuels_miller_menu_caret()
//add_filter( 'walker_nav_menu_start_el', 'samuels_miller_menu_caret', 10, 4 );


/**
 * Add Down Caret to Menus with Children
 *
 * @param 	string 		$item_output		//
 * @param 	object 		$item				//
 * @param 	int 		$depth 				//
 * @param 	array 		$args 				//
 *
 * @return 	string 							modified menu
 */
function samuels_miller_menu_no_link( $item_output, $item, $depth, $args ) {

	if ( 'homeside' !== $args->theme_location ) { return $item_output; }

	$output = '';
	$atts 	= samuels_miller_get_attributes( $item );

	if ( '#' === $item->url ) {

		$output .= '<span ' . $atts . '>' . esc_html( $item->title ) . '</span>';

	} else {

		$output = '<a href="' . $item->url . '" ' . $atts . '>';
		$output .= $item->title;
		$output .= '</a>';

	}

	return $output;

} // samuels_miller_menu_no_link()
add_filter( 'walker_nav_menu_start_el', 'samuels_miller_menu_no_link', 10, 4 );


/**
 * Add menus dividers to main menu
 *
 * @link 	http://www.billerickson.net/customizing-wordpress-menus/
 *
 * @param 	string 		$item_output		//
 * @param 	object 		$item				//
 * @param 	int 		$depth 				//
 * @param 	array 		$args 				//
 *
 * @return 	string 							modified menu
 */
function samuels_miller_main_menu_dividers( $item_output, $item, $depth, $args ) {

	if ( 'primary' !== $args->theme_location ) { return $item_output; }

	$output = '';
	$output .= $item_output;
	$output .= '<li class="main-menu-divider">|</li>';

	return $output;

} // samuels_miller_social_menu_svgs()
add_filter( 'walker_nav_menu_start_el', 'samuels_miller_main_menu_dividers', 10, 4 );



/**
 * Change Social Menu to Icons Only
 *
 * @link 	http://www.billerickson.net/customizing-wordpress-menus/
 *
 * @param 	string 		$item_output		//
 * @param 	object 		$item				//
 * @param 	int 		$depth 				//
 * @param 	array 		$args 				//
 *
 * @return 	string 							modified menu
 */
function samuels_miller_social_menu_svgs( $item_output, $item, $depth, $args ) {

	if ( 'social' !== $args->theme_location ) { return $item_output; }

	$host 	= parse_url( $item->url, PHP_URL_HOST );
	$output = '<a href="' . $item->url . '" class="icon-menu">';
	$class 	= samuels_miller_get_svg_by_class( $item->classes );

	if ( ! empty( $class ) ) {

		$output .= $class;

	} else {

		$output .= samuels_miller_get_svg_by_url( $item->url );

	} // class check

	$output .= '</a>';

	return $output;

} // samuels_miller_social_menu_svgs()
add_filter( 'walker_nav_menu_start_el', 'samuels_miller_social_menu_svgs', 10, 4 );


/**
 * Gets the appropriate SVG based on a menu item class
 *
 * @param  [type] $url [description]
 * @return [type]      [description]
 */
function samuels_miller_get_svg_by_class( $classes ) {

	$output = '';

	foreach ( $classes as $class ) {

		$check = samuels_miller_get_svg( $class );

		if ( ! is_null( $check ) ) { $output .= $check; break; }

	} // foreach

	return $output;

} // samuels_miller_get_svg_by_class()

/**
 * Gets the appropriate SVG based on a URL
 *
 * @param  [type] $url [description]
 * @return [type]      [description]
 */
/*function samuels_miller_get_svg_by_pageID( $ID ) {

	$output = '';
	$page 	= get_post( $ID );

	switch( $page->post_title ) {

		case 'Calendar' 			: $output .= samuels_miller_get_svg( 'calendar' ); break;
		case 'Camping' 				: $output .= samuels_miller_get_svg( 'camping' ); break;
		case 'Events & Festivals' 	: $output .= samuels_miller_get_svg( 'calendar' ); break;
		case 'Hotels' 				: $output .= samuels_miller_get_svg( 'hotel' ); break;
		case 'Motels' 				: $output .= samuels_miller_get_svg( 'hotel' ); break;
		case 'Travel Guides' 		: $output .= samuels_miller_get_svg( 'map-location' ); break;

	} // switch

	return $output;

} // samuels_miller_get_svg_by_pageID()*/

/**
 * Gets the appropriate SVG based on a URL
 *
 * @param  [type] $url [description]
 * @return [type]      [description]
 */
function samuels_miller_get_svg_by_url( $url ) {

	$output = '';
	$host 	= parse_url( $url, PHP_URL_HOST );

	switch( $host ) {

		case 'facebook.com' 	: $output .= samuels_miller_get_svg( 'facebook' ); break;
		case 'instagram.com' 	: $output .= samuels_miller_get_svg( 'instagram' ); break;
		case 'linked.com' 		: $output .= samuels_miller_get_svg( 'linkedin' ); break;
		case 'pinterest.com' 	: $output .= samuels_miller_get_svg( 'pinterest' ); break;
		case 'twitter.com' 		: $output .= samuels_miller_get_svg( 'twitter' ); break;
		case 'youtube.com' 		: $output .= samuels_miller_get_svg( 'youtube' ); break;

	} // switch

	return $output;

} // samuels_miller_get_svg_by_url()

// Function that will return our WordPress menu
function samuels_miller_list_menu( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'menu'            => '',
		'container'       => 'div',
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'depth'           => 0,
		'walker'          => '',
		'theme_location'  => ''),
		$atts )
	);

	return wp_nav_menu( array(
		'menu'            => $menu,
		'container'       => $container,
		'container_class' => $container_class,
		'container_id'    => $container_id,
		'menu_class'      => $menu_class,
		'menu_id'         => $menu_id,
		'echo'            => false,
		'fallback_cb'     => $fallback_cb,
		'before'          => $before,
		'after'           => $after,
		'link_before'     => $link_before,
		'link_after'      => $link_after,
		'depth'           => $depth,
		'walker'          => $walker,
		'theme_location'  => $theme_location )
	);
}
//Create the shortcode
add_shortcode( 'listmenu', 'samuels_miller_list_menu' );