<?php
/**
 * Pro Version Upgrade Section
 *
 * Registers Upgrade Section for the Pro Version of the theme
 *
 * @package chista
 */

/**
 * Adds pro version description and CTA button
 *
 * @param object $wp_customize / Customizer Object.
 */
function chista_customize_register_upgrade_settings( $wp_customize ) {

	// Add Upgrade / More Features Section.
	$wp_customize->add_section( 'chista_section_upgrade', array(
		'title'    => esc_html__( 'More Features', 'chista' ),
		'priority' => 70,
		'panel' => 'chista_options_panel',
		)
	);

	// Add custom Upgrade Content control.
	$wp_customize->add_setting( 'chista_theme_options[upgrade]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new chista_Customize_Upgrade_Control(
		$wp_customize, 'chista_theme_options[upgrade]', array(
		'section' => 'chista_section_upgrade',
		'settings' => 'chista_theme_options[upgrade]',
		'priority' => 1,
		)
	) );

}
add_action( 'customize_register', 'chista_customize_register_upgrade_settings' );
