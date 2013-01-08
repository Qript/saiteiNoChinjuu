<?php ?><!DOCTYPE html>
<html lang="ja" id="page">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php if ( is_404() ) : ?>
<title>ご指定のページが見つかりませんでした | <?php bloginfo( 'name' ); ?></title>
<?php elseif ( is_attachment() ) : ?>
<title><?php the_excerpt(); ?> | <?php bloginfo( 'name' ); ?></title>
<?php else : ?>
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<?php endif ?>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link href='<?php bloginfo('template_directory'); ?>/sh/styles/shCore.css' rel='stylesheet' />
	<link href='<?php bloginfo('template_directory'); ?>/sh/styles/shThemeChinju.css' rel='stylesheet' />
	<link rel="icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="Shortcut Icon" type="image/x-icon" href="/favicon.ico" />
	<?php wp_head() ?>
</head>
<body>
<?php if ( is_single() ) : ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php endif ?>
<header id="header">
	<a id="logo" href="<?php bloginfo('url'); ?>">
		<hgroup>
			<h1><?php bloginfo('name'); ?></h1>
			<h2><?php bloginfo('description'); ?></h2>
		</hgroup>
	</a>
	<nav>
		<ul>
			<li><a href="<?php bloginfo('rss2_url'); ?>">RSS</a></li>
			<li><a href="https://twitter.com/SAITEInoCHINJU" target="_blank">Twitter</a></li>
			<!--<li><a href="#">Facebook</a></li>-->
		</ul>
	</nav>
</header>