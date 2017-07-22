<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Chronus
 */

get_header(); ?>

	<section id="primary" class="content-archive content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">

				<?php the_archive_title( '<h1 class="archive-title">', '</h1>' ); ?>
				<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>

			</header><!-- .page-header -->

			<div class="post-wrapper">

			<?php while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', esc_attr( chronus_get_option( 'blog_layout' ) ) );

			endwhile; ?>

			</div>

			<?php
			chronus_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
