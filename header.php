<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package chista
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	
<?php get_template_part( 'head'); ?>

</head>

<body <?php body_class(); ?>>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'chista' ); ?></a>

	<?php do_action( 'chista_header_bar' ); ?>

	<?php chista_header_image(); ?>

	<div id="page" class="hfeed site">

		<header id="masthead" class="site-header clearfix" role="banner">

			<div class="header-main container clearfix">

				<div id="logo" class="site-branding clearfix">
					<div class="desktop-right " style="float:right;">
						<?php chista_site_title(); ?>
						<?php chista_site_description(); ?>
					</div>
					<div class="desktop-left" style="float:left;">
						<?php chista_site_logo(); ?>
					</div>

				</div><!-- .site-branding -->

			</div><!-- .header-main -->

			<?php get_template_part( 'template-parts/header/navigation', 'main' ); ?>

		</header><!-- #masthead -->

		<?php chista_featured_content(); ?>

		<?php chista_breadcrumbs(); ?>
		<div id="content" class="site-content container clearfix">
