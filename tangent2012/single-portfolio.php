<?php get_header(); ?>
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	<div id="hero" class="clearfix">
		<?php // Get the featured image
			$image_id = get_post_thumbnail_id();  
			// Get the full size image details
			$full_url = wp_get_attachment_image_src($image_id, 'hero-image');
			$full_url = $full_url[0]; ?>
		<img src="<?php echo $full_url; ?>" title="<?php the_title(); ?>" />
	</div> <!--end #hero-->
	<div id="main" class="clearfix">
		<section id="portfoliowrapper">
			<div class="articlewrap clearfix">
				<article>
					<h2><?php the_title() ?></h2>
					<?php echo tngnt_get_clean_content(apply_filters('the_content', $post->post_content)); ?>
				</article>
				
				<div id="meta">
					<div class="sctn">
					<h3>Services</h3>
						<ul>
							<?php 
							foreach((get_the_category()) as $category) { 
							    echo '<li>' . $category->cat_name . '</li>'; 
							} 
							?>
						</ul>
						
						<?php $site= get_post_custom_values('projLink'); if($site[0] != ""){ ?>  
						<a href="<?=$site[0]?>" class="btn">Visit the Site</a>
						<?php }else{ ?> 
						<?php } ?>
					</div> <!--end .sctn-->
				</div> <!--end #meta-->
			</div> <!--end .articlewrap-->
			
			<div class="articlewrap images clearfix">
				<?php 
				$thumb_id = get_post_thumbnail_id(get_the_ID());
				$attachments = get_posts( array(
					'post_type' => 'attachment',
					'posts_per_page' => -1,
					'post_parent' => $post->ID,
					'order' => 'ASC',
					'exclude' => array($thumb_id)
				) );
		
				if ( $attachments ) {
					foreach ( $attachments as $attachment ) {
						$postimg = wp_get_attachment_url( $attachment->ID );
						echo '<figure><img src="' . $postimg . '"/></figure>';
					}
		
				} ?>
				
				<?php /* show embeded objects */
					$e = count(tngnt_get_embed($post->post_content)); $r = 1;
					foreach ( tngnt_get_embed(apply_filters('the_content', $post->post_content)) as $embed ): ?>
						<figure class="videoEmbed">
							<?php echo tngnt_add_new_height_width($embed); ?>
						</figure> <!--end .videoEmbed-->
				<?php $r++; endforeach; ?>
			</div> <!--end .images-->
			
			<div class="articlewrap more-work clearfix">
				<article>
					<?php if (get_adjacent_post(false, '', true)): // if there are older posts ?>
					    <span class="alignLeft"><?php previous_post_link('%link'); ?></span>
					<?php endif; ?>
					<?php if (get_adjacent_post(false, '', false)): // if there are newer posts ?>
					    <span class="alignRight"><?php next_post_link('%link'); ?></span>
					<?php endif; ?>
					<!--<a href="#" class="alignLeft">Previous Project</a> <a href="#" class="alignRight">Next Project</a>-->
				</article>
			</div>
				
		</section> <!--end #contentwrapper-->
		
	<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>
