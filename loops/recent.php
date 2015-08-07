<?php 
$idx 	= 0; 
$recent_query = new WP_Query('orderby=rand&posts_per_page=6&cat=21');
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
	<p>Else here</p>
<?php endif; ?>
