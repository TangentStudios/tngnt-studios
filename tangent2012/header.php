<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php ghpseo_output('main_title'); ?></title>
	<?php wp_head(); ?>

	<meta name="description" content="<?php ghpseo_output('description'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css">
	<link rel="icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
	<script>document.cookie='resolution='+Math.max(screen.width,screen.height)+("devicePixelRatio" in window ? ","+devicePixelRatio : ",1")+'; path=/';</script>
	<script src="<?php bloginfo('template_directory'); ?>/js/libs/modernizr-2.5.2.min.js"></script>
</head>
<body <?php body_class(); ?>>
<div id="container">
	<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
		<header id="banner" class="clearfix">
			<a class="logo ir<?php if ( is_front_page() ) { echo ' current'; } ?>" href="<?php bloginfo('url'); ?>">Tangent Studios</a>
			<?php if( is_singular() ){ $p_type = get_post_type( $post->ID ); } ?>
			<nav class="nav-primary">
				<ul>
					<li><a href="<?php bloginfo('url'); ?>/about/"<?php if ( is_page('about')) { echo ' class="current"'; } ?>>About</a></li>
					<li><a href="<?php bloginfo('url'); ?>/portfolio/"<?php if ( is_page('portfolio')|| ( $p_type == 'portfolio' )) { echo ' class="current"'; } ?>>Portfolio</a></li>
					<li><a href="<?php bloginfo('url'); ?>/contact/"<?php if ( is_page('contact')) { echo ' class="current"'; } ?>>Contact</a></li>
					<li><a href="<?php bloginfo('url'); ?>/blog/"<?php if ( is_home()) { echo ' class="current"'; } ?>>Blog</a></li>
				</ul>
			<a href="#" id="nav-sub-link">=</a>
			</nav>
		</header> <!--end #banner-->
		<nav id="nav-sub">
			<ul>
				<li><a href="<?php bloginfo('url'); ?>/about/">About</a></li>
				<li><a href="<?php bloginfo('url'); ?>/portfolio/">Portfolio</a></li>
				<li><a href="<?php bloginfo('url'); ?>/contact/">Contact</a></li>
				<li><a href="<?php bloginfo('url'); ?>/blog/">Blog</a></li>
			</ul>
		</nav>