<?php

//Remove a bunch of default wordpress crap
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
add_filter( 'use_default_gallery_style', '__return_false' ); 	#Inline Styling for gallery

add_theme_support( 'post-thumbnails' ); 

//Remove height and width from featured image
function remove_img_attr ($html) {
    return preg_replace('/(width|height)="\d+"\s/', "", $html);
}
add_filter( 'post_thumbnail_html', 'remove_img_attr' );

require 'partials/gallery.php';