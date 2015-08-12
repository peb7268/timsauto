<?php 

if (have_posts()) : while (have_posts()) : the_post(); ?>
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
<?php endwhile; else : ?>
	<p>No posts to display</p>
<?php endif; ?>
