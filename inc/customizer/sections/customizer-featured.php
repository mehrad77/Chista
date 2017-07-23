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

	// Add Featured Posts Section.
	$wp_customize->add_section( 'chronus_section_featured', array(
		'title'    => esc_html__( 'Featured Posts', 'chronus' ),
		'priority' => 60,
		'panel'    => 'chronus_options_panel',
	) );

	// Add settings and controls for Featured Posts.
	$wp_customize->add_control( new Chronus_Customize_Header_Control(
		$wp_customize, 'chronus_theme_options[activate_featured_posts]', array(
			'label'    => esc_html__( 'Activate Featured Posts', 'chronus' ),
			'section'  => 'chronus_section_featured',
			'settings' => array(),
			'priority' => 10,
		)
	) );

	$wp_customize->add_setting( 'chronus_theme_options[featured_posts]', array(
		'default'           => false,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'chronus_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'chronus_theme_options[featured_posts]', array(
		'label'    => esc_html__( 'Show Featured Posts on home page', 'chronus' ),
		'section'  => 'chronus_section_featured',
		'settings' => 'chronus_theme_options[featured_posts]',
		'type'     => 'checkbox',
		'priority' => 20,
	) );

	// Add Setting and Control for Featured Posts Category.
	$wp_customize->add_setting( 'chronus_theme_options[featured_category]', array(
		'default'           => 0,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( new Chronus_Customize_Category_Dropdown_Control(
		$wp_customize, 'chronus_theme_options[featured_category]', array(
			'label'           => esc_html__( 'Featured Posts Category', 'chronus' ),
			'section'         => 'chronus_section_featured',
			'settings'        => 'chronus_theme_options[featured_category]',
			'priority'        => 30,
		)
	) );

	// Add Partial for Featured Post Settings.
	$wp_customize->selective_refresh->add_partial( 'chronus_featured_content_partial', array(
		'selector'        => '.site #featured-content',
		'settings'        => array(
			'chronus_theme_options[featured_posts]',
			'chronus_theme_options[featured_category]',
		),
		'render_callback' => 'chronus_customize_partial_featured_posts',
		'fallback_refresh' => false,
	) );
}
add_action( 'customize_register', 'chronus_customize_register_featured_settings' );


/**
 * Render the featured posts for the selective refresh partial.
 */
function chronus_customize_partial_featured_posts() {
	if ( true === chronus_get_option( 'featured_posts' ) && is_front_page() ) :
		get_template_part( 'template-parts/featured/featured-content' );
	endif;
}
