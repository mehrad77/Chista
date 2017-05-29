<?php
/**
 * The template for displaying single posts
 *
 * @package Wellington
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php wellington_post_image_single(); ?>

	<header class="entry-header">

		<?php wellington_entry_meta(); ?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content clearfix">

		<?php the_content(); ?>

		<?php wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wellington' ),
			'after'  => '</div>',
		) ); ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php wellington_entry_categories(); ?>
		<?php wellington_entry_tags(); ?>
		<?php wellington_post_navigation(); ?>

	</footer><!-- .entry-footer -->

</article>
