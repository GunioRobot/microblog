<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8" />
	<title><?php display_meta_title( ); ?></title>
	<meta description="<?php bloginfo( 'description' ); ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo( 'rss2_url' ); ?>" title="<?php bloginfo( 'name' ); ?> » Articles" />
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo( 'comments_rss2_url' ); ?>" title="<?php bloginfo( 'name' ); ?> » Comments" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!-- Internet Explorer HTML5 enabling code: -->
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="top-nav-wrapper">
		<nav id="top-nav" class="col-2">
			<div id="top-nav-left" class="col-2-1-70"><?php display_site_rss_button(); ?> <?php display_breadcrumbs(); ?></div>
			<div id="top-nav-right" class="col-2-2-30"><?php get_search_form(); ?></div>
		</nav>
	</div><!-- END top-nav-wrapper -->
	
	<div id="site-header-wrapper">
		<header id="site-header">
			<hgroup>
				<?php
				/**
				 * Based on work by the WordPress team
				 * @package WordPress
				 * @subpackage Twenty_Ten
				 */
				$heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'h2';
				$subheading_tag = ( is_home() || is_front_page() ) ? 'h2' : 'h3';
				?>
				<<?php echo $heading_tag; ?> id="site-title"><a href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'name' ); ?> | <?php bloginfo( 'description' ); ?>"><?php bloginfo( 'name' ); ?></a></<?php echo $heading_tag; ?>>
				<<?php echo $subheading_tag; ?> id="tagline"><a href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'name' ); ?> | <?php bloginfo( 'description' ); ?>"><?php bloginfo( 'description' ); ?></a></<?php echo $subheading_tag; ?>>
			</hgroup>
		</header><!-- END site-header -->
	</div><!-- END site-header-wrapper -->

	<div id="main-menu-wrapper">
		<nav id="main-menu" class="drop-down-menu">
			<?php wp_nav_menu( array(
				'theme_location' => 'main-menu',
				'container' => ''
				));
				echo "\n"; ?>
		</nav>
	</div><!-- END main-menu-wrapper -->

