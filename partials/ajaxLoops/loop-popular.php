<?php
//Registered wp-ajax
wp_register_script(
  'ajaxLoop-popular',
   get_template_directory_uri() . '/build/js/ajaxLoop-popular.js',
   array('jquery')
);

wp_localize_script( 'ajaxLoop-popular', 'ajax_script_popular', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
wp_enqueue_script('ajaxLoop-popular');

add_action( 'wp_ajax_ajax_request_popular', 'ajax_request_popular' );
// If you wanted to also use the function for non-logged in users (in a theme for example)
add_action( 'wp_ajax_nopriv_ajax_request_popular', 'ajax_request_popular' );
 
function ajax_request_popular() {
	$page = $_COOKIE['popular'];
	$page += 1;
	setcookie('popular', $page, (time()+36000),  '/');

    $numPosts = 12;
    $offset = 0;
    if ($page > 1) {
        $offset = (12 + ($numPosts * ($page - 1))) - $numPosts;
    }

	$args = array(
		'posts_per_page'      => $numPosts,
        'meta_key'            => 'wpb_post_views_count',
        'post_status'         => 'publish',
        'orderby'             => 'meta_value_num', 
        'order'               => 'DESC' ,
        'date_query'          => array(
                                    array(
                                        'column' => 'post_date_gmt',
                                        'after' => '90 week ago'
                                    )
                                ),
        'offset' => $offset
	);
	$query = new WP_Query($args);

    while($query->have_posts()) :
		$query->the_post();

        get_template_part('template-parts/post-default'); // Display the Layout of the Post listings

    endwhile; //while 
  // Always die in functions echoing ajax content
  die();
  wp_reset_query();
};

?>
