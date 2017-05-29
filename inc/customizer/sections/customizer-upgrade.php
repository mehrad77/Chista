<?php
/**
 * Pro Version Upgrade Section
 *
 * Registers Upgrade Section for the Pro Version of the theme
 *
 * @package Chronus
 */

/**
 * Adds pro version description and CTA button
 *
 * @param object $wp_customize / Customizer Object.
 */
function chronus_customize_register_upgrade_settings( $wp_customize ) {

	// Add Upgrade / More Features Section.
	$wp_customize->add_section( 'chronus_section_upgrade', array(
		'title'    => esc_html__( 'More Features', 'chronus' ),
		'priority' => 70,
		'panel' => 'chronus_options_panel',
		)
	);

	// Add custom Upgrade Content control.
	$wp_customize->add_setting( 'chronus_theme_options[upgrade]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new Chronus_Customize_Upgrade_Control(
		$wp_customize, 'chronus_theme_options[upgrade]', array(
		'section' => 'chronus_section_upgrade',
		'settings' => 'chronus_theme_options[upgrade]',
		'priority' => 1,
		)
	) );

}
add_action( 'customize_register', 'chronus_customize_register_upgrade_settings' );
