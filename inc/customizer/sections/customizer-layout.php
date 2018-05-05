<?php
/**
 * Layout Settings
 *
 * Register Layout section, settings and controls for Theme Customizer
 *
 * @package chista
 */

/**
 * Adds all layout settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function chista_customize_register_layout_settings( $wp_customize ) {

	// Add Section for Theme Options.
	$wp_customize->add_section( 'chista_section_layout', array(
		'title'    => esc_html__( 'Layout Settings', 'chista' ),
		'priority' => 10,
		'panel'    => 'chista_options_panel',
	) );

	// Add Settings and Controls for Layout.
	$wp_customize->add_setting( 'chista_theme_options[sidebar_position]', array(
		'default'           => 'right-sidebar',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'chista_sanitize_select',
	) );

	$wp_customize->add_control( 'chista_theme_options[sidebar_position]', array(
		'label'    => esc_html__( 'Sidebar Position', 'chista' ),
		'section'  => 'chista_section_layout',
		'settings' => 'chista_theme_options[sidebar_position]',
		'type'     => 'radio',
		'priority' => 10,
		'choices'  => array(
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'chista' ),
			'right-sidebar' => esc_html__( 'Right Sidebar', 'chista' ),
		),
	) );
}
add_action( 'customize_register', 'chista_customize_register_layout_settings' );
