<?php get_header(); ?>
	<div id="main" class="clearfix">
		<section id="blogwrapper">
			<div class="articlewrap clearfix">
				<article class="post" id="post-<?php the_ID(); ?>">
					<h1><?php _e('ERROR 404!'); ?></h1>
					<p class="intro">Sorry, what you were looking for wasn't found. This could be down to a couple of things:</p>
					<ul>
						<li>The link you tried to click is actually dead!</li>
						<li>The URL might be mis-typed.</li>
						<li>The page or post has been moved elsewhere.</li>
					</ul>
					<p class="intro">Check for possibilities of the above, and then try again or search bellow.</p>
				</article>
			</div>
			
			<div class="articlewrap clearfix">
				<?php get_search_form(); ?>
			</div>
			
		</section> <!--end #blogwrapper-->
<?php get_footer(); ?>
