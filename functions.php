<?php
wp_enqueue_script('jquery');

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
	
}
function enqueue_scripts(){
	wp_enqueue_script('jqueryjs', get_stylesheet_directory_uri() . '/js/jquery.js', array('jquery'), false, false);
	wp_enqueue_script('turnminjs', get_stylesheet_directory_uri() . '/js/turn.min.js', array('jquery'), false, false);
	wp_enqueue_script('scriptjs', get_stylesheet_directory_uri() . '/js/script.js', array('jquery'), false, false);

}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );


add_action( 'after_setup_theme', 'my_theme_setup' );
function my_theme_setup(){
  load_child_theme_textdomain( 'baktun-text', get_stylesheet_directory() . '/languages' );
}


