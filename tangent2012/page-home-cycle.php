<?php /* Template Name: Home */ ?>
<?php get_header(); ?>
	<div id="hero" class="slider">
		<div class="watermark"><img src="<?php bloginfo('template_directory'); ?>/img/watermark.png" /></div>
		<div class="slide">&nbsp;</div>
		<div class="slide" style="background: url(<?php bloginfo('template_directory'); ?>/img/hero-design.png) no-repeat center">&nbsp;</div>
		<div class="slide" style="background: url(<?php bloginfo('template_directory'); ?>/img/hero-dev.png) no-repeat center">&nbsp;</div>
		<div class="slide" style="background: url(<?php bloginfo('template_directory'); ?>/img/hero-photo.png) no-repeat center">&nbsp;</div>
	</div> <!--end #hero-->
	<div id="main" class="clearfix">
		<section id="intro">
			<div class="limiter clearfix">
				<div class="description">
					<div id="home_about_content">
						<h2>Tangent Studios</h2>
						<p class="intro">We believe in good craftsmanship, an attention to detail, and that sweet spot between an idea and the final product. <a href="<?php bloginfo('url'); ?>/portfolio/">See what we can do for you.</a></p>
					</div>
					<div id="home_design_content">
						<h2>Design</h2>
						<p class="intro">We specialise in designing bespoke pieces and solutions that are tailored to your needs and ultimately engage your audience. It’s what we do best.</p>
					</div>
					<div id="home_dev_content">
						<h2>Development</h2>
						<p class="intro">We can turn those super web designs into super websites. We do all the fancy stuff behind the scenes such as mobile site development and CMS integration.</p>
					</div>
					<div id="home_photo_content">
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
