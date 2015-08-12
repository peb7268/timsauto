<?php
function stripStandardWordpressJunk(){
	remove_filter( 'the_content', 'wpautop' );
	remove_filter( 'the_excerpt', 'wpautop' );
	add_filter( 'use_default_gallery_style', '__return_false' ); 	#Inline Styling for gallery
}

function addThemeSupport(){
	add_theme_support( 'post-thumbnails' ); 
	addNavMenus();
}

function addNavMenus(){
	register_nav_menu('main_nav', 'Global Nav Menu');
}

function init(){
	addThemeSupport();
	stripStandardWordpressJunk();
}

init();

//Remove height and width from featured image
function remove_img_attr ($html) {
    return preg_replace('/(width|height)="\d+"\s/', "", $html);
}
add_filter( 'post_thumbnail_html', 'remove_img_attr' );


require 'partials/gallery.php';