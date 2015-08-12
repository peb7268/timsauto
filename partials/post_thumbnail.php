<?php
if ( has_post_thumbnail() ) {
	$size = (isset($post->tau_size)) ? $post->tau_size : 'medium';
	the_post_thumbnail($size);
} else { ?>
	<p>No post thumbnail</p>
<?php }