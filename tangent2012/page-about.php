<?php /* Template Name: About */ ?>
<?php get_header(); ?>
	<div id="hero" class="clearfix">
		<h2>Tangent Studios.</h2>
		<div class="team clearfix">
	    	<img src="<?php bloginfo('template_directory'); ?>/img/tngntteam.png" alt="">
	    </div>
	</div> <!--end #hero-->
	<div id="main" class="clearfix">
		<section id="contentwrapper">
			<div class="articlewrap clearfix">
				<article>
					<p class="intro">We believe in good craftsmanship, an attention to detail, and that sweet spot between an idea and the final product.</p>
					<p>We are a dashing 2 man collective working out of Guildford, Surrey. We are experts in giving our clients and their customers awesome products, and ultimately, we love what we do!</p>
					<p>Because we're <a href="http://youtube.com/watch?v=Nt2OVAgkHBc">just two guys</a>, we're not a big corporate company that are just in it for the money. We do what we do purely for our passion of creating slick websites &amp; badass graphics. Being a small company, we can work directly with you and give you the interaction you deserve. It means we can be with you every step of the way with your project.</p>
				</article>
			</div>
				
			<div class="articlewrap clearfix">
				<article>
					<div class="bio clearfix">
						<h3>Sam King</h3>
						<h4>Co-Founder</h4>
						<p><a href="mailto:<?php echo antispambot(the_author_meta('user_email',3), 1); ?>?subject=Hello%20Sam" title="Email Sam"><?php echo antispambot(the_author_meta('user_email',3), 0); ?></a> / <span><a href="http://twitter.com/samkingphoto">@samkingphoto</a></span></p>
						<figure class="bio-photo"><img src="<?php bloginfo('template_directory'); ?>/img/bio-sam.png" /></figure>
						<p>Sam's been taking photos and building websites for the past 5 years and he's always playing with the newest technology. Despite being mainly a photographer and web designer/developer, Sam also loves to design for print, shoot and edit videos, and ride a BMX amongst a plethora of other things! He does all this because it gives him a new way to look at photography or designing for the web.</p>
					</div> <!--end .bio-->
					
					<div class="bio eoin clearfix">
						<h3>Eoin Tunstead</h3>
						<h4>Co-Founder</h4>
						<p><a href="mailto:<?php echo antispambot(the_author_meta('user_email',2), 1); ?>?subject=Hello%20Eoin" title="Email Eoin"><?php echo antispambot(the_author_meta('user_email',2), 0); ?></a> / <span><a href="http://twitter.com/EoinTunstead">@EoinTunstead</a></span></p>
						<figure class="bio-photo"><img src="<?php bloginfo('template_directory'); ?>/img/bio-eoin.png" /></figure>
						<p>Eoin studies at LCC, and is about to begin his final year in Graphic &amp; Media Design: Typographics. Design has created many opportunities, working alongside Martin Lambie-Nairn, interning for WPP's Digit, operating on a number of music videos. These experiences influenced and inspired Eoin and are seen in his conceptual approach to design. Self publishing book's and zine's is a great passion of his.</p>
					</div> <!--end .bio-->
							
					<div class="bio bottom clearfix">
						<h3>Reis Reffold</h3>
						<h4>Designer</h4>
						<p><a href="mailto:<?php echo antispambot(the_author_meta('user_email',4), 1); ?>?subject=Hello%20Reis" title="Email Reis"><?php echo antispambot(the_author_meta('user_email',4), 0); ?></a> / <span><a href="http://twitter.com/rgreffold">@rgeffold</a></span></p>
						<figure class="bio-photo"><img src="<?php bloginfo('template_directory'); ?>/img/bio-reis.png" /></figure>
						<p>Reis currently studies Typography and Graphics at LCC. An enthusiastic and inspired designer, with a desire to produce engaging and original ideas. Reis combines a passion for book design, typography and illustration, striving to create engaging, memorable and articulate design whilst aiming also to challenge concepts, explore boundaries, and invent both original and transgressive work.</p>
					</div> <!--end .bio-->
					
				</article>
			</div>
		</section> <!--end #contentwrapper-->
		
		<section id="sidebar">
			<div class="sctn about-services">
				<div class="section">
					<h3 class="design">Design</h3>
					<ul>
						<li>Web Design</li>
						<li>Branding &amp; Identity</li>
						<li>Mobile Websites</li>
						<li>Portfolio Websites</li>
						<li>Print Design</li>
						<li>Graphic Design</li>
					</ul>
				</div>
				
				<div class="section right">
					<h3 class="develop">Development</h3>
					<ul>
						<li>Web Development</li>
						<li>Wordpress &amp; Others</li>
						<li>E-Commerce Integration</li>
						<li>CMS Integration</li>
						<li>Hosting Packages</li>
					</ul>
				</div>
				
				<div class="section">
					<h3 class="photo">Photography</h3>
					<ul>
						<li>Bespoke Photographs</li>
						<li>Lookbooks</li>
						<li>Video &amp; Animation</li>
						<li>&amp; More</li>
					</ul>
				</div>
				
				<div class="section right">
					<h3>Work with us.</h3>
					<p>If you'd love to work with us, all you have to do is get in touch!</p>
					<a href="mailto:<?php echo antispambot(get_bloginfo('admin_email'), 1); ?>?subject=Hello%20Tangent%20Studios" title="Email Tangent Studios" class="btn"><?php echo antispambot(get_bloginfo('admin_email'), 0); ?></a>
				</div>
			</div> <!--end .sctn-->
		</section> <!--end #sidebar-->
<?php get_footer(); ?>
