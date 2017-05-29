<?php
/**
 * Post Settings
 *
 * Register Post Settings section, settings and controls for Theme Customizer
 *
 * @package Chronus
 */

/**
 * Adds post settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function chronus_customize_register_post_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'chronus_section_post', array(
		'title'    => esc_html__( 'Post Settings', 'chronus' ),
		'priority' => 30,
		'panel' => 'chronus_options_panel',
		)
	);

	// Add Setting and Control for Excerpt Length.
	$wp_customize->add_setting( 'chronus_theme_options[excerpt_length]', array(
		'default'           => 10,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control( 'chronus_theme_options[excerpt_length]', array(
		'label'    => esc_html__( 'Excerpt Length', 'chronus' ),
		'section'  => 'chronus_section_post',
		'settings' => 'chronus_theme_options[excerpt_length]',
		'type'     => 'text',
		'priority' => 2,
		)
	);

	// Add Post Meta Settings.
	$wp_customize->add_setting( 'chronus_theme_options[postmeta_headline]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new Chronus_Customize_Header_Control(
		$wp_customize, 'chronus_theme_options[postmeta_headline]', array(
		'label' => esc_html__( 'Post Meta', 'chronus' ),
		'section' => 'chronus_section_post',
		'settings' => 'chronus_theme_options[postmeta_headline]',
		'priority' => 20,
		)
	) );

	$wp_customize->add_setting( 'chronus_theme_options[meta_date]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'chronus_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'chronus_theme_options[meta_date]', array(
		'label'    => esc_html__( 'Display post date', 'chronus' ),
		'section'  => 'chronus_section_post',
		'settings' => 'chronus_theme_options[meta_date]',
		'type'     => 'checkbox',
		'priority' => 30,
		)
	);

	$wp_customize->add_setting( 'chronus_theme_options[meta_author]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'chronus_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'chronus_theme_options[meta_author]', array(
		'label'    => esc_html__( 'Display post author', 'chronus' ),
		'section'  => 'chronus_section_post',
		'settings' => 'chronus_theme_options[meta_author]',
		'type'     => 'checkbox',
		'priority' => 40,
		)
	);

	// Add Single Post Settings.
	$wp_customize->add_setting( 'chronus_theme_options[single_post_headline]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new Chronus_Customize_Header_Control(
		$wp_customize, 'chronus_theme_options[single_post_headline]', array(
		'label' => esc_html__( 'Single Posts', 'chronus' ),
		'section' => 'chronus_section_post',
		'settings' => 'chronus_theme_options[single_post_headline]',
		'priority' => 50,
		)
	) );

	// Featured Image Setting.
	$wp_customize->add_setting( 'chronus_theme_options[post_image_single]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'chronus_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'chronus_theme_options[post_image_single]', array(
		'label'    => esc_html__( 'Display featured image on single posts', 'chronus' ),
		'section'  => 'chronus_section_post',
		'settings' => 'chronus_theme_options[post_image_single]',
		'type'     => 'checkbox',
		'priority' => 60,
		)
	);

	$wp_customize->add_setting( 'chronus_theme_options[meta_category]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'chronus_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'chronus_theme_options[meta_category]', array(
		'label'    => esc_html__( 'Display post categories on single posts', 'chronus' ),
		'section'  => 'chronus_section_post',
		'settings' => 'chronus_theme_options[meta_category]',
		'type'     => 'checkbox',
		'priority' => 70,
		)
	);

	$wp_customize->add_setting( 'chronus_theme_options[meta_tags]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'chronus_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'chronus_theme_options[meta_tags]', array(
		'label'    => esc_html__( 'Display post tags on single posts', 'chronus' ),
		'section'  => 'chronus_section_post',
		'settings' => 'chronus_theme_options[meta_tags]',
		'type'     => 'checkbox',
		'priority' => 80,
		)
	);

	$wp_customize->add_setting( 'chronus_theme_options[post_navigation]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'chronus_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'chronus_theme_options[post_navigation]', array(
		'label'    => esc_html__( 'Display post navigation on single posts', 'chronus' ),
		'section'  => 'chronus_section_post',
		'settings' => 'chronus_theme_options[post_navigation]',
		'type'     => 'checkbox',
		'priority' => 90,
		)
	);

}
add_action( 'customize_register', 'chronus_customize_register_post_settings' );
