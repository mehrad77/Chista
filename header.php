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
<meta name="twitter:description" content=<?php echo get_bloginfo( 'description' ); ?>" />
<meta property="og:description" content="<?php echo get_bloginfo( 'description' ); ?>" />
<meta name="description" content="<?php echo get_bloginfo( 'description' ); ?>"/>
<meta name="twitter:title" content="<?php the_title() ?>" />
<meta name="twitter:site" content="@Retooeter" />
<meta name="twitter:image" content="https://www.nima.today/wp-content/uploads/2018/02/LogoType-NimaShafiezadeh-768x388.jpg" />
	<?
endif;
//Meta tags end
?>

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css">
<script src='https://cdn.taxus.ir/script/search-wp.js' data-taxus-api-key='eyJhbGciOiJIUzUxMiJ9.eyJjIjoiM2FmN2NhYjctYmFiMS00ZDJhLTk1YmItYjRhMzNkMWMwNmY3IiwidSI6IjNhZGZmNjNkLTdmNzUtNDRjZC04ZmE1LTgyNmY2MWU5OWRiZCJ9.1v0_3Hjy-gpr-gwzxYYYJjQG-55PuBe3S8jGuoC-B5fb2mtvqji5e7tV0ck-oP8LvfMa8Jsu5G49SIiwB3QbXQ'></script>
<!— MailerLite Universal —>
<script>
(function(m,a,i,l,e,r){ m['MailerLiteObject']=e;function f(){
var c={ a:arguments,q:[]};var r=this.push(c);return "number"!=typeof r?r:f.bind(c.q);}
f.q=f.q||[];m[e]=m[e]||f.bind(f.q);m[e].q=m[e].q||f.q;r=a.createElement(i);
var _=a.getElementsByTagName(i)[0];r.async=1;r.src=l+'?v'+(~~(new Date().getTime()/1000000));
_.parentNode.insertBefore(r,_);})(window, document, 'script', 'https://static.mailerlite.com/js/universal.js', 'ml');
var ml_account = ml('accounts', '1059636', 'r8x8l6s0j7', 'load');
</script>
<!— End MailerLite Universal —>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css">
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
