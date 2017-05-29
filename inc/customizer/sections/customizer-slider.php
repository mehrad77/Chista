<?php
/**
 * Slider Settings
 *
 * Register Post Slider section, settings and controls for Theme Customizer
 *
 * @package Wellington
 */

/**
 * Adds slider settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function wellington_customize_register_slider_settings( $wp_customize ) {

	// Add Sections for Slider Settings.
	$wp_customize->add_section( 'wellington_section_slider', array(
		'title'    => esc_html__( 'Post Slider', 'wellington' ),
		'priority' => 60,
		'panel' => 'wellington_options_panel',
		)
	);

	// Add settings and controls for Post Slider.
	$wp_customize->add_setting( 'wellington_theme_options[slider_activate]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new Wellington_Customize_Header_Control(
		$wp_customize, 'wellington_theme_options[slider_activate]', array(
		'label' => esc_html__( 'Activate Post Slider', 'wellington' ),
		'section' => 'wellington_section_slider',
		'settings' => 'wellington_theme_options[slider_activate]',
		'priority' => 10,
		)
	) );
	$wp_customize->add_setting( 'wellington_theme_options[slider_active]', array(
		'default'           => false,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wellington_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'wellington_theme_options[slider_active]', array(
		'label'    => esc_html__( 'Show Slider on home page', 'wellington' ),
		'section'  => 'wellington_section_slider',
		'settings' => 'wellington_theme_options[slider_active]',
		'type'     => 'checkbox',
		'priority' => 20,
		)
	);

	// Add Setting and Control for Slider Category.
	$wp_customize->add_setting( 'wellington_theme_options[slider_category]', array(
		'default'           => 0,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control( new Wellington_Customize_Category_Dropdown_Control(
		$wp_customize, 'wellington_theme_options[slider_category]', array(
		'label' => esc_html__( 'Slider Category', 'wellington' ),
		'section' => 'wellington_section_slider',
		'settings' => 'wellington_theme_options[slider_category]',
		'active_callback' => 'wellington_slider_activated_callback',
		'priority' => 30,
		)
	) );

	// Add Setting and Control for Number of Posts.
	$wp_customize->add_setting( 'wellington_theme_options[slider_limit]', array(
		'default'           => 8,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control( 'wellington_theme_options[slider_limit]', array(
		'label'    => esc_html__( 'Number of Posts', 'wellington' ),
		'section'  => 'wellington_section_slider',
		'settings' => 'wellington_theme_options[slider_limit]',
		'type'     => 'text',
		'active_callback' => 'wellington_slider_activated_callback',
		'priority' => 40,
		)
	);

	// Add Setting and Control for Slider Animation.
	$wp_customize->add_setting( 'wellington_theme_options[slider_animation]', array(
		'default'           => 'slide',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wellington_sanitize_select',
		)
	);
	$wp_customize->add_control( 'wellington_theme_options[slider_animation]', array(
		'label'    => esc_html__( 'Slider Animation', 'wellington' ),
		'section'  => 'wellington_section_slider',
		'settings' => 'wellington_theme_options[slider_animation]',
		'type'     => 'radio',
		'priority' => 50,
		'active_callback' => 'wellington_slider_activated_callback',
		'choices'  => array(
			'slide' => esc_html__( 'Slide Effect', 'wellington' ),
			'fade' => esc_html__( 'Fade Effect', 'wellington' ),
			),
		)
	);

	// Add Setting and Control for Slider Speed.
	$wp_customize->add_setting( 'wellington_theme_options[slider_speed]', array(
		'default'           => 7000,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control( 'wellington_theme_options[slider_speed]', array(
		'label'    => esc_html__( 'Slider Speed (in ms)', 'wellington' ),
		'section'  => 'wellington_section_slider',
		'settings' => 'wellington_theme_options[slider_speed]',
		'type'     => 'number',
		'active_callback' => 'wellington_slider_activated_callback',
		'priority' => 60,
		'input_attrs' => array(
			'min'   => 1000,
			'step'  => 100,
			),
		)
	);

}
add_action( 'customize_register', 'wellington_customize_register_slider_settings' );
