<?php
/**
 * Top Navigation
 *
 * @package Chronus
 */

// Check if there are menus.
if ( has_nav_menu( 'social' ) or has_nav_menu( 'secondary' ) ) : ?>

	<div id="header-top" class="header-bar-wrap">

		<div id="header-bar" class="header-bar container clearfix">

			<?php
			// Check if there is a social icons menu
			if ( has_nav_menu( 'social' ) ) : ?>

				<div id="header-social-icons" class="social-icons-navigation clearfix">

					<?php
					// Display Social Icons Menu.
					wp_nav_menu( array(
						'theme_location' => 'social',
						'container' => false,
						'menu_class' => 'social-icons-menu',
						'echo' => true,
						'fallback_cb' => '',
						'link_before' => '<span class="screen-reader-text">',
						'link_after' => '</span>',
						'depth' => 1,
						)
					);
					?>

				</div>

			<?php
			endif;

			// Check if there is a top navigation menu.
			if ( has_nav_menu( 'secondary' ) ) : ?>

				<nav id="top-navigation" class="secondary-navigation navigation clearfix" role="navigation">

					<?php
					// Display Top Navigation.
					wp_nav_menu( array(
						'theme_location' => 'secondary',
						'container' => false,
						'menu_class' => 'top-navigation-menu',
						'echo' => true,
						'fallback_cb' => '',
						)
					);
					?>

				</nav>

			<?php endif; ?>

		</div>

	</div>

<?php endif;
