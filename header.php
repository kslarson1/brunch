<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Brunch
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<link href='http://fonts.googleapis.com/css?family=Playfair+Display+SC:400,700|Roboto:400,300,100' rel='stylesheet' type='text/css'>  <!-- google fonts -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">  <!-- font awesome -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>  <!-- modernizr -->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'brunch' ); ?></a>

	<!-- start of nav -->
<nav id="site-navigation" class="main-navigation" role="navigation">

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-2">
			<div class="image_logo" style="background-image: url(<?php the_field('header_logo'); ?>);"></div>
		</div>
	<div class="col-xs-10">
<ul id="menu">
	<li><a href="/brunch">Home</a></li>
    <li><a href="/brunch/brunch_review">Most Recent Brunches</a></li>
</ul>
</div>
</div>
</div>

</nav>

<script>
	$(function(){
		$('#menu').slicknav();
	});
</script>

<!-- end of nav -->

	<div id="content" class="site-content">
