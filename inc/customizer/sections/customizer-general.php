<?php
/**
 * General Settings
 *
 * Register General section, settings and controls for Theme Customizer
 *
 * @package Wellington
 */

/**
 * Adds all general settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function wellington_customize_register_general_settings( $wp_customize ) {

	// Add Section for Theme Options.
	$wp_customize->add_section( 'wellington_section_general', array(
		'title'    => esc_html__( 'General Settings', 'wellington' ),
		'priority' => 10,
		'panel' => 'wellington_options_panel',
		)
	);

	// Add Settings and Controls for Layout.
	$wp_customize->add_setting( 'wellington_theme_options[layout]', array(
		'default'           => 'right-sidebar',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wellington_sanitize_select',
		)
	);
	$wp_customize->add_control( 'wellington_theme_options[layout]', array(
		'label'    => esc_html__( 'Theme Layout', 'wellington' ),
		'section'  => 'wellington_section_general',
		'settings' => 'wellington_theme_options[layout]',
		'type'     => 'radio',
		'priority' => 10,
		'choices'  => array(
			'left-sidebar' => esc_html__( 'Left Sidebar', 'wellington' ),
			'right-sidebar' => esc_html__( 'Right Sidebar', 'wellington' ),
			),
		)
	);

	// Add Post Layout Settings for archive posts.
	$wp_customize->add_setting( 'wellington_theme_options[post_layout]', array(
		'default'           => 'one-column',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wellington_sanitize_select',
		)
	);
	$wp_customize->add_control( 'wellington_theme_options[post_layout]', array(
		'label'    => esc_html__( 'Blog Layout', 'wellington' ),
		'section'  => 'wellington_section_general',
		'settings' => 'wellington_theme_options[post_layout]',
		'type'     => 'select',
		'priority' => 20,
		'choices'  => array(
			'one-column' => esc_html__( 'One Column', 'wellington' ),
			'two-columns' => esc_html__( 'Two Columns', 'wellington' ),
			),
		)
	);

	// Add Homepage Title.
	$wp_customize->add_setting( 'wellington_theme_options[blog_title]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control( 'wellington_theme_options[blog_title]', array(
		'label'    => esc_html__( 'Blog Title', 'wellington' ),
		'section'  => 'wellington_section_general',
		'settings' => 'wellington_theme_options[blog_title]',
		'type'     => 'text',
		'priority' => 30,
		)
	);

	// Add Homepage Title.
	$wp_customize->add_setting( 'wellington_theme_options[blog_description]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control( 'wellington_theme_options[blog_description]', array(
		'label'    => esc_html__( 'Blog Description', 'wellington' ),
		'section'  => 'wellington_section_general',
		'settings' => 'wellington_theme_options[blog_description]',
		'type'     => 'textarea',
		'priority' => 40,
		)
	);

}
add_action( 'customize_register', 'wellington_customize_register_general_settings' );
