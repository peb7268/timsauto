<?php
$session = session_name();
if(strlen($session_name) == 0){
	session_start();
}

define('JS_PATH', get_template_directory_uri().'/js');


//Infinite Scrolling Pagination
function wp_infinitepaginate(){ 
    $loopFile        = $_POST['loop_file'];
    get_template_part( 'loops/'.$loopFile );
    die('');
}

add_action('wp_ajax_infinite_scroll', 'wp_infinitepaginate');           // for logged in user
add_action('wp_ajax_nopriv_infinite_scroll', 'wp_infinitepaginate');    // if user not logged in

function stripStandardWordpressJunk(){
	remove_filter( 'the_content', 'wpautop' );
	remove_filter( 'the_excerpt', 'wpautop' );
	add_filter( 'use_default_gallery_style', '__return_false' ); 	#Inline Styling for gallery
}

function addThemeSupport(){
	add_theme_support('post-thumbnails'); 
	addNavMenus();
}

function addNavMenus(){
	register_nav_menu('main_nav', 'Global Nav Menu');
}

function enqueue_scripts(){
	wp_enqueue_script('jquery');

	wp_register_script('infinitescroll', JS_PATH.'/infinitescroll.js', array('jquery'), null, true);
	wp_enqueue_script('infinitescroll');
}

function admin_init(){
	addThemeSupport();
}

function init(){
	stripStandardWordpressJunk();
	enqueue_scripts();
}

//Remove height and width from featured image
function remove_img_attr ($html) {
    return preg_replace('/(width|height)="\d+"\s/', "", $html);
}

add_action( 'wp_enqueue_scripts', 'init');
add_action( 'wp_loaded', 'admin_init');
add_filter( 'post_thumbnail_html', 'remove_img_attr' );

function featured_image_url($post){
	$thumb  = get_post_thumbnail_id($post->ID);
	$url 	= wp_get_attachment_url($thumb);

	echo $url;
}

require 'partials/hero/methods.php';
require 'partials/gallery.php';