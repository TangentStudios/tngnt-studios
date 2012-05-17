<?php /* Template Name: Home */ ?>
<?php get_header(); ?>
	<div id="hero" class="slider">
		<div class="nav_logo">
			<div id="placer">
				<div class="watermark">
					<img src="<?php bloginfo('template_directory'); ?>/img/watermark.png" border="0" />                    
				</div>
				<img src="<?php bloginfo('template_directory'); ?>/img/flick/hero.png" border="0"/>
			</div> <!--end #placer-->
			
			<img src="<?php bloginfo('template_directory'); ?>/img/flick/load.gif" id="logo_img_loader" />
				 
			<!-- image container -->
			<div id="img_wall">
				<?php $attachments = get_posts( array(
						'post_type' => 'attachment',
						'posts_per_page' => -1,
						'post_parent' => $post->ID
					) );
			
					if ( $attachments ) {
						foreach ( $attachments as $attachment ) {
							$postimg = wp_get_attachment_url( $attachment->ID );
							echo '<figure class="wall_img"><img src="' . $postimg . '"/></figure>';
						}
				} ?>    
			</div>
			<!-- end image container -->
			
			</div> <!--end .nav_logo-->
	</div> <!--end #hero-->
	<div id="main" class="clearfix">
		<section id="intro">
			<div class="limiter clearfix">
				<div class="description">
					<div class="home_content">
						<h2>Tangent Studios</h2>
						<p class="intro">We believe in good craftsmanship, an attention to detail, and that sweet spot between an idea and the final product. <a href="<?php bloginfo('url'); ?>/portfolio/">See what we can do for you.</a></p>
					</div>
					<div id="design" class="home_content">
						<h2>Design</h2>
						<p class="intro">We specialise in designing bespoke pieces and solutions that are tailored to your needs and ultimately engage your audience. It’s what we do best.</p>
					</div>
					<div id="development" class="home_content">
						<h2>Development</h2>
						<p class="intro">We can turn those super web designs into super websites. We do all the fancy stuff behind the scenes such as mobile site development and CMS integration.</p>
					</div>
					<div id="photography" class="home_content">
						<h2>Photography</h2>
						<p class="intro">We don’t just design and develop; we take pretty good pictures too! If you’re after some nice photos for your site, brochure, or lookbook, we can help.</p>
					</div>
				</div> <!--end .description-->
				<div class="icons clearfix">
					<div class="icon">
						<a href="#design" id="home_design">
						<span class="design">Design</span>
						<h4>Design</h4>
						<p><a href="<?php bloginfo('url'); ?>/about/">Read More</a></p>
						</a>
					</div>
					<div class="icon">
						<a href="#development" id="home_dev">
						<span class="dev">Development</span>
						<h4>Development</h4>
						<p><a href="<?php bloginfo('url'); ?>/about/">Read More</a></p>
						</a>
					</div>
					<div class="icon">
						<a href="#photography" id="home_photo">
						<span class="photo">Photography</span>
						<h4>Photography</h4>
						<p><a href="<?php bloginfo('url'); ?>/about/">Read More</a></p>
						</a>
					</div>
				</div> <!--end .icons-->
			</div> <!--end .limiter-->
		</section> <!--end .intro-->
		
<?php get_footer(); ?>
