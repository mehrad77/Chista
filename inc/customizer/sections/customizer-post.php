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

	// Add Post Details Headline.
	$wp_customize->add_control( new Chronus_Customize_Header_Control(
		$wp_customize, 'chronus_theme_options[post_details]', array(
		'label' => esc_html__( 'Post Details', 'chronus' ),
		'section' => 'chronus_section_post',
		'settings' => array(),
		'priority' => 10,
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
		'label'    => esc_html__( 'Display date', 'chronus' ),
		'section'  => 'chronus_section_post',
		'settings' => 'chronus_theme_options[meta_date]',
		'type'     => 'checkbox',
		'priority' => 20,
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
		'label'    => esc_html__( 'Display author', 'chronus' ),
		'section'  => 'chronus_section_post',
		'settings' => 'chronus_theme_options[meta_author]',
		'type'     => 'checkbox',
		'priority' => 30,
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
		'label'    => esc_html__( 'Display categories', 'chronus' ),
		'section'  => 'chronus_section_post',
		'settings' => 'chronus_theme_options[meta_category]',
		'type'     => 'checkbox',
		'priority' => 40,
		)
	);

	// Add Single Post Headline.
	$wp_customize->add_control( new Chronus_Customize_Header_Control(
		$wp_customize, 'chronus_theme_options[single_post]', array(
		'label' => esc_html__( 'Single Post', 'chronus' ),
		'section' => 'chronus_section_post',
		'settings' => array(),
		'priority' => 50,
		)
	) );

	$wp_customize->add_setting( 'chronus_theme_options[meta_tags]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'chronus_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'chronus_theme_options[meta_tags]', array(
		'label'    => esc_html__( 'Display tags', 'chronus' ),
		'section'  => 'chronus_section_post',
		'settings' => 'chronus_theme_options[meta_tags]',
		'type'     => 'checkbox',
		'priority' => 60,
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
		'label'    => esc_html__( 'Display post navigation', 'chronus' ),
		'section'  => 'chronus_section_post',
		'settings' => 'chronus_theme_options[post_navigation]',
		'type'     => 'checkbox',
		'priority' => 70,
		)
	);

	// Add Featured Images Headline.
	$wp_customize->add_control( new Chronus_Customize_Header_Control(
		$wp_customize, 'chronus_theme_options[featured_images]', array(
		'label' => esc_html__( 'Featured Images', 'chronus' ),
		'section' => 'chronus_section_post',
		'settings' => array(),
		'priority' => 80,
		)
	) );

	$wp_customize->add_setting( 'chronus_theme_options[post_image_archives]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'chronus_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'chronus_theme_options[post_image_archives]', array(
		'label'    => esc_html__( 'Display images on blog and archives', 'chronus' ),
		'section'  => 'chronus_section_post',
		'settings' => 'chronus_theme_options[post_image_archives]',
		'type'     => 'checkbox',
		'priority' => 90,
		)
	);

	$wp_customize->add_setting( 'chronus_theme_options[post_image_single]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'chronus_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'chronus_theme_options[post_image_single]', array(
		'label'    => esc_html__( 'Display image on single posts', 'chronus' ),
		'section'  => 'chronus_section_post',
		'settings' => 'chronus_theme_options[post_image_single]',
		'type'     => 'checkbox',
		'priority' => 100,
		)
	);
}
add_action( 'customize_register', 'chronus_customize_register_post_settings' );
