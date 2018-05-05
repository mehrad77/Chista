<?php
/**
 * Template Name: Magazine Homepage
 *
 * Description: A custom page template for displaying the magazine homepage widgets.
 *
 * @package chista
 */

get_header(); ?>

	<section id="primary" class="content-magazine content-single content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Display Magazine Homepage Widgets.
		chista_magazine_widgets();
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
