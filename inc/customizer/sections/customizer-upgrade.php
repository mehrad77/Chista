<?php
/**
 * Pro Version Upgrade Section
 *
 * Registers Upgrade Section for the Pro Version of the theme
 *
 * @package Wellington
 */

/**
 * Adds pro version description and CTA button
 *
 * @param object $wp_customize / Customizer Object.
 */
function wellington_customize_register_upgrade_settings( $wp_customize ) {

	// Add Upgrade / More Features Section.
	$wp_customize->add_section( 'wellington_section_upgrade', array(
		'title'    => esc_html__( 'More Features', 'wellington' ),
		'priority' => 70,
		'panel' => 'wellington_options_panel',
		)
	);

	// Add custom Upgrade Content control.
	$wp_customize->add_setting( 'wellington_theme_options[upgrade]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new Wellington_Customize_Upgrade_Control(
		$wp_customize, 'wellington_theme_options[upgrade]', array(
		'section' => 'wellington_section_upgrade',
		'settings' => 'wellington_theme_options[upgrade]',
		'priority' => 1,
		)
	) );

}
add_action( 'customize_register', 'wellington_customize_register_upgrade_settings' );
