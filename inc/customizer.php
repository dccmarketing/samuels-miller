<?php
/**
 * Samuels Miller Theme Customizer
 *
 * Contains methods for customizing the theme customization screen.
 *
 * @link 		http://codex.wordpress.org/Theme_Customization_API
 * @since 		1.0.0
 * @package  	DocBlock
 */
class samuels_miller_Customize {

   /**
	* This hooks into 'customize_register' (available as of WP 3.4) and allows
	* you to add new sections and controls to the Theme Customize screen.
	*
	* Note: To enable instant preview, we have to actually write a bit of custom
	* javascript. See live_preview() for more.
	*
	* @access 		public
	* @see 			add_action( 'customize_register', $func )
	* @param 		WP_Customize_Manager 		$wp_customize 		Theme Customizer object.
	* @link 		http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
	* @since 		1.0.0
	*/
	public static function register( $wp_customize ) {

		// Theme Options Panel
		$wp_customize->add_panel( 'theme_options',
			array(
				'capability'  		=> 'edit_theme_options',
				'description'  		=> esc_html__( 'Options for Samuels Miller', 'samuels-miller' ),
				'priority'  		=> 10,
				'theme_supports'  	=> '',
				'title'  			=> esc_html__( 'Theme Options', 'samuels-miller' ),
			)
		);



		// Home Page Section
		$wp_customize->add_section( 'homepage_section',
			array(
				'capability' 	=> 'edit_theme_options',
				'description' 	=> esc_html__( 'Home Page Section', 'samuels-miller' ),
				'panel' 		=> 'theme_options',
				'priority' 		=> 10,
				'title' 		=> esc_html__( 'Home Page', 'samuels-miller' )
			)
		);

		// Home Page Image Field
		$wp_customize->add_setting(
			'home_header_img',
			array(
				'default' => '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'home_header_img',
				array(
					'label' => esc_html__( 'Homepage Header Image', 'samuels-miller' ),
					'section' => 'homepage_section',
					'settings' => 'home_header_img'
				)
			)
		);

		// Sidebar Title Field
		$wp_customize->add_setting(
			'home_sidebar_title',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'home_sidebar_title',
			array(
				'label'  	=> esc_html__( 'Sidebar Title', 'samuels-miller' ),
				'section'  	=> 'homepage_section',
				'settings' 	=> 'home_sidebar_title',
				'type' 		=> 'text'
			)
		);





		// Contact Section
		$wp_customize->add_section( 'contact_section',
			array(
				'capability' 	=> 'edit_theme_options',
				'description' 	=> esc_html__( 'Contact Section', 'samuels-miller' ),
				'panel' 		=> 'theme_options',
				'priority' 		=> 10,
				'title' 		=> esc_html__( 'Contact', 'samuels-miller' )
			)
		);

		// Email Field
		$wp_customize->add_setting(
			'contact_email',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'contact_email',
			array(
				'label' => esc_html__( 'Contact Email', 'samuels-miller' ),
				'section' => 'contact_section',
				'settings' => 'contact_email',
				'type' => 'email'
			)
		);

		// Main Phone Field
		$wp_customize->add_setting(
			'contact_phone',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'contact_phone',
			array(
				'label'  	=> esc_html__( 'Main Phone Number', 'samuels-miller' ),
				'section'  	=> 'contact_section',
				'settings' 	=> 'contact_phone',
				'type' 		=> 'text'
			)
		);

/*
		// New Panel
		$wp_customize->add_panel( 'theme_options',
			array(
				'capability'  		=> 'edit_theme_options',
				'description'  		=> esc_html__( 'Options for Samuels Miller', 'samuels-miller' ),
				'priority'  		=> 10,
				'theme_supports'  	=> '',
				'title'  			=> esc_html__( 'Theme Options', 'samuels-miller' ),
			)
		);



		// New Section
		$wp_customize->add_section( 'new_section',
			array(
				'capability' 	=> 'edit_theme_options',
				'description' 	=> esc_html__( 'New Customizer Section', 'samuels-miller' ),
				'panel' 		=> 'theme_options',
				'priority' 		=> 10,
				'title' 		=> esc_html__( 'New Section', 'samuels-miller' )
			)
		);



		// Add Fields & Controls

		// Text Field
		$wp_customize->add_setting(
			'text_field',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'text_field',
			array(
				'label'  	=> esc_html__( 'Text Field', 'samuels-miller' ),
				'section'  	=> 'new_section',
				'settings' 	=> 'text_field',
				'type' 		=> 'text'
			)
		);



		// URL Field
		$wp_customize->add_setting(
			'url_field',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'url_field',
			array(
				'label' => esc_html__( 'URL Field', 'samuels-miller' ),
				'section' => 'new_section',
				'settings' => 'url_field',
				'type' => 'url'
			)
		);



		// Email Field
		$wp_customize->add_setting(
			'email_field',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'email_field',
			array(
				'label' => esc_html__( 'Email Field', 'samuels-miller' ),
				'section' => 'new_section',
				'settings' => 'email_field',
				'type' => 'email'
			)
		);




		// Password Field
		$wp_customize->add_setting(
			'password_field',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'password_field',
			array(
				'label' => esc_html__( 'Password Field', 'samuels-miller' ),
				'section' => 'new_section',
				'settings' => 'password_field',
				'type' => 'password'
			)
		);



		// Date Field
		$wp_customize->add_setting(
			'date_field',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'date_field',
			array(
				'label' => esc_html__( 'Date Field', 'samuels-miller' ),
				'section' => 'new_section',
				'settings' => 'date_field',
				'type' => 'date'
			)
		);



		// Checkbox Field
		$wp_customize->add_setting(
			'checkbox_field',
			array(
				'default'  	=> 'true',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'checkbox_field',
			array(
				'label' => esc_html__( 'Checkbox Field', 'samuels-miller' ),
				'section' => 'new_section',
				'settings' => 'checkbox_field',
				'type' => 'checkbox'
			)
		);



		// Radio Field
		$wp_customize->add_setting(
			'radio_field',
			array(
				'default'  	=> 'choice1',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'radio_field',
			array(
				'choices' => array(
					'choice1' => esc_html__( 'Choice 1', 'samuels-miller' ),
					'choice2' => esc_html__( 'Choice 2', 'samuels-miller' ),
					'choice3' => esc_html__( 'Choice 3', 'samuels-miller' )
				),
				'label' => esc_html__( 'Radio Field', 'samuels-miller' ),
				'section' => 'new_section',
				'settings' => 'radio_field',
				'type' => 'radio'
			)
		);



		// Select Field
		$wp_customize->add_setting(
			'select_field',
			array(
				'default'  	=> 'choice1',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'select_field',
			array(
				'choices' => array(
					'choice1' => esc_html__( 'Choice 1', 'samuels-miller' ),
					'choice2' => esc_html__( 'Choice 2', 'samuels-miller' ),
					'choice3' => esc_html__( 'Choice 3', 'samuels-miller' )
				),
				'label' => esc_html__( 'Select Field', 'samuels-miller' ),
				'section' => 'new_section',
				'settings' => 'select_field',
				'type' => 'select'
			)
		);



		// Textarea Field
		$wp_customize->add_setting(
			'textarea_field',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'textarea_field',
			array(
				'label' => esc_html__( 'Textarea Field', 'samuels-miller' ),
				'section' => 'new_section',
				'settings' => 'textarea_field',
				'type' => 'textarea'
			)
		);



		// Range Field
		$wp_customize->add_setting(
			'range_field',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'range_field',
			array(
				'input_attrs' => array(
					'class' => 'range-field',
					'max' => 100,
					'min' => 0,
					'step' => 1,
					'style' => 'color: #020202'
				),
				'label' => esc_html__( 'Range Field', 'samuels-miller' ),
				'section' => 'new_section',
				'settings' => 'range_field',
				'type' => 'range'
			)
		);



		// Page Select Field
		$wp_customize->add_setting(
			'select_page_field',
			array(
				'default'  	=> '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			'select_page_field',
			array(
				'label' => esc_html__( 'Select Page', 'samuels-miller' ),
				'section' => 'new_section',
				'settings' => 'select_page_field',
				'type' => 'dropdown-pages'
			)
		);



		// Color Chooser Field
		$wp_customize->add_setting(
			'color_field',
			array(
				'default'  	=> '#ffffff',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'color_field',
				array(
					'label' => esc_html__( 'Color Field', 'samuels-miller' ),
					'section' => 'new_section',
					'settings' => 'color_field'
				),
			)
		);



		// File Upload Field
		$wp_customize->add_setting( 'file_upload' );
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'file_upload',
				array(
					'label' => esc_html__( 'File Upload', 'samuels-miller' ),
					'section' => 'new_section',
					'settings' => 'file_upload'
				),
			)
		);



		// Image Upload Field
		$wp_customize->add_setting(
			'image_upload',
			array(
				'default' => '',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'image_upload',
				array(
					'label' => esc_html__( 'Image Field', 'samuels-miller' ),
					'section' => 'new_section',
					'settings' => 'image_upload'
				)
			)
		);
*/


		// Enable live preview JS
		$wp_customize->get_setting( 'blogname' )->transport 		= 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport 	= 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	} // register()

