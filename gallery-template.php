<?php
/* Template Name: Gallery */
get_header(); ?>

<div id="content" class="wrapper">
	<ul id="showcase" class="gallery gallery-size-medium">
		<?php 
		query_posts('cat=11,13,8');
		$i = 0;
		if ( have_posts() ) : while ( have_posts() ) : the_post(); 
		$class = ($i % 2 == 0) ? 'red' : 'blue'; ?>

					<li id="card-<?php echo $post->ID; ?>" class="gallery-item <?php echo $class; ?> card">
						<div class="gallery-icon front">
							<div class="filter"></div>
							<a href="<?php the_permalink(); ?>">
								<?php get_template_part('partials/post_thumbnail'); ?>
							</a>
						</div>
						<div class="back">
							<p><?php the_excerpt(); ?></p>
							<?php //wp_get_attachment_url( get_post_thumbnail_id($post->ID)  ?>
							<a id="link" href="<?php the_permalink(); ?>">
								<i class="fa fa-arrow-circle-right"></i>
							</a>
							<a id="photo" class="action"  href="<?php featured_image_url($post); ?>">
								<i class="fa fa-camera"></i>
							</a>
						</div>
					</li>
		<?php $i++; endwhile; else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
	</ul>
</div>

<?php 
	enqueue_gallery_scripts();
	get_footer(); 
?>