<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="wrap">
 *
 * @package Organic Origin
 * @since Organic Origin 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<!-- TOP Bar -->
<div id="top_bar">
	<div id="wrapper">
		<?php if ( has_nav_menu( 'social-menu' ) ) { ?>

				<div class="align-right">

					<?php wp_nav_menu( array(
						'theme_location' => 'social-menu',
						'title_li' => '',
						'depth' => 1,
						'container_class' => 'social-menu',
						'menu_class'      => 'social-icons',
						'link_before'     => '<span>',
						'link_after'      => '</span>',
						)
					); ?>
					
					<div class="search-btn"><i class="fa fa-search"></i></div>
					<div class="search-box">
						<h5>What are you looking for?</h5>
						<?php get_search_form(); ?>
					</div>

				</div>

				<?php } ?>
	</div>
	
</div>

<!-- BEGIN #wrapper -->
<div id="wrapper">

	<!-- BEGIN #header -->
	<div id="header">

		<!-- BEGIN #nav-bar -->
		<div id="nav-bar">

		<div class="site-logo">

			<?php the_custom_logo(); ?>

			<?php if ( is_front_page() && is_home() ) { ?>
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a>
				</h1>
			<?php } else { ?>
				<p class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a>
				</p>
			<?php } ?>

		</div>

		<?php if ( has_nav_menu( 'main-menu' ) ) { ?>


			<!-- BEGIN MAIN #navigation -->
			<nav id="navigation" class="navigation-main">

				<!--<button class="menu-toggle">
					<svg class="icon-menu-open" version="1.1" id="icon-open" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						 width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
						<rect y="2" width="24" height="2"/>
						<rect y="11" width="24" height="2"/>
						<rect y="20" width="24" height="2"/>
					</svg>
					<svg class="icon-menu-close" version="1.1" id="icon-close" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
						<rect x="0" y="11" transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 12 28.9706)" width="24" height="2"/>
						<rect x="0" y="11" transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 28.9706 12)" width="24" height="2"/>
					</svg>
				</button>-->

				<?php
					wp_nav_menu( array(
						'theme_location'		=> 'main-menu',
						'title_li'					=> '',
						'depth'							=> 4,
						'fallback_cb'			 	=> 'wp_page_menu',
						'container_class' 	=> '',
						'menu_class'				=> 'menu',
						)
					);
				?>

			<!-- END #navigation -->
			</nav>

		<?php } ?>

		<!-- END #nav-bar -->
		</div>
		
		<!-- BEGIN MOBILE #navigation -------->
			<div class="row">
				<nav id="navigation-mobile" class="radius-none">
					<?php wp_nav_menu( array( 
						'theme_location' => 'main-menu', 
						'title_li' => '', 
						'depth' => 4,
						'menu_class' => 'dl-menu',
						'container_class' => 'dl-menuwrapper',
						'container_id' => 'dl-menu'
					)); ?>
				</nav>
			</div>	
			<!-- END MOBILE Menu ------------>

		<?php if ( is_home() || is_archive() || is_search() || is_attachment() ) { ?>

		<!-- BEGIN #custom-header -->
		<div id="custom-header">

			<!-- BEGIN .row -->
			<div class="row">

				<div id="masthead" class="vertical-center">

				<?php if ( is_front_page() && is_home() ) { ?>
					<h2 class="site-description">
						<?php echo html_entity_decode( get_bloginfo( 'description' ) ); ?>
					</h2>
				<?php } else { ?>
					<p class="site-description">
						<?php echo html_entity_decode( get_bloginfo( 'description' ) ); ?>
					</p>
				<?php } ?>

				</div>

				<?php the_custom_header_markup(); ?>

			<!-- END .row -->
			</div>

		<!-- END #custom-header -->
		</div>

		<?php } ?>

	<!-- END #header -->
	</div>

	<!-- BEGIN .container -->
	<div class="container">
