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
<!-- Colors -->
<meta name="theme-color" content="#81007f">
<meta name="apple-mobile-web-app-status-bar-style" content="#81007f">
<meta name="twitter:card" content="summary_large_image" />
<meta property="og:image:width" content="840" />
<meta property="og:image:height" content="400" />
<meta name="twitter:description" content="<?php echo get_bloginfo( 'description' ); ?>" />
<meta property="og:description" content="<?php echo get_bloginfo( 'description' ); ?>" />
<meta name="description" content="<?php echo get_bloginfo( 'description' ); ?>"/>
<meta name="twitter:title" content="<?php echo get_bloginfo( 'name' ); ?>" />
<?php
$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>
<meta property="og:image" content="<?php echo $image[0]; ?>" />
<meta name="twitter:image" content="<?php echo $image[0]; ?>" />
<?php 
//Meta tags start
if (is_singular()) :
	global $post;
	setup_postdata($post);
?>
	<meta name="twitter:title" content="<?php the_title() ?>" />
	<meta name="twitter:description" content="<?php echo wp_trim_words(get_the_content(''),40,'... ') ?>" />
	<meta property="og:description" content="<?php echo wp_trim_words(get_the_content(''),40,'... ') ?>" />
	<meta name="description" content="<?php echo wp_trim_words(get_the_content(''),40,'... ') ?>"/>
	<?php 
	global $post;
	$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
	echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
	echo '<meta name="twitter:image" content="' . esc_attr( $thumbnail_src[0] ) . '" />';
endif;
//Meta tags end
wp_head();
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() )  ?>/css/font-awesome.min.css">
</head>

<body <?php body_class(); ?>>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'chronus' ); ?></a>

	<?php do_action( 'chronus_header_bar' ); ?>

	<?php chronus_header_image(); ?>

	<div id="page" class="hfeed site">

		<header id="masthead" class="site-header clearfix" role="banner">

			<div class="header-main container clearfix">

				<div id="logo" class="site-branding clearfix">
					<div class="desktop-right " style="float:right;">
						<?php chronus_site_title(); ?>
						<?php chronus_site_description(); ?>
					</div>
					<div class="desktop-left" style="float:left;">
						<?php chronus_site_logo(); ?>
					</div>

				</div><!-- .site-branding -->

			</div><!-- .header-main -->

			<?php get_template_part( 'template-parts/header/navigation', 'main' ); ?>

		</header><!-- #masthead -->

		<?php chronus_featured_content(); ?>

		<?php chronus_breadcrumbs(); ?>
		<div id="content" class="site-content container clearfix">
