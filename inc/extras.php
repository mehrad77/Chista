<?php
/**
 * Custom functions that are not template related
 *
 * @package chista
 */

if ( ! function_exists( 'chista_default_menu' ) ) :
	/**
	 * Display default page as navigation if no custom menu was set
	 */
	function chista_default_menu() {
		echo '<ul id="menu-main-navigation" class="main-navigation-menu menu">' . wp_list_pages( 'title_li=&echo=0' ) . '</ul>';
	}
endif;

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function chista_body_classes( $classes ) {

	// Get theme options from database.
	$theme_options = chista_theme_options();

	// Check if sidebar widget area is empty or switch sidebar layout to left.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	} elseif ( 'left-sidebar' == $theme_options['sidebar_position'] ) {
		$classes[] = 'sidebar-left';
	}

	// Hide Date?
	if ( false === $theme_options['meta_date'] ) {
		$classes[] = 'date-hidden';
	}

	// Hide Author?
	if ( false === $theme_options['meta_author'] ) {
		$classes[] = 'author-hidden';
	}

	// Hide Category?
	if ( false === $theme_options['meta_category'] ) {
		$classes[] = 'categories-hidden';
	}

	// Hide Time?
	if ( false === $theme_options['meta_time'] ) {
		$classes[] = 'times-hidden';
	}

	return $classes;
}
add_filter( 'body_class', 'chista_body_classes' );


/**
 * Hide Elements with CSS.
 *
 * @return void
 */
function chista_hide_elements() {

	// Get theme options from database.
	$theme_options = chista_theme_options();

	$elements = array();

	// Hide Site Title?
	if ( false === $theme_options['site_title'] ) {
		$elements[] = '.site-title';
	}

	// Hide Site Description?
	if ( false === $theme_options['site_description'] ) {
		$elements[] = '.site-description';
	}

	// Hide Post Tags?
	if ( false === $theme_options['meta_tags'] ) {
		$elements[] = '.type-post .entry-footer .entry-tags';
	}

	// Hide Post Navigation?
	if ( false === $theme_options['post_navigation'] ) {
		$elements[] = '.type-post .entry-footer .post-navigation';
	}

	// Allow plugins to add own elements.
	$elements = apply_filters( 'chista_hide_elements', $elements );

	// Return early if no elements are hidden.
	if ( empty( $elements ) ) {
		return;
	}

	// Create CSS.
	$classes = implode( ', ', $elements );
	$custom_css = $classes . ' { position: absolute; clip: rect(1px, 1px, 1px, 1px); width: 1px; height: 1px; overflow: hidden; }';

	// Add Custom CSS.
	wp_add_inline_style( 'chista-stylesheet', $custom_css );
}
add_filter( 'wp_enqueue_scripts', 'chista_hide_elements', 11 );


/**
 * Change excerpt length for default posts
 *
 * @param int $length Length of excerpt in number of words.
 * @return int
 */
function chista_excerpt_length( $length ) {

	if ( is_admin() ) {
		return $length;
	}

	// Get excerpt length from database.
	$excerpt_length = chista_get_option( 'excerpt_length' );

	// Return excerpt text.
	if ( $excerpt_length >= 0 ) :
		return absint( $excerpt_length );
	else :
		return 40; // Number of words.
	endif;
}
add_filter( 'excerpt_length', 'chista_excerpt_length' );


/**
 * Change excerpt more text for posts
 *
 * @param String $more_text Excerpt More Text.
 * @return string
 */
function chista_excerpt_more( $more_text ) {

	if ( is_admin() ) {
		return $more_text;
	}

	return ' &hellip;';
}
add_filter( 'excerpt_more', 'chista_excerpt_more' );
