<?php
/**
 * The head tag content for our header.
 *
 * Displays all of the <head> section
 *
 * @package chista
 */

?>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<!-- Colors -->
<meta name="theme-color" content="#81007f">
<meta name="apple-mobile-web-app-status-bar-style" content="#81007f">

<?php
	if ( true === chista_get_option( 'blog_social_metatags' ) ):  
		//Meta tags start ?>
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
		 
		<?php if (is_singular()) :
			global $post;
			setup_postdata($post); ?>
	
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
	endif;
//Meta tags end
wp_head();
?>
<script src="<?php echo esc_url( get_template_directory_uri() )  ?>/assets/js/notify.min.js"></script>
<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() )  ?>/assets/css/font-awesome.min.css">