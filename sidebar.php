<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Wellington
 */

// Check if Sidebar has widgets.
if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

	<section id="secondary" class="sidebar widget-area clearfix" role="complementary">

		<?php dynamic_sidebar( 'sidebar-1' ); ?>

	</section><!-- #secondary -->

<?php
endif;
