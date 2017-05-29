<?php
/**
 * General Settings
 *
 * Register General section, settings and controls for Theme Customizer
 *
 * @package Chronus
 */

/**
 * Adds all general settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function chronus_customize_register_general_settings( $wp_customize ) {

	// Add Section for Theme Options.
	$wp_customize->add_section( 'chronus_section_general', array(
		'title'    => esc_html__( 'General Settings', 'chronus' ),
		'priority' => 10,
		'panel' => 'chronus_options_panel',
		)
	);

	// Add Settings and Controls for Layout.
	$wp_customize->add_setting( 'chronus_theme_options[layout]', array(
		'default'           => 'right-sidebar',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'chronus_sanitize_select',
		)
	);
	$wp_customize->add_control( 'chronus_theme_options[layout]', array(
		'label'    => esc_html__( 'Theme Layout', 'chronus' ),
		'section'  => 'chronus_section_general',
		'settings' => 'chronus_theme_options[layout]',
		'type'     => 'radio',
		'priority' => 10,
		'choices'  => array(
			'left-sidebar' => esc_html__( 'Left Sidebar', 'chronus' ),
			'right-sidebar' => esc_html__( 'Right Sidebar', 'chronus' ),
			),
		)
	);

	// Add Post Layout Settings for archive posts.
	$wp_customize->add_setting( 'chronus_theme_options[post_layout]', array(
		'default'           => 'two-columns',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'chronus_sanitize_select',
		)
	);
	$wp_customize->add_control( 'chronus_theme_options[post_layout]', array(
		'label'    => esc_html__( 'Blog Layout', 'chronus' ),
		'section'  => 'chronus_section_general',
		'settings' => 'chronus_theme_options[post_layout]',
		'type'     => 'select',
		'priority' => 20,
		'choices'  => array(
			'one-column' => esc_html__( 'One Column', 'chronus' ),
			'two-columns' => esc_html__( 'Two Columns', 'chronus' ),
			),
		)
	);

	// Add Homepage Title.
	$wp_customize->add_setting( 'chronus_theme_options[blog_title]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control( 'chronus_theme_options[blog_title]', array(
		'label'    => esc_html__( 'Blog Title', 'chronus' ),
		'section'  => 'chronus_section_general',
		'settings' => 'chronus_theme_options[blog_title]',
		'type'     => 'text',
		'priority' => 30,
		)
	);

	// Add Homepage Title.
	$wp_customize->add_setting( 'chronus_theme_options[blog_description]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control( 'chronus_theme_options[blog_description]', array(
		'label'    => esc_html__( 'Blog Description', 'chronus' ),
		'section'  => 'chronus_section_general',
		'settings' => 'chronus_theme_options[blog_description]',
		'type'     => 'textarea',
		'priority' => 40,
		)
	);

}
add_action( 'customize_register', 'chronus_customize_register_general_settings' );
