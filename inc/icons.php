<?php
/**
 * SVG icons related functions and filters
 *
 * @package Chronus
 */

/**
 * Add SVG definitions to the footer.
 */
function chronus_include_svg_icons() {
	// Define SVG sprite file.
	$svg_icons = get_parent_theme_file_path( '/assets/icons/genericons-neue.svg' );

	// If it exists, include it.
	if ( file_exists( $svg_icons ) ) {
		require_once( $svg_icons );
	}
}
add_action( 'wp_footer', 'chronus_include_svg_icons', 9999 );


/**
 * Return SVG markup.
 *
 * @param string $icon  Required SVG icon filename.
 * @return string SVG markup.
 */
function chronus_get_svg( $icon = null ) {
	// Return early if no icon was defined.
	if ( empty( $icon ) ) {
		return;
	}

	// Display the icon.
	$svg = '<svg class="icon icon-' . esc_attr( $icon ) . '" aria-hidden="true" role="img">';
	$svg .= ' <use href="#' . esc_html( $icon ) . '" xlink:href="#' . esc_html( $icon ) . '"></use> ';
	$svg .= '</svg>';

	return $svg;
}

/**
 * Add dropdown icon if menu item has children.
 *
 * @param  string $title The menu item's title.
 * @param  object $item  The current menu item.
 * @param  array  $args  An array of wp_nav_menu() arguments.
 * @param  int    $depth Depth of menu item. Used for padding.
 * @return string $title The menu item's title with dropdown icon.
 */
function chronus_dropdown_icon_to_menu_link( $title, $item, $args, $depth ) {
	if ( 'primary' === $args->theme_location || 'secondary' === $args->theme_location ) {
		foreach ( $item->classes as $value ) {
			if ( 'menu-item-has-children' === $value || 'page_item_has_children' === $value ) {
				$title = $title . '<span class="sub-menu-icon">' . chronus_get_svg( 'expand' ) . '</span>';
			}
		}
	}

	return $title;
}
add_filter( 'nav_menu_item_title', 'chronus_dropdown_icon_to_menu_link', 10, 4 );
