<?php
if ( has_post_thumbnail() ) {
	$size = (isset($post->tau_size)) ? $post->tau_size : 'medium';
	the_post_thumbnail($size);
} else { 
	echo "<img src='http://timsautoupholstery.com/wp-content/uploads/2015/03/tims-old-phone-044.jpg'>";	
}