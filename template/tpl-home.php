<?php 
/* Template Name: Home */
get_header(); 
?>
	
<div id="hero">
	<div class="wrapper clearfix">
		<div class="hero-left">
			<?php get_template_part('partials/hero/html'); ?>
		</div>
		<ul class="hero-right">
			<li id="message1"><i class="fa fa-headphones"></i> Hear us on the radio</li>
			<li id="message2">Check out what's going on at each of our locations</li>
			<li id="message3">
				<img src='<?php bloginfo('template_directory'); ?>/img/duluth.png'>
				<p id="locations">
					<a target="_blank" href="https://www.google.com/maps/place/Tim's+Auto+Upholstery/@33.9867398,-84.1546128,17z/data=!3m1!4b1!4m2!3m1!1s0x88f5a25c829d189d:0xb39d769913751fc">Duluth</a> | <a href="https://www.google.com/maps/place/Tim's+Auto+Upholstery/@34.2730678,-83.8622846,17z/data=!3m1!4b1!4m2!3m1!1s0x88f5f40f227bc52f:0x597e3af3f9bcce66" target="_blank">Gainesville</a>
				</p>
			</li>
			<li id="message4">
				<a href="#emailForm">
					<h4>Sign up for our <br> newsletter</h4>
				</a>
			</li>
		</ul>
	</div>
</div>

<div id="content" class="wrapper clearfix">
	<div id="projects">
		<ul id="projects_and_highlights" class="clearfix recent_content">
			<li><a href="#recent_content" id="recent" data-cat-id='21' class="active">Latest Projects</a></li>
			<li><a href="#featured_content" id="featured" data-cat-id='8'>Highlight Reel</a></li>
		</ul>
		<div id="recent_content" class="loop active">
			<?php get_template_part( 'loops/recent' ); ?>
		</div>
		<div id="featured_content" class="loop">
			<?php get_template_part( 'loops/featured' ); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>