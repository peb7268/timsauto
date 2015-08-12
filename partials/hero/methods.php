<?php

function get_random_hero(){
	$collection = get_posts(array('cat' => '11,13,8'));
	$randomHero = $collection[array_rand($collection)];

	return $randomHero;
}

function augment_hero($post){
	$tagline 		= get_post_meta($post->ID, 'tagline', true);
	$featured_image = (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail($post->ID) : '<img src="'.get_bloginfo('template_directory').'/dist/img/need_for_speed.jpg">';
	
	$post->tagline  = (strlen($tagline) == 0) ? 'Unbeatable quality, unparalleled service.' : $tagline;
	$post->featured_image = $featured_image;

	return $post;
}

function the_hero(){
	$hero = get_random_hero();
	$hero = augment_hero($hero);

	return $hero;
}