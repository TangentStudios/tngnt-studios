<?php /* Template Name: Portfolio Grid */ ?>
<?php get_header(); ?>
	<div id="hero" class="clearfix">
		<h2>What we've made.</h2>
	</div> <!--end #hero-->
	<div id="main" class="clearfix">
		<section id="content">
			<?php query_posts(array('post_type'=>'portfolio', 'posts_per_page'=>'30')); ?>
			<?php $count = 0; ?>
				<?php if (have_posts()) :
					while (have_posts()) : the_post(); ?>
				<?php if ($count % 10 == 0 ) { $bigclass = ' big'; } else { $bigclass = ''; } ?>
				<?php if ($count % 10 == 7 ) { $bigrclass = ' big right'; } else { $bigrclass = ''; } ?>
				<?php if ($count % 10 == 2 || $count % 10 == 4 ) { $lastclass = ' last'; } else { $lastclass = ''; } ?>
				
			<?php if ( $count % 5 == 0 ) { echo '<div class="clearfix">'; } ?>
			<figure class="p-item<?php echo $bigclass; ?><?php echo $bigrclass; ?><?php echo $lastclass; ?><?php echo $clearclass; ?>" id="<?php echo $post->post_name; ?>">				                
				<a class="permalink" href="<?php the_permalink() ?>">
					<?php // Get the featured image
						$image_id = get_post_thumbnail_id();  
						// Get the full size image details
						$image_url = wp_get_attachment_image_src($image_id, 'portfolio-bw');
						$image_url = $image_url[0]; ?>
					<img src="<?php echo $image_url; ?>" title="<?php the_title(); ?>" />
				</a>
				<a href="<?php echo get_permalink($post->id) ?>" class="screen-hover"><?php the_title() ?></a>
			</figure>
			<?php if ( $count % 5 == 4 ) { echo '</div>'; } ?>
			<?php $count++; ?> 
			<?php endwhile; endif; ?>
		</section> <!--end #content-->
<?php get_footer(); ?>




