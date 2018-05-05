<?php
/**
 * Returns theme options
 *
 * Uses sane defaults in case the user has not configured any theme options yet.
 *
 * @package chista
 */

/**
* Get a single theme option
*
* @return mixed
*/
function chista_get_option( $option_name = '' ) {

	// Get all Theme Options from Database.
	$theme_options = chista_theme_options();

	// Return single option.
	if ( isset( $theme_options[ $option_name ] ) ) {
		return $theme_options[ $option_name ];
	}

	return false;
}


/**
 * Get saved user settings from database or theme defaults
 *
 * @return array
 */
function chista_theme_options() {

	// Merge theme options array from database with default options array.
	$theme_options = wp_parse_args( get_option( 'chista_theme_options', array() ), chista_default_options() );

	// Return theme options.
	return $theme_options;
}


/**
 * Returns the default settings of the theme
 *
 * @return array
 */
function chista_default_options() {

	$default_options = array(
		'site_title'            => true,
		'site_description'      => true,
		'sidebar_position'      => 'right-sidebar',
		'blog_layout'           => 'excerpt',
		'blog_title'            => '',
		'blog_description'      => '',
		'excerpt_length'        => 35,
		'blog_magazine_widgets' => true,
		'meta_date'             => true,
		'meta_author'           => true,
		'meta_category'         => true,
		'meta_tags'             => true,
		'post_navigation'       => true,
		'post_image_archives'   => true,
		'post_image_single'     => true,
		'featured_posts'        => false,
		'featured_category'     => 0,
	);

	return $default_options;
}
