<?php
/**
 * Implement theme options in the Customizer
 *
 * @package chista
 */

// Load Sanitize Functions.
require( get_template_directory() . '/inc/customizer/sanitize-functions.php' );

// Load Custom Controls.
require( get_template_directory() . '/inc/customizer/controls/category-dropdown-control.php' );
require( get_template_directory() . '/inc/customizer/controls/headline-control.php' );
require( get_template_directory() . '/inc/customizer/controls/magazine-widget-area-control.php' );
require( get_template_directory() . '/inc/customizer/controls/upgrade-control.php' );

// Load Customizer Sections.
require( get_template_directory() . '/inc/customizer/sections/customizer-layout.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-blog.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-post.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-magazine.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-featured.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-upgrade.php' );

/**
 * Registers Theme Options panel and sets up some WordPress core settings
 *
 * @param object $wp_customize / Customizer Object.
 */
function chista_customize_register_options( $wp_customize ) {

	// Add Theme Options Panel.
	$wp_customize->add_panel( 'chista_options_panel', array(
		'priority'       => 180,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__( 'Theme Options', 'chista' ),
		'description'    => chista_customize_theme_links(),
	) );

	// Change default background section.
	$wp_customize->get_control( 'background_color' )->section   = 'background_image';
	$wp_customize->get_section( 'background_image' )->title     = esc_html__( 'Background', 'chista' );

	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	// Add selective refresh for site title and description.
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector'        => '.site-title a',
		'render_callback' => 'chista_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector'        => '.site-description',
		'render_callback' => 'chista_customize_partial_blogdescription',
	) );

	// Add Display Site Title Setting.
	$wp_customize->add_setting( 'chista_theme_options[site_title]', array(
		'default'           => true,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'chista_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'chista_theme_options[site_title]', array(
		'label'    => esc_html__( 'Display Site Title', 'chista' ),
		'section'  => 'title_tagline',
		'settings' => 'chista_theme_options[site_title]',
		'type'     => 'checkbox',
		'priority' => 10,
	) );

	// Add Display Tagline Setting.
	$wp_customize->add_setting( 'chista_theme_options[site_description]', array(
		'default'           => true,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'chista_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'chista_theme_options[site_description]', array(
		'label'    => esc_html__( 'Display Tagline', 'chista' ),
		'section'  => 'title_tagline',
		'settings' => 'chista_theme_options[site_description]',
		'type'     => 'checkbox',
		'priority' => 11,
	) );
}
add_action( 'customize_register', 'chista_customize_register_options' );


/**
 * Render the site title for the selective refresh partial.
 */
function chista_customize_partial_blogname() {
	bloginfo( 'name' );
}


/**
 * Render the site tagline for the selective refresh partial.
 */
function chista_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


/**
 * Embed JS file to make Theme Customizer preview reload changes asynchronously.
 */
function chista_customize_preview_js() {
	wp_enqueue_script( 'chista-customize-preview', get_template_directory_uri() . '/assets/js/customize-preview.js', array( 'customize-preview' ), '20170627', true );
}
add_action( 'customize_preview_init', 'chista_customize_preview_js' );


/**
 * Embed JS for Customizer Controls.
 */
function chista_customizer_controls_js() {
	wp_enqueue_script( 'chista-customizer-controls', get_template_directory_uri() . '/assets/js/customizer-controls.js', array(), '20170627', true );
}
add_action( 'customize_controls_enqueue_scripts', 'chista_customizer_controls_js' );


/**
 * Embed CSS styles Customizer Controls.
 */
function chista_customizer_controls_css() {
	wp_enqueue_style( 'chista-customizer-controls', get_template_directory_uri() . '/assets/css/customizer-controls.css', array(), '20170627' );
}
add_action( 'customize_controls_print_styles', 'chista_customizer_controls_css' );

/**
 * Returns Theme Links
 */
function chista_customize_theme_links() {

	ob_start();
	?>

		<div class="theme-links">

			<span class="customize-control-title"><?php esc_html_e( 'Theme Links', 'chista' ); ?></span>

			<p>
				<a href="<?php echo esc_url( __( 'https://themezee.com/themes/chista/', 'chista' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=chista&utm_content=theme-page" target="_blank">
					<?php esc_html_e( 'Theme Page', 'chista' ); ?>
				</a>
			</p>

			<p>
				<a href="http://preview.themezee.com/?demo=chista&utm_source=customizer&utm_campaign=chista" target="_blank">
					<?php esc_html_e( 'Theme Demo', 'chista' ); ?>
				</a>
			</p>

			<p>
				<a href="<?php echo esc_url( __( 'https://themezee.com/docs/chista-documentation/', 'chista' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=chista&utm_content=documentation" target="_blank">
					<?php esc_html_e( 'Theme Documentation', 'chista' ); ?>
				</a>
			</p>

			<p>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/chista/reviews/?filter=5', 'chista' ) ); ?>" target="_blank">
					<?php esc_html_e( 'Rate this theme', 'chista' ); ?>
				</a>
			</p>

		</div>

	<?php
	$theme_links = ob_get_contents();
	ob_end_clean();

	return $theme_links;
}
