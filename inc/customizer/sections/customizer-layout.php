<?php
/**
 * Layout Settings
 *
 * Register Layout section, settings and controls for Theme Customizer
 *
 * @package Chronus
 */

/**
 * Adds all layout settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function chronus_customize_register_layout_settings( $wp_customize ) {

	// Add Section for Theme Options.
	$wp_customize->add_section( 'chronus_section_layout', array(
		'title'    => esc_html__( 'Layout Settings', 'chronus' ),
		'priority' => 10,
		'panel'    => 'chronus_options_panel',
	) );

	// Add Settings and Controls for Layout.
	$wp_customize->add_setting( 'chronus_theme_options[sidebar_position]', array(
		'default'           => 'right-sidebar',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'chronus_sanitize_select',
	) );

	$wp_customize->add_control( 'chronus_theme_options[sidebar_position]', array(
		'label'    => esc_html__( 'Sidebar Position', 'chronus' ),
		'section'  => 'chronus_section_layout',
		'settings' => 'chronus_theme_options[sidebar_position]',
		'type'     => 'radio',
		'priority' => 10,
		'choices'  => array(
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'chronus' ),
			'right-sidebar' => esc_html__( 'Right Sidebar', 'chronus' ),
		),
	) );
}
add_action( 'customize_register', 'chronus_customize_register_layout_settings' );
