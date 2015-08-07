<?php
if ( has_post_thumbnail() ) {
	the_post_thumbnail();
} else { ?>
	<p>No post thumbnail</p>
<?php }