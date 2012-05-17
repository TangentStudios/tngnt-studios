<?php get_header(); ?>
	<div id="main" class="clearfix">
		<section id="blogwrapper">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="articlewrap clearfix">			
				<article class="post clearfix" id="post-<?php the_ID(); ?>">
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					<?php the_content(); ?>
					<?php wp_link_pages('before=<nav class="page-links clearfix">&after=</nav>&next_or_number=next'); ?>
				</article>
			</div>	
			<?php endwhile; ?>
			
			<?php else : ?>
			<h2>Not Found</h2>		
			<?php endif; ?>
			
		</section> <!--end #blogwrapper-->
<?php get_footer(); ?>