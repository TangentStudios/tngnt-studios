<?php get_header(); ?>
	<div id="main" class="clearfix">
		<section id="blogwrapper">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="articlewrap clearfix">			
				<article class="post clearfix" id="post-<?php the_ID(); ?>">
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					<p class="posted-on">Posted on <a href="<?php echo get_month_link($arc_year, $arc_month); ?>"><?php the_time('F jS, Y'); ?></a> by <?php the_author(); ?></p>
					<?php the_content(); ?>
					<?php wp_link_pages('before=<nav class="page-links clearfix">&after=</nav>&next_or_number=next'); ?>
					<p class="meta">
						<?php the_tags('Tagged: ', ', ', ''); ?><br>
						Posted in: <?php the_category(', '); ?>
					</p>
				</article>
			</div>
			
			<div class="articlewrap clearfix">
				<?php comments_template(); ?>
			</div>
					
			<?php endwhile; ?>
			
			<?php else : ?>
			<h2>Not Found</h2>		
			<?php endif; ?>
			
		</section> <!--end #blogwrapper-->
<?php get_footer(); ?>