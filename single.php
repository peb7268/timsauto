<?php get_header(); ?>
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div id="content" class="wrapper">
			<article class="post clearfix">
				<div class="featured_image">
					<?php 
						$post->tau_size = 'large';
						get_template_part('partials/post_thumbnail'); 
					?>
				</div>
				<div class="post_content">
					<h2 class="title">
						<a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a>
					</h2>	
					<p class="content_body">
						<?php the_content(); ?>
					</p>
				</div>
			</article>
		</div>
	<?php endwhile; else : ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>

<?php get_footer(); ?>