<?php get_header(); ?>
	<div id="header">
		<div class="wrapper">
			<h1 id="logo" class="title">
				Tim's Auto
				<span>Upholstery</span>			
			</h1>
			<ul id="nav">
				<li><a href="#about">About</a></li>
				<li><a href="#whatwedo">What We Do</a></li>
				<li><a href="#showcase">Showcase</a></li>
				<li><a href="#contact">Get In Touch</a></li>
			</ul>
		</div>
	</div>
	<div id="hero">
		<div class="wrapper">
			<div class="hero-left">
				<div class="hero-block">
					<div class="message">
						<h2>Need For Speed</h2>
						<p>World Class upholstery at a next door price</p>
					</div>
					<div class="filter filter-red"></div>
					<img src='<?php bloginfo('template_directory'); ?>/dist/img/need_for_speed.jpg'>
				</div>
			</div>
			<ul class="hero-right">
				<li id="message1"><i class="fa fa-headphones"></i> Hear us on the radio</li>
				<li id="message2">Check out what's going on at each of our locations</li>
				<li id="message3">
					<a href="#">
						<img src='<?php bloginfo('template_directory'); ?>/img/duluth.png'>
						<p>Duluth</p>
					</a>
				</li>
				<li id="message4">
					<a href="#">
						<img src='<?php bloginfo('template_directory'); ?>/img/gainesville.png'>
						<p>Gainesville</p>
					</a>
				</li>
			</ul>
		</div>
	</div>
	
	<ul id="projects_and_highlights">
		<li><a href="#latest_projects">Latest Projects</a></li>
		<li><a href="#highlight_reel">Highlight Reel</a></li>
	</ul>

	<div id="projects"></div>


<?php get_footer(); ?>