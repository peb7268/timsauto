<?php
$the_query = new WP_Query(array(
	'posts_per_page' => '10',
	'post_type' 	 => 'post',
	'paged'  		 => (get_query_var('paged')) ? get_query_var('paged') : 1
));

if ($the_query -> have_posts()) : while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
	<article class="serp_item clearfix" data-action="<?php the_permalink(); ?>">
		<div class="featured_image">
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
<?php endwhile; ?>

<div class="nav-previous alignleft">
	<?php echo get_next_posts_link( 'Older posts', $the_query->max_num_pages); ?>
</div>

<div class="nav-next alignright">
	<?php echo get_previous_posts_link( 'Newer posts', $the_query->max_num_pages); ?>
</div>

<?php else : ?>
	<p>No posts to display</p>
<?php endif; ?>
