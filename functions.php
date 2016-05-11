<?php
/**
 * Samuels Miller functions and definitions
 *
 * @package Samuels Miller
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'samuels_miller_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function samuels_miller_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change 'samuels-miller' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'samuels-miller', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'samuels-miller' ),
		'footer' => esc_html__( 'Footer Menu', 'samuels-miller' ),
		'homeside' => esc_html__( 'Home Sidebar Menu', 'samuels-miller' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	/*add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );*/

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'samuels_miller_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

} // samuels_miller_setup()
endif; // samuels_miller_setup
add_action( 'after_setup_theme', 'samuels_miller_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function samuels_miller_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'samuels-miller' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

} // samuels_miller_widgets_init()
add_action( 'widgets_init', 'samuels_miller_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function samuels_miller_scripts() {

	wp_enqueue_style( 'samuels-miller-style', get_stylesheet_uri() );

	wp_enqueue_script( 'samuels-miller-navigation', get_template_directory_uri() . '/js/navigation.min.js', array(), '20120206', true );

	wp_enqueue_script( 'samuels-miller-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.min.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_page( 'contact-us' ) ) {

		wp_enqueue_script( 'samuel-miller-acf-google-maps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array(), '20150511', true );
		wp_enqueue_script( 'samuel-miller-acf-maps', get_template_directory_uri() . '/js/acf-map.min.js', array( 'jquery', 'samuel-miller-acf-google-maps' ), '20150511', true );


	}

	// wp_enqueue_style( 'samuels-miller-fonts', samuels_miller_fonts_url(), array(), null );

} // samuels_miller_scripts()
add_action( 'wp_enqueue_scripts', 'samuels_miller_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Slushman Themekit
 */
require get_template_directory() . '/inc/themekit.php';

/**
 * Load Slushman Menukit
 */
require get_template_directory() . '/inc/menukit.php';

/**
 * Loads the Employee tweak class
 */
require get_template_directory() . '/inc/employees.php';

/**
 * Add VCF as a valid upload file type
 *
 * @param [type] $mimes [description]
 */
function samuels_miller_addUploadMimes( $mimes ) {

    $mimes = array_merge( $mimes, array(
        'vcf' => 'application/octet-stream'
    ));

    return $mimes;

} // samuels_miller_addUploadMimes()
add_filter( 'upload_mimes', 'samuels_miller_addUploadMimes' );

/**
 * Adds PDF as a filter for the Media Library
 *
 * @param 	array 		$post_mime_types 		The current MIME types
 * @return 	array 								The modified MIME types
 */
function samuels_miller_add_mime_types( $post_mime_types ) {

    $post_mime_types['application/pdf'] = array( esc_html__( 'PDFs', 'text-domain' ), esc_html__( 'Manage PDFs', 'text-domain' ), _n_noop( 'PDF <span class="count">(%s)</span>', 'PDFs <span class="count">(%s)</span>' ) );
    $post_mime_types['text/x-vcard'] = array( esc_html__( 'vCards', 'text-domain' ), esc_html__( 'Manage vCards', 'text-domain' ), _n_noop( 'vCard <span class="count">(%s)</span>', 'vCards <span class="count">(%s)</span>' ) );

    return $post_mime_types;

} // samuels_miller_add_mime_types

add_filter( 'post_mime_types', 'samuels_miller_add_mime_types' );

