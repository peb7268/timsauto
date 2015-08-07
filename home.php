<?php get_header(); ?>
	<div id="header" class="clearfix">
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
		<div class="wrapper clearfix">
			<div class="hero-left">
				<div class="hero-block">
					<div class="message">
						<h2>Need For Speed</h2>
						<p>World Class upholstery at a next door price</p>
					</div>
					<a href="#more" class="more">
						<i class="fa fa-arrow-circle-right"></i>
					</a>
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
	
	<div class="wrapper clearfix">
		<div id="projects">
			<ul id="projects_and_highlights" class="clearfix">
				<li><a href="#latest_projects">Latest Projects</a></li>
				<li><a href="#highlight_reel">Highlight Reel</a></li>
			</ul>
			<div id="project_content">
				<?php get_template_part( 'loops/recent' ); ?>
			</div>
		</div>
		<ul id="testimonials"></ul>
	</div>


<?php get_footer(); ?>