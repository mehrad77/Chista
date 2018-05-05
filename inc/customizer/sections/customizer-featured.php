<?php
/**
 * Featured Content Settings
 *
 * Register Featured Posts section, settings and controls for Theme Customizer
 *
 * @package chista
 */

/**
 * Adds featured settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function chista_customize_register_featured_settings( $wp_customize ) {

	// Add Featured Posts Section.
	$wp_customize->add_section( 'chista_section_featured', array(
		'title'    => esc_html__( 'Featured Posts', 'chista' ),
		'priority' => 60,
		'panel'    => 'chista_options_panel',
	) );

	// Add settings and controls for Featured Posts.
	$wp_customize->add_control( new chista_Customize_Header_Control(
		$wp_customize, 'chista_theme_options[activate_featured_posts]', array(
			'label'    => esc_html__( 'Activate Featured Posts', 'chista' ),
			'section'  => 'chista_section_featured',
			'settings' => array(),
			'priority' => 10,
		)
	) );

	$wp_customize->add_setting( 'chista_theme_options[featured_posts]', array(
		'default'           => false,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'chista_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'chista_theme_options[featured_posts]', array(
		'label'    => esc_html__( 'Show Featured Posts on home page', 'chista' ),
		'section'  => 'chista_section_featured',
		'settings' => 'chista_theme_options[featured_posts]',
		'type'     => 'checkbox',
		'priority' => 20,
	) );

	// Add Setting and Control for Featured Posts Category.
	$wp_customize->add_setting( 'chista_theme_options[featured_category]', array(
		'default'           => 0,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( new chista_Customize_Category_Dropdown_Control(
		$wp_customize, 'chista_theme_options[featured_category]', array(
			'label'           => esc_html__( 'Featured Posts Category', 'chista' ),
			'section'         => 'chista_section_featured',
			'settings'        => 'chista_theme_options[featured_category]',
			'priority'        => 30,
		)
	) );

	// Add Partial for Featured Post Settings.
	$wp_customize->selective_refresh->add_partial( 'chista_featured_content_partial', array(
		'selector'        => '.site #featured-content',
		'settings'        => array(
			'chista_theme_options[featured_posts]',
			'chista_theme_options[featured_category]',
		),
		'render_callback' => 'chista_customize_partial_featured_posts',
		'fallback_refresh' => false,
	) );
}
add_action( 'customize_register', 'chista_customize_register_featured_settings' );


/**
 * Render the featured posts for the selective refresh partial.
 */
function chista_customize_partial_featured_posts() {
	if ( true === chista_get_option( 'featured_posts' ) && is_front_page() ) :
		get_template_part( 'template-parts/featured/featured-content' );
	endif;
}
