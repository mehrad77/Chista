<?php
/**
 * Returns theme options
 *
 * Uses sane defaults in case the user has not configured any theme options yet.
 *
 * @package Chronus
 */

/**
 * Get saved user settings from database or theme defaults
 *
 * @return array
 */
function chronus_theme_options() {

	// Merge theme options array from database with default options array.
	$theme_options = wp_parse_args( get_option( 'chronus_theme_options', array() ), chronus_default_options() );

	// Return theme options.
	return $theme_options;

}


/**
 * Returns the default settings of the theme
 *
 * @return array
 */
function chronus_default_options() {

	$default_options = array(
		'site_title'          => true,
		'site_description'    => true,
		'custom_header_link'  => '',
		'custom_header_hide'  => false,
		'layout'              => 'right-sidebar',
		'blog_title'          => '',
		'blog_description'    => '',
		'excerpt_length'      => 40,
		'meta_date'           => true,
		'meta_author'         => true,
		'meta_category'       => true,
		'meta_tags'           => true,
		'post_navigation'     => true,
		'post_image_archives' => true,
		'post_image_single'   => true,
		'slider_active'       => false,
		'slider_category'     => 0,
		'slider_limit'        => 8,
		'slider_animation'    => 'slide',
		'slider_speed'        => 7000,
	);

	return $default_options;
}