	/**
	 * This will output the custom WordPress settings to the live theme's WP head.
	 *
	 * Used by hook: 'wp_head'
	 *
	 * @access 		public
	 * @see 		add_action( 'wp_head', $func )
	 * @since 		1.0.0
	 */
	public static function header_output() {

		?><!-- Customizer CSS -->
		<style type="text/css"><?php

			//samuels_miller_Customize::generate_css( 'selector', 'style', 'mod_name', 'prefix', 'postfix', true );
			samuels_miller_Customize::generate_css( '.home-header-img', 'background-image', 'home_header_img', 'url(', ')', true );

		?></style><!-- Customizer CSS --><?php

	} // header_output()

	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 *
	 * Used by hook: 'customize_preview_init'
	 *
	 * @access 		public
	 * @see 		add_action( 'customize_preview_init', $func )
	 * @since 		1.0.0
	 * @uses 	wp_enqueue_script()
	 * @uses 	get_template_directory_uri()
	 */
	public static function live_preview() {

		wp_enqueue_script( 'samuels_miller_customizer', get_template_directory_uri() . '/js/customizer.min.js', array( 'jquery', 'customize-preview' ), '20130508', true );

	} // live_preview()

	/**
	 * This will generate a line of CSS for use in header output. If the setting
	 * ($mod_name) has no defined value, the CSS will not be output.
	 *
	 * @access 		public
	 * @since 		1.0.0
	 * @param 		string 		$selector 		CSS selector
	 * @param 		string 		$style 			The name of the CSS *property* to modify
	 * @param 		string 		$mod_name 		The name of the 'theme_mod' option to fetch
	 * @param 		string 		$prefix 		Optional. Anything that needs to be output before the CSS property
	 * @param 		string 		$postfix 		Optional. Anything that needs to be output after the CSS property
	 * @param 		bool 		$echo 			Optional. Whether to print directly to the page (default: true).
	 * @uses 		get_theme_mod()
	 * @return 		string 						Returns a single line of CSS with selectors and a property.
	 */
	public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {

		$return = '';
		$mod 	= get_theme_mod( $mod_name );

		if ( ! empty( $mod ) ) {

			$return = sprintf('%s { %s:%s; }',
				$selector,
				$style,
				$prefix . $mod . $postfix
			);

			if ( $echo ) {

				echo $return;

			}

		}

		return $return;

	} // generate_css()

} // class

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'samuels_miller_Customize' , 'register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'samuels_miller_Customize' , 'header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'samuels_miller_Customize' , 'live_preview' ) );
