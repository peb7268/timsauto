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
					<a href="#">Duluth</a> | <a href="#">Gainesville</a>
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
			<li><a href="#recent_content" id="recent" class="active">Latest Projects</a></li>
			<li><a href="#featured_content" id="featured">Highlight Reel</a></li>
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