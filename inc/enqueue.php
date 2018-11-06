<?php
/*
	
@package awesome_theme
	
	========================
		ADMIN ENQUEUE FUNCTIONS
	========================
*/


/*
	
	========================
		FRONT-END ENQUEUE FUNCTIONS
	========================
*/

function awesome_theme_load_scripts(){
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.6', 'all' );
	wp_enqueue_style( 'awesome-theme', get_template_directory_uri() . '/assets/css/styles.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'raleway', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500' );
	
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery' , get_template_directory_uri() . '/assets/js/jquery.js', false, '1.11.3', true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.3.6', true );
	wp_enqueue_script( 'theme', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '1.0.0', true );
	
}
add_action( 'wp_enqueue_scripts', 'awesome_theme_load_scripts' );