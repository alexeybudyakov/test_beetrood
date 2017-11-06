<?php
if (function_exists('add_theme_support')) {
	add_theme_support('menus');
	add_theme_support( 'post-thumbnails' );
}

function enqueue_styles() {
	wp_enqueue_style( 'whitesquare-style', get_stylesheet_uri());
	
	wp_register_style('font-style3', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css');
	wp_enqueue_style('font-style3');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

function enqueue_scripts () {
	wp_enqueue_script('jqeury','https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

/*
function my_connection(){
	p2p_register_connection_type(
	array(
	'name'=> 'post_review',
	'from'=>'post',
	'to'=>'page'
	)	);
}
add_action('p2p_init', 'my_connection' );
*/
?>
