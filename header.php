<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tims Auto Upholstery</title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="fb-root"></div>
	<div id="header" class="clearfix">
		<div class="wrapper">
			<a id="logo" href="<?php bloginfo('url'); ?>">
				<h1 class="title">
					Tim's Auto
				</h1>
			</a>

			<?php wp_nav_menu(array(
				'theme_location' 	=> 'main_nav',
				'menu'				=> 'main_nav',
				'container_id' 		=> 'nav',
				'menu_id' 			=> 'nav',
				'container'			=> false,
			)); ?>
		</div>
	
		<div id="border">
			<div class="wrapper">
				<p>Upholstery</p>
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>