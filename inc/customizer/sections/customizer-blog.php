<?php
/**
 * Blog Settings
 *
 * Register Blog Settings section, settings and controls for Theme Customizer
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
		'panel'    => 'chronus_options_panel',
	) );

	// Add Blog Title setting and control.
	$wp_customize->add_setting( 'chronus_theme_options[blog_title]', array(
		'default'           => '',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'chronus_theme_options[blog_title]', array(
		'label'    => esc_html__( 'Blog Title', 'chronus' ),
		'section'  => 'chronus_section_blog',
		'settings' => 'chronus_theme_options[blog_title]',
		'type'     => 'text',
		'priority' => 10,
	) );

	$wp_customize->selective_refresh->add_partial( 'chronus_theme_options[blog_title]', array(
		'selector'         => '.blog-header .blog-title',
		'render_callback'  => 'chronus_customize_partial_blog_title',
		'fallback_refresh' => false,
	) );

	// Add Blog Description setting and control.
	$wp_customize->add_setting( 'chronus_theme_options[blog_description]', array(
		'default'           => '',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'chronus_theme_options[blog_description]', array(
		'label'    => esc_html__( 'Blog Description', 'chronus' ),
		'section'  => 'chronus_section_blog',
		'settings' => 'chronus_theme_options[blog_description]',
		'type'     => 'textarea',
		'priority' => 20,
	) );

	$wp_customize->selective_refresh->add_partial( 'chronus_theme_options[blog_description]', array(
		'selector'         => '.blog-header .blog-description',
		'render_callback'  => 'chronus_customize_partial_blog_description',
		'fallback_refresh' => false,
	) );

	// Add Settings and Controls for blog layout.
	$wp_customize->add_setting( 'chronus_theme_options[blog_layout]', array(
		'default'           => 'excerpt',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'chronus_sanitize_select',
	) );

	$wp_customize->add_control( 'chronus_theme_options[blog_layout]', array(
		'label'    => esc_html__( 'Blog Layout', 'chronus' ),
		'section'  => 'chronus_section_blog',
		'settings' => 'chronus_theme_options[blog_layout]',
		'type'     => 'radio',
		'priority' => 30,
		'choices'  => array(
			'index'   => esc_html__( 'Display full posts', 'chronus' ),
			'excerpt' => esc_html__( 'Display post excerpts', 'chronus' ),
		),
	) );

	// Add Setting and Control for Excerpt Length.
	$wp_customize->add_setting( 'chronus_theme_options[excerpt_length]', array(
		'default'           => 35,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'chronus_theme_options[excerpt_length]', array(
		'label'    => esc_html__( 'Excerpt Length', 'chronus' ),
		'section'  => 'chronus_section_blog',
		'settings' => 'chronus_theme_options[excerpt_length]',
		'type'     => 'text',
		'priority' => 40,
	) );

	// Add Partial for Blog Layout and Excerpt Length.
	$wp_customize->selective_refresh->add_partial( 'chronus_blog_layout_partial', array(
		'selector'         => '.site-main .post-wrapper',
		'settings'         => array(
			'chronus_theme_options[blog_layout]',
			'chronus_theme_options[excerpt_length]',
		),
		'render_callback'  => 'chronus_customize_partial_blog_layout',
		'fallback_refresh' => false,
	) );

	// Add Magazine Widgets Headline.
	$wp_customize->add_control( new Chronus_Customize_Header_Control(
		$wp_customize, 'chronus_theme_options[blog_magazine_widgets_title]', array(
			'label' => esc_html__( 'Magazine Widgets', 'chronus' ),
			'section' => 'chronus_section_blog',
			'settings' => array(),
			'priority' => 50,
		)
	) );

	// Add Setting and Control for showing post date.
	$wp_customize->add_setting( 'chronus_theme_options[blog_magazine_widgets]', array(
		'default'           => true,
		'type'              => 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'chronus_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'chronus_theme_options[blog_magazine_widgets]', array(
		'label'    => esc_html__( 'Display Magazine widgets on blog index', 'chronus' ),
		'section'  => 'chronus_section_blog',
		'settings' => 'chronus_theme_options[blog_magazine_widgets]',
		'type'     => 'checkbox',
		'priority' => 60,
	) );
}
add_action( 'customize_register', 'chronus_customize_register_blog_settings' );

/**
 * Render the blog title for the selective refresh partial.
 */
function chronus_customize_partial_blog_title() {
	echo wp_kses_post( chronus_get_option( 'blog_title' ) );
}

/**
 * Render the blog description for the selective refresh partial.
 */
function chronus_customize_partial_blog_description() {
	echo wp_kses_post( chronus_get_option( 'blog_description' ) );
}

/**
 * Render the blog layout for the selective refresh partial.
 */
function chronus_customize_partial_blog_layout() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', esc_attr( chronus_get_option( 'blog_layout' ) ) );
	}
}
