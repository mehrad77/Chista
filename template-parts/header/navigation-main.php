<?php
/**
 * Main Navigation
 *
 * @package chista
 */
?>

<div id="main-navigation-wrap" class="primary-navigation-wrap">

	<nav id="main-navigation" class="primary-navigation navigation container clearfix" role="navigation">
		<?php
			// Display Main Navigation.
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container' => false,
				'menu_class' => 'main-navigation-menu',
				'echo' => true,
				'fallback_cb' => 'chista_default_menu',
				)
			);
		?>
	</nav><!-- #main-navigation -->

</div>
