<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aizen_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="theme-color" content="#ffffff">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<header id="masthead" class="site-header">
			<div class="container">
				<div class="site-header__inner">
					<div class="site-branding">
						<a href="/" class="main-menu__logo"><img src="" alt="logo-site"></a>
					</div><!-- .site-branding -->
					<nav id="site-navigation" class="main-navigation">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
								'menu_class'			 => 'main-menu'
							)
						);
						?>
					</nav><!-- #site-navigation -->
					<div class="site-navigation-toggle">
						<span class="toggle_menu">
							<span class="sandwich">
								<span class="sw-topper"></span>
								<span class="sw-middle"></span>
								<span class="sw-footer"></span>
							</span>
						</span>
					</div>
				</div>
			</div>
		</header><!-- #masthead -->
		<main id="primary" class="site-main">