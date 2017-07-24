<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Chronus
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'chronus' ); ?></a>

	<?php do_action( 'chronus_header_bar' ); ?>

	<?php chronus_header_image(); ?>

	<div id="page" class="hfeed site">

		<header id="masthead" class="site-header clearfix" role="banner">

			<div class="header-main container clearfix">

				<div id="logo" class="site-branding clearfix">

					<?php chronus_site_logo(); ?>
					<?php chronus_site_title(); ?>
					<?php chronus_site_description(); ?>

				</div><!-- .site-branding -->

			</div><!-- .header-main -->

			<?php get_template_part( 'template-parts/header/navigation', 'main' ); ?>

		</header><!-- #masthead -->

		<?php chronus_featured_content(); ?>

		<?php chronus_breadcrumbs(); ?>

		<div id="content" class="site-content container clearfix">
