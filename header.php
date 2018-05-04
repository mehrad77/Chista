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

<?php wp_head();
//Meta tags start
if (is_singular()) :
?>
<meta name="twitter:title" content="<?php the_title() ?>" />
<meta name="twitter:site" content="@Retooeter" />
<meta name="twitter:description" content="<?php echo  wp_trim_words(get_the_content(''),50,'... ') ?>" />
<meta property="og:description" content="<?php echo  wp_trim_words(get_the_content(''),50,'... ') ?>" />
<meta name="description" content="<?php echo  wp_trim_words(get_the_content(''),50,'... ') ?>"/>

<?php 
global $post;
$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
echo '<meta name="twitter:image" content="' . esc_attr( $thumbnail_src[0] ) . '" />';

	  else: ?>
	
<meta property="og:image" content="https://www.nima.today/wp-content/uploads/2018/02/LogoType-NimaShafiezadeh-768x388.jpg" />
<meta property="og:image:width" content="840" />
<meta property="og:image:height" content="400" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:description" content="اولین تجربه‌های من از دنیای دیجیتال مارکتینگ، با حضورم در «فرندفید» و بعد «گودر» شکل گرفت و نهایتا در «توییتر» به شکل حرفه‌ای و جدی‌تری ادامه پیدا کرد. من علاقۀ زیادی به بلندپروازی دارم و به نظرم تو هیچ کاری مثل دیجیتال مارکتینگ نمی‌شه بلندپرواز بود." />
<meta property="og:description" content="اولین تجربه‌های من از دنیای دیجیتال مارکتینگ، با حضورم در «فرندفید» و بعد «گودر» شکل گرفت و نهایتا در «توییتر» به شکل حرفه‌ای و جدی‌تری ادامه پیدا کرد. من علاقۀ زیادی به بلندپروازی دارم و به نظرم تو هیچ کاری مثل دیجیتال مارکتینگ نمی‌شه بلندپرواز بود." />
<meta name="description" content="گیک بازاریابی دیجیتال"/>
<meta name="twitter:title" content="گیک بازاریابی دیجیتال | نیما شفیع‌زاده" />
<meta name="twitter:site" content="@Retooeter" />
<meta name="twitter:image" content="https://www.nima.today/wp-content/uploads/2018/02/LogoType-NimaShafiezadeh-768x388.jpg" />
	<?
endif;
//Meta tags end
?>

 ?>
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
						<?php chronus_site_logo(); ?>
						<?php if (is_singular()) : ?><h1 class="site-title"><a href="https://www.nima.today/" rel="home">نیما شفیع&zwnj;زاده</a></h1>
						<?php else:  chronus_site_title(); endif; ?>
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
