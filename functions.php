<?php

function xxx_theme_setup() {

	add_theme_support( 'title-tag' ); // adds and handles the <title> in the <head>
	add_theme_support( 'post-thumbnails'); // enables featured image feature
	add_theme_support( 'custom-logo', array(
		'flex-width' => true,
	) );

	register_nav_menus( array(
		'menu_main'               => 'Menu Main',
	) );

}
add_action( 'after_setup_theme', 'xxx_theme_setup' );



function xxx_theme_scripts() {

	global $post;

	if( !is_object($post) ){
		// not found
	}
	else if( is_front_page() ){

	}
	else if( is_single() ){

	}

	wp_enqueue_style( 'xxx_theme', get_stylesheet_uri(), array(), WP_DEBUG ? time() : '1.0', 'all' );
	wp_enqueue_script( 'client.js', get_theme_file_uri( '/assets/js/client.js' ), array('jquery'), WP_DEBUG ? time() : '1.0', true );

}
add_action( 'wp_enqueue_scripts', 'xxx_theme_scripts' );



function my_deregister_scripts_wpembed(){
	wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts_wpembed' );



function limit_chars_entire_words($string, $limit){
	$string = substr($string, 0, $limit);
    $string = substr($string, 0, strripos($string, " "));
    $string = trim(preg_replace( '/\s+/', ' ', $string));
    return $string;
}
