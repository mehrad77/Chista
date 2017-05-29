<?php
/**
 * The template for displaying the blog index (latest posts)
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wellington
 */

get_header(); ?>

	<section id="primary" class="content-archive content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Display Magazine Homepage Widgets.
		if ( ! is_paged() && is_active_sidebar( 'magazine-homepage' ) ) : ?>

			<div id="magazine-homepage-widgets" class="widget-area clearfix">

				<?php dynamic_sidebar( 'magazine-homepage' ); ?>

			</div><!-- #magazine-homepage-widgets -->

			<?php
		endif;

		if ( have_posts() ) :

			wellington_blog_title(); ?>

			<div id="post-wrapper" class="post-wrapper clearfix">

				<?php while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content' );

				endwhile; ?>

			</div>

			<?php wellington_pagination(); ?>

		<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
