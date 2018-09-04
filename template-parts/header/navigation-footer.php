<?php
/**
 * Footer Navigation
 *
 * @package chista
 */
?>

<div id="footer-navigation-wrap" class="footer-navigation-wrap">

	<nav id="footer-navigation" class="primary-navigation footer-navigation navigation container clearfix" role="navigation">
		<?php
			// Display Main Navigation.
			wp_nav_menu( array(
				'theme_location' => 'footer',
				'container' => false,
				'menu_class' => 'footer-navigation-menu',
				'echo' => true,
				'fallback_cb' => 'chista_default_menu',
				)
			);
		?>
	</nav><!-- #main-navigation -->

</div>
