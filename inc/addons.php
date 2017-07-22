<?php
/**
 * Add Support for Theme Addons
 *
 * @package Chronus
 */

/**
 * Register support for Jetpack and theme addons
 */
function chronus_theme_addons_setup() {

	// Add theme support for Chronus Pro plugin.
	add_theme_support( 'chronus-pro' );

	// Add theme support for ThemeZee Plugins.
	add_theme_support( 'themezee-breadcrumbs' );
	add_theme_support( 'themezee-mega-menu', array( 'primary', 'secondary' ) );

	// Add theme support for Widget Bundle.
	add_theme_support( 'themezee-widget-bundle', array(
		'thumbnail_size' => array( 120, 80 ),
		'svg_icons'      => true,
	) );

	// Add theme support for Related Posts.
	add_theme_support( 'themezee-related-posts', array(
		'thumbnail_size' => array( 400, 250 ),
	) );

	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container'      => 'main',
		'footer_widgets' => 'footer',
		'render'         => 'chronus_infinite_scroll_render',
	) );

	// Add Theme Support for wooCommerce.
	add_theme_support( 'woocommerce' );

}
add_action( 'after_setup_theme', 'chronus_theme_addons_setup' );


/**
 * Load custom stylesheets for theme addons
 */
function chronus_theme_addons_scripts() {

	// Load widget bundle styles if widgets are active.
	if ( is_active_widget( 'TZWB_Facebook_Likebox_Widget', false, 'tzwb-facebook-likebox' )
		or is_active_widget( 'TZWB_Recent_Comments_Widget', false, 'tzwb-recent-comments' )
		or is_active_widget( 'TZWB_Recent_Posts_Widget', false, 'tzwb-recent-posts' )
		or is_active_widget( 'TZWB_Social_Icons_Widget', false, 'tzwb-social-icons' )
		or is_active_widget( 'TZWB_Tabbed_Content_Widget', false, 'tzwb-tabbed-content' )
	) {

		// Enqueue Widget Bundle stylesheet.
		wp_enqueue_style( 'themezee-widget-bundle', get_template_directory_uri() . '/assets/css/themezee-widget-bundle.css', array(), '20160421' );

	}

	// Load Related Posts stylesheet only on single posts.
	if ( is_singular( 'post' ) ) {

		// Enqueue Related Post stylesheet.
		wp_enqueue_style( 'themezee-related-posts', get_template_directory_uri() . '/assets/css/themezee-related-posts.css', array(), '20160421' );

	}

}
add_action( 'wp_enqueue_scripts', 'chronus_theme_addons_scripts' );


/**
 * Custom render function for Infinite Scroll.
 */
function chronus_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', esc_attr( chronus_get_option( 'blog_layout' ) ) );
	}
}


/**
 * Set wrapper start for wooCommerce
 */
function chronus_wrapper_start() {
	echo '<section id="primary" class="content-area">';
	echo '<main id="main" class="site-main" role="main">';
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
add_action( 'woocommerce_before_main_content', 'chronus_wrapper_start', 10 );


/**
 * Set wrapper end for wooCommerce
 */
function chronus_wrapper_end() {
	echo '</main><!-- #main -->';
	echo '</section><!-- #primary -->';
}
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_after_main_content', 'chronus_wrapper_end', 10 );
