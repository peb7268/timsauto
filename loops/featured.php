<?php 
$posts_finished  = $_SESSION['posts_finished'];
$cat_id 	     = (strlen($_POST['cat_id']) > 0) ? $_POST['cat_id'] : '8';
$paged           = $_POST['page_no'];
$posts_per_page  = get_option('posts_per_page');
$offset 	     = $paged * $posts_per_page;

if($offset == 0) session_unset();

$idx 			 = 0; 
$query_string 	 = 'posts_per_page='.$posts_per_page.'&cat='.$cat_id.'&paged='.$paged;

$idx 	= 0; 
$recent_query = new WP_Query($query_string);
if($recent_query->have_posts()) : while ($recent_query->have_posts()) : $recent_query->the_post(); ?>

	<?php $class 	= ($idx % 2 == 0) ? 'red' : 'blue'; ?>
	<article class="post clearfix <?php echo $class; ?>" data-action="<?php the_permalink(); ?>">
		<div class="featured_image">
			<div class="filter"></div>
			<?php get_template_part('partials/post_thumbnail'); ?>
		</div>
		<div class="post_excerpt">
			<h2 class="title">
				<a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a>
			</h2>	
			<p class="excerpt">
				<?php the_excerpt(); ?>
			</p>
		</div>
	</article>

<?php $idx++; endwhile; else : ?>
	<?php if($_SESSION['posts_finished'] == TRUE) { die(''); } else { ?>

		<p>No more posts found..</p>
	<?php } $_SESSION['posts_finished'] = TRUE; 
endif; ?>
