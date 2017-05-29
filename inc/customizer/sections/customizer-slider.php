<?php
/**
 * Slider Settings
 *
 * Register Post Slider section, settings and controls for Theme Customizer
 *
 * @package Chronus
 */

/**
 * Adds slider settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function chronus_customize_register_slider_settings( $wp_customize ) {

	// Add Sections for Slider Settings.
	$wp_customize->add_section( 'chronus_section_slider', array(
		'title'    => esc_html__( 'Post Slider', 'chronus' ),
		'priority' => 60,
		'panel' => 'chronus_options_panel',
		)
	);

	// Add settings and controls for Post Slider.
	$wp_customize->add_setting( 'chronus_theme_options[slider_activate]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new Chronus_Customize_Header_Control(
		$wp_customize, 'chronus_theme_options[slider_activate]', array(
		'label' => esc_html__( 'Activate Post Slider', 'chronus' ),
		'section' => 'chronus_section_slider',
		'settings' => 'chronus_theme_options[slider_activate]',
		'priority' => 10,
		)
	) );
	$wp_customize->add_setting( 'chronus_theme_options[slider_active]', array(
		'default'           => false,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'chronus_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'chronus_theme_options[slider_active]', array(
		'label'    => esc_html__( 'Show Slider on home page', 'chronus' ),
		'section'  => 'chronus_section_slider',
		'settings' => 'chronus_theme_options[slider_active]',
		'type'     => 'checkbox',
		'priority' => 20,
		)
	);

	// Add Setting and Control for Slider Category.
	$wp_customize->add_setting( 'chronus_theme_options[slider_category]', array(
		'default'           => 0,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control( new Chronus_Customize_Category_Dropdown_Control(
		$wp_customize, 'chronus_theme_options[slider_category]', array(
		'label' => esc_html__( 'Slider Category', 'chronus' ),
		'section' => 'chronus_section_slider',
		'settings' => 'chronus_theme_options[slider_category]',
		'active_callback' => 'chronus_slider_activated_callback',
		'priority' => 30,
		)
	) );

	// Add Setting and Control for Number of Posts.
	$wp_customize->add_setting( 'chronus_theme_options[slider_limit]', array(
		'default'           => 8,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control( 'chronus_theme_options[slider_limit]', array(
		'label'    => esc_html__( 'Number of Posts', 'chronus' ),
		'section'  => 'chronus_section_slider',
		'settings' => 'chronus_theme_options[slider_limit]',
		'type'     => 'text',
		'active_callback' => 'chronus_slider_activated_callback',
		'priority' => 40,
		)
	);

	// Add Setting and Control for Slider Animation.
	$wp_customize->add_setting( 'chronus_theme_options[slider_animation]', array(
		'default'           => 'slide',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'chronus_sanitize_select',
		)
	);
	$wp_customize->add_control( 'chronus_theme_options[slider_animation]', array(
		'label'    => esc_html__( 'Slider Animation', 'chronus' ),
		'section'  => 'chronus_section_slider',
		'settings' => 'chronus_theme_options[slider_animation]',
		'type'     => 'radio',
		'priority' => 50,
		'active_callback' => 'chronus_slider_activated_callback',
		'choices'  => array(
			'slide' => esc_html__( 'Slide Effect', 'chronus' ),
			'fade' => esc_html__( 'Fade Effect', 'chronus' ),
			),
		)
	);

	// Add Setting and Control for Slider Speed.
	$wp_customize->add_setting( 'chronus_theme_options[slider_speed]', array(
		'default'           => 7000,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control( 'chronus_theme_options[slider_speed]', array(
		'label'    => esc_html__( 'Slider Speed (in ms)', 'chronus' ),
		'section'  => 'chronus_section_slider',
		'settings' => 'chronus_theme_options[slider_speed]',
		'type'     => 'number',
		'active_callback' => 'chronus_slider_activated_callback',
		'priority' => 60,
		'input_attrs' => array(
			'min'   => 1000,
			'step'  => 100,
			),
		)
	);

}
add_action( 'customize_register', 'chronus_customize_register_slider_settings' );
