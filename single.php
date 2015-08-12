<?php get_header(); ?>
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div id="content" class="wrapper">
			<article class="post clearfix">
				<div class="featured_image clearfix">
					<?php 
						$post->tau_size = 'large';
						get_template_part('partials/post_thumbnail'); 
					?>
					<h2 class="title"> <?php the_title(); ?> </h2>	
					<div class="post_meta clearfix">
						<ul id="social">
							<li id="facebook">
								<div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="button_count"></div>
							</li>
							<li id="twitter">
								<a href="<?php the_permalink(); ?>" class="twitter-share-button">Tweet</a>
								<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
							</li>
						</ul>

						<script>(function(d, s, id) {
						var js, fjs = d.getElementsByTagName(s)[0];
						if (d.getElementById(id)) return;
						js = d.createElement(s); js.id = id;
						js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=187996341275269";
						fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>
					</div>
				</div>
	
				<div class="seperator"></div>

				<div class="post_content">
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