<?php
/**
 * The template for displaying the blog index (latest posts)
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Chronus
 */

get_header();

// Get Theme Options from Database.
$theme_options = chronus_theme_options();
?>

	<section id="primary" class="content-archive content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Display Magazine Homepage Widgets.
		chronus_magazine_widgets();

		if ( have_posts() ) :

			chronus_blog_title();

			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', esc_attr( $theme_options['blog_layout'] ) );

			endwhile;

			chronus_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
