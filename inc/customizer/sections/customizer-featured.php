<?php
/**
 * Featured Content Settings
 *
 * Register Featured Posts section, settings and controls for Theme Customizer
 *
 * @package Chronus
 */

/**
 * Adds featured settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function chronus_customize_register_featured_settings( $wp_customize ) {

	// Add Sections for Featured Posts Settings.
	$wp_customize->add_section( 'chronus_section_featured', array(
		'title'    => esc_html__( 'Featured Posts', 'chronus' ),
		'priority' => 60,
		'panel' => 'chronus_options_panel',
		)
	);

	// Add settings and controls for Featured Posts.
	$wp_customize->add_control( new Chronus_Customize_Header_Control(
		$wp_customize, 'chronus_theme_options[activate_featured_posts]', array(
		'label' => esc_html__( 'Activate Featured Posts', 'chronus' ),
		'section' => 'chronus_section_featured',
		'settings' => array(),
		'priority' => 10,
		)
	) );

	$wp_customize->add_setting( 'chronus_theme_options[featured_posts]', array(
		'default'           => false,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'chronus_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'chronus_theme_options[featured_posts]', array(
		'label'    => esc_html__( 'Show Featured Posts on home page', 'chronus' ),
		'section'  => 'chronus_section_featured',
		'settings' => 'chronus_theme_options[featured_posts]',
		'type'     => 'checkbox',
		'priority' => 20,
		)
	);

	// Add Setting and Control for Featured Posts Category.
	$wp_customize->add_setting( 'chronus_theme_options[featured_category]', array(
		'default'           => 0,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control( new Chronus_Customize_Category_Dropdown_Control(
		$wp_customize, 'chronus_theme_options[featured_category]', array(
		'label' => esc_html__( 'Featured Posts Category', 'chronus' ),
		'section' => 'chronus_section_featured',
		'settings' => 'chronus_theme_options[featured_category]',
		'active_callback' => 'chronus_featured_activated_callback',
		'priority' => 30,
		)
	) );

}
add_action( 'customize_register', 'chronus_customize_register_featured_settings' );
