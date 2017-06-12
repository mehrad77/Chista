<?php
/**
 * Callback Functions
 *
 * Used to determine whether an option setting is displayed or not.
 * Called via the active_callback parameter of the add_control() function
 *
 * @package Chronus
 */

/**
 * Adds a callback function to retrieve wether post content is set to excerpt or not
 *
 * @param object $control / Instance of the Customizer Control.
 * @return bool
 */
function chronus_control_blog_layout_callback( $control ) {

	// Check if excerpt mode is selected.
	if ( 'excerpt' === $control->manager->get_setting( 'chronus_theme_options[blog_layout]' )->value() ) :
		return true;
	else :
		return false;
	endif;

}


/**
 * Adds a callback function to retrieve wether slider is activated or not
 *
 * @param object $control / Instance of the Customizer Control.
 * @return bool
 */
function chronus_slider_activated_callback( $control ) {

	// Check if Slider is turned on.
	if ( true === $control->manager->get_setting( 'chronus_theme_options[slider_active]' )->value() ) :
		return true;
	else :
		return false;
	endif;

}
