<?php
/**
 * Post Settings
 *
 * Register Post Settings section, settings and controls for Theme Customizer
 *
 * @package Chronus
 */

/**
 * Adds blog settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function chronus_customize_register_blog_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'chronus_section_blog', array(
		'title'    => esc_html__( 'Blog Settings', 'chronus' ),
		'priority' => 20,
		'panel' => 'chronus_options_panel',
		)
	);

	// Add Blog Title setting and control.
	$wp_customize->add_setting( 'chronus_theme_options[blog_title]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control( 'chronus_theme_options[blog_title]', array(
		'label'    => esc_html__( 'Blog Title', 'chronus' ),
		'section'  => 'chronus_section_blog',
		'settings' => 'chronus_theme_options[blog_title]',
		'type'     => 'text',
		'priority' => 10,
		)
	);

	// Add Blog Description setting and control.
	$wp_customize->add_setting( 'chronus_theme_options[blog_description]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control( 'chronus_theme_options[blog_description]', array(
		'label'    => esc_html__( 'Blog Description', 'chronus' ),
		'section'  => 'chronus_section_blog',
		'settings' => 'chronus_theme_options[blog_description]',
		'type'     => 'textarea',
		'priority' => 20,
		)
	);

	// Add Settings and Controls for blog layout.
	$wp_customize->add_setting( 'chronus_theme_options[blog_layout]', array(
		'default'           => 'excerpt',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'chronus_sanitize_select',
		)
	);
	$wp_customize->add_control( 'chronus_theme_options[blog_layout]', array(
		'label'    => esc_html__( 'Blog Layout', 'chronus' ),
		'section'  => 'chronus_section_blog',
		'settings' => 'chronus_theme_options[blog_layout]',
		'type'     => 'radio',
		'priority' => 30,
		'choices'  => array(
			'index' => esc_html__( 'Display full posts', 'chronus' ),
			'excerpt' => esc_html__( 'Display post excerpts', 'chronus' ),
			),
		)
	);

	// Add Setting and Control for Excerpt Length.
	$wp_customize->add_setting( 'chronus_theme_options[excerpt_length]', array(
		'default'           => 35,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control( 'chronus_theme_options[excerpt_length]', array(
		'label'           => esc_html__( 'Excerpt Length', 'chronus' ),
		'section'         => 'chronus_section_blog',
		'settings'        => 'chronus_theme_options[excerpt_length]',
		'type'            => 'text',
		'priority'        => 40,
		'active_callback' => 'chronus_control_blog_layout_callback',
		)
	);
}
add_action( 'customize_register', 'chronus_customize_register_blog_settings' );


/**
 * Adds a callback function to retrieve wether blog content is set to excerpt or not
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
