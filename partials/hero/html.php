<?php  $hero = the_hero(); ?>

<div class="hero-block">
	<div class="message">
		<h2><?php echo $hero->post_title ?></h2>
		<p><?php echo $hero->tagline; ?></p>
	</div>
	<a href="<?php echo $hero->guid ?>" class="more">
		<i class="fa fa-arrow-circle-right"></i>
	</a>
	<div class="filter filter-red"></div>
	<?php echo $hero->featured_image; ?>
</div>